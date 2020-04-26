@extends('layouts.master')

@section('content')
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Meus pedidos de cuidado</div>
                <div class="card-body">
                    @foreach ($plantCares as $plantCare)
                        <div class="row my-3" style="border: 1px gray solid; border-radius: 0.3em">
                            <div class="col-md-12 text-center mb-4">
                                <span class="font-weight-bold"> Situação:</span>{!! $plantCare->readableStatus() !!}
                            </div>
                            <div class="col-md-6 text-center">
                                <span class="font-weight-bold"> Data de inicio:</span> {{ DateTime::createFromFormat('Y-m-d', $plantCare->beginDate)->format('d/m/Y') }}
                            </div>
                            <div class="col-md-6 text-center">
                                <span class="font-weight-bold"> Data de término:</span> {{ DateTime::createFromFormat('Y-m-d', $plantCare->endDate)->format('d/m/Y') }}
                            </div>
                            <div class="col-md-6 text-center">
                                <span class="font-weight-bold"> Data de realização do pedido:</span> {{ DateTime::createFromFormat('Y-m-d H:i:s', $plantCare->created_at)->format('d/m/Y') }}
                            </div>
                            <div class="col-md-6 text-center">
                                <span class="font-weight-bold clickable" onclick="togglePlants({{$plantCare->id}})"> Ver plantas </span>
                            </div>
                            <div class="col-md-12 text-center" style="display: none" id="plants_{{ $plantCare->id }}">
                                @foreach ($plantCare->plants as $plant)
                                    <div class="row col-12 my-2">
                                        <div class="col-md-6">
                                            Nome: {{ $plant->name }}
                                        </div>
                                        <div class="col-md-6">
                                            Tamanho: {{ ucfirst($plant->translatedSize()) }}
                                        </div>
                                        <div class="col-md-12">
                                            Cuidados: {{ $plant->careDetails }}
                                        </div>
                                    </div>
                                    @if (! $loop->last)
                                        <hr>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                    <div class="row">
                        <div class="offset-md-5 offset-1">
                            {{ $plantCares->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function togglePlants(id){
        let plantsDiv = document.getElementById('plants_' + id);
        
        console.log(plantsDiv);
        
        if(plantsDiv.style.display == "none")
            plantsDiv.style.display = "block";
        else
            plantsDiv.style.display = "none ";

    }
</script>
@endsection
