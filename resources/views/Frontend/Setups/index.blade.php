<?php
/**
 * Illuminate\Support\Facades\Auth $authUser
 * $application
 **/
?>
@extends('Frontend.PcBuilder.home')

@section('title', 'Zbuduj swój komputer!')

@section('content')
    <div class="container mt-3">
        <table class="table table-striped">
            <thead>
            <tr>
                <td>Id</td>
                <td>Karta graficzna</td>
                <td>Procesor</td>
                <td>Ram</td>
                <td>Zasilacz</td>
                <td>Akcje</td>
            </tr>
            </thead>
            <tbody>
            @foreach($setups as $setup)
                <tr>
                    <td class="id">{{ $setup->id }}</td>
                    <td class="name">{{ $setup->getComponentName($setup->graphic_id) }}</td>
                    <td class="type">{{ $setup->getComponentName($setup->processor_id) }}</td>
                    <td class="points">{{ $setup->getComponentName($setup->ram_id) }}</td>
                    <td class="price">{{ $setup->getComponentName($setup->power_supply_id) }}</td>
                    <td>
                        <form action="{{ route('setup.delete', $setup->id) }}" method="post">
                            @csrf
                            <button class="btn btn-danger" type="submit">Usuń</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
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
@endsection