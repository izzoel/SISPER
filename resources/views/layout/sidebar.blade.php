  <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
      <div class="card h-80">
          <img class="card-img-top" src="{{ asset('img/logo/' . $data['menuData']['logo'] . '.svg') }}" alt="{{ strtoupper($data['menuData']['logo']) }}">
          <div class="card-body">

              @if (Auth::check() || Auth::guard('mahasiswa')->check())
                  @if (!is_null(Auth::user()))
                      <div class="d-flex justify-content-start align-items-baseline">
                          <h3 class="card-title m-0">{{ $data['menuData']['menu'] }}</h3>
                          <span class="text-secondary"><small>&nbsp;{{ 'v' . $data['menuData']['version'] }}</small></span>
                      </div>
                      <p class="card-text mb-0">
                          {{ $data['menuData']['about'] }}
                      </p>
                  @else
                      <div class="d-flex justify-content-start align-items-baseline">
                          <h3 class="card-title m-0">{{ $data['menuData']['menu'] }}</h3>
                          <span class="text-secondary"><small>&nbsp;{{ 'v' . $data['menuData']['version'] }}</small></span>
                      </div>
                      <p class="card-text">
                          {{ $data['menuData']['about'] }}
                      </p>
                      <a href="{{ route('logout') }}" class="btn btn-outline-primary"><i class='bx bxs-left-arrow-alt'></i>Kembali</a>
                  @endif
              @else
                  {{ redirect()->intended(route('logout'))->send() }}
              @endif
          </div>
      </div>
      <div class="menu-inner-shadow"></div>

      @if (!is_null(Auth::user()))
          <ul class="menu-inner py-1">
              <!-- Dashboard -->
              <li class="menu-item {{ request()->url() == url('/' . request()->segment(1) . '/dashboard') ? 'active' : '' }} ">
                  <a href="{{ route(request()->segment(1) . '_dashboard') }}" class="menu-link">
                      <i class="menu-icon tf-icons bx bx-home-circle"></i>
                      <div data-i18n="Analytics">Dashboard</div>
                  </a>
              </li>

              <!-- Entry -->
              <li class="menu-item {{ request()->url() == url('/' . request()->segment(1) . '/entry') ? 'active' : '' }} ">
                  <a href="{{ route(request()->segment(1) . '_entry') }}" class="menu-link">
                      <i class="menu-icon tf-icons bx bx-server"></i>
                      <div data-i18n="Entry">Entry</div>
                  </a>
              </li>

              @if (Auth::user()->name != 'verifikator')
                  <!-- Mahasiswa -->
                  <li class="menu-item {{ request()->url() == url('/' . request()->segment(1) . '/mahasiswa') ? 'active' : '' }} ">
                      <a href="{{ route(request()->segment(1) . '_mahasiswa') }}" class="menu-link">
                          <i class="menu-icon tf-icons bx bx-user"></i>
                          <div data-i18n="Mahasiswa">Mahasiswa</div>
                      </a>
                  </li>

                  <!-- Laporan -->
                  <li class="menu-item {{ request()->url() == url('/' . request()->segment(1) . '/lapor') ? 'active' : '' }} ">
                      <a href="{{ route(request()->segment(1) . '_lapor') }}" class="menu-link">
                          <i class="menu-icon tf-icons bx bx-comment-dots"></i>
                          <div data-i18n="Laporan">Laporan</div>
                      </a>
                  </li>

                  <!-- Setting -->
                  <li class="menu-item {{ request()->url() == url('/' . request()->segment(1) . '/setting') ? 'active' : '' }} ">
                      <a href="{{ route(request()->segment(1) . '_setting') }}" class="menu-link">
                          <i class="menu-icon tf-icons bx bx-cog"></i>
                          <div data-i18n="Setting">Setting</div>
                      </a>
                  </li>
              @endif

              <li class="menu-item">
                  <a href="{{ route('logout') }}" class="menu-link">
                      <i class="menu-icon tf-icons bx bxs-left-arrow-alt"></i>
                      <div data-i18n="Kembali">Kembali</div>
                  </a>
              </li>


          </ul>
      @endif
  </aside>
