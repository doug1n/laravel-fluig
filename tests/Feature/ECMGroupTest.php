<?php

namespace dougvobel\Fluig\Tests\Feature;


use dougvobel\Fluig\Services\ECMColleagueGroup;
use dougvobel\Fluig\Services\ECMGroup;
use dougvobel\Fluig\Tests\Traits\EnvironmentSetUp;
use Orchestra\Testbench\TestCase;

class ECMGroupTest extends TestCase
{
    use EnvironmentSetUp;

    /** @test */
    public function get_group_test()
    {
        $this->assertObjectHasAttribute('companyId', (new ECMGroup())->getGroup('DEFAULTGROUP-1'));
    }

    /** @test */
    public function get_groups_test()
    {
        $this->assertTrue(count((new ECMGroup())->getGroup('DEFAULTGROUP-1')) > 0);
    }

}