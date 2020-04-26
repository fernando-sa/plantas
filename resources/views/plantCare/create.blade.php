@extends('layouts.master')

@section('content')
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Novo pedido de cuidado</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('storePlantCare') }}" id="newPlantCareForm">
                        @csrf


                        <div class="form-group row">
                            <div class="col-12 text-md-center">
                                <span class="newPlantCareSectionH1">Data entrega/retorno:</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="beginDate" class="col-md-4 col-form-label text-md-right">Data de entrega das plantinhas: </label>

                            <div class="col-md-6">
                                <input id="beginDate" type="date" class="form-control @error('beginDate') is-invalid @enderror" name="beginDate" value="{{ old('beginDate') }}" required autocomplete="beginDate" autofocus>

                                @error('beginDate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="endDate" class="col-md-4 col-form-label text-md-right">Data de retorno das plantinhas: </label>

                            <div class="col-md-6">
                                <input id="endDate" type="date" class="form-control @error('endDate') is-invalid @enderror" name="endDate" value="{{ old('endDate') }}" required autocomplete="endDate" autofocus>

                                @error('endDate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 text-md-center">
                                <span class="newPlantCareSectionH1">Plantas:</span>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-md-8 p-2 newPlantsList text-center">
                                <span style="font-size:1.5">Plantas adicionadas:</span>
                                <br>
                                <div class="row" id="plantsDiv">

                                </div>
                                <span id="emptyPlantsList">Nenhuma planta adicionada!</span>
                            </div>
                        </div>

                        <div class="row my-1">
                            <label class="col-md-4 col-form-label text-md-right" for="newPlantName">Nome:</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="newPlantName" placeholder="Usamos o nome pra identificar as plantinhas" id="newPlantName">
                            </div>

                        </div>

                        <div class="row my-1">
                            <label class="col-md-4 col-form-label text-md-right" for="newPlantSpecies">Espécie:</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="newPlantSpecies" id="newPlantSpecies">
                            </div>
                        </div>

                        <div class="row my-1">
                            <label class="col-md-4 col-form-label text-md-right" for="newPlantCareDetails">Como cuidar:</label>

                            <div class="col-md-6">
                                <textarea type="text" class="form-control" name="newPlantCareDetails" id="newPlantCareDetails"></textarea>
                            </div>
                        </div>

                        <div class="row my-1">
                            <label class="col-md-4 col-form-label text-md-right" for="newPlantCareDetails">Porte:</label>

                            <div class="col-md-6">
                                <select name="newPlantSize" id="newPlantSize">
                                    <option value="small">Pequeno</option>
                                    <option value="medium">Médio</option>
                                    <option value="big">Grande</option>
                                </select>
                            </div>
                        </div>

                        <div class="row my-1">
                            <div class="col-md-12 text-center mt-2">
                                <button onclick="addNewPlant()" type="button" class="btn btn-primary w-50">Adicionar planta</button>
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary w-50">
                                    Entrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function addNewPlant(){

        let newPlantName = document.getElementById('newPlantName');
        let newPlantSpecies = document.getElementById('newPlantSpecies');
        let newPlantCareDetails = document.getElementById('newPlantCareDetails');
        let newPlantSize = document.getElementById('newPlantSize');

        let newPlant = {};
        newPlant.name = newPlantName.value;
        newPlant.species = newPlantSpecies.value;
        newPlant.careDetails = newPlantCareDetails.value;
        newPlant.size = newPlantSize.value;

        if(! this.validatePlantData(newPlant)){
            addErrorAlert("Preencha todos os campos da plantinha");
            return;
        }


        if(checkIfPlantExists(newPlant.name, newPlant.species, newPlant.careDetails, newPlant.size)){
            addErrorAlert("Essa planta já foi adicionada!");
            return;
        }

        let currentPlantIndex = (document.getElementsByName('plants[]').length + 1);
        let newInput = document.createElement('input');
        newInput.name = "plants[]";
        newInput.type = "hidden";
        newInput.id = "plant_" + currentPlantIndex;
        newInput.value = JSON.stringify(newPlant);
        
        document.getElementById('newPlantCareForm').appendChild(newInput)

        // Update dom elements to show new added plant
        let emptyPlantsListAlert = document.getElementById('emptyPlantsList');
        if(emptyPlantsListAlert.style.display != "none")
            emptyPlantsListAlert.style.display = "none"

            
        let div = document.createElement('div')
        div.id = "plantDiv_" + currentPlantIndex;
        div.className = 'col-md-12 my-2'
        document.getElementById('plantsDiv').appendChild(div)


        if(currentPlantIndex != 1)
            div.appendChild(document.createElement('hr'))

        let plantName = document.createElement('span')
        plantName.textContent = "Nome: " + newPlantName.value;
        plantName.className = "plant_" + currentPlantIndex;
        div.appendChild(plantName);
        div.appendChild(document.createElement('br'));

        let plantSpecies = document.createElement('span')
        plantSpecies.textContent = "Espécie: " + newPlantSpecies.value;
        plantSpecies.className = "plant_" + currentPlantIndex;
        div.appendChild(plantSpecies);
        div.appendChild(document.createElement('br'));

        let plantCareDetails = document.createElement('span')
        plantCareDetails.textContent = "Cuidados: " + newPlantCareDetails.value;
        plantCareDetails.className = "plant_" + currentPlantIndex;
        div.appendChild(plantCareDetails);
        div.appendChild(document.createElement('br'));

        let plantSize = document.createElement('span')
        plantSize.textContent = "Tamanho: " + translatePlantSize(newPlantSize.value);
        plantSize.className = "plant_" + currentPlantIndex;
        div.appendChild(plantSize);
        div.appendChild(document.createElement('br'));

        let removePlant = document.createElement('button');
        removePlant.textContent = "Remover planta"
        removePlant.type = "button";
        removePlant.className = "btn btn-danger";
        removePlant.onclick = function(){
            // Remove input
            document.getElementById('plant_' + currentPlantIndex).remove();
            // Remove plants interface
            document.getElementById('plantDiv_' + currentPlantIndex).remove();
        };
        div.appendChild(removePlant);
        div.appendChild(document.createElement('br'));

    }

    function checkIfPlantExists(plantName){
        let inputs = document.getElementsByName('plants[]');
        
        for (const input of inputs) {
            if(JSON.parse(input.value).name != plantName) continue;
            return true;
        }

        return false
    }

    function translatePlantSize(size) {
        switch(size){
            case 'small': return 'Pequeno'; break;
            case 'medium': return 'Médio'; break;
            case 'big': return 'Grande'; break;
        }

        return "?";
    }

    function validatePlantData(newPlant) {
        if(newPlant.name === "") return false;
        if(newPlant.species === "") return false;
        if(newPlant.careDetails === "") return false;
        if(newPlant.size === "") return false;
        return true;
    }
</script>
@endsection
