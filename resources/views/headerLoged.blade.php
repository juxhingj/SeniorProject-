<!DOCTYPE html>
<link rel="stylesheet" href="/app.css">

<title>Art-chitecture</title>


<link rel="stylesheet" href="/app.css">

<div class="header">
    <a href="/" class="logo">Art-chitecure</a>
    <div class="header-right">

        <a class="active" href="/">Home</a>
        <a href="/post">Create Post</a>
        <a href="/profile">Profile</a>
        <form method="POST" action="/logout">
            @csrf
            <button class="logout" type="submit" >Log out</button>
        </form>

    </div>
</div>
