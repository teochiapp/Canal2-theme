    <?php if (have_comments()) { ?>
    <div class="title-v1" style="margin-top: 20px;">
        <h3>
            <?php
            comments_number(
                "No hay comentarios aún",
                "Hay un comentario publicado",
                "Hay % comentarios"
            )
            ?>
        </h3>
    </div>
    <?php } ?>
    <div class="panel-body">
        <ul class="media-list">
            <?php

            $comentarios = get_comments(array(
                'post_id' => $post->ID,
                'status'  => 'approve'
            ));
            if (have_comments()) {

                wp_list_comments(array(
                    'per_page'  => 10,
                    'reverse_top_level' => false,

                ), $comentarios);
            } ?>
        </ul>
    </div>

    <div class="title-v1">
        <h3>Deja tu comentario</h3>
    </div>
    <?php
    $comment_args = array(
        'title_reply' => '',
        'comment_notes_before' => '',
        'comment_notes_after' => '',
        'comment_field' => '<div class="comment-form-comment">' .
            '<textarea id="comment" name="comment" cols="45" rows="8" required></textarea></div>',
        'fields' => array(
            'author' => '<div class="form-group space-30">' . '<label class="control-label" for="author">' . __('Nombre', 'text-domain') . ' <span class="required">*</span></label> ' .
                '<input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30" required /></div>',
            'email' => '<div class="form-group space-30"><label class="control-label" for="email">' . __('Correo electrónico', 'text-domain') . ' <span class="required">*</span></label> ' .
                '<input id="email" name="email" type="email" value="' . esc_attr($commenter['comment_author_email']) . '" size="30" required /></div>',
        ),
    );

    comment_form($comment_args);
    ?>