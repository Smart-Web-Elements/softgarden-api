# SoftGarden API v1.1.0

Die SoftGarden API ist eine Schnittstelle, welche eine Verbindung zu SoftGarden erleichtert. In der
Klasse `\SWE\SoftGardenApi\Api\SoftGarden` sind einige Methoden zum Abrufen bestimmter Daten enthalten.

## Methoden

__getChannels(): Collection__

Gibt eine `Collection` mit `Channel`-Instanzen zurück.

__getJobs(string $channelId): Collection__

Gibt eine `Collection` mit `Job`-Instanzen zurück.

__getJob(string $channelId, int $jobId): Job__

Gibt eine `Job`-Instanz zurück.

__getJobQuestions(int $jobId): Collection__

Gibt eine `Collection` mit `JobQuestion`-Instanzen zurück.

## Beispiele

```php
use SWE\SoftGardenApi\Api\SoftGarden;

// TODO: Client-ID einfügen.
$clientId = '';
$softGarden = new SoftGarden();
$softGarden->setClientId($clientId);

// ODER
$softGarden = new SoftGarden($clientId);

// Alle Channels holen.
$channels = $softGarden->getChannels();

// Den ersten Channel holen.
$channel = $channels->getItem(0);

// Den Basket eines Channels holen.
$basket = $softGarden->getJobBasket($channel->getId());

// Alle Jobs von einem Channel holen.
$jobs = $softGarden->getJobs($channel->getId());

// Den ersten Job holen.
$job = $jobs->getItem(0);

// Den Job mit ID xy holen.
$myJob = $softGarden->getJob($channel->getId(), $job->getId());

// Alle Questions von einem Job holen.
$questions = $softGarden->getJobQuestions($job->getId());

// Es ist möglich, die Rückgabewerte als Array zu holen:
$channelArray = $channels->toArray();
```

## Rückgabewerte

__Channel__

| Variable   | Typ     | Standard |
|------------|---------|---------:|
| id         | string  |       '' |
| name       | string  |       '' |
| accessible | boolean |    false |

__Collection__

| Variable | Typ   | Standard |
|----------|-------|---------:|
| items    | array |       [] |

__Job__

| Variable               | Typ     | Standard |
|------------------------|---------|---------:|
| jobDbId                | integer |        0 |
| externalPostingName    | string  |       '' |
| internalPostingName    | string  |       '' |
| applyOnlineLink        | string  |       '' |
| jobCategories          | array   |       [] |
| audiences              | array   |       [] |
| employmentTypes        | array   |       [] |
| workTimes              | array   |       [] |
| industries             | array   |       [] |
| workExperiences        | array   |       [] |
| geoLat                 | string  |       '' |
| geoLong                | string  |       '' |
| geoName                | string  |       '' |
| geoCountry             | string  |       '' |
| geoState               | string  |       '' |
| geoCity                | string  |       '' |
| geoZip                 | string  |       '' |
| geoStreet              | string  |       '' |
| jobAdText              | string  |       '' |
| jobStartDate           | integer |        0 |
| postingLastUpdatedDate | integer |        0 |
| jobOwnerSalutation     | string  |       '' |
| jobOwnerTitle          | string  |       '' |
| jobOwnerFirstname      | string  |       '' |
| jobOwnerLastname       | string  |       '' |
| jobOwnerStreet         | string  |       '' |
| jobOwnerCity           | string  |       '' |
| jobOwnerZip            | string  |       '' |
| jobOwnerPhone          | string  |       '' |
| jobOwnerEmail          | string  |       '' |
| jobOwnerAvatarurl      | string  |       '' |
| jobOwnerFunction       | string  |       '' |
| jobAdUrl               | string  |       '' |
| companyName            | string  |       '' |
| companyId              | string  |       '' |
| projectNumber          | string  |       '' |
| internalReferenceId    | string  |       '' |
| locale                 | string  |       '' |
| keywords               | string  |       '' |

__JobQuestion__

| Variable      | Typ        | Standard |
|---------------|------------|---------:|
| id            | integer    |        0 |
| question      | string     |       '' |
| type          | string     |       '' |
| answerCatalog | array/null |     null |

__JobSearchResult__

| Variable           | Typ                            | Standard |
|--------------------|--------------------------------|---------:|
| itemsPerPage       | integer                        |        0 |
| numPages           | integer                        |        0 |
| offset             | integer                        |        0 |
| actualPage         | integer                        |        0 |
| firstPostingOnPage | integer                        |        0 |
| lastPostingOnPage  | integer                        |        0 |
| totalNumberOfJobs  | integer                        |        0 |
| result             | Collection&lt;SearchResult&gt; |        0 |

__SearchResult__

| Variable                | Typ                | Standard |
|-------------------------|--------------------|---------:|
| jobPostingId            | integer            |        0 |
| postingVersionId        | integer            |        0 |
| title                   | string             |       '' |
| applyOnlineLink         | string             |       '' |
| config                  | SearchResultConfig |     null |
| jobStartDate            | integer            |        0 |
| postingVersionStartDate | integer            |        0 |
| postingVersionEndDate   | integer            |        0 |

__SearchResultConfig__

| Variable                 | Typ   | Standard |
|--------------------------|-------|---------:|
| projectLocation          | array |       [] |
| projectNumber            | array |       [] |
| audience                 | array |       [] |
| projectLocationGerman    | array |       [] |
| location                 | array |       [] |
| company                  | array |       [] |
| softgardenvisibility     | array |       [] |
| internalPostingName      | array |       [] |
| listingStartDate         | array |       [] |
| jobcategory              | array |       [] |
| projectCompanyNameGerman | array |       [] |

## Verschiedenes

Diese API verwendet [Semantic Versioning](https://semver.org/lang/de/)
