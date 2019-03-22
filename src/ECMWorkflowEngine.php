<?php

namespace dougvobel\Fluig;


class ECMWorkflowEngine
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
        $endPoint = config('fluig.domain') . "/webdesk/ECMWorkflowEngineService?wsdl";

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
     * @param $tipoProcesso
     * @param $cardData
     * @param array $anexos
     * @return array
     * @throws \Exception
     */
    public function startProcess($tipoProcesso, $cardData, $anexos = [])
    {
        $response = $this->soapWorkflowClient->startProcess(
            $this->usuario, //String user
            $this->senha, //String password
            1, //int companyId
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
            return json_decode(json_encode($response->item), true);
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
     * @return array
     * @throws \Exception
     */
    public function saveAndSendTask($ticketId, $etapa, $comentario, array $anexos = [], array $cardData = [])
    {
        $response = $this->soapWorkflowClient->saveAndSendTask(
            $this->usuario, //String user
            $this->senha, //String password
            1, //int companyId
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
            return json_decode(json_encode($response->item), true);
        } else {
            throw new \Exception("Erro ao executar Fluig WS.", 500);
        }
    }

    /**
     * @param $ticketId
     * @param $comentario
     * @return boolean
     * @throws \Exception
     */
    public function setTasksComments($ticketId, $comentario)
    {
        $response = $this->soapWorkflowClient->setTasksComments(
            $this->usuario, //String user
            $this->senha, //String password
            1, //int companyId
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