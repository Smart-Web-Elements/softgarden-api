<?php

namespace SWE\SoftGardenApi;

class ApplicationData extends AbstractDataSet
{
    protected string $applicationId = '';

    protected string $status = '';

    protected bool $applicationEditable = false;

    protected string $createdOn = '';

    protected string $lastChangedOn = '';

    protected string $submittedOn = '';

    protected string $jobId = '';

    protected string $jobName = '';

    protected string $firstName = '';

    protected string $lastName = '';
    
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

    /**
     * @inheritDoc
     */
    public function getApplicationId()
    {
        return $this->applicationId;
    }

    public function setApplicationId(string $applicationId): void
    {
        $this->applicationId = $applicationId;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function getApplicationEditable()
    {
        return $this->applicationEditable;
    }

    public function setApplicationEditable(Boolean $applicationEditable): void
    {
        $this->applicationEditable = $applicationEditable;
    }

    public function getCreatedOn()
    {
        return $this->createdOn;
    }

    public function setCreatedOn(string $createdOn): void
    {
        $this->createdOn = $createdOn;
    }

    public function getLastChangedOn()
    {
        return $this->lastChangedOn;
    }

    public function setLastChangedOn(string $lastChangedOn): void
    {
        $this->lastChangedOn = $lastChangedOn;
    }

    public function getSubmittedOn()
    {
        return $this->submittedOn;
    }

    public function setSubmittedOn(string $submittedOn): void
    {
        $this->submittedOn = $submittedOn;
    }

    public function getJobId()
    {
        return $this->jobId;
    }

    public function setJobId(string $jobId): void
    {
        $this->jobId = $jobId;
    }

    public function getJobName()
    {
        return $this->jobName;
    }

    public function setJobName(string $jobName): void
    {
        $this->jobName = $jobName;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function getSex()
    {
        return $this->sex;
    }

    public function setSex(string $sex): void
    {
        $this->sex = $sex;
    }

    public function getAcademictitle()
    {
        return $this->academictitle;
    }

    public function setAcademictitle(string $academictitle): void
    {
        $this->academictitle = $academictitle;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getExternalProfileUrl()
    {
        return $this->externalProfileUrl;
    }

    public function setExternalProfileUrl(string $externalProfileUrl): void
    {
        $this->externalProfileUrl = $externalProfileUrl;
    }

    public function getLocale()
    {
        return $this->locale;
    }

    public function setLocale(string $locale): void
    {
        $this->locale = $locale;
    }

    public function getStreet()
    {
        return $this->street;
    }

    public function setStreet(string $street): void
    {
        $this->street = $street;
    }

    public function getZip()
    {
        return $this->zip;
    }

    public function setZip(string $zip): void
    {
        $this->zip = $zip;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function setCountry(string $country): void
    {
        $this->country = $country;
    }

    public function getNationality()
    {
        return $this->nationality;
    }

    public function setNationality(string $nationality): void
    {
        $this->nationality = $nationality;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    public function getMobilePhone()
    {
        return $this->mobilePhone;
    }

    public function setMobilePhone(string $mobilePhone): void
    {
        $this->mobilePhone = $mobilePhone;
    }

    public function getDateofbirth()
    {
        return $this->dateofbirth;
    }

    public function setDateofbirth(string $dateofbirth): void
    {
        $this->dateofbirth = $dateofbirth;
    }

    public function getCoverLetterText()
    {
        return $this->coverLetterText;
    }

    public function setCoverLetterText(string $coverLetterText): void
    {
        $this->coverLetterText = $coverLetterText;
    }

    public function getRegion()
    {
        return $this->region;
    }

    public function setRegion(string $region): void
    {
        $this->region = $region;
    }
}