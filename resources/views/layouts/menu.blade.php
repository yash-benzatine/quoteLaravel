<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('categories.index') }}" class="nav-link {{ Request::is('categories') ? 'active' : '' }}">
        <i class="nav-icon fas fa-list"></i>
        <p>Categories</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('themes.index') }}" class="nav-link {{ Request::is('themes') ? 'active' : '' }}">
        <i class="nav-icon fas fa-palette"></i>
        <p>Themes</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('quotes.index') }}" class="nav-link {{ Request::is('quotes') ? 'active' : '' }}">
        <i class="nav-icon fas fa-quote-left"></i>
        <p>Quotes</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('favourites.index') }}" class="nav-link {{ Request::is('favourites') ? 'active' : '' }}">
        <i class="nav-icon fas fa-heart"></i>
        <p>Favourites</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('users.index') }}" class="nav-link {{ Request::is('users') ? 'active' : '' }}">
        <i class="nav-icon fas fa-users"></i>
        <p>Users</p>
    </a>
</li>