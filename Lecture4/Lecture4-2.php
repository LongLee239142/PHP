<?php	
function isPhone($phone){
        $flag = 0;
        //convert string to character array
        $arrC = str_split($phone);
        if(strlen($phone) !=10){
            echo "Incorrect length";
            return;

        }
        foreach($arrC as $c){
            if(!is_numeric($c)){
                echo "Incorrect Format";
                return;
            }
        }
        return $phone;
    }
    echo isPhone("0937942789");
?>