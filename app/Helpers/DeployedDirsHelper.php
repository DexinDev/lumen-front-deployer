<?php


namespace App\Helpers;


class DeployedDirsHelper
{
    static function getDirs() {
        $clearDirs = [];
        $dirs = glob(app()->path() . '/../../reps/*', GLOB_ONLYDIR);
        foreach ($dirs as $dir) $clearDirs[] = basename($dir);
        return $clearDirs;
    }

}
