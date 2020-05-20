function change_image(element) {
    var send_attachment_bkp = wp.media.editor.send.attachment;
    wp.media.editor.send.attachment = function(props, attachment) {
        jQuery('#' + element + '_img').val(attachment.url);
        console.log('#' + element + '_img');
        jQuery('#' + element).attr('src', attachment.url);
        wp.media.editor.send.attachment = send_attachment_bkp;
    }
    wp.media.editor.open();
}