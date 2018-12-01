<?php 
	dsmvc_page_title('home');
	dsmvc_header();
?>

<div class="container">
  <div class="row">
    <div class="twelve columns" style="margin-top: 25%">
      <h4><?= $title; ?></h4>
      <p><?= $about; ?></p>
      <a class="button button-primary" href="https://github.com/sovantha/dsmvc">Learn more</a>
      <a class="button" href="http://getskeleton.com">Skeleton CSS Boilerplate</a>
    </div>
  </div>
</div>

<?php dsmvc_footer(); ?>