@foreach($blogs as $blog)
        <h1><a href="/blogs/{{$blog->slug}}">{{$blog->title}} @if($blog->title === "third blog")
        <span>special</span>
        @endif</a></h1>

        <h5>Intro -{{$blog->intro}}</h5>
        <p>Public - {{$blog->created_at->format('d=m-y')}}</p>
        <p>Category- <a href="/categories/{{$blog->category->slug}}">{{$blog->category->name}}</a> </p>
        <p>author - <a href="/users/{{$blog->user->username}}">{{$blog->user->name}}</a></p>
    @endforeach
