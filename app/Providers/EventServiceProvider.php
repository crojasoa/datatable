<?php

namespace App\Providers;

use App\Models\Article;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        // Aquí defines los eventos y sus listeners
    ];

    public function boot(): void
    {
        Article::observe(\App\Observers\ArticleObserver::class);
    }
}
