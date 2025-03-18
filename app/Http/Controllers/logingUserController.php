<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class logingUserController {

    public function message($message) {
        echo "$message";
    }

}

app()->singleton('logingUserController', function () {
    return new logingUserController();
});
