<html>

<body>
<h1>Lambda Challenge</h1>
<p>Challenge Description: Create a lambda to recursively remove empty elements from the array $raw.</p>
<p>A lambda is simply a anonymous function which is function with no name.</p>
<?php
    $raw = array(
        'firstname' => 'Joe',
        'lastname' => 'Bloggs',
        'nickname' => '',
        'birthdate' => array(
            'day' => '',
            'month' => '',
            'year' => '1990',
        ),
        'likes' => array(
            'cars' => array(
               'Subaru Impreza WRX STi',
                'Mitsubishi Evo', 'Nissan GTR'
            ),
            'bikes' => array(),
        ),
);

    $lambda = function($raw) use (&$lambda) {
        foreach($raw as $key => &$value) {
            if(is_array($value)) {
                $lambda($value);
            } else {
                if($value == '') {
                    unset($key);
                } else {
                    echo "Key = ".$key.", Value = ".$value;
                    echo "<br>";
                }
            }
        }
    };
    $raw = $lambda($raw);

/*
 * Sources:
 * http://stackoverflow.com/questions/220658/what-is-the-difference-between-a-closure-and-a-lambda/220728#220728
 * http://www.php.net/manual/en/functions.anonymous.php
 *
 */
?>
</body>
</html>