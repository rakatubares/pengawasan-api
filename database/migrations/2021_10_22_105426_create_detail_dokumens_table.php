<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailDokumensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_dokumens', function (Blueprint $table) {
            $table->id();
			$table->morphs('dokumenable');
			$table->string('jns_dok')->nullable()->index();
			$table->string('no_dok')->index();
			$table->date('tgl_dok')->nullable()->index();
            $table->timestamps();
			$table->softDeletes($column = 'deleted_at', $precision = 0);
            $table->index('dokumenable_type');
			$table->index('dokumenable_id');
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
        Schema::dropIfExists('detail_dokumens');
    }
}
