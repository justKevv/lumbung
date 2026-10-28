<x-layouts.dashboard>
    <x-slot:title>Kopdes</x-slot:title>
    <x-card>
        <div class="flex justify-end">    
            <button class="btn" onclick="kopdes_add.showModal()">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus preview-icon"><path d="M5 12h14"/><path d="M12 5v14"/></svg> 
                Add
            </button>
        </div>
        @if ($kopdes->isEmpty())
            <div class="flex flex-col gap-3 p-4 justify-center items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="my-1.5 inline-block stroke-neutral-300 rounded-full border-5 p-4 border-neutral-200 items-center size-30" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shredder preview-icon"><path d="M4 13V4a2 2 0 0 1 2-2h8a2.4 2.4 0 0 1 1.706.706l3.588 3.588A2.4 2.4 0 0 1 20 8v5"/><path d="M14 2v5a1 1 0 0 0 1 1h5"/><path d="M10 22v-5"/><path d="M14 19v-2"/><path d="M18 20v-3"/><path d="M2 13h20"/><path d="M6 20v-3"/></svg>
                <h1 class="text-xl font-semibold text-neutral-300">No data available right now :(</h1>
            </div>
        @else
            <table class="table">
                <!-- head -->
                <thead>
                    <tr>
                    <th></th>
                    <th>Nama</th>
                    <th>Provinsi</th>
                    <th>Kota</th>
                    <th>Kecamatan</th>
                    <th>Kelurahan</th>
                    <th>Alamat</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                            @foreach ($kopdes as $kp)
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $kp->name }}</td>
                                <td>{{ $kp->province }}</td>
                                <td>{{ $kp->city }}</td>
                                <td>{{ $kp->kecamatan }}</td>
                                <td>{{ $kp->kelurahan }}</td>
                                <td>{{ $kp->address }}</td>
                                <td>
                                    <button class="btn btn-ghost" popovertarget="popover-1" style="anchor-name:--anchor-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-ellipsis preview-icon"><circle cx="12" cy="12" r="1"/><circle cx="19" cy="12" r="1"/><circle cx="5" cy="12" r="1"/></svg>
                                    </button>
                                    <ul class="dropdown dropdown-end menu w-52 rounded-box bg-base-100 shadow-sm"
                                      popover id="popover-1" style="position-anchor:--anchor-1">
                                      <li><a><svg xmlns="http://www.w3.org/2000/svg" class="my-1.5 inline-block size-4" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil preview-icon"><path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/><path d="m15 5 4 4"/></svg> Edit</a></li>
                                      <li><button onclick="delete_kopdes_{{ $kp->id }}.showModal()"><svg xmlns="http://www.w3.org/2000/svg" class="my-1.5 inline-block size-4" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash preview-icon"><path d="M10 11v6"/><path d="M14 11v6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"/><path d="M3 6h18"/><path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg> Delete</button></li>
                                    </ul>
                                </td>
                            @endforeach
                    </tr>
                </tbody>
            </table>
        @endif
    </x-card>
    <dialog id="kopdes_add" class="modal modal-bottom sm:modal-middle">
        <div class="modal-box">
            <div class="flex justify-end">    
                <form method="dialog">
                    <button class="btn-ghost"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x preview-icon"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg></button>    
                </form>
            </div>
            <form method="POST" action="{{ route('kopdes.store') }}">
                @csrf
                <fieldset class="fieldset w-full bg-base-100 border-base-300 rounded-box border p-4">
                  <legend class="fieldset-legend">Kopdes Baru</legend>
                
                  <label class="label">Nama</label>
                  <input type="text" name="name" class="input w-full" placeholder="Kopdes A" />

                  <label class="label">Provinsi</label>
                  <select id="province" name="province" class="select w-full">
                      <option value="" disabled selected>Pilih Provinsi</option>
                      @foreach ($provinces as $province)
                          <option value="{{ $province->name }}" data-code="{{ $province->code }}">{{ $province->name }}</option>
                      @endforeach
                  </select>
                  
                  <label class="label" name="regency">Kota</label>
                  <select id="regency" name="city" class="select w-full" disabled>
                      <option value="" disabled selected>Pilih Kota/Kabupaten</option>
                  </select>
                  
                  <label class="label">Kecamatan</label>
                  <select id="district" name="district" class="select w-full" disabled>
                      <option value="" disabled selected>Pilih Kecamatan</option>
                  </select>
                  
                  <label class="label">Kelurahan/Desa</label>
                  <select id="village" name="village" class="select w-full" disabled>
                      <option value="" disabled selected>Pilih Kelurahan/Desa</option>
                  </select>
                
                  <label class="label">Alamat</label>
                  <input type="text" name="address" class="input w-full" placeholder="Jalan ABCDE" />
                </fieldset>
                <div class="modal-action">
                    <button type="submit" class="btn btn-success">Add</button>
                </div>
            </form>
        </div>
    </dialog>
    @foreach ($kopdes as $kd)
        <dialog id="delete_kopdes_{{ $kd->id }}" class="modal modal-bottom sm:modal-middle">
          <div class="modal-box">
              <h3 class="text-lg font-bold">Delete {{ $kd->name }}?</h3>
              <p class="py-4">This action is not reversible!</p>
            <div class="modal-action">
                <form method="dialog">
                    <button class="btn">Cancel</button>    
                </form>
                <form method="POST" action="{{ route('kopdes.delete', $kd) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-error"><svg xmlns="http://www.w3.org/2000/svg" class="my-1.5 inline-block size-4" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash preview-icon"><path d="M10 11v6"/><path d="M14 11v6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"/><path d="M3 6h18"/><path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg> Delete</button>
                </form>
            </div>
          </div>
        </dialog>
    @endforeach
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
