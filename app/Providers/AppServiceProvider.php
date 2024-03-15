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
// use App\Models\DokLap;
use App\Models\DokLapN;
use App\Models\DokLp;
use App\Models\DokLphp;
use App\Models\DokLphpN;
use App\Models\DokLpN;
use App\Models\DokPengaman;
use App\Models\DokRiksa;
use App\Models\DokRiksaBadan;
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
// use App\Observers\DokLapObserver;
use App\Observers\DokLphpObserver;
use App\Observers\DokLpObserver;
use App\Observers\DokPengamanObserver;
use App\Observers\DokRiksaBadanObserver;
use App\Observers\DokRiksaObserver;
use App\Observers\DokSbpObserver;
use App\Observers\DokSegelObserver;
use App\Observers\DokTegahObserver;
use App\Observers\DokTitipObserver;
use App\Observers\DokTolakSbp1Observer;
use App\Observers\DokTolakSbp2Observer;
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
use App\Models\Intelijen\DokNiN;
use App\Models\Penindakan\DokLap;
use App\Models\Penindakan\DokLi;
use App\Observers\Intelijen\DokLkaiNObserver;
use App\Observers\Intelijen\DokLkaiObserver;
use App\Observers\Intelijen\DokLppiObserver;
use App\Observers\Intelijen\DokNhiNEximObserver;
use App\Observers\Intelijen\DokNhiNObserver;
use App\Observers\Intelijen\DokNhiObserver;
use App\Observers\Intelijen\DokNiObserver;
use App\Observers\Penindakan\DokLapObserver;
use App\Observers\Penindakan\DokLiObserver;
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
			'entitas-badan-hukum' => EntitasBadanHukum::class,
			'entitas-orang' => EntitasOrang::class,
			'item_barang' => DetailBarangItem::class,
			'orang' => RefEntitas::class,
			'pegawai' => RefUserCache::class,
			// Intelijen
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
			// Penindakan
			'penindakan' => Penindakan::class,
			'li' => DokLi::class,
			'lap' => DokLap::class,
			'riksa' => DokRiksa::class,
			'riksabadan' => DokRiksaBadan::class,
			'sarkut' => DetailSarkut::class,
			'segel' => DokSegel::class,
		]);

		// DetailBarangItem::observe((DetailBarangItemObserver::class));
		DokBukaPengaman::observe(DokBukaPengamanObserver::class);
		DokBukaSegel::observe(DokBukaSegelObserver::class);
		DokLapN::observe(DokLapObserver::class);
		
		DokLp::observe(DokLpObserver::class);
		DokLpN::observe(DokLpObserver::class);
		DokLphp::observe(DokLphpObserver::class);
		DokLphpN::observe(DokLphpObserver::class);
		DokPengaman::observe(DokPengamanObserver::class);
		DokRiksa::observe(DokRiksaObserver::class);
		DokRiksaBadan::observe(DokRiksaBadanObserver::class);
		DokSbp::observe(DokSbpObserver::class);
		DokSbpN::observe(DokSbpObserver::class);
		DokSegel::observe(DokSegelObserver::class);
		DokTegah::observe(DokTegahObserver::class);
		DokTitip::observe(DokTitipObserver::class);
		DokTolakSbp1::observe(DokTolakSbp1Observer::class);
		DokTolakSbp2::observe(DokTolakSbp2Observer::class);
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

		// Penindakan
		DokLi::observe(DokLiObserver::class);
		DokLap::observe(DokLapObserver::class);
    }
}
