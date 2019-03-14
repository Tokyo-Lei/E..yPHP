<?php

class Getpost 
{
    
    // 实际过滤函数 可适当修改其中的正则表示式
    static public function filterWords(&$str)
    {
        $farr = array(
            "/<(\\/?)(script|i?frame|style|html|body|title|link|meta|object|\\?|\\%)([^>]*?)>/isU",
            "/(<[^>]*)on[a-zA-Z]+\s*=([^>]*>)/isU",
            "/select\b|insert\b|update\b|delete\b|drop\b|;|\"|\'|\/\*|\*|\.\.\/|\.\/|union|into|load_file|outfile|dump/is"
        );
        $str = preg_replace($farr,'',$str);
        $str = strip_tags($str);
        return $str;
    }
    
    // 调用此函数 过滤参数中的value值

    static function filterParams(&$params, $tmp = array())
    {
        if(is_array($params)){
            foreach($params as $k => &$v){
                if(is_array($v))
                {
                    self::filterParams($v);
                }else{
                    self::filterWords($v);

                }
            }
        }
        else
        {
            $arr[] = self::filterWords($params);
        }
        return $params;
    }

    //调用此函数，过滤参数中的key值

    static  function filterKeys($arr, $subKey, &$myArr)
    {
        foreach($arr as $k=>$v)
        {
            if(is_array($v))
            {
                $filterKey = self::filterWords($k);
                self::filterKeys($v, $filterKey, $myArr);

            }else{
                $filterKey = self::filterWords($k);
                if($subKey != '')
                {
                    $myArr[$subKey][$filterKey] = $v;
                }else{
                    $myArr[$filterKey] = $v;
                }
            }
        }

    }
}


