@props([
    'model',
    'datas',
    'datas_name',
    'edit_form' => null,
    'title_field' => 'name',
    'shows_add_button' => true,
    'shows_action_button' => true
])

<x-card>
    @if ($shows_add_button)
        <div class="flex justify-end">    
            <button class="btn" onclick="{{ $model }}_add.showModal()">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus preview-icon"><path d="M5 12h14"/><path d="M12 5v14"/></svg> 
                Add
            </button>
        </div>
    @endif
    @if ($datas->isEmpty())
        <div class="flex flex-col gap-3 p-4 justify-center items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="my-1.5 inline-block stroke-neutral-300 rounded-full border-5 p-4 border-neutral-200 items-center size-30" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shredder preview-icon"><path d="M4 13V4a2 2 0 0 1 2-2h8a2.4 2.4 0 0 1 1.706.706l3.588 3.588A2.4 2.4 0 0 1 20 8v5"/><path d="M14 2v5a1 1 0 0 0 1 1h5"/><path d="M10 22v-5"/><path d="M14 19v-2"/><path d="M18 20v-3"/><path d="M2 13h20"/><path d="M6 20v-3"/></svg>
            <h1 class="text-xl font-semibold text-neutral-300">No {{ $model }} data available right now :(</h1>
        </div>
    @else
        <div class="overflow-x-auto">       
            <table class="table">
                <!-- head -->
                <thead>
                    <tr>
                    <th></th>
                    @foreach ($datas_name as $dn)
                        <th class="capitalize">{{ Str::replace(".", " ", $dn) }}</th>
                    @endforeach
                    </tr>
                </thead>
                <tbody>
                     @foreach ($datas as $data)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            @foreach ($datas_name as $dn)
                                <td>{{ data_get($data, $dn) ?? "-" }}</td>
                            @endforeach
                            @if ($shows_action_button)
                                <td>
                                    <button class="btn btn-ghost" popovertarget="popover-{{ $model }}-{{ $data->id }}" style="anchor-name:--anchor-{{ $model }}-{{ $data->id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-ellipsis preview-icon"><circle cx="12" cy="12" r="1"/><circle cx="19" cy="12" r="1"/><circle cx="5" cy="12" r="1"/></svg>
                                    </button>
                                    <ul class="dropdown dropdown-end menu w-52 rounded-box bg-base-100 shadow-sm"
                                        popover id="popover-{{ $model }}-{{ $data->id }}" style="position-anchor:--anchor-{{ $model }}-{{ $data->id }}">
                                        <li><button onclick="{{ $model }}_edit_{{ $data->id }}.showModal()"><svg xmlns="http://www.w3.org/2000/svg" class="my-1.5 inline-block size-4" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil preview-icon"><path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/><path d="m15 5 4 4"/></svg> Edit</button></li>
                                        <li><button onclick="delete_{{ $model }}_{{ $data->id }}.showModal()"><svg xmlns="http://www.w3.org/2000/svg" class="my-1.5 inline-block size-4" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash preview-icon"><path d="M10 11v6"/><path d="M14 11v6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"/><path d="M3 6h18"/><path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg> Delete</button></li>
                                    </ul>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</x-card>

@isset($modal_add)
    <dialog id="{{ $model }}_add" class="modal modal-bottom sm:modal-middle">
        <div class="modal-box">
            <div class="flex justify-end">    
                <form method="dialog">
                    <button class="btn-ghost"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x preview-icon"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg></button>    
                </form>
            </div>
            <form method="POST" action="{{ route($model . '.store') }}" data-cascade>
                @csrf
                <fieldset class="fieldset w-full bg-base-100 border-base-300 rounded-box border p-4">
                  <legend class="fieldset-legend capitalize">{{ $model }} baru</legend>
                  {{ $modal_add }}    
                </fieldset>
                <div class="modal-action">
                    <button type="submit" class="btn btn-success">Add</button>
                </div>
            </form>
        </div>
    </dialog>
@endisset

@isset($edit_form)
    @foreach ($datas as $data)
        <dialog id="{{ $model }}_edit_{{ $data->id }}" class="modal modal-bottom sm:modal-middle">
            <div class="modal-box">
                <div class="flex justify-end"> 
                    <form method="dialog">
                        <button class="btn-ghost"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x preview-icon"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg></button>    
                    </form>
                </div>
                <form method="POST" action="{{ route($model . '.update', $data) }}" data-cascade>
                    @csrf
                    @method('PUT')
                    <fieldset class="fieldset w-full bg-base-100 border-base-300 rounded-box border p-4">
                      <legend class="fieldset-legend">Edit {{ $data->{$title_field} }}</legend>
                      {{ $edit_form($data) }}
                    </fieldset>
                    <div class="modal-action">
                        <button type="submit" class="btn btn-warning">Save</button>
                    </div>
                </form>
            </div>
        </dialog>
        <dialog id="delete_{{ $model }}_{{ $data->id }}" class="modal modal-bottom sm:modal-middle">
          <div class="modal-box">
              <h3 class="text-lg font-bold">Delete {{ $data->{$title_field} }}?</h3>
              <p class="py-4">This action is not reversible!</p>
            <div class="modal-action">
                <form method="dialog">
                    <button class="btn">Cancel</button>    
                </form>
                <form method="POST" action="{{ route($model . '.destroy', $data) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-error"><svg xmlns="http://www.w3.org/2000/svg" class="my-1.5 inline-block size-4" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash preview-icon"><path d="M10 11v6"/><path d="M14 11v6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"/><path d="M3 6h18"/><path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg> Delete</button>
                </form>
            </div>
          </div>
        </dialog>
    @endforeach
@endisset
