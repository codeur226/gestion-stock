<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         
        @can('employe')
        <li class="nav-item">
         <a href="{{ route('home') }}" class="nav-link {{ setMenuActive('home') }}">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Accueil
              </p>
            </a>
          </li>
        @endcan
        @can('superadmin')
       <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Tableau de bord
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="nav-icon fas fa-chart-line"></i>
                  <p>Vue globale</p>
                </a>
              </li>

               
              {{--<li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-fingerprint"></i>
                  <p>Roles et permissions</p>
                </a>
              </li>--}}
            </ul>

            <li class="nav-item {{ setMenuClass('superadmin.habilitation.', 'menu-open') }}">
            <a href="#" class="nav-link {{ setMenuClass('superadmin.habilitation.', 'active') }}">
              <i class=" nav-icon fas fa-user-shield"></i>
              <p>
                Habilitations
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a
                href="{{ route('superadmin.habilitation.users.index') }}"
                class="nav-link {{ setMenuActive('superadmin.habilitation.users.index') }}"
                >
                  <i class=" nav-icon fas fa-users-cog"></i>
                  <p>Utilisateurs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-fingerprint"></i>
                  <p>Roles et permissions</p>
                </a>
              </li>
            </ul>
          </li>

           <li class="nav-item {{ setMenuClass('superadmin.gestmateriel', 'menu-open') }}">
            <a href="#" class="nav-link {{ setMenuClass('superadmin.gestmateriel.', 'active') }}">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Gestions Materiels
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('superadmin.gestmateriel.CategorieMateriels') }}" 
                class="nav-link {{ setMenuActive('superadmin.gestmateriel.CategorieMateriels') }}">
                  <i class="nav-icon far fa-circle"></i>
                  <p>categorie de materiels</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('superadmin.gestmateriel.materiels') }}" 
                class="nav-link {{ setMenuActive('superadmin.gestmateriel.materiels') }}">
                  <i class="nav-icon fas fa-list-ul"></i>
                  <p>Materiels</p>
                </a>
              </li>
       
              <li class="nav-item">
                <a href="{{ route('superadmin.gestmateriel.entrees') }}" 
                class="nav-link {{ setMenuActive('superadmin.gestmateriel.entrees') }}">
                  <i class="nav-icon fas  fa-arrow-circle-down"></i>
                  <p>Entrees</p>
                </a>
              </li>

              <li class="nav-item">
               <a href="{{ route('superadmin.gestmateriel.sorties') }}" 
                class="nav-link {{ setMenuActive('superadmin.gestmateriel.sorties') }}">
                  <i class="nav-icon fas  fa-arrow-circle-up"></i>
                  <p>Sorties</p>
                </a>
              </li>
            </ul>
        </li>

              <li class="nav-item {{ setMenuClass('superadmin.gestfournisseur.', 'menu-open') }}">
            <a href="#" class="nav-link {{ setMenuClass('superadmin.gestfournisseur.', 'active') }}">
              <i class=" nav-icon fas fa-users"></i>
              <p>
                Gestions Fournisseurs
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a
                href="{{ route('superadmin.gestfournisseur.Fournisseurs') }}"
                class="nav-link {{ setMenuActive('superadmin.gestfournisseur.Fournisseurs') }}"
                >
                  <i class=" nav-icon fas fa-users-cog"></i>
                  <p>Fournisseurs</p>
                </a>
              </li>
              
          </li>
            </ul>
          </li>

          
        @endcan

        @can('admin')
          <li class="nav-item {{ setMenuClass('admin.habilitations.', 'menu-open') }}">
            <a href="#" class="nav-link {{ setMenuClass('admin.habilitations.', 'active') }}">
              <i class=" nav-icon fas fa-user-shield"></i>
              <p>
                Habilitations
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a
                href="{{ route('admin.habilitations.users.index') }}"
                class="nav-link {{ setMenuActive('admin.habilitations.users.index') }}"
                >
                  <i class=" nav-icon fas fa-users-cog"></i>
                  <p>Utilisateurs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-fingerprint"></i>
                  <p>Roles et permissions</p>
                </a>
              </li>
            </ul>
          </li>
      @endcan
        @can('gestionnaire')
        <li class="nav-item {{ setMenuClass('gestionnaire.gestmateriels', 'menu-open') }}">
            <a href="#" class="nav-link {{ setMenuClass('gestionnaire.gestmateriels.', 'active') }}">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Gestions Materiels
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('gestionnaire.gestmateriels.CategorieMateriels') }}" 
                class="nav-link {{ setMenuActive('gestionnaire.gestmateriels.CategorieMateriels') }}">
                  <i class="nav-icon far fa-circle"></i>
                  <p>categorie de materiels</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('gestionnaire.gestmateriels.materiels') }}" 
                class="nav-link {{ setMenuActive('gestionnaire.gestmateriels.materiels') }}">
                  <i class="nav-icon fas fa-list-ul"></i>
                  <p>Materiels</p>
                </a>
              </li>
       
              <li class="nav-item">
                <a href="{{ route('gestionnaire.gestmateriels.entrees') }}" 
                class="nav-link {{ setMenuActive('gestionnaire.gestmateriels.entrees') }}">
                  <i class="nav-icon fas  fa-arrow-circle-down"></i>
                  <p>Entrees</p>
                </a>
              </li>

              <li class="nav-item">
               <a href="{{ route('gestionnaire.gestmateriels.sorties') }}" 
                class="nav-link {{ setMenuActive('gestionnaire.gestmateriels.sorties') }}">
                  <i class="nav-icon fas  fa-arrow-circle-up"></i>
                  <p>Sorties</p>
                </a>
              </li>
            </ul>
        </li>
      @endcan
        @can('gestionnaire')
        <li class="nav-item {{ setMenuClass('gestionnaire.gestfournisseurs.', 'menu-open') }}">
            <a href="#" class="nav-link {{ setMenuClass('gestionnaire.gestfournisseurs.', 'active') }}">
              <i class=" nav-icon fas fa-users"></i>
              <p>
                Gestions Fournisseurs
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a
                href="{{ route('gestionnaire.gestfournisseurs.Fournisseurs') }}"
                class="nav-link {{ setMenuActive('gestionnaire.gestfournisseurs.Fournisseurs') }}"
                >
                  <i class=" nav-icon fas fa-users-cog"></i>
                  <p>Fournisseurs</p>
                </a>
              </li>
              {{--<li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-fingerprint"></i>
                  <p>Roles et permissions</p>
                </a>
              </li>--}}
            </ul>
          </li>
         @endcan
          
         </ul>
</nav>