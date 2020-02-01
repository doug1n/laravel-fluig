<?php

namespace doug1n\Fluig\Services;

/**
 * Class ECMSignal
 * @package doug1n\Fluig\Services
 *
 * Webservice responsável por interagir com os sinais criados no fluig. Pode ser utilizado para criar, remover,
 * enviar sinais ou consultar os sinais existentes.
 */
class ECMSignal extends FluigWebService
{

    /**
     * ECMSignal constructor.
     */
    public function __construct()
    {
        parent::__construct("/webdesk/ECMSignalService?wsdl");
    }

    public function createSignal()
    {
    }

    public function deleteSignal()
    {
    }

    public function fireSignal()
    {
    }

    public function getSignals()
    {
    }
}