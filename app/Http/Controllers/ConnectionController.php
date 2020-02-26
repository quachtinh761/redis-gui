<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

class ConnectionController extends Controller
{
    public function index()
    {
        if (!request()->ajax()) {
            return view('connection.index');
        }

    }
}
