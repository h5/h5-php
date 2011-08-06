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
/* grid.css */
.container {width:<?php echo $page_width ?>px;margin:0 auto;}
.showgrid {background:url(assets/i/grid.png);}
.q {margin-left: <?php echo $gutter ?>px }
.s {margin-right: <?php echo $gutter ?>px}
.q0 {padding-left: <?php echo $gutter ?>px}
.e0 {padding-right: <?php echo $gutter ?>px}


.column<?php for($i=1; $i<=$nb; $i++) echo ', .w'.$i ?> {float:left;}

<?php
for($i=1; $i<=$nb; $i++) {
  $w = $i*$width;
  echo
    '.w',        $i,'{width:',        $w-$gutter,'px}' ,
    '.q',        $i,'{padding-left:', $w.'px}' ,
    '.e',        $i,'{padding-right:',$w.'px}' ,
    '.a',        $i,'{margin-left:', -$w.'px}' ,
    '.d',        $i,'{margin-left:',  $w.'px}',
    'input.w',   $i,'{width:',        $w-$gutter-2*($input_padding+1),'px}' ,
    'textarea.w',$i,'{width:',        $w-$gutter-2*($textarea_padding+1),'px}',
    "\n"
  ;
}
?>

.a1,.d1<?php for($i=2; $i<=$nb; $i++) echo ',.a'.$i.',.d'.$i ?>{position:relative;}
  
.border {padding-right:<?php echo floor(($gutter-1)/2) ?>px;margin-right:<?php echo $gutter-floor(($gutter-1)/2)-1 ?>px;border-right:1px solid #eee;}
.colborder {padding-right:<?php echo floor(($width*2-1)/2) ?>px;margin-right:<?php echo $width*2-floor(($width*2-1)/2)-1 ?>px;border-right:1px solid #eee;}

.prepend-top {margin-top:1.5em;}
.append-bottom {margin-bottom:1.5em;}

