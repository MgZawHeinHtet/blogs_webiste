   @php
   $comments = $blog->comments()->latest()->paginate(2);
   @endphp
   <div class="container">

     <div class="row">
       <div class="col-md-6 mx-auto text-center">
         <img src="https://creativecoder.s3.ap-southeast-1.amazonaws.com/blogs/GOLwpsybfhxH0DW8O6tRvpm4jCR6MZvDtGOFgjq0.jpg" class="card-img-top" alt="..." />
         <form method="post" action="/blogs/{{$blog->slug}}/handle-subscribe">
          @csrf
          @if (auth()->user()->isSubscribe($blog))
          <button class="btn btn-primary">unsubscribe</button>
          @else
           <button class="btn btn-warning">subscribe</button>
          @endif
         </form>
         <h3 class="my-3">{{$blog->title}}</h3>  
         <div>
           <div>Author - <a class="text-decoration-none" href="/users/{{$blog->user->username}}">{{$blog->user->name}}</a></div>
           <div class="badge bg-primary my-2"><a class="text-white text-decoration-none" href="/categories/{{$blog->category->slug}}">{{$blog->category->name}}</a></div>
           <div class="text-secondary">{{$blog->created_at->diffForHumans()}}</div>
         </div>
         <p class="lh-md">
           {{$blog->body}}
         </p>
       </div>
     </div>


     <section class="container  my-4">
       @if ($id = request('edit'))

       <form class="w-50 mx-auto" method="get" action="/comments/{{$id}}/update">

         @csrf
         <textarea class="form-control mb-2" rows="6" name="body" id="">{{$comments->find($id)->body??$blog->comments()->find($id)->body}}</textarea>
         @error('body')
         <p class="text-danger">{{$message}}</p>
         @enderror
         <button class="btn btn-info block" type="submit">Update</button>
       </form>
       @else
       <form class="w-50 mx-auto" method="POST" action="/blogs/{{$blog->slug}}/comments">
         @csrf
         <textarea class="form-control mb-2" rows="6" name="body" id=""></textarea>
         @error('body')
         <p class="text-danger">{{$message}}</p>
         @enderror
         <button class="btn btn-info block" type="submit">Comment</button>
       </form>
       @endif


       <ul style="list-style: none;" class="list-group list-style-none w-50 mx-auto">
         @foreach ($comments as $comment)
         <li class="my-3">
           <div class="card shadow position-relative">
             <div class="card-header bg-info d-flex align-items-center justify-content-between">
               <div class="d-flex align-items-center">
                 <img class="comment_profile" src="https://avatars.githubusercontent.com/u/147792575?v=4" alt="no file">
                 <h6 class="ms-2 text-white">{{$comment->user->name}}</6>
               </div>
               <p class="mb-0 text-white">
                 {{$comment->blog->created_at->diffForHumans()}}
               </p>
             </div>
             <div class="card-body">
               <p class="card-text">
                 {{ $comment->body }}
               </p>
             </div>
             <div class="btn_container">
               <button class="btn btn-info text-white"><a class="text-decoration-none text-white" href="/comments/{{$comment->id}}/edit">Edit</a></button>
               <button class="btn btn-info text-white"><a class="text-decoration-none text-white" href="/comments/{{$comment->id}}">Delete</a></button>
             </div>
           </div>
         </li>
         @endforeach
         {{ $comments->links() }}
       </ul>
     </section>
   </div>