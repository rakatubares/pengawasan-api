<?php

namespace Database\Seeders\References;

use App\Models\References\RefBandara;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class RefBandaraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now('utc')->toDateTimeString();
		$data1 = [
			[
				"country" => "AE",
				"iata_code" => "AAN",
				"airport_name" => "Al Ain International Airport",
				"municipality" => "Al Ain",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AE",
				"iata_code" => "AUH",
				"airport_name" => "Abu Dhabi International Airport",
				"municipality" => "Abu Dhabi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AE",
				"iata_code" => "DWC",
				"airport_name" => "Al Maktoum International Airport",
				"municipality" => "Jebel Ali",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AE",
				"iata_code" => "DXB",
				"airport_name" => "Dubai International Airport",
				"municipality" => "Dubai",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AE",
				"iata_code" => "FJR",
				"airport_name" => "Fujairah International Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AE",
				"iata_code" => "RKT",
				"airport_name" => "Ras Al Khaimah International Airport",
				"municipality" => "Ras Al Khaimah",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AE",
				"iata_code" => "SHJ",
				"airport_name" => "Sharjah International Airport",
				"municipality" => "Sharjah",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AE",
				"iata_code" => "ZDY",
				"airport_name" => "Delma Airport",
				"municipality" => "Delma Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AF",
				"iata_code" => "CCN",
				"airport_name" => "Chaghcharan Airport",
				"municipality" => "Chaghcharan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AF",
				"iata_code" => "FBD",
				"airport_name" => "Fayzabad Airport",
				"municipality" => "Fayzabad",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AF",
				"iata_code" => "HEA",
				"airport_name" => "Herat - Khwaja Abdullah Ansari International Airport",
				"municipality" => "Guzara",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AF",
				"iata_code" => "KBL",
				"airport_name" => "Kabul International Airport",
				"municipality" => "Kabul",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AF",
				"iata_code" => "KDH",
				"airport_name" => "Ahmad Shah Baba International Airport / Kandahar Airfield",
				"municipality" => "Khvoshab",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AF",
				"iata_code" => "MZR",
				"airport_name" => "Mazar-i-Sharif International Airport",
				"municipality" => "Mazar-i-Sharif",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AG",
				"iata_code" => "ANU",
				"airport_name" => "V.C. Bird International Airport",
				"municipality" => "St. John's",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AG",
				"iata_code" => "BBQ",
				"airport_name" => "Codrington Airport",
				"municipality" => "Codrington",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AI",
				"iata_code" => "AXA",
				"airport_name" => "Clayton J Lloyd International Airport",
				"municipality" => "The Valley",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AL",
				"iata_code" => "TIA",
				"airport_name" => "Tirana International Airport Mother Teresa",
				"municipality" => "Tirana",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AM",
				"iata_code" => "EVN",
				"airport_name" => "Zvartnots International Airport",
				"municipality" => "Yerevan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AM",
				"iata_code" => "LWN",
				"airport_name" => "Shirak International Airport",
				"municipality" => "Gyumri",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AO",
				"iata_code" => "CAB",
				"airport_name" => "Cabinda Airport",
				"municipality" => "Cabinda",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AO",
				"iata_code" => "CBT",
				"airport_name" => "Catumbela Airport",
				"municipality" => "Catumbela",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AO",
				"iata_code" => "DUE",
				"airport_name" => "Dundo Airport",
				"municipality" => "Chitato",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AO",
				"iata_code" => "GXG",
				"airport_name" => "Negage Airport",
				"municipality" => "Negage",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AO",
				"iata_code" => "LAD",
				"airport_name" => "Quatro de Fevereiro International Airport",
				"municipality" => "Luanda",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AO",
				"iata_code" => "MEG",
				"airport_name" => "Malanje Airport",
				"municipality" => "Malanje",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AO",
				"iata_code" => "MSZ",
				"airport_name" => "Welwitschia Mirabilis International Airport",
				"municipality" => "Moçâmedes",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AO",
				"iata_code" => "NOV",
				"airport_name" => "Nova Lisboa Airport",
				"municipality" => "Huambo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AO",
				"iata_code" => "SDD",
				"airport_name" => "Lubango Airport",
				"municipality" => "Lubango",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AO",
				"iata_code" => "SPP",
				"airport_name" => "Menongue Airport",
				"municipality" => "Menongue",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AO",
				"iata_code" => "SSY",
				"airport_name" => "Mbanza Congo Airport",
				"municipality" => "Mbanza Congo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AO",
				"iata_code" => "SZA",
				"airport_name" => "Soyo Airport",
				"municipality" => "Soyo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AO",
				"iata_code" => "VPE",
				"airport_name" => "Ngjiva Pereira Airport",
				"municipality" => "Ngiva",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AQ",
				"iata_code" => "TNM",
				"airport_name" => "Teniente Rodolfo Marsh Martin Airport",
				"municipality" => "Villa Las Estrellas",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AR",
				"iata_code" => "AEP",
				"airport_name" => "Jorge Newbery Airpark",
				"municipality" => "Buenos Aires",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AR",
				"iata_code" => "AFA",
				"airport_name" => "Suboficial Ay Santiago Germano Airport",
				"municipality" => "San Rafael",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AR",
				"iata_code" => "BHI",
				"airport_name" => "Comandante Espora Airport",
				"municipality" => "Bahia Blanca",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AR",
				"iata_code" => "BRC",
				"airport_name" => "San Carlos De Bariloche Airport",
				"municipality" => "San Carlos de Bariloche",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AR",
				"iata_code" => "CNQ",
				"airport_name" => "Corrientes Airport",
				"municipality" => "Corrientes",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AR",
				"iata_code" => "COR",
				"airport_name" => "Ingeniero Ambrosio Taravella Airport",
				"municipality" => "Cordoba",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AR",
				"iata_code" => "CPC",
				"airport_name" => "Aviador C. Campos Airport",
				"municipality" => "Chapelco/San Martin de los Andes",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AR",
				"iata_code" => "CRD",
				"airport_name" => "General E. Mosconi Airport",
				"municipality" => "Comodoro Rivadavia",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AR",
				"iata_code" => "CTC",
				"airport_name" => "Catamarca Airport",
				"municipality" => "Catamarca",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AR",
				"iata_code" => "EQS",
				"airport_name" => "Brigadier Antonio Parodi Airport",
				"municipality" => "Esquel",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AR",
				"iata_code" => "EZE",
				"airport_name" => "Ministro Pistarini International Airport",
				"municipality" => "Buenos Aires (Ezeiza)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AR",
				"iata_code" => "FMA",
				"airport_name" => "Formosa Airport",
				"municipality" => "Formosa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AR",
				"iata_code" => "FTE",
				"airport_name" => "El Calafate - Commander Armando Tola International Airport",
				"municipality" => "El Calafate",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AR",
				"iata_code" => "GGS",
				"airport_name" => "Gobernador Gregores Airport",
				"municipality" => "Gobernador Gregores",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AR",
				"iata_code" => "IGR",
				"airport_name" => "Cataratas Del Iguazú International Airport",
				"municipality" => "Puerto Iguazu",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AR",
				"iata_code" => "IRJ",
				"airport_name" => "Capitan V A Almonacid Airport",
				"municipality" => "La Rioja",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AR",
				"iata_code" => "JUJ",
				"airport_name" => "Gobernador Horacio Guzman International Airport",
				"municipality" => "San Salvador de Jujuy",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AR",
				"iata_code" => "LHS",
				"airport_name" => "Las Heras Airport",
				"municipality" => "Las Heras",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AR",
				"iata_code" => "LUQ",
				"airport_name" => "Brigadier Mayor D Cesar Raul Ojeda Airport",
				"municipality" => "San Luis",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AR",
				"iata_code" => "MDQ",
				"airport_name" => "Ástor Piazzola International Airport",
				"municipality" => "Mar del Plata",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AR",
				"iata_code" => "MDZ",
				"airport_name" => "El Plumerillo Airport",
				"municipality" => "Mendoza",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AR",
				"iata_code" => "NEC",
				"airport_name" => "Necochea Airport",
				"municipality" => "Necochea",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AR",
				"iata_code" => "NQN",
				"airport_name" => "Presidente Peron Airport",
				"municipality" => "Neuquen",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AR",
				"iata_code" => "OES",
				"airport_name" => "Antoine de Saint Exupéry Airport",
				"municipality" => "San Antonio Oeste",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AR",
				"iata_code" => "PMQ",
				"airport_name" => "Perito Moreno Airport",
				"municipality" => "Perito Moreno",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AR",
				"iata_code" => "PMY",
				"airport_name" => "El Tehuelche Airport",
				"municipality" => "Puerto Madryn",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AR",
				"iata_code" => "PRA",
				"airport_name" => "General Urquiza Airport",
				"municipality" => "Parana",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AR",
				"iata_code" => "PSS",
				"airport_name" => "Libertador Gral D Jose De San Martin Airport",
				"municipality" => "Posadas",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AR",
				"iata_code" => "PUD",
				"airport_name" => "Puerto Deseado Airport",
				"municipality" => "Puerto Deseado",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AR",
				"iata_code" => "REL",
				"airport_name" => "Almirante Marco Andres Zar Airport",
				"municipality" => "Rawson",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AR",
				"iata_code" => "RES",
				"airport_name" => "Resistencia International Airport",
				"municipality" => "Resistencia",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AR",
				"iata_code" => "RGL",
				"airport_name" => "Piloto Civil N. Fernández Airport",
				"municipality" => "Rio Gallegos",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AR",
				"iata_code" => "RHD",
				"airport_name" => "Termas de Río Hondo international Airport",
				"municipality" => "Termas de Río Hondo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AR",
				"iata_code" => "ROS",
				"airport_name" => "Rosario Islas Malvinas International Airport",
				"municipality" => "Rosario",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AR",
				"iata_code" => "RSA",
				"airport_name" => "Santa Rosa Airport",
				"municipality" => "Santa Rosa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AR",
				"iata_code" => "RYO",
				"airport_name" => "28 de Noviembre Airport",
				"municipality" => "Rio Turbio",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AR",
				"iata_code" => "RZA",
				"airport_name" => "Santa Cruz Airport",
				"municipality" => "Puerto Santa Cruz",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AR",
				"iata_code" => "SDE",
				"airport_name" => "Vicecomodoro Angel D. La Paz Aragonés Airport",
				"municipality" => "Santiago del Estero",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AR",
				"iata_code" => "SFN",
				"airport_name" => "Sauce Viejo Airport",
				"municipality" => "Santa Fe",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AR",
				"iata_code" => "SLA",
				"airport_name" => "Martin Miguel De Guemes International Airport",
				"municipality" => "Salta",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AR",
				"iata_code" => "SST",
				"airport_name" => "Santa Teresita Airport",
				"municipality" => "Santa Teresita",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AR",
				"iata_code" => "TTG",
				"airport_name" => "General Enrique Mosconi Airport",
				"municipality" => "Tartagal",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AR",
				"iata_code" => "TUC",
				"airport_name" => "Teniente Benjamin Matienzo Airport",
				"municipality" => "San Miguel de Tucumán",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AR",
				"iata_code" => "UAQ",
				"airport_name" => "Domingo Faustino Sarmiento Airport",
				"municipality" => "San Juan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AR",
				"iata_code" => "ULA",
				"airport_name" => "Capitan D Daniel Vazquez Airport",
				"municipality" => "San Julian",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AR",
				"iata_code" => "USH",
				"airport_name" => "Malvinas Argentinas Airport",
				"municipality" => "Ushuaia",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AR",
				"iata_code" => "VDM",
				"airport_name" => "Gobernador Castello Airport",
				"municipality" => "Viedma / Carmen de Patagones",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AS",
				"iata_code" => "FTI",
				"airport_name" => "Fitiuta Airport",
				"municipality" => "Fitiuta Village",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AS",
				"iata_code" => "OFU",
				"airport_name" => "Ofu Airport",
				"municipality" => "Ofu",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AS",
				"iata_code" => "PPG",
				"airport_name" => "Pago Pago International Airport",
				"municipality" => "Pago Pago",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AT",
				"iata_code" => "GRZ",
				"airport_name" => "Graz Airport",
				"municipality" => "Graz (Feldkirchen bei Graz)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AT",
				"iata_code" => "INN",
				"airport_name" => "Innsbruck Airport",
				"municipality" => "Innsbruck",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AT",
				"iata_code" => "KLU",
				"airport_name" => "Klagenfurt Airport",
				"municipality" => "Klagenfurt am Wörthersee",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AT",
				"iata_code" => "LNZ",
				"airport_name" => "Linz-Hörsching Airport / Vogler Air Base",
				"municipality" => "Linz",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AT",
				"iata_code" => "SZG",
				"airport_name" => "Salzburg Airport",
				"municipality" => "Salzburg",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AT",
				"iata_code" => "VIE",
				"airport_name" => "Vienna International Airport",
				"municipality" => "Vienna",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "ABM",
				"airport_name" => "Northern Peninsula Airport",
				"municipality" => "Bamaga",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "ABX",
				"airport_name" => "Albury Airport",
				"municipality" => "Albury",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "ADL",
				"airport_name" => "Adelaide International Airport",
				"municipality" => "Adelaide",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "ALH",
				"airport_name" => "Albany Airport",
				"municipality" => "Albany",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "ARM",
				"airport_name" => "Armidale Airport",
				"municipality" => "Armidale",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "ASP",
				"airport_name" => "Alice Springs Airport",
				"municipality" => "Alice Springs",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "AUU",
				"airport_name" => "Aurukun Airport",
				"municipality" => "Aurukun",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "AVV",
				"airport_name" => "Avalon Airport",
				"municipality" => "Lara",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "AYQ",
				"airport_name" => "Ayers Rock Connellan Airport",
				"municipality" => "Ayers Rock",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "BCI",
				"airport_name" => "Barcaldine Airport",
				"municipality" => "Barcaldine",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "BDB",
				"airport_name" => "Bundaberg Airport",
				"municipality" => "Bundaberg",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "BDD",
				"airport_name" => "Badu Island Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "BEU",
				"airport_name" => "Bedourie Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "BHQ",
				"airport_name" => "Broken Hill Airport",
				"municipality" => "Broken Hill",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "BHS",
				"airport_name" => "Bathurst Airport",
				"municipality" => "Bathurst",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "BKQ",
				"airport_name" => "Blackall Airport",
				"municipality" => "Blackall",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "BLT",
				"airport_name" => "Blackwater Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "BME",
				"airport_name" => "Broome International Airport",
				"municipality" => "Broome",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "BNE",
				"airport_name" => "Brisbane International Airport",
				"municipality" => "Brisbane",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "BNK",
				"airport_name" => "Ballina Byron Gateway Airport",
				"municipality" => "Ballina",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "BQL",
				"airport_name" => "Boulia Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "BRK",
				"airport_name" => "Bourke Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "BUC",
				"airport_name" => "Burketown Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "BVI",
				"airport_name" => "Birdsville Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "BWT",
				"airport_name" => "Wynyard Airport",
				"municipality" => "Burnie",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "CAZ",
				"airport_name" => "Cobar Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "CBR",
				"airport_name" => "Canberra International Airport",
				"municipality" => "Canberra",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "CED",
				"airport_name" => "Ceduna Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "CFS",
				"airport_name" => "Coffs Harbour Airport",
				"municipality" => "Coffs Harbour",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "CKW",
				"airport_name" => "Christmas Creek Airport",
				"municipality" => "Christmas Creek Mine",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "CMA",
				"airport_name" => "Cunnamulla Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "CNB",
				"airport_name" => "Coonamble Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "CNC",
				"airport_name" => "Coconut Island Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "CNJ",
				"airport_name" => "Cloncurry Airport",
				"municipality" => "Cloncurry",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "CNS",
				"airport_name" => "Cairns International Airport",
				"municipality" => "Cairns",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "CPD",
				"airport_name" => "Coober Pedy Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "CTL",
				"airport_name" => "Charleville Airport",
				"municipality" => "Charleville",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "CTN",
				"airport_name" => "Cooktown Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "CUQ",
				"airport_name" => "Coen Airport",
				"municipality" => "Coen",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "CVQ",
				"airport_name" => "Carnarvon Airport",
				"municipality" => "Carnarvon",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "DBO",
				"airport_name" => "Dubbo City Regional Airport",
				"municipality" => "Dubbo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "DMD",
				"airport_name" => "Doomadgee Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "DPO",
				"airport_name" => "Devonport Airport",
				"municipality" => "Devonport",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "DRW",
				"airport_name" => "Darwin International Airport",
				"municipality" => "Darwin",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "EDR",
				"airport_name" => "Pormpuraaw Airport",
				"municipality" => "Pormpuraaw",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "ELC",
				"airport_name" => "Elcho Island Airport",
				"municipality" => "Elcho Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "EMD",
				"airport_name" => "Emerald Airport",
				"municipality" => "Emerald",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "EPR",
				"airport_name" => "Esperance Airport",
				"municipality" => "Esperance",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "FLS",
				"airport_name" => "Flinders Island Airport",
				"municipality" => "Flinders Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "GET",
				"airport_name" => "Geraldton Airport",
				"municipality" => "Geraldton",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "GFF",
				"airport_name" => "Griffith Airport",
				"municipality" => "Griffith",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "GIC",
				"airport_name" => "Boigu Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "GLT",
				"airport_name" => "Gladstone Airport",
				"municipality" => "Gladstone",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "GOV",
				"airport_name" => "Gove Airport",
				"municipality" => "Nhulunbuy",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "GTE",
				"airport_name" => "Groote Eylandt Airport",
				"municipality" => "Groote Eylandt",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "GYL",
				"airport_name" => "Argyle Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "GYZ",
				"airport_name" => "Gruyere Airport",
				"municipality" => "Gruyere Mine village",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "HBA",
				"airport_name" => "Hobart International Airport",
				"municipality" => "Hobart",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "HGD",
				"airport_name" => "Hughenden Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "HID",
				"airport_name" => "Horn Island Airport",
				"municipality" => "Horn Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "HOK",
				"airport_name" => "Hooker Creek Airport",
				"municipality" => "Lajamanu",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "HTI",
				"airport_name" => "Hamilton Island Airport",
				"municipality" => "Hamilton Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "HVB",
				"airport_name" => "Hervey Bay Airport",
				"municipality" => "Hervey Bay",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "IRG",
				"airport_name" => "Lockhart River Airport",
				"municipality" => "Lockhart River",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "ISA",
				"airport_name" => "Mount Isa Airport",
				"municipality" => "Mount Isa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "JCK",
				"airport_name" => "Julia Creek Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "KAX",
				"airport_name" => "Kalbarri Airport",
				"municipality" => "Kalbarri",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "KFG",
				"airport_name" => "Kalkgurung Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "KGC",
				"airport_name" => "Kingscote Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "KGI",
				"airport_name" => "Kalgoorlie Boulder Airport",
				"municipality" => "Kalgoorlie",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "KNS",
				"airport_name" => "King Island Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "KNX",
				"airport_name" => "East Kimberley Regional (Kununurra) Airport",
				"municipality" => "Kununurra",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "KQR",
				"airport_name" => "Karara Airport",
				"municipality" => "Karara",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "KRB",
				"airport_name" => "Karumba Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "KTA",
				"airport_name" => "Karratha Airport",
				"municipality" => "Karratha",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "KUG",
				"airport_name" => "Kubin Airport",
				"municipality" => "Moa Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "KWM",
				"airport_name" => "Kowanyama Airport",
				"municipality" => "Kowanyama",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "LDH",
				"airport_name" => "Lord Howe Island Airport",
				"municipality" => "Lord Howe Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "LEA",
				"airport_name" => "Learmonth Airport",
				"municipality" => "Exmouth",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "LEL",
				"airport_name" => "Lake Evella Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "LER",
				"airport_name" => "Leinster Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "LHG",
				"airport_name" => "Lightning Ridge Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "LNO",
				"airport_name" => "Leonora Airport",
				"municipality" => "Leonora",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "LRE",
				"airport_name" => "Longreach Airport",
				"municipality" => "Longreach",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "LST",
				"airport_name" => "Launceston Airport",
				"municipality" => "Launceston",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "LSY",
				"airport_name" => "Lismore Airport",
				"municipality" => "Lismore",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "LVO",
				"airport_name" => "Laverton Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "MBH",
				"airport_name" => "Maryborough Airport",
				"municipality" => "Maryborough",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "MBW",
				"airport_name" => "Melbourne Moorabbin Airport",
				"municipality" => "Melbourne",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "MCV",
				"airport_name" => "McArthur River Mine Airport",
				"municipality" => "McArthur River Mine",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "MCY",
				"airport_name" => "Sunshine Coast Airport",
				"municipality" => "Maroochydore",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "MEB",
				"airport_name" => "Melbourne Essendon Airport",
				"municipality" => "Essendon Fields",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "MEL",
				"airport_name" => "Melbourne International Airport",
				"municipality" => "Melbourne",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "MGB",
				"airport_name" => "Mount Gambier Airport",
				"municipality" => "Mount Gambier",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "MGT",
				"airport_name" => "Milingimbi Airport",
				"municipality" => "Milingimbi Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "MHU",
				"airport_name" => "Mount Hotham Airport",
				"municipality" => "Mount Hotham",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "MIM",
				"airport_name" => "Merimbula Airport",
				"municipality" => "Merimbula",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "MJK",
				"airport_name" => "Shark Bay Airport",
				"municipality" => "Denham",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "MKR",
				"airport_name" => "Meekatharra Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "MKY",
				"airport_name" => "Mackay Airport",
				"municipality" => "Mackay",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "MMG",
				"airport_name" => "Mount Magnet Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "MNG",
				"airport_name" => "Maningrida Airport",
				"municipality" => "Maningrida",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "MOV",
				"airport_name" => "Moranbah Airport",
				"municipality" => "Moranbah",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "MQL",
				"airport_name" => "Mildura Airport",
				"municipality" => "Mildura",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "MRZ",
				"airport_name" => "Moree Airport",
				"municipality" => "Moree",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "MYA",
				"airport_name" => "Moruya Airport",
				"municipality" => "Moruya",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "MYI",
				"airport_name" => "Murray Island Airport",
				"municipality" => "Murray Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "NAA",
				"airport_name" => "Narrabri Airport",
				"municipality" => "Narrabri",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "NLF",
				"airport_name" => "Darnley Island Airport",
				"municipality" => "Darnley Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "NRA",
				"airport_name" => "Narrandera Airport",
				"municipality" => "Narrandera",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "NTL",
				"airport_name" => "Newcastle Airport",
				"municipality" => "Williamtown",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "NTN",
				"airport_name" => "Normanton Airport",
				"municipality" => "Normanton",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "OKR",
				"airport_name" => "Yorke Island Airport",
				"municipality" => "Yorke Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "OKY",
				"airport_name" => "Oakey Army Aviation Centre",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "OLP",
				"airport_name" => "Olympic Dam Airport",
				"municipality" => "Olympic Dam",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "ONG",
				"airport_name" => "Mornington Island Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "OOL",
				"airport_name" => "Gold Coast Airport",
				"municipality" => "Gold Coast",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "OOM",
				"airport_name" => "Cooma Snowy Mountains Airport",
				"municipality" => "Cooma",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "PBO",
				"airport_name" => "Paraburdoo Airport",
				"municipality" => "Paraburdoo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "PER",
				"airport_name" => "Perth International Airport",
				"municipality" => "Perth",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "PHE",
				"airport_name" => "Port Hedland International Airport",
				"municipality" => "Port Hedland",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "PKE",
				"airport_name" => "Parkes Airport",
				"municipality" => "Parkes",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "PLO",
				"airport_name" => "Port Lincoln Airport",
				"municipality" => "Port Lincoln",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "PMK",
				"airport_name" => "Palm Island Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "PPP",
				"airport_name" => "Proserpine Whitsunday Coast Airport",
				"municipality" => "Proserpine",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "PQQ",
				"airport_name" => "Port Macquarie Airport",
				"municipality" => "Port Macquarie",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "PTJ",
				"airport_name" => "Portland Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "PUG",
				"airport_name" => "Port Augusta Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "PXH",
				"airport_name" => "Prominent Hill Airport",
				"municipality" => "OZ Minerals Prominent Hill Mine",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "RAM",
				"airport_name" => "Ramingining Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "RCM",
				"airport_name" => "Richmond Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "RMA",
				"airport_name" => "Roma Airport",
				"municipality" => "Roma",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "ROK",
				"airport_name" => "Rockhampton Airport",
				"municipality" => "Rockhampton",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "SBR",
				"airport_name" => "Saibai Island Airport",
				"municipality" => "Saibai Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "SGO",
				"airport_name" => "St George Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "SNB",
				"airport_name" => "Snake Bay Airport",
				"municipality" => "Milikapiti",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "SRN",
				"airport_name" => "Strahan Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "SYD",
				"airport_name" => "Sydney Kingsford Smith International Airport",
				"municipality" => "Sydney",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "SYU",
				"airport_name" => "Warraber Island Airport",
				"municipality" => "Sue Islet",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "TCA",
				"airport_name" => "Tennant Creek Airport",
				"municipality" => "Tennant Creek",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "THG",
				"airport_name" => "Thangool Airport",
				"municipality" => "Biloela",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "TMW",
				"airport_name" => "Tamworth Airport",
				"municipality" => "Tamworth",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "TRO",
				"airport_name" => "Taree Airport",
				"municipality" => "Taree",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "TSV",
				"airport_name" => "Townsville Airport / RAAF Base Townsville",
				"municipality" => "Townsville",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "UBB",
				"airport_name" => "Mabuiag Island Airport",
				"municipality" => "Mabuiag Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "ULP",
				"airport_name" => "Quilpie Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "UMR",
				"airport_name" => "Woomera Airfield",
				"municipality" => "Woomera",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "VCD",
				"airport_name" => "Victoria River Downs Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "WEI",
				"airport_name" => "Weipa Airport",
				"municipality" => "Weipa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "WGA",
				"airport_name" => "Wagga Wagga City Airport",
				"municipality" => "Wagga Wagga",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "WIN",
				"airport_name" => "Winton Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "WNR",
				"airport_name" => "Windorah Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "WOL",
				"airport_name" => "Shellharbour Airport",
				"municipality" => "Albion Park Rail",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "WTB",
				"airport_name" => "Toowoomba Wellcamp Airport",
				"municipality" => "Toowoomba",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "WUN",
				"airport_name" => "Wiluna Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "WYA",
				"airport_name" => "Whyalla Airport",
				"municipality" => "Whyalla",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "XMY",
				"airport_name" => "Yam Island Airport",
				"municipality" => "Yam Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "XTG",
				"airport_name" => "Thargomindah Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AU",
				"iata_code" => "ZNE",
				"airport_name" => "Newman Airport",
				"municipality" => "Newman",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AW",
				"iata_code" => "AUA",
				"airport_name" => "Queen Beatrix International Airport",
				"municipality" => "Oranjestad",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AZ",
				"iata_code" => "GBB",
				"airport_name" => "Gabala International Airport",
				"municipality" => "Gabala",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AZ",
				"iata_code" => "GYD",
				"airport_name" => "Heydar Aliyev International Airport",
				"municipality" => "Baku",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AZ",
				"iata_code" => "KVD",
				"airport_name" => "Ganja International Airport",
				"municipality" => "Ganja",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AZ",
				"iata_code" => "LLK",
				"airport_name" => "Lankaran International Airport",
				"municipality" => "Lankaran",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "AZ",
				"iata_code" => "NAJ",
				"airport_name" => "Nakhchivan Airport",
				"municipality" => "Nakhchivan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BA",
				"iata_code" => "BNX",
				"airport_name" => "Banja Luka International Airport",
				"municipality" => "Banja Luka",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BA",
				"iata_code" => "OMO",
				"airport_name" => "Mostar International Airport",
				"municipality" => "Mostar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BA",
				"iata_code" => "SJJ",
				"airport_name" => "Sarajevo International Airport",
				"municipality" => "Sarajevo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BA",
				"iata_code" => "TZL",
				"airport_name" => "Tuzla International Airport",
				"municipality" => "Tuzla",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BB",
				"iata_code" => "BGI",
				"airport_name" => "Grantley Adams International Airport",
				"municipality" => "Bridgetown",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BD",
				"iata_code" => "BZL",
				"airport_name" => "Barisal Airport",
				"municipality" => "Barisal",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BD",
				"iata_code" => "CGP",
				"airport_name" => "Shah Amanat International Airport",
				"municipality" => "Chattogram (Chittagong)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BD",
				"iata_code" => "CXB",
				"airport_name" => "Cox's Bazar Airport",
				"municipality" => "Cox's Bazar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BD",
				"iata_code" => "DAC",
				"airport_name" => "Hazrat Shahjalal International Airport",
				"municipality" => "Dhaka",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BD",
				"iata_code" => "JSR",
				"airport_name" => "Jessore Airport",
				"municipality" => "Jashore (Jessore)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BD",
				"iata_code" => "RJH",
				"airport_name" => "Shah Mokhdum Airport",
				"municipality" => "Rajshahi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BD",
				"iata_code" => "SPD",
				"airport_name" => "Saidpur Airport",
				"municipality" => "Saidpur",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BD",
				"iata_code" => "ZYL",
				"airport_name" => "Osmany International Airport",
				"municipality" => "Sylhet",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BE",
				"iata_code" => "ANR",
				"airport_name" => "Antwerp International Airport (Deurne)",
				"municipality" => "Antwerp",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BE",
				"iata_code" => "BRU",
				"airport_name" => "Brussels Airport",
				"municipality" => "Brussels",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BE",
				"iata_code" => "CRL",
				"airport_name" => "Brussels South Charleroi Airport",
				"municipality" => "Brussels",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BE",
				"iata_code" => "LGG",
				"airport_name" => "Liège Airport",
				"municipality" => "Liège",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BE",
				"iata_code" => "OST",
				"airport_name" => "Ostend-Bruges International Airport",
				"municipality" => "Ostend",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BF",
				"iata_code" => "BOY",
				"airport_name" => "Bobo Dioulasso Airport",
				"municipality" => "Bobo Dioulasso",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BF",
				"iata_code" => "OUA",
				"airport_name" => "Ouagadougou Airport",
				"municipality" => "Ouagadougou",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BG",
				"iata_code" => "BOJ",
				"airport_name" => "Burgas Airport",
				"municipality" => "Burgas",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BG",
				"iata_code" => "PDV",
				"airport_name" => "Plovdiv International Airport",
				"municipality" => "Plovdiv",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BG",
				"iata_code" => "SOF",
				"airport_name" => "Sofia Airport",
				"municipality" => "Sofia",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BG",
				"iata_code" => "VAR",
				"airport_name" => "Varna Airport",
				"municipality" => "Varna",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BH",
				"iata_code" => "BAH",
				"airport_name" => "Bahrain International Airport",
				"municipality" => "Manama",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BI",
				"iata_code" => "BJM",
				"airport_name" => "Bujumbura Melchior Ndadaye International Airport",
				"municipality" => "Bujumbura",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BI",
				"iata_code" => "KRE",
				"airport_name" => "Kirundo Airport",
				"municipality" => "Kirundo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BJ",
				"iata_code" => "COO",
				"airport_name" => "Cadjehoun Airport",
				"municipality" => "Cotonou",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BL",
				"iata_code" => "SBH",
				"airport_name" => "Saint Barthélemy - Rémy de Haenen Airport",
				"municipality" => "Gustavia / Saint-Jean",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BM",
				"iata_code" => "BDA",
				"airport_name" => "L.F. Wade International International Airport",
				"municipality" => "Hamilton",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BN",
				"iata_code" => "BWN",
				"airport_name" => "Brunei International Airport",
				"municipality" => "Bandar Seri Begawan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BO",
				"iata_code" => "CBB",
				"airport_name" => "Jorge Wilsterman International Airport",
				"municipality" => "Cochabamba",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BO",
				"iata_code" => "CCA",
				"airport_name" => "Chimore Airport",
				"municipality" => "Chimore",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BO",
				"iata_code" => "CIJ",
				"airport_name" => "Capitán Aníbal Arab Airport",
				"municipality" => "Cobija",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BO",
				"iata_code" => "GYA",
				"airport_name" => "Capitán de Av. Emilio Beltrán Airport",
				"municipality" => "Guayaramerín",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BO",
				"iata_code" => "LPB",
				"airport_name" => "El Alto International Airport",
				"municipality" => "La Paz / El Alto",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BO",
				"iata_code" => "PSZ",
				"airport_name" => "Capitán Av. Salvador Ogaya G. airport",
				"municipality" => "Puerto Suárez",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BO",
				"iata_code" => "PUR",
				"airport_name" => "Puerto Rico Airport",
				"municipality" => "Puerto Rico/Manuripi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BO",
				"iata_code" => "REY",
				"airport_name" => "Reyes Airport",
				"municipality" => "Reyes",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BO",
				"iata_code" => "RIB",
				"airport_name" => "Capitán Av. Selin Zeitun Lopez Airport",
				"municipality" => "Riberalta",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BO",
				"iata_code" => "SRE",
				"airport_name" => "Alcantarí Airport",
				"municipality" => "Yamparaez",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BO",
				"iata_code" => "SRJ",
				"airport_name" => "Capitán Av. German Quiroga G. Airport",
				"municipality" => "San Borja",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BO",
				"iata_code" => "SRZ",
				"airport_name" => "El Trompillo Airport",
				"municipality" => "Santa Cruz",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BO",
				"iata_code" => "TJA",
				"airport_name" => "Capitan Oriel Lea Plaza Airport",
				"municipality" => "Tarija",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BO",
				"iata_code" => "VVI",
				"airport_name" => "Viru Viru International Airport",
				"municipality" => "Santa Cruz",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BQ",
				"iata_code" => "BON",
				"airport_name" => "Flamingo International Airport",
				"municipality" => "Kralendijk, Bonaire",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BQ",
				"iata_code" => "EUX",
				"airport_name" => "F. D. Roosevelt Airport",
				"municipality" => "Sint Eustatius",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BQ",
				"iata_code" => "SAB",
				"airport_name" => "Juancho E. Yrausquin Airport",
				"municipality" => "Saba",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "AAX",
				"airport_name" => "Romeu Zema Airport",
				"municipality" => "Araxá",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "AFL",
				"airport_name" => "Piloto Osvaldo Marques Dias Airport",
				"municipality" => "Alta Floresta",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "AJU",
				"airport_name" => "Aracaju - Santa Maria International Airport",
				"municipality" => "Aracaju",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "AQA",
				"airport_name" => "Araraquara Airport",
				"municipality" => "Araraquara",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "ARU",
				"airport_name" => "Araçatuba Airport",
				"municipality" => "Araçatuba",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "ATM",
				"airport_name" => "Altamira Interstate Airport",
				"municipality" => "Altamira",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "AUX",
				"airport_name" => "Araguaína Airport",
				"municipality" => "Araguaína",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "BAZ",
				"airport_name" => "Barcelos Airport",
				"municipality" => "Barcelos",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "BEL",
				"airport_name" => "Val de Cans/Júlio Cezar Ribeiro International Airport",
				"municipality" => "Belém",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "BPS",
				"airport_name" => "Porto Seguro Airport",
				"municipality" => "Porto Seguro",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "BSB",
				"airport_name" => "Presidente Juscelino Kubitschek International Airport",
				"municipality" => "Brasília",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "BVB",
				"airport_name" => "Atlas Brasil Cantanhede Airport",
				"municipality" => "Boa Vista",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "BVH",
				"airport_name" => "Brigadeiro Camarão Airport",
				"municipality" => "Vilhena",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "BYO",
				"airport_name" => "Bonito Airport",
				"municipality" => "Bonito",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "CAC",
				"airport_name" => "Coronel Adalberto Mendes da Silva Airport",
				"municipality" => "Cascavel",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "CAU",
				"airport_name" => "Caruaru Airport",
				"municipality" => "Caruaru",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "CAW",
				"airport_name" => "Bartolomeu Lisandro Airport",
				"municipality" => "Campos Dos Goytacazes",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "CCM",
				"airport_name" => "Diomício Freitas Airport",
				"municipality" => "Criciúma",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "CFB",
				"airport_name" => "Cabo Frio Airport",
				"municipality" => "Cabo Frio",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "CFC",
				"airport_name" => "Caçador Airport",
				"municipality" => "Caçador",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "CGB",
				"airport_name" => "Marechal Rondon Airport",
				"municipality" => "Cuiabá",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "CGH",
				"airport_name" => "Congonhas Airport",
				"municipality" => "São Paulo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "CGR",
				"airport_name" => "Campo Grande Airport",
				"municipality" => "Campo Grande",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "CKS",
				"airport_name" => "Carajás Airport",
				"municipality" => "Parauapebas",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "CLV",
				"airport_name" => "Nelson Ribeiro Guimarães Airport",
				"municipality" => "Caldas Novas",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "CMG",
				"airport_name" => "Corumbá International Airport",
				"municipality" => "Corumbá",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "CNF",
				"airport_name" => "Tancredo Neves International Airport",
				"municipality" => "Belo Horizonte",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "CPV",
				"airport_name" => "Presidente João Suassuna Airport",
				"municipality" => "Campina Grande",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "CWB",
				"airport_name" => "Afonso Pena Airport",
				"municipality" => "Curitiba",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "CXJ",
				"airport_name" => "Hugo Cantergiani Regional Airport",
				"municipality" => "Caxias Do Sul",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "CZS",
				"airport_name" => "Cruzeiro do Sul Airport",
				"municipality" => "Cruzeiro Do Sul",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "DOU",
				"airport_name" => "Dourados Airport",
				"municipality" => "Dourados",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "FEC",
				"airport_name" => "João Durval Carneiro Airport",
				"municipality" => "Feira De Santana",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "FEN",
				"airport_name" => "Fernando de Noronha Airport",
				"municipality" => "Fernando de Noronha",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "FLN",
				"airport_name" => "Hercílio Luz International Airport",
				"municipality" => "Florianópolis",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "FOR",
				"airport_name" => "Pinto Martins International Airport",
				"municipality" => "Fortaleza",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "GEL",
				"airport_name" => "Santo Ângelo Airport",
				"municipality" => "Santo Ângelo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "GGF",
				"airport_name" => "Almeirim Airport",
				"municipality" => "Almeirim",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "GIG",
				"airport_name" => "Rio Galeão – Tom Jobim International Airport",
				"municipality" => "Rio De Janeiro",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "GRU",
				"airport_name" => "Guarulhos - Governador André Franco Montoro International Airport",
				"municipality" => "São Paulo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "GUZ",
				"airport_name" => "Guarapari Airport",
				"municipality" => "Guarapari",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "GVR",
				"airport_name" => "Coronel Altino Machado de Oliveira Airport",
				"municipality" => "Governador Valadares",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "GYN",
				"airport_name" => "Santa Genoveva Airport",
				"municipality" => "Goiânia",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "IGU",
				"airport_name" => "Cataratas International Airport",
				"municipality" => "Foz do Iguaçu",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "IMP",
				"airport_name" => "Prefeito Renato Moreira Airport",
				"municipality" => "Imperatriz",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "IOS",
				"airport_name" => "Bahia - Jorge Amado Airport",
				"municipality" => "Ilhéus",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "IPN",
				"airport_name" => "Vale do Aço Regional Airport",
				"municipality" => "Ipatinga",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "IRZ",
				"airport_name" => "Tapuruquara Airport",
				"municipality" => "Santa Isabel Do Rio Negro",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "ITB",
				"airport_name" => "Itaituba Airport",
				"municipality" => "Itaituba",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "IZA",
				"airport_name" => "Presidente Itamar Franco Airport",
				"municipality" => "Juiz de Fora",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "JDF",
				"airport_name" => "Francisco de Assis Airport",
				"municipality" => "Juiz de Fora",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "JDO",
				"airport_name" => "Orlando Bezerra de Menezes Airport",
				"municipality" => "Juazeiro do Norte",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "JJD",
				"airport_name" => "Jericoacoara - Comandante Ariston Pessoa Regional Airport",
				"municipality" => "Cruz",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "JJG",
				"airport_name" => "Humberto Ghizzo Bortoluzzi Regional Airport",
				"municipality" => "Jaguaruna",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "JOI",
				"airport_name" => "Lauro Carneiro de Loyola Airport",
				"municipality" => "Joinville",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "JPA",
				"airport_name" => "Presidente Castro Pinto International Airport",
				"municipality" => "João Pessoa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "JPE",
				"airport_name" => "Nagib Demachki Airport",
				"municipality" => "Paragominas",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "JPR",
				"airport_name" => "Ji-Paraná Airport",
				"municipality" => "Ji-Paraná",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "JPY",
				"airport_name" => "Paraty Airport",
				"municipality" => "Paraty",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "JTC",
				"airport_name" => "Bauru/Arealva–Moussa Nakhal Tobias State Airport",
				"municipality" => "Bauru",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "JUA",
				"airport_name" => "Inácio Luís do Nascimento Airport",
				"municipality" => "Juara",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "LAJ",
				"airport_name" => "Lages Airport",
				"municipality" => "Lages",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "LCB",
				"airport_name" => "Pontes e Lacerda Airport",
				"municipality" => "Pontes e Lacerda",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "LDB",
				"airport_name" => "Governador José Richa Airport",
				"municipality" => "Londrina",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "LEC",
				"airport_name" => "Coronel Horácio de Mattos Airport",
				"municipality" => "Lençóis",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "MAB",
				"airport_name" => "João Correa da Rocha Airport",
				"municipality" => "Marabá",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "MAO",
				"airport_name" => "Eduardo Gomes International Airport",
				"municipality" => "Manaus",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "MCP",
				"airport_name" => "Macapá - Alberto Alcolumbre International Airport",
				"municipality" => "Macapá",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "MCZ",
				"airport_name" => "Zumbi dos Palmares Airport",
				"municipality" => "Maceió",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "MEA",
				"airport_name" => "Macaé Benedito Lacerda Airport",
				"municipality" => "Macaé",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "MEU",
				"airport_name" => "Monte Dourado - Serra do Areão Airport",
				"municipality" => "Almeirim",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "MGF",
				"airport_name" => "Regional de Maringá - Sílvio Name Júnior Airport",
				"municipality" => "Maringá",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "MII",
				"airport_name" => "Frank Miloye Milenkowichi–Marília State Airport",
				"municipality" => "Marília",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "MNX",
				"airport_name" => "Manicoré Airport",
				"municipality" => "Manicoré",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "MOC",
				"airport_name" => "Mário Ribeiro Airport",
				"municipality" => "Montes Claros",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "MVF",
				"airport_name" => "Dix-Sept Rosado Airport",
				"municipality" => "Mossoró",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "MVS",
				"airport_name" => "Mucuri Airport",
				"municipality" => "Mucuri",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "MXQ",
				"airport_name" => "Morro de São Paulo Airport",
				"municipality" => "Cairu",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "NAT",
				"airport_name" => "São Gonçalo do Amarante - Governador Aluízio Alves International Airport",
				"municipality" => "Natal",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "NVT",
				"airport_name" => "Ministro Victor Konder International Airport",
				"municipality" => "Navegantes",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "OAL",
				"airport_name" => "Cacoal Airport",
				"municipality" => "Cacoal",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "OBI",
				"airport_name" => "Óbidos Municipal Airport",
				"municipality" => "Óbidos",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "OPP",
				"airport_name" => "Salinópolis Airport",
				"municipality" => "Salinópolis",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "PAV",
				"airport_name" => "Paulo Afonso Airport",
				"municipality" => "Paulo Afonso",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "PET",
				"airport_name" => "João Simões Lopes Neto International Airport",
				"municipality" => "Pelotas",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "PFB",
				"airport_name" => "Lauro Kurtz Airport",
				"municipality" => "Passo Fundo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "PGZ",
				"airport_name" => "Ponta Grossa Airport - Comandante Antonio Amilton Beraldo",
				"municipality" => "Ponta Grossa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "PHB",
				"airport_name" => "Parnaíba - Prefeito Doutor João Silva Filho International Airport",
				"municipality" => "Parnaíba",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "PMG",
				"airport_name" => "Ponta Porã Airport",
				"municipality" => "Ponta Porã",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "PMW",
				"airport_name" => "Brigadeiro Lysias Rodrigues Airport",
				"municipality" => "Palmas",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "PNZ",
				"airport_name" => "Senador Nilo Coelho Airport",
				"municipality" => "Petrolina",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "POA",
				"airport_name" => "Salgado Filho International Airport",
				"municipality" => "Porto Alegre",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "PPB",
				"airport_name" => "Presidente Prudente Airport",
				"municipality" => "Presidente Prudente",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "PTO",
				"airport_name" => "Juvenal Loureiro Cardoso Airport",
				"municipality" => "Pato Branco",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "PVH",
				"airport_name" => "Governador Jorge Teixeira de Oliveira Airport",
				"municipality" => "Porto Velho",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "RAO",
				"airport_name" => "Leite Lopes Airport",
				"municipality" => "Ribeirão Preto",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "RBR",
				"airport_name" => "Rio Branco-Plácido de Castro International Airport",
				"municipality" => "Rio Branco",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "REC",
				"airport_name" => "Recife/Guararapes - Gilberto Freyre International Airport",
				"municipality" => "Recife",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "RIA",
				"airport_name" => "Santa Maria Airport",
				"municipality" => "Santa Maria",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "ROO",
				"airport_name" => "Maestro Marinho Franco Airport",
				"municipality" => "Rondonópolis",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "SDU",
				"airport_name" => "Santos Dumont Airport",
				"municipality" => "Rio de Janeiro",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "SJK",
				"airport_name" => "Professor Urbano Ernesto Stumpf Airport",
				"municipality" => "São José Dos Campos",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "SJL",
				"airport_name" => "São Gabriel da Cachoeira Airport",
				"municipality" => "São Gabriel Da Cachoeira",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "SJP",
				"airport_name" => "Prof. Eribelto Manoel Reino State Airport",
				"municipality" => "São José do Rio Preto",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "SLZ",
				"airport_name" => "Marechal Cunha Machado International Airport",
				"municipality" => "São Luís",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "SMT",
				"airport_name" => "Adolino Bedin Regional Airport",
				"municipality" => "Sorriso",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "SOD",
				"airport_name" => "Sorocaba Airport",
				"municipality" => "Sorocaba",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "SRA",
				"airport_name" => "Santa Rosa Airport",
				"municipality" => "Santa Rosa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "SSA",
				"airport_name" => "Deputado Luiz Eduardo Magalhães International Airport",
				"municipality" => "Salvador",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "STM",
				"airport_name" => "Santarém - Maestro Wilson Fonseca International Airport",
				"municipality" => "Santarém",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "TBT",
				"airport_name" => "Tabatinga Airport",
				"municipality" => "Tabatinga",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "TFF",
				"airport_name" => "Tefé Airport",
				"municipality" => "Tefé",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "TGQ",
				"airport_name" => "Tangará da Serra Airport",
				"municipality" => "Tangará Da Serra",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "THE",
				"airport_name" => "Senador Petrônio Portela Airport",
				"municipality" => "Teresina",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "TJL",
				"airport_name" => "Plínio Alarcom Airport",
				"municipality" => "Três Lagoas",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "TMT",
				"airport_name" => "Trombetas Airport",
				"municipality" => "Oriximiná",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "TOW",
				"airport_name" => "Toledo - Luiz Dalcanale Filho Municipal Airport",
				"municipality" => "Toledo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "TUR",
				"airport_name" => "Tucuruí Airport",
				"municipality" => "Tucuruí",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "TXF",
				"airport_name" => "9 de Maio - Teixeira de Freitas Airport",
				"municipality" => "Teixeira De Freitas",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "UBA",
				"airport_name" => "Mário de Almeida Franco Airport",
				"municipality" => "Uberaba",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "UDI",
				"airport_name" => "Ten. Cel. Aviador César Bombonato Airport",
				"municipality" => "Uberlândia",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "UNA",
				"airport_name" => "Una-Comandatuba Airport",
				"municipality" => "Una",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "URG",
				"airport_name" => "Rubem Berta Airport",
				"municipality" => "Uruguaiana",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "VAL",
				"airport_name" => "Valença Airport",
				"municipality" => "Valença",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "VCP",
				"airport_name" => "Viracopos International Airport",
				"municipality" => "Campinas",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "VDC",
				"airport_name" => "Glauber de Andrade Rocha Airport",
				"municipality" => "Vitória da Conquista",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "VIX",
				"airport_name" => "Eurico de Aguiar Salles Airport",
				"municipality" => "Vitória",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BR",
				"iata_code" => "XAP",
				"airport_name" => "Serafin Enoss Bertaso Airport",
				"municipality" => "Chapecó",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BS",
				"iata_code" => "ATC",
				"airport_name" => "Arthur's Town Airport",
				"municipality" => "Arthur's Town",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BS",
				"iata_code" => "AXP",
				"airport_name" => "Spring Point Airport",
				"municipality" => "Spring Point",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BS",
				"iata_code" => "BIM",
				"airport_name" => "South Bimini Airport",
				"municipality" => "South Bimini",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BS",
				"iata_code" => "CCZ",
				"airport_name" => "Chub Cay Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BS",
				"iata_code" => "CRI",
				"airport_name" => "Colonel Hill Airport",
				"municipality" => "Colonel Hill",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BS",
				"iata_code" => "ELH",
				"airport_name" => "North Eleuthera Airport",
				"municipality" => "North Eleuthera",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BS",
				"iata_code" => "FPO",
				"airport_name" => "Grand Bahama International Airport",
				"municipality" => "Freeport",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BS",
				"iata_code" => "GGT",
				"airport_name" => "Exuma International Airport",
				"municipality" => "Moss Town",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BS",
				"iata_code" => "GHB",
				"airport_name" => "Governor's Harbour Airport",
				"municipality" => "Governor's Harbour",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BS",
				"iata_code" => "IGA",
				"airport_name" => "Inagua Airport",
				"municipality" => "Matthew Town",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BS",
				"iata_code" => "LGI",
				"airport_name" => "Deadman's Cay Airport",
				"municipality" => "Deadman's Cay",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BS",
				"iata_code" => "MHH",
				"airport_name" => "Leonard M Thompson International Airport",
				"municipality" => "Marsh Harbour",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BS",
				"iata_code" => "MYG",
				"airport_name" => "Mayaguana Airport",
				"municipality" => "Abrahams Bay",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BS",
				"iata_code" => "NAS",
				"airport_name" => "Lynden Pindling International Airport",
				"municipality" => "Nassau",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BS",
				"iata_code" => "SAQ",
				"airport_name" => "San Andros Airport",
				"municipality" => "Andros Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BS",
				"iata_code" => "SML",
				"airport_name" => "Stella Maris Airport",
				"municipality" => "Stella Maris",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BS",
				"iata_code" => "TBI",
				"airport_name" => "New Bight Airport",
				"municipality" => "Cat Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BS",
				"iata_code" => "TCB",
				"airport_name" => "Treasure Cay Airport",
				"municipality" => "Treasure Cay",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BS",
				"iata_code" => "TZN",
				"airport_name" => "Congo Town Airport",
				"municipality" => "Andros",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BS",
				"iata_code" => "ZSA",
				"airport_name" => "San Salvador Airport",
				"municipality" => "San Salvador",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BT",
				"iata_code" => "BUT",
				"airport_name" => "Bathpalathang Airport",
				"municipality" => "Jakar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BT",
				"iata_code" => "PBH",
				"airport_name" => "Paro International Airport",
				"municipality" => "Paro",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BT",
				"iata_code" => "YON",
				"airport_name" => "Yongphulla Airport",
				"municipality" => "Tashigang",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BW",
				"iata_code" => "BBK",
				"airport_name" => "Kasane Airport",
				"municipality" => "Kasane",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BW",
				"iata_code" => "FRW",
				"airport_name" => "P G Matante Intl",
				"municipality" => "Francistown",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BW",
				"iata_code" => "GBE",
				"airport_name" => "Sir Seretse Khama International Airport",
				"municipality" => "Gaborone",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BW",
				"iata_code" => "GNZ",
				"airport_name" => "Ghanzi Airport",
				"municipality" => "Ghanzi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BW",
				"iata_code" => "JWA",
				"airport_name" => "Jwaneng Airport",
				"municipality" => "Jwaneng",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BW",
				"iata_code" => "MUB",
				"airport_name" => "Maun Airport",
				"municipality" => "Maun",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BW",
				"iata_code" => "ORP",
				"airport_name" => "Orapa Airport",
				"municipality" => "Orapa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BW",
				"iata_code" => "PKW",
				"airport_name" => "Selebi Phikwe Airport",
				"municipality" => "Selebi Phikwe",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BW",
				"iata_code" => "SWX",
				"airport_name" => "Shakawe Airport",
				"municipality" => "Shakawe",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BW",
				"iata_code" => "TLD",
				"airport_name" => "Limpopo Valley Airport",
				"municipality" => "Tuli Lodge",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BY",
				"iata_code" => "BQT",
				"airport_name" => "Brest Airport",
				"municipality" => "Brest",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BY",
				"iata_code" => "GME",
				"airport_name" => "Gomel Airport",
				"municipality" => "Gomel",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BY",
				"iata_code" => "GNA",
				"airport_name" => "Hrodna Airport",
				"municipality" => "Hrodna",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BY",
				"iata_code" => "MSQ",
				"airport_name" => "Minsk National Airport",
				"municipality" => "Minsk",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BY",
				"iata_code" => "MVQ",
				"airport_name" => "Mogilev Airport",
				"municipality" => "Mogilev",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BZ",
				"iata_code" => "BCV",
				"airport_name" => "Hector Silva Airstrip",
				"municipality" => "Belmopan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BZ",
				"iata_code" => "BGK",
				"airport_name" => "Big Creek Airport",
				"municipality" => "Big Creek",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BZ",
				"iata_code" => "BZE",
				"airport_name" => "Philip S. W. Goldson International Airport",
				"municipality" => "Belize City",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BZ",
				"iata_code" => "CUK",
				"airport_name" => "Caye Caulker Airport",
				"municipality" => "Caye Caulker",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BZ",
				"iata_code" => "CYC",
				"airport_name" => "Caye Chapel Airport",
				"municipality" => "Caye Chapel",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BZ",
				"iata_code" => "CZH",
				"airport_name" => "Corozal Municipal Airport",
				"municipality" => "Corozal",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BZ",
				"iata_code" => "DGA",
				"airport_name" => "Dangriga Airport",
				"municipality" => "Dangriga",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BZ",
				"iata_code" => "PLJ",
				"airport_name" => "Placencia Airport",
				"municipality" => "Placencia",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BZ",
				"iata_code" => "PND",
				"airport_name" => "Punta Gorda Airport",
				"municipality" => "Punta Gorda",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BZ",
				"iata_code" => "SJX",
				"airport_name" => "Sartaneja Airport",
				"municipality" => "Sartaneja",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BZ",
				"iata_code" => "SPR",
				"airport_name" => "John Greif II Airport",
				"municipality" => "San Pedro",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "BZ",
				"iata_code" => "TZA",
				"airport_name" => "Sir Barry Bowen Municipal Airport",
				"municipality" => "Belize City",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "AKV",
				"airport_name" => "Akulivik Airport",
				"municipality" => "Akulivik",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "ILF",
				"airport_name" => "Ilford Airport",
				"municipality" => "Ilford",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "KIF",
				"airport_name" => "Kingfisher Lake Airport",
				"municipality" => "Kingfisher Lake",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "LAK",
				"airport_name" => "Aklavik/Freddie Carmichael Airport",
				"municipality" => "Aklavik",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "MSA",
				"airport_name" => "Muskrat Dam Airport",
				"municipality" => "Muskrat Dam",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "QBC",
				"airport_name" => "Bella Coola Airport",
				"municipality" => "Bella Coola",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "SUR",
				"airport_name" => "Summer Beaver Airport",
				"municipality" => "Summer Beaver",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "WNN",
				"airport_name" => "Wunnumin Lake Airport",
				"municipality" => "Wunnumin Lake",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "XBE",
				"airport_name" => "Bearskin Lake Airport",
				"municipality" => "Bearskin Lake",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "XGR",
				"airport_name" => "Kangiqsualujjuaq (Georges River) Airport",
				"municipality" => "Kangiqsualujjuaq",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "XKS",
				"airport_name" => "Kasabonika Airport",
				"municipality" => "Kasabonika",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "XTL",
				"airport_name" => "Tadoule Lake Airport",
				"municipality" => "Tadoule Lake",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YAA",
				"airport_name" => "Anahim Lake Airport",
				"municipality" => "Anahim Lake",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YAB",
				"airport_name" => "Arctic Bay Airport",
				"municipality" => "Arctic Bay",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YAC",
				"airport_name" => "Cat Lake Airport",
				"municipality" => "Cat Lake",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YAG",
				"airport_name" => "Fort Frances Municipal Airport",
				"municipality" => "Fort Frances",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YAM",
				"airport_name" => "Sault Ste Marie Airport",
				"municipality" => "Sault Ste Marie",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YAT",
				"airport_name" => "Attawapiskat Airport",
				"municipality" => "Attawapiskat",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YAX",
				"airport_name" => "Wapekeka Airport",
				"municipality" => "Angling Lake",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YAY",
				"airport_name" => "St. Anthony Airport",
				"municipality" => "St. Anthony",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YAZ",
				"airport_name" => "Tofino / Long Beach Airport",
				"municipality" => "Tofino",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YBB",
				"airport_name" => "Kugaaruk Airport",
				"municipality" => "Kugaaruk",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YBC",
				"airport_name" => "Baie-Comeau Airport",
				"municipality" => "Baie-Comeau",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YBE",
				"airport_name" => "Uranium City Airport",
				"municipality" => "Uranium City",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YBG",
				"airport_name" => "CFB Bagotville",
				"municipality" => "Bagotville",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YBK",
				"airport_name" => "Baker Lake Airport",
				"municipality" => "Baker Lake",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YBL",
				"airport_name" => "Campbell River Airport",
				"municipality" => "Campbell River",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YBR",
				"airport_name" => "Brandon Municipal Airport",
				"municipality" => "Brandon",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YBT",
				"airport_name" => "Brochet Airport",
				"municipality" => "Brochet",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YBV",
				"airport_name" => "Berens River Airport",
				"municipality" => "Berens River",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YBX",
				"airport_name" => "Lourdes-de-Blanc-Sablon Airport",
				"municipality" => "Lourdes-de-Blanc-Sablon",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YBY",
				"airport_name" => "Bonnyville Airport",
				"municipality" => "Bonnyville",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YCB",
				"airport_name" => "Cambridge Bay Airport",
				"municipality" => "Cambridge Bay",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YCD",
				"airport_name" => "Nanaimo Airport",
				"municipality" => "Nanaimo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YCG",
				"airport_name" => "Castlegar/West Kootenay Regional Airport",
				"municipality" => "Castlegar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YCH",
				"airport_name" => "Miramichi Airport",
				"municipality" => "Miramichi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YCK",
				"airport_name" => "Tommy Kochon Airport",
				"municipality" => "Colville Lake",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YCL",
				"airport_name" => "Charlo Airport",
				"municipality" => "Charlo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YCO",
				"airport_name" => "Kugluktuk Airport",
				"municipality" => "Kugluktuk",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YCS",
				"airport_name" => "Chesterfield Inlet Airport",
				"municipality" => "Chesterfield Inlet",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YCY",
				"airport_name" => "Clyde River Airport",
				"municipality" => "Clyde River",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YDA",
				"airport_name" => "Dawson City Airport",
				"municipality" => "Dawson City",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YDF",
				"airport_name" => "Deer Lake Airport",
				"municipality" => "Deer Lake",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YDN",
				"airport_name" => "Dauphin Barker Airport",
				"municipality" => "Dauphin",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YDP",
				"airport_name" => "Nain Airport",
				"municipality" => "Nain",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YDQ",
				"airport_name" => "Dawson Creek Airport",
				"municipality" => "Dawson Creek",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YEG",
				"airport_name" => "Edmonton International Airport",
				"municipality" => "Edmonton",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YEK",
				"airport_name" => "Arviat Airport",
				"municipality" => "Arviat",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YER",
				"airport_name" => "Fort Severn Airport",
				"municipality" => "Fort Severn",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YEV",
				"airport_name" => "Inuvik Mike Zubko Airport",
				"municipality" => "Inuvik",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YFA",
				"airport_name" => "Fort Albany Airport",
				"municipality" => "Fort Albany",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YFB",
				"airport_name" => "Iqaluit Airport",
				"municipality" => "Iqaluit",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YFC",
				"airport_name" => "Fredericton Airport",
				"municipality" => "Fredericton",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YFH",
				"airport_name" => "Fort Hope Airport",
				"municipality" => "Fort Hope",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YFJ",
				"airport_name" => "Wekweètì Airport",
				"municipality" => "Wekweètì",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YFO",
				"airport_name" => "Flin Flon Airport",
				"municipality" => "Flin Flon",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YFS",
				"airport_name" => "Fort Simpson Airport",
				"municipality" => "Fort Simpson",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YFX",
				"airport_name" => "St. Lewis (Fox Harbour) Airport",
				"municipality" => "St. Lewis",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YGB",
				"airport_name" => "Texada Gillies Bay Airport",
				"municipality" => "Texada",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YGH",
				"airport_name" => "Fort Good Hope Airport",
				"municipality" => "Fort Good Hope",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YGK",
				"airport_name" => "Kingston Norman Rogers Airport",
				"municipality" => "Kingston",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YGL",
				"airport_name" => "La Grande Rivière Airport",
				"municipality" => "La Grande Rivière",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YGO",
				"airport_name" => "Gods Lake Narrows Airport",
				"municipality" => "Gods Lake Narrows",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YGP",
				"airport_name" => "Gaspé (Michel-Pouliot) Airport",
				"municipality" => "Gaspé",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YGR",
				"airport_name" => "Îles-de-la-Madeleine Airport",
				"municipality" => "Îles-de-la-Madeleine",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YGT",
				"airport_name" => "Igloolik Airport",
				"municipality" => "Igloolik",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YGW",
				"airport_name" => "Kuujjuarapik Airport",
				"municipality" => "Kuujjuarapik",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YGX",
				"airport_name" => "Gillam Airport",
				"municipality" => "Gillam",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YGZ",
				"airport_name" => "Grise Fiord Airport",
				"municipality" => "Grise Fiord",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YHA",
				"airport_name" => "Port Hope Simpson Airport",
				"municipality" => "Port Hope Simpson",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YHD",
				"airport_name" => "Dryden Regional Airport",
				"municipality" => "Dryden",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YHI",
				"airport_name" => "Ulukhaktok Holman Airport",
				"municipality" => "Ulukhaktok",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YHK",
				"airport_name" => "Gjoa Haven Airport",
				"municipality" => "Gjoa Haven",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YHM",
				"airport_name" => "John C. Munro Hamilton International Airport",
				"municipality" => "Hamilton",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YHO",
				"airport_name" => "Hopedale Airport",
				"municipality" => "Hopedale",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YHP",
				"airport_name" => "Poplar Hill Airport",
				"municipality" => "Poplar Hill",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YHR",
				"airport_name" => "Chevery Airport",
				"municipality" => "Chevery",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YHU",
				"airport_name" => "Montréal / Saint-Hubert Airport",
				"municipality" => "Montréal",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YHY",
				"airport_name" => "Hay River / Merlyn Carter Airport",
				"municipality" => "Hay River",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YHZ",
				"airport_name" => "Halifax / Stanfield International Airport",
				"municipality" => "Halifax",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YIK",
				"airport_name" => "Ivujivik Airport",
				"municipality" => "Ivujivik",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YIO",
				"airport_name" => "Pond Inlet Airport",
				"municipality" => "Pond Inlet",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YIV",
				"airport_name" => "Island Lake Airport",
				"municipality" => "Island Lake",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YJT",
				"airport_name" => "Stephenville Airport",
				"municipality" => "Stephenville",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YKA",
				"airport_name" => "Kamloops Airport",
				"municipality" => "Kamloops",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YKF",
				"airport_name" => "Waterloo Airport",
				"municipality" => "Kitchener",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YKG",
				"airport_name" => "Kangirsuk Airport",
				"municipality" => "Kangirsuk",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YKL",
				"airport_name" => "Schefferville Airport",
				"municipality" => "Schefferville",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YKQ",
				"airport_name" => "Waskaganish Airport",
				"municipality" => "Waskaganish",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YKU",
				"airport_name" => "Chisasibi Airport",
				"municipality" => "Chisasibi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YLC",
				"airport_name" => "Kimmirut Airport",
				"municipality" => "Kimmirut",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YLE",
				"airport_name" => "Whatì Airport",
				"municipality" => "Whatì",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YLH",
				"airport_name" => "Lansdowne House Airport",
				"municipality" => "Lansdowne House",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YLL",
				"airport_name" => "Lloydminster Airport",
				"municipality" => "Lloydminster",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YLW",
				"airport_name" => "Kelowna International Airport",
				"municipality" => "Kelowna",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YMH",
				"airport_name" => "Mary's Harbour Airport",
				"municipality" => "Mary's Harbour",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YMM",
				"airport_name" => "Fort McMurray Airport",
				"municipality" => "Fort McMurray",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YMN",
				"airport_name" => "Makkovik Airport",
				"municipality" => "Makkovik",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YMO",
				"airport_name" => "Moosonee Airport",
				"municipality" => "Moosonee",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YMT",
				"airport_name" => "Chapais Airport",
				"municipality" => "Chibougamau",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YNA",
				"airport_name" => "Natashquan Airport",
				"municipality" => "Natashquan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YNC",
				"airport_name" => "Wemindji Airport",
				"municipality" => "Wemindji",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YND",
				"airport_name" => "Ottawa / Gatineau Airport",
				"municipality" => "Gatineau",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YNE",
				"airport_name" => "Norway House Airport",
				"municipality" => "Norway House",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YNL",
				"airport_name" => "Points North Landing Airport",
				"municipality" => "Points North Landing",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YNO",
				"airport_name" => "North Spirit Lake Airport",
				"municipality" => "North Spirit Lake",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YNP",
				"airport_name" => "Natuashish Airport",
				"municipality" => "Natuashish",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YNS",
				"airport_name" => "Nemiscau Airport",
				"municipality" => "Nemiscau",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YOC",
				"airport_name" => "Old Crow Airport",
				"municipality" => "Old Crow",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YOG",
				"airport_name" => "Ogoki Post Airport",
				"municipality" => "Ogoki Post",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YOH",
				"airport_name" => "Oxford House Airport",
				"municipality" => "Oxford House",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YOJ",
				"airport_name" => "High Level Airport",
				"municipality" => "High Level",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YOP",
				"airport_name" => "Rainbow Lake Airport",
				"municipality" => "Rainbow Lake",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YOW",
				"airport_name" => "Ottawa Macdonald-Cartier International Airport",
				"municipality" => "Ottawa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YPA",
				"airport_name" => "Prince Albert Glass Field",
				"municipality" => "Prince Albert",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YPC",
				"airport_name" => "Paulatuk (Nora Aliqatchialuk Ruben) Airport",
				"municipality" => "Paulatuk",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YPE",
				"airport_name" => "Peace River Airport",
				"municipality" => "Peace River",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YPH",
				"airport_name" => "Inukjuak Airport",
				"municipality" => "Inukjuak",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YPJ",
				"airport_name" => "Aupaluk Airport",
				"municipality" => "Aupaluk",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YPL",
				"airport_name" => "Pickle Lake Airport",
				"municipality" => "Pickle Lake",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YPM",
				"airport_name" => "Pikangikum Airport",
				"municipality" => "Pikangikum",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YPO",
				"airport_name" => "Peawanuck Airport",
				"municipality" => "Peawanuck",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YPR",
				"airport_name" => "Prince Rupert Airport",
				"municipality" => "Prince Rupert",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YPW",
				"airport_name" => "Powell River Airport",
				"municipality" => "Powell River",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YPY",
				"airport_name" => "Fort Chipewyan Airport",
				"municipality" => "Fort Chipewyan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YQB",
				"airport_name" => "Quebec Jean Lesage International Airport",
				"municipality" => "Quebec",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YQC",
				"airport_name" => "Quaqtaq Airport",
				"municipality" => "Quaqtaq",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YQD",
				"airport_name" => "The Pas Airport",
				"municipality" => "The Pas",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YQG",
				"airport_name" => "Windsor Airport",
				"municipality" => "Windsor",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YQK",
				"airport_name" => "Kenora Airport",
				"municipality" => "Kenora",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YQL",
				"airport_name" => "Lethbridge County Airport",
				"municipality" => "Lethbridge",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YQM",
				"airport_name" => "Greater Moncton Roméo LeBlanc International Airport",
				"municipality" => "Moncton",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YQN",
				"airport_name" => "Nakina Airport",
				"municipality" => "Nakina",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YQQ",
				"airport_name" => "Comox Valley Airport / CFB Comox",
				"municipality" => "Comox",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YQR",
				"airport_name" => "Regina International Airport",
				"municipality" => "Regina",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YQT",
				"airport_name" => "Thunder Bay Airport",
				"municipality" => "Thunder Bay",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YQU",
				"airport_name" => "Grande Prairie Airport",
				"municipality" => "Grande Prairie",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YQX",
				"airport_name" => "Gander International Airport",
				"municipality" => "Gander",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YQY",
				"airport_name" => "Sydney / J.A. Douglas McCurdy Airport",
				"municipality" => "Sydney",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YQZ",
				"airport_name" => "Quesnel Airport",
				"municipality" => "Quesnel",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YRA",
				"airport_name" => "Rae Lakes Airport",
				"municipality" => "Gamètì",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YRB",
				"airport_name" => "Resolute Bay Airport",
				"municipality" => "Resolute Bay",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YRF",
				"airport_name" => "Cartwright Airport",
				"municipality" => "Cartwright",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YRG",
				"airport_name" => "Rigolet Airport",
				"municipality" => "Rigolet",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YRJ",
				"airport_name" => "Roberval Airport",
				"municipality" => "Roberval",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YRL",
				"airport_name" => "Red Lake Airport",
				"municipality" => "Red Lake",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YRT",
				"airport_name" => "Rankin Inlet Airport",
				"municipality" => "Rankin Inlet",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YSB",
				"airport_name" => "Sudbury Airport",
				"municipality" => "Sudbury",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YSF",
				"airport_name" => "Stony Rapids Airport",
				"municipality" => "Stony Rapids",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YSG",
				"airport_name" => "Lutselk'e Airport",
				"municipality" => "Lutselk'e",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YSJ",
				"airport_name" => "Saint John Airport",
				"municipality" => "Saint John",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YSK",
				"airport_name" => "Sanikiluaq Airport",
				"municipality" => "Sanikiluaq",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YSM",
				"airport_name" => "Fort Smith Airport",
				"municipality" => "Fort Smith",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YSO",
				"airport_name" => "Postville Airport",
				"municipality" => "Postville",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YST",
				"airport_name" => "St. Theresa Point Airport",
				"municipality" => "St. Theresa Point",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YSY",
				"airport_name" => "Sachs Harbour (David Nasogaluak Jr. Saaryuaq) Airport",
				"municipality" => "Sachs Harbour",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YTE",
				"airport_name" => "Cape Dorset Airport",
				"municipality" => "Kinngait",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YTF",
				"airport_name" => "Alma Airport",
				"municipality" => "Alma",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YTH",
				"airport_name" => "Thompson Airport",
				"municipality" => "Thompson",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YTL",
				"airport_name" => "Big Trout Lake Airport",
				"municipality" => "Big Trout Lake",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YTM",
				"airport_name" => "Mont-Tremblant International Airport",
				"municipality" => "La Macaza",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YTS",
				"airport_name" => "Timmins/Victor M. Power",
				"municipality" => "Timmins",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YTZ",
				"airport_name" => "Billy Bishop Toronto City Centre Airport",
				"municipality" => "Toronto",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YUB",
				"airport_name" => "Tuktoyaktuk / James Gruben Airport",
				"municipality" => "Tuktoyaktuk",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YUD",
				"airport_name" => "Umiujaq Airport",
				"municipality" => "Umiujaq",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YUL",
				"airport_name" => "Montreal / Pierre Elliott Trudeau International Airport",
				"municipality" => "Montréal",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YUT",
				"airport_name" => "Naujaat Airport",
				"municipality" => "Repulse Bay",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YUX",
				"airport_name" => "Hall Beach Airport",
				"municipality" => "Sanirajak",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YUY",
				"airport_name" => "Rouyn Noranda Airport",
				"municipality" => "Rouyn-Noranda",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YVC",
				"airport_name" => "La Ronge Airport",
				"municipality" => "La Ronge",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YVM",
				"airport_name" => "Qikiqtarjuaq Airport",
				"municipality" => "Qikiqtarjuaq",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YVO",
				"airport_name" => "Val-d'Or Airport",
				"municipality" => "Val-d'Or",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YVP",
				"airport_name" => "Kuujjuaq Airport",
				"municipality" => "Kuujjuaq",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YVQ",
				"airport_name" => "Norman Wells Airport",
				"municipality" => "Norman Wells",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YVR",
				"airport_name" => "Vancouver International Airport",
				"municipality" => "Vancouver",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YVZ",
				"airport_name" => "Deer Lake Airport",
				"municipality" => "Deer Lake",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YWB",
				"airport_name" => "Kangiqsujuaq (Wakeham Bay) Airport",
				"municipality" => "Kangiqsujuaq",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YWG",
				"airport_name" => "Winnipeg / James Armstrong Richardson International Airport",
				"municipality" => "Winnipeg",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YWJ",
				"airport_name" => "Déline Airport",
				"municipality" => "Déline",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YWK",
				"airport_name" => "Wabush Airport",
				"municipality" => "Wabush",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YWL",
				"airport_name" => "Williams Lake Airport",
				"municipality" => "Williams Lake",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YWM",
				"airport_name" => "Williams Harbour Airport",
				"municipality" => "Williams Harbour",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YWP",
				"airport_name" => "Webequie Airport",
				"municipality" => "Webequie",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YXC",
				"airport_name" => "Cranbrook/Canadian Rockies International Airport",
				"municipality" => "Cranbrook",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YXE",
				"airport_name" => "Saskatoon John G. Diefenbaker International Airport",
				"municipality" => "Saskatoon",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YXH",
				"airport_name" => "Medicine Hat Regional Airport",
				"municipality" => "Medicine Hat",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YXJ",
				"airport_name" => "Fort St John Airport",
				"municipality" => "Fort St.John",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YXL",
				"airport_name" => "Sioux Lookout Airport",
				"municipality" => "Sioux Lookout",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YXN",
				"airport_name" => "Whale Cove Airport",
				"municipality" => "Whale Cove",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YXP",
				"airport_name" => "Pangnirtung Airport",
				"municipality" => "Pangnirtung",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YXS",
				"airport_name" => "Prince George Airport",
				"municipality" => "Prince George",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YXT",
				"airport_name" => "Northwest Regional Airport Terrace-Kitimat",
				"municipality" => "Terrace",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YXU",
				"airport_name" => "London Airport",
				"municipality" => "London",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YXX",
				"airport_name" => "Abbotsford International Airport",
				"municipality" => "Abbotsford",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YXY",
				"airport_name" => "Whitehorse / Erik Nielsen International Airport",
				"municipality" => "Whitehorse",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YYB",
				"airport_name" => "North Bay Jack Garland Airport",
				"municipality" => "North Bay",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YYC",
				"airport_name" => "Calgary International Airport",
				"municipality" => "Calgary",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YYD",
				"airport_name" => "Smithers Airport",
				"municipality" => "Smithers",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YYE",
				"airport_name" => "Fort Nelson Airport",
				"municipality" => "Fort Nelson",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YYF",
				"airport_name" => "Penticton Airport",
				"municipality" => "Penticton",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YYG",
				"airport_name" => "Charlottetown Airport",
				"municipality" => "Charlottetown",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YYH",
				"airport_name" => "Taloyoak Airport",
				"municipality" => "Taloyoak",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YYJ",
				"airport_name" => "Victoria International Airport",
				"municipality" => "Victoria",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YYL",
				"airport_name" => "Lynn Lake Airport",
				"municipality" => "Lynn Lake",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YYQ",
				"airport_name" => "Churchill Airport",
				"municipality" => "Churchill",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YYR",
				"airport_name" => "Goose Bay Airport",
				"municipality" => "Goose Bay",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YYT",
				"airport_name" => "St. John's International Airport",
				"municipality" => "St. John's",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YYU",
				"airport_name" => "Kapuskasing Airport",
				"municipality" => "Kapuskasing",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YYY",
				"airport_name" => "Mont Joli Airport",
				"municipality" => "Mont-Joli",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YYZ",
				"airport_name" => "Lester B. Pearson International Airport",
				"municipality" => "Toronto",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YZF",
				"airport_name" => "Yellowknife International Airport",
				"municipality" => "Yellowknife",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YZG",
				"airport_name" => "Salluit Airport",
				"municipality" => "Salluit",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YZP",
				"airport_name" => "Sandspit Airport",
				"municipality" => "Sandspit",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YZR",
				"airport_name" => "Chris Hadfield Airport",
				"municipality" => "Sarnia",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YZS",
				"airport_name" => "Coral Harbour Airport",
				"municipality" => "Coral Harbour",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YZT",
				"airport_name" => "Port Hardy Airport",
				"municipality" => "Port Hardy",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YZV",
				"airport_name" => "Sept-Îles Airport",
				"municipality" => "Sept-Îles",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "YZZ",
				"airport_name" => "Trail Airport",
				"municipality" => "Trail",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "ZAC",
				"airport_name" => "York Landing Airport",
				"municipality" => "York Landing",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "ZBF",
				"airport_name" => "Bathurst Airport",
				"municipality" => "Bathurst",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "ZEL",
				"airport_name" => "Bella Bella (Campbell Island) Airport",
				"municipality" => "Bella Bella",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "ZEM",
				"airport_name" => "Eastmain River Airport",
				"municipality" => "Eastmain River",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "ZFD",
				"airport_name" => "Fond-Du-Lac Airport",
				"municipality" => "Fond-Du-Lac",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "ZFM",
				"airport_name" => "Fort Mcpherson Airport",
				"municipality" => "Fort Mcpherson",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "ZFN",
				"airport_name" => "Tulita Airport",
				"municipality" => "Tulita",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "ZGI",
				"airport_name" => "Gods River Airport",
				"municipality" => "Gods River",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "ZHH",
				"airport_name" => "Herschel Island Field",
				"municipality" => "Herschel Island (Yukon Territory)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "ZKE",
				"airport_name" => "Kashechewan Airport",
				"municipality" => "Kashechewan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "ZLT",
				"airport_name" => "La Tabatière Airport",
				"municipality" => "La Tabatière",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "ZMT",
				"airport_name" => "Masset Airport",
				"municipality" => "Masset",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "ZPB",
				"airport_name" => "Sachigo Lake Airport",
				"municipality" => "Sachigo Lake",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "ZRJ",
				"airport_name" => "Round Lake (Weagamow Lake) Airport",
				"municipality" => "Round Lake",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "ZSJ",
				"airport_name" => "Sandy Lake Airport",
				"municipality" => "Sandy Lake",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "ZTB",
				"airport_name" => "Tête-à-la-Baleine Airport",
				"municipality" => "Tête-à-la-Baleine",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "ZTM",
				"airport_name" => "Shamattawa Airport",
				"municipality" => "Shamattawa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "ZUM",
				"airport_name" => "Churchill Falls Airport",
				"municipality" => "Churchill Falls",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CA",
				"iata_code" => "ZWL",
				"airport_name" => "Wollaston Lake Airport",
				"municipality" => "Wollaston Lake",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CC",
				"iata_code" => "CCK",
				"airport_name" => "Cocos (Keeling) Islands Airport",
				"municipality" => "West Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CD",
				"iata_code" => "BDT",
				"airport_name" => "Gbadolite Airport",
				"municipality" => "Gbadolite",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CD",
				"iata_code" => "BOA",
				"airport_name" => "Boma Airport",
				"municipality" => "Boma",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CD",
				"iata_code" => "BSU",
				"airport_name" => "Basankusu Airport",
				"municipality" => "Basankusu",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CD",
				"iata_code" => "BUX",
				"airport_name" => "Bunia Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CD",
				"iata_code" => "FBM",
				"airport_name" => "Lubumbashi International Airport",
				"municipality" => "Lubumbashi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CD",
				"iata_code" => "FDU",
				"airport_name" => "Bandundu Airport",
				"municipality" => "Bandundu",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CD",
				"iata_code" => "FIH",
				"airport_name" => "Ndjili International Airport",
				"municipality" => "Kinshasa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CD",
				"iata_code" => "FKI",
				"airport_name" => "Bangoka International Airport",
				"municipality" => "Kisangani",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CD",
				"iata_code" => "FMI",
				"airport_name" => "Kalemie Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CD",
				"iata_code" => "GMA",
				"airport_name" => "Gemena Airport",
				"municipality" => "Gemena",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CD",
				"iata_code" => "GOM",
				"airport_name" => "Goma International Airport",
				"municipality" => "Goma",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CD",
				"iata_code" => "INO",
				"airport_name" => "Inongo Airport",
				"municipality" => "Inongo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CD",
				"iata_code" => "IRP",
				"airport_name" => "Matari Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CD",
				"iata_code" => "KGA",
				"airport_name" => "Kananga Airport",
				"municipality" => "Kananga",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CD",
				"iata_code" => "KKW",
				"airport_name" => "Kikwit Airport",
				"municipality" => "Kikwit",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CD",
				"iata_code" => "KND",
				"airport_name" => "Kindu Airport",
				"municipality" => "Kindu",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CD",
				"iata_code" => "KRZ",
				"airport_name" => "Basango Mboliasa Airport",
				"municipality" => "Kiri",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CD",
				"iata_code" => "KWZ",
				"airport_name" => "Kolwezi Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CD",
				"iata_code" => "LJA",
				"airport_name" => "Lodja Airport",
				"municipality" => "Lodja",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CD",
				"iata_code" => "MAT",
				"airport_name" => "Tshimpi Airport",
				"municipality" => "Matadi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CD",
				"iata_code" => "MDK",
				"airport_name" => "Mbandaka Airport",
				"municipality" => "Mbandaka",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CD",
				"iata_code" => "MJM",
				"airport_name" => "Mbuji Mayi Airport",
				"municipality" => "Mbuji Mayi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CD",
				"iata_code" => "MNB",
				"airport_name" => "Muanda Airport",
				"municipality" => "Muanda",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CD",
				"iata_code" => "NIO",
				"airport_name" => "Nioki Airport",
				"municipality" => "Nioki",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CD",
				"iata_code" => "PFR",
				"airport_name" => "Ilebo Airport",
				"municipality" => "Ilebo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CD",
				"iata_code" => "TSH",
				"airport_name" => "Tshikapa Airport",
				"municipality" => "Tshikapa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CF",
				"iata_code" => "BGF",
				"airport_name" => "Bangui M'Poko International Airport",
				"municipality" => "Bangui",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CG",
				"iata_code" => "BZV",
				"airport_name" => "Maya-Maya Airport",
				"municipality" => "Brazzaville",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CG",
				"iata_code" => "DIS",
				"airport_name" => "Ngot Nzoungou Airport",
				"municipality" => "Dolisie",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CG",
				"iata_code" => "PNR",
				"airport_name" => "Antonio Agostinho-Neto International Airport",
				"municipality" => "Pointe Noire",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CH",
				"iata_code" => "ACH",
				"airport_name" => "St Gallen Altenrhein Airport",
				"municipality" => "Altenrhein",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CH",
				"iata_code" => "BRN",
				"airport_name" => "Bern Belp Airport",
				"municipality" => "Bern",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CH",
				"iata_code" => "GVA",
				"airport_name" => "Geneva Cointrin International Airport",
				"municipality" => "Geneva",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CH",
				"iata_code" => "LUG",
				"airport_name" => "Lugano Airport",
				"municipality" => "Lugano",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CH",
				"iata_code" => "ZRH",
				"airport_name" => "Zürich Airport",
				"municipality" => "Zurich",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CI",
				"iata_code" => "ABJ",
				"airport_name" => "Félix-Houphouët-Boigny International Airport",
				"municipality" => "Abidjan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CI",
				"iata_code" => "BYK",
				"airport_name" => "Bouaké Airport",
				"municipality" => "Bouaké",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CK",
				"iata_code" => "AIT",
				"airport_name" => "Aitutaki Airport",
				"municipality" => "Aitutaki",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CK",
				"iata_code" => "AIU",
				"airport_name" => "Enua Airport",
				"municipality" => "Atiu Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CK",
				"iata_code" => "MGS",
				"airport_name" => "Mangaia Island Airport",
				"municipality" => "Mangaia Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CK",
				"iata_code" => "MHX",
				"airport_name" => "Manihiki Island Airport",
				"municipality" => "Manihiki Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CK",
				"iata_code" => "MOI",
				"airport_name" => "Mitiaro Island Airport",
				"municipality" => "Mitiaro Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CK",
				"iata_code" => "MUK",
				"airport_name" => "Mauke Airport",
				"municipality" => "Mauke Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CK",
				"iata_code" => "PYE",
				"airport_name" => "Tongareva Airport",
				"municipality" => "Penrhyn Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CK",
				"iata_code" => "RAR",
				"airport_name" => "Rarotonga International Airport",
				"municipality" => "Avarua",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CL",
				"iata_code" => "ANF",
				"airport_name" => "Andrés Sabella Gálvez International Airport",
				"municipality" => "Antofagasta",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CL",
				"iata_code" => "ARI",
				"airport_name" => "Chacalluta Airport",
				"municipality" => "Arica",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CL",
				"iata_code" => "BBA",
				"airport_name" => "Balmaceda Airport",
				"municipality" => "Balmaceda",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CL",
				"iata_code" => "CCP",
				"airport_name" => "Carriel Sur Airport",
				"municipality" => "Concepcion",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CL",
				"iata_code" => "CJC",
				"airport_name" => "El Loa Airport",
				"municipality" => "Calama",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CL",
				"iata_code" => "CPO",
				"airport_name" => "Desierto de Atacama Airport",
				"municipality" => "Copiapo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CL",
				"iata_code" => "ESR",
				"airport_name" => "Ricardo García Posada Airport",
				"municipality" => "El Salvador",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CL",
				"iata_code" => "IPC",
				"airport_name" => "Mataveri Airport",
				"municipality" => "Isla De Pascua",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CL",
				"iata_code" => "IQQ",
				"airport_name" => "Diego Aracena Airport",
				"municipality" => "Iquique",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CL",
				"iata_code" => "LSC",
				"airport_name" => "La Florida Airport",
				"municipality" => "La Serena-Coquimbo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CL",
				"iata_code" => "PMC",
				"airport_name" => "El Tepual Airport",
				"municipality" => "Puerto Montt",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CL",
				"iata_code" => "PNT",
				"airport_name" => "Lieutenant Julio Gallardo Airport",
				"municipality" => "Puerto Natales",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CL",
				"iata_code" => "PUQ",
				"airport_name" => "President Carlos Ibañez del Campo International Airport",
				"municipality" => "Punta Arenas",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CL",
				"iata_code" => "SCL",
				"airport_name" => "Comodoro Arturo Merino Benítez International Airport",
				"municipality" => "Santiago",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CL",
				"iata_code" => "ZAL",
				"airport_name" => "Pichoy Airport",
				"municipality" => "Valdivia",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CL",
				"iata_code" => "ZCO",
				"airport_name" => "La Araucanía Airport",
				"municipality" => "Temuco",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CL",
				"iata_code" => "ZOS",
				"airport_name" => "Cañal Bajo Carlos - Hott Siebert Airport",
				"municipality" => "Osorno",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CL",
				"iata_code" => "ZPC",
				"airport_name" => "Pucón Airport",
				"municipality" => "Pucon",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CM",
				"iata_code" => "DLA",
				"airport_name" => "Douala International Airport",
				"municipality" => "Douala",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CM",
				"iata_code" => "GOU",
				"airport_name" => "Garoua International Airport",
				"municipality" => "Garoua",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CM",
				"iata_code" => "MVR",
				"airport_name" => "Salak Airport",
				"municipality" => "Maroua",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CM",
				"iata_code" => "NGE",
				"airport_name" => "N'Gaoundéré Airport",
				"municipality" => "N'Gaoundéré",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CM",
				"iata_code" => "NSI",
				"airport_name" => "Yaoundé Nsimalen International Airport",
				"municipality" => "Yaoundé",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CM",
				"iata_code" => "YAO",
				"airport_name" => "Yaoundé Airport",
				"municipality" => "Yaoundé",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "AAT",
				"airport_name" => "Altay Airport",
				"municipality" => "Altay",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "ACX",
				"airport_name" => "Xingyi Wanfenglin Airport",
				"municipality" => "Xingyi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "AEB",
				"airport_name" => "Baise Youjiang Airport",
				"municipality" => "Baise (Tianyang)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "AKA",
				"airport_name" => "Ankang Fuqiang Airport",
				"municipality" => "Ankang",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "AKU",
				"airport_name" => "Aksu Onsu Airport",
				"municipality" => "Aksu (Onsu)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "AOG",
				"airport_name" => "Anshan Teng'ao Airport / Anshan Air Base",
				"municipality" => "Anshan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "AQG",
				"airport_name" => "Anqing Tianzhushan Airport / Anqing North Air Base",
				"municipality" => "Anqing",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "AVA",
				"airport_name" => "Anshun Huangguoshu Airport",
				"municipality" => "Xixiu, Anshun",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "AXF",
				"airport_name" => "Alxa Left Banner Bayanhot Airport",
				"municipality" => "Bayanhot",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "BAR",
				"airport_name" => "Qionghai Bo'ao Airport",
				"municipality" => "Qionghai",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "BAV",
				"airport_name" => "Baotou Airport",
				"municipality" => "Baotou",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "BFJ",
				"airport_name" => "Bijie Feixiong Airport",
				"municipality" => "Bijie",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "BHY",
				"airport_name" => "Beihai Fucheng Airport",
				"municipality" => "Beihai (Yinhai)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "BPE",
				"airport_name" => "Qinhuangdao Beidaihe Airport",
				"municipality" => "Qinhuangdao",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "BPL",
				"airport_name" => "Bole Alashankou Airport",
				"municipality" => "Bole",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "BPX",
				"airport_name" => "Qamdo Bangda Airport",
				"municipality" => "Bangda",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "BSD",
				"airport_name" => "Baoshan Yunrui Airport",
				"municipality" => "Baoshan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "BZX",
				"airport_name" => "Bazhong Enyang Airport",
				"municipality" => "Bazhong",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "CAN",
				"airport_name" => "Guangzhou Baiyun International Airport",
				"municipality" => "Guangzhou (Huadu)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "CDE",
				"airport_name" => "Chengde Puning Airport",
				"municipality" => "Chengde",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "CGD",
				"airport_name" => "Changde Taohuayuan Airport",
				"municipality" => "Changde",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "CGO",
				"airport_name" => "Zhengzhou Xinzheng International Airport",
				"municipality" => "Zhengzhou",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "CGQ",
				"airport_name" => "Changchun Longjia International Airport",
				"municipality" => "Changchun",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "CHG",
				"airport_name" => "Chaoyang Airport",
				"municipality" => "Shuangta, Chaoyang",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "CIF",
				"airport_name" => "Chifeng Yulong Airport",
				"municipality" => "Chifeng",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "CIH",
				"airport_name" => "Changzhi Airport",
				"municipality" => "Changzhi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "CKG",
				"airport_name" => "Chongqing Jiangbei International Airport",
				"municipality" => "Chongqing",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "CNI",
				"airport_name" => "Changhai Airport",
				"municipality" => "Changhai, Dalian",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "CQW",
				"airport_name" => "Chongqing Xiannüshan Airport",
				"municipality" => "Wulong",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "CSX",
				"airport_name" => "Changsha Huanghua International Airport",
				"municipality" => "Changsha",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "CTU",
				"airport_name" => "Chengdu Shuangliu International Airport",
				"municipality" => "Chengdu",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "CWJ",
				"airport_name" => "Cangyuan Washan Airport",
				"municipality" => "Cangyuan Va Autonomous County",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "CZX",
				"airport_name" => "Changzhou Benniu International Airport",
				"municipality" => "Changzhou",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "DAT",
				"airport_name" => "Datong Yungang Airport",
				"municipality" => "Datong",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "DAX",
				"airport_name" => "Dachuan Airport",
				"municipality" => "Dazhou",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "DBC",
				"airport_name" => "Baicheng Chang'an Airport",
				"municipality" => "Baicheng",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "DCY",
				"airport_name" => "Daocheng Yading Airport",
				"municipality" => "Daocheng County",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "DDG",
				"airport_name" => "Dandong Langtou Airport",
				"municipality" => "Zhenxing, Dandong",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "DIG",
				"airport_name" => "Diqing Shangri-La Airport",
				"municipality" => "Shangri-La",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "DLC",
				"airport_name" => "Dalian Zhoushuizi International Airport",
				"municipality" => "Ganjingzi, Dalian",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "DLU",
				"airport_name" => "Dali Huangcaoba Airport",
				"municipality" => "Dali (Xiaguan)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "DNH",
				"airport_name" => "Dunhuang Mogao International Airport",
				"municipality" => "Dunhuang",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "DQA",
				"airport_name" => "Daqing Sa'ertu Airport",
				"municipality" => "Daqing",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "DSN",
				"airport_name" => "Ordos Ejin Horo Airport",
				"municipality" => "Ordos",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "DTU",
				"airport_name" => "Wudalianchi Dedu Airport",
				"municipality" => "Heihe",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "DYG",
				"airport_name" => "Zhangjiajie Hehua International Airport",
				"municipality" => "Zhangjiajie",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "EJN",
				"airport_name" => "Ejin Banner-Taolai Airport",
				"municipality" => "Ejin Banner",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "ENH",
				"airport_name" => "Enshi Xujiaping Airport",
				"municipality" => "Enshi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "ENY",
				"airport_name" => "Yan'an Nanniwan Airport",
				"municipality" => "Yan'an",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "ERL",
				"airport_name" => "Erenhot Saiwusu International Airport",
				"municipality" => "Erenhot",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "FUG",
				"airport_name" => "Fuyang Xiguan Airport",
				"municipality" => "Yingzhou, Fuyang",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "FUO",
				"airport_name" => "Foshan Shadi Airport",
				"municipality" => "Foshan (Nanhai)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "FYJ",
				"airport_name" => "Fuyuan Dongji Aiport",
				"municipality" => "Fuyuan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "FYN",
				"airport_name" => "Fuyun Koktokay Airport",
				"municipality" => "Fuyun",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "GMQ",
				"airport_name" => "Golog Maqin Airport",
				"municipality" => "Golog",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "GOQ",
				"airport_name" => "Golmud Airport",
				"municipality" => "Golmud",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "GXH",
				"airport_name" => "Gannan Xiahe Airport",
				"municipality" => "Xiahe",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "GYS",
				"airport_name" => "Guangyuan Panlong Airport",
				"municipality" => "Guangyuan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "GZG",
				"airport_name" => "Garze Gesar Airport",
				"municipality" => "Garze County",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "HAK",
				"airport_name" => "Haikou Meilan International Airport",
				"municipality" => "Haikou (Meilan)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "HBQ",
				"airport_name" => "Haibei Qilian Airport",
				"municipality" => "Qilian",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "HCJ",
				"airport_name" => "Hechi Jinchengjiang Airport",
				"municipality" => "Hechi (Jinchengjiang)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "HCZ",
				"airport_name" => "Chenzhou Beihu Airport",
				"municipality" => "Chenzhou",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "HDG",
				"airport_name" => "Handan Airport",
				"municipality" => "Handan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "HEK",
				"airport_name" => "Heihe Aihui Airport",
				"municipality" => "Heihe",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "HET",
				"airport_name" => "Baita International Airport",
				"municipality" => "Hohhot",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "HFE",
				"airport_name" => "Hefei Xinqiao International Airport",
				"municipality" => "Hefei",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "HGH",
				"airport_name" => "Hangzhou Xiaoshan International Airport",
				"municipality" => "Hangzhou",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "HIA",
				"airport_name" => "Huai'an Lianshui International Airport",
				"municipality" => "Huai'an",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "HJJ",
				"airport_name" => "Huaihua Zhijiang Airport",
				"municipality" => "Huaihua",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "HLD",
				"airport_name" => "Hulunbuir Hailar Airport",
				"municipality" => "Hailar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "HLH",
				"airport_name" => "Ulanhot Yilelite Airport",
				"municipality" => "Ulanhot",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "HMI",
				"airport_name" => "Hami Airport",
				"municipality" => "Hami",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "HNY",
				"airport_name" => "Hengyang Nanyue Airport",
				"municipality" => "Hengyang",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "HPG",
				"airport_name" => "Shennongjia Hongping Airport",
				"municipality" => "Shennongjia",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "HRB",
				"airport_name" => "Harbin Taiping International Airport",
				"municipality" => "Harbin",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "HSC",
				"airport_name" => "Shaoguan Danxia Airport",
				"municipality" => "Shaoguan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "HSN",
				"airport_name" => "Zhoushan Putuoshan Airport",
				"municipality" => "Zhoushan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "HTN",
				"airport_name" => "Hotan Airport",
				"municipality" => "Hotan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "HTT",
				"airport_name" => "Huatugou Airport",
				"municipality" => "Mengnai",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "HUO",
				"airport_name" => "Holingol Huolinhe Airport",
				"municipality" => "Holingol",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "HUZ",
				"airport_name" => "Huizhou Pingtan Airport",
				"municipality" => "Huizhou (Pingtan)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "HXD",
				"airport_name" => "Delingha Airport",
				"municipality" => "Delingha",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "HYN",
				"airport_name" => "Taizhou Luqiao Airport",
				"municipality" => "Huangyan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "HZA",
				"airport_name" => "Heze Mudan Airport",
				"municipality" => "Heze",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "HZG",
				"airport_name" => "Hanzhong Chenggu Airport",
				"municipality" => "Hanzhong",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "HZH",
				"airport_name" => "Liping Airport",
				"municipality" => "Liping",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "INC",
				"airport_name" => "Yinchuan Hedong International Airport",
				"municipality" => "Yinchuan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "IQM",
				"airport_name" => "Qiemo Yudu Airport",
				"municipality" => "Qiemo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "IQN",
				"airport_name" => "Qingyang Xifeng Airport",
				"municipality" => "Qingyang",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "JDZ",
				"airport_name" => "Jingdezhen Luojia Airport",
				"municipality" => "Jingdezhen",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "JGD",
				"airport_name" => "Jiagedaqi Airport",
				"municipality" => "Jiagedaqi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "JGN",
				"airport_name" => "Jiayuguan Airport",
				"municipality" => "Jiayuguan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "JGS",
				"airport_name" => "Jinggangshan Airport",
				"municipality" => "Ji'an",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "JHG",
				"airport_name" => "Xishuangbanna Gasa Airport",
				"municipality" => "Jinghong (Gasa)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "JIC",
				"airport_name" => "Jinchang Jinchuan Airport",
				"municipality" => "Jinchang",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "JIQ",
				"airport_name" => "Qianjiang Wulingshan Airport",
				"municipality" => "Qianjiang",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "JIU",
				"airport_name" => "Jiujiang Lushan Airport",
				"municipality" => "Jiujiang",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "JJN",
				"airport_name" => "Quanzhou Jinjiang International Airport",
				"municipality" => "Quanzhou",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "JMJ",
				"airport_name" => "Lancang Jingmai Airport",
				"municipality" => "Lancang Lahu Autonomous County",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "JMU",
				"airport_name" => "Jiamusi Dongjiao Airport",
				"municipality" => "Jiamusi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "JNG",
				"airport_name" => "Jining Qufu Airport",
				"municipality" => "Jining",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "JNZ",
				"airport_name" => "Jinzhou Bay Airport",
				"municipality" => "Linghai, Jinzhou",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "JSJ",
				"airport_name" => "Jiansanjiang Shidi Airport",
				"municipality" => "Jiansanjiang",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "JUH",
				"airport_name" => "Chizhou Jiuhuashan Airport",
				"municipality" => "Chizhou",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "JUZ",
				"airport_name" => "Quzhou Airport",
				"municipality" => "Quzhou",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "JXA",
				"airport_name" => "Jixi Xingkaihu Airport",
				"municipality" => "Jixi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "JZH",
				"airport_name" => "Jiuzhai Huanglong Airport",
				"municipality" => "Jiuzhaigou",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "KCA",
				"airport_name" => "Kuqa Qiuci Airport",
				"municipality" => "Kuqa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "KGT",
				"airport_name" => "Kangding Airport",
				"municipality" => "Kangding",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "KHG",
				"airport_name" => "Kashgar Airport",
				"municipality" => "Kashgar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "KHN",
				"airport_name" => "Nanchang Changbei International Airport",
				"municipality" => "Nanchang",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "KJH",
				"airport_name" => "Kaili Airport",
				"municipality" => "Huangping",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "KJI",
				"airport_name" => "Burqin Kanas Airport",
				"municipality" => "Burqin",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "KMG",
				"airport_name" => "Kunming Changshui International Airport",
				"municipality" => "Kunming",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "KOW",
				"airport_name" => "Ganzhou Huangjin Airport",
				"municipality" => "Ganzhou",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "KRL",
				"airport_name" => "Korla Airport",
				"municipality" => "Korla",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "KRY",
				"airport_name" => "Karamay Airport",
				"municipality" => "Karamay",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "KWE",
				"airport_name" => "Longdongbao Airport",
				"municipality" => "Guiyang",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "KWL",
				"airport_name" => "Guilin Liangjiang International Airport",
				"municipality" => "Guilin (Lingui)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "LCX",
				"airport_name" => "Longyan Guanzhishan Airport",
				"municipality" => "Longyan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "LDS",
				"airport_name" => "Yichun Lindu Airport",
				"municipality" => "Yichun",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "LFQ",
				"airport_name" => "Linfen Qiaoli Airport",
				"municipality" => "Linfen",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "LHW",
				"airport_name" => "Lanzhou Zhongchuan International Airport",
				"municipality" => "Lanzhou",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "LJG",
				"airport_name" => "Lijiang Sanyi International Airport",
				"municipality" => "Lijiang",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "LLB",
				"airport_name" => "Libo Airport",
				"municipality" => "Libo County",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "LLF",
				"airport_name" => "Yongzhou Lingling Airport",
				"municipality" => "Yongzhou",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "LLV",
				"airport_name" => "Lüliang Dawu Airport",
				"municipality" => "Lüliang",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "LNJ",
				"airport_name" => "Lincang Boshang Airport",
				"municipality" => "Lincang",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "LNL",
				"airport_name" => "Longnan Chengzhou Airport",
				"municipality" => "Longnan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "LPF",
				"airport_name" => "Liupanshui Yuezhao Airport",
				"municipality" => "Liupanshui",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "LUM",
				"airport_name" => "Dehong Mangshi Airport",
				"municipality" => "Mangshi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "LXA",
				"airport_name" => "Lhasa Gonggar Airport",
				"municipality" => "Lhasa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "LYA",
				"airport_name" => "Luoyang Beijiao Airport",
				"municipality" => "Luoyang",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "LYG",
				"airport_name" => "Lianyungang Huaguoshan International Airport",
				"municipality" => "Lianyungang",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "LYI",
				"airport_name" => "Linyi Qiyang Airport",
				"municipality" => "Linyi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "LZG",
				"airport_name" => "Langzhong Gucheng Airport",
				"municipality" => "Langzhong",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "LZH",
				"airport_name" => "Liuzhou Bailian Airport / Bailian Air Base",
				"municipality" => "Liuzhou (Liujiang)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "LZO",
				"airport_name" => "Luzhou Yunlong Airport",
				"municipality" => "Yunlong",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "LZY",
				"airport_name" => "Nyingchi Airport",
				"municipality" => "Nyingchi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "MDG",
				"airport_name" => "Mudanjiang Hailang International Airport",
				"municipality" => "Mudanjiang",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "MIG",
				"airport_name" => "Mianyang Nanjiao Airport",
				"municipality" => "Mianyang",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "MXZ",
				"airport_name" => "Meizhou Meixian Changgangji International Airport",
				"municipality" => "Meizhou (Meixian)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "NAO",
				"airport_name" => "Nanchong Gaoping Airport",
				"municipality" => "Nanchong",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "NBS",
				"airport_name" => "Changbaishan Airport",
				"municipality" => "Baishan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "NDG",
				"airport_name" => "Qiqihar Sanjiazi Airport",
				"municipality" => "Qiqihar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "NGB",
				"airport_name" => "Ningbo Lishe International Airport",
				"municipality" => "Ningbo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "NKG",
				"airport_name" => "Nanjing Lukou International Airport",
				"municipality" => "Nanjing",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "NLT",
				"airport_name" => "Xinyuan Nalati Airport",
				"municipality" => "Xinyuan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "NNG",
				"airport_name" => "Nanning Wuxu Airport",
				"municipality" => "Nanning (Jiangnan)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "NNY",
				"airport_name" => "Nanyang Jiangying Airport",
				"municipality" => "Nanyang",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "NTG",
				"airport_name" => "Nantong Xingdong International Airport",
				"municipality" => "Nantong",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "NZH",
				"airport_name" => "Manzhouli Xijiao Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "NZL",
				"airport_name" => "Zhalantun Genghis Khan Airport",
				"municipality" => "Zhalantun",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "OHE",
				"airport_name" => "Mohe Gulian Airport",
				"municipality" => "Mohe",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "PEK",
				"airport_name" => "Beijing Capital International Airport",
				"municipality" => "Beijing",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "PKX",
				"airport_name" => "Beijing Daxing International Airport",
				"municipality" => "Beijing",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "PVG",
				"airport_name" => "Shanghai Pudong International Airport",
				"municipality" => "Shanghai (Pudong)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "PZI",
				"airport_name" => "Bao'anying Airport",
				"municipality" => "Panzhihua",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "QSZ",
				"airport_name" => "Shache Yeerqiang Airport",
				"municipality" => "Shache",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "RHT",
				"airport_name" => "Alxa Right Banner Badanjilin Airport",
				"municipality" => "Badanjilin",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "RIZ",
				"airport_name" => "Rizhao Shanzihe Airport",
				"municipality" => "Rizhao",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "RKZ",
				"airport_name" => "Xigaze Peace Airport / Shigatse Air Base",
				"municipality" => "Xigazê",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "RLK",
				"airport_name" => "Bayannur Tianjitai Airport",
				"municipality" => "Bavannur",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "RQA",
				"airport_name" => "Ruoqiang Loulan Airport",
				"municipality" => "Ruoqiang Town",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "SHA",
				"airport_name" => "Shanghai Hongqiao International Airport",
				"municipality" => "Shanghai (Minhang)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "SHE",
				"airport_name" => "Shenyang Taoxian International Airport",
				"municipality" => "Hunnan, Shenyang",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "SHF",
				"airport_name" => "Shihezi Huayuan Airport",
				"municipality" => "Shihezi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "SHS",
				"airport_name" => "Jingzhou Shashi Airport",
				"municipality" => "Jingzhou",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "SJW",
				"airport_name" => "Shijiazhuang Zhengding International Airport",
				"municipality" => "Shijiazhuang",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "SQD",
				"airport_name" => "Shangrao Sanqingshan Airport",
				"municipality" => "Shangrao",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "SQJ",
				"airport_name" => "Sanming Shaxian Airport",
				"municipality" => "Sanming",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "SWA",
				"airport_name" => "Jieyang Chaoshan International Airport",
				"municipality" => "Jieyang (Rongcheng)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "SYM",
				"airport_name" => "Pu'er Simao Airport",
				"municipality" => "Pu'er",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "SYX",
				"airport_name" => "Sanya Phoenix International Airport",
				"municipality" => "Sanya (Tianya)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "SZX",
				"airport_name" => "Shenzhen Bao'an International Airport",
				"municipality" => "Shenzhen (Bao'an)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "TAO",
				"airport_name" => "Qingdao Jiaodong International Airport",
				"municipality" => "Jiaozhou, Qingdao",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "TCZ",
				"airport_name" => "Tengchong Tuofeng Airport",
				"municipality" => "Tengchong",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "TEN",
				"airport_name" => "Tongren Fenghuang Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "TFU",
				"airport_name" => "Chengdu Tianfu International Airport",
				"municipality" => "Jianyang, Chengdu",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "TGO",
				"airport_name" => "Tongliao Airport",
				"municipality" => "Tongliao",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "THQ",
				"airport_name" => "Tianshui Maijishan Airport",
				"municipality" => "Tianshui",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "TNA",
				"airport_name" => "Jinan Yaoqiang International Airport",
				"municipality" => "Jinan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "TNH",
				"airport_name" => "Tonghua Sanyuanpu Airport",
				"municipality" => "Tonghua",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "TSN",
				"airport_name" => "Tianjin Binhai International Airport",
				"municipality" => "Tianjin",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "TVS",
				"airport_name" => "Tangshan Sannühe Airport",
				"municipality" => "Tangshan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "TWC",
				"airport_name" => "Tumxuk Tangwangcheng Airport",
				"municipality" => "Tumxuk",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "TXN",
				"airport_name" => "Tunxi International Airport",
				"municipality" => "Huangshan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "TYN",
				"airport_name" => "Taiyuan Wusu Airport",
				"municipality" => "Taiyuan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "UCB",
				"airport_name" => "Ulanqab Jining Airport",
				"municipality" => "Ulanqab",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "URC",
				"airport_name" => "Ürümqi Diwopu International Airport",
				"municipality" => "Ürümqi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "UYN",
				"airport_name" => "Yulin Yuyang Airport",
				"municipality" => "Yulin",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "WDS",
				"airport_name" => "Shiyan Wudangshan Airport",
				"municipality" => "Shiyan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "WEF",
				"airport_name" => "Weifang Nanyuan Airport",
				"municipality" => "Weifang",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "WEH",
				"airport_name" => "Weihai Dashuibo Airport",
				"municipality" => "Weihai",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "WGN",
				"airport_name" => "Shaoyang Wugang Airport",
				"municipality" => "Shaoyang",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "WMT",
				"airport_name" => "Zunyi Maotai Airport",
				"municipality" => "Zunyi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "WNH",
				"airport_name" => "Wenshan Puzhehei Airport",
				"municipality" => "Wenshan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "WNZ",
				"airport_name" => "Wenzhou Longwan International Airport",
				"municipality" => "Wenzhou",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "WSK",
				"airport_name" => "Chongqing Wushan Airport",
				"municipality" => "Wushan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "WUA",
				"airport_name" => "Wuhai Airport",
				"municipality" => "Wuhai",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "WUH",
				"airport_name" => "Wuhan Tianhe International Airport",
				"municipality" => "Wuhan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "WUS",
				"airport_name" => "Nanping Wuyishan Airport",
				"municipality" => "Wuyishan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "WUT",
				"airport_name" => "Xinzhou Wutaishan Airport",
				"municipality" => "Xinzhou",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "WUX",
				"airport_name" => "Sunan Shuofang International Airport",
				"municipality" => "Wuxi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "WUZ",
				"airport_name" => "Wuzhou Xijiang Airport",
				"municipality" => "Tangbu",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "WXN",
				"airport_name" => "Wanzhou Wuqiao Airport",
				"municipality" => "Wanzhou",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "XAI",
				"airport_name" => "Xinyang Minggang Airport",
				"municipality" => "Xinyang",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "XFN",
				"airport_name" => "Xiangyang Liuji Airport",
				"municipality" => "Xiangyang",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "XIC",
				"airport_name" => "Xichang Qingshan Airport",
				"municipality" => "Xichang",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "XIL",
				"airport_name" => "Xilinhot Airport",
				"municipality" => "Xilinhot",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "XIY",
				"airport_name" => "Xi'an Xianyang International Airport",
				"municipality" => "Xi'an",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "XMN",
				"airport_name" => "Xiamen Gaoqi International Airport",
				"municipality" => "Xiamen",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "XNN",
				"airport_name" => "Xining Caojiabu Airport",
				"municipality" => "Xining",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "XRQ",
				"airport_name" => "New Barag Right Banner Baogede Airport",
				"municipality" => "New Barag Right Banner",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "XUZ",
				"airport_name" => "Xuzhou Guanyin International Airport",
				"municipality" => "Xuzhou",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "YBP",
				"airport_name" => "Yibin Wuliangye Airport",
				"municipality" => "Yibin",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "YCU",
				"airport_name" => "Yuncheng Guangong Airport",
				"municipality" => "Yuncheng",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "YIC",
				"airport_name" => "Yichun Mingyueshan Airport",
				"municipality" => "Yichun",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "YIE",
				"airport_name" => "Arxan Yi'ershi Airport",
				"municipality" => "Arxan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "YIH",
				"airport_name" => "Yichang Sanxia Airport",
				"municipality" => "Yichang",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "YIN",
				"airport_name" => "Yining Airport",
				"municipality" => "Yining",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "YIW",
				"airport_name" => "Yiwu Airport",
				"municipality" => "Yiwu",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "YKH",
				"airport_name" => "Yingkou Lanqi Airport",
				"municipality" => "Laobian, Yingkou",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "YLX",
				"airport_name" => "Yulin Fumian Airport",
				"municipality" => "Yùlín",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "YNJ",
				"airport_name" => "Yanji Chaoyangchuan Airport",
				"municipality" => "Yanji",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "YNT",
				"airport_name" => "Yantai Penglai International Airport",
				"municipality" => "Yantai",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "YNZ",
				"airport_name" => "Yancheng Nanyang International Airport",
				"municipality" => "Yancheng",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "YSQ",
				"airport_name" => "Songyuan Chaganhu Airport",
				"municipality" => "Qian Gorlos Mongol Autonomous County",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "YTW",
				"airport_name" => "Yutian Wanfang Airport",
				"municipality" => "Hotan (Yutian)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "YTY",
				"airport_name" => "Yangzhou Taizhou Airport",
				"municipality" => "Yangzhou",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "YYA",
				"airport_name" => "Yueyang Sanhe Airport",
				"municipality" => "Yueyang",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "YZY",
				"airport_name" => "Zhangye Ganzhou Airport",
				"municipality" => "Zhangye",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "ZAT",
				"airport_name" => "Zhaotong Airport",
				"municipality" => "Zhaotong",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "ZHA",
				"airport_name" => "Zhanjiang Wuchuan Airport",
				"municipality" => "Zhanjiang",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "ZHY",
				"airport_name" => "Zhongwei Shapotou Airport",
				"municipality" => "Zhongwei",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "ZQZ",
				"airport_name" => "Zhangjiakou Ningyuan Airport",
				"municipality" => "Zhangjiakou",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "ZUH",
				"airport_name" => "Zhuhai Jinwan Airport",
				"municipality" => "Zhuhai (Jinwan)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CN",
				"iata_code" => "ZYI",
				"airport_name" => "Zunyi Xinzhou Airport",
				"municipality" => "Zunyi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CO",
				"iata_code" => "ADZ",
				"airport_name" => "Gustavo Rojas Pinilla International Airport",
				"municipality" => "San Andrés",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CO",
				"iata_code" => "APO",
				"airport_name" => "Antonio Roldan Betancourt Airport",
				"municipality" => "Carepa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CO",
				"iata_code" => "AUC",
				"airport_name" => "Santiago Perez Airport",
				"municipality" => "Arauca",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CO",
				"iata_code" => "AXM",
				"airport_name" => "El Eden Airport",
				"municipality" => "Armenia",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CO",
				"iata_code" => "BAQ",
				"airport_name" => "Ernesto Cortissoz International Airport",
				"municipality" => "Barranquilla",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CO",
				"iata_code" => "BGA",
				"airport_name" => "Palonegro Airport",
				"municipality" => "Bucaramanga",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CO",
				"iata_code" => "BOG",
				"airport_name" => "El Dorado International Airport",
				"municipality" => "Bogota",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CO",
				"iata_code" => "BSC",
				"airport_name" => "José Celestino Mutis Airport",
				"municipality" => "Bahía Solano",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CO",
				"iata_code" => "BUN",
				"airport_name" => "Gerardo Tobar López Airport",
				"municipality" => "Buenaventura",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CO",
				"iata_code" => "CLO",
				"airport_name" => "Alfonso Bonilla Aragon International Airport",
				"municipality" => "Cali",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CO",
				"iata_code" => "CRC",
				"airport_name" => "Santa Ana Airport",
				"municipality" => "Cartago",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CO",
				"iata_code" => "CTG",
				"airport_name" => "Rafael Nuñez International Airport",
				"municipality" => "Cartagena",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CO",
				"iata_code" => "CUC",
				"airport_name" => "Camilo Daza International Airport",
				"municipality" => "Cúcuta",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CO",
				"iata_code" => "CZU",
				"airport_name" => "Las Brujas Airport",
				"municipality" => "Corozal",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CO",
				"iata_code" => "EJA",
				"airport_name" => "Yariguíes Airport",
				"municipality" => "Barrancabermeja",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CO",
				"iata_code" => "EOH",
				"airport_name" => "Enrique Olaya Herrera Airport",
				"municipality" => "Medellín",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CO",
				"iata_code" => "EYP",
				"airport_name" => "El Yopal Airport",
				"municipality" => "El Yopal",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CO",
				"iata_code" => "FLA",
				"airport_name" => "Gustavo Artunduaga Paredes Airport",
				"municipality" => "Florencia",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CO",
				"iata_code" => "GPI",
				"airport_name" => "Juan Casiano Airport",
				"municipality" => "Guapi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CO",
				"iata_code" => "IBE",
				"airport_name" => "Perales Airport",
				"municipality" => "Ibagué",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CO",
				"iata_code" => "IPI",
				"airport_name" => "San Luis Airport",
				"municipality" => "Ipiales",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CO",
				"iata_code" => "LCR",
				"airport_name" => "La Chorrera Airport",
				"municipality" => "La Chorrera",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CO",
				"iata_code" => "LET",
				"airport_name" => "Alfredo Vásquez Cobo International Airport",
				"municipality" => "Leticia",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CO",
				"iata_code" => "LMC",
				"airport_name" => "El Refugio/La Macarena Airport",
				"municipality" => "La Macarena",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CO",
				"iata_code" => "LPD",
				"airport_name" => "La Pedrera Airport",
				"municipality" => "La Pedrera",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CO",
				"iata_code" => "LQM",
				"airport_name" => "Caucaya Airport",
				"municipality" => "Puerto Leguízamo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CO",
				"iata_code" => "MDE",
				"airport_name" => "Jose Maria Córdova International Airport",
				"municipality" => "Medellín",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CO",
				"iata_code" => "MTR",
				"airport_name" => "Los Garzones Airport",
				"municipality" => "Montería",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CO",
				"iata_code" => "MVP",
				"airport_name" => "Fabio Alberto Leon Bentley Airport",
				"municipality" => "Mitú",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CO",
				"iata_code" => "MZL",
				"airport_name" => "La Nubia Airport",
				"municipality" => "Manizales",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CO",
				"iata_code" => "NQU",
				"airport_name" => "Reyes Murillo Airport",
				"municipality" => "Nuquí",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CO",
				"iata_code" => "NVA",
				"airport_name" => "Benito Salas Airport",
				"municipality" => "Neiva",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CO",
				"iata_code" => "PCR",
				"airport_name" => "German Olano Airport",
				"municipality" => "Puerto Carreño",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CO",
				"iata_code" => "PDA",
				"airport_name" => "Obando Cesar Gaviria Trujillo Airport",
				"municipality" => "Puerto Inírida",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CO",
				"iata_code" => "PEI",
				"airport_name" => "Matecaña International Airport",
				"municipality" => "Pereira",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CO",
				"iata_code" => "PPN",
				"airport_name" => "Guillermo León Valencia Airport",
				"municipality" => "Popayán",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CO",
				"iata_code" => "PSO",
				"airport_name" => "Antonio Narino Airport",
				"municipality" => "Pasto",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CO",
				"iata_code" => "PUU",
				"airport_name" => "Tres De Mayo Airport",
				"municipality" => "Puerto Asís",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CO",
				"iata_code" => "PVA",
				"airport_name" => "El Embrujo Airport",
				"municipality" => "Providencia",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CO",
				"iata_code" => "RCH",
				"airport_name" => "Almirante Padilla Airport",
				"municipality" => "Riohacha",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CO",
				"iata_code" => "RVE",
				"airport_name" => "Los Colonizadores Airport",
				"municipality" => "Saravena",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CO",
				"iata_code" => "SJE",
				"airport_name" => "Jorge E. Gonzalez Torres Airport",
				"municipality" => "San José Del Guaviare",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CO",
				"iata_code" => "SMR",
				"airport_name" => "Simón Bolívar International Airport",
				"municipality" => "Santa Marta",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CO",
				"iata_code" => "SVI",
				"airport_name" => "Eduardo Falla Solano Airport",
				"municipality" => "San Vicente Del Caguán",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CO",
				"iata_code" => "TCD",
				"airport_name" => "Tarapacá Airport",
				"municipality" => "Tarapacá",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CO",
				"iata_code" => "TCO",
				"airport_name" => "La Florida Airport",
				"municipality" => "Tumaco",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CO",
				"iata_code" => "TLU",
				"airport_name" => "Golfo de Morrosquillo Airport",
				"municipality" => "Santiago de Tolú",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CO",
				"iata_code" => "TME",
				"airport_name" => "Gustavo Vargas Airport",
				"municipality" => "Tame",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CO",
				"iata_code" => "UIB",
				"airport_name" => "El Caraño Airport",
				"municipality" => "Quibdó",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CO",
				"iata_code" => "VUP",
				"airport_name" => "Alfonso López Pumarejo Airport",
				"municipality" => "Valledupar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CO",
				"iata_code" => "VVC",
				"airport_name" => "Vanguardia Airport",
				"municipality" => "Villavicencio",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CR",
				"iata_code" => "BCL",
				"airport_name" => "Barra del Colorado Airport",
				"municipality" => "Pococi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CR",
				"iata_code" => "GLF",
				"airport_name" => "Golfito Airport",
				"municipality" => "Golfito",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CR",
				"iata_code" => "LIO",
				"airport_name" => "Limon International Airport",
				"municipality" => "Puerto Limon",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CR",
				"iata_code" => "LIR",
				"airport_name" => "Guanacaste Airport",
				"municipality" => "Liberia",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CR",
				"iata_code" => "NOB",
				"airport_name" => "Nosara Airport",
				"municipality" => "Nicoya",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CR",
				"iata_code" => "OTR",
				"airport_name" => "Coto 47 Airport",
				"municipality" => "Corredores",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CR",
				"iata_code" => "PBP",
				"airport_name" => "Islita Airport",
				"municipality" => "Nandayure",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CR",
				"iata_code" => "PJM",
				"airport_name" => "Puerto Jimenez Airport",
				"municipality" => "Puerto Jimenez",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CR",
				"iata_code" => "PLD",
				"airport_name" => "Playa Samara/Carrillo Airport",
				"municipality" => "Carrillo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CR",
				"iata_code" => "PMZ",
				"airport_name" => "Palmar Sur Airport",
				"municipality" => "Palmar Sur",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CR",
				"iata_code" => "SJO",
				"airport_name" => "Juan Santamaría International Airport",
				"municipality" => "San José (Alajuela)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CR",
				"iata_code" => "SYQ",
				"airport_name" => "Tobías Bolaños International Airport",
				"municipality" => "San Jose",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CR",
				"iata_code" => "TTQ",
				"airport_name" => "Aerotortuguero Airport",
				"municipality" => "Roxana",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CR",
				"iata_code" => "XQP",
				"airport_name" => "Quepos Managua Airport",
				"municipality" => "Quepos",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CU",
				"iata_code" => "AVI",
				"airport_name" => "Maximo Gomez Airport",
				"municipality" => "Ciego de Avila",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CU",
				"iata_code" => "BCA",
				"airport_name" => "Gustavo Rizo Airport",
				"municipality" => "Baracoa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CU",
				"iata_code" => "BYM",
				"airport_name" => "Carlos Manuel de Cespedes Airport",
				"municipality" => "Bayamo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CU",
				"iata_code" => "CCC",
				"airport_name" => "Jardines Del Rey Airport",
				"municipality" => "Cayo Coco",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CU",
				"iata_code" => "CFG",
				"airport_name" => "Jaime Gonzalez Airport",
				"municipality" => "Cienfuegos",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CU",
				"iata_code" => "CMW",
				"airport_name" => "Ignacio Agramonte International Airport",
				"municipality" => "Camaguey",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CU",
				"iata_code" => "CYO",
				"airport_name" => "Vilo Acuña International Airport",
				"municipality" => "Cayo Largo del Sur",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CU",
				"iata_code" => "GAO",
				"airport_name" => "Mariana Grajales Airport",
				"municipality" => "Guantánamo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CU",
				"iata_code" => "GER",
				"airport_name" => "Rafael Cabrera Airport",
				"municipality" => "Nueva Gerona",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CU",
				"iata_code" => "HAV",
				"airport_name" => "José Martí International Airport",
				"municipality" => "Havana",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CU",
				"iata_code" => "HOG",
				"airport_name" => "Frank Pais International Airport",
				"municipality" => "Holguin",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CU",
				"iata_code" => "MZO",
				"airport_name" => "Sierra Maestra Airport",
				"municipality" => "Manzanillo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CU",
				"iata_code" => "SCU",
				"airport_name" => "Antonio Maceo International Airport",
				"municipality" => "Santiago",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CU",
				"iata_code" => "TND",
				"airport_name" => "Alberto Delgado Airport",
				"municipality" => "Trinidad",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CU",
				"iata_code" => "UPB",
				"airport_name" => "Playa Baracoa Airport",
				"municipality" => "Havana",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CU",
				"iata_code" => "VRA",
				"airport_name" => "Juan Gualberto Gomez International Airport",
				"municipality" => "Varadero",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CU",
				"iata_code" => "VTU",
				"airport_name" => "Hermanos Ameijeiras Airport",
				"municipality" => "Las Tunas",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CV",
				"iata_code" => "BVC",
				"airport_name" => "Rabil Airport",
				"municipality" => "Rabil",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CV",
				"iata_code" => "MMO",
				"airport_name" => "Maio Airport",
				"municipality" => "Vila do Maio",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CV",
				"iata_code" => "RAI",
				"airport_name" => "Praia International Airport",
				"municipality" => "Praia",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CV",
				"iata_code" => "SFL",
				"airport_name" => "São Filipe Airport",
				"municipality" => "São Filipe",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CV",
				"iata_code" => "SID",
				"airport_name" => "Amílcar Cabral International Airport",
				"municipality" => "Espargos",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CV",
				"iata_code" => "SNE",
				"airport_name" => "Preguiça Airport",
				"municipality" => "Preguiça",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CV",
				"iata_code" => "VXE",
				"airport_name" => "São Pedro Airport",
				"municipality" => "São Pedro",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CW",
				"iata_code" => "CUR",
				"airport_name" => "Hato International Airport",
				"municipality" => "Willemstad",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CX",
				"iata_code" => "XCH",
				"airport_name" => "Christmas Island Airport",
				"municipality" => "Flying Fish Cove",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CY",
				"iata_code" => "ECN",
				"airport_name" => "Ercan International Airport",
				"municipality" => "Nicosia",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CY",
				"iata_code" => "GEC",
				"airport_name" => "Lefkoniko Airport / Geçitkale Air Base",
				"municipality" => "Geçitkale",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CY",
				"iata_code" => "LCA",
				"airport_name" => "Larnaca International Airport",
				"municipality" => "Larnaca",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CY",
				"iata_code" => "PFO",
				"airport_name" => "Paphos International Airport",
				"municipality" => "Paphos",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CZ",
				"iata_code" => "BRQ",
				"airport_name" => "Brno-Tuřany Airport",
				"municipality" => "Brno",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CZ",
				"iata_code" => "KLV",
				"airport_name" => "Karlovy Vary International Airport",
				"municipality" => "Karlovy Vary",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CZ",
				"iata_code" => "OSR",
				"airport_name" => "Ostrava Leos Janáček Airport",
				"municipality" => "Ostrava",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CZ",
				"iata_code" => "PED",
				"airport_name" => "Pardubice Airport",
				"municipality" => "Pardubice",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "CZ",
				"iata_code" => "PRG",
				"airport_name" => "Václav Havel Airport Prague",
				"municipality" => "Prague",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DE",
				"iata_code" => "BER",
				"airport_name" => "Berlin Brandenburg Airport",
				"municipality" => "Berlin",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DE",
				"iata_code" => "BMK",
				"airport_name" => "Borkum Airport",
				"municipality" => "Borkum",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DE",
				"iata_code" => "BRE",
				"airport_name" => "Bremen Airport",
				"municipality" => "Bremen",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DE",
				"iata_code" => "CGN",
				"airport_name" => "Cologne Bonn Airport",
				"municipality" => "Cologne",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DE",
				"iata_code" => "DRS",
				"airport_name" => "Dresden Airport",
				"municipality" => "Dresden",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DE",
				"iata_code" => "DTM",
				"airport_name" => "Dortmund Airport",
				"municipality" => "Dortmund",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DE",
				"iata_code" => "DUS",
				"airport_name" => "Düsseldorf Airport",
				"municipality" => "Düsseldorf",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DE",
				"iata_code" => "EME",
				"airport_name" => "Emden Airport",
				"municipality" => "Emden",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DE",
				"iata_code" => "ERF",
				"airport_name" => "Erfurt Airport",
				"municipality" => "Erfurt",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DE",
				"iata_code" => "FDH",
				"airport_name" => "Friedrichshafen Airport",
				"municipality" => "Friedrichshafen",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DE",
				"iata_code" => "FKB",
				"airport_name" => "Karlsruhe Baden-Baden Airport",
				"municipality" => "Baden-Baden",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DE",
				"iata_code" => "FMM",
				"airport_name" => "Memmingen Allgau Airport",
				"municipality" => "Memmingen",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DE",
				"iata_code" => "FMO",
				"airport_name" => "Münster Osnabrück Airport",
				"municipality" => "Münster",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DE",
				"iata_code" => "FRA",
				"airport_name" => "Frankfurt am Main Airport",
				"municipality" => "Frankfurt am Main",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DE",
				"iata_code" => "GWT",
				"airport_name" => "Westerland Sylt Airport",
				"municipality" => "Westerland",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DE",
				"iata_code" => "HAJ",
				"airport_name" => "Hannover Airport",
				"municipality" => "Hannover",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DE",
				"iata_code" => "HAM",
				"airport_name" => "Hamburg Helmut Schmidt Airport",
				"municipality" => "Hamburg",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DE",
				"iata_code" => "HDF",
				"airport_name" => "Heringsdorf Airport",
				"municipality" => "Heringsdorf",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DE",
				"iata_code" => "HEI",
				"airport_name" => "Heide-Büsum Airport",
				"municipality" => "Büsum",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DE",
				"iata_code" => "HGL",
				"airport_name" => "Helgoland-Düne Airport",
				"municipality" => "Helgoland",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DE",
				"iata_code" => "HHN",
				"airport_name" => "Frankfurt-Hahn Airport",
				"municipality" => "Frankfurt am Main",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DE",
				"iata_code" => "KSF",
				"airport_name" => "Kassel-Calden Airport",
				"municipality" => "Kassel",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DE",
				"iata_code" => "LBC",
				"airport_name" => "Lübeck Blankensee Airport",
				"municipality" => "Lübeck",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DE",
				"iata_code" => "LEJ",
				"airport_name" => "Leipzig/Halle Airport",
				"municipality" => "Leipzig",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DE",
				"iata_code" => "MHG",
				"airport_name" => "Mannheim-City Airport",
				"municipality" => "Mannheim",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DE",
				"iata_code" => "MUC",
				"airport_name" => "Munich Airport",
				"municipality" => "Munich",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DE",
				"iata_code" => "NRD",
				"airport_name" => "Norderney Airport",
				"municipality" => "Norderney",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DE",
				"iata_code" => "NRN",
				"airport_name" => "Weeze Airport",
				"municipality" => "Weeze",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DE",
				"iata_code" => "NUE",
				"airport_name" => "Nuremberg Airport",
				"municipality" => "Nuremberg",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DE",
				"iata_code" => "PAD",
				"airport_name" => "Paderborn Lippstadt Airport",
				"municipality" => "Paderborn",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DE",
				"iata_code" => "RLG",
				"airport_name" => "Rostock-Laage Airport",
				"municipality" => "Rostock",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DE",
				"iata_code" => "SCN",
				"airport_name" => "Saarbrücken Airport",
				"municipality" => "Saarbrücken",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DE",
				"iata_code" => "STR",
				"airport_name" => "Stuttgart Airport",
				"municipality" => "Stuttgart",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DJ",
				"iata_code" => "JIB",
				"airport_name" => "Djibouti-Ambouli Airport",
				"municipality" => "Djibouti City",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DK",
				"iata_code" => "AAL",
				"airport_name" => "Aalborg Airport",
				"municipality" => "Aalborg",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DK",
				"iata_code" => "AAR",
				"airport_name" => "Aarhus Airport",
				"municipality" => "Aarhus",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DK",
				"iata_code" => "BLL",
				"airport_name" => "Billund Airport",
				"municipality" => "Billund",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DK",
				"iata_code" => "CNL",
				"airport_name" => "Sindal Airport",
				"municipality" => "Sindal",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DK",
				"iata_code" => "CPH",
				"airport_name" => "Copenhagen Kastrup Airport",
				"municipality" => "Copenhagen",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DK",
				"iata_code" => "EBJ",
				"airport_name" => "Esbjerg Airport",
				"municipality" => "Esbjerg",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DK",
				"iata_code" => "KRP",
				"airport_name" => "Karup Airport",
				"municipality" => "Karup",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DK",
				"iata_code" => "ODE",
				"airport_name" => "Odense Airport",
				"municipality" => "Odense",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DK",
				"iata_code" => "RNN",
				"airport_name" => "Bornholm Airport",
				"municipality" => "Rønne",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DK",
				"iata_code" => "SGD",
				"airport_name" => "Sønderborg Airport",
				"municipality" => "Sønderborg",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DM",
				"iata_code" => "DCF",
				"airport_name" => "Canefield Airport",
				"municipality" => "Canefield",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DM",
				"iata_code" => "DOM",
				"airport_name" => "Douglas-Charles Airport",
				"municipality" => "Marigot",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DO",
				"iata_code" => "AZS",
				"airport_name" => "Samaná El Catey International Airport",
				"municipality" => "Samana",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DO",
				"iata_code" => "BRX",
				"airport_name" => "Maria Montez International Airport",
				"municipality" => "Barahona",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DO",
				"iata_code" => "JBQ",
				"airport_name" => "La Isabela International Airport",
				"municipality" => "La Isabela",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DO",
				"iata_code" => "LRM",
				"airport_name" => "Casa De Campo International Airport",
				"municipality" => "La Romana",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DO",
				"iata_code" => "POP",
				"airport_name" => "Gregorio Luperon International Airport",
				"municipality" => "Puerto Plata",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DO",
				"iata_code" => "PUJ",
				"airport_name" => "Punta Cana International Airport",
				"municipality" => "Punta Cana",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DO",
				"iata_code" => "SDQ",
				"airport_name" => "Las Américas International Airport",
				"municipality" => "Santo Domingo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DO",
				"iata_code" => "STI",
				"airport_name" => "Cibao International Airport",
				"municipality" => "Santiago",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DZ",
				"iata_code" => "AAE",
				"airport_name" => "Rabah Bitat Airport",
				"municipality" => "Annaba",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DZ",
				"iata_code" => "ALG",
				"airport_name" => "Houari Boumediene Airport",
				"municipality" => "Algiers",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DZ",
				"iata_code" => "AZR",
				"airport_name" => "Touat Cheikh Sidi Mohamed Belkebir Airport",
				"municipality" => "Adrar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DZ",
				"iata_code" => "BJA",
				"airport_name" => "Soummam – Abane Ramdane Airport",
				"municipality" => "Béjaïa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DZ",
				"iata_code" => "BLJ",
				"airport_name" => "Batna Mostefa Ben Boulaid Airport",
				"municipality" => "Batna",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DZ",
				"iata_code" => "BMW",
				"airport_name" => "Bordj Badji Mokhtar Airport",
				"municipality" => "Bordj Badji Mokhtar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DZ",
				"iata_code" => "BSK",
				"airport_name" => "Biskra - Mohamed Khider Airport",
				"municipality" => "Biskra",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DZ",
				"iata_code" => "CBH",
				"airport_name" => "Béchar Boudghene Ben Ali Lotfi Airport",
				"municipality" => "Béchar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DZ",
				"iata_code" => "CZL",
				"airport_name" => "Mohamed Boudiaf International Airport",
				"municipality" => "Constantine",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DZ",
				"iata_code" => "DJG",
				"airport_name" => "Djanet Inedbirene Airport",
				"municipality" => "Djanet",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DZ",
				"iata_code" => "ELG",
				"airport_name" => "El Golea Airport",
				"municipality" => "El Menia",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DZ",
				"iata_code" => "ELU",
				"airport_name" => "Guemar Airport",
				"municipality" => "Guemar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DZ",
				"iata_code" => "GHA",
				"airport_name" => "Noumérat - Moufdi Zakaria Airport",
				"municipality" => "Ghardaïa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DZ",
				"iata_code" => "GJL",
				"airport_name" => "Jijel Ferhat Abbas Airport",
				"municipality" => "Jijel",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DZ",
				"iata_code" => "HME",
				"airport_name" => "Hassi Messaoud-Oued Irara Krim Belkacem Airport",
				"municipality" => "Hassi Messaoud",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DZ",
				"iata_code" => "HRM",
				"airport_name" => "Hassi R'Mel Airport",
				"municipality" => "Hassi R'Mel",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DZ",
				"iata_code" => "IAM",
				"airport_name" => "Zarzaitine - In Aménas Airport",
				"municipality" => "In Aménas",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DZ",
				"iata_code" => "INZ",
				"airport_name" => "In Salah Airport",
				"municipality" => "In Salah",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DZ",
				"iata_code" => "OGX",
				"airport_name" => "Ain Beida Airport",
				"municipality" => "Ouargla",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DZ",
				"iata_code" => "ORN",
				"airport_name" => "Oran International Airport Ahmed Ben Bella",
				"municipality" => "Oran",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DZ",
				"iata_code" => "QSF",
				"airport_name" => "Ain Arnat Airport",
				"municipality" => "Sétif",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DZ",
				"iata_code" => "TEE",
				"airport_name" => "Cheikh Larbi Tébessi Airport",
				"municipality" => "Tébessi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DZ",
				"iata_code" => "TGR",
				"airport_name" => "Touggourt Sidi Madhi Airport",
				"municipality" => "Touggourt",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DZ",
				"iata_code" => "TIN",
				"airport_name" => "Tindouf Airport",
				"municipality" => "Tindouf",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DZ",
				"iata_code" => "TLM",
				"airport_name" => "Zenata – Messali El Hadj Airport",
				"municipality" => "Tlemcen",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DZ",
				"iata_code" => "TMR",
				"airport_name" => "Aguenar – Hadj Bey Akhamok Airport",
				"municipality" => "Tamanrasset",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DZ",
				"iata_code" => "TMX",
				"airport_name" => "Timimoun Airport",
				"municipality" => "Timimoun",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "DZ",
				"iata_code" => "VVZ",
				"airport_name" => "Illizi Takhamalt Airport",
				"municipality" => "Illizi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "EC",
				"iata_code" => "CUE",
				"airport_name" => "Mariscal Lamar Airport",
				"municipality" => "Cuenca",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "EC",
				"iata_code" => "ESM",
				"airport_name" => "General Rivadeneira Airport",
				"municipality" => "Tachina",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "EC",
				"iata_code" => "ETR",
				"airport_name" => "Santa Rosa - Artillery Colonel Victor Larrea International Airport",
				"municipality" => "Santa Rosa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "EC",
				"iata_code" => "GPS",
				"airport_name" => "Seymour Galapagos Ecological Airport",
				"municipality" => "Isla Baltra",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "EC",
				"iata_code" => "GYE",
				"airport_name" => "José Joaquín de Olmedo International Airport",
				"municipality" => "Guayaquil",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "EC",
				"iata_code" => "IBB",
				"airport_name" => "General Villamil Airport",
				"municipality" => "Puerto Villamil",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "EC",
				"iata_code" => "LOH",
				"airport_name" => "Camilo Ponce Enriquez Airport",
				"municipality" => "La Toma (Catamayo)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "EC",
				"iata_code" => "LTX",
				"airport_name" => "Cotopaxi International Airport",
				"municipality" => "Latacunga",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "EC",
				"iata_code" => "MEC",
				"airport_name" => "Eloy Alfaro International Airport",
				"municipality" => "Manta",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "EC",
				"iata_code" => "OCC",
				"airport_name" => "Francisco De Orellana Airport",
				"municipality" => "Coca",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "EC",
				"iata_code" => "SCY",
				"airport_name" => "San Cristóbal Airport",
				"municipality" => "Puerto Baquerizo Moreno",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "EC",
				"iata_code" => "TUA",
				"airport_name" => "Teniente Coronel Luis a Mantilla Airport",
				"municipality" => "Tulcán",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "EC",
				"iata_code" => "UIO",
				"airport_name" => "Mariscal Sucre International Airport",
				"municipality" => "Quito",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "EC",
				"iata_code" => "XMS",
				"airport_name" => "Coronel E Carvajal Airport",
				"municipality" => "Macas",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "EE",
				"iata_code" => "EPU",
				"airport_name" => "Pärnu Airport",
				"municipality" => "Pärnu",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "EE",
				"iata_code" => "KDL",
				"airport_name" => "Kärdla Airport",
				"municipality" => "Kärdla",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "EE",
				"iata_code" => "TAY",
				"airport_name" => "Tartu Airport",
				"municipality" => "Tartu",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "EE",
				"iata_code" => "TLL",
				"airport_name" => "Lennart Meri Tallinn Airport",
				"municipality" => "Tallinn",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "EE",
				"iata_code" => "URE",
				"airport_name" => "Kuressaare Airport",
				"municipality" => "Kuressaare",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "EG",
				"iata_code" => "AAC",
				"airport_name" => "El Arish International Airport",
				"municipality" => "El Arish",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "EG",
				"iata_code" => "ABS",
				"airport_name" => "Abu Simbel Airport",
				"municipality" => "Abu Simbel",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "EG",
				"iata_code" => "ASW",
				"airport_name" => "Aswan International Airport",
				"municipality" => "Aswan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "EG",
				"iata_code" => "ATZ",
				"airport_name" => "Asyut International Airport",
				"municipality" => "Asyut",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "EG",
				"iata_code" => "CAI",
				"airport_name" => "Cairo International Airport",
				"municipality" => "Cairo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "EG",
				"iata_code" => "HBE",
				"airport_name" => "Borj El Arab International Airport",
				"municipality" => "Alexandria",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "EG",
				"iata_code" => "HMB",
				"airport_name" => "Suhaj Mubarak International Airport",
				"municipality" => "Suhaj",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "EG",
				"iata_code" => "HRG",
				"airport_name" => "Hurghada International Airport",
				"municipality" => "Hurghada",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "EG",
				"iata_code" => "LXR",
				"airport_name" => "Luxor International Airport",
				"municipality" => "Luxor",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "EG",
				"iata_code" => "MUH",
				"airport_name" => "Marsa Matruh Airport",
				"municipality" => "Marsa Matruh",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "EG",
				"iata_code" => "RMF",
				"airport_name" => "Marsa Alam International Airport",
				"municipality" => "Marsa Alam",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "EG",
				"iata_code" => "SSH",
				"airport_name" => "Sharm El Sheikh International Airport",
				"municipality" => "Sharm el-Sheikh",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "EG",
				"iata_code" => "TCP",
				"airport_name" => "Taba International Airport",
				"municipality" => "Taba",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "EH",
				"iata_code" => "EUN",
				"airport_name" => "Hassan I Airport",
				"municipality" => "El Aaiún",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "EH",
				"iata_code" => "SMW",
				"airport_name" => "Smara Airport",
				"municipality" => "Smara",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "EH",
				"iata_code" => "VIL",
				"airport_name" => "Dakhla Airport",
				"municipality" => "Dakhla",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ER",
				"iata_code" => "ASA",
				"airport_name" => "Assab International Airport",
				"municipality" => "Asab",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ER",
				"iata_code" => "ASM",
				"airport_name" => "Asmara International Airport",
				"municipality" => "Asmara",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ER",
				"iata_code" => "MSW",
				"airport_name" => "Massawa International Airport",
				"municipality" => "Massawa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ES",
				"iata_code" => "ACE",
				"airport_name" => "César Manrique-Lanzarote Airport",
				"municipality" => "Lanzarote Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ES",
				"iata_code" => "AGP",
				"airport_name" => "Málaga-Costa del Sol Airport",
				"municipality" => "Málaga",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ES",
				"iata_code" => "ALC",
				"airport_name" => "Alicante-Elche Miguel Hernández Airport",
				"municipality" => "Alicante",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ES",
				"iata_code" => "BCN",
				"airport_name" => "Josep Tarradellas Barcelona-El Prat Airport",
				"municipality" => "Barcelona",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ES",
				"iata_code" => "BIO",
				"airport_name" => "Bilbao Airport",
				"municipality" => "Bilbao",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ES",
				"iata_code" => "BJZ",
				"airport_name" => "Badajoz Airport",
				"municipality" => "Badajoz",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ES",
				"iata_code" => "CDT",
				"airport_name" => "Castellón-Costa Azahar Airport",
				"municipality" => "Castellón de la Plana",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ES",
				"iata_code" => "EAS",
				"airport_name" => "San Sebastián Airport",
				"municipality" => "Hondarribia",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ES",
				"iata_code" => "FUE",
				"airport_name" => "Fuerteventura Airport",
				"municipality" => "Fuerteventura Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ES",
				"iata_code" => "GMZ",
				"airport_name" => "La Gomera Airport",
				"municipality" => "Alajero, La Gomera Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ES",
				"iata_code" => "GRO",
				"airport_name" => "Girona-Costa Brava Airport",
				"municipality" => "Girona",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ES",
				"iata_code" => "GRX",
				"airport_name" => "F.G.L. Airport Granada-Jaén Airport",
				"municipality" => "Granada",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ES",
				"iata_code" => "IBZ",
				"airport_name" => "Ibiza Airport",
				"municipality" => "Ibiza",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ES",
				"iata_code" => "ILD",
				"airport_name" => "Lleida-Alguaire Airport",
				"municipality" => "Lleida",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ES",
				"iata_code" => "LCG",
				"airport_name" => "A Coruña Airport",
				"municipality" => "Culleredo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ES",
				"iata_code" => "LEI",
				"airport_name" => "Almería Airport",
				"municipality" => "Almería",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ES",
				"iata_code" => "LEN",
				"airport_name" => "León Airport",
				"municipality" => "León",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ES",
				"iata_code" => "LEU",
				"airport_name" => "Pirineus - la Seu d'Urgel Airport",
				"municipality" => "La Seu d'Urgell Pyrenees and Andorra",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ES",
				"iata_code" => "LPA",
				"airport_name" => "Gran Canaria Airport",
				"municipality" => "Gran Canaria Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ES",
				"iata_code" => "MAD",
				"airport_name" => "Adolfo Suárez Madrid–Barajas Airport",
				"municipality" => "Madrid",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ES",
				"iata_code" => "MAH",
				"airport_name" => "Menorca Airport",
				"municipality" => "Menorca Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ES",
				"iata_code" => "MLN",
				"airport_name" => "Melilla Airport",
				"municipality" => "Melilla",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ES",
				"iata_code" => "OVD",
				"airport_name" => "Asturias Airport",
				"municipality" => "Ranón",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ES",
				"iata_code" => "PMI",
				"airport_name" => "Palma de Mallorca Airport",
				"municipality" => "Palma De Mallorca",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ES",
				"iata_code" => "PNA",
				"airport_name" => "Pamplona Airport",
				"municipality" => "Pamplona",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ES",
				"iata_code" => "REU",
				"airport_name" => "Reus Airport",
				"municipality" => "Reus",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ES",
				"iata_code" => "RGS",
				"airport_name" => "Burgos Airport",
				"municipality" => "Burgos",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ES",
				"iata_code" => "RMU",
				"airport_name" => "Región de Murcia International Airport",
				"municipality" => "Corvera",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ES",
				"iata_code" => "SCQ",
				"airport_name" => "Santiago-Rosalía de Castro Airport",
				"municipality" => "Santiago de Compostela",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ES",
				"iata_code" => "SDR",
				"airport_name" => "Seve Ballesteros-Santander Airport",
				"municipality" => "Santander",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ES",
				"iata_code" => "SLM",
				"airport_name" => "Salamanca Airport",
				"municipality" => "Salamanca",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ES",
				"iata_code" => "SPC",
				"airport_name" => "La Palma Airport",
				"municipality" => "Sta Cruz de la Palma, La Palma Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ES",
				"iata_code" => "SVQ",
				"airport_name" => "Sevilla Airport",
				"municipality" => "Sevilla",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ES",
				"iata_code" => "TFN",
				"airport_name" => "Tenerife Norte-Ciudad de La Laguna Airport",
				"municipality" => "Tenerife",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ES",
				"iata_code" => "TFS",
				"airport_name" => "Tenerife Sur Airport",
				"municipality" => "Tenerife",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ES",
				"iata_code" => "VDE",
				"airport_name" => "El Hierro Airport",
				"municipality" => "El Hierro Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ES",
				"iata_code" => "VGO",
				"airport_name" => "Vigo Airport",
				"municipality" => "Vigo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ES",
				"iata_code" => "VIT",
				"airport_name" => "Vitoria Airport",
				"municipality" => "Alava",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ES",
				"iata_code" => "VLC",
				"airport_name" => "Valencia Airport",
				"municipality" => "Valencia",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ES",
				"iata_code" => "VLL",
				"airport_name" => "Valladolid Airport",
				"municipality" => "Valladolid",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ES",
				"iata_code" => "XRY",
				"airport_name" => "Jerez Airport",
				"municipality" => "Jerez de la Frontera",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ES",
				"iata_code" => "ZAZ",
				"airport_name" => "Zaragoza Airport",
				"municipality" => "Zaragoza",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ET",
				"iata_code" => "ABK",
				"airport_name" => "Kebri Dahar Airport",
				"municipality" => "Kebri Dahar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ET",
				"iata_code" => "ADD",
				"airport_name" => "Addis Ababa Bole International Airport",
				"municipality" => "Addis Ababa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ET",
				"iata_code" => "AMH",
				"airport_name" => "Arba Minch Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ET",
				"iata_code" => "ASO",
				"airport_name" => "Asosa Airport",
				"municipality" => "Asosa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ET",
				"iata_code" => "AXU",
				"airport_name" => "Axum Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ET",
				"iata_code" => "BEI",
				"airport_name" => "Beica Airport",
				"municipality" => "Beica",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ET",
				"iata_code" => "BJR",
				"airport_name" => "Bahir Dar Airport",
				"municipality" => "Bahir Dar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ET",
				"iata_code" => "DEM",
				"airport_name" => "Dembidollo Airport",
				"municipality" => "Dembidollo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ET",
				"iata_code" => "DIR",
				"airport_name" => "Aba Tenna Dejazmach Yilma International Airport",
				"municipality" => "Dire Dawa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ET",
				"iata_code" => "DSE",
				"airport_name" => "Combolcha Airport",
				"municipality" => "Dessie",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ET",
				"iata_code" => "GDE",
				"airport_name" => "Gode Airport",
				"municipality" => "Gode",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ET",
				"iata_code" => "GDQ",
				"airport_name" => "Gonder Airport",
				"municipality" => "Gondar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ET",
				"iata_code" => "GMB",
				"airport_name" => "Gambella Airport",
				"municipality" => "Gambela",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ET",
				"iata_code" => "GOR",
				"airport_name" => "Gore Airport",
				"municipality" => "Gore",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ET",
				"iata_code" => "HIL",
				"airport_name" => "Shilavo Airport",
				"municipality" => "Shilavo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ET",
				"iata_code" => "JIJ",
				"airport_name" => "Wilwal International Airport",
				"municipality" => "Jijiga",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ET",
				"iata_code" => "JIM",
				"airport_name" => "Jimma Airport",
				"municipality" => "Jimma",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ET",
				"iata_code" => "MTF",
				"airport_name" => "Mizan Teferi Airport",
				"municipality" => "Mizan Teferi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ET",
				"iata_code" => "SHC",
				"airport_name" => "Shire Inda Selassie Airport",
				"municipality" => "Shire Indasilase",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ET",
				"iata_code" => "SZE",
				"airport_name" => "Semera Airport",
				"municipality" => "Semera",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ET",
				"iata_code" => "TIE",
				"airport_name" => "Tippi Airport",
				"municipality" => "Tippi",
				"created_at" => $now,
				"updated_at" => $now
			],
		];

		$data2 = [
			[
				"country" => "FI",
				"iata_code" => "ENF",
				"airport_name" => "Enontekio Airport",
				"municipality" => "Enontekio",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FI",
				"iata_code" => "HEL",
				"airport_name" => "Helsinki Vantaa Airport",
				"municipality" => "Helsinki",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FI",
				"iata_code" => "IVL",
				"airport_name" => "Ivalo Airport",
				"municipality" => "Ivalo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FI",
				"iata_code" => "JOE",
				"airport_name" => "Joensuu Airport",
				"municipality" => "Joensuu / Liperi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FI",
				"iata_code" => "JYV",
				"airport_name" => "Jyväskylä Airport",
				"municipality" => "Jyväskylän Maalaiskunta",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FI",
				"iata_code" => "KAJ",
				"airport_name" => "Kajaani Airport",
				"municipality" => "Kajaani",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FI",
				"iata_code" => "KAO",
				"airport_name" => "Kuusamo Airport",
				"municipality" => "Kuusamo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FI",
				"iata_code" => "KEM",
				"airport_name" => "Kemi-Tornio Airport",
				"municipality" => "Kemi / Tornio",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FI",
				"iata_code" => "KOK",
				"airport_name" => "Kokkola-Pietarsaari Airport",
				"municipality" => "Kokkola / Kruunupyy",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FI",
				"iata_code" => "KTT",
				"airport_name" => "Kittilä Airport",
				"municipality" => "Kittilä",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FI",
				"iata_code" => "KUO",
				"airport_name" => "Kuopio Airport",
				"municipality" => "Kuopio / Siilinjärvi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FI",
				"iata_code" => "LPP",
				"airport_name" => "Lappeenranta Airport",
				"municipality" => "Lappeenranta",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FI",
				"iata_code" => "MHQ",
				"airport_name" => "Mariehamn Airport",
				"municipality" => "Mariehamn",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FI",
				"iata_code" => "OUL",
				"airport_name" => "Oulu Airport",
				"municipality" => "Oulu / Oulunsalo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FI",
				"iata_code" => "POR",
				"airport_name" => "Pori Airport",
				"municipality" => "Pori",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FI",
				"iata_code" => "RVN",
				"airport_name" => "Rovaniemi Airport",
				"municipality" => "Rovaniemi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FI",
				"iata_code" => "SJY",
				"airport_name" => "Seinäjoki Airport",
				"municipality" => "Seinäjoki / Ilmajoki",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FI",
				"iata_code" => "SVL",
				"airport_name" => "Savonlinna Airport",
				"municipality" => "Savonlinna",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FI",
				"iata_code" => "TKU",
				"airport_name" => "Turku Airport",
				"municipality" => "Turku",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FI",
				"iata_code" => "TMP",
				"airport_name" => "Tampere-Pirkkala Airport",
				"municipality" => "Tampere / Pirkkala",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FI",
				"iata_code" => "VAA",
				"airport_name" => "Vaasa Airport",
				"municipality" => "Vaasa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FI",
				"iata_code" => "VRK",
				"airport_name" => "Varkaus Airport",
				"municipality" => "Varkaus / Joroinen",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FJ",
				"iata_code" => "ICI",
				"airport_name" => "Cicia Airport",
				"municipality" => "Cicia",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FJ",
				"iata_code" => "KDV",
				"airport_name" => "Vunisea Airport",
				"municipality" => "Vunisea",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FJ",
				"iata_code" => "KXF",
				"airport_name" => "Koro Island Airport",
				"municipality" => "Koro Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FJ",
				"iata_code" => "LBS",
				"airport_name" => "Labasa Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FJ",
				"iata_code" => "LEV",
				"airport_name" => "Levuka Airfield",
				"municipality" => "Bureta",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FJ",
				"iata_code" => "LKB",
				"airport_name" => "Lakeba Island Airport",
				"municipality" => "Lakeba Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FJ",
				"iata_code" => "MFJ",
				"airport_name" => "Moala Airport",
				"municipality" => "Moala",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FJ",
				"iata_code" => "MNF",
				"airport_name" => "Mana Island Airport",
				"municipality" => "Mana Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FJ",
				"iata_code" => "NAN",
				"airport_name" => "Nadi International Airport",
				"municipality" => "Nadi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FJ",
				"iata_code" => "NGI",
				"airport_name" => "Ngau Airport",
				"municipality" => "Ngau",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FJ",
				"iata_code" => "PTF",
				"airport_name" => "Malolo Lailai Island Airport",
				"municipality" => "Malolo Lailai Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FJ",
				"iata_code" => "RTA",
				"airport_name" => "Rotuma Airport",
				"municipality" => "Rotuma",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FJ",
				"iata_code" => "SUV",
				"airport_name" => "Nausori International Airport",
				"municipality" => "Nausori",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FJ",
				"iata_code" => "SVU",
				"airport_name" => "Savusavu Airport",
				"municipality" => "Savusavu",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FJ",
				"iata_code" => "TVU",
				"airport_name" => "Matei Airport",
				"municipality" => "Matei",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FJ",
				"iata_code" => "VBV",
				"airport_name" => "Vanua Balavu Airport",
				"municipality" => "Vanua Balavu",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FK",
				"iata_code" => "MPN",
				"airport_name" => "Mount Pleasant Airport",
				"municipality" => "Mount Pleasant",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FK",
				"iata_code" => "PSY",
				"airport_name" => "Port Stanley Airport",
				"municipality" => "Stanley",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FM",
				"iata_code" => "KSA",
				"airport_name" => "Kosrae International Airport",
				"municipality" => "Okat",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FM",
				"iata_code" => "PNI",
				"airport_name" => "Pohnpei International Airport",
				"municipality" => "Pohnpei Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FM",
				"iata_code" => "TKK",
				"airport_name" => "Chuuk International Airport",
				"municipality" => "Weno Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FM",
				"iata_code" => "YAP",
				"airport_name" => "Yap International Airport",
				"municipality" => "Yap Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FO",
				"iata_code" => "FAE",
				"airport_name" => "Vágar Airport",
				"municipality" => "Vágar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FR",
				"iata_code" => "AGF",
				"airport_name" => "Agen-La Garenne Airport",
				"municipality" => "Agen/La Garenne",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FR",
				"iata_code" => "AJA",
				"airport_name" => "Ajaccio-Napoléon Bonaparte Airport",
				"municipality" => "Ajaccio/Napoléon Bonaparte",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FR",
				"iata_code" => "ANE",
				"airport_name" => "Angers-Loire Airport",
				"municipality" => "TFFR",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FR",
				"iata_code" => "AUR",
				"airport_name" => "Aurillac Airport",
				"municipality" => "Aurillac",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FR",
				"iata_code" => "AVN",
				"airport_name" => "Avignon-Caumont Airport",
				"municipality" => "Avignon/Caumont",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FR",
				"iata_code" => "BES",
				"airport_name" => "Brest Bretagne Airport",
				"municipality" => "Brest/Guipavas",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FR",
				"iata_code" => "BIA",
				"airport_name" => "Bastia-Poretta Airport",
				"municipality" => "Bastia/Poretta",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FR",
				"iata_code" => "BIQ",
				"airport_name" => "Biarritz-Anglet-Bayonne Airport",
				"municipality" => "Biarritz/Anglet/Bayonne",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FR",
				"iata_code" => "BOD",
				"airport_name" => "Bordeaux-Mérignac Airport",
				"municipality" => "Bordeaux/Mérignac",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FR",
				"iata_code" => "BSL",
				"airport_name" => "EuroAirport Basel-Mulhouse-Freiburg Airport",
				"municipality" => "Bâle/Mulhouse",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FR",
				"iata_code" => "BVA",
				"airport_name" => "Paris Beauvais Tillé Airport",
				"municipality" => "Beauvais",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FR",
				"iata_code" => "BVE",
				"airport_name" => "Brive-Souillac",
				"municipality" => "Brive la Gaillarde",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FR",
				"iata_code" => "BZR",
				"airport_name" => "Béziers-Vias Airport",
				"municipality" => "Béziers/Vias",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FR",
				"iata_code" => "CCF",
				"airport_name" => "Carcassonne Airport",
				"municipality" => "Carcassonne/Salvaza",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FR",
				"iata_code" => "CDG",
				"airport_name" => "Charles de Gaulle International Airport",
				"municipality" => "Paris",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FR",
				"iata_code" => "CEQ",
				"airport_name" => "Cannes-Mandelieu Airport",
				"municipality" => "Cannes",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FR",
				"iata_code" => "CER",
				"airport_name" => "Cherbourg-Maupertus Airport",
				"municipality" => "Cherbourg/Maupertus",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FR",
				"iata_code" => "CFE",
				"airport_name" => "Clermont-Ferrand Auvergne Airport",
				"municipality" => "Clermont-Ferrand/Auvergne",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FR",
				"iata_code" => "CFR",
				"airport_name" => "Caen-Carpiquet Airport",
				"municipality" => "Caen/Carpiquet",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FR",
				"iata_code" => "CLY",
				"airport_name" => "Calvi-Sainte-Catherine Airport",
				"municipality" => "Calvi/Sainte-Catherine",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FR",
				"iata_code" => "CMF",
				"airport_name" => "Chambéry-Savoie Airport",
				"municipality" => "Chambéry/Aix-les-Bains",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FR",
				"iata_code" => "DCM",
				"airport_name" => "Castres-Mazamet Airport",
				"municipality" => "Castres/Mazamet",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FR",
				"iata_code" => "DIJ",
				"airport_name" => "Dijon-Bourgogne Airport",
				"municipality" => "Dijon/Longvic",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FR",
				"iata_code" => "DLE",
				"airport_name" => "Dole-Tavaux Airport",
				"municipality" => "Dole/Tavaux",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FR",
				"iata_code" => "DNR",
				"airport_name" => "Dinard-Pleurtuit-Saint-Malo Airport",
				"municipality" => "Dinard/Pleurtuit/Saint-Malo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FR",
				"iata_code" => "DOL",
				"airport_name" => "Deauville-Saint-Gatien Airport",
				"municipality" => "Deauville",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FR",
				"iata_code" => "EBU",
				"airport_name" => "Saint-Étienne-Bouthéon Airport",
				"municipality" => "Saint-Étienne/Bouthéon",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FR",
				"iata_code" => "EGC",
				"airport_name" => "Bergerac-Roumanière Airport",
				"municipality" => "Bergerac/Roumanière",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FR",
				"iata_code" => "ETZ",
				"airport_name" => "Metz-Nancy-Lorraine Airport",
				"municipality" => "Metz / Nancy",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FR",
				"iata_code" => "FNI",
				"airport_name" => "Nîmes-Arles-Camargue Airport",
				"municipality" => "Nîmes/Garons",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FR",
				"iata_code" => "FSC",
				"airport_name" => "Figari Sud-Corse Airport",
				"municipality" => "Figari Sud-Corse",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FR",
				"iata_code" => "GNB",
				"airport_name" => "Grenoble-Isère Airport",
				"municipality" => "Saint-Étienne-de-Saint-Geoirs",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FR",
				"iata_code" => "IDY",
				"airport_name" => "Île d'Yeu Airport",
				"municipality" => "Île d'Yeu",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FR",
				"iata_code" => "LDE",
				"airport_name" => "Tarbes-Lourdes-Pyrénées Airport",
				"municipality" => "Tarbes/Lourdes/Pyrénées",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FR",
				"iata_code" => "LEH",
				"airport_name" => "Le Havre Octeville Airport",
				"municipality" => "Le Havre/Octeville",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FR",
				"iata_code" => "LIG",
				"airport_name" => "Limoges Airport",
				"municipality" => "Limoges/Bellegarde",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FR",
				"iata_code" => "LIL",
				"airport_name" => "Lille-Lesquin Airport",
				"municipality" => "Lille/Lesquin",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FR",
				"iata_code" => "LPY",
				"airport_name" => "Le Puy-Loudes Airfield",
				"municipality" => "Le Puy/Loudes",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FR",
				"iata_code" => "LRH",
				"airport_name" => "La Rochelle-Île de Ré Airport",
				"municipality" => "La Rochelle/Île de Ré",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FR",
				"iata_code" => "LRT",
				"airport_name" => "Lorient South Brittany (Bretagne Sud) Airport",
				"municipality" => "Lorient/Lann/Bihoué",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FR",
				"iata_code" => "LTT",
				"airport_name" => "La Môle Airport",
				"municipality" => "La Môle",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FR",
				"iata_code" => "LYS",
				"airport_name" => "Lyon Saint-Exupéry Airport",
				"municipality" => "Lyon",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FR",
				"iata_code" => "MPL",
				"airport_name" => "Montpellier-Méditerranée Airport",
				"municipality" => "Montpellier/Méditerranée",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FR",
				"iata_code" => "MRS",
				"airport_name" => "Marseille Provence Airport",
				"municipality" => "Marseille",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FR",
				"iata_code" => "NCE",
				"airport_name" => "Nice-Côte d'Azur Airport",
				"municipality" => "Nice",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FR",
				"iata_code" => "NCY",
				"airport_name" => "Annecy-Haute-Savoie-Mont Blanc Airport",
				"municipality" => "Annecy/Meythet",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FR",
				"iata_code" => "NTE",
				"airport_name" => "Nantes Atlantique Airport",
				"municipality" => "Nantes",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FR",
				"iata_code" => "ORY",
				"airport_name" => "Paris-Orly Airport",
				"municipality" => "Paris",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FR",
				"iata_code" => "PGF",
				"airport_name" => "Perpignan-Rivesaltes (Llabanère) Airport",
				"municipality" => "Perpignan/Rivesaltes",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FR",
				"iata_code" => "PIS",
				"airport_name" => "Poitiers-Biard Airport",
				"municipality" => "Poitiers/Biard",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FR",
				"iata_code" => "PUF",
				"airport_name" => "Pau Pyrénées Airport",
				"municipality" => "Pau/Pyrénées (Uzein)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FR",
				"iata_code" => "RDZ",
				"airport_name" => "Rodez-Marcillac Airport",
				"municipality" => "Rodez/Marcillac",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FR",
				"iata_code" => "RNS",
				"airport_name" => "Rennes-Saint-Jacques Airport",
				"municipality" => "Rennes/Saint-Jacques",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FR",
				"iata_code" => "SXB",
				"airport_name" => "Strasbourg Airport",
				"municipality" => "Strasbourg",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FR",
				"iata_code" => "TLN",
				"airport_name" => "Toulon-Hyères Airport",
				"municipality" => "Toulon/Hyères/Le Palyvestre",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FR",
				"iata_code" => "TLS",
				"airport_name" => "Toulouse-Blagnac Airport",
				"municipality" => "Toulouse/Blagnac",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FR",
				"iata_code" => "TUF",
				"airport_name" => "Tours-Val-de-Loire Airport",
				"municipality" => "Tours/Val de Loire (Loire Valley)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FR",
				"iata_code" => "UIP",
				"airport_name" => "Quimper-Cornouaille Airport",
				"municipality" => "Quimper/Pluguffan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FR",
				"iata_code" => "URO",
				"airport_name" => "Rouen Airport",
				"municipality" => "Rouen/Vallée de Seine",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "FR",
				"iata_code" => "XCR",
				"airport_name" => "Châlons-Vatry Airport",
				"municipality" => "Vatry",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GA",
				"iata_code" => "GAX",
				"airport_name" => "Gamba Airport",
				"municipality" => "Gamba",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GA",
				"iata_code" => "KOU",
				"airport_name" => "Koulamoutou Mabimbi Airport",
				"municipality" => "Koulamoutou",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GA",
				"iata_code" => "LBV",
				"airport_name" => "Libreville Leon M'ba International Airport",
				"municipality" => "Libreville",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GA",
				"iata_code" => "MJL",
				"airport_name" => "Mouilla Ville Airport",
				"municipality" => "Mouila",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GA",
				"iata_code" => "MKU",
				"airport_name" => "Makokou Airport",
				"municipality" => "Makokou",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GA",
				"iata_code" => "MVB",
				"airport_name" => "M'Vengue El Hadj Omar Bongo Ondimba International Airport",
				"municipality" => "Franceville",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GA",
				"iata_code" => "OYE",
				"airport_name" => "Oyem Airport",
				"municipality" => "Oyem",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GA",
				"iata_code" => "POG",
				"airport_name" => "Port Gentil Airport",
				"municipality" => "Port Gentil",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GA",
				"iata_code" => "TCH",
				"airport_name" => "Tchibanga Airport",
				"municipality" => "Tchibanga",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GB",
				"iata_code" => "ABZ",
				"airport_name" => "Aberdeen Dyce Airport",
				"municipality" => "Aberdeen",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GB",
				"iata_code" => "BEB",
				"airport_name" => "Benbecula Airport",
				"municipality" => "Balivanich",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GB",
				"iata_code" => "BFS",
				"airport_name" => "Belfast International Airport",
				"municipality" => "Belfast",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GB",
				"iata_code" => "BHD",
				"airport_name" => "George Best Belfast City Airport",
				"municipality" => "Belfast",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GB",
				"iata_code" => "BHX",
				"airport_name" => "Birmingham International Airport",
				"municipality" => "Birmingham",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GB",
				"iata_code" => "BLK",
				"airport_name" => "Blackpool International Airport",
				"municipality" => "Blackpool",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GB",
				"iata_code" => "BOH",
				"airport_name" => "Bournemouth Airport",
				"municipality" => "Bournemouth",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GB",
				"iata_code" => "BRR",
				"airport_name" => "Barra Airport",
				"municipality" => "Eoligarry",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GB",
				"iata_code" => "BRS",
				"airport_name" => "Bristol Airport",
				"municipality" => "Bristol",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GB",
				"iata_code" => "CAL",
				"airport_name" => "Campbeltown Airport",
				"municipality" => "Campbeltown",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GB",
				"iata_code" => "CWL",
				"airport_name" => "Cardiff International Airport",
				"municipality" => "Cardiff",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GB",
				"iata_code" => "DND",
				"airport_name" => "Dundee Airport",
				"municipality" => "Dundee",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GB",
				"iata_code" => "DSA",
				"airport_name" => "Robin Hood Doncaster Sheffield Airport",
				"municipality" => "Doncaster",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GB",
				"iata_code" => "EDI",
				"airport_name" => "Edinburgh Airport",
				"municipality" => "Edinburgh",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GB",
				"iata_code" => "EMA",
				"airport_name" => "East Midlands Airport",
				"municipality" => "Nottingham",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GB",
				"iata_code" => "EOI",
				"airport_name" => "Eday Airport",
				"municipality" => "Eday",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GB",
				"iata_code" => "EXT",
				"airport_name" => "Exeter International Airport",
				"municipality" => "Exeter",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GB",
				"iata_code" => "FIE",
				"airport_name" => "Fair Isle Airport",
				"municipality" => "Fair Isle",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GB",
				"iata_code" => "FOA",
				"airport_name" => "Foula Airfield",
				"municipality" => "Foula",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GB",
				"iata_code" => "GLA",
				"airport_name" => "Glasgow International Airport",
				"municipality" => "Paisley, Renfrewshire",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GB",
				"iata_code" => "HUY",
				"airport_name" => "Humberside Airport",
				"municipality" => "Grimsby",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GB",
				"iata_code" => "ILY",
				"airport_name" => "Islay Airport",
				"municipality" => "Port Ellen",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GB",
				"iata_code" => "INV",
				"airport_name" => "Inverness Airport",
				"municipality" => "Inverness",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GB",
				"iata_code" => "ISC",
				"airport_name" => "St. Mary's Airport",
				"municipality" => "St. Mary's",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GB",
				"iata_code" => "KOI",
				"airport_name" => "Kirkwall Airport",
				"municipality" => "Orkney Islands",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GB",
				"iata_code" => "LBA",
				"airport_name" => "Leeds Bradford Airport",
				"municipality" => "Leeds",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GB",
				"iata_code" => "LCY",
				"airport_name" => "London City Airport",
				"municipality" => "London",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GB",
				"iata_code" => "LDY",
				"airport_name" => "City of Derry Airport",
				"municipality" => "Derry",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GB",
				"iata_code" => "LEQ",
				"airport_name" => "Land's End Airport",
				"municipality" => "Land's End",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GB",
				"iata_code" => "LGW",
				"airport_name" => "London Gatwick Airport",
				"municipality" => "London",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GB",
				"iata_code" => "LHR",
				"airport_name" => "London Heathrow Airport",
				"municipality" => "London",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GB",
				"iata_code" => "LPL",
				"airport_name" => "Liverpool John Lennon Airport",
				"municipality" => "Liverpool",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GB",
				"iata_code" => "LSI",
				"airport_name" => "Sumburgh Airport",
				"municipality" => "Lerwick",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GB",
				"iata_code" => "LTN",
				"airport_name" => "London Luton Airport",
				"municipality" => "London",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GB",
				"iata_code" => "LWK",
				"airport_name" => "Lerwick / Tingwall Airport",
				"municipality" => "Lerwick",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GB",
				"iata_code" => "MAN",
				"airport_name" => "Manchester Airport",
				"municipality" => "Manchester",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GB",
				"iata_code" => "MME",
				"airport_name" => "Teesside International Airport",
				"municipality" => "Darlington, Durham",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GB",
				"iata_code" => "NCL",
				"airport_name" => "Newcastle Airport",
				"municipality" => "Newcastle",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GB",
				"iata_code" => "NDY",
				"airport_name" => "Sanday Airport",
				"municipality" => "Sanday",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GB",
				"iata_code" => "NQY",
				"airport_name" => "Newquay Cornwall Airport",
				"municipality" => "Newquay",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GB",
				"iata_code" => "NRL",
				"airport_name" => "North Ronaldsay Airport",
				"municipality" => "North Ronaldsay",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GB",
				"iata_code" => "NWI",
				"airport_name" => "Norwich International Airport",
				"municipality" => "Norwich",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GB",
				"iata_code" => "PIK",
				"airport_name" => "Glasgow Prestwick Airport",
				"municipality" => "Prestwick, South Ayrshire",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GB",
				"iata_code" => "PPW",
				"airport_name" => "Papa Westray Airport",
				"municipality" => "Papa Westray",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GB",
				"iata_code" => "PSV",
				"airport_name" => "Papa Stour Airport",
				"municipality" => "Papa Stour Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GB",
				"iata_code" => "SEN",
				"airport_name" => "Southend Airport",
				"municipality" => "London",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GB",
				"iata_code" => "SOU",
				"airport_name" => "Southampton Airport",
				"municipality" => "Southampton",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GB",
				"iata_code" => "SOY",
				"airport_name" => "Stronsay Airport",
				"municipality" => "Stronsay",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GB",
				"iata_code" => "STN",
				"airport_name" => "London Stansted Airport",
				"municipality" => "London",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GB",
				"iata_code" => "SYY",
				"airport_name" => "Stornoway Airport",
				"municipality" => "Stornoway, Western Isles",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GB",
				"iata_code" => "TRE",
				"airport_name" => "Tiree Airport",
				"municipality" => "Balemartine",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GB",
				"iata_code" => "VLY",
				"airport_name" => "Anglesey Airport",
				"municipality" => "Angelsey",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GB",
				"iata_code" => "WIC",
				"airport_name" => "Wick Airport",
				"municipality" => "Wick",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GB",
				"iata_code" => "WRY",
				"airport_name" => "Westray Airport",
				"municipality" => "Westray",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GD",
				"iata_code" => "CRU",
				"airport_name" => "Lauriston Airport",
				"municipality" => "Carriacou Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GD",
				"iata_code" => "GND",
				"airport_name" => "Point Salines International Airport",
				"municipality" => "Saint George's",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GE",
				"iata_code" => "BUS",
				"airport_name" => "Batumi International Airport",
				"municipality" => "Batumi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GE",
				"iata_code" => "KUT",
				"airport_name" => "David the Builder Kutaisi International Airport",
				"municipality" => "Kopitnari",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GE",
				"iata_code" => "SUI",
				"airport_name" => "Sukhumi Babushara /  Vladislav Ardzinba International Airport",
				"municipality" => "Sukhumi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GE",
				"iata_code" => "TBS",
				"airport_name" => "Tbilisi International Airport",
				"municipality" => "Tbilisi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GF",
				"iata_code" => "CAY",
				"airport_name" => "Cayenne – Félix Eboué Airport",
				"municipality" => "Matoury",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GF",
				"iata_code" => "GSI",
				"airport_name" => "Grand-Santi Airport",
				"municipality" => "Grand-Santi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GF",
				"iata_code" => "LDX",
				"airport_name" => "Saint-Laurent-du-Maroni Airport",
				"municipality" => "Saint-Laurent-du-Maroni",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GF",
				"iata_code" => "MPY",
				"airport_name" => "Maripasoula Airport",
				"municipality" => "Maripasoula",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GF",
				"iata_code" => "XAU",
				"airport_name" => "Saül Airport",
				"municipality" => "Saül",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GG",
				"iata_code" => "ACI",
				"airport_name" => "Alderney Airport",
				"municipality" => "Saint Anne",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GG",
				"iata_code" => "GCI",
				"airport_name" => "Guernsey Airport",
				"municipality" => "Saint Peter Port",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GH",
				"iata_code" => "ACC",
				"airport_name" => "Kotoka International Airport",
				"municipality" => "Accra",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GH",
				"iata_code" => "KMS",
				"airport_name" => "Kumasi Airport",
				"municipality" => "Kumasi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GH",
				"iata_code" => "NYI",
				"airport_name" => "Sunyani Airport",
				"municipality" => "Sunyani",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GH",
				"iata_code" => "TKD",
				"airport_name" => "Takoradi Airport",
				"municipality" => "Sekondi-Takoradi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GH",
				"iata_code" => "TML",
				"airport_name" => "Tamale Airport",
				"municipality" => "Tamale",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GI",
				"iata_code" => "GIB",
				"airport_name" => "Gibraltar Airport",
				"municipality" => "Gibraltar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GL",
				"iata_code" => "CNP",
				"airport_name" => "Neerlerit Inaat Airport",
				"municipality" => "Neerlerit Inaat",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GL",
				"iata_code" => "GOH",
				"airport_name" => "Godthaab / Nuuk Airport",
				"municipality" => "Nuuk",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GL",
				"iata_code" => "JAV",
				"airport_name" => "Ilulissat Airport",
				"municipality" => "Ilulissat",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GL",
				"iata_code" => "JEG",
				"airport_name" => "Aasiaat Airport",
				"municipality" => "Aasiaat",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GL",
				"iata_code" => "JFR",
				"airport_name" => "Paamiut Airport",
				"municipality" => "Paamiut",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GL",
				"iata_code" => "JHS",
				"airport_name" => "Sisimiut Airport",
				"municipality" => "Sisimiut",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GL",
				"iata_code" => "JQA",
				"airport_name" => "Qaarsut Airport",
				"municipality" => "Uummannaq",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GL",
				"iata_code" => "JSU",
				"airport_name" => "Maniitsoq Airport",
				"municipality" => "Maniitsoq",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GL",
				"iata_code" => "JUV",
				"airport_name" => "Upernavik Airport",
				"municipality" => "Upernavik",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GL",
				"iata_code" => "KUS",
				"airport_name" => "Kulusuk Airport",
				"municipality" => "Kulusuk",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GL",
				"iata_code" => "NAQ",
				"airport_name" => "Qaanaaq Airport",
				"municipality" => "Qaanaaq",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GL",
				"iata_code" => "SFJ",
				"airport_name" => "Kangerlussuaq Airport",
				"municipality" => "Kangerlussuaq",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GL",
				"iata_code" => "THU",
				"airport_name" => "Thule Air Base",
				"municipality" => "Thule",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GL",
				"iata_code" => "UAK",
				"airport_name" => "Narsarsuaq Airport",
				"municipality" => "Narsarsuaq",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GM",
				"iata_code" => "BJL",
				"airport_name" => "Banjul International Airport",
				"municipality" => "Banjul",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GN",
				"iata_code" => "CKY",
				"airport_name" => "Conakry International Airport",
				"municipality" => "Conakry",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GP",
				"iata_code" => "BBR",
				"airport_name" => "Basse-Terre Baillif Airport",
				"municipality" => "Basse-Terre",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GP",
				"iata_code" => "DSD",
				"airport_name" => "La Désirade Airport",
				"municipality" => "Grande Anse",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GP",
				"iata_code" => "GBJ",
				"airport_name" => "Les Bases Airport",
				"municipality" => "Grand Bourg",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GP",
				"iata_code" => "PTP",
				"airport_name" => "Pointe-à-Pitre Le Raizet International  Airport",
				"municipality" => "Pointe-à-Pitre",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GP",
				"iata_code" => "SFC",
				"airport_name" => "St-François Airport",
				"municipality" => "St-François",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GQ",
				"iata_code" => "BSG",
				"airport_name" => "Bata Airport",
				"municipality" => "Bata",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GQ",
				"iata_code" => "NBN",
				"airport_name" => "Annobón Airport",
				"municipality" => "San Antonio de Palé",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GQ",
				"iata_code" => "SSG",
				"airport_name" => "Malabo Airport",
				"municipality" => "Malabo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GR",
				"iata_code" => "AOK",
				"airport_name" => "Karpathos Airport",
				"municipality" => "Karpathos Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GR",
				"iata_code" => "ATH",
				"airport_name" => "Athens Eleftherios Venizelos International Airport",
				"municipality" => "Athens",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GR",
				"iata_code" => "AXD",
				"airport_name" => "Alexandroupoli Democritus Airport",
				"municipality" => "Alexandroupolis",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GR",
				"iata_code" => "CFU",
				"airport_name" => "Ioannis Kapodistrias International Airport",
				"municipality" => "Kerkyra Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GR",
				"iata_code" => "CHQ",
				"airport_name" => "Chania International Airport",
				"municipality" => "Souda",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GR",
				"iata_code" => "EFL",
				"airport_name" => "Kefallinia Airport",
				"municipality" => "Kefallinia Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GR",
				"iata_code" => "GPA",
				"airport_name" => "Patras Araxos Agamemnon Airport",
				"municipality" => "Patras",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GR",
				"iata_code" => "HER",
				"airport_name" => "Heraklion International Nikos Kazantzakis Airport",
				"municipality" => "Heraklion",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GR",
				"iata_code" => "IOA",
				"airport_name" => "Ioannina Airport",
				"municipality" => "Ioannina",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GR",
				"iata_code" => "JIK",
				"airport_name" => "Ikaria Airport",
				"municipality" => "Ikaria Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GR",
				"iata_code" => "JKH",
				"airport_name" => "Chios Island National Airport",
				"municipality" => "Chios Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GR",
				"iata_code" => "JKL",
				"airport_name" => "Kalymnos Airport",
				"municipality" => "Kalymnos Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GR",
				"iata_code" => "JMK",
				"airport_name" => "Mikonos Airport",
				"municipality" => "Mykonos Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GR",
				"iata_code" => "JNX",
				"airport_name" => "Naxos Apollon Airport",
				"municipality" => "Naxos",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GR",
				"iata_code" => "JSH",
				"airport_name" => "Sitia Airport",
				"municipality" => "Crete Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GR",
				"iata_code" => "JSI",
				"airport_name" => "Skiathos Island National Airport",
				"municipality" => "Skiathos",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GR",
				"iata_code" => "JSY",
				"airport_name" => "Syros Airport",
				"municipality" => "Syros Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GR",
				"iata_code" => "JTR",
				"airport_name" => "Santorini Airport",
				"municipality" => "Santorini Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GR",
				"iata_code" => "JTY",
				"airport_name" => "Astypalaia Airport",
				"municipality" => "Astypalaia Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GR",
				"iata_code" => "KGS",
				"airport_name" => "Kos Airport",
				"municipality" => "Kos Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GR",
				"iata_code" => "KIT",
				"airport_name" => "Kithira Airport",
				"municipality" => "Kithira Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GR",
				"iata_code" => "KLX",
				"airport_name" => "Kalamata Airport",
				"municipality" => "Kalamata",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GR",
				"iata_code" => "KSJ",
				"airport_name" => "Kasos Airport",
				"municipality" => "Kasos Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GR",
				"iata_code" => "KSO",
				"airport_name" => "Kastoria National Airport Aristotle",
				"municipality" => "Argos Orestiko",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GR",
				"iata_code" => "KVA",
				"airport_name" => "Kavala Alexander the Great International Airport",
				"municipality" => "Kavala",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GR",
				"iata_code" => "KZI",
				"airport_name" => "Kozani State Airport Filippos",
				"municipality" => "Kozani",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GR",
				"iata_code" => "KZS",
				"airport_name" => "Kastelorizo Airport",
				"municipality" => "Kastelorizo Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GR",
				"iata_code" => "LRS",
				"airport_name" => "Leros Airport",
				"municipality" => "Leros Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GR",
				"iata_code" => "LXS",
				"airport_name" => "Limnos Airport",
				"municipality" => "Limnos Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GR",
				"iata_code" => "MJT",
				"airport_name" => "Mytilene International Airport",
				"municipality" => "Mytilene",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GR",
				"iata_code" => "MLO",
				"airport_name" => "Milos Airport",
				"municipality" => "Milos Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GR",
				"iata_code" => "PAS",
				"airport_name" => "Paros National Airport",
				"municipality" => "Paros",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GR",
				"iata_code" => "PVK",
				"airport_name" => "Aktion National Airport",
				"municipality" => "Preveza/Lefkada",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GR",
				"iata_code" => "RHO",
				"airport_name" => "Diagoras Airport",
				"municipality" => "Rodes Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GR",
				"iata_code" => "SKG",
				"airport_name" => "Thessaloniki Macedonia International Airport",
				"municipality" => "Thessaloniki",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GR",
				"iata_code" => "SKU",
				"airport_name" => "Skiros Airport",
				"municipality" => "Skiros Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GR",
				"iata_code" => "SMI",
				"airport_name" => "Samos Airport",
				"municipality" => "Samos Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GR",
				"iata_code" => "VOL",
				"airport_name" => "Nea Anchialos National Airport",
				"municipality" => "Nea Anchialos",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GR",
				"iata_code" => "ZTH",
				"airport_name" => "Zakynthos International Airport 'Dionysios Solomos'",
				"municipality" => "Zakynthos Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GT",
				"iata_code" => "AAZ",
				"airport_name" => "Quezaltenango Airport",
				"municipality" => "Quezaltenango",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GT",
				"iata_code" => "FRS",
				"airport_name" => "Mundo Maya International Airport",
				"municipality" => "San Benito",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GT",
				"iata_code" => "GSJ",
				"airport_name" => "San José Airport",
				"municipality" => "Puerto San José",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GT",
				"iata_code" => "GUA",
				"airport_name" => "La Aurora Airport",
				"municipality" => "Guatemala City",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GT",
				"iata_code" => "PBR",
				"airport_name" => "Puerto Barrios Airport",
				"municipality" => "Puerto Barrios",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GU",
				"iata_code" => "GUM",
				"airport_name" => "Antonio B. Won Pat International Airport",
				"municipality" => "Hagåtña",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GW",
				"iata_code" => "OXB",
				"airport_name" => "Osvaldo Vieira International Airport",
				"municipality" => "Bissau",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GY",
				"iata_code" => "GEO",
				"airport_name" => "Cheddi Jagan International Airport",
				"municipality" => "Georgetown",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GY",
				"iata_code" => "KAI",
				"airport_name" => "Kaieteur International Airport",
				"municipality" => "Kaieteur Falls",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GY",
				"iata_code" => "LTM",
				"airport_name" => "Lethem Airport",
				"municipality" => "Lethem",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "GY",
				"iata_code" => "OGL",
				"airport_name" => "Eugene F. Correira International Airport",
				"municipality" => "Ogle",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "HK",
				"iata_code" => "HKG",
				"airport_name" => "Hong Kong International Airport",
				"municipality" => "Hong Kong",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "HN",
				"iata_code" => "GJA",
				"airport_name" => "La Laguna Airport",
				"municipality" => "Guanaja",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "HN",
				"iata_code" => "LCE",
				"airport_name" => "Goloson International Airport",
				"municipality" => "La Ceiba",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "HN",
				"iata_code" => "PEU",
				"airport_name" => "Puerto Lempira Airport",
				"municipality" => "Puerto Lempira",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "HN",
				"iata_code" => "RTB",
				"airport_name" => "Juan Manuel Gálvez International Airport",
				"municipality" => "Roatán",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "HN",
				"iata_code" => "SAP",
				"airport_name" => "Ramón Villeda Morales International Airport",
				"municipality" => "San Pedro Sula",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "HN",
				"iata_code" => "TGU",
				"airport_name" => "Toncontín International Airport",
				"municipality" => "Tegucigalpa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "HN",
				"iata_code" => "UII",
				"airport_name" => "Utila Airport",
				"municipality" => "Utila Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "HN",
				"iata_code" => "XPL",
				"airport_name" => "Palmerola International Airport",
				"municipality" => "Tegucigalpa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "HR",
				"iata_code" => "BWK",
				"airport_name" => "Brač Airport",
				"municipality" => "Bol",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "HR",
				"iata_code" => "DBV",
				"airport_name" => "Dubrovnik Airport",
				"municipality" => "Dubrovnik",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "HR",
				"iata_code" => "OSI",
				"airport_name" => "Osijek Airport",
				"municipality" => "Osijek",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "HR",
				"iata_code" => "PUY",
				"airport_name" => "Pula Airport",
				"municipality" => "Pula",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "HR",
				"iata_code" => "RJK",
				"airport_name" => "Rijeka Airport",
				"municipality" => "Rijeka",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "HR",
				"iata_code" => "SPU",
				"airport_name" => "Split Airport",
				"municipality" => "Split",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "HR",
				"iata_code" => "ZAD",
				"airport_name" => "Zadar Airport",
				"municipality" => "Zemunik (Zadar)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "HR",
				"iata_code" => "ZAG",
				"airport_name" => "Zagreb Airport",
				"municipality" => "Zagreb",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "HT",
				"iata_code" => "CAP",
				"airport_name" => "Cap Haitien International Airport",
				"municipality" => "Cap Haitien",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "HT",
				"iata_code" => "CYA",
				"airport_name" => "Les Cayes Airport",
				"municipality" => "Les Cayes",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "HT",
				"iata_code" => "JAK",
				"airport_name" => "Jacmel Airport",
				"municipality" => "Jacmel",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "HT",
				"iata_code" => "JEE",
				"airport_name" => "Jérémie Airport",
				"municipality" => "Jeremie",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "HT",
				"iata_code" => "PAP",
				"airport_name" => "Toussaint Louverture International Airport",
				"municipality" => "Port-au-Prince",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "HU",
				"iata_code" => "BUD",
				"airport_name" => "Budapest Liszt Ferenc International Airport",
				"municipality" => "Budapest",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "HU",
				"iata_code" => "DEB",
				"airport_name" => "Debrecen International Airport",
				"municipality" => "Debrecen",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "HU",
				"iata_code" => "SOB",
				"airport_name" => "Hévíz–Balaton Airport",
				"municipality" => "Sármellék",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "AAP",
				"airport_name" => "Aji Pangeran Tumenggung Pranoto International Airport",
				"municipality" => "Samarinda",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "ABU",
				"airport_name" => "AA Bere Tallo (Haliwen) Airport",
				"municipality" => "Atambua",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "AEG",
				"airport_name" => "Aek Godang Airport",
				"municipality" => "Padang Sidempuan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "AMQ",
				"airport_name" => "Pattimura Airport, Ambon",
				"municipality" => "Ambon",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "ARD",
				"airport_name" => "Mali Airport",
				"municipality" => "Alor Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "BDJ",
				"airport_name" => "Syamsudin Noor Airport",
				"municipality" => "Banjarmasin-Borneo Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "BDO",
				"airport_name" => "Husein Sastranegara International Airport",
				"municipality" => "Bandung-Java Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "BEJ",
				"airport_name" => "Kalimarau Airport",
				"municipality" => "Tanjung Redeb - Borneo Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "BIK",
				"airport_name" => "Frans Kaisiepo Airport",
				"municipality" => "Biak-Supiori Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "BKS",
				"airport_name" => "Fatmawati Soekarno Airport",
				"municipality" => "Bengkulu",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "BMU",
				"airport_name" => "Muhammad Salahuddin Airport",
				"municipality" => "Bima-Sumbawa Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "BPN",
				"airport_name" => "Sultan Aji Muhamad Sulaiman Airport",
				"municipality" => "Kotamadya Balikpapan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "BTH",
				"airport_name" => "Hang Nadim International Airport",
				"municipality" => "Batam Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "BTJ",
				"airport_name" => "Sultan Iskandar Muda International Airport",
				"municipality" => "Banda Aceh",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "BUI",
				"airport_name" => "Bokondini Airport",
				"municipality" => "Bokondini",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "BUU",
				"airport_name" => "Muara Bungo Airport",
				"municipality" => "Muara Bungo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "BWX",
				"airport_name" => "Banyuwangi International Airport",
				"municipality" => "Banyuwangi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "BXT",
				"airport_name" => "Bontang Airport",
				"municipality" => "Bontang-Borneo Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "BXW",
				"airport_name" => "Bawean - Harun Thohir Airport",
				"municipality" => "Bawean",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "CGK",
				"airport_name" => "Soekarno-Hatta International Airport",
				"municipality" => "Jakarta",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "CJN",
				"airport_name" => "Nusawiru Airport",
				"municipality" => "Cijulang",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "CXP",
				"airport_name" => "Tunggul Wulung Airport",
				"municipality" => "Cilacap-Java Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "DEX",
				"airport_name" => "Nop Goliat Airport",
				"municipality" => "Dekai - Yahukimo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "DJB",
				"airport_name" => "Sultan Thaha Airport",
				"municipality" => "Jambi-Sumatra Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "DJJ",
				"airport_name" => "Sentani International Airport",
				"municipality" => "Jayapura-Papua Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "DPS",
				"airport_name" => "Ngurah Rai (Bali) International Airport",
				"municipality" => "Denpasar-Bali Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "DTB",
				"airport_name" => "Silangit Airport",
				"municipality" => "Siborong-Borong",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "DTD",
				"airport_name" => "Datadawai Airport",
				"municipality" => "Datadawai-Borneo Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "DUM",
				"airport_name" => "Pinang Kampai Airport",
				"municipality" => "Dumai",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "ENE",
				"airport_name" => "Ende (H Hasan Aroeboesman) Airport",
				"municipality" => "Ende-Flores Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "FKQ",
				"airport_name" => "Fakfak Airport",
				"municipality" => "Fakfak-Papua Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "FLZ",
				"airport_name" => "Dr. Ferdinand Lumban Tobing Airport",
				"municipality" => "Sibolga (Pinangsori)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "FOO",
				"airport_name" => "Kornasoren Airfield",
				"municipality" => "Kornasoren-Numfoor Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "GNS",
				"airport_name" => "Binaka Airport",
				"municipality" => "Gunungsitoli",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "GTO",
				"airport_name" => "Jalaluddin Airport",
				"municipality" => "Gorontalo-Celebes Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "HLP",
				"airport_name" => "Halim Perdanakusuma International Airport",
				"municipality" => "Jakarta",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "HMS",
				"airport_name" => "Haji Muhammad Sidik Airport",
				"municipality" => "Muara Teweh",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "JBB",
				"airport_name" => "Notohadinegoro Airport",
				"municipality" => "Jember",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "JIO",
				"airport_name" => "Jos Orno Imsula Airport",
				"municipality" => "Tiakur",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "JOG",
				"airport_name" => "Adisutjipto International Airport",
				"municipality" => "Yogyakarta-Java Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "KBU",
				"airport_name" => "Gusti Syamsir Alam Airport",
				"municipality" => "Stagen - Laut Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "KDI",
				"airport_name" => "Wolter Monginsidi Airport",
				"municipality" => "Kendari-Celebes Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "KLP",
				"airport_name" => "Seruyan Kuala Pembuang Airport",
				"municipality" => "Seruyan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "KNG",
				"airport_name" => "Kaimana Airport",
				"municipality" => "Kaimana-Papua Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "KNO",
				"airport_name" => "Kualanamu International Airport",
				"municipality" => "Bandara Kuala Namu",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "KOE",
				"airport_name" => "El Tari Airport",
				"municipality" => "Kupang-Timor Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "KRC",
				"airport_name" => "Departi Parbo Airport",
				"municipality" => "Sungai Penuh",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "KSR",
				"airport_name" => "Selayar - Haji Aroeppala Airport",
				"municipality" => "Benteng",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "KTG",
				"airport_name" => "Rahadi Osman Airport",
				"municipality" => "Ketapang",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "KWB",
				"airport_name" => "Dewadaru - Kemujan Island",
				"municipality" => "Karimunjawa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "LBJ",
				"airport_name" => "Komodo Airport",
				"municipality" => "Labuan Bajo - Flores Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "LBW",
				"airport_name" => "Long Bawan Airport",
				"municipality" => "Long Bawan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "LKA",
				"airport_name" => "Gewayentana Airport",
				"municipality" => "Larantuka-Flores Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "LLO",
				"airport_name" => "Bua - Palopo Lagaligo Airport",
				"municipality" => "Palopo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "LOP",
				"airport_name" => "Lombok International Airport",
				"municipality" => "Mataram",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "LPU",
				"airport_name" => "Long Apung Airport",
				"municipality" => "Long Apung-Borneo Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "LSW",
				"airport_name" => "Malikus Saleh Airport",
				"municipality" => "Lhok Seumawe-Sumatra Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "LUV",
				"airport_name" => "Karel Sadsuitubun Airport",
				"municipality" => "Langgur",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "MDC",
				"airport_name" => "Sam Ratulangi Airport",
				"municipality" => "Manado",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "MEQ",
				"airport_name" => "Cut Nyak Dhien Airport",
				"municipality" => "Kuala Pesisir",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "MKQ",
				"airport_name" => "Mopah International Airport",
				"municipality" => "Merauke",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "MKW",
				"airport_name" => "Rendani Airport",
				"municipality" => "Manokwari-Papua Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "MLG",
				"airport_name" => "Abdul Rachman Saleh Airport",
				"municipality" => "Malang",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "MOF",
				"airport_name" => "Maumere(Wai Oti) Airport",
				"municipality" => "Maumere-Flores Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "MOH",
				"airport_name" => "Maleo Airport",
				"municipality" => "Morowali",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "MPC",
				"airport_name" => "Muko Muko Airport",
				"municipality" => "Muko Muko",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "MXB",
				"airport_name" => "Andi Jemma Airport",
				"municipality" => "Masamba-Celebes Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "NAH",
				"airport_name" => "Naha Airport",
				"municipality" => "Tahuna-Sangihe Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "NBX",
				"airport_name" => "Nabire Airport",
				"municipality" => "Nabire-Papua Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "NDA",
				"airport_name" => "Bandanaira Airport",
				"municipality" => "Banda-Naira Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "NNX",
				"airport_name" => "Nunukan Airport",
				"municipality" => "Nunukan-Nunukan Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "NPO",
				"airport_name" => "Nanga Pinoh Airport",
				"municipality" => "Nanga Pinoh-Borneo Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "NTX",
				"airport_name" => "Ranai Airport",
				"municipality" => "Ranai-Natuna Besar Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "OKL",
				"airport_name" => "Oksibil Airport",
				"municipality" => "Oksibil-Papua Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "PDG",
				"airport_name" => "Minangkabau International Airport",
				"municipality" => "Padang (Katapiang)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "PDO",
				"airport_name" => "Pendopo Airport",
				"municipality" => "Talang Gudang-Sumatra Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "PGK",
				"airport_name" => "Depati Amir Airport",
				"municipality" => "Pangkal Pinang",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "PGQ",
				"airport_name" => "Buli Airport",
				"municipality" => "Pekaulang",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "PKN",
				"airport_name" => "Iskandar Airport",
				"municipality" => "Pangkalanbun-Borneo Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "PKU",
				"airport_name" => "Sultan Syarif Kasim Ii (Simpang Tiga) Airport",
				"municipality" => "Pekanbaru-Sumatra Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "PKY",
				"airport_name" => "Tjilik Riwut Airport",
				"municipality" => "Palangkaraya-Kalimantan Tengah",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "PLM",
				"airport_name" => "Sultan Mahmud Badaruddin II Airport",
				"municipality" => "Palembang",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "PLW",
				"airport_name" => "Mutiara - SIS Al-Jufrie Airport",
				"municipality" => "Palu",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "PNK",
				"airport_name" => "Supadio Airport",
				"municipality" => "Pontianak-Borneo Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "PSU",
				"airport_name" => "Pangsuma Airport",
				"municipality" => "Putussibau-Borneo Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "RJM",
				"airport_name" => "Marinda Airport",
				"municipality" => "Waisai",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "RTG",
				"airport_name" => "Frans Sales Lega Airport",
				"municipality" => "Satar Tacik-Flores Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "SEH",
				"airport_name" => "Senggeh Airport",
				"municipality" => "Senggeh",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "SMQ",
				"airport_name" => "Sampit(Hasan) Airport",
				"municipality" => "Sampit-Borneo Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "SOC",
				"airport_name" => "Adisumarmo International Airport",
				"municipality" => "Sukarata(Solo)-Java Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "SOQ",
				"airport_name" => "Domine Eduard Osok Airport",
				"municipality" => "Sorong-Papua Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "SQG",
				"airport_name" => "Sintang(Susilo) Airport",
				"municipality" => "Sintang-Borneo Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "SRG",
				"airport_name" => "Achmad Yani Airport",
				"municipality" => "Semarang-Java Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "SUB",
				"airport_name" => "Juanda International Airport",
				"municipality" => "Surabaya",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "SWQ",
				"airport_name" => "Sumbawa Besar Airport",
				"municipality" => "Sumbawa Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "SXK",
				"airport_name" => "Mathilda Batlayeri Airport",
				"municipality" => "Saumlaki-Yamdena Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "TBM",
				"airport_name" => "Tumbang Samba Airport",
				"municipality" => "Tumbang Samba-Borneo Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "TIM",
				"airport_name" => "Mozes Kilangin Airport",
				"municipality" => "Timika-Papua Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "TJG",
				"airport_name" => "Warukin Airport",
				"municipality" => "Tanta-Tabalong-Borneo Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "TJQ",
				"airport_name" => "H A S Hanandjoeddin International Airport",
				"municipality" => "Tanjung Pandan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "TJS",
				"airport_name" => "Tanjung Harapan Airport",
				"municipality" => "Tanjung Selor-Borneo Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "TKG",
				"airport_name" => "Radin Inten II International Airport",
				"municipality" => "Bandar Lampung-Sumatra Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "TMC",
				"airport_name" => "Tambolaka Airport",
				"municipality" => "Waikabubak-Sumba Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "TMH",
				"airport_name" => "Tanah Merah Airport",
				"municipality" => "Tanah Merah-Papua Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "TNJ",
				"airport_name" => "Raja Haji Fisabilillah International Airport",
				"municipality" => "Tanjung Pinang-Bintan Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "TRK",
				"airport_name" => "Juwata Airport",
				"municipality" => "Tarakan Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "TRT",
				"airport_name" => "Toraja Airport",
				"municipality" => "Toraja",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "TTE",
				"airport_name" => "Sultan Babullah Airport",
				"municipality" => "Sango-Ternate Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "TXE",
				"airport_name" => "Rembele Airport",
				"municipality" => "Takengon",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "UGU",
				"airport_name" => "Bilogai-Sugapa Airport",
				"municipality" => "Sugapa-Papua Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "UOL",
				"airport_name" => "Buol Airport",
				"municipality" => "Buol-Celebes Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "UPG",
				"airport_name" => "Hasanuddin International Airport",
				"municipality" => "Ujung Pandang-Celebes Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "WGP",
				"airport_name" => "Umbu Mehang Kunda Airport",
				"municipality" => "Waingapu-Sumba Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "WMX",
				"airport_name" => "Wamena Airport",
				"municipality" => "Wamena, Jayawijaya Regency, Papua Province",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "WNI",
				"airport_name" => "Matahora Airport",
				"municipality" => "Wangi-wangi Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ID",
				"iata_code" => "YIA",
				"airport_name" => "Yogyakarta International Airport",
				"municipality" => "Yogyakarta",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IE",
				"iata_code" => "CFN",
				"airport_name" => "Donegal Airport",
				"municipality" => "Donegal",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IE",
				"iata_code" => "DUB",
				"airport_name" => "Dublin Airport",
				"municipality" => "Dublin",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IE",
				"iata_code" => "GWY",
				"airport_name" => "Galway Airport",
				"municipality" => "Galway",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IE",
				"iata_code" => "IIA",
				"airport_name" => "Inishmaan Aerodrome",
				"municipality" => "Inis Meáin",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IE",
				"iata_code" => "INQ",
				"airport_name" => "Inisheer Aerodrome",
				"municipality" => "Inis Oírr",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IE",
				"iata_code" => "IOR",
				"airport_name" => "Inishmore Aerodrome",
				"municipality" => "Inis Mór",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IE",
				"iata_code" => "KIR",
				"airport_name" => "Kerry Airport",
				"municipality" => "Killarney",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IE",
				"iata_code" => "NNR",
				"airport_name" => "Connemara Regional Airport",
				"municipality" => "Inverin",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IE",
				"iata_code" => "NOC",
				"airport_name" => "Ireland West Knock Airport",
				"municipality" => "Charlestown",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IE",
				"iata_code" => "ORK",
				"airport_name" => "Cork Airport",
				"municipality" => "Cork",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IE",
				"iata_code" => "SNN",
				"airport_name" => "Shannon Airport",
				"municipality" => "Shannon",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IE",
				"iata_code" => "WAT",
				"airport_name" => "Waterford Airport",
				"municipality" => "Waterford",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IL",
				"iata_code" => "ETM",
				"airport_name" => "Ramon International Airport",
				"municipality" => "Eilat",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IL",
				"iata_code" => "HFA",
				"airport_name" => "Haifa International Airport",
				"municipality" => "Haifa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IL",
				"iata_code" => "TLV",
				"airport_name" => "Ben Gurion International Airport",
				"municipality" => "Tel Aviv",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IM",
				"iata_code" => "IOM",
				"airport_name" => "Isle of Man Airport",
				"municipality" => "Castletown",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "AGR",
				"airport_name" => "Agra Airport / Agra Air Force Station",
				"municipality" => "Agra",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "AGX",
				"airport_name" => "Agatti Airport",
				"municipality" => "Agatti",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "AIP",
				"airport_name" => "Adampur Airport",
				"municipality" => "Adampur",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "AJL",
				"airport_name" => "Lengpui Airport",
				"municipality" => "Aizawl (Lengpui)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "AMD",
				"airport_name" => "Sardar Vallabhbhai Patel International Airport",
				"municipality" => "Ahmedabad",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "ATQ",
				"airport_name" => "Sri Guru Ram Dass Jee International Airport",
				"municipality" => "Amritsar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "BBI",
				"airport_name" => "Biju Patnaik Airport",
				"municipality" => "Bhubaneswar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "BDQ",
				"airport_name" => "Vadodara Airport",
				"municipality" => "Vadodara",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "BHJ",
				"airport_name" => "Bhuj Airport",
				"municipality" => "Bhuj",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "BHO",
				"airport_name" => "Raja Bhoj International Airport",
				"municipality" => "Bhopal",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "BHU",
				"airport_name" => "Bhavnagar Airport",
				"municipality" => "Bhavnagar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "BLR",
				"airport_name" => "Kempegowda International Airport",
				"municipality" => "Bangalore",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "BOM",
				"airport_name" => "Chhatrapati Shivaji International Airport",
				"municipality" => "Mumbai",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "CCJ",
				"airport_name" => "Calicut International Airport",
				"municipality" => "Calicut",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "CCU",
				"airport_name" => "Netaji Subhash Chandra Bose International Airport",
				"municipality" => "Kolkata",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "CDP",
				"airport_name" => "Kadapa Airport",
				"municipality" => "Kadapa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "CJB",
				"airport_name" => "Coimbatore International Airport",
				"municipality" => "Coimbatore",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "CNN",
				"airport_name" => "Kannur International Airport",
				"municipality" => "Kannur",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "COK",
				"airport_name" => "Cochin International Airport",
				"municipality" => "Kochi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "DBR",
				"airport_name" => "Darbhanga Airport",
				"municipality" => "Darbhanga, Bihar, India",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "DED",
				"airport_name" => "Dehradun Airport",
				"municipality" => "Dehradun",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "DEL",
				"airport_name" => "Indira Gandhi International Airport",
				"municipality" => "New Delhi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "DHM",
				"airport_name" => "Kangra Airport",
				"municipality" => "Gaggal",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "DIB",
				"airport_name" => "Dibrugarh Airport",
				"municipality" => "Dibrugarh",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "DIU",
				"airport_name" => "Diu Airport",
				"municipality" => "Diu",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "DMU",
				"airport_name" => "Dimapur Airport",
				"municipality" => "Dimapur",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "GAU",
				"airport_name" => "Lokpriya Gopinath Bordoloi International Airport",
				"municipality" => "Guwahati",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "GAY",
				"airport_name" => "Gaya Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "GOI",
				"airport_name" => "Dabolim Airport",
				"municipality" => "Vasco da Gama",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "GOP",
				"airport_name" => "Gorakhpur Airport",
				"municipality" => "Gorakhpur",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "GWL",
				"airport_name" => "Gwalior Airport",
				"municipality" => "Gwalior",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "HBX",
				"airport_name" => "Hubli Airport",
				"municipality" => "Hubli",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "HJR",
				"airport_name" => "Khajuraho Airport",
				"municipality" => "Khajuraho",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "HYD",
				"airport_name" => "Rajiv Gandhi International Airport",
				"municipality" => "Hyderabad",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "IDR",
				"airport_name" => "Devi Ahilyabai Holkar Airport",
				"municipality" => "Indore",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "IMF",
				"airport_name" => "Imphal Airport",
				"municipality" => "Imphal",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "ISK",
				"airport_name" => "Nashik Airport",
				"municipality" => "Nasik",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "IXA",
				"airport_name" => "Agartala - Maharaja Bir Bikram Airport",
				"municipality" => "Agartala",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "IXB",
				"airport_name" => "Bagdogra Airport",
				"municipality" => "Siliguri",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "IXC",
				"airport_name" => "Chandigarh International Airport",
				"municipality" => "Chandigarh",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "IXD",
				"airport_name" => "Allahabad Airport",
				"municipality" => "Allahabad",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "IXE",
				"airport_name" => "Mangalore International Airport",
				"municipality" => "Mangalore",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "IXG",
				"airport_name" => "Belagavi Airport",
				"municipality" => "Belgaum",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "IXI",
				"airport_name" => "North Lakhimpur Airport",
				"municipality" => "Lilabari",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "IXJ",
				"airport_name" => "Jammu Airport",
				"municipality" => "Jammu",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "IXL",
				"airport_name" => "Leh Kushok Bakula Rimpochee Airport",
				"municipality" => "Leh",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "IXM",
				"airport_name" => "Madurai Airport",
				"municipality" => "Madurai",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "IXP",
				"airport_name" => "Pathankot Airport",
				"municipality" => "Pathankot",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "IXR",
				"airport_name" => "Birsa Munda Airport",
				"municipality" => "Ranchi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "IXS",
				"airport_name" => "Silchar Airport",
				"municipality" => "Silchar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "IXU",
				"airport_name" => "Aurangabad Airport",
				"municipality" => "Aurangabad",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "IXY",
				"airport_name" => "Kandla Airport",
				"municipality" => "Kandla",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "IXZ",
				"airport_name" => "Veer Savarkar International Airport / INS Utkrosh",
				"municipality" => "Port Blair",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "JAI",
				"airport_name" => "Jaipur International Airport",
				"municipality" => "Jaipur",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "JDH",
				"airport_name" => "Jodhpur Airport",
				"municipality" => "Jodhpur",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "JGA",
				"airport_name" => "Jamnagar Airport",
				"municipality" => "Jamnagar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "JGB",
				"airport_name" => "Jagdalpur Airport",
				"municipality" => "Jagdalpur",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "JLR",
				"airport_name" => "Jabalpur Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "JRH",
				"airport_name" => "Jorhat Airport",
				"municipality" => "Jorhat",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "KJB",
				"airport_name" => "Kurnool Airport",
				"municipality" => "Orvakal",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "KLH",
				"airport_name" => "Kolhapur Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "KNU",
				"airport_name" => "Kanpur Airport",
				"municipality" => "Kanpur",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "KQH",
				"airport_name" => "Kishangarh Airport Ajmer",
				"municipality" => "Ajmer (Kishangarh)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "LKO",
				"airport_name" => "Chaudhary Charan Singh International Airport",
				"municipality" => "Lucknow",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "LTU",
				"airport_name" => "Murod Kond Airport",
				"municipality" => "Latur",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "MAA",
				"airport_name" => "Chennai International Airport",
				"municipality" => "Chennai",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "NAG",
				"airport_name" => "Dr. Babasaheb Ambedkar International Airport",
				"municipality" => "Nagpur",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "NDC",
				"airport_name" => "Nanded Airport",
				"municipality" => "Nanded",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "PAB",
				"airport_name" => "Bilaspur Airport",
				"municipality" => "Bilaspur",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "PAT",
				"airport_name" => "Lok Nayak Jayaprakash Airport",
				"municipality" => "Patna",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "PBD",
				"airport_name" => "Porbandar Airport",
				"municipality" => "Porbandar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "PGH",
				"airport_name" => "Pantnagar Airport",
				"municipality" => "Pantnagar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "PNQ",
				"airport_name" => "Pune Airport / Lohagaon Air Force Station",
				"municipality" => "Pune",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "PNY",
				"airport_name" => "Pondicherry Airport",
				"municipality" => "Puducherry (Pondicherry)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "RAJ",
				"airport_name" => "Rajkot Airport",
				"municipality" => "Rajkot",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "RDP",
				"airport_name" => "Kazi Nazrul Islam Airport",
				"municipality" => "Durgapur",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "RJA",
				"airport_name" => "Rajahmundry Airport",
				"municipality" => "Rajahmundry",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "RPR",
				"airport_name" => "Swami Vivekananda Airport",
				"municipality" => "Raipur",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "SAG",
				"airport_name" => "Shirdi Airport",
				"municipality" => "Kakadi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "SHL",
				"airport_name" => "Shillong Airport",
				"municipality" => "Shillong",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "STV",
				"airport_name" => "Surat Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "SXR",
				"airport_name" => "Sheikh ul Alam International Airport",
				"municipality" => "Srinagar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "TCR",
				"airport_name" => "Tuticorin Airport",
				"municipality" => "Vagaikulam",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "TEZ",
				"airport_name" => "Tezpur Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "TIR",
				"airport_name" => "Tirupati Airport",
				"municipality" => "Tirupati",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "TNI",
				"airport_name" => "Satna Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "TRV",
				"airport_name" => "Trivandrum International Airport",
				"municipality" => "Thiruvananthapuram",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "TRZ",
				"airport_name" => "Tiruchirappalli International Airport",
				"municipality" => "Tiruchirappalli",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "UDR",
				"airport_name" => "Maharana Pratap Airport",
				"municipality" => "Udaipur",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "VGA",
				"airport_name" => "Vijayawada Airport",
				"municipality" => "Gannavaram",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "VNS",
				"airport_name" => "Lal Bahadur Shastri Airport",
				"municipality" => "Varanasi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IN",
				"iata_code" => "VTZ",
				"airport_name" => "Visakhapatnam Airport",
				"municipality" => "Visakhapatnam",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IQ",
				"iata_code" => "BGW",
				"airport_name" => "Baghdad International Airport / New Al Muthana Air Base",
				"municipality" => "Baghdad",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IQ",
				"iata_code" => "BSR",
				"airport_name" => "Basra International Airport",
				"municipality" => "Basra",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IQ",
				"iata_code" => "EBL",
				"airport_name" => "Erbil International Airport",
				"municipality" => "Arbil",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IQ",
				"iata_code" => "ISU",
				"airport_name" => "Sulaymaniyah International Airport",
				"municipality" => "Sulaymaniyah",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IQ",
				"iata_code" => "NJF",
				"airport_name" => "Al Najaf International Airport",
				"municipality" => "Najaf",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IR",
				"iata_code" => "ABD",
				"airport_name" => "Abadan Airport",
				"municipality" => "Abadan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IR",
				"iata_code" => "ADU",
				"airport_name" => "Ardabil Airport",
				"municipality" => "Ardabil",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IR",
				"iata_code" => "AEU",
				"airport_name" => "Abu Musa Island Airport",
				"municipality" => "Abu Musa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IR",
				"iata_code" => "AFZ",
				"airport_name" => "Sabzevar National Airport",
				"municipality" => "Sabzevar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IR",
				"iata_code" => "AWZ",
				"airport_name" => "Lieutenant General Qasem Soleimani International Airport",
				"municipality" => "Ahvaz",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IR",
				"iata_code" => "AZD",
				"airport_name" => "Shahid Sadooghi Airport",
				"municipality" => "Yazd",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IR",
				"iata_code" => "BDH",
				"airport_name" => "Bandar Lengeh International Airport",
				"municipality" => "Bandar Lengeh",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IR",
				"iata_code" => "BJB",
				"airport_name" => "Bojnord Airport",
				"municipality" => "Bojnord",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IR",
				"iata_code" => "BND",
				"airport_name" => "Bandar Abbas International Airport",
				"municipality" => "Bandar Abbas",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IR",
				"iata_code" => "BUZ",
				"airport_name" => "Bushehr Airport",
				"municipality" => "Bushehr",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IR",
				"iata_code" => "BXR",
				"airport_name" => "Bam Airport",
				"municipality" => "Bam",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IR",
				"iata_code" => "DEF",
				"airport_name" => "Dezful Airport",
				"municipality" => "Dezful",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IR",
				"iata_code" => "GSM",
				"airport_name" => "Qeshm International Airport",
				"municipality" => "Dayrestan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IR",
				"iata_code" => "HDM",
				"airport_name" => "Hamadan Airport",
				"municipality" => "Hamadan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IR",
				"iata_code" => "IFN",
				"airport_name" => "Esfahan Shahid Beheshti International Airport",
				"municipality" => "Isfahan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IR",
				"iata_code" => "IKA",
				"airport_name" => "Imam Khomeini International Airport",
				"municipality" => "Tehran",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IR",
				"iata_code" => "JSK",
				"airport_name" => "Jask Airport",
				"municipality" => "Bandar-e-Jask",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IR",
				"iata_code" => "KER",
				"airport_name" => "Ayatollah Hashemi Rafsanjani International Airport",
				"municipality" => "Kerman",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IR",
				"iata_code" => "KHD",
				"airport_name" => "Khoram Abad Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IR",
				"iata_code" => "KIH",
				"airport_name" => "Kish International Airport",
				"municipality" => "Kish Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IR",
				"iata_code" => "KKS",
				"airport_name" => "Kashan Airport",
				"municipality" => "Kashan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IR",
				"iata_code" => "KSH",
				"airport_name" => "Shahid Ashrafi Esfahani Airport",
				"municipality" => "Kermanshah",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IR",
				"iata_code" => "LFM",
				"airport_name" => "Lamerd Airport",
				"municipality" => "Lamerd",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IR",
				"iata_code" => "LRR",
				"airport_name" => "Lar Airport",
				"municipality" => "Lar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IR",
				"iata_code" => "MHD",
				"airport_name" => "Mashhad International Airport",
				"municipality" => "Mashhad",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IR",
				"iata_code" => "MRX",
				"airport_name" => "Mahshahr Airport",
				"municipality" => "Mahshahr",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IR",
				"iata_code" => "NSH",
				"airport_name" => "Nowshahr Airport",
				"municipality" => "Nowshahr",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IR",
				"iata_code" => "OMH",
				"airport_name" => "Urmia Airport",
				"municipality" => "Urmia",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IR",
				"iata_code" => "PFQ",
				"airport_name" => "Parsabad-Moghan Airport",
				"municipality" => "Parsabad",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IR",
				"iata_code" => "PGU",
				"airport_name" => "Persian Gulf International Airport",
				"municipality" => "Asalouyeh",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IR",
				"iata_code" => "PYK",
				"airport_name" => "Payam International Airport",
				"municipality" => "Karaj",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IR",
				"iata_code" => "RAS",
				"airport_name" => "Sardar-e-Jangal Airport",
				"municipality" => "Rasht",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IR",
				"iata_code" => "RJN",
				"airport_name" => "Rafsanjan Airport",
				"municipality" => "Rafsanjan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IR",
				"iata_code" => "RZR",
				"airport_name" => "Ramsar Airport",
				"municipality" => "Ramsar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IR",
				"iata_code" => "SDG",
				"airport_name" => "Sanandaj Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IR",
				"iata_code" => "SNX",
				"airport_name" => "Semnan Municipal Airport",
				"municipality" => "Semnan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IR",
				"iata_code" => "SRY",
				"airport_name" => "Sari Dasht-e Naz International Airport",
				"municipality" => "Sari",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IR",
				"iata_code" => "SYZ",
				"airport_name" => "Shiraz Shahid Dastghaib International Airport",
				"municipality" => "Shiraz",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IR",
				"iata_code" => "TBZ",
				"airport_name" => "Tabriz International Airport",
				"municipality" => "Tabriz",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IR",
				"iata_code" => "THR",
				"airport_name" => "Mehrabad International Airport",
				"municipality" => "Tehran",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IR",
				"iata_code" => "XBJ",
				"airport_name" => "Birjand International Airport",
				"municipality" => "Birjand",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IR",
				"iata_code" => "ZAH",
				"airport_name" => "Zahedan International Airport",
				"municipality" => "Zahedan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IR",
				"iata_code" => "ZBR",
				"airport_name" => "Konarak Airport",
				"municipality" => "Chabahar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IS",
				"iata_code" => "AEY",
				"airport_name" => "Akureyri Airport",
				"municipality" => "Akureyri",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IS",
				"iata_code" => "EGS",
				"airport_name" => "Egilsstaðir Airport",
				"municipality" => "Egilsstaðir",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IS",
				"iata_code" => "GRY",
				"airport_name" => "Grímsey Airport",
				"municipality" => "Grímsey",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IS",
				"iata_code" => "HFN",
				"airport_name" => "Hornafjörður Airport",
				"municipality" => "Höfn",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IS",
				"iata_code" => "HZK",
				"airport_name" => "Húsavík Airport",
				"municipality" => "Húsavík",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IS",
				"iata_code" => "IFJ",
				"airport_name" => "Ísafjörður Airport",
				"municipality" => "Ísafjörður",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IS",
				"iata_code" => "KEF",
				"airport_name" => "Keflavik International Airport",
				"municipality" => "Reykjavík",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IS",
				"iata_code" => "RKV",
				"airport_name" => "Reykjavik Airport",
				"municipality" => "Reykjavik",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IS",
				"iata_code" => "THO",
				"airport_name" => "Þórshöfn Airport",
				"municipality" => "Þórshöfn",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IS",
				"iata_code" => "VPN",
				"airport_name" => "Vopnafjörður Airport",
				"municipality" => "Vopnafjörður",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IT",
				"iata_code" => "AHO",
				"airport_name" => "Alghero-Fertilia Airport",
				"municipality" => "Alghero",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IT",
				"iata_code" => "AOI",
				"airport_name" => "Marche Airport",
				"municipality" => "Ancona",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IT",
				"iata_code" => "BDS",
				"airport_name" => "Brindisi Airport",
				"municipality" => "Brindisi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IT",
				"iata_code" => "BGY",
				"airport_name" => "Milan Bergamo Airport",
				"municipality" => "Milan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IT",
				"iata_code" => "BLQ",
				"airport_name" => "Bologna Guglielmo Marconi Airport",
				"municipality" => "Bologna",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IT",
				"iata_code" => "BRI",
				"airport_name" => "Bari Karol Wojtyła Airport",
				"municipality" => "Bari",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IT",
				"iata_code" => "BZO",
				"airport_name" => "Bolzano Airport",
				"municipality" => "Bolzano",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IT",
				"iata_code" => "CAG",
				"airport_name" => "Cagliari Elmas Airport",
				"municipality" => "Cagliari",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IT",
				"iata_code" => "CIA",
				"airport_name" => "Ciampino–G. B. Pastine International Airport",
				"municipality" => "Rome",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IT",
				"iata_code" => "CIY",
				"airport_name" => "Comiso Airport",
				"municipality" => "Comiso",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IT",
				"iata_code" => "CRV",
				"airport_name" => "Crotone Airport",
				"municipality" => "Crotone",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IT",
				"iata_code" => "CTA",
				"airport_name" => "Catania-Fontanarossa Airport",
				"municipality" => "Catania",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IT",
				"iata_code" => "CUF",
				"airport_name" => "Cuneo International Airport",
				"municipality" => "Cuneo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IT",
				"iata_code" => "EBA",
				"airport_name" => "Marina Di Campo Airport",
				"municipality" => "Marina  Di Campo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IT",
				"iata_code" => "FCO",
				"airport_name" => "Rome–Fiumicino Leonardo da Vinci International Airport",
				"municipality" => "Rome",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IT",
				"iata_code" => "FLR",
				"airport_name" => "Peretola Airport",
				"municipality" => "Firenze",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IT",
				"iata_code" => "FOG",
				"airport_name" => "Foggia 'Gino Lisa' Airport",
				"municipality" => "Foggia",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IT",
				"iata_code" => "FRL",
				"airport_name" => "Forlì Airport",
				"municipality" => "Forlì (FC)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IT",
				"iata_code" => "GOA",
				"airport_name" => "Genoa Cristoforo Colombo Airport",
				"municipality" => "Genova",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IT",
				"iata_code" => "LIN",
				"airport_name" => "Milano Linate Airport",
				"municipality" => "Milan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IT",
				"iata_code" => "LMP",
				"airport_name" => "Lampedusa Airport",
				"municipality" => "Lampedusa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IT",
				"iata_code" => "MXP",
				"airport_name" => "Malpensa International Airport",
				"municipality" => "Milan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IT",
				"iata_code" => "NAP",
				"airport_name" => "Naples International Airport",
				"municipality" => "Nápoli",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IT",
				"iata_code" => "OLB",
				"airport_name" => "Olbia Costa Smeralda Airport",
				"municipality" => "Olbia (SS)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IT",
				"iata_code" => "PEG",
				"airport_name" => "Perugia San Francesco d'Assisi – Umbria International Airport",
				"municipality" => "Perugia",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IT",
				"iata_code" => "PMF",
				"airport_name" => "Parma Airport",
				"municipality" => "Parma",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IT",
				"iata_code" => "PMO",
				"airport_name" => "Falcone–Borsellino Airport",
				"municipality" => "Palermo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IT",
				"iata_code" => "PNL",
				"airport_name" => "Pantelleria Airport",
				"municipality" => "Pantelleria (TP)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IT",
				"iata_code" => "PSA",
				"airport_name" => "Pisa International Airport",
				"municipality" => "Pisa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IT",
				"iata_code" => "PSR",
				"airport_name" => "Abruzzo Airport",
				"municipality" => "Pescara",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IT",
				"iata_code" => "REG",
				"airport_name" => "Reggio Calabria Airport",
				"municipality" => "Reggio Calabria",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IT",
				"iata_code" => "RMI",
				"airport_name" => "Federico Fellini International Airport",
				"municipality" => "Rimini",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IT",
				"iata_code" => "SUF",
				"airport_name" => "Lamezia Terme Airport",
				"municipality" => "Lamezia Terme (CZ)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IT",
				"iata_code" => "TPS",
				"airport_name" => "Vincenzo Florio Airport Trapani-Birgi",
				"municipality" => "Trapani (TP)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IT",
				"iata_code" => "TRN",
				"airport_name" => "Turin Airport",
				"municipality" => "Torino",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IT",
				"iata_code" => "TRS",
				"airport_name" => "Trieste–Friuli Venezia Giulia Airport",
				"municipality" => "Trieste",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IT",
				"iata_code" => "TSF",
				"airport_name" => "Treviso-Sant'Angelo Airport",
				"municipality" => "Treviso",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IT",
				"iata_code" => "VBS",
				"airport_name" => "Brescia Airport",
				"municipality" => "Montichiari (BS)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IT",
				"iata_code" => "VCE",
				"airport_name" => "Venice Marco Polo Airport",
				"municipality" => "Venice",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "IT",
				"iata_code" => "VRN",
				"airport_name" => "Verona-Villafranca Valerio Catullo Airport",
				"municipality" => "Villafranca di Verona",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JE",
				"iata_code" => "JER",
				"airport_name" => "Jersey Airport",
				"municipality" => "Saint Helier",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JM",
				"iata_code" => "KIN",
				"airport_name" => "Norman Manley International Airport",
				"municipality" => "Kingston",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JM",
				"iata_code" => "KTP",
				"airport_name" => "Tinson Pen Airport",
				"municipality" => "Tinson Pen",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JM",
				"iata_code" => "MBJ",
				"airport_name" => "Sangster International Airport",
				"municipality" => "Montego Bay",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JM",
				"iata_code" => "OCJ",
				"airport_name" => "Ian Fleming International Airport",
				"municipality" => "Boscobel",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JO",
				"iata_code" => "ADJ",
				"airport_name" => "Amman Civil (Marka International) Airport",
				"municipality" => "Amman",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JO",
				"iata_code" => "AMM",
				"airport_name" => "Queen Alia International Airport",
				"municipality" => "Amman",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JO",
				"iata_code" => "AQJ",
				"airport_name" => "Aqaba King Hussein International Airport",
				"municipality" => "Aqaba",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "AGJ",
				"airport_name" => "Aguni Airport",
				"municipality" => "Aguni",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "AKJ",
				"airport_name" => "Asahikawa Airport",
				"municipality" => "Asahikawa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "AOJ",
				"airport_name" => "Aomori Airport",
				"municipality" => "Aomori",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "ASJ",
				"airport_name" => "Amami Airport",
				"municipality" => "Amami",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "AXJ",
				"airport_name" => "Amakusa Airport",
				"municipality" => "Amakusa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "AXT",
				"airport_name" => "Akita Airport",
				"municipality" => "Akita",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "CTS",
				"airport_name" => "New Chitose Airport",
				"municipality" => "Sapporo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "FKS",
				"airport_name" => "Fukushima Airport",
				"municipality" => "Sukagawa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "FSZ",
				"airport_name" => "Mount Fuji Shizuoka Airport",
				"municipality" => "Makinohara / Shimada",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "FUJ",
				"airport_name" => "Fukue Airport",
				"municipality" => "Goto",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "FUK",
				"airport_name" => "Fukuoka Airport",
				"municipality" => "Fukuoka",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "GAJ",
				"airport_name" => "Yamagata Airport",
				"municipality" => "Higashine",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "HAC",
				"airport_name" => "Hachijojima Airport",
				"municipality" => "Hachijojima",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "HIJ",
				"airport_name" => "Hiroshima Airport",
				"municipality" => "Hiroshima",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "HKD",
				"airport_name" => "Hakodate Airport",
				"municipality" => "Hakodate",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "HNA",
				"airport_name" => "Morioka Hanamaki Airport",
				"municipality" => "Hanamaki",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "HND",
				"airport_name" => "Tokyo Haneda International Airport",
				"municipality" => "Tokyo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "HSG",
				"airport_name" => "Saga Airport",
				"municipality" => "Saga",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "IBR",
				"airport_name" => "Ibaraki Airport / JASDF Hyakuri Air Base",
				"municipality" => "Omitama",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "IKI",
				"airport_name" => "Iki Airport",
				"municipality" => "Iki",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "ISG",
				"airport_name" => "New Ishigaki Airport",
				"municipality" => "Ishigaki",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "ITM",
				"airport_name" => "Osaka International Airport",
				"municipality" => "Osaka",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "IWJ",
				"airport_name" => "Iwami Airport",
				"municipality" => "Masuda",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "IWK",
				"airport_name" => "Iwakuni Kintaikyo Airport / Marine Corps Air Station Iwakuni",
				"municipality" => "Iwakuni",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "IZO",
				"airport_name" => "Izumo Enmusubi Airport",
				"municipality" => "Izumo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "KCZ",
				"airport_name" => "Kochi Ryoma Airport",
				"municipality" => "Nankoku",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "KIJ",
				"airport_name" => "Niigata Airport",
				"municipality" => "Niigata",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "KIX",
				"airport_name" => "Kansai International Airport",
				"municipality" => "Osaka",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "KKJ",
				"airport_name" => "Kitakyushu Airport",
				"municipality" => "Kitakyushu",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "KKX",
				"airport_name" => "Kikai Airport",
				"municipality" => "Kikai",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "KMI",
				"airport_name" => "Miyazaki Airport",
				"municipality" => "Miyazaki",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "KMJ",
				"airport_name" => "Kumamoto Airport",
				"municipality" => "Kumamoto",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "KMQ",
				"airport_name" => "Komatsu Airport / JASDF Komatsu Air Base",
				"municipality" => "Kanazawa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "KOJ",
				"airport_name" => "Kagoshima Airport",
				"municipality" => "Kagoshima",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "KTD",
				"airport_name" => "Kitadaito Airport",
				"municipality" => "Kitadaitōjima",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "KUH",
				"airport_name" => "Kushiro Airport",
				"municipality" => "Kushiro",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "MBE",
				"airport_name" => "Monbetsu Airport",
				"municipality" => "Monbetsu",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "MMB",
				"airport_name" => "Memanbetsu Airport",
				"municipality" => "Ōzora",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "MMD",
				"airport_name" => "Minamidaito Airport",
				"municipality" => "Minamidaito",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "MMJ",
				"airport_name" => "Shinshu-Matsumoto Airport",
				"municipality" => "Matsumoto",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "MMY",
				"airport_name" => "Miyako Airport",
				"municipality" => "Miyako City",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "MSJ",
				"airport_name" => "Misawa Air Base / Misawa Airport",
				"municipality" => "Misawa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "MYE",
				"airport_name" => "Miyakejima Airport",
				"municipality" => "Miyakejima",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "MYJ",
				"airport_name" => "Matsuyama Airport",
				"municipality" => "Matsuyama",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "NGO",
				"airport_name" => "Chubu Centrair International Airport",
				"municipality" => "Tokoname",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "NGS",
				"airport_name" => "Nagasaki Airport",
				"municipality" => "Nagasaki",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "NKM",
				"airport_name" => "Nagoya Airport / JASDF Komaki Air Base",
				"municipality" => "Nagoya",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "NRT",
				"airport_name" => "Narita International Airport",
				"municipality" => "Tokyo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "NTQ",
				"airport_name" => "Noto Satoyama Airport",
				"municipality" => "Wajima",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "OBO",
				"airport_name" => "Tokachi-Obihiro Airport",
				"municipality" => "Obihiro",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "OGN",
				"airport_name" => "Yonaguni Airport",
				"municipality" => "Yonaguni",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "OIM",
				"airport_name" => "Oshima Airport",
				"municipality" => "Izu Oshima",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "OIR",
				"airport_name" => "Okushiri Airport",
				"municipality" => "Okushiri Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "OIT",
				"airport_name" => "Oita Airport",
				"municipality" => "Oita",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "OKA",
				"airport_name" => "Naha Airport / JASDF Naha Air Base",
				"municipality" => "Naha",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "OKD",
				"airport_name" => "Sapporo Okadama Airport",
				"municipality" => "Sapporo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "OKE",
				"airport_name" => "Okinoerabu Airport",
				"municipality" => "Wadomari",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "OKI",
				"airport_name" => "Oki Global Geopark Airport",
				"municipality" => "Okinoshima",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "OKJ",
				"airport_name" => "Okayama Momotaro Airport",
				"municipality" => "Okayama",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "ONJ",
				"airport_name" => "Odate Noshiro Airport",
				"municipality" => "Kitaakita",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "RIS",
				"airport_name" => "Rishiri Airport",
				"municipality" => "Rishiri",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "RNJ",
				"airport_name" => "Yoron Airport",
				"municipality" => "Yoron",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "SDJ",
				"airport_name" => "Sendai Airport",
				"municipality" => "Natori",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "SDS",
				"airport_name" => "Sado Airport",
				"municipality" => "Sado",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "SHB",
				"airport_name" => "Nakashibetsu Airport",
				"municipality" => "Nakashibetsu",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "SHM",
				"airport_name" => "Nanki Shirahama Airport",
				"municipality" => "Shirahama",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "SYO",
				"airport_name" => "Shonai Airport",
				"municipality" => "Shonai",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "TAK",
				"airport_name" => "Takamatsu Airport",
				"municipality" => "Takamatsu",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "TKN",
				"airport_name" => "Tokunoshima Airport",
				"municipality" => "Amagi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "TKS",
				"airport_name" => "Tokushima Awaodori Airport / JMSDF Tokushima Air Base",
				"municipality" => "Tokushima",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "TNE",
				"airport_name" => "New Tanegashima Airport",
				"municipality" => "Tanegashima",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "TOY",
				"airport_name" => "Toyama Airport",
				"municipality" => "Toyama",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "TRA",
				"airport_name" => "Tarama Airport",
				"municipality" => "Tarama",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "TSJ",
				"airport_name" => "Tsushima Airport",
				"municipality" => "Tsushima",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "TTJ",
				"airport_name" => "Tottori Sand Dunes Conan Airport",
				"municipality" => "Tottori",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "UBJ",
				"airport_name" => "Yamaguchi Ube Airport",
				"municipality" => "Ube",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "UEO",
				"airport_name" => "Kumejima Airport",
				"municipality" => "Kumejima",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "UKB",
				"airport_name" => "Kobe Airport",
				"municipality" => "Kobe",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "WKJ",
				"airport_name" => "Wakkanai Airport",
				"municipality" => "Wakkanai",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "JP",
				"iata_code" => "YGJ",
				"airport_name" => "Yonago Kitaro Airport / JASDF Miho Air Base",
				"municipality" => "Yonago",
				"created_at" => $now,
				"updated_at" => $now
			],
		];

		$data3 = [
			[
				"country" => "KE",
				"iata_code" => "ASV",
				"airport_name" => "Amboseli Airport",
				"municipality" => "Amboseli National Park",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KE",
				"iata_code" => "BMQ",
				"airport_name" => "Bamburi Airport",
				"municipality" => "Bamburi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KE",
				"iata_code" => "EDL",
				"airport_name" => "Eldoret International Airport",
				"municipality" => "Eldoret",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KE",
				"iata_code" => "JJM",
				"airport_name" => "Mulika Lodge Airport",
				"municipality" => "Meru-Kinna",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KE",
				"iata_code" => "KIS",
				"airport_name" => "Kisumu Airport",
				"municipality" => "Kisumu",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KE",
				"iata_code" => "KWY",
				"airport_name" => "Kiwayu Airport",
				"municipality" => "Kiwayu",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KE",
				"iata_code" => "LAU",
				"airport_name" => "Manda Airport",
				"municipality" => "Lamu",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KE",
				"iata_code" => "LKG",
				"airport_name" => "Lokichoggio Airport",
				"municipality" => "Lokichoggio",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KE",
				"iata_code" => "MBA",
				"airport_name" => "Moi International Airport",
				"municipality" => "Mombasa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KE",
				"iata_code" => "MRE",
				"airport_name" => "Mara Serena Lodge Airstrip",
				"municipality" => "Masai Mara",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KE",
				"iata_code" => "MYD",
				"airport_name" => "Malindi Airport",
				"municipality" => "Malindi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KE",
				"iata_code" => "NBO",
				"airport_name" => "Jomo Kenyatta International Airport",
				"municipality" => "Nairobi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KE",
				"iata_code" => "NUU",
				"airport_name" => "Nakuru Airport",
				"municipality" => "Nakuru",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KE",
				"iata_code" => "NYK",
				"airport_name" => "Nanyuki Airport",
				"municipality" => "Nanyuki",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KE",
				"iata_code" => "WIL",
				"airport_name" => "Nairobi Wilson Airport",
				"municipality" => "Nairobi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KE",
				"iata_code" => "WJR",
				"airport_name" => "Wajir Airport",
				"municipality" => "Wajir",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KG",
				"iata_code" => "FRU",
				"airport_name" => "Manas International Airport",
				"municipality" => "Bishkek",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KG",
				"iata_code" => "IKU",
				"airport_name" => "Issyk-Kul International Airport",
				"municipality" => "Tamchy",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KG",
				"iata_code" => "OSS",
				"airport_name" => "Osh Airport",
				"municipality" => "Osh",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KH",
				"iata_code" => "BBM",
				"airport_name" => "Battambang Airport",
				"municipality" => "Battambang",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KH",
				"iata_code" => "KOS",
				"airport_name" => "Sihanoukville International Airport",
				"municipality" => "Sihanoukville",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KH",
				"iata_code" => "PNH",
				"airport_name" => "Phnom Penh International Airport",
				"municipality" => "Phnom Penh (Pou Senchey)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KH",
				"iata_code" => "REP",
				"airport_name" => "Siem Reap International Airport",
				"municipality" => "Siem Reap",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KI",
				"iata_code" => "AAK",
				"airport_name" => "Aranuka Airport",
				"municipality" => "Buariki",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KI",
				"iata_code" => "BBG",
				"airport_name" => "Butaritari Airport",
				"municipality" => "Butaritari",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KI",
				"iata_code" => "CXI",
				"airport_name" => "Cassidy International Airport",
				"municipality" => "Banana",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KI",
				"iata_code" => "TRW",
				"airport_name" => "Bonriki International Airport",
				"municipality" => "Tarawa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KM",
				"iata_code" => "AJN",
				"airport_name" => "Ouani Airport",
				"municipality" => "Ouani",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KM",
				"iata_code" => "HAH",
				"airport_name" => "Prince Said Ibrahim International Airport",
				"municipality" => "Moroni",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KM",
				"iata_code" => "NWA",
				"airport_name" => "Mohéli Bandar Es Eslam Airport",
				"municipality" => "Fomboni",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KN",
				"iata_code" => "NEV",
				"airport_name" => "Vance W. Amory International Airport",
				"municipality" => "Charlestown",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KN",
				"iata_code" => "SKB",
				"airport_name" => "Robert L. Bradshaw International Airport",
				"municipality" => "Basseterre",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KP",
				"iata_code" => "DSO",
				"airport_name" => "Sondok Airport",
				"municipality" => "Sŏndŏng-ni",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KP",
				"iata_code" => "FNJ",
				"airport_name" => "Pyongyang Sunan International Airport",
				"municipality" => "Pyongyang",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KP",
				"iata_code" => "RGO",
				"airport_name" => "Orang (Chongjin) Airport",
				"municipality" => "Hoemun-ri",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KP",
				"iata_code" => "WOS",
				"airport_name" => "Wonsan Kalma International Airport",
				"municipality" => "Wonsan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KP",
				"iata_code" => "YJS",
				"airport_name" => "Samjiyŏn Airport",
				"municipality" => "Samjiyŏn",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KR",
				"iata_code" => "CJJ",
				"airport_name" => "Cheongju International Airport/Cheongju Air Base (K-59/G-513)",
				"municipality" => "Cheongju",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KR",
				"iata_code" => "CJU",
				"airport_name" => "Jeju International Airport",
				"municipality" => "Jeju City",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KR",
				"iata_code" => "GMP",
				"airport_name" => "Gimpo International Airport",
				"municipality" => "Seoul",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KR",
				"iata_code" => "HIN",
				"airport_name" => "Sacheon Air Base/Airport",
				"municipality" => "Sacheon",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KR",
				"iata_code" => "ICN",
				"airport_name" => "Incheon International Airport",
				"municipality" => "Seoul",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KR",
				"iata_code" => "KPO",
				"airport_name" => "Pohang Airport (G-815/K-3)",
				"municipality" => "Pohang",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KR",
				"iata_code" => "KUV",
				"airport_name" => "Kunsan Air Base",
				"municipality" => "Kunsan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KR",
				"iata_code" => "KWJ",
				"airport_name" => "Gwangju Airport",
				"municipality" => "Gwangju",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KR",
				"iata_code" => "MWX",
				"airport_name" => "Muan International Airport",
				"municipality" => "Piseo-ri (Muan)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KR",
				"iata_code" => "PUS",
				"airport_name" => "Gimhae International Airport",
				"municipality" => "Busan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KR",
				"iata_code" => "RSU",
				"airport_name" => "Yeosu Airport",
				"municipality" => "Yeosu",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KR",
				"iata_code" => "TAE",
				"airport_name" => "Daegu Airport",
				"municipality" => "Daegu",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KR",
				"iata_code" => "USN",
				"airport_name" => "Ulsan Airport",
				"municipality" => "Ulsan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KR",
				"iata_code" => "WJU",
				"airport_name" => "Wonju Airport / Hoengseong Air Base (K-38/K-46)",
				"municipality" => "Wonju",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KR",
				"iata_code" => "YNY",
				"airport_name" => "Yangyang International Airport",
				"municipality" => "Gonghang-ro",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KW",
				"iata_code" => "KWI",
				"airport_name" => "Kuwait International Airport",
				"municipality" => "Kuwait City",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KY",
				"iata_code" => "CYB",
				"airport_name" => "Charles Kirkconnell International Airport",
				"municipality" => "Cayman Brac",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KY",
				"iata_code" => "GCM",
				"airport_name" => "Owen Roberts International Airport",
				"municipality" => "Georgetown",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KZ",
				"iata_code" => "AKX",
				"airport_name" => "Aktobe Airport",
				"municipality" => "Aktobe",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KZ",
				"iata_code" => "ALA",
				"airport_name" => "Almaty International Airport",
				"municipality" => "Almaty",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KZ",
				"iata_code" => "CIT",
				"airport_name" => "Shymkent Airport",
				"municipality" => "Shymkent",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KZ",
				"iata_code" => "DMB",
				"airport_name" => "Taraz Airport",
				"municipality" => "Taraz",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KZ",
				"iata_code" => "DZN",
				"airport_name" => "Zhezkazgan Airport",
				"municipality" => "Zhezkazgan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KZ",
				"iata_code" => "GUW",
				"airport_name" => "Atyrau International Airport",
				"municipality" => "Atyrau",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KZ",
				"iata_code" => "HSA",
				"airport_name" => "Hazrat Sultan International Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KZ",
				"iata_code" => "KGF",
				"airport_name" => "Sary-Arka Airport",
				"municipality" => "Karaganda",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KZ",
				"iata_code" => "KOV",
				"airport_name" => "Kokshetau Airport",
				"municipality" => "Kokshetau",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KZ",
				"iata_code" => "KSN",
				"airport_name" => "Kostanay West Airport",
				"municipality" => "Kostanay",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KZ",
				"iata_code" => "KZO",
				"airport_name" => "Kyzylorda Airport",
				"municipality" => "Kyzylorda",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KZ",
				"iata_code" => "NQZ",
				"airport_name" => "Nursultan Nazarbayev International Airport",
				"municipality" => "Nur-Sultan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KZ",
				"iata_code" => "PLX",
				"airport_name" => "Semipalatinsk Airport",
				"municipality" => "Semey",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KZ",
				"iata_code" => "PPK",
				"airport_name" => "Petropavl Airport",
				"municipality" => "Petropavl",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KZ",
				"iata_code" => "PWQ",
				"airport_name" => "Pavlodar Airport",
				"municipality" => "Pavlodar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KZ",
				"iata_code" => "SCO",
				"airport_name" => "Aktau Airport",
				"municipality" => "Aktau",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KZ",
				"iata_code" => "SZI",
				"airport_name" => "Zaysan Airport",
				"municipality" => "Zaysan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KZ",
				"iata_code" => "UKK",
				"airport_name" => "Ust-Kamenogorsk Airport",
				"municipality" => "Ust-Kamenogorsk (Oskemen)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KZ",
				"iata_code" => "URA",
				"airport_name" => "Uralsk Airport",
				"municipality" => "Uralsk",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "KZ",
				"iata_code" => "UZR",
				"airport_name" => "Urzhar Airport",
				"municipality" => "Urzhar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "LA",
				"iata_code" => "HOE",
				"airport_name" => "Ban Huoeisay Airport",
				"municipality" => "Huay Xai",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "LA",
				"iata_code" => "LPQ",
				"airport_name" => "Luang Phabang International Airport",
				"municipality" => "Luang Phabang",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "LA",
				"iata_code" => "LXG",
				"airport_name" => "Luang Namtha Airport",
				"municipality" => "Luang Namtha",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "LA",
				"iata_code" => "ODY",
				"airport_name" => "Oudomsay Airport",
				"municipality" => "Oudomsay",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "LA",
				"iata_code" => "PKZ",
				"airport_name" => "Pakse International Airport",
				"municipality" => "Pakse",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "LA",
				"iata_code" => "VTE",
				"airport_name" => "Wattay International Airport",
				"municipality" => "Vientiane",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "LA",
				"iata_code" => "XKH",
				"airport_name" => "Xieng Khouang Airport",
				"municipality" => "Xieng Khouang",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "LA",
				"iata_code" => "ZBY",
				"airport_name" => "Sayaboury Airport",
				"municipality" => "Sainyabuli",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "LB",
				"iata_code" => "BEY",
				"airport_name" => "Beirut Rafic Hariri International Airport",
				"municipality" => "Beirut",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "LC",
				"iata_code" => "SLU",
				"airport_name" => "George F. L. Charles Airport",
				"municipality" => "Castries",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "LC",
				"iata_code" => "UVF",
				"airport_name" => "Hewanorra International Airport",
				"municipality" => "Vieux Fort",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "LK",
				"iata_code" => "BTC",
				"airport_name" => "Batticaloa Airport",
				"municipality" => "Batticaloa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "LK",
				"iata_code" => "CMB",
				"airport_name" => "Bandaranaike International Colombo Airport",
				"municipality" => "Colombo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "LK",
				"iata_code" => "HRI",
				"airport_name" => "Mattala Rajapaksa International Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "LK",
				"iata_code" => "JAF",
				"airport_name" => "Jaffna International Airport",
				"municipality" => "Jaffna",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "LK",
				"iata_code" => "KCT",
				"airport_name" => "Koggala Airport",
				"municipality" => "Galle",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "LK",
				"iata_code" => "RML",
				"airport_name" => "Colombo Ratmalana Airport",
				"municipality" => "Colombo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "LK",
				"iata_code" => "TRR",
				"airport_name" => "China Bay Airport",
				"municipality" => "Trincomalee",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "LK",
				"iata_code" => "WRZ",
				"airport_name" => "Weerawila Airport",
				"municipality" => "Weerawila",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "LR",
				"iata_code" => "MLW",
				"airport_name" => "Spriggs Payne Airport",
				"municipality" => "Monrovia",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "LR",
				"iata_code" => "ROB",
				"airport_name" => "Roberts International Airport",
				"municipality" => "Monrovia",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "LS",
				"iata_code" => "MSU",
				"airport_name" => "Moshoeshoe I International Airport",
				"municipality" => "Maseru",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "LT",
				"iata_code" => "KUN",
				"airport_name" => "Kaunas International Airport",
				"municipality" => "Kaunas",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "LT",
				"iata_code" => "PLQ",
				"airport_name" => "Palanga International Airport",
				"municipality" => "Palanga",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "LT",
				"iata_code" => "VNO",
				"airport_name" => "Vilnius International Airport",
				"municipality" => "Vilnius",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "LU",
				"iata_code" => "LUX",
				"airport_name" => "Luxembourg-Findel International Airport",
				"municipality" => "Luxembourg",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "LV",
				"iata_code" => "LPX",
				"airport_name" => "Liepāja International Airport",
				"municipality" => "Liepāja",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "LV",
				"iata_code" => "RIX",
				"airport_name" => "Riga International Airport",
				"municipality" => "Riga",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "LV",
				"iata_code" => "VNT",
				"airport_name" => "Ventspils International Airport",
				"municipality" => "Ventspils",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "LY",
				"iata_code" => "AKF",
				"airport_name" => "Kufra Airport",
				"municipality" => "Kufra",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "LY",
				"iata_code" => "BEN",
				"airport_name" => "Benina International Airport",
				"municipality" => "Benghazi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "LY",
				"iata_code" => "GHT",
				"airport_name" => "Ghat Airport",
				"municipality" => "Ghat",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "LY",
				"iata_code" => "LAQ",
				"airport_name" => "Al Abraq International Airport",
				"municipality" => "Al Bayda'",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "LY",
				"iata_code" => "LTD",
				"airport_name" => "Ghadames East Airport",
				"municipality" => "Ghadames",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "LY",
				"iata_code" => "MJI",
				"airport_name" => "Mitiga Airport",
				"municipality" => "Tripoli",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "LY",
				"iata_code" => "MRA",
				"airport_name" => "Misratah Airport",
				"municipality" => "Misratah",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "LY",
				"iata_code" => "QUB",
				"airport_name" => "Ubari Airport",
				"municipality" => "Ubari",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "LY",
				"iata_code" => "SEB",
				"airport_name" => "Sabha Airport",
				"municipality" => "Sabha",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "LY",
				"iata_code" => "SRX",
				"airport_name" => "Gardabya Airport",
				"municipality" => "Sirt",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "LY",
				"iata_code" => "TIP",
				"airport_name" => "Tripoli International Airport",
				"municipality" => "Tripoli",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "LY",
				"iata_code" => "TOB",
				"airport_name" => "Gamal Abdel Nasser Airport",
				"municipality" => "Tobruk",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MA",
				"iata_code" => "AGA",
				"airport_name" => "Al Massira Airport",
				"municipality" => "Agadir (Temsia)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MA",
				"iata_code" => "AHU",
				"airport_name" => "Cherif Al Idrissi Airport",
				"municipality" => "Al Hoceima",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MA",
				"iata_code" => "BEM",
				"airport_name" => "Beni Mellal Airport",
				"municipality" => "Beni Mellal",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MA",
				"iata_code" => "CMN",
				"airport_name" => "Mohammed V International Airport",
				"municipality" => "Casablanca",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MA",
				"iata_code" => "ERH",
				"airport_name" => "Moulay Ali Cherif Airport",
				"municipality" => "Errachidia",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MA",
				"iata_code" => "ESU",
				"airport_name" => "Essaouira-Mogador Airport",
				"municipality" => "Essaouira",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MA",
				"iata_code" => "FEZ",
				"airport_name" => "Saïss Airport",
				"municipality" => "Fes",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MA",
				"iata_code" => "NDR",
				"airport_name" => "Nador International Airport",
				"municipality" => "Nador",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MA",
				"iata_code" => "OUD",
				"airport_name" => "Angads Airport",
				"municipality" => "Oujda",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MA",
				"iata_code" => "OZZ",
				"airport_name" => "Ouarzazate Airport",
				"municipality" => "Ouarzazate",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MA",
				"iata_code" => "RAK",
				"airport_name" => "Menara Airport",
				"municipality" => "Marrakech",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MA",
				"iata_code" => "RBA",
				"airport_name" => "Rabat-Salé Airport",
				"municipality" => "Rabat",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MA",
				"iata_code" => "TNG",
				"airport_name" => "Tangier Ibn Battouta Airport",
				"municipality" => "Tangier",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MA",
				"iata_code" => "TTA",
				"airport_name" => "Tan Tan Airport",
				"municipality" => "Tan Tan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MD",
				"iata_code" => "KIV",
				"airport_name" => "Chişinău International Airport",
				"municipality" => "Chişinău",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ME",
				"iata_code" => "TGD",
				"airport_name" => "Podgorica Airport / Podgorica Golubovci Airbase",
				"municipality" => "Podgorica",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ME",
				"iata_code" => "TIV",
				"airport_name" => "Tivat Airport",
				"municipality" => "Tivat",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MF",
				"iata_code" => "SFG",
				"airport_name" => "Grand Case-Espérance Airport",
				"municipality" => "Grand Case",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MG",
				"iata_code" => "ANM",
				"airport_name" => "Antsirabe Airport",
				"municipality" => "Antsirabe",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MG",
				"iata_code" => "BMD",
				"airport_name" => "Belo sur Tsiribihina Airport",
				"municipality" => "Belo sur Tsiribihina",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MG",
				"iata_code" => "BPY",
				"airport_name" => "Besalampy Airport",
				"municipality" => "Besalampy",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MG",
				"iata_code" => "DIE",
				"airport_name" => "Arrachart Airport",
				"municipality" => "Antisiranana",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MG",
				"iata_code" => "DWB",
				"airport_name" => "Soalala Airport",
				"municipality" => "Soalala",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MG",
				"iata_code" => "FTU",
				"airport_name" => "Tôlanaro Airport",
				"municipality" => "Tôlanaro",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MG",
				"iata_code" => "HVA",
				"airport_name" => "Analalava Airport",
				"municipality" => "Analalava",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MG",
				"iata_code" => "JVA",
				"airport_name" => "Ankavandra Airport",
				"municipality" => "Ankavandra",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MG",
				"iata_code" => "MJA",
				"airport_name" => "Manja Airport",
				"municipality" => "Manja",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MG",
				"iata_code" => "MJN",
				"airport_name" => "Amborovy Airport",
				"municipality" => "Mahajanga",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MG",
				"iata_code" => "MNJ",
				"airport_name" => "Mananjary Airport",
				"municipality" => "Mananjary",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MG",
				"iata_code" => "MOQ",
				"airport_name" => "Morondava Airport",
				"municipality" => "Morondava",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MG",
				"iata_code" => "MXM",
				"airport_name" => "Morombe Airport",
				"municipality" => "Morombe",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MG",
				"iata_code" => "MXT",
				"airport_name" => "Maintirano Airport",
				"municipality" => "Maintirano",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MG",
				"iata_code" => "NOS",
				"airport_name" => "Fascene Airport",
				"municipality" => "Nosy Be",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MG",
				"iata_code" => "RVA",
				"airport_name" => "Farafangana Airport",
				"municipality" => "Farafangana",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MG",
				"iata_code" => "SMS",
				"airport_name" => "Sainte Marie Airport",
				"municipality" => "Vohilava",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MG",
				"iata_code" => "SVB",
				"airport_name" => "Sambava Airport",
				"municipality" => "Sambava",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MG",
				"iata_code" => "TLE",
				"airport_name" => "Toliara Airport",
				"municipality" => "Toliara",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MG",
				"iata_code" => "TMM",
				"airport_name" => "Toamasina Ambalamanasy Airport",
				"municipality" => "Toamasina",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MG",
				"iata_code" => "TNR",
				"airport_name" => "Ivato Airport",
				"municipality" => "Antananarivo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MG",
				"iata_code" => "TTS",
				"airport_name" => "Tsaratanana Airport",
				"municipality" => "Tsaratanana",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MG",
				"iata_code" => "TVA",
				"airport_name" => "Morafenobe Airport",
				"municipality" => "Morafenobe",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MG",
				"iata_code" => "VOH",
				"airport_name" => "Vohemar Airport",
				"municipality" => "Vohemar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MG",
				"iata_code" => "WAI",
				"airport_name" => "Ambalabe Airport",
				"municipality" => "Antsohihy",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MG",
				"iata_code" => "WAM",
				"airport_name" => "Ambatondrazaka Airport",
				"municipality" => "Ambatondrazaka",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MG",
				"iata_code" => "WAQ",
				"airport_name" => "Antsalova Airport",
				"municipality" => "Antsalova",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MG",
				"iata_code" => "WFI",
				"airport_name" => "Fianarantsoa Airport",
				"municipality" => "Fianarantsoa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MG",
				"iata_code" => "WMA",
				"airport_name" => "Mandritsara Airport",
				"municipality" => "Mandritsara",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MG",
				"iata_code" => "WMN",
				"airport_name" => "Maroantsetra Airport",
				"municipality" => "Maroantsetra",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MG",
				"iata_code" => "WMP",
				"airport_name" => "Mampikony Airport",
				"municipality" => "Mampikony",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MG",
				"iata_code" => "WMR",
				"airport_name" => "Mananara Nord Airport",
				"municipality" => "Mananara Nord",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MG",
				"iata_code" => "WPB",
				"airport_name" => "Port Bergé Airport",
				"municipality" => "Port Bergé",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MG",
				"iata_code" => "WTA",
				"airport_name" => "Tambohorano Airport",
				"municipality" => "Tambohorano",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MG",
				"iata_code" => "WTS",
				"airport_name" => "Tsiroanomandidy Airport",
				"municipality" => "Tsiroanomandidy",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MG",
				"iata_code" => "WVK",
				"airport_name" => "Manakara Airport",
				"municipality" => "Manakara",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MG",
				"iata_code" => "ZVA",
				"airport_name" => "Miandrivazo Airport",
				"municipality" => "Miandrivazo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MH",
				"iata_code" => "AIC",
				"airport_name" => "Ailinglaplap Airok Airport",
				"municipality" => "Bigatyelang Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MH",
				"iata_code" => "AIM",
				"airport_name" => "Ailuk Airport",
				"municipality" => "Ailuk Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MH",
				"iata_code" => "AUL",
				"airport_name" => "Aur Island Airport",
				"municipality" => "Aur Atoll",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MH",
				"iata_code" => "BII",
				"airport_name" => "Enyu Airfield",
				"municipality" => "Bikini Atoll",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MH",
				"iata_code" => "EJT",
				"airport_name" => "Enejit Airport",
				"municipality" => "Enejit Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MH",
				"iata_code" => "ENT",
				"airport_name" => "Eniwetok Airport",
				"municipality" => "Eniwetok Atoll",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MH",
				"iata_code" => "JEJ",
				"airport_name" => "Jeh Airport",
				"municipality" => "Ailinglapalap Atoll",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MH",
				"iata_code" => "KBT",
				"airport_name" => "Kaben Airport",
				"municipality" => "Kaben",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MH",
				"iata_code" => "KIO",
				"airport_name" => "Kili Airport",
				"municipality" => "Kili Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MH",
				"iata_code" => "KWA",
				"airport_name" => "Bucholz Army Air Field",
				"municipality" => "Kwajalein",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MH",
				"iata_code" => "LIK",
				"airport_name" => "Likiep Airport",
				"municipality" => "Likiep Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MH",
				"iata_code" => "MAJ",
				"airport_name" => "Marshall Islands International Airport",
				"municipality" => "Majuro Atoll",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MH",
				"iata_code" => "MAV",
				"airport_name" => "Maloelap Island Airport",
				"municipality" => "Maloelap Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MH",
				"iata_code" => "MIJ",
				"airport_name" => "Mili Island Airport",
				"municipality" => "Mili Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MH",
				"iata_code" => "MJB",
				"airport_name" => "Mejit Atoll Airport",
				"municipality" => "Mejit Atoll",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MH",
				"iata_code" => "MJE",
				"airport_name" => "Majkin Airport",
				"municipality" => "Majkin",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MH",
				"iata_code" => "NDK",
				"airport_name" => "Namorik Atoll Airport",
				"municipality" => "Namorik Atoll",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MH",
				"iata_code" => "RNP",
				"airport_name" => "Rongelap Island Airport",
				"municipality" => "Rongelap Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MH",
				"iata_code" => "UIT",
				"airport_name" => "Jaluit Airport",
				"municipality" => "Jabor Jaluit Atoll",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MH",
				"iata_code" => "UJE",
				"airport_name" => "Ujae Atoll Airport",
				"municipality" => "Ujae Atoll",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MH",
				"iata_code" => "UTK",
				"airport_name" => "Utirik Airport",
				"municipality" => "Utirik Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MH",
				"iata_code" => "WJA",
				"airport_name" => "Woja Airport",
				"municipality" => "Woja",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MH",
				"iata_code" => "WTE",
				"airport_name" => "Wotje Airport",
				"municipality" => "Wotje",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MH",
				"iata_code" => "WTO",
				"airport_name" => "Wotho Island Airport",
				"municipality" => "Wotho Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MK",
				"iata_code" => "OHD",
				"airport_name" => "Ohrid St. Paul the Apostle Airport",
				"municipality" => "Ohrid",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MK",
				"iata_code" => "SKP",
				"airport_name" => "Skopje International Airport",
				"municipality" => "Skopje",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ML",
				"iata_code" => "BKO",
				"airport_name" => "Modibo Keita International Airport",
				"municipality" => "Bamako",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ML",
				"iata_code" => "GAQ",
				"airport_name" => "Gao Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ML",
				"iata_code" => "KYS",
				"airport_name" => "Kayes Dag Dag Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ML",
				"iata_code" => "MZI",
				"airport_name" => "Mopti Ambodédjo International Airport",
				"municipality" => "Sévaré",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ML",
				"iata_code" => "TOM",
				"airport_name" => "Timbuktu Airport",
				"municipality" => "Timbuktu",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MM",
				"iata_code" => "AKY",
				"airport_name" => "Sittwe Airport",
				"municipality" => "Sittwe",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MM",
				"iata_code" => "BMO",
				"airport_name" => "Banmaw Airport",
				"municipality" => "Banmaw",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MM",
				"iata_code" => "BSX",
				"airport_name" => "Pathein Airport",
				"municipality" => "Pathein",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MM",
				"iata_code" => "HEH",
				"airport_name" => "Heho Airport",
				"municipality" => "Heho",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MM",
				"iata_code" => "KAW",
				"airport_name" => "Kawthoung Airport",
				"municipality" => "Kawthoung",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MM",
				"iata_code" => "KET",
				"airport_name" => "Kengtung Airport",
				"municipality" => "Kengtung",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MM",
				"iata_code" => "KHM",
				"airport_name" => "Kanti Airport",
				"municipality" => "Kanti",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MM",
				"iata_code" => "KYP",
				"airport_name" => "Kyaukpyu Airport",
				"municipality" => "Kyaukpyu",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MM",
				"iata_code" => "LIW",
				"airport_name" => "Loikaw Airport",
				"municipality" => "Loikaw",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MM",
				"iata_code" => "LSH",
				"airport_name" => "Lashio Airport",
				"municipality" => "Lashio",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MM",
				"iata_code" => "MDL",
				"airport_name" => "Mandalay International Airport",
				"municipality" => "Mandalay",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MM",
				"iata_code" => "MGZ",
				"airport_name" => "Myeik Airport",
				"municipality" => "Mkeik",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MM",
				"iata_code" => "MNU",
				"airport_name" => "Mawlamyine Airport",
				"municipality" => "Mawlamyine",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MM",
				"iata_code" => "MOG",
				"airport_name" => "Mong Hsat Airport",
				"municipality" => "Mong Hsat",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MM",
				"iata_code" => "MWQ",
				"airport_name" => "Magway Airport",
				"municipality" => "Magway",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MM",
				"iata_code" => "MYT",
				"airport_name" => "Myitkyina Airport",
				"municipality" => "Myitkyina",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MM",
				"iata_code" => "NYT",
				"airport_name" => "Nay Pyi Taw International Airport",
				"municipality" => "Pyinmana",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MM",
				"iata_code" => "NYU",
				"airport_name" => "Bagan Airport",
				"municipality" => "Nyaung U",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MM",
				"iata_code" => "PBU",
				"airport_name" => "Putao Airport",
				"municipality" => "Putao",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MM",
				"iata_code" => "PKK",
				"airport_name" => "Pakhokku Airport",
				"municipality" => "Pakhokku",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MM",
				"iata_code" => "RGN",
				"airport_name" => "Yangon International Airport",
				"municipality" => "Yangon",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MM",
				"iata_code" => "SNW",
				"airport_name" => "Thandwe Airport",
				"municipality" => "Thandwe",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MM",
				"iata_code" => "THL",
				"airport_name" => "Tachileik Airport",
				"municipality" => "Tachileik",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MM",
				"iata_code" => "TVY",
				"airport_name" => "Dawei Airport",
				"municipality" => "Dawei",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MN",
				"iata_code" => "AVK",
				"airport_name" => "Arvaikheer Airport",
				"municipality" => "Arvaikheer",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MN",
				"iata_code" => "BYN",
				"airport_name" => "Bayankhongor Airport",
				"municipality" => "Bayankhongor",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MN",
				"iata_code" => "DLZ",
				"airport_name" => "Dalanzadgad Airport",
				"municipality" => "Dalanzadgad",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MN",
				"iata_code" => "HVD",
				"airport_name" => "Khovd Airport",
				"municipality" => "Khovd",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MN",
				"iata_code" => "LTI",
				"airport_name" => "Altai Airport",
				"municipality" => "Altai",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MN",
				"iata_code" => "MXV",
				"airport_name" => "Mörön Airport",
				"municipality" => "Mörön",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MN",
				"iata_code" => "MXW",
				"airport_name" => "Mandalgobi Airport",
				"municipality" => "Mandalgobi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MN",
				"iata_code" => "UBN",
				"airport_name" => "Ulaanbaatar Chinggis Khaan International Airport",
				"municipality" => "Ulaanbaatar (Sergelen)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MN",
				"iata_code" => "UGA",
				"airport_name" => "Bulgan Airport",
				"municipality" => "Bulgan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MN",
				"iata_code" => "ULG",
				"airport_name" => "Ölgii Mongolei Airport",
				"municipality" => "Ölgii",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MN",
				"iata_code" => "ULO",
				"airport_name" => "Ulaangom Airport",
				"municipality" => "Ulaangom",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MN",
				"iata_code" => "ULZ",
				"airport_name" => "Donoi Airport",
				"municipality" => "Uliastai",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MO",
				"iata_code" => "MFM",
				"airport_name" => "Macau International Airport",
				"municipality" => "Freguesia de Nossa Senhora do Carmo (Taipa)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MP",
				"iata_code" => "ROP",
				"airport_name" => "Rota International Airport",
				"municipality" => "Rota Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MP",
				"iata_code" => "SPN",
				"airport_name" => "Saipan International Airport",
				"municipality" => "I Fadang, Saipan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MQ",
				"iata_code" => "FDF",
				"airport_name" => "Martinique Aimé Césaire International Airport",
				"municipality" => "Fort-de-France",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MR",
				"iata_code" => "NDB",
				"airport_name" => "Nouadhibou International Airport",
				"municipality" => "Nouadhibou",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MR",
				"iata_code" => "NKC",
				"airport_name" => "Nouakchott–Oumtounsy International Airport",
				"municipality" => "Nouakchott",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MS",
				"iata_code" => "MNI",
				"airport_name" => "John A. Osborne Airport",
				"municipality" => "Gerald's Park",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MT",
				"iata_code" => "MLA",
				"airport_name" => "Malta International Airport",
				"municipality" => "Valletta",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MU",
				"iata_code" => "MRU",
				"airport_name" => "Sir Seewoosagur Ramgoolam International Airport",
				"municipality" => "Plaine Magnein",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MU",
				"iata_code" => "RRG",
				"airport_name" => "Sir Charles Gaetan Duval Airport",
				"municipality" => "Port Mathurin",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MV",
				"iata_code" => "DRV",
				"airport_name" => "Dharavandhoo Airport",
				"municipality" => "Baa Atoll",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MV",
				"iata_code" => "FND",
				"airport_name" => "Funadhoo Airport",
				"municipality" => "Funadhoo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MV",
				"iata_code" => "GAN",
				"airport_name" => "Gan International Airport",
				"municipality" => "Gan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MV",
				"iata_code" => "GKK",
				"airport_name" => "Kooddoo Airport",
				"municipality" => "Huvadhu Atoll",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MV",
				"iata_code" => "HAQ",
				"airport_name" => "Hanimaadhoo Airport",
				"municipality" => "Haa Dhaalu Atoll",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MV",
				"iata_code" => "HDK",
				"airport_name" => "Kulhudhuffushi Airport",
				"municipality" => "Kulhudhuffushi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MV",
				"iata_code" => "KDM",
				"airport_name" => "Kaadedhdhoo Airport",
				"municipality" => "Huvadhu Atoll",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MV",
				"iata_code" => "KDO",
				"airport_name" => "Kadhdhoo Airport",
				"municipality" => "Kadhdhoo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MV",
				"iata_code" => "MLE",
				"airport_name" => "Malé International Airport",
				"municipality" => "Malé",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MV",
				"iata_code" => "NMF",
				"airport_name" => "Maafaru International Airport",
				"municipality" => "Noonu Atoll",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MV",
				"iata_code" => "RUL",
				"airport_name" => "Maavaarulaa Airport",
				"municipality" => "Maavaarulu",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MV",
				"iata_code" => "TMF",
				"airport_name" => "Thimarafushi Airport",
				"municipality" => "Thimarafushi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MV",
				"iata_code" => "VAM",
				"airport_name" => "Villa Airport",
				"municipality" => "Maamigili",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MW",
				"iata_code" => "BLZ",
				"airport_name" => "Chileka International Airport",
				"municipality" => "Blantyre",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MW",
				"iata_code" => "CMK",
				"airport_name" => "Club Makokola Airport",
				"municipality" => "Club Makokola",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MW",
				"iata_code" => "LLW",
				"airport_name" => "Lilongwe International Airport",
				"municipality" => "Lilongwe",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MW",
				"iata_code" => "ZZU",
				"airport_name" => "Mzuzu Airport",
				"municipality" => "Mzuzu",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "ACA",
				"airport_name" => "General Juan N Alvarez International Airport",
				"municipality" => "Acapulco",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "AGU",
				"airport_name" => "Governor Jesús Terán Peredo International Airport",
				"municipality" => "Aguascalientes",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "BJX",
				"airport_name" => "Del Bajío International Airport",
				"municipality" => "Silao",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "CEN",
				"airport_name" => "Ciudad Obregón International Airport",
				"municipality" => "Ciudad Obregón",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "CJS",
				"airport_name" => "Abraham González International Airport",
				"municipality" => "Ciudad Juárez",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "CLQ",
				"airport_name" => "Licenciado Miguel de la Madrid Airport",
				"municipality" => "Colima",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "CME",
				"airport_name" => "Ciudad del Carmen International Airport",
				"municipality" => "Ciudad del Carmen",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "CPE",
				"airport_name" => "Ingeniero Alberto Acuña Ongay International Airport",
				"municipality" => "Campeche",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "CTM",
				"airport_name" => "Chetumal International Airport",
				"municipality" => "Chetumal",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "CUA",
				"airport_name" => "Ciudad Constitución National Airport",
				"municipality" => "Comondú",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "CUL",
				"airport_name" => "Bachigualato Federal International Airport",
				"municipality" => "Culiacán",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "CUN",
				"airport_name" => "Cancún International Airport",
				"municipality" => "Cancún",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "CUU",
				"airport_name" => "General Roberto Fierro Villalobos International Airport",
				"municipality" => "Chihuahua",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "CVJ",
				"airport_name" => "Cuernavaca - General Mariano Matamoros Airport",
				"municipality" => "Temixco",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "CVM",
				"airport_name" => "General Pedro Jose Mendez International Airport",
				"municipality" => "Ciudad Victoria",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "CYW",
				"airport_name" => "Captain Rogelio Castillo National Airport",
				"municipality" => "Celaya",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "CZM",
				"airport_name" => "Cozumel International Airport",
				"municipality" => "Cozumel",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "DGO",
				"airport_name" => "General Guadalupe Victoria International Airport",
				"municipality" => "Durango",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "ESE",
				"airport_name" => "Ensenada International Airport / El Cipres Air Base",
				"municipality" => "Ensenada",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "GDL",
				"airport_name" => "Don Miguel Hidalgo Y Costilla International Airport",
				"municipality" => "Guadalajara",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "GUB",
				"airport_name" => "Guerrero Negro Airport",
				"municipality" => "Ensenada",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "GYM",
				"airport_name" => "General José María Yáñez International Airport",
				"municipality" => "Guaymas",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "HMO",
				"airport_name" => "General Ignacio P. Garcia International Airport",
				"municipality" => "Hermosillo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "HUX",
				"airport_name" => "Bahías de Huatulco International Airport",
				"municipality" => "Huatulco",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "IZT",
				"airport_name" => "Ixtepec Airport",
				"municipality" => "Ixtepec",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "JAL",
				"airport_name" => "El Lencero Airport",
				"municipality" => "Xalapa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "LAP",
				"airport_name" => "Manuel Márquez de León International Airport",
				"municipality" => "La Paz",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "LMM",
				"airport_name" => "Valle del Fuerte International Airport",
				"municipality" => "Los Mochis",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "LOV",
				"airport_name" => "Monclova International Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "LTO",
				"airport_name" => "Loreto International Airport",
				"municipality" => "Loreto",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "LZC",
				"airport_name" => "Lázaro Cárdenas Airport",
				"municipality" => "Lázaro Cárdenas",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "MAM",
				"airport_name" => "General Servando Canales International Airport",
				"municipality" => "Matamoros",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "MEX",
				"airport_name" => "Licenciado Benito Juarez International Airport",
				"municipality" => "Mexico City",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "MID",
				"airport_name" => "Licenciado Manuel Crescencio Rejon Int Airport",
				"municipality" => "Mérida",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "MLM",
				"airport_name" => "General Francisco J. Mujica International Airport",
				"municipality" => "Morelia",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "MTT",
				"airport_name" => "Minatitlán/Coatzacoalcos National Airport",
				"municipality" => "Minatitlán",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "MTY",
				"airport_name" => "General Mariano Escobedo International Airport",
				"municipality" => "Monterrey",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "MXL",
				"airport_name" => "General Rodolfo Sánchez Taboada International Airport",
				"municipality" => "Mexicali",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "MZT",
				"airport_name" => "General Rafael Buelna International Airport",
				"municipality" => "Mazatlán",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "NLD",
				"airport_name" => "Quetzalcóatl International Airport",
				"municipality" => "Nuevo Laredo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "NOG",
				"airport_name" => "Nogales International Airport",
				"municipality" => "Nogales",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "OAX",
				"airport_name" => "Xoxocotlán International Airport",
				"municipality" => "Oaxaca",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "PAZ",
				"airport_name" => "El Tajín National Airport",
				"municipality" => "Poza Rica",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "PBC",
				"airport_name" => "Hermanos Serdán International Airport",
				"municipality" => "Puebla",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "PDS",
				"airport_name" => "Piedras Negras International Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "PPE",
				"airport_name" => "Mar de Cortés International Airport",
				"municipality" => "Puerto Peñasco",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "PQM",
				"airport_name" => "Palenque International Airport",
				"municipality" => "Palenque",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "PVR",
				"airport_name" => "President Gustavo Díaz Ordaz International Airport",
				"municipality" => "Puerto Vallarta",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "PXM",
				"airport_name" => "Puerto Escondido International Airport",
				"municipality" => "Puerto Escondido",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "QRO",
				"airport_name" => "Querétaro Intercontinental Airport",
				"municipality" => "Querétaro",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "REX",
				"airport_name" => "General Lucio Blanco International Airport",
				"municipality" => "Reynosa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "SCX",
				"airport_name" => "Salina Cruz Naval Air Station",
				"municipality" => "Salina Cruz",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "SJD",
				"airport_name" => "Los Cabos International Airport",
				"municipality" => "San José del Cabo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "SLP",
				"airport_name" => "Ponciano Arriaga International Airport",
				"municipality" => "San Luis Potosí",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "SLW",
				"airport_name" => "Plan De Guadalupe International Airport",
				"municipality" => "Saltillo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "SRL",
				"airport_name" => "Palo Verde Airport",
				"municipality" => "Mulegé",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "TAM",
				"airport_name" => "General Francisco Javier Mina International Airport",
				"municipality" => "Tampico",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "TAP",
				"airport_name" => "Tapachula International Airport",
				"municipality" => "Tapachula",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "TGZ",
				"airport_name" => "Angel Albino Corzo International Airport",
				"municipality" => "Tuxtla Gutiérrez",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "TIJ",
				"airport_name" => "General Abelardo L. Rodríguez International Airport",
				"municipality" => "Tijuana",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "TLC",
				"airport_name" => "President Adolfo López Mateos International Airport",
				"municipality" => "Toluca",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "TPQ",
				"airport_name" => "Amado Nervo National Airport",
				"municipality" => "Tepic",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "TRC",
				"airport_name" => "Francisco Sarabia Tinoco International Airport",
				"municipality" => "Torreón",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "UPN",
				"airport_name" => "Uruapan - Licenciado y General Ignacio Lopez Rayon International Airport",
				"municipality" => "Uruapan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "VER",
				"airport_name" => "General Heriberto Jara International Airport",
				"municipality" => "Veracruz",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "VSA",
				"airport_name" => "Carlos Rovirosa Pérez International Airport",
				"municipality" => "Villahermosa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "ZCL",
				"airport_name" => "General Leobardo C. Ruiz International Airport",
				"municipality" => "Zacatecas",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "ZIH",
				"airport_name" => "Ixtapa Zihuatanejo International Airport",
				"municipality" => "Ixtapa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MX",
				"iata_code" => "ZLO",
				"airport_name" => "Playa De Oro International Airport",
				"municipality" => "Manzanillo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MY",
				"iata_code" => "AOR",
				"airport_name" => "Sultan Abdul Halim Airport",
				"municipality" => "Alor Satar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MY",
				"iata_code" => "BBN",
				"airport_name" => "Bario Airport",
				"municipality" => "Bario",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MY",
				"iata_code" => "BKI",
				"airport_name" => "Kota Kinabalu International Airport",
				"municipality" => "Kota Kinabalu",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MY",
				"iata_code" => "BKM",
				"airport_name" => "Bakalalan Airport",
				"municipality" => "Bakalalan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MY",
				"iata_code" => "BLG",
				"airport_name" => "Belaga Airport",
				"municipality" => "Belaga",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MY",
				"iata_code" => "BTU",
				"airport_name" => "Bintulu Airport",
				"municipality" => "Bintulu",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MY",
				"iata_code" => "IPH",
				"airport_name" => "Sultan Azlan Shah Airport",
				"municipality" => "Ipoh",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MY",
				"iata_code" => "JHB",
				"airport_name" => "Senai International Airport",
				"municipality" => "Johor Bahru",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MY",
				"iata_code" => "KBR",
				"airport_name" => "Sultan Ismail Petra Airport",
				"municipality" => "Kota Baharu",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MY",
				"iata_code" => "KCH",
				"airport_name" => "Kuching International Airport",
				"municipality" => "Kuching",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MY",
				"iata_code" => "KUA",
				"airport_name" => "Kuantan Airport",
				"municipality" => "Kuantan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MY",
				"iata_code" => "KUD",
				"airport_name" => "Kudat Airport",
				"municipality" => "Kudat",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MY",
				"iata_code" => "KUL",
				"airport_name" => "Kuala Lumpur International Airport",
				"municipality" => "Kuala Lumpur",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MY",
				"iata_code" => "LBP",
				"airport_name" => "Long Banga Airport",
				"municipality" => "Long Banga",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MY",
				"iata_code" => "LBU",
				"airport_name" => "Labuan Airport",
				"municipality" => "Labuan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MY",
				"iata_code" => "LDU",
				"airport_name" => "Lahad Datu Airport",
				"municipality" => "Lahad Datu",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MY",
				"iata_code" => "LGK",
				"airport_name" => "Langkawi International Airport",
				"municipality" => "Langkawi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MY",
				"iata_code" => "LGL",
				"airport_name" => "Long Lellang Airport",
				"municipality" => "Long Datih",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MY",
				"iata_code" => "LMN",
				"airport_name" => "Limbang Airport",
				"municipality" => "Limbang",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MY",
				"iata_code" => "LWY",
				"airport_name" => "Lawas Airport",
				"municipality" => "Lawas",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MY",
				"iata_code" => "MKM",
				"airport_name" => "Mukah Airport",
				"municipality" => "Mukah",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MY",
				"iata_code" => "MUR",
				"airport_name" => "Marudi Airport",
				"municipality" => "Marudi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MY",
				"iata_code" => "MYY",
				"airport_name" => "Miri Airport",
				"municipality" => "Miri",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MY",
				"iata_code" => "MZV",
				"airport_name" => "Mulu Airport",
				"municipality" => "Mulu",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MY",
				"iata_code" => "ODN",
				"airport_name" => "Long Seridan Airport",
				"municipality" => "Long Seridan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MY",
				"iata_code" => "PEN",
				"airport_name" => "Penang International Airport",
				"municipality" => "Penang",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MY",
				"iata_code" => "PKG",
				"airport_name" => "Pulau Pangkor Airport",
				"municipality" => "Pangkor Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MY",
				"iata_code" => "SBW",
				"airport_name" => "Sibu Airport",
				"municipality" => "Sibu",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MY",
				"iata_code" => "SDK",
				"airport_name" => "Sandakan Airport",
				"municipality" => "Sandakan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MY",
				"iata_code" => "SZB",
				"airport_name" => "Sultan Abdul Aziz Shah International Airport",
				"municipality" => "Subang",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MY",
				"iata_code" => "TGG",
				"airport_name" => "Sultan Mahmud Airport",
				"municipality" => "Kuala Terengganu",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MY",
				"iata_code" => "TMG",
				"airport_name" => "Tomanggong Airport",
				"municipality" => "Tomanggong",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MY",
				"iata_code" => "TOD",
				"airport_name" => "Pulau Tioman Airport",
				"municipality" => "Kampung Tekek",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MY",
				"iata_code" => "TWU",
				"airport_name" => "Tawau Airport",
				"municipality" => "Tawau",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MZ",
				"iata_code" => "APL",
				"airport_name" => "Nampula Airport",
				"municipality" => "Nampula",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MZ",
				"iata_code" => "BCW",
				"airport_name" => "Benguera Island Airport",
				"municipality" => "Benguera Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MZ",
				"iata_code" => "BEW",
				"airport_name" => "Beira Airport",
				"municipality" => "Beira",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MZ",
				"iata_code" => "INH",
				"airport_name" => "Inhambane Airport",
				"municipality" => "Inhambane",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MZ",
				"iata_code" => "MPM",
				"airport_name" => "Maputo Airport",
				"municipality" => "Maputo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MZ",
				"iata_code" => "POL",
				"airport_name" => "Pemba Airport",
				"municipality" => "Pemba / Porto Amelia",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MZ",
				"iata_code" => "TET",
				"airport_name" => "Chingozi Airport",
				"municipality" => "Tete",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MZ",
				"iata_code" => "UEL",
				"airport_name" => "Quelimane Airport",
				"municipality" => "Quelimane",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MZ",
				"iata_code" => "VNX",
				"airport_name" => "Vilankulo Airport",
				"municipality" => "Vilanculo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MZ",
				"iata_code" => "VPY",
				"airport_name" => "Chimoio Airport",
				"municipality" => "Chimoio",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "MZ",
				"iata_code" => "VXC",
				"airport_name" => "Lichinga Airport",
				"municipality" => "Lichinga",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NA",
				"iata_code" => "ERS",
				"airport_name" => "Eros Airport",
				"municipality" => "Windhoek",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NA",
				"iata_code" => "HAL",
				"airport_name" => "Halali Airport",
				"municipality" => "Halali",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NA",
				"iata_code" => "LUD",
				"airport_name" => "Luderitz Airport",
				"municipality" => "Luderitz",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NA",
				"iata_code" => "NDU",
				"airport_name" => "Rundu Airport",
				"municipality" => "Rundu",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NA",
				"iata_code" => "OMD",
				"airport_name" => "Oranjemund Airport",
				"municipality" => "Oranjemund",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NA",
				"iata_code" => "OND",
				"airport_name" => "Ondangwa Airport",
				"municipality" => "Ondangwa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NA",
				"iata_code" => "SWP",
				"airport_name" => "Swakopmund Municipal Aerodrome",
				"municipality" => "Swakopmund",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NA",
				"iata_code" => "WDH",
				"airport_name" => "Hosea Kutako International Airport",
				"municipality" => "Windhoek",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NA",
				"iata_code" => "WVB",
				"airport_name" => "Walvis Bay Airport",
				"municipality" => "Walvis Bay",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NC",
				"iata_code" => "BMY",
				"airport_name" => "Île Art - Waala Airport",
				"municipality" => "Waala",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NC",
				"iata_code" => "GEA",
				"airport_name" => "Nouméa Magenta Airport",
				"municipality" => "Nouméa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NC",
				"iata_code" => "ILP",
				"airport_name" => "Île des Pins Airport",
				"municipality" => "Île des Pins",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NC",
				"iata_code" => "KNQ",
				"airport_name" => "Koné Airport",
				"municipality" => "Koné",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NC",
				"iata_code" => "KOC",
				"airport_name" => "Koumac Airport",
				"municipality" => "Koumac",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NC",
				"iata_code" => "LIF",
				"airport_name" => "Lifou Airport",
				"municipality" => "Lifou",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NC",
				"iata_code" => "MEE",
				"airport_name" => "Maré Airport",
				"municipality" => "Maré",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NC",
				"iata_code" => "NOU",
				"airport_name" => "La Tontouta International Airport",
				"municipality" => "Nouméa (La Tontouta)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NC",
				"iata_code" => "TGJ",
				"airport_name" => "Tiga Airport",
				"municipality" => "Tiga",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NC",
				"iata_code" => "TOU",
				"airport_name" => "Touho Airport",
				"municipality" => "Touho",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NC",
				"iata_code" => "UVE",
				"airport_name" => "Ouvéa Airport",
				"municipality" => "Ouvéa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NE",
				"iata_code" => "AJY",
				"airport_name" => "Mano Dayak International Airport",
				"municipality" => "Agadez",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NE",
				"iata_code" => "NIM",
				"airport_name" => "Diori Hamani International Airport",
				"municipality" => "Niamey",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NE",
				"iata_code" => "ZND",
				"airport_name" => "Zinder Airport",
				"municipality" => "Zinder",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NF",
				"iata_code" => "NLK",
				"airport_name" => "Norfolk Island International Airport",
				"municipality" => "Burnt Pine",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NG",
				"iata_code" => "ABV",
				"airport_name" => "Nnamdi Azikiwe International Airport",
				"municipality" => "Abuja",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NG",
				"iata_code" => "AKR",
				"airport_name" => "Akure Airport",
				"municipality" => "Akure",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NG",
				"iata_code" => "BCU",
				"airport_name" => "Sir Abubakar Tafawa Balewa International Airport",
				"municipality" => "Bauchi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NG",
				"iata_code" => "BNI",
				"airport_name" => "Benin Airport",
				"municipality" => "Benin",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NG",
				"iata_code" => "CBQ",
				"airport_name" => "Margaret Ekpo International Airport",
				"municipality" => "Calabar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NG",
				"iata_code" => "ENU",
				"airport_name" => "Akanu Ibiam International Airport",
				"municipality" => "Enegu",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NG",
				"iata_code" => "GMO",
				"airport_name" => "Gombe Lawanti International Airport",
				"municipality" => "Gombe",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NG",
				"iata_code" => "IBA",
				"airport_name" => "Ibadan Airport",
				"municipality" => "Ibadan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NG",
				"iata_code" => "ILR",
				"airport_name" => "Ilorin International Airport",
				"municipality" => "Ilorin",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NG",
				"iata_code" => "JOS",
				"airport_name" => "Yakubu Gowon Airport",
				"municipality" => "Jos",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NG",
				"iata_code" => "KAD",
				"airport_name" => "Kaduna Airport",
				"municipality" => "Kaduna",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NG",
				"iata_code" => "KAN",
				"airport_name" => "Mallam Aminu International Airport",
				"municipality" => "Kano",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NG",
				"iata_code" => "LOS",
				"airport_name" => "Murtala Muhammed International Airport",
				"municipality" => "Lagos",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NG",
				"iata_code" => "MDI",
				"airport_name" => "Makurdi Airport",
				"municipality" => "Makurdi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NG",
				"iata_code" => "MIU",
				"airport_name" => "Maiduguri International Airport",
				"municipality" => "Maiduguri",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NG",
				"iata_code" => "PHC",
				"airport_name" => "Port Harcourt International Airport",
				"municipality" => "Port Harcourt",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NG",
				"iata_code" => "PHG",
				"airport_name" => "Port Harcourt City Airport / Port Harcourt Air Force Base",
				"municipality" => "Port Harcourt",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NG",
				"iata_code" => "QOW",
				"airport_name" => "Sam Mbakwe International Airport",
				"municipality" => "Owerri",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NG",
				"iata_code" => "QRW",
				"airport_name" => "Warri Airport",
				"municipality" => "Warri",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NG",
				"iata_code" => "QUO",
				"airport_name" => "Akwa Ibom International Airport",
				"municipality" => "Uyo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NG",
				"iata_code" => "SKO",
				"airport_name" => "Sadiq Abubakar III International Airport",
				"municipality" => "Sokoto",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NG",
				"iata_code" => "YOL",
				"airport_name" => "Yola Airport",
				"municipality" => "Yola",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NI",
				"iata_code" => "BEF",
				"airport_name" => "Bluefields Airport",
				"municipality" => "Bluefileds",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NI",
				"iata_code" => "ECI",
				"airport_name" => "Costa Esmeralda Airport",
				"municipality" => "Tola",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NI",
				"iata_code" => "MGA",
				"airport_name" => "Augusto C. Sandino (Managua) International Airport",
				"municipality" => "Managua",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NI",
				"iata_code" => "PUZ",
				"airport_name" => "Puerto Cabezas Airport",
				"municipality" => "Puerto Cabezas",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NL",
				"iata_code" => "AMS",
				"airport_name" => "Amsterdam Airport Schiphol",
				"municipality" => "Amsterdam",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NL",
				"iata_code" => "EIN",
				"airport_name" => "Eindhoven Airport",
				"municipality" => "Eindhoven",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NL",
				"iata_code" => "GRQ",
				"airport_name" => "Eelde Airport",
				"municipality" => "Groningen",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NL",
				"iata_code" => "LEY",
				"airport_name" => "Lelystad Airport",
				"municipality" => "Lelystad",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NL",
				"iata_code" => "MST",
				"airport_name" => "Maastricht Aachen Airport",
				"municipality" => "Maastricht",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NL",
				"iata_code" => "RTM",
				"airport_name" => "Rotterdam The Hague Airport",
				"municipality" => "Rotterdam",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NO",
				"iata_code" => "AES",
				"airport_name" => "Ålesund Airport, Vigra",
				"municipality" => "Ålesund",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NO",
				"iata_code" => "ALF",
				"airport_name" => "Alta Airport",
				"municipality" => "Alta",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NO",
				"iata_code" => "ANX",
				"airport_name" => "Andøya Airport, Andenes",
				"municipality" => "Andenes",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NO",
				"iata_code" => "BDU",
				"airport_name" => "Bardufoss Airport",
				"municipality" => "Målselv",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NO",
				"iata_code" => "BGO",
				"airport_name" => "Bergen Airport, Flesland",
				"municipality" => "Bergen",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NO",
				"iata_code" => "BJF",
				"airport_name" => "Båtsfjord Airport",
				"municipality" => "Båtsfjord",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NO",
				"iata_code" => "BNN",
				"airport_name" => "Brønnøysund Airport, Brønnøy",
				"municipality" => "Brønnøy",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NO",
				"iata_code" => "BOO",
				"airport_name" => "Bodø Airport",
				"municipality" => "Bodø",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NO",
				"iata_code" => "BVG",
				"airport_name" => "Berlevåg Airport",
				"municipality" => "Berlevåg",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NO",
				"iata_code" => "EVE",
				"airport_name" => "Harstad/Narvik Airport, Evenes",
				"municipality" => "Evenes",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NO",
				"iata_code" => "FDE",
				"airport_name" => "Førde Airport, Bringeland",
				"municipality" => "Førde",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NO",
				"iata_code" => "FRO",
				"airport_name" => "Florø Airport",
				"municipality" => "Florø",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NO",
				"iata_code" => "HAA",
				"airport_name" => "Hasvik Airport",
				"municipality" => "Hasvik",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NO",
				"iata_code" => "HAU",
				"airport_name" => "Haugesund Airport, Karmøy",
				"municipality" => "Karmøy",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NO",
				"iata_code" => "HFT",
				"airport_name" => "Hammerfest Airport",
				"municipality" => "Hammerfest",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NO",
				"iata_code" => "HOV",
				"airport_name" => "Ørsta-Volda Airport, Hovden",
				"municipality" => "Ørsta",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NO",
				"iata_code" => "HVG",
				"airport_name" => "Honningsvåg Airport, Valan",
				"municipality" => "Honningsvåg",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NO",
				"iata_code" => "KKN",
				"airport_name" => "Kirkenes Airport, Høybuktmoen",
				"municipality" => "Kirkenes",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NO",
				"iata_code" => "KRS",
				"airport_name" => "Kristiansand Airport, Kjevik",
				"municipality" => "Kjevik",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NO",
				"iata_code" => "KSU",
				"airport_name" => "Kristiansund Airport, Kvernberget",
				"municipality" => "Kvernberget",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NO",
				"iata_code" => "LKL",
				"airport_name" => "Lakselv Airport, Banak",
				"municipality" => "Lakselv",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NO",
				"iata_code" => "LKN",
				"airport_name" => "Leknes Airport",
				"municipality" => "Leknes",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NO",
				"iata_code" => "LYR",
				"airport_name" => "Svalbard Airport, Longyear",
				"municipality" => "Longyearbyen",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NO",
				"iata_code" => "MEH",
				"airport_name" => "Mehamn Airport",
				"municipality" => "Mehamn",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NO",
				"iata_code" => "MJF",
				"airport_name" => "Mosjøen Airport, Kjærstad",
				"municipality" => "Mosjøen",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NO",
				"iata_code" => "MOL",
				"airport_name" => "Molde Airport, Årø",
				"municipality" => "Årø",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NO",
				"iata_code" => "MQN",
				"airport_name" => "Mo i Rana Airport, Røssvoll",
				"municipality" => "Mo i Rana",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NO",
				"iata_code" => "NTB",
				"airport_name" => "Notodden Airport",
				"municipality" => "Notodden",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NO",
				"iata_code" => "OLA",
				"airport_name" => "Ørland Airport",
				"municipality" => "Ørland",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NO",
				"iata_code" => "OSL",
				"airport_name" => "Oslo Airport, Gardermoen",
				"municipality" => "Oslo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NO",
				"iata_code" => "OSY",
				"airport_name" => "Namsos Airport",
				"municipality" => "Namsos",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NO",
				"iata_code" => "RET",
				"airport_name" => "Røst Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NO",
				"iata_code" => "RRS",
				"airport_name" => "Røros Airport",
				"municipality" => "Røros",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NO",
				"iata_code" => "RVK",
				"airport_name" => "Rørvik Airport, Ryum",
				"municipality" => "Rørvik",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NO",
				"iata_code" => "SDN",
				"airport_name" => "Sandane Airport, Anda",
				"municipality" => "Sandane",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NO",
				"iata_code" => "SKN",
				"airport_name" => "Stokmarknes Airport, Skagen",
				"municipality" => "Hadsel",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NO",
				"iata_code" => "SOG",
				"airport_name" => "Sogndal Airport, Haukåsen",
				"municipality" => "Sogndal",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NO",
				"iata_code" => "SOJ",
				"airport_name" => "Sørkjosen Airport",
				"municipality" => "Sørkjosen",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NO",
				"iata_code" => "SRP",
				"airport_name" => "Stord Airport, Sørstokken",
				"municipality" => "Leirvik",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NO",
				"iata_code" => "SSJ",
				"airport_name" => "Sandnessjøen Airport, Stokka",
				"municipality" => "Alstahaug",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NO",
				"iata_code" => "SVG",
				"airport_name" => "Stavanger Airport, Sola",
				"municipality" => "Stavanger",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NO",
				"iata_code" => "SVJ",
				"airport_name" => "Svolvær Airport, Helle",
				"municipality" => "Svolvær",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NO",
				"iata_code" => "TOS",
				"airport_name" => "Tromsø Airport, Langnes",
				"municipality" => "Tromsø",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NO",
				"iata_code" => "TRD",
				"airport_name" => "Trondheim Airport, Værnes",
				"municipality" => "Trondheim",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NO",
				"iata_code" => "TRF",
				"airport_name" => "Sandefjord Airport, Torp",
				"municipality" => "Torp",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NO",
				"iata_code" => "VAW",
				"airport_name" => "Vardø Airport, Svartnes",
				"municipality" => "Vardø",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NO",
				"iata_code" => "VDS",
				"airport_name" => "Vadsø Airport",
				"municipality" => "Vadsø",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NP",
				"iata_code" => "BDP",
				"airport_name" => "Bhadrapur Airport",
				"municipality" => "Bhadrapur",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NP",
				"iata_code" => "BHR",
				"airport_name" => "Bharatpur Airport",
				"municipality" => "Bharatpur",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NP",
				"iata_code" => "BIR",
				"airport_name" => "Biratnagar Airport",
				"municipality" => "Biratnagar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NP",
				"iata_code" => "BWA",
				"airport_name" => "Gautam Buddha International Airport",
				"municipality" => "Siddharthanagar (Bhairahawa)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NP",
				"iata_code" => "DOP",
				"airport_name" => "Dolpa Airport",
				"municipality" => "Dolpa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NP",
				"iata_code" => "IMK",
				"airport_name" => "Simikot Airport",
				"municipality" => "Simikot",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NP",
				"iata_code" => "JKR",
				"airport_name" => "Janakpur Airport",
				"municipality" => "Janakpur",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NP",
				"iata_code" => "JMO",
				"airport_name" => "Jomsom Airport",
				"municipality" => "Jomsom",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NP",
				"iata_code" => "JUM",
				"airport_name" => "Jumla Airport",
				"municipality" => "Jumla",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NP",
				"iata_code" => "KEP",
				"airport_name" => "Nepalgunj Airport",
				"municipality" => "Nepalgunj",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NP",
				"iata_code" => "KTM",
				"airport_name" => "Tribhuvan International Airport",
				"municipality" => "Kathmandu",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NP",
				"iata_code" => "LUA",
				"airport_name" => "Lukla Airport",
				"municipality" => "Lukla",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NP",
				"iata_code" => "MEY",
				"airport_name" => "Meghauli Airport",
				"municipality" => "Meghauli",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NP",
				"iata_code" => "PKR",
				"airport_name" => "Pokhara Airport",
				"municipality" => "Pokhara",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NP",
				"iata_code" => "PPL",
				"airport_name" => "Phaplu Airport",
				"municipality" => "Phaplu",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NP",
				"iata_code" => "RUK",
				"airport_name" => "Rukum Chaurjahari Airport",
				"municipality" => "Rukumkot",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NP",
				"iata_code" => "RUM",
				"airport_name" => "Rumjatar Airport",
				"municipality" => "Rumjatar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NP",
				"iata_code" => "SIF",
				"airport_name" => "Simara Airport",
				"municipality" => "Simara",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NP",
				"iata_code" => "SKH",
				"airport_name" => "Surkhet Airport",
				"municipality" => "Surkhet",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NP",
				"iata_code" => "TMI",
				"airport_name" => "Tumling Tar Airport",
				"municipality" => "Tumling Tar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NP",
				"iata_code" => "TPJ",
				"airport_name" => "Taplejung Airport",
				"municipality" => "Taplejung",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NR",
				"iata_code" => "INU",
				"airport_name" => "Nauru International Airport",
				"municipality" => "Yaren District",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NU",
				"iata_code" => "IUE",
				"airport_name" => "Niue International Airport",
				"municipality" => "Alofi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NZ",
				"iata_code" => "AKL",
				"airport_name" => "Auckland International Airport",
				"municipality" => "Auckland",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NZ",
				"iata_code" => "BHE",
				"airport_name" => "Woodbourne Airport",
				"municipality" => "Blenheim",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NZ",
				"iata_code" => "CHC",
				"airport_name" => "Christchurch International Airport",
				"municipality" => "Christchurch",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NZ",
				"iata_code" => "CHT",
				"airport_name" => "Chatham Islands / Tuuta Airport",
				"municipality" => "Te One",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NZ",
				"iata_code" => "DUD",
				"airport_name" => "Dunedin International Airport",
				"municipality" => "Dunedin",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NZ",
				"iata_code" => "GIS",
				"airport_name" => "Gisborne Airport",
				"municipality" => "Gisborne",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NZ",
				"iata_code" => "HKK",
				"airport_name" => "Hokitika Airfield",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NZ",
				"iata_code" => "HLZ",
				"airport_name" => "Hamilton International Airport",
				"municipality" => "Hamilton",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NZ",
				"iata_code" => "IVC",
				"airport_name" => "Invercargill Airport",
				"municipality" => "Invercargill",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NZ",
				"iata_code" => "KAT",
				"airport_name" => "Kaitaia Airport",
				"municipality" => "Kaitaia",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NZ",
				"iata_code" => "KKE",
				"airport_name" => "Kerikeri Airport",
				"municipality" => "Kerikeri",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NZ",
				"iata_code" => "NPE",
				"airport_name" => "Hawke's Bay Airport",
				"municipality" => "Napier",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NZ",
				"iata_code" => "NPL",
				"airport_name" => "New Plymouth Airport",
				"municipality" => "New Plymouth",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NZ",
				"iata_code" => "NSN",
				"airport_name" => "Nelson Airport",
				"municipality" => "Nelson",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NZ",
				"iata_code" => "OAM",
				"airport_name" => "Oamaru Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NZ",
				"iata_code" => "PCN",
				"airport_name" => "Picton Aerodrome",
				"municipality" => "Koromiko",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NZ",
				"iata_code" => "PMR",
				"airport_name" => "Palmerston North Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NZ",
				"iata_code" => "ROT",
				"airport_name" => "Rotorua Regional Airport",
				"municipality" => "Rotorua",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NZ",
				"iata_code" => "TIU",
				"airport_name" => "Timaru Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NZ",
				"iata_code" => "TRG",
				"airport_name" => "Tauranga Airport",
				"municipality" => "Tauranga",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NZ",
				"iata_code" => "TUO",
				"airport_name" => "Taupo Airport",
				"municipality" => "Taupo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NZ",
				"iata_code" => "WAG",
				"airport_name" => "Wanganui Airport",
				"municipality" => "Wanganui",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NZ",
				"iata_code" => "WHK",
				"airport_name" => "Whakatane Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NZ",
				"iata_code" => "WKA",
				"airport_name" => "Wanaka Airport",
				"municipality" => "Wanaka",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NZ",
				"iata_code" => "WLG",
				"airport_name" => "Wellington International Airport",
				"municipality" => "Wellington",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NZ",
				"iata_code" => "WRE",
				"airport_name" => "Whangarei Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NZ",
				"iata_code" => "WSZ",
				"airport_name" => "Westport Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "NZ",
				"iata_code" => "ZQN",
				"airport_name" => "Queenstown International Airport",
				"municipality" => "Queenstown",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "OM",
				"iata_code" => "DQM",
				"airport_name" => "Duqm International Airport",
				"municipality" => "Duqm",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "OM",
				"iata_code" => "KHS",
				"airport_name" => "Khasab Airport",
				"municipality" => "Khasab",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "OM",
				"iata_code" => "MCT",
				"airport_name" => "Muscat International Airport",
				"municipality" => "Muscat",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "OM",
				"iata_code" => "OHS",
				"airport_name" => "Sohar Airport",
				"municipality" => "Sohar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "OM",
				"iata_code" => "SLL",
				"airport_name" => "Salalah Airport",
				"municipality" => "Salalah",
				"created_at" => $now,
				"updated_at" => $now
			],
		];

		$data4 = [
			[
				"country" => "PA",
				"iata_code" => "BFQ",
				"airport_name" => "Bahia Piña Airport",
				"municipality" => "Bahia Piña",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PA",
				"iata_code" => "BLB",
				"airport_name" => "Panamá Pacífico International Airport",
				"municipality" => "Panamá City",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PA",
				"iata_code" => "BOC",
				"airport_name" => "Bocas del Toro International Airport",
				"municipality" => "Isla Colón",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PA",
				"iata_code" => "CHX",
				"airport_name" => "Cap Manuel Niño International Airport",
				"municipality" => "Changuinola",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PA",
				"iata_code" => "CTD",
				"airport_name" => "Alonso Valderrama Airport",
				"municipality" => "Chitré",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PA",
				"iata_code" => "CZJ",
				"airport_name" => "Corazón de Jesús Airport",
				"municipality" => "Corazón de Jesús and Narganá Islands",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PA",
				"iata_code" => "DAV",
				"airport_name" => "Enrique Malek International Airport",
				"municipality" => "David",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PA",
				"iata_code" => "ELE",
				"airport_name" => "EL Real Airport",
				"municipality" => "El Real de Santa María",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PA",
				"iata_code" => "JQE",
				"airport_name" => "Jaqué Airport",
				"municipality" => "Jaqué",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PA",
				"iata_code" => "MPP",
				"airport_name" => "Mulatupo Airport",
				"municipality" => "Mulatupo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PA",
				"iata_code" => "OGM",
				"airport_name" => "Ogubsucum Airport",
				"municipality" => "Ustupo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PA",
				"iata_code" => "ONX",
				"airport_name" => "Enrique Adolfo Jimenez Airport",
				"municipality" => "Colón",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PA",
				"iata_code" => "OTD",
				"airport_name" => "Raul Arias Espinoza Airport",
				"municipality" => "Contadora Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PA",
				"iata_code" => "PAC",
				"airport_name" => "Marcos A. Gelabert International Airport",
				"municipality" => "Albrook",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PA",
				"iata_code" => "PDM",
				"airport_name" => "Capt. J. Montenegro Airport",
				"municipality" => "Pedasí",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PA",
				"iata_code" => "PTY",
				"airport_name" => "Tocumen International Airport",
				"municipality" => "Tocumen",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PA",
				"iata_code" => "PYC",
				"airport_name" => "Playón Chico Airport",
				"municipality" => "Playón Chico",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PA",
				"iata_code" => "RIH",
				"airport_name" => "Scarlett Martinez International Airport",
				"municipality" => "Río Hato",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PA",
				"iata_code" => "SAX",
				"airport_name" => "Sambú Airport",
				"municipality" => "Boca de Sábalo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PE",
				"iata_code" => "ANS",
				"airport_name" => "Andahuaylas Airport",
				"municipality" => "Andahuaylas",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PE",
				"iata_code" => "AQP",
				"airport_name" => "Rodríguez Ballón International Airport",
				"municipality" => "Arequipa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PE",
				"iata_code" => "AYP",
				"airport_name" => "Coronel FAP Alfredo Mendivil Duarte Airport",
				"municipality" => "Ayacucho",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PE",
				"iata_code" => "CHM",
				"airport_name" => "FAP Lieutenant Jaime Andres de Montreuil Morales Airport",
				"municipality" => "Chimbote",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PE",
				"iata_code" => "CIX",
				"airport_name" => "Capitan FAP Jose A Quinones Gonzales International Airport",
				"municipality" => "Chiclayo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PE",
				"iata_code" => "CJA",
				"airport_name" => "Mayor General FAP Armando Revoredo Iglesias Airport",
				"municipality" => "Cajamarca",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PE",
				"iata_code" => "CUZ",
				"airport_name" => "Alejandro Velasco Astete International Airport",
				"municipality" => "Cusco",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PE",
				"iata_code" => "HUU",
				"airport_name" => "Alferez Fap David Figueroa Fernandini Airport",
				"municipality" => "Huánuco",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PE",
				"iata_code" => "IQT",
				"airport_name" => "Coronel FAP Francisco Secada Vignetta International Airport",
				"municipality" => "Iquitos",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PE",
				"iata_code" => "JAE",
				"airport_name" => "Shumba Airport",
				"municipality" => "Jaén",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PE",
				"iata_code" => "JAU",
				"airport_name" => "Francisco Carle Airport",
				"municipality" => "Jauja",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PE",
				"iata_code" => "JUL",
				"airport_name" => "Inca Manco Capac International Airport",
				"municipality" => "Juliaca",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PE",
				"iata_code" => "LIM",
				"airport_name" => "Jorge Chávez International Airport",
				"municipality" => "Lima",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PE",
				"iata_code" => "NZC",
				"airport_name" => "Maria Reiche Neuman Airport",
				"municipality" => "Nazca",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PE",
				"iata_code" => "PCL",
				"airport_name" => "Cap FAP David Abenzur Rengifo International Airport",
				"municipality" => "Pucallpa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PE",
				"iata_code" => "PEM",
				"airport_name" => "Padre Aldamiz International Airport",
				"municipality" => "Puerto Maldonado",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PE",
				"iata_code" => "PIU",
				"airport_name" => "Capitán FAP Guillermo Concha Iberico International Airport",
				"municipality" => "Piura",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PE",
				"iata_code" => "TBP",
				"airport_name" => "Captain Pedro Canga Rodriguez International Airport",
				"municipality" => "Tumbes",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PE",
				"iata_code" => "TCQ",
				"airport_name" => "Coronel FAP Carlos Ciriani Santa Rosa International Airport",
				"municipality" => "Tacna",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PE",
				"iata_code" => "TPP",
				"airport_name" => "Cadete FAP Guillermo Del Castillo Paredes Airport",
				"municipality" => "Tarapoto",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PE",
				"iata_code" => "TRU",
				"airport_name" => "Capitan FAP Carlos Martinez De Pinillos International Airport",
				"municipality" => "Trujillo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PE",
				"iata_code" => "TYL",
				"airport_name" => "Captain Victor Montes Arias International Airport",
				"municipality" => "Talara",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PE",
				"iata_code" => "YMS",
				"airport_name" => "Moises Benzaquen Rengifo Airport",
				"municipality" => "Yurimaguas",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PF",
				"iata_code" => "AAA",
				"airport_name" => "Anaa Airport",
				"municipality" => "Anaa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PF",
				"iata_code" => "AHE",
				"airport_name" => "Ahe Airport",
				"municipality" => "Ahe Atoll",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PF",
				"iata_code" => "APK",
				"airport_name" => "Apataki Airport",
				"municipality" => "Apataki",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PF",
				"iata_code" => "AUQ",
				"airport_name" => "Hiva Oa-Atuona Airport",
				"municipality" => "Hiva Oa Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PF",
				"iata_code" => "AXR",
				"airport_name" => "Arutua Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PF",
				"iata_code" => "BOB",
				"airport_name" => "Bora Bora Airport",
				"municipality" => "Motu Mute",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PF",
				"iata_code" => "FAV",
				"airport_name" => "Fakarava Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PF",
				"iata_code" => "GMR",
				"airport_name" => "Totegegie Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PF",
				"iata_code" => "HOI",
				"airport_name" => "Hao Airport",
				"municipality" => "Otepa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PF",
				"iata_code" => "HUH",
				"airport_name" => "Huahine-Fare Airport",
				"municipality" => "Fare",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PF",
				"iata_code" => "KKR",
				"airport_name" => "Kaukura Airport",
				"municipality" => "Raitahiti",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PF",
				"iata_code" => "MAU",
				"airport_name" => "Maupiti Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PF",
				"iata_code" => "MKP",
				"airport_name" => "Makemo Airport",
				"municipality" => "Makemo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PF",
				"iata_code" => "MOZ",
				"airport_name" => "Moorea Temae Airport",
				"municipality" => "Moorea-Maiao",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PF",
				"iata_code" => "MVT",
				"airport_name" => "Mataiva Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PF",
				"iata_code" => "NHV",
				"airport_name" => "Nuku Hiva Airport",
				"municipality" => "Nuku Hiva",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PF",
				"iata_code" => "PPT",
				"airport_name" => "Faa'a International Airport",
				"municipality" => "Papeete",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PF",
				"iata_code" => "RFP",
				"airport_name" => "Raiatea Airport",
				"municipality" => "Uturoa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PF",
				"iata_code" => "RGI",
				"airport_name" => "Rangiroa Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PF",
				"iata_code" => "RMT",
				"airport_name" => "Rimatara Airport",
				"municipality" => "Rimatara Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PF",
				"iata_code" => "RUR",
				"airport_name" => "Rurutu Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PF",
				"iata_code" => "TIH",
				"airport_name" => "Tikehau Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PF",
				"iata_code" => "TKP",
				"airport_name" => "Takapoto Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PF",
				"iata_code" => "TKX",
				"airport_name" => "Takaroa Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PF",
				"iata_code" => "TUB",
				"airport_name" => "Tubuai Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PF",
				"iata_code" => "UAH",
				"airport_name" => "Ua Huka Airport",
				"municipality" => "Ua Huka",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PF",
				"iata_code" => "UAP",
				"airport_name" => "Ua Pou Airport",
				"municipality" => "Ua Pou",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PF",
				"iata_code" => "XMH",
				"airport_name" => "Manihi Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PG",
				"iata_code" => "ATP",
				"airport_name" => "Aitape Airport",
				"municipality" => "Aitape",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PG",
				"iata_code" => "AWB",
				"airport_name" => "Awaba Airport",
				"municipality" => "Awaba",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PG",
				"iata_code" => "BOT",
				"airport_name" => "Bosset Airport",
				"municipality" => "Bosset",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PG",
				"iata_code" => "BUA",
				"airport_name" => "Buka Airport",
				"municipality" => "Buka Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PG",
				"iata_code" => "CMU",
				"airport_name" => "Chimbu Airport",
				"municipality" => "Kundiawa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PG",
				"iata_code" => "DAU",
				"airport_name" => "Daru Airport",
				"municipality" => "Daru",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PG",
				"iata_code" => "GKA",
				"airport_name" => "Goroka Airport",
				"municipality" => "Goronka",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PG",
				"iata_code" => "GMI",
				"airport_name" => "Gasmata Island Airport",
				"municipality" => "Gasmata Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PG",
				"iata_code" => "GUR",
				"airport_name" => "Gurney Airport",
				"municipality" => "Gurney",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PG",
				"iata_code" => "HGU",
				"airport_name" => "Mount Hagen Kagamuga Airport",
				"municipality" => "Mount Hagen",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PG",
				"iata_code" => "HKN",
				"airport_name" => "Hoskins Airport",
				"municipality" => "Kimbe",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PG",
				"iata_code" => "IHU",
				"airport_name" => "Ihu Airport",
				"municipality" => "Ihu",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PG",
				"iata_code" => "JAQ",
				"airport_name" => "Jacquinot Bay Airport",
				"municipality" => "Jacquinot Bay",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PG",
				"iata_code" => "KDR",
				"airport_name" => "Kandrian Airport",
				"municipality" => "Kandrian",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PG",
				"iata_code" => "KIE",
				"airport_name" => "Aropa Airport",
				"municipality" => "Kieta",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PG",
				"iata_code" => "KKD",
				"airport_name" => "Kokoda Airport",
				"municipality" => "Kokoda",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PG",
				"iata_code" => "KMA",
				"airport_name" => "Kerema Airport",
				"municipality" => "Kerema",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PG",
				"iata_code" => "KRI",
				"airport_name" => "Kikori Airport",
				"municipality" => "Kikori",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PG",
				"iata_code" => "KSX",
				"airport_name" => "Yasuru Airport",
				"municipality" => "Yasuru",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PG",
				"iata_code" => "KUY",
				"airport_name" => "Kamusi Airport",
				"municipality" => "Kamusi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PG",
				"iata_code" => "KVG",
				"airport_name" => "Kavieng Airport",
				"municipality" => "Kavieng",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PG",
				"iata_code" => "LAE",
				"airport_name" => "Nadzab Airport",
				"municipality" => "Lae",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PG",
				"iata_code" => "LMY",
				"airport_name" => "Lake Murray Airport",
				"municipality" => "Lake Murray",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PG",
				"iata_code" => "LNV",
				"airport_name" => "Londolovit Airport",
				"municipality" => "Londolovit",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PG",
				"iata_code" => "LSA",
				"airport_name" => "Losuia Airport",
				"municipality" => "Losuia",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PG",
				"iata_code" => "MAG",
				"airport_name" => "Madang Airport",
				"municipality" => "Madang",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PG",
				"iata_code" => "MAS",
				"airport_name" => "Momote Airport",
				"municipality" => "Manus Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PG",
				"iata_code" => "MDU",
				"airport_name" => "Mendi Airport",
				"municipality" => "Mendi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PG",
				"iata_code" => "MIS",
				"airport_name" => "Misima Island Airport",
				"municipality" => "Misima Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PG",
				"iata_code" => "MXH",
				"airport_name" => "Moro Airport",
				"municipality" => "Moro",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PG",
				"iata_code" => "OBX",
				"airport_name" => "Obo Airport",
				"municipality" => "Obo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PG",
				"iata_code" => "OPU",
				"airport_name" => "Balimo Airport",
				"municipality" => "Balimo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PG",
				"iata_code" => "PNP",
				"airport_name" => "Girua Airport",
				"municipality" => "Popondetta",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PG",
				"iata_code" => "POM",
				"airport_name" => "Port Moresby Jacksons International Airport",
				"municipality" => "Port Moresby",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PG",
				"iata_code" => "RAB",
				"airport_name" => "Tokua Airport",
				"municipality" => "Kokopo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PG",
				"iata_code" => "SKC",
				"airport_name" => "Suki Airport",
				"municipality" => "Suki",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PG",
				"iata_code" => "TAJ",
				"airport_name" => "Tadji Airport",
				"municipality" => "Aitape",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PG",
				"iata_code" => "TBG",
				"airport_name" => "Tabubil Airport",
				"municipality" => "Tabubil",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PG",
				"iata_code" => "TDS",
				"airport_name" => "Sasereme Airport",
				"municipality" => "Sasereme",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PG",
				"iata_code" => "TFI",
				"airport_name" => "Tufi Airport",
				"municipality" => "Tufi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PG",
				"iata_code" => "TIZ",
				"airport_name" => "Tari Airport",
				"municipality" => "Tari",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PG",
				"iata_code" => "TPI",
				"airport_name" => "Tapini Airport",
				"municipality" => "Tapini",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PG",
				"iata_code" => "UKU",
				"airport_name" => "Nuku Airport",
				"municipality" => "Nuku",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PG",
				"iata_code" => "UNG",
				"airport_name" => "Kiunga Airport",
				"municipality" => "Kiunga",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PG",
				"iata_code" => "VAI",
				"airport_name" => "Vanimo Airport",
				"municipality" => "Vanimo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PG",
				"iata_code" => "VMU",
				"airport_name" => "Baimuru Airport",
				"municipality" => "Baimuru",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PG",
				"iata_code" => "WBM",
				"airport_name" => "Wapenamanda Airport",
				"municipality" => "Wapenamanda",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PG",
				"iata_code" => "WPM",
				"airport_name" => "Wipim Airport",
				"municipality" => "Wipim",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PG",
				"iata_code" => "WTP",
				"airport_name" => "Woitape Airport",
				"municipality" => "Fatima Mission",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PG",
				"iata_code" => "WWK",
				"airport_name" => "Wewak International Airport",
				"municipality" => "Wewak",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PH",
				"iata_code" => "BAG",
				"airport_name" => "Loakan Airport",
				"municipality" => "Baguio City",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PH",
				"iata_code" => "BCD",
				"airport_name" => "Bacolod-Silay Airport",
				"municipality" => "Bacolod City",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PH",
				"iata_code" => "BQA",
				"airport_name" => "Dr Juan C Angara Airport",
				"municipality" => "Baler",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PH",
				"iata_code" => "BSO",
				"airport_name" => "Basco Airport",
				"municipality" => "Basco",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PH",
				"iata_code" => "BXU",
				"airport_name" => "Bancasi Airport",
				"municipality" => "Butuan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PH",
				"iata_code" => "CBO",
				"airport_name" => "Awang Airport",
				"municipality" => "Cotabato City",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PH",
				"iata_code" => "CEB",
				"airport_name" => "Mactan Cebu International Airport",
				"municipality" => "Lapu-Lapu City",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PH",
				"iata_code" => "CGM",
				"airport_name" => "Camiguin Airport",
				"municipality" => "Mambajao",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PH",
				"iata_code" => "CGY",
				"airport_name" => "Laguindingan Airport",
				"municipality" => "Cagayan de Oro",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PH",
				"iata_code" => "CRK",
				"airport_name" => "Diosdado Macapagal International Airport",
				"municipality" => "Mabalacat",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PH",
				"iata_code" => "CRM",
				"airport_name" => "Catarman National Airport",
				"municipality" => "Catarman",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PH",
				"iata_code" => "CYP",
				"airport_name" => "Calbayog Airport",
				"municipality" => "Calbayog City",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PH",
				"iata_code" => "CYU",
				"airport_name" => "Cuyo Airport",
				"municipality" => "Cuyo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PH",
				"iata_code" => "CYZ",
				"airport_name" => "Cauayan Airport",
				"municipality" => "Cauayan City",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PH",
				"iata_code" => "DGT",
				"airport_name" => "Sibulan Airport",
				"municipality" => "Dumaguete City",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PH",
				"iata_code" => "DPL",
				"airport_name" => "Dipolog Airport",
				"municipality" => "Dipolog City",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PH",
				"iata_code" => "DVO",
				"airport_name" => "Francisco Bangoy International Airport",
				"municipality" => "Davao",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PH",
				"iata_code" => "ENI",
				"airport_name" => "El Nido Airport",
				"municipality" => "El Nido",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PH",
				"iata_code" => "GES",
				"airport_name" => "General Santos International Airport",
				"municipality" => "General Santos",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PH",
				"iata_code" => "IAO",
				"airport_name" => "Siargao Airport",
				"municipality" => "Del Carmen",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PH",
				"iata_code" => "ILO",
				"airport_name" => "Iloilo International Airport",
				"municipality" => "Iloilo (Cabatuan)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PH",
				"iata_code" => "JOL",
				"airport_name" => "Jolo Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PH",
				"iata_code" => "KLO",
				"airport_name" => "Kalibo International Airport",
				"municipality" => "Kalibo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PH",
				"iata_code" => "LAO",
				"airport_name" => "Laoag International Airport",
				"municipality" => "Laoag City",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PH",
				"iata_code" => "LGP",
				"airport_name" => "Legazpi City International Airport",
				"municipality" => "Legazpi City",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PH",
				"iata_code" => "LLC",
				"airport_name" => "Cagayan North International Airport",
				"municipality" => "Lal-lo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PH",
				"iata_code" => "MBT",
				"airport_name" => "Moises R. Espinosa Airport",
				"municipality" => "Masbate",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PH",
				"iata_code" => "MNL",
				"airport_name" => "Ninoy Aquino International Airport",
				"municipality" => "Manila",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PH",
				"iata_code" => "MPH",
				"airport_name" => "Godofredo P. Ramos Airport",
				"municipality" => "Malay",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PH",
				"iata_code" => "PAG",
				"airport_name" => "Pagadian Airport",
				"municipality" => "Pagadian City",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PH",
				"iata_code" => "PPS",
				"airport_name" => "Puerto Princesa Airport",
				"municipality" => "Puerto Princesa City",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PH",
				"iata_code" => "RXS",
				"airport_name" => "Roxas Airport",
				"municipality" => "Roxas City",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PH",
				"iata_code" => "RZP",
				"airport_name" => "Cesar Lim Rodriguez (Taytay-Sandoval) Airport",
				"municipality" => "Taytay",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PH",
				"iata_code" => "SFE",
				"airport_name" => "San Fernando Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PH",
				"iata_code" => "SFS",
				"airport_name" => "Subic Bay International Airport / Naval Air Station Cubi Point",
				"municipality" => "Olongapo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PH",
				"iata_code" => "SJI",
				"airport_name" => "San Jose Airport",
				"municipality" => "San Jose",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PH",
				"iata_code" => "SUG",
				"airport_name" => "Surigao Airport",
				"municipality" => "Surigao City",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PH",
				"iata_code" => "SWL",
				"airport_name" => "San Vicente Airport",
				"municipality" => "San Vicente",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PH",
				"iata_code" => "TAC",
				"airport_name" => "Daniel Z. Romualdez Airport",
				"municipality" => "Tacloban City",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PH",
				"iata_code" => "TBH",
				"airport_name" => "Tugdan Airport",
				"municipality" => "Tablas Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PH",
				"iata_code" => "TDG",
				"airport_name" => "Tandag Airport",
				"municipality" => "Tandag",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PH",
				"iata_code" => "TUG",
				"airport_name" => "Tuguegarao Airport",
				"municipality" => "Tuguegarao City",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PH",
				"iata_code" => "TWT",
				"airport_name" => "Sanga Sanga Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PH",
				"iata_code" => "USU",
				"airport_name" => "Francisco B. Reyes Airport",
				"municipality" => "Coron",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PH",
				"iata_code" => "VRC",
				"airport_name" => "Virac Airport",
				"municipality" => "Virac",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PH",
				"iata_code" => "WNP",
				"airport_name" => "Naga Airport",
				"municipality" => "Naga",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PH",
				"iata_code" => "ZAM",
				"airport_name" => "Zamboanga International Airport",
				"municipality" => "Zamboanga City",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PK",
				"iata_code" => "BHV",
				"airport_name" => "Bahawalpur Airport",
				"municipality" => "Bahawalpur",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PK",
				"iata_code" => "BNP",
				"airport_name" => "Bannu Airport",
				"municipality" => "Bannu",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PK",
				"iata_code" => "CJL",
				"airport_name" => "Chitral Airport",
				"municipality" => "Chitral",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PK",
				"iata_code" => "DBA",
				"airport_name" => "Dalbandin Airport",
				"municipality" => "Dalbandin",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PK",
				"iata_code" => "DEA",
				"airport_name" => "Dera Ghazi Khan Airport",
				"municipality" => "Dera Ghazi Khan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PK",
				"iata_code" => "DSK",
				"airport_name" => "Dera Ismael Khan Airport",
				"municipality" => "Dera Ismael Khan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PK",
				"iata_code" => "GIL",
				"airport_name" => "Gilgit Airport",
				"municipality" => "Gilgit",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PK",
				"iata_code" => "GWD",
				"airport_name" => "Gwadar International Airport",
				"municipality" => "Gwadar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PK",
				"iata_code" => "HDD",
				"airport_name" => "Hyderabad Airport",
				"municipality" => "Hyderabad",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PK",
				"iata_code" => "ISB",
				"airport_name" => "Islamabad International Airport",
				"municipality" => "Islamabad",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PK",
				"iata_code" => "JIW",
				"airport_name" => "Jiwani Airport",
				"municipality" => "Jiwani",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PK",
				"iata_code" => "KDD",
				"airport_name" => "Khuzdar Airport",
				"municipality" => "Khuzdar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PK",
				"iata_code" => "KDU",
				"airport_name" => "Skardu Airport",
				"municipality" => "Skardu",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PK",
				"iata_code" => "KHI",
				"airport_name" => "Jinnah International Airport",
				"municipality" => "Karachi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PK",
				"iata_code" => "LHE",
				"airport_name" => "Allama Iqbal International Airport",
				"municipality" => "Lahore",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PK",
				"iata_code" => "LYP",
				"airport_name" => "Faisalabad International Airport",
				"municipality" => "Faisalabad",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PK",
				"iata_code" => "MFG",
				"airport_name" => "Muzaffarabad Airport",
				"municipality" => "Muzaffarabad",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PK",
				"iata_code" => "MJD",
				"airport_name" => "Moenjodaro Airport",
				"municipality" => "Moenjodaro",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PK",
				"iata_code" => "MUX",
				"airport_name" => "Multan International Airport",
				"municipality" => "Multan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PK",
				"iata_code" => "ORW",
				"airport_name" => "Ormara Airport",
				"municipality" => "Ormara Raik",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PK",
				"iata_code" => "PAJ",
				"airport_name" => "Parachinar Airport",
				"municipality" => "Parachinar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PK",
				"iata_code" => "PEW",
				"airport_name" => "Peshawar International Airport",
				"municipality" => "Peshawar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PK",
				"iata_code" => "PJG",
				"airport_name" => "Panjgur Airport",
				"municipality" => "Panjgur",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PK",
				"iata_code" => "PSI",
				"airport_name" => "Pasni Airport",
				"municipality" => "Pasni",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PK",
				"iata_code" => "PZH",
				"airport_name" => "Zhob Airport",
				"municipality" => "Fort Sandeman",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PK",
				"iata_code" => "RAZ",
				"airport_name" => "Rawalakot Airport",
				"municipality" => "Rawalakot",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PK",
				"iata_code" => "RYK",
				"airport_name" => "Shaikh Zaid Airport",
				"municipality" => "Rahim Yar Khan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PK",
				"iata_code" => "RZS",
				"airport_name" => "Sawan Airport",
				"municipality" => "Sawan Gas Field",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PK",
				"iata_code" => "SDT",
				"airport_name" => "Saidu Sharif Airport",
				"municipality" => "Saidu Sharif",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PK",
				"iata_code" => "SKT",
				"airport_name" => "Sialkot International Airport",
				"municipality" => "Sialkot",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PK",
				"iata_code" => "SKZ",
				"airport_name" => "Sukkur Airport",
				"municipality" => "Mirpur Khas",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PK",
				"iata_code" => "SYW",
				"airport_name" => "Sehwan Sharif Airport",
				"municipality" => "Sehwan Sharif",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PK",
				"iata_code" => "TUK",
				"airport_name" => "Turbat International Airport",
				"municipality" => "Turbat",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PK",
				"iata_code" => "UET",
				"airport_name" => "Quetta International Airport",
				"municipality" => "Quetta",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PK",
				"iata_code" => "WNS",
				"airport_name" => "Shaheed Benazirabad Airport",
				"municipality" => "Nawabashah",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PL",
				"iata_code" => "BZG",
				"airport_name" => "Bydgoszcz Ignacy Jan Paderewski Airport",
				"municipality" => "Bydgoszcz",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PL",
				"iata_code" => "GDN",
				"airport_name" => "Gdańsk Lech Wałęsa Airport",
				"municipality" => "Gdańsk",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PL",
				"iata_code" => "IEG",
				"airport_name" => "Zielona Góra-Babimost Airport",
				"municipality" => "Babimost",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PL",
				"iata_code" => "KRK",
				"airport_name" => "Kraków John Paul II International Airport",
				"municipality" => "Kraków",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PL",
				"iata_code" => "KTW",
				"airport_name" => "Katowice International Airport",
				"municipality" => "Katowice",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PL",
				"iata_code" => "LCJ",
				"airport_name" => "Łódź Władysław Reymont Airport",
				"municipality" => "Łódź",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PL",
				"iata_code" => "LUZ",
				"airport_name" => "Lublin Airport",
				"municipality" => "Lublin",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PL",
				"iata_code" => "POZ",
				"airport_name" => "Poznań-Ławica Airport",
				"municipality" => "Poznań",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PL",
				"iata_code" => "RZE",
				"airport_name" => "Rzeszów-Jasionka Airport",
				"municipality" => "Rzeszów",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PL",
				"iata_code" => "SZY",
				"airport_name" => "Olsztyn-Mazury Airport",
				"municipality" => "Olsztyn",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PL",
				"iata_code" => "SZZ",
				"airport_name" => "Szczecin-Goleniów 'Solidarność' Airport",
				"municipality" => "Goleniow",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PL",
				"iata_code" => "WAW",
				"airport_name" => "Warsaw Chopin Airport",
				"municipality" => "Warsaw",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PL",
				"iata_code" => "WMI",
				"airport_name" => "Modlin Airport",
				"municipality" => "Warsaw",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PL",
				"iata_code" => "WRO",
				"airport_name" => "Copernicus Wrocław Airport",
				"municipality" => "Wrocław",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PM",
				"iata_code" => "FSP",
				"airport_name" => "St Pierre Airport",
				"municipality" => "Saint-Pierre",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PM",
				"iata_code" => "MQC",
				"airport_name" => "Miquelon Airport",
				"municipality" => "Miquelon",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PR",
				"iata_code" => "BQN",
				"airport_name" => "Rafael Hernández International Airport",
				"municipality" => "Aguadilla",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PR",
				"iata_code" => "MAZ",
				"airport_name" => "Eugenio Maria De Hostos Airport",
				"municipality" => "Mayaguez",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PR",
				"iata_code" => "NRR",
				"airport_name" => "José Aponte de la Torre Airport",
				"municipality" => "Ceiba",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PR",
				"iata_code" => "PSE",
				"airport_name" => "Mercedita Airport",
				"municipality" => "Ponce",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PR",
				"iata_code" => "SIG",
				"airport_name" => "Fernando Luis Ribas Dominicci Airport",
				"municipality" => "San Juan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PR",
				"iata_code" => "SJU",
				"airport_name" => "Luis Munoz Marin International Airport",
				"municipality" => "San Juan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PT",
				"iata_code" => "BGC",
				"airport_name" => "Bragança Airport",
				"municipality" => "Bragança",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PT",
				"iata_code" => "CAT",
				"airport_name" => "Cascais Airport",
				"municipality" => "Cascais",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PT",
				"iata_code" => "CVU",
				"airport_name" => "Corvo Airport",
				"municipality" => "Corvo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PT",
				"iata_code" => "FAO",
				"airport_name" => "Faro Airport",
				"municipality" => "Faro",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PT",
				"iata_code" => "FLW",
				"airport_name" => "Flores Airport",
				"municipality" => "Santa Cruz das Flores",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PT",
				"iata_code" => "FNC",
				"airport_name" => "Madeira International Airport Cristiano Ronaldo",
				"municipality" => "Funchal",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PT",
				"iata_code" => "GRW",
				"airport_name" => "Graciosa Airport",
				"municipality" => "Santa Cruz da Graciosa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PT",
				"iata_code" => "HOR",
				"airport_name" => "Horta Airport",
				"municipality" => "Horta",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PT",
				"iata_code" => "LIS",
				"airport_name" => "Humberto Delgado Airport (Lisbon Portela Airport)",
				"municipality" => "Lisbon",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PT",
				"iata_code" => "OPO",
				"airport_name" => "Francisco de Sá Carneiro Airport",
				"municipality" => "Porto",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PT",
				"iata_code" => "PDL",
				"airport_name" => "João Paulo II Airport",
				"municipality" => "Ponta Delgada",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PT",
				"iata_code" => "PIX",
				"airport_name" => "Pico Airport",
				"municipality" => "Pico Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PT",
				"iata_code" => "PRM",
				"airport_name" => "Portimão Airport",
				"municipality" => "Portimão",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PT",
				"iata_code" => "PXO",
				"airport_name" => "Porto Santo Airport",
				"municipality" => "Vila Baleira",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PT",
				"iata_code" => "SJZ",
				"airport_name" => "São Jorge Airport",
				"municipality" => "Velas",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PT",
				"iata_code" => "SMA",
				"airport_name" => "Santa Maria Airport",
				"municipality" => "Vila do Porto",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PT",
				"iata_code" => "TER",
				"airport_name" => "Lajes Airport",
				"municipality" => "Praia da Vitória",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PT",
				"iata_code" => "VRL",
				"airport_name" => "Vila Real Airport",
				"municipality" => "Vila Real",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PT",
				"iata_code" => "VSE",
				"airport_name" => "Aerodromo Goncalves Lobato (Viseu Airport)",
				"municipality" => "Viseu",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PW",
				"iata_code" => "ROR",
				"airport_name" => "Babelthuap Airport",
				"municipality" => "Babelthuap Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PY",
				"iata_code" => "AGT",
				"airport_name" => "Guarani International Airport",
				"municipality" => "Ciudad del Este",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PY",
				"iata_code" => "ASU",
				"airport_name" => "Silvio Pettirossi International Airport",
				"municipality" => "Asunción",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "PY",
				"iata_code" => "ENO",
				"airport_name" => "Teniente Amin Ayub Gonzalez Airport",
				"municipality" => "Encarnación",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "QA",
				"iata_code" => "DOH",
				"airport_name" => "Hamad International Airport",
				"municipality" => "Doha",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RE",
				"iata_code" => "RUN",
				"airport_name" => "Roland Garros Airport",
				"municipality" => "St Denis",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RE",
				"iata_code" => "ZSE",
				"airport_name" => "Pierrefonds Airport",
				"municipality" => "St Pierre",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RO",
				"iata_code" => "ARW",
				"airport_name" => "Arad International Airport",
				"municipality" => "Arad",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RO",
				"iata_code" => "BAY",
				"airport_name" => "Maramureș International Airport",
				"municipality" => "Baia Mare",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RO",
				"iata_code" => "BCM",
				"airport_name" => "Bacău Airport",
				"municipality" => "Bacău",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RO",
				"iata_code" => "CLJ",
				"airport_name" => "Cluj-Napoca International Airport",
				"municipality" => "Cluj-Napoca",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RO",
				"iata_code" => "CND",
				"airport_name" => "Mihail Kogălniceanu International Airport",
				"municipality" => "Constanţa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RO",
				"iata_code" => "CRA",
				"airport_name" => "Craiova Airport",
				"municipality" => "Craiova",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RO",
				"iata_code" => "IAS",
				"airport_name" => "Iaşi Airport",
				"municipality" => "Iaşi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RO",
				"iata_code" => "OMR",
				"airport_name" => "Oradea International Airport",
				"municipality" => "Oradea",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RO",
				"iata_code" => "OTP",
				"airport_name" => "Henri Coandă International Airport",
				"municipality" => "Bucharest",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RO",
				"iata_code" => "SBZ",
				"airport_name" => "Sibiu International Airport",
				"municipality" => "Sibiu",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RO",
				"iata_code" => "SCV",
				"airport_name" => "Suceava Stefan cel Mare Airport",
				"municipality" => "Suceava",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RO",
				"iata_code" => "SUJ",
				"airport_name" => "Satu Mare Airport",
				"municipality" => "Satu Mare",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RO",
				"iata_code" => "TGM",
				"airport_name" => "Transilvania Târgu Mureş International Airport",
				"municipality" => "Târgu Mureş",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RO",
				"iata_code" => "TSR",
				"airport_name" => "Timişoara Traian Vuia Airport",
				"municipality" => "Timişoara",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RS",
				"iata_code" => "BEG",
				"airport_name" => "Belgrade Nikola Tesla Airport",
				"municipality" => "Belgrade",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RS",
				"iata_code" => "INI",
				"airport_name" => "Nis Airport",
				"municipality" => "Nis",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RS",
				"iata_code" => "KVO",
				"airport_name" => "Morava Airport",
				"municipality" => "Kraljevo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "AAQ",
				"airport_name" => "Anapa Vityazevo Airport",
				"municipality" => "Krasnyi Kurgan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "ABA",
				"airport_name" => "Abakan International Airport",
				"municipality" => "Abakan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "AER",
				"airport_name" => "Sochi International Airport",
				"municipality" => "Sochi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "AMV",
				"airport_name" => "Amderma Airport",
				"municipality" => "Amderma",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "ARH",
				"airport_name" => "Talagi Airport",
				"municipality" => "Archangelsk",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "ASF",
				"airport_name" => "Astrakhan Airport",
				"municipality" => "Astrakhan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "BAX",
				"airport_name" => "Barnaul Airport",
				"municipality" => "Barnaul",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "BQG",
				"airport_name" => "Bogorodskoye Airport",
				"municipality" => "Bogorodskoye",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "BQJ",
				"airport_name" => "Batagay Airport",
				"municipality" => "Batagay",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "BQS",
				"airport_name" => "Ignatyevo Airport",
				"municipality" => "Blagoveschensk",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "BTK",
				"airport_name" => "Bratsk Airport",
				"municipality" => "Bratsk",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "BVJ",
				"airport_name" => "Bovanenkovo Airport",
				"municipality" => "Bovanenkovo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "BWO",
				"airport_name" => "Balakovo Airport",
				"municipality" => "Balakovo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "BZK",
				"airport_name" => "Bryansk Airport",
				"municipality" => "Bryansk",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "CEE",
				"airport_name" => "Cherepovets Airport",
				"municipality" => "Cherepovets",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "CEK",
				"airport_name" => "Chelyabinsk Balandino Airport",
				"municipality" => "Chelyabinsk",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "CKH",
				"airport_name" => "Chokurdakh Airport",
				"municipality" => "Chokurdah",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "CSH",
				"airport_name" => "Solovki Airport",
				"municipality" => "Solovetsky Islands",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "CSY",
				"airport_name" => "Cheboksary Airport",
				"municipality" => "Cheboksary",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "CYX",
				"airport_name" => "Cherskiy Airport",
				"municipality" => "Cherskiy",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "DLR",
				"airport_name" => "Dalnerechensk Airport",
				"municipality" => "Dalnerechensk",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "DME",
				"airport_name" => "Domodedovo International Airport",
				"municipality" => "Moscow",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "DPT",
				"airport_name" => "Deputatskiy Airport",
				"municipality" => "Deputatskiy",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "DYR",
				"airport_name" => "Ugolny Yuri Ryktheu Airport",
				"municipality" => "Anadyr",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "EGO",
				"airport_name" => "Belgorod International Airport",
				"municipality" => "Belgorod",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "EIE",
				"airport_name" => "Yeniseysk Airport",
				"municipality" => "Yeniseysk",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "EIK",
				"airport_name" => "Yeysk Airport",
				"municipality" => "Yeysk",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "EKS",
				"airport_name" => "Shakhtyorsk Airport",
				"municipality" => "Shakhtyorsk",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "ESL",
				"airport_name" => "Elista Airport",
				"municipality" => "Elista",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "EYK",
				"airport_name" => "Beloyarskiy Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "GDX",
				"airport_name" => "Sokol Airport",
				"municipality" => "Magadan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "GDZ",
				"airport_name" => "Gelendzhik Airport",
				"municipality" => "Gelendzhik",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "GOJ",
				"airport_name" => "Nizhny Novgorod Strigino International Airport",
				"municipality" => "Nizhny Novgorod",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "GRV",
				"airport_name" => "Grozny Airport",
				"municipality" => "Grozny",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "GSV",
				"airport_name" => "Gagarin International Airport",
				"municipality" => "Saratov",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "HMA",
				"airport_name" => "Khanty Mansiysk Airport",
				"municipality" => "Khanty-Mansiysk",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "HTA",
				"airport_name" => "Chita-Kadala International Airport",
				"municipality" => "Chita",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "HTG",
				"airport_name" => "Khatanga Airport",
				"municipality" => "Khatanga",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "IAA",
				"airport_name" => "Igarka Airport",
				"municipality" => "Igarka",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "IGT",
				"airport_name" => "Magas Airport",
				"municipality" => "Sunzha",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "IJK",
				"airport_name" => "Izhevsk Airport",
				"municipality" => "Izhevsk",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "IKS",
				"airport_name" => "Tiksi Airport",
				"municipality" => "Tiksi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "IKT",
				"airport_name" => "Irkutsk International Airport",
				"municipality" => "Irkutsk",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "ITU",
				"airport_name" => "Iturup Airport",
				"municipality" => "Kurilsk",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "IWA",
				"airport_name" => "Ivanovo South Airport",
				"municipality" => "Ivanovo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "JOK",
				"airport_name" => "Yoshkar-Ola Airport",
				"municipality" => "Yoshkar-Ola",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "KEJ",
				"airport_name" => "Kemerovo Airport",
				"municipality" => "Kemerovo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "KGD",
				"airport_name" => "Khrabrovo Airport",
				"municipality" => "Kaliningrad",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "KGP",
				"airport_name" => "Kogalym International Airport",
				"municipality" => "Kogalym",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "KHV",
				"airport_name" => "Khabarovsk Novy Airport",
				"municipality" => "Khabarovsk",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "KJA",
				"airport_name" => "Krasnoyarsk International Airport",
				"municipality" => "Krasnoyarsk",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "KMW",
				"airport_name" => "Kostroma Sokerkino Airport",
				"municipality" => "Kostroma",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "KPW",
				"airport_name" => "Keperveem Airport",
				"municipality" => "Keperveem",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "KRO",
				"airport_name" => "Kurgan Airport",
				"municipality" => "Kurgan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "KRR",
				"airport_name" => "Krasnodar Pashkovsky International Airport",
				"municipality" => "Krasnodar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "KSZ",
				"airport_name" => "Kotlas Airport",
				"municipality" => "Kotlas",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "KUF",
				"airport_name" => "Kurumoch International Airport",
				"municipality" => "Samara",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "KVM",
				"airport_name" => "Markovo Airport",
				"municipality" => "Markovo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "KVX",
				"airport_name" => "Pobedilovo Airport",
				"municipality" => "Kirov",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "KXK",
				"airport_name" => "Komsomolsk-on-Amur Airport",
				"municipality" => "Komsomolsk-on-Amur",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "KYZ",
				"airport_name" => "Kyzyl Airport",
				"municipality" => "Kyzyl",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "KZN",
				"airport_name" => "Kazan International Airport",
				"municipality" => "Kazan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "LDG",
				"airport_name" => "Leshukonskoye Airport",
				"municipality" => "Leshukonskoye",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "LED",
				"airport_name" => "Pulkovo Airport",
				"municipality" => "St. Petersburg",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "LPK",
				"airport_name" => "Lipetsk Airport",
				"municipality" => "Lipetsk",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "MCX",
				"airport_name" => "Makhachkala Uytash International Airport",
				"municipality" => "Makhachkala",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "MJZ",
				"airport_name" => "Mirny Airport",
				"municipality" => "Mirny",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "MMK",
				"airport_name" => "Murmansk Airport",
				"municipality" => "Murmansk",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "MQF",
				"airport_name" => "Magnitogorsk International Airport",
				"municipality" => "Magnitogorsk",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "MQJ",
				"airport_name" => "Moma Airport",
				"municipality" => "Khonuu",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "MRV",
				"airport_name" => "Mineralnyye Vody Airport",
				"municipality" => "Mineralnyye Vody",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "NAL",
				"airport_name" => "Nalchik Airport",
				"municipality" => "Nalchik",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "NBC",
				"airport_name" => "Begishevo Airport",
				"municipality" => "Nizhnekamsk",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "NER",
				"airport_name" => "Chulman Airport",
				"municipality" => "Neryungri",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "NFG",
				"airport_name" => "Nefteyugansk Airport",
				"municipality" => "Nefteyugansk",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "NGK",
				"airport_name" => "Nogliki Airport",
				"municipality" => "Nogliki",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "NJC",
				"airport_name" => "Nizhnevartovsk Airport",
				"municipality" => "Nizhnevartovsk",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "NLI",
				"airport_name" => "Nikolayevsk-na-Amure Airport",
				"municipality" => "Nikolayevsk-na-Amure Airport",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "NNM",
				"airport_name" => "Naryan Mar Airport",
				"municipality" => "Naryan Mar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "NOJ",
				"airport_name" => "Noyabrsk Airport",
				"municipality" => "Noyabrsk",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "NOZ",
				"airport_name" => "Spichenkovo Airport",
				"municipality" => "Novokuznetsk",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "NSK",
				"airport_name" => "Norilsk-Alykel Airport",
				"municipality" => "Norilsk",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "NUX",
				"airport_name" => "Novy Urengoy Airport",
				"municipality" => "Novy Urengoy",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "NYA",
				"airport_name" => "Nyagan Airport",
				"municipality" => "Nyagan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "NYM",
				"airport_name" => "Nadym Airport",
				"municipality" => "Nadym",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "ODO",
				"airport_name" => "Bodaybo Airport",
				"municipality" => "Bodaybo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "OGZ",
				"airport_name" => "Vladikavkaz Beslan International Airport",
				"municipality" => "Beslan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "OHO",
				"airport_name" => "Okhotsk Airport",
				"municipality" => "Okhotsk",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "OLZ",
				"airport_name" => "Olyokminsk Airport",
				"municipality" => "Olyokminsk",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "OMS",
				"airport_name" => "Omsk Central Airport",
				"municipality" => "Omsk",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "OSW",
				"airport_name" => "Orsk Airport",
				"municipality" => "Orsk",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "OVB",
				"airport_name" => "Novosibirsk Tolmachevo Airport",
				"municipality" => "Novosibirsk",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "OVS",
				"airport_name" => "Sovetskiy Airport",
				"municipality" => "Sovetskiy",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "PEE",
				"airport_name" => "Perm International Airport",
				"municipality" => "Perm",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "PES",
				"airport_name" => "Petrozavodsk Airport",
				"municipality" => "Petrozavodsk",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "PEX",
				"airport_name" => "Pechora Airport",
				"municipality" => "Pechora",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "PEZ",
				"airport_name" => "Penza Airport",
				"municipality" => "Penza",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "PKC",
				"airport_name" => "Yelizovo Airport",
				"municipality" => "Petropavlovsk-Kamchatsky",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "PKV",
				"airport_name" => "Pskov Airport",
				"municipality" => "Pskov",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "PYJ",
				"airport_name" => "Polyarny Airport",
				"municipality" => "Yakutia",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "REN",
				"airport_name" => "Orenburg Central Airport",
				"municipality" => "Orenburg",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "ROV",
				"airport_name" => "Platov International Airport",
				"municipality" => "Rostov-on-Don",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "RYB",
				"airport_name" => "Staroselye Airport",
				"municipality" => "Rybinsk",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "SBT",
				"airport_name" => "Sabetta International Airport",
				"municipality" => "Sabetta",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "SCW",
				"airport_name" => "Syktyvkar Airport",
				"municipality" => "Syktyvkar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "SEK",
				"airport_name" => "Srednekolymsk Airport",
				"municipality" => "Srednekolymsk",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "SGC",
				"airport_name" => "Surgut Airport",
				"municipality" => "Surgut",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "SKX",
				"airport_name" => "Saransk Airport",
				"municipality" => "Saransk",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "SLY",
				"airport_name" => "Salekhard Airport",
				"municipality" => "Salekhard",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "STW",
				"airport_name" => "Stavropol Shpakovskoye Airport",
				"municipality" => "Stavropol",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "SUK",
				"airport_name" => "Sakkyryr Airport",
				"municipality" => "Batagay-Alyta",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "SUY",
				"airport_name" => "Suntar Airport",
				"municipality" => "Suntar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "SVO",
				"airport_name" => "Sheremetyevo International Airport",
				"municipality" => "Moscow",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "SVX",
				"airport_name" => "Koltsovo Airport",
				"municipality" => "Yekaterinburg",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "SYS",
				"airport_name" => "Saskylakh Airport",
				"municipality" => "Saskylakh",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "TGK",
				"airport_name" => "Taganrog Yuzhny Airport",
				"municipality" => "Taganrog",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "THX",
				"airport_name" => "Turukhansk Airport",
				"municipality" => "Turukhansk",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "TJM",
				"airport_name" => "Roshchino International Airport",
				"municipality" => "Tyumen",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "TLY",
				"airport_name" => "Plastun Airport",
				"municipality" => "Plastun",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "TOF",
				"airport_name" => "Bogashevo Airport",
				"municipality" => "Tomsk",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "UCT",
				"airport_name" => "Ukhta Airport",
				"municipality" => "Ukhta",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "UFA",
				"airport_name" => "Ufa International Airport",
				"municipality" => "Ufa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "UKG",
				"airport_name" => "Ust-Kuyga Airport",
				"municipality" => "Ust-Kuyga",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "UKX",
				"airport_name" => "Ust-Kut Airport",
				"municipality" => "Ust-Kut",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "ULK",
				"airport_name" => "Lensk Airport",
				"municipality" => "Lensk",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "ULV",
				"airport_name" => "Ulyanovsk Baratayevka Airport",
				"municipality" => "Ulyanovsk",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "ULY",
				"airport_name" => "Ulyanovsk East Airport",
				"municipality" => "Cherdakly",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "UMS",
				"airport_name" => "Ust-Maya Airport",
				"municipality" => "Ust-Maya",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "URJ",
				"airport_name" => "Uray Airport",
				"municipality" => "Uray",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "URS",
				"airport_name" => "Kursk East Airport",
				"municipality" => "Kursk",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "USK",
				"airport_name" => "Usinsk Airport",
				"municipality" => "Usinsk",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "USR",
				"airport_name" => "Ust-Nera Airport",
				"municipality" => "Ust-Nera",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "UUA",
				"airport_name" => "Bugulma Airport",
				"municipality" => "Bugulma",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "UUD",
				"airport_name" => "Baikal International Airport",
				"municipality" => "Ulan Ude",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "UUS",
				"airport_name" => "Yuzhno-Sakhalinsk Airport",
				"municipality" => "Yuzhno-Sakhalinsk",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "VHV",
				"airport_name" => "Verkhnevilyuisk Airport",
				"municipality" => "Verkhnevilyuisk",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "VKO",
				"airport_name" => "Vnukovo International Airport",
				"municipality" => "Moscow",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "VKT",
				"airport_name" => "Vorkuta Airport",
				"municipality" => "Vorkuta",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "VOG",
				"airport_name" => "Volgograd International Airport",
				"municipality" => "Volgograd",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "VOZ",
				"airport_name" => "Voronezh International Airport",
				"municipality" => "Voronezh",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "VVO",
				"airport_name" => "Vladivostok International Airport",
				"municipality" => "Artyom",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "VYI",
				"airport_name" => "Vilyuisk Airport",
				"municipality" => "Vilyuisk",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "YKS",
				"airport_name" => "Yakutsk Airport",
				"municipality" => "Yakutsk",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "ZIA",
				"airport_name" => "Zhukovsky International Airport",
				"municipality" => "Moscow",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "ZIX",
				"airport_name" => "Zhigansk Airport",
				"municipality" => "Zhigansk",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RU",
				"iata_code" => "ZKP",
				"airport_name" => "Zyryanka Airport",
				"municipality" => "Zyryanka",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RW",
				"iata_code" => "KGL",
				"airport_name" => "Kigali International Airport",
				"municipality" => "Kigali",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "RW",
				"iata_code" => "KME",
				"airport_name" => "Kamembe Airport",
				"municipality" => "Kamembe",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SA",
				"iata_code" => "ABT",
				"airport_name" => "King Saud Bin Abdulaziz (Al Baha) Airport",
				"municipality" => "Al Aqiq",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SA",
				"iata_code" => "AHB",
				"airport_name" => "Abha International Airport",
				"municipality" => "Abha",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SA",
				"iata_code" => "AJF",
				"airport_name" => "Al-Jawf Domestic Airport",
				"municipality" => "Al-Jawf",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SA",
				"iata_code" => "AQI",
				"airport_name" => "Al Qaisumah/Hafr Al Batin Airport",
				"municipality" => "Qaisumah",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SA",
				"iata_code" => "BHH",
				"airport_name" => "Bisha Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SA",
				"iata_code" => "DMM",
				"airport_name" => "King Fahd International Airport",
				"municipality" => "Ad Dammam",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SA",
				"iata_code" => "DWD",
				"airport_name" => "King Salman Abdulaziz Airport",
				"municipality" => "Dawadmi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SA",
				"iata_code" => "EAM",
				"airport_name" => "Najran Domestic Airport",
				"municipality" => "Najran",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SA",
				"iata_code" => "EJH",
				"airport_name" => "Al Wajh Domestic Airport",
				"municipality" => "Al Wajh",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SA",
				"iata_code" => "ELQ",
				"airport_name" => "Gassim Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SA",
				"iata_code" => "GIZ",
				"airport_name" => "Jizan Regional Airport / King Abdullah bin Abdulaziz Airport",
				"municipality" => "Jizan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SA",
				"iata_code" => "HAS",
				"airport_name" => "Ha'il Airport",
				"municipality" => "Ha'il",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SA",
				"iata_code" => "HOF",
				"airport_name" => "Al-Ahsa International Airport",
				"municipality" => "Hofuf",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SA",
				"iata_code" => "JED",
				"airport_name" => "King Abdulaziz International Airport",
				"municipality" => "Jeddah",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SA",
				"iata_code" => "KMC",
				"airport_name" => "King Khaled Military City Airport",
				"municipality" => "King Khaled Military City",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SA",
				"iata_code" => "MED",
				"airport_name" => "Prince Mohammad Bin Abdulaziz Airport",
				"municipality" => "Medina",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SA",
				"iata_code" => "RAE",
				"airport_name" => "Arar Domestic Airport",
				"municipality" => "Arar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SA",
				"iata_code" => "RAH",
				"airport_name" => "Rafha Domestic Airport",
				"municipality" => "Rafha",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SA",
				"iata_code" => "RUH",
				"airport_name" => "King Khaled International Airport",
				"municipality" => "Riyadh",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SA",
				"iata_code" => "SHW",
				"airport_name" => "Sharurah Domestic Airport",
				"municipality" => "Sharurah",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SA",
				"iata_code" => "TIF",
				"airport_name" => "Ta’if Regional Airport",
				"municipality" => "Ta’if",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SA",
				"iata_code" => "TUI",
				"airport_name" => "Turaif Domestic Airport",
				"municipality" => "Turaif",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SA",
				"iata_code" => "TUU",
				"airport_name" => "Tabuk Airport",
				"municipality" => "Tabuk",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SA",
				"iata_code" => "URY",
				"airport_name" => "Gurayat Domestic Airport",
				"municipality" => "Gurayat",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SA",
				"iata_code" => "WAE",
				"airport_name" => "Wadi Al Dawasir Domestic Airport",
				"municipality" => "Wadi Al Dawasir",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SA",
				"iata_code" => "YNB",
				"airport_name" => "Yanbu Airport / Prince Abdul Mohsin bin Abdulaziz international Airport",
				"municipality" => "Yanbu",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SB",
				"iata_code" => "AFT",
				"airport_name" => "Afutara Aerodrome",
				"municipality" => "Bila",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SB",
				"iata_code" => "AKS",
				"airport_name" => "Gwaunaru'u Airport",
				"municipality" => "Auki",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SB",
				"iata_code" => "ATD",
				"airport_name" => "Uru Harbour Airport",
				"municipality" => "Atoifi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SB",
				"iata_code" => "BAS",
				"airport_name" => "Ballalae Airport",
				"municipality" => "Ballalae",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SB",
				"iata_code" => "BNY",
				"airport_name" => "Bellona/Anua Airport",
				"municipality" => "Anua",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SB",
				"iata_code" => "CHY",
				"airport_name" => "Choiseul Bay Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SB",
				"iata_code" => "FRE",
				"airport_name" => "Fera/Maringe Airport",
				"municipality" => "Fera Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SB",
				"iata_code" => "GTA",
				"airport_name" => "Gatokae Aerodrome",
				"municipality" => "Gatokae",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SB",
				"iata_code" => "GZO",
				"airport_name" => "Nusatupe Airport",
				"municipality" => "Gizo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SB",
				"iata_code" => "HIR",
				"airport_name" => "Honiara International Airport",
				"municipality" => "Honiara",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SB",
				"iata_code" => "IRA",
				"airport_name" => "Ngorangora Airport",
				"municipality" => "Kirakira",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SB",
				"iata_code" => "KGE",
				"airport_name" => "Kaghau Airport",
				"municipality" => "Kagau Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SB",
				"iata_code" => "MBU",
				"airport_name" => "Babanakira Airport",
				"municipality" => "Mbambanakira",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SB",
				"iata_code" => "MNY",
				"airport_name" => "Mono Airport",
				"municipality" => "Stirling Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SB",
				"iata_code" => "MUA",
				"airport_name" => "Munda Airport",
				"municipality" => "Munda",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SB",
				"iata_code" => "NNB",
				"airport_name" => "Santa Ana Airport",
				"municipality" => "Santa Ana Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SB",
				"iata_code" => "RBV",
				"airport_name" => "Ramata Airport",
				"municipality" => "Ramata",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SB",
				"iata_code" => "RNL",
				"airport_name" => "Rennell/Tingoa Airport",
				"municipality" => "Rennell Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SB",
				"iata_code" => "RUS",
				"airport_name" => "Marau Airport",
				"municipality" => "Marau",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SB",
				"iata_code" => "SCZ",
				"airport_name" => "Santa Cruz/Graciosa Bay/Luova Airport",
				"municipality" => "Santa Cruz/Graciosa Bay/Luova",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SB",
				"iata_code" => "VAO",
				"airport_name" => "Suavanao Airport",
				"municipality" => "Suavanao",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SB",
				"iata_code" => "XYA",
				"airport_name" => "Yandina Airport",
				"municipality" => "Yandina",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SC",
				"iata_code" => "PRI",
				"airport_name" => "Praslin Airport",
				"municipality" => "Grand Anse",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SC",
				"iata_code" => "SEZ",
				"airport_name" => "Seychelles International Airport",
				"municipality" => "Mahe Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SD",
				"iata_code" => "ATB",
				"airport_name" => "Atbara Airport",
				"municipality" => "Atbara",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SD",
				"iata_code" => "DOG",
				"airport_name" => "Dongola Airport",
				"municipality" => "Dongola",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SD",
				"iata_code" => "EBD",
				"airport_name" => "El Obeid Airport",
				"municipality" => "Al-Ubayyid",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SD",
				"iata_code" => "ELF",
				"airport_name" => "El Fasher Airport",
				"municipality" => "El Fasher",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SD",
				"iata_code" => "KRT",
				"airport_name" => "Khartoum International Airport",
				"municipality" => "Khartoum",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SD",
				"iata_code" => "KSL",
				"airport_name" => "Kassala Airport",
				"municipality" => "Kassala",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SD",
				"iata_code" => "PZU",
				"airport_name" => "Port Sudan New International Airport",
				"municipality" => "Port Sudan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SD",
				"iata_code" => "UYL",
				"airport_name" => "Nyala Airport",
				"municipality" => "Nyala",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SD",
				"iata_code" => "WHF",
				"airport_name" => "Wadi Halfa Airport",
				"municipality" => "Wadi Halfa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SE",
				"iata_code" => "AGH",
				"airport_name" => "Ängelholm-Helsingborg Airport",
				"municipality" => "Ängelholm",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SE",
				"iata_code" => "AJR",
				"airport_name" => "Arvidsjaur Airport",
				"municipality" => "Arvidsjaur",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SE",
				"iata_code" => "ARN",
				"airport_name" => "Stockholm-Arlanda Airport",
				"municipality" => "Stockholm",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SE",
				"iata_code" => "BLE",
				"airport_name" => "Dala Airport",
				"municipality" => "Borlange",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SE",
				"iata_code" => "BMA",
				"airport_name" => "Stockholm-Bromma Airport",
				"municipality" => "Stockholm",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SE",
				"iata_code" => "EVG",
				"airport_name" => "Sveg Airport",
				"municipality" => "Sveg",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SE",
				"iata_code" => "GEV",
				"airport_name" => "Gällivare Airport",
				"municipality" => "Gällivare",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SE",
				"iata_code" => "GOT",
				"airport_name" => "Gothenburg-Landvetter Airport",
				"municipality" => "Gothenburg",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SE",
				"iata_code" => "HAD",
				"airport_name" => "Halmstad Airport",
				"municipality" => "Halmstad",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SE",
				"iata_code" => "HFS",
				"airport_name" => "Hagfors Airport",
				"municipality" => "Råda",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SE",
				"iata_code" => "HMV",
				"airport_name" => "Hemavan Airport",
				"municipality" => "Hemavan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SE",
				"iata_code" => "JKG",
				"airport_name" => "Jönköping Airport",
				"municipality" => "Jönköping",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SE",
				"iata_code" => "KID",
				"airport_name" => "Kristianstad Airport",
				"municipality" => "Kristianstad",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SE",
				"iata_code" => "KLR",
				"airport_name" => "Kalmar Airport",
				"municipality" => "Kalmar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SE",
				"iata_code" => "KRF",
				"airport_name" => "Kramfors-Sollefteå Höga Kusten Airport",
				"municipality" => "Nyland",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SE",
				"iata_code" => "KRN",
				"airport_name" => "Kiruna Airport",
				"municipality" => "Kiruna",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SE",
				"iata_code" => "KSD",
				"airport_name" => "Karlstad Airport",
				"municipality" => "Karlstad",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SE",
				"iata_code" => "LLA",
				"airport_name" => "Luleå Airport",
				"municipality" => "Luleå",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SE",
				"iata_code" => "LPI",
				"airport_name" => "Linköping City Airport",
				"municipality" => "Linköping",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SE",
				"iata_code" => "LYC",
				"airport_name" => "Lycksele Airport",
				"municipality" => "Lycksele",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SE",
				"iata_code" => "MMX",
				"airport_name" => "Malmö Sturup Airport",
				"municipality" => "Malmö",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SE",
				"iata_code" => "MXX",
				"airport_name" => "Mora Airport",
				"municipality" => "Mora",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SE",
				"iata_code" => "NRK",
				"airport_name" => "Norrköping Airport",
				"municipality" => "Norrköping",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SE",
				"iata_code" => "NYO",
				"airport_name" => "Stockholm Skavsta Airport",
				"municipality" => "Stockholm",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SE",
				"iata_code" => "OER",
				"airport_name" => "Örnsköldsvik Airport",
				"municipality" => "Örnsköldsvik",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SE",
				"iata_code" => "ORB",
				"airport_name" => "Örebro Airport",
				"municipality" => "Örebro",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SE",
				"iata_code" => "OSD",
				"airport_name" => "Åre Östersund Airport",
				"municipality" => "Östersund",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SE",
				"iata_code" => "RNB",
				"airport_name" => "Ronneby Airport",
				"municipality" => "Ronneby",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SE",
				"iata_code" => "SCR",
				"airport_name" => "Scandinavian Mountains Airport",
				"municipality" => "Sälen / Trysil",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SE",
				"iata_code" => "SDL",
				"airport_name" => "Sundsvall-Härnösand Airport",
				"municipality" => "Sundsvall/ Härnösand",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SE",
				"iata_code" => "SFT",
				"airport_name" => "Skellefteå Airport",
				"municipality" => "Skellefteå",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SE",
				"iata_code" => "SQO",
				"airport_name" => "Storuman Airport",
				"municipality" => "Storuman",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SE",
				"iata_code" => "THN",
				"airport_name" => "Trollhättan-Vänersborg Airport",
				"municipality" => "Trollhättan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SE",
				"iata_code" => "TYF",
				"airport_name" => "Torsby Airport",
				"municipality" => "Torsby",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SE",
				"iata_code" => "UME",
				"airport_name" => "Umeå Airport",
				"municipality" => "Umeå",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SE",
				"iata_code" => "VBY",
				"airport_name" => "Visby Airport",
				"municipality" => "Visby",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SE",
				"iata_code" => "VHM",
				"airport_name" => "Vilhelmina South Lapland Airport",
				"municipality" => "Vilhelmina",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SE",
				"iata_code" => "VST",
				"airport_name" => "Stockholm Västerås Airport",
				"municipality" => "Stockholm / Västerås",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SE",
				"iata_code" => "VXO",
				"airport_name" => "Växjö Kronoberg Airport",
				"municipality" => "Växjö",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SG",
				"iata_code" => "SIN",
				"airport_name" => "Singapore Changi Airport",
				"municipality" => "Singapore",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SG",
				"iata_code" => "XSP",
				"airport_name" => "Seletar Airport",
				"municipality" => "Seletar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SH",
				"iata_code" => "ASI",
				"airport_name" => "RAF Ascension Island",
				"municipality" => "Cat Hill",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SH",
				"iata_code" => "HLE",
				"airport_name" => "Saint Helena Airport",
				"municipality" => "Longwood",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SI",
				"iata_code" => "LJU",
				"airport_name" => "Ljubljana Jože Pučnik Airport",
				"municipality" => "Ljubljana",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SK",
				"iata_code" => "BTS",
				"airport_name" => "M. R. Štefánik Airport",
				"municipality" => "Bratislava",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SK",
				"iata_code" => "KSC",
				"airport_name" => "Košice Airport",
				"municipality" => "Košice",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SK",
				"iata_code" => "SLD",
				"airport_name" => "Sliač Airport",
				"municipality" => "Sliač",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SK",
				"iata_code" => "TAT",
				"airport_name" => "Poprad-Tatry Airport",
				"municipality" => "Poprad",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SL",
				"iata_code" => "FNA",
				"airport_name" => "Lungi International Airport",
				"municipality" => "Freetown (Lungi-Town)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SL",
				"iata_code" => "KBS",
				"airport_name" => "Bo Airport",
				"municipality" => "Bo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SL",
				"iata_code" => "KEN",
				"airport_name" => "Kenema Airport",
				"municipality" => "Kenema",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SL",
				"iata_code" => "WYE",
				"airport_name" => "Yengema Airport",
				"municipality" => "Yengema",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SN",
				"iata_code" => "CSK",
				"airport_name" => "Cap Skirring Airport",
				"municipality" => "Cap Skirring",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SN",
				"iata_code" => "DSS",
				"airport_name" => "Blaise Diagne International Airport",
				"municipality" => "Dakar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SN",
				"iata_code" => "MAX",
				"airport_name" => "Ouro Sogui Airport",
				"municipality" => "Ouro Sogui",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SN",
				"iata_code" => "TUD",
				"airport_name" => "Tambacounda Airport",
				"municipality" => "Tambacounda",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SN",
				"iata_code" => "XLS",
				"airport_name" => "Saint Louis Airport",
				"municipality" => "Saint Louis",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SN",
				"iata_code" => "ZIG",
				"airport_name" => "Ziguinchor Airport",
				"municipality" => "Ziguinchor",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SO",
				"iata_code" => "BBO",
				"airport_name" => "Berbera Airport",
				"municipality" => "Berbera",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SO",
				"iata_code" => "BLW",
				"airport_name" => "Beledweyne Airport",
				"municipality" => "Beledweyne",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SO",
				"iata_code" => "BSA",
				"airport_name" => "Bosaso / Bender Qassim International Airport",
				"municipality" => "Bosaso",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SO",
				"iata_code" => "GGR",
				"airport_name" => "Garowe Airport",
				"municipality" => "Garowe",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SO",
				"iata_code" => "GLK",
				"airport_name" => "Galcaio Airport",
				"municipality" => "Galcaio",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SO",
				"iata_code" => "HGA",
				"airport_name" => "Egal International Airport",
				"municipality" => "Hargeisa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SO",
				"iata_code" => "MGQ",
				"airport_name" => "Aden Adde International Airport",
				"municipality" => "Mogadishu",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SR",
				"iata_code" => "AGI",
				"airport_name" => "Wageningen Airstrip",
				"municipality" => "Wageningen",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SR",
				"iata_code" => "BTO",
				"airport_name" => "Botopasi Airport",
				"municipality" => "Botopasi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SR",
				"iata_code" => "DOE",
				"airport_name" => "Djumu-Djomoe Airport",
				"municipality" => "Djumu-Djomoe",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SR",
				"iata_code" => "DRJ",
				"airport_name" => "Drietabbetje Airport",
				"municipality" => "Drietabbetje",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SR",
				"iata_code" => "LDO",
				"airport_name" => "Ladouanie Airport",
				"municipality" => "Aurora",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SR",
				"iata_code" => "MOJ",
				"airport_name" => "Moengo Airstrip",
				"municipality" => "Moengo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SR",
				"iata_code" => "ORG",
				"airport_name" => "Zorg en Hoop Airport",
				"municipality" => "Paramaribo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SR",
				"iata_code" => "PBM",
				"airport_name" => "Johan Adolf Pengel International Airport",
				"municipality" => "Zandery",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SS",
				"iata_code" => "JUB",
				"airport_name" => "Juba International Airport",
				"municipality" => "Juba",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SS",
				"iata_code" => "MAK",
				"airport_name" => "Malakal Airport",
				"municipality" => "Malakal",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SS",
				"iata_code" => "RBX",
				"airport_name" => "Rumbek Airport",
				"municipality" => "Rumbek",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SS",
				"iata_code" => "WUU",
				"airport_name" => "Wau Airport",
				"municipality" => "Wau",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ST",
				"iata_code" => "PCP",
				"airport_name" => "Principe Airport",
				"municipality" => "São Tomé & Príncipe",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ST",
				"iata_code" => "TMS",
				"airport_name" => "São Tomé International Airport",
				"municipality" => "São Tomé",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SV",
				"iata_code" => "SAL",
				"airport_name" => "Monseñor Óscar Arnulfo Romero International Airport",
				"municipality" => "San Salvador (San Luis Talpa)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SX",
				"iata_code" => "SXM",
				"airport_name" => "Princess Juliana International Airport",
				"municipality" => "Saint Martin",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SY",
				"iata_code" => "ALP",
				"airport_name" => "Aleppo International Airport",
				"municipality" => "Aleppo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SY",
				"iata_code" => "DAM",
				"airport_name" => "Damascus International Airport",
				"municipality" => "Damascus",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SY",
				"iata_code" => "KAC",
				"airport_name" => "Qamishli Airport",
				"municipality" => "Qamishly",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SY",
				"iata_code" => "LTK",
				"airport_name" => "Bassel Al-Assad International Airport",
				"municipality" => "Latakia",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "SZ",
				"iata_code" => "SHO",
				"airport_name" => "King Mswati III International Airport",
				"municipality" => "Mpaka",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TC",
				"iata_code" => "GDT",
				"airport_name" => "JAGS McCartney International Airport",
				"municipality" => "Cockburn Town",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TC",
				"iata_code" => "NCA",
				"airport_name" => "North Caicos Airport",
				"municipality" => "North Caicos",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TC",
				"iata_code" => "PLS",
				"airport_name" => "Providenciales International Airport",
				"municipality" => "Providenciales",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TC",
				"iata_code" => "SLX",
				"airport_name" => "Salt Cay Airport",
				"municipality" => "Salt Cay",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TC",
				"iata_code" => "XSC",
				"airport_name" => "South Caicos Airport",
				"municipality" => "South Caicos",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TD",
				"iata_code" => "AEH",
				"airport_name" => "Abeche Airport",
				"municipality" => "Abeche",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TD",
				"iata_code" => "MQQ",
				"airport_name" => "Moundou Airport",
				"municipality" => "Moundou",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TD",
				"iata_code" => "NDJ",
				"airport_name" => "N'Djamena International Airport",
				"municipality" => "N'Djamena",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TD",
				"iata_code" => "SRH",
				"airport_name" => "Sarh Airport",
				"municipality" => "Sarh",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TG",
				"iata_code" => "LFW",
				"airport_name" => "Lomé–Tokoin International Airport",
				"municipality" => "Lomé",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TH",
				"iata_code" => "BFV",
				"airport_name" => "Buri Ram Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TH",
				"iata_code" => "BKK",
				"airport_name" => "Suvarnabhumi Airport",
				"municipality" => "Bangkok",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TH",
				"iata_code" => "CEI",
				"airport_name" => "Mae Fah Luang - Chiang Rai International Airport",
				"municipality" => "Chiang Rai",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TH",
				"iata_code" => "CJM",
				"airport_name" => "Chumphon Airport",
				"municipality" => "Chumphon",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TH",
				"iata_code" => "CNX",
				"airport_name" => "Chiang Mai International Airport",
				"municipality" => "Chiang Mai",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TH",
				"iata_code" => "DMK",
				"airport_name" => "Don Mueang International Airport",
				"municipality" => "Bangkok",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TH",
				"iata_code" => "HDY",
				"airport_name" => "Hat Yai International Airport",
				"municipality" => "Hat Yai",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TH",
				"iata_code" => "HGN",
				"airport_name" => "Mae Hong Son Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TH",
				"iata_code" => "HHQ",
				"airport_name" => "Hua Hin Airport",
				"municipality" => "Hua Hin",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TH",
				"iata_code" => "HKT",
				"airport_name" => "Phuket International Airport",
				"municipality" => "Phuket",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TH",
				"iata_code" => "KBV",
				"airport_name" => "Krabi Airport",
				"municipality" => "Krabi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TH",
				"iata_code" => "KKC",
				"airport_name" => "Khon Kaen Airport",
				"municipality" => "Khon Kaen",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TH",
				"iata_code" => "KOP",
				"airport_name" => "Nakhon Phanom Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TH",
				"iata_code" => "LOE",
				"airport_name" => "Loei Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TH",
				"iata_code" => "LPT",
				"airport_name" => "Lampang Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TH",
				"iata_code" => "MAQ",
				"airport_name" => "Mae Sot Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TH",
				"iata_code" => "NAW",
				"airport_name" => "Narathiwat Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TH",
				"iata_code" => "NNT",
				"airport_name" => "Nan Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TH",
				"iata_code" => "NST",
				"airport_name" => "Nakhon Si Thammarat Airport",
				"municipality" => "Nakhon Si Thammarat",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TH",
				"iata_code" => "PHS",
				"airport_name" => "Phitsanulok Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TH",
				"iata_code" => "PHY",
				"airport_name" => "Phetchabun Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TH",
				"iata_code" => "PXR",
				"airport_name" => "Surin Airport",
				"municipality" => "Surin",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TH",
				"iata_code" => "ROI",
				"airport_name" => "Roi Et Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TH",
				"iata_code" => "SNO",
				"airport_name" => "Sakon Nakhon Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TH",
				"iata_code" => "TDX",
				"airport_name" => "Trat Airport",
				"municipality" => "Laem Ngop",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TH",
				"iata_code" => "THS",
				"airport_name" => "Sukhothai Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TH",
				"iata_code" => "TST",
				"airport_name" => "Trang Airport",
				"municipality" => "Trang",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TH",
				"iata_code" => "UBP",
				"airport_name" => "Ubon Ratchathani Airport",
				"municipality" => "Ubon Ratchathani",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TH",
				"iata_code" => "UNN",
				"airport_name" => "Ranong Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TH",
				"iata_code" => "URT",
				"airport_name" => "Surat Thani Airport",
				"municipality" => "Surat Thani",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TH",
				"iata_code" => "USM",
				"airport_name" => "Samui Airport",
				"municipality" => "Na Thon (Ko Samui Island)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TH",
				"iata_code" => "UTH",
				"airport_name" => "Udon Thani Airport",
				"municipality" => "Udon Thani",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TH",
				"iata_code" => "UTP",
				"airport_name" => "U-Tapao International Airport",
				"municipality" => "Rayong",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TJ",
				"iata_code" => "DYU",
				"airport_name" => "Dushanbe Airport",
				"municipality" => "Dushanbe",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TJ",
				"iata_code" => "KQT",
				"airport_name" => "Qurghonteppa International Airport",
				"municipality" => "Kurgan-Tyube",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TJ",
				"iata_code" => "LBD",
				"airport_name" => "Khujand Airport",
				"municipality" => "Khujand",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TJ",
				"iata_code" => "TJU",
				"airport_name" => "Kulob Airport",
				"municipality" => "Kulyab",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TL",
				"iata_code" => "DIL",
				"airport_name" => "Presidente Nicolau Lobato International Airport",
				"municipality" => "Dili",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TM",
				"iata_code" => "ASB",
				"airport_name" => "Ashgabat International Airport",
				"municipality" => "Ashgabat",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TM",
				"iata_code" => "BKN",
				"airport_name" => "Balkanabat Airport",
				"municipality" => "Balkanabat",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TM",
				"iata_code" => "CRZ",
				"airport_name" => "Türkmenabat International Airport",
				"municipality" => "Türkmenabat",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TM",
				"iata_code" => "KRW",
				"airport_name" => "Turkmenbashi International Airport",
				"municipality" => "Turkmenbashi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TM",
				"iata_code" => "MYP",
				"airport_name" => "Mary International Airport",
				"municipality" => "Mary",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TM",
				"iata_code" => "TAZ",
				"airport_name" => "Daşoguz Airport",
				"municipality" => "Daşoguz",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TN",
				"iata_code" => "DJE",
				"airport_name" => "Djerba Zarzis International Airport",
				"municipality" => "Djerba",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TN",
				"iata_code" => "GAE",
				"airport_name" => "Gabès Matmata International Airport",
				"municipality" => "Gabès",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TN",
				"iata_code" => "GAF",
				"airport_name" => "Gafsa Ksar International Airport",
				"municipality" => "Gafsa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TN",
				"iata_code" => "MIR",
				"airport_name" => "Monastir Habib Bourguiba International Airport",
				"municipality" => "Monastir",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TN",
				"iata_code" => "NBE",
				"airport_name" => "Enfidha - Hammamet International Airport",
				"municipality" => "Enfidha",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TN",
				"iata_code" => "SFA",
				"airport_name" => "Sfax Thyna International Airport",
				"municipality" => "Sfax",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TN",
				"iata_code" => "TBJ",
				"airport_name" => "Tabarka 7 Novembre Airport",
				"municipality" => "Tabarka",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TN",
				"iata_code" => "TOE",
				"airport_name" => "Tozeur Nefta International Airport",
				"municipality" => "Tozeur",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TN",
				"iata_code" => "TUN",
				"airport_name" => "Tunis Carthage International Airport",
				"municipality" => "Tunis",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TO",
				"iata_code" => "EUA",
				"airport_name" => "Kaufana Airport",
				"municipality" => "Eua Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TO",
				"iata_code" => "HPA",
				"airport_name" => "Lifuka Island Airport",
				"municipality" => "Lifuka",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TO",
				"iata_code" => "NFO",
				"airport_name" => "Mata'aho Airport",
				"municipality" => "Angaha, Niuafo'ou Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TO",
				"iata_code" => "NTT",
				"airport_name" => "Kuini Lavenia Airport",
				"municipality" => "Niuatoputapu",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TO",
				"iata_code" => "TBU",
				"airport_name" => "Fua'amotu International Airport",
				"municipality" => "Nuku'alofa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TO",
				"iata_code" => "VAV",
				"airport_name" => "Vava'u International Airport",
				"municipality" => "Vava'u Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TR",
				"iata_code" => "ADA",
				"airport_name" => "Adana Şakirpaşa Airport",
				"municipality" => "Seyhan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TR",
				"iata_code" => "ADB",
				"airport_name" => "Adnan Menderes International Airport",
				"municipality" => "İzmir",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TR",
				"iata_code" => "ADF",
				"airport_name" => "Adıyaman Airport",
				"municipality" => "Adıyaman",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TR",
				"iata_code" => "AJI",
				"airport_name" => "Ağrı Airport",
				"municipality" => "Ağrı",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TR",
				"iata_code" => "AOE",
				"airport_name" => "Anadolu Airport",
				"municipality" => "Eskişehir",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TR",
				"iata_code" => "ASR",
				"airport_name" => "Kayseri Erkilet Airport",
				"municipality" => "Kayseri",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TR",
				"iata_code" => "AYT",
				"airport_name" => "Antalya International Airport",
				"municipality" => "Antalya",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TR",
				"iata_code" => "BAL",
				"airport_name" => "Batman Airport",
				"municipality" => "Batman",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TR",
				"iata_code" => "BGG",
				"airport_name" => "Bingöl Çeltiksuyu Airport",
				"municipality" => "Bingöl",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TR",
				"iata_code" => "BJV",
				"airport_name" => "Milas Bodrum International Airport",
				"municipality" => "Bodrum",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TR",
				"iata_code" => "BZI",
				"airport_name" => "Balıkesir Merkez Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TR",
				"iata_code" => "CKZ",
				"airport_name" => "Çanakkale Airport",
				"municipality" => "Çanakkale",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TR",
				"iata_code" => "DIY",
				"airport_name" => "Diyarbakır Airport",
				"municipality" => "Diyarbakır",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TR",
				"iata_code" => "DLM",
				"airport_name" => "Dalaman International Airport",
				"municipality" => "Dalaman",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TR",
				"iata_code" => "DNZ",
				"airport_name" => "Çardak Airport",
				"municipality" => "Denizli",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TR",
				"iata_code" => "EDO",
				"airport_name" => "Balıkesir Koca Seyit Airport",
				"municipality" => "Edremit",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TR",
				"iata_code" => "ERC",
				"airport_name" => "Erzincan Airport",
				"municipality" => "Erzincan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TR",
				"iata_code" => "ERZ",
				"airport_name" => "Erzurum International Airport",
				"municipality" => "Erzurum",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TR",
				"iata_code" => "ESB",
				"airport_name" => "Esenboğa International Airport",
				"municipality" => "Ankara",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TR",
				"iata_code" => "EZS",
				"airport_name" => "Elazığ Airport",
				"municipality" => "Elazığ",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TR",
				"iata_code" => "GNY",
				"airport_name" => "Şanlıurfa GAP Airport",
				"municipality" => "Şanlıurfa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TR",
				"iata_code" => "GZP",
				"airport_name" => "Gazipaşa-Alanya Airport",
				"municipality" => "Gazipaşa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TR",
				"iata_code" => "GZT",
				"airport_name" => "Gaziantep International Airport",
				"municipality" => "Gaziantep",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TR",
				"iata_code" => "HTY",
				"airport_name" => "Hatay Airport",
				"municipality" => "Antakya",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TR",
				"iata_code" => "IGD",
				"airport_name" => "Iğdır Airport",
				"municipality" => "Iğdır",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TR",
				"iata_code" => "ISE",
				"airport_name" => "Süleyman Demirel International Airport",
				"municipality" => "Isparta",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TR",
				"iata_code" => "ISL",
				"airport_name" => "İstanbul Atatürk Airport",
				"municipality" => "Bakırköy, Istanbul",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TR",
				"iata_code" => "IST",
				"airport_name" => "İstanbul Airport",
				"municipality" => "Arnavutköy, Istanbul",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TR",
				"iata_code" => "KCM",
				"airport_name" => "Kahramanmaraş Airport",
				"municipality" => "Kahramanmaraş",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TR",
				"iata_code" => "KSY",
				"airport_name" => "Kars Airport",
				"municipality" => "Kars",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TR",
				"iata_code" => "KYA",
				"airport_name" => "Konya Airport",
				"municipality" => "Konya",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TR",
				"iata_code" => "KZR",
				"airport_name" => "Zafer Airport",
				"municipality" => "Altıntaş",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TR",
				"iata_code" => "MLX",
				"airport_name" => "Malatya Erhaç Airport",
				"municipality" => "Malatya",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TR",
				"iata_code" => "MQM",
				"airport_name" => "Mardin Airport",
				"municipality" => "Mardin",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TR",
				"iata_code" => "MSR",
				"airport_name" => "Muş Airport",
				"municipality" => "Muş",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TR",
				"iata_code" => "MZH",
				"airport_name" => "Amasya Merzifon Airport",
				"municipality" => "Amasya",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TR",
				"iata_code" => "NAV",
				"airport_name" => "Nevşehir Kapadokya Airport",
				"municipality" => "Nevşehir",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TR",
				"iata_code" => "NKT",
				"airport_name" => "Şırnak Şerafettin Elçi Airport",
				"municipality" => "Şırnak",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TR",
				"iata_code" => "NOP",
				"airport_name" => "Sinop Airport",
				"municipality" => "Sinop",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TR",
				"iata_code" => "OGU",
				"airport_name" => "Ordu–Giresun Airport",
				"municipality" => "Ordu",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TR",
				"iata_code" => "ONQ",
				"airport_name" => "Zonguldak Çaycuma Airport",
				"municipality" => "Zonguldak",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TR",
				"iata_code" => "SAW",
				"airport_name" => "Istanbul Sabiha Gökçen International Airport",
				"municipality" => "Pendik, Istanbul",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TR",
				"iata_code" => "SFQ",
				"airport_name" => "Şanlıurfa Airport",
				"municipality" => "Şanlıurfa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TR",
				"iata_code" => "SZF",
				"airport_name" => "Samsun-Çarşamba Airport",
				"municipality" => "Samsun",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TR",
				"iata_code" => "TEQ",
				"airport_name" => "Tekirdağ Çorlu Airport",
				"municipality" => "Çorlu",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TR",
				"iata_code" => "TJK",
				"airport_name" => "Tokat Airport",
				"municipality" => "Tokat",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TR",
				"iata_code" => "TZX",
				"airport_name" => "Trabzon International Airport",
				"municipality" => "Trabzon",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TR",
				"iata_code" => "USQ",
				"airport_name" => "Uşak Airport",
				"municipality" => "Uşak",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TR",
				"iata_code" => "VAN",
				"airport_name" => "Van Ferit Melen Airport",
				"municipality" => "Van",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TR",
				"iata_code" => "VAS",
				"airport_name" => "Sivas Nuri Demirağ Airport",
				"municipality" => "Sivas",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TR",
				"iata_code" => "YEI",
				"airport_name" => "Bursa Yenişehir Airport",
				"municipality" => "Bursa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TR",
				"iata_code" => "YKO",
				"airport_name" => "Hakkari Yüksekova Airport",
				"municipality" => "Hakkari",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TT",
				"iata_code" => "POS",
				"airport_name" => "Piarco International Airport",
				"municipality" => "Port of Spain",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TT",
				"iata_code" => "TAB",
				"airport_name" => "Tobago-Crown Point Airport",
				"municipality" => "Scarborough",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TV",
				"iata_code" => "FUN",
				"airport_name" => "Funafuti International Airport",
				"municipality" => "Funafuti",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TW",
				"iata_code" => "CYI",
				"airport_name" => "Chiayi Airport",
				"municipality" => "Chiayi City",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TW",
				"iata_code" => "HCN",
				"airport_name" => "Hengchun Airport",
				"municipality" => "Hengchung",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TW",
				"iata_code" => "HUN",
				"airport_name" => "Hualien Airport",
				"municipality" => "Hualien City",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TW",
				"iata_code" => "KHH",
				"airport_name" => "Kaohsiung International Airport",
				"municipality" => "Kaohsiung (Xiaogang)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TW",
				"iata_code" => "KNH",
				"airport_name" => "Kinmen Airport",
				"municipality" => "Shang-I",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TW",
				"iata_code" => "KYD",
				"airport_name" => "Lanyu Airport",
				"municipality" => "Orchid Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TW",
				"iata_code" => "LZN",
				"airport_name" => "Matsu Nangan Airport",
				"municipality" => "Matsu (Nangan)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TW",
				"iata_code" => "MFK",
				"airport_name" => "Matsu Beigan Airport",
				"municipality" => "Matsu (Beigan)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TW",
				"iata_code" => "MZG",
				"airport_name" => "Penghu Magong Airport",
				"municipality" => "Huxi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TW",
				"iata_code" => "PIF",
				"airport_name" => "Pingtung North Airport",
				"municipality" => "Pingtung",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TW",
				"iata_code" => "RMQ",
				"airport_name" => "Taichung International Airport / Ching Chuang Kang Air Base",
				"municipality" => "Taichung (Qingshui)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TW",
				"iata_code" => "TNN",
				"airport_name" => "Tainan International Airport / Tainan Air Base",
				"municipality" => "Tainan (Rende)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TW",
				"iata_code" => "TPE",
				"airport_name" => "Taiwan Taoyuan International Airport",
				"municipality" => "Taipei",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TW",
				"iata_code" => "TSA",
				"airport_name" => "Taipei Songshan Airport",
				"municipality" => "Taipei City",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TW",
				"iata_code" => "TTT",
				"airport_name" => "Taitung Airport",
				"municipality" => "Taitung City",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TZ",
				"iata_code" => "ARK",
				"airport_name" => "Arusha Airport",
				"municipality" => "Arusha",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TZ",
				"iata_code" => "BKZ",
				"airport_name" => "Bukoba Airport",
				"municipality" => "Bukoba",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TZ",
				"iata_code" => "DAR",
				"airport_name" => "Julius Nyerere International Airport",
				"municipality" => "Dar es Salaam",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TZ",
				"iata_code" => "DOD",
				"airport_name" => "Dodoma Airport",
				"municipality" => "Dodoma",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TZ",
				"iata_code" => "JRO",
				"airport_name" => "Kilimanjaro International Airport",
				"municipality" => "Arusha",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TZ",
				"iata_code" => "LDI",
				"airport_name" => "Lindi Airport",
				"municipality" => "Lindi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TZ",
				"iata_code" => "MBI",
				"airport_name" => "Songwe Airport",
				"municipality" => "Mbeya",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TZ",
				"iata_code" => "MUZ",
				"airport_name" => "Musoma Airport",
				"municipality" => "Musoma",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TZ",
				"iata_code" => "MWZ",
				"airport_name" => "Mwanza Airport",
				"municipality" => "Mwanza",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TZ",
				"iata_code" => "MYW",
				"airport_name" => "Mtwara Airport",
				"municipality" => "Mtwara",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TZ",
				"iata_code" => "SHY",
				"airport_name" => "Shinyanga Airport",
				"municipality" => "Shinyanga",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TZ",
				"iata_code" => "TBO",
				"airport_name" => "Tabora Airport",
				"municipality" => "Tabora",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TZ",
				"iata_code" => "TGT",
				"airport_name" => "Tanga Airport",
				"municipality" => "Tanga",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TZ",
				"iata_code" => "TKQ",
				"airport_name" => "Kigoma Airport",
				"municipality" => "Kigoma",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "TZ",
				"iata_code" => "ZNZ",
				"airport_name" => "Abeid Amani Karume International Airport",
				"municipality" => "Zanzibar",
				"created_at" => $now,
				"updated_at" => $now
			],
		];

		$data5 = [
			[
				"country" => "UA",
				"iata_code" => "CWC",
				"airport_name" => "Chernivtsi International Airport",
				"municipality" => "Chernivtsi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "UA",
				"iata_code" => "DNK",
				"airport_name" => "Dnipropetrovsk International Airport",
				"municipality" => "Dnipropetrovsk",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "UA",
				"iata_code" => "HRK",
				"airport_name" => "Kharkiv International Airport",
				"municipality" => "Kharkiv",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "UA",
				"iata_code" => "IEV",
				"airport_name" => "Kiev Zhuliany International Airport",
				"municipality" => "Kiev",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "UA",
				"iata_code" => "IFO",
				"airport_name" => "Ivano-Frankivsk International Airport",
				"municipality" => "Ivano-Frankivsk",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "UA",
				"iata_code" => "KBP",
				"airport_name" => "Boryspil International Airport",
				"municipality" => "Kiev",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "UA",
				"iata_code" => "KHE",
				"airport_name" => "Kherson International Airport",
				"municipality" => "Kherson",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "UA",
				"iata_code" => "KWG",
				"airport_name" => "Kryvyi Rih International Airport",
				"municipality" => "Kryvyi Rih",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "UA",
				"iata_code" => "LWO",
				"airport_name" => "Lviv International Airport",
				"municipality" => "Lviv",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "UA",
				"iata_code" => "MPW",
				"airport_name" => "Mariupol International Airport",
				"municipality" => "Mariupol",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "UA",
				"iata_code" => "NLV",
				"airport_name" => "Mykolaiv International Airport",
				"municipality" => "Nikolayev",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "UA",
				"iata_code" => "ODS",
				"airport_name" => "Odessa International Airport",
				"municipality" => "Odessa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "UA",
				"iata_code" => "OZH",
				"airport_name" => "Zaporizhzhia International Airport",
				"municipality" => "Zaporizhia",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "UA",
				"iata_code" => "RWN",
				"airport_name" => "Rivne International Airport",
				"municipality" => "Rivne",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "UA",
				"iata_code" => "SIP",
				"airport_name" => "Simferopol International Airport",
				"municipality" => "Simferopol",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "UA",
				"iata_code" => "UDJ",
				"airport_name" => "Uzhhorod International Airport",
				"municipality" => "Uzhhorod",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "UA",
				"iata_code" => "VSG",
				"airport_name" => "Luhansk International Airport",
				"municipality" => "Luhansk",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "UG",
				"iata_code" => "EBB",
				"airport_name" => "Entebbe International Airport",
				"municipality" => "Kampala",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "UG",
				"iata_code" => "OYG",
				"airport_name" => "Moyo Airport",
				"municipality" => "Moyo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "UG",
				"iata_code" => "RUA",
				"airport_name" => "Arua Airport",
				"municipality" => "Arua",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "UG",
				"iata_code" => "SRT",
				"airport_name" => "Soroti Airport",
				"municipality" => "Soroti",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "UG",
				"iata_code" => "ULU",
				"airport_name" => "Gulu Airport",
				"municipality" => "Gulu",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "UM",
				"iata_code" => "AWK",
				"airport_name" => "Wake Island Airfield",
				"municipality" => "Wake Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "ABE",
				"airport_name" => "Lehigh Valley International Airport",
				"municipality" => "Allentown",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "ABI",
				"airport_name" => "Abilene Regional Airport",
				"municipality" => "Abilene",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "ABQ",
				"airport_name" => "Albuquerque International Sunport",
				"municipality" => "Albuquerque",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "ABR",
				"airport_name" => "Aberdeen Regional Airport",
				"municipality" => "Aberdeen",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "ABY",
				"airport_name" => "Southwest Georgia Regional Airport",
				"municipality" => "Albany",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "ACK",
				"airport_name" => "Nantucket Memorial Airport",
				"municipality" => "Nantucket",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "ACT",
				"airport_name" => "Waco Regional Airport",
				"municipality" => "Waco",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "ACV",
				"airport_name" => "California Redwood Coast-Humboldt County Airport",
				"municipality" => "Arcata/Eureka",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "ACY",
				"airport_name" => "Atlantic City International Airport",
				"municipality" => "Atlantic City",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "ADK",
				"airport_name" => "Adak Airport",
				"municipality" => "Adak",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "ADQ",
				"airport_name" => "Kodiak Airport",
				"municipality" => "Kodiak",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "AEX",
				"airport_name" => "Alexandria International Airport",
				"municipality" => "Alexandria",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "AGS",
				"airport_name" => "Augusta Regional At Bush Field",
				"municipality" => "Augusta",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "AHN",
				"airport_name" => "Athens Ben Epps Airport",
				"municipality" => "Athens",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "AKN",
				"airport_name" => "King Salmon Airport",
				"municipality" => "King Salmon",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "ALB",
				"airport_name" => "Albany International Airport",
				"municipality" => "Albany",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "ALO",
				"airport_name" => "Waterloo Regional Airport",
				"municipality" => "Waterloo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "ALS",
				"airport_name" => "San Luis Valley Regional Airport/Bergman Field",
				"municipality" => "Alamosa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "ALW",
				"airport_name" => "Walla Walla Regional Airport",
				"municipality" => "Walla Walla",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "AMA",
				"airport_name" => "Rick Husband Amarillo International Airport",
				"municipality" => "Amarillo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "ANC",
				"airport_name" => "Ted Stevens Anchorage International Airport",
				"municipality" => "Anchorage",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "ANI",
				"airport_name" => "Aniak Airport",
				"municipality" => "Aniak",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "ANN",
				"airport_name" => "Annette Island Airport",
				"municipality" => "Metlakatla",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "ANV",
				"airport_name" => "Anvik Airport",
				"municipality" => "Anvik",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "AOO",
				"airport_name" => "Altoona Blair County Airport",
				"municipality" => "Altoona",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "APN",
				"airport_name" => "Alpena County Regional Airport",
				"municipality" => "Alpena",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "ARC",
				"airport_name" => "Arctic Village Airport",
				"municipality" => "Arctic Village",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "ART",
				"airport_name" => "Watertown International Airport",
				"municipality" => "Watertown",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "ASE",
				"airport_name" => "Aspen-Pitkin Co/Sardy Field",
				"municipality" => "Aspen",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "ATL",
				"airport_name" => "Hartsfield Jackson Atlanta International Airport",
				"municipality" => "Atlanta",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "ATT",
				"airport_name" => "Atmautluak Airport",
				"municipality" => "Atmautluak",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "ATY",
				"airport_name" => "Watertown Regional Airport",
				"municipality" => "Watertown",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "AUG",
				"airport_name" => "Augusta State Airport",
				"municipality" => "Augusta",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "AUS",
				"airport_name" => "Austin Bergstrom International Airport",
				"municipality" => "Austin",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "AVL",
				"airport_name" => "Asheville Regional Airport",
				"municipality" => "Asheville",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "AVP",
				"airport_name" => "Wilkes Barre Scranton International Airport",
				"municipality" => "Wilkes-Barre/Scranton",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "AZA",
				"airport_name" => "Phoenix–Mesa Gateway Airport",
				"municipality" => "Mesa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "AZO",
				"airport_name" => "Kalamazoo Battle Creek International Airport",
				"municipality" => "Kalamazoo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "BDL",
				"airport_name" => "Bradley International Airport",
				"municipality" => "Hartford",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "BDR",
				"airport_name" => "Igor I Sikorsky Memorial Airport",
				"municipality" => "Bridgeport",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "BET",
				"airport_name" => "Bethel Airport",
				"municipality" => "Bethel",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "BFD",
				"airport_name" => "Bradford Regional Airport",
				"municipality" => "Bradford",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "BFF",
				"airport_name" => "Western Neb. Rgnl/William B. Heilig Airport",
				"municipality" => "Scottsbluff",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "BFI",
				"airport_name" => "Boeing Field King County International Airport",
				"municipality" => "Seattle",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "BFL",
				"airport_name" => "Meadows Field",
				"municipality" => "Bakersfield",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "BGM",
				"airport_name" => "Greater Binghamton/Edwin A Link field",
				"municipality" => "Binghamton",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "BGR",
				"airport_name" => "Bangor International Airport",
				"municipality" => "Bangor",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "BHB",
				"airport_name" => "Hancock County-Bar Harbor Airport",
				"municipality" => "Bar Harbor",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "BHM",
				"airport_name" => "Birmingham-Shuttlesworth International Airport",
				"municipality" => "Birmingham",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "BID",
				"airport_name" => "Block Island State Airport",
				"municipality" => "Block Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "BIE",
				"airport_name" => "Beatrice Municipal Airport",
				"municipality" => "Beatrice",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "BIL",
				"airport_name" => "Billings Logan International Airport",
				"municipality" => "Billings",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "BIS",
				"airport_name" => "Bismarck Municipal Airport",
				"municipality" => "Bismarck",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "BKG",
				"airport_name" => "Branson Airport",
				"municipality" => "Branson",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "BKW",
				"airport_name" => "Raleigh County Memorial Airport",
				"municipality" => "Beckley",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "BLF",
				"airport_name" => "Mercer County Airport",
				"municipality" => "Bluefield",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "BLI",
				"airport_name" => "Bellingham International Airport",
				"municipality" => "Bellingham",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "BLV",
				"airport_name" => "Scott AFB/Midamerica Airport",
				"municipality" => "Belleville",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "BMI",
				"airport_name" => "Central Illinois Regional Airport at Bloomington-Normal",
				"municipality" => "Bloomington/Normal",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "BNA",
				"airport_name" => "Nashville International Airport",
				"municipality" => "Nashville",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "BOI",
				"airport_name" => "Boise Air Terminal/Gowen Field",
				"municipality" => "Boise",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "BOS",
				"airport_name" => "Logan International Airport",
				"municipality" => "Boston",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "BPT",
				"airport_name" => "Jack Brooks Regional Airport",
				"municipality" => "Beaumont/Port Arthur",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "BQK",
				"airport_name" => "Brunswick Golden Isles Airport",
				"municipality" => "Brunswick",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "BRD",
				"airport_name" => "Brainerd Lakes Regional Airport",
				"municipality" => "Brainerd",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "BRL",
				"airport_name" => "Southeast Iowa Regional Airport",
				"municipality" => "Burlington",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "BRO",
				"airport_name" => "Brownsville South Padre Island International Airport",
				"municipality" => "Brownsville",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "BRW",
				"airport_name" => "Wiley Post Will Rogers Memorial Airport",
				"municipality" => "Utqiaġvik",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "BTM",
				"airport_name" => "Bert Mooney Airport",
				"municipality" => "Butte",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "BTR",
				"airport_name" => "Baton Rouge Metropolitan Airport",
				"municipality" => "Baton Rouge",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "BTV",
				"airport_name" => "Burlington International Airport",
				"municipality" => "South Burlington",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "BUF",
				"airport_name" => "Buffalo Niagara International Airport",
				"municipality" => "Buffalo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "BUR",
				"airport_name" => "Bob Hope Airport",
				"municipality" => "Burbank",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "BWI",
				"airport_name" => "Baltimore/Washington International Thurgood Marshall Airport",
				"municipality" => "Baltimore",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "BZN",
				"airport_name" => "Gallatin Field",
				"municipality" => "Bozeman",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "CAE",
				"airport_name" => "Columbia Metropolitan Airport",
				"municipality" => "Columbia",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "CAK",
				"airport_name" => "Akron Canton Regional Airport",
				"municipality" => "Akron",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "CDC",
				"airport_name" => "Cedar City Regional Airport",
				"municipality" => "Cedar City",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "CDV",
				"airport_name" => "Merle K (Mudhole) Smith Airport",
				"municipality" => "Cordova",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "CEC",
				"airport_name" => "Jack Mc Namara Field Airport",
				"municipality" => "Crescent City",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "CGI",
				"airport_name" => "Cape Girardeau Regional Airport",
				"municipality" => "Cape Girardeau",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "CHA",
				"airport_name" => "Chattanooga Metropolitan Airport (Lovell Field)",
				"municipality" => "Chattanooga",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "CHO",
				"airport_name" => "Charlottesville Albemarle Airport",
				"municipality" => "Charlottesville",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "CHS",
				"airport_name" => "Charleston International Airport",
				"municipality" => "Charleston",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "CHU",
				"airport_name" => "Chuathbaluk Airport",
				"municipality" => "Chuathbaluk",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "CID",
				"airport_name" => "The Eastern Iowa Airport",
				"municipality" => "Cedar Rapids",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "CIU",
				"airport_name" => "Chippewa County International Airport",
				"municipality" => "Sault Ste Marie",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "CKB",
				"airport_name" => "North Central West Virginia Airport",
				"municipality" => "Clarksburg",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "CLE",
				"airport_name" => "Cleveland Hopkins International Airport",
				"municipality" => "Cleveland",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "CLL",
				"airport_name" => "Easterwood Field",
				"municipality" => "College Station",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "CLM",
				"airport_name" => "William R Fairchild International Airport",
				"municipality" => "Port Angeles",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "CLT",
				"airport_name" => "Charlotte Douglas International Airport",
				"municipality" => "Charlotte",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "CMH",
				"airport_name" => "John Glenn Columbus International Airport",
				"municipality" => "Columbus",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "CMI",
				"airport_name" => "University of Illinois Willard Airport",
				"municipality" => "Savoy",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "CMX",
				"airport_name" => "Houghton County Memorial Airport",
				"municipality" => "Hancock",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "CNM",
				"airport_name" => "Cavern City Air Terminal",
				"municipality" => "Carlsbad",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "COS",
				"airport_name" => "City of Colorado Springs Municipal Airport",
				"municipality" => "Colorado Springs",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "COU",
				"airport_name" => "Columbia Regional Airport",
				"municipality" => "Columbia",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "CPR",
				"airport_name" => "Casper-Natrona County International Airport",
				"municipality" => "Casper",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "CRP",
				"airport_name" => "Corpus Christi International Airport",
				"municipality" => "Corpus Christi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "CRW",
				"airport_name" => "Yeager Airport",
				"municipality" => "Charleston",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "CSG",
				"airport_name" => "Columbus Metropolitan Airport",
				"municipality" => "Columbus",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "CVG",
				"airport_name" => "Cincinnati Northern Kentucky International Airport",
				"municipality" => "Cincinnati / Covington",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "CYS",
				"airport_name" => "Cheyenne Regional Jerry Olson Field",
				"municipality" => "Cheyenne",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "CYT",
				"airport_name" => "Yakataga Airport",
				"municipality" => "Yakataga",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "CZN",
				"airport_name" => "Chisana Airport",
				"municipality" => "Chisana",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "DAB",
				"airport_name" => "Daytona Beach International Airport",
				"municipality" => "Daytona Beach",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "DAL",
				"airport_name" => "Dallas Love Field",
				"municipality" => "Dallas",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "DAY",
				"airport_name" => "James M Cox Dayton International Airport",
				"municipality" => "Dayton",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "DBQ",
				"airport_name" => "Dubuque Regional Airport",
				"municipality" => "Dubuque",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "DCA",
				"airport_name" => "Ronald Reagan Washington National Airport",
				"municipality" => "Washington",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "DDC",
				"airport_name" => "Dodge City Regional Airport",
				"municipality" => "Dodge City",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "DEC",
				"airport_name" => "Decatur Airport",
				"municipality" => "Decatur",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "DEN",
				"airport_name" => "Denver International Airport",
				"municipality" => "Denver",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "DFW",
				"airport_name" => "Dallas Fort Worth International Airport",
				"municipality" => "Dallas-Fort Worth",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "DHN",
				"airport_name" => "Dothan Regional Airport",
				"municipality" => "Dothan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "DLG",
				"airport_name" => "Dillingham Airport",
				"municipality" => "Dillingham",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "DLH",
				"airport_name" => "Duluth International Airport",
				"municipality" => "Duluth",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "DSM",
				"airport_name" => "Des Moines International Airport",
				"municipality" => "Des Moines",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "DTW",
				"airport_name" => "Detroit Metropolitan Wayne County Airport",
				"municipality" => "Detroit",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "DUJ",
				"airport_name" => "DuBois Regional Airport",
				"municipality" => "Dubois",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "DUT",
				"airport_name" => "Tom Madsen (Dutch Harbor) Airport",
				"municipality" => "Unalaska",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "EAR",
				"airport_name" => "Kearney Regional Airport",
				"municipality" => "Kearney",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "EAU",
				"airport_name" => "Chippewa Valley Regional Airport",
				"municipality" => "Eau Claire",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "ECP",
				"airport_name" => "Northwest Florida Beaches International Airport",
				"municipality" => "Panama City Beach",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "EGE",
				"airport_name" => "Eagle County Regional Airport",
				"municipality" => "Eagle",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "EGX",
				"airport_name" => "Egegik Airport",
				"municipality" => "Egegik",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "EKO",
				"airport_name" => "Elko Regional Airport",
				"municipality" => "Elko",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "ELD",
				"airport_name" => "South Arkansas Regional At Goodwin Field",
				"municipality" => "El Dorado",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "ELM",
				"airport_name" => "Elmira Corning Regional Airport",
				"municipality" => "Elmira/Corning",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "ELP",
				"airport_name" => "El Paso International Airport",
				"municipality" => "El Paso",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "EMK",
				"airport_name" => "Emmonak Airport",
				"municipality" => "Emmonak",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "ERI",
				"airport_name" => "Erie International Tom Ridge Field",
				"municipality" => "Erie",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "ESD",
				"airport_name" => "Orcas Island Airport",
				"municipality" => "Eastsound",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "EUG",
				"airport_name" => "Mahlon Sweet Field",
				"municipality" => "Eugene",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "EVV",
				"airport_name" => "Evansville Regional Airport",
				"municipality" => "Evansville",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "EWB",
				"airport_name" => "New Bedford Regional Airport",
				"municipality" => "New Bedford",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "EWN",
				"airport_name" => "Coastal Carolina Regional Airport",
				"municipality" => "New Bern",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "EWR",
				"airport_name" => "Newark Liberty International Airport",
				"municipality" => "New York",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "EYW",
				"airport_name" => "Key West International Airport",
				"municipality" => "Key West",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "FAI",
				"airport_name" => "Fairbanks International Airport",
				"municipality" => "Fairbanks",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "FAR",
				"airport_name" => "Hector International Airport",
				"municipality" => "Fargo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "FAT",
				"airport_name" => "Fresno Yosemite International Airport",
				"municipality" => "Fresno",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "FAY",
				"airport_name" => "Fayetteville Regional Airport - Grannis Field",
				"municipality" => "Fayetteville",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "FCA",
				"airport_name" => "Glacier Park International Airport",
				"municipality" => "Kalispell",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "FHU",
				"airport_name" => "Sierra Vista Municipal Airport / Libby Army Air Field",
				"municipality" => "Fort Huachuca / Sierra Vista",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "FLG",
				"airport_name" => "Flagstaff Pulliam International Airport",
				"municipality" => "Flagstaff",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "FLL",
				"airport_name" => "Fort Lauderdale Hollywood International Airport",
				"municipality" => "Fort Lauderdale",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "FLO",
				"airport_name" => "Florence Regional Airport",
				"municipality" => "Florence",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "FNT",
				"airport_name" => "Bishop International Airport",
				"municipality" => "Flint",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "FOD",
				"airport_name" => "Fort Dodge Regional Airport",
				"municipality" => "Fort Dodge",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "FRD",
				"airport_name" => "Friday Harbor Airport",
				"municipality" => "Friday Harbor",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "FSD",
				"airport_name" => "Sioux Falls Regional Airport / Joe Foss Field",
				"municipality" => "Sioux Falls",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "FSM",
				"airport_name" => "Fort Smith Regional Airport",
				"municipality" => "Fort Smith",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "FWA",
				"airport_name" => "Fort Wayne International Airport",
				"municipality" => "Fort Wayne",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "GCC",
				"airport_name" => "Northeast Wyoming Regional Airport",
				"municipality" => "Gillette",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "GCK",
				"airport_name" => "Garden City Regional Airport",
				"municipality" => "Garden City",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "GCN",
				"airport_name" => "Grand Canyon National Park Airport",
				"municipality" => "Grand Canyon - Tusayan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "GEG",
				"airport_name" => "Spokane International Airport",
				"municipality" => "Spokane",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "GFK",
				"airport_name" => "Grand Forks International Airport",
				"municipality" => "Grand Forks",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "GGG",
				"airport_name" => "East Texas Regional Airport",
				"municipality" => "Longview",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "GGW",
				"airport_name" => "Wokal Field/Glasgow-Valley County Airport",
				"municipality" => "Glasgow",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "GJT",
				"airport_name" => "Grand Junction Regional Airport",
				"municipality" => "Grand Junction",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "GLH",
				"airport_name" => "Mid Delta Regional Airport",
				"municipality" => "Greenville",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "GNV",
				"airport_name" => "Gainesville Regional Airport",
				"municipality" => "Gainesville",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "GPT",
				"airport_name" => "Gulfport Biloxi International Airport",
				"municipality" => "Gulfport",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "GRB",
				"airport_name" => "Austin Straubel International Airport",
				"municipality" => "Green Bay",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "GRI",
				"airport_name" => "Central Nebraska Regional Airport",
				"municipality" => "Grand Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "GRK",
				"airport_name" => "Killeen-Fort Hood Regional Airport / Robert Gray Army Air Field",
				"municipality" => "Killeen",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "GRR",
				"airport_name" => "Gerald R. Ford International Airport",
				"municipality" => "Grand Rapids",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "GSO",
				"airport_name" => "Piedmont Triad International Airport",
				"municipality" => "Greensboro",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "GSP",
				"airport_name" => "Greenville Spartanburg International Airport",
				"municipality" => "Greer",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "GST",
				"airport_name" => "Gustavus Airport",
				"municipality" => "Gustavus",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "GTF",
				"airport_name" => "Great Falls International Airport",
				"municipality" => "Great Falls",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "GTR",
				"airport_name" => "Golden Triangle Regional Airport",
				"municipality" => "Columbus/W Point/Starkville",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "HCR",
				"airport_name" => "Holy Cross Airport",
				"municipality" => "Holy Cross",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "HIB",
				"airport_name" => "Range Regional Airport",
				"municipality" => "Hibbing",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "HII",
				"airport_name" => "Lake Havasu City International Airport",
				"municipality" => "Lake Havasu City",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "HKB",
				"airport_name" => "Healy Lake Airport",
				"municipality" => "Healy Lake",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "HLN",
				"airport_name" => "Helena Regional Airport",
				"municipality" => "Helena",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "HNH",
				"airport_name" => "Hoonah Airport",
				"municipality" => "Hoonah",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "HNL",
				"airport_name" => "Daniel K Inouye International Airport",
				"municipality" => "Honolulu",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "HNM",
				"airport_name" => "Hana Airport",
				"municipality" => "Hana",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "HNS",
				"airport_name" => "Haines Airport",
				"municipality" => "Haines",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "HON",
				"airport_name" => "Huron Regional Airport",
				"municipality" => "Huron",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "HOT",
				"airport_name" => "Memorial Field Airport",
				"municipality" => "Hot Springs",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "HOU",
				"airport_name" => "William P Hobby Airport",
				"municipality" => "Houston",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "HPN",
				"airport_name" => "Westchester County Airport",
				"municipality" => "White Plains",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "HRL",
				"airport_name" => "Valley International Airport",
				"municipality" => "Harlingen",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "HRO",
				"airport_name" => "Boone County Airport",
				"municipality" => "Harrison",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "HSV",
				"airport_name" => "Huntsville International Carl T Jones Field",
				"municipality" => "Huntsville",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "HTS",
				"airport_name" => "Tri-State/Milton J. Ferguson Field",
				"municipality" => "Huntington",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "HUS",
				"airport_name" => "Hughes Airport",
				"municipality" => "Hughes",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "HVN",
				"airport_name" => "Tweed New Haven Airport",
				"municipality" => "New Haven",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "HYA",
				"airport_name" => "Barnstable Municipal Boardman Polando Field",
				"municipality" => "Hyannis",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "IAD",
				"airport_name" => "Washington Dulles International Airport",
				"municipality" => "Washington, DC",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "IAG",
				"airport_name" => "Niagara Falls International Airport",
				"municipality" => "Niagara Falls",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "IAH",
				"airport_name" => "George Bush Intercontinental Houston Airport",
				"municipality" => "Houston",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "ICT",
				"airport_name" => "Wichita Eisenhower National Airport",
				"municipality" => "Wichita",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "IDA",
				"airport_name" => "Idaho Falls Regional Airport",
				"municipality" => "Idaho Falls",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "ILG",
				"airport_name" => "New Castle Airport",
				"municipality" => "Wilmington",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "ILM",
				"airport_name" => "Wilmington International Airport",
				"municipality" => "Wilmington",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "IND",
				"airport_name" => "Indianapolis International Airport",
				"municipality" => "Indianapolis",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "INL",
				"airport_name" => "Falls International Airport",
				"municipality" => "International Falls",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "IPT",
				"airport_name" => "Williamsport Regional Airport",
				"municipality" => "Williamsport",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "IRK",
				"airport_name" => "Kirksville Regional Airport",
				"municipality" => "Kirksville",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "ISP",
				"airport_name" => "Long Island Mac Arthur Airport",
				"municipality" => "Islip",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "ITH",
				"airport_name" => "Ithaca Tompkins Regional Airport",
				"municipality" => "Ithaca",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "ITO",
				"airport_name" => "Hilo International Airport",
				"municipality" => "Hilo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "JAC",
				"airport_name" => "Jackson Hole Airport",
				"municipality" => "Jackson",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "JAN",
				"airport_name" => "Jackson-Medgar Wiley Evers International Airport",
				"municipality" => "Jackson",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "JAX",
				"airport_name" => "Jacksonville International Airport",
				"municipality" => "Jacksonville",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "JBR",
				"airport_name" => "Jonesboro Municipal Airport",
				"municipality" => "Jonesboro",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "JFK",
				"airport_name" => "John F Kennedy International Airport",
				"municipality" => "New York",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "JHM",
				"airport_name" => "Kapalua Airport",
				"municipality" => "Lahaina",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "JLN",
				"airport_name" => "Joplin Regional Airport",
				"municipality" => "Joplin",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "JMS",
				"airport_name" => "Jamestown Regional Airport",
				"municipality" => "Jamestown",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "JNU",
				"airport_name" => "Juneau International Airport",
				"municipality" => "Juneau",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "JST",
				"airport_name" => "John Murtha Johnstown Cambria County Airport",
				"municipality" => "Johnstown",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "KBC",
				"airport_name" => "Birch Creek Airport",
				"municipality" => "Birch Creek",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "KCQ",
				"airport_name" => "Chignik Lake Airport",
				"municipality" => "Chignik Lake",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "KGK",
				"airport_name" => "Koliganek Airport",
				"municipality" => "Koliganek",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "KGX",
				"airport_name" => "Grayling Airport",
				"municipality" => "Grayling",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "KKI",
				"airport_name" => "Akiachak Airport",
				"municipality" => "Akiachak",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "KLG",
				"airport_name" => "Kalskag Airport",
				"municipality" => "Kalskag",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "KLL",
				"airport_name" => "Levelock Airport",
				"municipality" => "Levelock",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "KOA",
				"airport_name" => "Ellison Onizuka Kona International Airport at Keahole",
				"municipality" => "Kailua-Kona",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "KOZ",
				"airport_name" => "Ouzinkie Airport",
				"municipality" => "Ouzinkie",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "KQA",
				"airport_name" => "Akutan Airport",
				"municipality" => "Akutan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "KTN",
				"airport_name" => "Ketchikan International Airport",
				"municipality" => "Ketchikan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "KWN",
				"airport_name" => "Quinhagak Airport",
				"municipality" => "Quinhagak",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "LAN",
				"airport_name" => "Capital City Airport",
				"municipality" => "Lansing",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "LAR",
				"airport_name" => "Laramie Regional Airport",
				"municipality" => "Laramie",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "LAS",
				"airport_name" => "McCarran International Airport",
				"municipality" => "Las Vegas",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "LAX",
				"airport_name" => "Los Angeles International Airport",
				"municipality" => "Los Angeles",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "LBB",
				"airport_name" => "Lubbock Preston Smith International Airport",
				"municipality" => "Lubbock",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "LBE",
				"airport_name" => "Arnold Palmer Regional Airport",
				"municipality" => "Latrobe",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "LBF",
				"airport_name" => "North Platte Regional Airport Lee Bird Field",
				"municipality" => "North Platte",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "LBL",
				"airport_name" => "Liberal Mid-America Regional Airport",
				"municipality" => "Liberal",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "LCH",
				"airport_name" => "Lake Charles Regional Airport",
				"municipality" => "Lake Charles",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "LCK",
				"airport_name" => "Rickenbacker International Airport",
				"municipality" => "Columbus",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "LEB",
				"airport_name" => "Lebanon Municipal Airport",
				"municipality" => "Lebanon",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "LEX",
				"airport_name" => "Blue Grass Airport",
				"municipality" => "Lexington",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "LFT",
				"airport_name" => "Lafayette Regional Airport",
				"municipality" => "Lafayette",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "LGA",
				"airport_name" => "La Guardia Airport",
				"municipality" => "New York",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "LGB",
				"airport_name" => "Long Beach Airport (Daugherty Field)",
				"municipality" => "Long Beach",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "LIH",
				"airport_name" => "Lihue Airport",
				"municipality" => "Lihue",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "LIT",
				"airport_name" => "Bill & Hillary Clinton National Airport/Adams Field",
				"municipality" => "Little Rock",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "LMT",
				"airport_name" => "Crater Lake-Klamath Regional Airport",
				"municipality" => "Klamath Falls",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "LNK",
				"airport_name" => "Lincoln Airport",
				"municipality" => "Lincoln",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "LNS",
				"airport_name" => "Lancaster Airport",
				"municipality" => "Lancaster",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "LNY",
				"airport_name" => "Lanai Airport",
				"municipality" => "Lanai City",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "LPS",
				"airport_name" => "Lopez Island Airport",
				"municipality" => "Lopez",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "LRD",
				"airport_name" => "Laredo International Airport",
				"municipality" => "Laredo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "LSE",
				"airport_name" => "La Crosse Regional Airport",
				"municipality" => "La Crosse",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "LUP",
				"airport_name" => "Kalaupapa Airport",
				"municipality" => "Kalaupapa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "LWS",
				"airport_name" => "Lewiston Nez Perce County Airport",
				"municipality" => "Lewiston",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "LWT",
				"airport_name" => "Lewistown Municipal Airport",
				"municipality" => "Lewistown",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "LYH",
				"airport_name" => "Lynchburg Regional Airport - Preston Glenn Field",
				"municipality" => "Lynchburg",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "MAF",
				"airport_name" => "Midland International Airport",
				"municipality" => "Midland",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "MBS",
				"airport_name" => "MBS International Airport",
				"municipality" => "Saginaw",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "MCG",
				"airport_name" => "McGrath Airport",
				"municipality" => "McGrath",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "MCI",
				"airport_name" => "Kansas City International Airport",
				"municipality" => "Kansas City",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "MCN",
				"airport_name" => "Middle Georgia Regional Airport",
				"municipality" => "Macon",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "MCO",
				"airport_name" => "Orlando International Airport",
				"municipality" => "Orlando",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "MDT",
				"airport_name" => "Harrisburg International Airport",
				"municipality" => "Harrisburg",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "MDW",
				"airport_name" => "Chicago Midway International Airport",
				"municipality" => "Chicago",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "MEI",
				"airport_name" => "Key Field / Meridian Regional Airport",
				"municipality" => "Meridian",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "MEM",
				"airport_name" => "Memphis International Airport",
				"municipality" => "Memphis",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "MFE",
				"airport_name" => "McAllen Miller International Airport",
				"municipality" => "McAllen",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "MFR",
				"airport_name" => "Rogue Valley International Medford Airport",
				"municipality" => "Medford",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "MGM",
				"airport_name" => "Montgomery Regional (Dannelly Field) Airport",
				"municipality" => "Montgomery",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "MGW",
				"airport_name" => "Morgantown Municipal Airport Walter L. (Bill) Hart Field",
				"municipality" => "Morgantown",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "MHK",
				"airport_name" => "Manhattan Regional Airport",
				"municipality" => "Manhattan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "MHR",
				"airport_name" => "Sacramento Mather Airport",
				"municipality" => "Sacramento",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "MHT",
				"airport_name" => "Manchester-Boston Regional Airport",
				"municipality" => "Manchester",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "MIA",
				"airport_name" => "Miami International Airport",
				"municipality" => "Miami",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "MKE",
				"airport_name" => "General Mitchell International Airport",
				"municipality" => "Milwaukee",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "MKG",
				"airport_name" => "Muskegon County Airport",
				"municipality" => "Muskegon",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "MKK",
				"airport_name" => "Molokai Airport",
				"municipality" => "Kaunakakai",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "MKL",
				"airport_name" => "McKellar-Sipes Regional Airport",
				"municipality" => "Jackson",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "MLB",
				"airport_name" => "Melbourne Orlando International Airport",
				"municipality" => "Melbourne",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "MLI",
				"airport_name" => "Quad City International Airport",
				"municipality" => "Moline",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "MLL",
				"airport_name" => "Marshall Don Hunter Sr Airport",
				"municipality" => "Marshall",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "MLS",
				"airport_name" => "Frank Wiley Field",
				"municipality" => "Miles City",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "MLU",
				"airport_name" => "Monroe Regional Airport",
				"municipality" => "Monroe",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "MOB",
				"airport_name" => "Mobile Regional Airport",
				"municipality" => "Mobile",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "MOT",
				"airport_name" => "Minot International Airport",
				"municipality" => "Minot",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "MOU",
				"airport_name" => "Mountain Village Airport",
				"municipality" => "Mountain Village",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "MQT",
				"airport_name" => "Sawyer International Airport",
				"municipality" => "Gwinn",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "MRY",
				"airport_name" => "Monterey Peninsula Airport",
				"municipality" => "Monterey",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "MSL",
				"airport_name" => "Northwest Alabama Regional Airport",
				"municipality" => "Muscle Shoals",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "MSN",
				"airport_name" => "Dane County Regional Truax Field",
				"municipality" => "Madison",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "MSO",
				"airport_name" => "Missoula International Airport",
				"municipality" => "Missoula",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "MSP",
				"airport_name" => "Minneapolis–Saint Paul International Airport / Wold–Chamberlain Field",
				"municipality" => "Minneapolis",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "MSS",
				"airport_name" => "Massena International Airport Richards Field",
				"municipality" => "Massena",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "MSY",
				"airport_name" => "Louis Armstrong New Orleans International Airport",
				"municipality" => "New Orleans",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "MUE",
				"airport_name" => "Waimea Kohala Airport",
				"municipality" => "Waimea (Kamuela)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "MVY",
				"airport_name" => "Martha's Vineyard Airport",
				"municipality" => "Martha's Vineyard",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "MYK",
				"airport_name" => "May Creek Airport",
				"municipality" => "May Creek",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "MYR",
				"airport_name" => "Myrtle Beach International Airport",
				"municipality" => "Myrtle Beach",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "NUP",
				"airport_name" => "Nunapitchuk Airport",
				"municipality" => "Nunapitchuk",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "OAK",
				"airport_name" => "Metropolitan Oakland International Airport",
				"municipality" => "Oakland",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "OGD",
				"airport_name" => "Ogden Hinckley Airport",
				"municipality" => "Ogden",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "OGG",
				"airport_name" => "Kahului Airport",
				"municipality" => "Kahului",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "OGS",
				"airport_name" => "Ogdensburg International Airport",
				"municipality" => "Ogdensburg",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "OKC",
				"airport_name" => "Will Rogers World Airport",
				"municipality" => "Oklahoma City",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "OLH",
				"airport_name" => "Old Harbor Airport",
				"municipality" => "Old Harbor",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "OMA",
				"airport_name" => "Eppley Airfield",
				"municipality" => "Omaha",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "OME",
				"airport_name" => "Nome Airport",
				"municipality" => "Nome",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "ONT",
				"airport_name" => "Ontario International Airport",
				"municipality" => "Ontario",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "ORD",
				"airport_name" => "Chicago O'Hare International Airport",
				"municipality" => "Chicago",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "ORF",
				"airport_name" => "Norfolk International Airport",
				"municipality" => "Norfolk",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "ORH",
				"airport_name" => "Worcester Regional Airport",
				"municipality" => "Worcester",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "ORI",
				"airport_name" => "Port Lions Airport",
				"municipality" => "Port Lions",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "ORV",
				"airport_name" => "Robert (Bob) Curtis Memorial Airport",
				"municipality" => "Noorvik",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "OTH",
				"airport_name" => "Southwest Oregon Regional Airport",
				"municipality" => "North Bend",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "OTZ",
				"airport_name" => "Ralph Wien Memorial Airport",
				"municipality" => "Kotzebue",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "OWB",
				"airport_name" => "Owensboro Daviess County Airport",
				"municipality" => "Owensboro",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "PAE",
				"airport_name" => "Snohomish County (Paine Field) Airport",
				"municipality" => "Everett",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "PAH",
				"airport_name" => "Barkley Regional Airport",
				"municipality" => "Paducah",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "PBG",
				"airport_name" => "Plattsburgh International Airport",
				"municipality" => "Plattsburgh",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "PBI",
				"airport_name" => "Palm Beach International Airport",
				"municipality" => "West Palm Beach",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "PDX",
				"airport_name" => "Portland International Airport",
				"municipality" => "Portland",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "PGD",
				"airport_name" => "Charlotte County Airport",
				"municipality" => "Punta Gorda",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "PHF",
				"airport_name" => "Newport News Williamsburg International Airport",
				"municipality" => "Newport News",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "PHL",
				"airport_name" => "Philadelphia International Airport",
				"municipality" => "Philadelphia",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "PHX",
				"airport_name" => "Phoenix Sky Harbor International Airport",
				"municipality" => "Phoenix",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "PIA",
				"airport_name" => "General Wayne A. Downing Peoria International Airport",
				"municipality" => "Peoria",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "PIB",
				"airport_name" => "Hattiesburg Laurel Regional Airport",
				"municipality" => "Moselle",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "PIE",
				"airport_name" => "St Petersburg Clearwater International Airport",
				"municipality" => "St Petersburg-Clearwater",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "PIH",
				"airport_name" => "Pocatello Regional Airport",
				"municipality" => "Pocatello",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "PIR",
				"airport_name" => "Pierre Regional Airport",
				"municipality" => "Pierre",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "PIT",
				"airport_name" => "Pittsburgh International Airport",
				"municipality" => "Pittsburgh",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "PKB",
				"airport_name" => "Mid Ohio Valley Regional Airport",
				"municipality" => "Parkersburg",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "PLN",
				"airport_name" => "Pellston Regional Airport of Emmet County Airport",
				"municipality" => "Pellston",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "PNE",
				"airport_name" => "Northeast Philadelphia Airport",
				"municipality" => "Philadelphia",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "PNS",
				"airport_name" => "Pensacola International Airport",
				"municipality" => "Pensacola",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "PQI",
				"airport_name" => "Presque Isle International Airport",
				"municipality" => "Presque Isle",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "PQS",
				"airport_name" => "Pilot Station Airport",
				"municipality" => "Pilot Station",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "PRC",
				"airport_name" => "Prescott International Airport - Ernest A. Love Field",
				"municipality" => "Prescott",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "PSC",
				"airport_name" => "Tri Cities Airport",
				"municipality" => "Pasco",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "PSG",
				"airport_name" => "Petersburg James A Johnson Airport",
				"municipality" => "Petersburg",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "PSM",
				"airport_name" => "Portsmouth International at Pease Airport",
				"municipality" => "Portsmouth",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "PSP",
				"airport_name" => "Palm Springs International Airport",
				"municipality" => "Palm Springs",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "PUB",
				"airport_name" => "Pueblo Memorial Airport",
				"municipality" => "Pueblo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "PUW",
				"airport_name" => "Pullman Moscow Regional Airport",
				"municipality" => "Pullman/Moscow",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "PVD",
				"airport_name" => "Theodore Francis Green State Airport",
				"municipality" => "Providence",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "PVU",
				"airport_name" => "Provo-Utah Lake International Airport",
				"municipality" => "Provo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "PWM",
				"airport_name" => "Portland International Jetport",
				"municipality" => "Portland",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "RAP",
				"airport_name" => "Rapid City Regional Airport",
				"municipality" => "Rapid City",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "RDD",
				"airport_name" => "Redding Municipal Airport",
				"municipality" => "Redding",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "RDG",
				"airport_name" => "Reading Regional Airport (Carl A Spaatz Field)",
				"municipality" => "Reading",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "RDM",
				"airport_name" => "Roberts Field",
				"municipality" => "Redmond",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "RDU",
				"airport_name" => "Raleigh Durham International Airport",
				"municipality" => "Raleigh/Durham",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "RFD",
				"airport_name" => "Chicago Rockford International Airport",
				"municipality" => "Chicago/Rockford",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "RHI",
				"airport_name" => "Rhinelander Oneida County Airport",
				"municipality" => "Rhinelander",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "RIC",
				"airport_name" => "Richmond International Airport",
				"municipality" => "Richmond",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "RKS",
				"airport_name" => "Southwest Wyoming Regional Airport",
				"municipality" => "Rock Springs",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "RMP",
				"airport_name" => "Rampart Airport",
				"municipality" => "Rampart",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "RNO",
				"airport_name" => "Reno Tahoe International Airport",
				"municipality" => "Reno",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "ROA",
				"airport_name" => "Roanoke–Blacksburg Regional Airport",
				"municipality" => "Roanoke",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "ROC",
				"airport_name" => "Frederick Douglass Greater Rochester International Airport",
				"municipality" => "Rochester",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "ROW",
				"airport_name" => "Roswell Air Center Airport",
				"municipality" => "Roswell",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "RST",
				"airport_name" => "Rochester International Airport",
				"municipality" => "Rochester",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "RSW",
				"airport_name" => "Southwest Florida International Airport",
				"municipality" => "Fort Myers",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "RUT",
				"airport_name" => "Rutland - Southern Vermont Regional Airport",
				"municipality" => "Rutland",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "SAN",
				"airport_name" => "San Diego International Airport",
				"municipality" => "San Diego",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "SAT",
				"airport_name" => "San Antonio International Airport",
				"municipality" => "San Antonio",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "SAV",
				"airport_name" => "Savannah Hilton Head International Airport",
				"municipality" => "Savannah",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "SBA",
				"airport_name" => "Santa Barbara Municipal Airport",
				"municipality" => "Santa Barbara",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "SBN",
				"airport_name" => "South Bend Regional Airport",
				"municipality" => "South Bend",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "SBP",
				"airport_name" => "San Luis County Regional Airport",
				"municipality" => "San Luis Obispo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "SBY",
				"airport_name" => "Salisbury Ocean City Wicomico Regional Airport",
				"municipality" => "Salisbury",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "SCC",
				"airport_name" => "Deadhorse Airport",
				"municipality" => "Deadhorse",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "SCE",
				"airport_name" => "University Park Airport",
				"municipality" => "State College",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "SDF",
				"airport_name" => "Louisville Muhammad Ali International Airport",
				"municipality" => "Louisville",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "SEA",
				"airport_name" => "Seattle Tacoma International Airport",
				"municipality" => "Seattle",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "SFB",
				"airport_name" => "Orlando Sanford International Airport",
				"municipality" => "Orlando",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "SFO",
				"airport_name" => "San Francisco International Airport",
				"municipality" => "San Francisco",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "SGF",
				"airport_name" => "Springfield Branson National Airport",
				"municipality" => "Springfield",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "SGU",
				"airport_name" => "St George Regional Airport",
				"municipality" => "St George",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "SGY",
				"airport_name" => "Skagway Airport",
				"municipality" => "Skagway",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "SHD",
				"airport_name" => "Shenandoah Valley Regional Airport",
				"municipality" => "Weyers Cave",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "SHG",
				"airport_name" => "Shungnak Airport",
				"municipality" => "Shungnak",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "SHR",
				"airport_name" => "Sheridan County Airport",
				"municipality" => "Sheridan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "SHV",
				"airport_name" => "Shreveport Regional Airport",
				"municipality" => "Shreveport",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "SIT",
				"airport_name" => "Sitka Rocky Gutierrez Airport",
				"municipality" => "Sitka",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "SJC",
				"airport_name" => "Norman Y. Mineta San Jose International Airport",
				"municipality" => "San Jose",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "SJT",
				"airport_name" => "San Angelo Regional Mathis Field",
				"municipality" => "San Angelo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "SLC",
				"airport_name" => "Salt Lake City International Airport",
				"municipality" => "Salt Lake City",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "SLK",
				"airport_name" => "Adirondack Regional Airport",
				"municipality" => "Saranac Lake",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "SLN",
				"airport_name" => "Salina Municipal Airport",
				"municipality" => "Salina",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "SMF",
				"airport_name" => "Sacramento International Airport",
				"municipality" => "Sacramento",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "SMK",
				"airport_name" => "St Michael Airport",
				"municipality" => "St Michael",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "SMX",
				"airport_name" => "Santa Maria Public Airport Captain G Allan Hancock Field",
				"municipality" => "Santa Maria",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "SNA",
				"airport_name" => "John Wayne Airport-Orange County Airport",
				"municipality" => "Santa Ana",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "SNP",
				"airport_name" => "St Paul Island Airport",
				"municipality" => "St Paul Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "SPI",
				"airport_name" => "Abraham Lincoln Capital Airport",
				"municipality" => "Springfield",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "SPS",
				"airport_name" => "Sheppard Air Force Base / Wichita Falls Municipal Airport",
				"municipality" => "Wichita Falls",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "SRQ",
				"airport_name" => "Sarasota Bradenton International Airport",
				"municipality" => "Sarasota/Bradenton",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "STC",
				"airport_name" => "Saint Cloud Regional Airport",
				"municipality" => "Saint Cloud",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "STG",
				"airport_name" => "St George Airport",
				"municipality" => "St George",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "STL",
				"airport_name" => "St Louis Lambert International Airport",
				"municipality" => "St Louis",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "STS",
				"airport_name" => "Charles M. Schulz Sonoma County Airport",
				"municipality" => "Santa Rosa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "SUN",
				"airport_name" => "Friedman Memorial Airport",
				"municipality" => "Hailey",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "SUX",
				"airport_name" => "Sioux Gateway Airport / Brigadier General Bud Day Field",
				"municipality" => "Sioux City",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "SVC",
				"airport_name" => "Grant County Airport",
				"municipality" => "Silver City",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "SWF",
				"airport_name" => "New York Stewart International Airport",
				"municipality" => "Newburgh",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "SXP",
				"airport_name" => "Nunam Iqua Airport",
				"municipality" => "Nunam Iqua",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "SYR",
				"airport_name" => "Syracuse Hancock International Airport",
				"municipality" => "Syracuse",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "TBN",
				"airport_name" => "Waynesville-St. Robert Regional Forney field",
				"municipality" => "Fort Leonard Wood",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "TCT",
				"airport_name" => "Takotna Airport",
				"municipality" => "Takotna",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "TEK",
				"airport_name" => "Tatitlek Airport",
				"municipality" => "Tatitlek",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "TKJ",
				"airport_name" => "Tok Junction Airport",
				"municipality" => "Tok",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "TLA",
				"airport_name" => "Teller Airport",
				"municipality" => "Teller",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "TLH",
				"airport_name" => "Tallahassee Regional Airport",
				"municipality" => "Tallahassee",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "TOL",
				"airport_name" => "Eugene F. Kranz Toledo Express Airport",
				"municipality" => "Toledo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "TPA",
				"airport_name" => "Tampa International Airport",
				"municipality" => "Tampa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "TRI",
				"airport_name" => "Tri-Cities Regional TN/VA Airport",
				"municipality" => "Bristol/Johnson/Kingsport",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "TTN",
				"airport_name" => "Trenton Mercer Airport",
				"municipality" => "Trenton",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "TUL",
				"airport_name" => "Tulsa International Airport",
				"municipality" => "Tulsa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "TUP",
				"airport_name" => "Tupelo Regional Airport",
				"municipality" => "Tupelo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "TUS",
				"airport_name" => "Tucson International Airport / Morris Air National Guard Base",
				"municipality" => "Tucson",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "TVC",
				"airport_name" => "Cherry Capital Airport",
				"municipality" => "Traverse City",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "TWF",
				"airport_name" => "Joslin Field Magic Valley Regional Airport",
				"municipality" => "Twin Falls",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "TXK",
				"airport_name" => "Texarkana Regional Webb Field",
				"municipality" => "Texarkana",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "TYR",
				"airport_name" => "Tyler Pounds Regional Airport",
				"municipality" => "Tyler",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "TYS",
				"airport_name" => "McGhee Tyson Airport",
				"municipality" => "Knoxville",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "UIN",
				"airport_name" => "Quincy Regional Baldwin Field",
				"municipality" => "Quincy",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "USA",
				"airport_name" => "Concord-Padgett Regional Airport",
				"municipality" => "Concord",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "UST",
				"airport_name" => "Northeast Florida Regional Airport",
				"municipality" => "St Augustine",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "VAK",
				"airport_name" => "Chevak Airport",
				"municipality" => "Chevak",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "VCT",
				"airport_name" => "Victoria Regional Airport",
				"municipality" => "Victoria",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "VLD",
				"airport_name" => "Valdosta Regional Airport",
				"municipality" => "Valdosta",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "VPS",
				"airport_name" => "Destin-Fort Walton Beach Airport",
				"municipality" => "Valparaiso",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "WAA",
				"airport_name" => "Wales Airport",
				"municipality" => "Wales",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "WKK",
				"airport_name" => "Aleknagik / New Airport",
				"municipality" => "Aleknagik",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "WLK",
				"airport_name" => "Selawik Airport",
				"municipality" => "Selawik",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "WRG",
				"airport_name" => "Wrangell Airport",
				"municipality" => "Wrangell",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "WST",
				"airport_name" => "Westerly State Airport",
				"municipality" => "Westerly",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "XNA",
				"airport_name" => "Northwest Arkansas Regional Airport",
				"municipality" => "Fayetteville/Springdale/Rogers",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "XWA",
				"airport_name" => "Williston Basin International Airport",
				"municipality" => "Williston",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "YAK",
				"airport_name" => "Yakutat Airport",
				"municipality" => "Yakutat",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "YKM",
				"airport_name" => "Yakima Air Terminal McAllister Field",
				"municipality" => "Yakima",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "US",
				"iata_code" => "YUM",
				"airport_name" => "Yuma International Airport / Marine Corps Air Station Yuma",
				"municipality" => "Yuma",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "UY",
				"iata_code" => "MVD",
				"airport_name" => "Carrasco International /General C L Berisso Airport",
				"municipality" => "Montevideo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "UZ",
				"iata_code" => "AFS",
				"airport_name" => "Sugraly Airport",
				"municipality" => "Zarafshan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "UZ",
				"iata_code" => "AZN",
				"airport_name" => "Andizhan Airport",
				"municipality" => "Andizhan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "UZ",
				"iata_code" => "BHK",
				"airport_name" => "Bukhara International Airport",
				"municipality" => "Bukhara",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "UZ",
				"iata_code" => "FEG",
				"airport_name" => "Fergana International Airport",
				"municipality" => "Fergana",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "UZ",
				"iata_code" => "KSQ",
				"airport_name" => "Karshi Airport",
				"municipality" => "Karshi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "UZ",
				"iata_code" => "NCU",
				"airport_name" => "Nukus Airport",
				"municipality" => "Nukus",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "UZ",
				"iata_code" => "NMA",
				"airport_name" => "Namangan Airport",
				"municipality" => "Namangan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "UZ",
				"iata_code" => "NVI",
				"airport_name" => "Navoi Airport",
				"municipality" => "Navoi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "UZ",
				"iata_code" => "SKD",
				"airport_name" => "Samarkand Airport",
				"municipality" => "Samarkand",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "UZ",
				"iata_code" => "TAS",
				"airport_name" => "Tashkent International Airport",
				"municipality" => "Tashkent",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "UZ",
				"iata_code" => "TMJ",
				"airport_name" => "Termez Airport",
				"municipality" => "Termez",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "UZ",
				"iata_code" => "UGC",
				"airport_name" => "Urgench Airport",
				"municipality" => "Urgench",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VC",
				"iata_code" => "CIW",
				"airport_name" => "Canouan Airport",
				"municipality" => "Canouan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VC",
				"iata_code" => "MQS",
				"airport_name" => "Mustique Airport",
				"municipality" => "Mustique Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VC",
				"iata_code" => "SVD",
				"airport_name" => "Argyle International Airport",
				"municipality" => "Kingstown",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VC",
				"iata_code" => "UNI",
				"airport_name" => "Union Island International Airport",
				"municipality" => "Union Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VE",
				"iata_code" => "AGV",
				"airport_name" => "Oswaldo Guevara Mujica Airport",
				"municipality" => "Acarigua",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VE",
				"iata_code" => "BLA",
				"airport_name" => "General José Antonio Anzoategui International Airport",
				"municipality" => "Barcelona",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VE",
				"iata_code" => "BNS",
				"airport_name" => "Barinas Airport",
				"municipality" => "Barinas",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VE",
				"iata_code" => "BRM",
				"airport_name" => "Barquisimeto International Airport",
				"municipality" => "Barquisimeto",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VE",
				"iata_code" => "CAJ",
				"airport_name" => "Canaima Airport",
				"municipality" => "Canaima",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VE",
				"iata_code" => "CCS",
				"airport_name" => "Simón Bolívar International Airport",
				"municipality" => "Caracas",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VE",
				"iata_code" => "CUM",
				"airport_name" => "Cumaná (Antonio José de Sucre) Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VE",
				"iata_code" => "CUP",
				"airport_name" => "General Francisco Bermúdez Airport",
				"municipality" => "Carúpano",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VE",
				"iata_code" => "CZE",
				"airport_name" => "José Leonardo Chirinos Airport",
				"municipality" => "Coro",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VE",
				"iata_code" => "HGE",
				"airport_name" => "Higuerote Airport",
				"municipality" => "Higuerote",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VE",
				"iata_code" => "ICC",
				"airport_name" => "Andrés Miguel Salazar Marcano Airport",
				"municipality" => "Isla de Coche",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VE",
				"iata_code" => "LRV",
				"airport_name" => "Los Roques Airport",
				"municipality" => "Gran Roque Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VE",
				"iata_code" => "LSP",
				"airport_name" => "Josefa Camejo International Airport",
				"municipality" => "Paraguaná",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VE",
				"iata_code" => "MAR",
				"airport_name" => "La Chinita International Airport",
				"municipality" => "Maracaibo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VE",
				"iata_code" => "MRD",
				"airport_name" => "Alberto Carnevalli Airport",
				"municipality" => "Mérida",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VE",
				"iata_code" => "MUN",
				"airport_name" => "Maturín Airport",
				"municipality" => "Maturín",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VE",
				"iata_code" => "MYC",
				"airport_name" => "Escuela Mariscal Sucre Airport",
				"municipality" => "Maracay",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VE",
				"iata_code" => "PMV",
				"airport_name" => "Del Caribe Santiago Mariño International Airport",
				"municipality" => "Isla Margarita",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VE",
				"iata_code" => "PYH",
				"airport_name" => "Cacique Aramare Airport",
				"municipality" => "Puerto Ayacucho",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VE",
				"iata_code" => "PZO",
				"airport_name" => "General Manuel Carlos Piar International Airport",
				"municipality" => "Puerto Ordaz-Ciudad Guayana",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VE",
				"iata_code" => "SOM",
				"airport_name" => "San Tomé Airport",
				"municipality" => "El Tigre",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VE",
				"iata_code" => "STD",
				"airport_name" => "Mayor Buenaventura Vivas International Airport",
				"municipality" => "Santo Domingo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VE",
				"iata_code" => "SVZ",
				"airport_name" => "San Antonio Del Tachira Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VE",
				"iata_code" => "VIG",
				"airport_name" => "Juan Pablo Pérez Alfonso Airport",
				"municipality" => "El Vigía",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VE",
				"iata_code" => "VLN",
				"airport_name" => "Arturo Michelena International Airport",
				"municipality" => "Valencia",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VE",
				"iata_code" => "VLV",
				"airport_name" => "Dr. Antonio Nicolás Briceño Airport",
				"municipality" => "Valera",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VG",
				"iata_code" => "EIS",
				"airport_name" => "Terrance B. Lettsome International Airport",
				"municipality" => "Road Town",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VG",
				"iata_code" => "VIJ",
				"airport_name" => "Virgin Gorda Airport",
				"municipality" => "Spanish Town",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VI",
				"iata_code" => "STT",
				"airport_name" => "Cyril E. King Airport",
				"municipality" => "Charlotte Amalie",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VI",
				"iata_code" => "STX",
				"airport_name" => "Henry E Rohlsen Airport",
				"municipality" => "Christiansted",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VN",
				"iata_code" => "BMV",
				"airport_name" => "Buon Ma Thuot Airport",
				"municipality" => "Buon Ma Thuot",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VN",
				"iata_code" => "CAH",
				"airport_name" => "Cà Mau Airport",
				"municipality" => "Ca Mau City",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VN",
				"iata_code" => "CXR",
				"airport_name" => "Cam Ranh International Airport / Cam Ranh Air Base",
				"municipality" => "Cam Ranh",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VN",
				"iata_code" => "DAD",
				"airport_name" => "Da Nang International Airport",
				"municipality" => "Da Nang",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VN",
				"iata_code" => "DIN",
				"airport_name" => "Dien Bien Phu Airport",
				"municipality" => "Dien Bien Phu",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VN",
				"iata_code" => "DLI",
				"airport_name" => "Lien Khuong Airport",
				"municipality" => "Da Lat",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VN",
				"iata_code" => "HAN",
				"airport_name" => "Noi Bai International Airport",
				"municipality" => "Soc Son, Hanoi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VN",
				"iata_code" => "HPH",
				"airport_name" => "Cat Bi International Airport",
				"municipality" => "Haiphong",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VN",
				"iata_code" => "HUI",
				"airport_name" => "Phu Bai International Airport",
				"municipality" => "Huế",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VN",
				"iata_code" => "PQC",
				"airport_name" => "Phu Quoc International Airport",
				"municipality" => "Phu Quoc Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VN",
				"iata_code" => "PXU",
				"airport_name" => "Pleiku Airport",
				"municipality" => "Pleiku",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VN",
				"iata_code" => "SGN",
				"airport_name" => "Tan Son Nhat International Airport",
				"municipality" => "Ho Chi Minh City",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VN",
				"iata_code" => "TBB",
				"airport_name" => "Dong Tac Airport",
				"municipality" => "Tuy Hoa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VN",
				"iata_code" => "THD",
				"airport_name" => "Tho Xuan Airport",
				"municipality" => "Thanh Hóa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VN",
				"iata_code" => "UIH",
				"airport_name" => "Phu Cat Airport",
				"municipality" => "Quy Nohn",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VN",
				"iata_code" => "VCA",
				"airport_name" => "Can Tho International Airport",
				"municipality" => "Can Tho",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VN",
				"iata_code" => "VCL",
				"airport_name" => "Chu Lai Airport",
				"municipality" => "Tam Nghĩa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VN",
				"iata_code" => "VCS",
				"airport_name" => "Con Dao Airport",
				"municipality" => "Con Dao",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VN",
				"iata_code" => "VDH",
				"airport_name" => "Dong Hoi Airport",
				"municipality" => "Dong Hoi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VN",
				"iata_code" => "VDO",
				"airport_name" => "Van Don International Airport",
				"municipality" => "Van Don",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VN",
				"iata_code" => "VII",
				"airport_name" => "Vinh Airport",
				"municipality" => "Vinh",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VN",
				"iata_code" => "VKG",
				"airport_name" => "Rach Gia Airport",
				"municipality" => "Rach Gia",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VU",
				"iata_code" => "AUY",
				"airport_name" => "Aneityum Airport",
				"municipality" => "Anatom Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VU",
				"iata_code" => "AWD",
				"airport_name" => "Aniwa Airport",
				"municipality" => "Aniwa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VU",
				"iata_code" => "CCV",
				"airport_name" => "Craig Cove Airport",
				"municipality" => "Craig Cove",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VU",
				"iata_code" => "DLY",
				"airport_name" => "Dillon's Bay Airport",
				"municipality" => "Dillon's Bay",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VU",
				"iata_code" => "EAE",
				"airport_name" => "Siwo Airport",
				"municipality" => "Emae Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VU",
				"iata_code" => "FTA",
				"airport_name" => "Futuna Airport",
				"municipality" => "Futuna Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VU",
				"iata_code" => "IPA",
				"airport_name" => "Ipota Airport",
				"municipality" => "Ipota",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VU",
				"iata_code" => "LNB",
				"airport_name" => "Lamen Bay Airport",
				"municipality" => "Lamen Bay",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VU",
				"iata_code" => "LNE",
				"airport_name" => "Lonorore Airport",
				"municipality" => "Lonorore",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VU",
				"iata_code" => "LOD",
				"airport_name" => "Longana Airport",
				"municipality" => "Longana",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VU",
				"iata_code" => "LPM",
				"airport_name" => "Lamap Airport",
				"municipality" => "Lamap",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VU",
				"iata_code" => "MTV",
				"airport_name" => "Mota Lava Airport",
				"municipality" => "Ablow",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VU",
				"iata_code" => "MWF",
				"airport_name" => "Maewo-Naone Airport",
				"municipality" => "Maewo Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VU",
				"iata_code" => "NUS",
				"airport_name" => "Norsup Airport",
				"municipality" => "Norsup",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VU",
				"iata_code" => "OLJ",
				"airport_name" => "North West Santo Airport",
				"municipality" => "Olpoi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VU",
				"iata_code" => "PBJ",
				"airport_name" => "Tavie Airport",
				"municipality" => "Paama Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VU",
				"iata_code" => "RCL",
				"airport_name" => "Redcliffe Airport",
				"municipality" => "Redcliffe",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VU",
				"iata_code" => "SLH",
				"airport_name" => "Sola Airport",
				"municipality" => "Sola",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VU",
				"iata_code" => "SON",
				"airport_name" => "Santo Pekoa International Airport",
				"municipality" => "Luganville",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VU",
				"iata_code" => "SSR",
				"airport_name" => "Sara Airport",
				"municipality" => "Pentecost Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VU",
				"iata_code" => "SWJ",
				"airport_name" => "Southwest Bay Airport",
				"municipality" => "Malekula Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VU",
				"iata_code" => "TAH",
				"airport_name" => "Tanna Airport",
				"municipality" => "",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VU",
				"iata_code" => "TGH",
				"airport_name" => "Tongoa Airport",
				"municipality" => "Tongoa Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VU",
				"iata_code" => "TOH",
				"airport_name" => "Torres Airstrip",
				"municipality" => "Loh/Linua",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VU",
				"iata_code" => "ULB",
				"airport_name" => "Uléi Airport",
				"municipality" => "Ambrym Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VU",
				"iata_code" => "VLI",
				"airport_name" => "Bauerfield International Airport",
				"municipality" => "Port Vila",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VU",
				"iata_code" => "VLS",
				"airport_name" => "Valesdir Airport",
				"municipality" => "Epi Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VU",
				"iata_code" => "WLH",
				"airport_name" => "Walaha Airport",
				"municipality" => "Walaha",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "VU",
				"iata_code" => "ZGU",
				"airport_name" => "Gaua Island Airport",
				"municipality" => "Gaua Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "WF",
				"iata_code" => "FUT",
				"airport_name" => "Pointe Vele Airport",
				"municipality" => "Futuna Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "WF",
				"iata_code" => "WLS",
				"airport_name" => "Hihifo Airport",
				"municipality" => "Wallis Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "WS",
				"iata_code" => "AAU",
				"airport_name" => "Asau Airport",
				"municipality" => "Asau",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "WS",
				"iata_code" => "APW",
				"airport_name" => "Faleolo International Airport",
				"municipality" => "Apia",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "WS",
				"iata_code" => "MXS",
				"airport_name" => "Maota Airport",
				"municipality" => "Maota",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "XK",
				"iata_code" => "PRN",
				"airport_name" => "Priština Adem Jashari International Airport",
				"municipality" => "Prishtina",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "YE",
				"iata_code" => "AAY",
				"airport_name" => "Al Ghaydah International Airport",
				"municipality" => "Al Ghaydah",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "YE",
				"iata_code" => "ADE",
				"airport_name" => "Aden International Airport",
				"municipality" => "Aden",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "YE",
				"iata_code" => "GXF",
				"airport_name" => "Seiyun Hadhramaut International Airport",
				"municipality" => "Seiyun",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "YE",
				"iata_code" => "HOD",
				"airport_name" => "Hodeidah International Airport",
				"municipality" => "Hodeida",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "YE",
				"iata_code" => "RIY",
				"airport_name" => "Riyan Mukalla International Airport",
				"municipality" => "Riyan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "YE",
				"iata_code" => "SAH",
				"airport_name" => "Sana'a International Airport",
				"municipality" => "Sana'a",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "YE",
				"iata_code" => "SCT",
				"airport_name" => "Socotra International Airport",
				"municipality" => "Socotra Islands",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "YE",
				"iata_code" => "TAI",
				"airport_name" => "Ta'izz International Airport",
				"municipality" => "Ta'izz",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "YT",
				"iata_code" => "DZA",
				"airport_name" => "Dzaoudzi Pamandzi International Airport",
				"municipality" => "Dzaoudzi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ZA",
				"iata_code" => "AAM",
				"airport_name" => "Malamala Airport",
				"municipality" => "Malamala",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ZA",
				"iata_code" => "BFN",
				"airport_name" => "Bram Fischer International Airport",
				"municipality" => "Bloemfontain",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ZA",
				"iata_code" => "CPT",
				"airport_name" => "Cape Town International Airport",
				"municipality" => "Cape Town",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ZA",
				"iata_code" => "DUR",
				"airport_name" => "King Shaka International Airport",
				"municipality" => "Durban",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ZA",
				"iata_code" => "ELS",
				"airport_name" => "Ben Schoeman Airport",
				"municipality" => "East London",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ZA",
				"iata_code" => "GRJ",
				"airport_name" => "George Airport",
				"municipality" => "George",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ZA",
				"iata_code" => "HDS",
				"airport_name" => "Hoedspruit Air Force Base Airport",
				"municipality" => "Hoedspruit",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ZA",
				"iata_code" => "HLA",
				"airport_name" => "Lanseria International Airport",
				"municipality" => "Johannesburg",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ZA",
				"iata_code" => "JNB",
				"airport_name" => "OR Tambo International Airport",
				"municipality" => "Johannesburg",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ZA",
				"iata_code" => "KIM",
				"airport_name" => "Kimberley Airport",
				"municipality" => "Kimberley",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ZA",
				"iata_code" => "MBD",
				"airport_name" => "Mmabatho International Airport",
				"municipality" => "Mafeking",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ZA",
				"iata_code" => "MGH",
				"airport_name" => "Margate Airport",
				"municipality" => "Margate",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ZA",
				"iata_code" => "MQP",
				"airport_name" => "Kruger Mpumalanga International Airport",
				"municipality" => "Mpumalanga",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ZA",
				"iata_code" => "NTY",
				"airport_name" => "Pilanesberg International Airport",
				"municipality" => "Pilanesberg",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ZA",
				"iata_code" => "PBZ",
				"airport_name" => "Plettenberg Bay Airport",
				"municipality" => "Plettenberg Bay",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ZA",
				"iata_code" => "PHW",
				"airport_name" => "Hendrik Van Eck Airport",
				"municipality" => "Phalaborwa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ZA",
				"iata_code" => "PLZ",
				"airport_name" => "Chief Dawid Stuurman International Airport",
				"municipality" => "Port Elizabeth",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ZA",
				"iata_code" => "PTG",
				"airport_name" => "Polokwane International Airport",
				"municipality" => "Polokwane",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ZA",
				"iata_code" => "PZB",
				"airport_name" => "Pietermaritzburg Airport",
				"municipality" => "Pietermaritzburg",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ZA",
				"iata_code" => "RCB",
				"airport_name" => "Richards Bay Airport",
				"municipality" => "Richards Bay",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ZA",
				"iata_code" => "UTN",
				"airport_name" => "Pierre Van Ryneveld Airport",
				"municipality" => "Upington",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ZA",
				"iata_code" => "UTT",
				"airport_name" => "K. D. Matanzima Airport",
				"municipality" => "Mthatha",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ZM",
				"iata_code" => "CIP",
				"airport_name" => "Chipata Airport",
				"municipality" => "Chipata",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ZM",
				"iata_code" => "LUN",
				"airport_name" => "Kenneth Kaunda International Airport",
				"municipality" => "Lusaka",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ZM",
				"iata_code" => "LVI",
				"airport_name" => "Harry Mwanga Nkumbula International Airport",
				"municipality" => "Livingstone",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ZM",
				"iata_code" => "MFU",
				"airport_name" => "Mfuwe Airport",
				"municipality" => "Mfuwe",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ZM",
				"iata_code" => "NLA",
				"airport_name" => "Simon Mwansa Kapwepwe International Airport",
				"municipality" => "Ndola",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ZM",
				"iata_code" => "SLI",
				"airport_name" => "Solwesi Airport",
				"municipality" => "Solwesi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ZW",
				"iata_code" => "BUQ",
				"airport_name" => "Joshua Mqabuko Nkomo International Airport",
				"municipality" => "Bulawayo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ZW",
				"iata_code" => "HRE",
				"airport_name" => "Robert Gabriel Mugabe International Airport",
				"municipality" => "Harare",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"country" => "ZW",
				"iata_code" => "VFA",
				"airport_name" => "Victoria Falls International Airport",
				"municipality" => "Victoria Falls",
				"created_at" => $now,
				"updated_at" => $now
			],
		];

		RefBandara::insert($data1);
		RefBandara::insert($data2);
		RefBandara::insert($data3);
		RefBandara::insert($data4);
		RefBandara::insert($data5);
    }
}
