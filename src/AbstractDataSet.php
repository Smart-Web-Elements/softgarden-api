<?php

namespace SWE\SoftGardenApi;


use SWE\SoftGardenApi\Api\SoftGarden;

/**
 * Class AbstractDataSet
 *
 * @package SWE\SoftGardenApi
 * @author Luca Braun <l.braun@s-w-e.com>
 * @abstract
 */
abstract class AbstractDataSet
{
    /**
     * Array of catalogue values.
     *
     * @var array
     */
    protected static array $catalogues = [];

    /**
     * AbstractDataSet constructor.
     *
     * @param array $arguments OPTIONAL. The arguments of the Model.
     * @param string $FQN OPTIONAL. The full qualified class name of the Model.
     * @param bool $automation OPTIONAL. The catalogue fields should be set automatically.
     */
    public function __construct(array $arguments = [], string $FQN = '', bool $automation = false)
    {
        foreach ($arguments as $key => $value) {
            // lowercase_underscored to camelCase.
            $key = lcfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $key))));
            if (!$this->hasAttribute($key)) {
                continue;
            }

            $this->{$key} = $value;

            if (in_array($key, static::$catalogues) && $automation) {
                $this->{$key} = $this->setByCatalogue($key);
            }
        }
    }

    /**
     * Get the id.
     *
     * @return mixed
     */
    abstract public function getId();

    /**
     * Get the instance as array.
     *
     * @return array
     */
    public function getStructure(): array
    {
        $structure = [];
        $objectVars = get_object_vars($this);

        foreach (get_class_vars(static::class) as $key => $value) {
            if (array_key_exists($key, $objectVars) && ($value === null || $value !== $objectVars[$key])) {
                $value = $objectVars[$key];
            }

            $structure[$key] = $value;
        }

        return $structure;
    }

    /**
     * Transform this instance to an array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return $this->getStructure();
    }

    /**
     * Get all attribute names.
     *
     * @return array The attribute names as array.
     */
    protected function getAttributes(): array
    {
        return array_keys(get_class_vars(static::class));
    }

    /**
     * Check for an attribute.
     *
     * @param string $key The attribute name.
     * @return bool True if the attribute exist, else false.
     */
    protected function hasAttribute(string $key): bool
    {
        return in_array($key, $this->getAttributes());
    }

    /**
     * Set a catalogue value.
     *
     * @param string $key The catalogue field name.
     * @return array An array of catalogue values.
     */
    private function setByCatalogue(string $key): array
    {
        $typeIds = $this->{$key};
        $typeArray = preg_split('/(?=[A-Z])/', $key);
        $typeKey = strtoupper(implode('_', $typeArray));
        $softGardenNameSpace = SoftGarden::class;
        $type = constant($softGardenNameSpace . '::' . $typeKey);
        $softGarden = SoftGarden::getInstance();
        $values = [];

        foreach ($typeIds as $typeId) {
            $values[] = $softGarden->getCatalogByType($type, $typeId);
        }

        return $values;
    }
}
