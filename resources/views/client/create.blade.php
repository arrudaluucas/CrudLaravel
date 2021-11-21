@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Novo Cliente') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('clients.store') }}">
                        @csrf

                        @include('client.form')

                        @include('layouts.form-footer')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection