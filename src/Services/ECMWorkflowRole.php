<?php

namespace doug1n\Fluig\Services;

/**
 * Class ECMWorkflowRole
 * @package doug1n\Fluig\Services
 *
 * Webservice responsável por realizar operações referentes a papéis no fluig. Pode ser utilizado para criar, alterar,
 * excluir e procurar papéis, entre outros recursos.
 */
class ECMWorkflowRole extends FluigWebService
{

    /**
     * ECMWorkflowRole constructor.
     */
    public function __construct()
    {
        parent::__construct("/webdesk/ECMWorkflowRoleService?wsdl");
    }

    public function createWorkflowRole()
    {
    }

    public function deleteWorkflowRole()
    {
    }

    public function getWorkflowRole()
    {
    }

    public function getWorkflowRoles()
    {
    }

    public function updateWorkflowRole()
    {
    }
}