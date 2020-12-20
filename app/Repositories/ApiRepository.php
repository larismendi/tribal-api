<?php namespace App\Repositories;

use App\Http\Resources\ItunesResource;

class ApiRepository
{
    private $itunesRepository;
    // private $tvmazeRepository;
    // private $crcindRepository;

    public function __construct()
    {
        $this->itunesRepository = new Repository('itunes');
        // $this->tvmazeRepository = new Repository('tvmaze');
        // $this->crcindRepository = new Repository('crcind');
    }

    public function getApiPost($q)
    {
        $itunes = $this->itunesRepository->getPost($q);
        // dd($itunes['result']['results']);
        //$tvmaze = $this->tvmazeRepository->getPost($q);
        //$crcind = $this->crcindRepository->getPost($q);

        $items = collect($itunes['result']['results'])->map(function($row) {
            // dd($row);
            return ItunesResource::make($row)->resolve();
        });

        // $merged = $collection->merge(['price' => 200, 'discount' => false]);
        // $merged->all();

        return $items;
    }
}
