<?php

namespace doug1n\Fluig\Services;

/**
 * Class ECMCompany
 * @package doug1n\Fluig\Services
 *
 * Webservice responsável por realizar operações referentes à empresa no fluig. Pode ser utilizado para criar, alterar,
 * excluir e pesquisar empresas, entre outros recursos.
 */
class ECMCompany extends FluigWebService
{
    /**
     * ECMCompany constructor.
     */
    public function __construct()
    {
        parent::__construct("/webdesk/ECMCompanyService?wsdl");
    }

    /**
     * Cria uma empresa no fluig.
     *
     * @param $companyId
     * @param $description
     * @param $urlAccessName
     * @param $phisicalPath
     * @param $webdeskServer
     * @param $webPort
     * @return mixed
     */
    public function createCompany($companyId, $description, $urlAccessName, $phisicalPath, $webdeskServer, $webPort)
    {
        $response = $this->soapClient->createCompany(
            $this->usuario,
            $this->senha,
            $companyId,
            $description,
            $urlAccessName,
            $phisicalPath,
            $webdeskServer,
            $webPort
        );

        return $response;
    }

    /**
     * Retorna todas as empresas cadastradas no fluig.
     *
     * @param int $companyId
     * @return mixed
     */
    public function getCompanies($companyId = 1)
    {
        $response = $this->soapClient->getCompanies(
            $this->usuario,
            $this->senha,
            $companyId
        );

        return $response;
    }

    /**
     * Retorna uma empresa cadastrada no fluig.
     *
     * @param int $companyId
     * @return mixed
     */
    public function getCompany($companyId = 1)
    {
        $response = $this->soapClient->getCompany(
            $companyId
        );

        return $response;
    }

    /**
     * Altera uma empresa no fluig.
     *
     * @param $description
     * @param $urlAccessName
     * @param $phisicalPath
     * @param $webdeskServer
     * @param $webPort
     * @param int $companyId
     * @return mixed
     */
    public function updateCompany($description, $urlAccessName, $phisicalPath, $webdeskServer, $webPort, $companyId = 1)
    {
        $response = $this->soapClient->updateCompany(
            $this->usuario,
            $this->senha,
            $companyId,
            $description,
            $urlAccessName,
            $phisicalPath,
            $webdeskServer,
            $webPort
        );

        return $response;
    }
}