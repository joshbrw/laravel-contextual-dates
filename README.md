# Laravel Contextual Dates

## Installation
1. Install the package via Composer:
    `composer require joshbrw/laravel-contextual-dates`
2. Add the Service Provider to `config/app.php`:
    `Joshbrw\LaravelContextualDates\ContextualDatesServiceProvider::class`
3. Configure the `DateTimeFactory` with the desired Timezone and Formats. These formats can be named whatever you like, i.e. `long` or `short`.
4. Use the `FormatsDates` trait or the helpers defined in `helpers.php` to localize/output the dates.

## Examples

### Using Container
```php
$dateTimeFactory = app(DateTimeFactory::class);
$dateTimeFactory->addFormat('mixed', 'Y-m-d');

$carbon = new \Carbon\Carbon;

$dateTime = $dateTimeFactory->createFromCarbon($carbon);

echo $dateTime->format('mixed'); /* Outputs in Y-m-d */
```

### Using Helpers
```php
$dateTimeFactory = app(DateTimeFactory::class);
$dateTimeFactory->addFormat('mixed', 'Y-m-d');

$carbon = new \Carbon\Carbon;

$instance = localize_date($carbon); /* Instance of DateTime */

echo format_date($carbon, 'mixed'); /* Outputs in Y-m-d */
```
