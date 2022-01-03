<?php

namespace MinuteOfLaravel\CsvValidator;

use Illuminate\Support\Facades\Validator;
use ParseCsv\Csv;

class CsvValidator {

    public static function boot() {
        self::addValidationRules();
    }

    public static function addValidationRules() {
        Validator::extend(
            'csv',
            'MinuteOfLaravel\CsvValidator\CsvValidator@validateCsv',
            'The :attribute must be a CSV file.',
        );
    }

    public function validateCsv(string $attribute, $value, array $parameters): bool
    {
        $csv = new Csv();
        $csv->parseFile($value->getPathname());
        return empty($csv->error);
    }
}
