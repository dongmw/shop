<?php

/**权重方法
 * @param $data
 * @return mixed
 */
function countWeight($data){
    $weight=0;
    $temp=array();
    foreach($data as $v){
        $weight+=$v['weight'];
        for($i=0;$i<$v['weight'];$i++){
            $temp[]=$v;//放大数组
        }
    }
    $int=mt_rand(0,$weight-1);//获取一个随机数
    $result=$temp[$int];
    return $result;
}