<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>{#ptags_dlg.titleP}</title>
    <?php
    include ('../../includes/tinymce_addon_scripts.php');
    ?>
    <!--
    <script type="text/javascript" src="../../tinymce/tiny_mce_popup.js"></script>
    -->
    <script type="text/javascript" src="js/dialog.js"></script>
    <link rel="stylesheet" type="text/css" href="css/tagwrap.css" />
</head>

<body>

<div class="y_logo_contener">
</div>
<div class="yinstr">
    <p>{#ptags_dlg.noteP}</p>
</div>
<form onSubmit="ptags.insert();return false;" action="#" method="post" name="P_tag">
<div class="mceActionPanel">
<script type="text/javascript" language="javascript">
var jwl2_sel_content4 = tinyMCE.activeEditor.selection.getContent();
</script>

{#ptags_dlg.jwlid}<br>
<input id="id_value" type="text" name="id" width="200px" value="" /> <em> {#ptags_dlg.noteP2}</em><br><br>
{#ptags_dlg.jwlclass}<br>
<input id="classes_value" type="text" name="class" width="200px" value="" /> <em> {#ptags_dlg.noteP2}</em><br><br>
{#ptags_dlg.jwlstyle}<br>
<input id="styles_value" type="text" name="style" width="200px" value="" /> <em> {#ptags_dlg.noteP2}</em>
<br /><br />
</div>
<div class="bottom">
    <p><!--{#tagwrap_dlg.bottomnote}--></p>
    <p class="pagelink_hover"><!--{#tagwrap_dlg.bottomnote2}--></p>
</div>
<script type="text/javascript" language="javascript">
function jwl2_pass_form_data () {
  var name = jwl_id = document.getElementsByName("id")[0].value;
  var name = jwl_class = document.getElementsByName("class")[0].value;
  var name = jwl_style = document.getElementsByName("style")[0].value;

}

</script>
<div class="mceActionPanel">
  <div style="float:left;padding-top:5px">
  <input type="button" id="insert" name="insert" value="{#insert}" onClick="jwl2_pass_form_data();tinyMCE.execCommand('mceInsertContent',false,'<p id=\'' + jwl_id + '\' class=\'none ' + jwl_class + '\' style=\'' + jwl_style + '\'>' + jwl2_sel_content4 + '</p>');tinyMCEPopup.close();" />&nbsp;<input type="button" id="cancel" name="cancel" value="{#cancel}" onClick="tinyMCEPopup.close();" />
  </div>
</div>
</form>
</body>