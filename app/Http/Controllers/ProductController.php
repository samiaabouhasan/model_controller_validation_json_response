<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Create Product
    //_______________________
   public function store(ProductStoreRequest $request ){
     $Product=Product::query()->create($request->validated());
      return response()->json(
         $Product,201
      );
   }



   // Get All Products without json Response
   //_________________________
   /*
       public function index(){
        return Product::query()->get();
        }
   */


   // Get All Products with json Response
   //_________________________
 public function index(){
         $products= Product::query()->get();

        return response()->json(
         $products,200
        );
   }
        

   // Get Single Product without json Response
   //__________________________
  /*
   public function show($id ){
      return Product::query()->where('id' , $id)->first();   
   }
   */

   // Get Single Product with json Response
   //__________________________
   public function show($id ){
      $product = Product::findOrFail($id);
      return response()->json(
         $product,200
      );   
   }

   // update Product without json Response
   //____________________________
  /* 
  public function update( ProductUpdateRequest $request,$id ){
    Product::query()->where('id' , $id)->update($request->validated());
    return "The Product  updated successfully";
   } 
    */

    // update Product with json Response
    //______________________________
    public function update( ProductUpdateRequest $request,$id ){
      $product = Product::findOrFail($id);
      $product->update($request->validated());
      return response()->json(
         $product,200
      );
    }


   //delete Product without json Response
   //_____________________________
   /*
   public function destroy( $id){
    Product::query()->where('id' , $id)->delete();
    return "The Product  deleted successfully";
   }
    */

   //delete Product with json Response
   //_____________________________
   public function destroy( $id){
    $product = Product::findOrFail($id);
    $product->delete();
    return response()->json([
      'message'=>'The Product  deleted successfully'
    ],200);
   }
    

   //
   public function reduce_stock( Request $request , $id){
   $request->validate([
    'amount' => ['required', 'integer', 'min:1'],
   ]);

   $product =Product::query()->where('id' , $id)->first();

    $product->quantity = $product->quantity - $request->amount;
    $product->save();
    return 'Stock reduced successfully. New quantity: ' . $product->quantity;

}
}
