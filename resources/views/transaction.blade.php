<x-layouts.dashboard>
    <x-slot:title>Transaction</x-slot:title>
    <x-card>
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
</x-layouts.dashboard>
