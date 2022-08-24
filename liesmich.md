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
 * Get a catalogue value by type.
 *
 * @param string $type The catalogue type.
 * @param string $typeId The id of the catalogue.
 * @return string Returns the result as string.
 * @throws GuzzleException
 */
public function getCatalogByType(string $type, string $typeId): string;

/**
 * Get a catalogue by type.
 *
 * @param string $type The catalogue type
 * @return array Returns the result.
 * @throws GuzzleException
 */
public function getCatalogue(string $type): array;

/**
 * Get all channels.
 *
 * @return Collection A collection with all channels.
 * @throws GuzzleException
 */
public function getChannels(): Collection;

/**
 * Get a job by id.
 *
 * @param string $channelId The channel id.
 * @param int $jobId The job id.
 * @return Job The job instance.
 * @throws GuzzleException
 */
public function getJob(string $channelId, int $jobId): Job;

/**
 * Get the job basket.
 *
 * @param string $channelId The channel id.
 * @return JobSearchResult The JobSearchResult instance.
 * @throws GuzzleException
 */
public function getJobBasket(string $channelId): JobSearchResult;

/**
 * Get all job questions of a job.
 *
 * @param int $jobId The job id.
 * @return Collection A collection with all questions of the job.
 * @throws GuzzleException
 */
public function getJobQuestions(int $jobId): Collection;

/**
 * Get all jobs of a channel.
 *
 * @param string $channelId The channel id.
 * @return Collection A collection with all jobs of the channel.
 * @throws GuzzleException
 */
public function getJobs(string $channelId): Collection;

/**
 * @return bool
 */
public function isUseAutomaticCatalogueCompletion(): bool;

/**
 * @param bool $useAutomaticCatalogueCompletion
 */
public function setUseAutomaticCatalogueCompletion(bool $useAutomaticCatalogueCompletion): void;

/**
 * Search for a job in a channel.
 *
 * @param string $channelId The channel id.
 * @param string $search OPTIONAL. The word we are searching for.
 * @param string $geoLocation OPTIONAL. The geolocation we are searching for.
 * @return JobSearchResult The JobSearchResult instance.
 * @throws GuzzleException
 */
public function searchForJob(string $channelId, string $search = '', string $geoLocation = ''): JobSearchResult;

/**
 * Create a new applicant.
 *
 * @param array $data The applicant data.
 * @return ApplicantData The ApplicantData instance.
 * @throws GuzzleException
 */
public function createApplicant(array $data): ApplicantData;

/**
 * Check if an applicant exist.
 *
 * @param array $data The applicant data.
 * @return bool Returns true if applicant exists.
 * @throws GuzzleException
 */
public function applicantExists(array $data): bool;

/**
 * Get the user access token for an applicant.
 *
 * @param ApplicantData $applicant The applicant instance.
 * @return string The user access token of the applicant.
 * @throws GuzzleException
 */
public function getUserAccessToken(ApplicantData $applicant): string;

/**
 * Check if applicant has already applied to a job.
 *
 * @param string $jobId The job id where the applicant want to apply to.
 * @param string $uat The user access token of the applicant.
 * @return bool Returns true if the applicant has already applied to this job.
 * @throws GuzzleException
 */
public function hasApplied(string $jobId, string $uat): bool;

/**
 * Start the application.
 *
 * @param string $jobId The job id where the applicant want to apply to.
 * @param string $uat The user access token of the applicant.
 * @return string Returns the application id.
 * @throws GuzzleException
 */
public function startApplication(string $jobId, string $uat): string;

/**
 * Send application information.
 *
 * @param string $applicationId The application id.
 * @param string $uat The user access token.
 * @param array $applicationData The application data. See https://dev.softgarden.de/frontend-v3/bewerbungsinformationen-speichern/
 * @return void
 * @throws GuzzleException
 */
public function sendApplicationInformation(string $applicationId, string $uat, array $applicationData): void;

/**
 * Finalize the application.
 *
 * @param string $applicationId The application id.
 * @param string $uat The user access token of the applicant.
 * @param ApplicantData $applicant The applicant instance.
 * @return void
 * @throws GuzzleException
 */
public function finalizeApplication(string $applicationId, string $uat, ApplicantData $applicant): void;
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

| Variable            | Type    | Default |
|---------------------|---------|--------:|
| applicationId       | string  |      '' |
| status              | string  |      '' |
| applicationEditable | boolean |   false |
| createdOn           | string  |      '' |
| lastChangedOn       | string  |      '' |
| submittedOn         | string  |      '' |
| jobId               | string  |      '' |
| jobName             | string  |      '' |
| firstname           | string  |      '' |
| lastname            | string  |      '' |
| sex                 | string  |      '' |
| academictitle       | string  |      '' |
| email               | string  |      '' |
| externalProfileUrl  | string  |      '' |
| locale              | string  |    'de' |
| street              | string  |      '' |
| zip                 | string  |      '' |
| city                | string  |      '' |
| country             | string  |      '' |
| nationality         | string  |      '' |
| phone               | string  |      '' |
| mobilePhone         | string  |      '' |
| dateofbirth         | string  |      '' |
| coverLetterText     | string  |      '' |
| region              | string  |      '' |

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

| Variable           | Type                           | Default |
|--------------------|--------------------------------|--------:|
| itemsPerPage       | integer                        |       0 |
| numPages           | integer                        |       0 |
| offset             | integer                        |       0 |
| actualPage         | integer                        |       0 |
| firstPostingOnPage | integer                        |       0 |
| lastPostingOnPage  | integer                        |       0 |
| totalNumberOfJobs  | integer                        |       0 |
| result             | Collection&lt;SearchResult&gt; |       0 |

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
