<?php namespace App\Repositories\Vcs;

use App\Contracts\Vcs\VersionControlContract;
use Bitbucket\API\Authentication\Basic as Auth;
use Bitbucket\API\Repositories\Repository;

class BitBucketRepository implements VersionControlContract
{

    private $repository;

    public function __construct(Repository $repository)
    {
        $repository->setCredentials(new Auth('rdehnhardt', '92774748Re'));

        $this->repository = $repository;
    }

    public function branches($url, $page = 1)
    {
        $Response = $this->repository->branches('pix-sound', 'pixsound');
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