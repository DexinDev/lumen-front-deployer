<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Laravel\Lumen\Routing\Controller as BaseController;

class HookController extends BaseController
{
    public function updateHook(){
        Log::debug("REQUEST", request()->all());
        Log::debug("REQUEST TYPE" . request()->json()->event_name);
        Log::debug("REQUEST REF" . basename(request()->json()->ref));
//        Log::debug("catch request", request()->json());
    }
}
