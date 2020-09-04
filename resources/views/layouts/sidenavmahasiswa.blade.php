<nav id="sidebar">
    <ul class="list-unstyled components">
        <li class="{{set_active('mahasiswa-profile')}}">
        <a href="{{route('mahasiswa-profile')}}">Profile</a>
        </li>
        <li>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Tahapan
                PKM</a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
                <li class="{{set_active('mahasiswa-konsultasi_dosbim')}}">
                    <a href="{{route('mahasiswa-konsultasi_dosbim')}}">Konsultasi Dosen Pendamping</a>
                </li>
                <li class="{{set_active('mahasiswa-upload_proposal')}}">
                    <a href="{{route('mahasiswa-upload_proposal')}}">Upload Proposal</a>
                </li>
                <li class="{{set_active('mahasiswa-coaching')}}">
                    <a href="{{route('mahasiswa-coaching')}}">Coaching Dosen Reviewer</a>
                </li>
                <li class="{{set_active('mahasiswa-upload_final')}}">
                    <a href="{{route('mahasiswa-upload_final')}}">Upload Proposal Final</a>
                </li>
                <li class="{{set_active('mahasiswa-akun_simbelmawa')}}">
                    <a href="{{route('mahasiswa-akun_simbelmawa')}}">Akun Simbelawa</a>
                </li>
            </ul>
        </li>
    </ul>
</nav>