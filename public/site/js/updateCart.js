import inputRestriction from './inputRestrictValue.js'
import update from './update.js';
(function($){
    // Product Quantity
    $('.quantity button').on('click', function () {
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
                    data.totalPartiel.text(data.TTotalPart + data.prix)
                }else{
                    let temp = data.total - data.prix
                    let totalProd = temp > 0? temp : data.total
                    data.TdTotal.text(totalProd)
                    data.totalPartiel.text(data.TTotalPart - data.prix)
                }
            }

            update($,data,tr,success)
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
                },
                error: function(jqXHR, textStatus, errorThrown){
                    console.log('error :',jqXHR)
                }
        })
    })
}(jQuery))