<div id="wpbody" role="main">
    <div id="wpbody-content" tabindex="0" aria-label="Main content">
        <h2 class="nav-tab-wrapper">
            <a href="<?php echo admin_url( 'admin.php?page=manage_wattcycling_configurations    ' ); ?>" class="nav-tab<?php if ( ! isset( $_GET['action'] ) || isset( $_GET['action'] ) && 'social' != $_GET['action']  && 'footer' != $_GET['action'] ) echo ' nav-tab-active'; ?>"><?php esc_html_e( 'Introductietraining' ); ?></a>         
        </h2>
        <form method="post" action="">
            <table class="form-table">
                <tbody>
                    <tr>
                        <th><label>Email</label></th>
                        <td><input type="text" name="email" class="wc-input" /></td>
                    </tr>
                    <tr>
                        <th><label>Trial training (date)</label></th>
                        <td><input class="wc-input" type="date" name="trial-date"/></td>

                    </tr>
                    <tr>
                        <th><label>Trial training (date text)</label></th>
                        <td><input class="wc-input" type="text" name="trial-training-text"/></td>

                    </tr>
                    <tr>
                        <th><label>Trial training (duration: from> to)</label></th>
                        <td><input class="wc-input" type="text" name="tt_from_to"/></td>

                    </tr>
                    <tr>
                        <th><label>Trial training (start time)</label></th>
                        <td><input class="wc-input" type="text" name="tt_start_time"/></td>

                    </tr>
                    
                </tbody>
            </table>
            <p class="submit">
                <input id="submit" class="button button-primary" type="submit" value="Sync" name="submit">
            </p>
        </form>
    </div>
    <div class="clear"></div>
</div>
