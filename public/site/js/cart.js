(function($){
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
              $('div#alert-success').removeAttr('hidden').fadeIn('slow', function() {
                // Après un délai de 2000ms (2 secondes), ajouter un fadeOut
                $(this).delay(4000).fadeOut('slow', function() {
                    // Après le fadeOut, ajouter l'attribut hidden
                    $(this).attr('hidden', true);
                    console.log('first')
                });
             })
              console.log('succes: '+res);
            },
            error: function(jqXHR, textStatus, errorThrown) {

                const danger = $('div#alert-danger')
                if(jqXHR.responseJSON.exception === "Illuminate\\Database\\QueryException"){
                    danger.text('Vous avez déjà ajouté ce produit. Si vous voulez modifier la quantité, allez dans l\'onglet panier')
                }else if(jqXHR.responseJSON.message === "Unauthenticated."){
                    danger.text('Connecter vous à votre compte utilisateur ou inscriver vous avant de procéder à cette opération')
                }
                danger.removeAttr('hidden').fadeIn('slow', function() {
                    // Après un délai de 2000ms (2 secondes), ajouter un fadeOut
                    $(this).delay(4000).fadeOut('slow', function() {
                        // Après le fadeOut, ajouter l'attribut hidden
                        $(this).attr('hidden', true);
                        console.log('first')
                    });
                })
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