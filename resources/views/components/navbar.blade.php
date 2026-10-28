<nav class="navbar w-full flex justify-between bg-base-300">
    <div class="flex flex-row justify-center items-center">
        <label for="my-drawer-4" aria-label="open sidebar" class="btn btn-square btn-ghost drawer-button">
            <!-- Sidebar toggle icon -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" fill="none" stroke="currentColor" class="my-1.5 inline-block size-4"><path d="M4 4m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z"></path><path d="M9 4v16"></path><path d="M14 10l2 2l-2 2"></path></svg>
        </label>
        <div class="px-4">Kopdes but good</div>
    </div>
    <div class="megamenu megamenu-xs border border-base-300">
        <button popovertarget="avatar" class="avatar">
            <div class="w-12 rounded">
                <img alt="Tailwind-CSS-Avatar-component" src="https://img.daisyui.com/images/profile/demo/batperson@192.webp" />
            </div>
        </button>
        <div id="avatar" class="mt-4 mr-4" popover>
            <ul class="menu menu-paged menu-vertical bg-base-200 rounded-box w-56 lg:w-auto">
                  <form method="POST" action="{{ route('logout') }}">          
                      <li>
                          <button class="btn">
                              <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                    <path d="M0 0h24v24H0z" fill="none" />
                                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                   	<path stroke-dasharray="34" d="M12 4h-7c-0.55 0 -1 0.45 -1 1v14c0 0.55 0.45 1 1 1h7">
                                  		<animate fill="freeze" attributeName="stroke-dashoffset" dur="0.4s" values="34;0" />
                                   	</path>
                                   	<path stroke-dasharray="14" stroke-dashoffset="14" d="M9 12h11.5">
                                  		<animate fill="freeze" attributeName="stroke-dashoffset" begin="0.5s" dur="0.2s" to="0" />
                                   	</path>
                                   	<path stroke-dasharray="8" stroke-dashoffset="8" d="M20.5 12l-3.5 -3.5M20.5 12l-3.5 3.5">
                                  		<animate fill="freeze" attributeName="stroke-dashoffset" begin="0.7s" dur="0.2s" to="0" />
                                   	</path>
                                    </g>
                              </svg>
                            Logout
                          </button>
                      </li>
                </form>
            </ul>
        </div>
    </div>
</nav>
