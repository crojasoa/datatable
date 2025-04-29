<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Article extends Model
{

    use HasFactory;

    protected $fillable =[
        'title',
        'content',
        'user_id',
        'is_published',
        'sort',
    ];


    //Relacion uno a muchos inversa 
    public function user()
    {
        return $this->belongsTo(User::class);
        
    }


}
