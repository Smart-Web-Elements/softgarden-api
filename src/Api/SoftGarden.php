<?php

namespace SWE\SoftGardenApi\Api;


use GuzzleHttp\Exception\GuzzleException;
use SWE\SoftGardenApi\ApplicantData;
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
    const AUDIENCES = 'AUDIENCE';
    const EMPLOYMENT_TYPES = 'EMPLOYMENT_TYPE';
    const WORK_TIMES = 'WORKING_HOURS';
    const INDUSTRIES = 'POSITION_INDUSTRY';
    const WORK_EXPERIENCES = 'WORK_EXPERIENCE';

    /**
     * Enable the catalogue completion. If disabled, the catalogue values (e.g. "workTimes" in a "Job") will be
     * shown as id so the user has to grep these informations by himself.
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

        $this->uri = sprintf('frontend/catalogs/%s', $type);
        $this->version = 3;

        $queryArguments = [
            'locale' => 'DE',
        ];

        $result = $this->getResponse(false, $queryArguments);

        return $result[$typeId] ?? '';
    }

    /**
     * Get all channels.
     *
     * @return Collection A collection with all channels.
     * @throws GuzzleException
     */
    public function getChannels(): Collection
    {
        if (DEBUG) {
            var_dump(__METHOD__);
        }

        $this->uri = 'frontend/jobslist/channels';
        $this->version = 3;

        return new Collection($this->getResponse(), Channel::class, $this->useAutomaticCatalogueCompletion);
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

        return new Job($this->getResponse(), '', $this->useAutomaticCatalogueCompletion);
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
            $this->getResponse(false, $queryArguments),
            '',
            $this->useAutomaticCatalogueCompletion
        );
    }

    /**
     * Get all job questions of a job.
     *
     * @param int $jobId The job id.
     * @return Collection A collection with all questions of the job.
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

        return new Collection($this->getResponse(), JobQuestion::class, $this->useAutomaticCatalogueCompletion);
    }

    /**
     * Get all jobs of a channel.
     *
     * @param string $channelId The channel id.
     * @return Collection A collection with all jobs of the channel.
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
        $response = $this->getResponse();

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
            $this->getResponse(false, $queryArguments),
            '',
            $this->useAutomaticCatalogueCompletion
        );
    }

    /**
     * Create a new applicant.
     *
     * @param array $data
     * @return string|ApplicantData
     * @throws GuzzleException
     */
    public function createApplicant(array $data)
    {
        $applicant = new ApplicantData($data);

        $this->uri = 'frontend/applicants';
        $this->version = 3;
        try {
            $this->getResponse(true, $data);
        } catch (GuzzleException $e) {
            $message = explode(':', $e->getMessage());

            return trim(array_pop($message));
        }

        return $applicant;
    }

    /**
     * Get UAT
     */
    public function getUserAccessToken(ApplicantData $applicant)
    {

        $this->uri = 'oauth/frontend/token';
        $this->version = 3;
        $data = [
            "grant_type"=>"password",
            "username"=>$applicant->getUsername(),
            "password"=>$applicant->getPassword(),
        ];
        try {
            $response = $this->getResponse(true, $data);
        } catch (GuzzleException $e) {
            $message = explode(':', $e->getMessage());

            return trim(array_pop($message));
        }

        return $response["access_token"];
    }

}
