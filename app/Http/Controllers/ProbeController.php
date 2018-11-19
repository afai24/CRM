<?php

namespace crm\Http\Controllers;

use crm\Http\Controllers\Controller;

class ProbeController extends Controller {
    public function prueba($param) {
        return 'estoy dentro de ProbeController y recibi: ' .$param;
    }
}