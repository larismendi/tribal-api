<?php namespace App\Repositories;

use App\Interfaces\RepositoryInterface;

class Repository implements RepositoryInterface
{
    // Repository property on class instances
    protected $repository;

    /**
     * Contruct function
     *
     * @param [type] $repo
     */
    public function __construct($repo)
    {
        switch ($repo) {
            case 'itunes':
                $repository = new ItunesRepository();
                break;
            case 'tvmaze':
                $repository = new TvmazeRepository();
                break;
            case 'crcind':
                $repository = new CrcindRepository();
                break;
        }
        $this->repository = $repository;
    }

    /**
     * GetPost function
     *
     * @param [type] $params
     * @return void
     */
    public function getPost($params)
    {
        return $this->repository->search($params);
    }
}
