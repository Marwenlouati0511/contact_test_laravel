@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Contacts</div>

                <div class="card-body">
                    @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                    @endif
                    @if(@$message_confirm)
                    {{$message_confirm}}
                    @endif
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
                    {{ $error }}
                    </div>
                    @endforeach
                    <form method="POST" action="{{route('contact_add')}}">
                        @csrf
                        <div class="form-group">
                            <label for="last_name">Nom</label>
                            <input type="text" class="form-control" required name="last_name" id="last_name" value="{{ old('last_name') }}" placeholder="Nom">
                        </div>
                        <div class="form-group">
                            <label for="first_name">Prénom</label>
                            <input type="text" class="form-control" required name="first_name" id="first_name" value="{{ old('first_name') }}" placeholder="Prénom">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" required name="email" id="email" value="{{ old('email') }}" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="phone">Téléphone</label>
                            <input type="text" class="form-control" required name="phone" id="phone"  value="{{ old('phone') }}" placeholder="Téléphone">
                        </div>
                        <div class="form-group">
                            <label for="adresse">Adresse</label>
                            <input type="text" class="form-control" required name="adresse" id="adresse" value="{{ old('adresse') }}" placeholder="Adresse">
                        </div>
                        <div class="form-group">
                            <label for="postal_code">Code postal</label>
                            <input type="number" class="form-control" required name="postal_code" id="postal_code"  value="{{ old('postal_code') }}" placeholder="Code postal">
                        </div>
                        <div class="form-group">
                            <label for="city">Ville</label>
                            <input type="text" class="form-control" required name="city" id="city"  value="{{ old('city') }}" placeholder="Ville">
                        </div>
                        <div class="form-group">
                            <label for="comment">Commentaire</label>
                            <textarea type="text" class="form-control" name="comment" id="comment" placeholder="Commentaire">{{ old('comment') }}</textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection