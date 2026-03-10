<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\News;
use App\Models\File;
use App\Models\Theme;
use App\Models\Subtheme;

class PurgeDeleted extends Command
{
    protected $signature = 'app:purge-deleted';
    protected $description = 'Elimina permanentemente registros (noticias, temáticas, subtemáticas, ayudas) borrados hace más de 5 meses';

    public function handle()
    {
        // $fecha = now()->subMonths(5);
        $fecha = now()->subSeconds(10); // Para pruebas, eliminar después (php artisan app:purge-deleted)

        $noticias = News::onlyTrashed()
            ->where('deleted_at', '<=', $fecha)
            ->forceDelete();

        $ayudas = File::onlyTrashed()
            ->where('deleted_at', '<=', $fecha)
            ->forceDelete();

        $tematicas = Theme::onlyTrashed()
            ->where('deleted_at', '<=', $fecha)
            ->forceDelete();

        $subtematicas = Subtheme::onlyTrashed()
            ->where('deleted_at', '<=', $fecha)
            ->forceDelete();

        $this->info("Noticias eliminadas: {$noticias}");
        $this->info("Ayudas eliminadas: {$ayudas}");
        $this->info("Temáticas eliminadas: {$tematicas}");
        $this->info("Subtemáticas eliminadas: {$subtematicas}");
    }
}