@if (session()->has('success'))
    <x-alert type="success">
        {{ session('success') }}
    </x-alert>
@elseif (session()->has('error'))
    <x-alert type="danger">
        {{ session('error') }}
    </x-alert>
@endif
