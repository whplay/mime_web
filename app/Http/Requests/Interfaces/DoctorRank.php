<?php

namespace App\Http\Requests\Interfaces;

use App\Http\Requests\Request;
use App\Models\{Doctor,StudyLog};

/**
 * Class DoctorRank
 * @package App\Http\Requests\Interfaces
 * @mixin Request
 */
trait DoctorRank
{
    /**
     * @var array
     */
    protected $doctor_user;
    protected $rank;
    protected $site_id = 2; // airClass site_id

    /**
     * @description 用户信息
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function getUser(array $params)
    {
        if(!isset($params['id']))
            return false;
        $this->doctor_user = doctor::where('id', $params['id'])->firstOrFail();
        return $this->doctor_user ;
    }

    /**
     * @description 等级一：学员报名成功后即为等级一级别，可学习任意所有必修课；
     * 等级二：学员学习20节必修课程且每节课学习时长均>=10分钟后，进度到达等级二；
     * 等级三：在等级二的基础上，学完所有的选修课，且每节课学习时长>=10分钟，升级至等级三；
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function setRank(array $params)
    {
        if(!isset($params['id']))
            return false;

        if($this->getUser($params)->rank)
        {
            if($this->getUser($params)->rank==1)
            {
                $lists = StudyLog::setUserRank(['course_type'=>1,'site_id'=>$this->site_id,'id'=>$params['id']]);
                unset($lists['course_type_count']);
                if(count($lists)>=config('params')['study_level']['course_public_min'])
                {
                    try{
                        //赠送迈豆积分
                        $post_data = array('phone'=> $params['phone'],'bean'=>config('params')['bean_rules']['rank_level']);
                        $response = \Helper::tocurl(env('MD_USER_API_URL'). '/v2/modify-bean', $post_data,1);
                        if($response['httpCode']==200)// 服务器返回响应状态码,当电话存在时
                        {
                            Doctor::where('id', $params['id'])->update(['rank' => 2]); // 升级为二级
                            $this->rank =2;
                        }
                    }
                    catch (\Exception $e){
                        return $this->rank =$this->getUser($params)->rank;
                    }

                }
                else
                    $this->rank =1;
            }
            if($this->getUser($params)->rank==2)
            {
                /* 验证等级三 */
                $lists = StudyLog::setUserRank(['course_type'=>2,'site_id'=>$this->site_id,'id'=>$params['id']]);
                $course_count = $lists['course_type_count'];
                unset($lists['course_type_count']);
                if(count($lists)==$course_count)
                {
                    try
                    {
                        //赠送迈豆积分
                        $post_data = array('phone'=> $params['phone'],'bean'=>config('params')['bean_rules']['rank_level']);
                        $response = \Helper::tocurl(env('MD_USER_API_URL'). '/v2/modify-bean', $post_data,1);
                        if($response['httpCode']==200)// 服务器返回响应状态码,当电话存在时
                        {
                            Doctor::where('id', $params['id'])->update(['rank' => 3]); // 升级为三级
                            $this->rank =3;
                        }

                    } catch (\Exception $e){

                        return $this->rank =$this->getUser($params)->rank;
                    }

                }
                else
                    $this->rank =2;
            }
        }
        else
            return $this->rank =0; // 未报名

        return $this;
    }

}