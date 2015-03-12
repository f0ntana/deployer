<?php namespace App\Services\Utils;

use App\Models\Deploy;
use Exception;
use Illuminate\Filesystem\Filesystem;

class EnvoyService
{

    private $folder;
    private $deploy;
    private $filesystem;

    public function __construct(Filesystem $filesystem)
    {
        $this->filesystem = $filesystem;
    }

    public function make(Deploy $Deploy)
    {
        $this->deploy = $Deploy;
        $this->folder = storage_path("envoy/" . md5($this->deploy->id));

        if ($this->deploy) {
            $content = $this->build();

            if ($content) {
                if (!$this->filesystem->isDirectory($this->folder)) {
                    $this->filesystem->makeDirectory($this->folder, 777, true);
                }

                $this->filesystem->put("{$this->folder}/Envoy.blade.php", $content);

                return true;
            }
        }

        throw new Exception("Object 'Deploy' not found.");
    }

    private function build()
    {
        if ($this->deploy) {
            return $this->getContent([
                'servers-list' => $this->getServerList(),
                'servers-names' => $this->getServerList(true),
                'folder' => $this->getDeployFolder(),
                'revision' => $this->deploy->commit,
            ]);
        }

        throw new Exception("Object 'Deploy' not found.");
    }

    private function getContent(array $data)
    {
        $output = $this->deploy->project->envoy;

        foreach ($data as $key => $value) {
            $output = str_replace("{{$key}}", $value, $output);
        }

        return $output;
    }

    private function getServerList($names = false)
    {
        $Servers = $this->deploy->environment->servers;
        $output = [];

        if ($Servers->count()) {
            foreach ($Servers as $Server) {
                if ($names) {
                    $output[] = $Server->slug;
                } else {
                    $output[$Server->slug] = $Server->ip;
                }
            }
        }

        if ($names) {
            return json_encode($output);
        } else {
            $output = str_replace('{', '[', json_encode($output));
            $output = str_replace('}', ']', $output);
            $output = str_replace(':', '=>', $output);

            return $output;
        }
    }

    private function getDeployFolder()
    {
        $Environment = $this->deploy->environment;
        $Project = $this->deploy->project;

        if ($Environment && $Project) {

            return str_replace("{env}", "/{$Environment->folder}", $Project->folder);
        }

        throw new Exception("Object 'Environment' or 'Project'  not found.");
    }

    public function execute()
    {
        $command = "cd {$this->folder} && envoy run deploy";
        dd($command);

        // exec($command_deploy , $outputs_deploy, $ret_deploy);
    }

    private function array2string($data)
    {
        $log_a = "";

        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $log_a .= "[" . $key . "] => (" . $this->array2string($value) . ") \n";
            } else {
                $log_a .= "[" . $key . "] => " . $value . "\n";
            }
        }

        return $log_a;
    }

}
