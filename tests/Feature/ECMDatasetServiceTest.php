<?php

namespace doug1n\Fluig\Tests\Feature;


use doug1n\Fluig\Services\ECMDataset;
use doug1n\Fluig\Tests\Traits\EnvironmentSetUp;
use Orchestra\Testbench\TestCase;

class ECMDatasetServiceTest extends TestCase
{
    use EnvironmentSetUp;

    /** @test */
    public function get_dataset()
    {
        $c1 = [
            'contraintType' => 'MUST',
            'fieldName' => 'documentType',
            'initialValue' => '4',
            'finalValue' => '4',
            'likeSearch' => 'false'
        ];

        $c2 = [
            'contraintType' => 'MUST',
            'fieldName' => 'activeVersion',
            'initialValue' => 'true',
            'finalValue' => 'true',
            'likeSearch' => 'false'
        ];

        $constraintsDto = ['item' => [$c1, $c2]];

        //dd((new ECMDatasetService())->getDataset('document', null, $constraintsDto));

        $this->assertObjectHasAttribute('columns', (new ECMDataset())->getDataset('document', null, $constraintsDto));
    }
}