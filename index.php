<?php
/**
  This file is part of FREE DEED POLL.org.

  Copyright © 2013 Deed Poll Office Ltd

  FREE DEED POLL.org is free software: you can redistribute it and/or modify
  it under the terms of the GNU Affero General Public License as
  published by the Free Software Foundation, either version 3 of the
  License, or (at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU Affero General Public License for more details.

  You should have received a copy of the GNU Affero General Public License
  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
?>
<?php
    $rootDir = __DIR__;
    setcookie('seen_cookie_notice', '1', 0, '/');

    $page = null;
    if (preg_match('!^/([a-z][a-z.-]*)?(\?|$)!i', $_SERVER['REQUEST_URI'], $matches)) {
        if (isset($matches[1])) $page = $matches[1];
        if ($page == '') $page = 'form';
        if ($page != strtolower($page)) {
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: /" . strtolower($page));
            die;
        }
    }
    if ($is404 = !in_array($page, $pages = [ 'form', 'deed-poll', 'download', 'terms', 'privacy', 'cookies', 'about', 'who-we-are', 'what-next', 'names', 'robots.txt' ])) {
        header('HTTP/1.1 404 Not Found');
    }
    if ($page == 'robots.txt') {
        include "$rootDir/robots.txt.php";
        die;
    }
    if (in_array($page, [ 'form', 'deed-poll', 'download' ])) {
        $data = [
            'old_name'                 => ''  ,
            'new_name'                 => ''  ,
            'address_line_1'           => ''  ,
            'address_line_2'           => ''  ,
            'address_city'             => ''  ,
            'address_zip'              => ''  ,
            'date'                     => ''  ,
            'suitable_for_enrolment'   => ''  ,
            'marital_status'           => ''  ,
            'citizenship'              => ''  ,
            'witness_1_name'           => ''  ,
            'witness_1_address_line_1' => ''  ,
            'witness_1_address_line_2' => ''  ,
            'witness_1_address_city'   => ''  ,
            'witness_1_address_zip'    => ''  ,
            'witness_1_occupation'     => ''  ,
            'use_second_witness'       => '1' ,
            'witness_2_name'           => ''  ,
            'witness_2_address_line_1' => ''  ,
            'witness_2_address_line_2' => ''  ,
            'witness_2_address_city'   => ''  ,
            'witness_2_address_zip'    => ''  ,
            'witness_2_occupation'     => ''  ,
            ];
        $formIsValid = true;
        foreach ($data as $key => $value) {
            $value = isset($_REQUEST[$key]) ? trim($_REQUEST[$key]) : $value;
            $error = null;
            if ( isset($_POST) &&
                 $_POST &&
                 $value == '' &&
                 ( ( !in_array($key, [ 'address_line_2', 'marital_status', 'citizenship', 'witness_1_address_line_2', 'use_second_witness' ]) &&
                     !preg_match('/^witness_2_/', $key)
                     ) ||
                   ( ( $data['use_second_witness']['value'] || $data['suitable_for_enrolment']['value'] ) &&
                     preg_match('/^witness_2_/', $key) &&
                     $key != 'witness_2_address_line_2'
                     ) ||
                   ( $data['suitable_for_enrolment']['value'] &&
                     in_array($key, [ 'marital_status', 'citizenship' ])
                     ) ||
                   ( !$data['suitable_for_enrolment']['value'] &&
                     $key == 'use_second_witness'
                     )
                   )
                 ) {
                if (isset($_POST) && $_POST) $error = 'This field is required';
                $formIsValid = false;
            }
            $data[$key] = [
                'value' => $value ,
                'error' => $error ,
                ];
        }

        $params = [];
        foreach ($data as $key => $value) $params[$key] = $value['value'];

        if ($page == 'form' && isset($_POST) && $_POST && $formIsValid) {
            header("HTTP/1.1 303 See Other");
            header("Location: /deed-poll?" . http_build_query($params));
            die;
        }
    }

    if ($page == 'download') {
        include "$rootDir/include/" . ($page ?: 'form') . '.php';
        die;
    }

?>
<!DOCTYPE html>
<!-- Copyright © 2013 Deed Poll Office Ltd -->
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <title>FREE DEED POLL.org</title>
    <meta name="description" content="Create your own deed poll">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="canonical" href="/<?php echo htmlspecialchars($page == 'form' ? '' : $page); ?>" />
<?php if (in_array($page, [ 'deed-poll' ])) { ?>
    <meta name="robots" content="noindex" />
<?php } ?>

    <!--[if gte IE 8]><!-->
      <link href="/css/freedeedpoll.min.css" rel="stylesheet" media="screen">
    <!--<![endif]-->
    <!--[if lt IE 8]>
      <link href="/css/freedeedpoll-2.min.css" rel="stylesheet" media="screen">
    <![endif]-->

    <script>(function(d){d.className=d.className.replace(/\bno-js\b/,'js')})(document.documentElement)</script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="/js/html5shiv.js"></script>
      <script src="/js/respond.min.js"></script>
    <![endif]-->
    <script src="//code.jquery.com/jquery.js"></script>
</head>

<body>
    <!-- Wrap all page content here -->
    <div id="wrap">

    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container navbar-inner">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand brand" href="/">FREE DEED POLL.org</a>
        </div>
        <div class="navbar-collapse nav-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="/">Home</a></li>
            <li><a href="/about">About this site</a></li>
            <li><a href="/who-we-are">Who we are</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="container">
        <!--[if lt IE 7]>
            <div class="alert alert-danger"><strong>Your browser is out of date. Please <a href="http://browsehappy.com/">upgrade your browser</a> or install <a href="http://www.google.com/chromeframe">Chrome Frame</a> to improve your experience.</strong></div>
        <![endif]-->
        <?php if ($is404) { ?>
            <h1>404 Page not found</h1>
        <?php } else {
            $include = "$rootDir/include/" . ($page ?: 'form') . '.php';
            if (!file_exists($include)) $include = "$rootDir/include/static/$page.php";
            include $include;
        } ?>
    </div>

    </div><!-- end div#wrap -->

    <div id="footer">
      <div class="container">
        <p>
            <small>This site is owned and operated by <strong><a href="http://deed-poll-office.org.uk/">Deed Poll Office Ltd</a></strong>. Registered in England n<sup>o</sup> 8126967. Registered office: 24 Nicholas Street, Chester, CH1 2AU, U.K.<br />
            <a href="/about">About this site</a> | <a href="/who-we-are">Who we are</a> | <a href="/terms">Terms</a> | <a href="/privacy">Privacy</a> | <a href="/cookies">Cookies</a></small>
        </p>
      </div>
    </div>

<?php if (!isset($_COOKIE['seen_cookie_notice'])) { ?>
    <div class="cookie-notice">
        <i class="icon-info-sign"></i> This site uses cookies so it can work correctly. By carrying on using this site, you agree to our use of cookies.
        &nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-primary btn-xs" href="#">OK</a>
        &nbsp;&nbsp;<a href="/cookies">Learn more</a>
    </div>
<?php } ?>


    <script>
        (function(a,b,c,d,e,f){a.GoogleAnalyticsObject=d;a[d]||(a[d]=
        function(){(a[d].q=a[d].q||[]).push(arguments)});a[d].d=+new Date;
        e=b.createElement(c);f=b.getElementsByTagName(c)[0];
        e.src='//www.google-analytics.com/analytics.js';
        f.parentNode.insertBefore(e,f)}(window,document,'script','ga'));
        ga('create','UA-34092070-2');ga('send','pageview');
    </script>

    <!--[if gte IE 8]><!-->
      <script src="/js/bootstrap.min.js"></script>
    <!--<![endif]-->

    <script>
        $(document).ready(function() {
            $('div.cookie-notice a.btn').click(function() {
                $(this).parents('div.cookie-notice').hide();
                return false;
            });
        });
    </script>

  </body>
</html>
