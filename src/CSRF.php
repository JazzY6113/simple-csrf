<?php

namespace SimpleCSRF;

use Src\Session;

class CSRF
{
    public static function generateToken()
    {
        $token = md5(time());
        Session::set('csrf_token', $token);
        return $token;
    }

    public static function getToken()
    {
        return Session::get('csrf_token');
    }

    public static function verifyToken($token)
    {
        return !empty($token) && $token === self::getToken();
    }
}