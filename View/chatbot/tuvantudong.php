<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');

include('Controller/cTuvanTudong.php');
$tuvan = new cTuvanTudong();
$res1 = $tuvan->select_message();
?>
<style>
	body {
		background-color: #f8f9fa;
		font-family: Arial, sans-serif;
	}

	.messages-box {
		max-height: 400px;
		overflow-y: auto;
		background-color: #fff;
		border: 1px solid #dee2e6;
		border-radius: 5px;
		padding: 10px;
	}

	.message-img {
		width: 20px;
		height: 20px;
		overflow: hidden;
		border-radius: 50%;
	}

	.message-img img {
		width: 40px;
		height: 40px;
	}

	.message-body {
		margin-left: 10px;
	}

	.messages-me .message-body {
		margin-left: auto;
		margin-right: 10px;
		background-color: #d4edda;
		padding: 10px;
		border-radius: 10px;
	}

	.input-group {
		margin-bottom: 20px;
	}
</style>
</head>

<body>
	<div class="container mt-5">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-body messages-box">
						<ul class="list-unstyled messages-list">
							<?php
							$html = '';
							if (mysqli_num_rows($res1) > 0) {
								while ($row = mysqli_fetch_assoc($res1)) {
									$noiDung = $row['noiDung'];
									$added_on = $row['added_on'];
									$strtotime = strtotime($added_on);
									$time = date('h:i A', $strtotime);
									$type = $row['type'];
									if ($type == 'user') {
										$class = "messages-me";
										$imgAvatar = "user_avatar.png";
										$name = "Tôi";
									} else {
										$class = "messages-you";
										$imgAvatar = "bot_avatar.png";
										$name = "Chatbot";
									}
									$html .= '<li class="' . $class . ' clearfix"><span class="message-img"><img style="width: 50px; height: 50px; src="img/' . $imgAvatar . '" class="avatar-sm rounded-circle"></span><div class="message-body clearfix"><div class="message-header"><strong class="messages-title">' . $name . '</strong> <small class="time-messages text-muted"><span class="fas fa-time"></span> <span class="minutes">' . $time . '</span></small> </div><p class="messages-p">' . $noiDung . '</p></div></li>';
								}
								echo $html;
							} else {
							?>
								<li " class=" messages-me clearfix start_chat">
									Hãy bắt đầu
								</li>
							<?php
							}
							?>

						</ul>
					</div>
					<div class="card-footer">
						<div class="input-group">
							<input id="input-me" type="text" name="noiDung" class="form-control" placeholder="Hãy nhập tin nhắn ở đây..." onkeydown="if (event.keyCode == 13) send_msg()">
							<div class="input-group-append">
								<button class="btn btn-primary" type="button" onclick="send_msg()">Send</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script>
		// Function to get current time
		function getCurrentTime() {
			var now = new Date();
			var hh = now.getHours();
			var min = now.getMinutes();
			var ampm = (hh >= 12) ? 'PM' : 'AM';
			hh = hh % 12;
			hh = hh ? hh : 12;
			hh = hh < 10 ? '0' + hh : hh;
			min = min < 10 ? '0' + min : min;
			var time = hh + ":" + min + " " + ampm;
			return time;
		}

		// Function to send message
		function send_msg() {
			$('.start_chat').hide();
			var txt = $('#input-me').val();
			var html = '<li class="messages-me clearfix"><span class="message-img"><img src="img/user_avatar.png" class="avatar-sm rounded-circle"></span><div class="message-body clearfix"><div class="message-header"><strong class="messages-title">Me</strong> <small class="time-messages text-muted"><span class="fas fa-time"></span> <span class="minutes">' + getCurrentTime() + '</span></small> </div><p class="messages-p">' + txt + '</p></div></li>';
			$('.messages-list').append(html);
			$('#input-me').val('');
			if (txt) {
				$.ajax({
					url: 'get_bot_message.php',
					type: 'post',
					data: 'txt=' + txt,
					success: function(result) {
						var html = '<li class="messages-you clearfix"><span class="message-img"><img src="img/bot_avatar.png" class="avatar-sm rounded-circle"></span><div class="message-body clearfix"><div class="message-header"><strong class="messages-title">Chatbot</strong> <small class="time-messages text-muted"><span class="fas fa-time"></span> <span class="minutes">' + getCurrentTime() + '</span></small> </div><p class="messages-p">' + result + '</p></div></li>';
						$('.messages-list').append(html);
						$('.messages-box').scrollTop($('.messages-box')[0].scrollHeight);
					}

				});
			}
		}
	</script>
</body>