@section('sidebar')
    
<aside class="main-sidebar fixed offcanvas shadow" data-toggle='offcanvas'>
    <div class="sidebar">
        <ul class="sidebar-menu">
            <li><a class="ajaxifyPage active" href="{{ route('inicio.index') }}">
                <i class="icon icon-home-1 s-24"></i> <span>Home</span>
            </a>
            </li>
            <li><a class="ajaxifyPage" href="categories.html">
                <i class="icon icon-layers-1 s-24"></i> <span>Categories</span>
            </a>
            <li>
            <li><a class="ajaxifyPage" href="albums.html">
                <i class="icon icon-windows s-24"></i> <span>Albums</span>
            </a>
            <li>
            <li><a class="ajaxifyPage" href="videos.html">
                <i class="icon icon-video-player-2 s-24"></i> <span>Videos</span>
            </a>
            </li>
            <li><a class="ajaxifyPage" href="events.html">
                <i class="icon icon-calendar-6 s-24"></i> <span>Events</span>
            </a>
            </li>

            <li><a class="ajaxifyPage" href="gallery.html">
                <i class="icon icon-photo-camera-1 s-24"></i> <span>Gallery</span>
            </a>
            </li>

            <li class="menu-item-has-children">
                <a href="#">
                    <i class="icon icon-newspaper s-24"></i> <span>Blog</span>
                    <i class=" icon-angle-left  pull-right"></i>
                </a>
                <ul class="sub-menu">
                    <li><a href="{{ route('blog.index') }}" ><i class="icon icon-newspaper"></i>Blog</a>
                    </li>
                    <li><a href="{{ route('blog.create') }}" ><i class="icon icon-plus"></i>Nuevo Post</a>
                    </li>

                </ul>
            </li>


            </li>

            <li><a class="ajaxifyPage" href="artists.html">
                <i class="icon icon-users s-24"></i> <span>Artists</span>
            </a>
            </li>
            <li class="menu-item-has-children">
                <a href="#">
                    <i class="icon icon-menu-4 s-24"></i> <span>Pages</span>
                    <i class=" icon-angle-left  pull-right"></i>
                </a>
                <ul class="sub-menu">

                    <li><a href="page-blank.html"><i class="icon icon-document"></i>Simple Blank</a>
                    </li>
                    <li><a href="page-blank-tabs.html"><i class="icon icon-document"></i>Tabs Blank</a>
                    </li>
                    <li>
                        <a href="login.html"><i class="icon icon-document"></i>Login Page</a>
                    </li>
                    <li>
                        <a href="404.html"><i class="icon icon-document"></i>404 Page</a>
                    </li>
                    <li>
                        <a href="profile.html"><i class="icon icon-document"></i>Profile</a>
                    </li>

                </ul>
            </li>
            <li class="menu-item-has-children">
                <a href="#">
                    <i class="icon icon-add-3  s-24"></i> <span>Elements</span>
                    <i class=" icon-angle-left pull-right"></i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="element-widgets.html">
                            <i class="icon icon-app text-primary s-14"></i> <span>Widgets</span>
                        </a>
                    </li>
                    <li>
                        <a href="element-typography.html">
                            <i class="icon icon-text-width text-primary s-14"></i> <span>Typography</span>
                        </a>
                    </li>
                    <li><a href="element-slider.html"><i class="icon icon-sliders text-primary s-14"></i>
                        <span>Slider</span></a></li>
                    <li><a href="element-tabs.html"><i class="icon icon-folder text-primary s-14"></i>
                        <span>Tabs</span></a></li>
                    <li><a href="element-progress-bars.html"><i class="icon icon-battery-5 text-primary s-14"></i>
                        <span>Progress Bars</span></a></li>

                    <li><a href="element-preloaders.html"><i class="icon icon-attachment text-primary s-14"></i>
                        <span>Preloaders</span></a></li>
                    <li>
                        <a href="element-letters.html">
                            <i class="icon icon-user-1 text-primary s-14"></i>
                            <span>Avatar Placeholders</span>
                        </a>
                    </li>
                    <li>
                        <a href="element-icons.html">
                            <i class="icon icon-archive-3 text-primary s-14"></i> <span>Icons</span>
                        </a>
                    </li>
                    <li class="mb-5"><a href="element-colors.html">
                        <i class="icon icon-view-1 text-primary s-14"></i> <span>Colors</span>
                    </a>
                    </li>
                </ul>
            </li>

        </ul>

    </div>
</aside>
<!--Sidebar End-->


@endsection