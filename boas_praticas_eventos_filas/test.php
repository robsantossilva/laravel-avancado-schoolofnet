<?php

abstract class A
{

    static function create()
    {

        //return new self();  //Fatal error: Cannot instantiate abstract class A

        return new static; //this is the correct way

    }

    static function hello()
    {
        echo "Hello\n";
        return new static;
    }
}

class B extends A
{
}

$obj = B::create()::hello()::hello();
var_dump($obj);
