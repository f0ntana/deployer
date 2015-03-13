<?php namespace App\Services\Utils;

use DB;

class GetRepoAndProjectService
{
    public function fire($url)
    {
        preg_match("/:(.+).git/", $url, $output);

        if (array_key_exists(1, $output)) {
            $tmp = explode('/', $output[1]);
            return [
                'repo' => $tmp[0],
                'project' => $tmp[1],
            ];
        }

        return;
    }
}