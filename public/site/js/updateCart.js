import inputRestriction from './inputRestrictValue.js'
import update from './update.js';

(function($){

    
    const calcul = function (){
        
        let totaux = 0
        const temp = $('.total')
        temp.each(function(index){
            totaux += parseFloat($(this).text())
            if(temp.length -1 === index){
                $('.total-final').text(totaux)
            }
        })
    }

    calcul()
    

    let isUpdating = false;
    // Product Quantity
    $('.quantity button').on('click', function () {

        if(isUpdating) return
        isUpdating = true
        var button = $(this);
        var oldValue = button.parent().parent().find('input').val();
        var newVal = 0;
        if (button.hasClass('btn-plus')) {
            newVal = parseFloat(oldValue) + 1;
        } else {
            if (oldValue > 1) {
                newVal = parseFloat(oldValue) - 1;
            }
        }
        if(newVal !== oldValue && newVal !== 0){
            const tr = $(this).parent().parent().parent().parent()
            
            const data = {
                'produit_id': $(this).parent().parent().data('product'),
                'quantite': newVal
            }
            const success = function(data){
                button.parent().parent().find('input').val(newVal);                    
                if(newVal > oldValue){
                    let totalProd = data.total + data.prix
                    data.TdTotal.text(totalProd)
                    data.totalFinal.text(data.Totaux + data.prix)
                }else{
                    let temp = data.total - data.prix
                    let totalProd = temp > 0? temp : data.total
                    data.TdTotal.text(totalProd)
                    data.totalFinal.text(data.Totaux - data.prix)
                }
            }

            update($,data,tr,success, function() {
                isUpdating = false;
            })
        }
    });

    inputRestriction($)

    $('.remove').on('click', function (e){


        const data = {'produit_id': $(e.target).data('product')}
        const parent = $(this).parent().parent()
        const totalProd = parseFloat(parent.find('.total').text())
        const totalPartiel = $('.total-partiel')
        const badge = $('.badge')


        $.ajax({
                url: '/remove-in-cart',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: 'POST',
                dataType: 'json',
                data: data,
                success: function (){
                    totalPartiel.text(parseFloat(totalPartiel.text() - totalProd))
                    badge.text(parseFloat(badge.text() - 1))
                    parent.remove()
                    
                    calcul()
                },
                error: function(jqXHR, textStatus, errorThrown){
                    console.log('error :',jqXHR)
                }
        })
    })
}(jQuery))