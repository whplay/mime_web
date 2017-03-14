<?php namespace Modules\AirClass\Http\Controllers;

use App\Models\Doctor;
use Cache;
use Illuminate\Http\Request;

class SmsController extends Controller
{
    protected $code_prefix = 'phone_code_'; // 验证码缓存前缀
    protected $code_times = 1000; // 验证码有效期：分钟

    /**
     * 生成验证码
     * @param int $start
     * @param int $end
     * @return mixed
     */
    protected function create_code($start = 000000, $end = 999999){
        return sprintf('%06d', random_int($start, $end));
    }

    /**
     * 短信模板
     * @param string $model_name
     * @param array $data
     * @return string
     */
    protected function sms_model($model_name = 'code', $data = []){
        switch ($model_name){
            // 验证码
            case 'code':
                $res_data = '验证码：'.$data['code'].',有效期' . $this->code_times . '分钟。';break;
            // 找回密码
            case 'password':
                $res_data = '手机号'.$data['phone'].'的用户，你的密码为：'.$data['password'].'。';break;
            default:
                $res_data = '空的空的空的';break;
        }
        return $res_data;
    }

    /**
     * 发送短信
     * @param $phone
     * @param $message
     * @param string $inscribed
     * @return mixed
     */
    protected function curl($phone, $message, $inscribed = '空中课堂'){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://sms-api.luosimao.com/v1/send.json");
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, 'api:key-' . env('SMS_KEY'));
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS,
            ['mobile' => $phone, 'message' => $message . '【'.$inscribed.'】']);
        $res = curl_exec($ch);
        curl_close($ch);
        return $res;
    }

    /**
     * 发送手机验证码
     * @param $phone
     * @param $required ：1，必须有；-1，必须无；0，随意
     * @return array
     */
    public function send_sms($phone, $required = 0)
    {
        if($phone){
            $code   = $this->create_code();
            $user = null;
            // 如果不是随意发送短信验证码，则验证用户存在与否
            if($required != 0){
                $user = Doctor::where('phone', $phone)->first();
            }
            if(($required == 1 && $user) || ($required == -1 && !$user) || $required == 0){
                Cache::add($this->code_prefix . $phone, $code, $this->code_times);
                $session_res = Cache::get($this->code_prefix . $phone);
                if($session_res == $code){
                    $sms_model = $this->sms_model('code',['code' => $code]); // 选择验证码模板
                    $res = $this->curl($phone, $sms_model); // 发送curl请求短信api
                    if(json_decode($res)->error == 0){
                        return ['code' => 200, 'msg'=>'success'];
                    }else{
                        return ['code' => 500, 'msg'=>'SMS interface call failed'];
                    }
                }else{
                    return ['code' => 500, 'msg'=>'service error'];
                }
            }else if($user){
                return ['code' => 422, 'msg'=>'手机号已存在'];
            }else{
                return ['code' => 422, 'msg'=>'手机号不存在'];
            }
        }else{
            return ['code' => 422, 'msg'=>'参数错误'];
        }
    }

    /**
     * 短信验证码请求
     * @param Request $request
     * @return array
     */
    public function send_code_post(Request $request)
    {
        // 验证参数合法性
        $validator_params = $this->validator_params($request->all());
        if($validator_params['code'] != 200){
            return $this->return_data_format($validator_params['code'], $validator_params['msg']);
        }
        $phone = $request->input('phone');
        $exist = $request->input('exist');
        $sms = new SmsController();
        $res = $sms->send_sms($phone, $exist);
        if($res['code'] == 200){
            return $this->return_data_format(200, '发送成功');
        }else if($res['code'] == 422 || $res['code'] == 444){
            return $this->return_data_format($res['code'], $res['msg']);
        }else{
            return $this->return_data_format($res['code'], '发送失败');
        }
    }

    /**
     * 检测短信验证码
     * @param $phone
     * @param $code
     * @return array
     */
    public function verify_code($phone, $code)
    {
        $session_res = Cache::get($this->code_prefix . $phone);
        if($session_res && $session_res == $code){
            return $this->return_data_format(200);
        }else{
            return $this->return_data_format(422, '验证码错误或已失效');
        }
    }

}
