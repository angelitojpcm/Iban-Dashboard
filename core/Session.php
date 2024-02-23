<?php

class Session extends Database
{
    public function __construct()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        parent::__construct();
    }

    public function isAuth()
    {
        if (isset($_SESSION['user'])) {
            return true;
        } else {
            return false;
        }
    }

    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function get($key)
    {
        return $_SESSION[$key];
    }

    public function destroy()
    {
        session_destroy();
    }
}
