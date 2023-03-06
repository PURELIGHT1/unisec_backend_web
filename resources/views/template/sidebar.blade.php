<div class="navigation">
    <div class="navigation-header">
        <span>Navigation</span>
        <a href="#">
            <i class="ti-close"></i>
        </a>
    </div>
    <div class="navigation-menu-body">
        <ul>
            <li>
                <a class="" href="{{ url('/') }}" id="activeSide">
                    <span class="nav-link-icon">
                        <i data-feather="pie-chart"></i>
                    </span>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a class="" href="{{ url('member') }}" id="activeSide">
                    <span class="nav-link-icon">
                        <i data-feather="users"></i>
                    </span>
                    <span>Member</span>
                </a>
            </li>
            <li>
                <a class="" href="{{ url('absensi') }}" id="activeSide">
                    <span class="nav-link-icon">
                        <i data-feather="user-check"></i>
                    </span>
                    <span>Absensi</span>
                </a>
            </li>
            <li>
                <a class="" href="{{ url('pertemuan') }}" id="activeSide">
                    <span class="nav-link-icon">
                        <i data-feather="book-open"></i>
                    </span>
                    <span>Pertemuan</span>
                </a>
            </li>
        </ul>
    </div>
</div>