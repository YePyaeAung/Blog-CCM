<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">Creative Coder</a>
        <div class="d-flex">
            <a href="/#home" class="nav-link">Home</a>
            <a href="/#blogs" class="nav-link">Blogs</a>
            <a href="#subscribe" class="nav-link">Subscribe</a>
            @guest
                <a href="/register" class="nav-link">Register</a>
            @endguest
            @auth
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" href="/logout" class="nav-link btn btn-link">Logout</button>
                </form>
            @endauth
        </div>
    </div>
</nav>