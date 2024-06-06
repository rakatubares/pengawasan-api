<?php

namespace Database\Seeders\Penindakan;

class DokLapNSeeder extends DokLapSeeder
{
	public function __construct()
	{
		parent::__construct(
			'lapn',
			[
				'nhin' => 'NHI-N',
				'lainnya' => 'Lainnya'
			]
		);
	}
}
