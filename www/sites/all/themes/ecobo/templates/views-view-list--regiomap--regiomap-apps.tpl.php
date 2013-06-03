<?php
/**
 * @file views-view-list.tpl.php
 * Default simple view template to display a list of rows.
 *
 * - $title : The title of this group of rows.  May be empty.
 * - $options['type'] will either be ul or ol.
 * @ingroup views_templates
 */
?>
<?php

/*
PROVINCIES:

Antwerpen: 1
Limburg: 2
Oost-Vlaanderen: 3
Vlaams-Brabant: 4
West-Vlaanderen: 5
Waals-Brabant: 6
Henegouwen: 7
Luik: 8
Luxemburg: 9
Namen: 10
*/
$provincies = array();

$provincies[1]['val'] = 0;
$provincies[1]['name'] = "Oost-Vlaanderen";
$provincies[2]['val'] = 0;
$provincies[2]['name'] = "West-Vlaanderen";
$provincies[3]['val'] = 0;
$provincies[3]['name'] = "Antwerpen";
$provincies[4]['val'] = 0;
$provincies[4]['name'] = "Limburg";
$provincies[5]['val'] = 0;
$provincies[5]['name'] = "Vlaams-Brabant";
$provincies[6]['val'] = 0;
$provincies[6]['name'] = "Waals-Brabant";
$provincies[7]['val'] = 0;
$provincies[7]['name'] = t("Henegouwen");
$provincies[8]['val'] = 0;
$provincies[8]['name'] = "Luik";
$provincies[9]['val'] = 0;
$provincies[9]['name'] = "Namen";
$provincies[10]['val'] = 0;
$provincies[10]['name'] = "Luxemburg";


foreach ( $rows as $row )
{
  
  $provincies[trim($row)]['val'] = 1;
}

$output_html = "";
foreach( $provincies as $p_id=>$prov )
{
  
  $provincie_id = $p_id;
  $provincie_name = $prov['name'];
  
  if( $prov['val'] == 0)
  {

    $output_html .= <<<HTML
  		<li onmouseover="document.getElementById('regio_name').innerHTML='$provincie_name'" onmouseout="document.getElementById('regio_name').innerHTML='&nbsp;'" id="prov_$provincie_id"></li>
HTML
;  
  }
  else
  {
    $output_html .= <<<HTML
    	<li onmouseover="document.getElementById('regio_name').innerHTML='$provincie_name'" onmouseout="document.getElementById('regio_name').innerHTML='&nbsp;'" id="prov_$provincie_id" class="full"><a href="?q=appartementen/$provincie_id"></a></li>
HTML
;
  }
}

  
?>





<div id="regiobox">
	<ul>
		<?php print $output_html;?>				
	</ul>

</div>
<p id="regio_name">&nbsp;</p>