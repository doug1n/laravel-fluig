<?php

namespace dougvobel\Fluig\Tests\Feature;


use dougvobel\Fluig\ECMColleagueGroup;
use dougvobel\Fluig\Tests\Traits\EnvironmentSetUp;
use Orchestra\Testbench\TestCase;

class ECMColleagueGroupTest extends TestCase
{
    use EnvironmentSetUp;

    /** @test */
    public function my_first_test_case()
    {
        $x = new ECMColleagueGroup();

        $this->assertTrue($x->hasGroup('8zqha1qwusweli4k1457618082277', 'DEFAULTGROUP-1'));
    }


}