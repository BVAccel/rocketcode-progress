<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use Log;

class TestJob2 implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 2;

	/**
	 * Create a new job instance.
	 *
	 */
    public function __construct()
    {
        //
    }

	/**
	 * Execute the job.
	 * @return void
	 * @throws \Exception
	 */
    public function handle()
    {
	    Log::info( 'Sleeping to fail.' );
	    sleep( 10 );
	    throw new \Exception("I want this job to die.");
    }
}
