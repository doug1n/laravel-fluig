<?php

namespace dougvobel\Fluig\Tests\Feature;


use dougvobel\Fluig\Services\Rest\PageRest;
use dougvobel\Fluig\Tests\Traits\EnvironmentSetUp;
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