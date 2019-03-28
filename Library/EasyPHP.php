<?php
/**
 * 核心文件
 * 你相信这是设计师写的封装么？反正我信了..
 */

if(!defined('IS_MyPHP')) exit('拒绝访问！');

class Easycore {


    protected $db_array;
    protected $tag;


    /**
     * 前台碎片标签
     * @param array $db_array 数组传值
     * @param string $tag  键名换成tag
     */

    public function Tag($db_array,$tag){
        //将键名换成tag 二维数组用某个字段的值当做键名
        $db_array = array_column($db_array, NULL, $tag);
        //删除二维数组的键名
        array_walk($db, function(&$t) {
            unset($t['tag']);
        });
        //创建新数组，重排
        $arr=[];
        foreach ($db_array as $k =>$v){
            $arr[$k]= $v['text'];
        }
        return $arr;
    }

}
