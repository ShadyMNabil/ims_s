<!-- START THEME SWITCHER -->
<div class="dropdown position-fixed bottom-0 end-0 mb-5 me-2 bg-primary-subtle border border-primary-subtle rounded z-3">
    <li class="btn-group dropup">
        <button class="btn btn-link nav-link py-2 px-2 px-lg-2 dropdown-toggle d-flex align-items-center" id="bd-theme"
            type="button" aria-expanded="false" data-bs-toggle="dropdown" data-bs-display="static"
            aria-label="Toggle theme (auto)">
            <i id="bi-circle-half" class="bi bi-circle-half my-1 theme-icon-active"></i>
            <span class="visually-hidden" id="bd-theme-text">
                {{ __('theme') }}
            </span>
        </button>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="bd-theme-text">
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center active"
                    data-bs-theme-value="light" aria-pressed="false">
                    <a href="#" class="bi bi-sun-fill me-2 opacity-50"></a>
                    {{ __('light') }}
                    <i class="bi bi-check2 ms-auto d-none"></i>
                </button>
            </li>
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark"
                    aria-pressed="false">
                    <a href="#" class="bi bi-moon-stars-fill me-2 opacity-50"></a>
                    {{ __('dark') }}
                    <i class="bi bi-check2 ms-auto d-none"></i>
                </button>
            </li>
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="auto"
                    aria-pressed="true">
                    <a href="#" class="bi bi-circle-half me-2 opacity-50"></a>
                    افتراضي
                    <i class="bi bi-check2 ms-auto d-none"></i>
                </button>
            </li>
        </ul>
    </li>
</div>
<!-- END THEME SWITCHER -->
