<?php

namespace SWE\SoftGardenApi;


class Channel extends AbstractDataSet
{
    protected string $id = '';

    protected string $name = '';

    protected bool $accessible = false;

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function isAccessible(): bool
    {
        return $this->accessible;
    }
}
