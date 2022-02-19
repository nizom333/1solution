<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');

require_once dirname(dirname(__DIR__)) . "/config/bootstrap.php";

$_REQUEST['email'] = trim($_REQUEST['email']);

if (empty($_REQUEST['email'])) 
{
    die(json_encode(["error" => "Заполните поля email"]));
}

$user = $entityManager->getRepository('User')->findOneBy(array('email' => $_REQUEST['email']));

if ($user->getId() > 0)
{
    if (!empty($_REQUEST['password'])) 
    {
        $password = $user->getPassword();
        if ($password == md5(trim($_REQUEST['password']) . User::SALT)) 
        {
            die(json_encode(["success" => "Пользователь успешно авторизован", "token" => $user->getPassword()]));
        }
        else 
        {
            die(json_encode(["error" => "Неверный пароль"]));
        }
    }
    
    die(json_encode([
        "message" => "Пользователь с таким email уже существует",
    ]));
}