<?php $_decorator = 'wrap'; ?>

<div>
  <?php echo view('header'); ?>
  <div class="container">
    
<?php echo $_content ?>
    
  </div>
  <div class="im-useful-sticky-helper"></div>
</div>

<?php echo view('footer'); ?>