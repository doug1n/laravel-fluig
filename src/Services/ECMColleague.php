<?php

namespace doug1n\Fluig\Services;

/**
 * Class ECMColleague
 * @package doug1n\Fluig\Services
 *
 * Webservice responsável por realizar operações referentes a usuários no fluig. Pode ser utilizado para criar,
 * alterar, excluir e pesquisar usuários, entre outros recursos.
 */
class ECMColleague extends FluigWebService
{

    /**
     * ECMColleague constructor.
     */
    public function __construct()
    {
        parent::__construct("/webdesk/ECMColleagueService?wsdl");
    }

    /**
     * Cria um usuário.
     *
     * @param $colleagues
     * @param int $companyId
     * @return mixed
     */
    public function createColleague($colleagues, $companyId = 1)
    {
        $response = $this->soapClient->createColleague(
            $this->usuario,
            $this->senha,
            $companyId,
            $colleagues
        );

        return $response;
    }

    /**
     * Cria um usuário com grupos e papéis.
     *
     * @param $colleagues
     * @param $grupos
     * @param $papeis
     * @param int $companyId
     * @return mixed
     */
    public function createColleaguewithDependencies($colleagues, $grupos, $papeis, $companyId = 1)
    {
        $response = $this->soapClient->createColleaguewithDependencies(
            $this->usuario,
            $this->senha,
            $companyId,
            $colleagues,
            $grupos,
            $papeis
        );

        return $response;
    }

    /**
     * Retorna o usuário a partir do login.
     *
     * @return mixed
     */
    public function getColleagueByLogin()
    {
        $response = $this->soapClient->getColleagueByLogin(
            $this->usuario,
            $this->senha
        );

        return $response;
    }

    /**
     * Retorna todos os usuários ativos.
     *
     * @param int $companyId
     * @return mixed
     */
    public function getColleagues($companyId = 1)
    {
        $response = $this->soapClient->getColleagues(
            $this->usuario,
            $this->senha,
            $companyId
        );

        return $response;
    }

    /**
     * Retorna uma mensagem informando se o usuário foi criado corretamente.
     *
     * @param $colleagueXML
     * @return mixed
     */
    public function getColleagueWithMap($colleagueXML)
    {
        $response = $this->soapClient->getColleagueWithMap(
            $this->usuario,
            $this->senha,
            $colleagueXML
        );

        return $response;
    }

    /**
     * Retorna os grupos que o usuário participa.
     *
     * @param $colleagueId
     * @param int $companyId
     * @return mixed
     */
    public function getGroups($colleagueId, $companyId = 1)
    {
        $response = $this->soapClient->getGroups(
            $this->usuario,
            $this->senha,
            $companyId,
            $colleagueId
        );

        return $response;
    }

    /**
     * Retorna o usuário.
     *
     * @return mixed
     */
    public function getSimpleColleague()
    {
        $response = $this->soapClient->getSimpleColleague(
            $this->usuario,
            $this->senha
        );

        return $response;
    }

    /**
     * Retorna todos os usuários ativos.
     *
     * @param int $companyId
     * @return mixed
     */
    public function getSummaryColleagues($companyId = 1)
    {
        $response = $this->soapClient->getSummaryColleagues(
            $companyId
        );

        return $response;
    }

    /**
     * Desativa um usuário.
     *
     * @param $colleagueId
     * @param int $companyId
     * @return mixed
     */
    public function removeColleague($colleagueId, $companyId = 1)
    {
        $response = $this->soapClient->removeColleague(
            $this->usuario,
            $this->senha,
            $companyId,
            $colleagueId
        );

        return $response;
    }

    /**
     * Ativa um usuário.
     *
     * @param $colleagueId
     * @param int $companyId
     * @return mixed
     */
    public function activateColleague($colleagueId, $companyId = 1)
    {
        $response = $this->soapClient->activateColleague(
            $this->usuario,
            $this->senha,
            $companyId,
            $colleagueId
        );

        return $response;
    }

    /**
     * Altera um usuário.
     *
     * @param $colleagues
     * @param int $companyId
     * @return mixed
     */
    public function updateColleague($colleagues, $companyId = 1)
    {
        $response = $this->soapClient->updateColleague(
            $this->usuario,
            $this->senha,
            $companyId,
            $colleagues
        );

        return $response;
    }

    /**
     * Esse método altera um usuário com grupos e papéis, permite adicionar os papéis a um usuário.
     *
     * @param $grupos
     * @param $papeis
     * @param $colleagues
     * @param int $companyId
     * @return mixed
     */
    public function updateColleaguewithDependencies($grupos, $papeis, $colleagues, $companyId = 1)
    {
        $response = $this->soapClient->updateColleaguewithDependencies(
            $this->usuario,
            $this->senha,
            $companyId,
            $colleagues,
            $grupos,
            $papeis
        );

        return $response;
    }

    /**
     * Valida o acesso de um usuário no produto.
     *
     * @param $colleagueId
     * @param int $companyId
     * @return mixed
     */
    public function validateColleagueLogin($colleagueId, $companyId = 1)
    {
        $response = $this->soapClient->validateColleagueLogin(
            $companyId,
            $colleagueId,
            $this->senha
        );

        return $response;
    }

    /**
     * Retorna um usuário utilizando um e-mail.
     *
     * @param $email
     * @param int $companyId
     * @return mixed
     * @throws \Exception
     */
    public function getColleaguesMail($email, $companyId = 1)
    {
        $response = $this->soapClient->getColleaguesMail(
            $this->usuario,
            $this->senha,
            $companyId,
            $email
        );

        if (isset($response->item)) {
            return $response->item;
        } else {
            throw new \Exception("Erro ao executar Fluig WS.", 500);
        }
    }

    /**
     * Retorna um usuário.
     *
     * @param $userId
     * @param int $companyId
     * @return mixed
     * @throws \Exception
     */
    public function getColleague($userId, $companyId = 1)
    {
        $response = $this->soapClient->getColleague(
            $this->usuario,
            $this->senha,
            $companyId,
            $userId
        );

        if (isset($response->item)) {
            return $response->item;
        } else {
            throw new \Exception("Erro ao executar Fluig WS.", 500);
        }
    }

}