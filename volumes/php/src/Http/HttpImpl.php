<?php

namespace App\Http;

use WpOrg\Requests\Requests;

class HttpImpl implements HttpClient
{
    public function get(string $url, array $headers): string
    {
        return (Requests::get($url, $headers))->body;
    }
}
