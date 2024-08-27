<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand text-start px-3">
            <a href="{{ route('admin.home.index') }}">دیجی ارومیه</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm px-2 text-start">
            <a href="{{ route('admin.home.index') }}">Du</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">داشبورد</li>
            <li class="nav-item @if (Route::is('admin.home.index')) active @endif">
                <a href="{{ route('admin.home.index') }}"
                   class="nav-link">
                    <i class="fas fa-fire"></i> <span>داشبورد</span>
                </a>
            </li>
            <li class="nav-item @if (Route::is('admin.users.*')) active @endif">
                <a href="{{ route('admin.users.index') }}" class="nav-link">
                    <i class="fas fa-users"></i> <span>مدیریت کاربران</span>
                </a>
            </li>
            <li class="nav-item @if (Route::is('admin.roles.*')) active @endif">
                <a href="{{ route('admin.roles.index') }}"
                   class="nav-link"
                   data-toggle="dropdown">
                    <i class="fas fa-lock"></i> <span>مدیریت نقش ها</span>
                </a>
            </li>
        </ul>
    </aside>
</div>
