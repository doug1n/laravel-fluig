<?php

namespace doug1n\Fluig\Services;

/**
 * Class ECMOutstanding
 * @package doug1n\Fluig\Services
 *
 * Webservice responsável por interagir com as transferências de pendências do fluig. Pode ser utilizado para
 * transferir pendências de um usuário para outro usuário.
 */
class ECMOutstanding extends FluigWebService
{

    /**
     * ECMOutstanding constructor.
     */
    public function __construct()
    {
        parent::__construct("/webdesk/ECMOutstandingService?wsdl");
    }

    public function transfer()
    {
    }
}