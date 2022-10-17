@extends('layouts.app')
<style>
    .aviso_privacidad div {
        text-align: justify;
    }
</style>
@section('content')
<div class="container mt-5 py-5 px-5">
    <div class="row">
        <h1 class="text-uppercase fw-bold text-center mb-4">Aviso de Privacidad</h1>
        <div class="aviso_privacidad">
            {!! $congiruation->aviso_privacidad !!}
        </div>
    </div>
</div>
@endsection