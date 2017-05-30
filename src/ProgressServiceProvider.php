<?php

namespace Rocketcode\Progress;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Queue;
use Illuminate\Queue\Events\JobProcessed;
use Illuminate\Queue\Events\JobProcessing;
use Illuminate\Queue\Events\JobFailed;
use Illuminate\Support\Facades\Route;

use Log;

class ProgressServiceProvider extends ServiceProvider {
	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot() {
		$this->registerQueueStart();
		$this->registerQueueCompleted();
		$this->registerQueueFailed();

		Route::prefix( config('rocketcode-progress.base_path' ) )
			->middleware('api')
			->namespace('Rocketcode\Progress')
			->group( __DIR__ . '/routes.php' );

		$this->publishes( [
			__DIR__.'/config' => base_path( 'config' ),
			__DIR__.'/database/migrations' => base_path( 'database/migrations' ),
		] );
	}

	private function registerQueueStart() {
		Queue::before(function (JobProcessing $event) {
			if( $event->job->getConnectionName() != 'sync' ) {
				$id = json_decode( $event->job->getRawBody(), true )['id'];
				if( config( 'rocketcode-progress.log-events') )
					Log::info( "Job $id starting." );
				try {
					$model = Progress::where( 'job_id', $id )->firstOrFail();
					$model->status = "Running";
					$model->save();
				}
				catch( ModelNotFoundException $e ) {}
			}
		});
	}

	private function registerQueueCompleted() {
		Queue::after(function (JobProcessed $event) {
			if( $event->job->getConnectionName() != 'sync' ) {
				$id = json_decode($event->job->getRawBody(), true)['id'];
				if( config( 'rocketcode-progress.log-events') )
					Log::info( "Job $id completed." );
				try {
					$model = Progress::where( 'job_id', $id )->firstOrFail();
					$model->status = "Completed";
					$model->save();
				}
				catch( ModelNotFoundException $e ) {}
			}
		});
	}

	private function registerQueueFailed() {
		Queue::failing(function (JobFailed $event) {
			if( $event->job->getConnectionName() != 'sync' ) {
				$id = json_decode($event->job->getRawBody(), true)['id'];
				if( config( 'rocketcode-progress.log-events') )
					Log::info( "Job $id has failed." );
				try {
					$model = Progress::where( 'job_id', $id )->firstOrFail();
					$model->status = "Failed";
					$model->save();
				}
				catch( ModelNotFoundException $e ) {}
			}
		});
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register() {
	}
}
