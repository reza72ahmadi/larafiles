<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="#">مدیریت فروشگاه فایل</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown">کاربران</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('admin.users.list') }}">لیست کاربران</a></li>
                        <li><a class="dropdown-item" href="{{ route('admin.users.create') }}">ثبت کاربر جدید</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">طرح های
                        اشتراکی</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('admin.plans.list') }}">لیست پلانها</a></li>
                        <li><a class="dropdown-item" href="{{ route('admin.plans.create') }}">ثبت پلان جدید</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown">فایلها</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('admin.files.list') }}">لیست فایلها</a></li>
                        <li><a class="dropdown-item" href="{{ route('admin.files.create') }}">ثبت فایل جدید</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">پکیج
                        ها</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('admin.packages.list') }}">لیست پکیج ها</a></li>
                        <li><a class="dropdown-item" href="{{ route('admin.packages.create') }}">ثبت پکیج جدید</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">پرداخت
                        ها</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('admin.payments.list') }}">لیست پرداخت ها</a></li>

                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"> دسته
                        بندی ها</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('admin.categories.list') }}">لیست دسته بندی ها</a>
                        </li>
                        <li><a class="dropdown-item" href="{{ route('admin.categories.create') }}">ایجاد دسته بندی </a>
                        </li>
                    </ul>
                </li>


            </ul>
        </div>
    </div>
</nav>
