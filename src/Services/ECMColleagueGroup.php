<?php

namespace dougvobel\Fluig\Services;


class ECMColleagueGroup extends FluigWebService
{

    /**
     * ECMColleagueGroup constructor.
     */
    public function __construct()
    {
        parent::__construct("/webdesk/ECMColleagueGroupService?wsdl");
    }

    /**
     * Retorna se o usuário com determinado email possui o grupo vinculado.
     *
     * @param $email
     * @param $groupId
     * @param int $companyId
     * @return bool
     * @throws \Exception
     */
    public function hasGroupByEmail($email, $groupId, $companyId = 1)
    {
        $usuario = (new ECMColleague())->getColleaguesMail($email);

        return $this->hasGroup($usuario->userId, $groupId, $companyId);
    }

    /**
     * Retorna se o usuário com determinado possui o grupo vinculado.
     *
     * @param $userId
     * @param $groupId
     * @param int $companyId
     * @return bool
     * @throws \Exception
     */
    public function hasGroup($userId, $groupId, $companyId = 1)
    {
        $grupos = $this->getColleagueGroupsByColleagueId($userId, $companyId);

        if (!is_array($grupos)) {
            return $grupos->groupId === $groupId;
        }

        foreach ($grupos as $grupo) {
            if ($grupo->groupId === $groupId) return true;
        }

        return false;
    }

    /**
     * Retorna os grupos que um usuário participa.
     *
     * @param $userId
     * @param int $companyId
     * @return mixed
     * @throws \Exception
     */
    public function getColleagueGroupsByColleagueId($userId, $companyId = 1)
    {
        $response = $this->soapClient->getColleagueGroupsByColleagueId(
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

    /**
     * Retorna os usuários que participam de um grupo de usuários.
     *
     * @param $groupId
     * @param int $companyId
     * @return mixed
     * @throws \Exception
     */
    public function getColleagueGroupsByGroupId($groupId, $companyId = 1)
    {
        $response = $this->soapClient->getColleagueGroupsByGroupId(
            $this->usuario,
            $this->senha,
            $companyId,
            $groupId
        );

        if (isset($response->item)) {
            return $response->item;
        } else {
            throw new \Exception("Erro ao executar Fluig WS.", 500);
        }
    }

    /**
     * Retorna todos os grupos que possuem usuários relacionados.
     *
     * @param int $companyId
     * @return mixed
     * @throws \Exception
     */
    public function getAllColleagueGroups($companyId = 1)
    {
        $response = $this->soapClient->getAllColleagueGroups(
            $this->usuario,
            $this->senha,
            $companyId
        );

        if (isset($response->item)) {
            return $response->item;
        } else {
            throw new \Exception("Erro ao executar Fluig WS.", 500);
        }
    }
}