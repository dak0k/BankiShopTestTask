<?php

namespace App\Traits;

use Illuminate\Support\Str;
trait Transliteratable
{
    protected function transliterate($string) {
        return Str::slug($string, '-');
    }
}
