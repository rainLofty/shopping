<?php
/**
 * @desc: 返回给前端的数据
 * @param $status 0|1  0表示失败  1表示成功 
 * @param $message 提示信息
 * @param $result  成功的时候的返回的数据
 * @return:将数据以json字符串的格式返回给前端  
 */
function returnWeb($status,$message,$result=null){
    $reData = [
        'status' => $status,
        'message' =>$message,
        'result'=>$result
    ];
    
    $json = json_encode($reData);
    echo $json;
}


?>