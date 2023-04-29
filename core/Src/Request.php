<?php

namespace Src;

use Error;

class Request
{
    public string $method;
    public array $headers;
    protected array $body;

    public function __construct()
    {
        $this->body = $_REQUEST;
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->headers = getallheaders() ?? [];
    }

    public function all(): array
    {
        return $this->body + $this->files();
    }

    public function files(): array
    {
        return $_FILES;
    }

    public function set($field, $value): void
    {
        $this->body[$field] = $value;
    }

    public function get($field)
    {
        return $this->body[$field];
    }

    public function __get($key)
    {
        if (array_key_exists($key, $this->body)) {
            return $this->body[$key];
        }
        throw new Error('Accessing a non-existent property');
    }
}
