@extends('home.layout.frame')
@section('content')
<div class="main-wrap">

					<div class="am-cf am-padding">
						<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">绑定手机</strong> / <small>Email</small></div>
					</div>
					<hr/>
					<!--进度条-->
					<div class="m-progress">
						<div class="m-progress-list">
							<span class="step-1 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner">1<em class="bg"></em></i>
                                <p class="stage-name">验证手机</p>
                            </span>
							<span class="step-2 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner">2<em class="bg"></em></i>
                                <p class="stage-name">完成</p>
                            </span>
							<span class="u-progress-placeholder"></span>
						</div>
						<div class="u-progress-bar total-steps-2">
							<div class="u-progress-bar-inner"></div>
						</div>
					</div>
					<form class="am-form am-form-horizontal" id="form" action="/home/safety" method="post">
						<div class="am-form-group">
							{{ csrf_field() }}
						
							<label for="user-email" class="am-form-label">验证手机</label>
							<div class="am-form-content">
								<input type="text"  name="telephone" id="telephone" placeholder="请输入正确的手机号">
							</div>
						</div>
						<div class="am-form-group code">
							<label for="user-code" class="am-form-label">验证码</label>
							<div class="am-form-content">
								<input type="tel" id="user-code" name="code" placeholder="验证码">
							</div>
							<!-- <a class="btn" href="javascript:void(0);" onClick="sendPhone(this);" id="sendMobileCode"><div class="am-btn am-btn-danger">点击获取验证码</div></a> -->
							<input type="button" class="am-btn am-btn-danger" value="点击获取验证码" id="sendBtn" onclick="sendPhone(this)">
							
						</div>
						<div class="info-btn">
							<input class="am-btn am-btn-danger" type="submit" value="保存修改">
						</div>

					</form>

				</div>
@endsection