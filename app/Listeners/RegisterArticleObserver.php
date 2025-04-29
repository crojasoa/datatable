<?php

namespace App\Listeners;

use App\Models\Article;
use App\Observers\ArticleObserver;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RegisterArticleObserver
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        Article::observe(ArticleObserver::class);
    }
}
