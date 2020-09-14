<?php

namespace App\Http\Controllers;

use App\Helpers\DeployedDirsHelper;
use Illuminate\Support\Facades\Log;
use Laravel\Lumen\Routing\Controller as BaseController;

class HookController extends BaseController
{
    private $_scriptPath;
    private $_logPath;

    public function __construct() {
        $this->_scriptPath = app()->path() . '/../update-rep.sh';
        $this->_logPath = app()->path() . '/../out.log';
    }

    public function updateHook()
    {
        $branch = basename(request()->ref);
        $dirs = DeployedDirsHelper::getDirs();

        if(in_array(mb_strtolower($branch), $dirs)) {
            shell_exec("sh $this->_scriptPath $branch 2>&1 > $this->_logPath");
        }



    }
}
