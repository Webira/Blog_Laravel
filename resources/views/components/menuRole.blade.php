<!DOCTYPE html>
<nav class="mt-2">
<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

         <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                  <p>Accueil</p>
                </a>
         </li> 
         
         <li class="nav-item">
               <a href="{{ route('posts.index') }}" class="nav-link"><p>Blog</p></a>
         </li>
        
         <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('accesopensim') }}" class="nav-link"><strong>Accès au "OpenSim"</strong></a>
            </li>
            
          <li class="nav-item">
               <a href="{{ route('contactform.create') }}" class="nav-link"><p>Nous contacter</p></a>
          </li>
    
         <li class="nav-item d-none d-sm-inline-block">
            <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><strong>Déconnecter</strong></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                     @csrf
                    </form>
         </li> 

<!-- Manager-->
 @can("manager") 
  
    <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Tableau de bord : 
               {{--<i class="right fas fa-angle-left"></i>--}}
              </p>
            </a>
              {{--<li class="nav-item">
                <a href="#" class="nav-link">
                  {{--<i class="nav-icon fas fa-chart-line"></i>
                  <p>Vue globale</p>
                </a>
              </li>--}}
              <li class="nav-item">
                  <a href="{{route('manager.opensim.usersim.usersimList')}}" class="nav-link"> 
                  <p>Gestion des Utilisateurs d'OpenSim</p>
                </a>
              </li>
              <li class="nav-item">
                  <a href="{{route('contactboard.index')}}" class="nav-link"> 
                  <p>Gestion des Messages</p>
                </a>
              </li>
          
              <li class="nav-item">
                <a href="{{ route('manager.opensim.dashboard.dashboardAdmin') }}" class="nav-link">
                  <i class="nav-icon fas fa-swatchbook"></i>
                  <p>Gestion des Postes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('categorys.index') }}" class="nav-link">
                <p>Gestion des Categories</p>
                </a>
              </li>
    </li>
    @endcan 

<!--Admin-->
@can('admin')
  
              <li class="nav-item">
                <a href="#" class="nav-link">
                 <i class="fas fa-user"></i>
                  <p>Gestion des Utilisateurs : </p>
                </a>
              </li> 
              <li class="nav-item">
                  <a href="{{route('admin.adopensim.usersim.usersimList')}}" class="nav-link">
                      <p>Gestion des Users d'OpenSim</p>
                  </a>
              </li>
             <li class="nav-item">
                  <a href="{{route('contactboard.index')}}" class="nav-link"> 
                  <p>Gestion des Messages</p>
                </a>
              </li>
              
              </li>
              <li class="nav-item">
                  <a href="{{ route('admin.adopensim.dashboard.dashboardAdmin') }}" class="nav-link">
                  <i class="nav-icon fas fa-swatchbook"></i>
                  <p>Gestion des Postes</p></a>
              </li>
                <li class="nav-item">
                    <a href="{{ route('categorys.index') }}" class="nav-link">
                    <p>Gestion des Categories</p>
                    </a>
              </li>             
               <li class="nav-item">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-fingerprint"></i>
                    <p>Gestion de contenu OpenSimulator : </p>
                    </a>
                </li>
              <li class="nav-item">
                    <a href="#" class="nav-link ">
                    <p>Parametrage Grilles</p>
                    </a>
              </li>
              <li class="nav-item">
                    <a href="#" class="nav-link">
                    <p>Gestion des Régions</p>
                    </a>
              </li>
              <li class="nav-item">
                    <a href="#" class="nav-link">
                    <p>Instalation rapide</p>
                    </a>
              </li>
             
  @endcan
      
  {{--@endcan--}}

    
</ul>
</nav>
</html>



