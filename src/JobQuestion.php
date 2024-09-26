<?php

namespace SWE\SoftGardenApi;


class JobQuestion extends AbstractDataSet
{
    const TYPE_TEXT = 'TEXT';
    const TYPE_TEXTAREA = 'TEXTAREA';
    const TYPE_YESNO = 'YESNO';
    const TYPE_CATALOG = 'CATALOG';
    const TYPES = [
        self::TYPE_TEXT,
        self::TYPE_TEXTAREA,
        self::TYPE_YESNO,
        self::TYPE_CATALOG,
    ];
    protected int $id = 0;

    protected string $question = '';

    protected string $type = '';

    protected ?array $answerCatalog = null;

    public function getAnswerCatalog(): ?array
    {
        return $this->answerCatalog;
    }

    public function setAnswerCatalog(?array $answerCatalog): void
    {
        $this->answerCatalog = $answerCatalog;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getQuestion(): string
    {
        return $this->question;
    }

    public function setQuestion(string $question): void
    {
        $this->question = $question;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }
}
