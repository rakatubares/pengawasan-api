<?php

namespace Database\Seeders;

use App\Models\RefKemasan;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class RefKemasanSeeder extends Seeder
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
				"kode_kemasan" => "AE",
				"uraian_kemasan" => "Aerosol",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "AI",
				"uraian_kemasan" => "Clamshell",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "AJ",
				"uraian_kemasan" => "Cone",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "AM",
				"uraian_kemasan" => "Ampoule, non protected",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "AP",
				"uraian_kemasan" => "Ampoule, protected",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "AT",
				"uraian_kemasan" => "Atomizer",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "AV",
				"uraian_kemasan" => "Capsule",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "BA",
				"uraian_kemasan" => "Barrel",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "BB",
				"uraian_kemasan" => "Bobbin",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "BC",
				"uraian_kemasan" => "Bottlecrate, bottlerack",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "BD",
				"uraian_kemasan" => "Board",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "BE",
				"uraian_kemasan" => "Bundle",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "BF",
				"uraian_kemasan" => "Balloon, non-protected",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "BG",
				"uraian_kemasan" => "Bag",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "BH",
				"uraian_kemasan" => "Bunch",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "BI",
				"uraian_kemasan" => "Bin",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "BJ",
				"uraian_kemasan" => "Bucket",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "BK",
				"uraian_kemasan" => "Basket",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "BL",
				"uraian_kemasan" => "Bale, compressed",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "BM",
				"uraian_kemasan" => "Basin",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "BN",
				"uraian_kemasan" => "Bale, non -compressed",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "BO",
				"uraian_kemasan" => "Bottle, non-protected, cylindrical",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "BP",
				"uraian_kemasan" => "Balloon, protected",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "BQ",
				"uraian_kemasan" => "Bottle, protected cylindrical",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "BR",
				"uraian_kemasan" => "Bar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "BS",
				"uraian_kemasan" => "Bottle, non-protected, bulbous",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "BT",
				"uraian_kemasan" => "Bolt",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "BU",
				"uraian_kemasan" => "Butt",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "BV",
				"uraian_kemasan" => "Bottle, protected bulbous",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "BX",
				"uraian_kemasan" => "Box",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "BY",
				"uraian_kemasan" => "Board, in bundle/bunch/truss",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "BZ",
				"uraian_kemasan" => "Bars, in bundle/bunch/truss",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "CA",
				"uraian_kemasan" => "Can, rectangular",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "CB",
				"uraian_kemasan" => "Beer crate",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "CC",
				"uraian_kemasan" => "Churn",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "CD",
				"uraian_kemasan" => "Can, with handle and spout",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "CE",
				"uraian_kemasan" => "Creel",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "CF",
				"uraian_kemasan" => "Coffer",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "CG",
				"uraian_kemasan" => "Cage",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "CH",
				"uraian_kemasan" => "Chest",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "CI",
				"uraian_kemasan" => "Canister",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "CJ",
				"uraian_kemasan" => "Coffin",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "CK",
				"uraian_kemasan" => "Cask",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "CL",
				"uraian_kemasan" => "Coil",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "CM",
				"uraian_kemasan" => "Card",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "CN",
				"uraian_kemasan" => "Container",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "CO",
				"uraian_kemasan" => "Carboy, non-protected",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "CP",
				"uraian_kemasan" => "Carboy, protected",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "CQ",
				"uraian_kemasan" => "Cartridge",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "CR",
				"uraian_kemasan" => "Crate",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "CS",
				"uraian_kemasan" => "Case",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "CT",
				"uraian_kemasan" => "Carton",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "CU",
				"uraian_kemasan" => "Cup",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "CV",
				"uraian_kemasan" => "Cover",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "CW",
				"uraian_kemasan" => "Cage, roll",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "CX",
				"uraian_kemasan" => "Can, cylindical",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "CY",
				"uraian_kemasan" => "Cylinder",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "CZ",
				"uraian_kemasan" => "Canvas",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "DJ",
				"uraian_kemasan" => "Demijohn, non-protected",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "DN",
				"uraian_kemasan" => "Dispenser",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "DP",
				"uraian_kemasan" => "Demijohn, protected",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "DR",
				"uraian_kemasan" => "Drum",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "EI",
				"uraian_kemasan" => "Case, isothermic",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "EN",
				"uraian_kemasan" => "Envelope",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "FC",
				"uraian_kemasan" => "Fruit crate",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "FD",
				"uraian_kemasan" => "Framed crate",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "FI",
				"uraian_kemasan" => "Firkin",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "FL",
				"uraian_kemasan" => "Flask",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "FO",
				"uraian_kemasan" => "Footlocker",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "FP",
				"uraian_kemasan" => "Filmpack",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "FR",
				"uraian_kemasan" => "Frame",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "FT",
				"uraian_kemasan" => "Foodtainer",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "FW",
				"uraian_kemasan" => "Cart, flatbed",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "GB",
				"uraian_kemasan" => "Gas bottle",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "GI",
				"uraian_kemasan" => "Girder",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "GZ",
				"uraian_kemasan" => "Girders, in bundle/bunch/truss",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "HG",
				"uraian_kemasan" => "Hogshead",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "HR",
				"uraian_kemasan" => "Hamper",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "IN",
				"uraian_kemasan" => "Ingot",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "IZ",
				"uraian_kemasan" => "ingots, in bundle/bunch/truss",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "JC",
				"uraian_kemasan" => "Jerrican, rectangular",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "JG",
				"uraian_kemasan" => "Jug",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "JR",
				"uraian_kemasan" => "Jar",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "JT",
				"uraian_kemasan" => "Jutebag",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "JY",
				"uraian_kemasan" => "Jerrican, cylindrical",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "KG",
				"uraian_kemasan" => "Keg",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "LG",
				"uraian_kemasan" => "Log",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "LT",
				"uraian_kemasan" => "Lot",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "LV",
				"uraian_kemasan" => "Liftvan",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "LZ",
				"uraian_kemasan" => "Logs, in bundle/bunch/truss",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "MB",
				"uraian_kemasan" => "Multiply bag",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "MC",
				"uraian_kemasan" => "milk crate",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "MS",
				"uraian_kemasan" => "Multiwall sack",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "MT",
				"uraian_kemasan" => "Mat",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "MX",
				"uraian_kemasan" => "Macth box",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "NA",
				"uraian_kemasan" => "Not available",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "NE",
				"uraian_kemasan" => "Unpacked or unpackaged",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "NS",
				"uraian_kemasan" => "Nest",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "NT",
				"uraian_kemasan" => "Net",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "OK",
				"uraian_kemasan" => "Block",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "PA",
				"uraian_kemasan" => "Packet",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "PC",
				"uraian_kemasan" => "Parcel",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "PF",
				"uraian_kemasan" => "Pen",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "PG",
				"uraian_kemasan" => "Plate",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "PH",
				"uraian_kemasan" => "Pitcher",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "PI",
				"uraian_kemasan" => "Pipe",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "PJ",
				"uraian_kemasan" => "Punnet",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "PK",
				"uraian_kemasan" => "Package",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "PL",
				"uraian_kemasan" => "Pail",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "PN",
				"uraian_kemasan" => "Plank",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "PO",
				"uraian_kemasan" => "Pouch",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "PR",
				"uraian_kemasan" => "Receptacle",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "PT",
				"uraian_kemasan" => "Pot",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "PU",
				"uraian_kemasan" => "Tray pack",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "PX",
				"uraian_kemasan" => "Pallet",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "PY",
				"uraian_kemasan" => "Plates, in bundle/bunch/truss",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "PZ",
				"uraian_kemasan" => "Planks/Pipes, in bundle/bunch/truss",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "RD",
				"uraian_kemasan" => "Rod",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "RG",
				"uraian_kemasan" => "Ring",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "RJ",
				"uraian_kemasan" => "Rack, clothing hanger",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "RK",
				"uraian_kemasan" => "Rack",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "RL",
				"uraian_kemasan" => "Reel",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "RO",
				"uraian_kemasan" => "Roll",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "RT",
				"uraian_kemasan" => "Rednet",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "RZ",
				"uraian_kemasan" => "Rods, in bundle/ bunch/truss",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "SA",
				"uraian_kemasan" => "Sack",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "SB",
				"uraian_kemasan" => "Slab",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "SC",
				"uraian_kemasan" => "Shallow crate",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "SD",
				"uraian_kemasan" => "Spindle",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "SE",
				"uraian_kemasan" => "Sea-chest",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "SH",
				"uraian_kemasan" => "Sachet",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "SI",
				"uraian_kemasan" => "Skid",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "SK",
				"uraian_kemasan" => "Skeleton case",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "SL",
				"uraian_kemasan" => "Slipsheet",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "SM",
				"uraian_kemasan" => "Sheetmetal",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "SO",
				"uraian_kemasan" => "Spool",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "ST",
				"uraian_kemasan" => "Sheet",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "SU",
				"uraian_kemasan" => "Suitcase",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "SW",
				"uraian_kemasan" => "Shrinkwrapped",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "SY",
				"uraian_kemasan" => "Sleeve",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "SZ",
				"uraian_kemasan" => "Sheets, in bundle/bunch/truss",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "TB",
				"uraian_kemasan" => "Tub",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "TC",
				"uraian_kemasan" => "Tea-chest",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "TD",
				"uraian_kemasan" => "Tube, collapsible",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "TI",
				"uraian_kemasan" => "Tierce",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "TK",
				"uraian_kemasan" => "Tank, rectangular",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "TN",
				"uraian_kemasan" => "Tin",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "TO",
				"uraian_kemasan" => "Tun",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "TP",
				"uraian_kemasan" => "Tray",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "TR",
				"uraian_kemasan" => "Trunk",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "TS",
				"uraian_kemasan" => "Truss",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "TU",
				"uraian_kemasan" => "Tube",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "TY",
				"uraian_kemasan" => "Tank, cylindrical",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "TZ",
				"uraian_kemasan" => "Tubes, in bundle/bunch/truss",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "UC",
				"uraian_kemasan" => "Uncaged",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "VA",
				"uraian_kemasan" => "Vat",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "VG",
				"uraian_kemasan" => "Bulk, gas ( at 1031 mbar and 15C )",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "VI",
				"uraian_kemasan" => "Vial",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "VK",
				"uraian_kemasan" => "Vanpack",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "VL",
				"uraian_kemasan" => "Bulk, liquid",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "VN",
				"uraian_kemasan" => "Vehicle",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "VO",
				"uraian_kemasan" => "Bulk, solid, large particles ('nodules')",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "VP",
				"uraian_kemasan" => "Vacuumpacked",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "VQ",
				"uraian_kemasan" => "Bulk, liquefied gas (at abnormal temperature)",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "VR",
				"uraian_kemasan" => "Bulk, solid, granular particles ('grains')",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "VY",
				"uraian_kemasan" => "Bulk, solid, fine particles ('powders')",
				"created_at" => $now,
				"updated_at" => $now
			],
			[
				"kode_kemasan" => "WB",
				"uraian_kemasan" => "Wickerbottle",
				"created_at" => $now,
				"updated_at" => $now
			]
		];

		RefKemasan::insert($data);
	}
}
