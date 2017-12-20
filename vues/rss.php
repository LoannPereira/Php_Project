<html>
<head>
    <title>Top10News</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/acceuilCss.css" rel="stylesheet">
</head>
<body>
<header>
    <h1 id="titre">RSS</h1>
</header>
<?php

include ('../parser/XmlParserExample1.php');

$parser = new XmlParserExample1('http://www.bfmtv.com/rss/info/flux-rss/flux-toutes-les-actualites/');
$parser ->parse();
$result = $parser ->getResult();
echo $result;

?>
</body>
</html>