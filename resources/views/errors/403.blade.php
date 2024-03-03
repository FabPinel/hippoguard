{{-- resources/views/errors/403.blade.php --}}
@extends('layout')

@section('content')
    <div class="container">
        <div class="alert alert-danger">
            <h1>403 Forbidden</h1>
            <p>Vous n'avez pas la permission d'accéder à cette ressource.</p>
        </div>
    </div>
@endsection
