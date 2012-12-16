/**
 * source http://stackoverflow.com/questions/5671550/jquery-window-send-to-editor
 */
jQuery(function(){
  /** attach des évenements à chaque boutton de la class upload_image_button
   * quand un bouton de cette classe est cliqué , ouvre le médiabox pour selectionner un media
   */
  var uploadID = ''; /* setup the var */
  jQuery('.upload_image_button').click(function() {
    uploadID = jQuery(this).prev('input'); /* grab the specific input */
    // formfield = jQuery('.upload_image').attr('name');
    tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
    return false;
  });

  window.send_to_editor = function(html) {
    var	imgurl = jQuery(html).attr('href');
    uploadID.val(imgurl); /* assign the value to the input */
    uploadID.attr('title',imgurl);
    tb_remove();
  };
});
