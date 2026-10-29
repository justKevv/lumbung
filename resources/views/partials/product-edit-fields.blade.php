@props([
    'product'
])

<label class="label">Nama</label>
<input type="text" value="{{ $product->name }}" name="name" class="input w-full" placeholder="Minyak Goreng" />

<label class="label">Harga</label>
<input type="text" value="{{ $product->price }}" name="price" class="input w-full" placeholder="18000" />
