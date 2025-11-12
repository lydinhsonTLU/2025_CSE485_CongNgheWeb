<?php
class User
{
    public $name;
    public $age;
    public $email;
    public $password;

    //constructor
    public function __construct($name, $age, $email, $password) {
        $this->name = $name;
        $this->age = $age;
        $this->email = $email;
        $this->password = $password;
    }

    //set
    function set_name($name)
    {
        $this->name = $name;
    }

    function get_name()
    {
        return $this->name;
    }
}

//ke thua
class employee extends User {
    public $luong;

    public function __construct($name, $age, $email, $password, $luong) {
        parent::__construct($name, $age, $email, $password);
        $this->luong = $luong;
    }

    public function get_luong() {return $this->luong;}
}



$employee = new employee('Son',20,'son@gmail.com',123,100);

print_r($employee);
