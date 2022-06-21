
@if(auth()->check())
    @include('headerLoged')
@else
    @include('header')
@endif


<script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>

<body>


<div>

    <div style="margin-left: 18%">
        <h1>Profile</h1>
        <a>Profile Username: {{auth()->user()->username}}</a>

    </div>

    <h1 style="margin-left:18% ">Posts:</h1>

    <div class="container">

        @foreach($postsDetails as $post)

            @if(auth()->user()->id==$post->users_id)

            <h1>
                <div class="title"><a href="postdetails/{{$post->id}}">{{ $post -> title }}</a><div>
            </h1>

            <div class="episode__content">
                <div class="title">Description</div>
                <div class="story">
                    <p>{{$post->description}}</p>
                </div>
            </div>
            @endif

        @endforeach
    </div>


</div>


</body>
