<?php namespace App\Services\Utils\Envoy;

use Illuminate\Filesystem\Filesystem;

class DeleteService
{

    private $filesystem;

    public function __construct(Filesystem $filesystem)
    {
        $this->filesystem = $filesystem;
    }

    public function fire($folder)
    {
        $this->filesystem->delete($folder);
    }

}