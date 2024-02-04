
{{--Tableau--}}
<div>

<div class="row p-4 pt-5">
<div class="col-12">
<h1>Liste des utilisateurs OpenSim</h1>
<div class="card">

<div class="card-header bg-secondary">

<h3 class="card-title">Utilisateurs d'OpenSim</h3>
<div class="card-tools d-flex align-items-center">

<a class="btn btn-link text-white mr-4 d-block" wire:click.prevent="goToAddUser
()"><i class="fas fa-user-plus"></i>Ajouter un utilisateur</a>

{{--<a href="{{route('adduserform')}}" class="nav-link"><button type="button"
 class="btn btn-block btn-default btn-sm">Ajouter un utilisateur</button></a>--}}


<a href="{{route('admin.adopensim.volunteers')}}"><button type="button"
 class="btn btn-block btn-default btn-sm">Ajouter un volonter</button></a>

</div>
</div>

<div class="card-body table-responsive p-0 table-striped" style="height: 300px;">
<table class="table table-head-fixed text-nowrap">
<thead>
<tr>
<th style="width:5%">ID</th>
<th style="width:15%">Name</th>
<th style="width:10%">Surname</th>
<th style="width:10%">Nickname</th>
<th style="width:15%">Email</th>
<th style="width:15%">Password</th>
<th style="width:5%">Date created</th>
<th style="width:5%">Roles</th>
<th class="text-center" style="width:5%">Actions</th>

</tr>
</thead>
<tbody>
@foreach($users as $user)
<tr>
<td>{{ $user->id }}</td>
<td>{{ $user->name }}</td>
<td>{{ $user->surname }}</td>
<td>{{ $user->nickname }}</td>
<td>{{ $user->email }}</td>
<td>{{ $user->password }}</td>
<td>{{ $user->created_at }}</td>
<td>{{ $user->allRoleNames }}</td>
<td class="text-center">
    <button class="btn btn-link" wire:click="goToEditUser({{$user->id}})"><i class="far fa-edit"></i></button>
    <button class="btn btn-link" wire:click="confirmDelete('{{ $user->name }} {{ $user->surname }}', {{$user->id}})"> <i class="far fa-trash-alt"></i> </button>
</td>
</tr>
@endforeach

</tbody>
</table>
</div>
{{--<div class="card-footer">--}}
<div class="float-left p-4 pt-5">
    {{ $users->links()}}

</div>
</div>

</div>
</div>


</div>

