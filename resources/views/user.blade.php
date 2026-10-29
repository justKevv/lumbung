<x-layouts.dashboard>
    <x-slot:title>Users</x-slot:title>
    <x-resources-table
        model="user"
        :datas="$users"
        :datas_name="$fields"
        >
            <x-slot:modal_add>
                
            </x-slot:modal_add>
            <x-slot:modal_edit>
                
            </x-slot:modal_edit>
    </x-resources-table>
</x-layouts.dashboard>
