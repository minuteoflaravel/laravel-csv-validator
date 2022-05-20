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
        if ($value instanceof \Livewire\TemporaryUploadedFile) {
            $file = $value->getRealPath();
        } else if ($value instanceof \Illuminate\Http\UploadedFile) {
            $file = $value->getPathname();
        } else {
            throw new \Exception('CSV Validator: Unknown instance of uploaded file');
        }

        $csv->parseFile($file);

        return empty($csv->error);
    }
}
