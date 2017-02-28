<?php namespace Modules\Airclass\Http\Controllers;

use App\Models\Banner;
use App\Models\ThyroidClass;
use Modules\Admin\Entities\Teacher;
use Modules\Admin\Entities\ThyroidClassCourse;
use Modules\Admin\Entities\ThyroidClassPhase;

class HomeController extends Controller
{

    protected $site_id = 1; // airClass site_id
    protected $gkk_id = 1; // 空课项目公开课id
    protected $dyk_id = 2; // 空课项目答疑课id
    protected $sjk_id = 3; // 空课项目私教课id

    /**
     * 首页
     * @return mixed
     */
	public function index()
	{
        // 轮播图
        $banners = Banner::where(['site_id' => $this->site_id, 'status' => 1])->get();
        // 课程介绍
        $classes = ThyroidClass::where(['site_id' => $this->site_id])->get();
        // 课程推荐
        $recommend_classes = ThyroidClassCourse::where(['site_id' => $this->site_id])->orderBy('recomment_time')->limit(5)->get();

        // 公开课
        $gkk_units = ThyroidClassPhase::where(['site_id' => $this->site_id, 'is_show' => 1])->get(); // 单元列表
        $gkk_courses = [];
        if($gkk_units){
            foreach ($gkk_units as $gkk_unit){
                $courses = ThyroidClassCourse::where([
                    'site_id' => $this->site_id,
                    'is_show' => 1,
                    'course_class_id' => $this->gkk_id,
                    'thyroid_class_phase_id' => $gkk_unit->id,
                ])->get();
                if($courses->count()){
                    $gkk_courses[] = $courses;
                }
            }
        }
        //答疑课
        $dyk_teachers = Teacher::where(['site_id' => $this->site_id])->get(); // 讲师列表
        $dyk_courses = [];
        if($dyk_teachers){
            foreach ($dyk_teachers as $dyk_teacher){
                $courses = ThyroidClassCourse::where([
                    'site_id' => $this->site_id,
                    'is_show' => 1,
                    'course_class_id' => $this->dyk_id,
                    'teacher_id' => $dyk_teacher->id,
                ])->get();
                if($courses->count()){
                    $dyk_courses[] = $courses;
                }
            }
        }
        // 私教课


		dd($dyk_courses);
		return view('airclass::home.index',[
            'banners' => $banners,
            'classes' => $classes,
            'recommend_classes' => $recommend_classes,
        ]);
	}

    /**
     * 课程介绍
     */
    public function class_introduce()
    {
        dd('课程介绍');
    }

    /**
     * 公开课和答疑课列表页
     */
    public function class_lists()
    {
        dd('公开课和答疑课列表页');
    }

    /**
     * 私教课介绍页
     */
    public function sjk_class_introduce()
    {
        dd('私教课介绍页');
    }

    /**
     * 私教课报名申请
     */
    public function sjk_class_sign()
    {
        dd('私教课报名申请');
    }


    /**
     * 帮助
     */
    public function help()
    {
        dd('help');
    }
	
}

