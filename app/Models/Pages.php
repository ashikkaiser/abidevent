<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    use HasFactory;
    protected $fillable = [
        'page_slug',
        'name',
        'title',
        'header',
        'banner',
        'video_link',
        'add_banner_1',
        'add_banner_2',
        'add_banner_3',
        'add_banner_4'
    ];
}
