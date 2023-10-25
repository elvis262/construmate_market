export default function update ($,data,target,success,onComplete=null){
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
            
            const totalFinal = $('.total-final') //le prix total du panier avec la livraison

            const Totaux = parseFloat(totalFinal.text())
            
            const obj = {
                'prix':prix,
                'total':total,
                'totalFinal':totalFinal,
                'Totaux':Totaux,
                'TdTotal': TdTotal
            }
            success(obj)
        },
        error: function(jqXHR, textStatus, errorThrown){
            console.log('error :',jqXHR)
        },complete: function() {
            if (typeof onComplete === 'function') {
                onComplete(); 
            }
        }
    })
}