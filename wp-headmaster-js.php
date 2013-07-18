<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(document).find("input[id^='uploadimage']").live('click', function(){
        formfield = $('#image').attr('name');
        tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
        window.send_to_editor = function(html) {
            imgurl = $('img',html).attr('src');
            jQuery('#image').val(imgurl);
            tb_remove();
        }
        return false;
        });
        $(document).find("input[id^='uploadtouchicon']").live('click', function(){
        formfield = $('#wp_headmaster_touch_icon').attr('name');
        tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
        window.send_to_editor = function(html) {
            imgurl = $('img',html).attr('src');
            jQuery('#wp_headmaster_touch_icon').val(imgurl);
            tb_remove();
        }
        return false;
        });
    });

    jQuery(document).ready(function($) {
        $('.group').hide();
        var activetab = '';
        if (typeof(localStorage) != 'undefined' ) {
            activetab = localStorage.getItem("activetab");
        }
        if (activetab != '' && $(activetab).length ) {
            $(activetab).fadeIn();
        } else {
            $('.group:first').fadeIn();
        }
        $('.group .collapsed').each(function(){
            $(this).find('input:checked').parent().parent().parent().nextAll().each(
            function(){
                if ($(this).hasClass('last')) {
                    $(this).removeClass('hidden');
                    return false;
                }
                $(this).filter('.hidden').removeClass('hidden');
            });
        });

        if (activetab != '' && $(activetab + '-tab').length ) {
            $(activetab + '-tab').addClass('nav-tab-active');
        }
        else {
            $('.nav-tab-wrapper a:first').addClass('nav-tab-active');
            $('.group').hide();
            var defaultshow = $('.nav-tab-wrapper a:first').attr('href');
            $(defaultshow).fadeIn();
        }
            $('.nav-tab-wrapper a').click(function(evt) {
            $('.nav-tab-wrapper a').removeClass('nav-tab-active');
            $(this).addClass('nav-tab-active').blur();
            var clicked_group = $(this).attr('href');
            if (typeof(localStorage) != 'undefined' ) {
                localStorage.setItem("activetab", $(this).attr('href'));
            }
            $('.group').hide();
            $(clicked_group).fadeIn();
            evt.preventDefault();
        });
    });

</script>