@extends('layouts.app')
@section('content')
    <div class="card">
        @guest
            faz login pufavo
        @else
            <div class="card-header">
                <h2>Criação de Nephytis</h2>
            </div>

            @if (isset($errors) && count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <p> {{ $error }} </p>
                    @endforeach
                </div>
            @endif

            {!! Form::open(['route' => 'cartas.store', 'class' => 'form', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}

            @csrf
            <div class="card-body" style="text-align:right">
                <label>Nome da sua Nephytis</label>
                {!! Form::text('name', null, ['class' => 'form', 'placeholder' => 'Nome:']) !!} <br>
                <label>Classe da sua Nephytis</label>
                {!! Form::text('class', null, ['class' => 'form', 'placeholder' => 'Classe:']) !!} <br>
                <label>Descrição da sua Nephytis</label>
                {!! Form::textarea('desc', null, ['class' => 'form', 'placeholder' => 'Descrição:']) !!} <br>
                <label>E a foto da sua Nephytis!</label>
                {!! Form::file('arquivo') !!}
                <input type="hidden" name='user' value={{ json_encode(Auth::user()->name) }}>
            </div>

            <div class="card-footer" style="text-align:right">
                {!! form::submit('Criar', ['class' => 'btn btn-success']) !!}
            </div>
            {!! Form::close() !!}
        @endguest
    </div>
@endsection
