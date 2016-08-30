<?php

/**
 * Utility functions
 */


function metroino_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment; ?>
    <?php $add_below = ''; ?>
    <li <?php comment_class('media'); ?> id="comment-<?php comment_ID() ?>">

            <a class="pull-left">
                <?php echo get_avatar($comment, 64); ?>
            </a>

            <div class="media-body">

                <div class="comment-author meta">
                    <strong><?php echo get_comment_author_link() ?></strong>
                    <?php printf(__('Posted %1$s at %2$s', 'metroino'), esc_attr ( get_comment_date() ),  esc_attr ( get_comment_time() ) ) ?></a><?php edit_comment_link(__(' - Edit', 'metroino'),'  ','') ?><?php comment_reply_link(array_merge( $args, array('reply_text' => __('Reply', 'metroino'), 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                </div>

                <div class="comment-text">
                    <?php if ($comment->comment_approved == '0') : ?>
                    <em><?php echo __('Your comment is awaiting moderation.', 'metroino') ?></em>
                    <br />
                    <?php endif; ?>
                    <?php comment_text() ?>
                </div>

        </div>

<?php }


function metroino_hex2rgba($color, $opacity = false) {

	$default = '';

	//Return default if no color provided
	if(empty($color))
          return $default; 

	//Sanitize $color if "#" is provided 
    if ($color[0] == '#' ) {
        $color = substr( $color, 1 );
    }

    //Check if color has 6 or 3 characters and get values
    if (strlen($color) == 6) {
        $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
    } elseif ( strlen( $color ) == 3 ) {
        $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
    } else {
        return $default;
    }

    //Convert hexadec to rgb
    $rgb =  array_map('hexdec', $hex);

    //Check if opacity is set(rgba or rgb)
    if($opacity){
        if(abs($opacity) > 1)
			$opacity = 1.0;
        $output = 'rgba('.implode(",",$rgb).','.$opacity.')';
    } else {
        $output = 'rgb('.implode(",",$rgb).')';
    }

    //Return rgb(a) color string
    return $output;
}

