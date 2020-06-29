<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GoodsCategory extends Model
{
    protected $table = 'ydf_goods_category';

    protected $guarded = [];

    //获取权限数组
    public function getPrefixTreeData($level=100)
    {
        $pidArr = $this->getPidArr($level);
        $cates = self::whereIn('pid',$pidArr)->orderBy('sort','desc')->orderBy('id','asc')->get()->toArray();
        $formatCates = [];
        foreach($cates as $v){
            $formatCates[] = [
                'id'=>$v['id'],
                'name'=>$v['name'],
                'sort'=>$v['sort'],
                'pid'=>$v['pid'],
            ];
        }
        $data = $this->getTree($formatCates);
        return ['data'=>$this->setPrefix($data),'pids'=>$pidArr];
    }

    /*
     * 获取PID
     * */
    public function getPidArr($limit = 2, $pidArr = [0])
    {
        if ($limit <= 0) {
            return [];
        }
        $childIdArr = self::whereIn('pid', $pidArr)
            ->get()->pluck('id')->toArray();
        if (empty($childIdArr)) {
            return $pidArr;
        }
        return array_merge($pidArr, $this->getPidArr($limit - 1, $childIdArr));
    }

    public function getFormatArrData(){
        $res = [];
        $data = self::orderBy('sort','desc')->orderBy('id','asc')->get()->toArray();
        foreach($data as $v){
            $res[] = [
                'id'=>$v['id'],
                'name'=>$v['name'],
                'sort'=>$v['sort'],
                'pid'=>$v['pid'],
            ];
        }
        return $res;
    }

    public function getChildTree($cates, $pid=0)
    {
        $tree = [];
        foreach($cates as $val){
            if($val['pid'] == $pid){
                $data = $val;
                $data['children'] = $this->getChildTree($cates, $val['id']);
                $tree[] = $data;
            }
        }
        return $tree;
    }

    //获取带level的分类树
    public function getCTree($pid = 0, $target = [])
    {
        # 获取一级分类
        $ts = self::where('pid', $pid)->orderBy('sort','desc')
            ->get()->toArray();
        if (empty($ts)) {
            return $target;
        }
        static $n = 1;
        foreach ($ts as $t) {
            # 第一次遍历
            $t['level']     = $n;
            $target[$t['id']] = $t;

            $n++;
            $target = $this->getCTree($t['id'], $target);
            $n--;
        }
        return $target;
    }

    //排序权限
    public function getTree($cates, $pid=0)
    {
        $tree = [];
        foreach($cates as $val){
            if($val['pid']==$pid){
                $tree[] = $val;
                $tree = array_merge($tree, $this->getTree($cates, $val['id']));
            }
        }
        return $tree;
    }

    //加前缀
    public function setPrefix($data, $p='|----')
    {
        $tree = [];
        $num = 1;
        $prefix = [0 => 1];
        while($val = current($data)) {
            $key = key($data);
            if ($key > 0) {
                if ($data[$key - 1]['pid'] != $val['pid']) {
                    $num ++;
                }
            }
            if (array_key_exists($val['pid'], $prefix)) {
                $num = $prefix[$val['pid']];
            }
            $val['name'] = str_repeat($p, $num).$val['name'];
            $prefix[$val['pid']] = $num;
            $tree[] = $val;
            next($data);
        }
        return $tree;
    }

    //获取id的所有父级
    public function getPids($id, $pids=[])
    {
        $pid = self::find($id, ['pid'])->toArray()['pid'];
//        var_dump($pid) ;exit;
        if ($pid != 0 ){
            $pids[] = $pid;
            $pids = $this->getPids($pid, $pids);
        }
        return $pids;
    }
}
