<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
            @if(auth()->check() && auth()->user()->role == 'expert') 
                <li>
                    <a href="{{ route('consultation.index') }}" class="ai-icon" aria-expanded="false">
                        <i class="flaticon-381-television"></i>
                        <span class="nav-text">Gestion des consultations</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('profile.edit') }}" class="ai-icon" aria-expanded="false">
                        <i class="flaticon-381-settings-2"></i>
                        <span class="nav-text">Modif Profil</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('availabilities.index', ['userId' => auth()->user()->id]) }}" class="ai-icon" aria-expanded="false">
                        <i class="flaticon-381-settings-2"></i>
                        <span class="nav-text">Gestion des disponibilités</span>
                    </a>
                </li>
            @elseif(auth()->check() && auth()->user()->role == 'admin')
                <li>
                    <a href="{{ route('domaines.index') }}" class="ai-icon" aria-expanded="false">
                        <i class="flaticon-381-television"></i>
                        <span class="nav-text">Gestion des domaines</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('experts.index') }}" class="ai-icon" aria-expanded="false">
                        <i class="flaticon-381-settings-2"></i>
                        <span class="nav-text">Gestion des experts</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('experts.status') }}" class="ai-icon" aria-expanded="false">
                        <i class="flaticon-381-settings-2"></i>
                        <span class="nav-text">suivi disponibiliter des experts</span>
                    </a>
                </li>
                {{-- <li>
                    <a href="{{ route('User.nb') }}" class="ai-icon" aria-expanded="false">
                        <i class="flaticon-381-settings-2"></i>
                        <span class="nav-text">les cart</span>
                    </a>
                </li> --}}
                <li>
                    <a href="{{ route('users.index') }}" class="ai-icon" aria-expanded="false">
                        <i class="flaticon-381-settings-2"></i>
                        <span class="nav-text">Liste des clients</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</div>
