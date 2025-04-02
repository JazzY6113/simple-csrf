<?php

namespace SimpleCSRF;

use Exception;
use Src\Request;

class CSRFMiddleware
{
    public function handle(Request $request): void
    {
        if ($request->method !== 'POST') {
            return;
        }

        if (empty($request->get('csrf_token')) || !CSRF::verifyToken($request->get('csrf_token'))) {
            throw new Exception('Request not authorized');
        }
    }
}