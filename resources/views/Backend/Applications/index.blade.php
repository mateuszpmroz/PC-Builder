<?php
/**
 * array $applications
 **/
?>
@extends('Backend.home')

@section('title', 'Zarządzanie aplikacjami')

@section('content')
    <div class="container mt-5">
        <div class="pt-5">
            <div class="card">
                <div class="card-header">
                    Dodaj aplikacje
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('backend.application.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nazwa:</label>
                            <input type="text" class="form-control" id="name" name="name"/>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" value="1" class="form-check-input" id="is-program" name="is_program"/>
                            <label for="is-program" class="form-check-label">Program?:</label>
                        </div>
                        <div class="form-group">
                            <label for="graphic-points"><i class="fas fa-align-left"></i>&nbsp;Punkty grafiki:</label>
                            <input type="number" max="1000" min="0" class="form-control" id="graphic-points" name="graphic_points"/>
                        </div>
                        <div class="form-group">
                            <label for="processor-points"><i class="fas fa-align-left"></i>&nbsp;Punkty procesora:</label>
                            <input type="number" max="1000" min="0" class="form-control" id="processor-points" name="processor_points"/>
                        </div>
                        <div class="form-group">
                            <label for="ram-points"><i class="fas fa-align-left"></i>&nbsp;Punkty ramu:</label>
                            <input type="number" max="1000" min="0" class="form-control" id="ram-points" name="ram_points"/>
                        </div>
                        <div class="form-group">
                            <label for="power-supplies-points"><i class="fas fa-align-left"></i>&nbsp;Punkty zasilacza:</label>
                            <input type="number" max="1000" min="0" class="form-control" id="power-supplies-points" name="power_supplies_points"/>
                        </div>
                        <div class="form-group">
                            <label for="image-url"><i class="fas fa-image"></i>&nbsp;URL obrazka:</label>
                            <input type="text" class="form-control" id="image-url" name="image_url"/>
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
                <td>Nazwa</td>
                <td>Program?</td>
                <td>Punkty grafiki</td>
                <td>Punkty procesora</td>
                <td>Punkty ramu</td>
                <td>Punkty zasilacza</td>
                <td>Obrazek</td>
                <td colspan="2">Akcje</td>
            </tr>
            </thead>
            <tbody>
            @foreach($applications as $application)
                <tr>
                    <td class="id">{{ $application->id }}</td>
                    <td class="name">{{ $application->name }}</td>
                    <td class="is_program">{{ $application->is_program }}</td>
                    <td class="graphic_points">{{ $application->graphic_points }}</td>
                    <td class="processor_points">{{ $application->processor_points }}</td>
                    <td class="ram_points">{{ $application->ram_points }}</td>
                    <td class="power_supplies_points">{{ $application->power_supplies_points }}</td>
                    <td class="image_url">
                        <img src="{{ $application->image_url }}" class="rounded image--max--values--backend" alt="Błąd ładowania obrazka...">
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit-modal">
                            Edytuj
                        </button>
                    </td>
                    <td>
                        <form action="{{ route('backend.application.delete', $application->id) }}" method="post">
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
                    <h5 class="modal-title" id="edit-modal-label">Edycja aplikacji <span id="application-name"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label>Nazwa:</label>
                            <input type="text" class="name form-control" name="name"/>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" value="1" class="form-check-input is_program" name="is_program"/>
                            <label class="form-check-label">Program?:</label>
                        </div>
                        <div class="form-group">
                            <label><i class="fas fa-align-left"></i>&nbsp;Punkty grafiki:</label>
                            <input type="number" max="1000" min="0" class="form-control graphic_points" name="graphic_points"/>
                        </div>
                        <div class="form-group">
                            <label><i class="fas fa-align-left"></i>&nbsp;Punkty procesora:</label>
                            <input type="number" max="1000" min="0" class="form-control processor_points" name="processor_points"/>
                        </div>
                        <div class="form-group">
                            <label><i class="fas fa-align-left"></i>&nbsp;Punkty ramu:</label>
                            <input type="number" max="1000" min="0" class="form-control ram_points" name="ram_points"/>
                        </div>
                        <div class="form-group">
                            <label><i class="fas fa-align-left"></i>&nbsp;Punkty zasilacza:</label>
                            <input type="number" max="1000" min="0" class="form-control power_supplies_points" name="power_supplies_points"/>
                        </div>
                        <div class="form-group">
                            <label><i class="fas fa-image"></i>&nbsp;URL obrazka:</label>
                            <input type="text" class="form-control image_url" name="image_url"/>
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
    <script type="text/javascript" src="{{ asset('js/Backend/Applications/applications.js') }}">
    </script>
@endsection
