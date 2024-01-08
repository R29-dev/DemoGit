@extends('Frontend.layouts.app')


@section('content')
    <div class="blog-post-area">
        <h2 class="title text-center">Latest From our Blog</h2>
        <div class="single-blog-post">
            @foreach ($data as $item)
                <h3>{{ $item['Title'] }}</h3>
                <div class="post-meta">
                    <ul>
                        <li><i class="fa fa-user"></i> Mac Doe</li>
                        <li><i class="fa fa-clock-o"></i> 1:33 pm</li>
                        <li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
                    </ul>
                    <span>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                    </span>
                </div>
                <a href="">
                    <img src="{{ asset('/upload/blog/image/' . $item['Image']) }}" alt="">
                </a>
                <p>{{ $item['Description'] }}</p>
                <a class="btn btn-primary" href="{{ url('Frontend/blog/' . $item['id']) }}">Read More</a>

               
            @endforeach
        </div>


        <div class="pagination-area">
            <ul class="pagination">
                {{ $data->links('pagination::bootstrap-4') }}
                <li><a href=""><i class="fa fa-angle-double-right"></i></a></li>
            </ul>
        </div>
    </div>
@endsection
