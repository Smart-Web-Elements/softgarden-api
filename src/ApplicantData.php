<?php

namespace SWE\SoftGardenApi;

class ApplicantData extends AbstractDataSet
{
    protected string $id = '';

    protected string $salutation = '';

    protected string $firstname = '';

    protected string $lastname = '';

    protected string $email = '';

    protected string $workEmail = '';

    protected string $username = '';

    protected string $password = '';

    protected string $locale = 'de';

    protected bool $internal = true;

    protected bool $dataPrivacyAccepted = true;

    /**
     * @inheritDoc
     */
    public function getId()
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getSalutaion()
    {
        return $this->salutaion;
    }

    public function setSalutaion(string $salutation): void
    {
        $this->salutation = $salutation;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getWorkEmail()
    {
        return $this->workEmail;
    }

    public function setWorkEmail(string $workEmail): void
    {
        $this->workEmail = $workEmail;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getLocale()
    {
        return $this->locale;
    }

    public function setLocale(string $locale): void
    {
        $this->locale = $locale;
    }

    public function getinternal()
    {
        return $this->internal;
    }

    public function setInternal(Boolean $internal): void
    {
        $this->internal = $internal;
    }

    public function getDataPrivacyAccepted()
    {
        return $this->dataPrivacyAccepted;
    }

    public function setDataPrivacyAccepted(Boolean $dataPrivacyAccepted): void
    {
        $this->dataPrivacyAccepted = $dataPrivacyAccepted;
    }
}