<x-layouts.dashboard>
    <x-slot:title>Stock</x-slot:title>
    <x-resources-table
        model="stock"
        :datas="$stocks"
        :datas_name="$fields">
            <x-slot:modal_add>
                
            </x-slot:modal_add>
    </x-resources-table>
</x-layouts.dashboard>
