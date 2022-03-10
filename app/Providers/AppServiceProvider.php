<?php

namespace App\Providers;

use App\Models\DetailBangunan;
use App\Models\DetailBarang;
use App\Models\DetailBarangItem;
use App\Models\DetailDokumen;
use App\Models\DetailSarkut;
use App\Models\DokBast;
use App\Models\DokBukaPengaman;
use App\Models\DokBukaSegel;
use App\Models\DokLap;
use App\Models\DokLi;
use App\Models\DokLp;
use App\Models\DokLpN;
use App\Models\DokLphp;
use App\Models\DokLphpN;
use App\Models\DokPengaman;
use App\Models\DokRiksa;
use App\Models\DokSbp;
use App\Models\DokSbpN;
use App\Models\DokSegel;
use App\Models\DokTegah;
use App\Models\DokTitip;
use App\Models\DokTolakSbp1;
use App\Models\DokTolakSbp2;
use App\Models\Penindakan;
use App\Models\RefEntitas;
use App\Models\RefUserCache;
use App\Observers\DetailBarangItemObserver;
use App\Observers\DokBukaPengamanObserver;
use App\Observers\DokBukaSegelObserver;
use App\Observers\DokLapObserver;
use App\Observers\DokLiObserver;
use App\Observers\DokLphpObserver;
use App\Observers\DokLpObserver;
use App\Observers\DokPengamanObserver;
use App\Observers\DokRiksaObserver;
use App\Observers\DokSbpObserver;
use App\Observers\DokSegelObserver;
use App\Observers\DokTegahObserver;
use App\Observers\DokTitipObserver;
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
			'bast' => DokBast::class,
			'bukasegel' => DokBukaSegel::class,
			'dokumen' => DetailDokumen::class,
			'item_barang' => DetailBarangItem::class,
			'orang' => RefEntitas::class,
			'pegawai' => RefUserCache::class,
			'penindakan' => Penindakan::class,
			'riksa' => DokRiksa::class,
			'sarkut' => DetailSarkut::class,
			'segel' => DokSegel::class,
			'tegah' => DokTegah::class,
		]);

		DetailBarangItem::observe((DetailBarangItemObserver::class));
		DokBukaPengaman::observe(DokBukaPengamanObserver::class);
		DokBukaSegel::observe(DokBukaSegelObserver::class);
		DokLap::observe(DokLapObserver::class);
		DokLi::observe(DokLiObserver::class);
		DokLp::observe(DokLpObserver::class);
		DokLpN::observe(DokLpObserver::class);
		DokLphp::observe(DokLphpObserver::class);
		DokLphpN::observe(DokLphpObserver::class);
		DokPengaman::observe(DokPengamanObserver::class);
		DokRiksa::observe(DokRiksaObserver::class);
		DokSbp::observe(DokSbpObserver::class);
		DokSbpN::observe(DokSbpObserver::class);
		DokSegel::observe(DokSegelObserver::class);
		DokTegah::observe(DokTegahObserver::class);
		DokTitip::observe(DokTitipObserver::class);
		DokTolakSbp1::observe(DokTolakSbp1Observer::class);
		DokTolakSbp2::observe(DokTolakSbp2Observer::class);
    }
}
