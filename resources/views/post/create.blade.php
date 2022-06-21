@if(auth()->check())
    @include('headerLoged')
@else
    @include('header')
@endif


<body class="bodylog">

<link href='https://fonts.googleapis.com/css?family=Open+Sans:700,600' rel='stylesheet' type='text/css'>

<form method="post" action="/post" enctype="multipart/form-data">
    @csrf

    <div class="boxPost">
        <h1 class="h1log">Post</h1>

        <input type="text" class="inputText" name="title" placeholder="Title"/>

        <textarea type="text" class="inputText" name="description" placeholder="Description"></textarea>

        <input  type="file" name="fileName" id="fileCSS">

        <input hidden type="text"  name="users_id" value="{{auth()->user()->id}}">


        <input type="submit" name="Post" class="btn" value="Post"/>

    </div>

</form>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js" type="text/javascript"></script>

</body>


