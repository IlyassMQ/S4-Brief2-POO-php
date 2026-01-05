<?php

class SessionManager
{
    public static function start(){
        if (session_status() === PHP_SESSION_NONE){
            session_start();
        }
    }

    public static function setUser(array $user){
        self::start();
        $_SESSION['user'] = $user;
    }

    public static function isLogged(){
        self::start();
        return isset($_SESSION['user']);
    }

    public static function getUser(){
        self::start();
        return $_SESSION['user'] ?? null;
    }
    public static function logout(){
        self::start();
        session_unset();
        session_destroy();
    }
}
