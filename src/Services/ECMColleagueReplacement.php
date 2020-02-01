<?php

namespace doug1n\Fluig\Services;

/**
 * Class ECMColleagueReplacement
 * @package doug1n\Fluig\Services
 *
 * Webservice responsável por realizar operações referentes a usuários substitutos no fluig. Pode ser utilizado para
 * criar, alterar, excluir e pesquisar usuários substitutos, entre outros recursos.
 */
class ECMColleagueReplacement extends FluigWebService
{
    /**
     * ECMColleagueReplacement constructor.
     */
    public function __construct()
    {
        parent::__construct("/webdesk/ECMColleagueReplacementService?wsdl");
    }

    /**
     * Cria um substituto.
     *
     * @param $crDto
     * @param int $companyId
     * @return mixed
     */
    public function createColleagueReplacement($crDto, $companyId = 1)
    {
        $response = $this->soapClient->createColleagueReplacement(
            $this->usuario,
            $this->senha,
            $companyId,
            $crDto
        );

        return $response;
    }

    /**
     * Exclui o cadastro de um substituto.
     *
     * @param $colleagueId
     * @param $replacementId
     * @param int $companyId
     * @return mixed
     */
    public function deleteColleagueReplacement($colleagueId, $replacementId, $companyId = 1)
    {
        $response = $this->soapClient->deleteColleagueReplacement(
            $this->usuario,
            $this->senha,
            $companyId,
            $colleagueId,
            $replacementId
        );

        return $response;
    }

    /**
     * Retorna um substituto de um usuário.
     *
     * @param $colleagueId
     * @param $replacementId
     * @param int $companyId
     * @return mixed
     */
    public function getColleagueReplacement($colleagueId, $replacementId, $companyId = 1)
    {
        $response = $this->soapClient->getColleagueReplacement(
            $this->usuario,
            $this->senha,
            $companyId,
            $colleagueId,
            $replacementId
        );

        return $response;
    }

    /**
     * Retorna todos os substitutos de um usuário.
     *
     * @param $colleagueId
     * @param int $companyId
     * @return mixed
     */
    public function getReplacementsOfUser($colleagueId, $companyId = 1)
    {
        $response = $this->soapClient->getReplacementsOfUser(
            $this->usuario,
            $this->senha,
            $companyId,
            $colleagueId
        );

        return $response;
    }

    /**
     * Retorna todos os usuário substituídos por um substituto válido.
     *
     * @param $replacementId
     * @param int $companyId
     * @return mixed
     */
    public function getValidReplacedUsers($replacementId, $companyId = 1)
    {
        $response = $this->soapClient->getValidReplacedUsers(
            $this->usuario,
            $this->senha,
            $companyId,
            $replacementId
        );

        return $response;
    }

    /**
     * Retorna um substituto válido de um usuário.
     *
     * @param $colleagueId
     * @param $replacementId
     * @param int $companyId
     * @return mixed
     */
    public function getValidReplacement($colleagueId, $replacementId, $companyId = 1)
    {
        $response = $this->soapClient->getValidReplacement(
            $this->usuario,
            $this->senha,
            $companyId,
            $colleagueId,
            $replacementId
        );

        return $response;
    }

    /**
     * Retorna todos os substitutos válidos de um usuário.
     *
     * @param $colleagueId
     * @param int $companyId
     * @return mixed
     */
    public function getValidReplacementsOfUser($colleagueId, $companyId = 1)
    {
        $response = $this->soapClient->getValidReplacementsOfUser(
            $this->usuario,
            $this->senha,
            $companyId,
            $colleagueId
        );

        return $response;
    }

    /**
     * Altera o cadastro de um substituto.
     *
     * @param $crDto
     * @param int $companyId
     * @return mixed
     */
    public function updateColleagueReplacement($crDto, $companyId = 1)
    {
        $response = $this->soapClient->updateColleagueReplacement(
            $this->usuario,
            $this->senha,
            $companyId,
            $crDto
        );

        return $response;
    }
}