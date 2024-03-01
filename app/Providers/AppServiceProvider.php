<?php

namespace App\Providers;

use App\Models\DetailBangunan;
use App\Models\DetailBarang;
use App\Models\DetailBarangItem;
use App\Models\DetailSarkut;
use App\Models\Intelijen\DokLkai;
use App\Models\DokLkaiN;
use App\Models\Intelijen\DokLppi;
use App\Models\DokLppiN;
use App\Models\Intelijen\DokNhi;
use App\Models\DokNhiN;
use App\Models\DokNiN;
use App\Models\Entitas\EntitasBadanHukum;
use App\Models\Entitas\EntitasOrang;
use App\Models\Intelijen\DokNhiBkc;
use App\Models\Intelijen\DokNhiExim;
use App\Models\Intelijen\DokNhiTertentu;
use App\Models\Intelijen\DokNi;
use App\Models\Penindakan;
use App\Models\RefEntitas;
use App\Observers\DokNhiNObserver;
use App\Observers\Intelijen\DokLkaiObserver;
use App\Observers\Intelijen\DokLppiObserver;
use App\Observers\Intelijen\DokNhiObserver;
use App\Observers\Intelijen\DokNiObserver;
use App\Services\SSO;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(SSO::class, function() {
			$request = app(Request::class);

			return new SSO($request);
		});
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Relation::enforceMorphMap([
			'bangunan' => DetailBangunan::class,
			'barang' => DetailBarang::class,
			'entitas-badan-hukum' => EntitasBadanHukum::class,
			'entitas-orang' => EntitasOrang::class,
			'item_barang' => DetailBarangItem::class,
			'lppi' => DokLppi::class,
			'lkai' => DokLkai::class,
			'nhi' => DokNhi::class,
			'nhi-exim' => DokNhiExim::class,
			'nhi-bkc' => DokNhiBkc::class,
			'nhi-tertentu' => DokNhiTertentu::class,
			'nhin' => DokNhiN::class,
			'ni' => DokNi::class,
			'nin' => DokNiN::class,
			'orang' => RefEntitas::class,
			'penindakan' => Penindakan::class,
			'sarkut' => DetailSarkut::class,
		]);

		// DetailBarangItem::observe((DetailBarangItemObserver::class));
		DokLkai::observe(DokLkaiObserver::class);
		DokLkaiN::observe(DokLkaiObserver::class);
		DokLppi::observe(DokLppiObserver::class);
		DokLppiN::observe(DokLppiObserver::class);
		DokNhi::observe(DokNhiObserver::class);
		DokNhiN::observe(DokNhiNObserver::class);
		DokNi::observe(DokNiObserver::class);
		DokNiN::observe(DokNiObserver::class);
    }
}
