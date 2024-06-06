<?php

namespace App\Providers;

use App\Models\DetailBangunan;
use App\Models\DetailBarang;
use App\Models\DetailBarangItem;
use App\Models\DetailDokumen;
use App\Models\DokBast;
use App\Models\DokLapN;
use App\Models\DokLpN;
use App\Models\DokTitip;
use App\Models\RefEntitas;
use App\Models\RefUserCache;
use App\Observers\DokTitipObserver;
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
use App\Models\Penindakan\DokBukaPengaman;
use App\Models\Penindakan\DokBukaSegel;
use App\Models\Penindakan\DokLap;
use App\Models\Penindakan\DokLi;
use App\Models\Penindakan\DokLp;
use App\Models\Penindakan\DokLphp;
use App\Models\Penindakan\DokLptp;
use App\Models\Penindakan\DokPengaman;
use App\Models\Penindakan\DokRiksa;
use App\Models\Penindakan\DokRiksaBadan;
use App\Models\Penindakan\DokSbp;
use App\Models\Penindakan\DokSegel;
use App\Models\Penindakan\DokTegah;
use App\Models\Penindakan\DokTolakSbp1;
use App\Models\Penindakan\DokTolakSbp2;
use App\Models\Penindakan\Penindakan;
use App\Models\Penindakan\PenindakanBarang;
use App\Observers\Intelijen\DokLkaiNObserver;
use App\Observers\Intelijen\DokLkaiObserver;
use App\Observers\Intelijen\DokLppiObserver;
use App\Observers\Intelijen\DokNhiNEximObserver;
use App\Observers\Intelijen\DokNhiNObserver;
use App\Observers\Intelijen\DokNhiObserver;
use App\Observers\Intelijen\DokNiObserver;
use App\Observers\Penindakan\DokBukaPengamanObserver;
use App\Observers\Penindakan\DokBukaSegelObserver;
use App\Observers\Penindakan\DokLapObserver;
use App\Observers\Penindakan\DokLiObserver;
use App\Observers\Penindakan\DokLphpObserver;
use App\Observers\Penindakan\DokLpObserver;
use App\Observers\Penindakan\DokLptpObserver;
use App\Observers\Penindakan\DokPengamanObserver;
use App\Observers\Penindakan\DokRiksaBadanObserver;
use App\Observers\Penindakan\DokRiksaObserver;
use App\Observers\Penindakan\DokSbpObserver;
use App\Observers\Penindakan\DokSegelObserver;
use App\Observers\Penindakan\DokTegahObserver;
use App\Observers\Penindakan\DokTolakSbp1Observer;
use App\Observers\Penindakan\DokTolakSbp2Observer;
use App\Services\ResourceRegistrar;
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

		// Custom route registration
		// https://stackoverflow.com/questions/16661292/add-new-methods-to-a-resource-controller-in-laravel
		$registrar = new ResourceRegistrar($this->app['router']);
		$this->app->bind('Illuminate\Routing\ResourceRegistrar', function () use ($registrar) {
			return $registrar;
		});
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
		/**
		 * Models
		 */
        Relation::enforceMorphMap([
			'bangunan' => DetailBangunan::class,
			'barang' => DetailBarang::class,
			'bast' => DokBast::class,
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
			'li' => DokLi::class,
			'lap' => DokLap::class,
			'penindakan' => Penindakan::class,
			'penindakan-barang' => PenindakanBarang::class,
			'riksa_badan' => DokRiksaBadan::class,
			'riksa' => DokRiksa::class,
			'tegah' => DokTegah::class,
			'segel' => DokSegel::class,
			'buka_segel' => DokBukaSegel::class,
			'sbp' => DokSbp::class,
			'tolak1' => DokTolakSbp1::class,
			'tolak2' => DokTolakSbp2::class,
			'lptp' => DokLptp::class,
			'lphp' => DokLphp::class,
			'lp' => DokLp::class,

			'pengaman' => DokPengaman::class,
			'buka_pengaman' => DokBukaPengaman::class,
		]);

		/**
		 * Observers
		 */
		DokLapN::observe(DokLapObserver::class);
		
		DokLpN::observe(DokLpObserver::class);
		DokTitip::observe(DokTitipObserver::class);
		
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
		DokRiksaBadan::observe(DokRiksaBadanObserver::class);
		DokRiksa::observe(DokRiksaObserver::class);
		DokTegah::observe(DokTegahObserver::class);
		DokSegel::observe(DokSegelObserver::class);
		DokBukaSegel::observe(DokBukaSegelObserver::class);
		DokSbp::observe(DokSbpObserver::class);
		DokTolakSbp1::observe(DokTolakSbp1Observer::class);
		DokTolakSbp2::observe(DokTolakSbp2Observer::class);
		DokLptp::observe(DokLptpObserver::class);
		DokLphp::observe(DokLphpObserver::class);
		DokLp::observe(DokLpObserver::class);

		DokPengaman::observe(DokPengamanObserver::class);
		DokBukaPengaman::observe(DokBukaPengamanObserver::class);
    }
}
