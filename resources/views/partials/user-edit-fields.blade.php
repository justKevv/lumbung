@php
    $currentKopdes = $user->admins->first()?->kopdes;
    $kopdesOptions = $currentKopdes && ! $kopdes->contains('id', $currentKopdes->id)
        ? $kopdes->concat([$currentKopdes])->sortBy('name')
        : $kopdes;
@endphp

<label class="label">Nama</label>
<input type="text" name="name" value="{{ $user->name }}" class="input w-full" />

<label class="label">Email</label>
<input type="email" name="email" value="{{ $user->email }}" class="input w-full" required />

<label class="label">Password</label>
<input type="password" name="password" class="input w-full" placeholder="Kosongkan jika tidak diubah" minlength="8" />

<label class="label">Role</label>
<select name="role" class="select input w-full role-select">
    <option value="" disabled>Pilih Role</option>
    <option value="super_admin" @selected($user->role === 'super_admin')>Super Admin</option>
    <option value="admin" @selected($user->role === 'admin')>Admin</option>
</select>

<div class="role-divider {{ $user->role === 'admin' ? 'divider' : '' }}"></div>
<div class="kopdes-field" @if ($user->role !== 'admin') hidden @endif>
    <label class="label">Kopdes</label>
    <select name="kopdes_id" class="select input w-full kopdes-select" @disabled($user->role !== 'admin')>
        <option value="" disabled>Pilih Kopdes</option>
        @foreach ($kopdesOptions as $k)
            <option value="{{ $k->id }}" @selected($k->id === $currentKopdes?->id)>{{ $k->name }}</option>
        @endforeach
    </select>
</div>
