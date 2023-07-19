import inputRestriction from './inputRestrictValue.js'

(function ($){
    const stock = parseFloat($('.stock span').text()) 
    $('.quantity button').on('click', function (){
        let button = $(this);
        let oldValue = parseFloat(button.parent().parent().find('input').val());
        console.log(oldValue);
        let newVal = 1;
        if (button.hasClass('btn-plus')) {
            if(stock !== oldValue){
                newVal = oldValue + 1;
            }else{
                newVal = oldValue;
            }
        } else {
            if (oldValue > 1) {
                newVal = oldValue - 1;
            }
        }
        button.parent().parent().find('input').val(newVal);
    })

    inputRestriction($)
}(jQuery))