<?php
/**
 * Temporary storage for the former "Upcoming Events" section from `index.php`.
 * This file is intentionally not included anywhere by default.
 */
?>
        <!-- event-area -->
        <section class="event__area section-pt-120 section-pb-90">
            <div class="container">
                <div class="event__inner-wrap">
                    <div class="row">
                        <div class="col-30">
                            <div class="event__content">
                                <div class="section__title mb-20">
                                    <span class="sub-title">Upcoming Events</span>
                                    <h2 class="title">Join Our Community And Make it Bigger</h2>
                                </div>
                                <p>At Magic of Skills, we believe in the power of community. Our vibrant and supportive community is at the heart of our platform, bringing together students from diverse backgrounds who share a common passion for learning and growth.</p>
                                <div class="tg-button-wrap">
                                    <a href="events.php" class="btn arrow-btn">See All Events <img src="assets/img/icons/right_arrow.svg" alt="img" class="injectable"></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-70">
                            <div class="event__item-wrap">
                                <div class="row justify-content-center">
                                <?php 
                                $sql = "SELECT * FROM events WHERE is_completed=0 ORDER BY date ASC limit 3";

                                $results = $connect->query($sql);
                                while ($final = $results->fetch_assoc()) {
                                ?>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="event__item shine__animate-item">
                                            <div class="event__item-thumb">
                                                <a href="events-details.php?id=<?php echo $final['id'] ?>" class="shine__animate-link"><img src="<?php echo $uri.$final['icon'] ?>" alt="img"></a>
                                            </div>
                                            <div class="event__item-content">
                                                <span class="date">
                                                <?php
                                                $date = $final['date']; // Assume this is in 'Y-m-d H:i:s' format (e.g., '2024-07-05 17:00:00')
                                                $formattedDate = DateTime::createFromFormat('Y-m-d', $date)->format('d/m/Y');
                                                echo $formattedDate;
                                                ?>
                                                </span>
                                                <h2 class="title"><a href="events-details.php?id=<?php echo $final['id'] ?>"><?php echo $final['name'] ?></a></h2>
                                                <a href="<?php echo $final['register_link'] ?>" class="location" target="_blank"><i class="flaticon-map"></i><?php echo $final['brand'] ?></a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="event__shape">
                <img src="assets/img/events/event_shape.png" alt="img" class="alltuchtopdown">
            </div>
        </section>
        <!-- event-area-end -->

