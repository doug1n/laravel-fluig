<?php

namespace doug1n\Fluig\Tests\Feature;


use doug1n\Fluig\Services\Rest\PageRest;
use doug1n\Fluig\Tests\Traits\EnvironmentSetUp;
use Orchestra\Testbench\TestCase;

class PageRestTest extends TestCase
{
    use EnvironmentSetUp;

    /** @test */
    public function get_widget_preferences_test()
    {
        (new PageRest())->getWidgetPreferences('6870');

        $this->assertTrue(true);
    }
}