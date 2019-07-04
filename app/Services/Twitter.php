<?php

namespace App\Services;

/**
 *Registering Twitter & receiving api_key throw construstor
 */
class Twitter
{
    protected $apiKey;

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function getKey()
    {
        return $this->apiKey;
    }
}
