<div class="row">
    <div class="col-sm-4">
        <input type="text" class="form-control" id="searchName" placeholder="Nome">
    </div>
    <div class="col-sm-4">
        <select id="state" class="form-control" name="state" onchange="getCitys()">
            <option value="" selected>Selecione o estado</option>
        </select>
    </div>
    <div class="col-sm-4">
        <select id="city" class="form-control" name="city">
            <option value="" selected>Selecione uma cidade</option>
        </select>
    </div>
</div>
<br />
<div class="row">
    @if(Request::url() == 'http://127.0.0.1:8000/clients')
        <div class="col-sm-4">
            <select id="searchOrigin" class="form-control" name="serachOrigin">
                <option value="" selected>Selecione Origem</option>
                <option value="facebook">Facebook</option>
                <option value="faceToFace">Boca a boca</option>
                <option value="site">Site</option>
                <option value="indication">Indicação</option>
            </select>
        </div>
    @endif
    <div class="col-sm-4">
        <select id="searchSituation" class="form-control" name="serachSituation">
            <option value="" selected>Selecione uma situação</option>
            <option value="0">Inativo</option>
            <option value="1">Ativo</option>
        </select>
    </div>
    <div class="col-sm-4">
        <button type="button" class="btn btn-info" id="search">
            <i class="fas fa-search"></i>
        </button>
    </div>
</div>
<br />

<script src="{{ asset('/js/localization.js') }}"></script>