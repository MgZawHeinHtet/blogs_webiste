
  <section class="container text-center" id="blogs">
      <h1 class="display-5 text-primary fw-bold mb-4">Blogs</h1>
      <div class="">
        <x-category></x-category>
        <!-- <select name="" id="" class="p-1 rounded-pill mx-3">
          <option value="">Filter by Tag</option>
        </select> -->
      </div>
      <form action="/blogs" class="my-4 w-50 mx-auto">
        <div class="input-group mb-3">
          @if (request('category'))
            <input type="hidden" name="" value="{{request('category')}}">
          @endif
          @if (request('author'))
            <input type="hidden" name="" value="{{request('author')}}">
          @endif
          <input
            value="{{request('search')}}"
            name="search"
            type="text"
            autocomplete="false"
            class="form-control w-50"
            placeholder="Search Blogs..."
          />
          <button
            class="input-group-text bg-primary text-light"
            id="basic-addon2"
            type="submit"
          >
            Search
          </button>
        </div>
      </form>
      <div class="row mt-5">
        @forelse($blogs as $blog)

            <x-blog-card :blog="$blog"></x-blog-card>
            @empty <p>Not found</p>
            
        @endforelse
        
       
          {{$blogs->links()}}
      
      </div>
    </section>
