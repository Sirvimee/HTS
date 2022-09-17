<html>
<body>
<form action="" method="post">
    Scrambled words: <input name="words" type="text" value="" />
          <input name="ok" type="submit" value="Submit" />
    <p><strong>Unscrambled words are:</strong></p>
 <?php

    if(isset($_POST['ok'])) {

        function word_sort($word) {
            $letters = str_split($word);
            sort($letters);
            return $letters;
        }

        $unscrambled = file('wordlist.txt', FILE_IGNORE_NEW_LINES);
        $scrambled = $_POST['words'];
        $scrambled_array = explode(' ', $scrambled);

        $test = 0;
        foreach($scrambled_array as $item) {
            $test++;
            for($i=0;$i<count($unscrambled);$i++) {
                if(word_sort(trim($item)) == word_sort(trim($unscrambled[$i]))) {
                    if($test !=count($scrambled_array)){
                        echo $unscrambled[$i] . ','; //join words with comma
                    }
                    else
                    {
                        echo $unscrambled[$i]; //puts last word without comma
                    }
                }
            }
        }

    }

?>
</form>
</body>
</html>