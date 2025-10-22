<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Pages extends Controller
{
    public function active()
    {
        return view('active'); // menampilkan file app/Views/active.php
    }

    public function inactive()
    {
        return view('inactive'); // menampilkan file app/Views/inactive.php
    }
    
}
