<?php

namespace doug1n\Fluig\Services;

/**
 * Class ECMCardIndex
 * @package doug1n\Fluig\Services
 *
 * Webservice responsável por realizar operações referentes aos formulários cadastrados no fluig.
 */
class ECMCardIndex extends FluigWebService
{
    /**
     * ECMCardIndex constructor.
     */
    public function __construct()
    {
        parent::__construct("/webdesk/ECMCardIndexService?wsdl");
    }

    /**
     * Criação simples de um formulário.
     *
     * @param $parentDocumentId
     * @param $publisherId
     * @param $documentDescription
     * @param $cardDescription
     * @param $attachments
     * @param $customEvents
     * @param int $companyId
     * @return mixed
     */
    public function createSimpleCardIndex($parentDocumentId, $publisherId, $documentDescription,
                                          $cardDescription, $attachments, $customEvents, $companyId = 1)
    {
        $response = $this->soapClient->createSimpleCardIndex(
            $this->usuario,
            $this->senha,
            $companyId,
            $parentDocumentId,
            $publisherId,
            $documentDescription,
            $cardDescription,
            $attachments,
            $customEvents
        );

        return $response;
    }

    /**
     * Criação simples de um formulário com datasets.
     *
     * @param $parentDocumentId
     * @param $publisherId
     * @param $documentDescription
     * @param $cardDescription
     * @param $datasetName
     * @param $attachments
     * @param $customEvents
     * @param int $companyId
     * @return mixed
     */
    public function createSimpleCardIndexWithDataset($parentDocumentId, $publisherId, $documentDescription, $cardDescription,
                                                     $datasetName, $attachments, $customEvents, $companyId = 1)
    {
        $response = $this->soapClient->createSimpleCardIndexWithDataset(
            $this->usuario,
            $this->senha,
            $companyId,
            $parentDocumentId,
            $publisherId,
            $documentDescription,
            $cardDescription,
            $datasetName,
            $attachments,
            $customEvents
        );

        return $response;
    }

    /**
     * Criação simples de um formulário com datasets determinando o tipo da persistência (Formulário ou Lista).
     *
     * @param $parentDocumentId
     * @param $publisherId
     * @param $documentDescription
     * @param $cardDescription
     * @param $datasetName
     * @param $attachments
     * @param $customEvents
     * @param $persistenceType
     * @param int $companyId
     * @return mixed
     */
    public function createSimpleCardIndexWithDatasetPersisteType($parentDocumentId, $publisherId, $documentDescription, $cardDescription,
                                                                 $datasetName, $attachments, $customEvents, $persistenceType, $companyId = 1)
    {
        $response = $this->soapClient->createSimpleCardIndexWithDatasetPersisteType(
            $this->usuario,
            $this->senha,
            $companyId,
            $parentDocumentId,
            $publisherId,
            $documentDescription,
            $cardDescription,
            $datasetName,
            $attachments,
            $customEvents,
            $persistenceType
        );

        return $response;
    }

    /**
     * Retorna o formulário ativo.
     *
     * @param $documentId
     * @param $colleagueId
     * @param int $companyId
     * @return mixed
     */
    public function getActiveCardIndex($documentId, $colleagueId, $companyId = 1)
    {
        $response = $this->soapClient->getActiveCardIndex(
            $this->usuario,
            $this->senha,
            $companyId,
            $documentId,
            $colleagueId
        );

        return $response;
    }

    /**
     * Retorna uma lista de anexos do relatório no fluig.
     *
     * @param $documentId
     * @param int $companyId
     * @return mixed
     */
    public function getAttachmentsList($documentId, $companyId = 1)
    {
        $response = $this->soapClient->getAttachmentsList(
            $this->usuario,
            $this->senha,
            $companyId,
            $documentId
        );

        return $response;
    }

    /**
     * Retorna o conteúdo de um formulário.
     *
     * @param $documentId
     * @param $version
     * @param $nomeArquivo
     * @param $colleagueId
     * @param int $companyId
     * @return mixed
     */
    public function getCardIndexContent($documentId, $version, $nomeArquivo, $colleagueId, $companyId = 1)
    {
        $response = $this->soapClient->getCardIndexContent(
            $this->usuario,
            $this->senha,
            $companyId,
            $documentId,
            $colleagueId,
            $version,
            $nomeArquivo
        );

        return $response;
    }

    /**
     * Retorna os formulários sem aprovadores que o usuário tenha permissão.
     *
     * @param $colleagueId
     * @param int $companyId
     * @return mixed
     */
    public function getCardIndexesWithoutApprover($colleagueId, $companyId = 1)
    {
        $response = $this->soapClient->getCardIndexesWithoutApprover(
            $this->usuario,
            $this->senha,
            $companyId,
            $colleagueId
        );

        return $response;
    }

    /**
     * Retorna os eventos do formulário.
     *
     * @param $documentId
     * @param int $companyId
     * @return mixed
     */
    public function getCustomizationEvents($documentId, $companyId = 1)
    {
        $response = $this->soapClient->getCustomizationEvents(
            $this->usuario,
            $this->senha,
            $companyId,
            $documentId
        );

        return $response;
    }

    /**
     * Retorna os campos do formulário.
     *
     * @param $documentId
     * @param int $companyId
     * @return mixed
     */
    public function getFormFields($documentId, $companyId = 1)
    {
        $response = $this->soapClient->getCustomizationEvents(
            $this->usuario,
            $this->senha,
            $companyId,
            $documentId
        );

        return $response;
    }

    /**
     * Atualização simples do formulário.
     *
     * @param $documentId
     * @param $publisherId
     * @param $cardDescription
     * @param $descriptionField
     * @param $attachments
     * @param $customEvents
     * @param int $companyId
     * @return mixed
     */
    public function updateSimpleCardIndex($documentId, $publisherId, $cardDescription,
                                          $descriptionField, $attachments, $customEvents, $companyId = 1)
    {
        $response = $this->soapClient->updateSimpleCardIndex(
            $this->usuario,
            $this->senha,
            $companyId,
            $documentId,
            $publisherId,
            $cardDescription,
            $descriptionField,
            $attachments,
            $customEvents
        );

        return $response;
    }

    /**
     * Atualização simples do formulário com datasets.
     *
     * @param $documentId
     * @param $publisherId
     * @param $cardDescription
     * @param $descriptionField
     * @param $attachments
     * @param $datasetName
     * @param $customEvents
     * @param int $companyId
     * @return mixed
     */
    public function updateSimpleCardIndexWithDataset($documentId, $publisherId, $cardDescription, $descriptionField,
                                                     $attachments, $datasetName, $customEvents, $companyId = 1)
    {
        $response = $this->soapClient->updateSimpleCardIndexWithDataset(
            $this->usuario,
            $this->senha,
            $companyId,
            $documentId,
            $publisherId,
            $cardDescription,
            $descriptionField,
            $datasetName,
            $attachments,
            $customEvents
        );

        return $response;
    }
}