@extends('layouts.main')

@section('title') {{'Пользователи'}} @endsection

@section('content')

    <section class="content">
        <div class="card-body table-responsive p-0">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Наименование</th>
                        <th>Логин</th>
                        <th>Id в Amo профиле</th>
                        <th width="200px"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->login }}</td>
                            <td>{{ $user->amo_profile_id }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $users->onEachSide(1)->links() }}
        </div>
    </section>

@endsection
