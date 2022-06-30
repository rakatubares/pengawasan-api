<?php

namespace Database\Seeders;

use App\Models\RefNegara;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class RefNegaraSeeder extends Seeder
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
				"kode_2" => "AD",
				"kode_3" => "AND",
				"nama_negara" => "Andorra",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "AE",
				"kode_3" => "ARE",
				"nama_negara" => "United Arab Emirates (the)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "AF",
				"kode_3" => "AFG",
				"nama_negara" => "Afghanistan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "AG",
				"kode_3" => "ATG",
				"nama_negara" => "Antigua and Barbuda",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "AI",
				"kode_3" => "AIA",
				"nama_negara" => "Anguilla",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "AL",
				"kode_3" => "ALB",
				"nama_negara" => "Albania",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "AM",
				"kode_3" => "ARM",
				"nama_negara" => "Armenia",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "AO",
				"kode_3" => "AGO",
				"nama_negara" => "Angola",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "AQ",
				"kode_3" => "ATA",
				"nama_negara" => "Antarctica",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "AR",
				"kode_3" => "ARG",
				"nama_negara" => "Argentina",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "AS",
				"kode_3" => "ASM",
				"nama_negara" => "American Samoa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "AT",
				"kode_3" => "AUT",
				"nama_negara" => "Austria",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "AU",
				"kode_3" => "AUS",
				"nama_negara" => "Australia",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "AW",
				"kode_3" => "ABW",
				"nama_negara" => "Aruba",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "AX",
				"kode_3" => "ALA",
				"nama_negara" => "Åland Islands",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "AZ",
				"kode_3" => "AZE",
				"nama_negara" => "Azerbaijan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "BA",
				"kode_3" => "BIH",
				"nama_negara" => "Bosnia and Herzegovina",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "BB",
				"kode_3" => "BRB",
				"nama_negara" => "Barbados",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "BD",
				"kode_3" => "BGD",
				"nama_negara" => "Bangladesh",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "BE",
				"kode_3" => "BEL",
				"nama_negara" => "Belgium",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "BF",
				"kode_3" => "BFA",
				"nama_negara" => "Burkina Faso",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "BG",
				"kode_3" => "BGR",
				"nama_negara" => "Bulgaria",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "BH",
				"kode_3" => "BHR",
				"nama_negara" => "Bahrain",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "BI",
				"kode_3" => "BDI",
				"nama_negara" => "Burundi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "BJ",
				"kode_3" => "BEN",
				"nama_negara" => "Benin",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "BL",
				"kode_3" => "BLM",
				"nama_negara" => "Saint Barthélemy",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "BM",
				"kode_3" => "BMU",
				"nama_negara" => "Bermuda",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "BN",
				"kode_3" => "BRN",
				"nama_negara" => "Brunei Darussalam",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "BO",
				"kode_3" => "BOL",
				"nama_negara" => "Bolivia (Plurinational State of)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "BQ",
				"kode_3" => "BES",
				"nama_negara" => "Bonaire, Sint Eustatius and Saba",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "BR",
				"kode_3" => "BRA",
				"nama_negara" => "Brazil",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "BS",
				"kode_3" => "BHS",
				"nama_negara" => "Bahamas (the)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "BT",
				"kode_3" => "BTN",
				"nama_negara" => "Bhutan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "BV",
				"kode_3" => "BVT",
				"nama_negara" => "Bouvet Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "BW",
				"kode_3" => "BWA",
				"nama_negara" => "Botswana",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "BY",
				"kode_3" => "BLR",
				"nama_negara" => "Belarus",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "BZ",
				"kode_3" => "BLZ",
				"nama_negara" => "Belize",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "CA",
				"kode_3" => "CAN",
				"nama_negara" => "Canada",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "CC",
				"kode_3" => "CCK",
				"nama_negara" => "Cocos (Keeling) Islands (the)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "CD",
				"kode_3" => "COD",
				"nama_negara" => "Congo (the Democratic Republic of the)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "CF",
				"kode_3" => "CAF",
				"nama_negara" => "Central African Republic (the)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "CG",
				"kode_3" => "COG",
				"nama_negara" => "Congo (the)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "CH",
				"kode_3" => "CHE",
				"nama_negara" => "Switzerland",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "CI",
				"kode_3" => "CIV",
				"nama_negara" => "Côte d'Ivoire",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "CK",
				"kode_3" => "COK",
				"nama_negara" => "Cook Islands (the)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "CL",
				"kode_3" => "CHL",
				"nama_negara" => "Chile",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "CM",
				"kode_3" => "CMR",
				"nama_negara" => "Cameroon",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "CN",
				"kode_3" => "CHN",
				"nama_negara" => "China",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "CO",
				"kode_3" => "COL",
				"nama_negara" => "Colombia",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "CR",
				"kode_3" => "CRI",
				"nama_negara" => "Costa Rica",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "CU",
				"kode_3" => "CUB",
				"nama_negara" => "Cuba",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "CV",
				"kode_3" => "CPV",
				"nama_negara" => "Cabo Verde",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "CW",
				"kode_3" => "CUW",
				"nama_negara" => "Curaçao",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "CX",
				"kode_3" => "CXR",
				"nama_negara" => "Christmas Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "CY",
				"kode_3" => "CYP",
				"nama_negara" => "Cyprus",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "CZ",
				"kode_3" => "CZE",
				"nama_negara" => "Czechia",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "DE",
				"kode_3" => "DEU",
				"nama_negara" => "Germany",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "DJ",
				"kode_3" => "DJI",
				"nama_negara" => "Djibouti",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "DK",
				"kode_3" => "DNK",
				"nama_negara" => "Denmark",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "DM",
				"kode_3" => "DMA",
				"nama_negara" => "Dominica",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "DO",
				"kode_3" => "DOM",
				"nama_negara" => "Dominican Republic (the)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "DZ",
				"kode_3" => "DZA",
				"nama_negara" => "Algeria",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "EC",
				"kode_3" => "ECU",
				"nama_negara" => "Ecuador",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "EE",
				"kode_3" => "EST",
				"nama_negara" => "Estonia",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "EG",
				"kode_3" => "EGY",
				"nama_negara" => "Egypt",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "EH",
				"kode_3" => "ESH",
				"nama_negara" => "Western Sahara*",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "ER",
				"kode_3" => "ERI",
				"nama_negara" => "Eritrea",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "ES",
				"kode_3" => "ESP",
				"nama_negara" => "Spain",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "ET",
				"kode_3" => "ETH",
				"nama_negara" => "Ethiopia",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "FI",
				"kode_3" => "FIN",
				"nama_negara" => "Finland",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "FJ",
				"kode_3" => "FJI",
				"nama_negara" => "Fiji",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "FK",
				"kode_3" => "FLK",
				"nama_negara" => "Falkland Islands (the) [Malvinas]",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "FM",
				"kode_3" => "FSM",
				"nama_negara" => "Micronesia (Federated States of)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "FO",
				"kode_3" => "FRO",
				"nama_negara" => "Faroe Islands (the)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "FR",
				"kode_3" => "FRA",
				"nama_negara" => "France",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "GA",
				"kode_3" => "GAB",
				"nama_negara" => "Gabon",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "GB",
				"kode_3" => "GBR",
				"nama_negara" => "United Kingdom of Great Britain and Northern Ireland (the)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "GD",
				"kode_3" => "GRD",
				"nama_negara" => "Grenada",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "GE",
				"kode_3" => "GEO",
				"nama_negara" => "Georgia",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "GF",
				"kode_3" => "GUF",
				"nama_negara" => "French Guiana",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "GG",
				"kode_3" => "GGY",
				"nama_negara" => "Guernsey",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "GH",
				"kode_3" => "GHA",
				"nama_negara" => "Ghana",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "GI",
				"kode_3" => "GIB",
				"nama_negara" => "Gibraltar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "GL",
				"kode_3" => "GRL",
				"nama_negara" => "Greenland",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "GM",
				"kode_3" => "GMB",
				"nama_negara" => "Gambia (the)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "GN",
				"kode_3" => "GIN",
				"nama_negara" => "Guinea",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "GP",
				"kode_3" => "GLP",
				"nama_negara" => "Guadeloupe",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "GQ",
				"kode_3" => "GNQ",
				"nama_negara" => "Equatorial Guinea",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "GR",
				"kode_3" => "GRC",
				"nama_negara" => "Greece",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "GS",
				"kode_3" => "SGS",
				"nama_negara" => "South Georgia and the South Sandwich Islands",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "GT",
				"kode_3" => "GTM",
				"nama_negara" => "Guatemala",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "GU",
				"kode_3" => "GUM",
				"nama_negara" => "Guam",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "GW",
				"kode_3" => "GNB",
				"nama_negara" => "Guinea-Bissau",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "GY",
				"kode_3" => "GUY",
				"nama_negara" => "Guyana",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "HK",
				"kode_3" => "HKG",
				"nama_negara" => "Hong Kong",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "HM",
				"kode_3" => "HMD",
				"nama_negara" => "Heard Island and McDonald Islands",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "HN",
				"kode_3" => "HND",
				"nama_negara" => "Honduras",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "HR",
				"kode_3" => "HRV",
				"nama_negara" => "Croatia",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "HT",
				"kode_3" => "HTI",
				"nama_negara" => "Haiti",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "HU",
				"kode_3" => "HUN",
				"nama_negara" => "Hungary",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "ID",
				"kode_3" => "IDN",
				"nama_negara" => "Indonesia",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "IE",
				"kode_3" => "IRL",
				"nama_negara" => "Ireland",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "IL",
				"kode_3" => "ISR",
				"nama_negara" => "Israel",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "IM",
				"kode_3" => "IMN",
				"nama_negara" => "Isle of Man",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "IN",
				"kode_3" => "IND",
				"nama_negara" => "India",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "IO",
				"kode_3" => "IOT",
				"nama_negara" => "British Indian Ocean Territory (the)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "IQ",
				"kode_3" => "IRQ",
				"nama_negara" => "Iraq",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "IR",
				"kode_3" => "IRN",
				"nama_negara" => "Iran (Islamic Republic of)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "IS",
				"kode_3" => "ISL",
				"nama_negara" => "Iceland",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "IT",
				"kode_3" => "ITA",
				"nama_negara" => "Italy",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "JE",
				"kode_3" => "JEY",
				"nama_negara" => "Jersey",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "JM",
				"kode_3" => "JAM",
				"nama_negara" => "Jamaica",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "JO",
				"kode_3" => "JOR",
				"nama_negara" => "Jordan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "JP",
				"kode_3" => "JPN",
				"nama_negara" => "Japan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "KE",
				"kode_3" => "KEN",
				"nama_negara" => "Kenya",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "KG",
				"kode_3" => "KGZ",
				"nama_negara" => "Kyrgyzstan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "KH",
				"kode_3" => "KHM",
				"nama_negara" => "Cambodia",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "KI",
				"kode_3" => "KIR",
				"nama_negara" => "Kiribati",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "KM",
				"kode_3" => "COM",
				"nama_negara" => "Comoros (the)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "KN",
				"kode_3" => "KNA",
				"nama_negara" => "Saint Kitts and Nevis",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "KP",
				"kode_3" => "PRK",
				"nama_negara" => "Korea (the Democratic People's Republic of)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "KR",
				"kode_3" => "KOR",
				"nama_negara" => "Korea (the Republic of)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "KW",
				"kode_3" => "KWT",
				"nama_negara" => "Kuwait",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "KY",
				"kode_3" => "CYM",
				"nama_negara" => "Cayman Islands (the)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "KZ",
				"kode_3" => "KAZ",
				"nama_negara" => "Kazakhstan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "LA",
				"kode_3" => "LAO",
				"nama_negara" => "Lao People's Democratic Republic (the)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "LB",
				"kode_3" => "LBN",
				"nama_negara" => "Lebanon",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "LC",
				"kode_3" => "LCA",
				"nama_negara" => "Saint Lucia",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "LI",
				"kode_3" => "LIE",
				"nama_negara" => "Liechtenstein",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "LK",
				"kode_3" => "LKA",
				"nama_negara" => "Sri Lanka",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "LR",
				"kode_3" => "LBR",
				"nama_negara" => "Liberia",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "LS",
				"kode_3" => "LSO",
				"nama_negara" => "Lesotho",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "LT",
				"kode_3" => "LTU",
				"nama_negara" => "Lithuania",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "LU",
				"kode_3" => "LUX",
				"nama_negara" => "Luxembourg",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "LV",
				"kode_3" => "LVA",
				"nama_negara" => "Latvia",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "LY",
				"kode_3" => "LBY",
				"nama_negara" => "Libya",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "MA",
				"kode_3" => "MAR",
				"nama_negara" => "Morocco",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "MC",
				"kode_3" => "MCO",
				"nama_negara" => "Monaco",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "MD",
				"kode_3" => "MDA",
				"nama_negara" => "Moldova (the Republic of)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "ME",
				"kode_3" => "MNE",
				"nama_negara" => "Montenegro",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "MF",
				"kode_3" => "MAF",
				"nama_negara" => "Saint Martin (French part)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "MG",
				"kode_3" => "MDG",
				"nama_negara" => "Madagascar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "MH",
				"kode_3" => "MHL",
				"nama_negara" => "Marshall Islands (the)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "MK",
				"kode_3" => "MKD",
				"nama_negara" => "North Macedonia",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "ML",
				"kode_3" => "MLI",
				"nama_negara" => "Mali",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "MM",
				"kode_3" => "MMR",
				"nama_negara" => "Myanmar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "MN",
				"kode_3" => "MNG",
				"nama_negara" => "Mongolia",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "MO",
				"kode_3" => "MAC",
				"nama_negara" => "Macao",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "MP",
				"kode_3" => "MNP",
				"nama_negara" => "Northern Mariana Islands (the)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "MQ",
				"kode_3" => "MTQ",
				"nama_negara" => "Martinique",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "MR",
				"kode_3" => "MRT",
				"nama_negara" => "Mauritania",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "MS",
				"kode_3" => "MSR",
				"nama_negara" => "Montserrat",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "MT",
				"kode_3" => "MLT",
				"nama_negara" => "Malta",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "MU",
				"kode_3" => "MUS",
				"nama_negara" => "Mauritius",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "MV",
				"kode_3" => "MDV",
				"nama_negara" => "Maldives",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "MW",
				"kode_3" => "MWI",
				"nama_negara" => "Malawi",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "MX",
				"kode_3" => "MEX",
				"nama_negara" => "Mexico",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "MY",
				"kode_3" => "MYS",
				"nama_negara" => "Malaysia",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "MZ",
				"kode_3" => "MOZ",
				"nama_negara" => "Mozambique",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "NA",
				"kode_3" => "NAM",
				"nama_negara" => "Namibia",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "NC",
				"kode_3" => "NCL",
				"nama_negara" => "New Caledonia",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "NE",
				"kode_3" => "NER",
				"nama_negara" => "Niger (the)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "NF",
				"kode_3" => "NFK",
				"nama_negara" => "Norfolk Island",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "NG",
				"kode_3" => "NGA",
				"nama_negara" => "Nigeria",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "NI",
				"kode_3" => "NIC",
				"nama_negara" => "Nicaragua",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "NL",
				"kode_3" => "NLD",
				"nama_negara" => "Netherlands (the)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "NO",
				"kode_3" => "NOR",
				"nama_negara" => "Norway",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "NP",
				"kode_3" => "NPL",
				"nama_negara" => "Nepal",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "NR",
				"kode_3" => "NRU",
				"nama_negara" => "Nauru",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "NU",
				"kode_3" => "NIU",
				"nama_negara" => "Niue",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "NZ",
				"kode_3" => "NZL",
				"nama_negara" => "New Zealand",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "OM",
				"kode_3" => "OMN",
				"nama_negara" => "Oman",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "PA",
				"kode_3" => "PAN",
				"nama_negara" => "Panama",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "PE",
				"kode_3" => "PER",
				"nama_negara" => "Peru",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "PF",
				"kode_3" => "PYF",
				"nama_negara" => "French Polynesia",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "PG",
				"kode_3" => "PNG",
				"nama_negara" => "Papua New Guinea",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "PH",
				"kode_3" => "PHL",
				"nama_negara" => "Philippines (the)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "PK",
				"kode_3" => "PAK",
				"nama_negara" => "Pakistan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "PL",
				"kode_3" => "POL",
				"nama_negara" => "Poland",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "PM",
				"kode_3" => "SPM",
				"nama_negara" => "Saint Pierre and Miquelon",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "PN",
				"kode_3" => "PCN",
				"nama_negara" => "Pitcairn",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "PR",
				"kode_3" => "PRI",
				"nama_negara" => "Puerto Rico",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "PS",
				"kode_3" => "PSE",
				"nama_negara" => "Palestine, State of",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "PT",
				"kode_3" => "PRT",
				"nama_negara" => "Portugal",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "PW",
				"kode_3" => "PLW",
				"nama_negara" => "Palau",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "PY",
				"kode_3" => "PRY",
				"nama_negara" => "Paraguay",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "QA",
				"kode_3" => "QAT",
				"nama_negara" => "Qatar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "RE",
				"kode_3" => "REU",
				"nama_negara" => "Réunion",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "RO",
				"kode_3" => "ROU",
				"nama_negara" => "Romania",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "RS",
				"kode_3" => "SRB",
				"nama_negara" => "Serbia",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "RU",
				"kode_3" => "RUS",
				"nama_negara" => "Russian Federation (the)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "RW",
				"kode_3" => "RWA",
				"nama_negara" => "Rwanda",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "SA",
				"kode_3" => "SAU",
				"nama_negara" => "Saudi Arabia",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "SB",
				"kode_3" => "SLB",
				"nama_negara" => "Solomon Islands",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "SC",
				"kode_3" => "SYC",
				"nama_negara" => "Seychelles",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "SD",
				"kode_3" => "SDN",
				"nama_negara" => "Sudan (the)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "SE",
				"kode_3" => "SWE",
				"nama_negara" => "Sweden",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "SG",
				"kode_3" => "SGP",
				"nama_negara" => "Singapore",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "SH",
				"kode_3" => "SHN",
				"nama_negara" => "Saint Helena, Ascension and Tristan da Cunha",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "SI",
				"kode_3" => "SVN",
				"nama_negara" => "Slovenia",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "SJ",
				"kode_3" => "SJM",
				"nama_negara" => "Svalbard and Jan Mayen",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "SK",
				"kode_3" => "SVK",
				"nama_negara" => "Slovakia",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "SL",
				"kode_3" => "SLE",
				"nama_negara" => "Sierra Leone",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "SM",
				"kode_3" => "SMR",
				"nama_negara" => "San Marino",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "SN",
				"kode_3" => "SEN",
				"nama_negara" => "Senegal",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "SO",
				"kode_3" => "SOM",
				"nama_negara" => "Somalia",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "SR",
				"kode_3" => "SUR",
				"nama_negara" => "Suriname",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "SS",
				"kode_3" => "SSD",
				"nama_negara" => "South Sudan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "ST",
				"kode_3" => "STP",
				"nama_negara" => "Sao Tome and Principe",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "SV",
				"kode_3" => "SLV",
				"nama_negara" => "El Salvador",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "SX",
				"kode_3" => "SXM",
				"nama_negara" => "Sint Maarten (Dutch part)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "SY",
				"kode_3" => "SYR",
				"nama_negara" => "Syrian Arab Republic (the)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "SZ",
				"kode_3" => "SWZ",
				"nama_negara" => "Eswatini",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "TC",
				"kode_3" => "TCA",
				"nama_negara" => "Turks and Caicos Islands (the)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "TD",
				"kode_3" => "TCD",
				"nama_negara" => "Chad",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "TF",
				"kode_3" => "ATF",
				"nama_negara" => "French Southern Territories (the)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "TG",
				"kode_3" => "TGO",
				"nama_negara" => "Togo",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "TH",
				"kode_3" => "THA",
				"nama_negara" => "Thailand",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "TJ",
				"kode_3" => "TJK",
				"nama_negara" => "Tajikistan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "TK",
				"kode_3" => "TKL",
				"nama_negara" => "Tokelau",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "TL",
				"kode_3" => "TLS",
				"nama_negara" => "Timor-Leste",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "TM",
				"kode_3" => "TKM",
				"nama_negara" => "Turkmenistan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "TN",
				"kode_3" => "TUN",
				"nama_negara" => "Tunisia",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "TO",
				"kode_3" => "TON",
				"nama_negara" => "Tonga",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "TR",
				"kode_3" => "TUR",
				"nama_negara" => "Turkey",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "TT",
				"kode_3" => "TTO",
				"nama_negara" => "Trinidad and Tobago",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "TV",
				"kode_3" => "TUV",
				"nama_negara" => "Tuvalu",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "TW",
				"kode_3" => "TWN",
				"nama_negara" => "Taiwan (Province of China)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "TZ",
				"kode_3" => "TZA",
				"nama_negara" => "Tanzania, the United Republic of",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "UA",
				"kode_3" => "UKR",
				"nama_negara" => "Ukraine",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "UG",
				"kode_3" => "UGA",
				"nama_negara" => "Uganda",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "UM",
				"kode_3" => "UMI",
				"nama_negara" => "United States Minor Outlying Islands (the)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "US",
				"kode_3" => "USA",
				"nama_negara" => "United States of America (the)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "UY",
				"kode_3" => "URY",
				"nama_negara" => "Uruguay",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "UZ",
				"kode_3" => "UZB",
				"nama_negara" => "Uzbekistan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "VA",
				"kode_3" => "VAT",
				"nama_negara" => "Holy See (the)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "VC",
				"kode_3" => "VCT",
				"nama_negara" => "Saint Vincent and the Grenadines",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "VE",
				"kode_3" => "VEN",
				"nama_negara" => "Venezuela (Bolivarian Republic of)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "VG",
				"kode_3" => "VGB",
				"nama_negara" => "Virgin Islands (British)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "VI",
				"kode_3" => "VIR",
				"nama_negara" => "Virgin Islands (U.S.)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "VN",
				"kode_3" => "VNM",
				"nama_negara" => "Viet Nam",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "VU",
				"kode_3" => "VUT",
				"nama_negara" => "Vanuatu",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "WF",
				"kode_3" => "WLF",
				"nama_negara" => "Wallis and Futuna",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "WS",
				"kode_3" => "WSM",
				"nama_negara" => "Samoa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "YE",
				"kode_3" => "YEM",
				"nama_negara" => "Yemen",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "YT",
				"kode_3" => "MYT",
				"nama_negara" => "Mayotte",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "ZA",
				"kode_3" => "ZAF",
				"nama_negara" => "South Africa",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "ZM",
				"kode_3" => "ZMB",
				"nama_negara" => "Zambia",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_2" => "ZW",
				"kode_3" => "ZWE",
				"nama_negara" => "Zimbabwe",
				"created_at" => $now,
				"updated_at" => $now
			],
		];

		RefNegara::insert($data);
    }
}
