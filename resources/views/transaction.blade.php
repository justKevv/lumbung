<x-layouts.dashboard>
    <x-slot:title>Transaction</x-slot:title>
    <x-resources-table
        model="transaction"
        :datas="$transactions"
        :datas_name="$fields"
        :shows_add_button="false"
        :shows_action_button="false"
        :show_details_button="true"
        :detail_form="fn ($transaction) => view('partials.transaction-detail', ['details' => $transaction->details])">
    </x-resources-table>
</x-layouts.dashboard>
