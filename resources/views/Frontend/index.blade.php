<?php
/**
* Illuminate\Support\Facades\Auth $authUser
**/
?>
@extends('Frontend.home')

@section('title', 'Zbuduj swój komputer!')

@section('content')
    <div id="app">
        <navbar :user="{{ json_encode($authUser) }}" logout="{{ route('logout') }}"></navbar>
        <header-component></header-component>
        <register-modal-component></register-modal-component>
        <category-component></category-component>
        <customize-component></customize-component>
        <aboutus-component></aboutus-component>
        <contact-component></contact-component>
        <login-modal-component csrf="{{ csrf_token() }}" login="{{ route('login') }}"></login-modal-component>
        <footer-component></footer-component>
    </div>
    <script src="{{ asset ('js/app.js') }}"></script>
@endsection
