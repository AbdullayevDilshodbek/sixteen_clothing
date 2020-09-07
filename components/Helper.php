<?php
namespace app\components;

class Helper{
    public function getActivePage($param1,$param2){
        if($param1==$param2)
            return "active";
    }

}
?>