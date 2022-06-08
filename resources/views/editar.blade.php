@extends('layouts.app')
@section('content')
    <div class="card">
        @guest
            faz login pufavo
        @else
            <div class="card-header">
                <h2>Criação de Nephytis</h2>
            </div>
            {{ $carta }}



            @if (isset($errors) && count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <p> {{ $error }} </p>
                    @endforeach
                </div>
            @endif

            {!! Form::model($carta, ['route' => ['cartas.update', 'carta' => $carta->id], 'enctype' => 'multipart/form-data', 'class' => 'form', 'method' => 'post']) !!}
            @csrf
            @method('put')
            <div class="card-body" style="text-align:right">
                <label>Nome da sua Nephytis</label>
                {!! Form::text('name') !!} <br>
                <label>Classe da sua Nephytis</label>
                {!! Form::text('class') !!} <br>
                <label>Descrição da sua Nephytis</label>
                {!! Form::textarea('desc') !!} <br>
                <label>E a foto da sua Nephytis!</label>
                {!! Form::file('arquivoinput') !!}
                <input type="hidden" name="arqtemp" value={{ $carta->arquivo }}>
                <input type="hidden" name='user' value={{ $carta->owner }}>
            </div>

            <div class="card-footer" style="text-align:right">
                {!! form::submit('editar', ['class' => 'btn btn-success']) !!}
            </div>
            {!! Form::close() !!}
        @endguest
    </div>
@endsection
