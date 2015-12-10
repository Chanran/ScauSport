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
	<div data-role="page">
        <div role="main" class="ui-content">
            <div data-role="collapsible" data-collapsed-icon="carat-d" data-expanded-icon="carat-u">
                <h4>学生信息</h4>
                <ul data-role="listview">
                    <li>姓名：<?=$data['student']['name']?></li>
                    <li>年级：<?=$data['classe']['gradeNumber']?>级</li>
                    <li>专业：<?=$data['classe']['name']?></li>
                </ul>
            </div>
            
            <div data-role="collapsible" data-collapsed="false" data-collapsed-icon="carat-d" data-expanded-icon="carat-u">
                <h4>各项成绩</h4>
                <ul data-role="listview">
					<?php foreach($data['scores'] as $score){?>
						<li><?=$score['sportName']?>：<?=$score['score']?></li>
					<?php }?>
                </ul>
            </div>
			
			<div data-role="collapsible" data-collapsed="false" data-collapsed-icon="carat-d" data-expanded-icon="carat-u">
                <h4>总成绩</h4>
                <ul data-role="listview">
					<li>标准分：<?=$data['healthScore']['score']?></li>
					<li>附加分：<?=$data['healthScore']['attachScore']?></li>
					<li>总分：<?=($data['healthScore']['score'] + $data['healthScore']['attachScore'])?></li>
					<li>等级：<?=$data['healthScore']['levelText']?></li>
                </ul>
            </div>
			
			<div data-role="collapsible" data-collapsed="false" data-collapsed-icon="carat-d" data-expanded-icon="carat-u">
                <h4>身高体重指数</h4>
                <ul data-role="listview">
					<li>指数：<?=$data['BMI']['qualyScore']?></li>
					<li>等级：<?=$data['BMI']['levelText']?></li>
                </ul>
            </div>
			
			<div data-role="collapsible" data-collapsed-icon="carat-d" data-expanded-icon="carat-u">
                <h4>训练建议</h4>
                <?=$data['trainTip']?>
            </div>
			
			<a href="/" data-rel="back" class="ui-btn ui-shadow ui-corner-all ui-btn-a">重新查询</a>
        </div><!-- /content -->
    </div><!-- /page -->
</body>
</html>