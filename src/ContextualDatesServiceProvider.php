<?php

namespace Joshbrw\LaravelContextualDates;

use Illuminate\Support\ServiceProvider;
use Joshbrw\LaravelContextualDates\Concretes\ConcreteDateTimeFactory;
use Joshbrw\LaravelContextualDates\Contracts\DateTimeFactory;

class ContextualDatesServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->singleton(DateTimeFactory::class, ConcreteDateTimeFactory::class);
    }

}
