@extends('layouts.main')

@section('title') {{'Сделки'}} @endsection

@section('content')

    <section class="content">
        <div class="card-body table-responsive p-0">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Наименование</th>
                        <th>Дата создания</th>
                        <th>Последнее редактирование</th>
                        <th>Бюджет</th>
                        <th>Ответсвенный</th>
                        <th>Компания</th>
                        <th>Воронка</th>
                        <th>Дата закрытия</th>
                        <th>Статус ID</th>
                        <th width="200px"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($leads as $lead)
                        <tr>
                            <td>{{ $lead->id }}</td>
                            <td>{{ $lead->name }}</td>
                            <td>{{ $lead->date_create }}</td>
                            <td>{{ $lead->last_modified }}</td>
                            <td>{{ $lead->price }}</td>
                            <td>{{ $lead->responsible_user_id }}</td>
                            <td>{{ $lead->linked_company_id }}</td>
                            <td>{{ $lead->pipeline_id }}</td>
                            <td>{{ $lead->date_close }}</td>
                            <td>{{ $lead->status_id }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $leads->onEachSide(1)->links() }}

        </div>
    </section>

@endsection
