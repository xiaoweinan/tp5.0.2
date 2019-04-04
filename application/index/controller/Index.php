<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
class Index extends Controller
{
    public function index()
    {
        return $this->view->fetch();
    }
    /**
     * 
     */
    public function test()
    {
    	$goods_title ='Lagogo拉谷谷2018冬新款狐狸毛领宽松白色羽绒服外套女HCYY33XA83 本白色 ';
    	$goods_id = 1;
		$info = Db::name('group')->where('goods_id',$goods_id)->select();
		print_r($info);
		exit;
    	$count = count($info);
    	$newData = $info[$count-1];
    	if($newData==$goods_title){

    	}
    }
    /**
     * 数据分组
     */
    public function group()
    {
    	$arr1 = 
    	[
    		[
    			'goods_title'=>'Lagogo拉谷谷2018冬新款狐狸毛领宽松白色羽绒服外套女HCYY33XA83 本白色',
    			'add_time'=>1553097600
    		],
    		[
    			'goods_title'=>'Lagogo拉谷谷2018冬新款狐狸毛领宽松白色羽绒服外套女HCYY33XA83 白色',
    			'add_time'=>1553356800
    		],
    	];
    	$arr2 = 
    	[
    		[
    			'goods_title'=>'Lagogo拉谷谷2018冬新款狐狸毛领宽松白色羽绒服外套女HCYY33XA83 白色',
    			'add_time'=>1553356800
    		],
    		[
    			'goods_title'=>'Lagogo拉谷谷2018冬新款狐狸毛领宽松白色羽绒服外套女HCYY33XA83 ',
    			'add_time'=>1553616000
    		],
    	];
    	$arr3 = 
    	[
    		[
    			'goods_title'=>'Lagogo拉谷谷2018冬新款狐狸毛领宽松白色羽绒服外套女HCYY33XA83 ',
    			'add_time'=>1553616000
    		],
    		[
    			'goods_title'=>'Lagogo拉谷谷2018冬新款狐狸毛领宽松白色羽绒服外套女HCYY33XA83 本白色 ',
    			'add_time'=>1553788800
    		],
    	];
    }
    /**
     * 
     */
    public function buid()
    {
    	$where=[];
    	$subQuery = Db::name('group')
            ->order('add_time asc')
            ->buildSql();
        $lists = Db::table($subQuery.'e')
                ->where($where)
                ->order('add_time asc')
                ->group('goods_title')->fetchSql(0)
                ->select();

        // dump($lists);
        for($i=0;$i<count($lists)-1;$i++){
        	$arr[$i]['start'] = $lists[$i];
        	$arr[$i]['end'] = $lists[$i+1];
        }
        dump($arr);
    }
    public function tests()
    {
        $lists = Db::table('group')
                ->select();
         $title = $lists[0]['goods_title'];
         $time = $lists[0]['add_time'];
         $arr = [
         	[
         		[
    			'goods_title'=>$lists[0]['goods_title'],
    			'add_time'=>$lists[0]['add_time']
    			]
         	]
         ];
         $n = 0;
         for($i=0;$i<count($lists);$i++){
         	if($title != $lists[$i]['goods_title']){
         		$arr[$n][] = [
         			'gods_title'=>$lists[$i]['goods_title'],
         			'add_time'=>$lists[$i]['add_time']
         			];
         		$n ++;
         		$arr[] = [[
         			'gods_title'=>$lists[$i]['goods_title'],
         			'add_time'=>$lists[$i]['add_time']
         			]];
         		$title = $lists[$i]['goods_title'];
         	}
         }
         dump($arr);
     
    }
}
