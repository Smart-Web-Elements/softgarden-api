<?php

namespace SWE\SoftGardenApi;


/**
 * Class JobSearchResult
 *
 * @package SWE\SoftGardenApi
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class JobSearchResult extends AbstractDataSet
{
    /**
     * @var int
     */
    protected int $itemsPerPage = 0;
    /**
     * @var int
     */
    protected int $numPages = 0;
    /**
     * @var int
     */
    protected int $offset = 0;
    /**
     * @var int
     */
    protected int $actualPage = 0;
    /**
     * @var int
     */
    protected int $firstPostingOnPage = 0;
    /**
     * @var int
     */
    protected int $lastPostingOnPage = 0;
    /**
     * @var int
     */
    protected int $totalNumberOfJobs = 0;
    /**
     * @var Collection
     */
    protected Collection $result;

    /**
     * JobSearchResult constructor.
     *
     * @inheritDoc
     */
    public function __construct(array $arguments = [], string $FQN = '', bool $automation = false)
    {
        $result = [];
        if (isset($arguments['result'])) {
            $result = $arguments['result'];
            unset($arguments['result']);
        }

        parent::__construct($arguments, $FQN, $automation);
        $this->result = new Collection($result, SearchResult::class, $automation);
    }

    /**
     * @return int
     */
    public function getActualPage(): int
    {
        return $this->actualPage;
    }

    /**
     * @return int
     */
    public function getFirstPostingOnPage(): int
    {
        return $this->firstPostingOnPage;
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
    public function getItemsPerPage(): int
    {
        return $this->itemsPerPage;
    }

    /**
     * @return int
     */
    public function getLastPostingOnPage(): int
    {
        return $this->lastPostingOnPage;
    }

    /**
     * @return int
     */
    public function getNumPages(): int
    {
        return $this->numPages;
    }

    /**
     * @return int
     */
    public function getOffset(): int
    {
        return $this->offset;
    }

    /**
     * @return Collection
     */
    public function getResult(): Collection
    {
        return $this->result;
    }

    /**
     * @return int
     */
    public function getTotalNumberOfJobs(): int
    {
        return $this->totalNumberOfJobs;
    }
}
