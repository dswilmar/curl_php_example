<?php

namespace Src\Services;

use GuzzleHttp\Client;

class Api
{
    private $client;
    private $config = ['base_uri' => 'https://reqres.in/api/'];
    private $token = '';

    public function __construct()
    {
        $this->client = new Client($this->config);
    }

    public function login($user, $password)
    {
        $auth = ['email' => $user, 'password' => $password];
        $response = $this->client->post('login', ['json' => $auth]);
        if ($response->getStatusCode() === 200) {
            $data = json_decode($response->getBody()->getContents());
            $this->token = $data->token;
            return true;            
        }
        return false;
    }    

    public function post($doc)
    {
        $response = $this->client->post('users', [
            'headers' => ['Authorization' => 'Bearer ' . $this->token],
            'json' => $doc
        ]);

        if ($response->getStatusCode() === 201) {
            $data = json_decode($response->getBody()->getContents());            
            return $data;
        }
        return [];
    }
}