@extends('layouts.main')

@section('title') {{'Компании'}} @endsection

@section('content')

    <section class="content">
        <div class="card-body table-responsive p-0">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Наименование</th>
                        <th>Дата создания</th>
                        {{-- <th>Тот, кто создал</th> --}}
                        <th>Ответственный</th>
                        <th width="200px"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($companies as $company)
                        <tr>
                            <td>{{ $company->id }}</td>
                            <td>{{ $company->name }}</td>
                            <td>{{ $company->date_create }}</td>
                            {{-- <td>{{ $company->created_user_id }}</td> --}}
                            <td>{{ $company->responsible_user_id }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $companies->onEachSide(1)->links() }}
        </div>
    </section>

@endsection
