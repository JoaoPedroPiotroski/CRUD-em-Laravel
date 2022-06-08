<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<div class="card" id="minicard">
    <img class=" card-img-top" id='minicard-image' src="{{ asset('storage/' . $img) }}">



    <div class="card-img-overlay justify-content-right text-right   ">
        <a class="stretched-link" href={{ route('detalharCarta', ['carta' => $id]) }}></a>
        <h4 id="cardtext" class="card-title" id="minicard">{{ $nome ?? 'Nome da sua Nephytis' }} </h4>


        <h4 id="cardtext" class="card-subtitle" id="minicard">{{ $id ?? 'Nº5' }}</h4>
    </div>


</div>
