<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

use App\Jobs\LogActivity;

if(!function_exists('logify')) {
    /**
     * Helper for logging user's activity
     *
     * @param Illuminate\Request/Request $content
     * @param String $type
     * @param Modules\My\Entities\User $user
     * @param String $message
     * 
     * @return Model LogActivity
     */
    function logify($request, $type, $user, $message) {
        return LogActivity::dispatch(
            $request->ip(),
            $request->header('User-Agent'),
            $type,
            $user,
            $message
        );
    }
}

if(!function_exists('laravel_version')) {
    /**
     * Get Laravel Version
     *
     * @return String
     */
    function laravel_version(): string {
        return Application::VERSION;
    }
}

if(!function_exists('memory_usage')) {
    /**
     * Find out server's memory usage
     *
     * @return String
     */
    function memory_usage(): string {
        $memUsage = memory_get_usage(true);

        if ($memUsage < 1024) {
            $format = sprintf('%dB', $memUsage);
        } elseif ($memUsage < 1048576) {
            $format = sprintf('%dKB', round($memUsage / 1024, 2));
        } else {
            $format = sprintf('%dMB', round($memUsage / 1048576, 2));
        }

        return $format;
    }
}

if(!function_exists('pluralize')) {
    /**
     * Word pluralize
     *
     * @param $word - Item word
     * @param $count - Count of item
     * 
     * @return String
     */
    function pluralize($word, $count): string {
        return Str::plural($word, $count);
    }
}

if(!function_exists('carbon')) {
    /**
     * Carbon Helpers
     *
     * @param ...$args
     * @return String
     */
    function carbon(...$args): ?Carbon {
        try {
            return new Carbon(...$args);
        } catch (Exception $exception) {
            return null;
        }
    }
}

if(!function_exists('format_bytes')) {
    /**
     * Converting size to byte
     *
     * @param int $size
     * @param int $precision
     * 
     * @return String
     */
    function format_bytes($size, $precision = 2) {
        $base = log($size, 1024);
        $suffixes = ['', 'KB', 'MB', 'GB', 'TB'];

        return round(pow(1024, $base - floor($base)), $precision).' '.$suffixes[floor($base)];
    }
}

if(!function_exists('markdown')) {
    /**
     * Markdown string converter
     *
     * @param String $content
     * @return String
     */
    function markdown($content) {
        return Str::markdown($content, [
            'html_input'         => 'strip',
            'allow_unsafe_links' => false,
        ]);
    }
}

if(!function_exists('toast')) {
    /**
     * Toast notification for Livewire
     *
     * @param Livewire $liveware
     * @param String $type - Type of notification (success, error, info)
     * @param String $body - Notification message
     * 
     * @return String
     */
    function toast($livewire, $type, $body) {
        return $livewire->dispatchBrowserEvent('toast', [
            'type' => $type,
            'body' => $body,
        ]);
    }
}

if(!function_exists('me')) {
    /**
     * Get Authentication
     *
     * @return String
     */
    function me() {
        return auth()->user();
    }
}