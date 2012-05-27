<?php require_once( dirname( __FILE__ ) .'/../../../../wp-load.php'); ?>
<style type="text/css">

#ultimate-tinymce {
	background: #a9e8f5; /* Old browsers */
	background: -moz-linear-gradient(top,  #B2F7DB 0%, #a9e8f5 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#B2F7DB), color-stop(100%,#a9e8f5)); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(top,  #B2F7DB 0%,#a9e8f5 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(top,  #B2F7DB 0%,#a9e8f5 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(top,  #B2F7DB 0%,#a9e8f5 100%); /* IE10+ */
	background: linear-gradient(top,  #B2F7DB 0%,#a9e8f5 100%); /* W3C */
}
#ultimate-tinymce .plugin-version-author-uri {
    background-color: #F4D8A4;
    border-radius: 5px 5px 5px 5px;
    box-shadow: 0 8px 6px -6px black;
    color: #111111;
    font-weight: bold;
    margin-bottom: 10px;
    min-height: 16px;
    padding: 5px;
}
.jwl_support{	
	background-image: url('<?php echo plugins_url("images/support.png",__FILE__) ?>');
	height:16px;
	background-repeat: no-repeat;
	background-position: left center;
	padding-left: 15px;	
}
.jwl_fbook{
	background-image: url('<?php echo plugins_url("images/facebook.png",__FILE__) ?>');
	height:16px;
	background-repeat: no-repeat;
	background-position: left center;
	padding-left: 15px;
	text-decoration: none;
}
.jwl_twitt{
	background-image: url('<?php echo plugins_url("images/twitter.png",__FILE__) ?>');
	height:16px;
	background-repeat: no-repeat;
	background-position: left center;
	padding-left: 15px;
	text-decoration: none;
	margin-left:3px;
}
#ultimate-tinymce .plugin-version-author-uri a,
#ultimate-tinymce .plugin-version-author-uri a:link,
#ultimate-tinymce .plugin-version-author-uri a:hover,
#ultimate-tinymce .plugin-version-author-uri a:active,
#ultimate-tinymce .plugin-version-author-uri a:visited{
	color: #111111;
	text-decoration: none;
}
#ultimate-tinymce .plugin-version-author-uri a:hover{
	color:#14AD47;
}
#ultimate-tinymce .plugin-title{
background-image: url('<?php echo plugins_url("images/jwl_logo.png",__FILE__) ?>');
background-repeat: no-repeat;
background-position: left  bottom;
height: 80px;
}
</style>