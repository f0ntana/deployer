<?php namespace App\Contracts\Vcs;

interface VersionControlContract
{

    public function branches($url, $page);

}