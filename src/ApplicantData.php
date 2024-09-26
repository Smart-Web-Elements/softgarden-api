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

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
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
        return $this->id;
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

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getSalutation(): string
    {
        return $this->salutation;
    }

    public function setSalutation(string $salutation): void
    {
        $this->salutation = $salutation;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function getWorkEmail(): string
    {
        return $this->workEmail;
    }

    public function setWorkEmail(string $workEmail): void
    {
        $this->workEmail = $workEmail;
    }

    public function isDataPrivacyAccepted(): bool
    {
        return $this->dataPrivacyAccepted;
    }

    public function setDataPrivacyAccepted(bool $dataPrivacyAccepted): void
    {
        $this->dataPrivacyAccepted = $dataPrivacyAccepted;
    }

    public function isInternal(): bool
    {
        return $this->internal;
    }

    public function setInternal(bool $internal): void
    {
        $this->internal = $internal;
    }
}