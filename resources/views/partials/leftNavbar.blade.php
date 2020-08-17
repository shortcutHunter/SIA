<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="{{asset ('adminSB/images/user.png')}}" width="48" height="48" alt="User" />
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->nama_user }}</div>
                <div class="email">{{Auth::user()->email}}</div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="/admin/profil"><i class="material-icons">person</i>Profil</a></li>
                        <li role="separator" class="divider"></li>
                        <li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <a href="javascript:void(0);" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i class="material-icons">input</i>Sign Out</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>

                @foreach ($master_menu as $category => $menus)
                    
                    @if ($category == '')
                        @foreach ($menus as $menu)
                            <li class="{{ config('active_nav') == $menu['nama_menu'] ? 'active' : '' }}">
                                <a href="{{$menu['link']}}">
                                    <i class="material-icons">{{$menu['icon']}}</i>
                                    <span>{{$menu['nama_menu']}}</span>
                                </a>
                            </li>
                        @endforeach
                    @else
                        <li class="{{ config('active_category') == $category ? 'active' : '' }}">
                            <a href="javascript:void(0);" class="menu-toggle {{ config('active_category') == $category ? 'toggled' : '' }}">
                                <i class="material-icons">{{$menus[0]['icon']}}</i>
                                <span>{{$category}}</span>
                            </a>
                            <ul class="ml-menu">
                                @foreach ($menus as $menu)
                                    <li class="{{ config('active_nav') == $menu['nama_menu'] ? 'active' : '' }}">
                                        <a href="{{$menu['link']}}">{{$menu['nama_menu']}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endif

                @endforeach

                {{-- <li class="{{ config('active_nav') == 'Home' ? 'active' : '' }}">
                    <a href="/admin">
                        <i class="material-icons">home</i>
                        <span>Home</span>
                    </a>
                </li>
               
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">widgets</i>
                        <span>Master Form Perkuliahan</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="{{route('inputtahunajaran.index')}}">Tahun Ajaran</a>
                        </li>
                        <li>
                            <a href="{{route('jurusan.index')}}">Jurusan</a>
                        </li>
                        <li>
                            <a href="{{route('inputmatakuliah.index')}}">Mata Kuliah</a>
                        </li>
                        <li>
                            <a href="{{route('jadwal-kuliah.index')}}">Jadwal Mata Kuliah</a>
                        </li>
                    </ul>
                </li>

                <li class="{{ config('active_category') == 'Master Data Diri' ? 'active' : '' }}">
                    <a href="javascript:void(0);" class="menu-toggle {{ config('active_category') == 'Master Data Diri' ? 'toggled' : '' }}">
                        <i class="material-icons">accessibility</i>
                        <span>Master Data Diri</span>
                    </a>
                    <ul class="ml-menu">
                        <li class="{{ config('active_nav') == 'Agama' ? 'active' : '' }}">
                            <a href="{{route('inputagama.index')}}">Agama</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">perm_identity</i>
                        <span>Master Karyawan</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="{{route('dosen.index')}}">Dosen</a>
                        </li>
                    </ul>
                </li>
                
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">code</i>
                        <span>Master Status</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="{{route('master-role.index')}}">Role</a>
                        </li>
                        <li>
                            <a href="{{route('ruang-kuliah.index')}}">Ruangan Kuliah</a>
                        </li>
                        <li>
                            <a href="{{route('jenis-perkuliahan.index')}}">Jenis Mata Kuliah</a>
                        </li>
                    </ul>
                </li> --}}

                {{-- <li>
                    <a href="pages/typography.html">
                        <i class="material-icons">text_fields</i>
                        <span>Typography</span>
                    </a>
                </li> --}}
        </div>
        <!-- #Menu -->
    </aside>
    <!-- #END# Left Sidebar -->
</section>