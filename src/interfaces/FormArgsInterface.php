<?php

namespace Junichimura\ViewArgs\Interfaces;

use Illuminate\Contracts\Support\Arrayable;

interface FormArgsInterface extends Arrayable, \ArrayAccess
{
    public const ARG_NAME = 'args';

    public function toArray();

    public function offsetExists($offset);

    public function offsetGet($offset);

    public function offsetSet($offset, $value);

    public function offsetUnset($offset);
}
