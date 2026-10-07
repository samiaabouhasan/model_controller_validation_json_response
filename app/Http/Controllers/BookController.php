<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookStoreRequest;
use App\Http\Requests\BookUpdateRequest;
use App\Models\Book;

class BookController extends Controller
{
    //  Add new Book
    //_____________________
   public function store(BookStoreRequest $request ){
     Book::query()->create($request->validated());
      return 
         'Book added successfully' ;
   }


// Get a list of all books.
//______________________________
   public function index(){
        return Book::query()->get();
   }


 // Get a single book by its ID.
//___________________________________
    public function show($id ){
      return Book::query()->where('id' , $id)->first();
    
   }


   // update book
   //_______________________________
   public function update( BookUpdateRequest $request,$id ){
    Book::query()->where('id' , $id)->update($request->validated());
    return "The book  updated successfully";
   } 

   
   //delete book
   //___________________________________
   public function destroy( $id){
    Book::query()->where('id' , $id)->delete();
    return "The Book  deleted successfully";
}



}
