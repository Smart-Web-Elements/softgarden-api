<?php

namespace SWE\SoftGardenApi;


use ArrayIterator;
use IteratorAggregate;

/**
 * Class Collection
 *
 * @package SWE\SoftGardenApi
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Collection extends AbstractDataSet implements IteratorAggregate
{
    /**
     * @var array
     */
    private array $items = [];

    /**
     * Collection constructor.
     *
     * @inheritDoc
     */
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

    /**
     * @return array
     */
    public function __debugInfo(): array
    {
        return [
            'items' => $this->getItems(),
        ];
    }

    /**
     * Add an item to the collection.
     *
     * @param AbstractDataSet $item The item to add.
     */
    public function addItem(AbstractDataSet $item): void
    {
        $this->items[] = $item;
    }

    /**
     * @inheritDoc
     */
    public function getId()
    {
        return null;
    }

    /**
     * @inheritDoc
     */
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

    /**
     * Get an item by its index.
     *
     * @param int $index The item index.
     * @return AbstractDataSet|null The item of null if the index does not exist.
     */
    public function getItem(int $index): ?AbstractDataSet
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
     * Get all items.
     *
     * @return array An array of items.
     */
    public function getItems(): array
    {
        $result = array_map(
            function ($index) {
                return $this->getItem($index);
            },
            array_keys($this->items)
        );

        return array_filter($result);
    }

    /**
     * @inheritDoc
     */
    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->getItems());
    }
}
