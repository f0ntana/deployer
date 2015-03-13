<?php namespace App\Repositories\Vcs;

use App\Contracts\Vcs\VersionControlContract;
use Github\Client;

class GitHubRepository implements VersionControlContract
{

    private $client;

    public function __construct()
    {
        $Client = new Client();
        $Client->authenticate('renatokd', '92774748Re', Client::AUTH_HTTP_PASSWORD);

        $this->client = $Client;
    }

    public function branches($url, $page = 1)
    {
        $branches = $this->client->api('repo')->setPage($page)->setPerPage(10)->branches('LojasKD', 'FC-DEV-AWS');
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