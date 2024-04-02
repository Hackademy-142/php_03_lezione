<?php

class User
{
    //stabilisco le caratteristiche: ATTRIBUTI
    public $username, $email;
    protected $password;

    //costruire/ valorizzare gli attributi: costruttore

    public function __construct($username, $email, $password) // PARAMETRI FORMALI
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }
    public function changePassword($newPassword)
    {
        $this->password = $newPassword;
    }
}

$utente1 = new User('annalisa97', 'annalisa@email.it', '12345678');

class Student extends User
{
    public $hackademy;

    public function __construct($username, $email, $password, $hackademy)
    {
        parent::__construct($username, $email, $password);
        $this->hackademy = $hackademy;
    }
}

$studente = new Student('denis', 'denis@email.it', '12345678', '142');
var_dump($studente);

$studente->changePassword('ciaociao');

class StudentFulltime extends Student{
    public $schedule;
}