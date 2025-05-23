<!-- Sidebar untuk Desktop -->
<aside id="sidebar" class="w-64 bg-white/5 backdrop-blur-lg border-r border-blue-800 p-6 hidden md:block">
  <a href="{{ Auth::user()->usertype === 'admin' ? route('admin') : route('user') }}" class="block mb-8">
    <h1 class="text-2xl font-bold text-blue-400">HRM System</h1>
  </a>
  <ul class="space-y-3">
    @if(Auth::user()->usertype === 'admin')
    <li>
      <a href="{{ route('admin') }}#dashboard"
        class="block py-3 px-4 text-blue-200 hover:bg-blue-500/20 rounded-xl transition-all {{ request()->routeIs('admin') ? 'bg-blue-500/20 text-blue-400' : '' }}">
        📊 Dashboard
      </a>
    </li>
    <li>
      <a href="{{ route('admin') }}#karyawan"
        class="block py-3 px-4 text-blue-200 hover:bg-blue-500/20 rounded-xl transition-all">
        👥 Data Karyawan
      </a>
    </li>
    <li>
      <a href="{{ route('gaji.index') }}"
        class="block py-3 px-4 text-blue-200 hover:bg-blue-500/20 rounded-xl transition-all">
        💰 Penggajian
      </a>
    </li>
    <li>
      <a href="{{ route('pengajuan.index') }}"
        class="block py-3 px-4 text-blue-200 hover:bg-blue-500/20 rounded-xl transition-all">
        📨 Pengajuan
      </a>
    </li>
    <li>
      <a href="{{ route('attendance.index') }}"
        class="block py-3 px-4 text-blue-200 hover:bg-blue-500/20 rounded-xl transition-all {{ request()->routeIs('attendance.index') ? 'bg-blue-500/20 text-blue-400' : '' }}">
        ⏰ Riwayat Absensi
      </a>
    </li>
    @else
    <li>
      <a href="{{ route('user') }}#dashboard"
        class="block py-3 px-4 text-blue-200 hover:bg-blue-500/20 rounded-xl transition-all {{ request()->routeIs('user') ? 'bg-blue-500/20 text-blue-400' : '' }}">
        📊 Dashboard
      </a>
    </li>
    <li>
      <a href="{{ route('user') }}#gaji"
        class="block py-3 px-4 text-blue-200 hover:bg-blue-500/20 rounded-xl transition-all">
        💰 Gaji
      </a>
    </li>
    <li>
      <a href="{{ route('user') }}#pengajuan"
        class="block py-3 px-4 text-blue-200 hover:bg-blue-500/20 rounded-xl transition-all">
        📨 Pengajuan
      </a>
    </li>
    <li>
      <a href="{{ route('attendance.history') }}"
        class="block py-3 px-4 text-blue-200 hover:bg-blue-500/20 rounded-xl transition-all {{ request()->routeIs('attendance.history') ? 'bg-blue-500/20 text-blue-400' : '' }}">
        ⏰ Absensi
      </a>
    </li>
    @endif
    @auth
    <li>
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <a href="{{ route('logout') }}"
          onclick="event.preventDefault(); this.closest('form').submit();"
          class="block py-3 px-4 text-red-300 hover:bg-red-500/20 rounded-xl transition-all">
          🚪 Logout
        </a>
      </form>
    </li>
    @endauth
  </ul>
</aside>

<!-- Bottom Navigation untuk Mobile -->
<nav class="fixed bottom-0 left-0 right-0 z-50 bg-blue-950 text-blue-200 border-t border-blue-800 flex justify-around items-center py-2 md:hidden">
  @if(Auth::user()->usertype === 'admin')
  <a href="{{ route('admin') }}#dashboard" class="flex flex-col items-center text-xs {{ request()->routeIs('admin') ? 'text-blue-400' : '' }}">
    📊
    <span>Dashboard</span>
  </a>
  <a href="{{ route('admin') }}#karyawan" class="flex flex-col items-center text-xs">
    👥
    <span>Karyawan</span>
  </a>
  <a href="{{ route('gaji.index') }}" class="flex flex-col items-center text-xs">
    💰
    <span>Gaji</span>
  </a>
  <a href="{{ route('admin') }}#pengajuan" class="flex flex-col items-center text-xs">
    📨
    <span>Pengajuan</span>
  </a>
  <a href="{{ route('attendance.index') }}" class="flex flex-col items-center text-xs {{ request()->routeIs('attendance.index') ? 'text-blue-400' : '' }}">
    ⏰
    <span>Absensi</span>
  </a>
  @else
  <a href="{{ route('user') }}#dashboard" class="flex flex-col items-center text-xs {{ request()->routeIs('user') ? 'text-blue-400' : '' }}">
    📊
    <span>Dashboard</span>
  </a>
  <a href="{{ route('user') }}#gaji" class="flex flex-col items-center text-xs">
    💰
    <span>Gaji</span>
  </a>
  <a href="{{ route('user') }}#pengajuan" class="flex flex-col items-center text-xs">
    📨
    <span>Pengajuan</span>
  </a>
  <a href="{{ route('attendance.history') }}" class="flex flex-col items-center text-xs {{ request()->routeIs('attendance.history') ? 'text-blue-400' : '' }}">
    ⏰
    <span>Absensi</span>
  </a>
  @endif
  @auth
  <form method="POST" action="{{ route('logout') }}">
    @csrf
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="flex flex-col items-center text-xs text-red-300">
      🚪
      <span>Logout</span>
    </a>
  </form>
  @endauth
</nav>