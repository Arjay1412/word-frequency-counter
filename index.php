<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Word Frequency Counter</title>
    <link rel="stylesheet" type="text/css" href="styles.css">

</head>
<body>
    <h1>Word Frequency Counter</h1>
    
    <form action="index.php" method="post">
        <label for="text">Paste your text here:</label><br>
        <textarea id="text" name="text" rows="10" cols="50" placeholder="Sample txt here!..." required></textarea><br><br>
        <div class="choices">
            <div>
                <label for="sort">Sort by frequency:</label>
                <select id="sort" name="sort">
                    <option value="asc">Ascending</option>
                    <option value="desc">Descending</option>
                </select><br><br>
            </div>
            <div>
                <label for="limit">Number of Words:</label>
                <input type="number" id="limit" name="limit" value="10" min="1"><br><br>
            </div>
        </div>
        <input type="submit" value="Calculate Word Frequency">
    </form>
    <div class="result_display">
        <?php

            $text_input = $_POST["text"];
            $asc_desc = $_POST["sort"];
            $words_limit = $_POST["limit"];



            function tokenizeTextInput(string $textInput) : array {

                $tokens =[];
                
                /*
                for ($i=0;$i <= strlen($textInput);$i++) {
                    if ($i == strlen($textInput) or in_array($textInput[$i],$spaceLineBreak) > 0) {
    
                        for ($j=count($token)-1; $j > 0 ; $j--) { 
                            $token[$j-1] = $token[$j-1].$token[$j];
                        }
                        $token = explode(" ",$token[0]);
                        array_push($tokens,$token[0]);
                        $token = [];
                    }
                    else {
                        array_push($token, $textInput[$i]);
                        
                    } 
                    }*/
                $cleanedInput = str_replace(["\r\n", "\r", "\n","!",",","?","."], " ", $textInput);
                $tokens = explode(" ", trim($cleanedInput));
                $tokens = array_filter($tokens);    
                return $tokens;

                }

            function frequencyCalc(string $textInput) : array {
                $stopWords = ['a','the','and','or','of','on','this',
                'we','were','is','not'];            //Just common Words
                $tokenFrequency = [];
                $tokens = tokenizeTextInput($textInput);
                
                foreach ($tokens as $key) {
                    if (in_array($key, $stopWords)){
                        continue;
                    } 
                    if (isset($tokenFrequency[$key])) {
                        $tokenFrequency[$key]++;
                    } else {
                        $tokenFrequency[$key]= 1;
                    }
                }

                /*
                for ($i=0;$i < count($tokens);$i++) {
                    if (in_array($tokens[$i],$stopWords) > 0) {
                        continue;

                    } else if (in_array($tokens[$i],$tokenFrequency) == 0) {
                        $tokenFrequency[$tokens[$i]] = 1 ;

                    } else {
                        $tokenFrequency[$tokens[$i]] ++;
                    }

                }*/

                return $tokenFrequency;
                
            }
                
            if ($text_input == null) {
                echo "Enter Text First" ;
            } else {
                $txt = frequencyCalc($text_input);
                foreach ($txt as $key => $value) {
                    echo "$key: $value <br>";
                }
            }
            

        ?>
    </div>

</body>
</html>


