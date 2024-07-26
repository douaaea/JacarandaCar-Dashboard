<div class="col-sm-6 col-xl-3">
    <div class="card d-block">
        <a href="{{ route('voiture.detail', $voiture->idVoiture) }}" class="card-link">
            <div class="card-body">
                <h4 class="card-title">{{ $voiture->marqueVoiture }} {{ $voiture->modelMarque }} {{ $voiture->type }}
                </h4>
                <h6 class="card-subtitle text-muted">{{ $voiture->matricule }}</h6>
            </div>
            <img class="img-fluid" src="{{ asset('storage/' . $voiture->image) }}" alt="Card image cap"
                style="height: 220px; ">
        </a>
        <div class="card-body">
            <p class="card-text text-muted">PRIX: {{ number_format($voiture->prixJour, 2) }} DH/jour</p>

            <div class="row">
                <div class="col">
                    <a class="btn btn-warning w-100" href="{{ route('voiture.edit', $voiture->idVoiture) }}"
                        role="button">Modifier</a>
                </div>
                <div class="col">
                    <form id="delete-form-{{ $voiture->idVoiture }}"
                        action="{{ route('voiture.destroy', $voiture->idVoiture) }}" method="POST">
                        @csrf
                        @method('DELETE')
                    </form>
                    <button class="btn btn-danger w-100"
                        onclick="confirmDelete(event, {{ $voiture->idVoiture }})">Retirer</button>
                </div>
            </div>
        </div> <!-- end card-body-->
    </div> <!-- end card-->
</div><!-- end col -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
