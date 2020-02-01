<?php

namespace doug1n\Fluig\Services;

/**
 * Class ECMToken
 * @package doug1n\Fluig\Services
 *
 * Webservice responsável por interagir com os token’s do fluig. Pode ser utilizado para pesquisar e validar os
 * token’s existentes.
 */
class ECMToken extends FluigWebService
{

    /**
     * ECMToken constructor.
     */
    public function __construct()
    {
        parent::__construct("/webdesk/ECMTokenService?wsdl");
    }

    public function getToken()
    {
        throw new \BadMethodCallException('Not implemented');
    }

    public function getTokenByLogin()
    {
        throw new \BadMethodCallException('Not implemented');
    }

    public function getTokenEmail()
    {
        throw new \BadMethodCallException('Not implemented');
    }

    public function validateToken()
    {
        throw new \BadMethodCallException('Not implemented');
    }
}