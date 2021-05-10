<?php

namespace App\View\Components;

use Illuminate\Support\Str;
use Illuminate\View\Component;

class ValidationError extends Component
{
    const FIELD_KEY = 1;

    public $errorMessages;

    public function __construct($errors)
    {
        $this->errorMessages = collect($errors->all())->map(function($error) {
            return collect(explode(' ', $error))->map(function($word, $key) {
                if (($key == self::FIELD_KEY) && Str::contains($word, '.')) {
                    return trim(substr($word, strpos($word, '.') + 1));
                }

                return $word;
            })->implode(' ');
        });
    }

    public function render()
    {
        return view('components.validation-error');
    }
}
