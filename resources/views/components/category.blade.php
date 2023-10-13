<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        {{isset($selectedCategory)?$selectedCategory->name : 'Filter by Category'}}
    </button> 
    <ul class="dropdown-menu">
        @foreach($categories as $cat )
        <li><a class="dropdown-item" href="/blogs?category={{$cat->slug}}{{request('author')? '&author='.request('author') :''}}{{request('search')? '&search='.request('search') :''}}">{{$cat->name}}</a></li>
        @endforeach
    </ul>
</div>