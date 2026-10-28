<x-layouts.dashboard>
    <x-slot:title>Kopdes</x-slot:title>
    <x-card>
        <div class="flex justify-end">    
            <button class="btn" onclick="kopdes_add.showModal()">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus preview-icon"><path d="M5 12h14"/><path d="M12 5v14"/></svg> 
                Add
            </button>
        </div>
        <table class="table">
            <!-- head -->
            <thead>
                <tr>
                <th></th>
                <th>Produk</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <!-- row 1 -->
                <tr>
                <th>1</th>
                <td>Beras 5 kg</td>
                <td>42</td>
                <td>Rp 75.000</td>
                <td><div class="badge badge-outline badge-success">Tersedia</div></td>
                </tr>

                <tr>
                <th>2</th>
                <td>Beras 5 kg</td>
                <td>42</td>
                <td>Rp 75.000</td>
                <td><div class="badge badge-outline badge-warning">Menipis</div></td>
                </tr>

                <tr>
                <th>3</th>
                <td>Beras 5 kg</td>
                <td>42</td>
                <td>Rp 75.000</td>
                <td><div class="badge badge-outline badge-error">Habis</div></td>
                </tr>
            </tbody>
        </table>
    </x-card>
    <dialog id="kopdes_add" class="modal modal-bottom sm:modal-middle">
        <div class="modal-box">
            <form action="">
                <fieldset class="fieldset w-full bg-base-100 border-base-300 rounded-box border p-4">
                  <legend class="fieldset-legend">Kopdes Baru</legend>
                
                  <label class="label">Name</label>
                  <input type="text" class="input w-full" placeholder="Kopdes A" />

                  <label class="label">Province</label>
                  <select id="province" class="select w-full">
                      <option value="" disabled selected>Pilih Provinsi</option>
                      @foreach ($provinces as $province)
                          <option value="{{ $province->name }}" data-code="{{ $province->code }}">{{ $province->name }}</option>
                      @endforeach
                  </select>
                  
                  <label class="label">City</label>
                  <select id="regency" class="select w-full" disabled>
                      <option value="" disabled selected>Pilih Kota/Kabupaten</option>
                  </select>
                  
                  <label class="label">District</label>
                  <select id="district" class="select w-full" disabled>
                      <option value="" disabled selected>Pilih Kecamatan</option>
                  </select>
                  
                  <label class="label">Village</label>
                  <select id="village" class="select w-full" disabled>
                      <option value="" disabled selected>Pilih Kelurahan/Desa</option>
                  </select>
                
                  <label class="label">Address</label>
                  <input type="text" class="input w-full" placeholder="Jalan ABCDE" />
                </fieldset>
                <div class="modal-action">
                    <button type="submit" class="btn btn-success">Add</button>
                </div>
            </form>
        </div>
    </dialog>
</x-layouts.dashboard>

<script>
    const selects = {
        province: document.getElementById('province'),
        regency: document.getElementById('regency'),
        district: document.getElementById('district'),
        village: document.getElementById('village'),
    };

    const codeOf = (select) => select.selectedOptions[0]?.dataset.code;

    async function fill(select, url, placeholder) {
        select.innerHTML = `<option value="" disabled selected>${placeholder}</option>`;
        select.disabled = true;

        if (!url) return;

        const response = await fetch(url);
        const items = await response.json();

        items.forEach((item) => {
            const option = new Option(item.name, item.name);
            option.dataset.code = item.code;
            select.add(option);
        });
        select.disabled = false;
    }

    selects.province.addEventListener('change', (e) => {
        const code = codeOf(e.target);
        fill(selects.regency, code && `/kopdes/provinces/${code}/regencies`, 'Pilih Kota/Kabupaten');
    });

    selects.regency.addEventListener('change', (e) => {
        const code = codeOf(e.target);
        fill(selects.district, code && `/kopdes/regencies/${code}/districts`, 'Pilih Kecamatan');
    });

    selects.district.addEventListener('change', (e) => {
        const code = codeOf(e.target);
        fill(selects.village, code && `/kopdes/districts/${code}/villages`, 'Pilih Kelurahan/Desa');
    });
</script>
