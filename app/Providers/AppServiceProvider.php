<?php

namespace App\Providers;

use App\Models\DetailBangunan;
use App\Models\DetailBarang;
use App\Models\DetailSarkut;
use App\Models\DokLp;
use App\Models\DokLphp;
use App\Models\Penindakan;
use App\Models\RefEntitas;
use App\Models\Sbp;
use App\Models\Segel;
use App\Models\Tegah;
use App\Observers\DokLphpObserver;
use App\Observers\DokLpObserver;
use App\Observers\SbpObserver;
use App\Observers\TegahObserver;
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
		DokLphp::observe(DokLphpObserver::class);
		Sbp::observe(SbpObserver::class);
		Tegah::observe(TegahObserver::class);
    }
}
