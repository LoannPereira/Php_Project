<html>
<body>
<?php
 
include ('XmlParserExample1.php');
require_once(__DIR__.'/../config/config.php');
require_once(__DIR__.'/../config/Autoloader.php');
Autoload::charger();

require_once(__DIR__ . '/parser.php');

$fgw = new FluxGateway();
$tabFlux = $fgw->findAll();
var_dump($tabFlux);
$ngw = new NewsGateway();
$tabNews = array();

foreach ($tabFlux as $flux) {
    $parser =  new Parser(dirname(__FILE__).'/rss.xml');
    $parser->parse();
    $tabNews = $parser->getTabRetour();
    var_dump($tabNews);
    foreach ($tabNews as $news) {
        try {


            $ngw->insert(DateTime::createFromFormat($news->getDate()),$news->getTitre(),$news->getDescription(),$news->getLien(),$news->getCategorie(),$flux->getUrl(),$news->getGuid());
        } catch (Exception $e){
            echo ($e->getMessage().'</br>');
        }
    }
}
/*
$parser = new XmlParserExample1(dirname(__FILE__).'/rss.xml');
$parser ->parse();
$result = $parser ->getResult();
echo $result;
 */
?>
</body>
</html>
