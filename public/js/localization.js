$(function() {
    $.ajax({
        url: '/get-states',
        type: 'GET',
        success: function(res) {
            if (res.length) {
                res.map(state => {
                    $("#state").append(`<option value="${state.id}">${state.nome}</option>`)
                })

                if ($("#stateSelected").val() !== undefined && $("#stateSelected").val() > 0) {
                    $("#state").val($("#stateSelected").val())
                    $("#state").trigger('change')
                }
            }
        }
    })
})

const getCitys = () => {
    $("#city").find('option').remove()
    $("#city").append('<option value="" selected>Selecione uma cidade</option>');
    $.ajax({
        url: '/get-citys',
        type: 'GET',
        data: {
            stateId: $("#state").val()
        },
        success: function(res) {
            if (res.length) {
                res.map(city => {
                    $("#city").append(`<option value="${city.id}">${city.nome}</option>`)
                })

                if ($("#citySelected").val() !== undefined && $("#citySelected").val() > 0) {
                    $("#city").val($("#citySelected").val())
                }
            }
        }
    })
}