@extends('modules.airclass.layouts.app')
    @section('css')
        <link rel="stylesheet" type="text/css" href="{{asset('airclass/css/index.css')}}" />
        @endsection
    @section('container')
    <!-- slider -->
    <div class="slider_container">
        <div id="slider" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                @for($ol = 0; $ol < $banners->count(); $ol++)
                    <li data-target="#slider" data-slide-to="{{$ol}}" @if($ol == 0) class="active" @endif></li>
                @endfor
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                @foreach($banners as $key => $banner)
                <div class="item @if($key == 0) active @endif">
                    <img width="100%" src="{{$banner->image_url}}" alt="">
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- main body -->
    <div class="main_body">
        <!-- project -->
        <div class="project clearfix">
            <video id="really-cool-video" class="project_video pull-left video-js vjs-default-skin vjs-big-play-centered" controls
                   preload="auto" poster="{{asset('airclass/img/slider_1.jpg')}}"
                   data-setup='{}'>
                <source src="{{asset('airclass/video/test.mp4')}}" type='video/mp4' />
                <source src="http://vjs.zencdn.net/v/oceans.webm" type='video/webm'>
                <source src="http://vjs.zencdn.net/v/oceans.ogv" type='video/ogg'>
                <p class="vjs-no-js">
                    To view this video please enable JavaScript, and consider upgrading to a web browser
                    that
                    <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                </p>
            </video>
            <div class="project_info pull-left">
                <h4 class="title">项目介绍</h4>
                <p class="info">
                    2017空中课堂是国内大型内分泌在线教育课程，由全国数名内分泌代谢领域的知名专家共同参与制作，聚焦基层医生必备的理论知识、诊疗规范、临床热点和疑难困惑，将专家授课与学员互动结合起来，帮助广大基层医生提升临床技能、规范基层糖尿病及其他疾病的管理。 学习权限：学员学习采取等级晋升制。第一等级（必修课18节+答疑课）；第二等级（必修18节+选修19节+答疑课）；第三等级：37节公开课+答疑课+私教课
                    2017年4月，空中课堂已正式上线，期待您的加入。
                    <a class="more" href="javascript: void(0);">详情&gt;</a>
                </p>
                <div class="others clearfix">
                    <div class="host">
                        <span class="icon icon_project_host"></span>
                        课程主办：蓝海联盟（北京）医学研究院
                    </div>
                    <div class="sign_time">
                        <span class="icon icon_project_sign_time"></span>
                        报名时间：2017年04月01日-2017年10月31日
                    </div>
                    <div class="start_time">
                        <span class="icon icon_project_start_time"></span>
                        开课时间：2017年04月01日- 2017年11月30日
                    </div>
                </div>
                <button type="button" class="btn btn_project_sign">课程报名</button>
            </div>
        </div>

        <!-- lessons recommended -->
        <div class="lessons lessons_recommended">
            <h3 class="title">课程推荐</h3>
            <div class="lesson_list row">
                @foreach($recommend_classes as $recommend_class)
                <div class="lesson col-xs-6 col-diy-20">
                    <a href="javascript:void(0);">
                        <img class="center-block" src="{{$recommend_class->logo_url}}" alt="">
                        <div class="caption">
                            <h3 class="title">{{$recommend_class->title}}</h3>
                            <p class="introduction">{{$recommend_class->comment}}</p>
                            <p class="price_and_persons">
                                <span class="price">&yen;198.00</span>
                                <span class="persons pull-right">2123人在学</span>
                            </p>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>

        <!-- lessons public -->
        <div class="lessons lessons_public">
            <h3 class="title">公开课</h3>
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#publicNav-collapse" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="javascript:void(0);">
                            目录
                        </a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="publicNav-collapse">
                        <ul class="nav nav-tabs">
                            <li role="presentation" class="active">
                                <a href="#publicTab1" aria-controls="publicTab1" role="tab" data-toggle="tab" data-imgSrc="{{asset('airclass/img/lesson_big_public.jpg')}}" data-intro="介绍文字1">临床甲减基础</a>
                            </li>
                            <li role="presentation">
                                <a href="#publicTab2" aria-controls="publicTab1" role="tab" data-toggle="tab" data-imgSrc="{{asset('airclass/img/lesson_big_answer.jpg')}}" data-intro="介绍文字2">甲亢突眼</a>
                            </li>
                            <li role="presentation">
                                <a href="#publicTab3" aria-controls="publicTab1" role="tab" data-toggle="tab" data-imgSrc="{{asset('airclass/img/lesson_big_public.jpg')}}" data-intro="介绍文字3">甲亢突眼</a>
                            </li>
                            <li role="presentation">
                                <a href="#publicTab4" aria-controls="publicTab1" role="tab" data-toggle="tab" data-imgSrc="{{asset('airclass/img/lesson_big_answer.jpg')}}" data-intro="介绍文字4">甲亢突眼</a>
                            </li>
                            <li role="presentation">
                                <a href="#publicTab5" aria-controls="publicTab1" role="tab" data-toggle="tab" data-imgSrc="{{asset('airclass/img/lesson_big_public.jpg')}}" data-intro="介绍文字5">甲减专题</a>
                            </li>
                            <li role="presentation">
                                <a href="#publicTab6" aria-controls="publicTab1" role="tab" data-toggle="tab" data-imgSrc="{{asset('airclass/img/lesson_big_answer.jpg')}}" data-intro="介绍文字6">甲减专题</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container-fluid -->
            </nav>
            <div class="lesson_list row">
                <div class="lesson lesson_big col-diy-20"><a href="javascript:void(0);">
                        <img src="{{asset('airclass/img/lesson_big_public.jpg')}}" alt="">
                        <div class="introduction">介绍文字1</div>
                    </a></div>

                <div class="tab-content col-diy-80">
                    <div role="tabpanel" class="tab-pane row fade in active" id="publicTab1">
                        <div class="lesson col-xs-6 col-sm-3"><a href="javascript:void(0);">
                                <img class="center-block" src="{{asset('airclass/img/lesson_2.jpg')}}" alt="">
                                <div class="caption">
                                    <h3 class="title">名师直播公开课</h3>
                                    <p class="introduction">前端极速入门-名师直播公开课【课工场出品】</p>
                                    <p class="price_and_persons">
                                        <span class="price">&yen;198.00</span>
                                        <span class="persons pull-right">2123人在学</span>
                                    </p>
                                </div>
                            </a></div>
                        <div class="lesson col-xs-6 col-sm-3"><a href="javascript:void(0);">
                                <img class="center-block" src="{{asset('airclass/img/lesson_2.jpg')}}" alt="">
                                <div class="caption">
                                    <h3 class="title">名师直播公开课</h3>
                                    <p class="introduction">前端极速入门-名师直播公开课【课工场出品】</p>
                                    <p class="price_and_persons">
                                        <span class="price">&yen;198.00</span>
                                        <span class="persons pull-right">2123人在学</span>
                                    </p>
                                </div>
                            </a></div>
                        <div class="lesson col-xs-6 col-sm-3"><a href="javascript:void(0);">
                                <img class="center-block" src="{{asset('airclass/img/lesson_2.jpg')}}" alt="">
                                <div class="caption">
                                    <h3 class="title">名师直播公开课</h3>
                                    <p class="introduction">前端极速入门-名师直播公开课【课工场出品】</p>
                                    <p class="price_and_persons">
                                        <span class="price">&yen;198.00</span>
                                        <span class="persons pull-right">2123人在学</span>
                                    </p>
                                </div>
                            </a></div>
                        <div class="lesson col-xs-6 col-sm-3"><a href="javascript:void(0);">
                                <img class="center-block" src="{{asset('airclass/img/lesson_2.jpg')}}" alt="">
                                <div class="caption">
                                    <h3 class="title">名师直播公开课</h3>
                                    <p class="introduction">前端极速入门-名师直播公开课【课工场出品】</p>
                                    <p class="price_and_persons">
                                        <span class="price">&yen;198.00</span>
                                        <span class="persons pull-right">2123人在学</span>
                                    </p>
                                </div>
                            </a></div>
                        <div class="lesson col-xs-6 col-sm-3"><a href="javascript:void(0);">
                                <img class="center-block" src="{{asset('airclass/img/lesson_2.jpg')}}" alt="">
                                <div class="caption">
                                    <h3 class="title">名师直播公开课</h3>
                                    <p class="introduction">前端极速入门-名师直播公开课【课工场出品】</p>
                                    <p class="price_and_persons">
                                        <span class="price">&yen;198.00</span>
                                        <span class="persons pull-right">2123人在学</span>
                                    </p>
                                </div>
                            </a></div>
                        <div class="lesson col-xs-6 col-sm-3"><a href="javascript:void(0);">
                                <img class="center-block" src="{{asset('airclass/img/lesson_2.jpg')}}" alt="">
                                <div class="caption">
                                    <h3 class="title">名师直播公开课</h3>
                                    <p class="introduction">前端极速入门-名师直播公开课【课工场出品】</p>
                                    <p class="price_and_persons">
                                        <span class="price">&yen;198.00</span>
                                        <span class="persons pull-right">2123人在学</span>
                                    </p>
                                </div>
                            </a></div>
                        <div class="lesson col-xs-6 col-sm-3"><a href="javascript:void(0);">
                                <img class="center-block" src="{{asset('airclass/img/lesson_2.jpg')}}" alt="">
                                <div class="caption">
                                    <h3 class="title">名师直播公开课</h3>
                                    <p class="introduction">前端极速入门-名师直播公开课【课工场出品】</p>
                                    <p class="price_and_persons">
                                        <span class="price">&yen;198.00</span>
                                        <span class="persons pull-right">2123人在学</span>
                                    </p>
                                </div>
                            </a></div>
                        <div class="lesson col-xs-6 col-sm-3"><a href="javascript:void(0);">
                                <img class="center-block" src="{{asset('airclass/img/lesson_2.jpg')}}" alt="">
                                <div class="caption">
                                    <h3 class="title">名师直播公开课</h3>
                                    <p class="introduction">前端极速入门-名师直播公开课【课工场出品】</p>
                                    <p class="price_and_persons">
                                        <span class="price">&yen;198.00</span>
                                        <span class="persons pull-right">2123人在学</span>
                                    </p>
                                </div>
                            </a></div>
                    </div>

                    <div role="tabpanel" class="tab-pane row fade" id="publicTab2">
                        <div class="lesson col-xs-6 col-sm-3"><a href="javascript:void(0);">
                                <img class="center-block" src="{{asset('airclass/img/lesson_2.jpg')}}" alt="">
                                <div class="caption">
                                    <h3 class="title">名师直播公开课</h3>
                                    <p class="introduction">前端极速入门-名师直播公开课【课工场出品】</p>
                                    <p class="price_and_persons">
                                        <span class="price">&yen;198.00</span>
                                        <span class="persons pull-right">2123人在学</span>
                                    </p>
                                </div>
                            </a></div>
                        <div class="lesson col-xs-6 col-sm-3"><a href="javascript:void(0);">
                                <img class="center-block" src="{{asset('airclass/img/lesson_2.jpg')}}" alt="">
                                <div class="caption">
                                    <h3 class="title">名师直播公开课</h3>
                                    <p class="introduction">前端极速入门-名师直播公开课【课工场出品】</p>
                                    <p class="price_and_persons">
                                        <span class="price">&yen;198.00</span>
                                        <span class="persons pull-right">2123人在学</span>
                                    </p>
                                </div>
                            </a></div>
                        <div class="lesson col-xs-6 col-sm-3"><a href="javascript:void(0);">
                                <img class="center-block" src="{{asset('airclass/img/lesson_2.jpg')}}" alt="">
                                <div class="caption">
                                    <h3 class="title">名师直播公开课</h3>
                                    <p class="introduction">前端极速入门-名师直播公开课【课工场出品】</p>
                                    <p class="price_and_persons">
                                        <span class="price">&yen;198.00</span>
                                        <span class="persons pull-right">2123人在学</span>
                                    </p>
                                </div>
                            </a></div>
                        <div class="lesson col-xs-6 col-sm-3"><a href="javascript:void(0);">
                                <img class="center-block" src="{{asset('airclass/img/lesson_2.jpg')}}" alt="">
                                <div class="caption">
                                    <h3 class="title">名师直播公开课</h3>
                                    <p class="introduction">前端极速入门-名师直播公开课【课工场出品】</p>
                                    <p class="price_and_persons">
                                        <span class="price">&yen;198.00</span>
                                        <span class="persons pull-right">2123人在学</span>
                                    </p>
                                </div>
                            </a></div>
                        <div class="lesson col-xs-6 col-sm-3"><a href="javascript:void(0);">
                                <img class="center-block" src="{{asset('airclass/img/lesson_2.jpg')}}" alt="">
                                <div class="caption">
                                    <h3 class="title">名师直播公开课</h3>
                                    <p class="introduction">前端极速入门-名师直播公开课【课工场出品】</p>
                                    <p class="price_and_persons">
                                        <span class="price">&yen;198.00</span>
                                        <span class="persons pull-right">2123人在学</span>
                                    </p>
                                </div>
                            </a></div>
                        <div class="lesson col-xs-6 col-sm-3"><a href="javascript:void(0);">
                                <img class="center-block" src="{{asset('airclass/img/lesson_2.jpg')}}" alt="">
                                <div class="caption">
                                    <h3 class="title">名师直播公开课</h3>
                                    <p class="introduction">前端极速入门-名师直播公开课【课工场出品】</p>
                                    <p class="price_and_persons">
                                        <span class="price">&yen;198.00</span>
                                        <span class="persons pull-right">2123人在学</span>
                                    </p>
                                </div>
                            </a></div>
                        <div class="lesson col-xs-6 col-sm-3"><a href="javascript:void(0);">
                                <img class="center-block" src="{{asset('airclass/img/lesson_2.jpg')}}" alt="">
                                <div class="caption">
                                    <h3 class="title">名师直播公开课</h3>
                                    <p class="introduction">前端极速入门-名师直播公开课【课工场出品】</p>
                                    <p class="price_and_persons">
                                        <span class="price">&yen;198.00</span>
                                        <span class="persons pull-right">2123人在学</span>
                                    </p>
                                </div>
                            </a></div>
                        <div class="lesson col-xs-6 col-sm-3"><a href="javascript:void(0);">
                                <img class="center-block" src="{{asset('airclass/img/lesson_2.jpg')}}" alt="">
                                <div class="caption">
                                    <h3 class="title">名师直播公开课</h3>
                                    <p class="introduction">前端极速入门-名师直播公开课【课工场出品】</p>
                                    <p class="price_and_persons">
                                        <span class="price">&yen;198.00</span>
                                        <span class="persons pull-right">2123人在学</span>
                                    </p>
                                </div>
                            </a></div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="publicTab3">...</div>
                    <div role="tabpanel" class="tab-pane fade" id="publicTab4">...</div>
                    <div role="tabpanel" class="tab-pane fade" id="publicTab5">...</div>
                    <div role="tabpanel" class="tab-pane fade" id="publicTab6">...</div>
                </div>

            </div>
        </div>

        <!-- lessons answer -->
        <div class="lessons lessons_answer">
            <h3 class="title title_with_more">
                <span class="title_content">答疑课</span>
                <span class="more pull-right">更多&gt;</span>
            </h3>

            <!--<nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#privateNav-collapse" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="javascript:void(0);">
                            目录
                        </a>
                    </div>

                    <div class="collapse navbar-collapse" id="privateNav-collapse">
                        <ul class="nav nav-tabs">
                            <li role="presentation" class="active">
                                <a href="#answerTab1" aria-controls="answerTab1" role="tab" data-toggle="tab" data-imgSrc="{{asset('airclass/img/lesson_big_answer.jpg')}}" data-intro="介绍文字1">临床甲减基础</a>
                            </li>
                            <li role="presentation">
                                <a href="#answerTab2" aria-controls="answerTab2" role="tab" data-toggle="tab" data-imgSrc="{{asset('airclass/img/lesson_big_public.jpg')}}" data-intro="介绍文字2">甲亢突眼</a>
                            </li>
                            <li role="presentation">
                                <a href="#answerTab3" aria-controls="answerTab3" role="tab" data-toggle="tab" data-imgSrc="{{asset('airclass/img/lesson_big_answer.jpg')}}" data-intro="介绍文字3">甲亢突眼</a>
                            </li>
                            <li role="presentation">
                                <a href="#answerTab4" aria-controls="answerTab4" role="tab" data-toggle="tab" data-imgSrc="{{asset('airclass/img/lesson_big_public.jpg')}}" data-intro="介绍文字4">甲亢突眼</a>
                            </li>
                            <li role="presentation">
                                <a href="#answerTab5" aria-controls="answerTab5" role="tab" data-toggle="tab" data-imgSrc="{{asset('airclass/img/lesson_big_answer.jpg')}}" data-intro="介绍文字5">甲减专题</a>
                            </li>
                            <li role="presentation">
                                <a href="#answerTab6" aria-controls="answerTab6" role="tab" data-toggle="tab" data-imgSrc="{{asset('airclass/img/lesson_big_public.jpg')}}" data-intro="介绍文字6">甲减专题</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>-->
            <div class="lesson_list row">
                <div class="lesson lesson_big col-diy-20"><a href="javascript:void(0);">
                        <img src="{{asset('airclass/img/lesson_big_answer.jpg')}}" alt="">
                        <div class="introduction">介绍文字1</div>
                    </a></div>

                <div class="tab-content col-diy-80">
                    <div role="tabpanel" class="tab-pane row fade in active" id="answerTab1">
                        <div class="lesson col-xs-6 col-sm-3"><a href="javascript:void(0);">
                                <img class="center-block" src="{{asset('airclass/img/lesson_2.jpg')}}" alt="">
                                <div class="caption">
                                    <h3 class="title">名师直播公开课</h3>
                                    <p class="introduction">前端极速入门-名师直播公开课【课工场出品】</p>
                                    <p class="price_and_persons">
                                        <span class="price">&yen;198.00</span>
                                        <span class="persons pull-right">2123人在学</span>
                                    </p>
                                </div>
                            </a></div>
                        <div class="lesson col-xs-6 col-sm-3"><a href="javascript:void(0);">
                                <img class="center-block" src="{{asset('airclass/img/lesson_2.jpg')}}" alt="">
                                <div class="caption">
                                    <h3 class="title">名师直播公开课</h3>
                                    <p class="introduction">前端极速入门-名师直播公开课【课工场出品】</p>
                                    <p class="price_and_persons">
                                        <span class="price">&yen;198.00</span>
                                        <span class="persons pull-right">2123人在学</span>
                                    </p>
                                </div>
                            </a></div>
                        <div class="lesson col-xs-6 col-sm-3"><a href="javascript:void(0);">
                                <img class="center-block" src="{{asset('airclass/img/lesson_2.jpg')}}" alt="">
                                <div class="caption">
                                    <h3 class="title">名师直播公开课</h3>
                                    <p class="introduction">前端极速入门-名师直播公开课【课工场出品】</p>
                                    <p class="price_and_persons">
                                        <span class="price">&yen;198.00</span>
                                        <span class="persons pull-right">2123人在学</span>
                                    </p>
                                </div>
                            </a></div>
                        <div class="lesson col-xs-6 col-sm-3"><a href="javascript:void(0);">
                                <img class="center-block" src="{{asset('airclass/img/lesson_2.jpg')}}" alt="">
                                <div class="caption">
                                    <h3 class="title">名师直播公开课</h3>
                                    <p class="introduction">前端极速入门-名师直播公开课【课工场出品】</p>
                                    <p class="price_and_persons">
                                        <span class="price">&yen;198.00</span>
                                        <span class="persons pull-right">2123人在学</span>
                                    </p>
                                </div>
                            </a></div>
                        <div class="lesson col-xs-6 col-sm-3"><a href="javascript:void(0);">
                                <img class="center-block" src="{{asset('airclass/img/lesson_2.jpg')}}" alt="">
                                <div class="caption">
                                    <h3 class="title">名师直播公开课</h3>
                                    <p class="introduction">前端极速入门-名师直播公开课【课工场出品】</p>
                                    <p class="price_and_persons">
                                        <span class="price">&yen;198.00</span>
                                        <span class="persons pull-right">2123人在学</span>
                                    </p>
                                </div>
                            </a></div>
                        <div class="lesson col-xs-6 col-sm-3"><a href="javascript:void(0);">
                                <img class="center-block" src="{{asset('airclass/img/lesson_2.jpg')}}" alt="">
                                <div class="caption">
                                    <h3 class="title">名师直播公开课</h3>
                                    <p class="introduction">前端极速入门-名师直播公开课【课工场出品】</p>
                                    <p class="price_and_persons">
                                        <span class="price">&yen;198.00</span>
                                        <span class="persons pull-right">2123人在学</span>
                                    </p>
                                </div>
                            </a></div>
                        <div class="lesson col-xs-6 col-sm-3"><a href="javascript:void(0);">
                                <img class="center-block" src="{{asset('airclass/img/lesson_2.jpg')}}" alt="">
                                <div class="caption">
                                    <h3 class="title">名师直播公开课</h3>
                                    <p class="introduction">前端极速入门-名师直播公开课【课工场出品】</p>
                                    <p class="price_and_persons">
                                        <span class="price">&yen;198.00</span>
                                        <span class="persons pull-right">2123人在学</span>
                                    </p>
                                </div>
                            </a></div>
                        <div class="lesson col-xs-6 col-sm-3"><a href="javascript:void(0);">
                                <img class="center-block" src="{{asset('airclass/img/lesson_2.jpg')}}" alt="">
                                <div class="caption">
                                    <h3 class="title">名师直播公开课</h3>
                                    <p class="introduction">前端极速入门-名师直播公开课【课工场出品】</p>
                                    <p class="price_and_persons">
                                        <span class="price">&yen;198.00</span>
                                        <span class="persons pull-right">2123人在学</span>
                                    </p>
                                </div>
                            </a></div>
                    </div>

                    <!--<div role="tabpanel" class="tab-pane row fade" id="answerTab2">
                        <div class="lesson col-xs-6 col-sm-3"><a href="javascript:void(0);">
                            <img class="center-block" src="{{asset('airclass/img/lesson_2.jpg')}}" alt="">
                            <div class="caption">
                                <h3 class="title">名师直播公开课</h3>
                                <p class="introduction">前端极速入门-名师直播公开课【课工场出品】</p>
                                <p class="price_and_persons">
                                    <span class="price">&yen;198.00</span>
                                    <span class="persons pull-right">2123人在学</span>
                                </p>
                            </div>
                        </a></div>
                        <div class="lesson col-xs-6 col-sm-3"><a href="javascript:void(0);">
                            <img class="center-block" src="{{asset('airclass/img/lesson_2.jpg')}}" alt="">
                            <div class="caption">
                                <h3 class="title">名师直播公开课</h3>
                                <p class="introduction">前端极速入门-名师直播公开课【课工场出品】</p>
                                <p class="price_and_persons">
                                    <span class="price">&yen;198.00</span>
                                    <span class="persons pull-right">2123人在学</span>
                                </p>
                            </div>
                        </a></div>
                        <div class="lesson col-xs-6 col-sm-3"><a href="javascript:void(0);">
                            <img class="center-block" src="{{asset('airclass/img/lesson_2.jpg')}}" alt="">
                            <div class="caption">
                                <h3 class="title">名师直播公开课</h3>
                                <p class="introduction">前端极速入门-名师直播公开课【课工场出品】</p>
                                <p class="price_and_persons">
                                    <span class="price">&yen;198.00</span>
                                    <span class="persons pull-right">2123人在学</span>
                                </p>
                            </div>
                        </a></div>
                        <div class="lesson col-xs-6 col-sm-3"><a href="javascript:void(0);">
                            <img class="center-block" src="{{asset('airclass/img/lesson_2.jpg')}}" alt="">
                            <div class="caption">
                                <h3 class="title">名师直播公开课</h3>
                                <p class="introduction">前端极速入门-名师直播公开课【课工场出品】</p>
                                <p class="price_and_persons">
                                    <span class="price">&yen;198.00</span>
                                    <span class="persons pull-right">2123人在学</span>
                                </p>
                            </div>
                        </a></div>
                        <div class="lesson col-xs-6 col-sm-3"><a href="javascript:void(0);">
                            <img class="center-block" src="{{asset('airclass/img/lesson_2.jpg')}}" alt="">
                            <div class="caption">
                                <h3 class="title">名师直播公开课</h3>
                                <p class="introduction">前端极速入门-名师直播公开课【课工场出品】</p>
                                <p class="price_and_persons">
                                    <span class="price">&yen;198.00</span>
                                    <span class="persons pull-right">2123人在学</span>
                                </p>
                            </div>
                        </a></div>
                        <div class="lesson col-xs-6 col-sm-3"><a href="javascript:void(0);">
                            <img class="center-block" src="{{asset('airclass/img/lesson_2.jpg')}}" alt="">
                            <div class="caption">
                                <h3 class="title">名师直播公开课</h3>
                                <p class="introduction">前端极速入门-名师直播公开课【课工场出品】</p>
                                <p class="price_and_persons">
                                    <span class="price">&yen;198.00</span>
                                    <span class="persons pull-right">2123人在学</span>
                                </p>
                            </div>
                        </a></div>
                        <div class="lesson col-xs-6 col-sm-3"><a href="javascript:void(0);">
                            <img class="center-block" src="{{asset('airclass/img/lesson_2.jpg')}}" alt="">
                            <div class="caption">
                                <h3 class="title">名师直播公开课</h3>
                                <p class="introduction">前端极速入门-名师直播公开课【课工场出品】</p>
                                <p class="price_and_persons">
                                    <span class="price">&yen;198.00</span>
                                    <span class="persons pull-right">2123人在学</span>
                                </p>
                            </div>
                        </a></div>
                        <div class="lesson col-xs-6 col-sm-3"><a href="javascript:void(0);">
                            <img class="center-block" src="{{asset('airclass/img/lesson_2.jpg')}}" alt="">
                            <div class="caption">
                                <h3 class="title">名师直播公开课</h3>
                                <p class="introduction">前端极速入门-名师直播公开课【课工场出品】</p>
                                <p class="price_and_persons">
                                    <span class="price">&yen;198.00</span>
                                    <span class="persons pull-right">2123人在学</span>
                                </p>
                            </div>
                        </a></div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="answerTab3">...</div>
                    <div role="tabpanel" class="tab-pane fade" id="answerTab4">...</div>
                    <div role="tabpanel" class="tab-pane fade" id="answerTab5">...</div>
                    <div role="tabpanel" class="tab-pane fade" id="answerTab6">...</div>-->
                </div>

            </div>
        </div>

        <!-- lessons private -->
        <div class="lessons lessons_private clearfix">
            <h3 class="title">私教课</h3>
            <img class="lesson_private_img pull-left" src="{{asset('airclass/img/lesson_private.jpg')}}"/>
            <div class="private_info project_info pull-left">
                <h4 class="title">课程介绍</h4>
                <p class="info">
                    2017空中课堂是国内大型内分泌在线教育课程，由全国数名内分泌代谢领域的知名专家共同参与制作，聚焦基层医生必备的理论知识、诊疗规范、临床热点和疑难困惑，将专家授课与学员活动结合起来，希望能帮助广大基层医生提升临床技能、规范基层糖尿病及其他疾病的管理。各位学员也不用再受地域的限制，可以随时参与直播或观看录播课程。各位学员也不用再受地域的限制，可以随时参与直播或观看录播课程。各位学员也不用再受地域的限制，可以随时参与直播或观看录播课程。各位学员也不用再受地域的限制，可以随时参与直播或观看录播课程。各位学员也不用再受地域的限制，可以随时参与直播或观看录播课程。各位学员也不用再受地域的限制，可以随时参与直播或观看录播课程。
                </p>
                <button type="button" class="btn btn_check_detail">查看详情</button>
            </div>
        </div>
    </div>

    @endsection