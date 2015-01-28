<?php snippet('header') ?>

  <main role="main">

    <article>
      <header>
        <h1><a href="<?php echo $page->url() ?>"><?php echo html($page->title()) ?></a></h1>
          
          <ul class="tags meta">
            <li>
              <time datetime="<?php echo $page->date('c') ?>"><?php echo $page->date('d m Y'); ?></time>
            </li>
            <?php if($page->tags() != ''): ?>
                <?php foreach(str::split($page->tags()) as $tag): ?>
                <li> 
                  <a href="<?php echo url('blog/tag:' . urlencode($tag)) ?>">#<?php echo $tag; ?></a>
                </li>
                <?php endforeach ?>
              
            <?php endif ?>
          </ul>         
      </header>      
      <div class="text">
		    <?php echo kirbytext($page->text()) ?>
      </div>
      <footer>
        <a href="<?php echo url() ?>">← Back to the blog</a>
        <a href="https://twitter.com/intent/tweet?source=webclient&text=<?php echo rawurlencode($page->title()); ?>%20<?php echo rawurlencode($site->title()) ?>%20<?php echo rawurlencode ($page->url()); ?>%20<?php echo ('via @your_twitter_account')?>" target="blank" title="Tweet this">Tweet</a>     
      </footer>
    </article>

    <?php snippet('navigate') ?>
    
    <?php snippet('disqus', array('disqus_shortname' => 'Miyadojo', 'disqus_developer' => true)) ?>

  </main>

<?php snippet('footer') ?>