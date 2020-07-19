@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Liste des contacts</div>

                <div class="card-body">
                    @if(session('success'))

                    <div class="alert alert-success" role="alert">
                        {{session('success')}}
                    </div>
                    @endif
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Prénom</th>
                                <th scope="col">Email</th>
                                <th scope="col">Téléphone</th>
                                <th scope="col">Adresse</th>
                                <th scope="col">Code postal</th>
                                <th scope="col">Ville</th>
                                <th scope="col">Commentaire</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($contacts as $contact)
                            <tr>
                                <th scope="row">{{$contact->id}}</th>
                                <td>{{$contact->last_name}}</td>
                                <td>{{$contact->first_name}}</td>
                                <td>{{$contact->email}}</td>
                                <td>{{$contact->phone}}</td>
                                <td>{{$contact->adresse}}</td>
                                <td>{{$contact->postal_code}}</td>
                                <td>{{$contact->city}}</td>
                                <td>{{$contact->comment}}</td>

                                <td style="text-align: center; vertical-align: middle;">
                                    <a href="{{route('list_contacts.edit',$contact->id)}}" class="btn btn-primary btn-mini"><i class="fa fa-pencil" aria-hidden="true"></i></a>

                                    <form id="form_{{$contact->id}}" action="{{ route('list_contacts.destroy', $contact->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" data-id="{{$contact->id}}"  class=" btn-del-cont btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Confirmation de la suppression</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Etes-vous sûr de vouloir supprimer cet élément ?</p>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="cont_id" value="">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                <button type="button" id="btn-delete" class="btn btn-primary">Confirmer</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $(function() {
        $('.btn-del-cont').click(function() {
            $('#cont_id').val($(this).data('id'));
            $('#exampleModalCenter').modal('show');
        });
        $("#btn-delete").click(function() {
            cont_id=$('#cont_id').val();
            $( "#form_"+cont_id ).submit();
        });
    });
</script>
@endsection