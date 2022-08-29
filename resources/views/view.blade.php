<!DOCTYPE HTML>
<html>
<head>

    <title>User Card - User Name</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
     @vite(['resources/css/main.css'])
    <noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
</head>
<body class="is-preload">

<div id="wrapper">
    <section id="main">
        <header>
            <span class="avatar"><img src="https://picsum.photos/200/300" alt="some script" /></span>
            <h1>Usern Name</h1>
            <p>User Coments</p>
        </header>
    </section>
    <footer id="footer">
        <ul class="copyright">
            <li>&copy; Pictureworks</li>
        </ul>
    </footer>

</div>
<script>
    if ('addEventListener' in window) {
        window.addEventListener('load', function() { document.body.className = document.body.className.replace(/\bis-preload\b/, ''); });
        document.body.className += (navigator.userAgent.match(/(MSIE|rv:11\.0)/) ? ' is-ie' : '');
    }
</script>
</body>
</html>
