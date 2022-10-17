@extends('layouts.app')
<style>
    .terminos_condiciones div {
        text-align: justify;
    }
</style>
@section('content')
<div class="container mt-5 py-5 px-5">
    <div class="row">
        <h1 class="text-uppercase fw-bold text-center mb-4">Términos y Condiciones</h1>
        <div class="terminos_condiciones">
            {!! $congiruation->terminos_condiciones !!}
        </div>
    </div>
</div>
@endsection