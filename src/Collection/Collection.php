<?php

namespace SWE\SoftGardenApi\Collection;


use ArrayIterator;
use Countable;
use IteratorAggregate;
use SWE\SoftGardenApi\AbstractDataSet;

/**
 * @template T of AbstractDataSet
 */
class Collection extends AbstractDataSet implements IteratorAggregate, Countable
{
    /**
     * @var array<T>
     */
    private array $items = [];

    public function __construct(array $arguments = [], string $FQN = '', bool $automation = false)
    {
        parent::__construct();

        if (empty($FQN)) {
            return;
        }

        foreach ($arguments as $item) {
            $this->items[] = new $FQN($item, '', $automation);
        }
    }

    public function __debugInfo(): array
    {
        return [
            'items' => $this->getItems(),
        ];
    }

    /**
     * @param T $item
     */
    public function addItem(object $item): void
    {
        $this->items[] = $item;
    }

    public function count(): int
    {
        return count($this->getItems());
    }

    public function getId()
    {
        return null;
    }

    /**
     * @return T|null
     */
    public function getItem(int $index): ?object
    {
        if (!isset($this->items[$index]) || !$this->items[$index] instanceof AbstractDataSet) {
            return null;
        }

        $dataSet = $this->items[$index];

        if (empty($dataSet->getId()) || $dataSet->getId() === 0) {
            return null;
        }

        return $dataSet;
    }

    /**
     * @return array<T>
     */
    public function getItems(): array
    {
        $result = array_map(
            function ($index) {
                return $this->getItem($index);
            },
            array_keys($this->items),
        );

        return array_filter($result);
    }

    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->getItems());
    }

    public function toArray(): array
    {
        $output = $this->getStructure();

        foreach ($this->items as $index => $item) {
            if (!$item instanceof AbstractDataSet) {
                continue;
            }
            if (!isset($output['items'])) {
                $output['items'] = [];
            }
            $output['items'][$index] = $item->toArray();
        }

        return $output;
    }
}
