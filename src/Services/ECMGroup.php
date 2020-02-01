<?php

namespace doug1n\Fluig\Services;

/**
 * Class ECMGroup
 * @package doug1n\Fluig\Services
 *
 * Webservice responsável por realizar operações referentes a grupos no fluig. Pode ser utilizado para criar, alterar,
 * excluir e procurar grupos, entre outros recursos.
 */
class ECMGroup extends FluigWebService
{

    /**
     * ECMGroup constructor.
     */
    public function __construct()
    {
        parent::__construct("/webdesk/ECMGroupService?wsdl");
    }

    /**
     * Retorna um grupo cadastrado no fluig.
     *
     * @param $groupId
     * @param int $companyId
     * @return mixed
     * @throws \Exception
     */
    public function getGroup($groupId, $companyId = 1)
    {
        $response = $this->soapClient->getGroup(
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
     * Retorna todos os grupos cadastrados no fluig.
     *
     * @param int $companyId
     * @return mixed
     * @throws \Exception
     */
    public function getGroups($companyId = 1)
    {
        $response = $this->soapClient->getGroups(
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