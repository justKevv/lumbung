<x-layouts.dashboard>
    <x-slot:title>Users</x-slot:title>
    <x-resources-table
        model="user"
        :datas="$users"
        :datas_name="$fields"
        >
            <x-slot:modal_add>
                <label class="label">Nama</label>
                <input type="text" name="name" class="input w-full" placeholder="Admin A" />

                <label class="label">Email</label>
                <label class="input w-full validator">
                  <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <g
                      stroke-linejoin="round"
                      stroke-linecap="round"
                      stroke-width="2.5"
                      fill="none"
                      stroke="currentColor"
                    >
                      <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                      <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                    </g>
                  </svg>
                  <input name="email" type="email" placeholder="mail@site.com" required />
                </label>
                <div class="validator-hint hidden">Enter valid email address</div>

                <label class="label">Password</label>
                <label class="input w-full validator">
                  <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <g
                      stroke-linejoin="round"
                      stroke-linecap="round"
                      stroke-width="2.5"
                      fill="none"
                      stroke="currentColor"
                    >
                      <path
                        d="M2.586 17.414A2 2 0 0 0 2 18.828V21a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h1a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h.172a2 2 0 0 0 1.414-.586l.814-.814a6.5 6.5 0 1 0-4-4z"
                      ></path>
                      <circle cx="16.5" cy="7.5" r=".5" fill="currentColor"></circle>
                    </g>
                  </svg>
                  <input
                    type="password"
                    name="password"
                    required
                    placeholder="Password"
                    minlength="8"
                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                    title="Must be more than 8 characters, including number, lowercase letter, uppercase letter"
                  />
                </label>
                <p class="validator-hint hidden">
                  Must be more than 8 characters, including
                  <br />At least one number <br />At least one lowercase letter <br />At least one uppercase letter
                </p>

                <label class="label">Role</label>
                <select name="role" class="select input w-full role-select">
                    <option value="" disabled selected>Pilih Role</option>
                    <option value="super_admin">Super Admin</option>
                    <option value="admin">Admin</option>
                </select>
                
                <div class="role-divider"></div>
                <div class="kopdes-field" hidden>
                    <label class="label">Kopdes</label>
                    <select name="kopdes_id" class="select input w-full kopdes-select" disabled>
                        <option value="" disabled selected>Pilih Kopdes</option>
                        @foreach ($kopdes as $k)
                            <option value="{{ $k->id }}">{{ $k->name }}</option>
                        @endforeach
                    </select>
                </div>
            </x-slot:modal_add>
            <x-slot:modal_edit>
                
                <div class="role-divider"></div>
                <div class="kopdes-field" hidden>
                    <label class="label">Kopdes</label>
                    <select name="kopdes_id" class="select input w-full kopdes-select" disabled>
                        <option value="" disabled selected>Pilih Kopdes</option>
                        @foreach ($kopdes as $k)
                            <option value="{{ $k->id }}">{{ $k->name }}</option>
                        @endforeach
                    </select>
                </div>
            </x-slot:modal_edit>
    </x-resources-table>
</x-layouts.dashboard>
<script>
document.addEventListener('change', (e) => {
    if (!e.target.classList.contains('role-select')) return;

    const form = e.target.closest('form');
    const isAdmin = e.target.value === 'admin';
    const divider = form.querySelector('.role-divider');
    const kopdesField = form.querySelector('.kopdes-field');
    const kopdes = form.querySelector('.kopdes-select');

    divider.classList.toggle('divider', isAdmin);
    kopdesField.hidden = !isAdmin;
    kopdes.disabled = !isAdmin;
    if (!isAdmin) kopdes.value = '';
});
</script>
