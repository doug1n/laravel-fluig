<?php

namespace doug1n\Fluig\Services;

/**
 * Class ECMBusinessPeriod
 * @package doug1n\Fluig\Services
 *
 * Webservice responsável por realizar operações referentes aos expedientes cadastrados no fluig. Pode ser utilizado
 * para pesquisar os expedientes de uma determinada empresa.
 */
class ECMBusinessPeriod extends FluigWebService
{
    /**
     * ECMBusinessPeriod constructor.
     */
    public function __construct()
    {
        parent::__construct("/webdesk/ECMBusinessPeriodService?wsdl");
    }

    /**
     * Retorna os expedientes da empresa.
     *
     * @param int $companyId código da empresa
     * @return mixed
     */
    public function getBusinessPeriods($companyId = 1)
    {
        $response = $this->soapClient->getBusinessPeriods(
            $this->usuario,
            $this->senha,
            $companyId
        );

        return $response;
    }
}