<?php namespace App\Services\Utils\Envoy;

use App\Models\Deploy;
use Illuminate\Filesystem\Filesystem;

class MakeService
{

    private $filesystem;
    private $execute;
    private $build;

    public function __construct(Filesystem $filesystem, ExecuteService $execute, BuildService $build)
    {
        $this->filesystem = $filesystem;
        $this->execute = $execute;
        $this->build = $build;
    }

    public function fire(Deploy $Deploy)
    {
        $folder = storage_path("envoy/" . md5($Deploy->id));

        if ($Deploy) {
            $content = $this->build->fire($Deploy);

            if ($content) {
                if (!$this->filesystem->isDirectory($folder)) {
                    $this->filesystem->makeDirectory($folder);
                }

                $this->filesystem->put("{$folder}/Envoy.blade.php", $content);
            }

            if ($this->execute->fire($folder)) {
                $Deploy->executed_at = date('Y-m-d H:i:s');
                $Deploy->save();

                return true;
            }
        }

        return false;
    }

}