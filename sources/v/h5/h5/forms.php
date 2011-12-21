<?php
/**
 * @var $nb
 * @var $width
 * @var $gutter
 * @var $input_padding
 * @var $textarea_padding
 * @var $page_width
 */
?>
/* forms.css */
input[type="radio"], input[type="checkbox"] {
  margin: 0; zmargin: 0 .3em;
  vertical-align:baseline; position: relative; top: .1em;
}

select{padding: 0; margin: 0;}
label {font-weight:bold;}
fieldset {padding:0 <?php echo 2*$gutter-1 ?>px <?php echo 2*$gutter-1 ?>px <?php echo 2*$gutter-1 ?>px;margin:0 0 1.5em 0;border:1px solid #ccc;}
legend {font-weight:bold;font-size:1.2em;margin-top:-0.2em;margin-bottom:1em;}
fieldset, #IE8#HACK {padding-top:1.4em;}
legend, #IE8#HACK {margin-top:0;margin-bottom:0;}
/*input[type=checkbox], input[type=radio] {position:relative;top:.15em;}*/
input[type=text], input[type=password] { font-size: 1em;}
input[type=text], input[type=password], input.text, input.title, textarea, select {background-color:#fff;border:1px solid #bbb;color:#000;}
input[type=text]:focus, input[type=password]:focus, input.text:focus, input.title:focus, textarea:focus {border-color:#666;}
select {background-color:#fff;border-width:1px;border-style:solid;}
input[type=text], input[type=password], textarea, select {margin-top:0.5em; margin-bottom:0.5em; padding: 0px <?php echo $input_padding ?>px;}
select {padding: 0px;}
input.text, input.title {width:300px;padding:5px <?php echo $input_padding ?>px;}
input.title, input.title {font-size:1.5em;}
textarea {width:390px;height:250px;padding:<?php echo $textarea_padding ?>px;}
.inline {line-height:2;}
.inline p {margin-bottom:0;}
.inline label {font-weight: normal !important}

.error, .alert, .notice, .success, .info {padding:0.8em;margin-bottom:1em;border:2px solid #ddd;}
.error, .alert {background:#fbe3e4;color:#8a1f11;border-color:#fbc2c4;}
.notice {background:#fff6bf;color:#514721;border-color:#ffd324;}
.success {background:#e6efc2;color:#264409;border-color:#c6d880;}
.info {background:#d5edf8;color:#205791;border-color:#92cae4;}

.error a, .alert a {color:#8a1f11;}
.notice a {color:#514721;}
.success a {color:#264409;}
.info a {color:#205791;}

label.column {margin-top: 0.5em; margin-bottom: 0.5em;}
label.text.column  {margin-top: 1em; margin-bottom: 1em;}
label.title.column {margin-top: 1.5em; margin-bottom: 1.5em;}

