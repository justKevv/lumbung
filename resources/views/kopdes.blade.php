<x-layouts.dashboard>
    <x-slot:title>Kopdes</x-slot:title>
    @if ($errors->any())
        <div class="alert alert-error mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <x-resources-table
        model="kopdes" 
        :datas="$kopdes" 
        :datas_name="$fields">
            <x-slot:modal_add>
                <label class="label">Nama</label>
                <input type="text" name="name" class="input w-full" placeholder="Kopdes A" />

                <label class="label">Provinsi</label>
                <select data-field="province" name="province" class="select w-full">
                    <option value="" disabled selected>Pilih Provinsi</option>
                    @foreach ($provinces as $province)
                        <option value="{{ $province->name }}" data-code="{{ $province->code }}">{{ $province->name }}</option>
                    @endforeach
                </select>
                
                <label class="label" name="regency">Kota</label>
                <select data-field="regency" name="city" class="select w-full" disabled>
                    <option value="" disabled selected>Pilih Kota/Kabupaten</option>
                </select>
                
                <label class="label">Kecamatan</label>
                <select data-field="district" name="district" class="select w-full" disabled>
                    <option value="" disabled selected>Pilih Kecamatan</option>
                </select>
                
                <label class="label">Kelurahan/Desa</label>
                <select data-field="village" name="village" class="select w-full" disabled>
                    <option value="" disabled selected>Pilih Kelurahan/Desa</option>
                </select>
                
                <label class="label">Alamat</label>
                <input type="text" name="address" class="input w-full" placeholder="Jalan ABCDE" />
            </x-slot:modal_add>
            <x-slot:modal_edit>
                @foreach ($kopdes as $kd)
                    <label class="label">Nama</label>
                    <input type="text" name="name" value="{{ $kd->name }}" class="input w-full" placeholder="Kopdes A" />

                    <label class="label">Provinsi</label>
                    <select data-field="province" name="province" class="select w-full">
                        <option value="" disabled>Pilih Provinsi</option>
                        <option value="{{ $kd->province }}" selected>{{ $kd->province }}</option>
                        @foreach ($provinces as $province)
                            <option value="{{ $province->name }}" data-code="{{ $province->code }}">{{ $province->name }}</option>
                        @endforeach
                    </select>
                    
                    <label class="label" name="regency">Kota</label>
                    <select data-field="regency" name="city" class="select w-full">
                        <option value="" disabled>Pilih Kota/Kabupaten</option>
                        <option value="{{ $kd->city }}"selected>{{ $kd->city }}</option>
                    </select>
                    
                    <label class="label">Kecamatan</label>
                    <select data-field="district" name="district" class="select w-full">
                        <option value="" disabled selected>Pilih Kecamatan</option>
                        <option value="{{ $kd->kecamatan }}" selected>{{ $kd->kecamatan }}</option>
                    </select>
                    
                    <label class="label">Kelurahan/Desa</label>
                    <select data-field="village" name="village" class="select w-full">
                        <option value="" disabled>Pilih Kelurahan/Desa</option>
                        <option value="{{ $kd->kelurahan }}" selected>{{ $kd->kelurahan }}</option>
                        
                    </select>
                
                    <label class="label">Alamat</label>
                    <input type="text" value="{{ $kd->address }}" name="address" class="input w-full" placeholder="Jalan ABCDE" />
                @endforeach
            </x-slot:modal_edit>
        </x-resources-table>
</x-layouts.dashboard>
<script>
    async function fill(select, url, placeholder) {
        select.innerHTML = `<option value="" disabled selected>${placeholder}</option>`;

        if (!url) return;

        const response = await fetch(url);
        const items = await response.json();

        items.forEach((item) => {
            const option = new Option(item.name, item.name);
            option.dataset.code = item.code;
            select.add(option);
        });
    }

    const codeOf = (select) => select.selectedOptions[0]?.dataset.code;

    function initCascade(form) {
        const field = (name) => form.querySelector(`[data-field="${name}"]`);
        const province = field('province');
        const regency = field('regency');
        const district = field('district');
        const village = field('village');

        province.addEventListener('change', (e) => {
            const code = codeOf(e.target);
            fill(regency, code && `/kopdes/provinces/${code}/regencies`, 'Pilih Kota/Kabupaten');
        });

        regency.addEventListener('change', (e) => {
            const code = codeOf(e.target);
            fill(district, code && `/kopdes/regencies/${code}/districts`, 'Pilih Kecamatan');
        });

        district.addEventListener('change', (e) => {
            const code = codeOf(e.target);
            fill(village, code && `/kopdes/districts/${code}/villages`, 'Pilih Kelurahan/Desa');
        });
    }

    document.querySelectorAll('form[data-cascade]').forEach(initCascade);
</script>
