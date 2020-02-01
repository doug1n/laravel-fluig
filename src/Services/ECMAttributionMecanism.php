<?php

namespace doug1n\Fluig\Services;

/**
 * Class ECMAttributionMecanism
 * @package doug1n\Fluig\Services
 *
 * Webservice responsável por realizar operações referentes aos mecanismos de atribuição cadastrados no fluig.
 * Pode ser utilizado para pesquisar os mecanismos de atribuição de uma determinada empresa.
 */
class ECMAttributionMecanism extends FluigWebService
{
    /**
     * ECMAttributionMecanismService constructor.
     */
    public function __construct()
    {
        parent::__construct("/webdesk/ECMAttributionMecanismService?wsdl");
    }

    /**
     * Retorna os mecanismos de atribuição da empresa.
     *
     * @param int $companyId código da empresa
     * @return mixed
     */
    public function getAttributionMecanism($companyId = 1)
    {
        $response = $this->soapClient->getAttributionMecanism(
            $this->usuario,
            $this->senha,
            $companyId
        );

        return $response;
    }
}