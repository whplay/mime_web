@extends('admin::backend.tables.index_student')

@section('box_title','学生信息')

@if (Auth::guest())
@else
  @include('admin::backend.layouts.aside')
@endif
@section('tables_data')
  <script>
    var data = {
      table_head: ['id', '手机号', '邮箱', '姓名', '省', '市', '区', '医院', '科室', '职称', '注册时间', '报名时间'],
      log_head: ['课程名称', '点击时间', '观看时长'],
      data: [
        @foreach($students as $student)
        {
          table_data: ['{{$student->id}}', '{{$student->phone}}', '{{$student->email}}','{{$student->name}}', '{{$student->hospital->province}}', '{{$student->hospital->city}}', '{{$student->hospital->area}}', '{{$student->hospital->hospital_name}}', '{{$student->office}}', '{{$student->title}}', '{{$student->created_at}}', '{{$student->entered_at}}'],
          log_data: [
            @foreach($student->playLogs as $log)
              @foreach($log->details as $key => $value)
                ['{{$courseArray[$log->thyroid_class_course_id]}}', '{{$key}}', '{{$value}}'],
              @endforeach
            @endforeach
          ]
        },
        @endforeach
      ],
      modal_data: '',
      alert: alert,
      @if(isset($search))
        pagination: '{{$students->appends(['search' => $search, 'site_id' => $_GET['site_id'] ?? ''])->render() }}',
      @else
        pagination: '{{$students->appends(['site_id' => $_GET['site_id'] ?? ''])->render()}}',
      @endif

    }
  </script>
@endsection