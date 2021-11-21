$(function() {
    $('#phone').mask(maskPhone, maskPhoneOptions)
    $("#document").mask(maskDocument, maskDocumentOptions)
})

const maskDocument = (val) => {
    return val.replace(/\D/g, '').length === 11  ? '000.000.000-000' : '00.000.000/0000-00'
},
maskDocumentOptions = {
    onKeyPress: function(val, e, field, options) {
        field.mask(maskDocument.apply({}, arguments), options)
    }
};

const maskPhone = (val) => {
    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009'
},
maskPhoneOptions = {
    onKeyPress: function(val, e, field, options) {
        field.mask(maskPhone.apply({}, arguments), options)
    }
}