# Laravel-View-Args

## Install

#### Composer
* For Laravel : run `composer require junichimura/view-args` in your project folder.

## Usage example [Laravel only]

```php
<?php

namespace App\Util;

use Junichimura\ViewArgs\FormArgs;

class InputFormArgs extends FormArgs
{

    public $label;
    public $value;
    public $type;
    public $name;
    public $placeholder;

    public function __construct($label, $value)
    {
        $this->label = $label;
        $this->value = $value;
        $this->type = 'text';
    }

    public function name($name)
    {
        $this->name = $name;
        return $this;
    }

    public function placeholder($placeholder)
    {
        $this->placeholder = $placeholder;
        return $this;
    }

    public static function make($label, $value)
    {
        return new static($label, $value);
    }

}
```

```blade
{{-- views/sample/input.blade.php --}}
<div class="form-group">
    <label>{{ $args['label'] }}</label>
    <input class="form-group" name="{{ $args->name }}" type="{{ $args->type }}"
           @isset( $args->value ) value="{{ $args->value }}" @endisset
           placeholder="{{ $args->placeholder }}">
    @error( $args->name )
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
```

```php
<?php
// routes/web.php

Route::get('sample', function () {
    return view('sample.input', \InputFormArgs::make('Your Email', 'email')
                                        ->type('type')
                                        ->placeholder('your@email.org'));
});
```

## License

Laravel-Dotenv-Checker is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
