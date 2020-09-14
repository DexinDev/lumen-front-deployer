<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class DeployController extends BaseController
{
    private $_scriptPath;
    private $_logPath;

    public function __construct() {
        $this->_scriptPath = app()->path() . '/../clone-rep.sh';
        $this->_logPath = app()->path() . '/../out.log';
    }

    public function deploy($branch) {
        shell_exec("sh $this->_scriptPath $branch 2>&1 > $this->_logPath");

        return redirect('/');
    }
}
