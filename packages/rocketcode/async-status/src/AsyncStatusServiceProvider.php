<?php

namespace Rocketcode\AsyncStatus;

use Illuminate\Support\ServiceProvider;

class AsyncStatusServiceProvider extends ServiceProvider {
	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot() {
		$this->publishes( [
			__DIR__.'/database/migrations' => base_path( 'database/migrations' )
		] );
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register() {
		include __DIR__ . '/routes.php';
		$this->app->make( 'Rocketcode\AsyncStatus\Controller\AsyncStatusController' );
	}
}
