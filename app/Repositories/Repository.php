<?php namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Interfaces\RepositoryInterface;

class Repository implements RepositoryInterface
{
    // repository property on class instances
    protected $repository;

    // Constructor to bind repository to repo
    public function __construct($repo)
    {
        switch ($repo['provider']) {
            case 'itunes':
                $repository = new ItunesRepository();
                break;
            case 'tvmaze':
                $repository = new TvmazeRepository();
                break;
        }
        $this->repository = $repository;
    }

    // Get all instances of repository
    public function getPost($params)
    {
        return $this->repository->search($params);
    }
}
