<?php

namespace Database\Seeders;

use App\Models\Entitas\EntitasBadanHukum;
use App\Models\Entitas\EntitasOrang;
use App\Models\Penomoran;
use App\Models\References\RefTembusan;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Seeder;

class DokSeeder extends Seeder
{
	protected $docCode = null;
	protected $nipPelaksana = ['123456', '665544'];
	protected $nipPejabat = ['111', '2222', '147', '258', '156748'];
	protected $reNoSarkut = '[A-Z]{2}[0-9]{3}';
	protected $reNoAwb = '[A-Z]{3}[0-9]{8,10}';
	protected $reMerkKoli = '[A-Z0-9]{5,10}';

	public function __construct()
	{
		$this->year = date('Y');
		$this->faker = Faker::create();
		$this->model = Relation::getMorphedModel($this->docCode);
		$this->doc = new $this->model;
		$this->tipeDokumen = $this->doc->tipeDokumen;
		$this->agendaDokumen = $this->doc->agendaDokumen;
	}

	protected function getNewNumber()
	{
		$maxNumber = $this->model::max('no_dok');
		return $maxNumber + 1;
	}

	protected function createPenomoran($tipe=null, $agenda=null, $number=null)
	{
		$tipe = $tipe ? $tipe : $this->tipeDokumen;
		$agenda = $agenda ? $agenda : $this->agendaDokumen;
		$number = $number ? $number : $this->currentNumber;
		Penomoran::upsert([
			'tipe_dokumen' => $tipe,
			'agenda' => $agenda,
			'tahun' => $this->year,
			'nomor_terakhir' => $number,
		], ['tipe_dokumen','agenda','tahun'], ['nomor_terakhir']);
	}

	protected function getAvailableDocIds($code)
	{
		$model = Relation::getMorphedModel($code);
		$listId = $model::select('id')->where('kode_status', 'terbit')
			->get()
			->toArray();
		
		return array_map(function($d) {return $d['id'];}, $listId);
	}

	protected function chooseDocSource($code, $available_doc_id, $status='status_tindak_lanjut')
	{
		$doc_id = $this->faker->randomElement($available_doc_id);
		$model = Relation::getMorphedModel($code);
		$doc = $model::find($doc_id);
		$doc->followedUp($status);
		return $doc;
	}

	protected function choosePelaksana($list=null) {
		$nip = $list ? $list : $this->nipPelaksana;
		return $this->faker->randomElement($nip);
	}

	protected function createPetugas($doc, $posisi='petugas', $list=null)
	{
		$nip = $this->choosePelaksana($list);
		$analis = [
			'posisi' => $posisi,
			'flag_pejabat' => false,
			'nip' => $nip,
		];
		$doc->detail_petugas()->create($analis);
		return $nip;
	}

	protected function createPejabat($doc, $posisi='pejabat', $kodeJabatan=null, $defaultNip=null)
	{
		$nipsPlh = array_diff($this->nipPejabat, array($defaultNip));
		$tipe_ttd = $this->faker->randomElement(['plh', 'plt', null]);
		$nip_pejabat = $tipe_ttd != null ? $this->faker->randomElement($nipsPlh) : $defaultNip;
		$pejabat = [
			'posisi' => $posisi,
			'flag_pejabat' => true,
			'kode_jabatan' => $kodeJabatan,
			'tipe_ttd' => $tipe_ttd,
			'nip' => $nip_pejabat
		];
		$doc->detail_petugas()->create($pejabat);
	}

	protected function createTembusan($doc)
	{
		$cc_sample = ['Direktur P2', 'Kasubdit Intelijen', 'Kepala Kantor', 'PDTA', 'Kabid PFPC'];
		$cc_count = rand(0,3);

		for ($x = 1; $x <= $cc_count; $x++) {
			// Choose CC
			$cc = $this->faker->randomElement($cc_sample);
			$key = array_search($cc, $cc_sample);
			unset($cc_sample[$key]);

			// Check if CC exists in reference
			$cc_data = RefTembusan::where('uraian', $cc)->first();
			if ($cc_data == null) {
				$cc_data = RefTembusan::create(['uraian' => $cc]);
			}

			// Write tembusan
			$doc->tembusan()->attach([$cc_data->id => ['no_urut' => $x]]);
		}
	}

	protected function createEntity($parent)
	{
		$tipe_entitas = $this->faker->randomElement(['orang', 'badan-hukum']);
		if ($tipe_entitas=='orang') {
			$entitas = EntitasOrang::find($this->faker->numberBetween(1,100));
		} else {
			$entitas = EntitasBadanHukum::find($this->faker->numberBetween(1,100));
		}
		$parent->entitas()->associate($entitas)->save();
	}
}
