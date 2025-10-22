<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Admin extends BaseController
{
    public function settings()
    {
        return view('v_template');
    }
}
