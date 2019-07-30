<?php

namespace doug1n\Fluig\Tests\Feature;


use doug1n\Fluig\Models\Attachment;
use doug1n\Fluig\Services\ECMWorkflowEngine;
use doug1n\Fluig\Tests\Traits\EnvironmentSetUp;
use Orchestra\Testbench\TestCase;

class ECMWorkflowEngineTest extends TestCase
{
    use EnvironmentSetUp;

    /** @test */
    public function create_attachment_test()
    {
        $base64 = explode(";base64,", "iVBORw0KGgoAAAANSUhEUgAAB4AAAAPcCAYAAACgoaZZAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAACTHSURBVHhe7chBDcAwAMSw8ifdFUAI3ORI/uS8LgAAAAAAAAC/kBMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgD05AQAAAAAAANiTEwAAAAAAAIA9OQEAAAAAAADYkxMAAAAAAACAPTkBAAAAAAAA2JMTAAAAAAAAgCnnftbUvosYrWFzAAAAAElFTkSuQmCC");
        $arquivo = base64_decode($base64[1] ?? $base64[0]);

        $attachment = (new Attachment("PIS.png", "PIS.png", $arquivo))->toArray();

        $this->assertTrue($attachment['fileName'] == 'PIS.png');
    }

    /** @test */
    public function get_instance_card_data()
    {
        $teste = (new ECMWorkflowEngine())->getInstanceCardData('67657');

        $this->assertTrue(is_array($teste));
    }

    /** @test */
    public function get_attachments()
    {
        $teste = (new ECMWorkflowEngine())->getAttachments('67657');

        $this->assertTrue($teste[0]->processInstanceId == 67657);
    }

}