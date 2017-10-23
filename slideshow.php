
        <div class="wmuSlider example1 slide-grid">
                <div class="wmuSliderWrapper">
                    <?php
                    mysqli_set_charset($connect, "utf8");
                    $sql_tdd = mysqli_query($connect, "SELECT * FROM slideshow"); //
                    while ($row2 = mysqli_fetch_array($sql_tdd)) {
                        echo "<a href='".$row2['vlink_image']."'><article style='position: absolute; width: 100%; opacity: 0;'><div class='banner-matter'>";
                        echo "<img src='" . $row2['vpath_image'] . "'>";
                        echo " </div></article></a>";
                    }

                    ?>
                </div>
            <!--<ul class="wmuSliderPagination">
                <?php
/*                $row=0;
                include('host-phpold.php');
                $sql = "SELECT * FROM `slideshow`";
                while ($row1 = mysqli_fetch_array($sql)) {
                    mysql_query("SET NAMES 'UTF8'");
                    echo "<li><a href='#' class=''>";
                    echo $row;
                    echo "</a></li>";
                }
                */?>
            </ul>-->
            <script src="js/jquery.wmuSlider.js"></script>
            <script>
                $('.example1').wmuSlider();
            </script>
        </div>