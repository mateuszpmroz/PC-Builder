<?php
/**
 * Illuminate\Support\Facades\Auth $authUser
 * $application
 **/
?>
@extends('Frontend.PcBuilder.home')

@section('title', 'Zbuduj swój komputer!')

@section('content')
    <div class="d-flex justify-content-center">
        <div class="card px-4 py-4">
            <img class="card-img-top image--max--values--frontend" src="{{ $application->image_url }}"
                 alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{ $application->name }}</h5>
                <p class="card-text">Zbuduj odpowiedni zestaw pod
                    <?php if ($application->is_program): ?>
                    ten program
                    <?php elseif (!$application->is_program): ?>
                    tą grę
                    <?php endif; ?>
                </p>
                <a href="/#customize" class="btn btn-primary">Zmień aplikacje</a>
            </div>
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-header">
            Zbuduj zestaw
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('pc-builder.store') }}">
                @csrf
                <div class="form-group">
                    <label for="graphic-id">Karta graficzna:</label>
                    <select name="graphic_id" class="form-control" id="graphic-id">
                        <?php foreach ($graphicsComponents as $component): ?>
                        <option data-component-price="{{ $component->price }}"
                                value="{{ $component->id }}">{{ $component->getNameWithPrice() }}</option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="processor-id">Procesor:</label>
                    <select name="processor_id" class="form-control" id="processor-id">
                        <?php foreach ($processorComponents as $component): ?>
                        <option data-component-price="{{ $component->price }}"
                                value="{{ $component->id }}">{{ $component->getNameWithPrice() }}</option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="ram-id">Ram:</label>
                    <select name="ram_id" class="form-control" id="ram-id">
                        <?php foreach ($ramComponents as $component): ?>
                        <option data-component-price="{{ $component->price }}"
                                value="{{ $component->id }}">{{ $component->getNameWithPrice() }}</option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="power-supply-id">Zasilacz:</label>
                    <select name="power_supply_id" class="form-control" id="power-supply-id">
                        <?php foreach ($powerSupplyComponents as $component): ?>
                        <option data-component-price="{{ $component->price }}"
                                value="{{ $component->id }}">{{ $component->getNameWithPrice() }}</option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <?php if (Auth::id()): ?>
                <button type="submit" class="btn btn-primary">Zapisz</button>
                <?php endif; ?>
                Cena: <span id="components-price"></span>.00 zł
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
@endsection
