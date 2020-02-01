<?php

namespace doug1n\Fluig\Services;

/**
 * Class ECMGlobalParam
 * @package doug1n\Fluig\Services
 *
 * Webservice responsável por interagir com as configurações dos parâmetros gerais do fluig. Pode ser utilizado para
 * criar, alterar e pesquisar os parâmetros gerais.
 */
class ECMGlobalParam extends FluigWebService
{

    /**
     * ECMGlobalParam constructor.
     */
    public function __construct()
    {
        parent::__construct("/webdesk/ECMGlobalParamService?wsdl");
    }

    public function createGlobalParam()
    {
    }

    public function getGlobalParam()
    {
    }

    public function getVolumes()
    {
    }

    public function updateConfigurations()
    {
    }

    public function updateGlobalParam()
    {
    }
}