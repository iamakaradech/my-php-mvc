<?php
include('layouts/header.php')
?>
<div class="container-fluid">
<h3><?php echo $data['title']; ?></h3>
    <div class="row">
    <?php
    foreach ($data['videos'] as $video) {
        ?>
        <div class="col-sm-4 mt-2">
            <div class="card">
                <a href="<?php echo $video->url; ?>" 
                        data-featherlight="iframe" 
                        data-featherlight-iframe-frameborder="0" 
                        data-featherlight-iframe-allow="autoplay; encrypted-media" 
                        data-featherlight-iframe-allowfullscreen="true" 
                        data-featherlight-iframe-style="display:block;border:none;height:85vh;width:85vw;">
                    <img class="card-img-top" src="<?php echo $video->thumbnail['url']; ?>" alt="<?php echo $video->title; ?>">
                </a>
                <div class="card-body">
                    <a href="<?php echo $video->url; ?>" 
                        data-featherlight="iframe" 
                        data-featherlight-iframe-frameborder="0" 
                        data-featherlight-iframe-allow="autoplay; encrypted-media" 
                        data-featherlight-iframe-allowfullscreen="true" 
                        data-featherlight-iframe-style="display:block;border:none;height:85vh;width:85vw;">
                        <h5 class="card-title"><?php echo $video->title; ?></h5>
                    </a>
                    <p class="card-text"><?php echo $video->description; ?></p>
                    <a href="<?php echo $video->url; ?>" 
                        data-featherlight="iframe" 
                        data-featherlight-iframe-frameborder="0" 
                        data-featherlight-iframe-allow="autoplay; encrypted-media" 
                        data-featherlight-iframe-allowfullscreen="true" 
                        data-featherlight-iframe-style="display:block;border:none;height:85vh;width:85vw;">Watch Now</a>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
    </div>
</div>
<?php
include('layouts/footer.php');
?>