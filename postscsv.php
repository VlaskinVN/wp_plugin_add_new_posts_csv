<?php
    /**
    * Plugin Name: Postcsv
    * Description: Plugin for Adding new posts with file .csv .
    * Version: 1.0
    * Author: Nicolaevich.V.V
    **/
    wp_enqueue_style("bs_css", "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css");

    add_action('admin_menu', function(){
        add_menu_page( 'Добавление постов с помошью .csv файла', 'Add posts', 'edit_posts', 'site-posts', 'add_my_setting', '', 6 ); 
    } );
    
    // функция отвечает за вывод страницы настроек
    // подробнее смотрите API Настроек: http://wp-kama.ru/id_3773/api-optsiy-nastroek.html
    function add_my_setting(){
        ?>
        <div class="wrap">
            <h2><?php echo get_admin_page_title() ?></h2>
            <hr>

            <?php
            // settings_errors() не срабатывает автоматом на страницах отличных от опций
            if( get_current_screen()->parent_base !== 'options-general' )
                settings_errors('название_опции');
            ?>
            
            <form action="add_new_posts_csv.php" method="POST">
                <div class="col-sm-6" style="margin-top:25px">
                    <div class="panel panel-default">
                        <h5>Добавить файл (.csv)</h5>
                        <input type="file" name="csvFile" id="csvFile" class="form-controll">                        
                    </div>
                </div>
                <hr>

                <?php
                    settings_fields("opt_group");     // скрытые защитные поля
                    do_settings_sections("opt_page"); // секции с настройками (опциями).
                    submit_button();
                ?>
            </form>                
        </div>
        <?php
    
    }
    
?>