<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'image',
    ];
    public function next(){
        // get next user
        return News::where('id', '>', $this->id)->orderBy('id','asc')->first();
    
    }
    public  function previous(){
        // get previous  user
        return News::where('id', '<', $this->id)->orderBy('id','desc')->first();
    
    }
}
