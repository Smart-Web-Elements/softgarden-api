<?php

namespace SWE\SoftGardenApi;


/**
 * Class Channel
 *
 * @package SWE\SoftGardenApi
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Channel extends AbstractDataSet
{
    /**
     * @var string
     */
    protected string $id = '';

    /**
     * @var string
     */
    protected string $name = '';

    /**
     * @var bool
     */
    protected bool $accessible = false;

    /**
     * @inheritDoc
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return bool
     */
    public function isAccessible(): bool
    {
        return $this->accessible;
    }
}
