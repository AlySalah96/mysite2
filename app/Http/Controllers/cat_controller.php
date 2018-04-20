<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catogery;
use App\Product ;
use App\Suplier ;
class cat_controller extends Controller
{
    //

    public function ret_cat()
    {
        $cats=Catogery::all();

        return view('homePage1',compact('cats'));
    }


    public function edit(Request $request, $id)
    {
      $name= $request->input('name');

      $cat=Catogery::find($id);
      $cat->name= $name ;
      $cat->save();
      

      return redirect('aa');
    }

    public function delete( $id)
    {
     
        $cat=Catogery::find($id);
        $cat->delete();
        return redirect('aa');
    }

    public function add(Request $request)
    {
        $cat =new Catogery ;
        $cat->name= $request->input('name');
        $cat->save();
        
      return redirect('aa');
    }


////////////////////////////////////products////////////////////////////////////////////
  

    public function show_products($id)
    {

      $cat=Catogery::find($id);
      $prods=array();
      if($cat!=null)
      {
          $prods=  $cat->productsOf;

          $best_sale = $prods->where('sale',  $prods->max('sale'));
       
        }
       
      $cats=Catogery::all();
      return view('products',compact('prods','cats','best_sale'));

    }

    public function edit_prod(Request $request, $id)
    {
          $name=$request->input('name');
          $price=$request->input('price');
          $quantity=$request->input('quantity');
          $cat_id=$request->input('cat_id');


      $prod=Product::find($id);
      $prod->name= $name ;
      $prod->quantity= $quantity ;
      $prod->price= $price ;
      
      $prod->save();
      //return redirect('show_products/'. $cat_id);
      return back();

    }

    public function delete_prod(Request $request, $id)
    {
     
        $prod=Product::find($id);

        $cat_id=$request->input('cat_id');
        $prod->delete();
        //return redirect('show_products/'.$cat_id);
        return back();
    }

    public function  add_prod(Request $request)
    {


        $file=$request->file('img');
        $filename=$file->getClientOriginalName();
        $file->move('images',$filename);

        $cat_id=$request->input('cat_id');
        $prod=new Product ;
        $prod->name=$request->input('name');
        $prod->price=$request->input('price');
        $prod->quantity=$request->input('quantity');
        $prod->cat_id=$request->input('cat_id');
        $prod->img=$filename;

        $prod->save();

       
        return redirect('show_products/'.$cat_id);


    }

    public function buy_prod($id)
    {
        $prod=Product::find($id);
      
        $prod->quantity= $prod->quantity -1 ;
        $prod->sale=  $prod->sale +1;
        $prod->save();

        return back();
    }

    /////////////////////supliers///////////////////////////////////////////////////////

    public function show_suppliers_of($id)
    {
          $prod=Product::find($id)   ;
          $supliers=array();
          if($prod!=null)
              $supliers=$prod->supliersOf;

            return view('supliers',compact('supliers'));

    }

    public function show_products_of_sup($sup_id)
    {
        $supp= Suplier::find($sup_id);
        $prods=array();
        if($supp!=null)
            $prods=$supp->products;

            $best_sale = $prods->where('sale',  $prods->max('sale'));
        $cats=Catogery::all();
        return view('products',compact('prods','cats' ,'best_sale'));
    }

    public function add_sup(Request $request)
    {
        $name=$request->input('name');
        $supp=new Suplier;
        $supp->name=$name;
        $supp->save();

        
        return back();
    }
    public function edit_sup($id,Request $request)
    {
        $supp=Suplier::find($id);
        $name=$request->input('name');
        $supp->name=$name;
        $supp->save();
        return back();
    }
    public function delete_sup($id)
    {
        Suplier::destroy($id);
        return back();
    }

}
