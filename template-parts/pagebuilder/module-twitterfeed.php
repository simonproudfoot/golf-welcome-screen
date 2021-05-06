<?php if(basename(get_page_template()) === 'page.php'){ ?>
    </div>
<?php }?>
<section class="module twitterfeed">
    <div class="container">
      <div class="text-center margin-bottom padding-bottom">
        <h3 class="page-title">Follow us on twitter</h3>
      </div>
     
    <?php 
    $twitter_username = get_sub_field('twitter_username');
    $twitter_hashtag = get_sub_field('twitter_hashtag');
    $twitter_number = get_sub_field('how_many');
    ?>
     <div class="row justify-content-around ">
        <?php getTweets($twitter_username, $twitter_hashtag, $twitter_number); ?>
        </div>
      </div>
    </div>
  </section>
</section>
<?php if(basename(get_page_template()) === 'page.php'){ ?>
    <div class="single-content">
<?php }?>