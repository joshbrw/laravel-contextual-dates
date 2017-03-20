# Laravel Contextual Dates

## Installation
1. Install the package via Composer:
    `composer require joshbrw/laravel-contextual-dates`
2. Add the Service Provider to `config/app.php`:
    `Joshbrw\LaravelContextualDates\ContextualDatesServiceProvider::class`
3. Configure the `DateTimeFactory` with the desired Timezone and Formats. These formats can be named whatever you like, i.e. `long` or `short`.
4. Use the `FormatsDates` trait or the helpers defined in `helpers.php` to localize/output the dates.

## Defaults

Two date formats are provided by default, `long` and `short`. These can be over-ridden at any time.

## Examples

### Using Container
The `DateTimeFactory` is bound as a singleton in the container, so it can be picked up and modified at any time (similar to the inbuilt View/Validation factories that Laravel provides).
```php
$dateTimeFactory = app(DateTimeFactory::class);
$dateTimeFactory->addFormat('mixed', 'Y-m-d');

$carbon = new \Carbon\Carbon;

$dateTime = $dateTimeFactory->createFromCarbon($carbon);

echo $dateTime->format('mixed'); /* Outputs in Y-m-d */
```

### Using Helpers
This package ships with two helper methods; `localize_date()` and `format_date()`.
```php
$dateTimeFactory = app(DateTimeFactory::class);
$dateTimeFactory->addFormat('mixed', 'Y-m-d');

$carbon = new \Carbon\Carbon;

$instance = localize_date($carbon); /* Instance of DateTime */

echo format_date($carbon, 'mixed'); /* Outputs in Y-m-d */
```

### Using Blade Directive
You can format dates in the Views using the Blade Directive. All this does is proxy to the `format_date()` helper method.
```php
@date(new Carbon, 'long')
```
