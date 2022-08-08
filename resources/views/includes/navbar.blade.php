<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">{{ env('APP_NAME') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="{{Route('users.index')}}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                Users
                </a>
                <div class="dropdown-menu">
                <a  @class(['dropdown-item ','active' => Route::is("users.index")]) href="{{Route('users.index')}}">List</a>
                <a @class(['dropdown-item ','active' => Route::is("users.create")]) href="{{Route('users.create')}}">New User</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                Posts
                </a>
                <div class="dropdown-menu">
                <a  @class(['dropdown-item ','active' => Route::is("posts.index")]) href="{{Route('posts.index')}}">List</a>
                <a @class(['dropdown-item ','active' => Route::is("posts.create")]) href="{{Route('posts.create')}}">New Post</a>
                <a @class(['dropdown-item ','active' => Route::is("posts.deleted_list")]) href="{{Route('posts.deleted_list')}}">Deleted list</a>
                </div>
            </li>
            </ul>
        </div>
    </div>
</nav>