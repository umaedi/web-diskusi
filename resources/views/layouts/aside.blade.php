<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="/admin/dashboard" class="app-brand-link">
        <span class="app-brand-logo demo">
          <img src="{{ asset('img/logo/rsud.png') }}" alt="">
        </span>
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
      <!-- Dashboard -->
      <li class="menu-item {{ Request::is('admin/dashboard*') ? 'active' : '' }}">
        <a href="/admin/dashboard" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Analytics">Dashboard</div>
        </a>
      </li>

      <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Master</span>
      </li>
      <li class="menu-item {{ Request::is('admin/informasi*') ? 'active' : ''}}">
          <a href="{{ route('main.informasi') }}" class="menu-link">
            <i class='menu-icon bx bx-book-bookmark'></i>
            <div data-i18n="Basic">Informasi & penelitian</div>
          </a>
      </li>
      <li class="menu-item {{ Request::is('admin/kategori*') ? 'active' : ''}}">
          <a href="{{ route('main.kategori') }}" class="menu-link">
            <i class='menu-icon bx bxs-category' ></i>
            <div data-i18n="Basic">Kategori</div>
          </a>
      </li>
      {{-- <li class="menu-item {{ Request::is('admin/diskusi*') ? 'active' : ''}}">
          <a href="{{ route('main.diskusi') }}" class="menu-link">
            <i class='menu-icon bx bxs-chat'></i>
            <div data-i18n="Basic">Forum diskusi</div>
          </a>
      </li> --}}
      @if (auth()->user()->role == 'admin')
      <li class="menu-item {{ Request::is('admin/operator*') ? 'active' : ''}}">
          <a href="{{ route('main.operator') }}" class="menu-link">
            <i class="menu-icon bx bx-user"></i>
            <div data-i18n="Basic">Admin</div>
          </a>
      </li>
      @endif
      <li class="menu-item  {{ Request::is('admin/statistik*') ? 'active' : ''}}">
        <a href="/admin/statistik" class="menu-link">
          <i class='menu-icon bx bx-stats'></i>
          <div data-i18n="Basic">Statistik</div>
        </a>
      </li>
      <li class="menu-item">
        <a href="/admin/logout" class="menu-link">
          <i class='menu-icon bx bx-left-arrow-alt'></i>
          <div data-i18n="Basic">Keluar</div>
        </a>
    </li>
    </ul>
  </aside>