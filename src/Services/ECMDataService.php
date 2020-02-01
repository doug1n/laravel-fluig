<?php

namespace doug1n\Fluig\Services;

/**
 * Class ECMDataService
 * @package doug1n\Fluig\Services
 *
 * Webservice responsável por interagir com os serviços externos do fluig. Pode ser utilizado para criar, alterar,
 * excluir e pesquisar os serviços externos existentes.
 */
class ECMDataService extends FluigWebService
{

    /**
     * ECMDataService constructor.
     */
    public function __construct()
    {
        parent::__construct("/webdesk/ECMDataServiceService?wsdl");
    }

    /**
     * Cria um serviço externo.
     *
     * @param $dataServiceDto
     * @param int $companyId
     * @return mixed
     */
    public function createDataService($dataServiceDto, $companyId = 1)
    {
        $response = $this->soapClient->createDataService(
            $companyId,
            $this->usuario,
            $this->senha,
            $dataServiceDto
        );

        return $response;
    }

    /**
     * Remove um serviço externo.
     *
     * @param $dataServiceName
     * @param int $companyId
     * @return mixed
     */
    public function deleteDataService($dataServiceName, $companyId = 1)
    {
        $response = $this->soapClient->deleteDataService(
            $companyId,
            $this->usuario,
            $this->senha,
            $dataServiceName
        );

        return $response;
    }

    /**
     * Retorna todos os serviços externos cadastrados.
     *
     * @param int $companyId
     * @return mixed
     */
    public function getAllServices($companyId = 1)
    {
        $response = $this->soapClient->getAllServices(
            $companyId,
            $this->usuario,
            $this->senha
        );

        return $response;
    }

    /**
     * Retorna um serviço externo.
     *
     * @param $dataServiceName
     * @param int $companyId
     * @return mixed
     */
    public function loadDataService($dataServiceName, $companyId = 1)
    {
        $response = $this->soapClient->loadDataService(
            $companyId,
            $this->usuario,
            $this->senha,
            $dataServiceName
        );

        return $response;
    }

    /**
     * Atualiza um serviço externo.
     *
     * @param $dataServiceDto
     * @param int $companyId
     * @return mixed
     */
    public function updateDataService($dataServiceDto, $companyId = 1)
    {
        $response = $this->soapClient->updateDataService(
            $companyId,
            $this->usuario,
            $this->senha,
            $dataServiceDto
        );

        return $response;
    }
}