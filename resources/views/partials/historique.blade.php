<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
    aria-expanded="false">
    <i data-feather="clock" class="noti-icon"></i>
</a>
<div class="dropdown-menu dropdown-menu-end dropdown-lg">

    <!-- item-->
    <div class="dropdown-item noti-title">
        <h5 class="m-0">Historique
        </h5>
    </div>

    <div class="noti-scroll" data-simplebar>
        @foreach ($histories as $history)
            <!-- item-->
            <div href="" class="dropdown-item notify-item text-muted link-primary active">
                <div class="notify-icon">
                    <img src="{{ asset('storage/' . $history->profile->image) }}" class="img-fluid rounded-circle" />
                </div>
                <div class="d-flex align-items-center justify-content-between">
                    <p class="notify-details">{{ $history->profile->prenom }} {{ $history->profile->nom }}</p>
                    <small class="text-muted">{{ $history->time_ago }}</small>
                </div>
                <p class="mb-0 user-msg">
                    <small class="fs-14">{{ $history->action }}</small>
                </p>
            </div>
        @endforeach
    </div>

</div>
