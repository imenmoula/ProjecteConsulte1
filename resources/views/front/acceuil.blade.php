@extends('front/home')

@section('container')

<div class="header-carousel-two owl-carousel owl-theme">
    <div class="item text-center">
        <img src="{{ asset('photo/img.webp') }}" alt="Image 1">
        <p>Expérience inoubliable avec nos experts</p>
    </div>
    <div class="item text-center">
        <img src="{{ asset('photo/img4.webp') }}" alt="Image 2">
        <p>Des solutions innovantes pour tous vos besoins</p>
    </div>
    <div class="item text-center">
        <img src="{{ asset('photo/img3.webp') }}" alt="Image 2">
        <p>satisfaction garantie pour tous nos clients</p>
    </div>
    
</div>



{{-- **************************************************************************************** --}}
<section class="receipe-section pt-100 pb-70">
    <div class="container">
        <div class="row">
            <!-- Sidebar pour les filtres -->
            <div class="col-sm-12 col-md-4 col-lg-4">
                <div class="filter-section">
                    <form action="{{ route('front.acceuil') }}" method="get">
                    <h4>Filtrer par :</h4>
                    
                    <!-- Localisation -->
                    <div class="filter-group">
                        <h5>Localisation</h5>
                        @if (isset($locations) && $locations->isNotEmpty())
                            @foreach ($locations as $location)
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input filter-checkbox" name="location[]" value="{{ $location }}" data-address="{{ $location }}">
                                    <label class="form-check-label">{{ $location }}</label>
                                </div>
                            @endforeach
                        @else
                            <p>Aucune localisation disponible.</p>
                        @endif
                    </div>
                    
                    <!-- Disponibilité (Status) -->
                    <div class="filter-group">
                        <h5>Disponibilité</h5>
                        @foreach ($status as $statue)
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input filter-checkbox" name="status[]" value="{{ $statue }}">
                                <label class="form-check-label">{{ ucfirst($statue) }}</label>
                            </div>
                        @endforeach
                    </div>
                    
                    <!-- Domaine d'expertise -->
                    <div class="filter-group">
                        <h5>Domaine d'expertise</h5>
                        @if (isset($domaines) && $domaines->isNotEmpty())
                            @foreach ($domaines as $domaine)
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input filter-checkbox" name="domaine[]" value="{{ $domaine->id }}" data-domaine="{{ $domaine->name }}">
                                    <label class="form-check-label">{{ $domaine->name }}</label>
                                </div>
                            @endforeach
                        @else
                            <p>Aucun domaine d'expertise disponible.</p>
                        @endif
                    </div>
                </div>
            </div>
            
            <!-- Liste des experts -->
            <div class="col-sm-12 col-md-8 col-lg-8">
                <div class="section-title">
                    <h2>Les meilleurs experts de Consulting Group</h2>
                </div>
                <div class="receipe-grid" id="experts-container">
                    @foreach ($experts as $expert)
                        <div class="receipe-item pb-30">
                            <div class="receipe-item-inner">
                                <div class="receipe-image">
                                    <img src="{{ Storage::url($expert->image) }}" alt="expert">
                                </div>
                                <div class="receipe-content">
                                    <h3><a href="{{ route('expert.detail', $expert->id) }}">{{ $expert->name }}</a></h3>
                                    <h4>Spécialité : {{ $expert->job }}</h4>
                                    <h4>Domaine : {{ $expert->domaine->name }}</h4>
                                </div>
                            </div>
                            <div class="receipe-cart">
                                <a href="{{ route('expert.detail', $expert->id) }}">
                                    <i class="fas fa-eye"></i> 
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Bouton pour appliquer les filtres -->
<button id="apply-filters" class="btn btn-primary mt-3">Appliquer les filtres</button>

</form>
    
    
    <!-- Script pour gérer les filtres -->
    <script>
document.getElementById('apply-filters').addEventListener('click', function () {
    // Capture selected filter values
    const address = document.getElementById('address').value;
    const status = [];
    document.querySelectorAll('input[name="status[]"]:checked').forEach(el => status.push(el.value));
    const domaine_id = document.getElementById('domaine_id').value;

    // Prepare the filters object
    const filters = {
        address: address,
        status: status,
        domaine_id: domaine_id,
    };

    // Send the filters to the server via AJAX
    fetch('/filter-experts', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(filters),
    })
    .then(response => response.json())
    .then(data => {
        // Update the experts grid with the filtered data
        const expertsContainer = document.getElementById('experts-container');
        expertsContainer.innerHTML = ''; // Clear existing experts

        data.experts.forEach(expert => {
            // Append new expert data to the container
            const expertDiv = document.createElement('div');
            expertDiv.classList.add('expert-item');
            expertDiv.innerHTML = `
                <div class="expert-image">
                    <img src="${expert.image}" alt="${expert.name}">
                </div>
                <div class="expert-info">
                    <h3>${expert.name}</h3>
                    <p>${expert.job}</p>
                    <p>Domaine: ${expert.domaine.name}</p>
                    <p>Adresse: ${expert.address}</p>
                    <p>Status: ${expert.availability}</p>
                </div>
            `;
            expertsContainer.appendChild(expertDiv);
        });
    })
    .catch(error => console.error('Error filtering experts:', error));
});




</script>
    
@endsection
