<li class="nav-item">
    @auth
        @if(auth()->user()->is_member)
            <a class="nav-link" href="#">
                <i class="fas fa-crown"></i> Member
            </a>
        @else
            <a class="nav-link" href="{{ route('membership.index') }}">
                <i class="fas fa-user-slash"></i> Jadi Member
            </a>
        @endif
    @endauth
</li>
