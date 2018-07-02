<?php
namespace Jeff\AttributeExample\Api\Data;
interface FoomanInterface 
{
    const VALUE = 'value';

    /**
     * @return string|null
     */
    public function getValue();

    /**
     * @param string|null $value
     * @return $this
     */
    public function setValue($value);
}
