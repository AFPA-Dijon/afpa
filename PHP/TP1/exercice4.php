

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fibonacci</title>
</head>
<body>
    <?php
    function fibonacci ($n){
        if($n < 2){
            return $n;
        }
        $f1 = 1;
        $f2 = 0;
        for ($i = 2; $i <= $n ; $i++) {
             $f = $f1 + $f2;
             $f2 = $f1;
             $f1 = $f;
        }
        return $f1;//ou $f
    }
    for ($i = 0; $i < 50; $i++) {
         echo "$i: ".fibonacci($i)."<br />\n";
    }
    
    ?>
</body>
</html>