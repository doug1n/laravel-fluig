<?php

namespace doug1n\Fluig\Services;

/**
 * Class ECMWorkflowEngine
 * @package doug1n\Fluig\Services
 *
 * Webservice responsável por realizar operações referentes a workflow no fluig. Pode ser utilizado para movimentar
 * solicitações, entre outros recursos.
 */
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
            $comments, // String commentsattach
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

    /**
     * Retorna o valor dos campos do registro de formulário de uma solicitação.
     *
     * @param $processInstanceId
     * @param null $userId
     * @param int $companyId
     * @return mixed
     * @throws \Exception
     */
    public function getInstanceCardData($processInstanceId, $userId = null, $companyId = 1)
    {
        $response = $this->soapClient->getInstanceCardData(
            $this->usuario, //String user
            $this->senha, //String password
            $companyId, //int companyId
            $userId ?: $this->usuarioId,
            $processInstanceId // int processInstanceId
        );

        if (isset($response->item)) {
            return array_map(function ($item) {
                return $item->item;
            }, $response->item);
        } else {
            throw new \Exception("Erro ao executar Fluig WS.", 500);
        }
    }

    /**
     * Retorna os anexos de uma solicitação.
     *
     * @param $processInstanceId
     * @param null $userId
     * @param int $companyId
     * @return mixed
     * @throws \Exception
     */
    public function getAttachments($processInstanceId, $userId = null, $companyId = 1)
    {
        $response = $this->soapClient->getAttachments(
            $this->usuario, //String user
            $this->senha, //String password
            $companyId, //int companyId
            $userId ?: $this->usuarioId,
            $processInstanceId // int processInstanceId
        );

        if (isset($response->item)) {
            return $response->item;
        } else {
            throw new \Exception("Erro ao executar Fluig WS.", 500);
        }
    }

    public function updateWorkflowAttachment($processInstanceId, $attachments, $documents = [], $userId = null, $companyId = 1)
    {
        $response = $this->soapClient->updateWorkflowAttachment(
            $this->usuario, //String user
            $this->senha, //String password
            $companyId, //int companyId
            $processInstanceId,
            $userId ?: $this->usuarioId,
            $documents,
            $attachments
        );

        if (isset($response->item) && $response->item == "Documento editado com sucesso") {
            return $response->item;
        } else {
            throw new \Exception("Erro ao executar Fluig WS.", 500);
        }
    }

    public function calculateDeadLineHours()
    {
    }

    public function calculateDeadLineTime()
    {
    }

    public function cancelInstance()
    {
    }

    public function cancelInstanceByReplacement()
    {
    }

    public function createWorkFlowProcessVersion()
    {
    }

    public function exportProcess()
    {
    }

    public function exportProcessInZipFormat()
    {
    }

    public function getActualThread()
    {
    }

    public function getAllActiveStates()
    {
    }

    public function getAllProcessAvailableToExport()
    {
    }

    public function getAllProcessAvailableToImport()
    {
    }

    public function getAvailableProcess()
    {
    }

    public function getAvailableProcessOnDemand()
    {
    }

    public function getAvailableStates()
    {
    }

    public function getAvailableStatesDetail()
    {
    }

    public function getAvailableUsers()
    {
    }

    public function getAvailableUsersOnDemand()
    {
    }

    public function getAvailableUsersStart()
    {
    }

    public function getAvailableUsersStartOnDemand()
    {
    }

    public function getCardValue()
    {
    }

    public function getHistories()
    {
    }

    public function getProcessFormId()
    {
    }

    public function getWorkFlowProcessVersion()
    {
    }

    public function importProcess()
    {
    }

    public function importProcessWithCard()
    {
    }

    public function releaseProcess()
    {
    }

    public function saveAndSendTaskByReplacement()
    {
    }

    public function saveAndSendTaskClassic()
    {
    }

    public function searchProcess()
    {
    }

    public function setAutomaticDecisionClassic()
    {
    }

    public function setDueDate()
    {
    }

    public function simpleStartProcess()
    {
    }

    public function startProcessClassic()
    {
    }

    public function takeProcessTask()
    {
    }

    public function takeProcessTaskByReplacement()
    {
    }
}