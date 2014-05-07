<html>

<body>
<h1>FizzBuzz Challenge</h1>
<p>Immediately when I saw the challenge I knew you had to loop through each number and check whether or not each number was either a multiple of both 3 & 5 or just 3 or 5. The first example shows the solution using the control structures if and for. The second example is a little more complicated as it requires a little more thinking. Recursion is basically a method that calls itself.</p>
    <form action="php-04-fizzbuzz.php" method="post">
        Lower Limit: <input type="text" name="lowerLimit">
        Upper Limit: <input type="text" name="upperLimit">
        <input type="submit" value="Submit" name="submit">
    </form>

    <h2>First Example</h2>
    <?php
        //checks to see if the form has been posted
        if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['submit'])){
            $GLOBALS['upperLimit'] = $_POST['upperLimit'];
            $GLOBALS['lowerLimit'] = $_POST['lowerLimit'];
            for ($i = $lowerLimit; $i <= $upperLimit; $i++) {
                if (($i % 5 == 0) && ($i % 3 == 0)) {
                    echo 'Fizzbuzz';
                } else if ($i % 5 == 0) {
                    echo 'Buzz';
                } else if ($i % 3 == 0) {
                    echo 'Fizz';
                } else
                    echo $i;
                echo ', ';
            }
        }
    ?>

    <h2>Second Example - Recursive Function</h2>
    <?php
        //checks to see if the form has been posted
        if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['submit'])){
            function recursiveFizzBuzz($a, $b) {
                if ($a <= $b) {
                    if (($a % 5 == 0) && ($a % 3 == 0)) {
                        echo 'FizzBuzz';
                    } else if ($a % 5 == 0) {
                        echo 'Buzz';
                    } else if ($a % 3 == 0) {
                        echo 'Fizz';
                    } else {
                        echo $a;
                    }
                    echo ', ';
                    recursiveFizzBuzz(++$a, $b);
                }
                return 0;
            }
        recursiveFizzBuzz($GLOBALS['lowerLimit'], $GLOBALS['upperLimit']);
        }


    /*
     * Sources:
     *  - http://www.php.net/manual/en/control-structures.elseif.php
     *  - http://www.php.net/manual/en/control-structures.for.php
     *  - http://www.php.net/manual/en/language.variables.basics.php
     */
    ?>
</body>
</html>