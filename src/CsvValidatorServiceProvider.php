<?php

namespace MinuteOfLaravel\CsvValidator;

use Illuminate\Support\ServiceProvider;

class CsvValidatorServiceProvider extends ServiceProvider
{
    public function boot()
    {
        CsvValidator::boot();
    }
}
