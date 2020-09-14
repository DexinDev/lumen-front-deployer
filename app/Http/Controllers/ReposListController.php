<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class ReposListController extends BaseController
{
    private function getDirs()
    {
        $dirs = glob(app()->path() . '/../../reps/*', GLOB_ONLYDIR);
        return $dirs;
        return view('index', ["dirs" => $dirs]);
    }

    private function getBranches()
    {
        $masterPath = app()->path() . '/../../reps/master/';
        exec("cd $masterPath && git ls-remote --heads origin", $out);
        return $out;
    }

    private function modifyData()
    {
        $dirs = $this->getDirs();
        $branches = $this->getBranches();
        $modData = ["dirs" => [], "branches" => []];
        foreach ($dirs as $dir) {
            $modData["dirs"][] = basename($dir);
        }
        foreach ($branches as $branch) {
            $branch = basename($branch);
            if (!in_array($branch, $modData["dirs"])) {
                $modData["branches"][] = $branch;
            }
        }

        return $modData;
    }

    public function viewLists()
    {
        $response = $this->modifyData();
        return view("index", $response);
    }
}
