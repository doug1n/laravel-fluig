<?php

namespace doug1n\Fluig\Services;


class ECMDocument extends FluigWebService
{

    /**
     * ECMGroup constructor.
     */
    public function __construct()
    {
        parent::__construct("/webdesk/ECMDocumentService?wsdl");
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