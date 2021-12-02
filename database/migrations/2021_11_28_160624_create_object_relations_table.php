<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObjectRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('object_relations', function (Blueprint $table) {
            $table->id();
			$table->morphs('object1');
			$table->morphs('object2');
            $table->timestamps();
			$table->softDeletes($column = 'deleted_at', $precision = 0);
			$table->index('object1_type');
			$table->index('object1_id');
			$table->index('object2_type');
			$table->index('object2_id');
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
        Schema::dropIfExists('object_relations');
    }
}
