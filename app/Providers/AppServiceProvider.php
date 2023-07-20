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
use App\Models\DokLapN;
use App\Models\DokLhp;
use App\Models\DokLi;
use App\Models\DokLp;
use App\Models\DokLpf;
use App\Models\DokLphp;
use App\Models\DokLphpN;
use App\Models\DokLpN;
use App\Models\DokLkai;
use App\Models\DokLkaiN;
use App\Models\DokLpp;
use App\Models\DokLppi;
use App\Models\DokLppiN;
use App\Models\DokLrp;
use App\Models\DokNhi;
use App\Models\DokNhiN;
use App\Models\DokNi;
use App\Models\DokNiN;
use App\Models\DokPengaman;
use App\Models\DokRiksa;
use App\Models\DokRiksaBadan;
use App\Models\DokSbp;
use App\Models\DokSbpN;
use App\Models\DokSegel;
use App\Models\DokSplit;
use App\Models\DokTegah;
use App\Models\DokTitip;
use App\Models\DokTolakSbp1;
use App\Models\DokTolakSbp2;
use App\Models\Penindakan;
use App\Models\RefEntitas;
use App\Models\RefUserCache;
use App\Models\TrackingSbp;
use App\Observers\DetailBarangItemObserver;
use App\Observers\DokBukaPengamanObserver;
use App\Observers\DokBukaSegelObserver;
use App\Observers\DokLapObserver;
use App\Observers\DokLhpObserver;
use App\Observers\DokLiObserver;
use App\Observers\DokLpfObserver;
use App\Observers\DokLphpObserver;
use App\Observers\DokLpObserver;
use App\Observers\DokLppObserver;
use App\Observers\DokLkaiObserver;
use App\Observers\DokLppiObserver;
use App\Observers\DokLrpObserver;
use App\Observers\DokNhiNObserver;
use App\Observers\DokNhiObserver;
use App\Observers\DokNiObserver;
use App\Observers\DokPengamanObserver;
use App\Observers\DokRiksaBadanObserver;
use App\Observers\DokRiksaObserver;
use App\Observers\DokSbpObserver;
use App\Observers\DokSegelObserver;
use App\Observers\DokSplitObserver;
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
			'nhi' => DokNhi::class,
			'nhin' => DokNhiN::class,
			'item_barang' => DetailBarangItem::class,
			'lhp' => DokLhp::class,
			'lrp' => DokLrp::class,
			'nhi' => DokNhi::class,
			'nhin' => DokNhiN::class,
			'ni' => DokNi::class,
			'nin' => DokNiN::class,
			'orang' => RefEntitas::class,
			'pegawai' => RefUserCache::class,
			'penindakan' => Penindakan::class,
			'riksa' => DokRiksa::class,
			'riksabadan' => DokRiksaBadan::class,
			'sarkut' => DetailSarkut::class,
			'segel' => DokSegel::class,
			'split' => DokSplit::class,
			'tegah' => DokTegah::class,
			'tracking_sbp' => TrackingSbp::class,
		]);

		DetailBarangItem::observe((DetailBarangItemObserver::class));
		DokBukaPengaman::observe(DokBukaPengamanObserver::class);
		DokBukaSegel::observe(DokBukaSegelObserver::class);
		DokLap::observe(DokLapObserver::class);
		DokLapN::observe(DokLapObserver::class);
		DokLhp::observe(DokLhpObserver::class);
		DokLi::observe(DokLiObserver::class);
		DokLp::observe(DokLpObserver::class);
		DokLpN::observe(DokLpObserver::class);
		DokLphp::observe(DokLphpObserver::class);
		DokLphpN::observe(DokLphpObserver::class);
		DokLpf::observe(DokLpfObserver::class);
		DokLpp::observe(DokLppObserver::class);
		DokLkai::observe(DokLkaiObserver::class);
		DokLkaiN::observe(DokLkaiObserver::class);
		DokLppi::observe(DokLppiObserver::class);
		DokLppiN::observe(DokLppiObserver::class);
		DokLrp::observe(DokLrpObserver::class);
		DokNhi::observe(DokNhiObserver::class);
		DokNhiN::observe(DokNhiNObserver::class);
		DokNi::observe(DokNiObserver::class);
		DokNiN::observe(DokNiObserver::class);
		DokPengaman::observe(DokPengamanObserver::class);
		DokRiksa::observe(DokRiksaObserver::class);
		DokRiksaBadan::observe(DokRiksaBadanObserver::class);
		DokSbp::observe(DokSbpObserver::class);
		DokSbpN::observe(DokSbpObserver::class);
		DokSegel::observe(DokSegelObserver::class);
		DokSplit::observe(DokSplitObserver::class);
		DokTegah::observe(DokTegahObserver::class);
		DokTitip::observe(DokTitipObserver::class);
		DokTolakSbp1::observe(DokTolakSbp1Observer::class);
		DokTolakSbp2::observe(DokTolakSbp2Observer::class);
    }
}
