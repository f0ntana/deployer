<?php namespace App\Repositories\Vcs;

use App\Contracts\Vcs\VersionControlContract;
use App\Services\Utils\GetRepoAndProjectService;
use Github\Client;

class GitHubRepository implements VersionControlContract
{

    private $service;
    private $client;

    public function __construct(GetRepoAndProjectService $service)
    {
        $Client = new Client();
        $Client->authenticate('renatokd', '92774748Re', Client::AUTH_HTTP_PASSWORD);

        $this->service = $service;
        $this->client = $Client;
    }

    public function branches($url, $page = 1)
    {
        $data = $this->service->fire($url);
        $branches = $this->client->api('repo')->setPage($page)->setPerPage(10)->branches($data['repo'], $data['project']);
        $output = [
            'pagination' => [
                'previous' => $page - 1,
                'next' => $page + 1
            ]
        ];

        if ($branches) {
            foreach ($branches as $branch) {
                $output['branches'][] = [
                    'hash' => $branch['commit']['sha'],
                    'branch' => $branch['name'],
                ];
            }
        }

        return $output;
    }

}