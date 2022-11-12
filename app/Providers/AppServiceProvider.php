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
use App\Models\DokPengaman;
use App\Models\DokRiksa;
use App\Models\DokRiksaBadan;
use App\Models\DokSegel;
use App\Models\Penindakan;
use App\Models\RefEntitas;
use App\Models\RefUserCache;
use App\Observers\DetailBarangItemObserver;
use App\Observers\DokBukaPengamanObserver;
use App\Observers\DokBukaSegelObserver;
use App\Observers\DokLapObserver;
use App\Observers\DokLiObserver;
use App\Observers\DokPengamanObserver;
use App\Observers\DokRiksaObserver;
use App\Observers\DokRiksaBadanObserver;
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
			'bast' => DokBast::class,
			'bukasegel' => DokBukaSegel::class,
			'dokumen' => DetailDokumen::class,
			'item_barang' => DetailBarangItem::class,
			'orang' => RefEntitas::class,
			'pegawai' => RefUserCache::class,
			'penindakan' => Penindakan::class,
			'riksa' => DokRiksa::class,
			'riksabadan' => DokRiksaBadan::class,
			'sarkut' => DetailSarkut::class,
			'segel' => DokSegel::class,
		]);

		DetailBarangItem::observe((DetailBarangItemObserver::class));
		DokBukaPengaman::observe(DokBukaPengamanObserver::class);
		DokBukaSegel::observe(DokBukaSegelObserver::class);
		DokLap::observe(DokLapObserver::class);
		DokLi::observe(DokLiObserver::class);
		DokPengaman::observe(DokPengamanObserver::class);
		DokRiksa::observe(DokRiksaObserver::class);
		DokRiksaBadan::observe(DokRiksaBadanObserver::class);
		DokSegel::observe(DokSegelObserver::class);
    }
}
