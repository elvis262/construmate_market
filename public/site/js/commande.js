(function ($){
    let total = 0
    $('.somme').each(function(){
        total += parseFloat($(this).text())
    })
    $('.total-partiel').text(total)
    $('.total-final').text(parseFloat($('.shipping').text()) + total)
}(jQuery))