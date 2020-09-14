<?php

namespace App\Http\Controllers;

use App\Helpers\DeployedDirsHelper;
use Laravel\Lumen\Routing\Controller as BaseController;

class ReposListController extends BaseController
{
    private function getBranches()
    {
        $masterPath = app()->path() . '/../../reps/master/';
        exec("cd $masterPath && git ls-remote --heads origin", $out);
        return $out;
    }

    private function modifyData()
    {
        $branches = $this->getBranches();
        $modData = ["dirs" => DeployedDirsHelper::getDirs(), "branches" => []];
        foreach ($branches as $branch) {
            $branch = basename($branch);
            if (!in_array(mb_strtolower($branch), $modData["dirs"])) {
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
