@extends('layouts.master')

@section('content')
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Cuidadores disponíveis</div>
                <div class="card-body">
                    @if ($carers->isEmpty())
                        <div class="row my-4">
                            <div class="col-12 text-center emptyListMessage">
                                Atualmente não tem ninguém disponível pra cuidar das suas plantinhas :(
                            </div>
                        </div>
                    @endif
                    @foreach ($carers as $carer)
                        {{ $carer->city }}
                    @endforeach
                    <div class="row">
                        <div class="offset-md-5 offset-1">
                            {{ $carers->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
