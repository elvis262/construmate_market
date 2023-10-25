<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Commande;



class CustomOrderController extends Controller
{

    public function index()
    {

        $commandes = Commande::where('traitee', 0)->paginate(10);

        return view('vendor.voyager.commandes.browse',compact('commandes'));
    }

    public function changeState(Request $request)
    {
        $ordersId = $request->input('ordersId');
      
        try {
            Commande::whereIn('id', $ordersId)
                ->update(['traitee' => 1]); 
            
            return response()->json(['message' => 'Changement d\'état effectué avec succès.']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Une erreur est survenue lors du changement d\'état.'], 500);
        }

    }

    public function search(Request $request)
    {

        $key = $request->input('key');
        $commandes = null;
        if($key == 'none'){
            return redirect(route('commande.index'));
        }
        $value = $request->input('search_value') ?? $request->input('search_date_value');
        
        
        if($key == 'nom' or $key == 'prenom'){
            $commandes = Commande::whereHas('info_commande', function($query) use ($value, $key) {
                $query->where($key, 'like', '%' . strtolower($value) . '%');
            })->paginate(10);
        }else if($key == 'created_at'){
            $commandes = Commande::where($key, 'like', '%' . strtolower($value) . '%')->paginate(10);
        }
        else{
            $commandes =  Commande::where('traitee', 0)
            ->whereHas('info_commande.commune', function ($query) use ($key, $value) {
                $query->where('nom', 'like', '%' . strtolower($value) . '%');
            })
            ->with('info_commande.commune')
            ->paginate(10);
        }

        return view('vendor.voyager.commandes.browse', compact('commandes'));
    }

    public function archives(Request $request)
    {
        
        $commandes = Commande::where('traitee', 1)->paginate(10);

        return view('vendor.voyager.archives.browse',compact('commandes'));

    }

    public function remove(Request $request)
    {
        $ordersId = $request->input('ordersId');

        try {
            Commande::destroy($ordersId);
    
            return response()->json(['message' => 'Suppression des commandes effectuée avec succès.']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Une erreur est survenue lors de la suppression des commandes.'], 500);
        }
    }
}
