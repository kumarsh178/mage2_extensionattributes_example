<?php
namespace Jeff\AttributeExample\Api\Data;

interface FoomanAttributeInterface
{
    const VALUE = 'value';

    /**
     * Return value.
     * @return string|null
     */
    public function getValue();

    /**
     * Set Value
     * @param string|null $value
     * @return $this
     */
    public function setValue($value);
}
