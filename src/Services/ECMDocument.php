<?php

namespace doug1n\Fluig\Services;

/**
 * Class ECMDocument
 * @package doug1n\Fluig\Services
 *
 * Webservice responsável por realizar operações referentes a documentos do fluig. Pode ser utilizado para criar,
 * alterar, excluir e procurar documentos, entre outros recursos.
 */
class ECMDocument extends FluigWebService
{

    /**
     * ECMDocument constructor.
     */
    public function __construct()
    {
        parent::__construct("/webdesk/ECMDocumentService?wsdl");
    }

    public function approveDocument()
    {
    }

    public function copyDocumentToUploadArea()
    {
    }

    public function createDocument()
    {
    }

    public function createDocumentWithApprovementLevels()
    {
    }

    public function createSimpleDocumentPrivate()
    {
    }

    public function deleteDocument()
    {
    }

    public function destroyDocument()
    {
    }

    public function destroyDocumentApproval()
    {
    }

    public function findMostPopularDocuments()
    {
    }

    public function findMostPopularDocumentsOnDemand()
    {
    }

    public function findRecycledDocuments()
    {
    }

    public function getActiveDocument()
    {
    }

    public function getApprovers()
    {
    }

    public function getDocumentApprovalHistory()
    {
    }

    public function getDocumentApprovalStatus()
    {
    }

    public function getDocumentByExternalId()
    {
    }

    public function getDocumentVersion()
    {
    }

    public function getRelatedDocuments()
    {
    }

    public function getReportSubjectId()
    {
    }

    public function getSecurity()
    {
    }

    public function getUserPermissions()
    {
    }

    public function moveDocument()
    {
    }

    public function removeSecurity()
    {
    }

    public function restoreDocument()
    {
    }

    public function updateDocument()
    {
    }

    public function updateDocumentWithApprovementLevels()
    {
    }

    public function updateGroupSecurityType()
    {
    }

    public function updateSimpleDocument()
    {
    }

    public function validateIntegrationRequirements()
    {
    }


    /**
     * Retorna o byte do arquivo físico de um documento, caso o usuário tenha permissão para acessá-lo.
     *
     * @param $nrDocumentId
     * @param $documentVersao
     * @param $nomeArquivo
     * @param null $userId
     * @param int $companyId
     * @return mixed
     * @throws \Exception
     */
    public function getDocumentContent($nrDocumentId, $documentVersao, $nomeArquivo = null, $userId = null, $companyId = 1)
    {
        $response = $this->soapClient->getDocumentContent(
            $this->usuario,
            $this->senha,
            $companyId,
            $nrDocumentId,
            $userId,
            $documentVersao,
            $nomeArquivo
        );

        if (is_string($response)) {
            return $response;
        } else {
            throw new \Exception("Erro ao executar Fluig WS.", 500);
        }
    }

    /**
     * Cria um documento simples.
     *
     * @param $parentDocumentId
     * @param $publisherId
     * @param $documentDescription
     * @param null $attachments
     * @param int $companyId
     * @return mixed
     * @throws \Exception
     */
    public function createSimpleDocument($parentDocumentId, $publisherId, $documentDescription, $attachments = null, $companyId = 1)
    {
        $response = $this->soapClient->createSimpleDocument(
            $this->usuario,
            $this->senha,
            $companyId,
            $parentDocumentId,
            $publisherId,
            $documentDescription,
            $attachments
        );

        dd($response);
    }


}