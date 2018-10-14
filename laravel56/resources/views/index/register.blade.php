<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
        <meta name="author" content="order by dede58.com"/>
		<title>用户注册</title>
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('/user/css/login.css') }}">

<!-- <img src="{{ URL::asset('/user/image/mistore_logo.png') }}" alt=""> -->
		<!-- <base href="./user"> -->
			<!-- <img src="{{URL::asset('mistorve_logo.png')}}./user/image/mistorve_logo.png" alt=""> -->
<!-- <img src="{{ URL::asset('/user/image/yanzhengma.jpg') }}" alt=""> -->

	</head>
	<body>
		<form  method="post" action="{{url('index/registerOperation')}}">
				{{ csrf_field() }}
		<meta name="csrf-token" content="{{ csrf_token() }}"> 
		<div class="regist">
			<div class="regist_center">
				<div class="regist_top">
					<div class="left fl">会员注册</div>
					<div class="right fr"><a href="{{url('shop/index')}}" target="_self">小米商城</a></div>
					<div class="clear"></div>
					<div class="xian center"></div>
				</div>
				<div class="regist_main center">
					<div class="username">用&nbsp;&nbsp;户&nbsp;&nbsp;名:&nbsp;&nbsp;<input class="shurukuang" type="text" name="username" id="username" onblur="useName()" placeholder="请输入你的用户名"/></div>
					<div class="username">手&nbsp;&nbsp;机&nbsp;&nbsp;号:&nbsp;&nbsp;<input class="shurukuang" type="text" name="mobile" id="mobile" onblur="Mobile()" placeholder="请输入你的手机号"/></div>
					<div class="username">邮&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;箱:&nbsp;&nbsp;<input class="shurukuang" type="email" name="mail" id="mail" onblur="Mail()" placeholder="请输入你的密码"/><span>请输入正确的邮箱</span></div>
					
					<div class="username">密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码:&nbsp;&nbsp;<input class="shurukuang" type="password" name="password" id="password" onblur="Password()" placeholder="请输入你的密码"/><span>请输入6位以上字符</span></div>
					
					<div class="username">确认密码:&nbsp;&nbsp;<input class="shurukuang" type="password" name="confirmpassword" id="confirmpassword" onblur="confirmPassword()" placeholder="请确认你的密码"/></div>
					<!-- <div class="username">手&nbsp;&nbsp;机&nbsp;&nbsp;号:&nbsp;&nbsp;<input class="shurukuang" type="text" name="tel" placeholder="请填写正确的手机号"/><span>填写下手机号吧，方便我们联系您！</span></div> -->
					<div class="username">
						<div class="left fl">验&nbsp;&nbsp;证&nbsp;&nbsp;码:&nbsp;&nbsp;<input class="yanzhengma" type="text" name="yzm" placeholder="请输入验证码"/></div>
						<div class="right fl"><img src="{{ URL::asset('/user/image/yanzhengma.jpg') }}"></div>
						<div class="clear"></div>
					</div>
				</div>
				<div class="regist_submit">
					<input class="submit" type="submit" name="submit" value="立即注册" >
				</div>
			</div>
		</div>
		</form>
	</body>
	  	<script src="{{ URL::asset('/user/js/jquery.js')}}"></script>
		<script src="{{ URL::asset('/user/js/bootstrap.min.js')}}"></script>
		<script type="text/javascript" src="{{URL::asset('user/js/jquery.backstretch.min.js')}}"></script>
	<script>
	 $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
	// 用户名验证
	function useName()
	{
		var username = document.getElementById('username').value;
		if (username == "") {
			alert("用户名不能为空");
		};
	}
	// 电话号验证
	function Mobile()
	{
		var mobile = document.getElementById('mobile').value;
		var mobileRegular = "/^[0-9]{11}$/";
		if (mobile=="") {
            alert("电话号不能为空");
        }else if (!preg_match(mobileRegular, mobile)) {
            alert("电话号请输入11位数字");
        }
	}
	// 邮箱验证
	function Mail()
	{
		var mail = document.getElementById('mail').value;
		var mailRegular = '/^([a-zA-Z0-9]{2,})@([a-zA-Z0-9]{2,})(.)([a-zA-Z0-9]{2,3})$/';
        if (mail == "") {
            alert("邮箱不能为空");
        }else if (!preg_match(mailRegular, mail)) {
            alert("请输入正确的邮箱");
        }
	}
	// 密码验证
	function Password()
	{
		var password = document.getElementById('password').value;
		var passwordRegular = '/^[a-zA-Z0-9]{6,}$/';
		if (password == "") {
            alert("密码不能为空");
        }else if (!preg_match(passwordRegular, password)) {
            alert("请输入6位以上的密码");
        }
	}
	function confirmPassword()
	{
		var password = document.getElementById('password').value;
		var confirmpassword = document.getElementById('confirmpassword').value;
		if (password != confirmpassword) {
			alert("确认密码与密码不一致");
		};
	}
	</script>
</html>