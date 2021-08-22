<?php

namespace App\Helpers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

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
        // if (App::environment() === 'production') {
            $cleanedUrl = str_replace(env('APP_URL').'/storage/', '', $url);
            return "https://ik.imagekit.io/btekno/tr:h-{$resolution}/{$cleanedUrl}";
        // }

        return $url;
    }

    /**
     * Delete Image from AWS S3
     *
     * @param string $url
     */
    public static function deleteCDNImage($url)
    {
        $file = str_replace('https://'.env('AWS_BUCKET').'.s3.'.env('AWS_DEFAULT_REGION').'.amazonaws.com/', '', $url);
        if(Storage::disk('s3')->exists($file)):
            Storage::disk('s3')->delete($file);
        endif;
        return;
    }


}