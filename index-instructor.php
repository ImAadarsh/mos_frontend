        <!-- instructor-area -->
        <section class="instructor__area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-4">
                        <div class="instructor__content-wrap">
                            <div class="section__title mb-15">
                                <span class="sub-title">Meet Your Mentors</span>
                                <h2 class="title">Learn From the Best — All in One Place</h2>
                            </div>
                            <p>At Magic of Skills, you’re guided by experts who don’t just teach, they inspire. Our mentors bring real experience, fresh ideas, and a love for helping students grow. They make every session exciting, meaningful, and easy to understand.</p>
                            <div class="tg-button-wrap">
                                <a href="instructors.php" class="btn arrow-btn">See All Mentors <img src="assets/img/icons/right_arrow.svg" alt="img" class="injectable"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="instructor__item-wrap">
                            <!-- Desktop Grid View -->
                            <div class="row g-4 d-none d-md-flex">
                            <?php 
                            $sql = "SELECT * FROM trainers LIMIT 4";
                            $results = $connect->query($sql);
                            while ($final = $results->fetch_assoc()) {
                            ?>
                            <?php
                                $trainer_id = $final['id'];
                            $feedsql = "SELECT AVG(rating) as average_rating, COUNT(*) as review_count FROM reviews WHERE trainer_id = $trainer_id";
                            $feedback = $connect->query($feedsql);
                            $feedback_data = $feedback->fetch_assoc();
                            ?>
                                <div class="col-lg-6 col-md-6">
                                    <div class="instructor__item instructor__item-modern">
                                        <div class="instructor__thumb-modern">
                                            <a href="instructor-details.php?id=<?php echo $final['id'] ?>" class="instructor__thumb-link">
                                                <div class="instructor__thumb-wrapper">
                                                    <img src="<?php echo $uri.$final['image'] ?>" alt="<?php echo $final['name'] ?>">
                                                    <div class="instructor__thumb-overlay">
                                                        <i class="fas fa-arrow-right"></i>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="instructor__content-modern">
                                            <h3 class="instructor__name"><a href="instructor-details.php?id=<?php echo $final['id'] ?>"><?php echo $final['name'] ?></a></h3>
                                            <p class="instructor__role"><?php echo $final['designation'] ?></p>
                                            <?php if($feedback_data['review_count'] > 0){?>
                                            <div class="instructor__rating-modern">
                                                <div class="stars">
                                                <?php
                                                    $average_rating = round($feedback_data['average_rating'], 1);
                                                    $full_stars = floor($average_rating);
                                                    $has_half = ($average_rating - $full_stars) >= 0.5;
                                                    for ($i = 1; $i <= 5; $i++) {
                                                        if ($i <= $full_stars) {
                                                    echo '<i class="fas fa-star"></i>';
                                                        } elseif ($i == $full_stars + 1 && $has_half) {
                                                            echo '<i class="fas fa-star-half-alt"></i>';
                                                        } else {
                                                            echo '<i class="far fa-star"></i>';
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                                <span class="rating-value"><?php echo $average_rating; ?></span>
                                                <span class="review-count">(<?php echo $feedback_data['review_count']; ?> reviews)</span>
                                            </div>
                                            <?php } ?>
                                            <a href="instructor-details.php?id=<?php echo $final['id'] ?>" class="instructor__view-link">
                                                View Profile <i class="fas fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                            <!-- Mobile Swiper View -->
                            <div class="swiper instructor-swiper-active d-md-none">
                                <div class="swiper-wrapper">
                                <?php 
                                $sql2 = "SELECT * FROM trainers LIMIT 4";
                                $results2 = $connect->query($sql2);
                                while ($final2 = $results2->fetch_assoc()) {
                                ?>
                                <?php
                                    $trainer_id2 = $final2['id'];
                                $feedsql2 = "SELECT AVG(rating) as average_rating, COUNT(*) as review_count FROM reviews WHERE trainer_id = $trainer_id2";
                                $feedback2 = $connect->query($feedsql2);
                                $feedback_data2 = $feedback2->fetch_assoc();
                                ?>
                                    <div class="swiper-slide">
                                        <div class="instructor__item instructor__item-modern">
                                            <div class="instructor__thumb-modern">
                                                <a href="instructor-details.php?id=<?php echo $final2['id'] ?>" class="instructor__thumb-link">
                                                    <div class="instructor__thumb-wrapper">
                                                        <img src="<?php echo $uri.$final2['image'] ?>" alt="<?php echo $final2['name'] ?>">
                                                        <div class="instructor__thumb-overlay">
                                                            <i class="fas fa-arrow-right"></i>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="instructor__content-modern">
                                                <h3 class="instructor__name"><a href="instructor-details.php?id=<?php echo $final2['id'] ?>"><?php echo $final2['name'] ?></a></h3>
                                                <p class="instructor__role"><?php echo $final2['designation'] ?></p>
                                                <?php if($feedback_data2['review_count'] > 0){?>
                                                <div class="instructor__rating-modern">
                                                    <div class="stars">
                                                        <?php
                                                        $average_rating2 = round($feedback_data2['average_rating'], 1);
                                                        $full_stars2 = floor($average_rating2);
                                                        $has_half2 = ($average_rating2 - $full_stars2) >= 0.5;
                                                        for ($i = 1; $i <= 5; $i++) {
                                                            if ($i <= $full_stars2) {
                                                                echo '<i class="fas fa-star"></i>';
                                                            } elseif ($i == $full_stars2 + 1 && $has_half2) {
                                                                echo '<i class="fas fa-star-half-alt"></i>';
                                                            } else {
                                                                echo '<i class="far fa-star"></i>';
                                                            }
                                                        }
                                                        ?>
                                                    </div>
                                                    <span class="rating-value"><?php echo $average_rating2; ?></span>
                                                    <span class="review-count">(<?php echo $feedback_data2['review_count']; ?> reviews)</span>
                                                </div>
                                                <?php } ?>
                                                <a href="instructor-details.php?id=<?php echo $final2['id'] ?>" class="instructor__view-link">
                                                    View Profile <i class="fas fa-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                                <div class="instructor__nav">
                                    <div class="instructor-button-prev"><i class="flaticon-arrow-right"></i></div>
                                    <div class="instructor-button-next"><i class="flaticon-arrow-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- instructor-area-end -->