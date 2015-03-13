<?php namespace App\Repositories\Vcs;

use App\Contracts\Vcs\VersionControlContract;
use App\Services\Utils\GetRepoAndProjectService;
use Bitbucket\API\Authentication\Basic as Auth;
use Bitbucket\API\Repositories\Repository;

class BitBucketRepository implements VersionControlContract
{

    private $repository;
    private $service;

    public function __construct(Repository $repository, GetRepoAndProjectService $service)
    {
        $repository->setCredentials(new Auth('rdehnhardt', '92774748Re'));

        $this->repository = $repository;
        $this->service = $service;
    }

    public function branches($url, $page = 1)
    {
        $data = $this->service->fire($url);
        $Response = $this->repository->branches($data['repo'], $data['project']);
        $Content = json_decode($Response->getContent());
        $output = [
            'pagination' => [
                'previous' => $page - 1,
                'next' => $page + 1
            ]
        ];

        if ($Content) {
            foreach ($Content as $name => $Object) {
                $output['branches'][] = [
                    'hash' => $Object->raw_node,
                    'branch' => $name,
                ];
            }
        }

        return $output;
    }

}