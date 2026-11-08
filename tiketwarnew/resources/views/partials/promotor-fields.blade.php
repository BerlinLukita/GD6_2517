<div class="mb-3">
    <label for="nama" class="form-label">Nama Promotor</label>
    <input type="text"
           name="nama"
           id="nama"
           class="form-control @error('nama') is-invalid @enderror"
           value="{{ old('nama', $promotor->nama ?? '') }}">

    @error('nama')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="kontak" class="form-label">Kontak</label>
    <input type="text"
           name="kontak"
           id="kontak"
           class="form-control @error('kontak') is-invalid @enderror"
           value="{{ old('kontak', $promotor->kontak ?? '') }}">

    @error('kontak')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
