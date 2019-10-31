<?php

namespace Junichimura\ViewArgs;

use Illuminate\Support\Traits\Macroable;
use Junichimura\ViewArgs\Interfaces\FormArgsInterface;
use Junichimura\ViewArgs\Traits\FormArgTrait;

/**
 * ビューの引数としてオブジェクトを指定する場合、そのオブジェクトはこのクラスを継承しておく。
 * @package App\Util
 */
abstract class FormArgs implements FormArgsInterface
{

    use Macroable;
    use FormArgTrait;

    public function __call($method, $parameters)
    {
        $this->{$method} = $parameters[0];
        return $this;
    }

    public function __get($name)
    {
        return $this->{$name} ?? null;
    }

}
