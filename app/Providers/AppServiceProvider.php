<?php

namespace App\Providers;

use App\Models\DetailBangunan;
use App\Models\DetailBarang;
use App\Models\DetailBarangItem;
use App\Models\DetailSarkut;
use App\Models\DokLkai;
use App\Models\DokLkaiN;
use App\Models\DokLppi;
use App\Models\DokLppiN;
use App\Models\DokNhi;
use App\Models\DokNhiN;
use App\Models\DokNi;
use App\Models\Penindakan;
use App\Models\RefEntitas;
use App\Observers\DetailBarangItemObserver;
use App\Observers\DokLkaiObserver;
use App\Observers\DokLppiObserver;
use App\Observers\DokNhiNObserver;
use App\Observers\DokNhiObserver;
use App\Observers\DokNiObserver;
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
			'item_barang' => DetailBarangItem::class,
			'nhi' => DokNhi::class,
			'nhin' => DokNhiN::class,
			'ni' => DokNi::class,
			'orang' => RefEntitas::class,
			'penindakan' => Penindakan::class,
			'sarkut' => DetailSarkut::class,
		]);

		DetailBarangItem::observe((DetailBarangItemObserver::class));
		DokLkai::observe(DokLkaiObserver::class);
		DokLkaiN::observe(DokLkaiObserver::class);
		DokLppi::observe(DokLppiObserver::class);
		DokLppiN::observe(DokLppiObserver::class);
		DokNhi::observe(DokNhiObserver::class);
		DokNhiN::observe(DokNhiNObserver::class);
		DokNi::observe(DokNiObserver::class);
    }
}
