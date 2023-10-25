@extends('voyager::master')

@section('page_title', __('voyager::generic.viewing').' '.'Commandes')

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-basket"></i>Commandes
        </h1>
     
        <button class="btn btn-primary btn-add-new selected-items" data-toggle="modal" data-target="#delete_modal" data-name='update-order'>Marquer la Sélection</button>
      
        @include('voyager::multilingual.language-selector')
    </div>
@stop

@section('content')
    <div class="page-content browse container-fluid">
        @include('voyager::alerts')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">

                        <form method="get" class="form-search" action = {{ route('commande.search') }}>
                            @csrf
                            <div id="search-input">
                                <div class="col-2">
                                    <select id="search_key" name="key" style="height: 100%;border:none;border-right: solid 1px #bbb" value="{{old('key')}}">                                        
                                        <option value="none" selected>Aucun</option>
                                        <option value="created_at">Date</option>
                                        <option value="nom">Nom</option>
                                        <option value="prenom">Prénom</option>
                                        <option value="commune">Zone de livraison</option>                                     
                                    </select>
                                </div>

                                <div class="input-group col-md-12">
                                    <input type="date" name="search_date_value" value="{{old('search_date_value')}}" class="form-control" style="display: none;" id="date">
                                    <input type="text" class="form-control" placeholder="{{ __('voyager::generic.search') }}" name="search_value" value="{{old('search_value')}}" id="text" readonly>
                                    <span class="ml-4">
                                        <button class="btn btn-info btn-lg" type="submit">
                                            <i class="voyager-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </form>

                        <div class="table-responsive">
                            <table id="dataTable" class="table table-hover dataTable no-footer">
                                <thead>
                                    <tr>                                      
                                        <th class="dt-not-orderable" style="width: 13px;">
                                            <input type="checkbox" class="select_all" id="select_all">
                                        </th>
                                                                             
                                        <th>
                                            Informations
                                        </th>
                                        <th>
                                            Produits
                                        </th>
                                        
                                        <th>
                                            Total (FCFA)
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                        <th>
                                            Date de Commande
                                        </th>
                                        <th>
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($commandes as $commande)
                                        <tr>
                                            
                                            <td>
                                                <input type="checkbox" name="row_id" id="checkbox_{{$commande->id}}" value="{{ $commande->id}}" class="select_item" data-order={{$commande->id}}>
                                            </td>
                                           
                                            <td>
                                                <ul>
                                                    <li><span class="font-weight-bold text-primary">Nom: </span>{{$commande->info_commande->nom}} <span class="font-weight-bold text-primary">Prénom: </span>{{$commande->info_commande->prenom}} <span class="font-weight-bold text-primary">Email: </span>{{$commande->info_commande->email}}</li>
                                                    <li><span class="font-weight-bold text-primary">Contact: </span>{{$commande->info_commande->tel}} @if ($commande->info_commande->tel_2)/{{$commande->info_commande->tel_2}}@endif</li>
                                                    <li><span class="font-weight-bold text-primary">Adresse: </span>{{$commande->info_commande->adresse}}</li>
                                                    <li><span class="font-weight-bold text-primary">Zone de Livraison: </span>{{$commande->info_commande->commune->nom}}</li>
                                                    @if ($commande->info_commande->info_sup)
                                                        <li><span class="font-weight-bold text-primary">Informations Supplémentaires: </span>{{$commande->info_commande->info_sup}}</li>
                                                    @endif
                                                </ul>
                                            </td>
    
                                            <td>
                                                <ul>                                    
                                                    @foreach ($commande->produits as $produit)
                                                        <li>{{$produit->pivot->quantite}} {{$produit->nom}} / Prix Unitaire: {{$produit->prix - ($produit->pivot->remise * $produit->prix)}}</li>
                                                    @endforeach
                                                </ul>
                                            </td>
    
                                            <td>
                                                {{$commande->total_commande}}
                                            </td>
                                            <td>
                                                {{$commande->status == 0 ? "Impayée": "Payée" }}
                                            </td>
                                            <td>
                                                {{$commande->created_at}}
                                            </td>
                                            <td class="no-sort no-click bread-actions" colspan="5">
                                                <button class="btn btn-sm btn-primary pull-right change-state" data-order={{$commande->id}} data-toggle="modal" data-target="#delete_modal">Marquer</button>  
                                            </td>
                                        </tr>
                                        
                                    @endforeach

                                </tbody>
                            </table>
                        </div>


                        <div class="pull-right">
                            {{ $commandes->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Single delete modal --}}
    <div class="modal modal-danger fade" tabindex="-1" id="delete_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('voyager::generic.close') }}"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="voyager-bubble"></i> Voulez vous marquer cette commande commande comme traitée?</h4>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-danger pull-right change-state-confirm">Traitée</button>

                    <button type="button" all="false" class="btn btn-default pull-right cancel" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@stop

@section('css')

{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}

@stop

@section('javascript')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="{{asset('js/browseOrder.js')}}"></script>
@stop
