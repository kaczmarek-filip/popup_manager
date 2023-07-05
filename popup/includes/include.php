<?php  

add_action('admin_menu', 'popup');

function popup() {
    add_menu_page(
        'Popup Manager',    // Nazwa wyświetlana w menu
        'PoPuP',    // Tekst na pasku tytułu
        'manage_options',   // Uprawnienia użytkownika do dostępu
        'popup_manager',    // Unikalny identyfikator zakładki
        'popup_plugin',   // Funkcja renderująca zawartość zakładki
        // 'dashicons-admin-tools',   // Ikona zakładki
        'dashicons-format-chat',   // Ikona zakładki
        99   // Pozycja zakładki w menu (liczba większa niż 10, aby była wyświetlana na górze)
    );
}

function popup_plugin() {
    // Tutaj umieść kod renderujący zawartość twojej zakładki
    ?>
        <!-- <link rel="stylesheet" href="../css/popup_menu_page.css"> -->
        <div id="popup_plugin_header">
            PoPuP Manager
        </div>
        <div id="created_popups">
            <div id="created_popups_window">
                <div id="created_popups_window_titles">
                    <div class="created_popups_window_titles_flex">ID</div>
                    <div class="created_popups_window_titles_flex">Name</div>
                    <div class="created_popups_window_titles_flex">Author</div>
                    <div class="created_popups_window_titles_flex">Function</div>
                    <div class="created_popups_window_titles_flex">
                        <!-- <button id="created_popups_window_titles_flex_addbutton">Create</button> -->
                    </div>
                </div>
                <!-- <div id="popup_records">
                    <div class="popup_record">Strona główna</div>
                    <div class="popup_record">admin</div>
                    <div class="popup_record">#wpcontent</div>
                </div> -->
                <?php

                    // if(isset($_POST['SubmitButton'])){ //check if form was submitted
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $databaseName = "wordpress";

                        $conn = new mysqli($servername, $username, $password, $databaseName);
                        
                        if ($conn->connect_error) {
                            die("Błąd połączenia: " . $conn->connect_error);
                        }

                        $sql_select = "SELECT * FROM wp_popup";
                        $result = $conn->query($sql_select);
                        
                        // if ($result === true) {
                            while($row = $result->fetch_array())
                            {
                                echo '<div id="popup_records">';
                                echo '<div class="popup_record">#'.$row["id"].'</div>';
                                echo '<div class="popup_record">'.$row["name"].'</div>';
                                echo '<div class="popup_record">admin</div>';
                                echo '<div class="popup_record">'.$row["function"].'</div>';
                                echo '<div class="popup_record">';
                                echo '<button id="popup_record_edit"><span class="dashicons dashicons-admin-generic"></span></button>';
                                echo "<button id='popup_record_delete' onclick='usunRekord(" . $row["id"] . ")'><span class='dashicons dashicons-trash'></span></button>";
                                echo '</div>';
                                echo '</div>';

                                // echo '<script>';
                                // echo 'function usunRekord(id) {';
                                // echo '    if (confirm("Czy na pewno chcesz usunąć ten rekord?")) {';
                                // echo '        // Wywołaj skrypt PHP w celu usunięcia rekordu';
                                // echo '        window.location.href = "delete.php?id=" + id;';
                                // echo '    }';
                                // echo '}';
                                // echo '</script>';

                            }
                        // }

                        


                        $conn->close();
                    // }    


                    if(isset($_POST['SubmitButton'])){
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $databaseName = "wordpress";

                        $conn = new mysqli($servername, $username, $password, $databaseName);

                        if ($conn->connect_error) {
                            die("Błąd połączenia: " . $conn->connect_error);
                        }

                        $tableName = "wp_popup";

                        $sql_create = "CREATE TABLE IF NOT EXISTS $tableName (
                            `id` INT NOT NULL AUTO_INCREMENT,
                            `name` VARCHAR(255) DEFAULT NULL,
                            `function` VARCHAR(255) DEFAULT NULL,
                            `selectors` VARCHAR(255) DEFAULT NULL,
                            `location` VARCHAR(255) DEFAULT NULL,
                            `duration` VARCHAR(255) DEFAULT NULL,
                            `animation` VARCHAR(255) DEFAULT NULL,
                            `bg_color` VARCHAR(255) DEFAULT NULL,
                            `color` VARCHAR(255) DEFAULT NULL,
                            `width` VARCHAR(255) DEFAULT NULL,
                            `height` VARCHAR(255) DEFAULT NULL,
                            `padding` VARCHAR(255) DEFAULT NULL,
                            `border_type` VARCHAR(255) DEFAULT NULL,
                            `border_color` VARCHAR(255) DEFAULT NULL,
                            `border_thickness` INT DEFAULT NULL,
                            `border_radius` INT DEFAULT NULL,
                            `content` VARCHAR(255) DEFAULT NULL,
                            `custom_css` VARCHAR(255) DEFAULT NULL,
                            PRIMARY KEY (`id`)
                        ) ENGINE = InnoDB;
                        ";
                        if ($conn->query($sql_create) === TRUE) {
                            
                        } else {
                            echo "Błąd podczas tworzenia bazy danych: " . $conn->error;
                        }

                        $name = $_POST['name'];
                        $function = $_POST['function'];
                        $selectors = $_POST['selectors'];
                        $location = $_POST['location'];
                        $duration = $_POST['duration'];
                        $animation = $_POST['animation'];
                        $background_color = $_POST['background_color'];
                        $text_color = $_POST['text_color'];
                        $width = $_POST['width'];
                        $height = $_POST['height'];
                        $padding = $_POST['padding'];
                        $border_type = $_POST['border_type'];
                        $border_color = $_POST['border_color'];
                        $border_thickness = $_POST['border_thickness'];
                        $border_radius = $_POST['border_radius'];
                        $content = $_POST['content'];
                        $custom_css = $_POST['custom_css'];

                        $sql_query = "INSERT INTO `wp_popup`(`id`, `name`, `function`, `selectors`, `location`, `duration`, `animation`, `bg_color`, `color`, `width`, `height`, `padding`, `border_type`, `border_color`, `border_thickness`, `border_radius`, `content`, `custom_css`) 
                        VALUES ('[value-1]','$name','$function','$selectors','$location','$duration','$animation','$background_color','$text_color','$width','$height','$padding','$border_type','$border_color','$border_thickness','$border_radius','$content','$custom_css')";

                        if ($conn->query($sql_query) === TRUE) {
                            // header("Location: admin.php?page=popup_manager");
                        } else {
                            echo "Błąd podczas tworzenia bazy danych: " . $conn->error;
                        }

                        $conn->close();
                        echo '<script>location.reload()</script>';
                    }   
                ?>
            </div>
        </div>
        <div id="edit_popups">
            <div id="edit_popups_window">
                <form action="" method="post">
                    <div class="edit_popups_form_half">
                        <div class="edit_form_input">
                            Popup name:
                            <input type="text" id="name" name="name" placeholder="Popup #1" required>
                        </div>
                        <div class="edit_form_input">
                            Function:
                            <select name="function" id="function">
                                <option value="Copy text">Copy text</option>
                                <option value="On click message">On click message</option>
                            </select>
                        </div>
                        <div class="edit_form_input">
                            Selectors:
                            <!-- <input type="text"> -->
                            <input type="text" name="selectors2" id="selectors_input" placeholder=".item">
                            <div id="selectors_list"></div>
                        </div>
                        <div class="edit_form_input">
                            Location:
                            <!-- <input type="text" placeholder="Popup #1"> -->
                            <select name="location" id="location">
                                <option value="Top-left">Top-left</option>
                                <option value="Top-center">Top-center</option>
                                <option value="Top-right">Top-right</option>
                                <option value="Middle-left">Middle-left</option>
                                <option value="Middle-center">Middle-center</option>
                                <option value="Middle-right">Middle-right</option>
                                <option value="Bottom-left">Bottom-left</option>
                                <option value="Bottom-center">Bottom-center</option>
                                <option value="Bottom-right">Bottom-right</option>
                            </select>
                        </div>
                        <div class="edit_form_input">
                            Duration:
                            <!-- <input type="text" placeholder="Popup #1"> -->
                            <input type="text" name="duration" id="duration" placeholder="in milliseconds">
                        </div>
                        <div class="edit_form_input">
                            Animation:
                            <!-- <input type="text" placeholder="Popup #1"> -->
                            <select name="animation" id="animation">
                                <option value="Fade">Fade</option>
                                <option value="Slide from left">Slide from left</option>
                                <option value="Slide from right">Slide from right</option>
                                <option value="Slide from bottom">Slide from bottom</option>
                                <option value="Slide from top">Slide from top</option>
                            </select>
                        </div>
                        <div class="edit_form_input">
                            Background color:
                            <!-- <input type="text" placeholder="Popup #1"> -->
                            <input type="text" id="background_color" name="background_color"placeholder="#D3D3D3" style="width: 40%;">
                            <input type="color" id="background_color_rgb">
                        </div>
                        <div class="edit_form_input">
                            Text color:
                            <!-- <input type="text" placeholder="Popup #1"> -->
                            <input type="text" id="text_color" name="text_color" placeholder="#000" style="width: 40%;">
                            <input type="color" id="text_color_rgb">
                        </div>
                        <div class="edit_form_input">
                            Width:
                            <input type="text" id="width" name="width2" placeholder="fit-content">
                            <select name="" id="width_select">
                                <option value="fit">fit</option>
                                <option value="px">px</option>
                                <option value="%">%</option>
                                <option value="mm">mm</option>
                                <option value="cm">cm</option>
                                <option value="vh">vh</option>
                                <option value="vw">vw</option>
                            </select>
                        </div>
                        <div class="edit_form_input">
                            Height:
                            <input type="text" id="height" name="height2" placeholder="fit-content">
                            <select name="" id="height_select">
                                <option value="fit">fit</option>
                                <option value="px">px</option>
                                <option value="%">%</option>
                                <option value="mm">mm</option>
                                <option value="cm">cm</option>
                                <option value="vh">vh</option>
                                <option value="vw">vw</option>
                            </select>
                        </div>
                        <div class="edit_form_input">
                            Padding:
                            <input type="text" id="padding" name="padding2" placeholder="fit-content">
                            <select name="" id="padding_select">
                                <option value="fit">fit</option>
                                <option value="px">px</option>
                                <option value="%">%</option>
                                <option value="mm">mm</option>
                                <option value="cm">cm</option>
                                <option value="vh">vh</option>
                                <option value="vw">vw</option>
                            </select>
                        </div>
                        <div class="edit_form_input">
                            Border type:
                            <select name="border_type">
                                <option value="none">none</option>
                                <option value="dotted">dotted</option>
                                <option value="dashed">dashed</option>
                                <option value="solid" selected>solid</option>
                                <option value="double">double</option>
                                <option value="groove">groove</option>
                                <option value="ridge">ridge</option>
                                <option value="inset">inset</option>
                                <option value="outset">outset</option>
                            </select>
                            Border color:
                            <input type="color" name="border_color">
                        </div>
                        <div class="edit_form_input">
                            Border thickness:
                            <input type="text" id="border_thickness" name="border_thickness" placeholder="2px" style="width: 20%;">
                            Border radius:
                            <input type="text" id="border_radius" name="border_radius" placeholder="15px" style="width: 20%;">
                        </div>
                        <div class="edit_form_input">
                            Content:
                            <br>
                            <textarea name="content" id="" cols="50" rows="8" required></textarea>
                        </div>
                    </div>

                    <div class="edit_popups_form_half">
                        <div class="custom_css">
                            Custom CSS
                            <br><br>
                            <textarea name="custom_css" id="" cols="40" rows="30" spellcheck="false" placeholder="text-decoration: none;"></textarea>
                        </div>
                        <div class="form_submit">
                            <!-- <input type="reset" value="Cancel"> -->
                            <!-- <input type="submit" value="Save"> -->
                            <button type="reset" style="background-color: #C70000;" id="reset_button">Reset</button>
                            <!-- <button type="submit">Submit</button> -->
                            <button type="submit" name="SubmitButton" style="background-color: #34b233;">Submit</button>

                        </div>
                    </div>
                </form>
                <script>
                document.querySelector('form').addEventListener('keydown', function(event) {
                if (event.key === 'Enter') {
                    event.preventDefault();
                }
                });

                </script>
            </div>
        </div>

    <?php
    wp_enqueue_style('popup_menu_left', plugins_url('../css/popup_menu_left.css', __FILE__));
    wp_enqueue_style('popup_menu_right', plugins_url('../css/popup_menu_right.css', __FILE__));
    wp_enqueue_script('include_js', plugins_url('include.js', __FILE__));
    wp_enqueue_script('create_popup', plugins_url('../js/popup.js', __FILE__));
    include 'delete.php';
    // include '';
}

