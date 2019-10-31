<?php

namespace Junichimura\ViewArgs\Traits;

trait FormArgTrait
{

    public function toArray()
    {
        return [static::ARG_NAME => $this];
    }

    public function offsetExists($offset)
    {
        return property_exists($this, $offset);
    }

    public function offsetGet($offset)
    {
        return $this->offsetExists($offset) ? $this->{$offset} : new \ErrorException('Undefined property: '.$offset);
    }

    public function offsetSet($offset, $value)
    {
        $this->{$offset} = $value;
    }

    public function offsetUnset($offset)
    {
        unset($this->{$offset});
    }

}
