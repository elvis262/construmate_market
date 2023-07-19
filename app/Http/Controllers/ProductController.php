<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Avi;
use App\Http\Requests\CommentRequest;
use Illuminate\Database\Eloquent\Builder;

class ProductController extends Controller
{
    public function index(){
        return view('product.index');
    }

    public function shop(string $category=null,int $id=null){
        
        if($category != null){
            $products = Produit::where('categorie_produit_id','=',$id)
                                ->paginate(12);
            return view('product.shop')->with('products',$products);
        }
        $products = Produit::paginate(12);
        
        return view('product.shop')->with('products',$products);
    }
    public function details(string $slug, int $id){

        $noteTotal = Avi::where('produit_id', $id)->sum('note');
        $product =  Produit::where('nom', 'like', '%' . strtolower(str_replace('-',' ',$slug)) . '%')
        ->where('id',$id)
        ->firstOrFail();
        $moyenne = count($product->avis) > 0? round($noteTotal / count($product->avis), 2) : 0;
        return view('product.details', compact(['moyenne','product']));
    }
    
    public function search(Request $req)
    {
        $name = $req->input('search');
        $products = Produit::where('nom', 'like', '%' . strtolower($name) . '%')->paginate(12);
        return view('product.shop')->with('products',$products);
    }

    public function comment(CommentRequest $req)
    {
        $validated = $req->validated();
        $id = (int) $req->input('product');
        $validated['user_id'] = \Auth::user()->id;
        $validated['produit_id'] = $id;
        $avi =  Avi::create($validated);
        $product = Produit::select('nom')->where('id',$id)->first();

        return redirect()->intended(route('product.details',['slug'=> \Str::slug($product->nom),'id' => $id]))->with(['success'=>'Commentaire envoyé']);
    }
}
