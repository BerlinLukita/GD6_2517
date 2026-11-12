@if ($status === 'lunas')
    <span class="badge bg-success">Lunas</span>
@elseif ($status === 'menunggu_bayar')
    <span class="badge bg-warning text-dark">Menunggu bayar</span>
@else
    <span class="badge bg-secondary">Batal</span>
@endif