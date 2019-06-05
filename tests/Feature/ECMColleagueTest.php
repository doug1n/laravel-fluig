<?php

namespace doug1n\Fluig\Tests\Feature;


use doug1n\Fluig\Services\ECMColleague;
use doug1n\Fluig\Tests\Traits\EnvironmentSetUp;
use Orchestra\Testbench\TestCase;

class ECMColleagueTest extends TestCase
{
    use EnvironmentSetUp;

    /** @test */
    public function get_colleague_by_email_test()
    {
        $this->assertObjectHasAttribute('colleagueId', (new ECMColleague())->getColleaguesMail('douglas.gomes@exegestaoempresarial.com.br'));
    }

    /** @test */
    public function get_colleague_test()
    {
        $this->assertObjectHasAttribute('colleagueId', (new ECMColleague())->getColleague('n53x9ukisk3k78f81510138041159'));
    }


}