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
     * @param int $companyId
     * @return mixed
     * @throws \Exception
     */
    public function startProcess($tipoProcesso, $cardData, $anexos = [], $companyId = 1)
    {
        $response = $this->soapClient->startProcess(
            $this->usuario, //String user
            $this->senha, //String password
            $companyId, //int companyId
            $tipoProcesso,
            null, // int choosedState
            null, // String[] colleagueIds
            null, // String comments
            $this->usuarioId, // String userId
            true, // boolean completeTask
            $anexos, // ProcessAttachmentDto[] attachments
            $cardData, // String[][] cardData
            [], // ProcessTaskAppointmentDto[] appointment
            true // boolean managerMode
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
     * @param int $companyId
     * @return mixed
     * @throws \Exception
     */
    public function saveAndSendTask($ticketId, $etapa, $comentario, array $anexos = [], array $cardData = [], $companyId = 1)
    {
        $response = $this->soapClient->saveAndSendTask(
            $this->usuario, //String user
            $this->senha, //String password
            $companyId, //int companyId
            $ticketId, // int processInstanceId
            $etapa, // int choosedState
            null, // String[] colleagueIds
            $comentario, // String comments
            $this->usuarioId, // String userId
            true, // boolean completeTask
            $anexos, // ProcessAttachmentDto[] attachments
            $cardData, // String[][] cardData
            [], // ProcessTaskAppointmentDto[] appointment
            true, // boolean managerMode
            0 // int threadSequence
        );

        if (isset($response->item->item[0]) && $response->item->item[0] == 'ERROR: ') {
            throw new \Exception($response->item->item[1], 400);
        } else if (isset($response->item[0]->item)) {
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
    public function setTasksComments($ticketId, $comentario, $companyId = 1)
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