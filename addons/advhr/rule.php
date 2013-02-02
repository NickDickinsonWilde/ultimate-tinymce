<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>{#advhr.advhr_desc}</title>
    <?php
	
	include ('../jwl_call_wp_load.php');
	/*
	$file = dirname(__FILE__);
	$file = substr($file, 0, stripos($file, "wp-content") );
	require( $file . "/wp-load.php");
	$url = includes_url();
	echo '<script type="text/javascript" src="'.$url.'js/tinymce/tiny_mce_popup.js'.'"></script>';
	echo '<script type="text/javascript" src="'.$url.'js/tinymce/utils/mctabs.js'.'"></script>';
	echo '<script type="text/javascript" src="'.$url.'js/tinymce/utils/form_utils.js'.'"></script>';
	*/
	?>
    <!--
	<script type="text/javascript" src="../../tinymce/tiny_mce_popup.js"></script>
	<script type="text/javascript" src="../../tinymce/mctabs.js"></script>
	<script type="text/javascript" src="../../tinymce/form_utils.js"></script>
    -->
    <script type="text/javascript" src="js/rule.js"></script>
	<link href="css/advhr.css" rel="stylesheet" type="text/css" />
</head>
<body role="application">
<form onsubmit="AdvHRDialog.update();return false;" action="#">
	<div class="tabs">
		<ul>
			<li id="general_tab" class="current" aria-controls="general_panel"><span><a href="javascript:mcTabs.displayTab('general_tab','general_panel');" onmousedown="return false;">{#advhr.advhr_desc}</a></span></li>
		</ul>
	</div>

	<div class="panel_wrapper">
		<div id="general_panel" class="panel current">
			<table role="presentation" border="0" cellpadding="4" cellspacing="0">
					<tr role="group" aria-labelledby="width_label">
						<td><label id="width_label" for="width">{#advhr_dlg.width}</label></td>
						<td class="nowrap">
							<input id="width" name="width" type="text" value="" class="mceFocus" />
							<span style="display:none;" id="width_unit_label">{#advhr_dlg.widthunits}</span>
							<select name="width2" id="width2" aria-labelledby="width_unit_label">
								<option value="">px</option>
								<option value="%">%</option>
							</select>
						</td>
					</tr>
					<tr>
						<td><label for="size">{#advhr_dlg.size}</label></td>
						<td><select id="size" name="size">
							<option value="">{#advhr_dlg.normal}</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
						</select></td>
					</tr>
					<tr>
						<td><label for="noshade">{#advhr_dlg.noshade}</label></td>
						<td><input type="checkbox" name="noshade" id="noshade" class="radio" /></td>
					</tr>
			</table>
		</div>
	</div>

	<div class="mceActionPanel">
		<input type="submit" id="insert" name="insert" value="{#insert}" />
		<input type="button" id="cancel" name="cancel" value="{#cancel}" onclick="tinyMCEPopup.close();" />
	</div>
</form>
</body>
</html>
