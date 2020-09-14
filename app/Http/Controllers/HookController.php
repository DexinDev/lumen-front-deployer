<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Laravel\Lumen\Routing\Controller as BaseController;

class HookController extends BaseController
{
    public function updateHook(){
        Log::debug("EVENT NAME" . basename(request()->ref) );
//        Log::debug("catch request", request()->json());
    }
}
