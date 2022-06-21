
@if(auth()->check())
    @include('headerLoged')
@else
    @include('header')
@endif

<script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>

<body>


<div class="postDetails">

    <div class="container">
    <h1>

        <div class="title"><a>{{ $post -> title }} </a></div>

    </h1>


    <model-viewer src="{{asset('modelsFiles/'.$post->fileName)}}"  ar ar-modes="webxr scene-viewer quick-look"  seamless-poster shadow-intensity="1" camera-controls></model-viewer>


    <p style="margin-left: 0px">Description: {{$post->description}}</p>

        @if(auth()->check())
            <form method="post" action="/postdetails" enctype="multipart/form-data">
                @csrf

                <br>
                <br>
                <div class="form-group">
                    <label class="h1log" style="color: #ffffff">Comment: </label>
                    <input class="inputText" type="text" name="content"/>
                    <input hidden type="text" name="posts_id" value="{{$post->id}}">
                    <input hidden type="text" name="users_id" value="{{auth()->user()->id}}">

                </div>

                <input type="submit" name="Comment" class="btnComment" value="Comment"/>


            </form>


            <div>
                @if($liked_by_user > 0)
                    <a class="btnComment" style="padding-left: 40px" href="/unlike/{{$post->id}}">Unlike</a>
                @else
                    <a class="btnComment" style="padding-left: 45px" href="/like/{{$post->id}}">Like</a>
                @endif


            </div>

        @endif

            <p style="margin-top: 25px" >Likes: ({{$likes}})</p>

        <h1>Comments:</h1>

        @foreach($comments as $comment)

            @foreach($users as $user)

                @if($user->id == $comment -> users_id)
                    <div class="comments">
                        <label class="h1log" style="color: #ffffff" >{{$user -> username}}: {{$comment->content}}</label>
                    </div>
                    <br>
                @endif

            @endforeach
        @endforeach




    </div>


</div>


</body>

