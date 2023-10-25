(function ($){
    const selectItem = $('.select_item')
    const selectAll = $('#select_all')
    const ordersId = []
    const text = $("input[type='text']")
    const date = $("input[type='date']")
    const url = $('.selected-items').data('name')

    $('#search_key').change(function (e){
 
        const value = $(this).val()
        if(value === 'none'){
            date.css({
                'display': 'none'
            })

            text.css({
                'display': 'block'
            }).attr('readonly',true)
        }else if(value === 'created_at'){
            date.css({
                'display': 'block'
            })
            text.css({
                'display': 'none'
            })
        }else{
            
            $('#date').css({
                'display': 'none'
            })
            text.removeAttr('readonly').css({
                'display': 'block'
            })
        }
    })

    selectAll.change(function() {
        if ($(this).is(":checked")) {
            
            selectItem.each(function (){
                $(this).prop('checked', true)
            })
        }else{
            selectItem.each(function (){
                $(this).prop('checked', false)
            })
        }
    });



    $('.change-state').click(function (e){
        ordersId.push($(e.target).data('order'))
    })

    $('.cancel').click(function (){
        let all = $(this).attr('all');
        if (typeof all === "true"){
            ordersId = []
        }else{
            ordersId.pop()
        }
    })

    selectItem.click(function (){
        if(!$(this).is(':checked') && $('.select_item:checked').length === 0 && selectAll.is(':checked')){
            selectAll.prop('checked', false)
        }
    })

    $('.selected-items').click(function (){
        const checked_item = $('.select_item:checked')

        if(checked_item.length !== 0){
            checked_item.each(function (){
                ordersId.push($(this).data('order'))
            })
            $('.cancel').attr('all', true)

            console.log(ordersId)
        }
    })

    $('.change-state-confirm').click(function (){
        $.ajax({
            url: '/admin/'+url,
            method: 'POST',
            dataType: 'json',
            contentType: 'application/json',
            data : JSON.stringify({ ordersId: ordersId }),
            success: function () {
                window.location.reload();
            }
        })
    })
})(jQuery)