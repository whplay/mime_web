@extends('modules.airclass.layouts.app')
    @section('css')
        <link rel="stylesheet" type="text/css" href="{{asset('airclass/css/index.css')}}" />
        @endsection
    @section('container')
        <div class="modal fade" tabindex="-1" role="dialog" id="activity_modal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-body">
                        <img src="{{ asset('airclass/img/close.jpg') }}" style="max-width: 100%;position: relative;float: right;cursor: pointer;" id="activity_close">
                        <img src="{{ asset('airclass/img/20180301210516-kk.png') }}" style="max-width: 90%;">
                        {{--<img src="{{ asset('airclass/img/unlock.png') }}" style="width: 36%;margin-top:-21%;margin-left: 30%;position: relative;display:block;cursor: pointer;" id="activity_img">--}}
                        <a class="btn btn-lg btn-primary" href="http://wechat.mime.org.cn/register?from=2" style="position: absolute;bottom:10%;left:37%;">立即登入</a>
                    </div>
                </div>
            </div>
        </div>
    <!-- main body -->
    <div class="main_body">
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
                            <a href="{{ /*strpos($banner->href_url,'http') === 0 ?$banner->href_url : 'http://'.*/$banner->href_url}}"><img width="100%" src="{{$banner->image_url}}" alt=""></a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- project -->
        <div class="project clearfix">
            <div id="id_video_container" class="project_video pull-left" ></div>
            <div class="project_info pull-left">
                <h4 class="title">课程介绍</h4>
                <p class="info">
                    {{ $classes['comment'] }}.
                    <a class="more" href="./">详情&gt;</a>
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
                <button type="button" class="btn btn_project_sign" @if($sing_up) disabled @endif>@if($sing_up) 已报名 @else 课程报名 @endif</button>
            </div>
        </div>

        <!-- lessons recommended -->
        <div class="lessons lessons_recommended">
            <h3 class="title">课程推荐</h3>
            <div class="lesson_list row">
                @foreach($recommend_classes as $recommend_class)
                <div class="lesson col-xs-6 col-diy-20">
                    <a class="a_list" href="{{ url('video/'.$recommend_class->id) }}" target="_blank">
                        <img class="center-block" src="{{$recommend_class->logo_url}}" alt="">
                        <div class="caption">
                            <h3 class="title">{{$recommend_class->title}}</h3>
                            <p class="introduction">{{$recommend_class->comment}}</p>
                            <p class="price_and_persons">
                                {{--<span class="price">&yen;198.00</span>--}}
                                {{--@if($recommend_class->course_type == 2)<span class="class_list_lock_icon pull-right"></span>@endif--}}
                                <span class="persons pull-right">{{$recommend_class->play_count}}人在学</span>
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
                            @foreach($public_class_courses as $key=>$data)
                            <li role="presentation" @if($key== 0)class="active"@endif>
                                <a href="#publicTab{{$key+1}}" aria-controls="publicTab1" role="tab" data-toggle="tab" data-imgSrc="{{$data->logo_url}}" data-intro="{{$data->comment}}">{{$data->title}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container-fluid -->
            </nav>
            <div class="lesson_list row">
                <div class="lesson lesson_big col-diy-20"><a href="javascript:void(0);">
                        <img src="{{$class_info[2]->banner_url}}" alt="">
                        <div class="introduction">{{$class_info[2]->description}}</div>
                    </a></div>

                <div class="tab-content col-diy-80">
                    @foreach ($public_class_courses as $key=> $data)
                    <div role="tabpanel" class="tab-pane row fade @if ($key==0)in active @endif" id="publicTab{{$key+1}}">
                        @foreach($data['course_list'] as $val)
                        <div class="lesson col-xs-6 col-sm-3"><a class="a_list" href="{{ url('video/'.$val->id) }}" target="_blank">
                                <img class="center-block" src="{{ $val->logo_url  }}" alt="">
                                <div class="caption">
                                    <h3 class="title">{{ $val->title }}</h3>
                                    <p class="introduction">{{ str_limit($val->comment, $limit = 100, $end = '...') }}</p>
                                    <p class="price_and_persons">
                                        {{--<span class="price">&yen;198.00</span>--}}
                                        {{--@if($val->course_type == 2)<span class="class_list_lock_icon pull-right"></span>@endif--}}
                                        <span class="persons pull-right">{{ $val->play_count }}人在学</span>
                                    </p>
                                </div>
                            </a></div>
                        @endforeach
                    </div>
                    @endforeach

                </div>

            </div>
        </div>

        <!-- lessons answer -->
        <div class="lessons lessons_answer">
            <h3 class="title title_with_more">
                <span class="title_content">答疑课</span>
                <span class="more pull-right"><a href="/answer_class">更多</a> &gt;</span>
            </h3>

            <div class="lesson_list row">
                <div class="lesson lesson_big col-diy-20"><a href="/answer_class">
                        <img src="{{$class_info[0]->banner_url}}" alt="">
                        <div class="introduction">{{$class_info[0]->description}}</div>
                    </a></div>

                <div class="tab-content col-diy-80">
                    <div role="tabpanel" class="tab-pane row fade in active" id="answerTab1">
                        @foreach($answer_class_courses as $data)
                        <div class="lesson col-xs-6 col-sm-3"><a class="a_list" href="{{ url('video/'.$data->id) }}" target="_blank">
                                <img class="center-block" src="{{ $data->logo_url  }}" alt="">
                                <div class="caption">
                                    <h3 class="title">{{$data->title}}</h3>
                                    <p class="introduction">{{ str_limit($data->comment, $limit = 100, $end = '...') }}</p>
                                    <p class="price_and_persons">
                                        {{--<span class="price">&yen;198.00</span>--}}
                                        {{--@if($data->course_type == 2)<span class="class_list_lock_icon pull-right"></span>@endif--}}
                                        <span class="persons pull-right">{{ $data->play_count }}人在学</span>
                                    </p>
                                </div>
                            </a></div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>

        <!-- lessons private -->
        <div class="lessons lessons_private clearfix">
            <h3 class="title">私教课</h3>
            <img class="lesson_private_img pull-left" src="{{$class_info[1]->banner_url}}"/>
            <div class="private_info project_info pull-left">
                <h4 class="title">课程介绍</h4>
                <p class="info">
                {{$class_info[1]->description}}
                </p>
                <button type="button" class="btn btn_check_detail" onclick="javascript:location.href='/private_class'">查看详情</button>
            </div>
        </div>
    </div>
    @endsection



@section('js')
    <script LANGUAGE="JavaScript">
        window.alert = function(str){
            return ;
        }
    </script>
    <script src="http://qzonestyle.gtimg.cn/open/qcloud/video/h5/h5connect.js"></script>
    <script type="text/javascript">
        $(function () {
            $('#activity_modal').modal('show');
            $('#activity_close').click(function(){
                $('#activity_modal').modal('hide');
            })
            // 腾讯视频
            var option = {
                "auto_play": "0",
                "file_id": "{{$classes['qcloud_file_id']}}",
                "app_id": "{{$classes['qcloud_app_id']}}",
                "width": 1280,
                "height": 720,
                "remember": 1,
                "stretch_patch": true
            };
            /*调用播放器进行播放*/
            var player = new qcVideo.Player(
                    /*代码中的id_video_container将会作为播放器放置的容器使用,可自行替换*/
                "id_video_container",
                option
            );

            function setVolume(e) {
                var volume = e.target.value;
                //console.log(volume);
                player.volume = volume;
            }

            $('.btn_project_sign').click(function () {
                //showAlertModal('请联系空课志愿者进行报名');
                window.open("/register","_self");
            });

            //banner图片点击显示答题
            /*var se_uid = "{{session('user_login_session_key')['id']}}";
            $('.carousel-inner .active img').click(function(){
                if(se_uid){
                    $('#btn_upgrade').click();
                }else{
                    $('.navbar-right .btn_login').click();
                }
            })*/
        });
    </script>
@endsection
