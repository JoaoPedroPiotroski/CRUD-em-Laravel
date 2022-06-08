@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card-columns" id="organizacards">
            @foreach ($values as $value)
                @include('layouts.minicard', [
                    'nome' => $value->name,
                    'id' => $value->id,
                    'img' => $value->arquivo,
                ])
            @endforeach

        </div>
        {{ $values->links() }}

    </div>
@endsection
