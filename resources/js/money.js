$(document).on('click', '.add_row', function(){
    $('.addAndRemove_row').remove();
    let parent = $(this).parents('.parentRow')
    let parentId = parent.attr('data-row')
    $(parent).after('<div class="row row'+parseInt(parentId) + 1+' parentRow" data-row="'+parseInt(parentId) + 1+'">'+parent.html()+'</div>');
    $('.add_row:last').before('<button type="button" class="addAndRemove_row remove_row" class="m-1">-</button>')
    changeButton(parentId, '+')
})

$(document).on('click', '.remove_row', function(){
    
    $(this).parents('.parentRow').remove();
    $('.add_row').remove();
    $('.remove_row:last').after('<button type="button" class="add_row" class="m-1">+</button>')

    if($('.remove_row').length == 1){
        $('.remove_row').remove()
    }
    // $('.add_row').remove();
    // $('.remove_row:last').before('<button type="button" class="addAndRemove_row remove_row" class="m-1">-</button>')
})

function changeButton($id, $method){
    let btn = $('.row'+$id).find('.add_row');
    $(btn).removeClass('add_row');
    $(btn).addClass('remove_row');
    $(btn).text('-');
}