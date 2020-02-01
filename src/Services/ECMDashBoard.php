<?php

namespace doug1n\Fluig\Services;

/**
 * Class ECMDashBoard
 * @package doug1n\Fluig\Services
 *
 * Webservice responsável por interagir com a central de tarefas do fluig. Pode ser utilizado para pesquisar as
 * informações que estão disponíveis na central de tarefas.
 */
class ECMDashBoard extends FluigWebService
{

    /**
     * ECMDashBoard constructor.
     */
    public function __construct()
    {
        parent::__construct("/webdesk/ECMDashBoardService?wsdl");
    }

    public function findMyDocuments()
    {
    }

    public function findMyDocumentsOnDemand()
    {
    }

    public function findDocumentsToApprove()
    {
    }

    public function findDocumentsToApproveOnDemand()
    {
    }

    public function findAgreementDocuments()
    {
    }

    public function findCheckoutDocuments()
    {
    }

    public function findCancelledTasks()
    {
    }

    public function findCompletedTasks()
    {
    }

    public function findConsensusTasks()
    {
    }

    public function findTransferredTasks()
    {
    }

    public function findWorkflowTasks()
    {
    }

    public function findWorkflowTasksOnDemand()
    {
    }

    public function findMyRequests()
    {
    }

    public function findMyRequestsOnDemand()
    {
    }

    public function findMyManagerTasks()
    {
    }

    public function findExpiredWorkflowTasks()
    {
    }

    public function fillStatusTask()
    {
    }

    public function fillChronoTasks()
    {
    }

    public function fillTypeTasks()
    {
    }

    public function fillTypeTasksOfReplacement()
    {
    }

    public function getOpenTasksByColleagueGroups()
    {
    }

    public function getOpenTasksByColleagueGroupsOnDemand()
    {
    }

    public function getOpenTasksByColleagueRoles()
    {
    }

    public function getOpenTasksByColleagueRolesOnDemand()
    {
    }

    public function getSummaryRequests()
    {
    }

    public function getUrlEcm()
    {
    }
}