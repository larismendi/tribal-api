<?php

namespace App\Repositories;

use App\Http\Resources\CrcindResource;
use SoapClient;

class CrcindRepository {
    protected $url;

    public function __construct()
    {
        $this->url = env('CRCIND_URL');
    }

    public function search($params = [])
    {
        $client = new SoapClient($this->url, [
            'trace' => 1,
            'exception' => 0
        ]);
        $response = $client->__soapCall("GetByName", array(
            "GetByName" => array(
                "name" => $params['name']
            )
        ));
        $listByName = simplexml_load_string($response->GetByNameResult->any)->ListByName;

        // regresa como matriz
        $arr = json_decode(json_encode((array) $this->xml2array($listByName)), true)['SQL'];
        return response()->success(['result' => [
            'resultCount' => count($arr),
            'results' => $arr
        ]]);
    }

    /**
     * function to convert xml 2 array
     */
    private function xml2array($xmlObject, $out = array ()) {
        foreach ( (array) $xmlObject as $index => $node ) {
            $out[$index] = ( is_object( $node ) ) ? array( $node ) : $node;
        }

        return $out;
    }
}
