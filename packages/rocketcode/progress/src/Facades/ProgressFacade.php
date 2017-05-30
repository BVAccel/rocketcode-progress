<?php
/**
 * Created by PhpStorm.
 * User: tonysantucci
 * Date: 5/26/17
 * Time: 9:05 AM
 */

namespace Rocketcode\Progress\Facades;

use Illuminate\Support\Facades\Facade;

class ProgressStatusFacade {
	protected static function getFacadeAccessor() { return 'Rocketcode\Progress'; }
}