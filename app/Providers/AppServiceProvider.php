<?php

namespace App\Providers;

use App\Models\DetailBangunan;
use App\Models\DetailBarang;
use App\Models\DetailBarangItem;
use App\Models\DetailSarkut;
use App\Models\DokNiN;
use App\Models\Entitas\EntitasBadanHukum;
use App\Models\Entitas\EntitasOrang;
use App\Models\Intelijen\DokLkai;
use App\Models\Intelijen\DokLkaiN;
use App\Models\Intelijen\DokLppi;
use App\Models\Intelijen\DokLppiN;
use App\Models\Intelijen\DokNhi;
use App\Models\Intelijen\DokNhiBkc;
use App\Models\Intelijen\DokNhiExim;
use App\Models\Intelijen\DokNhiN;
use App\Models\Intelijen\DokNhiNExim;
use App\Models\Intelijen\DokNhiNOrang;
use App\Models\Intelijen\DokNhiNSarkut;
use App\Models\Intelijen\DokNhiTertentu;
use App\Models\Intelijen\DokNi;
use App\Models\Penindakan;
use App\Models\RefEntitas;
use App\Observers\Intelijen\DokLkaiNObserver;
use App\Observers\Intelijen\DokLkaiObserver;
use App\Observers\Intelijen\DokLppiObserver;
use App\Observers\Intelijen\DokNhiNEximObserver;
use App\Observers\Intelijen\DokNhiNObserver;
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
			'lppin' => DokLppiN::class,
			'lkai' => DokLkai::class,
			'lkain' => DokLkaiN::class,
			'nhi' => DokNhi::class,
			'nhi-exim' => DokNhiExim::class,
			'nhi-bkc' => DokNhiBkc::class,
			'nhi-tertentu' => DokNhiTertentu::class,
			'nhin' => DokNhiN::class,
			'nhin-exim' => DokNhiNExim::class,
			'nhin-sarkut' => DokNhiNSarkut::class,
			'nhin-orang' => DokNhiNOrang::class,
			'ni' => DokNi::class,
			'nin' => DokNiN::class,
			'orang' => RefEntitas::class,
			'penindakan' => Penindakan::class,
			'sarkut' => DetailSarkut::class,
		]);

		// Intelijen
		DokLppi::observe(DokLppiObserver::class);
		DokLkai::observe(DokLkaiObserver::class);
		DokNhi::observe(DokNhiObserver::class);
		DokNi::observe(DokNiObserver::class);
		
		DokLppiN::observe(DokLppiObserver::class);
		DokLkaiN::observe(DokLkaiNObserver::class);
		DokNhiN::observe(DokNhiNObserver::class);
		DokNhiNExim::observe(DokNhiNEximObserver::class);
		DokNiN::observe(DokNiObserver::class);
    }
}
