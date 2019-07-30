<?php

namespace doug1n\Fluig\Tests\Feature;


use doug1n\Fluig\Services\ECMDocument;
use doug1n\Fluig\Tests\Traits\EnvironmentSetUp;
use Orchestra\Testbench\TestCase;

class ECMDocumentTest extends TestCase
{
    use EnvironmentSetUp;

    /** @test */
    public function get_document_content()
    {
        $teste = (new ECMDocument())->getDocumentContent(
            527138,
            1000,
            '2.pdf',
            'n53x9ukisk3k78f81510138041159'
        );

        $this->assertTrue(is_string($teste));
    }

}