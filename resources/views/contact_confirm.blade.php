@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Confirmation</div>

                <div class="card-body">
                    @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                    @endif
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                    @endforeach
                  
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">Nom</div>
                                <div class="col-md-8">{{$contact->last_name}}</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">Prénom</div>
                                <div class="col-md-8">{{$contact->first_name}}</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">Email</div>
                                <div class="col-md-8">{{$contact->email}}</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">Téléphone</div>
                                <div class="col-md-8">{{$contact->phone}}</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">Adresse</div>
                                <div class="col-md-8">{{$contact->adresse}}</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">Code postal</div>
                                <div class="col-md-8">{{$contact->postal_code}}</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">Ville</div>
                                <div class="col-md-8">{{$contact->city}}</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">Commentaire</div>
                                <div class="col-md-8">{{$contact->comment}}</div>
                            </div>
                        </div>
                        <div class="form-group">

                            <a href="{{route('confirm_edit', ['id' => $contact->id])}}"  class="btn btn-primary">Modifier</a>
                            <a href="{{route('confirm_save')}}"  class="btn btn-success">Confirmer</a>
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection