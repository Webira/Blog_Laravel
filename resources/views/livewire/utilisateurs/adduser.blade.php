{{--card add User--}}
    
<div class="col-md-6">

<div class="card card-primary">
<div class="card-header">
<h3 class="card-title">Formulaire de création d'un nouvel utilisateur</h3>
</div>

 <form role="form" wire:submit.prevent="addUser()">
<div class="card-body">

<div class="form-group flex-grow-1 mr-2">
    <label >Prenom</label>
     <input type="text" wire:model="newUser.name" class="form-control @error('newUser.name') is-invalid @enderror">

    @error("newUser.name")
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group flex-grow-1">
    <label >Nom de famille</label>
    <input type="text" wire:model="newUser.surname" class="form-control @error('newUser.surname') is-invalid @enderror">

    @error("newUser.surname")
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group flex-grow-1">
    <label >Nickname</label>
    <input type="text" wire:model="newUser.nickname" class="form-control @error('newUser.nickname') is-invalid @enderror">

    @error("newUser.nickname")
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label >Email address</label>
    <input type="text" class="form-control @error('newUser.email') is-invalid @enderror" wire:model="newUser.email">
    @error("newUser.email")
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label for="exampleInputPassword1">Mot de passe</label>
    <input type="text" class="form-control" disabled placeholder="Password" >
</div>

{{--<div class="form-group">
<label for="exampleInputEmail1">Email address</label>
<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
</div>
<div class="form-group">
<label for="exampleInputPassword1">Password</label>
<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
</div>--}}

<div class="input-group-append">
<span class="input-group-text">Upload</span>
</div>
</div>
</div>
<div class="form-check">
<input type="checkbox" class="form-check-input" id="exampleCheck1">
<label class="form-check-label" for="exampleCheck1">Check me out</label>
</div>
</div>

<div class="card-footer">
        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <button type="button" wire:click="goToListUser()" class="btn btn-danger">Retouner à la liste des utilisateurs</button>
</div>

{{--<div class="card-footer">
<button type="submit" class="btn btn-primary">Submit</button>
</div>--}}
</form>
</div>

</div>


