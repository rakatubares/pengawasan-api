<?php

namespace App\Providers;

use App\Models\DetailBangunan;
use App\Models\DetailBarang;
use App\Models\DetailBarangItem;
use App\Models\DetailSarkut;
use App\Models\DokLhp;
use App\Models\DokLp;
use App\Models\DokLpf;
use App\Models\DokLphp;
use App\Models\DokLpp;
use App\Models\DokLrp;
use App\Models\DokRiksa;
use App\Models\DokRiksaBadan;
use App\Models\DokSbp;
use App\Models\DokSegel;
use App\Models\DokSplit;
use App\Models\DokTegah;
use App\Models\Penindakan;
use App\Models\RefEntitas;
use App\Models\RefUserCache;
use App\Models\TrackingSbp;
use App\Observers\DetailBarangItemObserver;
use App\Observers\DokLhpObserver;
use App\Observers\DokLpfObserver;
use App\Observers\DokLphpObserver;
use App\Observers\DokLpObserver;
use App\Observers\DokLppObserver;
use App\Observers\DokRiksaBadanObserver;
use App\Observers\DokRiksaObserver;
use App\Observers\DokSbpObserver;
use App\Observers\DokSegelObserver;
use App\Observers\DokSplitObserver;
use App\Observers\DokTegahObserver;
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
			'item_barang' => DetailBarangItem::class,
			'lhp' => DokLhp::class,
			'lrp' => DokLrp::class,
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
		DokLhp::observe(DokLhpObserver::class);
		DokLp::observe(DokLpObserver::class);
		DokLphp::observe(DokLphpObserver::class);
		DokLpf::observe(DokLpfObserver::class);
		DokLpp::observe(DokLppObserver::class);
		DokRiksa::observe(DokRiksaObserver::class);
		DokRiksaBadan::observe(DokRiksaBadanObserver::class);
		DokSbp::observe(DokSbpObserver::class);
		DokSegel::observe(DokSegelObserver::class);
		DokSplit::observe(DokSplitObserver::class);
		DokTegah::observe(DokTegahObserver::class);
    }
}
