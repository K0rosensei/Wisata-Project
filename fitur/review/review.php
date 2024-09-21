    <div class="card">
        <h3><?= $datareview['Username'] ?></h3>
        <div class="review-header">
            <div class="review-rating"><?= $datareview['Rating'] ?>/5
                    <?php
                    for ($i = 1; $i <= 5; $i++) {
                        if ($i <= $datareview['Rating']) {
                            echo '<span class="star">&#9733;</span>';
                        } else {
                            echo '<span class="star">&#9734;</span>';
                        }
                    }
                    ?>
            </div>
            <div class="review-date"><?= $datareview['Tanggal'] ?></div>
        </div>
        <p><?= $datareview['Review'] ?></p>
        
    </div>