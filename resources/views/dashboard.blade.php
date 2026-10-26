<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')
        <title>Kopdes but good</title>
        <body>
            <div class="drawer lg:drawer-open">
              <input id="my-drawer-4" type="checkbox" class="drawer-toggle inline" />
              <div class="drawer-content">
                <!-- Navbar -->
                <x-navbar></x-navbar>
                <!-- Page content here -->
                <div class="p-4 flex flex-col gap-4">
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
                </div>

              </div>

              <div class="drawer-side is-drawer-close:overflow-visible">
                <label for="my-drawer-4" aria-label="close sidebar" class="drawer-overlay"></label>
                <div class="flex min-h-full flex-col items-start bg-base-200 is-drawer-close:w-14 is-drawer-open:w-64">
                  <!-- Sidebar content here -->
                  <ul class="menu w-full grow">
                    <!-- List item -->
                    <li class="menu-active rounded-full">
                      <button class="is-drawer-close:tooltip is-drawer-close:tooltip-right" data-tip="Dashboard">
                        <!-- Home icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" fill="none" stroke="currentColor" class="my-1.5 inline-block size-4"><path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8"></path><path d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path></svg>
                        <span class="is-drawer-close:hidden">Dashboard</span>
                      </button>
                    </li>

                    <!-- List item -->
                    <li>
                      <button class="is-drawer-close:tooltip is-drawer-close:tooltip-right" data-tip="Transaksi">
                        <!-- Settings icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="my-1.5 inline-block size-4">
                           	<path d="M0 0h24v24H0z" fill="none" />
                           	<g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                          		<path d="M19 10.5V10c0-3.771 0-5.657-1.172-6.828S14.771 2 11 2S5.343 2 4.172 3.172S3 6.229 3 10v4.5c0 3.287 0 4.931.908 6.038q.25.304.554.554C5.57 22 7.212 22 10.5 22M7 7h8m-8 4h4" />
                          		<path d="m18 18.5l-1.5-.55V15.5m-4.5 2a4.5 4.5 0 1 0 9 0a4.5 4.5 0 0 0-9 0" />
                           	</g>
                        </svg>

                        <span class="is-drawer-close:hidden">Transaksi</span>
                      </button>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
        </body>
</html>
