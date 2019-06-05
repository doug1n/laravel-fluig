<?php

namespace doug1n\Fluig\Services;


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
            $this->usuario, //String user
            $this->senha, //String password
            $companyId, //int companyId
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
            $this->usuario, //String user
            $this->senha, //String password
            $companyId, //int companyId
            $userId
        );

        if (isset($response->item)) {
            return $response->item;
        } else {
            throw new \Exception("Erro ao executar Fluig WS.", 500);
        }
    }

}