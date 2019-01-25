<?php
/**
 * Illuminate\Support\Facades\Auth $authUser
 * array $users
 **/
?>
@extends('Backend.home')

@section('title', 'Zarządzanie użytkownikami')

@section('content')
    <div class="container mt-5">
        <div class="pt-5">
            <div class="card">
                <div class="card-header">
                    Dodaj użytkownika
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('backend.user.store') }}">
                        <div class="form-group">
                            @csrf
                            <label for="login">Login:</label>
                            <input type="text" class="form-control" name="login"/>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" name="email"/>
                        </div>
                        <div class="form-group">
                            <label for="password">Hasło:</label>
                            <input type="password" class="form-control" name="password"/>
                        </div>
                        <button type="submit" class="btn btn-primary">Dodaj</button>
                    </form>
                </div>
            </div>
            <div class="flash-message mt-3">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <p class="alert alert-danger">{{ $error }}
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        </p>
                    @endforeach
                @endif
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                    @if(Session::has('alert-' . $msg))
                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close"
                                                                                                 data-dismiss="alert"
                                                                                                 aria-label="close">&times;</a>
                        </p>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class="container mt-3">
        <table class="table table-striped">
            <thead>
            <tr>
                <td>Id</td>
                <td>Login</td>
                <td>Email</td>
                <td colspan="2">Akcje</td>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td class="id">{{ $user->id }}</td>
                    <td class="login">{{ $user->login }}</td>
                    <td class="email">{{ $user->email }}</td>
                    <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit-modal">
                            Edytuj
                        </button>
                    </td>
                    <td>
                        <form action="{{ route('backend.user.delete', $user->id) }}" method="post">
                            @csrf
                            <button class="btn btn-danger" type="submit">Usuń</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit-modal-label">Edycja użytkownika <span id="user-name"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="">
                    <div class="modal-body">
                        <div class="form-group">
                            @csrf
                            <label for="login">Login:</label>
                            <input type="text" class="form-control login" name="login"/>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control email" name="email"/>
                        </div>
                        <div class="form-group">
                            <label for="password">Hasło:</label>
                            <input type="password" class="form-control" name="password" placeholder="Nie zmieniaj tego pola jeżeli nie chcesz zmieniać hasła."/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
                        <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('js/Backend/Users/users.js') }}">
    </script>
@endsection
