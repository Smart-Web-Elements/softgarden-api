<?php

namespace SWE\SoftGardenApi;

/**
 * Class ApplicationData
 *
 * @package SWE\SoftGardenApi
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class ApplicationData extends AbstractDataSet
{
    /**
     *
     */
    const STATUS_DRAFT = 'DRAFT';
    /**
     *
     */
    const STATUS_ACTIVE = 'ACTIVE';
    /**
     *
     */
    const STATUS = [
        self::STATUS_DRAFT,
        self::STATUS_ACTIVE,
    ];

    /**
     * @var string
     */
    protected string $applicationId = '';

    /**
     * @var string
     */
    protected string $status = '';

    /**
     * @var bool
     */
    protected bool $applicationEditable = false;

    /**
     * @var string
     */
    protected string $createdOn = '';

    /**
     * @var string
     */
    protected string $lastChangedOn = '';

    /**
     * @var string
     */
    protected string $submittedOn = '';

    /**
     * @var string
     */
    protected string $withdrawnOn = '';

    /**
     * @var string
     */
    protected string $jobId = '';

    /**
     * @var string
     */
    protected string $jobName = '';

    /**
     * @var string
     */
    protected string $firstname = '';

    /**
     * @var string
     */
    protected string $lastname = '';

    /**
     * @var string
     */
    protected string $sex = '';

    /**
     * @var string
     */
    protected string $academictitle = '';

    /**
     * @var string
     */
    protected string $email = '';

    /**
     * @var string
     */
    protected string $externalProfileUrl = '';

    /**
     * @var string
     */
    protected string $locale = 'de';

    /**
     * @var string
     */
    protected string $street = '';

    /**
     * @var string
     */
    protected string $zip = '';

    /**
     * @var string
     */
    protected string $city = '';

    /**
     * @var string
     */
    protected string $country = '';

    /**
     * @var string
     */
    protected string $nationality = '';

    /**
     * @var string
     */
    protected string $phone = '';

    /**
     * @var string
     */
    protected string $mobilePhone = '';

    /**
     * @var string
     */
    protected string $dateofbirth = '';

    /**
     * @var string
     */
    protected string $coverLetterText = '';

    /**
     * @var string
     */
    protected string $region = '';

    /**
     * @var string
     */
    protected string $imported = '';

    /**
     * @var bool
     */
    protected bool $applicationFeedbackConsent = false;

    /**
     * @return string
     */
    public function getApplicationId(): string
    {
        return $this->applicationId;
    }

    /**
     * @param string $applicationId
     */
    public function setApplicationId(string $applicationId): void
    {
        $this->applicationId = $applicationId;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return bool
     */
    public function isApplicationEditable(): bool
    {
        return $this->applicationEditable;
    }

    /**
     * @param bool $applicationEditable
     */
    public function setApplicationEditable(bool $applicationEditable): void
    {
        $this->applicationEditable = $applicationEditable;
    }

    /**
     * @return string
     */
    public function getCreatedOn(): string
    {
        return $this->createdOn;
    }

    /**
     * @param string $createdOn
     */
    public function setCreatedOn(string $createdOn): void
    {
        $this->createdOn = $createdOn;
    }

    /**
     * @return string
     */
    public function getLastChangedOn(): string
    {
        return $this->lastChangedOn;
    }

    /**
     * @param string $lastChangedOn
     */
    public function setLastChangedOn(string $lastChangedOn): void
    {
        $this->lastChangedOn = $lastChangedOn;
    }

    /**
     * @return string
     */
    public function getSubmittedOn(): string
    {
        return $this->submittedOn;
    }

    /**
     * @param string $submittedOn
     */
    public function setSubmittedOn(string $submittedOn): void
    {
        $this->submittedOn = $submittedOn;
    }

    /**
     * @return string
     */
    public function getWithdrawnOn(): string
    {
        return $this->withdrawnOn;
    }

    /**
     * @param string $withdrawnOn
     */
    public function setWithdrawnOn(string $withdrawnOn): void
    {
        $this->withdrawnOn = $withdrawnOn;
    }

    /**
     * @return string
     */
    public function getJobId(): string
    {
        return $this->jobId;
    }

    /**
     * @param string $jobId
     */
    public function setJobId(string $jobId): void
    {
        $this->jobId = $jobId;
    }

    /**
     * @return string
     */
    public function getJobName(): string
    {
        return $this->jobName;
    }

    /**
     * @param string $jobName
     */
    public function setJobName(string $jobName): void
    {
        $this->jobName = $jobName;
    }

    /**
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }

    /**
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     */
    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }

    /**
     * @return string
     */
    public function getSex(): string
    {
        return $this->sex;
    }

    /**
     * @param string $sex
     */
    public function setSex(string $sex): void
    {
        $this->sex = $sex;
    }

    /**
     * @return string
     */
    public function getAcademictitle(): string
    {
        return $this->academictitle;
    }

    /**
     * @param string $academictitle
     */
    public function setAcademictitle(string $academictitle): void
    {
        $this->academictitle = $academictitle;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getExternalProfileUrl(): string
    {
        return $this->externalProfileUrl;
    }

    /**
     * @param string $externalProfileUrl
     */
    public function setExternalProfileUrl(string $externalProfileUrl): void
    {
        $this->externalProfileUrl = $externalProfileUrl;
    }

    /**
     * @return string
     */
    public function getLocale(): string
    {
        return $this->locale;
    }

    /**
     * @param string $locale
     */
    public function setLocale(string $locale): void
    {
        $this->locale = $locale;
    }

    /**
     * @return string
     */
    public function getStreet(): string
    {
        return $this->street;
    }

    /**
     * @param string $street
     */
    public function setStreet(string $street): void
    {
        $this->street = $street;
    }

    /**
     * @return string
     */
    public function getZip(): string
    {
        return $this->zip;
    }

    /**
     * @param string $zip
     */
    public function setZip(string $zip): void
    {
        $this->zip = $zip;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry(string $country): void
    {
        $this->country = $country;
    }

    /**
     * @return string
     */
    public function getNationality(): string
    {
        return $this->nationality;
    }

    /**
     * @param string $nationality
     */
    public function setNationality(string $nationality): void
    {
        $this->nationality = $nationality;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getMobilePhone(): string
    {
        return $this->mobilePhone;
    }

    /**
     * @param string $mobilePhone
     */
    public function setMobilePhone(string $mobilePhone): void
    {
        $this->mobilePhone = $mobilePhone;
    }

    /**
     * @return string
     */
    public function getDateofbirth(): string
    {
        return $this->dateofbirth;
    }

    /**
     * @param string $dateofbirth
     */
    public function setDateofbirth(string $dateofbirth): void
    {
        $this->dateofbirth = $dateofbirth;
    }

    /**
     * @return string
     */
    public function getCoverLetterText(): string
    {
        return $this->coverLetterText;
    }

    /**
     * @param string $coverLetterText
     */
    public function setCoverLetterText(string $coverLetterText): void
    {
        $this->coverLetterText = $coverLetterText;
    }

    /**
     * @return string
     */
    public function getRegion(): string
    {
        return $this->region;
    }

    /**
     * @param string $region
     */
    public function setRegion(string $region): void
    {
        $this->region = $region;
    }

    /**
     * @return string
     */
    public function getImported(): string
    {
        return $this->imported;
    }

    /**
     * @param string $imported
     */
    public function setImported(string $imported): void
    {
        $this->imported = $imported;
    }

    /**
     * @return bool
     */
    public function isApplicationFeedbackConsent(): bool
    {
        return $this->applicationFeedbackConsent;
    }

    /**
     * @param bool $applicationFeedbackConsent
     */
    public function setApplicationFeedbackConsent(bool $applicationFeedbackConsent): void
    {
        $this->applicationFeedbackConsent = $applicationFeedbackConsent;
    }

    /**
     * @inheritDoc
     */
    public function getId()
    {
        return $this->getApplicationId();
    }
}