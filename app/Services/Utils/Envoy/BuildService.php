<?php namespace App\Services\Utils\Envoy;

use App\Models\Deploy;

class BuildService
{
    private $deploy;

    public function fire(Deploy $deploy)
    {
        $this->deploy = $deploy;

        if ($this->deploy) {
            return $this->getContent([
                'servers-list' => $this->getServerList(),
                'servers-names' => $this->getServerList(true),
                'folder' => $this->getDeployFolder(),
                'revision' => $this->deploy->commit,
                'branch' => $this->deploy->branch,
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

        throw new Exception("Object 'Environment' or 'Project' not found.");
    }

}