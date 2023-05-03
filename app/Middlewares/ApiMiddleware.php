<?php

namespace Middlewares;

use Exception;
use Src\Auth\Auth;
use Src\Request;

class ApiMiddleware{
    /**
     * @throws Exception
     */
    public function handle(Request $request): void
    {
        if (!Auth::user()->getToken()) {
            throw new Exception('Forbidden for you');
        }
    }
}