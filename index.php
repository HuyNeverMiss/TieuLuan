<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GEMSTONEs</title>
    <link rel="icon"
        href="https://cdn1.iconfinder.com/data/icons/web-65/48/78-512.png"
        type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.0/css/font-awesome.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/responsive.css">
    <link rel="stylesheet" href="./assets/font/themify-icons/themify-icons.css">
</head>

<body>
    <?php
        session_start();
        include("./admincp/config/config.php");
        include("./assets/pages/header.php");
        include("./assets/pages/main.php");
        include("./assets/pages/footer.php");
     ?>
    <script>
    var header = document.getElementById('header');
    var mobileMenu = document.getElementById('mobile-menu');
    var headerHeight = header.clientHeight;
    mobileMenu.onclick = function() {
        var isClosed = header.clientHeight === headerHeight;
        if (isClosed) {
            header.style.height = 'auto';
        } else {
            header.style.height = null;
        }
    }
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript">
    // Show the first tab and hide the rest
    $('#tabs-nav li:first-child').addClass('active');
    $('.tab-content').hide();
    $('.tab-content:first').show();
    // Click function
    $('#tabs-nav li').click(function() {
        $('#tabs-nav li').removeClass('active');
        $(this).addClass('active');
        $('.tab-content').hide();

        var activeTab = $(this).find('a').attr('href');
        $(activeTab).fadeIn();
        return false;
    });
    </script>
    <script>
    $(document).ready(function() {

        var back = $(".prev");
        var next = $(".next");
        var steps = $(".step");

        next.bind("click", function() {
            $.each(steps, function(i) {
                if (!$(steps[i]).hasClass('current') && !$(steps[i]).hasClass('done')) {
                    $(steps[i]).addClass('current');
                    $(steps[i - 1]).removeClass('current').addClass('done');
                    return false;
                }
            })
        });
        back.bind("click", function() {
            $.each(steps, function(i) {
                if ($(steps[i]).hasClass('done') && $(steps[i + 1]).hasClass('current')) {
                    $(steps[i + 1]).removeClass('current');
                    $(steps[i]).removeClass('done').addClass('current');
                    return false;
                }
            })
        });

    })
    </script>
</body>

</html>