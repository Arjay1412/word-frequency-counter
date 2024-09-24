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

            function tokenizeTextInput($text_input) : array {
                $token = [];
                $tokens =[];

                for ($i=0;$i <= strlen($text_input);$i++) {
                    if ($i == strlen($text_input) or $text_input[$i] == " ") {
    
                        for ($j=count($token)-1; $j != 0 ; $j--) { 
                            $token[$j-1] = $token[$j-1].$token[$j];
                        }
                        array_push($tokens,$token[0]);
                        $token = [];
                    }
                    else {
                        array_push($token, $text_input[$i]);
                        
                    } 
                    }
                return $tokens;
                }
            
            

        ?>
    </div>

</body>
</html>


