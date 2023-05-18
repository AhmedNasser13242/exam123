<header>
    <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand">
            <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
            </div>
            <div class="search-bar flex-grow-1">
                <div class="position-relative search-bar-box">
                    <input type="text" class="form-control search-control" placeholder="Type to search..."> <span
                        class="position-absolute top-50 search-show translate-middle-y"><i
                            class='bx bx-search'></i></span>
                    <span class="position-absolute top-50 search-close translate-middle-y"><i
                            class='bx bx-x'></i></span>
                </div>
            </div>
            <div class="top-menu ms-auto">
                <ul class="navbar-nav align-items-center">


                </ul>
            </div>
            @php
            $id = Auth::user()->id;
            $adminData = App\Models\User::find($id);

            @endphp
            <div class="user-box dropdown">
                <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
                    role="button" data-bs-toggle="dropdown" aria-expanded="false">

                    <img src="{{ (!empty($adminData->photo)) ? url('upload/admin_images/'.$adminData->photo):url('upload/no_image.jpg') }}"
                        class="user-img" alt="user avatar">
                    <div class="user-info ps-3">
                        <p class="mb-0 user-name">{{ Auth::user()->name }}</p>
                        <p class="mb-0 designattion">{{ Auth::user()->username }}</p>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="{{ route('admin.profile') }}"><i
                                class="bx bx-user"></i><span>حساب</span></a>
                    </li>
                    <li><a class="dropdown-item" href="{{ route('admin.change.password') }}"><i
                                class="bx bx-cog"></i><span>تغيير كلمة المرور</span></a>
                    </li>
                    <li><a class="dropdown-item" href="{{ route('admin.logout') }}"><i
                                class='bx bx-log-out-circle'></i><span>تسجيل خروج</span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>