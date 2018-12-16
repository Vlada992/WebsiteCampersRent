<!doctype html>
<html lang="de">


<?php
 require_once('includes/head2.php');
 require_once('includes/header2.php');
?>


    <div id='galleryCont' class="container" style="margin-top:20px;">
        <div class='row'>
            <div class='col-lg-12'>
                <h1 style="text-align:center;">Galerie</h1><br>
            </div>
        </div>
        <div class="row">
            <div class='col-lg-12'>
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="showall-tab" data-toggle="pill" href="#showall" role="tab"
                            aria-controls="showall" aria-selected="true">Show All</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="Wohnmobile-tab" data-toggle="pill" href="#Wohnmobile" role="tab"
                            aria-controls="Wohnmobile" aria-selected="false">Wohnmobile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="Wohnwagen-tab" data-toggle="pill" href="#Wohnwagen" role="tab"
                            aria-controls="Wohnwagen" aria-selected="false">Wohnwagen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="Kastenwagen-tab" data-toggle="pill" href="#Kastenwagen" role="tab"
                            aria-controls="Kastenwagen" aria-selected="false">Kastenwagen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="Vollintegriert-tab" data-toggle="pill" href="#Vollintegriert" role="tab"
                            aria-controls="Vollintegriert" aria-selected="false">Vollintegriert</a>
                    </li>
                </ul>
                <!--ul list ends here ***** -->

                <div id='galleryContInn' class="container-fluid">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="showall" role="tabpanel" aria-labelledby="showall-tab">
                            <div class="Portfolio"><a href="#!"><img class="card-img" src="http://placehold.it/400x400"
                                        alt=""></a>
                                <div class="desc">Car 1</div>
                            </div>
                            <div class="Portfolio"><a href="./images/camperFull1.jpg"><img class="card-img" src="./images/camper1size4.jpg"
                                        alt=""></a>
                                <div class="desc">City 1</div>
                            </div>
                            <div class="Portfolio"><a href="./images/camperFull2.jpg"><img class="card-img" src="./images/camper2size4.jpg"
                                        alt=""></a>
                                <div class="desc">Car 2</div>
                            </div>
                            <div class="Portfolio"><a href="./images/camperFull3.jpg"><img class="card-img" src="./images/camper3size4.jpg"
                                        alt=""></a>
                                <div class="desc">Forest 1</div>
                            </div>
                            <div class="Portfolio"><a href="#!"><img class="card-img" src="http://placehold.it/400x400"
                                        alt=""></a>
                                <div class="desc">Forest 2</div>
                            </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="Wohnmobile" role="tabpanel" aria-labelledby="Vohnmobile-tab">
                            <div class="Portfolio"><a href="./images/camperFull1.jpg"><img class="card-img" src="./images/camper1size4.jpg"
                                        alt=""></a>
                                <div class="desc">Car 1</div>
                            </div>
                            <div class="Portfolio"><a href="./images/camperFull2.jpg"><img class="card-img" src="./images/camper2size4.jpg"
                                        alt=""></a>
                                <div class="desc">Car 2</div>
                            </div>
                            <div class="Portfolio"><a href="./images/camperFull3.jpg"><img class="card-img" src="./images/camper3size4.jpg"
                                        alt=""></a>
                                <div class="desc">Car 3</div>
                            </div>
                        </div>
                        <!--tab pane fade-->

                        <div class="tab-pane fade" id="Wohnwagen" role="tabpanel" aria-labelledby="Wohnwagen-tab">
                            <div class="Portfolio"><a href="#!"><img class="card-img" src="http://placehold.it/400x400"
                                        alt=""></a>
                                <div class="desc">Car 1</div>
                            </div>
                            <div class="Portfolio"><a href="#!"><img class="card-img" src="http://placehold.it/400x400"
                                        alt=""></a>
                                <div class="desc">Car 2</div>
                            </div>
                            <div class="Portfolio"><a href="#!"><img class="card-img" src="http://placehold.it/400x400"
                                        alt=""></a>
                                <div class="desc">Car 3</div>
                            </div>
                        </div>
                        <!--tab pane fade-->

                        <div class="tab-pane fade" id="Kastenwagen" role="tabpanel" aria-labelledby="Kastenwagen-tab">
                            <div class="Portfolio"><a href="#!"><img class="card-img" src="http://placehold.it/400x400"
                                        alt=""></a>
                                <div class="desc">Car 21</div>
                            </div>
                            <div class="Portfolio"><a href="#!"><img class="card-img" src="http://placehold.it/400x400"
                                        alt=""></a>
                                <div class="desc">Car 22</div>
                            </div>
                            <div class="Portfolio"><a href="#!"><img class="card-img" src="http://placehold.it/400x400"
                                        alt=""></a>
                                <div class="desc">Car 23</div>
                            </div>
                        </div>
                        <!--tab pane fade-->

                        <div class="tab-pane fade" id="Vollintegriert" role="tabpanel" aria-labelledby="Vollintegriert-tab">
                            <div class="Portfolio"><a href="#!"><img class="card-img" src="http://placehold.it/400x400"
                                        alt=""></a>
                                <div class="desc">Car 31</div>
                            </div>
                            <div class="Portfolio"><a href="#!"><img class="card-img" src="http://placehold.it/400x400"
                                        alt=""></a>
                                <div class="desc">Car 32</div>
                            </div>
                            <div class="Portfolio"><a href="#!"><img class="card-img" src="http://placehold.it/400x400"
                                        alt=""></a>
                                <div class="desc">Car 33</div>
                            </div>
                        </div>
                    </div> <!-- class tab-content -->
                </div> <!-- gallery cont-->
            </div>
            <!--row row row-->
        </div>
        <!---->
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a id='breadGal' href='./index.php'>Startseite</a></li>
            <li class="breadcrumb-item active" aria-current="#"> <a href='#'>Galerie</a></li>
        </ol>
    </nav>
    <br>
    


<!-- footer from includes file-->
<?php 
require_once('includes/footer.php');
?>
<!-- footer from includes file-->
<!--modal 1-->
<?php
require_once('includes/modal1.php');
require_once('includes/modal3.php');
?>
<!-- modal 1-->



        <script src="assets/js/ee8d1d873604.js"></script>
        <script type="text/javascript">
            $.noConflict();
        </script>
        <script src="assets/jquery/ui/jquery-ui.min.js"></script>
        <script>
            (function ($) {
                $(document).ready(function () {
                    $(document).accordion({
                        heightStyle: 'content',
                        header: 'div.toggler',
                        collapsible: true,
                        create: function (event, ui) {
                            ui.header.addClass('active');
                            $('div.toggler').attr('tabindex', 0);
                        },
                        activate: function (event, ui) {
                            ui.newHeader.addClass('active');
                            ui.oldHeader.removeClass('active');
                            $('div.toggler').attr('tabindex', 0);
                        }
                    });
                });
            })(jQuery);
        </script>
        <script src="assets/jquery/colorbox/js/colorbox.min.js"></script>
        <script>
            (function ($) {
                $(document).ready(function () {
                    $('a[data-lightbox]').map(function () {
                        $(this).colorbox({
                            loop: false,
                            rel: $(this).attr('data-lightbox'),
                            maxWidth: '95%',
                            maxHeight: '95%'
                        });
                    });
                });
            })(jQuery);
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
            crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.4/holder.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src='main.js'></script>
    </body>

    </html>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.4/holder.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src='main.js'></script>
</body>

</html>