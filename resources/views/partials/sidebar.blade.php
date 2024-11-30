<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">

            @if(auth()->check() && auth()->user()->role == 'expert') 
                <li><a href="#" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-381-television"></i>
                    <span class="nav-text">Gestion des consultations</span>
                </a></li>

                <li><a href="#" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-381-settings-2"></i>
                    <span class="nav-text">Gestion profil</span>
                </a></li>

                <li><a href="#" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-381-settings-2"></i>
                    <span class="nav-text">Gestion des disponibilités</span>
                </a></li>

                <li><a href="#" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-381-settings-2"></i>
                    <span class="nav-text">Chat avec les clients</span>
                </a></li>

            @elseif(auth()->check() && auth()->user()->role == 'admin')
                <li><a href="{{ route('domaines.index') }}" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-381-television"></i>
                    <span class="nav-text">Gestion des domaines</span>
                </a></li>

                <li><a href="{{ route('experts.index') }}" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-381-settings-2"></i>
                    <span class="nav-text">Gestion des experts</span>
                </a></li>

                

                <li><a href="#" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-381-settings-2"></i>
                    <span class="nav-text">Gestion des paiements</span>
                </a></li>

                <li><a href="{{ url('User/index') }}" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-381-settings-2"></i>
                    <span class="nav-text">Liste des clients</span>
                </a></li>

            @else
                <!-- Optionnel : Gérer d'autres rôles ou utilisateurs non authentifiés -->
                <li><a href="{{ route('front.home') }}" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-381-home"></i>
                    <span class="nav-text">Accueil</span>
                </a></li>
            @endif

        </ul>
    </div>
</div>