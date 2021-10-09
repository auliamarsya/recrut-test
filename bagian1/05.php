<?php
function encrypt($input){
    //fungsi enkripsi
    $alphabet = range('A', 'Z'); $encElement = "";

    for($i=1; $i<=strlen($input); $i++){
        if($i%2 == 1){
            $alphabet_to_number = ord($input[$i-1]) - 64;
            $encrypt = $alphabet_to_number + $i-1;
            $encElement .= $alphabet[$encrypt];
        } else {
            $alphabet_to_number = ord($input[$i-1]) - 64;
            $encrypt = $alphabet_to_number - $i-1;
            $encElement .= $alphabet[$encrypt];
        }
    }

    return $encElement;
}

?>

<form action="" method="post">
Masukkan: <input id="input" type="text" name="input" onkeyup="upper()">
<button type="submit" name="button">Enkripsi</button>
</form>

<?php
if (isset($_POST['input'])) {
    $input = $_POST['input'];
    echo encrypt($input);
}    

echo "
<script>
function upper() {
  var x = document.getElementById('input');
  x.value = x.value.toUpperCase();
}
</script>
";
?>
