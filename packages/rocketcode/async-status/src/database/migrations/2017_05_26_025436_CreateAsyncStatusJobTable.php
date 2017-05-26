<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAsyncStatusJobTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		if( !Schema::hasTable( 'async_status_job_tracker') ) {
			Schema::create( 'async_status_job_tracker', function ( Blueprint $table ) {
				$table->increments( 'id' );
				$table->string( 'status' )->default( 'Queued' );
				$table->string( 'job_id' );
				$table->timestamps();

				$table->index( 'job_id' );
			} );
		}
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop( 'async_status_job_tracker' );
	}
}
