<?php

namespace SWE\SoftGardenApi;


use GuzzleHttp\Exception\GuzzleException;
use SWE\SoftGardenApi\Api\SoftGarden;

abstract class AbstractDataSet
{
    protected static array $catalogues = [];

    /**
     * @throws GuzzleException
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

    abstract public function getId();

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

    public function toArray(): array
    {
        return $this->getStructure();
    }

    protected function getAttributes(): array
    {
        return array_keys(get_class_vars(static::class));
    }

    protected function hasAttribute(string $key): bool
    {
        return in_array($key, $this->getAttributes());
    }

    /**
     * @throws GuzzleException
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
