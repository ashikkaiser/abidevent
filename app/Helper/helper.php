<?php

use App\Models\Settings;

function getYouTubeId($url)
{

    if (strpos($url, "v=") !== false) {
        return substr($url, strpos($url, "v=") + 2, 11);
    } elseif (strpos($url, "embed/") !== false) {
        return substr($url, strpos($url, "embed/") + 6, 11);
    }
}

function st()
{
    return Settings::first();
}
