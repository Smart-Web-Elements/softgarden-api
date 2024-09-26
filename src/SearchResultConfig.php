<?php

namespace SWE\SoftGardenApi;


class SearchResultConfig extends AbstractDataSet
{
    protected array $projectLocation = [];
    protected array $projectNumber = [];
    protected array $audience = [];
    protected array $projectLocationGerman = [];
    protected array $location = [];
    protected array $company = [];
    protected array $softgardenvisibility = [];
    protected array $internalPostingName = [];
    protected array $listingStartDate = [];
    protected array $jobcategory = [];
    protected array $projectCompanyNameGerman = [];

    public function getAudience(): array
    {
        return $this->audience;
    }

    public function setAudience(array $audience): void
    {
        $this->audience = $audience;
    }

    public function getCompany(): array
    {
        return $this->company;
    }

    public function setCompany(array $company): void
    {
        $this->company = $company;
    }

    public function getId()
    {
        return null;
    }

    public function getInternalPostingName(): array
    {
        return $this->internalPostingName;
    }

    public function setInternalPostingName(array $internalPostingName): void
    {
        $this->internalPostingName = $internalPostingName;
    }

    public function getJobcategory(): array
    {
        return $this->jobcategory;
    }

    public function setJobcategory(array $jobcategory): void
    {
        $this->jobcategory = $jobcategory;
    }

    public function getListingStartDate(): array
    {
        return $this->listingStartDate;
    }

    public function setListingStartDate(array $listingStartDate): void
    {
        $this->listingStartDate = $listingStartDate;
    }

    public function getLocation(): array
    {
        return $this->location;
    }

    public function setLocation(array $location): void
    {
        $this->location = $location;
    }

    public function getProjectCompanyNameGerman(): array
    {
        return $this->projectCompanyNameGerman;
    }

    public function setProjectCompanyNameGerman(array $projectCompanyNameGerman): void
    {
        $this->projectCompanyNameGerman = $projectCompanyNameGerman;
    }

    public function getProjectLocation(): array
    {
        return $this->projectLocation;
    }

    public function setProjectLocation(array $projectLocation): void
    {
        $this->projectLocation = $projectLocation;
    }

    public function getProjectLocationGerman(): array
    {
        return $this->projectLocationGerman;
    }

    public function setProjectLocationGerman(array $projectLocationGerman): void
    {
        $this->projectLocationGerman = $projectLocationGerman;
    }

    public function getProjectNumber(): array
    {
        return $this->projectNumber;
    }

    public function setProjectNumber(array $projectNumber): void
    {
        $this->projectNumber = $projectNumber;
    }

    public function getSoftgardenvisibility(): array
    {
        return $this->softgardenvisibility;
    }

    public function setSoftgardenvisibility(array $softgardenvisibility): void
    {
        $this->softgardenvisibility = $softgardenvisibility;
    }
}
