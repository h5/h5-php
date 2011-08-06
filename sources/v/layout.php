<div class="wrap">
  <div class="container<?php isset($_GET['showgrid']) and print ' showgrid'?>">
    <?php echo $_content ?>
    
  </div>
</div>
<div class="footer container">
  <hr>
  <p class="w32 s"><?php echo view('html/version') ?></p>
  <p class="w16"><a href="<?php echo isset($_SERVER['REDIRECT_URL']) ? $_SERVER['REDIRECT_URL'] : '', !isset($_GET['showgrid']) ? '?showgrid' : ''?>">Toggle showgrid</a></p>
</div>
<?php $_decorator = 'wrap'; ?>