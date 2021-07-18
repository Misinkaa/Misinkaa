<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pig Latin translator</title>
</head>
<body>
    <h1>Pig Latin Translator</h1>
        <form action="" method="POST">
            <textarea name="prekladac" id="" cols="30" rows="5" placeholder="Enter a word to be translated."></textarea>
            <input type="submit" name="prekladac-submit" value="Translate">
        </form>
    
    <?php
    //tento kod funguje pouze pro prelozeni jednoho slova, neumi prekladat vety
        $vowels = ["a", "A", "e", "E", "i", "I", "o", "O", "u", "U", "y", "Y"];
        $endVowel = "yay";
        $endConsonant = "ay";
        $consonant = "";
        $restOfWord = "";

        if (array_key_exists("prekladac-submit",$_POST)) {
            $word = $_POST["prekladac"];

            if (preg_match("/[\W0-9_]+/", $word)) {
                echo "This word contains an invalid character. Please enter a valid word.";
            }else if (in_array($word[0], $vowels)) {
                echo $word.$endVowel;
            } else {
                for ($index=0; $index<strlen($word); $index++) {
                    if (in_array($word[$index], $vowels)) {
                        break;
                    } else {
                        $consonant = $consonant.$word[$index];
                    }
                }
                for ($index; $index<strlen($word); $index++) {
                    $restOfWord = $restOfWord.$word[$index];   
                }
            echo $restOfWord.$consonant.$endConsonant;
            }      
        }
    ?>

</body>
</html> 