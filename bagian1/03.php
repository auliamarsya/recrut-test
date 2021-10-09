<?php
function ubt($input){
    //fungsi generate UBT
    $arr_input = explode(" ", $input);

    //unigram
    $unigram = "";
    foreach($arr_input as $word){
        $unigram .= $word.", ";
    }

    $unigram = substr($unigram, 0, -2);

    //bigram
    $bigram =""; $n = 1;
    foreach($arr_input as $word){
        if ($n % 2 == 0 ) {
            $bigram .= $word.", ";
            $removeElement = -2;
        } else {
            $bigram .= $word." ";
            $removeElement = -1;
        }

        $n++;
    }

    $bigram = substr($bigram, 0, $removeElement);

    //trigram
    $trigram =""; $n = 1;
    foreach($arr_input as $word){
        if ($n % 3 == 0 ) {
            $trigram .= $word.", ";
            $removeElement = -2;
        } else {
            $trigram .= $word." ";
            $removeElement = -1;
        }

        $n++;
    }

    $trigram = substr($trigram, 0, $removeElement);

    return compact('unigram', 'bigram', 'trigram');
}
?>

<form action="" method="post">
Masukkan: <input type="text" name="input">
<button type="submit" name="button">Kirim</button>
</form>

<?php
if (isset($_POST['input'])) {
    $input = ubt(strtolower($_POST['input']));
    echo "Unigram : ".$input['unigram']."<br>";
    echo "Bigram : ".$input['bigram']."<br>";
    echo "Trigram : ".$input['trigram']."<br>";
}    
?>