@extends('admin::backend.tables.index')

@section('box_title','讲师信息')

@if (Auth::guest())
@else
    @include('admin::backend.layouts.aside')
@endif
@section('tables_data')
  <script>
    var data = {
        table_head: ['id', '姓名', '宣传照', '科室', '职称','是否参与私教课','所属大区', '介绍'],
        table_data: [
          @foreach($teachers as $teacher)
            ['{{$teacher->id}}', '{{$teacher->name}}', '{{$teacher->photo_url}}', '{{$teacher->office}}', '{{$teacher->title}}','{{$teacher->is_pt ?'参与' :'不参与'}}', '{{$teacher->belong_area}}', '{!!$teacher->introduction!!}'],
          @endforeach
        ],
        pagination: '{{$teachers->render()}}',
        modal_data: [
          {
            box_type: 'input',
            name: 'id',
            type: 'text'
          },
          {
            box_type: 'input',
            name: 'name',
            type: 'text'
          },
          {
            box_type: 'input',
            name: 'photo_url',
            type: 'text'
          },
          {
            box_type: 'input',
            name: 'office',
            type: 'text'
          },
          {
            box_type: 'input',
            name: 'title',
            type: 'text'
          },
            {
                box_type: 'select',
                name: 'is_pt',
                option: {
                    '参与': '1',
                    '不参与': '0'
                }
            },
            {
                box_type: 'input',
                name: 'belong_area',
                type: 'text'
            },
          {
            box_type: 'textarea',
            name: 'introduction',
            rows: 8
          }
        ],

        update_info: {
          title: '编辑',
          action: '/teacher',
          method: 'put'
        },
        add_info: {
          title: '添加',
          action: '/teacher',
          method: 'post'
        },
        delete_info: {
          url: '/teacher',
          method: 'delete'
        },

        form_info: {
          title: '编辑',
          action: '',
          method: 'post'
        },
        alert:alert,
      }

  </script>
@endsection