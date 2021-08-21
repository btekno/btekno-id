<?php

namespace App\Helpers;

use Illuminate\Support\Facades\App;

class Helper
{
	/**
     * Get Image URL from CDN.
     *
     * @param string 	$url
     * @param string    $resolution
     *
     * @return string
     */
	public static function getCDNImage($url, $resolution = 500)
    {
        if (App::environment() === 'production') {
            $cleanedUrl = str_replace(env('APP_URL').'/storage/', '', $url);

            return "https://ik.imagekit.io/btekno/tr:h-{$resolution}/{$cleanedUrl}";
        }

        return $url;
    }


}