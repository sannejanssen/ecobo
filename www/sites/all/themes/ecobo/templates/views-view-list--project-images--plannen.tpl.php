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
$empty = FALSE;
if( $rows[0] == '' )
{
	$empty = TRUE;
}

?>

<?php if(!$empty):?>
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery("#slider3").easySlider({
			controlsBefore: '<p id="controls3">',
			controlsAfter: '</p>',
			prevId: 'prevBtn3',
			nextId: 'nextBtn3',
			sliderId: 3
		});
	});	
</script>
<?php print $wrapper_prefix; ?>
  <?php if (!empty($title)) : ?>
    <h3><?php print $title; ?></h3>
  <?php endif; ?>
  <div id="slider3">
  <?php print $list_type_prefix; // UL or OL ?>
    <?php $count = 0; ?>
    <?php foreach ($rows as $id => $row): ?>
      <?php $count++; ?>
      <li class="<?php print $classes_array[$id]; ?>"><?php print $row; ?></li>
    <?php endforeach; ?>
    <input type="hidden" value="<?php print $count; ?>" id="count3" />
  <?php print $list_type_suffix; ?>
  </div>
  <div class="footer">
	<p id="bijschrift_3"></p>	
	<p class="paginanummer"><span id="pagina_3"></span></p>
  </div>
<?php print $wrapper_suffix; ?>
<?php endif;?>

<?php if($empty):?>
<p id="no-records">Geen afbeeldingen</p>
<?php endif;?>