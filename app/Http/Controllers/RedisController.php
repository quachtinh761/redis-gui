<?php
namespace App\Http\Controllers;

use App\Http\Services\RedisService;
use Illuminate\Routing\Controller;

class RedisController extends Controller
{
    public function index()
    {
        $list = (new RedisService())->get(request()->all());
        return view('redis.list', compact('list'));
    }
}
