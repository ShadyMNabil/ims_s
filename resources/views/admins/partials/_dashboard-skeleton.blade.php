@include('admins.partials._header')

<div class="container-fluid">
    <div class="row">
        @include('admins.partials._sidebar')

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div
                class="d-flex justify-content-between align-items-center flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">
                    @yield('title')
                </h1>

                @yield('actions')
            </div>

            <div class="py-5">
                @yield('content')
            </div>
        </main>
    </div>
</div>
