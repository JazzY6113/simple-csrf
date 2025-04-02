<?php

namespace SimpleCSRF;

use Src\Session;

class CSRF
{
    public static function generateToken(): string
    {
        $token = md5(time());
        Session::set('csrf_token', $token);
        return $token;
    }

    public static function getToken(): ?string
    {
        return Session::get('csrf_token');
    }

    public static function verifyToken(string $token): bool
    {
        return !empty($token) && $token === self::getToken();
    }
}