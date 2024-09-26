<?php

namespace SWE\SoftGardenApi;


use SWE\SoftGardenApi\Collection\SearchResultCollection;

class JobSearchResult extends AbstractDataSet
{
    protected int $itemsPerPage = 0;
    protected int $numPages = 0;
    protected int $offset = 0;
    protected int $actualPage = 0;
    protected int $firstPostingOnPage = 0;
    protected int $lastPostingOnPage = 0;
    protected int $totalNumberOfJobs = 0;
    protected SearchResultCollection $result;

    public function __construct(array $arguments = [], string $FQN = '', bool $automation = false)
    {
        $result = [];
        if (isset($arguments['result'])) {
            $result = $arguments['result'];
            unset($arguments['result']);
        }

        parent::__construct($arguments, $FQN, $automation);
        $this->result = new SearchResultCollection($result, SearchResult::class, $automation);
    }

    public function getActualPage(): int
    {
        return $this->actualPage;
    }

    public function getFirstPostingOnPage(): int
    {
        return $this->firstPostingOnPage;
    }

    public function getId()
    {
        return null;
    }

    public function getItemsPerPage(): int
    {
        return $this->itemsPerPage;
    }

    public function getLastPostingOnPage(): int
    {
        return $this->lastPostingOnPage;
    }

    public function getNumPages(): int
    {
        return $this->numPages;
    }

    public function getOffset(): int
    {
        return $this->offset;
    }

    public function getResult(): SearchResultCollection
    {
        return $this->result;
    }

    public function getTotalNumberOfJobs(): int
    {
        return $this->totalNumberOfJobs;
    }
}
