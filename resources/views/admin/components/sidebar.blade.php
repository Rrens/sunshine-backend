<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('index.home') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="https://sunshinecafe.netlify.app/assets/img/sunshine-logo.jpg" alt="" width="30px" height="30px">
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-3">Sunshine</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">USER</span>
        </li>
        <li class="menu-item">
            <a href="{{ route('index.testimoni') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-message-dots"></i>
                <div data-i18n="Basic">Testimony</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">ADMIN</span>
        </li>

        <li class="menu-item">
            <a href="{{ route('index.menu') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-food-menu"></i>
                <div data-i18n="Analytics">Menu</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="{{ route('index.event') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-calendar-event"></i>
                <div data-i18n="Analytics">Event</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="{{ route('index.galery') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-photo-album"></i>
                <div data-i18n="Analytics">Galery</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="{{ route('index.barista') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Analytics">Barista</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('ip') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-show"></i>
                <div data-i18n="Analytics">Visitor</div>
            </a>
        </li>

    </ul>
</aside>
