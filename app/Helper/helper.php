<?php

use App\Models\Settings;

function getYouTubeId($url)
{
    preg_match("/(?im)\b(?:https?:\/\/)?(?:w{3}\.)?youtu(?:be)?\.(?:com|be)\/(?:(?:\??v=?i?=?\/?)|watch\?vi?=|watch\?.*?&v=|embed\/|)([A-Z0-9_-]{11})\S*(?=\s|$)/", $url, $matches);

    if (isset($matches[1])) {
        return $matches[1];
    } else {
        return null;
    }


    // if (strpos($url, "v=") !== false) {
    //     return substr($url, strpos($url, "v=") + 2, 11);
    // } elseif (strpos($url, "embed/") !== false) {
    //     return substr($url, strpos($url, "embed/") + 6, 11);
    // }
}

function st()
{
    return Settings::first();
}
