@props([
    'kopdes',
    'provinces'
])

<label class="label">Nama</label>
<input type="text" name="name" value="{{ $kopdes->name }}" class="input w-full" placeholder="Kopdes A" />

<label class="label">Provinsi</label>
<select data-field="province" name="province" class="select w-full">
    <option value="" disabled>Pilih Provinsi</option>
    <option value="{{ $kopdes->province }}" selected>{{ $kopdes->province }}</option>
    @foreach ($provinces as $province)
        <option value="{{ $province->name }}" data-code="{{ $province->code }}">{{ $province->name }}</option>
    @endforeach
</select>

<label class="label" name="regency">Kota</label>
<select data-field="regency" name="city" class="select w-full">
    <option value="" disabled>Pilih Kota/Kabupaten</option>
    <option value="{{ $kopdes->city }}"selected>{{ $kopdes->city }}</option>
</select>

<label class="label">Kecamatan</label>
<select data-field="district" name="district" class="select w-full">
    <option value="" disabled selected>Pilih Kecamatan</option>
    <option value="{{ $kopdes->kecamatan }}" selected>{{ $kopdes->kecamatan }}</option>
</select>

<label class="label">Kelurahan/Desa</label>
<select data-field="village" name="village" class="select w-full">
    <option value="" disabled>Pilih Kelurahan/Desa</option>
    <option value="{{ $kopdes->kelurahan }}" selected>{{ $kopdes->kelurahan }}</option>
    
</select>

<label class="label">Alamat</label>
<input type="text" value="{{ $kopdes->address }}" name="address" class="input w-full" placeholder="Jalan ABCDE" />
