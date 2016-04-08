<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Demo</title>
    <style>
        h2{
            display: inline-block;
        }
        iframe, h2{
            width: 33%;
        }
        html,window,body, iframe{
            height: 100%;
        }
    </style>
</head>
<body>
    <h2>vardump();</h2>
    <h2>var_dump();</h2>
    <h2>print_r();</h2>
    <iframe src="vardump.php" frameborder="0"></iframe>
    <iframe src="var_dump.php" frameborder="0"></iframe>
    <iframe src="print_r.php" frameborder="0"></iframe>
</body>
</html>