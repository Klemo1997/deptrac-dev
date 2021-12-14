<?php

namespace App\Http;

interface HttpClient
{
    public function get(string $url, array $headers): string;
}
