<?php ob_start(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>{#table_dlg.title}</title>
    <?php
	include ('../jwl_call_wp_load.php');
	?>
    <!--
	<script type="text/javascript" src="../../tinymce/tiny_mce_popup.js"></script>
	<script type="text/javascript" src="../../tinymce/mctabs.js"></script>
	<script type="text/javascript" src="../../tinymce/form_utils.js"></script>
	<script type="text/javascript" src="../../tinymce/validate.js"></script>
	<script type="text/javascript" src="../../tinymce/editable_selects.js"></script>
    -->
	<script type="text/javascript" src="js/table.js"></script>
	<link href="css/table.css" rel="stylesheet" type="text/css" />
</head>
<body id="table" style="display: none" role="application" aria-labelledby="app_title">
	<span style="display:none;" id="app_title">{#table_dlg.title}</span>
	<form onsubmit="insertTable();return false;" action="#">
		<div class="tabs">
			<ul>
				<li id="general_tab" aria-controls="general_panel" class="current"><span><a href="javascript:mcTabs.displayTab('general_tab','general_panel');" onmousedown="return false;">{#table_dlg.general_tab}</a></span></li>
				<li id="advanced_tab" aria-controls="advanced_panel"><span><a href="javascript:mcTabs.displayTab('advanced_tab','advanced_panel');" onmousedown="return false;">{#table_dlg.advanced_tab}</a></span></li>
			</ul>
		</div>

		<div class="panel_wrapper">
			<div id="general_panel" class="panel current">
				<fieldset>
					<legend>{#table_dlg.general_props}</legend>
					<table role="presentation" border="0" cellpadding="4" cellspacing="0" width="100%">
						<tr>
							<td><label id="colslabel" for="cols">{#table_dlg.cols}</label></td>
							<td><input id="cols" name="cols" type="text" value="" size="3" maxlength="3" class="required number min1 mceFocus" aria-required="true" /></td>
							<td><label id="rowslabel" for="rows">{#table_dlg.rows}</label></td>
							<td><input id="rows" name="rows" type="text" value="" size="3" maxlength="3" class="required number min1" aria-required="true" /></td>
						</tr>
						<tr>
							<td><label id="cellpaddinglabel" for="cellpadding">{#table_dlg.cellpadding}</label></td>
							<td><input id="cellpadding" name="cellpadding" type="text" value="" size="3" maxlength="3" class="number" /></td>
							<td><label id="cellspacinglabel" for="cellspacing">{#table_dlg.cellspacing}</label></td>
							<td><input id="cellspacing" name="cellspacing" type="text" value="" size="3" maxlength="3" class="number" /></td>
						</tr>
						<tr>
							<td><label id="alignlabel" for="align">{#table_dlg.align}</label></td>
							<td><select id="align" name="align">
								<option value="">{#not_set}</option>
								<option value="center">{#table_dlg.align_middle}</option>
								<option value="left">{#table_dlg.align_left}</option>
								<option value="right">{#table_dlg.align_right}</option>
							</select></td>
							<td><label id="borderlabel" for="border">{#table_dlg.border}</label></td>
							<td><input id="border" name="border" type="text" value="" size="3" maxlength="5" onchange="changedBorder();" class="size" /></td>
						</tr>
						<tr id="width_row">
							<td><label id="widthlabel" for="width">{#table_dlg.width}</label></td>
							<td><input name="width" type="text" id="width" value="" size="7" maxlength="7" onchange="changedSize();" class="size" /></td>
							<td><label id="heightlabel" for="height">{#table_dlg.height}</label></td>
							<td><input name="height" type="text" id="height" value="" size="7" maxlength="7" onchange="changedSize();" class="size" /></td>
						</tr>
						<tr id="styleSelectRow" >
							<td><label id="classlabel" for="class">{#class_name}</label></td>
							<td colspan="3" >
							 <select id="class" name="class" class="mceEditableSelect">
								<option value="" selected="selected">{#not_set}</option>
							 </select></td>
						</tr>
						<tr>
							<td class="column1" ><label for="caption">{#table_dlg.caption}</label></td> 
							<td><input id="caption" name="caption" type="checkbox" class="checkbox" value="true" /></td> 
						</tr>
					</table>
				</fieldset>
			</div>

			<div id="advanced_panel" class="panel">
				<fieldset>
					<legend>{#table_dlg.advanced_props}</legend>

					<table role="presentation" border="0" cellpadding="0" cellspacing="4">
						<tr>
							<td class="column1"><label for="id">{#table_dlg.id}</label></td> 
							<td><input id="id" name="id" type="text" value="" class="advfield" /></td> 
						</tr>

						<tr>
							<td class="column1"><label for="summary">{#table_dlg.summary}</label></td> 
							<td><input id="summary" name="summary" type="text" value="" class="advfield" /></td> 
						</tr>

						<tr>
							<td><label for="style">{#table_dlg.style}</label></td>
							<td><input type="text" id="style" name="style" value="" class="advfield" onchange="changedStyle();" /></td>
						</tr>

						<tr>
							<td class="column1"><label id="langlabel" for="lang">{#table_dlg.langcode}</label></td> 
							<td>
								<input id="lang" name="lang" type="text" value="" class="advfield" />
							</td> 
						</tr>

						<tr>
							<td class="column1"><label for="backgroundimage">{#table_dlg.bgimage}</label></td> 
							<td>
								<table role="presentation" aria-labelledby="backgroundimage_label" border="0" cellpadding="0" cellspacing="0">
									<tr>
										<td><input id="backgroundimage" name="backgroundimage" type="text" value="" class="advfield" onchange="changedBackgroundImage();" /></td>
										<td id="backgroundimagebrowsercontainer">&nbsp;</td>
									</tr>
								</table>
							</td> 
						</tr>

						<tr>
							<td class="column1"><label for="tframe">{#table_dlg.frame}</label></td> 
							<td>
								<select id="tframe" name="tframe" class="advfield"> 
										<option value="">{#not_set}</option>
										<option value="void">{#table_dlg.rules_void}</option>
										<option value="above">{#table_dlg.rules_above}</option> 
										<option value="below">{#table_dlg.rules_below}</option> 
										<option value="hsides">{#table_dlg.rules_hsides}</option> 
										<option value="lhs">{#table_dlg.rules_lhs}</option> 
										<option value="rhs">{#table_dlg.rules_rhs}</option> 
										<option value="vsides">{#table_dlg.rules_vsides}</option> 
										<option value="box">{#table_dlg.rules_box}</option> 
										<option value="border">{#table_dlg.rules_border}</option> 
								</select>
							</td> 
						</tr>

						<tr>
							<td class="column1"><label for="rules">{#table_dlg.rules}</label></td> 
							<td>
								<select id="rules" name="rules" class="advfield"> 
										<option value="">{#not_set}</option> 
										<option value="none">{#table_dlg.frame_none}</option>
										<option value="groups">{#table_dlg.frame_groups}</option>
										<option value="rows">{#table_dlg.frame_rows}</option>
										<option value="cols">{#table_dlg.frame_cols}</option>
										<option value="all">{#table_dlg.frame_all}</option>
									</select>
							</td> 
						</tr>

						<tr>
							<td class="column1"><label for="dir">{#table_dlg.langdir}</label></td> 
							<td>
								<select id="dir" name="dir" class="advfield"> 
										<option value="">{#not_set}</option> 
										<option value="ltr">{#table_dlg.ltr}</option> 
										<option value="rtl">{#table_dlg.rtl}</option> 
								</select>
							</td> 
						</tr>

						<tr role="group" aria-labelledby="bordercolor_label">
							<td class="column1"><label id="bordercolor_label" for="bordercolor">{#table_dlg.bordercolor}</label></td> 
							<td>
								<table role="presentation" border="0" cellpadding="0" cellspacing="0">
									<tr>
										<td><input id="bordercolor" name="bordercolor" type="text" value="" size="9" onchange="updateColor('bordercolor_pick','bordercolor');changedColor();" /></td>
										<td id="bordercolor_pickcontainer">&nbsp;</td>
									</tr>
								</table>
							</td> 
						</tr>

						<tr role="group" aria-labelledby="bgcolor_label">
							<td class="column1"><label id="bgcolor_label" for="bgcolor">{#table_dlg.bgcolor}</label></td> 
							<td>
								<table role="presentation" border="0" cellpadding="0" cellspacing="0">
									<tr>
										<td><input id="bgcolor" name="bgcolor" type="text" value="" size="9" onchange="updateColor('bgcolor_pick','bgcolor');changedColor();" /></td>
										<td id="bgcolor_pickcontainer">&nbsp;</td>
									</tr>
								</table>
							</td> 
						</tr>
					</table>
				</fieldset>
			</div>
		</div>

		<div class="mceActionPanel">
			<input type="submit" id="insert" name="insert" value="{#insert}" />
			<input type="button" id="cancel" name="cancel" value="{#cancel}" onclick="tinyMCEPopup.close();" />
		</div>
	</form>
</body>
</html>
