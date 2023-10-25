(function($){
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-full-width",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "2000",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    
    const addToCart = (data)=>{

        $.ajax({
            url: '/add-to-cart',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: 'POST',
            dataType: 'json',
            data: data,
            success: function(res){
              const badge = $('.badge')
              let product_number = parseInt(badge.text())
              badge.text(product_number + 1)

                toastr.success('Produit ajouté à votre panier')
                console.log('succes: '+res);
            },
            error: function(jqXHR, textStatus, errorThrown) {

                const danger = $('div#alert-danger')
                if(jqXHR.responseJSON.exception === "Illuminate\\Database\\QueryException"){
                    toastr.info('Vous avez déjà ajouté ce produit. Si vous voulez modifier la quantité, allez dans l\'onglet panier');
                    
                }else if(jqXHR.responseJSON.message === "Unauthenticated."){
                    toastr.error('Connecter vous à votre compte utilisateur ou inscriver vous avant de procéder à cette opération');
                }else{
                    toastr.error(jqXHR.responseJSON.message)
                }
              
                console.log('Erreur: ',jqXHR);
                
            }
        });
    }

    $(".add-to-cart").on('click',(e)=>{
        console.log($(e.target).parent().find('input'))
        const data = {
            'produit_id':$(e.target).data('product'),
            'quantite': $(e.target).parent().find('input').length !== 0 ? $(e.target).parent().find('input').val() : 1
        }
        addToCart(data)
    })

})(jQuery)