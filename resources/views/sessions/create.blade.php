@include('header')

<body class="bodylog">

<link href='https://fonts.googleapis.com/css?family=Open+Sans:700,600' rel='stylesheet' type='text/css'>

<form method="post" action="/sessions">
    @csrf

    <div class="box">
        <h1 class="h1log">Log In</h1>


        <input type="text" class="inputText" name="username" placeholder="Username"/>

        <input type="password" name="password" class="inputText" placeholder="Password"/>

        <input type="submit" name="Register" class="btn" value="Log In"/>
        <a href="/register"><div id="btn2">Register</div></a>

    </div>

</form>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js" type="text/javascript"></script>

</body>

