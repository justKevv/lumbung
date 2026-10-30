<x-layouts.dashboard>
    <x-slot:title>Dashboard</x-slot:title>
    <div class="grid grid-cols-2 gap-4 md:grid-cols-4">
        <x-card>
            <h2 class="card-title">Penjualan Hari Ini</h2>
            <p>A card component has a figure, a body part, and inside body there are title and actions parts</p>
        </x-card>
        <x-card>
            <h2 class="card-title">Total Stok</h2>
            <p>A card component has a figure, a body part, and inside body there are title and actions parts</p>
        </x-card>
        <x-card>
            <h2 class="card-title">Stok Menipis</h2>
            <p>A card component has a figure, a body part, and inside body there are title and actions parts</p>
        </x-card>
        <x-card>
            <h2 class="card-title">Total Jenis Produk</h2>
            <p>A card component has a figure, a body part, and inside body there are title and actions parts</p>
        </x-card>
    </div>
    @can('manage-admin')
        <x-resources-table
            model="transaction"
            :datas="$lowStocks"
            :datas_name="['product.name', 'total']"
            :badge="fn ($stock) => $stock->total < 10 ? ['text' => 'Kritis', 'class' => 'badge-error'] : ['text' => 'Menipis', 'class' => 'badge-warning']"
            badge_name="Status"
            :shows_action_button="false"
            empty_text="Tidak ada stok menipis">
                <x-slot:modal_add>
                <div id="detail-rows" class="flex flex-col gap-2"></div>
        
                <button type="button" class="btn btn-sm" onclick="addDetailRow()">+ Tambah detail</button>
        
                <template id="detail-row-template">
                    <div class="flex gap-2 detail-row">
                        <select name="details[__INDEX__][product_id]" class="select" required>
                            <option value="">Pilih produk</option>
                            @foreach ($stocks as $stock)
                                <option value="{{ $stock->product_id }}">
                                    {{ $stock->product->name }} (stok: {{ $stock->total }})
                                </option>
                            @endforeach
                        </select>
                        <input type="number" name="details[__INDEX__][total]" min="1" class="input" placeholder="Jumlah" required>
                        <button type="button" class="btn btn-ghost" onclick="this.closest('.detail-row').remove()">✕</button>
                    </div>
                </template>
        
                <script>
                    let detailIndex = 0;
        
                    function addDetailRow() {
                        const template = document.getElementById('detail-row-template').innerHTML;
                        document.getElementById('detail-rows')
                            .insertAdjacentHTML('beforeend', template.replaceAll('__INDEX__', detailIndex++));
                    }
        
                    addDetailRow();
                </script>
            </x-slot:modal_add>
        </x-resources-table>
    @endcan
</x-layouts.dashboard>
