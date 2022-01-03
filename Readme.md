# Laravel CSV Validator
This package adds a CSV validator to your Laravel project. This validator parses uploaded file using parsecsv/php-parsecsv library and validation is passed when there are no errors during parsing.

This package doesn't validate against a MIME type or file extension.
## Installation
You can install package via composer:

```bash
composer require minuteoflaravel/laravel-csv-validator
```

## Example
To check if file is audio file and audio duration is 60 seconds:

```php
$request->validate([
    'uploaded_file' => 'csv',
]);
```

## Custom error messages

If you need to add your custom translatable error message then just add it as always to resources/lang/en/validation.php file:

```php
  'csv' => 'The :attribute must be a CSV file.',
```

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.



