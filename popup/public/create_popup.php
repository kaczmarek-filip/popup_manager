<?php

ob_start();

$servername = "localhost";
$username = "root";
$password = "";
$databaseName = "wordpress";

$conn = new mysqli($servername, $username, $password, $databaseName);

if ($conn->connect_error) {
    die("Błąd połączenia: " . $conn->connect_error);
}

$sql_select = "SELECT * FROM wp_popup LIMIT 1";
$result = $conn->query($sql_select);

// if ($result === true) {
    while($row = $result->fetch_array())
    {
        // echo '<div id="popup_records">';
        // echo '<div class="popup_record">#'.$row["id"].'</div>';
        // echo '<div class="popup_record">'.$row["name"].'</div>';
        // echo '<div class="popup_record">admin</div>';
        // echo '<div class="popup_record">'.$row["function"].'</div>';
        // echo '<div class="popup_record">';
        // echo '<button id="popup_record_edit"><span class="dashicons dashicons-admin-generic"></span></button>';
        // echo "<button id='popup_record_delete' onclick='usunRekord(" . $row["id"] . ")'><span class='dashicons dashicons-trash'></span></button>";
        // echo '</div>';
        // echo '</div>';
    
        // $name = $row['name'];
        // $function = $row['function'];
        // $selectors = $row['selectors'];
        // $location = $row['location'];
        // $duration = $row['duration'];
        // $animation = $row['animation'];
        // $background_color = $row['background_color'];
        // $text_color = $row['text_color'];
        // $width = $row['width'];
        // $height = $row['height'];
        // $padding = $row['padding'];
        // $border_type = $row['border_type'];
        // $border_color = $row['border_color'];
        // $border_thickness = $row['border_thickness'];
        // $border_radius = $row['border_radius'];
        // $content = $row['content'];
        // $custom_css = $row['custom_css'];
    
        echo '
        <script>
        document.addEventListener("DOMContentLoaded", function() {
        
            popup = document.querySelector("'.$row['selectors'].'")
            body = document.querySelector("body")
            
            popup.addEventListener("click", () => {
        
                function Copy(){
                    const tempInput = document.createElement("input");
                    tempInput.value = popup.innerText;
                    document.body.appendChild(tempInput);
                    tempInput.select();
                    document.execCommand("copy");
                    document.body.removeChild(tempInput);
                }
                if("'.$row['function'].'" === "Copy text")
                {
                    Copy()
                    // console.log("'.$row['function'].'")
                }
                
                // console.log("'.$row['custom_css'].'")
        
                const block = this.createElement("div")
                block.classList.add("popup")
                block.textContent = "'.$row['content'].'"
                block.style.backgroundColor = "'.$row['bg_color'].'"
                block.style.color = "'.$row['color'].'"
                block.style.zIndex = "100"
                block.style.borderRadius = "'.$row['border_radius'].'px"
                block.style.border = "'.$row['border_thickness'].'px '.$row['border_type'].' '.$row['border_color'].'"
                body.appendChild(block);
                block.style.transition = "0.2s ease"
                block.style.padding = "'.$row['padding'].'"
                block.style.position = "fixed"
                // block.style.bottom = "10px"
                // block.style.right = "10px"
                block.style.transform = "translateX(100%)"

                const style = document.createElement("style")
                document.head.appendChild(style)
                const sheet = style.sheet
                sheet.insertRule(".popup {'.$row['custom_css'].'}")


                if("'.$row['location'].'" == "Top-left")
                {
                    block.style.top = "10px"
                    block.style.left = "10px"
                }
                else if("'.$row['location'].'" == "Top-center")
                {
                    block.style.top = "10px"
                    block.style.left = "40%"
                    block.style.right = "40%"
                    block.style.display = "flex"
                    block.style.justifyContent = "center"
                }
                else if("'.$row['location'].'" == "Top-right")
                {
                    block.style.top = "10px"
                    block.style.right = "10px"
                }
                else if("'.$row['location'].'" == "Middle-left")
                {
                    block.style.top = "40%"
                    block.style.bottom = "40%"
                    block.style.left = "10px"
                }
                else if("'.$row['location'].'" == "Middle-center")
                {
                    block.style.top = "40%"
                    block.style.bottom = "40%"
                    block.style.left = "40%"
                    block.style.right = "40%"
                }
                else if("'.$row['location'].'" == "Middle-right")
                {
                    block.style.top = "40%"
                    block.style.bottom = "40%"
                    block.style.right = "10px"
                }
                else if("'.$row['location'].'" == "Bottom-left")
                {
                    block.style.bottom = "10px"
                    block.style.left = "10px"
                }
                else if("'.$row['location'].'" == "Bottom-center")
                {
                    block.style.bottom = "10px"
                    block.style.left = "40%"
                    block.style.right = "40%"
                    console.log("test")
                }
                else if("'.$row['location'].'" == "Bottom-right")
                {
                    block.style.bottom = "10px"
                    block.style.right = "10px"
                }


                if("'.$row['animation'].'" == "Fade")
                {
                    block.animate([
                        { opacity: "0" },
                        { opacity: "0.5" },
                        { opacity: "1" }
                    ], {
                        duration: 500,
                        easing: "ease"
                    });
                    setTimeout(() => {
                        block.animate([
                            { opacity: "1" },
                            { opacity: "0.5" },
                            { opacity: "0" }
                        ], {
                            duration: 500,
                            easing: "ease"
                        });
                        block.style.visibility = "hidden"
                    }, '.$row['duration'].')
            
                    block.style.transform = "translateX(0)"
                }
                else if("'.$row['animation'].'" == "Slide from left")
                {
                    block.animate([
                            { transform: "translateX(-100%)" },
                            { transform: "translateX(-50%)" },
                            { transform: "translateX(0)" }
                        ], {
                            duration: 500,
                            easing: "ease"
                        });
                        setTimeout(() => {
                            block.animate([
                                { transform: "translateX(0)" },
                                { transform: "translateX(-50%)" },
                                { transform: "translateX(-100%)" }
                            ], {
                                duration: 500,
                                easing: "ease"
                            });
                            block.style.visibility = "hidden"
                        }, '.$row['duration'].')
                
                        block.style.transform = "translateX(0)"
                }
                else if("'.$row['animation'].'" == "Slide from right")
                {
                    block.animate([
                            { transform: "translateX(100%)" },
                            { transform: "translateX(50%)" },
                            { transform: "translateX(0)" }
                        ], {
                            duration: 500,
                            easing: "ease"
                        });
                        setTimeout(() => {
                            block.animate([
                                { transform: "translateX(0)" },
                                { transform: "translateX(50%)" },
                                { transform: "translateX(100%)" }
                            ], {
                                duration: 500,
                                easing: "ease"
                            });
                            block.style.visibility = "hidden"
                        }, '.$row['duration'].')
                
                        block.style.transform = "translateX(0)"
                }
                else if("'.$row['animation'].'" == "Slide from bottom")
                {
                    block.animate([
                            { transform: "translateY(100%)" },
                            { transform: "translateY(50%)" },
                            { transform: "translateY(0)" }
                        ], {
                            duration: 500,
                            easing: "ease"
                        });
                        setTimeout(() => {
                            block.animate([
                                { transform: "translateY(0)" },
                                { transform: "translateY(50%)" },
                                { transform: "translateY(100%)" }
                            ], {
                                duration: 500,
                                easing: "ease"
                            });
                            block.style.visibility = "hidden"
                        }, '.$row['duration'].')
                
                        block.style.transform = "translateY(0)"
                }
                else if("'.$row['animation'].'" == "Slide from top")
                {
                    block.animate([
                            { transform: "translateY(-100%)" },
                            { transform: "translateY(-50%)" },
                            { transform: "translateY(0)" }
                        ], {
                            duration: 500,
                            easing: "ease"
                        });
                        setTimeout(() => {
                            block.animate([
                                { transform: "translateY(0)" },
                                { transform: "translateY(-50%)" },
                                { transform: "translateY(-100%)" }
                            ], {
                                duration: 500,
                                easing: "ease"
                            });
                            block.style.visibility = "hidden"
                        }, '.$row['duration'].')
                
                        block.style.transform = "translateY(0)"
                }
            })
          });
        </script>
        ';
        
    }
// }





$conn->close();

// ob_end_flush();
?>