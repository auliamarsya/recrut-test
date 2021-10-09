<?php
function countLowerCase($input){
    //fungsi menghitung huruf kecil
    $nlower = 0;

    for($i=0; $i<strlen($input); $i++){
        if ($input[$i] >= 'a' && $input[$i] <= 'z'){
            $nlower++;
        }    
    }

    return $nlower;
}
?>

<form action="" method="post">
Masukkan: <input type="text" name="input">
<button type="submit" name="button">Kirim</button>
</form>

<?php
if (isset($_POST['input'])) {
    $input = $_POST['input'];
    echo '"'.$input.'" mengandung '.countLowerCase($input).' buah huruf kecil.';
}    
?>