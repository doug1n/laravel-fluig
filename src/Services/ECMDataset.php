<?php

namespace doug1n\Fluig\Services;

/**
 * Class ECMDataset
 * @package doug1n\Fluig\Services
 *
 * Webservice responsável por interagir com os datasets do fluig. Pode ser utilizado para pesquisar os datasets
 * existentes.
 */
class ECMDataset extends FluigWebService
{
    /**
     * ECMDatasetService constructor.
     */
    public function __construct()
    {
        parent::__construct("/webdesk/ECMDatasetService?wsdl");
    }

    /**
     * Retorna as informações de um dataset.
     *
     * @param $name string nome do dataset
     * @param $fields array campos que serão retornados do dataset
     * @param null $constraintsDto array filtro dos registros que irão compor o dataset
     * @param null $order array campos utilizados para ordenar o dataset
     * @param int $companyId código da empresa
     * @return mixed
     */
    public function getDataset($name, $fields = null, $constraintsDto = null, $order = null, $companyId = 1)
    {
        $response = $this->soapClient->getDataset(
            $companyId,
            $this->usuario,
            $this->senha,
            $name,
            $fields,
            $constraintsDto,
            $order
        );

        return $response;
    }

    /**
     * Retorna todos os datasets disponíveis.
     *
     * @param int $companyId
     * @return mixed
     */
    public function getAvailableDatasets($companyId = 1)
    {
        $response = $this->soapClient->getAvailableDatasets(
            $companyId,
            $this->usuario,
            $this->senha
        );

        return $response;
    }

    /**
     * Cria um dataset.
     *
     * @param $datasetName
     * @param $description
     * @param $impl
     * @param int $companyId
     * @return mixed
     */
    public function addDataset($datasetName, $description, $impl, $companyId = 1)
    {
        $response = $this->soapClient->addDataset(
            $companyId,
            $this->usuario,
            $this->senha,
            $datasetName,
            $description,
            $impl
        );

        return $response;
    }

    /**
     * Remove um dataset.
     *
     * @param $datasetName
     * @param int $companyId
     * @return mixed
     */
    public function deleteDataset($datasetName, $companyId = 1)
    {
        $response = $this->soapClient->deleteDataset(
            $companyId,
            $this->usuario,
            $this->senha,
            $datasetName
        );

        return $response;
    }

    /**
     * Atualiza um dataset.
     *
     * @param $datasetName
     * @param $description
     * @param $impl
     * @param int $companyId
     * @return void
     */
    public function updateDataset($datasetName, $description, $impl, $companyId = 1)
    {
        $this->soapClient->updateDataset(
            $companyId,
            $this->usuario,
            $this->senha,
            $datasetName,
            $description,
            $impl
        );
    }
}