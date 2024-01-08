@extends('Frontend.layouts.app')
@section('content')
    <div class="blog-post-area">
        <h2 class="title text-center">Latest From our Blog</h2>
        <div class="single-blog-post">

            <h3>{{ $data['Title'] }}</h3> <span>

                <h3></h3>

                <div class="rate">
                    <div class="vote">
                        <div class="star_1 ratings_stars"><input value="1" type="hidden"></div>
                        <div class="star_2 ratings_stars"><input value="2" type="hidden"></div>
                        <div class="star_3 ratings_stars"><input value="3" type="hidden"></div>
                        <div class="star_4 ratings_stars"><input value="4" type="hidden"></div>
                        <div class="star_5 ratings_stars"><input value="5" type="hidden"></div>
                        <span class="rate-np">
                         
                                {{ $data['rate'] }}
                         
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
            <li class="media">

                <a class="pull-left" href="#">
                    <img class="media-object" src="images/blog/man-two.jpg" alt="">
                </a>
                <div class="media-body">
                    <ul class="sinlge-post-meta">
                        <li><i class="fa fa-user"></i>Janis Gallagher</li>
                        <li><i class="fa fa-clock-o"></i> 1:33 pm</li>
                        <li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
                    </ul>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                        et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                        aliquip ex ea commodo consequat.</p>
                    <a class="btn btn-primary" href=""><i class="fa fa-reply"></i>Replay</a>
                </div>
            </li>
            <li class="media second-media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="images/blog/man-three.jpg" alt="">
                </a>
                <div class="media-body">
                    <ul class="sinlge-post-meta">
                        <li><i class="fa fa-user"></i>Janis Gallagher</li>
                        <li><i class="fa fa-clock-o"></i> 1:33 pm</li>
                        <li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
                    </ul>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                        et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                        aliquip ex ea commodo consequat.</p>
                    <a class="btn btn-primary" href=""><i class="fa fa-reply"></i>Replay</a>
                </div>
            </li>
            <li class="media second-media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="images/blog/man-three.jpg" alt="">
                </a>
                <div class="media-body">
                    <ul class="sinlge-post-meta">
                        <li><i class="fa fa-user"></i>Janis Gallagher</li>
                        <li><i class="fa fa-clock-o"></i> 1:33 pm</li>
                        <li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
                    </ul>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                        et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                        aliquip ex ea commodo consequat.</p>
                    <a class="btn btn-primary" href=""><i class="fa fa-reply"></i>Replay</a>
                </div>
            </li>
            <li class="media second-media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="images/blog/man-three.jpg" alt="">
                </a>
                <div class="media-body">
                    <ul class="sinlge-post-meta">
                        <li><i class="fa fa-user"></i>Janis Gallagher</li>
                        <li><i class="fa fa-clock-o"></i> 1:33 pm</li>
                        <li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
                    </ul>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                        et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                        aliquip ex ea commodo consequat.</p>
                    <a class="btn btn-primary" href=""><i class="fa fa-reply"></i>Replay</a>
                </div>
            </li>
            <li class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="images/blog/man-four.jpg" alt="">
                </a>
                <div class="media-body">
                    <ul class="sinlge-post-meta">
                        <li><i class="fa fa-user"></i>Janis Gallagher</li>
                        <li><i class="fa fa-clock-o"></i> 1:33 pm</li>
                        <li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
                    </ul>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                        et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                        aliquip ex ea commodo consequat.</p>
                    <a class="btn btn-primary" href=""><i class="fa fa-reply"></i>Replay</a>
                </div>
            </li>
            <li class="media second-media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="images/blog/man-three.jpg" alt="">
                </a>
                <div class="media-body">
                    <ul class="sinlge-post-meta">
                        <li><i class="fa fa-user"></i>Janis Gallagher</li>
                        <li><i class="fa fa-clock-o"></i> 1:33 pm</li>
                        <li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
                    </ul>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                        et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                        aliquip ex ea commodo consequat.</p>
                    <a class="btn btn-primary" href=""><i class="fa fa-reply"></i>Replay</a>
                </div>
            </li>
            <li class="media second-media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="images/blog/man-three.jpg" alt="">
                </a>
                <div class="media-body">
                    <ul class="sinlge-post-meta">
                        <li><i class="fa fa-user"></i>Janis Gallagher</li>
                        <li><i class="fa fa-clock-o"></i> 1:33 pm</li>
                        <li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
                    </ul>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                        et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                        aliquip ex ea commodo consequat.</p>
                    <a class="btn btn-primary" href=""><i class="fa fa-reply"></i>Replay</a>
                </div>
            </li>
            <li class="media second-media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="images/blog/man-three.jpg" alt="">
                </a>
                <div class="media-body">
                    <ul class="sinlge-post-meta">
                        <li><i class="fa fa-user"></i>Janis Gallagher</li>
                        <li><i class="fa fa-clock-o"></i> 1:33 pm</li>
                        <li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
                    </ul>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                        et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                        aliquip ex ea commodo consequat.</p>
                    <a class="btn btn-primary" href=""><i class="fa fa-reply"></i>Replay</a>
                </div>
            </li>
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
                    <a class="btn btn-primary" href="">post comment</a>
                </div>
            </div>
        </div>
    </div><!--/Repaly Box-->
@endsection

@section('jsRate')
    <script>
        $(document).ready(function() {
           

            //vote
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


         
        });
    </script>
@endsection
