@props([
    'stock',
    'products',
    'stockedProductIds'
])

<label class="label">Produk</label>
<select name="product" class="select input w-full role-select">
    <option value="" disabled>Pilih Produk</option>
    @foreach ($products->whereNotIn('id', $stockedProductIds->diff([$stock->product_id])) as $product)
        <option value="{{ $product->id }}" @selected((int) $product->id === (int) $stock->product_id)>{{ $product->name }}</option>
    @endforeach
</select>

<label class="label">Stok</label>
<input type="text" value={{ $stock->total }} name="total" class="input w-full" placeholder="42" />
