<?php

namespace dougvobel\Fluig\Services;


class ECMWorkflowEngine extends FluigWebService
{

    /**
     * ECMWorkflowEngine constructor.
     */
    public function __construct()
    {
        parent::__construct("/webdesk/ECMWorkflowEngineService?wsdl");
    }

    /**
     * @param $tipoProcesso
     * @param $cardData
     * @param array $anexos
     * @param null $comments
     * @param null $usuarioId
     * @param null $choosedState
     * @param array $colleagueIds
     * @param bool $completeTask
     * @param array $appointment
     * @param bool $managerMode
     * @param int $companyId
     * @return mixed
     * @throws \Exception
     */
    public function startProcess($tipoProcesso, $cardData, $anexos = [], $comments = null, $usuarioId = null, $choosedState = null,
                                 $colleagueIds = [], $completeTask = true, $appointment = [], $managerMode = true, $companyId = 1)
    {
        $response = $this->soapClient->startProcess(
            $this->usuario, //String user
            $this->senha, //String password
            $companyId, //int companyId
            $tipoProcesso,
            $choosedState, // int choosedState
            $colleagueIds, // String[] colleagueIds
            $comments, // String comments
            $usuarioId ?: $this->usuarioId, // String userId
            $completeTask, // boolean completeTask
            $anexos, // ProcessAttachmentDto[] attachments
            $cardData, // String[][] cardData
            $appointment, // ProcessTaskAppointmentDto[] appointment
            $managerMode // boolean managerMode
        );

        if (isset($response->item->item[0]) && $response->item->item[0] == 'ERROR') {
            throw new \Exception($response->item->item[1], 400);
        } else if (isset($response->item[4]->item[0]) && $response->item[4]->item[0] == 'iProcess') {
            return $response->item;
        } else {
            throw new \Exception("Erro ao executar Fluig WS.", 500);
        }
    }

    /**
     * @param $ticketId
     * @param $etapa
     * @param $comentario
     * @param array $anexos
     * @param array $cardData
     * @param null $usuarioId
     * @param null $colleagueIds
     * @param bool $completeTask
     * @param array $appointment
     * @param bool $managerMode
     * @param int $threadSequence
     * @param int $companyId
     * @return mixed
     * @throws \Exception
     */
    public function saveAndSendTask($ticketId, $etapa, $comentario, array $anexos = [], array $cardData = [], $usuarioId = null,
                                    $colleagueIds = null, $completeTask = true, $appointment = [], $managerMode = true, $threadSequence = 0, $companyId = 1)
    {
        $response = $this->soapClient->saveAndSendTask(
            $this->usuario, //String user
            $this->senha, //String password
            $companyId, //int companyId
            $ticketId, // int processInstanceId
            $etapa, // int choosedState
            $colleagueIds, // String[] colleagueIds
            $comentario, // String comments
            $usuarioId ?: $this->usuarioId, // String userId
            $completeTask, // boolean completeTask
            $anexos, // ProcessAttachmentDto[] attachments
            $cardData, // String[][] cardData
            $appointment, // ProcessTaskAppointmentDto[] appointment
            $managerMode, // boolean managerMode
            $threadSequence // int threadSequence
        );

        if (isset($response->item->item[0]) && $response->item->item[0] == 'ERROR: ') {
            throw new \Exception($response->item->item[1], 400);
        } else
            if (isset($response->item[0]->item)) {
                return $response->item;
            } else {
                throw new \Exception("Erro ao executar Fluig WS.", 500);
            }
    }

    /**
     * @param $ticketId
     * @param $comentario
     * @param int $companyId
     * @return boolean
     * @throws \Exception
     */
    public
    function setTasksComments($ticketId, $comentario, $companyId = 1)
    {
        $response = $this->soapClient->setTasksComments(
            $this->usuario, //String user
            $this->senha, //String password
            $companyId, //int companyId
            $ticketId, // int processInstanceId
            $this->usuarioId, // String userId
            0, // int threadSequence
            $comentario // String comments
        );

        if ($response != 'OK') {
            throw new \Exception($response, 400);
        } else if ($response == 'OK') {
            return true;
        } else {
            throw new \Exception("Erro ao executar Fluig WS.", 500);
        }
    }
}