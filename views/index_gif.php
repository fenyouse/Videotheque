<?php foreach ($this->data['gifs'] as $gif): ?>
<meta property="og:site_name" content="Impose Ta Connerie" />
<meta property="fb:admins" content="838777807"/>
<meta property="fb:app_id" content="1494049274210999" />
<meta property="fb:page_id"content="1524585554490457" /> 
<meta property="og:type"   content="website" /> 
<meta property="og:url"    content="http://imposetaconnerie.herokuapp.com/" /> 
<meta property="og:title"  content="Impose Ta Connerie" />
<meta name="twitter:card" content="photo" />
<meta name="twitter:site" content="@ImposeTC" />
<meta name="twitter:image" content="http://imposetaconnerie.herokuapp.com/views/images/gif/<?php echo $gif['nom_image'];?>" />

<div class="article">

    <div class="content_gauche">

        <div class="info_image">
            <h2><?php echo utf8_encode ($gif['titre']);?></h2>
            <p>Date: <?php echo $gif['date'];?></p>
            <p>Auteur: <?php echo $gif['auteur'];?></p>

        </div>

        <div class="images">
            <a href="<?php echo $app->urlFor('gifs_individuelle', array('gif_id' => $gif['id'])) ?>"><img title="<?php echo $gif['nom_image'];?>" src="views/images/gif/<?php echo $gif['nom_image'];?>"/></a>
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
            <div class="fb-comments" data-href="http://imposetaconnerie.herokuapp.com/gifs_<?php echo $gif['id'];?>" data-width="530" data-numposts="4" data-colorscheme="light"></div>
            <twitter><a href="https://twitter.com/share" class="twitter-share-button" data-text="<?php echo utf8_encode ($gif['titre']);?>" data-url="http://imposetaconnerie.herokuapp.com/gifs_<?php echo $gif['id'];?>" data-via="ImposeTC">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script></twitter>
            <facebook><div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&appId=1494049274210999&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
            <div class="fb-share-button" data-href="http://imposetaconnerie.herokuapp.com/gifs_<?php echo $gif['id'];?>" data-layout="button_count"></div></facebook>
        </ul>   
    </div>
    
</div>

<?php endforeach; ?>