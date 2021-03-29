<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;


class CartController extends Controller
{
    //
    public function add_to_cart(Product $product)
    {
       // return $product;

// add the product to cart
\Cart::session(auth()->user()->id)->add(array(
    'id' => $product->id,
    'name' => $product->name,
    'price' => $product->price,
    'quantity' => 1,
    'attributes' => array(),
    'associatedModel' => $product
));
return redirect()->back();
    }//end cart

  public function index()
  {
      $cartItems = \Cart::session(auth()->user()->id)->getContent();
      return view('cart.index',compact('cartItems'));
  }

  public function destroy($itemId)
  {
    // delete an item on cart
\Cart::session(auth()->user()->id)->remove($itemId);
return redirect()->back();
  }//end destroy cart

  public function update($itemId,Request $request)
  {

// update the item on cart
\Cart::session(auth()->user()->id)->update($itemId,[
	'quantity' => array(
        'relative' => false,
        'value' => $request->qty,

	//'price' => 98.67
)]);
return redirect()->back();
  }//end update


  public function checkout()
  {
    return view('cart.checkout');
  }
}
