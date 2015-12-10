<!DOCTYPE html> 
<html>
<head>
	<title>橙子快跑</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
	<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
</head>

<body>
	<div data-role="page" data-dialog="true">
        <div data-role="header" data-position="fixed">
            <h1>错误</h1>
        </div><!-- /header -->

        <div role="main" class="ui-content">
            <p>
				我们在搜索过程中遇到了以下错误，请重试：<?=$error[1]?>。错误码：<?=$error[0]?>
			</p>
			<a href="#" data-rel="back" class="ui-btn ui-shadow ui-corner-all ui-btn-a">重试</a>
        </div><!-- /content -->
    </div><!-- /page -->
</body>
</html>