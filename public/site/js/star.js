(function ($){
    const input = $("input[name='note']")
    $('.star-review').on('click',function (e){
        const star = $(e.target);
        const parent = star.parent();
        const stars = parent.find('.star-review');

        // Récupérer l'index de l'étoile cliquée
        const clickedIndex = stars.index(star);

        // Ajouter ou retirer les classes 'fas' et 'far' en fonction de l'index cliqué
        stars.each(function (index) {
            if (index <= clickedIndex) {
                $(this).removeClass('far').addClass('fas');
            } else {
                $(this).removeClass('fas').addClass('far');
            }
        });      
        input.val(clickedIndex + 1)
    })
}(jQuery))