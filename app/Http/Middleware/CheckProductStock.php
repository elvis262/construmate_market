<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Produit;

class CheckProductStock
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $produit_id = $request->input('produit_id');
        $quantite = $request->input('quantite');
        
        $produit = Produit::where('id',$produit_id)->first();
        
        if($produit->quantite_stock < $quantite or $produit->quantite_stock == 0){
            return response()->json([
                'message' => 'La quantité en stock est insuffisante'
            ], 500);
        }
        return $next($request);
    }
}
