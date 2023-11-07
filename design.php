<!DOCTYPE html>
		<html>
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<!-- <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet" />
		<link href="https://fonts.googleapis.com/css2?family=Tangerine&display=swap" rel="stylesheet" /> -->
		<!-- <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet"> -->
		<style>
			/* @font-face {
				font-family: "Meiryo_Bold.ttf";
				src: url("./fonts/Meiryo_Bold.ttf");
				font-weight: bold;
				font-style: italic;
			}

			@font-face {
				font-family: "Meiryo_Bold.ttf";
				src: url("./fonts/Meiryo_Bold.ttf");
				font-weight: bold;
				font-style: normal;
			} */

			* {
				/* color: red; */
				font-size:12px;
				font-weight: normal;
				font-style: normal;
			}

			.bold {
				font-family: "Meiryo_Bold.ttf";
				src: url("./fonts/Meiryo_Bold.ttf");
				font-weight: bold;
			}

			/* @page {
					margin: 180px 50px;
				} */

			.container {
				margin-left:40px;
				margin-top: -40px
			}

			#header {
				/* position: fixed; */
				/* left: 0px; */
				/* top: -180px; */
				/* right: 0px; */
				/* height: 150px; */
				/* background-color: orange; */
				/* text-align: center; */
			}

			#footer {
				position: fixed;
				left: 0px;
				bottom: -40px;
				right: 0px;
				height: 150px;
				/* background-color: lightblue; */
			}

			.header-1 {
				display: block;
				/* text-align: end; */
				text-decoration: underline;
				float: right;
				/* padding: 20px; */
			}

			.header-2 {
				display: block;
				text-align: center;
				/* text-decoration: underline; */
				clear: both;
				/* padding: 20px; */
			}

			/* .content--left {
				width: 70%;
			}

			.content--right {
				width: 70%;
			} */

			#footer .page:after {
					/* content: counter(page, upper-roman); */
					content: counter(page)
			}

			.content__table, th, td {
				border: 1px solid black;
				border-collapse: collapse;
			}

			.content__table, th, td:nth-child(1){
				width:40px;
				text-align: center; 
				/* vertical-align: middle; */
			}

			.content{
				display: table;
				width: 100%;
			}

			.content--left {
				display: table-cell;
				width: 70%;
				padding-right: 20px;
			}

			.content--right {
				display: table-cell;
				width: 30%;
			}

			.footer__table {
				display: table;
				width: 100%;
				height: 100px;

			}

			.footer__table--left {
				display: table-cell;
				width: 25%;
				/* text-align: center;
				vertical-align: middle; */
				/* margin: 0; */
				/* position: absolute; */
				/* top: 50%; */
				/* -ms-transform: translateY(-50%); */
				/* transform: translateY(-50%); */
				/* padding-right: 20px; */
			}

			.footer__table--center {
				display: table-cell;
				width: 30%;
			}

			.footer__table--right {
				display: table-cell;
				/* width: 30%; */
			}
			.footer__table .page-1 {
				border: solid;
				height: 80px;
				width: 80px;
				position: relative;

				/* margin-left: 20px; */
			}

			.footer__position {
				/* border: 5px solid; */
				position: absolute;
				top: 50%;
				transform: translate(0, -50%);
				padding: 10px;
			}

			.footer__table .page-2 {
				height: 80px;
				width: 350px;
			}

			.footer__table .page-3 {
				border: solid;
				width: 70px;
				height: 70px;
				margin-left: 40px;
			}

			.footer__table--center .spacing {
				padding-left: 30px;
			}

			p {
				line-height: 5px;
			}

			.footer__table .page-2 p {
				line-height: 1px;
			}

		</style>

		<body>
		
			<div class="container">
				<div id="header">
					<div class="header-1"><span style="font-weight: bold;">No.139</span></div>
					<div class="header-2">
						<div><strong class="bold" style="font-size:25px;">領 収 証</strong></div>
						<div>2023年 9月 26日</div>
						<!-- <div><a href="https://google.com">google.com</a></div> -->
						<!-- <div><a name="blah">link location</a></div> -->
					</div>
				</div>
				<div id="info">
						<p>336-0004</p>
						<p>埼玉県さいたま市大崎</p>
						<p>１ー２ー３</p>
						<p>株式会社オリエント技研商事様</p>
				</div>

				<div class="content">
					<div class="content--left">
						<!-- Content on the left side -->
						<hr>
						<p style="padding-left: 40px;">金額</p>
						<p style="float: right; padding-right: 40px;">¥645, 150ー</p>
						<hr style="clear:both; ">
						<p>但し、</p>
						<p>上記の通り正に領収致しました。</p>
					</div>
					<div class="content--right">
						<!-- Table on the right side -->
						<table class="content__table" style="width:100%">
							<tr>
								<th colspan="2">
									<p style="float: left;padding-left: 20px;">他の場所に</p>
									<p style="clear: both;padding-left: 100px;">58,650</p>
								</th>
							</tr>
							<tr>
								<td>現金</td>
								<td>　</td>
							</tr>
							<tr>
								<td>現金</td>
								<td>　</td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
			
			<div id="footer">
				<div class="footer__table">
					<!-- <div style="float:right" class="page">Page </div> -->
					<div class="footer__table--left"><div class="page-1"><div class="footer__position"><p>取入印紙</p></div></div></div>
					<div class="footer__table--center">
						<div class="page-2">
							<img src="./images/sorimachi_kabu_logo.png" width="60%"/>
							<!-- <p>サンブル商事株式会社</p>
							<p>東京支社</p>
							<p>141-0001 東京都品川区北品川5-10-20 </p>
							<p class="spacing">サンプルビル2F </p>
							<p class="spacing">TEL:03-9876-5432 FAX: 03-9876-1234 </p>
							<p class="spacing">担当者: 長谷川 国男</p> -->
							<p class="bold">東京本社</p>
							<p>〒100-0004　東京都千代田区大手町1丁目9-7</p>
							<p>大手町フィナンシャルシティサウスタワー 東京金融ビレッジ5階</p>
							<p>TEL.03-6773-7530　FAX.03-6685-4470</p>
						</div>
					</div>
					<div class="footer__table--right"><div class="page-3">Page3 </div></div>
				</div>
			</div>
		</body>
		</html>