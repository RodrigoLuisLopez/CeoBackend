<li class="nav-item">
    <a href="{{ route('estados.index') }}"
       class="nav-link {{ Request::is('estados*') ? 'active' : '' }}">
        <p>Estados</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('privacidads.index') }}"
       class="nav-link {{ Request::is('privacidads*') ? 'active' : '' }}">
        <p>Privacidads</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('giros.index') }}"
       class="nav-link {{ Request::is('giros*') ? 'active' : '' }}">
        <p>Giros</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('alcances.index') }}"
       class="nav-link {{ Request::is('alcances*') ? 'active' : '' }}">
        <p>Alcances</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('posts.index') }}"
       class="nav-link {{ Request::is('posts*') ? 'active' : '' }}">
        <p>Posts</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('likes.index') }}"
       class="nav-link {{ Request::is('likes*') ? 'active' : '' }}">
        <p>Likes</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('seguidors.index') }}"
       class="nav-link {{ Request::is('seguidors*') ? 'active' : '' }}">
        <p>Seguidors</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('recomendacions.index') }}"
       class="nav-link {{ Request::is('recomendacions*') ? 'active' : '' }}">
        <p>Recomendacions</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('users.index') }}"
       class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
        <p>Users</p>
    </a>
</li>



<li class="nav-item">
    <a href="{{ route('ilustrables.index') }}"
       class="nav-link {{ Request::is('ilustrables*') ? 'active' : '' }}">
        <p>Ilustrables</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('comentables.index') }}"
       class="nav-link {{ Request::is('comentables*') ? 'active' : '' }}">
        <p>Comentables</p>
    </a>
</li>


