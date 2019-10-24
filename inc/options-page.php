<?php
add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );

function theme_options_init(){
    register_setting( 'dart_options', 'dart_theme_options');
}

function theme_options_add_page() {
    add_theme_page( __( 'Базовые', 'WP-Dart' ), __( 'Базовые', 'WP-Dart' ), 'edit_theme_options', 'dart_theme_options', 'theme_options_do_page' );
}
function theme_options_do_page() { global $select_options; if ( ! isset( $_REQUEST['settings-updated'] ) ) $_REQUEST['settings-updated'] = false;
    // here we adding our custom meta box
?>

<div class="wrap">
<?php echo "<h2>". __( 'Базовые настройки', 'WP-Dart' ) . "</h2>"; ?>

    <?php if (!empty($notice)): ?>
    <div id="notice" class="error"><p><?php echo $notice ?></p></div>
    <?php endif;?>
    <?php if (!empty($message)): ?>
    <div id="message" class="updated"><p><?php echo $message ?></p></div>
    <?php endif;?>

<!--

<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
<div id="message" class="updated">
<p><strong><?php _e( 'Настройки сохранены', 'WP-Dart' ); ?></strong></p>
</div>
<?php endif; ?>
-->
</div>
 <div class="wrap">
<form method="post" action="options.php" id="form">
<?php settings_fields( 'dart_options' ); ?>
<?php $options = get_option( 'dart_theme_options' ); ?>


        <div class="metabox-holder" id="poststuff">
            <div id="post-body">
                <div id="post-body-content">


<div class="postbox">
<div class="inside">
<table cellspacing="2" cellpadding="5" class="form-table custom-table">
    <tbody>

    <tr class="form-field">
        <th valign="top" scope="row">
            <label>Ссылка на <strong>Behance</strong></label>
        </th>
        <td>
           <input id="dart_theme_options[be]" name="dart_theme_options[be]" type="text" style="width: 100%" value="<?php echo $options['be'];?>" size="50" class="regular-text" placeholder="Введите ссылку на Behance" >
        </td>
    </tr>



    <tr class="form-field">
        <th valign="top" scope="row">
            <label>Ссылка на <strong>Facebook</strong></label>
        </th>
        <td>
           <input id="dart_theme_options[fb]" name="dart_theme_options[fb]" type="text" style="width: 100%" value="<?php echo $options['fb'];?>" size="50" class="regular-text" placeholder="Введите ссылку на Facebook" >
        </td>
    </tr>


    <tr class="form-field">
        <th valign="top" scope="row">
            <label>Ссылка на <strong>Instagram</strong></label>
        </th>
        <td>
           <input id="dart_theme_options[in]" name="dart_theme_options[in]" type="text" style="width: 100%" value="<?php echo $options['in'];?>" size="50" class="regular-text" placeholder="Введите ссылку на Instagram" required="">
        </td>
    </tr>

    <tr class="form-field">
        <th valign="top" scope="row">
            <label>Ссылка на <strong>Telegram</strong></label>
        </th>
        <td>
           <input id="dart_theme_options[tg]" name="dart_theme_options[tg]" type="text" style="width: 100%" value="<?php echo $options['tg'];?>" size="50" class="regular-text" placeholder="Введите ссылку на Telegram" required="">
        </td>
    </tr>


    <tr class="form-field">
        <th valign="top" scope="row">
            <label>Номер телефона</label>
        </th>
        <td>
           <input id="dart_theme_options[phone_1]" name="dart_theme_options[phone_1]" type="text" style="width: 100%" value="<?php echo $options['phone_1'];?>" size="50" class="regular-text" placeholder="Введите основной номер телефона">
        </td>
    </tr>

    <tr class="form-field">
        <th valign="top" scope="row">
            <label>Дополнительный номер телефона</label>
        </th>
        <td>
           <input id="dart_theme_options[phone_2]" name="dart_theme_options[phone_2]" type="text" style="width: 100%" value="<?php echo $options['phone_2'];?>" size="50" class="regular-text" placeholder="Введите дополнительный номер телефона">
        </td>
    </tr>



    <tr class="form-field">
        <th valign="top" scope="row">
            <label>Email:</label>
        </th>
        <td>
           <input id="dart_theme_options[email]" name="dart_theme_options[email]" type="text" style="width: 100%" value="<?php echo $options['email'];?>" size="50" class="regular-text" placeholder="Введите текст для email">
        </td>
    </tr>


    </tbody>
    </table>
    </div>
    </div>

<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Сохранить изменения"></p>


                </div>
            </div>
        </div>



</form>
 </div>
<?php
}
?>
