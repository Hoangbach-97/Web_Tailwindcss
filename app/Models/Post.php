<?php

namespace App\Models;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Post extends Model 
{
    use HasFactory;
    // LINK SLUGGABLE: https://github.com/cviebrock/eloquent-sluggable
    use Sluggable;
    public $timestamps = false;
    //  lỗ hổng trong Mass Assignment tránh hacker truyền dữ liệu để giành quyền admin
    protected $fillable  = [
        'title', 'description', 'slug', 'image_path','user_id'
    ];
    public function user(){
        // Một bài post chỉ thuộc về một user
        return $this->belongsTo(User::class);
    }
    public function sluggable(): array
    {
      return   [
            'slug'=>[
                'source'=>'title',
            ]
            ];
    }

}
