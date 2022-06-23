
let number_table = 0;
//Настройки плагина
const settings = Object.fromEntries([
    ['search', true], //поиск
    ['sorting', true], //сортировка
    ['paginator', false], //Пагинация
    ['paginatorCountRow', 5] // кол-во строк в таблице отображаемых при пагинации
]);


//Ищем таблицы с классом abr-table
$('.abr-table').each(function(){
    number_table++;
    //добавляем класс к таблице (это необходимо, если таблиц будет несколько, то именно этот по этому классу будем обращаться)
    $(this).addClass('abr-table'+number_table);
    $(this).attr('data-tableID',number_table);

    //Если в настройках включена функция поиска, и таблица НЕ содержит класс "abr-off-search"
    if(settings.search ===true && !$(this).hasClass('abr-off-search')){
        //Добавляем поле фильтра по таблице
        $(this).before('<div class="abr-head"><div class="abr-search"><label for="search'+number_table+'">Поиск </label> <input type="search" id="abr-table'+number_table+'"></div></div>')
    }

    //если включена пагинация
    if(settings.paginator ===true && !$(this).hasClass('abr-off-paginator')){
        let count_row = settings.paginatorCountRow;

        $(this).after(
            '<div class="abr-pagination-container" >' +
                '<nav>' +
                    '<ul class="abr-pagination abr-pagination'+number_table+'">' +
                        '<li data-page="prev" class="abr-paginator-prev">' +
                            '<span> &#171</span>' +
                        '</li>' +

                        '<div class="abr-pagination-number"></div>'+

                        '<li data-page="next" class="abr-paginator-next">' +
                            '<span> &#187</span>' +
                        '</li>' +
                    '</ul>' +
                '</nav>' +
            '</div>');
        //проверяем если есть корректный атрибут data-paginator, то выводим столько строк сколько указано в атрибуте
        if($('.abr-table'+number_table).attr('data-paginator') != undefined
            && $('.abr-table'+number_table).attr('data-paginator') != ''
            && $('.abr-table'+number_table).attr('data-paginator') > 0){
            count_row = $('.abr-table'+number_table).attr('data-paginator');
        }

        paginator('.abr-table'+number_table, 1, count_row)
    }

})




// __________СОРТИРОВКА ТАБЛИЦЫ start____________
if(settings.sorting ===true) {
    $('.abr-table thead tr *').click(function sort_s() {
        //Если в таблице нет класса отключающего сортировку
        if($(this).parents('table').hasClass('abr-off-sorting'))return;

        //Удаляем символ сортровки
        $(this).parents('table').find('.sort').remove();

        let table = $(this).parents('table').eq(0)
        let rows = table.find('tr:gt(0)').toArray().sort(comparer($(this).index()))
        this.asc = !this.asc


        if (!this.asc) {
            rows = rows.reverse();
            $(this).append('<i style="" class="sort">↓</i>')
        } else {
            $(this).append('<i style="" class="sort">↑</i>')
        }
        for (let i = 0; i < rows.length; i++) {
            table.append(rows[i])
        }

        //если включена пагинация
        if(settings.paginator ===true && !$(this).hasClass('abr-off-paginator')) {
            $('.abr-table'+table.attr('data-tableid')+' tbody tr').show()

            let count_row = settings.paginatorCountRow;
            //проверяем если есть корректный атрибут data-paginator, то выводим столько строк сколько указано в атрибуте
            if($('.abr-table'+table.attr('data-tableid')).attr('data-paginator') != undefined
                && $('.abr-table'+table.attr('data-tableid')).attr('data-paginator') != ''
                && $('.abr-table'+table.attr('data-tableid')).attr('data-paginator') > 0){
                count_row = $('.abr-table'+table.attr('data-tableid')).attr('data-paginator');
            }

            paginator('.abr-table'+table.attr('data-tableid'), 1, count_row)
        }
    })

    function comparer(index) {
        return function (a, b) {
            let valA = getCellValue(a, index), valB = getCellValue(b, index)
            return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.toString().localeCompare(valB)
        }
    }

    function getCellValue(row, index) {
        return $(row).children('td').eq(index).text().toLowerCase().trim()
    }


}
// __________СОРТИРОВКА ТАБЛИЦЫ end____________







// __________ПОИСК ПО ТАБЛИЦЕ start____________
$("input[type='search']").on('input',function () {
    let value = this.value.toLowerCase().trim();
    let count_td = 0;
    let table = $(this).attr('id');

    //Получим ID input search, Который совпадает с классом фильтруемой таблицы и переберем ее построчно и по ячейкам
    $('.'+table+" tr").each(function (index) {
        if (!index) return;
        $(this).find("td").each(function () {
            let id = $(this).text().toLowerCase().trim();
            let not_found = (id.indexOf(value) == -1);
            $(this).closest('tr').toggle(!not_found);
            //если в ячейке есть совпадение до добавим в переменную count_td + 1
            if(not_found == false){count_td++}
            return not_found;
        });
    });

    //Если нет ни одной строки удовлетворяющей условию то выведем информацию
    if(count_td == 0){
        $("."+table+" thead").append(
            '<tr>' +
                '<td class="no-tr" colspan="'+$('.'+table).find("tr:last td").length+'">Совпадающих записей не найдено</td>' +
            '</tr>'
        )
    }else{
        $('.'+table).find('.no-tr').remove()
    }

});
// __________ПОИСК ПО ТАБЛИЦЕ end____________








//__________ПАГИНАЦИЯ start____________

//функция отображения строк таблицы, принимает Класс таблицы, с какой страницы отображать, кол-во отображаемых строк
function paginator(table, page, rows){
    //Считаем кол-во строк в таблице
    let coutRows = $(table + ' tbody tr').length;
    //с какой строки отображаем
    let start = page * rows - rows;

    paginatorPage('abr-pagination'+table.replace(/[^0-9]/g,""), coutRows, page, rows)
    let trnum = 0;

    $(table + ' tbody tr').hide();

    if(start == 0){
        $(table + ' tbody tr:eq(0)').fadeIn()
        trnum++
    }

    $(table + ' tbody tr:gt('+start+')').each(function (){
        if(trnum < rows){
            $(this).fadeIn()
        }
        trnum++
    })
}

//функция отображения нумерации пагинатора, принимающая класс пагинатора, кол-во всех строк таблицы и выбранную страницу пагинатора
function paginatorPage(paginator, allRow, selected, rows){
    let allPage = Math.ceil(allRow/rows);
    //разница
    let difference = allPage - selected;
    let page = '';
    let table = 'abr-table'+paginator.replace(/[^0-9]/g,"");



    if(allPage > 7){
        if(selected < 5){ //1|2|3|4|5|6|...|n
            for (let i=1; i<=5; i++){
                let active = '';
                if(i == selected){
                    active = 'active';
                }
                page +=
                    '<li class="'+active+'" onclick="paginator(`.'+table+'`,'+i+','+rows+')">' +
                        '<span> '+i+'</span>' +
                    '</li>';
            }
            page +=
                '<li>' +
                    '<span> ...</span>' +
                '</li>';

            let active=''
            if(selected == allPage){
                active = 'active';
            }
            page +=
                '<li class="'+active+'" onclick="paginator(`.'+table+'`,'+allPage+','+rows+')">' +
                    '<span> '+allPage+'</span>' +
                '</li>';
        }else if(selected >= 5 && difference > 3){ //   1|...|x-2|x-1|X|x+1|x+2|...|n
            page +=
                '<li onclick="paginator(`.'+table+'`,1,'+rows+')">' +
                    '<span> 1</span>' +
                '</li>';

            page +=
                '<li>' +
                    '<span> ...</span>' +
                '</li>';

            for (let i=selected-2; i<=selected+2; i++){
                let active = '';
                if(i == selected){
                    active = 'active';
                }
                page +=
                    '<li class="'+active+'" onclick="paginator(`.'+table+'`,'+i+','+rows+')">' +
                        '<span> '+i+'</span>' +
                    '</li>';
            }

            page +=
                '<li>' +
                    '<span> ...</span>' +
                '</li>';
        }else{ //   1|...|x-2|x-1|X|x+1|x+2|n|
            page +=
                '<li onclick="paginator(`.'+table+'`,1,'+rows+')">' +
                    '<span> 1</span>' +
                '</li>';

            page +=
                '<li>' +
                    '<span> ...</span>' +
                '</li>';

            for (let i=allPage-4; i<=allPage; i++){
                let active = '';
                if(i == selected){
                    active = 'active';
                }
                page +=
                    '<li class="'+active+'" onclick="paginator(`.'+table+'`,'+i+','+rows+')">' +
                        '<span> '+i+'</span>' +
                    '</li>';
            }
        }
    }else{
        for (let i=1; i<=allPage; i++){
            let active = '';
            if(i == selected){
                active = 'active';
            }
            page +=
                '<li class="'+active+'" onclick="paginator(`.'+table+'`,'+i+','+rows+')">' +
                    '<span> '+i+'</span>' +
                '</li>';
        }
    }
    $('.'+paginator+' .abr-pagination-number').html(page)

}

//__________ПАГИНАЦИЯ end____________
