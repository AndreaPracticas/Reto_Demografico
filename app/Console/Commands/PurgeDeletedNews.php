<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\News;

class PurgeDeletedNews extends Command
{
    protected $signature = 'news:purge';
    protected $description = 'Elimina permanentemente las noticias borradas hace más de 5 meses';

    public function handle()
    {
        $count = News::onlyTrashed()
            ->where('deleted_at', '<=', now()->subMonths(5))
            ->forceDelete();

        $this->info("Se eliminaron {$count} noticias permanentemente.");
    }
}