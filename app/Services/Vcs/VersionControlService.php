<?php namespace App\Services\Vcs;

use App\Contracts\Vcs\VersionControlContract;
use Request;

class VersionControlService
{

    public function getBranches(VersionControlContract $contract, $url)
    {
        return $contract->branches($url, Request::get('page', 1));
    }

}