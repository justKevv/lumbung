<x-layouts.dashboard>
    <x-slot:title>Product</x-slot:title>
    <x-resources-table
        model="product"
        :datas="$products"
        :datas_name="$fields">
            <x-slot:modal_add>
                <label class="label">Nama</label>
                <input type="text" name="name" class="input w-full" placeholder="Minyak Goreng" />

                <label class="label">Harga</label>
                <input type="text" name="price" class="input w-full" placeholder="18000" />
            </x-slot:modal_add>
            <x-slot:modal_edit>
                @foreach ($products as $product)         
                    <label class="label">Nama</label>
                    <input type="text" value="{{ $product->name }}" name="name" class="input w-full" placeholder="Minyak Goreng" />
    
                    <label class="label">Harga</label>
                    <input type="text" value="{{ $product->price }}" name="price" class="input w-full" placeholder="18000" />
                @endforeach
            </x-slot:modal_edit>
    </x-resources-table>
</x-layouts.dashboard>
