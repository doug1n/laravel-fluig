<?php

namespace doug1n\Fluig\Services\Rest;


use Illuminate\Database\Eloquent\ModelNotFoundException;

class PageRest extends FluigRestService
{

    /**
     * PageRest constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Retrieve a map with preferences of a widget instance
     *
     * @param $instanceId
     * @return mixed
     */
    public function getWidgetPreferences($instanceId)
    {
        $response = $this->client->get('/api/public/2.0/pages/getWidgetPreferences/' . $instanceId);
        $content = json_decode($response->getBody(), true)['content'];

        if (!$content) {
            throw new ModelNotFoundException('InstanceId inválido.');
        }

        return $content;
    }
}