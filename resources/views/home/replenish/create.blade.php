@extends('layouts.app')

@section('title','完善个人信息')

@section('page_id','personal')

@section('css')
  <style>
    .log-in-form {
      border: 1px solid #cacaca;
      padding: 1rem 1rem !important;
      border-radius: 3px;
    }

    .help-text {
      color: #ec5840;
    }
  </style>
@endsection

@section('content')
  <div class="row">
    <div class="medium-6 medium-centered large-4 large-centered columns">
      <br>
      <form action="" method="post">
        <div class="row column log-in-form">
          <h4 class="text-center">个人信息完善</h4>

          <label>姓名
            <input required v-model="name" type="text" placeholder="请输入" name="phone">
          </label>
          <p id="error_name" class="help-text hide">请输入</p>

          <label>昵称
            <input required v-model="nickname" type="text" placeholder="请输入" name="nickname">
          </label>
          <p id="error_nickname" class="help-text hide">请输入</p>

          <div style="font-size: .875rem">
            <div class="small-2 columns" style="padding-left: 0;">性别</div>
            <label class="small-5 columns">
              <input required v-model="sex" type="radio" value="male" name="sex">男
            </label>
            <label class="small-5 columns">
              <input required v-model="sex" type="radio" value="female" name=sex">女
            </label>
          </div>
          <p id="error_sex" class="help-text hide">请输入</p>


          <div style="font-size: .875rem">地区
            <div class="row">
              <label class="small-4 columns">
                <select required class="form-control" name="province" id="province" v-model="province"></select>
              </label>
              <label class="small-4 columns">
                <select required class="form-control" name="city" id="city" v-model="city"></select>
              </label>
              <label class="small-4 columns">
                <select required class="form-control" name="area" id="area" v-model="area"></select>
              </label>
            </div>
          </div>
          <p id="error_province" class="help-text hide">请输入</p>
          <p id="error_city" class="help-text hide">请输入</p>
          <p id="error_area" class="help-text hide">请输入</p>

          <label>医院
            <input required v-model="hospital" type="text" placeholder="请输入" name="phone">
          </label>
          <p id="error_hospital" class="help-text hide">请输入</p>

          <label>科室
            <select required v-model="office" name="phone">
              <option value="" disabled selected>请选择科室</option>
              <option v-for="option in office_array" value="@{{option}}">@{{option}}</option>
            </select>
          </label>
          <p id="error_office" class="help-text hide">请输入</p>

          <label>职称
            <select required v-model="title" name="phone">
              <option value="" disabled selected>请选择职称</option>
              <option v-for="option in title_array" value="@{{option}}">@{{option}}</option>
            </select>
          </label>
          <p id="error_title" class="help-text hide">请输入</p>

          <label>邮箱
            <input required v-model="email" type="text" placeholder="请输入" name="email">
          </label>
          <p id="error_email" class="help-text hide">请输入</p>

          <p><a type="submit" class="button expanded">确&emsp;认</a></p>
        </div>
      </form>
    </div>
  </div>
  <br>
@endsection


@section('js')
  <script src="/vendor/city.js/city.js"></script>
  <script>
    vm = new Vue({
      el: '#personal',
      data: {
        name: null,
        nickname: null,
        sex: null,
        province: null,
        city: null,
        area: null,
        hospital: null,
        office: null,
        title: null,
        email: null,

        office_array: [
          '妇产科'
          , '核医学科'
          , '甲状腺外科'
          , '老年科'
          , '内分泌科'
          , '其他科室'
          , '全科'
          , '神经科'
          , '肾内科'
          , '心血管科'
          , '肿瘤科'
          , '综合内科'
        ],
        title_array: [
          '副主任医师'
          ,'主任医师'
          ,'主治医师'
          ,'住院医师'
        ]
      }
    });

    $(function () {
      city_selector();
    });

    //    $('#province').val(province);
    //    $('#province').trigger('change');
    //    $('#city').val(city);
    //    $('#city').trigger('change');
    //    $('#area').val(area);
    //    $('#area').trigger('change');
  </script>
@endsection