import update from "./update.js"


export default function  inputRestriction($){
    $('.quantity-controller').on('input',function (e){
        const input = $(e.target)
        const limit = input.data('limit')


        if(parseFloat(input.val()) > limit){
            input.val(limit)
        }else if(parseFloat(input.val()) <= 0 || input.val() === ''){
            input.val(1)
        }
        if($(e.target).hasClass('line')){
            
            const data = {
                'produit_id': input.parent().data('product'),
                'quantite': parseFloat(input.val())
            }
            const tr = input.parent().parent().parent()
            
            const success = function(data){ 
                data.TTotalPart = data.TTotalPart - data.total                   
                let totalProd = parseFloat(input.val()) * data.prix
                data.TdTotal.text(totalProd)
                data.totalPartiel.text(data.TTotalPart + totalProd)
            }

            update($,data,tr,success)
        }
    })
}