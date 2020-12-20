<?php

namespace App\Repositories;

use App\Http\Resources\CrcindResource;
use SoapClient;

class CrcindRepository {
    protected $url;

    /**
     * Construct function
     */
    public function __construct()
    {
        $this->url = env('CRCIND_URL');
    }

    /**
     * Search function
     *
     * @param [type] $param
     * @return void
     */
    public function search($param)
    {
        $items = [];
        $client = new SoapClient($this->url, [
            'trace' => 1,
            'exception' => 0
        ]);
        $response = $client->__soapCall("GetByName", array(
            "GetByName" => array(
                "name" => $param['q']
            )
        ));
        $listByName = simplexml_load_string($response->GetByNameResult->any)->ListByName;

        // regresa como matriz
        $arr = json_decode(json_encode((array) $this->xml2array($listByName)), true);
        if (isset($arr['SQL'])) {
            $items = $arr['SQL'];
        }
        return $items;
    }

    /**
     * xml2array function
     *
     * @param [type] $xmlObject
     * @param [type] $out
     * @return void
     */
    private function xml2array($xmlObject, $out = array ()) {
        foreach ( (array) $xmlObject as $index => $node ) {
            $out[$index] = ( is_object( $node ) ) ? array( $node ) : $node;
        }

        return $out;
    }
}
