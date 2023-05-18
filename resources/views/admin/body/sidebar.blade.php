<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            {{-- <img src="{{ asset('adminbackend/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
            --}}
        </div>
        <div>
            <h4 class="logo-text">ادمن</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">المراحل الدراسية</div>
            </a>
            <ul>
                <li> <a href="{{ route('all.category') }}"><i class="bx bx-right-arrow-alt"></i>مشاهدة المراحل</a>
                </li>
                <li> <a href="{{ route('add.category') }}"><i class="bx bx-right-arrow-alt"></i>اضافة مرحلة</a>
                </li>

            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">الصفوف الدراسية</div>
            </a>
            <ul>
                <li> <a href="{{ route('all.subcategory') }}"><i class="bx bx-right-arrow-alt"></i>مشاهدة الصفوف
                        الدراسية</a>
                </li>
                <li> <a href="{{ route('add.subcategory') }}"><i class="bx bx-right-arrow-alt"></i>انشاء صف دراسي</a>
                </li>

            </ul>
        </li>
        <li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">المواد الدراسية</div>
            </a>
            <ul>
                <li> <a href="{{ route('all.level') }}"><i class="bx bx-right-arrow-alt"></i>مشاهدة المواد</a>
                </li>
                <li> <a href="{{ route('add.level') }}"><i class="bx bx-right-arrow-alt"></i>اضف مادة دراسية</a> </li>

            </ul>
        </li>
        <li>


        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">الوحدات الدراسية</div>
            </a>
            <ul>
                <li> <a href="{{ route('all.brand') }}"><i class="bx bx-right-arrow-alt"></i>مشاهدة الوحدة الدراسية </a>
                </li>
                <li> <a href="{{ route('add.brand') }}"><i class="bx bx-right-arrow-alt"></i>أضف الوحدة الدراسية</a>
                </li>

            </ul>
        </li>
        <li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">الأسألة الاختيارية</div>
            </a>
            <ul>
                <li> <a href="{{ route('all.mcq') }}"><i class="bx bx-right-arrow-alt"></i>جميع الاسالة الاختيارية</a>
                </li>
                <li> <a href="{{ route('add.mcq') }}"><i class="bx bx-right-arrow-alt"></i>اضف سؤال اختياري</a>
                </li>

            </ul>
        </li>


        <li>
        <li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">اسألة اكمل</div>
            </a>
            <ul>
                <li> <a href="{{ route('all.csq') }}"><i class="bx bx-right-arrow-alt"></i>جميع اسألة اكمل</a>
                </li>
                <li> <a href="{{ route('add.csq') }}"><i class="bx bx-right-arrow-alt"></i>اضف سؤال اكمل</a>
                </li>

            </ul>
        </li>


        <li>

        <li>
        <li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">اسألة صح و خطأ</div>
            </a>
            <ul>
                <li> <a href="{{ route('all.row') }}"><i class="bx bx-right-arrow-alt"></i>جميع اسألة صح و خطأ</a>
                </li>
                <li> <a href="{{ route('add.row') }}"><i class="bx bx-right-arrow-alt"></i>اضف سؤال صح و خطأ</a>
                </li>

            </ul>
        </li>


        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">المعلمين</div>
            </a>
            <ul>
                <li> <a href="{{ route('inactive.vendor') }}"><i class="bx bx-right-arrow-alt"></i>المعلمين المعطلين</a>
                </li>
                <li> <a href="{{ route('active.vendor') }}"><i class="bx bx-right-arrow-alt"></i>المعلمين المفعلين</a>
                </li>

            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">التحكم في البانر</div>
            </a>
            <ul>
                <li> <a href="{{ route('all.banner') }}"><i class="bx bx-right-arrow-alt"></i>جميع البانرات</a>
                </li>
                <li> <a href="{{ route('add.banner') }}"><i class="bx bx-right-arrow-alt"></i>اضف بانر</a>
                </li>

            </ul>
        </li>
        <li>
            <a href="https://themeforest.net/user/codervent" target="_blank">
                <div class="parent-icon"><i class="bx bx-support"></i>
                </div>
                <div class="menu-title">Support</div>
            </a>
        </li>
    </ul>
    <!--end navigation-->
</div>