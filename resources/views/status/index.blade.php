@extends('layouts.main')

@section('title') {{'Статусы'}} @endsection

@section('content')

    <section class="content">
        <div class="card-body table-responsive p-0">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Наименование</th>
                        <th>Воронка</th>
                        <th width="200px"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($statuses as $status)
                        <tr>
                            <td>{{ $status->id }}</td>
                            <td>{{ $status->name }}</td>
                            <td>{{ $status->pipeline_id }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $statuses->onEachSide(1)->links() }}
        </div>
    </section>

@endsection
