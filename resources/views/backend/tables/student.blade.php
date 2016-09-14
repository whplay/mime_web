@extends('backend.tables.index_student')

@section('title', '学生信息')
@section('box_title','学生列表')


@section('tables_data')
  <script>
    var data = {
      table_head: ['id', '姓名', '省', '市', '区', '医院', '科室', '职称', '注册时间', '报名时间'],
      log_head: ['课程名称', '点击时间', '观看时长', '讲师'],
      data: [
        @foreach($students as $student)
        {
          table_data: [{{$student->id}}, {{$student->name}}, {{$student->province}}, {{$student->city}}, {{$student->area}}, {{$student->hospital_name}}, {{$student->office}}, {{$student->title}}, {{$student->created_at}}, {{$student->entered_at ?$student->entered_at:"未注册"}}],
          log_data: [
            @foreach($student->playLogs as $log)
              @foreach($log->details as $key => $value)
                [{{$courseArray[$log->thyroid_class_course_id]}}, {{$key}}, {{$value}}, {{$teacherArray[$log->teacher_id]}}],
              @endforeach
            @endforeach
          ]
        },
        @endforeach
      ],
      modal_data: '',
      alert: alert
    }
  </script>
@endsection