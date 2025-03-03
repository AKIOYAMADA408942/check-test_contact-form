<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;
use App\Http\Livewire\Modal;

class AdminController extends Controller
{
    public function index(){
        
        $categories = Category::all();
        $contacts = Contact::with('category')->paginate(7);

        return view('admin.admin-index',compact('categories','contacts'));
    }

    public function search(Request $request){
        
        $categories = Category::all();

        // 検索
        $contacts = Contact::with('category')->KeywordSearch($request->keyword)->GenderSearch($request->gender)->CategorySearch($request->category_id)->DateSearch($request->date)->paginate(7);


        return view('admin.admin-index',compact('categories','contacts'));
    }
}
