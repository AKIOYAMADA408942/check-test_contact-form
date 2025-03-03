<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Category;
use App\Models\Contact;

class ContactController extends Controller
{
    //
    public function index(){
        $categories = Category::all();
        return view('contact-index', compact('categories'));
    }

    public function confirm(ContactRequest $request){
        $contact = $request->except(['_token']);
        
        //連想配列にgenderの名前を入れる
        $gender_number = $request->only('gender');

        if($gender_number['gender']==1){
            $gender['name'] = '男性';
        }else if($gender_number['gender']==2){
            $gender['name'] = '女性';
        }else{
            $gender['name'] = 'その他';
        }

        //category_idからcontentを表示
        $category_id = $request->only('category_id');
        $contact_category = Category::find($category_id['category_id']);
        
        return view('confirm', compact('contact','contact_category', 'gender'));
    }

    public function store(Request $request){

        //修正を押したら値を持たせて入力画面にリダイレクト
        if($request->input('back') == 'back' ){
            return redirect('/')->withInput();
        }
        
        //データベースに登録
        $contact = $request->except(['_token','tel1','tel2','tel3']);
        Contact::create($contact);
        
        return view('thanks');
    }
}
