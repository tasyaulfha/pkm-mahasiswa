<ul class="sidebar navbar-nav" style="background-color: #093697">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-home"></i>
            <span>Beranda</span>
        </a>
    </li>

    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-clipboard-list"></i>
            <span>Usulan</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="{{ url('mahasiswa.internal') }}">
                Seleksi Internal</a>
            <a class="dropdown-item" href="{{ url('mahasiswa.camp') }}">
                PKM Camp</a>
            <a class="dropdown-item" href="{{ url('mahasiswa.idea') }}">
                PKM Idea Challenge</a>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="">
            <i class="fas fa-fw fa-comments"></i>
            <span>Diskusi</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="https://drive.google.com/file/d/1VSWh4X7V3Sn4CyJt_Dk2LxKulxwYCX-q/view"
            target="blank">
            <i class="fas fa-fw fa-book"></i>
            <span>Pedoman</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
      document.getElementById('logout-form').submit();">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Keluar</span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </li>
</ul>
