<div class="wrap">
    <?php screen_icon(); ?>
    <h2>WP Headmaster Settings</h2>

    <h2 class="nav-tab-wrapper">
        <a href="#wphm_analytics" class="nav-tab" id="wphm_ga_tab">Inline Scripts</a>
        <a href="#wphm_inline" class="nav-tab" id="wphm_icons_tab">Icons</a>
        <a href="#wphm_scripts" class="nav-tab" id="wphm_scripts_tab">Scripts &amp; Styles</a>
        <a href="#wphm_meta" class="nav-tab" id="wphm_meta_tab">Meta Data</a>
    </h2>

    <form method="post" action="options.php">  
        <?php
            settings_fields( 'headmaster_myoption_group' );
            do_settings_sections('headmaster_myoption_group');
        ?> 
        <?php echo '<input type="hidden" id="page_id" name="page" value="' . $_REQUEST['page'] . '"/>'; ?>

        <div id="wphm_analytics" class="group">
            <div class="metabox-holder">
                <div class="postbox">
                    <div id="" style="display: block;">                      
                         <h3>Google Analytics</h3>
                            <table class="form-table">
                                <tbody>
                                    <tr valign="top">
                                    <th scope="row">Unique Tracking Code</th>
                                        <td>
                                           <input type="text" name="ga_profile" value="<?php echo get_option('ga_profile'); ?>" /><br />
                                           <span class="description">To add Google Analytics tracking to your website, please enter your unique GA tracking code.</span>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>       
                    </div>                 
                </div>
            </div>
            <div class="metabox-holder">
                <div class="postbox">
                    <div id="" class="" style="display: block;">               
                        <h3>JavaScript</h3>
                            <table class="form-table">
                                <tbody>
                                    <tr valign="top">
                                    <th scope="row">Inline JavaScript:</th>
                                        <td>
                                            <span class="description">To add inline JavaScript to your theme's head, simply include it within the field below:</span><br /><br />
                                            <span class="description">&lt;script  type&#61;&#34;text&#47;javascript&#34;&gt;</span><br />
                                            <textarea name="inline_styles" rows="6" cols="50" id="moderation_keys" class="large-text code"><?php echo get_option('inline_styles'); ?></textarea>
                                            <span class="description">&lt;/script&gt;</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>   
                    </div>                 
                </div>
            </div>
        </div>
    
        <div id="wphm_inline" class="group">
            <div class="metabox-holder">
                <div class="postbox">
                    <div id="" class="" style="display: block;">            
                        <h3>Favicon</h3>
                            <table class="form-table">
                                <tbody>
                                    <tr valign="top">
                                    <th scope="row">Upload a Favicon:</th>
                                        <td>
                                            <?php   
                                                $ico_check_two = get_option('wp_headmaster_favicon');
                                                if ($ico_check_two !="") { ?>
                                            <img src="<?php echo get_option('wp_headmaster_favicon'); ?>" style="height:16px; width:16px;"><br />
                                            <?php } ?>
                                            <input type="text" name="wp_headmaster_favicon" id="image" value="<?php echo get_option('wp_headmaster_favicon'); ?>" class="regular-text" /><input type='button' class="button-primary" value="Upload/Select .ico" id="uploadimage"/><br />
                                            <span class="description">Please upload your .ico graphic saved at 32px x 32px (Retina resolution).</span><br />
                                            <span class="description"><a href="http://convertico.com/" target="_blank">Convertico.com</a> - Free online tool for converting PNGs into .ICOs.</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                    </div>                 
                </div>
            </div>
            <div class="metabox-holder">
                <div class="postbox">
                    <div id="" class="" style="display: block;">            
                        <h3>Apple Touch Icon</h3>
                            <table class="form-table">
                                <tbody>
                                    <tr valign="top">
                                    <th scope="row">Upload an Apple Touch Icon:</th>
                                        <td>
                                            <?php   
                                                $touchicon_check_two = get_option('wp_headmaster_touch_icon');
                                                if ($touchicon_check_two !="") { ?>
                                                    <div class="touchiconpreview" style="background:url(<?php echo get_option('wp_headmaster_touch_icon'); ?>) no-repeat; background-size: 72px;">
                                                        <?php echo '<img src="' . plugins_url( 'images/apple-reflected-shine.png' , __FILE__ ) . '" class="appleshine" > '; ?>
                                                    </div>
                                            <?php } ?>
                                            <input type="text" name="wp_headmaster_touch_icon" id="wp_headmaster_touch_icon" value="<?php echo get_option('wp_headmaster_touch_icon'); ?>" class="regular-text" /><input type='button' class="button-primary" value="Upload/Select Icon" id="uploadtouchicon"/><br />
                                            <span class="description">Upload a 144x144px PNG graphic for full retina compatibility on all Apple devices.</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                    </div>                 
                </div>
            </div>
        </div>

        <div id="wphm_scripts" class="group">
            <div class="metabox-holder">
                <div class="postbox">
                    <div id="" class="" style="display: block;">               
                        <h3>jQuery</h3>
                            <table class="form-table">
                                <tbody>
                                     <tr valign="top">
                                    <th scope="row">I would like WP Headmaster to:</th>
                                        <td>
                                            <input name="wp_headmaster_jquery_choice" type="radio" value="0" <?php checked( '0', get_option( 'wp_headmaster_jquery_choice' ) ); ?> /> <strong>Have no influence</strong><br />
                                            <span class="description">WP Headmaster will not influence the use of jQuery on your site.</span>
                                        </td>
                                    </tr>
                                    <tr valign="top">
                                    <th scope="row"></th>
                                        
                                        <td>
                                            <input name="wp_headmaster_jquery_choice" type="radio" value="1" <?php checked( '1', get_option( 'wp_headmaster_jquery_choice' ) ); ?> /> <strong>Load Wordpress' jQuery</strong><br />
                                            <span class="description">Wordpress comes preloaded with the latest stable version of jQuery. Checking this box will ensure that jQuery is <a href="https://www.creare.co.uk/how-to-enqueue-scripts-stylesheets-to-wordpress-via-a-plugin" target="_blank">enqueued</a>.</span>
                                        </td>
                                    </tr>
                                    <tr valign="top">
                                    <th scope="row"></th>
                                        <td>
                                            <input name="wp_headmaster_jquery_choice" type="radio" value="2" <?php checked( '2', get_option( 'wp_headmaster_jquery_choice' ) ); ?> /> <strong>Use Google's API to run jQuery version:</strong> <select name="wp_headmaster_jquery_google_version" id="wp_headmaster_jquery_google_version">
                                                <option <?php if(get_option('wp_headmaster_jquery_google_version')=="2.0.0") echo "selected"; ?> value="2.0.0">2.0.0</option><option <?php if(get_option('wp_headmaster_jquery_google_version')=="1.9.1") echo "selected"; ?> value="1.9.1">1.9.1</option><option <?php if(get_option('wp_headmaster_jquery_google_version')=="1.9.0") echo "selected"; ?> value="1.9.0">1.9.0</option><option <?php if(get_option('wp_headmaster_jquery_google_version')=="1.8.3") echo "selected"; ?> value="1.8.3">1.8.3</option><option <?php if(get_option('wp_headmaster_jquery_google_version')=="1.8.2") echo "selected"; ?> value="1.8.2">1.8.2</option><option <?php if(get_option('wp_headmaster_jquery_google_version')=="1.8.1") echo "selected"; ?> value="1.8.1">1.8.1</option><option <?php if(get_option('wp_headmaster_jquery_google_version')=="1.8.0") echo "selected"; ?> value="1.8.0">1.8.0</option><option <?php if(get_option('wp_headmaster_jquery_google_version')=="1.7.2") echo "selected"; ?> value="1.7.2">1.7.2</option><option <?php if(get_option('wp_headmaster_jquery_google_version')=="1.7.1") echo "selected"; ?> value="1.7.1">1.7.1</option><option <?php if(get_option('wp_headmaster_jquery_google_version')=="1.7.0") echo "selected"; ?> value="1.7.0">1.7.0</option><option <?php if(get_option('wp_headmaster_jquery_google_version')=="1.6.4") echo "selected"; ?> value="1.6.4">1.6.4</option><option <?php if(get_option('wp_headmaster_jquery_google_version')=="1.6.3") echo "selected"; ?> value="1.6.3">1.6.3</option><option <?php if(get_option('wp_headmaster_jquery_google_version')=="1.6.2") echo "selected"; ?> value="1.6.2">1.6.2</option><option <?php if(get_option('wp_headmaster_jquery_google_version')=="1.6.1") echo "selected"; ?> value="1.6.1">1.6.1</option><option <?php if(get_option('wp_headmaster_jquery_google_version')=="1.6.0") echo "selected"; ?> value="1.6.0">1.6.0</option><option <?php if(get_option('wp_headmaster_jquery_google_version')=="1.5.2") echo "selected"; ?> value="1.5.2">1.5.2</option><option <?php if(get_option('wp_headmaster_jquery_google_version')=="1.5.1") echo "selected"; ?> value="1.5.1">1.5.1</option><option <?php if(get_option('wp_headmaster_jquery_google_version')=="1.5.0") echo "selected"; ?> value="1.5.0">1.5.0</option><option <?php if(get_option('wp_headmaster_jquery_google_version')=="1.4.4") echo "selected"; ?> value="1.4.4">1.4.4</option><option <?php if(get_option('wp_headmaster_jquery_google_version')=="1.4.3") echo "selected"; ?> value="1.4.3">1.4.3</option><option <?php if(get_option('wp_headmaster_jquery_google_version')=="1.4.2") echo "selected"; ?> value="1.4.2">1.4.2</option><option <?php if(get_option('wp_headmaster_jquery_google_version')=="1.4.1") echo "selected"; ?> value="1.4.1">1.4.1</option><option <?php if(get_option('wp_headmaster_jquery_google_version')=="1.4.0") echo "selected"; ?> value="1.4.0">1.4.0</option>
                                            </select><br />
                                            <span class="description">Use this setting to deregister jQuery and externally load a single version (of your choice), from the Google API.</span>  
                                        </td>
                                    </tr>
                                </tbody>
                            </table>   
                    </div>                 
                </div>
            </div>

            <div class="metabox-holder">
                <div class="postbox">
                    <div id="" class="" style="display: block;">               
                        <h3>Responsive Polyfills</h3>
                            <table class="form-table">
                                <tbody>
                                    <tr valign="top">
                                    <th scope="row" rowspan="2">Click to enable the following:</th>
                                        <td>
                                            <label for="wp_headmaster_respondjs">
                                            <input type="checkbox" class="checkbox" id="wp_headmaster_respondjs" name="wp_headmaster_respondjs" value="1" <?php checked( '1', get_option( 'wp_headmaster_respondjs' ) ); ?>> <strong>Respond.js</strong></label><br />
                                            <span class="description"><a href="https://github.com/scottjehl/Respond" target="_blank">Respond.js</a> is a fast &amp; lightweight polyfill for min/max-width CSS3 Media Queries. (File is sourced locally).</span>
                                        </td>
                                    </tr>
                                    <tr valign="top">
                                    
                                        <td>
                                            <label for="wp_headmaster_css3js">
                                            <input type="checkbox" class="checkbox" id="wp_headmaster_css3js" name="wp_headmaster_css3js" value="1" <?php checked( '1', get_option( 'wp_headmaster_css3js' ) ); ?>> <strong>css3-mediaqueries.js</strong></label><br />
                                            <span class="description"><a href="https://github.com/scottjehl/Respond" target="_blank">Respond.js</a> is a fast &amp; lightweight polyfill for min/max-width CSS3 Media Queries. (File is sourced locally).</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>   
                    </div>                 
                </div>
            </div>

            <div class="metabox-holder">
                <div class="postbox">
                    <div id="" class="" style="display: block;">               
                        <h3>Web Fonts</h3>
                            <table class="form-table">
                                <tbody>
                                    <tr valign="top">
                                    <th scope="row">Google Fonts:</th>
                                        <td>
                                            <strong>&#60;link href&#61;&#34;http://fonts.googleapis.com/css?family&#61;</strong><input type="text" name="wp_headmaster_google_font" value="<?php echo get_option('wp_headmaster_google_font'); ?>" /><strong>&#34; rel&#61;&#34;stylesheet&#34; type&#61;&#34;text/css&#34;></strong><br />
                                            <span class="description">The best way to install <a href="http://www.google.com/fonts/" target="_blank">Google Fonts</a>, is to enqueue the standard method. <br />
                                            To run your chosen Google Fonts, please complete the field above, by including the families as provided in the installation guide on Google Fonts.</span>
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>   
                    </div>                 
                </div>
            </div>
        </div>
        <div id="wphm_meta" class="group">
            <div class="metabox-holder">
                <div class="postbox">
                    <div id="" class="" style="display: block;">               
                        <h3>Author Tag</h3>
                            <table class="form-table">
                                <tbody>
                                    <tr valign="top">
                                    <th scope="row">Sitewide Author</th>
                                        <td>
                                           <strong> &#60;meta name&#61;&#34;author&#34; content&#61;&#34;</strong><input type="text" name="wp_headmaster_meta_author" value="<?php echo get_option('wp_headmaster_meta_author'); ?>" /><strong>&#34; &#47;&#62;</strong><br />
                                            <span class="description">To enable the Meta Author Tag, simply enter your name and/or company who created this site.</span>
                                        </td>
                                    </tr>
                                    <tr valign="top">
                                    <th scope="row"></th>
                                        <td>
                                            <label for="wp_headmaster_meta_author_auto">
                                            <input type="checkbox" class="checkbox" id="wp_headmaster_meta_author_auto" name="wp_headmaster_meta_author_auto" value="1" <?php checked( '1', get_option( 'wp_headmaster_meta_author_auto' ) ); ?>> <strong>Dynamic Meta Author</strong></label><br />
                                            <span class="description">Enable this setting and Wordpress will populate Meta Author Tag content with the 'Display Name' of the WordPress user to last edit the Page/Post/Archive.</span>
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>   
                    </div>                 
                </div>
            </div>
        </div>

 <?php submit_button('Save all WP Headmaster Settings'); ?>
    </form>
</div>




<?php
require('creare-footer.php');



  