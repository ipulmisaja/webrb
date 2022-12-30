<?php

function google_view_image(string $id)
{
    return 'https://drive.google.com/uc?export=view&id=' . $id;
}

function google_thumbnail_image(string $id)
{
    return 'https://drive.google.com/thumbnail?id=' . $id;
}

function google_video_thumbnail($id, string $resolution)
{
    /**
     * string $resolution value
     * default : default.jpg
     * medium quality : mqdefault.jpg
     * high quality : hqdefault.jpg
     * standar definition : sddefault.jpg
     * maximum : maxresdefault.jpg
     */

    return is_array($id)
        ? 'https://img.youtube.com/vi/' . explode("v=", $id['url'])[1] . '/' . $resolution
        : 'https://img.youtube.com/vi/' . $id . '/' . $resolution;

}
