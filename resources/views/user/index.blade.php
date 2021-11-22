@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Usuários') }}
                    <a href="{{ route('users.create') }}" class="btn btn-success">
                        <i class="fas fa-user-plus"></i>
                    </a>
                </div>
                <div class="card-body">
                    @include('layouts.alerts')
                    @include('layouts.filter')
                    <table class="table table-striped table-bordered" id="usersTable">
                        <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Email</th>
                                <th scope="col">Situação</th>
                                <th scope="col" width='115'>Ações</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {
        dataTable()

        $("body").on('click', '#search', function() {
            console.log('aqui')
            $("#usersTable").DataTable().destroy();
            dataTable({
                searchName: $("#searchName").val(),
                city: $("#city").val(),
                state: $("#state").val(),
                searchOrigin: $("#serachOrigin").val(),
                searchSituation: $("#serachSituation").val(),
            })
        })
    })

    const dataTable = (data = {}) => {
        $("#usersTable").DataTable({
            bLengthChange: false,
            processing: true,
            serverSide: true,
            pageLength: 10,
            searching: false,
            paging: true,
            ordering: true,
            language: {
                url: "//cdn.datatables.net/plug-ins/1.11.3/i18n/pt_pt.json"
            },
            ajax: {
                url: '/get-users',
                type: 'GET',
                data: data
            }
        })
    }
</script>
@endsection