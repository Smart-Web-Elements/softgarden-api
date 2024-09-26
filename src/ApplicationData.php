<?php

namespace SWE\SoftGardenApi;

class ApplicationData extends AbstractDataSet
{
    const STATUS_DRAFT = 'DRAFT';
    const STATUS_ACTIVE = 'ACTIVE';
    const STATUS = [
        self::STATUS_DRAFT,
        self::STATUS_ACTIVE,
    ];

    protected string $applicationId = '';

    protected string $status = '';

    protected bool $applicationEditable = false;

    protected string $createdOn = '';

    protected string $lastChangedOn = '';

    protected string $submittedOn = '';

    protected string $withdrawnOn = '';

    protected string $jobId = '';

    protected string $jobName = '';

    protected string $firstname = '';

    protected string $lastname = '';

    protected string $sex = '';

    protected string $academictitle = '';

    protected string $email = '';

    protected string $externalProfileUrl = '';

    protected string $locale = 'de';

    protected string $street = '';

    protected string $zip = '';

    protected string $city = '';

    protected string $country = '';

    protected string $nationality = '';

    protected string $phone = '';

    protected string $mobilePhone = '';

    protected string $dateofbirth = '';

    protected string $coverLetterText = '';

    protected string $region = '';

    protected string $imported = '';

    protected bool $applicationFeedbackConsent = false;

    public function getAcademictitle(): string
    {
        return $this->academictitle;
    }

    public function setAcademictitle(string $academictitle): void
    {
        $this->academictitle = $academictitle;
    }

    public function getApplicationId(): string
    {
        return $this->applicationId;
    }

    public function setApplicationId(string $applicationId): void
    {
        $this->applicationId = $applicationId;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function setCountry(string $country): void
    {
        $this->country = $country;
    }

    public function getCoverLetterText(): string
    {
        return $this->coverLetterText;
    }

    public function setCoverLetterText(string $coverLetterText): void
    {
        $this->coverLetterText = $coverLetterText;
    }

    public function getCreatedOn(): string
    {
        return $this->createdOn;
    }

    public function setCreatedOn(string $createdOn): void
    {
        $this->createdOn = $createdOn;
    }

    public function getDateofbirth(): string
    {
        return $this->dateofbirth;
    }

    public function setDateofbirth(string $dateofbirth): void
    {
        $this->dateofbirth = $dateofbirth;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getExternalProfileUrl(): string
    {
        return $this->externalProfileUrl;
    }

    public function setExternalProfileUrl(string $externalProfileUrl): void
    {
        $this->externalProfileUrl = $externalProfileUrl;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }

    public function getId(): string
    {
        return $this->getApplicationId();
    }

    public function getImported(): string
    {
        return $this->imported;
    }

    public function setImported(string $imported): void
    {
        $this->imported = $imported;
    }

    public function getJobId(): string
    {
        return $this->jobId;
    }

    public function setJobId(string $jobId): void
    {
        $this->jobId = $jobId;
    }

    public function getJobName(): string
    {
        return $this->jobName;
    }

    public function setJobName(string $jobName): void
    {
        $this->jobName = $jobName;
    }

    public function getLastChangedOn(): string
    {
        return $this->lastChangedOn;
    }

    public function setLastChangedOn(string $lastChangedOn): void
    {
        $this->lastChangedOn = $lastChangedOn;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }

    public function getLocale(): string
    {
        return $this->locale;
    }

    public function setLocale(string $locale): void
    {
        $this->locale = $locale;
    }

    public function getMobilePhone(): string
    {
        return $this->mobilePhone;
    }

    public function setMobilePhone(string $mobilePhone): void
    {
        $this->mobilePhone = $mobilePhone;
    }

    public function getNationality(): string
    {
        return $this->nationality;
    }

    public function setNationality(string $nationality): void
    {
        $this->nationality = $nationality;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    public function getRegion(): string
    {
        return $this->region;
    }

    public function setRegion(string $region): void
    {
        $this->region = $region;
    }

    public function getSex(): string
    {
        return $this->sex;
    }

    public function setSex(string $sex): void
    {
        $this->sex = $sex;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function getStreet(): string
    {
        return $this->street;
    }

    public function setStreet(string $street): void
    {
        $this->street = $street;
    }

    public function getSubmittedOn(): string
    {
        return $this->submittedOn;
    }

    public function setSubmittedOn(string $submittedOn): void
    {
        $this->submittedOn = $submittedOn;
    }

    public function getWithdrawnOn(): string
    {
        return $this->withdrawnOn;
    }

    public function setWithdrawnOn(string $withdrawnOn): void
    {
        $this->withdrawnOn = $withdrawnOn;
    }

    public function getZip(): string
    {
        return $this->zip;
    }

    public function setZip(string $zip): void
    {
        $this->zip = $zip;
    }

    public function isApplicationEditable(): bool
    {
        return $this->applicationEditable;
    }

    public function setApplicationEditable(bool $applicationEditable): void
    {
        $this->applicationEditable = $applicationEditable;
    }

    public function isApplicationFeedbackConsent(): bool
    {
        return $this->applicationFeedbackConsent;
    }

    public function setApplicationFeedbackConsent(bool $applicationFeedbackConsent): void
    {
        $this->applicationFeedbackConsent = $applicationFeedbackConsent;
    }
}