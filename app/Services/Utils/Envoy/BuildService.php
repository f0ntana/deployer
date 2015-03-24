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
                'server_list' => $this->getServerList(),
                'server_names' => $this->getServerList(true),
                'folder' => $this->getDeployFolder(),
                'revision' => $this->deploy->commit,
                'branch' => $this->deploy->branch,
            ]);
        }
    }

    private function getContent(array $data)
    {
        $output = $this->deploy->project->envoy;

        foreach ($data as $key => $value) {
            $output = str_replace('{' . $key . '}', $value, $output);
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
                    $output[$Server->slug] = "{$Server->login}@{$Server->ip}";
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
        return str_replace("{env}", "/{$this->deploy->environment->folder}", $this->deploy->project->folder);
    }

}