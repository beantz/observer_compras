<?php

namespace App\Adapter;

use App\pedidosAdapterInterface;

class EstoqueAdapter implements pedidosAdapterInterface {

    //retornar em formato json
    public function adapterData($data) {

        return response()->json([
            'data' => $data,
        ]);

    }

}