<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProgressJobTable extends Migration {

	private $config;

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		$this->config = config( 'rocketcode-progress' );
		if( !Schema::hasTable( $this->config['table_name'] ) ) {
			Schema::create( $this->config['table_name'], function ( Blueprint $table ) {

				$table->increments( 'id' );
				$table->string( 'status' )->default( 'Queued' );
				$table->string( 'job_id' );
				$table->timestamps();

				if( $this->config['use_soft_deletes'] )
					$table->softDeletes();

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
		$this->config = config( 'rocketcode-progress' );
		Schema::drop( $this->config['table_name'] );
	}
}
