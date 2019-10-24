<?php

namespace Controllers;

use Libs\Application;
use Libs\Auth;
use Libs\Database;
use Libs\ViewLoader as ViewLoader;
use Models\Users;
use PDO;


class Login
{
    public function login()
    {
        $_SESSION["LoginError"] = "";
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            if(isset($_POST["userEmail"]) && !empty($_POST["userEmail"]) && isset($_POST["userPass"]) && !empty($_POST["userPass"]))
            {
                $_SESSION["userEmail"] = $_POST["userEmail"];
                $_SESSION["userPass"] = $_POST["userPass"];

                $result = Users::getUser($_SESSION["userEmail"],$_SESSION["userPass"]);



                if($result){
                    Auth::authenticate();
                    $_SESSION["userType"] = Users::getUserType($_SESSION["userEmail"]);
                    ViewLoader::load('home/home');
                }else{
                    $_SESSION["LoginError"] = "L'username e/o la password non sono corretti";
                    Application::redirect("home/login");
                }
            }
        }
    }
}