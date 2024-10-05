<?php

use Illuminate\Support\Facades\Storage;

if (!function_exists('my_asset')) {
    /**
     * Generate an asset path for the application.
     *
     * @param string $path
     * @param bool|null $secure
     * @return string
     */
    function my_asset($path)
    {
        if ($path) {
            return Storage::disk('s3')->url($path);
        }
        return null;
    }
}