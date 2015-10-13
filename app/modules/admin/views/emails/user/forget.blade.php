<body>
	<h2> Xin chào, {{$name}}</h2>
	<p>Chúng tôi nhận được yêu cầu reset password từ bạn. Để reset password, hãy làm theo hướng dẫn:</p>
	<p> 1. Bấm <a href="{{URL::route('requestResetPassword',array($id,$resetCode))}}" target="_blank">vào đây</a> hoặc theo link bên dưới để yêu cầu reset password:</p>
	<a href="{{URL::route('requestResetPassword',array($id,$resetCode))}}" target="_blank">{{URL::route('requestResetPassword',array($id,$resetCode))}}</a>
	<p> 2. Kiểm tra email lần nữa để nhận Password mới</p>
</body>