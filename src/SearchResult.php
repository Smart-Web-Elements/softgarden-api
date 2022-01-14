<?php

namespace SWE\SoftGardenApi;


/**
 * Class SearchResult
 *
 * @package SWE\SoftGardenApi
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class SearchResult extends AbstractDataSet
{

    /**
     * @var int
     */
    protected int $jobPostingId = 0;
    /**
     * @var int
     */
    protected int $postingVersionId = 0;
    /**
     * @var string
     */
    protected string $title = '';
    /**
     * @var string
     */
    protected string $applyOnlineLink = '';
    /**
     * @var SearchResultConfig|null
     */
    protected ?SearchResultConfig $config = null;
    /**
     * @var int
     */
    protected int $jobStartDate = 0;
    /**
     * @var int
     */
    protected int $postingVersionStartDate = 0;
    /**
     * @var int
     */
    protected int $postingVersionEndDate = 0;

    /**
     * SearchResult constructor.
     *
     * @inheritDoc
     */
    public function __construct(array $arguments = [], string $FQN = '', bool $automation = false)
    {
        if (isset($arguments['config'])) {
            $this->config = new SearchResultConfig($arguments['config'], '', $automation);
            unset($arguments['config']);
        }

        parent::__construct($arguments, $FQN, $automation);
    }

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
     * @return SearchResultConfig|null
     */
    public function getConfig(): ?SearchResultConfig
    {
        return $this->config;
    }

    /**
     * @param SearchResultConfig|null $config
     */
    public function setConfig(?SearchResultConfig $config): void
    {
        $this->config = $config;
    }

    /**
     * @inheritDoc
     */
    public function getId()
    {
        return null;
    }

    /**
     * @return int
     */
    public function getJobPostingId(): int
    {
        return $this->jobPostingId;
    }

    /**
     * @param int $jobPostingId
     */
    public function setJobPostingId(int $jobPostingId): void
    {
        $this->jobPostingId = $jobPostingId;
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
     * @return int
     */
    public function getPostingVersionEndDate(): int
    {
        return $this->postingVersionEndDate;
    }

    /**
     * @param int $postingVersionEndDate
     */
    public function setPostingVersionEndDate(int $postingVersionEndDate): void
    {
        $this->postingVersionEndDate = $postingVersionEndDate;
    }

    /**
     * @return int
     */
    public function getPostingVersionId(): int
    {
        return $this->postingVersionId;
    }

    /**
     * @param int $postingVersionId
     */
    public function setPostingVersionId(int $postingVersionId): void
    {
        $this->postingVersionId = $postingVersionId;
    }

    /**
     * @return int
     */
    public function getPostingVersionStartDate(): int
    {
        return $this->postingVersionStartDate;
    }

    /**
     * @param int $postingVersionStartDate
     */
    public function setPostingVersionStartDate(int $postingVersionStartDate): void
    {
        $this->postingVersionStartDate = $postingVersionStartDate;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }
}
