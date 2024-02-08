import inputRestriction from './inputRestrictValue.js'

(function ($){

    $('.quantity button').on('click', function (){
        let button = $(this);
        let input = button.parent().parent().find('input[type="number"]');
        let stock = input.attr('maxLength');
        
        let oldValue = parseFloat(button.parent().parent().find('input').val());
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