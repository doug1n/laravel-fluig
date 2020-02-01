<?php

namespace doug1n\Fluig\Models;

/**
 * Class DocumentDto
 * @package doug1n\Fluig\Models
 *
 * https://tdn.totvs.com/display/public/fluig/Guia+de+propriedades+dos+objetos
 */
class DocumentDto
{
    private $documentId;
    private $version;
    private $companyId;
    private $UUID;
    private $documentTypeId;
    private $languageId;
    private $iconId;
    private $topicId;
    private $colleagueId;
    private $documentDescription;
    private $additionalComments;
    private $phisicalFile;
    private $createDate;
    private $approvedDate;
    private $lastModifiedDate;
    private $documentType;
    private $expirationDate;
    private $parentDocumentId;
    private $relatedFiles;
    private $activeVersion;
    private $versionDescription;
    private $downloadEnabled;
    private $approved;
    private $validationStartDate;
    private $publisherId;
    private $cardDescription;
    private $documentPropertyNumber;
    private $documentPropertyVersion;
    private $privateDocument;
    private $privateColleagueId;
    private $indexed;
    private $priority;
    private $userNotify;
    private $expires;
    private $volumeId;
    private $inheritSecurity;
    private $updateIsoProperties;
    private $lastModifiedTime;
    private $deleted;
    private $datasetName;
    private $keyWord;
    private $imutable;
    private $draft;
    private $internalVisualizer;
    private $phisicalFileSize;
    private $versionOption;

    public function __construct(int $documentId, int $version, string $UUID, string $documentTypeId, string $languageId,
                                int $iconId,
                                $topicId, $colleagueId, $documentDescription, $additionalComments, $phisicalFile,
                                $createDate, \DateTime $approvedDate, $lastModifiedDate, $documentType, $expirationDate,
                                $parentDocumentId, $relatedFiles, $activeVersion, $versionDescription, $downloadEnabled,
                                $approved, $validationStartDate, $publisherId, $cardDescription, $documentPropertyNumber,
                                $documentPropertyVersion, $privateDocument, $privateColleagueId, $indexed, $priority,
                                $userNotify, $expires, $volumeId, bool $inheritSecurity, $updateIsoProperties, $lastModifiedTime,
                                $deleted, $datasetName, $keyWord, $imutable, $draft, $internalVisualizer,
                                $phisicalFileSize, $versionOption, int $companyId = 1)
    {
        $this->documentId = $documentId;
        $this->version = $version;
        $this->companyId = $companyId;
        $this->UUID = $UUID;
        $this->documentTypeId = $documentTypeId;
        $this->languageId = $languageId;
        $this->iconId = $iconId;
        $this->topicId = $topicId;
        $this->colleagueId = $colleagueId;
        $this->documentDescription = $documentDescription;
        $this->additionalComments = $additionalComments;
        $this->phisicalFile = $phisicalFile;
        $this->createDate = $createDate;
        $this->approvedDate = $approvedDate;
        $this->lastModifiedDate = $lastModifiedDate;
        $this->documentType = $documentType;
        $this->expirationDate = $expirationDate;
        $this->parentDocumentId = $parentDocumentId;
        $this->relatedFiles = $relatedFiles;
        $this->activeVersion = $activeVersion;
        $this->versionDescription = $versionDescription;
        $this->downloadEnabled = $downloadEnabled;
        $this->approved = $approved;
        $this->validationStartDate = $validationStartDate;
        $this->publisherId = $publisherId;
        $this->cardDescription = $cardDescription;
        $this->documentPropertyNumber = $documentPropertyNumber;
        $this->documentPropertyVersion = $documentPropertyVersion;
        $this->privateDocument = $privateDocument;
        $this->privateColleagueId = $privateColleagueId;
        $this->indexed = $indexed;
        $this->priority = $priority;
        $this->userNotify = $userNotify;
        $this->expires = $expires;
        $this->volumeId = $volumeId;
        $this->inheritSecurity = $inheritSecurity;
        $this->updateIsoProperties = $updateIsoProperties;
        $this->lastModifiedTime = $lastModifiedTime;
        $this->deleted = $deleted;
        $this->datasetName = $datasetName;
        $this->keyWord = $keyWord;
        $this->imutable = $imutable;
        $this->draft = $draft;
        $this->internalVisualizer = $internalVisualizer;
        $this->phisicalFileSize = $phisicalFileSize;
        $this->versionOption = $versionOption;
    }


}