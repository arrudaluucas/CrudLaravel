<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

    <div class="col-md-6">
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ isset($client->name) ? $client->name : old('name') }}" required autocomplete="name" autofocus>

        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

    <div class="col-md-6">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ isset($client->email) ? $client->email : old('email') }}" required autocomplete="email">

        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="document" class="col-md-4 col-form-label text-md-right">{{ __('Documento') }}</label>

    <div class="col-md-6">
        <input id="document" type="text" class="form-control @error('document') is-invalid @enderror" name="document" value="{{ isset($client->document) ? $client->document : old('document') }}" required autocomplete="document">

        @error('document')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Telefone') }}</label>

    <div class="col-md-6">
        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror phone_with_ddd" name="phone" value="{{ isset($client->phone) ? $client->phone : old('phone') }}" required autocomplete="phone">

        @error('phone')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="origin" class="col-md-4 col-form-label text-md-right">{{ __('Origem') }}</label>

    <div class="col-md-6">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <!-- Default checked -->
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="site" name="site" {{ isset($client->site) && $client->site ? 'checked' : '' }}>
                    <label class="custom-control-label" for="site">Site</label>
                </div>
            </li>
            <li class="list-group-item">
                <!-- Default checked -->
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="faceToFace" name="faceToFace" {{ isset($client->faceToFace) && $client->faceToFace ? 'checked' : '' }}>
                    <label class="custom-control-label" for="faceToFace">Boca a boca</label>
                </div>
            </li>
            <li class="list-group-item">
                <!-- Default checked -->
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="facebook" name="facebook" {{ isset($client->facebook) && $client->facebook ? 'checked' : '' }}>
                    <label class="custom-control-label" for="facebook">Facebook</label>
                </div>
            </li>
            <li class="list-group-item">
                <!-- Default checked -->
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="indication" name='indication' {{ isset($client->indication) && $client->indication ? 'checked' : '' }}>
                    <label class="custom-control-label" for="indication">Indicação</label>
                </div>
            </li>
        </ul>
    </div>
</div>

<div class="form-group row">
    <label for="state" class="col-md-4 col-form-label text-md-right">{{ __('Estado') }}</label>
    <input type="hidden" id="stateSelected" value="{{ isset($client->state) ? $client->state : 0 }}" />
    <div class="col-md-6">
        <select id="state" class="form-control" name="state" required onchange="getCitys()">
            <option value="" selected>Selecione o estado</option>
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('Cidade') }}</label>
    <input type="hidden" id="citySelected" value="{{ isset($client->city) ? $client->city : 0 }}" />
    <div class="col-md-6">
        <select id="city" class="form-control" name="city" required>
            <option value="" selected>Selecione uma cidade</option>
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="situation" class="col-md-4 col-form-label text-md-right">{{ __('Situação') }}</label>

    <div class="col-md-6">
        <select id="situation" class="form-control" name="situation" required>
            <option value="" selected>Selecione</option>
            <option value="0" {{ isset($client->situation) && !$client->situation ? 'selected' : '' }}>Inativo</option>
            <option value="1" {{ isset($client->situation) && $client->situation ? 'selected' : '' }}>Ativo</option>
        </select>
    </div>
</div>

<script src="{{ asset('/js/localization.js') }}"></script>
<script src="{{ asset('/js/mask.js') }}"></script>