<?php

namespace Rocketcode\Progress;

use Illuminate\Support\ServiceProvider;

class ProgressServiceProvider extends ServiceProvider {
	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot() {
		$this->publishes( [
			__DIR__.'/config' => base_path( 'config' ),
			__DIR__.'/database/migrations' => base_path( 'database/migrations' ),
		] );
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register() {
		include __DIR__ . '/routes.php';
		$this->app->make( 'Rocketcode\Progress\Controller\ProgressController' );
	}
}
