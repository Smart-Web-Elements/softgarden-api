<?php

namespace SWE\SoftGardenApi;


class Job extends AbstractDataSet
{
    protected static array $catalogues = [
        'audiences',
        'workTimes',
        'workExperiences',
    ];

    protected int $jobDbId = 0;
    protected string $externalPostingName = '';
    protected string $internalPostingName = '';
    protected string $applyOnlineLink = '';
    protected array $jobCategories = [];
    protected array $audiences = [];
    protected array $employmentTypes = [];
    protected array $workTimes = [];
    protected array $industries = [];
    protected array $workExperiences = [];
    protected string $geoLat = '';
    protected string $geoLong = '';
    protected string $geoName = '';
    protected string $geoCountry = '';
    protected string $geoState = '';
    protected string $geoCity = '';
    protected string $geoZip = '';
    protected string $geoStreet = '';
    protected string $jobAdText = '';
    protected int $jobStartDate = 0;
    protected int $postingLastUpdatedDate = 0;
    protected string $jobOwnerSalutation = '';
    protected string $jobOwnerTitle = '';
    protected string $jobOwnerFirstname = '';
    protected string $jobOwnerLastname = '';
    protected string $jobOwnerStreet = '';
    protected string $jobOwnerCity = '';
    protected string $jobOwnerZip = '';
    protected string $jobOwnerPhone = '';
    protected string $jobOwnerEmail = '';
    protected string $jobOwnerAvatarurl = '';
    protected string $jobOwnerFunction = '';
    protected string $jobAdUrl = '';
    protected string $companyName = '';
    protected string $companyId = '';
    protected string $projectNumber = '';
    protected string $internalReferenceId = '';
    protected string $locale = '';
    protected string $keywords = '';

    public function getApplyOnlineLink(): string
    {
        return $this->applyOnlineLink;
    }

    public function setApplyOnlineLink(string $applyOnlineLink): void
    {
        $this->applyOnlineLink = $applyOnlineLink;
    }

    public function getAudiences(): array
    {
        return $this->audiences;
    }

    public function setAudiences(array $audiences): void
    {
        $this->audiences = $audiences;
    }

    public function getCompanyId(): string
    {
        return $this->companyId;
    }

    public function setCompanyId(string $companyId): void
    {
        $this->companyId = $companyId;
    }

    public function getCompanyName(): string
    {
        return $this->companyName;
    }

    public function setCompanyName(string $companyName): void
    {
        $this->companyName = $companyName;
    }

    public function getEmploymentTypes(): array
    {
        return $this->employmentTypes;
    }

    public function setEmploymentTypes(array $employmentTypes): void
    {
        $this->employmentTypes = $employmentTypes;
    }

    public function getExternalPostingName(): string
    {
        return $this->externalPostingName;
    }

    public function setExternalPostingName(string $externalPostingName): void
    {
        $this->externalPostingName = $externalPostingName;
    }

    public function getGeoCity(): string
    {
        return $this->geoCity;
    }

    public function setGeoCity(string $geoCity): void
    {
        $this->geoCity = $geoCity;
    }

    public function getGeoCountry(): string
    {
        return $this->geoCountry;
    }

    public function setGeoCountry(string $geoCountry): void
    {
        $this->geoCountry = $geoCountry;
    }

    public function getGeoLat(): string
    {
        return $this->geoLat;
    }

    public function setGeoLat(string $geoLat): void
    {
        $this->geoLat = $geoLat;
    }

    public function getGeoLong(): string
    {
        return $this->geoLong;
    }

    public function setGeoLong(string $geoLong): void
    {
        $this->geoLong = $geoLong;
    }

    public function getGeoName(): string
    {
        return $this->geoName;
    }

    public function setGeoName(string $geoName): void
    {
        $this->geoName = $geoName;
    }

    public function getGeoState(): string
    {
        return $this->geoState;
    }

    public function setGeoState(string $geoState): void
    {
        $this->geoState = $geoState;
    }

    public function getGeoStreet(): string
    {
        return $this->geoStreet;
    }

    public function setGeoStreet(string $geoStreet): void
    {
        $this->geoStreet = $geoStreet;
    }

    public function getGeoZip(): string
    {
        return $this->geoZip;
    }

    public function setGeoZip(string $geoZip): void
    {
        $this->geoZip = $geoZip;
    }

    public function getId(): int
    {
        return $this->getJobDbId();
    }

    public function getIndustries(): array
    {
        return $this->industries;
    }

    public function setIndustries(array $industries): void
    {
        $this->industries = $industries;
    }

    public function getInternalPostingName(): string
    {
        return $this->internalPostingName;
    }

    public function setInternalPostingName(string $internalPostingName): void
    {
        $this->internalPostingName = $internalPostingName;
    }

    public function getInternalReferenceId(): string
    {
        return $this->internalReferenceId;
    }

    public function setInternalReferenceId(string $internalReferenceId): void
    {
        $this->internalReferenceId = $internalReferenceId;
    }

    public function getJobAdText(): string
    {
        return $this->jobAdText;
    }

    public function setJobAdText(string $jobAdText): void
    {
        $this->jobAdText = $jobAdText;
    }

    public function getJobAdUrl(): string
    {
        return $this->jobAdUrl;
    }

    public function setJobAdUrl(string $jobAdUrl): void
    {
        $this->jobAdUrl = $jobAdUrl;
    }

    public function getJobCategories(): array
    {
        return $this->jobCategories;
    }

    public function setJobCategories(array $jobCategories): void
    {
        $this->jobCategories = $jobCategories;
    }

    public function getJobDbId(): int
    {
        return $this->jobDbId;
    }

    public function setJobDbId(int $jobDbId): void
    {
        $this->jobDbId = $jobDbId;
    }

    public function getJobOwnerAvatarurl(): string
    {
        return $this->jobOwnerAvatarurl;
    }

    public function setJobOwnerAvatarurl(string $jobOwnerAvatarurl): void
    {
        $this->jobOwnerAvatarurl = $jobOwnerAvatarurl;
    }

    public function getJobOwnerCity(): string
    {
        return $this->jobOwnerCity;
    }

    public function setJobOwnerCity(string $jobOwnerCity): void
    {
        $this->jobOwnerCity = $jobOwnerCity;
    }

    public function getJobOwnerEmail(): string
    {
        return $this->jobOwnerEmail;
    }

    public function setJobOwnerEmail(string $jobOwnerEmail): void
    {
        $this->jobOwnerEmail = $jobOwnerEmail;
    }

    public function getJobOwnerFirstname(): string
    {
        return $this->jobOwnerFirstname;
    }

    public function setJobOwnerFirstname(string $jobOwnerFirstname): void
    {
        $this->jobOwnerFirstname = $jobOwnerFirstname;
    }

    public function getJobOwnerFunction(): string
    {
        return $this->jobOwnerFunction;
    }

    public function setJobOwnerFunction(string $jobOwnerFunction): void
    {
        $this->jobOwnerFunction = $jobOwnerFunction;
    }

    public function getJobOwnerLastname(): string
    {
        return $this->jobOwnerLastname;
    }

    public function setJobOwnerLastname(string $jobOwnerLastname): void
    {
        $this->jobOwnerLastname = $jobOwnerLastname;
    }

    public function getJobOwnerPhone(): string
    {
        return $this->jobOwnerPhone;
    }

    public function setJobOwnerPhone(string $jobOwnerPhone): void
    {
        $this->jobOwnerPhone = $jobOwnerPhone;
    }

    public function getJobOwnerSalutation(): string
    {
        return $this->jobOwnerSalutation;
    }

    public function setJobOwnerSalutation(string $jobOwnerSalutation): void
    {
        $this->jobOwnerSalutation = $jobOwnerSalutation;
    }

    public function getJobOwnerStreet(): string
    {
        return $this->jobOwnerStreet;
    }

    public function setJobOwnerStreet(string $jobOwnerStreet): void
    {
        $this->jobOwnerStreet = $jobOwnerStreet;
    }

    public function getJobOwnerTitle(): string
    {
        return $this->jobOwnerTitle;
    }

    public function setJobOwnerTitle(string $jobOwnerTitle): void
    {
        $this->jobOwnerTitle = $jobOwnerTitle;
    }

    public function getJobOwnerZip(): string
    {
        return $this->jobOwnerZip;
    }

    public function setJobOwnerZip(string $jobOwnerZip): void
    {
        $this->jobOwnerZip = $jobOwnerZip;
    }

    public function getJobStartDate(): int
    {
        return $this->jobStartDate;
    }

    public function setJobStartDate(int $jobStartDate): void
    {
        $this->jobStartDate = $jobStartDate;
    }

    public function getKeywords(): string
    {
        return $this->keywords;
    }

    public function setKeywords(string $keywords): void
    {
        $this->keywords = $keywords;
    }

    public function getLocale(): string
    {
        return $this->locale;
    }

    public function setLocale(string $locale): void
    {
        $this->locale = $locale;
    }

    public function getPostingLastUpdatedDate(): int
    {
        return $this->postingLastUpdatedDate;
    }

    public function setPostingLastUpdatedDate(int $postingLastUpdatedDate): void
    {
        $this->postingLastUpdatedDate = $postingLastUpdatedDate;
    }

    public function getProjectNumber(): string
    {
        return $this->projectNumber;
    }

    public function setProjectNumber(string $projectNumber): void
    {
        $this->projectNumber = $projectNumber;
    }

    public function getWorkExperiences(): array
    {
        return $this->workExperiences;
    }

    public function setWorkExperiences(array $workExperiences): void
    {
        $this->workExperiences = $workExperiences;
    }

    public function getWorkTimes(): array
    {
        return $this->workTimes;
    }

    public function setWorkTimes(array $workTimes): void
    {
        $this->workTimes = $workTimes;
    }
}
