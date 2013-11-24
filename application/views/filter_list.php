<!DOCTYPE HTML>
<!--
/**
 * Filter List View
 * View for filtering list.
 * @File name: filter_list.php
 * @Version: 1.0 (September 29, 2013)
 * @copyright Copyright (C) Ardel John Biscaro
 * @link http://ajbiscaro.net84.net
 **/
-->

<html lang="en-US">
<head>
	<title>Filter Dropdown</title>
	<meta charset="UTF-8">
	<script src=<?php echo base_url()."application/scripts/jquery.js" ?> type="text/javascript"></script>
	<script type="text/javascript">
	$(document).ready(function(){       
		$('#country').change(function()
		{ 
		$("select[id$=city] > option").remove(); //removes city list items
			var country_id = $('#country').val();
				if ( country_id == 0 ){
					$('#city').append('<option value=0 >No Country Selected</option>'); //appends no country selected item
				}else{
					$.ajax(
					{
						type: "POST",
						url: "<?php echo base_url() ?>index.php/filter/get_city/"+country_id, //url for controller and its function
						success: function(city)
						{
							$.each(city,function(city_id,name)
								{
									$('#city > option[value=0]').remove(); //removes no country selected item								
									$('#city').append('<option value="'+ city_id +'" >'+name+'</option>'); //appends filtered city 
								});
						}
					});
				}
		});
	});
	</script>
</head>

<body>
	<div>
	<?php $attributes = array('id' => 'form'); ?>
	<?php echo form_open('filter/index',$attributes); ?>	
		<table width="100%">
			<tbody>
				<tr>
					<td>
						<?php	echo form_label('Country:', 'country');?>
						<?php	echo form_dropdown('country', $country_list, set_value('country', ''), 'id="country"');?>
					</td>
				</tr>
				<tr>
					<td>
						<?php	echo form_label('City:', 'city');?>
						<?php	echo form_dropdown('city', $city_list, set_value('city', ''), 'id="city"');?>
					</td>
				</tr>
			</tbody>
		</table>	
	<?php echo form_close(); ?>		
	</div>

</body>
</html>
