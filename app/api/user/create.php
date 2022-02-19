<?php

require_once dirname(dirname(__DIR__)) . "/config/bootstrap.php";

if (empty($_POST["name"]) && empty($_POST["email"]) && empty($_POST["password"])) 
{
    die(json_encode(["error" => "Заполните все поля"]));
}

$user = new User();

$user->setName($_POST["name"]);
$user->setEmail($_POST["email"]);
$user->setPassword($_POST["password"]);

$entityManager->persist($user);
$entityManager->flush();


die(json_encode(["success" => "Пользователь успешно добавлен", "token" => $user->getPassword()]));