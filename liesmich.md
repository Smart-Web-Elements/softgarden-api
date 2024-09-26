# SoftGarden API

[![Packagist Downloads](https://img.shields.io/packagist/dt/swe/softgarden-api)](https://packagist.org/packages/swe/softgarden-api)
[![Packagist Version](https://img.shields.io/packagist/v/swe/softgarden-api)](https://packagist.org/packages/swe/softgarden-api)
[![License](https://img.shields.io/packagist/l/swe/softgarden-api)](https://packagist.org/packages/swe/softgarden-api)
[![PHP Version](https://img.shields.io/packagist/php-v/swe/softgarden-api)](https://packagist.org/packages/swe/softgarden-api)

Die SoftGarden API ist eine Schnittstelle, welche eine Verbindung zu SoftGarden erleichtert. In der
Klasse `\SWE\SoftGardenApi\Api\SoftGarden` sind einige Methoden zum Abrufen und Erstellen bestimmter Daten enthalten.

## Methoden

```php
/**
 * @throws GuzzleException
 */
public function getCatalogByType(string $type, string $typeId): string;

/**
 * @throws GuzzleException
 */
public function getCatalogue(string $type): array;

/**
 * @throws GuzzleException
 */
public function getChannels(): ChannelCollection;

/**
 * @throws GuzzleException
 */
public function getJob(string $channelId, int $jobId): Job;

/**
 * @throws GuzzleException
 */
public function getJobBasket(string $channelId): JobSearchResult;

/**
 * @throws GuzzleException
 */
public function getJobQuestions(int $jobId): JobQuestionCollection;

/**
 * @throws GuzzleException
 */
public function getJobs(string $channelId): JobCollection;

/**
 * @return bool
 */
public function isUseAutomaticCatalogueCompletion(): bool;

/**
 * @param bool $useAutomaticCatalogueCompletion
 */
public function setUseAutomaticCatalogueCompletion(bool $useAutomaticCatalogueCompletion): void;

/**
 * @throws GuzzleException
 */
public function searchForJob(string $channelId, string $search = '', string $geoLocation = ''): JobSearchResult;

/**
 * @throws GuzzleException
 */
public function createApplicant(array $data): ApplicantData;

/**
 * @throws GuzzleException
 */
public function applicantExists(array $data): bool;

/**
 * @throws GuzzleException
 */
public function getUserAccessToken(ApplicantData $applicant): string;

/**
 * @throws GuzzleException
 */
public function hasApplied(string $jobId, string $uat): bool;

/**
 * @throws GuzzleException
 */
public function getAllApplications(string $uat, array $queryParameters = []): ApplicationDataCollection;

/**
 * @throws GuzzleException
 */
public function getApplication(string $applicationId, string $uat): ApplicationData;

/**
 * @throws GuzzleException
 */
public function startApplication(string $jobId, string $uat): string;

/**
 * @throws GuzzleException
 */
public function sendApplicationInformation(string $applicationId, string $uat, array $applicationData): void;

/**
 * @throws GuzzleException
 */
public function finalizeApplication(string $applicationId, string $uat, array $applicationData = []): void;

/**
 * @throws GuzzleException
 */
public function deleteApplication(string $applicationId, string $uat): void;

/**
 * @throws GuzzleException
 */
public function withdrawApplication(string $applicationId, string $uat): void;
```

## Rückgabewerte

__ApplicantData__

| Variable            | Type    | Default |
|---------------------|---------|--------:|
| id                  | string  |      '' |
| salutation          | string  |      '' |
| firstname           | string  |      '' |
| lastname            | string  |      '' |
| email               | string  |      '' |
| workEmail           | string  |      '' |
| username            | string  |      '' |
| password            | string  |      '' |
| locale              | string  |    'de' |
| internal            | boolean |    true |
| dataPrivacyAccepted | boolean |    true |

__ApplicationData__

| Variable                   | Type    | Default |
|----------------------------|---------|--------:|
| applicationId              | string  |      '' |
| status                     | string  |      '' |
| applicationEditable        | boolean |   false |
| createdOn                  | string  |      '' |
| lastChangedOn              | string  |      '' |
| submittedOn                | string  |      '' |
| withdrawnOn                | string  |      '' |
| jobId                      | string  |      '' |
| jobName                    | string  |      '' |
| firstname                  | string  |      '' |
| lastname                   | string  |      '' |
| sex                        | string  |      '' |
| academictitle              | string  |      '' |
| email                      | string  |      '' |
| externalProfileUrl         | string  |      '' |
| locale                     | string  |    'de' |
| street                     | string  |      '' |
| zip                        | string  |      '' |
| city                       | string  |      '' |
| country                    | string  |      '' |
| nationality                | string  |      '' |
| phone                      | string  |      '' |
| mobilePhone                | string  |      '' |
| dateofbirth                | string  |      '' |
| coverLetterText            | string  |      '' |
| region                     | string  |      '' |
| imported                   | string  |      '' |
| applicationFeedbackConsent | boolean |   false |

__Channel__

| Variable   | Type    | Default |
|------------|---------|--------:|
| id         | string  |      '' |
| name       | string  |      '' |
| accessible | boolean |   false |

__Collection__

| Variable | Type  | Default |
|----------|-------|--------:|
| items    | array |      [] |

__Job__

| Variable               | Type    | Default |
|------------------------|---------|--------:|
| jobDbId                | integer |       0 |
| externalPostingName    | string  |      '' |
| internalPostingName    | string  |      '' |
| applyOnlineLink        | string  |      '' |
| jobCategories          | array   |      [] |
| audiences              | array   |      [] |
| employmentTypes        | array   |      [] |
| workTimes              | array   |      [] |
| industries             | array   |      [] |
| workExperiences        | array   |      [] |
| geoLat                 | string  |      '' |
| geoLong                | string  |      '' |
| geoName                | string  |      '' |
| geoCountry             | string  |      '' |
| geoState               | string  |      '' |
| geoCity                | string  |      '' |
| geoZip                 | string  |      '' |
| geoStreet              | string  |      '' |
| jobAdText              | string  |      '' |
| jobStartDate           | integer |       0 |
| postingLastUpdatedDate | integer |       0 |
| jobOwnerSalutation     | string  |      '' |
| jobOwnerTitle          | string  |      '' |
| jobOwnerFirstname      | string  |      '' |
| jobOwnerLastname       | string  |      '' |
| jobOwnerStreet         | string  |      '' |
| jobOwnerCity           | string  |      '' |
| jobOwnerZip            | string  |      '' |
| jobOwnerPhone          | string  |      '' |
| jobOwnerEmail          | string  |      '' |
| jobOwnerAvatarurl      | string  |      '' |
| jobOwnerFunction       | string  |      '' |
| jobAdUrl               | string  |      '' |
| companyName            | string  |      '' |
| companyId              | string  |      '' |
| projectNumber          | string  |      '' |
| internalReferenceId    | string  |      '' |
| locale                 | string  |      '' |
| keywords               | string  |      '' |

__JobQuestion__

| Variable      | Type       | Default |
|---------------|------------|--------:|
| id            | integer    |       0 |
| question      | string     |      '' |
| type          | string     |      '' |
| answerCatalog | array/null |    null |

__JobSearchResult__

| Variable           | Type                   | Default |
|--------------------|------------------------|--------:|
| itemsPerPage       | integer                |       0 |
| numPages           | integer                |       0 |
| offset             | integer                |       0 |
| actualPage         | integer                |       0 |
| firstPostingOnPage | integer                |       0 |
| lastPostingOnPage  | integer                |       0 |
| totalNumberOfJobs  | integer                |       0 |
| result             | SearchResultCollection |       0 |

__SearchResult__

| Variable                | Type               | Default |
|-------------------------|--------------------|--------:|
| jobPostingId            | integer            |       0 |
| postingVersionId        | integer            |       0 |
| title                   | string             |      '' |
| applyOnlineLink         | string             |      '' |
| config                  | SearchResultConfig |    null |
| jobStartDate            | integer            |       0 |
| postingVersionStartDate | integer            |       0 |
| postingVersionEndDate   | integer            |       0 |

__SearchResultConfig__

| Variable                 | Type  | Default |
|--------------------------|-------|--------:|
| projectLocation          | array |      [] |
| projectNumber            | array |      [] |
| audience                 | array |      [] |
| projectLocationGerman    | array |      [] |
| location                 | array |      [] |
| company                  | array |      [] |
| softgardenvisibility     | array |      [] |
| internalPostingName      | array |      [] |
| listingStartDate         | array |      [] |
| jobcategory              | array |      [] |
| projectCompanyNameGerman | array |      [] |

## Verschiedenes

Diese API verwendet [Semantic Versioning](https://semver.org/lang/de/)
