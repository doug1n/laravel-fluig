<?php

namespace doug1n\Fluig\Services\Rest;


use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Subscriber\Oauth\Oauth1;

class FluigRestService
{
    protected $client;

    public function __construct()
    {
        $stack = HandlerStack::create();

        $middleware = new Oauth1([
            'consumer_key' => config('fluig.consumerKey'),
            'consumer_secret' => config('fluig.consumerSecret'),
            'token' => config('fluig.accessToken'),
            'token_secret' => config('fluig.tokenSecret')
        ]);

        $stack->push($middleware);

        $this->client = new Client([
            'base_uri' => config('fluig.domain'),
            'verify' => false,
            'auth' => 'oauth',
            'handler' => $stack
        ]);

    }
}