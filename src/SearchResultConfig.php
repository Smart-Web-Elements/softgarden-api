<?php

namespace SWE\SoftGardenApi;


/**
 * Class SearchResultConfig
 *
 * @package SWE\SoftGardenApi
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class SearchResultConfig extends AbstractDataSet
{
    /**
     * @var array
     */
    protected array $projectLocation = [];
    /**
     * @var array
     */
    protected array $projectNumber = [];
    /**
     * @var array
     */
    protected array $audience = [];
    /**
     * @var array
     */
    protected array $projectLocationGerman = [];
    /**
     * @var array
     */
    protected array $location = [];
    /**
     * @var array
     */
    protected array $company = [];
    /**
     * @var array
     */
    protected array $softgardenvisibility = [];
    /**
     * @var array
     */
    protected array $internalPostingName = [];
    /**
     * @var array
     */
    protected array $listingStartDate = [];
    /**
     * @var array
     */
    protected array $jobcategory = [];
    /**
     * @var array
     */
    protected array $projectCompanyNameGerman = [];

    /**
     * @return array
     */
    public function getAudience(): array
    {
        return $this->audience;
    }

    /**
     * @param array $audience
     */
    public function setAudience(array $audience): void
    {
        $this->audience = $audience;
    }

    /**
     * @return array
     */
    public function getCompany(): array
    {
        return $this->company;
    }

    /**
     * @param array $company
     */
    public function setCompany(array $company): void
    {
        $this->company = $company;
    }

    /**
     * @inheritDoc
     */
    public function getId()
    {
        return null;
    }

    /**
     * @return array
     */
    public function getInternalPostingName(): array
    {
        return $this->internalPostingName;
    }

    /**
     * @param array $internalPostingName
     */
    public function setInternalPostingName(array $internalPostingName): void
    {
        $this->internalPostingName = $internalPostingName;
    }

    /**
     * @return array
     */
    public function getJobcategory(): array
    {
        return $this->jobcategory;
    }

    /**
     * @param array $jobcategory
     */
    public function setJobcategory(array $jobcategory): void
    {
        $this->jobcategory = $jobcategory;
    }

    /**
     * @return array
     */
    public function getListingStartDate(): array
    {
        return $this->listingStartDate;
    }

    /**
     * @param array $listingStartDate
     */
    public function setListingStartDate(array $listingStartDate): void
    {
        $this->listingStartDate = $listingStartDate;
    }

    /**
     * @return array
     */
    public function getLocation(): array
    {
        return $this->location;
    }

    /**
     * @param array $location
     */
    public function setLocation(array $location): void
    {
        $this->location = $location;
    }

    /**
     * @return array
     */
    public function getProjectCompanyNameGerman(): array
    {
        return $this->projectCompanyNameGerman;
    }

    /**
     * @param array $projectCompanyNameGerman
     */
    public function setProjectCompanyNameGerman(array $projectCompanyNameGerman): void
    {
        $this->projectCompanyNameGerman = $projectCompanyNameGerman;
    }

    /**
     * @return array
     */
    public function getProjectLocation(): array
    {
        return $this->projectLocation;
    }

    /**
     * @param array $projectLocation
     */
    public function setProjectLocation(array $projectLocation): void
    {
        $this->projectLocation = $projectLocation;
    }

    /**
     * @return array
     */
    public function getProjectLocationGerman(): array
    {
        return $this->projectLocationGerman;
    }

    /**
     * @param array $projectLocationGerman
     */
    public function setProjectLocationGerman(array $projectLocationGerman): void
    {
        $this->projectLocationGerman = $projectLocationGerman;
    }

    /**
     * @return array
     */
    public function getProjectNumber(): array
    {
        return $this->projectNumber;
    }

    /**
     * @param array $projectNumber
     */
    public function setProjectNumber(array $projectNumber): void
    {
        $this->projectNumber = $projectNumber;
    }

    /**
     * @return array
     */
    public function getSoftgardenvisibility(): array
    {
        return $this->softgardenvisibility;
    }

    /**
     * @param array $softgardenvisibility
     */
    public function setSoftgardenvisibility(array $softgardenvisibility): void
    {
        $this->softgardenvisibility = $softgardenvisibility;
    }
}
