<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

    <div class="col-md-6">
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ isset($user->name) ? $user->name : old('name') }}" required autocomplete="name" autofocus>

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
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ isset($user->email) ? $user->email : old('email') }}" required autocomplete="email">

        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>


<div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Senha') }}</label>

    <div class="col-md-6">
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar senha') }}</label>

    <div class="col-md-6">
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
    </div>
</div>

<div class="form-group row">
    <label for="sex" class="col-md-4 col-form-label text-md-right">{{ __('Sexo') }}</label>

    <div class="col-md-6">
        <select id="sex" class="form-control" name="sex" required>
            <option value="" selected>Selecione</option>
            <option value="m" {{ isset($user->sex) && $user->sex == 'm' ? 'selected' : '' }}>Masculino</option>
            <option value="f" {{ isset($user->sex) && $user->sex == 'f' ? 'selected' : '' }}>Feminino</option>
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="state" class="col-md-4 col-form-label text-md-right">{{ __('Estado') }}</label>
    <input type="hidden" id="stateSelected" value="{{ isset($user->state) ? $user->state : 0 }}" />
    <div class="col-md-6">
        <select id="state" class="form-control" name="state" required onchange="getCitys()">
            <option value="" selected>Selecione o estado</option>
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('Cidade') }}</label>
    <input type="hidden" id="citySelected" value="{{ isset($user->city) ? $user->city : 0 }}" />
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
            <option value="0" {{ isset($user->situation) && !$user->situation ? 'selected' : '' }}>Inativo</option>
            <option value="1" {{ isset($user->situation) && $user->situation ? 'selected' : '' }}>Ativo</option>
        </select>
    </div>
</div>

<script src="{{ asset('/js/localization.js') }}"></script>

<script>
    console.log($("#userId").val())
    $(function() {

    })
</script>