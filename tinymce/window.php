<?php
// look up for the path
require_once( dirname( dirname(__FILE__) ) .'/tinycode-config.php');
// check for rights
if ( !is_user_logged_in() || !current_user_can('edit_posts') ) 
	wp_die(__("You are not allowed to be here"));

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>TinyCode</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/utils/mctabs.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/utils/form_utils.js"></script>
	<script language="javascript" type="text/javascript">
	function init() {
		tinyMCEPopup.resizeToInnerSize();
	}
	
	function insertTinyCodeLink() {
		
		var tagtext;
		
		var notice = document.getElementById('notice_panel');
		var important = document.getElementById('important_panel');
		var quote = document.getElementById('quote_panel');
		var inset = document.getElementById('inset_panel');
		var dropcap = document.getElementById('dropcap_panel');
		
		// who is active ?
		if (notice.className.indexOf('current') != -1) {
			var noticetype = document.getElementById('noticetype').value;
			var noticemessage = document.getElementById('noticemessage').value;

			tagtext = "[notice type=" + noticetype + "]" + noticemessage + "[/notice]";
		}
	
		if (important.className.indexOf('current') != -1) {
			var icolor = document.getElementById('importantcolor').value;
			var ititle = document.getElementById('importanttitle').value;
			var imessage = document.getElementById('importantmessage').value;

			if (icolor != 'none' )
				tagtext = '[important color=' + icolor + ' title="' + ititle + '"]' + imessage + '[/important]';
			else
				tagtext = '[important title="' + ititle + '"]' + imessage + '[/important]';
		}
		
		if (quote.className.indexOf('current') != -1) {
			var qcolor = document.getElementById('quotecolor').value;
			var qmessage = document.getElementById('quotemessage').value;

			if (qcolor != 'none' )
				tagtext = '[blockquote color=' + qcolor + ']' + qmessage + '[/blockquote]';
			else
				tagtext = '[blockquote]' + qmessage + '[/blockquote]';
		}

		if (inset.className.indexOf('current') != -1) {
			var idirection = document.getElementById('insetdirection').value;
			var imessage = document.getElementById('insetmessage').value;

    		tagtext = '[inset lr=' + idirection + ']' + imessage + '[/inset]';
		}

		if (dropcap.className.indexOf('current') != -1) {
			var dccolor = document.getElementById('dropcapcolor').value;
			var dcmessage = document.getElementById('dropcapmessage').value;

			if (qcolor != 'none' )
				tagtext = '[dropcap color=' + dccolor + ']' + dcmessage + '[/dropcap]';
			else
				tagtext = '[dropcap]' + dcmessage + '[/dropcap]';
		}


        if(window.tinyMCE) {
			window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, tagtext);
			//Peforms a clean up of the current editor HTML. 
			//tinyMCEPopup.editor.execCommand('mceCleanup');
			//Repaints the editor. Sometimes the browser has graphic glitches. 
			tinyMCEPopup.editor.execCommand('mceRepaint');
			tinyMCEPopup.close();
		}
		
		return;
	}
	</script>
	<base target="_self" />
</head>
<body id="link" onload="tinyMCEPopup.executeOnLoad('init();');document.body.style.display='';document.getElementById('noticetype').focus();" style="display: none">
<!-- <form onsubmit="insertLink();return false;" action="#"> -->
	<form name="TinyCode" action="#">
	<div class="tabs">
		<ul>
			<li id="notice_tab" class="current"><span><a href="javascript:mcTabs.displayTab('notice_tab','notice_panel');" onmousedown="return false;"><?php _e("Notice", 'TinyCode'); ?></a></span></li>
			<li id="important_tab"><span><a href="javascript:mcTabs.displayTab('important_tab','important_panel');" onmousedown="return false;"><?php _e("Important", 'TinyCode'); ?></a></span></li>
			<li id="quote_tab"><span><a href="javascript:mcTabs.displayTab('quote_tab','quote_panel');" onmousedown="return false;"><?php _e("Quote", 'TinyCode'); ?></a></span></li>
			<li id="inset_tab"><span><a href="javascript:mcTabs.displayTab('inset_tab','inset_panel');" onmousedown="return false;"><?php _e("Inset", 'TinyCode'); ?></a></span></li>
			<li id="dropcap_tab"><span><a href="javascript:mcTabs.displayTab('dropcap_tab','dropcap_panel');" onmousedown="return false;"><?php _e("Dropcap", 'TinyCode'); ?></a></span></li>
		</ul>
	</div>
	
	<div class="panel_wrapper" style="height: 200px;">
		<!-- notice panel -->
		<div id="notice_panel" class="panel current">
		<br />
		<table border="0" cellpadding="4" cellspacing="0">
         <tr>
            <td nowrap="nowrap"><label for="noticetype"><?php _e("Select type of notice", 'TinyCode'); ?></label></td>
            <td><select id="noticetype" name="noticetype" style="width: 190px">
                <option value="notice"><?php _e("notice", 'TinyCode'); ?></option>
                <option value="attention"><?php _e("attention", 'TinyCode'); ?></option>
                <option value="alert"><?php _e("alert", 'TinyCode'); ?></option>
                <option value="approved"><?php _e("approved", 'TinyCode'); ?></option>
                <option value="download"><?php _e("download", 'TinyCode'); ?></option>
                <option value="media"><?php _e("media", 'TinyCode'); ?></option>
                <option value="note"><?php _e("note", 'TinyCode'); ?></option>
                <option value="cart"><?php _e("cart", 'TinyCode'); ?></option>
                <option value="camera"><?php _e("camera", 'TinyCode'); ?></option>
                <option value="doc"><?php _e("doc", 'TinyCode'); ?></option>
            </select></td>
          </tr>
          <tr>
            <td nowrap="nowrap"><?php _e("Message", 'TinyCode'); ?></td>
            <td>
				<textarea id="noticemessage" name="noticemessage" cols="40" rows="5"></textarea>
			</td>
          </tr>
        </table>
		</div>
		<!-- notice panel -->
		
		<!-- important panel -->
		<div id="important_panel" class="panel">
		<br />
		<table border="0" cellpadding="4" cellspacing="0">
         <tr>
            <td nowrap="nowrap"><label for="importantcolor"><?php _e("Select color", 'TinyCode'); ?></label></td>
            <td><select id="importantcolor" name="importantcolor" style="width: 190px">
                <option value="none"><?php _e("none", 'TinyCode'); ?></option>
                <option value="blue"><?php _e("blue", 'TinyCode'); ?></option>
                <option value="red"><?php _e("red", 'TinyCode'); ?></option>
                <option value="green"><?php _e("green", 'TinyCode'); ?></option>
                <option value="purple"><?php _e("purple", 'TinyCode'); ?></option>
                <option value="orange"><?php _e("orange", 'TinyCode'); ?></option>
                <option value="brown"><?php _e("brown", 'TinyCode'); ?></option>
                <option value="grey"><?php _e("grey", 'TinyCode'); ?></option>
            </select></td>
          </tr>
          <tr>
            <td nowrap="nowrap"><?php _e("Titel", 'TinyCode'); ?></td>
            <td>
    			<input type="text" id="importanttitle" name="importanttitle" />
			</td>
          </tr>
          <tr>
            <td nowrap="nowrap"><?php _e("Message", 'TinyCode'); ?></td>
            <td>
				<textarea id="importantmessage" name="importantmessage" cols="40" rows="5"></textarea>
			</td>
          </tr>
        </table>
		</div>
		<!-- important panel -->

		<!-- quote panel -->
		<div id="quote_panel" class="panel">
		<br />
		<table border="0" cellpadding="4" cellspacing="0">
         <tr>
            <td nowrap="nowrap"><label for="quotecolor"><?php _e("Select color", 'TinyCode'); ?></label></td>
            <td><select id="quotecolor" name="quotecolor" style="width: 190px">
                <option value="none"><?php _e("none", 'TinyCode'); ?></option>
                <option value="blue"><?php _e("blue", 'TinyCode'); ?></option>
                <option value="red"><?php _e("red", 'TinyCode'); ?></option>
                <option value="green"><?php _e("green", 'TinyCode'); ?></option>
                <option value="purple"><?php _e("purple", 'TinyCode'); ?></option>
                <option value="orange"><?php _e("orange", 'TinyCode'); ?></option>
            </select></td>
          </tr>
          <tr>
            <td nowrap="nowrap"><?php _e("Message", 'TinyCode'); ?></td>
            <td>
				<textarea id="quotemessage" name="quotemessage" cols="40" rows="5"></textarea>
			</td>
          </tr>
        </table>
		</div>
		<!-- quote panel -->

		<!-- inset panel -->
		<div id="inset_panel" class="panel">
		<br />
		<table border="0" cellpadding="4" cellspacing="0">
         <tr>
            <td nowrap="nowrap"><label for="insetdirection"><?php _e("Select direction", 'TinyCode'); ?></label></td>
            <td><select id="insetdirection" name="insetdirection" style="width: 190px">
                <option value="left"><?php _e("left", 'TinyCode'); ?></option>
                <option value="right"><?php _e("right", 'TinyCode'); ?></option>
            </select></td>
          </tr>
          <tr>
            <td nowrap="nowrap"><?php _e("Message", 'TinyCode'); ?></td>
            <td>
				<textarea id="insetmessage" name="insetmessage" cols="40" rows="5"></textarea>
			</td>
          </tr>
        </table>
		</div>
		<!-- inset panel -->

		<!-- dropcap panel -->
		<div id="dropcap_panel" class="panel">
		<br />
		<table border="0" cellpadding="4" cellspacing="0">
         <tr>
            <td nowrap="nowrap"><label for="dropcapcolor"><?php _e("Select color", 'TinyCode'); ?></label></td>
            <td><select id="dropcapcolor" name="dropcapcolor" style="width: 190px">
                <option value="none"><?php _e("none", 'TinyCode'); ?></option>
                <option value="blue"><?php _e("blue", 'TinyCode'); ?></option>
                <option value="red"><?php _e("red", 'TinyCode'); ?></option>
                <option value="green"><?php _e("green", 'TinyCode'); ?></option>
                <option value="purple"><?php _e("purple", 'TinyCode'); ?></option>
                <option value="orange"><?php _e("orange", 'TinyCode'); ?></option>
                <option value="brown"><?php _e("brown", 'TinyCode'); ?></option>
                <option value="grey"><?php _e("grey", 'TinyCode'); ?></option>
            </select></td>
          </tr>
          <tr>
            <td nowrap="nowrap"><?php _e("Message", 'TinyCode'); ?></td>
            <td>
				<textarea id="dropcapmessage" name="dropcapmessage" cols="40" rows="5"></textarea>
			</td>
          </tr>
        </table>
		</div>
		<!-- dropcap panel -->

    </div>

	<div class="mceActionPanel">
		<div style="float: left">
			<input type="button" id="cancel" name="cancel" value="<?php _e("Cancel", 'TinyCode'); ?>" onclick="tinyMCEPopup.close();" />
		</div>

		<div style="float: right">
			<input type="submit" id="insert" name="insert" value="<?php _e("Insert", 'TinyCode'); ?>" onclick="insertTinyCodeLink();" />
		</div>
	</div>
</form>
</body>
</html>
