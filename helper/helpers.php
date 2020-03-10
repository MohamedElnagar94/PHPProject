<?php


namespace helper;

class helpers
{
    public static function getOriginUrl(){
        $splite = explode("/",$_SERVER['REQUEST_URI']);
        $path = ("/".$splite[1]."/".$splite[2]."/");
        return $path;
    }
    public static function checkUrlActive($page){
        foreach ($page as $one_page){
            if($_SERVER['REQUEST_URI'] === helpers::getOriginUrl().$one_page){
                echo "active open";
            }else{
                echo "";
            }
        };

//        if($_SERVER['REQUEST_URI'] === helpers::getOriginUrl().$page){
//            return helpers::getOriginUrl().$page;
//        }else{
//            return "";
//        }
    }
}


