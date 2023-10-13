
 <div class="col-md-4 mb-4">
          <div class="card border-0 shadow rounded bg-white">
            <img
              src="https://creativecoder.s3.ap-southeast-1.amazonaws.com/blogs/GOLwpsybfhxH0DW8O6tRvpm4jCR6MZvDtGOFgjq0.jpg"
              class="card-img-top p-2 rounded"
              alt="..."
            />
            <div class="card-body">
              <p class="card-title h5">{{$blog->title}}</p>
              <p class="fs-10 text-secondary mb-0">
                <a class="text-secondary fw-bold text-decoration-none" href="/blogs?author={{$blog->user->username}}{{request('category')?'&category='.request('category') : ''}}{{request('search')?'&search='.request('search') : ''}}">{{$blog->user->name}}</a>
                <span> -{{$blog->created_at->diffForHumans()}}</span>
              </p>
              <div class="tags my-2">
                <span class="badge bg-primary"><a class="text-white text-decoration-none" href="/blogs?category={{$blog->category->slug}}">{{$blog->category->name}}</a></span>
              </div>
              <p class="card-text">
                {{Str::substrReplace($blog->body,"...",80)}}
              </p>
              <a href="/blogs/{{$blog->slug}}" class="btn btn-primary">Read More</a>
            </div>
          </div>
        </div>
