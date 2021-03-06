<?php
/**
 * Feed View: twitter
 */
$profile_image = UPLOADS_URL . "/$feed/profile_picture.jpg";
?>



<div style="margin: <?= $margin ?>; padding: <?= $padding ?>; border: <?= $border_color ?> solid <?= $border_size ?>; border-radius: <?= $border_radius ?>;">

    <<?= $title_tag ?>><?= ucfirst($feed) ?> Feed</<?= $title_tag ?>>

    <div class="profile">
        <a href="<?= $feed_data[0]->profile_url ?>" target="_blank"><img src="<?= $profile_image ?>; max-width:<?= $image_width ?>" alt="" /></a>
    </div>
    <?php
    foreach ($feed_data as $data) :
        ?>

        <hr />
        <div class="">
            <div class="profile-message"><?= $data->message ?></div>
            <div class="time-ago"><?= date_i18n('F j, Y  H:i:s', strtotime($data->created_time)) ?></div>
            <a href="<?= $data->status ?>" target="_blank" class="post-link">
                <div class="post-content">
                    <div class='post-status'>
                        View on Twitter
                    </div>
                    <?php
                    if ($data->type == 'image'):
                        if ($image_size === '1') {
                            $img = new SimpleImage(UPLOADS_URL . $data->shared_photo_link);
                            ?>
                            <img src="<?= $img->thumbnail($image_width, $image_height)->output_base64() ?>" alt="" />
                            <?php
                        } else {
                            ?>
                            <img src="<?= UPLOADS_URL . $data->shared_photo_link ?>" alt="" />
                            <?php
                        }
                    endif;
                    ?>
                </div>
            </a>
            <div class="profile-info">
                <!--<div class="profile-photo"><img src="<?= $profile_image ?>" alt="" /></div>-->
                <div class="profile-name">
                    <div>
                        Tweet by <a href=" <?= $data->status ?> " target="_blank"><?= $data->page_name ?></a>
                        <!--<a href="<?php $data->status ?> " target="_blank"><?php $data->type ?></a>-->
                    </div>
                    <div class="time-ago"><?php ?></div>
                </div>
            </div>
        </div>
        <?php
    endforeach;
    ?>
</div>

