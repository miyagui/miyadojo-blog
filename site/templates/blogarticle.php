<?php snippet('header') ?>
<?php snippet('breadcrumb') ?>
<section class="content blogarticle main">
  <article>
    <h1><?php echo $page->title()->html() ?></h1>
    <span class="postdate">Escrito el <?php echo $page->date('d.m.Y') ?></span>
    <blockquote><?php echo kirbytext($page->intro()) ?></blockquote>
    <?php echo $page->text()->kirbytext() ?>
	
    <a href="<?php echo url('blog') ?>">Regresar...</a>
	
  </article>
	<?php snippet('prevnext') ?>
  <?php snippet('disqus', array('disqus_shortname' => 'Miyadojo', 'disqus_developer' => true)) ?>
  </section>

<?php snippet('footer') ?>