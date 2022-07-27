                <a class="list-group-item d-inline-block text-truncate {{ ($title === "Dashboard") ? 'active' : '' }}" href="#!">
                    <i class="fa-solid fa-border-all" style="padding-right: 12px;"></i>
                    <span>Dashboard</span></a>
                @if(Auth::user()->roles_id == 1)
                <a class="list-group-item d-inline-block text-truncate {{ ($title === "Edit User") ? 'active' : '' }}" href="#!">
                    <i class="fa-solid fa-user" style="padding-right: 12px;"></i>
                    <span>Edit User</span>
                </a>
                <a class="list-group-item d-inline-block text-truncate {{ ($title === "Config Presensi") ? 'active' : '' }}" href="#!">
                    <i class="fa-solid fa-clipboard-check" style="padding-right: 14px;"></i>
                    <span>Config Presensi</span></a>

                @elseif(Auth::user()->roles_id == 2)
                <a class="list-group-item d-inline-block text-truncate {{ ($title === "Config Presensi") ? 'active' : '' }}" href="#!">
                    <i class="fa-solid fa-clipboard-check" style="padding-right: 14px;"></i>
                    <span>Config Presensi</span></a>

                @elseif(Auth::user()->roles_id == 3)
                <a class="list-group-item d-inline-block text-truncate {{ ($title === "Presensi") ? 'active' : '' }}" href="#!">
                    <i class="fa-solid fa-clipboard-user" style="padding-right: 14px;"></i>
                    <span>Presensi</span>
                </a>

                @endif
                <a class="list-group-item d-inline-block text-truncate {{ ($title === "Edit Profile") ? 'active' : '' }}" href="#!">
                    <i class="fa-solid fa-user-pen" style="padding-right: 12px;"></i>
                    <span>Edit Profile</span></a>
                <a class="list-group-item d-inline-block text-truncate text-hover-red" href="#!">
                    <i class="fa-solid fa-arrow-right-from-bracket" style="padding-right: 10px;"></i>
                    <span>LogOut</span>
                </a>
