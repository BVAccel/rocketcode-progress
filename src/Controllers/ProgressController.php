<?php

namespace Rocketcode\Progress\Controllers;

use Rocketcode\Progress\Progress;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ProgressController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function status(Progress $progress)
    {
        return response()->json($progress);
    }
}
