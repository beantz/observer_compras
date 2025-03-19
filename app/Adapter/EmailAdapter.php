<?php

namespace App\Adapter;

use App\pedidosAdapterInterface;
use Spatie\ArrayToXml\ArrayToXml;

class EmailAdapter implements pedidosAdapterInterface {

    //retornar em formato json
    public function adapterData($nameData, $event) {

        if($nameData == "financeiro"){
            
            return response()->json([
                'event' => $event,
            ]);

        } elseif($nameData == "estoque") {

            $xml = ArrayToXml::convert($event->toArray(), 'event');

            return response($xml, 200, ['Content_type' => 'aplication/xml']);

        }

    
    }

}