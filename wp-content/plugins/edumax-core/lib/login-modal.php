<?php if(!is_user_logged_in()) { ?>
    <!-- Modal registration -->

    <div class="edumax-signin-modal-popup" style="display: none;">
        <div class="edumax-modal-overlay"></div>
        <div class="edumax-signin-popup-inner" data-edumax-login-tab="tab-1">
            <a href="#" class="edumax-login-modal-close fas fa-times"></a>
            <div class="edumax-signin-popup-body">
                <div class="edumax-signin-modal-form">
                    <h2><?php esc_html_e('Sign In', 'edumax-core') ?></h2>
                    <form action="login" id="login" method="post">
                        <p class="status"></p>
                        <input type="text" id="username2" name="username" placeholder="<?php esc_html_e('Username', 'edumax-core'); ?>">
                        <input type="password" id="password2" name="password" placeholder="<?php esc_html_e('Password', 'edumax-core'); ?>">
                        <label for="rememberme" class="edumax-login-remember">
                            <input name="rememberme" type="checkbox" id="rememberme" value="forever" />
                            <span class="fas fa-check"></span><?php esc_html_e('Remember Me', 'edumax-core'); ?>
                        </label>
                        <button class="edumax_btn btn-fill" type="submit"><?php esc_html_e('Login Now', 'edumax-core') ?></button>
                        <?php wp_nonce_field( 'ajax-login-nonce2', 'security2' ); ?>
                    </form>

                </div>
                <div class="edumax-signin-modal-right">
                    <?php
                        $en_social_login = get_theme_mod('en_social_login', false);
                        $google_client_ID = get_theme_mod('google_client_ID', '');
                        $facebook_app_ID = get_theme_mod('facebook_app_ID', '');
                        $twitter_consumer_key = get_theme_mod('twitter_consumer_key', '');
                        $twitter_consumer_secreat = get_theme_mod('twitter_consumer_secreat', '');
                        $twitter_auth_callback_url = get_theme_mod('twitter_auth_callback_url', '');
                        $social_twitter_condition = !empty($twitter_consumer_key) && !empty($twitter_consumer_secreat) && !empty($twitter_auth_callback_url);
                        $social_condition_all = $social_twitter_condition || !empty($google_client_ID) || !empty($facebook_app_ID);
                    ?>
                    <p><?php esc_html_e('If you don’t already have an account click the button below to create your account.', 'edumax-core'); ?></p>
                    <a class='edumax_btn btn-fill bg-black' href='https://petromonk.com/lms/registration/'><?php esc_html_e('Create New Account', 'edumax-core') ?></a>
                    <?php if($en_social_login) {?>
                    <div class="edumax-login-popup-divider"><?php esc_html_e('OR', 'edumax-core') ?></div>
                    <?php }?>

                    <div class="eduamx-signin-modal-social">
                        <?php if(!empty($google_client_ID)) : ?>
                            <a href="#" class="google-login edumax_btn btn-fill bg-google" id="gSignIn2"> <i class="fab fa-google"></i> <?php esc_html_e('Login with Google', 'edumax-core')?></a>
                        <?php endif; ?>
                        <?php if($facebook_app_ID) : ?>
                            <a href="#" class="facebook-login edumax_btn btn-fill bg-facebook" onclick="javascript:login();"> <i class="fab fa-facebook"></i> <?php esc_html_e('Login with Facebook', 'edumax-core')?></a>
                            <div id="fb-root"></div>
                        <?php endif; ?>
                        <?php if($social_twitter_condition) : ?>
                            <a class="twitter-login edumax_btn btn-fill bg-twitter" href="<?php echo esc_url($twitter_auth_callback_url).'?twitterlog=1'; ?>"> <i class="fab fa-twitter"></i> <?php esc_html_e('Login with Twitter', 'edumax-core')?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="edumax-signin-popup-footer">
                <?php
                $lostpass_url =  wp_lostpassword_url();
                printf(__('So you can’t get in to your account? Did you %s forget your password? %s', 'edumax-core'), "<a href='$lostpass_url'>", "</a>");
                ?>
            </div>
        </div> <!--edumax-signin-popup-inner-->
        <div class="edumax-signin-popup-inner" data-edumax-login-tab="tab-2"  style="display: none">
            <a href="#" class="edumax-login-modal-close fas fa-times"></a>
            <div class="edumax-signin-popup-body">
                <div class="edumax-signin-modal-form">
                    <h2><?php esc_html_e('Registration', 'edumax-core') ?></h2>
                    <form form id="registerform" action="login" method="post">
                        <p class="status"></p>
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="text" id="nickname" name="nickname" placeholder="<?php esc_html_e('Nickname','edumax-core'); ?>">
                                <input type="text" id="username" name="username" placeholder="<?php esc_html_e('Username','edumax-core'); ?>">
                            </div>
                            <div class="col-sm-6">
                                <input type="text" id="email" name="email" placeholder="<?php esc_html_e('Email','edumax-core'); ?>">
                                <input type="password" id="password" name="password" placeholder="<?php esc_html_e('Password','edumax-core'); ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button class="edumax_btn btn-fill register_button" type="submit"><?php esc_html_e('Registration', 'edumax-core') ?></button>
                                <?php wp_nonce_field( 'ajax-register-nonce', 'security' ); ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="edumax-signin-popup-footer">
                <?php printf(__('Already have an account? %s Sign In %s', 'edumax-core'), "<a class='edumax-login-tab-toggle' href='#tab-1'>", "</a>");
                ?>
            </div>
        </div><!--edumax-signin-popup-inner-->

    </div>
<?php } ?>