<?php 
$fields =  array(
    'author' => ( $req ? '<span class="required">*</span>' : '' ) .'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />',
    'email'  => ( $req ? '<span class="required">*</span>' : '' ) .
        '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' />',
);

comment_form( array(
	'fields' => $fields,
    'id_form'              => 'commentform',
    'comment_field'        => '<textarea id="comment" name="comment" aria-required="true">Escribir Comentario</textarea>',
    'id_submit'            => 'submit',
    'title_reply'          => '',
    'title_reply_to'       => __( 'Respondiendo a %s' ),
    'cancel_reply_link'    => __( 'Cancel' ),
    'label_submit'         => __( 'ENVIAR' ),
	'comment_notes_before' => __( '' ),
	'comment_notes_after' => __( '' )
)); 

?>
<?php 

$args = array(
	'walker'            => null,
	'max_depth'         => '2',
	'style'             => 'ul',
	'callback'          => 'mytheme_comment',
	'end-callback'      => null,
	'type'              => 'all',
	'reply_text'        => '<i class="fa fa-reply" aria-hidden="true"></i>',
	'page'              => '',
	'per_page'          => 15,
	'avatar_size'       => 0,
	'reverse_top_level' => true,
	'reverse_children'  => true,
	'format'            => 'xhtml', // or 'xhtml' if no 'HTML5' theme support
	'short_ping'        => false,   // @since 3.6
        'echo'              => true     // boolean, default is true
); 

wp_list_comments($args); ?>