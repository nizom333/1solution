<?php

/**
* @Entity @Table(name="users")
**/
class User 
{
    const SALT = 'nizom-auth-salt';
    
    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;

    /** @Column(type="string") **/
    protected $name;
    
    /** @Column(type="string") **/
    protected $email;

    /** @Column(type="string") **/
    protected $password;

    public function getId() : int
    {
        return $this->id;
    } 

    public function setName(string $name) : void
    {
        $this->name = $name;
    }

    public function setEmail(string $email) : void
    {
        $this->email = $email;
    }

    public function setPassword(string $password) : void
    {
        $this->password = md5(trim($password) . self::SALT);
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function getEmail() : string
    {
        return $this->email;
    }

    public function getPassword() : string
    {
        return $this->password;
    }

    public function toArray() : array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password
        ];
    }
}