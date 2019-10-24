<?php

namespace Controllers;

use Libs\Application as Application;
use Libs\ViewLoader as ViewLoader;
use Libs\Auth as Auth;

class Home
{
    public function index()
    {
        if (!Auth::isAuthenticated()) {
            ViewLoader::load('home/index');
        } else {
            Application::redirect("home/home");
        }
    }

    public function home()
    {
        if (Auth::isAuthenticated()) {
            ViewLoader::load('home/home');
        }
    }

    public function login()
    {

        ViewLoader::load('home/login');
        //Auth::auth();
        //Application::redirect("home/home");
    }

    public function logout()
    {
        Auth::logout();
        Application::redirect("home/index");
    }
}
