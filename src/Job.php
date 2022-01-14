<?php

namespace SWE\SoftGardenApi;


/**
 * Class Job
 *
 * @package SWE\SoftGardenApi
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Job extends AbstractDataSet
{
    /**
     * @inheritDoc
     */
    protected static array $catalogues = [
        'audiences',
        'workTimes',
        'workExperiences',
    ];

    /**
     * @var int
     */
    protected int $jobDbId = 0;
    /**
     * @var string
     */
    protected string $externalPostingName = '';
    /**
     * @var string
     */
    protected string $internalPostingName = '';
    /**
     * @var string
     */
    protected string $applyOnlineLink = '';
    /**
     * @var string[]
     */
    protected array $jobCategories = [];
    /**
     * @var string[]
     */
    protected array $audiences = [];
    /**
     * @var string[]
     */
    protected array $employmentTypes = [];
    /**
     * @var string[]
     */
    protected array $workTimes = [];
    /**
     * @var string[]
     */
    protected array $industries = [];
    /**
     * @var string[]
     */
    protected array $workExperiences = [];
    /**
     * @var string
     */
    protected string $geoLat = '';
    /**
     * @var string
     */
    protected string $geoLong = '';
    /**
     * @var string
     */
    protected string $geoName = '';
    /**
     * @var string
     */
    protected string $geoCountry = '';
    /**
     * @var string
     */
    protected string $geoState = '';
    /**
     * @var string
     */
    protected string $geoCity = '';
    /**
     * @var string
     */
    protected string $geoZip = '';
    /**
     * @var string
     */
    protected string $geoStreet = '';
    /**
     * @var string
     */
    protected string $jobAdText = '';
    /**
     * @var int
     */
    protected int $jobStartDate = 0;
    /**
     * @var int
     */
    protected int $postingLastUpdatedDate = 0;
    /**
     * @var string
     */
    protected string $jobOwnerSalutation = '';
    /**
     * @var string
     */
    protected string $jobOwnerTitle = '';
    /**
     * @var string
     */
    protected string $jobOwnerFirstname = '';
    /**
     * @var string
     */
    protected string $jobOwnerLastname = '';
    /**
     * @var string
     */
    protected string $jobOwnerStreet = '';
    /**
     * @var string
     */
    protected string $jobOwnerCity = '';
    /**
     * @var string
     */
    protected string $jobOwnerZip = '';
    /**
     * @var string
     */
    protected string $jobOwnerPhone = '';
    /**
     * @var string
     */
    protected string $jobOwnerEmail = '';
    /**
     * @var string
     */
    protected string $jobOwnerAvatarurl = '';
    /**
     * @var string
     */
    protected string $jobOwnerFunction = '';
    /**
     * @var string
     */
    protected string $jobAdUrl = '';
    /**
     * @var string
     */
    protected string $companyName = '';
    /**
     * @var string
     */
    protected string $companyId = '';
    /**
     * @var string
     */
    protected string $projectNumber = '';
    /**
     * @var string
     */
    protected string $internalReferenceId = '';
    /**
     * @var string
     */
    protected string $locale = '';
    /**
     * @var string
     */
    protected string $keywords = '';

    /**
     * @return string
     */
    public function getApplyOnlineLink(): string
    {
        return $this->applyOnlineLink;
    }

    /**
     * @param string $applyOnlineLink
     */
    public function setApplyOnlineLink(string $applyOnlineLink): void
    {
        $this->applyOnlineLink = $applyOnlineLink;
    }

    /**
     * @return string[]
     */
    public function getAudiences(): array
    {
        return $this->audiences;
    }

    /**
     * @param string[] $audiences
     */
    public function setAudiences(array $audiences): void
    {
        $this->audiences = $audiences;
    }

    /**
     * @return string
     */
    public function getCompanyId(): string
    {
        return $this->companyId;
    }

    /**
     * @param string $companyId
     */
    public function setCompanyId(string $companyId): void
    {
        $this->companyId = $companyId;
    }

    /**
     * @return string
     */
    public function getCompanyName(): string
    {
        return $this->companyName;
    }

    /**
     * @param string $companyName
     */
    public function setCompanyName(string $companyName): void
    {
        $this->companyName = $companyName;
    }

    /**
     * @return string[]
     */
    public function getEmploymentTypes(): array
    {
        return $this->employmentTypes;
    }

    /**
     * @param string[] $employmentTypes
     */
    public function setEmploymentTypes(array $employmentTypes): void
    {
        $this->employmentTypes = $employmentTypes;
    }

    /**
     * @return string
     */
    public function getExternalPostingName(): string
    {
        return $this->externalPostingName;
    }

    /**
     * @param string $externalPostingName
     */
    public function setExternalPostingName(string $externalPostingName): void
    {
        $this->externalPostingName = $externalPostingName;
    }

    /**
     * @return string
     */
    public function getGeoCity(): string
    {
        return $this->geoCity;
    }

    /**
     * @param string $geoCity
     */
    public function setGeoCity(string $geoCity): void
    {
        $this->geoCity = $geoCity;
    }

    /**
     * @return string
     */
    public function getGeoCountry(): string
    {
        return $this->geoCountry;
    }

    /**
     * @param string $geoCountry
     */
    public function setGeoCountry(string $geoCountry): void
    {
        $this->geoCountry = $geoCountry;
    }

    /**
     * @return string
     */
    public function getGeoLat(): string
    {
        return $this->geoLat;
    }

    /**
     * @param string $geoLat
     */
    public function setGeoLat(string $geoLat): void
    {
        $this->geoLat = $geoLat;
    }

    /**
     * @return string
     */
    public function getGeoLong(): string
    {
        return $this->geoLong;
    }

    /**
     * @param string $geoLong
     */
    public function setGeoLong(string $geoLong): void
    {
        $this->geoLong = $geoLong;
    }

    /**
     * @return string
     */
    public function getGeoName(): string
    {
        return $this->geoName;
    }

    /**
     * @param string $geoName
     */
    public function setGeoName(string $geoName): void
    {
        $this->geoName = $geoName;
    }

    /**
     * @return string
     */
    public function getGeoState(): string
    {
        return $this->geoState;
    }

    /**
     * @param string $geoState
     */
    public function setGeoState(string $geoState): void
    {
        $this->geoState = $geoState;
    }

    /**
     * @return string
     */
    public function getGeoStreet(): string
    {
        return $this->geoStreet;
    }

    /**
     * @param string $geoStreet
     */
    public function setGeoStreet(string $geoStreet): void
    {
        $this->geoStreet = $geoStreet;
    }

    /**
     * @return string
     */
    public function getGeoZip(): string
    {
        return $this->geoZip;
    }

    /**
     * @param string $geoZip
     */
    public function setGeoZip(string $geoZip): void
    {
        $this->geoZip = $geoZip;
    }

    /**
     * @inheritDoc
     */
    public function getId(): int
    {
        return $this->getJobDbId();
    }

    /**
     * @return string[]
     */
    public function getIndustries(): array
    {
        return $this->industries;
    }

    /**
     * @param string[] $industries
     */
    public function setIndustries(array $industries): void
    {
        $this->industries = $industries;
    }

    /**
     * @return string
     */
    public function getInternalPostingName(): string
    {
        return $this->internalPostingName;
    }

    /**
     * @param string $internalPostingName
     */
    public function setInternalPostingName(string $internalPostingName): void
    {
        $this->internalPostingName = $internalPostingName;
    }

    /**
     * @return string
     */
    public function getInternalReferenceId(): string
    {
        return $this->internalReferenceId;
    }

    /**
     * @param string $internalReferenceId
     */
    public function setInternalReferenceId(string $internalReferenceId): void
    {
        $this->internalReferenceId = $internalReferenceId;
    }

    /**
     * @return string
     */
    public function getJobAdText(): string
    {
        return $this->jobAdText;
    }

    /**
     * @param string $jobAdText
     */
    public function setJobAdText(string $jobAdText): void
    {
        $this->jobAdText = $jobAdText;
    }

    /**
     * @return string
     */
    public function getJobAdUrl(): string
    {
        return $this->jobAdUrl;
    }

    /**
     * @param string $jobAdUrl
     */
    public function setJobAdUrl(string $jobAdUrl): void
    {
        $this->jobAdUrl = $jobAdUrl;
    }

    /**
     * @return string[]
     */
    public function getJobCategories(): array
    {
        return $this->jobCategories;
    }

    /**
     * @param string[] $jobCategories
     */
    public function setJobCategories(array $jobCategories): void
    {
        $this->jobCategories = $jobCategories;
    }

    /**
     * @return int
     */
    public function getJobDbId(): int
    {
        return $this->jobDbId;
    }

    /**
     * @param int $jobDbId
     */
    public function setJobDbId(int $jobDbId): void
    {
        $this->jobDbId = $jobDbId;
    }

    /**
     * @return string
     */
    public function getJobOwnerAvatarurl(): string
    {
        return $this->jobOwnerAvatarurl;
    }

    /**
     * @param string $jobOwnerAvatarurl
     */
    public function setJobOwnerAvatarurl(string $jobOwnerAvatarurl): void
    {
        $this->jobOwnerAvatarurl = $jobOwnerAvatarurl;
    }

    /**
     * @return string
     */
    public function getJobOwnerCity(): string
    {
        return $this->jobOwnerCity;
    }

    /**
     * @param string $jobOwnerCity
     */
    public function setJobOwnerCity(string $jobOwnerCity): void
    {
        $this->jobOwnerCity = $jobOwnerCity;
    }

    /**
     * @return string
     */
    public function getJobOwnerEmail(): string
    {
        return $this->jobOwnerEmail;
    }

    /**
     * @param string $jobOwnerEmail
     */
    public function setJobOwnerEmail(string $jobOwnerEmail): void
    {
        $this->jobOwnerEmail = $jobOwnerEmail;
    }

    /**
     * @return string
     */
    public function getJobOwnerFirstname(): string
    {
        return $this->jobOwnerFirstname;
    }

    /**
     * @param string $jobOwnerFirstname
     */
    public function setJobOwnerFirstname(string $jobOwnerFirstname): void
    {
        $this->jobOwnerFirstname = $jobOwnerFirstname;
    }

    /**
     * @return string
     */
    public function getJobOwnerFunction(): string
    {
        return $this->jobOwnerFunction;
    }

    /**
     * @param string $jobOwnerFunction
     */
    public function setJobOwnerFunction(string $jobOwnerFunction): void
    {
        $this->jobOwnerFunction = $jobOwnerFunction;
    }

    /**
     * @return string
     */
    public function getJobOwnerLastname(): string
    {
        return $this->jobOwnerLastname;
    }

    /**
     * @param string $jobOwnerLastname
     */
    public function setJobOwnerLastname(string $jobOwnerLastname): void
    {
        $this->jobOwnerLastname = $jobOwnerLastname;
    }

    /**
     * @return string
     */
    public function getJobOwnerPhone(): string
    {
        return $this->jobOwnerPhone;
    }

    /**
     * @param string $jobOwnerPhone
     */
    public function setJobOwnerPhone(string $jobOwnerPhone): void
    {
        $this->jobOwnerPhone = $jobOwnerPhone;
    }

    /**
     * @return string
     */
    public function getJobOwnerSalutation(): string
    {
        return $this->jobOwnerSalutation;
    }

    /**
     * @param string $jobOwnerSalutation
     */
    public function setJobOwnerSalutation(string $jobOwnerSalutation): void
    {
        $this->jobOwnerSalutation = $jobOwnerSalutation;
    }

    /**
     * @return string
     */
    public function getJobOwnerStreet(): string
    {
        return $this->jobOwnerStreet;
    }

    /**
     * @param string $jobOwnerStreet
     */
    public function setJobOwnerStreet(string $jobOwnerStreet): void
    {
        $this->jobOwnerStreet = $jobOwnerStreet;
    }

    /**
     * @return string
     */
    public function getJobOwnerTitle(): string
    {
        return $this->jobOwnerTitle;
    }

    /**
     * @param string $jobOwnerTitle
     */
    public function setJobOwnerTitle(string $jobOwnerTitle): void
    {
        $this->jobOwnerTitle = $jobOwnerTitle;
    }

    /**
     * @return string
     */
    public function getJobOwnerZip(): string
    {
        return $this->jobOwnerZip;
    }

    /**
     * @param string $jobOwnerZip
     */
    public function setJobOwnerZip(string $jobOwnerZip): void
    {
        $this->jobOwnerZip = $jobOwnerZip;
    }

    /**
     * @return int
     */
    public function getJobStartDate(): int
    {
        return $this->jobStartDate;
    }

    /**
     * @param int $jobStartDate
     */
    public function setJobStartDate(int $jobStartDate): void
    {
        $this->jobStartDate = $jobStartDate;
    }

    /**
     * @return string
     */
    public function getKeywords(): string
    {
        return $this->keywords;
    }

    /**
     * @param string $keywords
     */
    public function setKeywords(string $keywords): void
    {
        $this->keywords = $keywords;
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
     * @return int
     */
    public function getPostingLastUpdatedDate(): int
    {
        return $this->postingLastUpdatedDate;
    }

    /**
     * @param int $postingLastUpdatedDate
     */
    public function setPostingLastUpdatedDate(int $postingLastUpdatedDate): void
    {
        $this->postingLastUpdatedDate = $postingLastUpdatedDate;
    }

    /**
     * @return string
     */
    public function getProjectNumber(): string
    {
        return $this->projectNumber;
    }

    /**
     * @param string $projectNumber
     */
    public function setProjectNumber(string $projectNumber): void
    {
        $this->projectNumber = $projectNumber;
    }

    /**
     * @return string[]
     */
    public function getWorkExperiences(): array
    {
        return $this->workExperiences;
    }

    /**
     * @param string[] $workExperiences
     */
    public function setWorkExperiences(array $workExperiences): void
    {
        $this->workExperiences = $workExperiences;
    }

    /**
     * @return string[]
     */
    public function getWorkTimes(): array
    {
        return $this->workTimes;
    }

    /**
     * @param string[] $workTimes
     */
    public function setWorkTimes(array $workTimes): void
    {
        $this->workTimes = $workTimes;
    }
}
