<li class="nav-item ">
    <a class="nav-link collapsed " href="/profile"><i class="fas fa-fw fa-user"></i>Profile   </a>
</li>
@if(Auth::user()->role === "admin")
    <li class="nav-item ">
        <a class="nav-link collapsed " href="{{ route('users.index') }}"><i class="fas fa-fw fa-car"></i>Users</a>
    </li>
    <li class="nav-item ">
        <a class="nav-link collapsed " href="{{ route('markings.index') }}"><i class="fas fa-fw fa-marker"></i>Mineral Markings</a>
    </li>
    <li class="nav-item ">
        <a class="nav-link collapsed " href="/reports"><i class="fas fa-fw fa-file-download"></i>Reports</a>
    </li>
@else
    <li class="nav-item ">
        <a class="nav-link collapsed " href="{{ route('detections.index') }}"><i class="fas fa-fw fa-comment"></i> Detections</a>
    </li>
    <li class="nav-item ">
        <a class="nav-link collapsed " href="{{ route('videodetects.index') }}"><i class="fas fa-fw fa-comment"></i>Video/Image Detections</a>
    </li>
@endif




<li class="nav-item ">
    <a class="nav-link collapsed "  href="{{ route('logout') }}"
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        >
        <i class="fas fa-fw fa-reply"></i> {{ __('Logout') }}
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>

</li>


{{--<a class="dropdown-item" href="{{ route('logout') }}"--}}
{{--   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">--}}
{{--    {{ __('Logout') }}--}}
{{--</a>--}}



