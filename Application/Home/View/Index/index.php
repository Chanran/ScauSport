<!DOCTYPE html> 
<html>
<head>
	<title>Sport by iLtc</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
	<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
</head>

<body>
	<div data-role="page" data-dialog="true" data-close-btn="none" id="signin">
        <div data-role="header" data-position="fixed">
            <h1>请先登录</h1>
        </div><!-- /header -->

        <div role="main" class="ui-content">
            <form method="post" action="/Home/Index/main">
                <label for="account" class="ui-hidden-accessible">学号：</label>
                <input type="number" name="account" placeholder="请输入学号" autofocus>
                <label for="password" class="ui-hidden-accessible">四位生日：</label>
                <input type="number" name="password" placeholder="请输入四位生日">
                <input type="submit" class="ui-btn ui-corner-all" value="登录">
            </form>
        </div><!-- /content -->
    </div><!-- /page -->
</body>
</html>