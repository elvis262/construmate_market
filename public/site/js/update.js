export default function update ($,data,target,success){
    $.ajax({
        url: '/update-cart',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method: 'POST',
        dataType: 'json',
        data: data,
        success: function(){
            const TdPrix = target.find('.prix') //le parent td
            const TdTotal = target.find('.total') //le td du prix total du nombre de produit prix
            const prix = parseFloat(TdPrix.text()) 
            const total = parseFloat(TdTotal.text())
            
            const totalPartiel = $('.total-partiel') //le prix total partiel du panier i.e sans la livraison
            const totalFin = $('.total-fin') // le prix total du panier avec la livraison

            const TTotalPart = parseFloat(totalPartiel.text())
            
            const obj = {
                'prix':prix,
                'total':total,
                'totalPartiel':totalPartiel,
                'totalFin':totalFin,
                'TTotalPart':TTotalPart,
                'TdTotal': TdTotal
            }
            success(obj)
        },
        error: function(jqXHR, textStatus, errorThrown){
            console.log('error :',jqXHR)
        }
    })
}