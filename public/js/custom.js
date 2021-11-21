$(function () {
    $("body").on('click', '.button-delete', function () {
        event.preventDefault()
        console.log('aqui')
        console.log($(this).data('id'))
        console.log($(this).data('link'))
        var id = $(this).data('id')
        var resource = $(this).data('link')
        swal({
            title: "Voce tem certeza?",
            text: "Excluir usuário",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                window.location.assign('/' + resource + '/' + id + '/destroy')
            }
        });
    })
})