(function($) {
    let touchEvent = 'ontouchstart' in window ? 'touchstart' : 'click';
    for (var i = 0; i <= document.querySelectorAll('#listclick').length - 1; i++) {
        document.querySelectorAll(".deletclick")[i].addEventListener(touchEvent, msjdeletclick);
    }

    function msjdeletclick(e) {
        var nombre = e.target.getAttribute('data-nameclick');
        var id = e.target.getAttribute('data-idclick');
        console.log(nombre);
        document.getElementById('titlemsjdeletclick').innerHTML = '<strong>' + nombre + '</strong>';
        document.getElementById('mensajedeletclick').innerHTML = 'Desea eliminar Contacto <strong>' + nombre + '</strong>?';
        document.getElementById('btnmodaldeletclick').innerHTML = '<button class="btn btn-default rounded" style="position: absolute; left:30px; bottom: 10px;" id="btndeletclick" data-dismiss="modal" data-idclick="' + id + '">Eliminar <span class="text-danger glyphicon glyphicon-trash"></span></button>';
        document.getElementById('btndeletclick').addEventListener(touchEvent, deletclick);
    }

    function deletclick() {
        var id = document.getElementById('btndeletclick').getAttribute('data-idclick');
        jQuery.ajax({
            url: sqlclickiframe.sqlajaxurl,
            type: "post",
            data: {
                action: 'sqlclickiframe',
                acti: 'delet',
                id: id
            },
            success: function(d) {
                if (d) {
                    document.getElementById('deletclick' + id).parentElement.parentElement.remove();
                }
            }
        });
    }

})(jQuery);