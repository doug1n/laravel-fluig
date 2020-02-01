<?php

namespace doug1n\Fluig\Services;

class FluigWebService
{
    protected $endPoint;
    protected $soapClient;
    protected $usuario;
    protected $senha;
    protected $usuarioId;

    public function __construct($route)
    {
        $this->endPoint = config('fluig.domain') . $route;

        $this->usuario = config('fluig.user');
        $this->senha = config('fluig.password');

        $this->usuarioId = config('fluig.userId');

        $this->soapClient = $this->mkSoapClient($this->endPoint);
    }

    public function mkSoapClient($endPoint)
    {
        return new \SoapClient($endPoint,
            ['stream_context' => stream_context_create(
                ['ssl' => ['verify_peer' => false, 'verify_peer_name' => false]]
            )]
        );
    }
}