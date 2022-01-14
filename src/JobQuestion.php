<?php

namespace SWE\SoftGardenApi;


/**
 * Class JobQuestion
 *
 * @package SWE\SoftGardenApi
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class JobQuestion extends AbstractDataSet
{
    /**
     * @var int
     */
    protected int $id = 0;

    /**
     * @var string
     */
    protected string $question = '';

    /**
     * @var string
     */
    protected string $type = '';

    /**
     * @var array|null
     */
    protected ?array $answerCatalog = null;

    /**
     * @return array|null
     */
    public function getAnswerCatalog(): ?array
    {
        return $this->answerCatalog;
    }

    /**
     * @param array|null $answerCatalog
     */
    public function setAnswerCatalog(?array $answerCatalog): void
    {
        $this->answerCatalog = $answerCatalog;
    }

    /**
     * @inheritDoc
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getQuestion(): string
    {
        return $this->question;
    }

    /**
     * @param string $question
     */
    public function setQuestion(string $question): void
    {
        $this->question = $question;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }
}
