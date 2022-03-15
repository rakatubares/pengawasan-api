<?php

namespace App\Observers;

use App\Models\DetailBarangItem;

class DetailBarangItemObserver
{
	/**
	 * Handle the DetailBarangItem "created" event.
	 *
	 * @param  \App\Models\DetailBarangItem  $detailBarangItem
	 * @return void
	 */
	public function created(DetailBarangItem $detailBarangItem)
	{
		//
	}

	/**
	 * Handle the DetailBarangItem "updated" event.
	 *
	 * @param  \App\Models\DetailBarangItem  $detailBarangItem
	 * @return void
	 */
	public function updated(DetailBarangItem $detailBarangItem)
	{
		//
	}

	/**
	 * Handle the DetailBarangItem "deleted" event.
	 *
	 * @param  \App\Models\DetailBarangItem  $detailBarangItem
	 * @return void
	 */
	public function deleted(DetailBarangItem $detailBarangItem)
	{
		$images = $detailBarangItem->images;
		foreach ($images as $image) {
			$image->delete();
		}
	}

	/**
	 * Handle the DetailBarangItem "restored" event.
	 *
	 * @param  \App\Models\DetailBarangItem  $detailBarangItem
	 * @return void
	 */
	public function restored(DetailBarangItem $detailBarangItem)
	{
		//
	}

	/**
	 * Handle the DetailBarangItem "force deleted" event.
	 *
	 * @param  \App\Models\DetailBarangItem  $detailBarangItem
	 * @return void
	 */
	public function forceDeleted(DetailBarangItem $detailBarangItem)
	{
		//
	}
}
