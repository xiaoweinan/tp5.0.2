<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
class Test extends Controller
{
    public function txt()
    {
        $goods_title ='Lagogo拉谷谷2018冬新款狐狸毛领宽松白色羽绒服外套女HCYY33XA83 本白色 ';
    	$goods_id = 1;
		$info = Db::name('group')->where('goods_id',$goods_id)->select();
		print_r($info);
    }
    /**
     * 我在测试git远程仓库
     */
    public function hello()
    {
        echo "hello world";
    }
}