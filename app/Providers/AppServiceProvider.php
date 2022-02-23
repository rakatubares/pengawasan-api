<?php

namespace App\Providers;

use App\Models\DetailBangunan;
use App\Models\DetailBarang;
use App\Models\DetailSarkut;
use App\Models\DokLp;
use App\Models\DokLphp;
use App\Models\DokLphpN;
use App\Models\DokLpN;
use App\Models\DokRiksa;
use App\Models\DokSbp;
use App\Models\DokSbpN;
use App\Models\DokSegel;
use App\Models\DokTegah;
use App\Models\DokTolakSbp1;
use App\Models\DokTolakSbp2;
use App\Models\Penindakan;
use App\Models\RefEntitas;
use App\Observers\DokLphpObserver;
use App\Observers\DokLpObserver;
use App\Observers\DokRiksaObserver;
use App\Observers\DokSbpObserver;
use App\Observers\DokSegelObserver;
use App\Observers\DokTegahObserver;
use App\Observers\DokTolakSbp1Observer;
use App\Observers\DokTolakSbp2Observer;
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
			'orang' => RefEntitas::class,
			'penindakan' => Penindakan::class,
			'sarkut' => DetailSarkut::class,
		]);

		DokLp::observe(DokLpObserver::class);
		DokLpN::observe(DokLpObserver::class);
		DokLphp::observe(DokLphpObserver::class);
		DokLphpN::observe(DokLphpObserver::class);
		DokSbp::observe(DokSbpObserver::class);
		DokSbpN::observe(DokSbpObserver::class);
		DokSegel::observe(DokSegelObserver::class);
		DokTegah::observe(DokTegahObserver::class);
		DokTolakSbp1::observe(DokTolakSbp1Observer::class);
		DokTolakSbp2::observe(DokTolakSbp2Observer::class);
		DokRiksa::observe(DokRiksaObserver::class);
    }
}
