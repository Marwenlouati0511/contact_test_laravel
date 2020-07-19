@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Modification de contact</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br />
        @endif
        <form method="post" action="{{ route('list_contacts.update', $contact->id) }}">
            @method('PATCH')
            @csrf
            <div class="form-group">

                <div class="form-group">
                    <label for="last_name">Nom</label>
                    <input type="text" class="form-control" name="last_name" value="{{ $contact->last_name }}" />
                </div>

                <label for="first_name">Prénom</label>
                <input type="text" class="form-control" name="first_name" value="{{ $contact->first_name }}" />
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" value="{{ $contact->email }}" />
            </div>

            <div class="form-group">
                <label for="phone">Téléphone</label>
                <input type="text" class="form-control" name="phone" value="{{ $contact->phone }}" />
            </div>

            <div class="form-group">
                <label for="adresse">Adresse</label>
                <input type="text" class="form-control" name="adresse" value="{{ $contact->adresse }}" />
            </div>

            <div class="form-group">
                <label for="postal_code">Code postal</label>
                <input type="number" class="form-control" name="postal_code" value="{{ $contact->postal_code }}" />
            </div>

            <div class="form-group">
                <label for="city">Ville</label>
                <input type="text" class="form-control" name="city" value="{{ $contact->city }}" />
            </div>

            <div class="form-group">
                <label for="comment">Commentaire</label>
                <input type="text" class="form-control" name="comment" value="{{ $contact->comment }}" />
            </div>

            <a href="{{route('home')}}" class="btn btn-default">Return</a>
            <button type="submit" class="btn btn-primary">Modifier</button>

        </form>
    </div>
</div>
@endsection