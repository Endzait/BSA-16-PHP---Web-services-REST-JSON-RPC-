<?php

namespace App\Http\Controllers;

use App\Book;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class RestApiController extends Controller
{
    //
    public function bookAdd(Request $request){
        $rules=array(
            'title'=>'required|alpha',
            'author'=>'required|alpha',
            'year'=>'required|digits:4',
            'genre'=>'required|alpha'
        );
        $validator=Validator::make($request->all(),$rules);
        if($validator->fails()){
            return Response::json("{}", 404)
                ->withErrors($validator);
        }else {


            $books = new Book();

            $books->title = $request->title;
            $books->author = $request->author;
            $books->year = $request->year;
            $books->genre = $request->genre;

            $books->save();
            return Response::json("{}", 200);

        }
    }
}
