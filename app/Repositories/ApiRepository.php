<?php namespace App\Repositories;

use App\Http\Resources\CrcindResource;
use App\Http\Resources\ItunesResource;
use App\Http\Resources\TvmazeResource;

class ApiRepository
{
    private $itunesRepository;
    private $tvmazeRepository;
    private $crcindRepository;

    /**
     * Construct function
     */
    public function __construct()
    {
        $this->itunesRepository = new Repository('itunes');
        $this->tvmazeRepository = new Repository('tvmaze');
        $this->crcindRepository = new Repository('crcind');
    }

    /**
     * getApiPost function
     *
     * @param [type] $q
     * @return void
     */
    public function getApiPost($q)
    {
        $itunesRepo = $this->itunesRepository->getPost($q);
        $tvmazeRepo = $this->tvmazeRepository->getPost($q);
        $crcindRepo = $this->crcindRepository->getPost($q);

        $itunes = collect($itunesRepo['results'])->map(function($row) {
            if($row['wrapperType'] == 'track' &&
                ($row['kind'] == 'feature-movie' || $row['kind'] == 'song')) {
                    return ItunesResource::make($row)->resolve();
            }
            return null;
        });

        $tvmaze = collect($tvmazeRepo)->map(function($row) {
            return TvmazeResource::make($row)->resolve();
        });

        $merged = $this->mergeCollection($itunes, $tvmaze);

        $crind = collect($crcindRepo)->map(function($row) {
            return CrcindResource::make($row)->resolve();
        });

        $merged = $this->mergeCollection($merged, $crind);

        return response()->success(['result' => $merged->all()]);
    }

    /**
     * mergeCollection function
     *
     * @param [type] $collection
     * @param [type] $items
     * @return collection
     */
    private function mergeCollection($collection, $items)
    {
        return $collection->merge($items)->filter(function ($value) { return !is_null($value); });
    }
}
