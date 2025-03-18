<?php

namespace App\Adapter;

use App\pedidosAdapterInterface;
use Spatie\ArrayToXml\ArrayToXml;

class FinanceiroAdapter implements pedidosAdapterInterface {

    //retornar em formato xml
    public function adapterData($data) {
        
        $xml = ArrayToXml::convert($data, 'data');

        return response($xml, 200, ['Content_type' => 'aplication/xml']);

    }

}