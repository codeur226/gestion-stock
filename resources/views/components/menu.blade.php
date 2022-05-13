<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

        <li class="nav-item">
         <a href="{{ route('home') }}" class="nav-link {{ setMenuActive('home') }}">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Accueil
              </p>
            </a>
          </li>
        @can('manager')
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
                  <i class="nav-icon fas fa-swatchbook"></i>
                  <p>Locations</p>
                </a>
              </li>--}}
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

        <li class="nav-item {{ setMenuClass('admin.gestmateriels', 'menu-open') }}">
            <a href="#" class="nav-link {{ setMenuClass('admin.gestmateriels.', 'active') }}">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Gestions Materiels
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('admin.gestmateriels.CategorieMateriels') }}" 
                class="nav-link {{ setMenuActive('admin.gestmateriels.CategorieMateriels') }}">
                  <i class="nav-icon far fa-circle"></i>
                  <p>categorie de materiels</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.gestmateriels.materiels') }}" 
                class="nav-link {{ setMenuActive('admin.gestmateriels.materiels') }}">
                  <i class="nav-icon fas fa-list-ul"></i>
                  <p>Materiels</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.gestmateriels.entrees') }}" 
                class="nav-link {{ setMenuActive('admin.gestmateriels.entrees') }}">
                  <i class="nav-icon fas  fa-arrow-circle-down"></i>
                  <p>Entrees</p>
                </a>
              </li>

              <li class="nav-item">
               <a href="{{ route('admin.gestmateriels.sorties') }}" 
                class="nav-link {{ setMenuActive('admin.gestmateriels.sorties') }}">
                  <i class="nav-icon fas  fa-arrow-circle-up"></i>
                  <p>Sorties</p>
                </a>
              </li>
            </ul>
        </li>
        @endcan
        @can('employe')
        <li class="nav-item {{ setMenuClass('employe.gestfournisseurs.', 'menu-open') }}">
            <a href="#" class="nav-link {{ setMenuClass('employe.gestfournisseurs.', 'active') }}">
              <i class=" nav-icon fas fa-users"></i>
              <p>
                Gestions Fournisseurs
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a
                href="{{ route('employe.gestfournisseurs.Fournisseurs') }}"
                class="nav-link {{ setMenuActive('employe.gestfournisseurs.Fournisseurs') }}"
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