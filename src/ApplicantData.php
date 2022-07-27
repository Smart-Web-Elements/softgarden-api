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


}