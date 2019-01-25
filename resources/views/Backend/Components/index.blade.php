<?php
/**
 * array $components
 **/
?>
@extends('Backend.home')

@section('title', 'Zarządzanie komponentami')

@section('content')
    <div class="container mt-5">
        <div class="pt-5">
            <div class="card">
                <div class="card-header">
                    Dodaj komponent
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('backend.component.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nazwa:</label>
                            <input type="text" class="form-control" id="name" name="name"/>
                        </div>
                        <div class="form-group">
                            <label for="type">Typ komponentu:</label>
                            <select name="type" class="form-control" id="type">
                                <option value="{{ \App\Component::TYPE_PROCESSOR }}">
                                    Procesor
                                </option>
                                <option value="{{ \App\Component::TYPE_GRAPHICS_CARD }}">
                                    Karta graficzna
                                </option>
                                <option value="{{ \App\Component::TYPE_RAM }}">
                                    Ram
                                </option>
                                <option value="{{ \App\Component::TYPE_POWER_SUPPLY }}">
                                    Zasilacz
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="points">Punkty:</label>
                            <input type="number" max="1000" min="0" class="form-control" id="points" name="points"/>
                        </div>
                        <div class="form-group">
                            <label for="price">Cena:</label>
                            <input type="number" min="0" class="form-control" id="price" name="price"/>
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
                <td>Typ komponentu</td>
                <td>Punkty</td>
                <td>Cena</td>
                <td colspan="2">Akcje</td>
            </tr>
            </thead>
            <tbody>
            @foreach($components as $component)
                <tr>
                    <td class="id">{{ $component->id }}</td>
                    <td class="name">{{ $component->name }}</td>
                    <td class="type">{{ $component->type }}</td>
                    <td class="points">{{ $component->points }}</td>
                    <td class="price">{{ $component->price }}</td>
                    <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit-modal">
                            Edytuj
                        </button>
                    </td>
                    <td>
                        <form action="{{ route('backend.component.delete', $component->id) }}" method="post">
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
                    <h5 class="modal-title" id="edit-modal-label">Edycja komponentu <span id="component-name"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="name-modal">Nazwa:</label>
                            <input type="text" id="name-modal" class="name form-control" name="name"/>
                        </div>
                        <div class="form-group">
                            <label for="type-modal">Typ komponentu:</label>
                            <select class="type form-control" id="type-modal" name="type">
                                <option value="{{ \App\Component::TYPE_PROCESSOR }}">
                                    Procesor
                                </option>
                                <option value="{{ \App\Component::TYPE_GRAPHICS_CARD }}">
                                    Karta graficzna
                                </option>
                                <option value="{{ \App\Component::TYPE_RAM }}">
                                    Ram
                                </option>
                                <option value="{{ \App\Component::TYPE_POWER_SUPPLY }}">
                                    Zasilacz
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="points-modal">Punkty:</label>
                            <input type="number" max="1000" min="0" id="points-modal" class="points form-control" name="points"/>
                        </div>
                        <div class="form-group">
                            <label for="price-modal">Cena:</label>
                            <input type="number" min="0" id="price-modal" class="price form-control" name="price"/>
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
    <script type="text/javascript" src="{{ asset('js/Backend/Components/components.js') }}">
    </script>
@endsection
