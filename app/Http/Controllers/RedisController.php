<?php
namespace App\Http\Controllers;

use App\Http\Services\RedisService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class RedisController extends Controller
{
    public function index()
    {
        if (!request()->ajax()) {
            return view('redis.index');
        }

        $list       = (new RedisService())->get(request()->all());
        $countList  = count($list);
        $list       = array_slice($list, request()->get('start', 0), request()->get('length', 10));
        $listData   = [];
        foreach($list as $key =>$value){
            $listData[] =
                [
                    'key'   => $key,
                    'value' => $value,
                ];
        }

        return response()->json([
            "draw"              => request()->get('draw', 1),
            "recordsTotal"      => $countList,
            "recordsFiltered"   => $countList,
            'data'              => $listData,
        ]);
    }

    public function add(Request $request)
    {
        $add = (new RedisService())->insert($request->get('key'), $request->get('value'));

        return response()->json([
        ]);
    }

    public function delete(Request $request)
    {
        $add = (new RedisService())->delete($request->get('key'));

        return response()->json([
        ]);
    }
}
