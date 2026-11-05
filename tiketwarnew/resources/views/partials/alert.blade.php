@php
    $type = $type ?? 'info';
    $pesan = $pesan ?? 'Informasi';
@endphp

<div class="alert alert-{{ $type }}" role="alert">
    {{ $pesan }}
</div>
