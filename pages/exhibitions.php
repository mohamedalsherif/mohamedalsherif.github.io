<div id="Exhibitions" class="contentbox">
    <div class="row">

        <?php
        $exhibitionsCount = getExhibitionsCount();
        for ($i = 0; $i < $exhibitionsCount; $i++) {
            if ($i % 2 == 0) {
                echo '<div class="combiningExhibitions">';
            }
            echo givenExhibitionIndexGetImageDiv($i);
            if ($i % 2 == 1) {
                echo '</div>';
            }
        }
        if ($i % 2 == 1) {
            echo '</div>';
        }
        ?>

    </div>
</div>
