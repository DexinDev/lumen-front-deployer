<?php

namespace App\Http\Controllers;

class BranchDeleteController extends Controller
{

    public function delete($branch) {
        $path = app()->path() . '/../../reps/' . $branch;
        exec("rm -rf $path");

        return redirect('/');
    }

}
