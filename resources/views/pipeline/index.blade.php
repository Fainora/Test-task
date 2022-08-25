@extends('layouts.main')

@section('title') {{'Воронки'}} @endsection

@section('content')

    <section class="content">
        <div class="card-body table-responsive p-0">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Наименование</th>
                        <th width="200px"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pipelines as $pipeline)
                        <tr>
                            <td>{{ $pipeline->id }}</td>
                            <td>{{ $pipeline->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $pipelines->onEachSide(1)->links() }}
        </div>
    </section>

@endsection
