<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/7 0007
 * Time: 下午 3:50
 */


function readFileFromDir($dir) {
    if (!is_dir($dir)) {
        return false;
    }

    //打开目录
    $handle = opendir($dir);
    while (($file = readdir($handle)) !== false) {
        //排除掉当前目录和上一个目录
        if ($file == "." || $file == "..") {
            continue;
        }

        $file = $dir . DIRECTORY_SEPARATOR . $file;

        //如果是文件就打印出来，否则递归调用
        if (is_file($file)) {
          //  print_r($dir);
            $arr=explode("\\", $file);
            //print_r($arr);exit;
            $str = $arr[count($arr)-2];     //截取8796551850048_de_AT
           //print_r($str);exit;
            $country = substr($str,-6);   //从右边第五位截取
            //print_r($country);exit;
            $str1 =$arr[count($arr)-1];     //取ArticleDetail.xml
            $data = explode('.',$str1);
            $res = $data[0];                //取ArticleDetail
            $str2="InspirationArticle";
            if(!empty($res) && $res == "ArticleDetail"){
                echo 1111;
                copy($file, 'E:\\phpstudy\\WWW\\untitled\\new\\'.$res.'_'.$str.'.xml');
            }else{
                echo 222;
                copy($file,'E:\\phpstudy\\WWW\\untitled\\new\\'.$str2.$country.'.xml');
            }
            //print $dir . '<br />';
        } elseif (is_dir($file)) {

            readFileFromDir($file);
        }
    }
}
$dir = "E:\phpstudy\WWW\untitled\old";
readFileFromDir($dir);


 ?>