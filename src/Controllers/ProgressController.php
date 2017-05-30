<?php

namespace Rocketcode\Progress\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Rocketcode\Progress\Progress;

class ProgressController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function status(Progress $progress)
    {
        return response()->json($progress);
    }
}
