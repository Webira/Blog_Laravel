<!DOCTYPE html>

<aside class="control-sidebar control-sidebar-dark">

<div class="card-primary card-outline">
<div class="card-body box-profile">
<div class="text-center">
<img class="profile-user-img img-fluid img-circle" src="{{asset('images/user.png')}}" alt="User profile picture">
</div>
<!--<h3 class="profile-username text-center">Nina Mcintire</h3>-->
 <h3 class="profile-username text-center ellipsis">{{userFullName()}}</h3>
<p class="text-muted text-center">{{getRolesName()}}</p>

<ul class="list-group bg-dark mb-3">
  <li class="list-group-item">
    <a href="{{ route('password.update')}}" class="d-flex align-items-center "><i class="fa fa-lock pr-2"></i><b >Mot de passe</b> </a>
  </li>
  
  <li class="list-group-item">
    <a href="#" class="d-flex align-items-center"><i class="fa fa-user pr-2"></i><b >Mon profil</b></a>
   
  </li>
</ul>
<div>
              
            </div>
<a class="btn btn-primary btn-block" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
            Déconnecter</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
     @csrf
</form>
</div>

</div>
</aside>
</html>