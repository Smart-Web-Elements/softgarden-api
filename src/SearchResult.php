<?php

namespace SWE\SoftGardenApi;


class SearchResult extends AbstractDataSet
{

        protected int $jobPostingId = 0;
        protected int $postingVersionId = 0;
        protected string $title = '';
        protected string $applyOnlineLink = '';
        protected ?SearchResultConfig $config = null;
        protected int $jobStartDate = 0;
        protected int $postingVersionStartDate = 0;
        protected int $postingVersionEndDate = 0;

    public function __construct(array $arguments = [], string $FQN = '', bool $automation = false)
    {
        if (isset($arguments['config'])) {
            $this->config = new SearchResultConfig($arguments['config'], '', $automation);
            unset($arguments['config']);
        }

        parent::__construct($arguments, $FQN, $automation);
    }

        public function getApplyOnlineLink(): string
    {
        return $this->applyOnlineLink;
    }

        public function setApplyOnlineLink(string $applyOnlineLink): void
    {
        $this->applyOnlineLink = $applyOnlineLink;
    }

        public function getConfig(): ?SearchResultConfig
    {
        return $this->config;
    }

        public function setConfig(?SearchResultConfig $config): void
    {
        $this->config = $config;
    }

        public function getId()
    {
        return null;
    }

        public function getJobPostingId(): int
    {
        return $this->jobPostingId;
    }

        public function setJobPostingId(int $jobPostingId): void
    {
        $this->jobPostingId = $jobPostingId;
    }

        public function getJobStartDate(): int
    {
        return $this->jobStartDate;
    }

        public function setJobStartDate(int $jobStartDate): void
    {
        $this->jobStartDate = $jobStartDate;
    }

        public function getPostingVersionEndDate(): int
    {
        return $this->postingVersionEndDate;
    }

        public function setPostingVersionEndDate(int $postingVersionEndDate): void
    {
        $this->postingVersionEndDate = $postingVersionEndDate;
    }

        public function getPostingVersionId(): int
    {
        return $this->postingVersionId;
    }

        public function setPostingVersionId(int $postingVersionId): void
    {
        $this->postingVersionId = $postingVersionId;
    }

        public function getPostingVersionStartDate(): int
    {
        return $this->postingVersionStartDate;
    }

        public function setPostingVersionStartDate(int $postingVersionStartDate): void
    {
        $this->postingVersionStartDate = $postingVersionStartDate;
    }

        public function getTitle(): string
    {
        return $this->title;
    }

        public function setTitle(string $title): void
    {
        $this->title = $title;
    }
}
