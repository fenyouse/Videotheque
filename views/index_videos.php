<?php foreach ($this->data['videos'] as $video): ?>
<meta property="fb:admins" content="838777807"/>
<meta property="fb:app_id" content="1494049274210999" /> 
<meta property="og:type"   content="website" /> 
<meta property="og:url"    content="http://imposetaconnerie.herokuapp.com/" /> 
<meta property="og:title"  content="Impose Ta Connerie" /> 

<div class="article">

    <div class="content_gauche">

        <div class="info_video">
            <h2><?php echo utf8_encode ($video['titre']);?></h2>
            <p>Date: <?php echo $video['date'];?></p>
            <p>Auteur: <?php echo $video['auteur'];?></p>
        </div>
        
        <div class="videos">
            <iframe width="539" height="340" src="//www.youtube.com/embed/<?php echo $video['lien'];?>" frameborder="0" allowfullscreen></iframe>
        </div>
        
    </div>   
        
    <div class="content_droite">
        <ul id="social">
            <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&appId=1494049274210999&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
            <div class="fb-comments" data-href="https://www.youtube.com/watch?v=<?php echo $video['lien'];?>" data-width="530" data-numposts="4" data-colorscheme="light"></div>
            <twitter><a href="https://twitter.com/share" class="twitter-share-button" data-text="<?php echo utf8_encode ($video['titre']);?>" data-url="https://www.youtube.com/watch?v=<?php echo $video['lien'];?>" data-via="ImposeTC">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script></twitter>
            <facebook><div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&appId=1494049274210999&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
            <div class="fb-share-button" data-href="https://www.youtube.com/watch?v=<?php echo $video['lien'];?>" data-layout="button_count"></div></facebook>
        </ul>   
    </div>
    
</div>

<?php endforeach; ?>