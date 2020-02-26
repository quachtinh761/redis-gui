<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Redis;

class RedisService
{
    public function get(array $filters = [])
    {
        $keys = Redis::command('keys', ['*' . ($filters['search']['value'] ?? '') . '*']);
        if (!count($keys)) {
            return [];
        }

        $values = Redis::mget($keys);
        foreach ($keys as $i => $key) {
            $re[$key] = $values[$i];
        }

        if (!empty($filters['order'])) {
            switch ($filters['order'][0]['column']) {
                case 1:
                    ($filters['order'][0]['dir'] == 'asc') ? ksort($re) : krsort($re);
                    break;
                case 2:
                    ($filters['order'][0]['dir'] == 'asc') ? asort($re) : arsort($re);
                    break;
            }
        }

        return $re;
    }

    public function insert($key, $value)
    {
        $values = Redis::set($key, $value);

        return $values;
    }

    public function delete($key = '')
    {
        $result = Redis::del($key);

        return $result;
    }

    public function searchKey($search)
    {
        $keys = Redis::command('keys', ["*$search*"]);
        if (!count($keys)) {
            return [];
        }

        $re     = [];
        $values = Redis::mget($keys);
        foreach ($keys as $i => $key) {
            $re[$key] = $values[$i];
        }

        return $re;
    }
}
