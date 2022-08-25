<?php

namespace SWE\SoftGardenApi\Api;


use GuzzleHttp\Exception\GuzzleException;
use SWE\SoftGardenApi\ApplicantData;
use SWE\SoftGardenApi\ApplicationData;
use SWE\SoftGardenApi\Channel;
use SWE\SoftGardenApi\Collection;
use SWE\SoftGardenApi\Job;
use SWE\SoftGardenApi\JobQuestion;
use SWE\SoftGardenApi\JobSearchResult;

/**
 * Class SoftGarden
 *
 * This class holds all request methods to the api.
 *
 * @package SWE\SoftGardenApi\Api
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class SoftGarden extends SoftGardenBasic
{
    /**
     * Catalogue types.
     */
    const JOB_CATEGORIES = 'JOB_CATEGORY';
    /**
     *
     */
    const AUDIENCES = 'AUDIENCE';
    /**
     *
     */
    const EMPLOYMENT_TYPES = 'EMPLOYMENT_TYPE';
    /**
     *
     */
    const WORK_TIMES = 'WORKING_HOURS';
    /**
     *
     */
    const INDUSTRIES = 'POSITION_INDUSTRY';
    /**
     *
     */
    const WORK_EXPERIENCES = 'WORK_EXPERIENCE';

    /**
     * Enable the catalogue completion. If disabled, the catalogue values (e.g. "workTimes" in a "Job") will be
     * shown as id so the user has to grep these information by himself.
     *
     * @var bool
     */
    protected bool $useAutomaticCatalogueCompletion = true;

    /**
     * Get a catalogue value by type.
     *
     * @param string $type The catalogue type.
     * @param string $typeId The id of the catalogue.
     * @return string Returns the result as string.
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
     * Get a catalogue by type.
     *
     * @param string $type The catalogue type
     * @return array Returns the result.
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
     * Get all channels.
     *
     * @return Collection<Channel> A collection with all channels.
     * @throws GuzzleException
     */
    public function getChannels(): Collection
    {
        if (DEBUG) {
            var_dump(__METHOD__);
        }

        $this->uri = 'frontend/jobslist/channels';
        $this->version = 3;

        return new Collection($this->sendResponse(), Channel::class, $this->useAutomaticCatalogueCompletion);
    }

    /**
     * Get a job by id.
     *
     * @param string $channelId The channel id.
     * @param int $jobId The job id.
     * @return Job The job instance.
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
     * Get the job basket.
     *
     * @param string $channelId The channel id.
     * @return JobSearchResult The JobSearchResult instance.
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
            $this->sendResponse(self::METHOD_GET, $queryArguments), '', $this->useAutomaticCatalogueCompletion
        );
    }

    /**
     * Get all job questions of a job.
     *
     * @param int $jobId The job id.
     * @return Collection<JobQuestion> A collection with all questions of the job.
     * @throws GuzzleException
     */
    public function getJobQuestions(int $jobId): Collection
    {
        if (DEBUG) {
            var_dump(__METHOD__);
            var_dump('Job ID: ' . $jobId);
        }

        $this->uri = sprintf('frontend/jobs/%d/questions', $jobId);
        $this->version = 3;

        return new Collection($this->sendResponse(), JobQuestion::class, $this->useAutomaticCatalogueCompletion);
    }

    /**
     * Get all jobs of a channel.
     *
     * @param string $channelId The channel id.
     * @return Collection<Job> A collection with all jobs of the channel.
     * @throws GuzzleException
     */
    public function getJobs(string $channelId): Collection
    {
        if (DEBUG) {
            var_dump(__METHOD__);
            var_dump('Channel ID: ' . $channelId);
        }

        $this->uri = sprintf('frontend/jobslist/%s', $channelId);
        $this->version = 3;
        $response = $this->sendResponse();

        return new Collection($response['results'], Job::class, $this->useAutomaticCatalogueCompletion);
    }

    /**
     * @return bool
     */
    public function isUseAutomaticCatalogueCompletion(): bool
    {
        return $this->useAutomaticCatalogueCompletion;
    }

    /**
     * @param bool $useAutomaticCatalogueCompletion
     */
    public function setUseAutomaticCatalogueCompletion(bool $useAutomaticCatalogueCompletion): void
    {
        $this->useAutomaticCatalogueCompletion = $useAutomaticCatalogueCompletion;
    }

    /**
     * Search for a job in a channel.
     *
     * @param string $channelId The channel id.
     * @param string $search OPTIONAL. The word we are searching for.
     * @param string $geoLocation OPTIONAL. The geolocation we are searching for.
     * @return JobSearchResult The JobSearchResult instance.
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
            $this->sendResponse(self::METHOD_GET, $queryArguments), '', $this->useAutomaticCatalogueCompletion
        );
    }

    /**
     * Create a new applicant.
     *
     * @param array $data The applicant data.
     * @return ApplicantData The ApplicantData instance.
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
     * Check if an applicant exist.
     *
     * @param array $data The applicant data.
     * @return bool Returns true if applicant exists.
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
     * Get the user access token for an applicant.
     *
     * @param ApplicantData $applicant The applicant instance.
     * @return string The user access token of the applicant.
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
     * Check if applicant has already applied to a job.
     *
     * @param string $jobId The job id where the applicant want to apply to.
     * @param string $uat The user access token of the applicant.
     * @return bool Returns true if the applicant has already applied to this job.
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

    /**
     * Get all applications of an applicant.
     *
     * @param string $uat The user access token.
     * @param array $queryParameters OPTIONAL. The query parameters.
     * @return Collection<ApplicationData> Returns a collection of ApplicationData instances.
     * @throws GuzzleException
     */
    public function getAllApplications(string $uat, array $queryParameters = []): Collection
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

        return new Collection(
            $this->sendResponse(self::METHOD_GET, $queryParameters, $uat),
            ApplicationData::class,
            $this->useAutomaticCatalogueCompletion
        );
    }

    /**
     * Get an application of an applicant.
     *
     * @param string $applicationId The application id.
     * @param string $uat The user access token.
     * @return ApplicationData Returns an ApplicationData instance.
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
            $this->useAutomaticCatalogueCompletion
        );
    }

    /**
     * Start the application.
     *
     * @param string $jobId The job id where the applicant want to apply to.
     * @param string $uat The user access token of the applicant.
     * @return string Returns the application id.
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
     * Send application information.
     *
     * @param string $applicationId The application id.
     * @param string $uat The user access token.
     * @param array $applicationData The application data. See https://dev.softgarden.de/frontend-v3/bewerbungsinformationen-speichern/
     * @return void
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
     * Finalize the application.
     *
     * @param string $applicationId The application id.
     * @param string $uat The user access token of the applicant.
     * @param array $applicationData The application information.
     * @return void
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
     * Delete an application if it's not finalized.
     *
     * @param string $applicationId The application id.
     * @param string $uat The user access token.
     * @return void
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
     * Withdraw a finalized (submitted) application.
     *
     * @param string $applicationId The application id.
     * @param string $uat The user access token.
     * @return void
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
