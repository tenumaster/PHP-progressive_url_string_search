<?php
$flag = 0;
for ($i=4000; $i < 4500; $i++) { //The range where i think it could be.
	$search = 'EM000000000108' . $i; //The incremental part of the url
	$route = 'https://eaglemoss.shipment.co/api/package-details/eaglemoss/' . $search; //The URL where i search
	$homepage = file_get_contents($route);
	$doc = new DOMDocument;
	$doc->loadHTML($homepage);
	$html = $doc->textContent;
	$pattern='12345678'; //The text you are looking in the api;
	$pos = strpos($html, $pattern);
	if ($pos !== false) {
	    echo "The chain '$pattern' was found in the route:  '$route' <br>" .
	    	"<a href='https://eaglemoss.shipment.co/track/$search'>click here</a>";
	    	$flag = 1;
	    break;

	}
}
echo $flag == 0 ? 'Not found, sorry :C' : '';