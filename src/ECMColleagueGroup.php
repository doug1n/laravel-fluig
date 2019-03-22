<?php

namespace dougvobel\Fluig;


class ECMColleagueGroup
{
    private $soapWorkflowClient;
    private $usuario;
    private $usuarioId;
    private $senha;

    /**
     * ECMWorkflowEngine constructor.
     */
    public function __construct()
    {
        $endPoint = config('fluig.domain') . "/webdesk/ECMColleagueGroupService?wsdl";

        $this->soapWorkflowClient = (new \SoapClient($endPoint,
            ['stream_context' => stream_context_create(
                ['ssl' => ['verify_peer' => false, 'verify_peer_name' => false]]
            )]
        ));

        $this->usuario = config('fluig.user');
        $this->usuarioId = config('fluig.userId');
        $this->senha = config('fluig.password');
    }

    /**
     * @param $userId
     * @param $groupId
     * @return bool
     * @throws \Exception
     */
    public function hasGroup($userId, $groupId)
    {
        $grupos = $this->getColleagueGroupsByColleagueId($userId);

        if (!is_array($grupos)) {
            return $grupos['groupId'] === $groupId;
        }

        foreach ($grupos as $grupo) {
            if ($grupo['groupId'] === $groupId) return true;
        }

        return false;
    }

    /**
     * @param $userId
     * @return array
     * @throws \Exception
     */
    public function getColleagueGroupsByColleagueId($userId)
    {
        $response = $this->soapWorkflowClient->getColleagueGroupsByColleagueId(
            $this->usuario, //String user
            $this->senha, //String password
            1, //int companyId
            $userId
        );

        if (isset($response->item)) {
            return json_decode(json_encode($response->item), true);
        } else {
            throw new \Exception("Erro ao executar Fluig WS.", 500);
        }
    }

    /**
     * @param $groupId
     * @return mixed
     * @throws \Exception
     */
    public function getColleagueGroupsByGroupId($groupId)
    {
        $response = $this->soapWorkflowClient->getColleagueGroupsByGroupId(
            $this->usuario, //String user
            $this->senha, //String password
            1, //int companyId
            $groupId
        );

        if (isset($response->item)) {
            return json_decode(json_encode($response->item), true);
        } else {
            throw new \Exception("Erro ao executar Fluig WS.", 500);
        }
    }
}