@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar usuário') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('users.update', $user->id) }}">
                        @csrf

                        @include('user.form')

                        @include('layouts.form-footer')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection