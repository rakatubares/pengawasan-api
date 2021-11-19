<?php

namespace Database\Seeders;

use App\Models\RefSatuan;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class RefSatuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$now = Carbon::now('utc')->toDateTimeString();
        $data = [
			[
				"kode_satuan" => "ACR",
				"uraian_satuan" => "Acre (4840 yd2)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "ADP",
				"uraian_satuan" => "Andorran Peseta",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "AED",
				"uraian_satuan" => "UAE  Dirham",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "AFA",
				"uraian_satuan" => "Afghani",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "AFN",
				"uraian_satuan" => "Afghani",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "ALL",
				"uraian_satuan" => "Lek",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "AMD",
				"uraian_satuan" => "Armenian Dram",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "AMH",
				"uraian_satuan" => "Ampere-hour  (3,6 kC)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "AMP",
				"uraian_satuan" => "Ampere",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "ANG",
				"uraian_satuan" => "Netherlands Antillian Guilder",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "ANN",
				"uraian_satuan" => "Year",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "AOA",
				"uraian_satuan" => "Kwanza",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "AON",
				"uraian_satuan" => "New Kwanza",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "APZ",
				"uraian_satuan" => "Ounce GB,US (31,10348 g)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "ARE",
				"uraian_satuan" => "Are (100m2)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "ARS",
				"uraian_satuan" => "Argentina Peso",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "ATM",
				"uraian_satuan" => "Standard atmosphere (101325 Pa)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "ATS",
				"uraian_satuan" => "Schilling",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "ATT",
				"uraian_satuan" => "Technical atmosphere (98066,5 Pa)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "AUD",
				"uraian_satuan" => "Australian Dollar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "AWG",
				"uraian_satuan" => "Aruban Guilder",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "AZM",
				"uraian_satuan" => "Azerbaijanian Manat",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "AZN",
				"uraian_satuan" => "Azerbaijanian Manat",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "BAM",
				"uraian_satuan" => "Convertible Marks",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "BAR",
				"uraian_satuan" => "Bar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "BBD",
				"uraian_satuan" => "Barbados Dollar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "BDT",
				"uraian_satuan" => "Taka",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "BEF",
				"uraian_satuan" => "Belgian Franc",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "BGL",
				"uraian_satuan" => "Lev",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "BGN",
				"uraian_satuan" => "Bulgarian Lev",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "BHD",
				"uraian_satuan" => "Bahraini Dinar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "BHP",
				"uraian_satuan" => "brake horse power",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "BIF",
				"uraian_satuan" => "Burundi Franc",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "BIL",
				"uraian_satuan" => "Trillion US / Billion",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "BLD",
				"uraian_satuan" => "Dry barrel (115,627 dm3)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "BLL",
				"uraian_satuan" => "Barrel (petroleum) (458,987 dm3)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "BMD",
				"uraian_satuan" => "Bermudian Dollar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "BND",
				"uraian_satuan" => "Brunei Dollar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "BOB",
				"uraian_satuan" => "Boliaiano",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "BOV",
				"uraian_satuan" => "Mvdol",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "BQL",
				"uraian_satuan" => "becquerel",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "BRL",
				"uraian_satuan" => "Brazilian Real",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "BSD",
				"uraian_satuan" => "Bahamian Dollar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "BTN",
				"uraian_satuan" => "Ngultrum",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "BTU",
				"uraian_satuan" => "British thermal unit",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "BUA",
				"uraian_satuan" => "Bushel (35,2391 dm3)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "BUI",
				"uraian_satuan" => "Bushel (36,36874 dm3)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "BWP",
				"uraian_satuan" => "Pula",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "BYB",
				"uraian_satuan" => "Belarussian Ruble",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "BYR",
				"uraian_satuan" => "Belarussian Ruble",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "BZD",
				"uraian_satuan" => "Belize Dollar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "CAD",
				"uraian_satuan" => "Canadian Dollar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "CCT",
				"uraian_satuan" => "Carrying capacity in metric tonnes",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "CDF",
				"uraian_satuan" => "Congolese Franc",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "CDL",
				"uraian_satuan" => "Candela",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "CEL",
				"uraian_satuan" => "Degree celcius",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "CEN",
				"uraian_satuan" => "Hundred",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "CGM",
				"uraian_satuan" => "centigram",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "CHE",
				"uraian_satuan" => "WIR Euro",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "CHF",
				"uraian_satuan" => "Swiss Franc",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "CHW",
				"uraian_satuan" => "WIR Franc",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "CKG",
				"uraian_satuan" => "Coulomb per kilogram",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "CLP",
				"uraian_satuan" => "Chilean Peso",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "CLT",
				"uraian_satuan" => "Centilitre",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "CMK",
				"uraian_satuan" => "Square centimetre",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "CMQ",
				"uraian_satuan" => "Cubic centimetre",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "CMT",
				"uraian_satuan" => "Centimetre",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "CNP",
				"uraian_satuan" => "Hundred packs",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "CNT",
				"uraian_satuan" => "Cental GB (45,359237 kg)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "CNY",
				"uraian_satuan" => "Yuan Renminbi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "COP",
				"uraian_satuan" => "Colombian Peso",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "COU",
				"uraian_satuan" => "Coulomb",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "CRC",
				"uraian_satuan" => "Costa Rican Colon",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "CTM",
				"uraian_satuan" => "Metric carat (200 mg = 2.10-4 kg)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "CUC",
				"uraian_satuan" => "Peso Convertible",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "CUP",
				"uraian_satuan" => "Cuban Peso",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "CUR",
				"uraian_satuan" => "curie",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "CVE",
				"uraian_satuan" => "Cape Verde Escudo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "CWA",
				"uraian_satuan" => "Hundredweight, US (45,3592 kg)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "CWI",
				"uraian_satuan" => "Long/ hundredweight GB (50,802345 kg)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "CYP",
				"uraian_satuan" => "Cyprus Pound",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "CZK",
				"uraian_satuan" => "Czech Koruna",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "DAA",
				"uraian_satuan" => "Decare",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "DAD",
				"uraian_satuan" => "Ten day",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "DAY",
				"uraian_satuan" => "Day",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "DBC",
				"uraian_satuan" => "Decade (ten years)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "DEM",
				"uraian_satuan" => "Deustche Mark",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "DJF",
				"uraian_satuan" => "Djibouti Franc",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "DKK",
				"uraian_satuan" => "Danish Krone",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "DLT",
				"uraian_satuan" => "decilitre",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "DMA",
				"uraian_satuan" => "cubic decametre",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "DMK",
				"uraian_satuan" => "Square decimetre",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "DMQ",
				"uraian_satuan" => "Cubic decimetre",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "DMT",
				"uraian_satuan" => "Decimetre",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "DOP",
				"uraian_satuan" => "Domincan Peso",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "DPR",
				"uraian_satuan" => "Dozen pairs",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "DPT",
				"uraian_satuan" => "Displecement tonnege",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "DRA",
				"uraian_satuan" => "Dram US (3,887935 g)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "DRI",
				"uraian_satuan" => "Dram GB (1,771745 g)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "DRL",
				"uraian_satuan" => "Dozen rolls",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "DRM",
				"uraian_satuan" => "Drachm, GB (3,887935 g)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "DTN",
				"uraian_satuan" => "Decitonne, Centner, Quintall, metric (100 kg)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "DWT",
				"uraian_satuan" => "Pennyweight GB,US (1,555174 g)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "DZD",
				"uraian_satuan" => "Algerian Dinar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "DZN",
				"uraian_satuan" => "Dozen",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "DZP",
				"uraian_satuan" => "Dozen packs",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "ECS",
				"uraian_satuan" => "Sucre",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "EEK",
				"uraian_satuan" => "Kroon",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "EGP",
				"uraian_satuan" => "Egyptian Pound",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "ERN",
				"uraian_satuan" => "Nakfa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "ESP",
				"uraian_satuan" => "Spainish peseta",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "ETB",
				"uraian_satuan" => "Ethiopian Birr",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "EUR",
				"uraian_satuan" => "Euro",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "FAH",
				"uraian_satuan" => "degree Fahrenheit",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "FAR",
				"uraian_satuan" => "farad",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "FIM",
				"uraian_satuan" => "Markka",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "FJD",
				"uraian_satuan" => "Fiji Dollar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "FKP",
				"uraian_satuan" => "Falkland Islands Pound",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "FOT",
				"uraian_satuan" => "Foot (0.3048 m)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "FRF",
				"uraian_satuan" => "Franch Franc",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "FTK",
				"uraian_satuan" => "Square foot",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "FTQ",
				"uraian_satuan" => "Cubic foot",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "GBP",
				"uraian_satuan" => "Pound Sterling",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "GBQ",
				"uraian_satuan" => "Gigabecquerel",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "GEK",
				"uraian_satuan" => "Georgian Coupon",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "GEL",
				"uraian_satuan" => "Lari",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "GGR",
				"uraian_satuan" => "Great gross (12 gross)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "GHC",
				"uraian_satuan" => "Cedi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "GHS",
				"uraian_satuan" => "Cedi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "GIA",
				"uraian_satuan" => "Gill (11,8294 cm3)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "GII",
				"uraian_satuan" => "Gill (0,142065 dm3)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "GLD",
				"uraian_satuan" => "Dry gallon (4,404884 dm3)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "GLI",
				"uraian_satuan" => "Gallon (4,546092 dm3)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "GLL",
				"uraian_satuan" => "Liquid gallon (3,78541 dm3)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "GMD",
				"uraian_satuan" => "Dalasi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "GNF",
				"uraian_satuan" => "Guinea Franc",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "GRD",
				"uraian_satuan" => "Drachma",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "GRM",
				"uraian_satuan" => "Gram",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "GRN",
				"uraian_satuan" => "Grain GB,US (64,798910 mg)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "GRO",
				"uraian_satuan" => "Gross",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "GRT",
				"uraian_satuan" => "Gross (register) ton",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "GTQ",
				"uraian_satuan" => "Quetzal",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "GWH",
				"uraian_satuan" => "Gigawatt-hour (1 million KW/h)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "GWP",
				"uraian_satuan" => "Guinea-Bissau Peso",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "GYD",
				"uraian_satuan" => "Guyana Dollar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "HAR",
				"uraian_satuan" => "Hectare",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "HBA",
				"uraian_satuan" => "Hectobar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "HGM",
				"uraian_satuan" => "Hectogram",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "HIU",
				"uraian_satuan" => "Hundred intenational units",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "HKD",
				"uraian_satuan" => "Hong Kong Dollar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "HLT",
				"uraian_satuan" => "Hectolitre",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "HMQ",
				"uraian_satuan" => "Million cubic metres",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "HMT",
				"uraian_satuan" => "Hectometre",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "HNL",
				"uraian_satuan" => "Lempira",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "HPA",
				"uraian_satuan" => "Hectolitre of pure alcohol",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "HRD",
				"uraian_satuan" => "Croatian Dinar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "HRK",
				"uraian_satuan" => "Kuna",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "HTG",
				"uraian_satuan" => "Gourde",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "HTZ",
				"uraian_satuan" => "Hertz",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "HUF",
				"uraian_satuan" => "Forint",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "HUR",
				"uraian_satuan" => "Hour",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "IDR",
				"uraian_satuan" => "Rupiah",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "IEP",
				"uraian_satuan" => "Irish Pound",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "ILS",
				"uraian_satuan" => "Shekel",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "INH",
				"uraian_satuan" => "Inch (2.54 mm)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "INK",
				"uraian_satuan" => "Square inch",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "INQ",
				"uraian_satuan" => "Cubic inch",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "INR",
				"uraian_satuan" => "Indian Rupee",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "IQD",
				"uraian_satuan" => "Iraqi Dinar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "IRR",
				"uraian_satuan" => "Iranian Rial",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "ISK",
				"uraian_satuan" => "Iceland Krona",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "ITL",
				"uraian_satuan" => "Italian Lira",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "JMD",
				"uraian_satuan" => "Jamaican Dollar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "JOD",
				"uraian_satuan" => "Jordanian Dinar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "JOU",
				"uraian_satuan" => "Joule",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "JPY",
				"uraian_satuan" => "Yen",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "KAT",
				"uraian_satuan" => "katal",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "KBA",
				"uraian_satuan" => "Kilobar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "KEL",
				"uraian_satuan" => "Kelvin",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "KES",
				"uraian_satuan" => "Kenyan Shilling",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "KGM",
				"uraian_satuan" => "Kilogram",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "KGS",
				"uraian_satuan" => "kilogram per second",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "KHR",
				"uraian_satuan" => "Riel",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "KHZ",
				"uraian_satuan" => "kilohertz",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "KJO",
				"uraian_satuan" => "Kilojoule",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "KMF",
				"uraian_satuan" => "Comoro Franc",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "KMH",
				"uraian_satuan" => "Kilometre per hour",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "KMK",
				"uraian_satuan" => "Square kilometre",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "KMQ",
				"uraian_satuan" => "Kilogram per cubic meter",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "KMT",
				"uraian_satuan" => "Kilometre",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "KNI",
				"uraian_satuan" => "Kilogram of nitrogen",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "KNS",
				"uraian_satuan" => "Kilogram of named substance",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "KNT",
				"uraian_satuan" => "Knot ( 1 n mile oer hour",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "KPA",
				"uraian_satuan" => "kilopascal",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "KPH",
				"uraian_satuan" => "Kilogram of potassium hydroxide (caustic pota",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "KPO",
				"uraian_satuan" => "Kilogram of potassium oxide",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "KPP",
				"uraian_satuan" => "Kilogram of phosphorus pentoxide  (phosphoric",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "KPW",
				"uraian_satuan" => "North Korean Won",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "KRW",
				"uraian_satuan" => "Won",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "KSD",
				"uraian_satuan" => "Kilogram of substance 90 per cent dry",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "KSH",
				"uraian_satuan" => "Kilogram of sodium hydyoxide  (caustic soda)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "KTN",
				"uraian_satuan" => "Kilotonne",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "KUR",
				"uraian_satuan" => "Kilogram of uranium",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "KVA",
				"uraian_satuan" => "Kilovolt - ampere",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "KVR",
				"uraian_satuan" => "kilovar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "KVT",
				"uraian_satuan" => "kilovolt",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "KWD",
				"uraian_satuan" => "Kuwauti Dinar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "KWH",
				"uraian_satuan" => "Kilowatt-hour",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "KWT",
				"uraian_satuan" => "Kilowatt",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "KYD",
				"uraian_satuan" => "Cayman Islands Dollar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "KZT",
				"uraian_satuan" => "Tenge",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "LAK",
				"uraian_satuan" => "Kip",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "LBP",
				"uraian_satuan" => "Lebanese Pound",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "LBR",
				"uraian_satuan" => "Pound GB,US (0,45359237 kg)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "LBT",
				"uraian_satuan" => "Troy pound, US 9373,242 g)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "LKR",
				"uraian_satuan" => "Sri Langka Rupee",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "LNT",
				"uraian_satuan" => "Long ton GB, US 2/ (1,0160469 t)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "LPA",
				"uraian_satuan" => "Litre of pure alcohol",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "LRD",
				"uraian_satuan" => "Liberian Dollar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "LSL",
				"uraian_satuan" => "Loli",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "LTL",
				"uraian_satuan" => "Lithuanian Litas",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "LTN",
				"uraian_satuan" => "ton (UK) or long ton (US)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "LTR",
				"uraian_satuan" => "Litre ( 1 dm3 )",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "LUF",
				"uraian_satuan" => "Luxembourg Franc",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "LUM",
				"uraian_satuan" => "Lumen",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "LUX",
				"uraian_satuan" => "lux",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "LVL",
				"uraian_satuan" => "Latvian Lats#",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "LVR",
				"uraian_satuan" => "Latvian Ruble",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "LYD",
				"uraian_satuan" => "Libyan Dinar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "MAD",
				"uraian_satuan" => "Moroccoan Dirham",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "MAL",
				"uraian_satuan" => "Megalitre",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "MAM",
				"uraian_satuan" => "Megametre",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "MAW",
				"uraian_satuan" => "Megawatt",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "MBR",
				"uraian_satuan" => "millibar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "MCU",
				"uraian_satuan" => "millicurie",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "MDL",
				"uraian_satuan" => "Moldovan Leu",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "MGA",
				"uraian_satuan" => "Malagasy Ariary",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "MGF",
				"uraian_satuan" => "Malagasy Franc",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "MGM",
				"uraian_satuan" => "Milligram",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "MHZ",
				"uraian_satuan" => "megahertz",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "MID",
				"uraian_satuan" => "Thousand",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "MIK",
				"uraian_satuan" => "Square mile",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "MIN",
				"uraian_satuan" => "Minute",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "MIO",
				"uraian_satuan" => "Million",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "MIU",
				"uraian_satuan" => "Million international units",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "MKD",
				"uraian_satuan" => "Denar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "MLD",
				"uraian_satuan" => "Milliard, Billion US",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "MLT",
				"uraian_satuan" => "Millilitre",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "MMK",
				"uraian_satuan" => "Square millimetre",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "MMQ",
				"uraian_satuan" => "Cubic millimetre",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "MMT",
				"uraian_satuan" => "Millimetre",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "MNT",
				"uraian_satuan" => "Tugrik",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "MON",
				"uraian_satuan" => "Month",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "MOP",
				"uraian_satuan" => "Pataca",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "MPA",
				"uraian_satuan" => "megapascal",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "MQH",
				"uraian_satuan" => "cubic metre per hour",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "MQS",
				"uraian_satuan" => "cubic metre per second",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "MRO",
				"uraian_satuan" => "Ouguiya",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "MSK",
				"uraian_satuan" => "Metre per second squared",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "MTK",
				"uraian_satuan" => "Square metre",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "MTL",
				"uraian_satuan" => "Mallese Lira",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "MTQ",
				"uraian_satuan" => "Cubic metre",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "MTR",
				"uraian_satuan" => "Metre",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "MTS",
				"uraian_satuan" => "metre per second",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "MUR",
				"uraian_satuan" => "Mauritius Pupee",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "MVA",
				"uraian_satuan" => "Megavolt -  ampere (1000 KVA)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "MVR",
				"uraian_satuan" => "Rufiyaa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "MWH",
				"uraian_satuan" => "Megawatt-hour (1000 KW/h)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "MWK",
				"uraian_satuan" => "Kwacha",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "MXN",
				"uraian_satuan" => "Mexican  Nuevo Peso",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "MXV",
				"uraian_satuan" => "Mexican Unidad de Inversion (U",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "MYR",
				"uraian_satuan" => "Malaysian Ringgit",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "MZM",
				"uraian_satuan" => "Metical",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "MZN",
				"uraian_satuan" => "Metical",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "NAD",
				"uraian_satuan" => "Namibia Dollar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "NAR",
				"uraian_satuan" => "Number of articles",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "NBB",
				"uraian_satuan" => "Number bobbins",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "NEW",
				"uraian_satuan" => "Newton",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "NGN",
				"uraian_satuan" => "Naira",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "NIO",
				"uraian_satuan" => "Cordoba Oro",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "NIU",
				"uraian_satuan" => "Number of international units",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "NLG",
				"uraian_satuan" => "Netherlands Guilder",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "NMB",
				"uraian_satuan" => "Number",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "NMI",
				"uraian_satuan" => "Nautical mile (1852 m)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "NMP",
				"uraian_satuan" => "Number of packs",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "NOK",
				"uraian_satuan" => "Norwegian Krone",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "NPL",
				"uraian_satuan" => "Number of parcels",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "NPR",
				"uraian_satuan" => "number of pairs",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "NPT",
				"uraian_satuan" => "Number of parts",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "NRL",
				"uraian_satuan" => "Number of rolls",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "NTT",
				"uraian_satuan" => "Net (regirter) ton",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "NZD",
				"uraian_satuan" => "New Zealand Dollar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "OHM",
				"uraian_satuan" => "Ohm",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "OMR",
				"uraian_satuan" => "Rial Omani",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "ONZ",
				"uraian_satuan" => "Ounce GB,US (28,349523 g)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "OZA",
				"uraian_satuan" => "Fluid ounce (29,5735 cm3)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "OZI",
				"uraian_satuan" => "Fluid ounce (29,5735 cm3)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "PAB",
				"uraian_satuan" => "Balboa/US  Dollar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "PAL",
				"uraian_satuan" => "Pascal",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "PCE",
				"uraian_satuan" => "Piece",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "PEN",
				"uraian_satuan" => "Nuevo Sol",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "PGK",
				"uraian_satuan" => "Kina",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "PGL",
				"uraian_satuan" => "Proof gallon",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "PHP",
				"uraian_satuan" => "Philippines Peso",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "PKR",
				"uraian_satuan" => "Pakistan Rupee",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "PLN",
				"uraian_satuan" => "Zloty",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "PLZ",
				"uraian_satuan" => "Zloty",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "PTD",
				"uraian_satuan" => "Dry pint (0.55061 dm3)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "PTE",
				"uraian_satuan" => "Portuguese Escudo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "PTI",
				"uraian_satuan" => "Pint (0,568262 dm3)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "PTL",
				"uraian_satuan" => "Liquid Pint (0,473176 dm3)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "PYG",
				"uraian_satuan" => "Guarani",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "QAN",
				"uraian_satuan" => "Quarter (of a year)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "QAR",
				"uraian_satuan" => "Qatari Rial",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "QTD",
				"uraian_satuan" => "Dry quart (1,101221 dm3)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "QTI",
				"uraian_satuan" => "Quart (1,136523 dm3)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "QTL",
				"uraian_satuan" => "Liquid quart (0,946353 dm3)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "QTR",
				"uraian_satuan" => "Quarter GB (12,700586 kg)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "ROL",
				"uraian_satuan" => "Leu",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "RON",
				"uraian_satuan" => "New Leu",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "RPM",
				"uraian_satuan" => "Revolution per minute",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "RPS",
				"uraian_satuan" => "Revolution per second",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "RSD",
				"uraian_satuan" => "Serbian Dinar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "RUB",
				"uraian_satuan" => "Russian Ruble",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "RUR",
				"uraian_satuan" => "Russian Ruble",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "RWF",
				"uraian_satuan" => "Rwanda Franc",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "SAN",
				"uraian_satuan" => "Half year (six Months)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "SAR",
				"uraian_satuan" => "Saudi Riyal",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "SBD",
				"uraian_satuan" => "Solomon Islands Dollar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "SCO",
				"uraian_satuan" => "Score",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "SCR",
				"uraian_satuan" => "Scruple GP,US (1,295982 g)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "SDD",
				"uraian_satuan" => "Sudanase Dinar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "SDG",
				"uraian_satuan" => "Sudanese Pound",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "SDP",
				"uraian_satuan" => "Sudanese Pound",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "SEC",
				"uraian_satuan" => "Second",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "SEK",
				"uraian_satuan" => "Swedish Krone",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "SET",
				"uraian_satuan" => "Set",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "SGD",
				"uraian_satuan" => "Singapore Dollar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "SHP",
				"uraian_satuan" => "St. Helena Pound",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "SHT",
				"uraian_satuan" => "Shipping ton",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "SIE",
				"uraian_satuan" => "Siemens",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "SIT",
				"uraian_satuan" => "Tolar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "SKK",
				"uraian_satuan" => "Slovak Koruna",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "SLL",
				"uraian_satuan" => "Leone",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "SMI",
				"uraian_satuan" => "Statute mile (1609.344 m)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "SOS",
				"uraian_satuan" => "Somalia shilling",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "SRD",
				"uraian_satuan" => "Surinam Dollar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "SRG",
				"uraian_satuan" => "Surinam Guilder",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "SST",
				"uraian_satuan" => "Short standard  (7200 matches )",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "STD",
				"uraian_satuan" => "Dobra",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "STI",
				"uraian_satuan" => "Stone GB (6,350293 kg)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "STN",
				"uraian_satuan" => "Short ton GB, US 2/ (0,90718474 t)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "SVC",
				"uraian_satuan" => "El Salvador Colon",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "SYP",
				"uraian_satuan" => "Syrian Pound",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "SZL",
				"uraian_satuan" => "Lilangeni",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "TAH",
				"uraian_satuan" => "Thousand ampere-hour",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "THB",
				"uraian_satuan" => "Baht",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "TJS",
				"uraian_satuan" => "Somoni",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "TMM",
				"uraian_satuan" => "Manat",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "TMT",
				"uraian_satuan" => "Manat",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "TND",
				"uraian_satuan" => "Tunisian Dinar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "TNE",
				"uraian_satuan" => "Tonne, Metric ton (1000 kg)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "TOP",
				"uraian_satuan" => "Pa'anga",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "TPR",
				"uraian_satuan" => "Ten pairs",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "TQD",
				"uraian_satuan" => "Thousand cubic metres per day",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "TRL",
				"uraian_satuan" => "Trillion Eur",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "TRY",
				"uraian_satuan" => "Turkish Lira",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "TSD",
				"uraian_satuan" => "Tonne of subtance 90 per cent dry",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "TSH",
				"uraian_satuan" => "Ton of steam per hour",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "TTD",
				"uraian_satuan" => "Trinidad & Tobago Dollar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "TWD",
				"uraian_satuan" => "New Taiwan Dollar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "TZS",
				"uraian_satuan" => "Tanzania Shilling",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "UAH",
				"uraian_satuan" => "Hryvnia",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "UAK",
				"uraian_satuan" => "Karbovanet",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "UGX",
				"uraian_satuan" => "Uganda Shilling",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "USD",
				"uraian_satuan" => "US Dollar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "UYI",
				"uraian_satuan" => "Uruguay Peso en Unidades Index",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "UYU",
				"uraian_satuan" => "Peso Uruguayo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "UZS",
				"uraian_satuan" => "Ubekistan Sum",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "VEB",
				"uraian_satuan" => "Bolivar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "VEF",
				"uraian_satuan" => "Bolivar Fuerte",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "VLT",
				"uraian_satuan" => "Volt",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "VND",
				"uraian_satuan" => "Dong",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "VUV",
				"uraian_satuan" => "Vatu",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "WCD",
				"uraian_satuan" => "Cord (3,63 m3)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "WEB",
				"uraian_satuan" => "Weber",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "WEE",
				"uraian_satuan" => "Week",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "WHR",
				"uraian_satuan" => "Watt-hour",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "WSD",
				"uraian_satuan" => "Standard",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "WST",
				"uraian_satuan" => "Tala",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "WTT",
				"uraian_satuan" => "Watt",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "XAF",
				"uraian_satuan" => "CFA  Franc BAEC",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "XAG",
				"uraian_satuan" => "Silver",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "XAU",
				"uraian_satuan" => "Gold",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "XBA",
				"uraian_satuan" => "Bond Markets Units European Co",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "XBB",
				"uraian_satuan" => "European Monetary Unit (E.M.U.",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "XBC",
				"uraian_satuan" => "European Unit of Account 9(E.U",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "XBD",
				"uraian_satuan" => "European Unit of Account 17(E.",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "XCD",
				"uraian_satuan" => "East Caribbean Dollar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "XDR",
				"uraian_satuan" => "SDR",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "XFU",
				"uraian_satuan" => "UIC-Franc",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "XOF",
				"uraian_satuan" => "CFA Franc BCEAO",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "XPD",
				"uraian_satuan" => "Palladium",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "XPF",
				"uraian_satuan" => "CFA Franc BEAC",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "XPT",
				"uraian_satuan" => "Platinum",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "YDK",
				"uraian_satuan" => "Square yard",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "YDQ",
				"uraian_satuan" => "Cubic yard",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "YER",
				"uraian_satuan" => "Yemeni Rial",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "YRD",
				"uraian_satuan" => "Yard (0.9144 m)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "YUN",
				"uraian_satuan" => "New Yugosslavian",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "ZAL",
				"uraian_satuan" => "Financial Rand",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "ZAR",
				"uraian_satuan" => "Rand",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "ZMK",
				"uraian_satuan" => "Kwacha",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "ZRN",
				"uraian_satuan" => "Zaife",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "ZWD",
				"uraian_satuan" => "Zimbabwe Dollar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_satuan" => "ZWL",
				"uraian_satuan" => "Zimbabwe Dollar",
				"created_at" => $now,
				"updated_at" => $now
			],
		];

		RefSatuan::insert($data);
    }
}
