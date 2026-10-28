<x-layouts.sidebar>
    <!-- Sidebar content here -->
    <ul class="menu w-full grow gap-2">
      <!-- List item -->
      <li class="{{ request()->routeIs('dashboard') ? 'menu-active rounded-md' : "" }}">
        <a href={{ route("dashboard") }} class="is-drawer-close:tooltip rounded-md is-drawer-close:tooltip-right" data-tip="Dashboard">
          <!-- Home icon -->
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" fill="none" stroke="currentColor" class="my-1.5 inline-block size-4"><path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8"></path><path d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path></svg>
          <span class="is-drawer-close:hidden">Dashboard</span>
        </a>
      </li>

      <!-- List item -->
      <li class="{{ request()->routeIs('transaction') ? 'menu-active rounded-md' : "" }}">
        <a href={{ route("transaction") }} class="is-drawer-close:tooltip rounded-md is-drawer-close:tooltip-right" data-tip="Transaksi">
          <!-- Settings icon -->
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="my-1.5 inline-block size-4">
             	<path d="M0 0h24v24H0z" fill="none" />
             	<g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
            		<path d="M19 10.5V10c0-3.771 0-5.657-1.172-6.828S14.771 2 11 2S5.343 2 4.172 3.172S3 6.229 3 10v4.5c0 3.287 0 4.931.908 6.038q.25.304.554.554C5.57 22 7.212 22 10.5 22M7 7h8m-8 4h4" />
            		<path d="m18 18.5l-1.5-.55V15.5m-4.5 2a4.5 4.5 0 1 0 9 0a4.5 4.5 0 0 0-9 0" />
             	</g>
          </svg>

          <span class="is-drawer-close:hidden">Transaksi</span>
        </a>
      </li>
    </ul>
</x-layouts.sidebar>
