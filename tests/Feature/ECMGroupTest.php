<?php

namespace doug1n\Fluig\Tests\Feature;


use doug1n\Fluig\Services\ECMColleagueGroup;
use doug1n\Fluig\Services\ECMGroup;
use doug1n\Fluig\Tests\Traits\EnvironmentSetUp;
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