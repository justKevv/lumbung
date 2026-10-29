<x-layouts.dashboard>
    <x-slot:title>Stock</x-slot:title>
    <x-resources-table
        model="stock"
        :datas="$stocks"
        :datas_name="$fields">
            <x-slot:modal_add>
                <label class="label">Produk</label>
                <select name="product" class="select input w-full role-select">
                    <option value="" disabled selected>Pilih Produk</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>

                <label class="label">Stok</label>
                <input type="text" name="stock" class="input w-full" placeholder="42" />
            </x-slot:modal_add>
    </x-resources-table>
</x-layouts.dashboard>
