<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Redis;

class RedisService
{
    public function get(array $filters = [])
    {
        $keys = Redis::command('keys', ['*']);
        $re = [];
        $values = Redis::mget($keys);
        foreach ($keys as $i => $key) {
            $re[$key] = $values[$i];
        }
        return $re;
    }
}
