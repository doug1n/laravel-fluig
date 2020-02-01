<?php

namespace doug1n\Fluig\Services;

/**
 * Class ECMCard
 * @package doug1n\Fluig\Services
 *
 * Webservice responsável por realizar operações referentes a formulários no fluig. Pode ser utilizado para criar,
 * alterar, excluir e pesquisar formulários, entre outros recursos.
 */
class ECMCard extends FluigWebService
{
    /**
     * ECMCard constructor.
     */
    public function __construct()
    {
        parent::__construct("/webdesk/ECMCardService?wsdl");
    }

    /**
     * Retorna o formulário ativo.
     *
     * @param $carddtos
     * @param int $companyId
     * @return mixed
     */
    public function create($carddtos, $companyId = 1)
    {
        $response = $this->soapClient->create(
            $companyId,
            $this->usuario,
            $this->senha,
            $carddtos
        );

        return $response;
    }

    /**
     * Exclui um formulário e envia para a lixeira.
     *
     * @param $cardId
     * @param int $companyId
     * @return mixed
     */
    public function deleteCard($cardId, $companyId = 1)
    {
        $response = $this->soapClient->deleteCard(
            $companyId,
            $this->usuario,
            $this->senha,
            $cardId
        );

        return $response;
    }

    /**
     * Retorna a versão de um formulário.
     *
     * @param $nrDocumentId
     * @param $version
     * @param $colleagueId
     * @param int $companyId
     * @return mixed
     */
    public function getCardVersion($nrDocumentId, $version, $colleagueId, $companyId = 1)
    {
        $response = $this->soapClient->getCardVersion(
            $companyId,
            $this->usuario,
            $this->senha,
            $nrDocumentId,
            $version,
            $colleagueId
        );

        return $response;
    }

    /**
     * Altera os metadados de um formulário.
     *
     * @param $cardDtos
     * @param $attachs
     * @param $docsecurity
     * @param $docapprovers
     * @param $reldocs
     * @param int $companyId
     * @return mixed
     */
    public function updateCard($cardDtos, $attachs, $docsecurity, $docapprovers, $reldocs, $companyId = 1)
    {
        $response = $this->soapClient->updateCard(
            $companyId,
            $this->usuario,
            $this->senha,
            $cardDtos,
            $attachs,
            $docsecurity,
            $docapprovers,
            $reldocs
        );

        return $response;
    }

    /**
     * Altera os campos de um formulário.
     *
     * @param $cardId
     * @param $cardData
     * @param int $companyId
     * @return mixed
     */
    public function updateCardData($cardId, $cardData, $companyId = 1)
    {
        $response = $this->soapClient->updateCardData(
            $companyId,
            $this->usuario,
            $this->senha,
            $cardId,
            $cardData
        );

        return $response;
    }
}