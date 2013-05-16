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

/*
<li onmouseover="document.getElementById('regio_name').innerHTML='Limburg'" onmouseout="document.getElementById('regio_name').innerHTML='&nbsp;'" id="prov_2"></li>
<li onmouseover="document.getElementById('regio_name').innerHTML='Oost-Vlaanderen'" onmouseout="document.getElementById('regio_name').innerHTML='&nbsp;'" id="prov_3" class="full"><a href="index.php?page=nieuwbouw&amp;prov=3"></a></li>
<li onmouseover="document.getElementById('regio_name').innerHTML='West-Vlaanderen'" onmouseout="document.getElementById('regio_name').innerHTML='&nbsp;'" id="prov_5" class="full"><a href="index.php?page=nieuwbouw&amp;prov=5"></a></li>
<li onmouseover="document.getElementById('regio_name').innerHTML='Henegouwen'" onmouseout="document.getElementById('regio_name').innerHTML='&nbsp;'" id="prov_7"></li>
<li onmouseover="document.getElementById('regio_name').innerHTML='Namen'" onmouseout="document.getElementById('regio_name').innerHTML='&nbsp;'" id="prov_10"></li>
<li onmouseover="document.getElementById('regio_name').innerHTML='Luxemburg'" onmouseout="document.getElementById('regio_name').innerHTML='&nbsp;'" id="prov_9"></li>
<li onmouseover="document.getElementById('regio_name').innerHTML='Luik'" onmouseout="document.getElementById('regio_name').innerHTML='&nbsp;'" id="prov_8"></li>
<li onmouseover="document.getElementById('regio_name').innerHTML='Vlaams-Brabant'" onmouseout="document.getElementById('regio_name').innerHTML='&nbsp;'" id="prov_4" class="full"><a href="index.php?page=nieuwbouw&amp;prov=4"></a></li>
<li onmouseover="document.getElementById('regio_name').innerHTML='Waals-Brabant'" onmouseout="document.getElementById('regio_name').innerHTML='&nbsp;'" id="prov_6"></li>
<li onmouseover="document.getElementById('regio_name').innerHTML='Antwerpen'" onmouseout="document.getElementById('regio_name').innerHTML='&nbsp;'" id="prov_1"></li>
*/

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
$provincies[7]['name'] = "Henegouwen";
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