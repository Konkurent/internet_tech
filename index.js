$(document).ready(function(){
    function pullData(data) {
        let elem = '';
        if (data) {
            elem += '<div class="row_block">';
            for (let i = 0; i < data.length; i++){
                elem += '<div class="row row_block" style="background-color: white !important; margin-top: 10px !important;"><div class="d-flex"><p class="col-sm-3">Имя файла:</p><a href="'+ data[i][1].SRC +'" class="col-sm-3">'+data[i][1].NAME+'</a>';
                if (data[i][1].LINE) {
                    elem += '<span class="col-sm-3">Позиции найденного текста:</span>' + '<p class="col-sm-3">' + (data[i][1].LINE ?? '-') + '</p>';
                }
                elem += '</div></div>';
            }
            elem += '</div>';
        } else {
            elem += '<div class="alert alert-danger" role="alert" style="margin-top: 100px">'+ 'Файлы не найдены:(' +'</div>'
        }
        $('#block').append(elem);
    }

    $('#name').on('keyup', () => {
        if ($('#name').val())
            $('#autoSizingSelect').attr('disabled', 'disabled');
        else {
            $('#autoSizingSelect').removeAttr('disabled');
        }

    })

    $('#autoSizingSelect').on('change', () => {
        let idMask = $('#autoSizingSelect').val() ?? 0;

        if (Array.from($('option'))[idMask].innerHTML.length != 2 && idMask != 0)
            $('#name').attr('disabled', 'disabled');
        else
            $('#name').removeAttr('disabled');
    })

    $('.btn').on('click', (ev) => {
        ev.preventDefault();
        jQuery.ajax({
            url: '/ajax.php',
            type: "POST",
            dataType: "html",
            data: jQuery("form").serialize(),
            success: function(response) {
                result = JSON.parse(response);
                if (result)
                    pullData(Object.entries(result));
                else
                    pullData(result);
            },
            error: function(response) {
                console.log(response)
            }
        });
    })
});
