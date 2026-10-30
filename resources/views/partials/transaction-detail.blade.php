@props([
    'details'
])

<table class="table">
    <thead>
        <tr>
            <th>Produk</th>
            <th>Harga</th>
            <th>Jumlah</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($details as $detail)
            <tr>
                <td>{{ $detail->product->name }}</td>
                <td>{{ $detail->product->price }}</td>
                <td>{{ $detail->total }}</td>
            </tr>
        @endforeach
            <tr>
                <td colspan="3" class="p-0">
                    <div class="divider my-0"></div>
                </td>
            </tr>
            <tr class="font-semibold">
                <td colspan="2">Total</td>
                <td>{{ $details->sum(fn ($detail) => $detail->product->price * $detail->total) }}</td>
            </tr>
    </tbody>
</table>
