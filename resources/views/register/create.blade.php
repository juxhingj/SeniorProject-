@include('header')


<body class="bodylog">

<link href='https://fonts.googleapis.com/css?family=Open+Sans:700,600' rel='stylesheet' type='text/css'>

<form method="post" action="/register">
    @csrf

    <div class="box">
        <h1 class="h1log">Register</h1>


        <input type="text" class="inputText" name="username" placeholder="Username"/>

        <input type="password" name="password" class="inputText" placeholder="Password"/>

        <input type="submit" name="Register" class="btn" value="Register"/>
        <a href="/login"><div id="btn2">Log In</div></a>

    </div>

</form>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js" type="text/javascript"></script>

</body>



