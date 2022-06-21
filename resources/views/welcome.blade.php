
@if(auth()->check())
    @include('headerLoged')
@else
    @include('header')
@endif

<script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>

<body>

    <div class="container">

   @foreach($postsDetails as $post)
            <h1>
                    <div class="title"><a class="title" href="postdetails/{{$post->id}}">{{ $post -> title }}</a><div>
            </h1>

                <div class="episode__content">
                    <div class="title">Description</div>
                    <div class="story">
                        <p>{{$post->description}}</p>
                    </div>
                </div>
  @endforeach
            </div>


</body>


