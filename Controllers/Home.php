<?php

class Home{

    public function index(){
        echo("HOME INDEX");
        

        echo file_get_contents("Views/home.phtml");
        
        return true;
    }

}