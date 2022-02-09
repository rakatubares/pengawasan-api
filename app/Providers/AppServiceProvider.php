<?php

namespace App\Providers;

use App\Models\DetailBangunan;
use App\Models\DetailBarang;
use App\Models\DetailDokumen;
use App\Models\DetailSarkut;
use App\Models\DokBast;
use App\Models\DokBukaPengaman;
use App\Models\DokBukaSegel;
use App\Models\DokLp;
use App\Models\DokLphp;
use App\Models\DokPengaman;
use App\Models\DokSbp;
use App\Models\DokSegel;
use App\Models\DokTitip;
use App\Models\DokTolakSbp1;
use App\Models\Penindakan;
use App\Models\RefEntitas;
use App\Models\RefUserCache;
use App\Models\Riksa;
use App\Models\Tegah;
use App\Observers\DokBukaPengamanObserver;
use App\Observers\DokBukaSegelObserver;
use App\Observers\DokLphpObserver;
use App\Observers\DokLpObserver;
use App\Observers\DokPengamanObserver;
use App\Observers\DokSbpObserver;
use App\Observers\DokSegelObserver;
use App\Observers\DokTitipObserver;
use App\Observers\DokTolakSbp1Observer;
use App\Observers\RiksaObserver;
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
			'bast' => DokBast::class,
			'bukasegel' => DokBukaSegel::class,
			'dokumen' => DetailDokumen::class,
			'orang' => RefEntitas::class,
			'pegawai' => RefUserCache::class,
			'penindakan' => Penindakan::class,
			'riksa' => Riksa::class,
			'sarkut' => DetailSarkut::class,
			'segel' => DokSegel::class,
			'tegah' => Tegah::class,
		]);

		DokBukaPengaman::observe(DokBukaPengamanObserver::class);
		DokBukaSegel::observe(DokBukaSegelObserver::class);
		DokLp::observe(DokLpObserver::class);
		DokLphp::observe(DokLphpObserver::class);
		DokPengaman::observe(DokPengamanObserver::class);
		DokSbp::observe(DokSbpObserver::class);
		DokSegel::observe(DokSegelObserver::class);
		DokTitip::observe(DokTitipObserver::class);
		DokTolakSbp1::observe((DokTolakSbp1Observer::class));
		Riksa::observe(RiksaObserver::class);
		Tegah::observe(TegahObserver::class);
    }
}
