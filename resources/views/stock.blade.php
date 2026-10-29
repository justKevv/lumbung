<x-layouts.dashboard>
    <x-slot:title>Stock</x-slot:title>
    <x-resources-table
        model="stock"
        :datas="$stocks"
        :datas_name="$fields"
        :edit_form="fn ($stock) => view('partials.stock-edit-fields', ['stock' => $stock, 'products' => $products, 'stockedProductIds' => $stockedProductIds])">
            <x-slot:modal_add>
                <label class="label">Produk</label>
                <select name="product" class="select input w-full role-select">
                    <option value="" disabled selected>Pilih Produk</option>
                    @foreach ($products->whereNotIn('id', $stockedProductIds) as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>

                <label class="label">Stok</label>
                <input type="text" name="total" class="input w-full" placeholder="42" />
            </x-slot:modal_add>
    </x-resources-table>
</x-layouts.dashboard>
