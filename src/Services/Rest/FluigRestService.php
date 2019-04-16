<?php

namespace dougvobel\Fluig\Services\Rest;


use GuzzleHttp\Client;
use GuzzleHttp\Subscriber\Oauth\Oauth1;

class FluigRestService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_url' => config('fluig.domain'),
            'defaults' => [
                'verify' => false,
                'auth' => 'oauth'
            ]
        ]);

        $middleware = new Oauth1([
            'consumer_key' => config('fluig.consumerKey'),
            'consumer_secret' => config('fluig.consumerSecret'),
            'token' => config('fluig.accessToken'),
            'token_secret' => config('fluig.tokenSecret')
        ]);

        $this->client->getEmitter()->attach($middleware);

    }
}