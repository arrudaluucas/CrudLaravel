<div class="box-footer">
    <hr/>
    <div class="row">
        <div class="col-md-6">
            <a id="btnCancel" href="{{URL::previous()}}" class="btn btn-secondary">
                <i class="fa fa-arrow-left"></i>
                Cancelar
            </a>
        </div>
        <div class="col-md-6 text-right">
            <button id="button-save-form" class="btn btn-primary ladda-button" data-style="expand-left"><span class="ladda-label">Salvar</span></button>
        </div>
    </div> 

</div>

<script>

$('#button-save-form').on('click', function(e) {
    $("form").submit();
    var laddaBtn = e.currentTarget;
    var l = Ladda.create(laddaBtn);
    l.start();
});

</script>