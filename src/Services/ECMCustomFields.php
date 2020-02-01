<?php

namespace doug1n\Fluig\Services;

/**
 * Class ECMCustomFields
 * @package doug1n\Fluig\Services
 *
 * Webservice responsável por interagir com os campos customizados do fluig. Pode ser utilizado para criar, alterar,
 * excluir e pesquisar campos customizados, entre outros recursos.
 */
class ECMCustomFields extends FluigWebService
{

    /**
     * ECMCustomFields constructor.
     */
    public function __construct()
    {
        parent::__construct("/webdesk/ECMCustomFieldsService?wsdl");
    }

    /**
     * Cria um campo customizado.
     *
     * @param $customFieldsDto
     * @param int $companyId
     * @return mixed
     */
    public function createCustomFields($customFieldsDto, $companyId = 1)
    {
        $response = $this->soapClient->createCustomFields(
            $this->usuario,
            $this->senha,
            $companyId,
            $customFieldsDto
        );

        return $response;
    }

    /**
     * Retorna todos os campos customizados.
     *
     * @param int $companyId
     * @return mixed
     */
    public function getAllCustomField($companyId = 1)
    {
        $response = $this->soapClient->getAllCustomField(
            $this->usuario,
            $this->senha,
            $companyId
        );

        return $response;
    }

    /**
     * Retorna todos os campos customizados de um documento.
     *
     * @param $documentId
     * @param $version
     * @param int $companyId
     * @return mixed
     */
    public function getAllDocumentCustomField($documentId, $version, $companyId = 1)
    {
        $response = $this->soapClient->getAllDocumentCustomField(
            $this->usuario,
            $this->senha,
            $companyId,
            $documentId,
            $version
        );

        return $response;
    }

    /**
     * Exclui um campo customizado.
     *
     * @param $customFieldsId
     * @param int $companyId
     * @return mixed
     */
    public function removeCustomField($customFieldsId, $companyId = 1)
    {
        $response = $this->soapClient->removeCustomField(
            $this->usuario,
            $this->senha,
            $companyId,
            $customFieldsId
        );

        return $response;
    }

    /**
     * Exclui um campo customizado de um documento.
     *
     * @param $customFieldsId
     * @param $documentId
     * @param $version
     * @param int $companyId
     * @return mixed
     */
    public function removeDocumentCustomField($customFieldsId, $documentId, $version, $companyId = 1)
    {
        $response = $this->soapClient->removeDocumentCustomField(
            $this->usuario,
            $this->senha,
            $companyId,
            $customFieldsId,
            $documentId,
            $version
        );

        return $response;
    }

    /**
     * Cria ou altera um campo customizado em um documento.
     *
     * @param $documentCustomFieldsDto
     * @param int $companyId
     * @return mixed
     */
    public function setDocumentCustomFields($documentCustomFieldsDto, $companyId = 1)
    {
        $response = $this->soapClient->setDocumentCustomFields(
            $this->usuario,
            $this->senha,
            $companyId,
            $documentCustomFieldsDto
        );

        return $response;
    }

    /**
     * Altera um campo customizado.
     *
     * @param $customFieldsId
     * @param int $companyId
     * @return mixed
     */
    public function updateCustomFields($customFieldsId, $companyId = 1)
    {
        $response = $this->soapClient->updateCustomFields(
            $this->usuario,
            $this->senha,
            $companyId,
            $customFieldsId
        );

        return $response;
    }
}