<?php

namespace Rocketcode\Progress;

use Illuminate\Database\Eloquent\Model;

class Progress extends Model {
	protected $guarded = [];

	public function __construct(array $attributes = []) {
		parent::__construct($attributes);
		$this->table = config( 'rocketcode-progress.table_name' );
	}

	public static function monitor( $job_id ) {
		$instance = new static( ['job_id'=>$job_id] );
		$instance->save();
		return $instance->id;
	}
}