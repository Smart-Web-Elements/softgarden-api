# SoftGarden API

This is an API to simplify your connection to SoftGarden. The class `\SWE\SoftGardenApi\Api\SoftGarden` contains some
methods to get some specific data.

## Methods

__getChannels(): Collection__

Returns a `Collection` with `Channel`-instances.

__getJobs(string $channelId): Collection__

Returns a `Collection` with `Job`-instances.

__getJob(string $channelId, int $jobId): Job__

Returns a `Job`-instance.

__getJobQuestions(int $jobId): Collection__

Returns a `Collection` with `JobQuestion`-instances.

## Examples

```php
use SWE\SoftGardenApi\Api\SoftGarden;

// TODO: Paste in your client id.
$clientId = '';
$softGarden = new SoftGarden();
$softGarden->setClientId($clientId);

// OR
$softGarden = new SoftGarden($clientId);

// Get all channels.
$channels = $softGarden->getChannels();

// Get the first channel.
$channel = $channels->getItem(0);

// Get the basket of a channel.
$basket = $softGarden->getJobBasket($channel->getId());

// Get all jobs of a channel.
$jobs = $softGarden->getJobs($channel->getId());

// Get iterate through jobs of a channel.
$jobs = $softGarden->getJobs($channel->getId());

// Get the first job.
$job = $jobs->getItem(0);

// Get the job with the id xy
$myJob = $softGarden->getJob($channel->getId(), $job->getId());

// Get all questions of a job.
$questions = $softGarden->getJobQuestions($job->getId());

// It is possible to get the result as array instead of objects:
$channelArray = $channels->toArray();
```

## Return values

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

## Misc

This API uses [Semantic Versioning](https://semver.org/)
