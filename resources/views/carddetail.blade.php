@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-4"></div>
        <div class="col-lg-4" style="width:200px; height:400px">
            <div class="card bg-body" style="size:50%; margin-top: 0px">


                <!-- Head -->

                <div class="card-header justify-content-center" style="text-align:center; width:100%">
                    <h3 class="card-title display-6">{{ $name ?? 'Nephytis' }}</h3>
                    <h4 class="card-subtitle">{{ $class ?? 'padrão' }}</h4>
                </div>

                <!-- body -->

                <div class="card-body justify-content-center" style="text-align:center">
                    <img class="img-fluid" src="{{ asset('storage/' . $arquivo) }}">
                </div>

                <!-- footer -->

                <div class="card-footer">
                    <div class="row">
                        <div class="col-8" id="resultFooter">
                            <h4 class="card-subtitle">Descrição</h4>
                            <p class="card-text" id="cardDesc">
                                {{ $desc ??'lalalaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaehqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqaaaaaaaaaafegqggggggggggggggggggggggggggggggggggggggggggggggg' }}
                            </p>
                        </div>
                        <div class="col-4" id="resultFooter">
                            <h4 class="card-subtitle">Criador</h4>
                            <p class="card-text">{{ $owner ?? 'Nephytis' }}</p>
                            <h4>#{{ $id ?? '0' }} <br>
                                @auth
                                    @if (Auth::user()->name == ($owner ?? 'joao'))
                                        <a id="botaocard" class='btn-danger'
                                            href={{ Route('delcard', ['id' => $id]) }}>Excluir</a>

                                        <a id="botaocard" class='btn-warning'
                                            href={{ Route('editcard', ['id' => $id]) }}>Editar</a>
                                    @endif
                                @endauth
                            </h4>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <div class="col-lg-4"></div>
    </div>
@endsection
