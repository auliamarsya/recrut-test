<?php 
function search_key($array, $value){
    $temp1 = 0; $temp2 = 0; $flag = "false"; $n = strlen($value);

    for($i = 0; $i < $n; $i++){
        foreach($array as $key1 => $arr){
            $key2 = array_search($value[$i], $arr);
    
            if($key2 === false){
                continue;
            } else {               
                if($i == 0){
                    $flag = "true";
                } else if(abs($temp1-$key1) == 1 && abs($temp2-$key2) == 1){
                    //diagonally
                    $flag = "false";
                    break;
                } else if($temp1 == $key1 && $temp2 == $key2){
                    //same element
                    $flag = "false";
                    break;
                } else if(($key1 == $temp1 && abs($key2-$temp2) == 1) || ($key2 == $temp2 && abs($key1-$temp1) == 1)){
                    $flag == "true";
                } else {
                    $flag = "false";
                }

                //previous node
                $temp1 = $key1;
                $temp2 = $key2;
            }
        }

        if($flag == "false"){
            break;
        }
    }

    return $flag;
}

$arr = [
    ['f','g','h','i'],
    ['j','k','p','q'],
    ['r','s','t','u']
];

?>

<form action="" method="post">
Cari Kata: <input type="text" name="input">
<button type="submit" name="button">Kirim</button>
</form>

<?php
if (isset($_POST['input'])) {
    $input = $_POST['input'];
    echo search_key($arr, $input);
}    
?>