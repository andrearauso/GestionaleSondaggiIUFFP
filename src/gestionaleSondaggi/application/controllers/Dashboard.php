<?php

namespace Controllers;

use Libs\Application;
use Libs\Auth;
use Libs\ViewLoader as ViewLoader;
use Models\Users;

class Dashboard
{
    public static function error404()
    {
        ViewLoader::load('errors/404');
    }

    public static function loadUserCreator()
    {
        ViewLoader::load('dashboard/userCreator');
    }

    public static function createUser()
    {
        $_SESSION["LoginError"] = "";
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            if(isset($_POST["name"]) && !empty($_POST["name"]) && isset($_POST["userEmail"]) && !empty($_POST["userEmail"]))
            {
                $name = $_POST["name"];
                $email = $_POST["userEmail"];
                $type = $_POST["userType"];

                Users::createUser($name, $email, $type);



                /*if($result){
                    Auth::authenticate();
                    $_SESSION["userType"] = Users::getUserType($_SESSION["userEmail"]);
                    ViewLoader::load('home/home');
                }else{
                    $_SESSION["LoginError"] = "L'username e/o la password non sono corretti";
                    Application::redirect("home/login");
                }*/
            }
        }
    }
}
