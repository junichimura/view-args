# Laravel-View-Args

## Install

#### Composer
* For Laravel : run `composer require junichimura/view-args` in your project folder.

## Usage example [Laravel only]

#### example 1: View-Args class
```php
<?php

use Junichimura\ViewArgs\FormArgs;

class InputFormArgs extends FormArgs
{

    public $label;
    public $type;
    public $disabled;

    public function __construct($label, $type)
    {
        $this->label = $label;
        $this->type = $type;
    }

    public function disabled($condition = true)
    {
        $this->disabled = (bool)$condition;
        return $this;
    }

    public static function make($label, $type = 'text')
    {
        return new static($label, $type);
    }

}
```

#### example 2: Blade Template
```blade
{{-- views/sample/input.blade.php --}}
<div class="form-group">
    <label>{{ $args['label'] }}</label>
    <input class="form-group" name="{{ $args->name }}" type="{{ $args->type }}"
            @isset( $args->value ) value="{{ $args->value }}" @endisset
            placeholder="{{ $args->placeholder }}"
            @if($args->disabled) disabled @endif>
    @error( $args->name )
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
```

#### example 3: rendering blade template
```php
<?php
// routes/web.php
Route::get('sample', function () {
    return view('sample.input', \InputFormArgs::make('Your Email', 'email')
                                                ->value('junichimura@examle.org')
                                                ->placeholder('your@email.org')
                                                ->disabled());
});
```

#### Results: generated html
```html
<div class="form-group">
    <label>Your Email</label>
    <input class="form-group" name="" type="email" value="junichimura@examle.org" placeholder="your@email.org" disabled >
</div>
```

## License

Laravel-View-Args is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
