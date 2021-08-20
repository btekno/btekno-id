<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class StatusController extends Controller
{
	/**
     * Status for checking our website for monitoring tools apps
     *
     * @var string
     */
    public function ping()
    {
        return 'pong';
    }

    /**
     * Status for checking our redis client for monitoring tools apps
     *
     * @var string
     */
    public function redis()
    {
        try {
            Redis::connect('127.0.0.1', 3306);

            return 'ok';
        } catch (\Exception $e) {
            return 'not ok';
        }
    }

    /**
     * Status for checking our cache for monitoring tools apps
     *
     * @var string
     */
    public function cache()
    {
        return Cache::remember('status', 60 * 60, function () {
            return 'ok';
        });
    }
}