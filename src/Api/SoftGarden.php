<?php

namespace SWE\SoftGardenApi\Api;


use GuzzleHttp\Exception\GuzzleException;
use SWE\SoftGardenApi\ApplicantData;
use SWE\SoftGardenApi\ApplicationData;
use SWE\SoftGardenApi\Channel;
use SWE\SoftGardenApi\Collection\ApplicationDataCollection;
use SWE\SoftGardenApi\Collection\ChannelCollection;
use SWE\SoftGardenApi\Collection\Collection;
use SWE\SoftGardenApi\Collection\JobCollection;
use SWE\SoftGardenApi\Collection\JobQuestionCollection;
use SWE\SoftGardenApi\Job;
use SWE\SoftGardenApi\JobQuestion;
use SWE\SoftGardenApi\JobSearchResult;

class SoftGarden extends SoftGardenBasic
{
    const JOB_CATEGORIES = 'JOB_CATEGORY';
    const AUDIENCES = 'AUDIENCE';
    const EMPLOYMENT_TYPES = 'EMPLOYMENT_TYPE';
    const WORK_TIMES = 'WORKING_HOURS';
    const INDUSTRIES = 'POSITION_INDUSTRY';
    const WORK_EXPERIENCES = 'WORK_EXPERIENCE';

    protected bool $useAutomaticCatalogueCompletion = true;

    /**
     * @throws GuzzleException
     */
    public function applicantExists(array $data): bool
    {
        $applicant = new ApplicantData($data);

        $this->uri = 'frontend/checkUsernameForExistence';
        $this->version = 2;
        $fields = [
            'username' => $applicant->getUsername(),
        ];

        if (DEBUG) {
            var_dump(__METHOD__);
            var_dump('Check for username');
            var_dump('Username: ' . $fields['username']);
        }

        $response = $this->sendResponse(self::METHOD_GET, $fields);

        if ($response[0] === true) {
            return true;
        }

        $this->uri = 'frontend/checkMailForExistence';
        $fields = [
            'email' => $applicant->getEmail(),
        ];

        if (DEBUG) {
            var_dump(__METHOD__);
            var_dump('Check for email');
            var_dump('Email: ' . $fields['email']);
        }

        $response = $this->sendResponse(self::METHOD_GET, $fields);

        return $response[0] === true;
    }

    /**
     * @throws GuzzleException
     */
    public function createApplicant(array $data): ApplicantData
    {
        $applicant = new ApplicantData($data);

        $this->uri = 'frontend/applicants';
        $this->version = 3;

        if (DEBUG) {
            var_dump(__METHOD__);
            var_dump('Applicant Array: ' . var_export($data, true));
            var_dump('Applicant Object: ' . var_export($applicant, true));
        }

        $this->sendResponse(self::METHOD_POST, $data);

        return $applicant;
    }

    /**
     * @throws GuzzleException
     */
    public function deleteApplication(string $applicationId, string $uat): void
    {
        $this->uri = sprintf('frontend/applications/%s', $applicationId);
        $this->version = 3;

        if (DEBUG) {
            var_dump(__METHOD__);
            var_dump('Application ID: ' . $applicationId);
            var_dump('User Access Token empty: ' . (empty($uat ? 'true' : 'false')));
        }

        $this->sendResponse(self::METHOD_DELETE, [], $uat);
    }

    /**
     * @throws GuzzleException
     */
    public function finalizeApplication(string $applicationId, string $uat, array $applicationData = []): void
    {
        $this->uri = sprintf('frontend/applications/%s/submit', $applicationId);
        $this->version = 3;

        if (DEBUG) {
            var_dump(__METHOD__);
            var_dump('Application ID: ' . $applicationId);
            foreach ($applicationData as $key => $value) {
                var_dump($key . ': ' . $value);
            }
            var_dump('User Access Token empty: ' . (empty($uat ? 'true' : 'false')));
        }

        $this->sendResponse(self::METHOD_POST, $applicationData, $uat);
    }

    /**
     * @throws GuzzleException
     */
    public function getAllApplications(string $uat, array $queryParameters = []): ApplicationDataCollection
    {
        $this->uri = 'frontend/applications';
        $this->version = 3;

        if (DEBUG) {
            var_dump(__METHOD__);
            foreach ($queryParameters as $key => $value) {
                var_dump($key . ': ' . $value);
            }
            var_dump('User Access Token empty: ' . (empty($uat ? 'true' : 'false')));
        }

        return new ApplicationDataCollection(
            $this->sendResponse(self::METHOD_GET, $queryParameters, $uat),
            ApplicationData::class,
            $this->useAutomaticCatalogueCompletion,
        );
    }

    /**
     * @throws GuzzleException
     */
    public function getApplication(string $applicationId, string $uat): ApplicationData
    {
        $this->uri = sprintf('frontend/applications/%s', $applicationId);
        $this->version = 3;

        if (DEBUG) {
            var_dump(__METHOD__);
            var_dump('Application ID: ' . $applicationId);
            var_dump('User Access Token empty: ' . (empty($uat ? 'true' : 'false')));
        }

        return new ApplicationData(
            $this->sendResponse(self::METHOD_GET, [], $uat),
            '',
            $this->useAutomaticCatalogueCompletion,
        );
    }

    /**
     * @throws GuzzleException
     */
    public function getCatalogByType(string $type, string $typeId): string
    {
        if (DEBUG) {
            var_dump(__METHOD__);
            var_dump('Catalogue Type: ' . $type);
            var_dump('Catalogue Key: ' . $typeId);
        }

        $result = $this->getCatalogue($type);

        return $result[$typeId] ?? '';
    }

    /**
     * @throws GuzzleException
     */
    public function getCatalogue(string $type): array
    {
        if (DEBUG) {
            var_dump(__METHOD__);
            var_dump('Catalogue Type: ' . $type);
        }

        $this->uri = sprintf('frontend/catalogs/%s', $type);
        $this->version = 3;

        $queryArguments = [
            'locale' => 'DE',
        ];

        return $this->sendResponse(self::METHOD_GET, $queryArguments);
    }

    /**
     * @throws GuzzleException
     */
    public function getChannels(): ChannelCollection
    {
        if (DEBUG) {
            var_dump(__METHOD__);
        }

        $this->uri = 'frontend/jobslist/channels';
        $this->version = 3;

        return new ChannelCollection($this->sendResponse(), Channel::class, $this->useAutomaticCatalogueCompletion);
    }

    /**
     * @throws GuzzleException
     */
    public function getJob(string $channelId, int $jobId): Job
    {
        if (DEBUG) {
            var_dump(__METHOD__);
            var_dump('Channel ID: ' . $channelId);
            var_dump('Job ID: ' . $jobId);
        }

        $this->uri = sprintf('frontend/jobslist/%s/job/%d', $channelId, $jobId);
        $this->version = 3;

        return new Job($this->sendResponse(), '', $this->useAutomaticCatalogueCompletion);
    }

    /**
     * @throws GuzzleException
     */
    public function getJobBasket(string $channelId): JobSearchResult
    {
        if (DEBUG) {
            var_dump(__METHOD__);
            var_dump('Channel ID: ' . $channelId);
        }

        $this->uri = 'frontend/jobs/basket';
        $this->version = 2;

        $queryArguments = [
            'channel' => $channelId,
        ];

        return new JobSearchResult(
            $this->sendResponse(self::METHOD_GET, $queryArguments), '', $this->useAutomaticCatalogueCompletion,
        );
    }

    /**
     * @throws GuzzleException
     */
    public function getJobQuestions(int $jobId): JobQuestionCollection
    {
        if (DEBUG) {
            var_dump(__METHOD__);
            var_dump('Job ID: ' . $jobId);
        }

        $this->uri = sprintf('frontend/jobs/%d/questions', $jobId);
        $this->version = 3;

        return new JobQuestionCollection($this->sendResponse(), JobQuestion::class, $this->useAutomaticCatalogueCompletion);
    }

    /**
     * @throws GuzzleException
     */
    public function getJobs(string $channelId): JobCollection
    {
        if (DEBUG) {
            var_dump(__METHOD__);
            var_dump('Channel ID: ' . $channelId);
        }

        $this->uri = sprintf('frontend/jobslist/%s', $channelId);
        $this->version = 3;
        $response = $this->sendResponse();

        return new JobCollection($response['results'], Job::class, $this->useAutomaticCatalogueCompletion);
    }

    /**
     * @throws GuzzleException
     */
    public function getUserAccessToken(ApplicantData $applicant): string
    {
        $this->uri = 'oauth/frontend/token';
        $this->version = 0;
        $data = [
            'grant_type' => 'password',
            'username' => $applicant->getUsername(),
            'password' => $applicant->getPassword(),
        ];

        if (DEBUG) {
            var_dump(__METHOD__);
            var_dump('Grant Type: ' . $data['grant_type']);
            var_dump('Username: ' . $data['username']);
            var_dump('Password empty: ' . (empty($data['password'] ? 'true' : 'false')));
        }

        $response = $this->sendResponse(self::METHOD_POST, $data, '', false);

        return $response['access_token'];
    }

    /**
     * @throws GuzzleException
     */
    public function hasApplied(string $jobId, string $uat): bool
    {
        $this->uri = sprintf('frontend/jobs/%s/applied', $jobId);
        $this->version = 3;

        if (DEBUG) {
            var_dump(__METHOD__);
            var_dump('Job ID: ' . $jobId);
            var_dump('User Access Token empty: ' . (empty($uat ? 'true' : 'false')));
        }

        $response = $this->sendResponse(self::METHOD_GET, [], $uat);

        return $response[0];
    }

    public function isUseAutomaticCatalogueCompletion(): bool
    {
        return $this->useAutomaticCatalogueCompletion;
    }

    public function setUseAutomaticCatalogueCompletion(bool $useAutomaticCatalogueCompletion): void
    {
        $this->useAutomaticCatalogueCompletion = $useAutomaticCatalogueCompletion;
    }

    /**
     * @throws GuzzleException
     */
    public function searchForJob(string $channelId, string $search = '', string $geoLocation = ''): JobSearchResult
    {
        $this->uri = sprintf('frontend/jobboards/%s/jobs', $channelId);
        $this->version = 2;

        $queryArguments = [
            'search' => $search,
            'geoLocation' => $geoLocation,
        ];

        if (DEBUG) {
            var_dump(__METHOD__);
            var_dump('Channel ID: ' . $channelId);
            var_dump('Search: ' . $search);
            var_dump('Geolocation: ' . $geoLocation);
        }

        return new JobSearchResult(
            $this->sendResponse(self::METHOD_GET, $queryArguments), '', $this->useAutomaticCatalogueCompletion,
        );
    }

    /**
     * @throws GuzzleException
     */
    public function sendApplicationInformation(string $applicationId, string $uat, array $applicationData): void
    {
        $this->uri = sprintf('frontend/applications/%s', $applicationId);
        $this->version = 3;

        if (DEBUG) {
            var_dump(__METHOD__);
            var_dump('Application ID: ' . $applicationId);
            var_dump('User Access Token empty: ' . (empty($uat ? 'true' : 'false')));
        }

        $this->sendResponse(self::METHOD_POST, $applicationData, $uat);
    }

    /**
     * @throws GuzzleException
     */
    public function startApplication(string $jobId, string $uat): string
    {
        $this->uri = sprintf('frontend/applications?jobId=%s', $jobId);
        $this->version = 3;

        if (DEBUG) {
            var_dump(__METHOD__);
            var_dump('Job ID: ' . $jobId);
            var_dump('User Access Token empty: ' . (empty($uat ? 'true' : 'false')));
        }

        $response = $this->sendResponse(self::METHOD_POST, [], $uat);

        return $response[0];
    }

    /**
     * @throws GuzzleException
     */
    public function withdrawApplication(string $applicationId, string $uat): void
    {
        $this->uri = sprintf('frontend/applications/%s/withdraw', $applicationId);
        $this->version = 3;

        if (DEBUG) {
            var_dump(__METHOD__);
            var_dump('Application ID: ' . $applicationId);
            var_dump('User Access Token empty: ' . (empty($uat ? 'true' : 'false')));
        }

        $this->sendResponse(self::METHOD_POST, [], $uat);
    }
}
