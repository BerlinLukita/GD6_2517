<div class="mb-3">
    <label for="promotor_id" class="form-label">Promotor</label>
    <select name="promotor_id" id="promotor_id"
            class="form-select @error('promotor_id') is-invalid @enderror">
        <option value="">-- Pilih promotor --</option>
        @foreach ($daftarPromotor as $promotor)
            <option value="{{ $promotor->id }}"
                @selected(old('promotor_id', $konser->promotor_id ?? '') == $promotor->id)>
                {{ $promotor->nama }}
            </option>
        @endforeach
    </select>
    @error('promotor_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="nama" class="form-label">Nama Konser</label>
    <input type="text" name="nama" id="nama"
           class="form-control @error('nama') is-invalid @enderror"
           value="{{ old('nama', $konser->nama ?? '') }}">
    @error('nama')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="kota" class="form-label">Kota</label>
    <input type="text" name="kota" id="kota"
           class="form-control @error('kota') is-invalid @enderror"
           value="{{ old('kota', $konser->kota ?? '') }}">
    @error('kota')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="row">
    <div class="col-md-4 mb-3">
        <label for="harga" class="form-label">Harga (Rp)</label>
        <input type="number" min="0" name="harga" id="harga"
               class="form-control @error('harga') is-invalid @enderror"
               value="{{ old('harga', $konser->harga ?? '') }}">
        @error('harga')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4 mb-3">
        <label for="sisa" class="form-label">Sisa Tiket</label>
        <input type="number" min="0" name="sisa" id="sisa"
               class="form-control @error('sisa') is-invalid @enderror"
               value="{{ old('sisa', $konser->sisa ?? '') }}">
        @error('sisa')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4 mb-3">
        <label for="tanggal" class="form-label">Tanggal</label>
        <input type="date" name="tanggal" id="tanggal"
               class="form-control @error('tanggal') is-invalid @enderror"
               value="{{ old('tanggal', $konser->tanggal ?? '') }}">
        @error('tanggal')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
