@extends('Frontend.layouts.app')
@section('content')
    <div class="blog-post-area">
        <h2 class="title text-center">Latest From our Blog</h2>
        <div class="single-blog-post">

            <h3>{{ $data['Title'] }}</h3> <span>

                <h3></h3>

                <div class="rate">
                    <div class="vote">
                        @for ($i = 1; $i <= 5; $i++)
                            <div
                                class="star_{{ $i }} ratings_stars{{ $i <= $averageRate ? ' ratings_over' : '' }}">
                                <input value="{{ $i }}" type="hidden">
                            </div>
                        @endfor

                        <span class="rate-np">
                            {{ $averageRate }}
                        </span>

                    </div>
                </div>

            </span>
            <br>
            <div class="post-meta">
                <ul>
                    <li><i class="fa fa-user"></i> Mac Doe</li>
                    <li><i class="fa fa-clock-o"></i> 1:33 pm</li>
                    <li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
                </ul>
                <!-- <span>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-half-o"></i>
                                                    </span> -->
            </div>
            <a href="">
                <img src="{{ asset('/upload/blog/image/' . $data['Image']) }}" alt="">
            </a>
            <p>{{ $data['Description'] }}</p>
            <p>{!! $data['Content'] !!}</p>


            <div class="pager-area">
                <ul class="pager pull-right">
                    <li><a href="{{ url('Frontend/blog/' . $data['id'] - 1) }}">Pre</a></li>
                    <li><a href="{{ url('Frontend/blog/' . $data['id'] + 1) }}">Next</a></li>
                </ul>
            </div>
        </div>
    </div><!--/blog-post-area-->

    <div class="rating-area">
        <ul class="ratings">
            <li class="rate-this">Rate this item:</li>
            <li>
                <i class="fa fa-star color"></i>
                <i class="fa fa-star color"></i>
                <i class="fa fa-star color"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
            </li>
            <li class="color">(6 votes)</li>
        </ul>
        <ul class="tag">
            <li>TAG:</li>
            <li><a class="color" href="">Pink <span>/</span></a></li>
            <li><a class="color" href="">T-Shirt <span>/</span></a></li>
            <li><a class="color" href="">Girls</a></li>
        </ul>
    </div><!--/rating-area-->



    <div class="socials-share">
        <a href=""><img src="images/blog/socials.png" alt=""></a>
    </div><!--/socials-share-->

    <!-- <div class="media commnets">
                                            <a class="pull-left" href="#">
                                                <img class="media-object" src="images/blog/man-one.jpg" alt="">
                                            </a>
                                            <div class="media-body">
                                                <h4 class="media-heading">Annie Davis</h4>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                                <div class="blog-socials">
                                                    <ul>
                                                        <li><a href=""><i class="fa fa-facebook"></i></a></li>
                                                        <li><a href=""><i class="fa fa-twitter"></i></a></li>
                                                        <li><a href=""><i class="fa fa-dribbble"></i></a></li>
                                                        <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                                                    </ul>
                                                    <a class="btn btn-primary" href="">Other Posts</a>
                                                </div>
                                            </div>
                                        </div> --><!--Comments-->
    <div class="response-area">
        <h2>3 RESPONSES</h2>
        <ul class="media-list">


            @forelse ($cmt as $item)
                @if ($item['level'] == 0)
                    <li class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" style="width: 100px;" src="{{ $item['avatar'] }}" alt="">
                        </a>
                        <div class="media-body">
                            <ul class="sinlge-post-meta">
                                <li><i class="fa fa-user"></i>{{ $item['name'] }}</li>
                                <li><i class="fa fa-clock-o"></i>{{ $item['created_at'] }}</li>
                                <li><i class="fa fa-calendar"></i> {{ $item['created_at'] }}</li>
                            </ul>
                            <p>{{ $item['cmt'] }}</p>
                            <a class="btn btn-primary" href="" id="{{ $item['id'] }}"><i
                                    class="fa fa-reply"></i>Replay</a>
                            {{-- Display replies --}}
                            <ul class="nested-comments">
                                @foreach ($cmt as $item1)
                                    @if ($item1['level'] == $item['id'])
                                        <li class="media second-media">
                                            <a class="pull-left" href="#">
                                                <img class="media-object" style="width: 100px;" src="{{ $item['avatar'] }}"
                                                    alt="">
                                            </a>
                                            <div class="media-body">
                                                <ul class="sinlge-post-meta">
                                                    <li><i class="fa fa-user"></i>{{ $item1['name'] }}</li>
                                                    <li><i class="fa fa-clock-o"></i>{{ $item1['created_at'] }}</li>
                                                    <li><i class="fa fa-calendar"></i> {{ $item['created_at'] }}</li>
                                                </ul>
                                                <p>{{ $item1['cmt'] }}</p>
                                                <a class="btn btn-primary" id="{{ $item['id'] }}" href=""><i
                                                        class="fa fa-reply"></i>Replay</a>
                                                {{-- Add more nested replies as needed --}}
                                            </div>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </li>
                @endif
            @empty
                <p>Không có comment nào !</p>
            @endforelse


        </ul>
    </div><!--/Response-area-->
    <div class="replay-box">
        <div class="row">
            <div class="col-sm-12">
                <h2>Leave a replay</h2>

                <div class="text-area">
                    <div class="blank-arrow">
                        <label>Your Name</label>
                    </div>
                    <span>*</span>
                    <textarea name="message" rows="11"></textarea>
                    <a class="btn btn-primary" id="0" href="">post comment</a>
                </div>
            </div>
        </div>
    </div><!--/Repaly Box-->
@endsection

@section('jsRate')
    <script>
        $(document).ready(function() {
            //vote hover đánh giá 
            $('.ratings_stars').hover(
                // Handles the mouseover
                function() {
                    $(this).prevAll().andSelf().addClass('ratings_hover');
                    // $(this).nextAll().removeClass('ratings_vote'); 
                },
                function() {
                    $(this).prevAll().andSelf().removeClass('ratings_hover');
                    // set_votes($(this).parent());
                }


            );
            // blog rate
            $('.ratings_stars').click(function() {
                var checkLogin = "{{ Auth::check() }}";
                if (checkLogin) {
                    var Values = $(this).find("input").val();
                    $('.rate-np').text(Values);
                    if ($(this).hasClass('ratings_over')) {
                        $('.ratings_stars').removeClass('ratings_over');
                        $(this).prevAll().andSelf().addClass('ratings_over');
                    } else {
                        $(this).prevAll().andSelf().addClass('ratings_over');
                    }
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('rate') }}",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            rate: Values,
                            id_blog: "{{ $data['id'] }}",
                            id_user: "{{ Auth::id() }}"
                        },
                        success: function(data) {
                            alert(data);
                        }
                    });


                } else {
                    alert("Vui Lòng Đăng NHập");
                }


            });
            // blog cmt
            $('.btn-primary').click(function(event) {
                var checkLogin = "{{ Auth::check() }}";
                if (checkLogin) { //check login
                    var cmt = $('textarea[name="message"]').val(); //lấy cmt
                    if (cmt !== "") { //check null cmt
                        var level = $(this).attr("id"); //lấy id cha
                        $.ajax({ // gọi ajax gửi form POst
                            type: 'POST',
                            url: "{{ route('cmt') }}",
                            data: {
                                "_token": "{{ csrf_token() }}",
                                cmt: cmt,
                                id_blog: "{{ $data['id'] }}",
                                id_user: "{{ Auth::id() }}",
                                avatar: "{{ Auth::check() ? Auth::user()->avatar : 'default-avatar.png' }}",
                                name: "{{  Auth::check() ? Auth::user()->name : 'Guest' }}",

                                level: level
                            },
                            success: function(data) {
                                console.log(data);
                            }
                        });
                    } else {
                        alert("Vui Lòng Nhập Bình Luận !");
                    }

                } else {
                    alert("Vui Lòng Đăng NHập ! ");

                }


            });
        });
    </script>
@endsection
