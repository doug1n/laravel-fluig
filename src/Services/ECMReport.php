<?php

namespace doug1n\Fluig\Services;

/**
 * Class ECMReport
 * @package doug1n\Fluig\Services
 *
 * Webservice responsável por realizar operações referentes a relatórios no fluig. Pode ser utilizado para criar,
 * alterar, excluir e procurar relatórios, entre outros recursos.
 */
class ECMReport extends FluigWebService
{

    /**
     * ECMReport constructor.
     */
    public function __construct()
    {
        parent::__construct("/webdesk/ECMReportService?wsdl");
    }

    public function createSimpleReport()
    {
    }

    public function getActiveReport()
    {
    }

    public function getAttachmentsList()
    {
    }

    public function getReportContent()
    {
    }

    public function getRepots()
    {
    }

    public function updateSimpleReport()
    {
    }
}