<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>

<aside id="colorlib-aside" role="complementary" class="border js-fullheight">
    {{-- Logo atau Judul Situs --}}
    <h1 id="colorlib-logo">
        <a href="{{ route('home') }}"><i class="fa-solid fa-earth-americas"></i> {{ $title ?? 'Balay' }}</a>
    </h1>

    {{-- Menu Navigasi Utama --}}
    <nav id="colorlib-main-menu" role="navigation">
        <ul>
            {{-- Link dari aplikasi Laravel Anda --}}
            <li class="{{ request()->routeIs('home') ? 'colorlib-active' : '' }}">
                <a href="{{ route('home') }}">Home</a>
            </li>

            @auth
                <li class="{{ request()->routeIs('map') ? 'colorlib-active' : '' }}">
                    <a href="{{ route('map') }}">Map</a>
                </li>
            @endauth

            <li class="{{ request()->routeIs('table') ? 'colorlib-active' : '' }}">
                <a href="{{ route('table') }}">Table</a>
            </li>

            @auth
                <li class="{{ request()->routeIs('api.points') ? 'colorlib-active' : '' }}"><a href="{{ route('api.points') }}" target="_blank">Data Points</a></li>
                <li class="{{ request()->routeIs('api.polylines') ? 'colorlib-active' : '' }}"><a href="{{ route('api.polylines') }}" target="_blank">Data Polylines</a></li>
                <li class="{{ request()->routeIs('api.polygons') ? 'colorlib-active' : '' }}"><a href="{{ route('api.polygons') }}" target="_blank">Data Polygons</a></li>
            @endauth

        </ul>
    </nav>

    <div class="colorlib-footer">
        <ul>
            {{-- Autentikasi Pengguna --}}
            @guest
                {{-- Link Login untuk tamu --}}
                <li class="{{ request()->routeIs('login') ? 'colorlib-active' : '' }}">
                    <a href="{{ route('login') }}"><i class="fa-solid fa-right-to-bracket"></i> Login</a>
                </li>
            @else
                <li>
                    <a href="{{ route('profile.edit') }}">
                        <i class="fa-solid fa-user"></i> {{ Auth::user()->name }}
                    </a>
                </li>
                <br>
                <li>
                    <form id="logout-form-sidebar" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form-sidebar').submit();">
                        <i class="fa-solid fa-right-from-bracket"></i> Logout
                    </a>
                </li>
            @endauth
        </ul><br>

        <p><small>&copy;
						Copyright &copy;
						<script>document.write(new Date().getFullYear());</script> <br>by <a href="https://colorlib.com" target="_blank">Risma Kusumajati</a>
					</small></p>
        <ul>
            <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-linkedin"></i></a></li>
        </ul>
    </div>
</aside>
