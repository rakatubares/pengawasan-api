<?php

namespace App\Providers;

use App\Models\BukaSegel;
use App\Models\DetailBangunan;
use App\Models\DetailBarang;
use App\Models\DetailSarkut;
use App\Models\DokLphp;
use App\Models\Penindakan;
use App\Models\RefEntitas;
use App\Models\Riksa;
use App\Models\Sbp;
use App\Models\Segel;
use App\Models\Tegah;
use App\Observers\BukaSegelObserver;
use App\Observers\DokLphpObserver;
use App\Observers\RiksaObserver;
use App\Observers\SbpObserver;
use App\Observers\SegelObserver;
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
			'bukasegel' => BukaSegel::class,
			'orang' => RefEntitas::class,
			'penindakan' => Penindakan::class,
			'riksa' => Riksa::class,
			'sarkut' => DetailSarkut::class,
		]);

		BukaSegel::observe(BukaSegelObserver::class);
		DokLphp::observe(DokLphpObserver::class);
		Riksa::observe(RiksaObserver::class);
		Sbp::observe(SbpObserver::class);
		Segel::observe(SegelObserver::class);
		Tegah::observe(TegahObserver::class);
    }
}
