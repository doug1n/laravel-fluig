<?php

namespace doug1n\Fluig\Tests\Feature;


use doug1n\Fluig\Services\ECMColleagueGroup;
use doug1n\Fluig\Tests\Traits\EnvironmentSetUp;
use Orchestra\Testbench\TestCase;

class ECMColleagueGroupTest extends TestCase
{
    use EnvironmentSetUp;

    /** @test */
    public function has_group_test()
    {
        $this->assertTrue((new ECMColleagueGroup())->hasGroup('8zqha1qwusweli4k1457618082277', 'DEFAULTGROUP-1'));
    }

    /** @test */
    public function get_colleague_groups_by_groupId_test()
    {
        $this->assertTrue(count((new ECMColleagueGroup())->getColleagueGroupsByGroupId('DEFAULTGROUP-1')) > 0);
    }

    public function get_all_colleague_groups_test()
    {
        $this->assertTrue(count((new ECMColleagueGroup())->getAllColleagueGroups()) > 0);
    }
}