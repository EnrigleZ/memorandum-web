<?php
	// /memorandum/index.html 提交表单项
	//		[username], [status], [msg]
	// 数据库待添加项：[addtime], [ip], [display]
	//echo $_POST["display"], $_POST["username"];
	// $_POST["name in label"]
	
	$servername = "localhost";
	$username = "root";
	$password = "dAUHKGpp91Wy";
	$dbname = "mydb";

	date_default_timezone_set("PRC");

	$default_content = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi id ante sed ex pharetra lacinia sit amet vel massa. Donec facilisis laoreet nulla eu bibendum. Donec ut ex risus. Fusce lorem lectus, pharetra pretium massa et, hendrerit vestibulum odio lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi id ante sed ex pharetra lacinia sit amet vel massa. Donec facilisis laoreet nulla eu bibendum. Donec ut ex risus. Fusce lorem lectus, pharetra pretium massa et, hendrerit vestibulum odio lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi id ante sed ex pharetra lacinia sit amet vel massa. Donec facilisis laoreet nulla eu bibendum. Donec ut ex risus. Fusce lorem lectus, pharetra pretium massa et, hendrerit vestibulum odio lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi id ante sed ex pharetra lacinia sit amet vel massa. Donec facilisis laoreet nulla eu bibendum. Donec ut ex risus. Fusce lorem lectus, pharetra pretium massa et, hendrerit vestibulum odio lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi id ante sed ex pharetra lacinia sit amet vel massa. Donec facilisis laoreet nulla eu bibendum. Donec ut ex risus. Fusce lorem lectus, pharetra pretium massa et, hendrerit vestibulum odio lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi id ante sed ex pharetra lacinia sit amet vel massa. Donec facilisis laoreet nulla eu bibendum. Donec ut ex risus. Fusce lorem lectus, pharetra pretium massa et, hendrerit vestibulum odio lorem ipsum dolor sit amet.";
	$default_title = "Magna etiam feugiat";
	$conn = new mysqli($servername, $username, $password, $dbname);

	$add_flag = 0;	// 本次为添加跳转（msg is null）
	if(!empty($_POST["msg"])) {
		$add_flag = 1;

		$addtime = date('y-m-d H:i:s', time()); 
		$ip = $_SERVER["REMOTE_ADDR"];
		
		if($_POST["display"] == TRUE) $display = 'TRUE';
		else $display = 'FALSE';

		$sql_insert = 
						"INSERT INTO comment(
								username, status, msg, addtime, ip, display
						)
		 				VALUES(
							 	'{$_POST["username"]}', '{$_POST["status"]}',
								'{$_POST["msg"]}', '$addtime', '$ip', $display 
						);";
		$conn->query($sql_insert);
	}

?>

<html>
	<head>
		<title>Your Secrets</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/reminder.css" />
		<link rel="shortcut icon" href="images/icon.png">
		<script src="assets/js/style.js"></script>
		<script src="assets/js/reminder.js"></script>
	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper" class="divided">

				<!-- One -->
					<section class="banner style1 orient-left content-align-left image-position-right fullscreen onload-image-fade-in onload-content-fade-right">
						<div class="content">
							<form method="post", action="">
								<div class="field half first">
									<label for="username">Name</label>
									<input type="text" name="username" id="username" value="" />
								</div>
								<div class="field half">
									<label for="status">Status</label>
									<input type="text" name="status" id="status" value="" />
								</div>
								<div class="field">
									<label for="message">Message</label>
									<textarea name="msg" id="msg" rows="6"></textarea>
								</div>
								<ul class="actions">
									<li> 
										<center>
										<input onclick="changeSendCondition();" name="submit" id="submit_button" type="submit" value="Send">
										<input onclick="changeDisplayCondition();" style="background-color: pink;" 
												name="display_button" id="display_button" type="button" value="Private">
										</center>
									</li>
									<input id="display" name="display" value=0 style="display:none;">
								</ul>
							</form>
						</div>
						<div class="image">
							<img src="images/banner.jpg" alt="" />
						</div>
					</section>


					<!-- Six -->
					<section class="wrapper style1 align-center">
						<div class="inner">
							<h2>这个地方该用来干啥呢...</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi id ante sed ex pharetra lacinia sit amet vel massa. Donec facilisis laoreet nulla eu bibendum. Donec ut ex risus. Fusce lorem lectus, pharetra pretium massa et, hendrerit vestibulum odio lorem ipsum.</p>
							<div class="items style1 medium onscroll-fade-in">
								<section>
									<span class="icon style2 major fa-diamond"></span>
									<h3>Lorem</h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi dui turpis, cursus eget orci amet aliquam congue semper. Etiam eget ultrices risus nec tempor elit.</p>
								</section>
								<section>
									<span class="icon style2 major fa-save"></span>
									<h3>Ipsum</h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi dui turpis, cursus eget orci amet aliquam congue semper. Etiam eget ultrices risus nec tempor elit.</p>
								</section>
								<section>
									<span class="icon style2 major fa-bar-chart"></span>
									<h3>Dolor</h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi dui turpis, cursus eget orci amet aliquam congue semper. Etiam eget ultrices risus nec tempor elit.</p>
								</section>
								<section>
									<span class="icon style2 major fa-wifi"></span>
									<h3>Amet</h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi dui turpis, cursus eget orci amet aliquam congue semper. Etiam eget ultrices risus nec tempor elit.</p>
								</section>
								<section>
									<span class="icon style2 major fa-cog"></span>
									<h3>谁来认领一下这条</h3>
									<p>你好！我是北京海淀区公安局信息安全小组0701，经查，此网站涉嫌发布政治反动言论，请尽快与我们联系配合调查！</p>
								</section>
								<section>
									<span class="icon style2 major fa-paper-plane"></span>
									<h3>Tempus</h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi dui turpis, cursus eget orci amet aliquam congue semper. Etiam eget ultrices risus nec tempor elit.</p>
								</section>
								<section>
									<span class="icon style2 major fa-desktop"></span>
									<h3>Aliquam</h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi dui turpis, cursus eget orci amet aliquam congue semper. Etiam eget ultrices risus nec tempor elit.</p>
								</section>
								<section>
									<span class="icon style2 major fa-refresh"></span>
									<h3>Elit</h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi dui turpis, cursus eget orci amet aliquam congue semper. Etiam eget ultrices risus nec tempor elit.</p>
								</section>
								<section>
									<span class="icon style2 major fa-hashtag"></span>
									<h3>Morbi</h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi dui turpis, cursus eget orci amet aliquam congue semper. Etiam eget ultrices risus nec tempor elit.</p>
								</section>
								<section>
									<span class="icon style2 major fa-bolt"></span>
									<h3>Turpis</h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi dui turpis, cursus eget orci amet aliquam congue semper. Etiam eget ultrices risus nec tempor elit.</p>
								</section>
								<section>
									<span class="icon style2 major fa-envelope"></span>
									<h3>Ultrices</h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi dui turpis, cursus eget orci amet aliquam congue semper. Etiam eget ultrices risus nec tempor elit.</p>
								</section>
								<section>
									<span class="icon style2 major fa-leaf"></span>
									<h3>Risus</h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi dui turpis, cursus eget orci amet aliquam congue semper. Etiam eget ultrices risus nec tempor elit.</p>
								</section>
							</div>
						</div>
					</section>

					<!-- 这里进入文章-->
					<?php
						$sql_select_article = "SELECT * FROM article WHERE display ORDER BY addtime DESC;";
						$result_article = $conn->query($sql_select_article);
						$article_cnt = 0;

						function createArticleSection() {
							global $result_article, $article_cnt, $default_content, $default_title;

							$row = $GLOBALS["result_article"]->fetch_assoc();
							if ($row) {
								$article_title = $row["title"];
								$article_content = $row["content"];
							}
							else {
								return 0;
								//$article_title = $default_title;
								//$article_content = $default_content;
							}

							$GLOBALS["article_cnt"] ++;
							
							if ($row["titlepicture"] == "") {
								$tmp = $GLOBALS["article_cnt"] % 3 + 1;
								$pic_path = "images/spotlight0{$tmp}.jpg";
							}
							else $pic_path = "images/".$row["titlepicture"];
							
							if ($GLOBALS["article_cnt"] % 2 == 1) {
								echo '<section class="spotlight style1 orient-right content-align-left image-position-center onscroll-image-fade-in">';
							}
							else {
								echo '<section class="spotlight style1 orient-left content-align-left image-position-center onscroll-image-fade-in">';
							}
						
							echo '<div class="content article">';
						
							echo'<h2>';
									echo $article_title; 
							echo'</h2>
								<p class="articletext">';
									echo $article_content;
									// 如果这里手机端发现初始最大长度不太对
									// 就试着把max height 改一下
							echo'</p>
								<ul class="actions vertical">
									<li><a onclick="unfoldArticle(this);" class="button">Read More</a></li>
								</ul>
								</div>
								<div class="image article">
									<img src="';
							echo $pic_path;
							echo'" alt="" />
								</div>
							</section>';

							return 1;
						}
					?>
				<!-- Two -->
					<?php 
						while (createArticleSection());
					?>
				<!-- Three -->
					
                    
				<!-- Seven -->
					<section class="wrapper style1 align-center">
						<div class="inner medium">
							<h1>Story</h1>
							<p class="major"><!--[-->A (modular, highly tweakable) responsive one-page template designed by <a href="#">HTML5 UP</a> and released for free under the <a href="#">Creative Commons</a>.<!--]--></p>
							<ul class="actions vertical">
								<li><a href="#first" class="button big wide smooth-scroll-middle">Get Started</a></li>
							</ul>

						</div>
					</section>

				<!-- Footer -->
					<footer class="wrapper style1 align-center">
						<div class="inner">
							<ul class="icons">
								<li><a href="#" class="icon style2 fa-twitter"><span class="label">Twitter</span></a></li>
								<li><a href="#" class="icon style2 fa-facebook"><span class="label">Facebook</span></a></li>
								<li><a href="dashboard.html" target="_blank" class="icon style2 fa-instagram"><span class="label">Instagram</span></a></li>
								<li><a href="#" class="icon style2 fa-linkedin"><span class="label">LinkedIn</span></a></li>
								<li><a href="#" class="icon style2 fa-envelope"><span class="label">Email</span></a></li>
							</ul>
							<!--<p>&copy; Untitled. More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a>.</p>-->
						</div>
					</footer>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
			<script>
			
				$(function (){
					<?php	
						$strAlertFunc = 'sweetAlert("添加成功", "PS:这个是根据反馈加入的小特性", "success");';
						if ($add_flag > 0) echo $strAlertFunc;
					?>
				});
					
			
			</script>
			
	</body>
</html>

<?php
	// Read articles from table [article]
	$result_article->close();
	$conn->close();
?>