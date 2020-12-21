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
        $itunes = collect($itunesRepo)->map(function($row) {
            if($row['wrapperType'] == 'track' &&
                ($row['kind'] == 'feature-movie' || $row['kind'] == 'song')) {
                    return ItunesResource::make($row)->resolve();
            }
            return null;
        });
        $itunes = $this->filterCollection($itunes);

        $tvmazeRepo = $this->tvmazeRepository->getPost($q);
        $tvmaze = collect($tvmazeRepo)->map(function($row) {
            return TvmazeResource::make($row)->resolve();
        });

        $crcindRepo = $this->crcindRepository->getPost($q);
        $crind = collect($crcindRepo)->map(function($row) {
            return CrcindResource::make($row)->resolve();
        });

        $merged = $this->mergeCollection($itunes, $tvmaze);
        $merged = $this->mergeCollection($merged, $crind);
        $merged = $this->sortCollection($merged);

        return response()->success(['result' => $merged]);
    }

    /**
     * sortCollection function
     *
     * @param [type] $collection
     * @return void
     */
    private function sortCollection($collection)
    {
        return $collection->sortBy([
            ['name', 'asc'],
        ]);
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
        return $collection->merge($items);
    }

    /**
     * filterCollection function
     *
     * @param [type] $collection
     * @return void
     */
    private function filterCollection($collection)
    {
        return $collection->filter(function ($value) {
            if (!empty($value) && !is_null($value)) {
                return $value;
            }
        });
    }
}
