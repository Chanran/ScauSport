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
                    <li>姓名：<?=$data['student' ]['name']?></li>
                    <li>年级：<?=$data['class']['grade']?>级</li>
                    <li>专业：<?=$data['class']['name']?></li>
                </ul>
            </div>
            
            <div data-role="collapsible" data-collapsed="false" data-collapsed-icon="carat-d" data-expanded-icon="carat-u">
                <h4>各项成绩</h4>
                <ul data-role="listview">
					<?php foreach($data['sports'] as $score){?>
						<li>
							<?=$score['name']?>：
							<?php
									$origin = $score['extObj']['bestSimpleScore']['originalScore'];
									if($score['sortIndex'] >= 400 && $score['sortIndex'] < 600){
										$ms = $origin % 1000;
										$tempScore = floor($origin/1000);
										$s = $tempScore % 60;
										$score['score'] = floor($tempScore/60);
										$m = $score['score'];


										if($m) echo $m . ' 分 ';
										if($s) echo $s . ' 秒 ';
										if($ms) echo $ms.' 毫秒';
									} else {
                                        if ($origin < 0 || $score['extObj']['bestSimpleScore']['score'] < 60 ){
                                            echo "请补测!";
                                        }else{

                                            echo $origin . ' ' . $score['unit'];
                                        }

									}
                                    echo " (".$score['extObj']['bestSimpleScore']['text'].")";
                                    echo "<span style='float:right'>评分：".$score['extObj']['bestSimpleScore']['score']."</span>";


							?>
						</li>
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
	<?php echo '<img src="'._cnzzTrackPageView(1256947992).'" width="0" height="0"/>';?>
</body>
</html>