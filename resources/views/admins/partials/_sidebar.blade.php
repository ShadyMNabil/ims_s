<div class="sidebar col-md-3 col-lg-2 p-0 border border-right border-top-0 bg-body-tertiary">

    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu"
        aria-labelledby="sidebarMenuLabel">

        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">
                {{ config('app.name') }}
            </h5>

            <button type="button" class="btn-close Mme-auto" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu"
                aria-label="Close">
            </button>
        </div>

        <div class="offcanvas-body d-md-flex flex-column p-0 overflow-y-auto">
            <ul class="nav flex-column">
                <li class="nav-item py-1 bg-dark">
                    <a class="nav-link" href="{{ route('index') }}" target="blank">
                        <i class="bi bi-globe"></i>
                        {{ __('show site') }}
                    </a>
                </li>

                {{-- Dashboard --}}
                <li class="nav-item pb-1">
                    <a class="nav-link {{ request()->routeIs('admins.dashboard') ? 'active' : '' }}"
                        href="{{ route('admins.dashboard') }}">
                        <i class="bi bi-speedometer2"></i>
                        {{ __('dashboard') }}
                    </a>
                </li>
            </ul>

            <ul class="nav flex-column my-5">
                <hr class="mt-5">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-person-workspace"></i>
                        {{ 'Username' }}
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#"
                        onclick="event.preventDefault();if(confirm('Are you sure that you want to leave?')) { document.getElementById('logout').submit();}">
                        <i class="bi bi-door-closed-fill"></i>
                        {{ __('sign out') }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
