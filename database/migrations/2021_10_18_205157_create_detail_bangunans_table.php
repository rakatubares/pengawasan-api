<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailBangunansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_bangunans', function (Blueprint $table) {
            $table->id();
			$table->morphs('bangunanable');
			$table->text('alamat');
			$table->string('no_reg')->nullable()->index();
			$table->string('pemilik')->index();
			$table->string('jns_identitas')->nullable()->index();
			$table->string('no_identitas')->nullable()->index();
            $table->timestamps();
			$table->softDeletes($column = 'deleted_at', $precision = 0);
			$table->index('bangunanable_type');
			$table->index('bangunanable_id');
			$table->index('created_at');
			$table->index('updated_at');
			$table->index('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_bangunans');
    }
}
