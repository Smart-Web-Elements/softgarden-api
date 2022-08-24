<?php

namespace SWE\SoftGardenApi;

/**
 * Class ApplicantData
 *
 * @package SWE\SoftGardenApi
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class ApplicantData extends AbstractDataSet
{
    /**
     * @var string
     */
    protected string $id = '';

    /**
     * @var string
     */
    protected string $salutation = '';

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
    protected string $email = '';

    /**
     * @var string
     */
    protected string $workEmail = '';

    /**
     * @var string
     */
    protected string $username = '';

    /**
     * @var string
     */
    protected string $password = '';

    /**
     * @var string
     */
    protected string $locale = 'de';

    /**
     * @var bool
     */
    protected bool $internal = true;

    /**
     * @var bool
     */
    protected bool $dataPrivacyAccepted = true;

    /**
     * @inheritDoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getSalutation(): string
    {
        return $this->salutation;
    }

    /**
     * @param string $salutation
     * @return void
     */
    public function setSalutation(string $salutation): void
    {
        $this->salutation = $salutation;
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
     * @return void
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
     * @return void
     */
    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
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
     * @return void
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getWorkEmail(): string
    {
        return $this->workEmail;
    }

    /**
     * @param string $workEmail
     * @return void
     */
    public function setWorkEmail(string $workEmail): void
    {
        $this->workEmail = $workEmail;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return void
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return void
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
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
     * @return void
     */
    public function setLocale(string $locale): void
    {
        $this->locale = $locale;
    }

    /**
     * @return bool
     */
    public function isInternal(): bool
    {
        return $this->internal;
    }

    /**
     * @param bool $internal
     * @return void
     */
    public function setInternal(bool $internal): void
    {
        $this->internal = $internal;
    }

    /**
     * @return bool
     */
    public function isDataPrivacyAccepted(): bool
    {
        return $this->dataPrivacyAccepted;
    }

    /**
     * @param bool $dataPrivacyAccepted
     * @return void
     */
    public function setDataPrivacyAccepted(bool $dataPrivacyAccepted): void
    {
        $this->dataPrivacyAccepted = $dataPrivacyAccepted;
    }
}