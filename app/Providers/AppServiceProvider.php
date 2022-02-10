<?php

namespace App\Providers;

use App\Models\DetailBangunan;
use App\Models\DetailBarang;
use App\Models\DetailSarkut;
use App\Models\DokBukaSegel;
use App\Models\DokSegel;
use App\Models\Penindakan;
use App\Models\RefEntitas;
use App\Observers\DokBukaSegelObserver;
use App\Observers\DokSegelObserver;
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
			'bukasegel' => DokBukaSegel::class,
			'orang' => RefEntitas::class,
			'penindakan' => Penindakan::class,
			'sarkut' => DetailSarkut::class,
			'segel' => DokSegel::class,
		]);

		DokBukaSegel::observe(DokBukaSegelObserver::class);
		DokSegel::observe(DokSegelObserver::class);
    }
}
