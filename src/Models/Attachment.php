<?php

namespace doug1n\Fluig\Models;


class Attachment
{
    public $deleted;
    public $newAttach;
    public $description;
    public $fileName;
    public $attachmentSequence;
    public $companyId;
    public $processInstanceId;
    public $size;
    public $fileContent;
    public $attachments;

    public function __construct($fileName, $description, $fileContent, $extraParams = [], $companyId = 1)
    {
        $this->deleted = $extraParams['deleted'] ?? false;
        $this->newAttach = $extraParams['newAttach'] ?? true;
        $this->description = $description;
        $this->fileName = $fileName;
        $this->attachmentSequence = $extraParams['attachmentSequence'] ?? '';
        $this->companyId = $companyId;
        $this->processInstanceId = $extraParams['processInstanceId'] ?? null;
        $this->size = strlen($fileContent);
        $this->fileContent = $fileContent;
        $this->attachments = [
            'filecontent' => $fileContent,
            'fileSize' => strlen($fileContent),
            'attach' => $extraParams['attachments']['attach'] ?? true,
            'descriptor' => $extraParams['attachments']['descriptor'] ?? false,
            'editing' => $extraParams['attachments']['editing'] ?? false,
            'fileName' => $fileName
        ];
    }

    public function toArray()
    {
        return (array) $this;
    }
}