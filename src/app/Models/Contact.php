<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable =[
        'category_id',
        'first_name',
        'last_name',
        'gender',
        'email',
        'tel',
        'address',
        'building',
        'detail',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    //名前または検索
    public function scopeKeywordSearch($query, $keyword){
        
        if(!empty($keyword)){
        $query->where('last_name','like','%' . $keyword . '%')->orwhere('email','like', '%'. $keyword . '%')->orwhere('first_name','like','%' . $keyword . '%');
        }
    }
    //性別検索
    public function scopeGenderSearch($query, $gender){

        if(!empty($gender)){
            $query->where('gender',$gender);
        }
    }

    //お問い合わせ種類検索
    public function scopeCategorySearch($query, $category_id){
        if(!empty($category_id)){
            $query->where('category_id',$category_id);
        }
    }

    //日付検索
    public function scopeDateSearch($query,$date){
        if(!empty($date)){
            $query->whereDate('created_at',$date);
        }
    }

}
