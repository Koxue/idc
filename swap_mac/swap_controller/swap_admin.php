<?php 
import("swap.File");
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') inrpc(true);
class swap_admin extends controller {
	function rpc() {
		echo "RPC function deleted";
	}
	function login() {
		if(!isset($_GET['dologin'])){
			session('adminlogin', null);
			if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') die('<meta http-equiv="refresh" content="0; url=/index.php/Admin/Login/" />');
			echo "<!DOCTYPE html><html><head><title>SWAPIDC|Login</title><meta content=\"width=device-width, initial-scale=1\"name=\"viewport\"/><meta charset=\"UTF-8\"><meta name=\"author\"content=\"Shiyunjin\"/><link rel=\"dns-prefetch\" href=\"//yun.swap.wang\" /><link rel=\"dns-prefetch\" href=\"//login.swap.wang\" /><link href='https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700'rel='stylesheet'type='text/css'><link href=\"/admin_assets/plugins/pace-master/themes/blue/pace-theme-flash.css\"rel=\"stylesheet\"/><link href=\"/admin_assets/plugins/uniform/css/uniform.default.min.css\"rel=\"stylesheet\"/><link href=\"/admin_assets/plugins/bootstrap/css/bootstrap.min.css\"rel=\"stylesheet\"type=\"text/css\"/><link href=\"https://cdn.bootcss.com/font-awesome/4.3.0/css/font-awesome.min.css\"rel=\"stylesheet\"type=\"text/css\"/><link href=\"/admin_assets/plugins/line-icons/simple-line-icons.css\"rel=\"stylesheet\"type=\"text/css\"/><link href=\"/admin_assets/plugins/waves/waves.min.css\"rel=\"stylesheet\"type=\"text/css\"/><link href=\"/admin_assets/plugins/switchery/switchery.min.css\"rel=\"stylesheet\"type=\"text/css\"/><link href=\"/admin_assets/plugins/3d-bold-navigation/css/style.css\"rel=\"stylesheet\"type=\"text/css\"/><link href=\"/admin_assets/css/modern.min.css\"rel=\"stylesheet\"type=\"text/css\"/><link href=\"/admin_assets/css/custom.css\"rel=\"stylesheet\"type=\"text/css\"/><script src=\"/admin_assets/plugins/3d-bold-navigation/js/modernizr.js\"></script><link href=\"/admin_assets/plugins/toastr/toastr.min.css\"rel=\"stylesheet\"type=\"text/css\"/></head><body class=\"page-login\"><main class=\"page-content\"><div class=\"page-inner\"><div id=\"main-wrapper\"><div class=\"row\"><div class=\"col-md-3 center\"><div class=\"login-box\"><a href=\"index.html\" class=\"logo-name text-lg text-center\">SWAPIDC</a><p class=\"text-center m-t-md\">请登录您的账号</p><form class=\"m-t-md login\"><div class=\"form-group\"><input type=\"text\" name=\"username\" class=\"form-control\" placeholder=\"Username or Email\" required></div><div class=\"form-group\"><input type=\"password\" name=\"password\" class=\"form-control\" placeholder=\"Password\" required></div><a href=\"javascript:void(0);\" onclick=\"\$('.btn-login').attr('disabled',true).text('Loading..');\$.post('/index.php/admin/login/?dologin',\$('.login').serialize(),function(data){ if(data.error==1) \$('.btn-login').attr('disabled',false);\$('.btn-login').text(data.msg);if(data.error==0) location.href='/index.php/admin/';},'json');\" class=\"btn btn-success btn-block btn-login\">Login</a></form><p class=\"text-center m-t-xs text-sm\">2015 &copy; Powered by<a href=\"http://www.swapidc.com/\">SWAPIDC</a>.</p></div></div></div></div></div></main>";
			AdminT::pjs();
			echo "<script src=\"/admin_assets/js/modern.min.js\"></script><script src=\"/admin_assets/plugins/toastr/toastr.min.js\"></script>";
			echo "</body></html>";
		}else{
			if(isset($_POST['username']) && isset($_POST['password'])){
				$adminusers = require(SWAP_CONFIGS.'/admin_users.php');
				if(!is_array($adminusers)){
					echo '{"error":1,"msg":"系统配置错误"}';
					return false;
				}
				foreach($adminusers as $sadmin){
					if($sadmin['username'] == $_POST['username']){
						if($sadmin['password'] == md5($_POST['password'])){
							session('adminlogin', $_SERVER['HTTP_USER_AGENT']);
							echo '{"error":0,"msg":"\u767b\u5165\u6210\u529f"}';
							return false;
						}else{
							echo '{"error":1,"msg":"用户名或密码错误"}';
							return false;
						}
					}else{
						echo '{"error":1,"msg":"用户名或密码错误"}';
						return false;
					}
				}
				echo '{"error":1,"msg":"用户名或密码错误"}';
				return false;
				
			}else{
				echo '{"error":1,"msg":"缺少参数错误"}';
				return false;
			}
		}
	}
	function return_array($OSWAP_a416a4b07b6f280c968f2f3bb53948d5) {
		need_admin();
		if ($OSWAP_a416a4b07b6f280c968f2f3bb53948d5['lx'] == 'redirect') {
			exit(redirect("/index.php/admin/?warning=" . urlencode($OSWAP_a416a4b07b6f280c968f2f3bb53948d5['msg'])));
		} else if ($OSWAP_a416a4b07b6f280c968f2f3bb53948d5['lx'] == 'die') {
			die($OSWAP_a416a4b07b6f280c968f2f3bb53948d5['msg']);
		} else if ($OSWAP_a416a4b07b6f280c968f2f3bb53948d5['lx'] == 'return') {
			return $OSWAP_a416a4b07b6f280c968f2f3bb53948d5;
		}
	}
	function index() {
		need_admin();
		$OSWAP_a416a4b07b6f280c968f2f3bb53948d5 = localrun::test_cron();
		$OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b = $this->return_array($OSWAP_a416a4b07b6f280c968f2f3bb53948d5);
		$OSWAP_82c1313aed974283e01fc348447868ca = $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['msg'];
		$OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b = localrun::control();
		AdminT::header('仪表盘', '');
		AdminT::search();
		echo "<main class=\"page-content content-wrap\">";
		AdminT::navbar();
		AdminT::sidebar();
		echo "<div class=\"page-inner\">";
		AdminT::title('仪表盘');
		echo "<div id=\"main-wrapper\" class=\"container\"><div class=\"row\">";
		echo "<div class=\"col-lg-3 col-md-6\"><div class=\"panel info-box panel-white\"><div class=\"panel-body\"><div class=\"info-box-stats\"><p class=\"counter\">" . $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['usernum'] . "</p><span class=\"info-box-title\">网站注册用户的数量</span></div><div class=\"info-box-icon\"><i class=\"icon-users\"></i></div><div class=\"info-box-progress\"><div class=\"progress progress-xs progress-squared bs-n\"><div class=\"progress-bar progress-bar-success\" role=\"progressbar\" aria-valuenow=\"100\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: 100%\"></div></div></div></div></div></div><div class=\"col-lg-3 col-md-6\"><div class=\"panel info-box panel-white\"><div class=\"panel-body\"><div class=\"info-box-stats\"><p class=\"counter\">" . $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['gdnum'] . "</p><span class=\"info-box-title\">开放中的工单的数量</span></div><div class=\"info-box-icon\"><i class=\"icon-eye\"></i></div><div class=\"info-box-progress\"><div class=\"progress progress-xs progress-squared bs-n\"><div class=\"progress-bar progress-bar-info\" role=\"progressbar\" aria-valuenow=\"100\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: 100%\"></div></div></div></div></div></div><div class=\"col-lg-3 col-md-6\"><div class=\"panel info-box panel-white\"><div class=\"panel-body\"><div class=\"info-box-stats\"><p class=\"counter\">" . $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['jhnum'] . "</p><span class=\"info-box-title\">网站中激活的服务</span></div><div class=\"info-box-icon\"><i class=\"icon-basket\"></i></div><div class=\"info-box-progress\"><div class=\"progress progress-xs progress-squared bs-n\"><div class=\"progress-bar progress-bar-warning\" role=\"progressbar\" aria-valuenow=\"100\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: 100%\"></div></div></div></div></div></div><div class=\"col-lg-3 col-md-6\"><div class=\"panel info-box panel-white\"><div class=\"panel-body\"><div class=\"info-box-stats\"><p class=\"counter\">" . $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['shnum'] . "</p><span class=\"info-box-title\">你现在需要审核的服务的数量</span></div><div class=\"info-box-icon\"><i class=\"icon-envelope\"></i></div><div class=\"info-box-progress\"><div class=\"progress progress-xs progress-squared bs-n\"><div class=\"progress-bar progress-bar-danger\" role=\"progressbar\" aria-valuenow=\"100\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: 100%\"></div></div></div></div></div></div></div><div class=\"row\"><div class=\"col-lg-6 col-md-12\"><div class=\"panel panel-white\"><div class=\"panel-heading\"><h4 class=\"panel-title\">服务状态图</h4></div><div class=\"panel-body\"><div id=\"flotchart1\"></div></div></div></div><div class=\"col-lg-6 col-md-12\"><div class=\"panel panel-white\"><div class=\"panel-heading\"><h3 class=\"panel-title\">产品分布图</h3></div><div class=\"panel-body\"><div id=\"morris4\"></div></div></div></div><div class=\"col-lg-12 col-md-12\"><div class=\"panel panel-white\"><div class=\"panel-heading\"><h4 class=\"panel-title\">最新注册用户</h4></div><div class=\"panel-body\"><div class=\"table-responsive project-stats\"><table class=\"table\"><thead><tr><th>UID</th><th>用户名</th><th>E-mail</th><th>注册时间</th></tr></thead><tbody>";
		if (count($OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['lastreg']) == 0) {
			echo "<tr><td colspan=\"4\">你的网站还没有人注册...</td></tr>";
		} else {
			foreach ($OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['lastreg'] as $OSWAP_30b31a94e0c5a437f6c1c6006e473bc5) {
				echo "<tr><th scope=\"row\">{$OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['uid']}</th><td>{$OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['用户名']}</td><td>{$OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['电子邮件']}</td><td>{$OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['注册时间']}</td></tr>";
			}
		}
		echo "</tbody></table></div></div></div>";
		echo "</div></div></div>";
		AdminT::page_footer();
		echo "</div></main>";
		AdminT::cd_nav();
		AdminT::pjs();
		echo "<script src=\"/admin_assets/plugins/waypoints/jquery.waypoints.min.js\"></script><script src=\"/admin_assets/plugins/jquery-counterup/jquery.counterup.min.js\"></script><script src=\"/admin_assets/plugins/toastr/toastr.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.time.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.symbol.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.resize.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.tooltip.min.js\"></script><script src=\"/admin_assets/plugins/curvedlines/curvedLines.js\"></script><script src=\"/admin_assets/plugins/metrojs/MetroJs.min.js\"></script><script src=\"/admin_assets/plugins/morris/raphael.min.js\"></script><script src=\"/admin_assets/plugins/morris/morris.min.js\"></script><script src=\"/admin_assets/js/modern.min.js\"></script>";
		echo "<script>\$( document ).ready(function() {var flot1 = function () {var data = [[0, " . $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['server_chart']['1']['01'] . "], [1, " . $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['server_chart']['1']['02'] . "], [2, " . $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['server_chart']['1']['03'] . "], [3, " . $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['server_chart']['1']['04'] . "], [4, " . $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['server_chart']['1']['05'] . "], [5, " . $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['server_chart']['1']['06'] . "], [6, " . $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['server_chart']['1']['07'] . "], [7, " . $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['server_chart']['1']['08'] . "], [8, " . $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['server_chart']['1']['09'] . "], [9, " . $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['server_chart']['1']['10'] . "], [10, " . $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['server_chart']['1']['11'] . "], [11, " . $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['server_chart']['1']['12'] . "]];var data2 = [[0, " . $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['server_chart']['2']['01'] . "], [1, " . $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['server_chart']['2']['02'] . "], [2, " . $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['server_chart']['2']['03'] . "], [3, " . $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['server_chart']['2']['04'] . "], [4, " . $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['server_chart']['2']['05'] . "], [5, " . $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['server_chart']['2']['06'] . "], [6, " . $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['server_chart']['2']['07'] . "], [7, " . $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['server_chart']['2']['08'] . "], [8, " . $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['server_chart']['2']['09'] . "], [9, " . $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['server_chart']['2']['10'] . "], [10, " . $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['server_chart']['2']['11'] . "], [11, " . $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['server_chart']['2']['12'] . "]];var data3 = [[0, " . $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['server_chart']['3']['01'] . "], [1, " . $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['server_chart']['3']['02'] . "], [2, " . $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['server_chart']['3']['03'] . "], [3, " . $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['server_chart']['3']['04'] . "], [4, " . $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['server_chart']['3']['05'] . "], [5, " . $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['server_chart']['3']['06'] . "], [6, " . $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['server_chart']['3']['07'] . "], [7, " . $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['server_chart']['3']['08'] . "], [8, " . $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['server_chart']['3']['09'] . "], [9, " . $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['server_chart']['3']['10'] . "], [10, " . $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['server_chart']['3']['11'] . "], [11, " . $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['server_chart']['3']['12'] . "]];var dataset=[{data:data,color:\"#78BA00\",lines:{show:true,fill:0.2,},shadowSize:0,},{data:data,color:\"#fff\",lines:{show:false,},points:{show:true,fill:true,radius:4,fillColor:\"#78BA00\",lineWidth:2},curvedLines:{apply:false,},shadowSize:0},{data:data2,color:\"#F4B300\",lines:{show:true,fill:0.2,},shadowSize:0,},{data:data2,color:\"#fff\",lines:{show:false,},curvedLines:{apply:false,},points:{show:true,fill:true,radius:4,fillColor:\"#F4B300\",lineWidth:2},shadowSize:0},{data:data3,color:\"#56C5FF\",lines:{show:true,fill:0.2,},shadowSize:0,},{data:data3,color:\"#fff\",lines:{show:false,},curvedLines:{apply:false,},points:{show:true,fill:true,radius:4,fillColor:\"#56C5FF\",lineWidth:2},shadowSize:0}];var ticks=[[0,\"一月\"],[1,\"二月\"],[2,\"三月\"],[3,\"四月\"],[4,\"五月\"],[5,\"六月\"],[6,\"七月\"],[7,\"八月\"],[8,\"九月\"],[9,\"十月\"],[10,\"十一月\"],[11,\"十二\"]];var plot1=\$.plot(\"#flotchart1\",dataset,{series:{color:\"#14D1BD\",lines:{show:true,fill:0.2},shadowSize:0,curvedLines:{apply:true,active:true}},xaxis:{ticks:ticks,},legend:{show:false},grid:{color:\"#AFAFAF\",hoverable:true,borderWidth:0,backgroundColor:\"#FFF\"}});};flot1();Morris.Donut({element: 'morris4',data: [";
		if (count($OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['serverpie']) == 0) {
			echo "{ label: \"无产品\", value: 0}";
		} else {
			foreach ($OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['serverpie'] as $OSWAP_ccc7f75255dd15db78c79040a04d7234) {
				echo "{label:\"";
				echo $OSWAP_ccc7f75255dd15db78c79040a04d7234['名称'];
				echo "\",value:";
				echo $OSWAP_ccc7f75255dd15db78c79040a04d7234['数量'];
				echo "},";
			}
		}
		echo "],resize: true,colors: ['#74e4d1', '#44cbb4', '#119d85','#22BAA0']});});</script><div class=\"modal fade\" id=\"cronerror\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\"><div class=\"modal-dialog\"><div class=\"modal-content\"><div class=\"modal-header\"><button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button><h4 class=\"modal-title\" id=\"myModalLabel\">警告!!!检测到您的CRON运行异常!!</h4></div><div class=\"modal-body\"><p>这可能导致你程序无法实现自动化!!</p><p>(包括:自动暂停,自动停止,和需要cron运行的任务)</p><p> </p><p>可能是以下原因:</p><p>1.您的某个服务器无法访问或者超时</p><p>2.您的CRON没有正确设置</p><p>3.您的没有使用默认模版并且没有设置外部CRON</p><p>4.还可能是你的程序刚刚安装</p></div><div class=\"modal-footer\"><button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">关闭</button></div></div></div></div>";
		if (!$OSWAP_82c1313aed974283e01fc348447868ca) echo "<script>\$(document).ready(function() {\$('#cronerror').modal(true)});</script>";
		echo "</body></html>";
	}
	function ticket_open() {
		need_admin();
		$OSWAP_9ad0a90d349c03b274a3c5eff195e14c = localrun::ticket_open();
		AdminT::header('开启的工单', "<link href=\"/admin_assets/plugins/datatables/css/jquery.datatables.min.css\" rel=\"stylesheet\" type=\"text/css\"/><link href=\"/admin_assets/plugins/datatables/css/jquery.datatables_themeroller.css\" rel=\"stylesheet\" type=\"text/css\"/>");
		AdminT::search();
		echo "<main class=\"page-content content-wrap\">";
		AdminT::navbar();
		AdminT::sidebar();
		echo "<div class=\"page-inner\">";
		AdminT::title('开启的工单', "<li>工单管理</li>");
		echo "<div id=\"main-wrapper\" class=\"container\"><div class=\"row\">";
		echo "<div class=\"col-md-12\"><div class=\"panel panel-white\"><div class=\"panel-body\"><div class=\"table-responsive\"><table id=\"example\"class=\"display table\"style=\"width: 100%; cellspacing: 0;\"><thead><tr><th>id</th><th>提交人</th><th>主题</th><th>日期</th><th>状态</th><th>最近更新</th><th>操作</th></tr></thead><tfoot><tr><th>id</th><th>提交人</th><th>主题</th><th>日期</th><th>状态</th><th>最近更新</th><th>操作</th></tr></tfoot><tbody>";
		foreach ($OSWAP_9ad0a90d349c03b274a3c5eff195e14c as $OSWAP_e32d37baaa0da92dfc58a3f1eec1f0ce) {
			echo "<tr><td>" . $OSWAP_e32d37baaa0da92dfc58a3f1eec1f0ce['id'] . "</td><td>" . $OSWAP_e32d37baaa0da92dfc58a3f1eec1f0ce['姓名'] . "</td><td>" . $OSWAP_e32d37baaa0da92dfc58a3f1eec1f0ce['主题'] . "</td><td>" . $OSWAP_e32d37baaa0da92dfc58a3f1eec1f0ce['提交时间'] . "</td><td>" . $OSWAP_e32d37baaa0da92dfc58a3f1eec1f0ce['状态'] . "</td><td>" . $OSWAP_e32d37baaa0da92dfc58a3f1eec1f0ce['最后时间'] . "</td><td><a href=\"/index.php/admin/ticket_detailed/" . $OSWAP_e32d37baaa0da92dfc58a3f1eec1f0ce['id'] . "/\"class=\"btn btn-info btn-xs\"><i class=\"icon-eyeglasses\"></i></a></td></tr>";
		}
		echo "</tbody></table></div></div></div></div>";
		echo "</div></div></div>";
		AdminT::page_footer();
		echo "</div></main>";
		AdminT::cd_nav();
		AdminT::pjs();
		echo "<script src=\"/admin_assets/plugins/waypoints/jquery.waypoints.min.js\"></script><script src=\"/admin_assets/plugins/jquery-counterup/jquery.counterup.min.js\"></script><script src=\"/admin_assets/plugins/toastr/toastr.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.time.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.symbol.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.resize.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.tooltip.min.js\"></script><script src=\"/admin_assets/plugins/curvedlines/curvedLines.js\"></script><script src=\"/admin_assets/plugins/metrojs/MetroJs.min.js\"></script><script src=\"/admin_assets/plugins/morris/raphael.min.js\"></script><script src=\"/admin_assets/plugins/morris/morris.min.js\"></script><script src=\"/admin_assets/js/modern.min.js\"></script>";
		echo "<script src=\"/admin_assets/plugins/datatables/js/jquery.dataTables.min.js\"></script>";
		echo "<script>var extable;\$(document).ready(function() {extable=\$('#example').DataTable({\"language\":{\"url\":\"https://cdn.datatables.net/plug-ins/e9421181788/i18n/Chinese.json\"}});});</script>";
		echo "</body></html>";
	}
	function ticket_detailed() {
		need_admin();
		$id = mac_url_get(1);
		$OSWAP_6bc38b295560eb8d703e5b998a115c62 = mac_url_get(2);
		$OSWAP_0e8ae8cc9b95f1de8d037038d2a1eeed = _POST('reply');
		$OSWAP_b59487239706386f068f2549a4adfa62 = '1';
		$OSWAP_30b31a94e0c5a437f6c1c6006e473bc5 = array('昵称' => GETADMINNAME());
		$OSWAP_a416a4b07b6f280c968f2f3bb53948d5 = localrun::ticket_detailed($id, $OSWAP_6bc38b295560eb8d703e5b998a115c62, $OSWAP_0e8ae8cc9b95f1de8d037038d2a1eeed, $OSWAP_b59487239706386f068f2549a4adfa62, $OSWAP_30b31a94e0c5a437f6c1c6006e473bc5);
		$OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b = $this->return_array($OSWAP_a416a4b07b6f280c968f2f3bb53948d5);
		$t = $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['myrow'];
		AdminT::header('服务单详情', "<link href=\"/admin_assets/plugins/datatables/css/jquery.datatables.min.css\" rel=\"stylesheet\" type=\"text/css\"/><link href=\"/admin_assets/plugins/datatables/css/jquery.datatables_themeroller.css\" rel=\"stylesheet\" type=\"text/css\"/>");
		AdminT::search();
		echo "<main class=\"page-content content-wrap\">";
		AdminT::navbar();
		AdminT::sidebar();
		echo "<div class=\"page-inner\">";
		AdminT::title('服务单详情', "<li>工单管理</li>");
		echo "<div id=\"main-wrapper\" class=\"container\"><div class=\"row\">";
		echo "<div class=\"col-md-12\">";
		echo "<div class=\"panel panel-primary\"><div class=\"panel-body\"><div class=\"row\"><div class=\"col-md-12\"><table class=\"table table-condensed\"><thead><tr><th>工单ID</th><th>标题</th><th>提交时间</th><th>状态</th><th>最后回复时间</th></tr></thead><tbody><tr><td>" . $t['id'] . "</td><td>" . $t['主题'] . "</td><td>" . $t['提交时间'] . "</td><td>" . $t['状态'] . "</td><td>" . $t['最后时间'] . "</td></tr></tbody></table></div></div></div></div>";
		foreach ($OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['tk'] as $tk) {
			if ($tk['回复类型'] == '1') {
				echo "<div class=\"panel panel-primary\"><div class=\"panel-heading\"><div class=\"panel-title\">用户:" . $tk['名字'] . "(ID:" . $tk['用户id'] . ")" . $tk['时间'] . "</div><div class=\"panel-options\"><a href=\"#\"data-rel=\"close\"><i class=\"entypo-cancel\"></i></a></div></div><div class=\"panel-body\"><div class=\"row\"><div class=\"col-md-12\"><blockquote><p>" . $tk['信息'] . "</p></blockquote></div></div></div></div>";
			} else if ($tk['回复类型'] == '2') {
				echo "<div class=\"panel panel-primary\"><div class=\"panel-heading\"><div class=\"panel-title\">管理员" . $tk['时间'] . "</div><div class=\"panel-options\"><a href=\"#\"data-rel=\"close\"><i class=\"entypo-cancel\"></i></a></div></div><div class=\"panel-body\"><div class=\"row\"><div class=\"col-md-12\"><blockquote><p>" . $tk['信息'] . "</p></blockquote></div></div></div></div>";
			}
		}
		echo "<h2>回复服务单</h2><br/><form id=\"replyform\"role=\"form\"method=\"post\"><div class=\"form-group\"><textarea class=\"form-control\"style=\"height:200px;\"name=\"reply\"id=\"reply\"></textarea></div><div><a href=\"javascript:void(0)\"onclick=\"\$.post('/index.php/admin/ticket_detailed/" . $t['id'] . "/',\$('#replyform').serialize(),function(){location.reload();});\"class=\"btn btn-info pull-left\">回复服务单</a></div><div class=\"btn-group pull-right\"><a href=\"javascript:void(0)\"onclick=\"location.reload();\"class=\"btn btn-success\">刷新服务单</a><a href=\"javascript:void(0)\"onclick=\"\$.get('/index.php/admin/ticket_detailed/" . $t['id'] . "/close/',function(){location.reload();});\"class=\"btn btn-danger\">关闭服务单</a></div></form>";
		echo "</div>";
		echo "</div></div></div>";
		AdminT::page_footer();
		echo "</div></main>";
		AdminT::cd_nav();
		AdminT::pjs();
		echo "<script src=\"/admin_assets/plugins/waypoints/jquery.waypoints.min.js\"></script><script src=\"/admin_assets/plugins/jquery-counterup/jquery.counterup.min.js\"></script><script src=\"/admin_assets/plugins/toastr/toastr.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.time.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.symbol.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.resize.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.tooltip.min.js\"></script><script src=\"/admin_assets/plugins/curvedlines/curvedLines.js\"></script><script src=\"/admin_assets/plugins/metrojs/MetroJs.min.js\"></script><script src=\"/admin_assets/plugins/morris/raphael.min.js\"></script><script src=\"/admin_assets/plugins/morris/morris.min.js\"></script><script src=\"/admin_assets/js/modern.min.js\"></script>";
		echo "<script src=\"/admin_assets/plugins/datatables/js/jquery.dataTables.min.js\"></script>";
		echo "</body></html>";
	}
	function ticket_close() {
		need_admin();
		$OSWAP_9ad0a90d349c03b274a3c5eff195e14c = localrun::ticket_close();
		AdminT::header('关闭的工单', "<link href=\"/admin_assets/plugins/datatables/css/jquery.datatables.min.css\" rel=\"stylesheet\" type=\"text/css\"/><link href=\"/admin_assets/plugins/datatables/css/jquery.datatables_themeroller.css\" rel=\"stylesheet\" type=\"text/css\"/>");
		AdminT::search();
		echo "<main class=\"page-content content-wrap\">";
		AdminT::navbar();
		AdminT::sidebar();
		echo "<div class=\"page-inner\">";
		AdminT::title('关闭的工单', "<li>工单管理</li>");
		echo "<div id=\"main-wrapper\" class=\"container\"><div class=\"row\">";
		echo "<div class=\"col-md-12\"><div class=\"panel panel-white\"><div class=\"panel-body\"><div class=\"table-responsive\"><table id=\"example\"class=\"display table\"style=\"width: 100%; cellspacing: 0;\"><thead><tr><th>id</th><th>提交人</th><th>主题</th><th>日期</th><th>状态</th><th>最近更新</th><th>操作</th></tr></thead><tfoot><tr><th>id</th><th>提交人</th><th>主题</th><th>日期</th><th>状态</th><th>最近更新</th><th>操作</th></tr></tfoot><tbody>";
		foreach ($OSWAP_9ad0a90d349c03b274a3c5eff195e14c as $OSWAP_e32d37baaa0da92dfc58a3f1eec1f0ce) {
			echo "<tr><td>" . $OSWAP_e32d37baaa0da92dfc58a3f1eec1f0ce['id'] . "</td><td>" . $OSWAP_e32d37baaa0da92dfc58a3f1eec1f0ce['姓名'] . "</td><td>" . $OSWAP_e32d37baaa0da92dfc58a3f1eec1f0ce['主题'] . "</td><td>" . $OSWAP_e32d37baaa0da92dfc58a3f1eec1f0ce['提交时间'] . "</td><td>" . $OSWAP_e32d37baaa0da92dfc58a3f1eec1f0ce['状态'] . "</td><td>" . $OSWAP_e32d37baaa0da92dfc58a3f1eec1f0ce['最后时间'] . "</td><td><a href=\"/index.php/admin/ticket_detailed/" . $OSWAP_e32d37baaa0da92dfc58a3f1eec1f0ce['id'] . "/\"class=\"btn btn-info btn-xs\"><i class=\"icon-eyeglasses\"></i></a></td></tr>";
		}
		echo "</tbody></table></div></div></div></div>";
		echo "</div></div></div>";
		AdminT::page_footer();
		echo "</div></main>";
		AdminT::cd_nav();
		AdminT::pjs();
		echo "<script src=\"/admin_assets/plugins/waypoints/jquery.waypoints.min.js\"></script><script src=\"/admin_assets/plugins/jquery-counterup/jquery.counterup.min.js\"></script><script src=\"/admin_assets/plugins/toastr/toastr.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.time.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.symbol.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.resize.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.tooltip.min.js\"></script><script src=\"/admin_assets/plugins/curvedlines/curvedLines.js\"></script><script src=\"/admin_assets/plugins/metrojs/MetroJs.min.js\"></script><script src=\"/admin_assets/plugins/morris/raphael.min.js\"></script><script src=\"/admin_assets/plugins/morris/morris.min.js\"></script><script src=\"/admin_assets/js/modern.min.js\"></script>";
		echo "<script src=\"/admin_assets/plugins/datatables/js/jquery.dataTables.min.js\"></script>";
		echo "<script>var extable;\$(document).ready(function() {extable=\$('#example').DataTable({\"language\":{\"url\":\"https://cdn.datatables.net/plug-ins/e9421181788/i18n/Chinese.json\"}});});</script>";
		echo "</body></html>";
	}
	function ticket_want() {
		need_admin();
		$OSWAP_9ad0a90d349c03b274a3c5eff195e14c = localrun::ticket_want();
		AdminT::header('回复的工单', "<link href=\"/admin_assets/plugins/datatables/css/jquery.datatables.min.css\" rel=\"stylesheet\" type=\"text/css\"/><link href=\"/admin_assets/plugins/datatables/css/jquery.datatables_themeroller.css\" rel=\"stylesheet\" type=\"text/css\"/>");
		AdminT::search();
		echo "<main class=\"page-content content-wrap\">";
		AdminT::navbar();
		AdminT::sidebar();
		echo "<div class=\"page-inner\">";
		AdminT::title('回复的工单', "<li>工单管理</li>");
		echo "<div id=\"main-wrapper\" class=\"container\"><div class=\"row\">";
		echo "<div class=\"col-md-12\"><div class=\"panel panel-white\"><div class=\"panel-body\"><div class=\"table-responsive\"><table id=\"example\"class=\"display table\"style=\"width: 100%; cellspacing: 0;\"><thead><tr><th>id</th><th>提交人</th><th>主题</th><th>日期</th><th>状态</th><th>最近更新</th><th>操作</th></tr></thead><tfoot><tr><th>id</th><th>提交人</th><th>主题</th><th>日期</th><th>状态</th><th>最近更新</th><th>操作</th></tr></tfoot><tbody>";
		foreach ($OSWAP_9ad0a90d349c03b274a3c5eff195e14c as $OSWAP_e32d37baaa0da92dfc58a3f1eec1f0ce) {
			echo "<tr><td>" . $OSWAP_e32d37baaa0da92dfc58a3f1eec1f0ce['id'] . "</td><td>" . $OSWAP_e32d37baaa0da92dfc58a3f1eec1f0ce['姓名'] . "</td><td>" . $OSWAP_e32d37baaa0da92dfc58a3f1eec1f0ce['主题'] . "</td><td>" . $OSWAP_e32d37baaa0da92dfc58a3f1eec1f0ce['提交时间'] . "</td><td>" . $OSWAP_e32d37baaa0da92dfc58a3f1eec1f0ce['状态'] . "</td><td>" . $OSWAP_e32d37baaa0da92dfc58a3f1eec1f0ce['最后时间'] . "</td><td><a href=\"/index.php/admin/ticket_detailed/" . $OSWAP_e32d37baaa0da92dfc58a3f1eec1f0ce['id'] . "/\"class=\"btn btn-info btn-xs\"><i class=\"icon-eyeglasses\"></i></a></td></tr>";
		}
		echo "</tbody></table></div></div></div></div>";
		echo "</div></div></div>";
		AdminT::page_footer();
		echo "</div></main>";
		AdminT::cd_nav();
		AdminT::pjs();
		echo "<script src=\"/admin_assets/plugins/waypoints/jquery.waypoints.min.js\"></script><script src=\"/admin_assets/plugins/jquery-counterup/jquery.counterup.min.js\"></script><script src=\"/admin_assets/plugins/toastr/toastr.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.time.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.symbol.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.resize.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.tooltip.min.js\"></script><script src=\"/admin_assets/plugins/curvedlines/curvedLines.js\"></script><script src=\"/admin_assets/plugins/metrojs/MetroJs.min.js\"></script><script src=\"/admin_assets/plugins/morris/raphael.min.js\"></script><script src=\"/admin_assets/plugins/morris/morris.min.js\"></script><script src=\"/admin_assets/js/modern.min.js\"></script>";
		echo "<script src=\"/admin_assets/plugins/datatables/js/jquery.dataTables.min.js\"></script>";
		echo "<script>var extable;\$(document).ready(function() {extable=\$('#example').DataTable({\"language\":{\"url\":\"https://cdn.datatables.net/plug-ins/e9421181788/i18n/Chinese.json\"}});});</script>";
		echo "</body></html>";
	}
	function user_all() {
		need_admin();
		$OSWAP_9ad0a90d349c03b274a3c5eff195e14c = localrun::user_all();
		AdminT::header('用户管理', "<link href=\"/admin_assets/plugins/datatables/css/jquery.datatables.min.css\" rel=\"stylesheet\" type=\"text/css\"/><link href=\"/admin_assets/plugins/datatables/css/jquery.datatables_themeroller.css\" rel=\"stylesheet\" type=\"text/css\"/><link href=\"/admin_assets/plugins/ion.rangeslider/css/ion.rangeSlider.css\" rel=\"stylesheet\" type=\"text/css\"/><link href=\"/admin_assets/plugins/ion.rangeslider/css/ion.rangeSlider.skinFlat.css\" rel=\"stylesheet\" type=\"text/css\"/>");
		AdminT::search();
		echo "<main class=\"page-content content-wrap\">";
		AdminT::navbar();
		AdminT::sidebar();
		echo "<div class=\"page-inner\">";
		AdminT::title('用户管理', '', '<a href="javascript:void(0)" onclick="$(\'#adduser\').modal(true);" class="btn btn-primary btn-addon btn-xs"><i class="fa fa-plus"></i> 添加用户</a>');
		echo "<div id=\"main-wrapper\" class=\"container\"><div class=\"row\">";
		echo "<div class=\"col-md-12\"><div class=\"panel panel-white\"><div class=\"panel-body\"><div class=\"table-responsive\"><table id=\"example\"class=\"display table\"style=\"width: 100%; cellspacing: 0;\"><thead><tr><th>UID</th><th>用户名</th><th>姓名</th><th>E-mail</th><th>预存款</th><th>注册时间</th><th>操作</th></tr></thead><tfoot><tr><th>UID</th><th>用户名</th><th>姓名</th><th>E-mail</th><th>预存款</th><th>注册时间</th><th>操作</th></tr></tfoot><tbody>";
		foreach ($OSWAP_9ad0a90d349c03b274a3c5eff195e14c as $OSWAP_30b31a94e0c5a437f6c1c6006e473bc5) {
			echo "<tr class=\"usert{$OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['uid']}\"><td>{$OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['uid']}</td><td>{$OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['用户名']}</td><td>{$OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['姓名']}</td><td>{$OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['电子邮件']}</td><td>{$OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['预存款']}</td><td>{$OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['注册时间']}</td><td><a href=\"/index.php/Admin/User_Detailed/" . $OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['uid'] . "/\"class=\"btn btn-info btn-xs\">查看</a>";
			do_swap_plug('用户管理列表按钮', $OSWAP_30b31a94e0c5a437f6c1c6006e473bc5);
			echo "<a href=\"javascript:void(0)\"onclick=\"\$('#range_02').val('" . $OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['预存款'] . "');\$('.ycksave').attr('onclick','\$.post(\\'/index.php/Admin/xg_rmb/" . $OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['uid'] . "/\\',\\'rmb=\\'+\$(\\'#range_02\\').val(),function(data){if(data==\\'ok\\') location.reload(); else swap_alert(\\'error\\',\\'修改预存款失败\\',data);});') && \$('#xgyck').modal(true);\"class=\"btn btn-warning btn-xs\">修改存款</a><a href=\"javascript:void(0)\"class=\"btn btn-danger btn-xs delid" . $OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['uid'] . "\"disabled>删除</a><input type=\"checkbox\"onclick=\"\$('.delid" . $OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['uid'] . "').attr('onclick','\$.get(\\'/index.php/Admin/del_user/" . $OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['uid'] . "/\\',function(data){if(data==\'ok\') extable.row(\\'.usert{$OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['uid']}\\').remove().draw(); else swap_alert(\'error\',\'删除用户失败\',data);});') && \$('.delid" . $OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['uid'] . "').attr('disabled', false) && \$(this).parent().parent().remove();\"/></td></tr>";
		}
		echo "</tbody></table></div></div></div></div>";
		echo "</div></div></div>";
		AdminT::page_footer();
		echo "</div></main>";
		AdminT::cd_nav();
		AdminT::pjs();
		echo "<script src=\"/admin_assets/plugins/waypoints/jquery.waypoints.min.js\"></script><script src=\"/admin_assets/plugins/jquery-counterup/jquery.counterup.min.js\"></script><script src=\"/admin_assets/plugins/toastr/toastr.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.time.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.symbol.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.resize.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.tooltip.min.js\"></script><script src=\"/admin_assets/plugins/curvedlines/curvedLines.js\"></script><script src=\"/admin_assets/plugins/metrojs/MetroJs.min.js\"></script><script src=\"/admin_assets/plugins/morris/raphael.min.js\"></script><script src=\"/admin_assets/plugins/morris/morris.min.js\"></script><script src=\"/admin_assets/js/modern.min.js\"></script>";
		echo "<script src=\"/admin_assets/plugins/datatables/js/jquery.dataTables.min.js\"></script><script src=\"/admin_assets/plugins/ion.rangeslider/js/ion-rangeSlider/ion.rangeSlider.min.js\"></script>";
		echo "<script>var extable;\$(document).ready(function() {extable=\$('#example').DataTable({\"language\":{\"url\":\"https://cdn.datatables.net/plug-ins/e9421181788/i18n/Chinese.json\"}});});</script>";
		echo "<div class=\"modal fade\"id=\"xgyck\"tabindex=\"-1\"role=\"dialog\"aria-labelledby=\"myModalLabel\"aria-hidden=\"true\"><div class=\"modal-dialog\"><div class=\"modal-content\"><div class=\"modal-header\"><button type=\"button\"class=\"close\"data-dismiss=\"modal\"aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button><h4 class=\"modal-title\"id=\"myModalLabel\">修改用户预存款</h4></div><div class=\"modal-body\"><input type=\"text\"id=\"range_02\" class=\"form-control\"></div><div class=\"modal-footer\"><button type=\"button\"class=\"btn btn-default\"data-dismiss=\"modal\">关闭</button><a href=\"javascript:void(0)\"onclick=\"\"class=\"btn btn-success ycksave\">保存更改</a></div></div></div></div>";
		echo "<div class=\"modal fade\"id=\"adduser\"tabindex=\"-1\"role=\"dialog\"aria-labelledby=\"myModalLabel\"aria-hidden=\"true\"><div class=\"modal-dialog\"><div class=\"modal-content\"><div class=\"modal-header\"><button type=\"button\"class=\"close\"data-dismiss=\"modal\"aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button><h4 class=\"modal-title\">添加用户</h4></div><div class=\"modal-body\"><form id=\"adduserform\"><div class=\"form-group\"><label class=\"control-label\">用户名</label><input type=\"text\"class=\"form-control\"name=\"username\"/></div><div class=\"form-group\"><label class=\"control-label\">密码</label><input type=\"password\"class=\"form-control\"name=\"password\"/></div><div class=\"form-group\"><label class=\"control-label\">确认密码</label><input type=\"password\"class=\"form-control\"name=\"repassword\"/></div><div class=\"form-group\"><label class=\"control-label\">姓名</label><input type=\"text\"class=\"form-control\"name=\"name\"/></div><div class=\"form-group\"><label class=\"control-label\">国家</label><select name=\"country\"class=\"form-control\">";
		$OSWAP_02a174390636458eba5900a1013ff7bd = $this->country();
		foreach ($OSWAP_02a174390636458eba5900a1013ff7bd as $OSWAP_d23519cda7160577a488cef431673b7a) {
			echo "<option value=\"{$OSWAP_d23519cda7160577a488cef431673b7a}\">{$OSWAP_d23519cda7160577a488cef431673b7a}</option>";
		}
		echo "</select></div><div class=\"form-group\"><label class=\"control-label\">地址</label><input type=\"text\"class=\"form-control\"name=\"address\"/></div><div class=\"form-group\"><label class=\"control-label\">邮编</label><input type=\"text\"class=\"form-control\"name=\"zip\"/></div><div class=\"form-group\"><label class=\"control-label\">电话号码</label><input type=\"text\"class=\"form-control\"name=\"phone\"/></div><div class=\"form-group\"><label class=\"control-label\">电子邮件</label><input type=\"text\"class=\"form-control\"name=\"email\"/></div></form></div><div class=\"modal-footer\"><button type=\"button\"class=\"btn btn-default\"data-dismiss=\"modal\">关闭</button><a href=\"javascript:void(0)\"onclick=\"\$.post('/index.php/Admin/User_Add/',\$('#adduserform').serialize(),function(data){if(data=='ok')location.reload();else swap_alert('error','添加用户失败',data)});\"class=\"btn btn-success\">保存更改</a></div></div></div></div>";
		echo "</body></html>";
	}
	function loginout() {
		need_admin();
		session('adminlogin', NULL);
		redirect('/');
	}
	function del_user() {
		need_admin();
		$id = mac_url_get(1);
		$OSWAP_a416a4b07b6f280c968f2f3bb53948d5 = localrun::del_user($id);
		$OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b = $this->return_array($OSWAP_a416a4b07b6f280c968f2f3bb53948d5);
		die('ok');
	}
	function user_add() {
		need_admin();
		$OSWAP_30b31a94e0c5a437f6c1c6006e473bc5name = _POST('username');
		$OSWAP_c9d58e6756676f02d347c255bcb6b03b = _POST('password');
		$OSWAP_71fd491bc9e028bf3f050c23794fbd6e = _POST('repassword');
		$OSWAP_0d07de59261cc2c9023b194184c575fb = _POST('name');
		$OSWAP_d23519cda7160577a488cef431673b7a = _POST('country');
		$OSWAP_a3372a91a0ca1a8b1b4a38ebbeae2626 = _POST('address');
		$OSWAP_fd2ddfc99bfc05fd289c609c388b789c = _POST('zip');
		$OSWAP_75c050f7985c2db293354c2bc1ed86c9 = _POST('phone');
		$OSWAP_4a6f164ef3c908fa9e5fd8ffecc9b706 = _POST('email');
		if ((empty($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5name)) or (empty($OSWAP_c9d58e6756676f02d347c255bcb6b03b)) or (empty($OSWAP_0d07de59261cc2c9023b194184c575fb)) or (empty($OSWAP_d23519cda7160577a488cef431673b7a)) or (empty($OSWAP_a3372a91a0ca1a8b1b4a38ebbeae2626)) or (empty($OSWAP_fd2ddfc99bfc05fd289c609c388b789c)) or (empty($OSWAP_75c050f7985c2db293354c2bc1ed86c9)) or (empty($OSWAP_4a6f164ef3c908fa9e5fd8ffecc9b706))) die('用户信息未添全,请添全之后再试!!');
		if (!$this->IsMail($OSWAP_4a6f164ef3c908fa9e5fd8ffecc9b706)) die('邮箱格式错误');
		if (!$this->IsUsername($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5name)) die('用户名格式不对!!请输入3-16位数字字母');
		if (!$this->IsUsername($OSWAP_c9d58e6756676f02d347c255bcb6b03b)) die('密码格式不对!!请输入3-16位数字字母');
		if (!$this->IsSame($OSWAP_c9d58e6756676f02d347c255bcb6b03b, $OSWAP_71fd491bc9e028bf3f050c23794fbd6e)) die('2次密码不一样');
		$OSWAP_a416a4b07b6f280c968f2f3bb53948d5 = localrun::new_user_form($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5name, $OSWAP_c9d58e6756676f02d347c255bcb6b03b, $OSWAP_71fd491bc9e028bf3f050c23794fbd6e, $OSWAP_0d07de59261cc2c9023b194184c575fb, $OSWAP_d23519cda7160577a488cef431673b7a, $OSWAP_a3372a91a0ca1a8b1b4a38ebbeae2626, $OSWAP_fd2ddfc99bfc05fd289c609c388b789c, $OSWAP_75c050f7985c2db293354c2bc1ed86c9, $OSWAP_4a6f164ef3c908fa9e5fd8ffecc9b706);
		$OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b = $this->return_array($OSWAP_a416a4b07b6f280c968f2f3bb53948d5);
	}
	function xg_rmb() {
		need_admin();
		$id = mac_url_get(1);
		$OSWAP_4a44aa3cb0ca8d4b2ae7399d386e9c75 = _POST('rmb');
		$OSWAP_a416a4b07b6f280c968f2f3bb53948d5 = localrun::xg_rmb($id, $OSWAP_4a44aa3cb0ca8d4b2ae7399d386e9c75);
		$OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b = $this->return_array($OSWAP_a416a4b07b6f280c968f2f3bb53948d5);
	}
	function user_detailed() {
		need_admin();
		$id = mac_url_get(1);
		$OSWAP_a416a4b07b6f280c968f2f3bb53948d5 = localrun::user_detailed($id);
		$OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b = $this->return_array($OSWAP_a416a4b07b6f280c968f2f3bb53948d5);
		$OSWAP_30b31a94e0c5a437f6c1c6006e473bc5 = $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['myrow'];
		AdminT::header('用户详情', "<link href=\"/admin_assets/plugins/datatables/css/jquery.datatables.min.css\" rel=\"stylesheet\" type=\"text/css\"/><link href=\"/admin_assets/plugins/datatables/css/jquery.datatables_themeroller.css\" rel=\"stylesheet\" type=\"text/css\"/>");
		AdminT::search();
		echo "<main class=\"page-content content-wrap\">";
		AdminT::navbar();
		AdminT::sidebar();
		echo "<div class=\"page-inner\">";
		AdminT::title('用户详情', "<li>用户管理</li>");
		echo "<div id=\"main-wrapper\" class=\"container\"><div class=\"row\">";
		echo "<div class=\"col-md-12\">"; ?>
                                <div class="panel panel-white">
                                    <div class="panel-body">
                                        <div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
                                            <div class="panel panel-primary">
                                                <div class="panel-heading" role="tab" id="headingOne1">
                                                    <h4 class="panel-title">
                                                        <a data-toggle="collapse" data-parent="#accordion2" href="#1" aria-expanded="true" aria-controls="collapseOne">
                                                            用户资料修改编辑
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne1">
                                                    <div class="panel-body">
								<form role="form" id="userform" method="post" class="validate">
									<div class="form-group">
										<label class="control-label">姓名</label>
										<input type="text" class="form-control" name="name" value="<?php echo $OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['姓名'] ?>" />
									</div>
									<div class="form-group">
										<label class="control-label">国家</label>
										    <select name="country" class="form-control">
<?php echo '<option value="Afghanistan"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Afghanistan') {
			echo 'selected="selected"';
		}
		echo '>Afghanistan</option><option value="Aland Islands"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Aland Islands') {
			echo 'selected="selected"';
		}
		echo '>Aland Islands</option><option value="Albania"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Albania') {
			echo 'selected="selected"';
		}
		echo '>Albania</option><option value="Algeria"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Algeria') {
			echo 'selected="selected"';
		}
		echo '>Algeria</option><option value="American Samoa"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'American Samoa') {
			echo 'selected="selected"';
		}
		echo '>American Samoa</option><option value="Andorra"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Andorra') {
			echo 'selected="selected"';
		}
		echo '>Andorra</option><option value="Angola"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Angola') {
			echo 'selected="selected"';
		}
		echo '>Angola</option><option value="Anguilla"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Anguilla') {
			echo 'selected="selected"';
		}
		echo '>Anguilla</option><option value="Antarctica"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Antarctica') {
			echo 'selected="selected"';
		}
		echo '>Antarctica</option><option value="Antigua And Barbuda"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Antigua And Barbuda') {
			echo 'selected="selected"';
		}
		echo '>Antigua And Barbuda</option><option value="Argentina"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Argentina') {
			echo 'selected="selected"';
		}
		echo '>Argentina</option><option value="Armenia"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Armenia') {
			echo 'selected="selected"';
		}
		echo '>Armenia</option><option value="Aruba"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Aruba') {
			echo 'selected="selected"';
		}
		echo '>Aruba</option><option value="Australia"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Australia') {
			echo 'selected="selected"';
		}
		echo '>Australia</option><option value="Austria"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Austria') {
			echo 'selected="selected"';
		}
		echo '>Austria</option><option value="Azerbaijan"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Azerbaijan') {
			echo 'selected="selected"';
		}
		echo '>Azerbaijan</option><option value="Bahamas"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Bahamas') {
			echo 'selected="selected"';
		}
		echo '>Bahamas</option><option value="Bahrain"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Bahrain') {
			echo 'selected="selected"';
		}
		echo '>Bahrain</option><option value="Bangladesh"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Bangladesh') {
			echo 'selected="selected"';
		}
		echo '>Bangladesh</option><option value="Barbados"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Barbados') {
			echo 'selected="selected"';
		}
		echo '>Barbados</option><option value="Belarus"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Belarus') {
			echo 'selected="selected"';
		}
		echo '>Belarus</option><option value="Belgium"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Belgium') {
			echo 'selected="selected"';
		}
		echo '>Belgium</option><option value="Belize"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Belize') {
			echo 'selected="selected"';
		}
		echo '>Belize</option><option value="Benin"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Benin') {
			echo 'selected="selected"';
		}
		echo '>Benin</option><option value="Bermuda"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Bermuda') {
			echo 'selected="selected"';
		}
		echo '>Bermuda</option><option value="Bhutan"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Bhutan') {
			echo 'selected="selected"';
		}
		echo '>Bhutan</option><option value="Bolivia"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Bolivia') {
			echo 'selected="selected"';
		}
		echo '>Bolivia</option><option value="Bosnia And Herzegovina"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Bosnia And Herzegovina') {
			echo 'selected="selected"';
		}
		echo '>Bosnia And Herzegovina</option><option value="Botswana"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Botswana') {
			echo 'selected="selected"';
		}
		echo '>Botswana</option><option value="Bouvet Island"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Bouvet Island') {
			echo 'selected="selected"';
		}
		echo '>Bouvet Island</option><option value="Brazil"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Brazil') {
			echo 'selected="selected"';
		}
		echo '>Brazil</option><option value="British Indian Ocean Territory"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'British Indian Ocean Territory') {
			echo 'selected="selected"';
		}
		echo '>British Indian Ocean Territory</option><option value="Brunei Darussalam"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Brunei Darussalam') {
			echo 'selected="selected"';
		}
		echo '>Brunei Darussalam</option><option value="Bulgaria"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Bulgaria') {
			echo 'selected="selected"';
		}
		echo '>Bulgaria</option><option value="Burkina Faso"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Burkina Faso') {
			echo 'selected="selected"';
		}
		echo '>Burkina Faso</option><option value="Burundi"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Burundi') {
			echo 'selected="selected"';
		}
		echo '>Burundi</option><option value="Cambodia"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Cambodia') {
			echo 'selected="selected"';
		}
		echo '>Cambodia</option><option value="Cameroon"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Cameroon') {
			echo 'selected="selected"';
		}
		echo '>Cameroon</option><option value="Canada"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Canada') {
			echo 'selected="selected"';
		}
		echo '>Canada</option><option value="Cape Verde"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Cape Verde') {
			echo 'selected="selected"';
		}
		echo '>Cape Verde</option><option value="Cayman Islands"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Cayman Islands') {
			echo 'selected="selected"';
		}
		echo '>Cayman Islands</option><option value="Central African Republic"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Central African Republic') {
			echo 'selected="selected"';
		}
		echo '>Central African Republic</option><option value="Chad"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Chad') {
			echo 'selected="selected"';
		}
		echo '>Chad</option><option value="Chile"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Chile') {
			echo 'selected="selected"';
		}
		echo '>Chile</option><option value="China"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'China') {
			echo 'selected="selected"';
		}
		echo '>China</option><option value="Christmas Island"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Christmas Island') {
			echo 'selected="selected"';
		}
		echo '>Christmas Island</option><option value="Cocos (Keeling) Islands"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Cocos (Keeling) Islands') {
			echo 'selected="selected"';
		}
		echo '>Cocos (Keeling) Islands</option><option value="Colombia"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Colombia') {
			echo 'selected="selected"';
		}
		echo '>Colombia</option><option value="Comoros"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Comoros') {
			echo 'selected="selected"';
		}
		echo '>Comoros</option><option value="Congo"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Congo') {
			echo 'selected="selected"';
		}
		echo '>Congo</option><option value="Congo, Democratic Republic"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Congo, Democratic Republic') {
			echo 'selected="selected"';
		}
		echo '>Congo, Democratic Republic</option><option value="Cook Islands"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Cook Islands') {
			echo 'selected="selected"';
		}
		echo '>Cook Islands</option><option value="Costa Rica"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Costa Rica') {
			echo 'selected="selected"';
		}
		echo '>Costa Rica</option><option value="Cote D\'Ivoire"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == "Cote D\'Ivoire") {
			echo 'selected="selected"';
		}
		echo '>Cote D\'Ivoire</option><option value="Croatia"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Croatia') {
			echo 'selected="selected"';
		}
		echo '>Croatia</option><option value="Cuba"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Cuba') {
			echo 'selected="selected"';
		}
		echo '>Cuba</option><option value="Curacao"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Curacao') {
			echo 'selected="selected"';
		}
		echo '>Curacao</option><option value="Cyprus"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Cyprus') {
			echo 'selected="selected"';
		}
		echo '>Cyprus</option><option value="Czech Republic"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Czech Republic') {
			echo 'selected="selected"';
		}
		echo '>Czech Republic</option><option value="Denmark"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Denmark') {
			echo 'selected="selected"';
		}
		echo '>Denmark</option><option value="Djibouti"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Djibouti') {
			echo 'selected="selected"';
		}
		echo '>Djibouti</option><option value="Dominica"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Dominica') {
			echo 'selected="selected"';
		}
		echo '>Dominica</option><option value="Dominican Republic"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Dominican Republic') {
			echo 'selected="selected"';
		}
		echo '>Dominican Republic</option><option value="Ecuador"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Ecuador') {
			echo 'selected="selected"';
		}
		echo '>Ecuador</option><option value="Egypt"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Egypt') {
			echo 'selected="selected"';
		}
		echo '>Egypt</option><option value="El Salvador"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'El Salvador') {
			echo 'selected="selected"';
		}
		echo '>El Salvador</option><option value="Equatorial Guinea"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Equatorial Guinea') {
			echo 'selected="selected"';
		}
		echo '>Equatorial Guinea</option><option value="Eritrea"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Eritrea') {
			echo 'selected="selected"';
		}
		echo '>Eritrea</option><option value="Estonia"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Estonia') {
			echo 'selected="selected"';
		}
		echo '>Estonia</option><option value="Ethiopia"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Ethiopia') {
			echo 'selected="selected"';
		}
		echo '>Ethiopia</option><option value="Falkland Islands (Malvinas)"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Falkland Islands (Malvinas)') {
			echo 'selected="selected"';
		}
		echo '>Falkland Islands (Malvinas)</option><option value="Faroe Islands"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Faroe Islands') {
			echo 'selected="selected"';
		}
		echo '>Faroe Islands</option><option value="Fiji"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Fiji') {
			echo 'selected="selected"';
		}
		echo '>Fiji</option><option value="Finland"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Finland') {
			echo 'selected="selected"';
		}
		echo '>Finland</option><option value="France"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'France') {
			echo 'selected="selected"';
		}
		echo '>France</option><option value="French Guiana"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'French Guiana') {
			echo 'selected="selected"';
		}
		echo '>French Guiana</option><option value="French Polynesia"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'French Polynesia') {
			echo 'selected="selected"';
		}
		echo '>French Polynesia</option><option value="French Southern Territories"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'French Southern Territories') {
			echo 'selected="selected"';
		}
		echo '>French Southern Territories</option><option value="Gabon"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Gabon') {
			echo 'selected="selected"';
		}
		echo '>Gabon</option><option value="Gambia"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Gambia') {
			echo 'selected="selected"';
		}
		echo '>Gambia</option><option value="Georgia"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Georgia') {
			echo 'selected="selected"';
		}
		echo '>Georgia</option><option value="Germany"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Germany') {
			echo 'selected="selected"';
		}
		echo '>Germany</option><option value="Ghana"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Ghana') {
			echo 'selected="selected"';
		}
		echo '>Ghana</option><option value="Gibraltar"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Gibraltar') {
			echo 'selected="selected"';
		}
		echo '>Gibraltar</option><option value="Greece"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Greece') {
			echo 'selected="selected"';
		}
		echo '>Greece</option><option value="Greenland"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Greenland') {
			echo 'selected="selected"';
		}
		echo '>Greenland</option><option value="Grenada"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Grenada') {
			echo 'selected="selected"';
		}
		echo '>Grenada</option><option value="Guadeloupe"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Guadeloupe') {
			echo 'selected="selected"';
		}
		echo '>Guadeloupe</option><option value="Guam"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Guam') {
			echo 'selected="selected"';
		}
		echo '>Guam</option><option value="Guatemala"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Guatemala') {
			echo 'selected="selected"';
		}
		echo '>Guatemala</option><option value="Guernsey"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Guernsey') {
			echo 'selected="selected"';
		}
		echo '>Guernsey</option><option value="Guinea"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Guinea') {
			echo 'selected="selected"';
		}
		echo '>Guinea</option><option value="Guinea-Bissau"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Guinea-Bissau') {
			echo 'selected="selected"';
		}
		echo '>Guinea-Bissau</option><option value="Guyana"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Guyana') {
			echo 'selected="selected"';
		}
		echo '>Guyana</option><option value="Haiti"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Haiti') {
			echo 'selected="selected"';
		}
		echo '>Haiti</option><option value="Heard Island & Mcdonald Islands"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Heard Island & Mcdonald Islands') {
			echo 'selected="selected"';
		}
		echo '>Heard Island & Mcdonald Islands</option><option value="Holy See (Vatican City State)"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Holy See (Vatican City State)') {
			echo 'selected="selected"';
		}
		echo '>Holy See (Vatican City State)</option><option value="Honduras"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Honduras') {
			echo 'selected="selected"';
		}
		echo '>Honduras</option><option value="Hong Kong<"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Hong Kong<') {
			echo 'selected="selected"';
		}
		echo '>Hong Kong<</option><option value="Hungary"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Hungary') {
			echo 'selected="selected"';
		}
		echo '>Hungary</option><option value="Iceland"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Iceland') {
			echo 'selected="selected"';
		}
		echo '>Iceland</option><option value="India"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'India') {
			echo 'selected="selected"';
		}
		echo '>India</option><option value="Indonesia"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Indonesia') {
			echo 'selected="selected"';
		}
		echo '>Indonesia</option><option value="Iran, Islamic Republic Of"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Iran, Islamic Republic Of') {
			echo 'selected="selected"';
		}
		echo '>Iran, Islamic Republic Of</option><option value="Iraq"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Iraq') {
			echo 'selected="selected"';
		}
		echo '>Iraq</option><option value="Ireland"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Ireland') {
			echo 'selected="selected"';
		}
		echo '>Ireland</option><option value="Isle Of Man"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Isle Of Man') {
			echo 'selected="selected"';
		}
		echo '>Isle Of Man</option><option value="Israel"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Israel') {
			echo 'selected="selected"';
		}
		echo '>Israel</option><option value="Italy"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Italy') {
			echo 'selected="selected"';
		}
		echo '>Italy</option><option value="Jamaica"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Jamaica') {
			echo 'selected="selected"';
		}
		echo '>Jamaica</option><option value="Japan"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Japan') {
			echo 'selected="selected"';
		}
		echo '>Japan</option><option value="Jersey"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Jersey') {
			echo 'selected="selected"';
		}
		echo '>Jersey</option><option value="Jordan"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Jordan') {
			echo 'selected="selected"';
		}
		echo '>Jordan</option><option value="Kazakhstan"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Kazakhstan') {
			echo 'selected="selected"';
		}
		echo '>Kazakhstan</option><option value="Kenya"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Kenya') {
			echo 'selected="selected"';
		}
		echo '>Kenya</option><option value="Kiribati"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Kiribati') {
			echo 'selected="selected"';
		}
		echo '>Kiribati</option><option value="Korea"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Korea') {
			echo 'selected="selected"';
		}
		echo '>Korea</option><option value="Kuwait"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Kuwait') {
			echo 'selected="selected"';
		}
		echo '>Kuwait</option><option value="Kyrgyzstan"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Kyrgyzstan') {
			echo 'selected="selected"';
		}
		echo '>Kyrgyzstan</option><option value="Lao People\'s Democratic Republic"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == "Lao People's Democratic Republic") {
			echo 'selected="selected"';
		}
		echo '>Lao People\'s Democratic Republic</option><option value="Latvia"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Latvia') {
			echo 'selected="selected"';
		}
		echo '>Latvia</option><option value="Lebanon"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Lebanon') {
			echo 'selected="selected"';
		}
		echo '>Lebanon</option><option value="Lesotho"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Lesotho') {
			echo 'selected="selected"';
		}
		echo '>Lesotho</option><option value="Liberia"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Liberia') {
			echo 'selected="selected"';
		}
		echo '>Liberia</option><option value="Libyan Arab Jamahiriya"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Libyan Arab Jamahiriya') {
			echo 'selected="selected"';
		}
		echo '>Libyan Arab Jamahiriya</option><option value="Liechtenstein"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Liechtenstein') {
			echo 'selected="selected"';
		}
		echo '>Liechtenstein</option><option value="Lithuania"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Lithuania') {
			echo 'selected="selected"';
		}
		echo '>Lithuania</option><option value="Luxembourg"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Luxembourg') {
			echo 'selected="selected"';
		}
		echo '>Luxembourg</option><option value="Macao"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Macao') {
			echo 'selected="selected"';
		}
		echo '>Macao</option><option value="Macedonia"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Macedonia') {
			echo 'selected="selected"';
		}
		echo '>Macedonia</option><option value="Madagascar"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Madagascar') {
			echo 'selected="selected"';
		}
		echo '>Madagascar</option><option value="Malawi"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Malawi') {
			echo 'selected="selected"';
		}
		echo '>Malawi</option><option value="Malaysia"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Malaysia') {
			echo 'selected="selected"';
		}
		echo '>Malaysia</option><option value="Maldives"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Maldives') {
			echo 'selected="selected"';
		}
		echo '>Maldives</option><option value="Mali"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Mali') {
			echo 'selected="selected"';
		}
		echo '>Mali</option><option value="Malta"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Malta') {
			echo 'selected="selected"';
		}
		echo '>Malta</option><option value="Marshall Islands"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Marshall Islands') {
			echo 'selected="selected"';
		}
		echo '>Marshall Islands</option><option value="Martinique"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Martinique') {
			echo 'selected="selected"';
		}
		echo '>Martinique</option><option value="Mauritania"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Mauritania') {
			echo 'selected="selected"';
		}
		echo '>Mauritania</option><option value="Mauritius"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Mauritius') {
			echo 'selected="selected"';
		}
		echo '>Mauritius</option><option value="Mayotte"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Mayotte') {
			echo 'selected="selected"';
		}
		echo '>Mayotte</option><option value="Mexico"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Mexico') {
			echo 'selected="selected"';
		}
		echo '>Mexico</option><option value="Micronesia, Federated States Of"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Micronesia, Federated States Of') {
			echo 'selected="selected"';
		}
		echo '>Micronesia, Federated States Of</option><option value="Moldova"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Moldova') {
			echo 'selected="selected"';
		}
		echo '>Moldova</option><option value="Monaco"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Monaco') {
			echo 'selected="selected"';
		}
		echo '>Monaco</option><option value="Mongolia"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Mongolia') {
			echo 'selected="selected"';
		}
		echo '>Mongolia</option><option value="Montenegro"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Montenegro') {
			echo 'selected="selected"';
		}
		echo '>Montenegro</option><option value="Montserrat"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Montserrat') {
			echo 'selected="selected"';
		}
		echo '>Montserrat</option><option value="Morocco"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Morocco') {
			echo 'selected="selected"';
		}
		echo '>Morocco</option><option value="Mozambique"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Mozambique') {
			echo 'selected="selected"';
		}
		echo '>Mozambique</option><option value="Myanmar"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Myanmar') {
			echo 'selected="selected"';
		}
		echo '>Myanmar</option><option value="Namibia"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Namibia') {
			echo 'selected="selected"';
		}
		echo '>Namibia</option><option value="Nauru"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Nauru') {
			echo 'selected="selected"';
		}
		echo '>Nauru</option><option value="Nepal"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Nepal') {
			echo 'selected="selected"';
		}
		echo '>Nepal</option><option value="Netherlands"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Netherlands') {
			echo 'selected="selected"';
		}
		echo '>Netherlands</option><option value="Netherlands Antilles"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Netherlands Antilles') {
			echo 'selected="selected"';
		}
		echo '>Netherlands Antilles</option><option value="New Caledonia"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'New Caledonia') {
			echo 'selected="selected"';
		}
		echo '>New Caledonia</option><option value="New Zealand"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'New Zealand') {
			echo 'selected="selected"';
		}
		echo '>New Zealand</option><option value="Nicaragua"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Nicaragua') {
			echo 'selected="selected"';
		}
		echo '>Nicaragua</option><option value="Niger"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Niger') {
			echo 'selected="selected"';
		}
		echo '>Niger</option><option value="Nigeria"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Nigeria') {
			echo 'selected="selected"';
		}
		echo '>Nigeria</option><option value="Niue"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Niue') {
			echo 'selected="selected"';
		}
		echo '>Niue</option><option value="Norfolk Island"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Norfolk Island') {
			echo 'selected="selected"';
		}
		echo '>Norfolk Island</option><option value="Northern Mariana Islands"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Northern Mariana Islands') {
			echo 'selected="selected"';
		}
		echo '>Northern Mariana Islands</option><option value="Norway"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Norway') {
			echo 'selected="selected"';
		}
		echo '>Norway</option><option value="Oman"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Oman') {
			echo 'selected="selected"';
		}
		echo '>Oman</option><option value="Pakistan"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Pakistan') {
			echo 'selected="selected"';
		}
		echo '>Pakistan</option><option value="Palau"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Palau') {
			echo 'selected="selected"';
		}
		echo '>Palau</option><option value="Palestinian Territory, Occupied"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Palestinian Territory, Occupied') {
			echo 'selected="selected"';
		}
		echo '>Palestinian Territory, Occupied</option><option value="Panama"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Panama') {
			echo 'selected="selected"';
		}
		echo '>Panama</option><option value="Papua New Guinea"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Papua New Guinea') {
			echo 'selected="selected"';
		}
		echo '>Papua New Guinea</option><option value="Paraguay"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Paraguay') {
			echo 'selected="selected"';
		}
		echo '>Paraguay</option><option value="Peru"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Peru') {
			echo 'selected="selected"';
		}
		echo '>Peru</option><option value="Philippines"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Philippines') {
			echo 'selected="selected"';
		}
		echo '>Philippines</option><option value="Pitcairn"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Pitcairn') {
			echo 'selected="selected"';
		}
		echo '>Pitcairn</option><option value="Poland"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Poland') {
			echo 'selected="selected"';
		}
		echo '>Poland</option><option value="Portugal"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Portugal') {
			echo 'selected="selected"';
		}
		echo '>Portugal</option><option value="Puerto Rico"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Puerto Rico') {
			echo 'selected="selected"';
		}
		echo '>Puerto Rico</option><option value="Qatar"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Qatar') {
			echo 'selected="selected"';
		}
		echo '>Qatar</option><option value="Reunion"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Reunion') {
			echo 'selected="selected"';
		}
		echo '>Reunion</option><option value="Romania"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Romania') {
			echo 'selected="selected"';
		}
		echo '>Romania</option><option value="Russian Federation"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Russian Federation') {
			echo 'selected="selected"';
		}
		echo '>Russian Federation</option><option value="Rwanda"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Rwanda') {
			echo 'selected="selected"';
		}
		echo '>Rwanda</option><option value="Saint Barthelemy"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Saint Barthelemy') {
			echo 'selected="selected"';
		}
		echo '>Saint Barthelemy</option><option value="Saint Helena"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Saint Helena') {
			echo 'selected="selected"';
		}
		echo '>Saint Helena</option><option value="Saint Kitts And Nevis"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Saint Kitts And Nevis') {
			echo 'selected="selected"';
		}
		echo '>Saint Kitts And Nevis</option><option value="Saint Lucia"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Saint Lucia') {
			echo 'selected="selected"';
		}
		echo '>Saint Lucia</option><option value="Saint Martin"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Saint Martin') {
			echo 'selected="selected"';
		}
		echo '>Saint Martin</option><option value="Saint Pierre And Miquelon"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Saint Pierre And Miquelon') {
			echo 'selected="selected"';
		}
		echo '>Saint Pierre And Miquelon</option><option value="Saint Vincent And Grenadines"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Saint Vincent And Grenadines') {
			echo 'selected="selected"';
		}
		echo '>Saint Vincent And Grenadines</option><option value="Samoa"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Samoa') {
			echo 'selected="selected"';
		}
		echo '>Samoa</option><option value="San Marino"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'San Marino') {
			echo 'selected="selected"';
		}
		echo '>San Marino</option><option value="Sao Tome And Principe"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Sao Tome And Principe') {
			echo 'selected="selected"';
		}
		echo '>Sao Tome And Principe</option><option value="Saudi Arabia"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Saudi Arabia') {
			echo 'selected="selected"';
		}
		echo '>Saudi Arabia</option><option value="Senegal"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Senegal') {
			echo 'selected="selected"';
		}
		echo '>Senegal</option><option value="Serbia"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Serbia') {
			echo 'selected="selected"';
		}
		echo '>Serbia</option><option value="Seychelles"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Seychelles') {
			echo 'selected="selected"';
		}
		echo '>Seychelles</option><option value="Sierra Leone"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Sierra Leone') {
			echo 'selected="selected"';
		}
		echo '>Sierra Leone</option><option value="Singapore"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Singapore') {
			echo 'selected="selected"';
		}
		echo '>Singapore</option><option value="Slovakia"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Slovakia') {
			echo 'selected="selected"';
		}
		echo '>Slovakia</option><option value="Slovenia"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Slovenia') {
			echo 'selected="selected"';
		}
		echo '>Slovenia</option><option value="Solomon Islands"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Solomon Islands') {
			echo 'selected="selected"';
		}
		echo '>Solomon Islands</option><option value="Somalia"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Somalia') {
			echo 'selected="selected"';
		}
		echo '>Somalia</option><option value="South Africa"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'South Africa') {
			echo 'selected="selected"';
		}
		echo '>South Africa</option><option value="South Georgia And Sandwich Isl."';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'South Georgia And Sandwich Isl.') {
			echo 'selected="selected"';
		}
		echo '>South Georgia And Sandwich Isl.</option><option value="Spain"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Spain') {
			echo 'selected="selected"';
		}
		echo '>Spain</option><option value="Sri Lanka"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Sri Lanka') {
			echo 'selected="selected"';
		}
		echo '>Sri Lanka</option><option value="Sudan"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Sudan') {
			echo 'selected="selected"';
		}
		echo '>Sudan</option><option value="Suriname"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Suriname') {
			echo 'selected="selected"';
		}
		echo '>Suriname</option><option value="Svalbard And Jan Mayen"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Svalbard And Jan Mayen') {
			echo 'selected="selected"';
		}
		echo '>Svalbard And Jan Mayen</option><option value="Swaziland"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Swaziland') {
			echo 'selected="selected"';
		}
		echo '>Swaziland</option><option value="Sweden"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Sweden') {
			echo 'selected="selected"';
		}
		echo '>Sweden</option><option value="Switzerland"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Switzerland') {
			echo 'selected="selected"';
		}
		echo '>Switzerland</option><option value="Syrian Arab Republic"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Syrian Arab Republic') {
			echo 'selected="selected"';
		}
		echo '>Syrian Arab Republic</option><option value="Taiwan"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Taiwan') {
			echo 'selected="selected"';
		}
		echo '>Taiwan</option><option value="Tajikistan"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Tajikistan') {
			echo 'selected="selected"';
		}
		echo '>Tajikistan</option><option value="Tanzania"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Tanzania') {
			echo 'selected="selected"';
		}
		echo '>Tanzania</option><option value="Thailand"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Thailand') {
			echo 'selected="selected"';
		}
		echo '>Thailand</option><option value="Timor-Leste"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Timor-Leste') {
			echo 'selected="selected"';
		}
		echo '>Timor-Leste</option><option value="Togo"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Togo') {
			echo 'selected="selected"';
		}
		echo '>Togo</option><option value="Tokelau"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Tokelau') {
			echo 'selected="selected"';
		}
		echo '>Tokelau</option><option value="Tonga"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Tonga') {
			echo 'selected="selected"';
		}
		echo '>Tonga</option><option value="Trinidad And Tobago"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Trinidad And Tobago') {
			echo 'selected="selected"';
		}
		echo '>Trinidad And Tobago</option><option value="Tunisia"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Tunisia') {
			echo 'selected="selected"';
		}
		echo '>Tunisia</option><option value="Turkey"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Turkey') {
			echo 'selected="selected"';
		}
		echo '>Turkey</option><option value="Turkmenistan"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Turkmenistan') {
			echo 'selected="selected"';
		}
		echo '>Turkmenistan</option><option value="Turks And Caicos Islands"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Turks And Caicos Islands') {
			echo 'selected="selected"';
		}
		echo '>Turks And Caicos Islands</option><option value="Tuvalu"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Tuvalu') {
			echo 'selected="selected"';
		}
		echo '>Tuvalu</option><option value="Uganda"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Uganda') {
			echo 'selected="selected"';
		}
		echo '>Uganda</option><option value="Ukraine"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Ukraine') {
			echo 'selected="selected"';
		}
		echo '>Ukraine</option><option value="United Arab Emirates"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'United Arab Emirates') {
			echo 'selected="selected"';
		}
		echo '>United Arab Emirates</option><option value="United Kingdom"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'United Kingdom') {
			echo 'selected="selected"';
		}
		echo '>United Kingdom</option><option value="United States"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'United States') {
			echo 'selected="selected"';
		}
		echo '>United States</option><option value="United States Outlying Islands"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'United States Outlying Islands') {
			echo 'selected="selected"';
		}
		echo '>United States Outlying Islands</option><option value="Uruguay"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Uruguay') {
			echo 'selected="selected"';
		}
		echo '>Uruguay</option><option value="Uzbekistan"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Uzbekistan') {
			echo 'selected="selected"';
		}
		echo '>Uzbekistan</option><option value="Vanuatu"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Vanuatu') {
			echo 'selected="selected"';
		}
		echo '>Vanuatu</option><option value="Venezuela"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Venezuela') {
			echo 'selected="selected"';
		}
		echo '>Venezuela</option><option value="Viet Nam"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Viet Nam') {
			echo 'selected="selected"';
		}
		echo '>Viet Nam</option><option value="Virgin Islands, British"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Virgin Islands, British') {
			echo 'selected="selected"';
		}
		echo '>Virgin Islands, British</option><option value="Virgin Islands, U.S."';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Virgin Islands, U.S.') {
			echo 'selected="selected"';
		}
		echo '>Virgin Islands, U.S.</option><option value="Wallis And Futuna"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Wallis And Futuna') {
			echo 'selected="selected"';
		}
		echo '>Wallis And Futuna</option><option value="Western Sahara"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Western Sahara') {
			echo 'selected="selected"';
		}
		echo '>Western Sahara</option><option value="Yemen"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Yemen') {
			echo 'selected="selected"';
		}
		echo '>Yemen</option><option value="Zambia"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Zambia') {
			echo 'selected="selected"';
		}
		echo '>Zambia</option><option value="Zimbabwe"';
		if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] == 'Zimbabwe') {
			echo 'selected="selected"';
		}
		echo '>Zimbabwe</option>'; ?>
											</select>
									</div>
									<div class="form-group">
										<label class="control-label">地址</label>
										<input type="text" class="form-control" name="address" value="<?php echo $OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['地址'] ?>" />
									</div>
									<div class="form-group">
										<label class="control-label">邮编</label>
										<input type="text" class="form-control" name="zip" value="<?php echo $OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['邮编'] ?>" />
									</div>
									<div class="form-group">
										<label class="control-label">电话号码</label>
										<input type="text" class="form-control" name="phone" value="<?php echo $OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['电话号码'] ?>" />
									</div>
									<div class="form-group">
										<label class="control-label">电子邮件</label>
										<input type="text" class="form-control" name="email" value="<?php echo $OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['电子邮件'] ?>" />
									</div>
									<div class="form-group">
										<label class="control-label">注册时间</label>
										<input type="text" class="form-control" value="<?php echo $OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['注册时间'] ?>" disabled />
									</div>
									<div class="checkbox">
										<input type="checkbox" name="notlogin" value="1"<?php if ($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['禁止'] != '0') {
			echo 'checked';
		} ?>> 禁止登陆
									</div>
									<div class="form-group">
										<a href="javascript:void(0)" onclick="$.post('/index.php/Admin/XG_Info/<?php echo $OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['uid'] ?>/',$('#userform').serialize(),function(data){if(data=='ok') swap_alert('success','修改成功','修改用户信息成功'); else swap_alert('error','修改失败','修改用户信息失败');});" class="btn btn-success">保存</a>
									</div>
								</form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-success">
                                                <div class="panel-heading" role="tab" id="headingTwo2">
                                                    <h4 class="panel-title">
                                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion2" href="#2" aria-expanded="false" aria-controls="collapseTwo">
                                                            重置/修改密码
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo2">
                                                    <div class="panel-body">
                                <form id="passform" method="post">
									<div class="form-group">
										<label class="control-label">密码</label>
										<input type="password" class="form-control" name="pass" />
									</div>
									<div class="form-group">
										<a href="javascript:void(0)" onclick="$.post('/index.php/Admin/XG_Pass/<?php echo $OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['uid'] ?>/',$('#passform').serialize(),function(data){if(data=='ok') swap_alert('success','修改成功','修改用户密码成功'); else swap_alert('error','修改失败','修改用户密码失败');});" class="btn btn-success">提交密码</a>
									</div>
								</form>
                                                    </div>
                                                </div>
                                            </div>
											<div class="panel panel-danger">
                                                <div class="panel-heading" role="tab" id="headingThree3">
                                                    <h4 class="panel-title">
                                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion2" href="#3" aria-expanded="false" aria-controls="collapseThree">
                                                            订阅的产品与服务
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree3">
                                                    <div class="panel-body">
						<table id="example" class="display table" style="width: 100%; cellspacing: 0;">
							<thead>
								<tr>
									<th>服务ID</th>
									<th>产品类型</th>
									<th>主域名</th>
									<th>状态</th>
									<th>管理</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>服务ID</th>
									<th>产品类型</th>
									<th>主域名</th>
									<th>状态</th>
									<th>管理</th>
								</tr>
							</tfoot>
							<tbody>
<?php foreach ($OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['servers'] as $OSWAP_b7da14f6d30a57d6556466c8bacc5350) { ?>
								<tr>
									<td><?php echo $OSWAP_b7da14f6d30a57d6556466c8bacc5350['id'] ?></td>
									<td><?php echo $OSWAP_b7da14f6d30a57d6556466c8bacc5350['产品类型'] ?></td>
									<td><?php echo $OSWAP_b7da14f6d30a57d6556466c8bacc5350['域名'] ?></td>
									<td><?php if ($OSWAP_b7da14f6d30a57d6556466c8bacc5350['状态'] == '激活') {
				echo '<span class="label label-success">激活</span>';
			} else if ($OSWAP_b7da14f6d30a57d6556466c8bacc5350['状态'] == '等待审核') {
				echo '<span class="label label-info">等待审核</span>';
			} else if ($OSWAP_b7da14f6d30a57d6556466c8bacc5350['状态'] == '暂停') {
				echo '<span class="label label-warning">暂停</span>';
			} else if ($OSWAP_b7da14f6d30a57d6556466c8bacc5350['状态'] == '停止') {
				echo '<span class="label label-danger">停止</span>';
			} else if ($OSWAP_b7da14f6d30a57d6556466c8bacc5350['状态'] == '驳回') {
				echo '<span class="label label-inverse">驳回</span>';
			} else if ($OSWAP_b7da14f6d30a57d6556466c8bacc5350['状态'] == '等待付款') {
				echo '<span class="label">等待付款</span>';
			}
			echo '</td>'; ?>
									<td><a href="/index.php/Admin/Server_Detailed/<?php echo $OSWAP_b7da14f6d30a57d6556466c8bacc5350['id'] ?>/" class="btn btn-info btn-xs">详细信息</a></td>
								</tr>
<?php
		} ?>
							</tbody>
						</table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
									</div>
								</div>
<?php
		echo "</div>";
		echo "</div></div></div>";
		AdminT::page_footer();
		echo "</div></main>";
		AdminT::cd_nav();
		AdminT::pjs();
		echo "<script src=\"/admin_assets/plugins/waypoints/jquery.waypoints.min.js\"></script><script src=\"/admin_assets/plugins/jquery-counterup/jquery.counterup.min.js\"></script><script src=\"/admin_assets/plugins/toastr/toastr.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.time.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.symbol.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.resize.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.tooltip.min.js\"></script><script src=\"/admin_assets/plugins/curvedlines/curvedLines.js\"></script><script src=\"/admin_assets/plugins/metrojs/MetroJs.min.js\"></script><script src=\"/admin_assets/plugins/morris/raphael.min.js\"></script><script src=\"/admin_assets/plugins/morris/morris.min.js\"></script><script src=\"/admin_assets/js/modern.min.js\"></script>";
		echo "<script src=\"/admin_assets/plugins/datatables/js/jquery.dataTables.min.js\"></script>";
		echo "<script>var extable;\$(document).ready(function() {extable=\$('#example').DataTable({\"language\":{\"url\":\"https://cdn.datatables.net/plug-ins/e9421181788/i18n/Chinese.json\"}});});</script>";
		echo "</body></html>";
	}
	function xg_info() {
		need_admin();
		$id = mac_url_get(1);
		$OSWAP_0d07de59261cc2c9023b194184c575fb = _POST('name');
		$OSWAP_d23519cda7160577a488cef431673b7a = _POST('country');
		$OSWAP_a3372a91a0ca1a8b1b4a38ebbeae2626 = _POST('address');
		$OSWAP_fd2ddfc99bfc05fd289c609c388b789c = _POST('zip');
		$OSWAP_75c050f7985c2db293354c2bc1ed86c9 = _POST('phone');
		$OSWAP_4a6f164ef3c908fa9e5fd8ffecc9b706 = _POST('email');
		$OSWAP_7fcb38a2f807a106238b84ea890a8a57 = _POST('notlogin');
		if ($OSWAP_7fcb38a2f807a106238b84ea890a8a57 == '') $OSWAP_7fcb38a2f807a106238b84ea890a8a57 = '0';
		if ((empty($OSWAP_0d07de59261cc2c9023b194184c575fb)) or (empty($OSWAP_d23519cda7160577a488cef431673b7a)) or (empty($OSWAP_a3372a91a0ca1a8b1b4a38ebbeae2626)) or (empty($OSWAP_fd2ddfc99bfc05fd289c609c388b789c)) or (empty($OSWAP_75c050f7985c2db293354c2bc1ed86c9)) or (empty($OSWAP_4a6f164ef3c908fa9e5fd8ffecc9b706))) die('用户信息未添全,请添全之后再试!!');
		if (!$this->IsMail($OSWAP_4a6f164ef3c908fa9e5fd8ffecc9b706)) die('邮箱格式错误');
		$OSWAP_a416a4b07b6f280c968f2f3bb53948d5 = localrun::xg_info($id, $OSWAP_0d07de59261cc2c9023b194184c575fb, $OSWAP_d23519cda7160577a488cef431673b7a, $OSWAP_a3372a91a0ca1a8b1b4a38ebbeae2626, $OSWAP_fd2ddfc99bfc05fd289c609c388b789c, $OSWAP_75c050f7985c2db293354c2bc1ed86c9, $OSWAP_4a6f164ef3c908fa9e5fd8ffecc9b706, $OSWAP_7fcb38a2f807a106238b84ea890a8a57);
		$OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b = $this->return_array($OSWAP_a416a4b07b6f280c968f2f3bb53948d5);
	}
	function xg_pass() {
		need_admin();
		$id = mac_url_get(1);
		$OSWAP_3fd6804806c8414bcf51fa020d02cf5a = _POST('pass');
		if (empty($OSWAP_3fd6804806c8414bcf51fa020d02cf5a)) die('请填好密码之后再试!!');
		if (!$this->IsUsername($OSWAP_3fd6804806c8414bcf51fa020d02cf5a)) die('密码格式不对!!请输入3-16位数字字母');
		$OSWAP_a416a4b07b6f280c968f2f3bb53948d5 = localrun::xg_pass($id, $OSWAP_3fd6804806c8414bcf51fa020d02cf5a);
		$OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b = $this->return_array($OSWAP_a416a4b07b6f280c968f2f3bb53948d5);
	}
	function good_group() {
		need_admin();
		$OSWAP_a416a4b07b6f280c968f2f3bb53948d5 = localrun::good_group();
		$OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b = $this->return_array($OSWAP_a416a4b07b6f280c968f2f3bb53948d5);
		AdminT::header('产品组', "<link href=\"/admin_assets/plugins/datatables/css/jquery.datatables.min.css\" rel=\"stylesheet\" type=\"text/css\"/><link href=\"/admin_assets/plugins/datatables/css/jquery.datatables_themeroller.css\" rel=\"stylesheet\" type=\"text/css\"/>");
		AdminT::search();
		echo "<main class=\"page-content content-wrap\">";
		AdminT::navbar();
		AdminT::sidebar();
		echo "<div class=\"page-inner\">";
		AdminT::title('产品组', "<li>产品管理</li>", '<a href="javascript:void(0)" onclick="$(\'#add\').modal(true);" class="btn btn-primary btn-addon btn-xs"><i class="fa fa-plus"></i> 添加产品组</a>');
		echo "<div id=\"main-wrapper\" class=\"container\"><div class=\"row\">";
		echo "<div class=\"col-md-12\">";
		echo "<div class=\"panel panel-white\"><div class=\"panel-body\"><div class=\"table-responsive\">"; ?>
<table id="example" class="display table" style="width: 100%; cellspacing: 0;">
	<thead>
		<tr>
			<th>产品组名称</th>
			<th>顺序权重</th>
			<th>隐藏</th>
			<th>操作</th>
			<th>移动分组 <a href="javascript:void(0)" onclick="$('.move').modal(true);">[?]</a></th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<th>产品组名称</th>
			<th>顺序权重</th>
			<th>隐藏</th>
			<th>操作</th>
			<th>移动分组 <a href="javascript:void(0)" onclick="$('.move').modal(true);">[?]</a></th>
		</tr>
	</tfoot>
	<tbody>
<?php $i = 0;
		foreach ($OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['goodgs'] as $OSWAP_15e32d72880445885a98273b3507f905) { ?>
		<tr class="usert<?php echo $OSWAP_15e32d72880445885a98273b3507f905['id'] ?>">
			<td><?php echo $OSWAP_15e32d72880445885a98273b3507f905['分类名称'] ?></td>
			<td><?php echo $OSWAP_15e32d72880445885a98273b3507f905['顺序'] ?></td>
			<td><?php if ($OSWAP_15e32d72880445885a98273b3507f905['隐藏'] == '0') {
				echo '显示';
			} else {
				echo '隐藏';
			} ?></td>
			<td><a href="/index.php/Admin/Good_Group_Detailed/<?php echo $OSWAP_15e32d72880445885a98273b3507f905['id'] ?>/" class="btn btn-info btn-xs">编辑</a><a href="javascript:void(0)" class="btn btn-danger btn-xs delid<?php echo $OSWAP_15e32d72880445885a98273b3507f905['id'] ?>" disabled>删除</a><input type="checkbox"onclick="$('.delid<?php echo $OSWAP_15e32d72880445885a98273b3507f905['id'] ?>').attr('onclick','$.post(\'/index.php/Admin/good_group_sc/<?php echo $OSWAP_15e32d72880445885a98273b3507f905['id'] ?>/\',\'scid=\'+$(\'input[type=\\\'radio\\\'][name=\\\'scid\\\']:checked\').val(),function(data){if(data==\'ok\') extable.row(\'.usert<?php echo $OSWAP_15e32d72880445885a98273b3507f905['id'] ?>\').remove().draw(); else swap_alert(\'error\',\'删除产品组失败\',data);});') && $('.delid<?php echo $OSWAP_15e32d72880445885a98273b3507f905['id'] ?>').attr('disabled', false) && $(this).parent().parent().remove();"/></td>
			<td><label><input type="radio" name="scid" value="<?php echo $OSWAP_15e32d72880445885a98273b3507f905['id'] ?>" style="margin-left:0px !important" <?php if (!$i) {
				echo 'checked ';
			} ?>/></label></td>
		</tr>
<?php $i++;
		} ?>
	</tbody>
</table>
<?php
		echo "</div></div></div>";
		echo "</div>";
		echo "</div></div></div>";
		AdminT::page_footer();
		echo "</div></main>";
		AdminT::cd_nav();
		AdminT::pjs();
		echo "<script src=\"/admin_assets/plugins/waypoints/jquery.waypoints.min.js\"></script><script src=\"/admin_assets/plugins/jquery-counterup/jquery.counterup.min.js\"></script><script src=\"/admin_assets/plugins/toastr/toastr.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.time.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.symbol.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.resize.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.tooltip.min.js\"></script><script src=\"/admin_assets/plugins/curvedlines/curvedLines.js\"></script><script src=\"/admin_assets/plugins/metrojs/MetroJs.min.js\"></script><script src=\"/admin_assets/plugins/morris/raphael.min.js\"></script><script src=\"/admin_assets/plugins/morris/morris.min.js\"></script><script src=\"/admin_assets/js/modern.min.js\"></script>";
		echo "<script src=\"/admin_assets/plugins/datatables/js/jquery.dataTables.min.js\"></script>";
		echo "<script>var extable;\$(document).ready(function() {extable=\$('#example').DataTable({\"language\":{\"url\":\"https://cdn.datatables.net/plug-ins/e9421181788/i18n/Chinese.json\"}});});</script>"; ?>
                                            <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="myModalLabel">添加产品组</h4>
                                                        </div>
                                                        <div class="modal-body">
				<form id="addform" method="post">
					<div class="form-group">
						<label class="control-label">产品组名称</label>
						<input type="text" class="form-control" name="name" />
					</div>
					<div class="checkbox">
						<input type="checkbox" class="form-control" name="notsee" value="1">隐藏分组
					</div>
					<div class="form-group">
						<label class="control-label">顺序权重</label>
						<input type="text" class="form-control" name="ord" value="0" />
					</div>
					<div class="form-group">
						<label class="control-label">类型</label>
						<select name="liexing" class="form-control">
							<option value="">其他类型</option>
							<option value="虚拟主机">虚拟主机</option>
							<option value="VPS">VPS</option>
							<option value="独立服务器">独立服务器</option>
							<option value="MC服务器">MC服务器</option>
						</select>
					</div>
					<div class="form-group">
						<label class="control-label">备注</label>
						<input type="text" class="form-control" name="beizhu" value="<?php echo $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['myrow']['备注'] ?>" />
					</div>
				</form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                                                            <a href="javascript:void(0)" onclick="$.post('/index.php/Admin/Good_Group_Add/',$('#addform').serialize(),function(data){if(data=='ok')location.reload();else swap_alert('error','添加产品组失败',data)});" class="btn btn-success">保存更改</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade move" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="mySmallModalLabel">移动分组</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            删除时候使用,会把要删除的产品组中剩余的产品移动到选中的产品组里面.
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
<?php
		echo "</body></html>";
	}
	function good_group_add() {
		need_admin();
		$OSWAP_0d07de59261cc2c9023b194184c575fb = _POST('name');
		$OSWAP_552b139e3f6d430a3cdc602cae2212cd = _POST('notsee');
		$OSWAP_4162e2ba3a83006eabfeb48110e0c04e = _POST('ord');
		if (empty($OSWAP_0d07de59261cc2c9023b194184c575fb)) die('请填写产品组名称!!');
		if (!str_is_int($OSWAP_4162e2ba3a83006eabfeb48110e0c04e)) die('顺序权重必须为整数');
		if (($OSWAP_552b139e3f6d430a3cdc602cae2212cd != '1') and ($OSWAP_552b139e3f6d430a3cdc602cae2212cd != '')) die('隐藏非正常值');
		$OSWAP_04376406e028e40465057304c8aa8e74 = _POST('liexing');
		$OSWAP_eb384b5a39c58bb2fa173f6b19958369 = _POST('beizhu');
		$OSWAP_a416a4b07b6f280c968f2f3bb53948d5 = localrun::new_good_group_form($OSWAP_0d07de59261cc2c9023b194184c575fb, $OSWAP_552b139e3f6d430a3cdc602cae2212cd, $OSWAP_4162e2ba3a83006eabfeb48110e0c04e, $OSWAP_04376406e028e40465057304c8aa8e74, $OSWAP_eb384b5a39c58bb2fa173f6b19958369);
		$OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b = $this->return_array($OSWAP_a416a4b07b6f280c968f2f3bb53948d5);
	}
	function good_group_sc() {
		need_admin();
		$id = mac_url_get(1);
		$OSWAP_eb3e616f26fb43f39d083c1a7c5be373 = _POST('scid');
		if ((empty($OSWAP_eb3e616f26fb43f39d083c1a7c5be373)) or (empty($id))) die('参数错误,请选择移动分组');
		if ($id == $OSWAP_eb3e616f26fb43f39d083c1a7c5be373) die('要删除的分组和移动分组不能是同一个');
		$OSWAP_a416a4b07b6f280c968f2f3bb53948d5 = localrun::good_group_sc($id, $OSWAP_eb3e616f26fb43f39d083c1a7c5be373);
		$OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b = $this->return_array($OSWAP_a416a4b07b6f280c968f2f3bb53948d5);
	}
	function good_group_detailed() {
		need_admin();
		$id = mac_url_get(1);
		$OSWAP_a416a4b07b6f280c968f2f3bb53948d5 = localrun::good_group_detailed($id);
		$OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b = $this->return_array($OSWAP_a416a4b07b6f280c968f2f3bb53948d5);
		AdminT::header('产品组编辑', "<link href=\"/admin_assets/plugins/datatables/css/jquery.datatables.min.css\" rel=\"stylesheet\" type=\"text/css\"/><link href=\"/admin_assets/plugins/datatables/css/jquery.datatables_themeroller.css\" rel=\"stylesheet\" type=\"text/css\"/>");
		AdminT::search();
		echo "<main class=\"page-content content-wrap\">";
		AdminT::navbar();
		AdminT::sidebar();
		echo "<div class=\"page-inner\">";
		AdminT::title('产品组编辑', "<li>产品管理</li><li>产品组</li>");
		echo "<div id=\"main-wrapper\" class=\"container\"><div class=\"row\">";
		echo "<div class=\"col-md-12\">";
		echo "<div class=\"panel panel-white\"><div class=\"panel-body\"><div class=\"table-responsive\">"; ?>
				<form id="userform" method="post">
					<div class="form-group">
						<label class="control-label">产品组名称</label>
						<input type="text" class="form-control" name="name" value="<?php echo $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['myrow']['分类名称'] ?>" />
					</div>
					<div class="form-group">
						<input type="checkbox" name="notsee" value="1"<?php if ($OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['myrow']['隐藏'] != '0') {
			echo ' checked';
		} ?>>隐藏分组
					</div>
					<div class="form-group">
						<label class="control-label">顺序权重</label>
						<input type="text" class="form-control" name="ord" value="<?php echo $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['myrow']['顺序'] ?>" />
					</div>
					<div class="form-group">
						<label class="control-label">类型</label>
						<select name="liexing" class="form-control">
							<option value="">其他类型</option>
							<option value="虚拟主机"<?php if ($OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['myrow']['类型'] == '虚拟主机') {
			echo ' selected';
		} ?>>虚拟主机</option>
							<option value="VPS"<?php if ($OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['myrow']['类型'] == 'VPS') {
			echo ' selected';
		} ?>>VPS</option>
							<option value="独立服务器"<?php if ($OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['myrow']['类型'] == '独立服务器') {
			echo ' selected';
		} ?>>独立服务器</option>
							<option value="MC服务器"<?php if ($OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['myrow']['类型'] == 'MC服务器') {
			echo ' selected';
		} ?>>MC服务器</option>
						</select>
					</div>
					<div class="form-group">
						<label class="control-label">备注</label>
						<input type="text" class="form-control" name="beizhu" value="<?php echo $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['myrow']['备注'] ?>" />
					</div>
					<div class="form-group">
						<a href="javascript:void(0)" onclick="$.post('/index.php/Admin/XG_Good_Group_Form/<?php echo $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['myrow']['id'] ?>/',$('#userform').serialize(),function(data){if(data=='ok') swap_alert('success','修改成功','修改产品组成功'); else swap_alert('error','修改失败',data);});" class="btn btn-success">修改产品组</a>
					</div>
				</form>
<?php
		echo "</div></div></div>";
		echo "</div>";
		echo "</div></div></div>";
		AdminT::page_footer();
		echo "</div></main>";
		AdminT::cd_nav();
		AdminT::pjs();
		echo "<script src=\"/admin_assets/plugins/waypoints/jquery.waypoints.min.js\"></script><script src=\"/admin_assets/plugins/jquery-counterup/jquery.counterup.min.js\"></script><script src=\"/admin_assets/plugins/toastr/toastr.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.time.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.symbol.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.resize.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.tooltip.min.js\"></script><script src=\"/admin_assets/plugins/curvedlines/curvedLines.js\"></script><script src=\"/admin_assets/plugins/metrojs/MetroJs.min.js\"></script><script src=\"/admin_assets/plugins/morris/raphael.min.js\"></script><script src=\"/admin_assets/plugins/morris/morris.min.js\"></script><script src=\"/admin_assets/js/modern.min.js\"></script>";
		echo "<script src=\"/admin_assets/plugins/datatables/js/jquery.dataTables.min.js\"></script>";
		echo "</body></html>";
	}
	function xg_good_group_form() {
		need_admin();
		$id = mac_url_get(1);
		$OSWAP_0d07de59261cc2c9023b194184c575fb = _POST('name');
		$OSWAP_552b139e3f6d430a3cdc602cae2212cd = _POST('notsee');
		$OSWAP_4162e2ba3a83006eabfeb48110e0c04e = _POST('ord');
		if (empty($OSWAP_0d07de59261cc2c9023b194184c575fb)) die('请填写产品组名称!!');
		if (!str_is_int($OSWAP_4162e2ba3a83006eabfeb48110e0c04e)) die('顺序权重必须为整数');
		if (($OSWAP_552b139e3f6d430a3cdc602cae2212cd != '1') and ($OSWAP_552b139e3f6d430a3cdc602cae2212cd != '')) die('隐藏非正常值');
		$OSWAP_04376406e028e40465057304c8aa8e74 = _POST('liexing');
		$OSWAP_eb384b5a39c58bb2fa173f6b19958369 = _POST('beizhu');
		$OSWAP_a416a4b07b6f280c968f2f3bb53948d5 = localrun::xg_good_group_form($id, $OSWAP_0d07de59261cc2c9023b194184c575fb, $OSWAP_552b139e3f6d430a3cdc602cae2212cd, $OSWAP_4162e2ba3a83006eabfeb48110e0c04e, $OSWAP_04376406e028e40465057304c8aa8e74, $OSWAP_eb384b5a39c58bb2fa173f6b19958369);
		$OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b = $this->return_array($OSWAP_a416a4b07b6f280c968f2f3bb53948d5);
	}
	function servicer() {
		need_admin();
		$OSWAP_a416a4b07b6f280c968f2f3bb53948d5 = localrun::servicer();
		$OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b = $this->return_array($OSWAP_a416a4b07b6f280c968f2f3bb53948d5);
		AdminT::header('服务器', "<link href=\"/admin_assets/plugins/datatables/css/jquery.datatables.min.css\" rel=\"stylesheet\" type=\"text/css\"/><link href=\"/admin_assets/plugins/datatables/css/jquery.datatables_themeroller.css\" rel=\"stylesheet\" type=\"text/css\"/>");
		AdminT::search();
		echo "<main class=\"page-content content-wrap\">";
		AdminT::navbar();
		AdminT::sidebar();
		echo "<div class=\"page-inner\">";
		AdminT::title('服务器', '', '<a href="javascript:void(0)" onclick="$.get(\'/index.php/Admin/Servicer_Add/\',function(){location.reload();});" class="btn btn-primary btn-addon btn-xs"><i class="fa fa-plus"></i> 添加服务器</a>');
		echo "<div id=\"main-wrapper\" class=\"container\"><div class=\"row\">";
		echo "<div class=\"col-md-12\">";
		echo "<div class=\"panel panel-white\"><div class=\"panel-body\"><div class=\"table-responsive\">"; ?>
<table id="example" class="display table" style="width: 100%; cellspacing: 0;">
	<thead>
		<tr>
			<th>服务器名称</th>
			<th>账户用量</th>
			<th>快速登入</th>
			<th>状态</th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['tempservicers'] as $OSWAP_2e4833d679db4c6ee2bff27be88d8f24) { ?>
		<tr class="usert<?php echo $OSWAP_2e4833d679db4c6ee2bff27be88d8f24['id'] ?>">
			<td><?php echo $OSWAP_2e4833d679db4c6ee2bff27be88d8f24['名称'] ?></td>
			<td><?php echo $OSWAP_2e4833d679db4c6ee2bff27be88d8f24['use'] ?>/<?php echo $OSWAP_2e4833d679db4c6ee2bff27be88d8f24['最大账户'] ?> <?php echo $OSWAP_2e4833d679db4c6ee2bff27be88d8f24['百分比'] ?></td>
			<td><?php echo $OSWAP_2e4833d679db4c6ee2bff27be88d8f24['adminlink'] ?></td>
			<td><?php if ($OSWAP_2e4833d679db4c6ee2bff27be88d8f24['禁用'] == '1') {
				echo '<span class="badge badge-secondary badge-roundless">禁用</span>';
			} else {
				echo '<span class="badge badge-success badge-roundless">启用</span>';
			} ?></td>
			<td><a href="/index.php/Admin/Servicer_Detailed/<?php echo $OSWAP_2e4833d679db4c6ee2bff27be88d8f24['id'] ?>/" class="btn btn-info btn-xs">编辑</a><a href="javascript:void(0)" class="btn btn-danger btn-xs delid<?php echo $OSWAP_2e4833d679db4c6ee2bff27be88d8f24['id'] ?>" disabled>删除</a><input type="checkbox"onclick="$('.delid<?php echo $OSWAP_2e4833d679db4c6ee2bff27be88d8f24['id'] ?>').attr('onclick','$.post(\'/index.php/Admin/servicer_sc/<?php echo $OSWAP_2e4833d679db4c6ee2bff27be88d8f24['id'] ?>/\',function(data){if(data==\'ok\') extable.row(\'.usert<?php echo $OSWAP_2e4833d679db4c6ee2bff27be88d8f24['id'] ?>\').remove().draw(); else swap_alert(\'error\',\'删除服务器失败\',data);});') && $('.delid<?php echo $OSWAP_2e4833d679db4c6ee2bff27be88d8f24['id'] ?>').attr('disabled', false) && $(this).parent().parent().remove();"/></td>
		</tr>
<?php
		} ?>
	</tbody>
	<tfoot>
		<tr>
			<th>服务器名称</th>
			<th>账户用量</th>
			<th>快速登入</th>
			<th>状态</th>
			<th>操作</th>
		</tr>
	</tfoot>
</table>
<?php
		echo "</div></div></div>";
		echo "</div>";
		echo "</div></div></div>";
		AdminT::page_footer();
		echo "</div></main>";
		AdminT::cd_nav();
		AdminT::pjs();
		echo "<script src=\"/admin_assets/plugins/waypoints/jquery.waypoints.min.js\"></script><script src=\"/admin_assets/plugins/jquery-counterup/jquery.counterup.min.js\"></script><script src=\"/admin_assets/plugins/toastr/toastr.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.time.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.symbol.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.resize.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.tooltip.min.js\"></script><script src=\"/admin_assets/plugins/curvedlines/curvedLines.js\"></script><script src=\"/admin_assets/plugins/metrojs/MetroJs.min.js\"></script><script src=\"/admin_assets/plugins/morris/raphael.min.js\"></script><script src=\"/admin_assets/plugins/morris/morris.min.js\"></script><script src=\"/admin_assets/js/modern.min.js\"></script>";
		echo "<script src=\"/admin_assets/plugins/datatables/js/jquery.dataTables.min.js\"></script>";
		echo "<script>var extable;\$(document).ready(function() {extable=\$('#example').DataTable({\"language\":{\"url\":\"https://cdn.datatables.net/plug-ins/e9421181788/i18n/Chinese.json\"}});});</script>";
		echo "</body></html>";
	}
	function servicer_add() {
		need_admin();
		$OSWAP_a416a4b07b6f280c968f2f3bb53948d5 = localrun::new_servicer_form('新建服务器' . time(), '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
		$OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b = $this->return_array($OSWAP_a416a4b07b6f280c968f2f3bb53948d5);
	}
	function servicer_sc() {
		need_admin();
		$id = mac_url_get(1);
		if (empty($id)) die('参数错误,请选择删除id');
		$OSWAP_a416a4b07b6f280c968f2f3bb53948d5 = localrun::servicer_sc($id);
		$OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b = $this->return_array($OSWAP_a416a4b07b6f280c968f2f3bb53948d5);
	}
	function servicer_detailed() {
		need_admin();
		$id = mac_url_get(1);
		$OSWAP_a416a4b07b6f280c968f2f3bb53948d5 = localrun::servicer_detailed($id);
		$OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b = $this->return_array($OSWAP_a416a4b07b6f280c968f2f3bb53948d5);
		$OSWAP_2e4833d679db4c6ee2bff27be88d8f24 = $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['myrow'];
		if (mac_url_get(2) == 'cake') {
			if ($OSWAP_2e4833d679db4c6ee2bff27be88d8f24['控制面板'] != '') {
				$OSWAP_6c5cee550b682ff7d674773f07a17f33 = array();
				$OSWAP_6c5cee550b682ff7d674773f07a17f33["moduletype"] = $OSWAP_2e4833d679db4c6ee2bff27be88d8f24['控制面板'];
				$OSWAP_6c5cee550b682ff7d674773f07a17f33["servicer"] = $OSWAP_2e4833d679db4c6ee2bff27be88d8f24;
				$OSWAP_2e29d37ed05a8087327b406a5df9d569 = ServerFunction($OSWAP_6c5cee550b682ff7d674773f07a17f33, 'ServerCake');
				if ($OSWAP_2e29d37ed05a8087327b406a5df9d569 == '成功') echo '连接服务器成功';
				else echo $OSWAP_2e29d37ed05a8087327b406a5df9d569;
			} else {
				echo '请选择面板保存后重新检测';
			}
			exit;
		}
		AdminT::header('服务器编辑', "<link href=\"/admin_assets/plugins/datatables/css/jquery.datatables.min.css\" rel=\"stylesheet\" type=\"text/css\"/><link href=\"/admin_assets/plugins/datatables/css/jquery.datatables_themeroller.css\" rel=\"stylesheet\" type=\"text/css\"/>");
		AdminT::search();
		echo "<main class=\"page-content content-wrap\">";
		AdminT::navbar();
		AdminT::sidebar();
		echo "<div class=\"page-inner\">";
		AdminT::title('服务器编辑', "<li>服务器</li>");
		echo "<div id=\"main-wrapper\" class=\"container\"><div class=\"row\">";
		echo "<div class=\"col-md-12\">";
		echo "<div class=\"panel panel-white\"><div class=\"panel-body\"><div class=\"table-responsive\">"; ?>
				<form id="servicerform" class="form-horizontal col-md-12">
					<div class="form-group">
						<label class="col-sm-4 control-label">名称</label>
						<div class="col-sm-6">
							<input type="text" name="名称" class="form-control" placeholder="服务器的显示名称" value="<?php echo $OSWAP_2e4833d679db4c6ee2bff27be88d8f24['名称'] ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">服务器主机名</label>
						
						<div class="col-sm-6">
							<input type="text" name="主机名" class="form-control" placeholder="服务器的主机名（也可以说是域名）" value="<?php echo $OSWAP_2e4833d679db4c6ee2bff27be88d8f24['主机名'] ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">服务器IP地址</label>
						
						<div class="col-sm-6">
							<input type="text" name="ip" class="form-control" placeholder="服务器的IP地址（如果填写了主机名会优先主机名）" value="<?php echo $OSWAP_2e4833d679db4c6ee2bff27be88d8f24['ip'] ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">服务器端口</label>
						
						<div class="col-sm-6">
							<input type="text" name="port" class="form-control" placeholder="服务器端口（需要插件支持,默认为空）" value="<?php echo $OSWAP_2e4833d679db4c6ee2bff27be88d8f24['端口'] ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">通信检测</label>
						<div class="col-sm-6">
							<i class="fa fa-question-circle pull-right" title="中国特色社会主义专用功能"></i>
							<span class="servercake">请点击检测进行测试</span> <a href="javascript:void(0)" onclick="$('.cakeico').addClass('fa-spinner').removeClass('fa-refresh');$('.caket').html('正在检测');$.get('cake/',function(data){$('.servercake').html(data);$('.cakeico').addClass('fa-refresh').removeClass('fa-spinner');$('.caket').html('重新检测');}).error(function(data){$('.servercake').html('超时连接,可能是连接不上吧');$('.cakeico').addClass('fa-refresh').removeClass('fa-spinner');$('.caket').html('重新检测');});"><i class="fa fa-refresh cakeico"></i><span class="caket">重新检测</span></a>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">可分配的IP列表<br/>（一行一个）</label>
						
						<div class="col-sm-6">
							<textarea name="iplist" cols="30" rows="10"><?php echo $OSWAP_2e4833d679db4c6ee2bff27be88d8f24['分配的IP地址'] ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">数据中心位置</label>
						
						<div class="col-sm-6">
							<input type="text" name="位置" class="form-control" placeholder="外部显示的服务器的所在位置" value="<?php echo $OSWAP_2e4833d679db4c6ee2bff27be88d8f24['数据中心位置'] ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">最多承受的帐户数量（暂时不能用）</label>
						
						<div class="col-sm-6">
							<input type="text" name="最大账户" class="form-control" placeholder="这台服务器最多可开多少用户" value="<?php echo $OSWAP_2e4833d679db4c6ee2bff27be88d8f24['最大账户'] ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">服务器状态地址</label>
						
						<div class="col-sm-6">
							<input type="text" name="状态地址" class="form-control" placeholder="http://xxxxxx/status/" value="<?php echo $OSWAP_2e4833d679db4c6ee2bff27be88d8f24['服务器状态地址'] ?>">
							<br/>建立一个空间上传根目录下的status文件夹地址然后输入那个文件夹的地址如：http://www.betalinux.com/status/
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">启用/禁用</label>
						
						<div class="col-sm-6">
							<label class="cb-wrapper"><input type="checkbox" name="禁用" value="1"<?php if ($OSWAP_2e4833d679db4c6ee2bff27be88d8f24['禁用']) {
			echo ' checked';
		} ?>>禁用服务器 将会禁用和本服务器相关的一切操作</label>
						</div>
					</div>
					<h4>DNS服务器</h4>
                    <div class="form-group">
						<label class="col-sm-4 control-label">主DNS服务器IP或主机名</label>
						
						<div class="col-sm-6">
							<input type="text" name="dns1" class="form-control" value="<?php echo $OSWAP_2e4833d679db4c6ee2bff27be88d8f24['DNS服务器1'] ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">次DNS服务器IP或主机名</label>
						
						<div class="col-sm-6">
							<input type="text" name="dns2" class="form-control" value="<?php echo $OSWAP_2e4833d679db4c6ee2bff27be88d8f24['DNS服务器2'] ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">第三DNS服务器IP或主机名</label>
						
						<div class="col-sm-6">
							<input type="text" name="dns3" class="form-control" value="<?php echo $OSWAP_2e4833d679db4c6ee2bff27be88d8f24['DNS服务器3'] ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">第四DNS服务器IP或主机名</label>
						
						<div class="col-sm-6">
							<input type="text" name="dns4" class="form-control" value="<?php echo $OSWAP_2e4833d679db4c6ee2bff27be88d8f24['DNS服务器4'] ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">第五DNS服务器IP或主机名</label>
						
						<div class="col-sm-6">
							<input type="text" name="dns5" class="form-control" value="<?php echo $OSWAP_2e4833d679db4c6ee2bff27be88d8f24['DNS服务器5'] ?>">
						</div>
					</div>
					<h4>服务器的详细信息</h4>
					<div class="form-group">
						<label class="col-sm-4 control-label">已经安装的服务器插件</label>
						
						<div class="col-sm-6">
							<select name="面板" class="form-control">
								<option value="">未选择面板</option>
<?php foreach ($OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['module'] as $OSWAP_2b274b1611c149c99f706cb822116d2e) { ?>
								<option value="<?php echo $OSWAP_2b274b1611c149c99f706cb822116d2e ?>"<?php if ($OSWAP_2b274b1611c149c99f706cb822116d2e == $OSWAP_2e4833d679db4c6ee2bff27be88d8f24['控制面板']) {
				echo ' selected';
			} ?>><?php echo $OSWAP_2b274b1611c149c99f706cb822116d2e ?></option>
<?php
		} ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">用户名</label>
						
						<div class="col-sm-6">
							<input type="text" name="用户名" class="form-control" placeholder="面板或服务器的用户名" value="<?php echo $OSWAP_2e4833d679db4c6ee2bff27be88d8f24['用户名'] ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="field-3" class="col-sm-4 control-label">密码</label>
						
						<div class="col-sm-6">
							<input type="password" style="display:none"/>
							<input type="password" name="密码" class="form-control" placeholder="面板和服务器的密码" value="<?php echo $OSWAP_2e4833d679db4c6ee2bff27be88d8f24['密码'] ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">哈希密码<br/>(cPanel服务器等服务器的，可不填,EP填安全码)</label>
						<div class="col-sm-6">
							<textarea name="sampass" cols="30" rows="10"><?php echo $OSWAP_2e4833d679db4c6ee2bff27be88d8f24['哈希密码'] ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">通信安全</label>
						<div class="col-sm-6">
							<label class="cb-wrapper"><input type="checkbox" name="SSL" value="1"<?php if ($OSWAP_2e4833d679db4c6ee2bff27be88d8f24['使用SSL'] == '1') {
			echo ' checked';
		} ?>>勾选使用SSL连接模式</label>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-6">
							<a href="javascript:void(0)" onclick="$.post('/index.php/Admin/servicer_detailed_form/<?php echo $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['myrow']['id'] ?>/',$('#servicerform').serialize(),function(data){if(data=='ok') swap_alert('success','修改成功','修改服务器成功'); else swap_alert('error','修改失败',data);});" class="btn btn-success">保存更改</a>
						</div>
					</div>
				</form>
<?php
		echo "</div></div></div>";
		echo "</div>";
		echo "</div></div></div>";
		AdminT::page_footer();
		echo "</div></main>";
		AdminT::cd_nav();
		AdminT::pjs();
		echo "<script src=\"/admin_assets/plugins/waypoints/jquery.waypoints.min.js\"></script><script src=\"/admin_assets/plugins/jquery-counterup/jquery.counterup.min.js\"></script><script src=\"/admin_assets/plugins/toastr/toastr.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.time.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.symbol.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.resize.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.tooltip.min.js\"></script><script src=\"/admin_assets/plugins/curvedlines/curvedLines.js\"></script><script src=\"/admin_assets/plugins/metrojs/MetroJs.min.js\"></script><script src=\"/admin_assets/plugins/morris/raphael.min.js\"></script><script src=\"/admin_assets/plugins/morris/morris.min.js\"></script><script src=\"/admin_assets/js/modern.min.js\"></script>";
		echo "<script src=\"/admin_assets/plugins/datatables/js/jquery.dataTables.min.js\"></script>";
		echo "</body></html>";
	}
	function servicer_detailed_form() {
		need_admin();
		$id = mac_url_get(1);
		$OSWAP_0d07de59261cc2c9023b194184c575fb = _POST('名称');
		$OSWAP_82bdfee4b92084c05ac3b384dd79c752 = _POST('主机名');
		$ip = _POST('ip');
		$OSWAP_14635fb92ee0b0e7eddeb8859de672fb = _POST('port');
		$OSWAP_9683125aed760720a73f71e57d88b11f = _POST('iplist');
		$OSWAP_c3ece359645a45d83437d4459f58ef6d = _POST('位置');
		$OSWAP_abcbb33ba497e80b7cb6a0de189c007f = _POST('最大账户');
		$OSWAP_67c2a10cb5ca807d34acb52e7169bd07 = _POST('状态地址');
		$OSWAP_8bdcb5461233a97332c2b038f2df6411 = _POST('dns1');
		$OSWAP_9a57a8334abfc318de05633ffcaaa1b3 = _POST('dns2');
		$OSWAP_defb5ad8d716eeb26d04ddd1df10cfc8 = _POST('dns3');
		$OSWAP_9a7024711733e1f5c644e34c6b6669dc = _POST('dns4');
		$OSWAP_6bf5be4862813b554e093fb427b62dc4 = _POST('dns5');
		$OSWAP_07e5d1ddb668713ec99497bea967ec03 = _POST('面板');
		$OSWAP_30b31a94e0c5a437f6c1c6006e473bc5 = _POST('用户名');
		$OSWAP_3fd6804806c8414bcf51fa020d02cf5a = _POST('密码');
		$OSWAP_2c83e001e442cc3330449f303911fefd = _POST('禁用');
		$OSWAP_ff18838bb252b9e87f5dfe2f39270d32 = _POST('SSL');
		$OSWAP_5877bc4a7def4249f944e03fe68ddbee = _POST('sampass');
		if (empty($OSWAP_0d07de59261cc2c9023b194184c575fb)) die('请填写服务器名称!!');
		if (($OSWAP_abcbb33ba497e80b7cb6a0de189c007f != '') and (!str_is_int($OSWAP_abcbb33ba497e80b7cb6a0de189c007f)) and ($OSWAP_abcbb33ba497e80b7cb6a0de189c007f != '0')) die('最大承受账户必须为整数');
		$OSWAP_a416a4b07b6f280c968f2f3bb53948d5 = localrun::servicer_detailed_form($id, $OSWAP_0d07de59261cc2c9023b194184c575fb, $OSWAP_82bdfee4b92084c05ac3b384dd79c752, $ip, $OSWAP_9683125aed760720a73f71e57d88b11f, $OSWAP_abcbb33ba497e80b7cb6a0de189c007f, $OSWAP_67c2a10cb5ca807d34acb52e7169bd07, $OSWAP_2c83e001e442cc3330449f303911fefd, $OSWAP_8bdcb5461233a97332c2b038f2df6411, $OSWAP_9a57a8334abfc318de05633ffcaaa1b3, $OSWAP_defb5ad8d716eeb26d04ddd1df10cfc8, $OSWAP_9a7024711733e1f5c644e34c6b6669dc, $OSWAP_6bf5be4862813b554e093fb427b62dc4, $OSWAP_07e5d1ddb668713ec99497bea967ec03, $OSWAP_30b31a94e0c5a437f6c1c6006e473bc5, $OSWAP_3fd6804806c8414bcf51fa020d02cf5a, $OSWAP_5877bc4a7def4249f944e03fe68ddbee, $OSWAP_ff18838bb252b9e87f5dfe2f39270d32, $OSWAP_c3ece359645a45d83437d4459f58ef6d, $OSWAP_14635fb92ee0b0e7eddeb8859de672fb);
		$OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b = $this->return_array($OSWAP_a416a4b07b6f280c968f2f3bb53948d5);
	}
	function server_all() {
		need_admin();
		$OSWAP_a416a4b07b6f280c968f2f3bb53948d5 = localrun::server_all();
		$OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b = $this->return_array($OSWAP_a416a4b07b6f280c968f2f3bb53948d5);
		AdminT::header('所有服务', "<link href=\"/admin_assets/plugins/datatables/css/jquery.datatables.min.css\" rel=\"stylesheet\" type=\"text/css\"/><link href=\"/admin_assets/plugins/datatables/css/jquery.datatables_themeroller.css\" rel=\"stylesheet\" type=\"text/css\"/>");
		AdminT::search();
		echo "<main class=\"page-content content-wrap\">";
		AdminT::navbar();
		AdminT::sidebar();
		echo "<div class=\"page-inner\">";
		AdminT::title('所有服务', '<li>服务管理</li>');
		echo "<div id=\"main-wrapper\" class=\"container\"><div class=\"row\">";
		echo "<div class=\"col-md-12\">";
		echo "<div class=\"panel panel-white\"><div class=\"panel-body\"><div class=\"table-responsive\">"; ?>
<table id="example" class="display table" style="width: 100%; cellspacing: 0;">
			<thead>
				<tr>
					<th>服务ID</th>
					<th>用户UID</th>
					<th>产品类型</th>
					<th>主域名</th>
					<th>用户名</th>
					<th>到期时间</th>
					<th>状态</th>
					<th>自动处理</th>
					<th>管理</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>服务ID</th>
					<th>用户UID</th>
					<th>产品类型</th>
					<th>主域名</th>
					<th>用户名</th>
					<th>到期时间</th>
					<th>状态</th>
					<th>自动处理</th>
					<th>管理</th>
				</tr>
			</tfoot>
			<tbody>
<?php foreach ($OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['servers'] as $OSWAP_b7da14f6d30a57d6556466c8bacc5350) { ?>
				<tr class="usert<?php echo $OSWAP_b7da14f6d30a57d6556466c8bacc5350['id'] ?>">
					<td><?php echo $OSWAP_b7da14f6d30a57d6556466c8bacc5350['id'] ?></td>
					<td><?php echo $OSWAP_b7da14f6d30a57d6556466c8bacc5350['帐号id'] ?></td>
					<td><?php echo $OSWAP_b7da14f6d30a57d6556466c8bacc5350['产品类型'] ?></td>
					<td><?php echo $OSWAP_b7da14f6d30a57d6556466c8bacc5350['域名'] ?></td>
					<td><?php echo $OSWAP_b7da14f6d30a57d6556466c8bacc5350['用户名'] ?></td>
					<td><?php echo $OSWAP_b7da14f6d30a57d6556466c8bacc5350['到期时间'] ?></td>
					<td><?php if ($OSWAP_b7da14f6d30a57d6556466c8bacc5350['状态'] == '激活') {
				echo '<span class="label label-success">激活</span>';
			} else if ($OSWAP_b7da14f6d30a57d6556466c8bacc5350['状态'] == '等待审核') {
				echo '<span class="label label-info">等待审核</span>';
			} else if ($OSWAP_b7da14f6d30a57d6556466c8bacc5350['状态'] == '暂停') {
				echo '<span class="label label-warning">暂停</span>';
			} else if ($OSWAP_b7da14f6d30a57d6556466c8bacc5350['状态'] == '停止') {
				echo '<span class="label label-danger">停止</span>';
			} else if ($OSWAP_b7da14f6d30a57d6556466c8bacc5350['状态'] == '驳回') {
				echo '<span class="label label-primary">驳回</span>';
			} else {
				echo '<span class="label label-default" style="color:#000">' . $OSWAP_b7da14f6d30a57d6556466c8bacc5350['状态'] . '</span>';
			} ?></td>
					<td><?php if ($OSWAP_b7da14f6d30a57d6556466c8bacc5350['cron正常']) {
				echo '<span class="label label-success">正常</span>';
			} else {
				echo '<span class="label label-warning">异常</span>';
			} ?></td>
					<td><a href="/index.php/Admin/server_detailed/<?php echo $OSWAP_b7da14f6d30a57d6556466c8bacc5350['id'] ?>/" class="btn btn-info btn-xs icon-left">详细信息</a><a href="javascript:void(0)" class="btn btn-danger btn-xs delid<?php echo $OSWAP_b7da14f6d30a57d6556466c8bacc5350['id'] ?>" disabled>删除</a><?php if ($OSWAP_b7da14f6d30a57d6556466c8bacc5350['状态'] == '停止' or $OSWAP_b7da14f6d30a57d6556466c8bacc5350['状态'] == '等待付款') {
				echo "<input type=\"checkbox\"onclick=\"\$('.delid" . $OSWAP_b7da14f6d30a57d6556466c8bacc5350['id'] . "').attr('onclick','\$.post(\\'/index.php/Admin/server_sc/" . $OSWAP_b7da14f6d30a57d6556466c8bacc5350['id'] . "/\\',\\'zt=" . $OSWAP_b7da14f6d30a57d6556466c8bacc5350['状态'] . "\\',function(data){if(data==\\'ok\\') extable.row(\\'.usert{$OSWAP_b7da14f6d30a57d6556466c8bacc5350['id']}\\').remove().draw(); else swap_alert(\\'error\\',\\'删除服务失败\\',data);});') && \$('.delid" . $OSWAP_b7da14f6d30a57d6556466c8bacc5350['id'] . "').attr('disabled', false) && \$(this).parent().parent().remove();\"/>";
			} ?></td>
				</tr>
<?php
		} ?>
			</tbody>
</table>
<?php
		echo "</div></div></div>";
		echo "</div>";
		echo "</div></div></div>";
		AdminT::page_footer();
		echo "</div></main>";
		AdminT::cd_nav();
		AdminT::pjs();
		echo "<script src=\"/admin_assets/plugins/waypoints/jquery.waypoints.min.js\"></script><script src=\"/admin_assets/plugins/jquery-counterup/jquery.counterup.min.js\"></script><script src=\"/admin_assets/plugins/toastr/toastr.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.time.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.symbol.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.resize.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.tooltip.min.js\"></script><script src=\"/admin_assets/plugins/curvedlines/curvedLines.js\"></script><script src=\"/admin_assets/plugins/metrojs/MetroJs.min.js\"></script><script src=\"/admin_assets/plugins/morris/raphael.min.js\"></script><script src=\"/admin_assets/plugins/morris/morris.min.js\"></script><script src=\"/admin_assets/js/modern.min.js\"></script>";
		echo "<script src=\"/admin_assets/plugins/datatables/js/jquery.dataTables.min.js\"></script>"; ?>
		<script>var extable;$(document).ready(function() {extable=$('#example').DataTable({"language":{"url":"https://cdn.datatables.net/plug-ins/e9421181788/i18n/Chinese.json"}});});</script>
		<?php
		echo "</body></html>";
	}
	function server_sc() {
		need_admin();
		$id = mac_url_get(1);
		$zt = _POST('zt');
		if ((empty($id)) or (empty($zt))) die('缺少参数错误');
		$OSWAP_a416a4b07b6f280c968f2f3bb53948d5 = localrun::server_sc($id, $zt);
		$OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b = $this->return_array($OSWAP_a416a4b07b6f280c968f2f3bb53948d5);
	}
	function server_detailed() {
		need_admin();
		$id = mac_url_get(1);
		$OSWAP_a416a4b07b6f280c968f2f3bb53948d5 = localrun::server_detailed($id);
		$OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b = $this->return_array($OSWAP_a416a4b07b6f280c968f2f3bb53948d5);
		$OSWAP_b7da14f6d30a57d6556466c8bacc5350 = $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['server'];
		$cp = $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['cp'];
		$OSWAP_3b6c057c7664c5afce6c304af9403973 = $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['fwq'];
		$OSWAP_30b31a94e0c5a437f6c1c6006e473bc5 = $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['myrow'];
		$OSWAP_1ef40fdca93e31f1e0014385636b1e64 = $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['prom'];
		$OSWAP_442ac974a5e5be219eed15687cb89b6a = $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['cppz'];
		$configs = $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['config'];
		if (strstr($OSWAP_b7da14f6d30a57d6556466c8bacc5350['周期'], '{')) $OSWAP_b7da14f6d30a57d6556466c8bacc5350['周期'] = json_decode($OSWAP_b7da14f6d30a57d6556466c8bacc5350['周期'], true);
		AdminT::header('详细信息', "<link href=\"/admin_assets/plugins/datatables/css/jquery.datatables.min.css\" rel=\"stylesheet\" type=\"text/css\"/><link href=\"/admin_assets/plugins/datatables/css/jquery.datatables_themeroller.css\" rel=\"stylesheet\" type=\"text/css\"/>");
		AdminT::search();
		echo "<main class=\"page-content content-wrap\">";
		AdminT::navbar();
		AdminT::sidebar();
		echo "<div class=\"page-inner\">";
		AdminT::title('详细信息', "<li>服务管理</li>");
		echo "<div id=\"main-wrapper\" class=\"container\"><div class=\"row\">";
		echo "<div class=\"col-md-12\">";
		echo "<div class=\"panel panel-white\"><div class=\"panel-body\"><div class=\"table-responsive col-md-12\">"; ?>
<div class="row">
	<div class="col-md-12">
		<h4>订单信息</h4>
		<table class="table table-responsive">
			<tbody>
				<tr>
					<td>订单ID</td>
					<td>域名</td>
					<td>订单状态</td>
					<td>申请时间</td>
					<td>开通时间</td>
					<td>到期时间</td>
					<td>用户名</td>
					<td>密码</td>
					<td>优惠码</td>
				</tr>
				<tr>
					<td><?php echo $OSWAP_b7da14f6d30a57d6556466c8bacc5350['id'] ?></td>
					<td><?php echo $OSWAP_b7da14f6d30a57d6556466c8bacc5350['域名'] ?></td>
					<td><?php echo $OSWAP_b7da14f6d30a57d6556466c8bacc5350['状态'] ?></td>
					<td><?php echo $OSWAP_b7da14f6d30a57d6556466c8bacc5350['申请时间'] ?></td>
					<td><?php echo $OSWAP_b7da14f6d30a57d6556466c8bacc5350['开通时间'] ?></td>
					<td><?php echo $OSWAP_b7da14f6d30a57d6556466c8bacc5350['到期时间'] ?></td>
					<td><?php echo $OSWAP_b7da14f6d30a57d6556466c8bacc5350['用户名'] ?></td>
					<td><?php echo $OSWAP_b7da14f6d30a57d6556466c8bacc5350['密码'] ?></td>
					<td><?php echo $OSWAP_b7da14f6d30a57d6556466c8bacc5350['优惠码'] ?></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
		<div class="row">
			<div class="col-md-12">
				<h4>用户信息</h4>
				<table class="table table-responsive">
					<tbody>
						<tr>
							<td>UID</td>
							<td>用户名</td>
							<td>姓名</td>
							<td>国家</td>
							<td>地址</td>
							<td>邮编</td>
							<td>电话号码</td>
							<td>E-mail</td>
							<td>预存款</td>
							<td>注册时间</td>
						</tr>
						<tr>
							<td><?php echo $OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['uid'] ?></td>
							<td><?php echo $OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['用户名'] ?></td>
							<td><?php echo $OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['姓名'] ?></td>
							<td><?php echo $OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['国家'] ?></td>
							<td><?php echo $OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['地址'] ?></td>
							<td><?php echo $OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['邮编'] ?></td>
							<td><?php echo $OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['电话号码'] ?></td>
							<td><?php echo $OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['电子邮件'] ?></td>
							<td><?php echo $OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['预存款'] ?></td>
							<td><?php echo $OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['注册时间'] ?></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<h4>产品信息</h4>
				<table class="table table-responsive">
					<tbody>
						<tr>
							<td>产品ID</td>
							<td>类型</td>
							<td>名称</td>
							<td>库存</td>
							<td>价格</td>
							<td>面板类型</td>
							<td>服务器名称</td>
							<td>周期</td>
						</tr>
						<tr>
							<td><?php echo $cp['id'] ?></td>
							<td><?php echo $cp['类型'] ?></td>
							<td><?php echo $cp['名称'] ?></td>
							<td><?php echo $cp['库存'] ?></td>
							<td><?php echo $cp['价格'] ?></td>
							<td><?php echo $cp['面板类型'] ?></td>
							<td><?php echo $OSWAP_3b6c057c7664c5afce6c304af9403973 ?></td>
							<td><?php echo is_array($OSWAP_b7da14f6d30a57d6556466c8bacc5350['周期']) ? $OSWAP_b7da14f6d30a57d6556466c8bacc5350['周期']['名称'] : $OSWAP_b7da14f6d30a57d6556466c8bacc5350['周期'] ?></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
<div class="row">
	<div class="col-md-5">
		<h4>产品配置</h4>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>名称</th>
					<th>选择值</th>
				</tr>
			</thead>
			<tbody>
<?php foreach ($OSWAP_442ac974a5e5be219eed15687cb89b6a as $OSWAP_b684ab3e46f9f017e0bb12608b25fc9b) { ?>
				<tr>
					<td><?php echo $OSWAP_b684ab3e46f9f017e0bb12608b25fc9b['名称'] ?></td>
					<td><?php echo $OSWAP_b684ab3e46f9f017e0bb12608b25fc9b['值'] ?></td>
				</tr>
<?php
		} ?>
			</tbody>
		</table>
	</div>
	<div class="col-md-7">
		<h4>自定义配置</h4>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>名称</th>
					<th>值</th>
					<th>操作</th>
				</tr>
			</thead>
			<tbody>
<?php foreach ($configs as $config) { ?>
				<tr>
					<td><?php echo $config['名字'] ?></td>
					<td><?php echo $config['内容'] ?></td>
					<td><a href="javascript:void(0)" onclick="$.post('/index.php/Admin/server_config_del/<?php echo $OSWAP_b7da14f6d30a57d6556466c8bacc5350['id'] ?>/<?php echo $config['id'] ?>/','name='+encodeURIComponent($('#newconfigname').val())+'&value='+encodeURIComponent($('#newconfigvalue').val()),function(data){if(data=='ok'){location.reload();}else{swap_alert('error','删除失败',data);}});" class="btn btn-danger">删除</a></td>
				</tr>
<?php
		} ?>
				<tr>
					<td><input type="text" name="新选项名称" id="newconfigname" value="" class="form-control" /></td>
					<td><input type="text" name="新选项内容" id="newconfigvalue" value="" class="form-control" /></td>
					<td><a href="javascript:void(0)" onclick="$.post('/index.php/Admin/server_config_add/<?php echo $OSWAP_b7da14f6d30a57d6556466c8bacc5350['id'] ?>/','name='+encodeURIComponent($('#newconfigname').val())+'&value='+encodeURIComponent($('#newconfigvalue').val()),function(data){if(data=='ok'){location.reload();}else{swap_alert('error','添加失败',data);}});" class="btn btn-default">保存</a></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-body">
				<h5>订单操作</h5>
				<div class="bs-example">
					<?php if ($OSWAP_b7da14f6d30a57d6556466c8bacc5350['状态'] == '等待付款' or $OSWAP_b7da14f6d30a57d6556466c8bacc5350['状态'] == '等待审核') { ?><a href="javascript:void(0)" onclick="swap_alert('info','请求已经发送','等待服务器响应','取决于您的服务器速度');$.post('/index.php/Admin/server_ktfw/<?php echo $OSWAP_b7da14f6d30a57d6556466c8bacc5350['id'] ?>/','zt='+encodeURIComponent('<?php echo $OSWAP_b7da14f6d30a57d6556466c8bacc5350['状态'] ?>'),function(data){if(data=='ok') location.reload(); else swap_alert('error','开通服务失败',data);});" class="btn btn-success">开通服务</a><?php
		} ?>
					<?php if ($OSWAP_b7da14f6d30a57d6556466c8bacc5350['状态'] == '暂停') { ?><a href="javascript:void(0)" onclick="swap_alert('info','请求已经发送','等待服务器响应','取决于您的服务器速度');$.post('/index.php/Admin/server_unsp/<?php echo $OSWAP_b7da14f6d30a57d6556466c8bacc5350['id'] ?>/','zt='+encodeURIComponent('<?php echo $OSWAP_b7da14f6d30a57d6556466c8bacc5350['状态'] ?>'),function(data){if(data=='ok') location.reload(); else swap_alert('error','解除暂停失败',data);});" class="btn btn-success">解除暂停</a><?php
		} ?>
					<?php if ($OSWAP_b7da14f6d30a57d6556466c8bacc5350['状态'] == '激活') { ?><a href="javascript:void(0)" onclick="swap_alert('info','请求已经发送','等待服务器响应','取决于您的服务器速度');$.post('/index.php/Admin/server_sp/<?php echo $OSWAP_b7da14f6d30a57d6556466c8bacc5350['id'] ?>/','zt='+encodeURIComponent('<?php echo $OSWAP_b7da14f6d30a57d6556466c8bacc5350['状态'] ?>'),function(data){if(data=='ok') location.reload(); else swap_alert('error','暂停服务失败',data);});" class="btn btn-warning">暂停服务</a><?php
		} ?>
					<?php if ($OSWAP_b7da14f6d30a57d6556466c8bacc5350['状态'] == '暂停' or $OSWAP_b7da14f6d30a57d6556466c8bacc5350['状态'] == '激活') { ?><a href="javascript:void(0)" onclick="swap_alert('info','请求已经发送','等待服务器响应','取决于您的服务器速度');$.post('/index.php/Admin/server_tz/<?php echo $OSWAP_b7da14f6d30a57d6556466c8bacc5350['id'] ?>/','zt='+encodeURIComponent('<?php echo $OSWAP_b7da14f6d30a57d6556466c8bacc5350['状态'] ?>'),function(data){if(data=='ok') location.reload(); else swap_alert('error','停止服务失败',data);});" class="btn btn-danger">停止服务</a><?php
		} ?>
					<?php if ($OSWAP_b7da14f6d30a57d6556466c8bacc5350['状态'] == '等待审核') { ?><a href="javascript:void(0)" onclick="$.post('/index.php/Admin/server_bh/<?php echo $OSWAP_b7da14f6d30a57d6556466c8bacc5350['id'] ?>/','zt='+encodeURIComponent('<?php echo $OSWAP_b7da14f6d30a57d6556466c8bacc5350['状态'] ?>'),function(data){if(data=='ok') location.reload(); else swap_alert('error','驳回申请失败',data);});" class="btn btn-primary">驳回申请</a><?php
		} ?>
					<a href="javascript:void(0)" onclick="$('#setting').modal(true);" class="btn btn-default">修改产品信息</a>
					<a href="javascript:void(0)" class="btn btn-danger delid" disabled>删除订单</a>
					<input type="checkbox"onclick="$('.delid').attr('onclick','$.post(\'/index.php/Admin/server_sc/<?php echo $OSWAP_b7da14f6d30a57d6556466c8bacc5350['id'] ?>/\',\'zt=<?php echo $OSWAP_b7da14f6d30a57d6556466c8bacc5350['状态'] ?>\',function(data){if(data==\'ok\') location.href=\'/index.php/Admin/Server_All/\'; else swap_alert(\'error\',\'删除服务失败\',data);});') && $('.delid').attr('disabled', false) && $(this).parent().parent().remove();"/>
				</div>
			</div>
		</div>
<?php
		echo "</div></div></div>";
		echo "</div>";
		echo "</div></div></div>";
		AdminT::page_footer();
		echo "</div></main>";
		AdminT::cd_nav();
		AdminT::pjs();
		echo "<script src=\"/admin_assets/plugins/waypoints/jquery.waypoints.min.js\"></script><script src=\"/admin_assets/plugins/jquery-counterup/jquery.counterup.min.js\"></script><script src=\"/admin_assets/plugins/toastr/toastr.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.time.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.symbol.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.resize.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.tooltip.min.js\"></script><script src=\"/admin_assets/plugins/curvedlines/curvedLines.js\"></script><script src=\"/admin_assets/plugins/metrojs/MetroJs.min.js\"></script><script src=\"/admin_assets/plugins/morris/raphael.min.js\"></script><script src=\"/admin_assets/plugins/morris/morris.min.js\"></script><script src=\"/admin_assets/js/modern.min.js\"></script>";
		echo "<script src=\"/admin_assets/plugins/datatables/js/jquery.dataTables.min.js\"></script>"; ?>
                                            <div class="modal fade" id="setting" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="myModalLabel">修改产品信息</h4>
                                                        </div>
                                                        <div class="modal-body">
					<p>
						<div class="input-group">
							<span class="input-group-btn">
								<span class="btn btn-info">用户名:</span>
							</span>
							<input type="text" class="form-control" id="edit-user" value="<?php echo $OSWAP_b7da14f6d30a57d6556466c8bacc5350['用户名'] ?>">
						</div>
					<p>
					</p>
						<div class="input-group">
							<span class="input-group-btn">
								<span class="btn btn-info">密码:</span>
							</span>
							<input type="text" class="form-control" id="edit-pass" value="<?php echo $OSWAP_b7da14f6d30a57d6556466c8bacc5350['密码'] ?>">
						</div>
					</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                                                            <a href="javascript:void(0)" onclick="$.post('/index.php/Admin/server_edit/<?php echo $OSWAP_b7da14f6d30a57d6556466c8bacc5350['id'] ?>/','user='+encodeURIComponent($('#edit-user').val())+'&pass='+encodeURIComponent($('#edit-pass').val()),function(data){if(data=='ok') location.reload(); else swap_alert('error','修改产品信息失败',data);});" class="btn btn-success">保存更改</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
<?php
		echo "</body></html>";
	}
	function server_config_add() {
		need_admin();
		$id = mac_url_get(1);
		$OSWAP_0d07de59261cc2c9023b194184c575fb = _POST('name');
		$OSWAP_31bb5897a4cf8155e2d7054f8ef132dd = _POST('value');
		$OSWAP_a416a4b07b6f280c968f2f3bb53948d5 = localrun::server_config_add($id, $OSWAP_0d07de59261cc2c9023b194184c575fb, $OSWAP_31bb5897a4cf8155e2d7054f8ef132dd);
		$OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b = $this->return_array($OSWAP_a416a4b07b6f280c968f2f3bb53948d5);
	}
	function server_config_del() {
		need_admin();
		$id = mac_url_get(1);
		$OSWAP_f89d0a36212f7084d8c259a0654193f6 = mac_url_get(2);
		$OSWAP_a416a4b07b6f280c968f2f3bb53948d5 = localrun::server_config_del($id, $OSWAP_f89d0a36212f7084d8c259a0654193f6);
		$OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b = $this->return_array($OSWAP_a416a4b07b6f280c968f2f3bb53948d5);
	}
	function server_ktfw() {
		need_admin();
		$id = mac_url_get(1);
		$zt = _POST('zt');
		if ((empty($id)) or (empty($zt))) die('缺少参数错误');
		SMACSQL()->select('服务', '*', "id='$id'");
		if (SMACSQL()->db_num_rows()) {
			$temparry = SMACSQL()->fetch_array();
			if (!$temparry['服务器id']) {
				SMACSQL()->select('产品', '*', "id='" . $temparry['产品id'] . "'");
				if (SMACSQL()->db_num_rows()) {
					$OSWAP_be36ef7d6893164854e770d8e25ceabd = SMACSQL()->fetch_array();
					if ($OSWAP_be36ef7d6893164854e770d8e25ceabd['服务器组']) SMACSQL()->update('服务', "服务器id='" . $OSWAP_be36ef7d6893164854e770d8e25ceabd['服务器组'] . "'", "id='$id'");
				}
			}
		}
		$OSWAP_a416a4b07b6f280c968f2f3bb53948d5 = localrun::server_ktfw($id, $zt);
		$OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b = $this->return_array($OSWAP_a416a4b07b6f280c968f2f3bb53948d5);
	}
	function server_unsp() {
		need_admin();
		$id = mac_url_get(1);
		$zt = _POST('zt');
		if ((empty($id)) or (empty($zt))) die('缺少参数错误');
		$OSWAP_a416a4b07b6f280c968f2f3bb53948d5 = localrun::server_unsp($id, $zt);
		$OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b = $this->return_array($OSWAP_a416a4b07b6f280c968f2f3bb53948d5);
	}
	function server_sp() {
		need_admin();
		$id = mac_url_get(1);
		$zt = _POST('zt');
		if ((empty($id)) or (empty($zt))) die('缺少参数错误');
		$OSWAP_a416a4b07b6f280c968f2f3bb53948d5 = localrun::server_sp($id, $zt);
		$OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b = $this->return_array($OSWAP_a416a4b07b6f280c968f2f3bb53948d5);
	}
	function server_tz() {
		need_admin();
		$id = mac_url_get(1);
		$zt = _POST('zt');
		if ((empty($id)) or (empty($zt))) die('缺少参数错误');
		$OSWAP_a416a4b07b6f280c968f2f3bb53948d5 = localrun::server_tz($id, $zt);
		$OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b = $this->return_array($OSWAP_a416a4b07b6f280c968f2f3bb53948d5);
	}
	function server_bh() {
		need_admin();
		$id = mac_url_get(1);
		$zt = _POST('zt');
		if ((empty($id)) or (empty($zt))) die('缺少参数错误');
		$OSWAP_a416a4b07b6f280c968f2f3bb53948d5 = localrun::server_bh($id, $zt);
		$OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b = $this->return_array($OSWAP_a416a4b07b6f280c968f2f3bb53948d5);
	}
	function server_edit() {
		need_admin();
		$id = mac_url_get(1);
		$OSWAP_30b31a94e0c5a437f6c1c6006e473bc5 = _POST('user');
		$OSWAP_3fd6804806c8414bcf51fa020d02cf5a = _POST('pass');
		if (empty($id) or empty($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5) or empty($OSWAP_3fd6804806c8414bcf51fa020d02cf5a)) die('参数错误');
		$OSWAP_a416a4b07b6f280c968f2f3bb53948d5 = localrun::server_edit($id, $OSWAP_30b31a94e0c5a437f6c1c6006e473bc5, $OSWAP_3fd6804806c8414bcf51fa020d02cf5a);
		$OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b = $this->return_array($OSWAP_a416a4b07b6f280c968f2f3bb53948d5);
	}
	function server_review() {
		need_admin();
		$OSWAP_a416a4b07b6f280c968f2f3bb53948d5 = localrun::server_review();
		$OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b = $this->return_array($OSWAP_a416a4b07b6f280c968f2f3bb53948d5);
		AdminT::header('等待审核', "<link href=\"/admin_assets/plugins/datatables/css/jquery.datatables.min.css\" rel=\"stylesheet\" type=\"text/css\"/><link href=\"/admin_assets/plugins/datatables/css/jquery.datatables_themeroller.css\" rel=\"stylesheet\" type=\"text/css\"/>");
		AdminT::search();
		echo "<main class=\"page-content content-wrap\">";
		AdminT::navbar();
		AdminT::sidebar();
		echo "<div class=\"page-inner\">";
		AdminT::title('等待审核', '<li>服务管理</li>');
		echo "<div id=\"main-wrapper\" class=\"container\"><div class=\"row\">";
		echo "<div class=\"col-md-12\">";
		echo "<div class=\"panel panel-white\"><div class=\"panel-body\"><div class=\"table-responsive\">"; ?>
<table id="example" class="display table" style="width: 100%; cellspacing: 0;">
			<thead>
				<tr>
					<th>服务ID</th>
					<th>用户UID</th>
					<th>产品类型</th>
					<th>主域名</th>
					<th>到期时间</th>
					<th>状态</th>
					<th>管理</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>服务ID</th>
					<th>用户UID</th>
					<th>产品类型</th>
					<th>主域名</th>
					<th>到期时间</th>
					<th>状态</th>
					<th>管理</th>
				</tr>
			</tfoot>
			<tbody>
<?php foreach ($OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['servers'] as $OSWAP_b7da14f6d30a57d6556466c8bacc5350) { ?>
				<tr class="usert<?php echo $OSWAP_b7da14f6d30a57d6556466c8bacc5350['id'] ?>">
					<td><?php echo $OSWAP_b7da14f6d30a57d6556466c8bacc5350['id'] ?></td>
					<td><?php echo $OSWAP_b7da14f6d30a57d6556466c8bacc5350['帐号id'] ?></td>
					<td><?php echo $OSWAP_b7da14f6d30a57d6556466c8bacc5350['产品类型'] ?></td>
					<td><?php echo $OSWAP_b7da14f6d30a57d6556466c8bacc5350['域名'] ?></td>
					<th><?php echo $OSWAP_b7da14f6d30a57d6556466c8bacc5350['到期时间'] ?></th>
					<td><?php if ($OSWAP_b7da14f6d30a57d6556466c8bacc5350['状态'] == '激活') {
				echo '<span class="label label-success">激活</span>';
			} else if ($OSWAP_b7da14f6d30a57d6556466c8bacc5350['状态'] == '等待审核') {
				echo '<span class="label label-info">等待审核</span>';
			} else if ($OSWAP_b7da14f6d30a57d6556466c8bacc5350['状态'] == '暂停') {
				echo '<span class="label label-warning">暂停</span>';
			} else if ($OSWAP_b7da14f6d30a57d6556466c8bacc5350['状态'] == '停止') {
				echo '<span class="label label-danger">停止</span>';
			} else if ($OSWAP_b7da14f6d30a57d6556466c8bacc5350['状态'] == '驳回') {
				echo '<span class="label label-primary">驳回</span>';
			} else {
				echo '<span class="label label-default" style="color:#000">' . $OSWAP_b7da14f6d30a57d6556466c8bacc5350['状态'] . '</span>';
			} ?></td>
					<td><a href="javascript:void(0)" onclick="swap_alert('info','请求已经发送','等待服务器响应','取决于您的服务器速度');$.post('/index.php/Admin/server_ktfw/<?php echo $OSWAP_b7da14f6d30a57d6556466c8bacc5350['id'] ?>/','zt='+encodeURIComponent('<?php echo $OSWAP_b7da14f6d30a57d6556466c8bacc5350['状态'] ?>'),function(data){if(data=='ok') location.reload(); else swap_alert('error','开通服务失败',data);});" class="btn btn-success btn-xs">开通</a><a href="javascript:void(0)" onclick="$.post('/index.php/Admin/server_bh/<?php echo $OSWAP_b7da14f6d30a57d6556466c8bacc5350['id'] ?>/','zt='+encodeURIComponent('<?php echo $OSWAP_b7da14f6d30a57d6556466c8bacc5350['状态'] ?>'),function(data){if(data=='ok') location.reload(); else swap_alert('error','驳回申请失败',data);});" class="btn btn-primary btn-xs">驳回</a><a href="/index.php/Admin/server_detailed/<?php echo $OSWAP_b7da14f6d30a57d6556466c8bacc5350['id'] ?>/" class="btn btn-info btn-xs">详细信息</a></td>
				</tr>
<?php
		} ?>
			</tbody>
</table>
<?php
		echo "</div></div></div>";
		echo "</div>";
		echo "</div></div></div>";
		AdminT::page_footer();
		echo "</div></main>";
		AdminT::cd_nav();
		AdminT::pjs();
		echo "<script src=\"/admin_assets/plugins/waypoints/jquery.waypoints.min.js\"></script><script src=\"/admin_assets/plugins/jquery-counterup/jquery.counterup.min.js\"></script><script src=\"/admin_assets/plugins/toastr/toastr.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.time.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.symbol.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.resize.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.tooltip.min.js\"></script><script src=\"/admin_assets/plugins/curvedlines/curvedLines.js\"></script><script src=\"/admin_assets/plugins/metrojs/MetroJs.min.js\"></script><script src=\"/admin_assets/plugins/morris/raphael.min.js\"></script><script src=\"/admin_assets/plugins/morris/morris.min.js\"></script><script src=\"/admin_assets/js/modern.min.js\"></script>";
		echo "<script src=\"/admin_assets/plugins/datatables/js/jquery.dataTables.min.js\"></script>";
		echo "<script>var extable;\$(document).ready(function() {extable=\$('#example').DataTable({\"language\":{\"url\":\"https://cdn.datatables.net/plug-ins/e9421181788/i18n/Chinese.json\"}});});</script>";
		echo "</body></html>";
	}
	function announcement() {
		need_admin();
		$OSWAP_a416a4b07b6f280c968f2f3bb53948d5 = localrun::announcement();
		$OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b = $this->return_array($OSWAP_a416a4b07b6f280c968f2f3bb53948d5);
		AdminT::header('网站公告', "<link href=\"/admin_assets/plugins/datatables/css/jquery.datatables.min.css\" rel=\"stylesheet\" type=\"text/css\"/><link href=\"/admin_assets/plugins/datatables/css/jquery.datatables_themeroller.css\" rel=\"stylesheet\" type=\"text/css\"/>");
		AdminT::search();
		echo "<main class=\"page-content content-wrap\">";
		AdminT::navbar();
		AdminT::sidebar();
		echo "<div class=\"page-inner\">";
		AdminT::title('网站公告', '<li>网站内容</li>', '<a href="javascript:void(0)" onclick="$.get(\'/index.php/Admin/new_announcement/\',function(){location.reload();});" class="btn btn-primary btn-addon btn-xs"><i class="fa fa-plus"></i> 添加公告</a>');
		echo "<div id=\"main-wrapper\" class=\"container\"><div class=\"row\">";
		echo "<div class=\"col-md-12\">";
		echo "<div class=\"panel panel-white\"><div class=\"panel-body\"><div class=\"table-responsive\">"; ?>
<table id="example" class="display table" style="width: 100%; cellspacing: 0;">
	<thead>
		<tr>
			<th>公告ID</th>
			<th>公告标题</th>
			<th>公告作者</th>
			<th>公告时间</th>
			<th>公告操作</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<th>公告ID</th>
			<th>公告标题</th>
			<th>公告作者</th>
			<th>公告时间</th>
			<th>公告操作</th>
		</tr>
	</tfoot>
	<tbody>
<?php foreach ($OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['helps'] as $OSWAP_db528191b36899ed3615db79d9a3fa9b) { ?>
		<tr class="usert<?php echo $OSWAP_db528191b36899ed3615db79d9a3fa9b['公告ID'] ?>">
			<td><?php echo $OSWAP_db528191b36899ed3615db79d9a3fa9b['公告ID'] ?></td>
			<td><?php echo $OSWAP_db528191b36899ed3615db79d9a3fa9b['公告标题'] ?></td>
			<td><?php echo $OSWAP_db528191b36899ed3615db79d9a3fa9b['公告作者'] ?></td>
			<td><?php echo $OSWAP_db528191b36899ed3615db79d9a3fa9b['公告时间'] ?></td>
			<td><a href="/index.php/Admin/Announcement_Detailed/<?php echo $OSWAP_db528191b36899ed3615db79d9a3fa9b['公告ID'] ?>/" class="btn btn-info btn-xs">编辑</a><a href="javascript:void(0)" class="btn btn-danger btn-xs delid<?php echo $OSWAP_db528191b36899ed3615db79d9a3fa9b['公告ID'] ?>" disabled>删除</a><input type="checkbox"onclick="$('.delid<?php echo $OSWAP_db528191b36899ed3615db79d9a3fa9b['公告ID'] ?>').attr('onclick','$.get(\'/index.php/Admin/del_announcement/<?php echo $OSWAP_db528191b36899ed3615db79d9a3fa9b['公告ID'] ?>/\',function(data){if(data==\'ok\') extable.row(\'.usert<?php echo $OSWAP_db528191b36899ed3615db79d9a3fa9b['公告ID'] ?>\').remove().draw(); else swap_alert(\'error\',\'删除公告失败\',data);});') && $('.delid<?php echo $OSWAP_db528191b36899ed3615db79d9a3fa9b['公告ID'] ?>').attr('disabled', false) && $(this).parent().parent().remove();"/></td>
		</tr>
	<?php
		} ?>
	</tbody>
</table>
<?php
		echo "</div></div></div>";
		echo "</div>";
		echo "</div></div></div>";
		AdminT::page_footer();
		echo "</div></main>";
		AdminT::cd_nav();
		AdminT::pjs();
		echo "<script src=\"/admin_assets/plugins/waypoints/jquery.waypoints.min.js\"></script><script src=\"/admin_assets/plugins/jquery-counterup/jquery.counterup.min.js\"></script><script src=\"/admin_assets/plugins/toastr/toastr.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.time.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.symbol.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.resize.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.tooltip.min.js\"></script><script src=\"/admin_assets/plugins/curvedlines/curvedLines.js\"></script><script src=\"/admin_assets/plugins/metrojs/MetroJs.min.js\"></script><script src=\"/admin_assets/plugins/morris/raphael.min.js\"></script><script src=\"/admin_assets/plugins/morris/morris.min.js\"></script><script src=\"/admin_assets/js/modern.min.js\"></script>";
		echo "<script src=\"/admin_assets/plugins/datatables/js/jquery.dataTables.min.js\"></script>";
		echo "<script>var extable;\$(document).ready(function() {extable=\$('#example').DataTable({\"language\":{\"url\":\"https://cdn.datatables.net/plug-ins/e9421181788/i18n/Chinese.json\"}});});</script>";
		echo "</body></html>";
	}
	function del_announcement() {
		need_admin();
		$id = mac_url_get(1);
		if (empty($id)) die('参数错误,请选择删除id');
		$OSWAP_a416a4b07b6f280c968f2f3bb53948d5 = localrun::del_announcement($id);
		$OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b = $this->return_array($OSWAP_a416a4b07b6f280c968f2f3bb53948d5);
	}
	function announcement_detailed() {
		need_admin();
		$id = mac_url_get(1);
		$OSWAP_a416a4b07b6f280c968f2f3bb53948d5 = localrun::announcement_detailed($id);
		$OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b = $this->return_array($OSWAP_a416a4b07b6f280c968f2f3bb53948d5);
		$OSWAP_db528191b36899ed3615db79d9a3fa9b = $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['help'];
		AdminT::header('公告修改', "<link href=\"/admin_assets/plugins/datatables/css/jquery.datatables.min.css\" rel=\"stylesheet\" type=\"text/css\"/><link href=\"/admin_assets/plugins/datatables/css/jquery.datatables_themeroller.css\" rel=\"stylesheet\" type=\"text/css\"/><link href=\"/umeditor/themes/default/css/umeditor.css\" type=\"text/css\" rel=\"stylesheet\"/>");
		AdminT::search();
		echo "<main class=\"page-content content-wrap\">";
		AdminT::navbar();
		AdminT::sidebar();
		echo "<div class=\"page-inner\">";
		AdminT::title('公告修改', '<li>网站内容</li><li>网站公告</li>');
		echo "<div id=\"main-wrapper\" class=\"container\"><div class=\"row\">";
		echo "<div class=\"col-md-12\">";
		echo "<div class=\"panel panel-white\"><div class=\"panel-body\"><div class=\"table-responsive col-md-12\">"; ?>
				<form role="form" id="userform" method="post" class="validate">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label">公告标题</label>
								<input type="text" class="form-control" name="name" value="<?php echo $OSWAP_db528191b36899ed3615db79d9a3fa9b['公告标题'] ?>" />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">公告时间</label>
								<input type="text" class="form-control" value="<?php echo $OSWAP_db528191b36899ed3615db79d9a3fa9b['公告时间'] ?>" disabled />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">公告作者</label>
								<input type="text" class="form-control" value="<?php echo $OSWAP_db528191b36899ed3615db79d9a3fa9b['公告作者'] ?>" disabled />
							</div>
						</div>
					</div>
					<div class="form-group">
<script type="text/plain" id="myEditor" name="msg" style="height:240px;width:100%;">
<?php echo $OSWAP_db528191b36899ed3615db79d9a3fa9b['公告内容'] ?>
</script> 
					</div>
					<div class="form-group">
						<a href="javascript:void(0)" onclick="$.post('/index.php/Admin/xg_announcement_detailed_form/<?php echo $OSWAP_db528191b36899ed3615db79d9a3fa9b['公告ID'] ?>/',$('#userform').serialize(),function(data){if(data=='ok') swap_alert('success','修改成功','修改公告成功'); else swap_alert('error','修改失败',data);});" class="btn btn-success">修改</a>
					</div>
				</form>
<?php
		echo "</div></div></div>";
		echo "</div>";
		echo "</div></div></div>";
		AdminT::page_footer();
		echo "</div></main>";
		AdminT::cd_nav();
		AdminT::pjs();
		echo "<script src=\"/admin_assets/plugins/waypoints/jquery.waypoints.min.js\"></script><script src=\"/admin_assets/plugins/jquery-counterup/jquery.counterup.min.js\"></script><script src=\"/admin_assets/plugins/toastr/toastr.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.time.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.symbol.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.resize.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.tooltip.min.js\"></script><script src=\"/admin_assets/plugins/curvedlines/curvedLines.js\"></script><script src=\"/admin_assets/plugins/metrojs/MetroJs.min.js\"></script><script src=\"/admin_assets/plugins/morris/raphael.min.js\"></script><script src=\"/admin_assets/plugins/morris/morris.min.js\"></script><script src=\"/admin_assets/js/modern.min.js\"></script>";
		echo "<script src=\"/admin_assets/plugins/datatables/js/jquery.dataTables.min.js\"></script>";
		echo "<script>var extable;\$(document).ready(function() {extable=\$('#example').DataTable({\"language\":{\"url\":\"https://cdn.datatables.net/plug-ins/e9421181788/i18n/Chinese.json\"}});});</script>"; ?>
<script type="text/javascript" src="/umeditor/umeditor.config.js"></script>
<script type="text/javascript" src="/umeditor/umeditor.min.js"></script>
<script type="text/javascript" src="/umeditor/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript">
var um = UM.getEditor('myEditor');
</script>
		<?php
		echo "</body></html>";
	}
	function xg_announcement_detailed_form() {
		need_admin();
		$id = mac_url_get(1);
		$OSWAP_0d07de59261cc2c9023b194184c575fb = _POST('name');
		$OSWAP_93e86675a14bf45114306ac2be631499 = _POST('msg');
		if ((empty($OSWAP_0d07de59261cc2c9023b194184c575fb)) or (empty($OSWAP_93e86675a14bf45114306ac2be631499))) die('请填写公告标题或内容!!');
		$OSWAP_a416a4b07b6f280c968f2f3bb53948d5 = localrun::xg_announcement_detailed_form($id, GETADMINNAME(), $OSWAP_93e86675a14bf45114306ac2be631499, $OSWAP_0d07de59261cc2c9023b194184c575fb);
		$OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b = $this->return_array($OSWAP_a416a4b07b6f280c968f2f3bb53948d5);
	}
	function new_announcement() {
		need_admin();
		$OSWAP_a416a4b07b6f280c968f2f3bb53948d5 = localrun::new_announcement_form(GETADMINNAME(), $OSWAP_93e86675a14bf45114306ac2be631499, '新建公告' . time());
		$OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b = $this->return_array($OSWAP_a416a4b07b6f280c968f2f3bb53948d5);
	}
	function money() {
		need_admin();
		$OSWAP_a416a4b07b6f280c968f2f3bb53948d5 = localrun::money();
		$OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b = $this->return_array($OSWAP_a416a4b07b6f280c968f2f3bb53948d5);
		$OSWAP_8db3b9166f01c29a81c2abba00abba61 = $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['moneys'];
		AdminT::header('货币设置', "<link href=\"/admin_assets/plugins/datatables/css/jquery.datatables.min.css\" rel=\"stylesheet\" type=\"text/css\"/><link href=\"/admin_assets/plugins/datatables/css/jquery.datatables_themeroller.css\" rel=\"stylesheet\" type=\"text/css\"/>");
		AdminT::search();
		echo "<main class=\"page-content content-wrap\">";
		AdminT::navbar();
		AdminT::sidebar();
		echo "<div class=\"page-inner\">";
		AdminT::title('货币设置', '<li>网站设置</li>');
		echo "<div id=\"main-wrapper\" class=\"container\"><div class=\"row\">";
		echo "<div class=\"col-md-12\">";
		echo "<div class=\"panel panel-white\"><div class=\"panel-body\"><div class=\"table-responsive col-md-12\">"; ?>
<div class="row">
	<div class="col-md-12">
<p>你可以通过不同的货币来支持不同的支付网关,客户进行充值的时候会变成不同的汇率进行转换.</p>
<table id="example" class="display table" style="width: 100%; cellspacing: 0;">
	<thead>
		<tr>
			<th class="text-center">货币名称</th>
			<th>前缀</th>
			<th>后缀</th>
			<th>汇率</th>
			<th>插件占用</th>
			<th>设置</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($OSWAP_8db3b9166f01c29a81c2abba00abba61 as $OSWAP_0bead33f7592a3ca9198c6e1c2770086) { ?>
		<tr class="usert<?php echo $OSWAP_0bead33f7592a3ca9198c6e1c2770086['id'] ?>">
			<td class="text-center"><?php echo $OSWAP_0bead33f7592a3ca9198c6e1c2770086['货币名称'] ?></td>
			<td><?php echo $OSWAP_0bead33f7592a3ca9198c6e1c2770086['货币前缀'] ?></td>
			<td><?php echo $OSWAP_0bead33f7592a3ca9198c6e1c2770086['货币后缀'] ?></td>
			<td><?php echo $OSWAP_0bead33f7592a3ca9198c6e1c2770086['交易币汇率'] ?></td>
			<td><?php if ($OSWAP_0bead33f7592a3ca9198c6e1c2770086['use'] == '1') {
				echo '<div class="label label-warning">插件使用中</div>';
			} else {
				echo '<div class="label label-info">无插件使用</div>';
			} ?></td>
<td><a href="/index.php/Admin/Money_Detailed/<?php echo $OSWAP_0bead33f7592a3ca9198c6e1c2770086['id'] ?>/" class="btn btn-info btn-xs">设置</a><a href="javascript:void(0)" class="btn btn-danger btn-xs delid<?php echo $OSWAP_0bead33f7592a3ca9198c6e1c2770086['id'] ?>" disabled>删除</a><?php if ($OSWAP_0bead33f7592a3ca9198c6e1c2770086['id'] != '1' and $OSWAP_0bead33f7592a3ca9198c6e1c2770086['use'] != '1') { ?><input type="checkbox"onclick="$('.delid<?php echo $OSWAP_0bead33f7592a3ca9198c6e1c2770086['id'] ?>').attr('onclick','$.get(\'/index.php/Admin/del_money/<?php echo $OSWAP_0bead33f7592a3ca9198c6e1c2770086['id'] ?>/\',function(data){if(data==\'ok\') extable.row(\'.usert<?php echo $OSWAP_0bead33f7592a3ca9198c6e1c2770086['id'] ?>\').remove().draw(); else swap_alert(\'error\',\'删除货币失败\',data);});') && $('.delid<?php echo $OSWAP_0bead33f7592a3ca9198c6e1c2770086['id'] ?>').attr('disabled', false) && $(this).parent().parent().remove();"/><?php
			} ?></td>
		</tr>
<?php
		} ?>
	</tbody>
</table>
</div>
</div>
<br/>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
			<div class="panel-heading">
				<div class="panel-title">
					货币添加
				</div>
			</div>
			<div class="panel-body">
				<form id="newmoney" role="form" class="form-horizontal form-groups-bordered"></br>
					<div class="form-group">
						<label class="col-sm-3 control-label">货币名称</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="name" placeholder="eg. USD, JPY, CNY, etc...">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">前缀(eg. ￥$)</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="qz">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">后缀</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="hz">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">汇率</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="hl">
							相对交易币的兑换比例 如果设置汇率为2,通过充值网关充值这种货币5个的话将会是（2 * 5=10）个交易币冲入
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<a href="javascript:void(0)" onclick="$.post('/index.php/Admin/New_Money/',$('#newmoney').serialize(),function(data){if(data=='ok') location.reload(); else swap_alert('error','添加失败',data);});" class="btn btn-default">添加货币</a>
						</div>
					</div>
				</form>
			</div>
		</div>
<?php
		echo "</div></div></div>";
		echo "</div>";
		echo "</div></div></div>";
		AdminT::page_footer();
		echo "</div></main>";
		AdminT::cd_nav();
		AdminT::pjs();
		echo "<script src=\"/admin_assets/plugins/waypoints/jquery.waypoints.min.js\"></script><script src=\"/admin_assets/plugins/jquery-counterup/jquery.counterup.min.js\"></script><script src=\"/admin_assets/plugins/toastr/toastr.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.time.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.symbol.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.resize.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.tooltip.min.js\"></script><script src=\"/admin_assets/plugins/curvedlines/curvedLines.js\"></script><script src=\"/admin_assets/plugins/metrojs/MetroJs.min.js\"></script><script src=\"/admin_assets/plugins/morris/raphael.min.js\"></script><script src=\"/admin_assets/plugins/morris/morris.min.js\"></script><script src=\"/admin_assets/js/modern.min.js\"></script>";
		echo "<script src=\"/admin_assets/plugins/datatables/js/jquery.dataTables.min.js\"></script>";
		echo "<script>var extable;\$(document).ready(function() {extable=\$('#example').DataTable({\"language\":{\"url\":\"https://cdn.datatables.net/plug-ins/e9421181788/i18n/Chinese.json\"}});});</script>";
		echo "</body></html>";
	}
	function del_money() {
		need_admin();
		$id = mac_url_get(1);
		if (empty($id)) die('参数错误,请选择删除id');
		$OSWAP_a416a4b07b6f280c968f2f3bb53948d5 = localrun::del_money($id);
		$OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b = $this->return_array($OSWAP_a416a4b07b6f280c968f2f3bb53948d5);
	}
	function new_money() {
		need_admin();
		$id = mac_url_get(1);
		$OSWAP_0d07de59261cc2c9023b194184c575fb = _POST('name');
		$qz = _POST('qz');
		$hz = _POST('hz');
		$hl = _POST('hl');
		if ((empty($OSWAP_0d07de59261cc2c9023b194184c575fb)) or (empty($qz)) or (empty($hz)) or (empty($hl))) die('请填写完整内容!!');
		$OSWAP_a416a4b07b6f280c968f2f3bb53948d5 = localrun::new_money_form($OSWAP_0d07de59261cc2c9023b194184c575fb, $qz, $hz, $hl);
		$OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b = $this->return_array($OSWAP_a416a4b07b6f280c968f2f3bb53948d5);
	}
	function money_detailed() {
		need_admin();
		$id = mac_url_get(1);
		$OSWAP_a416a4b07b6f280c968f2f3bb53948d5 = localrun::money_detailed($id);
		$OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b = $this->return_array($OSWAP_a416a4b07b6f280c968f2f3bb53948d5);
		$OSWAP_0bead33f7592a3ca9198c6e1c2770086 = $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['money'];
		AdminT::header('货币修改', "<link href=\"/admin_assets/plugins/datatables/css/jquery.datatables.min.css\" rel=\"stylesheet\" type=\"text/css\"/><link href=\"/admin_assets/plugins/datatables/css/jquery.datatables_themeroller.css\" rel=\"stylesheet\" type=\"text/css\"/>");
		AdminT::search();
		echo "<main class=\"page-content content-wrap\">";
		AdminT::navbar();
		AdminT::sidebar();
		echo "<div class=\"page-inner\">";
		AdminT::title('货币修改', '<li>网站设置</li>');
		echo "<div id=\"main-wrapper\" class=\"container\"><div class=\"row\">";
		echo "<div class=\"col-md-12\">";
		echo "<div class=\"panel panel-white\"><div class=\"panel-body\"><div class=\"table-responsive col-md-12\">"; ?>
				<form id="newmoney" role="form" class="form-horizontal form-groups-bordered">
					<div class="form-group">
						<label class="col-sm-3 control-label">货币名称</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="name" placeholder="eg. USD, GBP, RMB, etc..." value="<?php echo $OSWAP_0bead33f7592a3ca9198c6e1c2770086['货币名称'] ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">前缀(eg. ￥$)</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="qz" value="<?php echo $OSWAP_0bead33f7592a3ca9198c6e1c2770086['货币前缀'] ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">后缀</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="hz" value="<?php echo $OSWAP_0bead33f7592a3ca9198c6e1c2770086['货币后缀'] ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">汇率</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="hl" value="<?php echo $OSWAP_0bead33f7592a3ca9198c6e1c2770086['交易币汇率'] ?>">
							相对交易币的兑换比例 如果设置汇率为2,通过充值网关充值这种货币5个的话将会是（2 * 5=10）个交易币冲入
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<a href="javascript:void(0)" onclick="$.post('/index.php/Admin/XG_Money/<?php echo $OSWAP_0bead33f7592a3ca9198c6e1c2770086['id'] ?>/',$('#newmoney').serialize(),function(data){if(data=='ok') swap_alert('success','修改成功','修改货币成功'); else swap_alert('error','修改失败',data);});" class="btn btn-success">修改货币</a>
						</div>
					</div>
				</form>
<?php
		echo "</div></div></div>";
		echo "</div>";
		echo "</div></div></div>";
		AdminT::page_footer();
		echo "</div></main>";
		AdminT::cd_nav();
		AdminT::pjs();
		echo "<script src=\"/admin_assets/plugins/waypoints/jquery.waypoints.min.js\"></script><script src=\"/admin_assets/plugins/jquery-counterup/jquery.counterup.min.js\"></script><script src=\"/admin_assets/plugins/toastr/toastr.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.time.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.symbol.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.resize.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.tooltip.min.js\"></script><script src=\"/admin_assets/plugins/curvedlines/curvedLines.js\"></script><script src=\"/admin_assets/plugins/metrojs/MetroJs.min.js\"></script><script src=\"/admin_assets/plugins/morris/raphael.min.js\"></script><script src=\"/admin_assets/plugins/morris/morris.min.js\"></script><script src=\"/admin_assets/js/modern.min.js\"></script>";
		echo "<script src=\"/admin_assets/plugins/datatables/js/jquery.dataTables.min.js\"></script>";
		echo "<script>var extable;\$(document).ready(function() {extable=\$('#example').DataTable({\"language\":{\"url\":\"https://cdn.datatables.net/plug-ins/e9421181788/i18n/Chinese.json\"}});});</script>";
		echo "</body></html>";
	}
	function xg_money() {
		need_admin();
		$id = mac_url_get(1);
		$OSWAP_0d07de59261cc2c9023b194184c575fb = _POST('name');
		$qz = _POST('qz');
		$hz = _POST('hz');
		$hl = _POST('hl');
		if ((empty($OSWAP_0d07de59261cc2c9023b194184c575fb)) or (empty($qz)) or (empty($hz)) or (empty($hl))) die('请填写完整内容!!');
		$OSWAP_a416a4b07b6f280c968f2f3bb53948d5 = localrun::xg_money_form($id, $OSWAP_0d07de59261cc2c9023b194184c575fb, $qz, $hz, $hl);
		$OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b = $this->return_array($OSWAP_a416a4b07b6f280c968f2f3bb53948d5);
	}
	function help() {
		need_admin();
		$OSWAP_a416a4b07b6f280c968f2f3bb53948d5 = localrun::help();
		$OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b = $this->return_array($OSWAP_a416a4b07b6f280c968f2f3bb53948d5);
		AdminT::header('帮助中心', "<link href=\"/admin_assets/plugins/datatables/css/jquery.datatables.min.css\" rel=\"stylesheet\" type=\"text/css\"/><link href=\"/admin_assets/plugins/datatables/css/jquery.datatables_themeroller.css\" rel=\"stylesheet\" type=\"text/css\"/>");
		AdminT::search();
		echo "<main class=\"page-content content-wrap\">";
		AdminT::navbar();
		AdminT::sidebar();
		echo "<div class=\"page-inner\">";
		AdminT::title('帮助中心', '<li>网站内容</li>', '<a href="javascript:void(0)" onclick="$.get(\'/index.php/Admin/new_help/\',function(){location.reload();});" class="btn btn-primary btn-addon btn-xs"><i class="fa fa-plus"></i> 添加帮助</a>');
		echo "<div id=\"main-wrapper\" class=\"container\"><div class=\"row\">";
		echo "<div class=\"col-md-12\">";
		echo "<div class=\"panel panel-white\"><div class=\"panel-body\"><div class=\"table-responsive\">"; ?>
<table id="example" class="display table" style="width: 100%; cellspacing: 0;">
	<thead>
		<tr>
			<th>ID</th>
			<th>标题</th>
			<th>作者</th>
			<th>时间</th>
			<th>操作</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<th>ID</th>
			<th>标题</th>
			<th>作者</th>
			<th>时间</th>
			<th>操作</th>
		</tr>
	</tfoot>
	<tbody>
<?php foreach ($OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['helps'] as $OSWAP_db528191b36899ed3615db79d9a3fa9b) { ?>
		<tr class="usert<?php echo $OSWAP_db528191b36899ed3615db79d9a3fa9b['id'] ?>">
			<td><?php echo $OSWAP_db528191b36899ed3615db79d9a3fa9b['id'] ?></td>
			<td><?php echo $OSWAP_db528191b36899ed3615db79d9a3fa9b['标题'] ?></td>
			<td><?php echo $OSWAP_db528191b36899ed3615db79d9a3fa9b['作者'] ?></td>
			<td><?php echo $OSWAP_db528191b36899ed3615db79d9a3fa9b['时间'] ?></td>
			<td><a href="/index.php/Admin/help_detailed/<?php echo $OSWAP_db528191b36899ed3615db79d9a3fa9b['id'] ?>/" class="btn btn-info btn-xs">编辑</a><a href="javascript:void(0)" class="btn btn-danger btn-xs delid<?php echo $OSWAP_db528191b36899ed3615db79d9a3fa9b['id'] ?>" disabled>删除</a><input type="checkbox"onclick="$('.delid<?php echo $OSWAP_db528191b36899ed3615db79d9a3fa9b['id'] ?>').attr('onclick','$.get(\'/index.php/Admin/del_help/<?php echo $OSWAP_db528191b36899ed3615db79d9a3fa9b['id'] ?>/\',function(data){if(data==\'ok\') extable.row(\'.usert<?php echo $OSWAP_db528191b36899ed3615db79d9a3fa9b['id'] ?>\').remove().draw(); else swap_alert(\'error\',\'删除帮助失败\',data);});') && $('.delid<?php echo $OSWAP_db528191b36899ed3615db79d9a3fa9b['id'] ?>').attr('disabled', false) && $(this).parent().parent().remove();"/></td>
		</tr>
<?php
		} ?>
	</tbody>
</table>
<?php
		echo "</div></div></div>";
		echo "</div>";
		echo "</div></div></div>";
		AdminT::page_footer();
		echo "</div></main>";
		AdminT::cd_nav();
		AdminT::pjs();
		echo "<script src=\"/admin_assets/plugins/waypoints/jquery.waypoints.min.js\"></script><script src=\"/admin_assets/plugins/jquery-counterup/jquery.counterup.min.js\"></script><script src=\"/admin_assets/plugins/toastr/toastr.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.time.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.symbol.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.resize.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.tooltip.min.js\"></script><script src=\"/admin_assets/plugins/curvedlines/curvedLines.js\"></script><script src=\"/admin_assets/plugins/metrojs/MetroJs.min.js\"></script><script src=\"/admin_assets/plugins/morris/raphael.min.js\"></script><script src=\"/admin_assets/plugins/morris/morris.min.js\"></script><script src=\"/admin_assets/js/modern.min.js\"></script>";
		echo "<script src=\"/admin_assets/plugins/datatables/js/jquery.dataTables.min.js\"></script>";
		echo "<script>var extable;\$(document).ready(function() {extable=\$('#example').DataTable({\"language\":{\"url\":\"https://cdn.datatables.net/plug-ins/e9421181788/i18n/Chinese.json\"}});});</script>";
		echo "</body></html>";
	}
	function new_help() {
		need_admin();
		$OSWAP_a416a4b07b6f280c968f2f3bb53948d5 = localrun::new_help_form('新建帮助' . time(), '', GETADMINNAME());
		$OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b = $this->return_array($OSWAP_a416a4b07b6f280c968f2f3bb53948d5);
	}
	function del_help() {
		need_admin();
		$id = mac_url_get(1);
		if (empty($id)) die('参数错误,请选择删除id');
		$OSWAP_a416a4b07b6f280c968f2f3bb53948d5 = localrun::del_help($id);
		$OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b = $this->return_array($OSWAP_a416a4b07b6f280c968f2f3bb53948d5);
	}
	function help_detailed() {
		need_admin();
		$id = mac_url_get(1);
		$OSWAP_a416a4b07b6f280c968f2f3bb53948d5 = localrun::help_detailed($id);
		$OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b = $this->return_array($OSWAP_a416a4b07b6f280c968f2f3bb53948d5);
		$OSWAP_db528191b36899ed3615db79d9a3fa9b = $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['help'];
		AdminT::header('帮助修改', "<link href=\"/admin_assets/plugins/datatables/css/jquery.datatables.min.css\" rel=\"stylesheet\" type=\"text/css\"/><link href=\"/admin_assets/plugins/datatables/css/jquery.datatables_themeroller.css\" rel=\"stylesheet\" type=\"text/css\"/><link href=\"/umeditor/themes/default/css/umeditor.css\" type=\"text/css\" rel=\"stylesheet\"/>");
		AdminT::search();
		echo "<main class=\"page-content content-wrap\">";
		AdminT::navbar();
		AdminT::sidebar();
		echo "<div class=\"page-inner\">";
		AdminT::title('帮助修改', '<li>帮助中心</li>');
		echo "<div id=\"main-wrapper\" class=\"container\"><div class=\"row\">";
		echo "<div class=\"col-md-12\">";
		echo "<div class=\"panel panel-white\"><div class=\"panel-body\"><div class=\"table-responsive col-md-12\">"; ?>
				<form role="form" id="userform" method="post" class="validate">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label">帮助文档标题</label>
								<input type="text" class="form-control" name="name" value="<?php echo $OSWAP_db528191b36899ed3615db79d9a3fa9b['标题'] ?>" />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">帮助文档时间</label>
								<input type="text" class="form-control" value="<?php echo $OSWAP_db528191b36899ed3615db79d9a3fa9b['时间'] ?>" disabled />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">帮助文档作者</label>
								<input type="text" class="form-control" value="<?php echo $OSWAP_db528191b36899ed3615db79d9a3fa9b['作者'] ?>" disabled />
							</div>
						</div>
					</div>
					<div class="form-group">
<script type="text/plain" id="myEditor" name="msg" style="height:240px;width:100%;">
<?php echo $OSWAP_db528191b36899ed3615db79d9a3fa9b['内容'] ?>
</script> 
					</div>
					<div class="form-group">
						<a href="javascript:void(0)" onclick="$.post('/index.php/Admin/xg_help_detailed_form/<?php echo $OSWAP_db528191b36899ed3615db79d9a3fa9b['id'] ?>/',$('#userform').serialize(),function(data){if(data=='ok') swap_alert('success','修改成功','修改帮助成功'); else swap_alert('error','修改失败',data);});" class="btn btn-success">修改</a>
					</div>
				</form>
<?php
		echo "</div></div></div>";
		echo "</div>";
		echo "</div></div></div>";
		AdminT::page_footer();
		echo "</div></main>";
		AdminT::cd_nav();
		AdminT::pjs();
		echo "<script src=\"/admin_assets/plugins/waypoints/jquery.waypoints.min.js\"></script><script src=\"/admin_assets/plugins/jquery-counterup/jquery.counterup.min.js\"></script><script src=\"/admin_assets/plugins/toastr/toastr.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.time.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.symbol.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.resize.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.tooltip.min.js\"></script><script src=\"/admin_assets/plugins/curvedlines/curvedLines.js\"></script><script src=\"/admin_assets/plugins/metrojs/MetroJs.min.js\"></script><script src=\"/admin_assets/plugins/morris/raphael.min.js\"></script><script src=\"/admin_assets/plugins/morris/morris.min.js\"></script><script src=\"/admin_assets/js/modern.min.js\"></script>";
		echo "<script src=\"/admin_assets/plugins/datatables/js/jquery.dataTables.min.js\"></script>";
		echo "<script>var extable;\$(document).ready(function() {extable=\$('#example').DataTable({\"language\":{\"url\":\"https://cdn.datatables.net/plug-ins/e9421181788/i18n/Chinese.json\"}});});</script>"; ?>
<script type="text/javascript" src="/umeditor/umeditor.config.js"></script>
<script type="text/javascript" src="/umeditor/umeditor.min.js"></script>
<script type="text/javascript" src="/umeditor/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript">
var um = UM.getEditor('myEditor');
</script>
		<?php
		echo "</body></html>";
	}
	function xg_help_detailed_form() {
		need_admin();
		$id = mac_url_get(1);
		$OSWAP_0d07de59261cc2c9023b194184c575fb = _POST('name');
		$OSWAP_93e86675a14bf45114306ac2be631499 = _POST('msg');
		if ((empty($OSWAP_0d07de59261cc2c9023b194184c575fb)) or (empty($OSWAP_93e86675a14bf45114306ac2be631499))) die('请填写帮助文档标题或内容!!');
		$OSWAP_a416a4b07b6f280c968f2f3bb53948d5 = localrun::xg_help_detailed_form($id, $OSWAP_0d07de59261cc2c9023b194184c575fb, $OSWAP_93e86675a14bf45114306ac2be631499, GETADMINNAME());
		$OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b = $this->return_array($OSWAP_a416a4b07b6f280c968f2f3bb53948d5);
	}
	function new_network() {
		need_admin();
		SMACSQL()->select('产品', '*');
		$OSWAP_48e0791b3c3dea4cbbd70e367d431261 = array();
		while ($OSWAP_51d4cad9672e6605c99e0c3d678f456e = SMACSQL()->fetch_assoc()) {
			$OSWAP_48e0791b3c3dea4cbbd70e367d431261[] = $OSWAP_51d4cad9672e6605c99e0c3d678f456e;
		}
		AdminT::header('故障添加', "<link href=\"/admin_assets/plugins/datatables/css/jquery.datatables.min.css\" rel=\"stylesheet\" type=\"text/css\"/><link href=\"/admin_assets/plugins/datatables/css/jquery.datatables_themeroller.css\" rel=\"stylesheet\" type=\"text/css\"/><link href=\"/admin_assets/plugins/bootstrap-datepicker/css/datepicker3.css\" rel=\"stylesheet\" type=\"text/css\"/><link href=\"/admin_assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.css\" rel=\"stylesheet\" type=\"text/css\"/>");
		AdminT::search();
		echo "<main class=\"page-content content-wrap\">";
		AdminT::navbar();
		AdminT::sidebar();
		echo "<div class=\"page-inner\">";
		AdminT::title('故障添加', '<li>网站内容</li><li>网络故障</li>');
		echo "<div id=\"main-wrapper\" class=\"container\"><div class=\"row\">";
		echo "<div class=\"col-md-12\">";
		echo "<div class=\"panel panel-white\"><div class=\"panel-body\"><div class=\"table-responsive col-md-12\">"; ?>
				<form id="netform" role="form" class="form-horizontal form-groups-bordered">
					<div class="form-group">
						<label class="col-sm-3 control-label">标题</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="title">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">开始日期</label>
						<div class="col-sm-5">
							<div class="date-and-time">
								<input type="text" name="date" class="form-control date-picker"/>
								<input type="text" name="time" class="form-control timepicker"/>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">服务器/产品</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="server">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">优先</label>
						<div class="col-sm-5">
							<select class="form-control" name="youxian">
								<option value="危急">危急</option>
								<option value="低">低</option>
								<option value="中">中</option>
								<option value="高">高</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">状态</label>
						<div class="col-sm-5">
							<select class="form-control" name="zt">
								<option value="开放" >开放</option>
								<option value="计划中">计划中</option>
								<option value="已解决">已解决</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">描述</label>
						<div class="col-sm-5">
							<textarea class="form-control" name="msg" style="height:200px;"></textarea>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<a href="javascript:void(0)" onclick="$.post('/index.php/Admin/new_network_form/',$('#netform').serialize(),function(data){if(data=='ok') swap_alert('success','添加成功','添加故障成功'); else swap_alert('error','添加失败',data);});" class="btn btn-default">添加</a>
						</div>
					</div>
				</form>
<?php
		echo "</div></div></div>";
		echo "</div>";
		echo "</div></div></div>";
		AdminT::page_footer();
		echo "</div></main>";
		AdminT::cd_nav();
		AdminT::pjs();
		echo "<script src=\"/admin_assets/plugins/waypoints/jquery.waypoints.min.js\"></script><script src=\"/admin_assets/plugins/jquery-counterup/jquery.counterup.min.js\"></script><script src=\"/admin_assets/plugins/toastr/toastr.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.time.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.symbol.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.resize.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.tooltip.min.js\"></script><script src=\"/admin_assets/plugins/curvedlines/curvedLines.js\"></script><script src=\"/admin_assets/plugins/metrojs/MetroJs.min.js\"></script><script src=\"/admin_assets/plugins/morris/raphael.min.js\"></script><script src=\"/admin_assets/plugins/morris/morris.min.js\"></script><script src=\"/admin_assets/js/modern.min.js\"></script>";
		echo "<script src=\"/admin_assets/plugins/datatables/js/jquery.dataTables.min.js\"></script><script src=\"/admin_assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js\"></script><script src=\"/admin_assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.js\"></script>";
		echo "<script>var extable;\$(document).ready(function() {extable=\$('#example').DataTable({\"language\":{\"url\":\"https://cdn.datatables.net/plug-ins/e9421181788/i18n/Chinese.json\"}});});</script>"; ?>
<script>
$(document).ready(function() {
    $('.date-picker').datepicker({
        orientation: "top auto",
        autoclose: true,
		format: "yyyy-mm-dd"
    });
	$('.timepicker').timepicker({
		minuteStep: 5,
		showInputs: false,
		disableFocus: true
	});
});
</script>
<?php
		echo "</body></html>";
	}
	function new_network_form() {
		need_admin();
		$id = mac_url_get(1);
		$OSWAP_c8af752ff2384e9e0f6dbe4bce4dea33 = _POST('title');
		$OSWAP_361ba26c4fe1efbf408ad16ef9b6a043 = _POST('time');
		$OSWAP_8d81aba485c343db92862b3b93981b55 = _POST('date');
		$OSWAP_b7da14f6d30a57d6556466c8bacc5350 = _POST('server');
		$OSWAP_e145a0d82f1714dc47face8a348ea201 = _POST('youxian');
		$zt = _POST('zt');
		$OSWAP_93e86675a14bf45114306ac2be631499 = _POST('msg');
		if ((empty($OSWAP_c8af752ff2384e9e0f6dbe4bce4dea33)) or (empty($OSWAP_8d81aba485c343db92862b3b93981b55)) or (empty($OSWAP_361ba26c4fe1efbf408ad16ef9b6a043)) or (empty($OSWAP_e145a0d82f1714dc47face8a348ea201)) or (empty($zt)) or (empty($OSWAP_93e86675a14bf45114306ac2be631499))) die('请填写完整信息!!');
		$OSWAP_658cd2ddd841a4dae87bd129e022fab9 = explode(' ', $OSWAP_361ba26c4fe1efbf408ad16ef9b6a043);
		$OSWAP_75c6ea8b15273c5e272ab61f7fd88f70 = explode(':', $OSWAP_658cd2ddd841a4dae87bd129e022fab9[0]);
		$OSWAP_21c0f10c779cad1e64f499316caf67ef = to_24_hour($OSWAP_75c6ea8b15273c5e272ab61f7fd88f70[0], $OSWAP_75c6ea8b15273c5e272ab61f7fd88f70[1], $OSWAP_75c6ea8b15273c5e272ab61f7fd88f70[2], $OSWAP_658cd2ddd841a4dae87bd129e022fab9[1]);
		SMACSQL()->insert('网络故障', "标题,时间,内容,状态,受到影响的服务,优先级,最近更新", "'$OSWAP_c8af752ff2384e9e0f6dbe4bce4dea33','$OSWAP_8d81aba485c343db92862b3b93981b55 $OSWAP_21c0f10c779cad1e64f499316caf67ef','$OSWAP_93e86675a14bf45114306ac2be631499','$zt','$OSWAP_b7da14f6d30a57d6556466c8bacc5350','$OSWAP_e145a0d82f1714dc47face8a348ea201',NOW()");
		die('ok');
	}
	function network() {
		need_admin();
		SMACSQL()->select('网络故障', '*');
		$OSWAP_9ad0a90d349c03b274a3c5eff195e14cs = array();
		while ($OSWAP_51d4cad9672e6605c99e0c3d678f456e = SMACSQL()->fetch_assoc()) {
			$OSWAP_9ad0a90d349c03b274a3c5eff195e14cs[] = $OSWAP_51d4cad9672e6605c99e0c3d678f456e;
		}
		AdminT::header('网络故障', "<link href=\"/admin_assets/plugins/datatables/css/jquery.datatables.min.css\" rel=\"stylesheet\" type=\"text/css\"/><link href=\"/admin_assets/plugins/datatables/css/jquery.datatables_themeroller.css\" rel=\"stylesheet\" type=\"text/css\"/>");
		AdminT::search();
		echo "<main class=\"page-content content-wrap\">";
		AdminT::navbar();
		AdminT::sidebar();
		echo "<div class=\"page-inner\">";
		AdminT::title('网络故障', '<li>网站内容</li>', '<a href="/index.php/Admin/new_Network/" class="btn btn-primary btn-addon btn-xs"><i class="fa fa-plus"></i> 添加故障</a>');
		echo "<div id=\"main-wrapper\" class=\"container\"><div class=\"row\">";
		echo "<div class=\"col-md-12\">";
		echo "<div class=\"panel panel-white\"><div class=\"panel-body\"><div class=\"table-responsive\">"; ?>
<table id="example" class="display table" style="width: 100%; cellspacing: 0;">
	<thead>
		<tr>
			<th>ID</th>
			<th>标题</th>
			<th>时间</th>
			<th>状态</th>
			<th>影响服务</th>
			<th>优先级</th>
			<th>最近时间</th>
			<th>操作</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<th>ID</th>
			<th>标题</th>
			<th>时间</th>
			<th>状态</th>
			<th>影响服务</th>
			<th>优先级</th>
			<th>最近时间</th>
			<th>操作</th>
		</tr>
	</tfoot>
	<tbody>
<?php foreach ($OSWAP_9ad0a90d349c03b274a3c5eff195e14cs as $OSWAP_9ad0a90d349c03b274a3c5eff195e14c) { ?>
		<tr class="usert<?php echo $OSWAP_9ad0a90d349c03b274a3c5eff195e14c['id'] ?>">
			<td><?php echo $OSWAP_9ad0a90d349c03b274a3c5eff195e14c['id'] ?></td>
			<td><?php echo $OSWAP_9ad0a90d349c03b274a3c5eff195e14c['标题'] ?></td>
			<td><?php echo $OSWAP_9ad0a90d349c03b274a3c5eff195e14c['时间'] ?></td>
			<td><?php echo $OSWAP_9ad0a90d349c03b274a3c5eff195e14c['状态'] ?></td>
			<td><?php echo $OSWAP_9ad0a90d349c03b274a3c5eff195e14c['受到影响的服务'] ?></td>
			<td><?php echo $OSWAP_9ad0a90d349c03b274a3c5eff195e14c['优先级'] ?></td>
			<td><?php echo $OSWAP_9ad0a90d349c03b274a3c5eff195e14c['最近更新'] ?></td>
			<td><a href="/index.php/Admin/network_detailed/<?php echo $OSWAP_9ad0a90d349c03b274a3c5eff195e14c['id'] ?>/" class="btn btn-info btn-xs">编辑</a><a href="javascript:void(0)" class="btn btn-danger btn-xs delid<?php echo $OSWAP_9ad0a90d349c03b274a3c5eff195e14c['id'] ?>" disabled>删除</a><input type="checkbox"onclick="$('.delid<?php echo $OSWAP_9ad0a90d349c03b274a3c5eff195e14c['id'] ?>').attr('onclick','$.get(\'/index.php/Admin/del_net/<?php echo $OSWAP_9ad0a90d349c03b274a3c5eff195e14c['id'] ?>/\',function(data){if(data==\'ok\') extable.row(\'.usert<?php echo $OSWAP_9ad0a90d349c03b274a3c5eff195e14c['id'] ?>\').remove().draw(); else swap_alert(\'error\',\'删除失败\',data);});') && $('.delid<?php echo $OSWAP_9ad0a90d349c03b274a3c5eff195e14c['id'] ?>').attr('disabled', false) && $(this).parent().parent().remove();"/></td>
		</tr>
<?php
		} ?>
	</tbody>
</table>
<?php
		echo "</div></div></div>";
		echo "</div>";
		echo "</div></div></div>";
		AdminT::page_footer();
		echo "</div></main>";
		AdminT::cd_nav();
		AdminT::pjs();
		echo "<script src=\"/admin_assets/plugins/waypoints/jquery.waypoints.min.js\"></script><script src=\"/admin_assets/plugins/jquery-counterup/jquery.counterup.min.js\"></script><script src=\"/admin_assets/plugins/toastr/toastr.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.time.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.symbol.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.resize.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.tooltip.min.js\"></script><script src=\"/admin_assets/plugins/curvedlines/curvedLines.js\"></script><script src=\"/admin_assets/plugins/metrojs/MetroJs.min.js\"></script><script src=\"/admin_assets/plugins/morris/raphael.min.js\"></script><script src=\"/admin_assets/plugins/morris/morris.min.js\"></script><script src=\"/admin_assets/js/modern.min.js\"></script>";
		echo "<script src=\"/admin_assets/plugins/datatables/js/jquery.dataTables.min.js\"></script>";
		echo "<script>var extable;\$(document).ready(function() {extable=\$('#example').DataTable({\"language\":{\"url\":\"https://cdn.datatables.net/plug-ins/e9421181788/i18n/Chinese.json\"}});});</script>";
		echo "</body></html>";
	}
	function del_net() {
		need_admin();
		$id = mac_url_get(1);
		if (empty($id)) die('参数错误,请选择删除id');
		SMACSQL()->select('网络故障', '*', "id='$id'");
		if (SMACSQL()->db_num_rows() == 0) die('not found');
		SMACSQL()->delete('网络故障', "id='$id'");
		die('ok');
	}
	function network_detailed() {
		need_admin();
		$id = mac_url_get(1);
		SMACSQL()->select('网络故障', '*', "id='$id'");
		if (SMACSQL()->db_num_rows() == 0) exit(redirect('/index.php/admin/?warning=' . urlencode('网络故障不存在')));
		$OSWAP_9ad0a90d349c03b274a3c5eff195e14c = SMACSQL()->fetch_array();
		$OSWAP_361ba26c4fe1efbf408ad16ef9b6a043 = explode(' ', $OSWAP_9ad0a90d349c03b274a3c5eff195e14c['时间']);
		$OSWAP_9ad0a90d349c03b274a3c5eff195e14c['时间1'] = $OSWAP_361ba26c4fe1efbf408ad16ef9b6a043[0];
		$OSWAP_9ad0a90d349c03b274a3c5eff195e14c['时间2'] = to_12_hour($OSWAP_361ba26c4fe1efbf408ad16ef9b6a043[1]);
		AdminT::header('故障修改', "<link href=\"/admin_assets/plugins/datatables/css/jquery.datatables.min.css\" rel=\"stylesheet\" type=\"text/css\"/><link href=\"/admin_assets/plugins/datatables/css/jquery.datatables_themeroller.css\" rel=\"stylesheet\" type=\"text/css\"/><link href=\"/admin_assets/plugins/bootstrap-datepicker/css/datepicker3.css\" rel=\"stylesheet\" type=\"text/css\"/><link href=\"/admin_assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.css\" rel=\"stylesheet\" type=\"text/css\"/><link href=\"/umeditor/themes/default/css/umeditor.css\" type=\"text/css\" rel=\"stylesheet\"/>");
		AdminT::search();
		echo "<main class=\"page-content content-wrap\">";
		AdminT::navbar();
		AdminT::sidebar();
		echo "<div class=\"page-inner\">";
		AdminT::title('故障修改', '<li>网站内容</li><li>网络故障</li>');
		echo "<div id=\"main-wrapper\" class=\"container\"><div class=\"row\">";
		echo "<div class=\"col-md-12\">";
		echo "<div class=\"panel panel-white\"><div class=\"panel-body\"><div class=\"table-responsive col-md-12\">"; ?>
				<form id="netform" role="form" class="form-horizontal form-groups-bordered">
					<div class="form-group">
						<label class="col-sm-3 control-label">标题</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="title" value="<?php echo $OSWAP_9ad0a90d349c03b274a3c5eff195e14c['标题'] ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">开始日期</label>
						<div class="col-sm-5">
							<div class="date-and-time">
								<input type="text" name="date" value="<?php echo $OSWAP_9ad0a90d349c03b274a3c5eff195e14c['时间1'] ?>" class="form-control date-picker"/>
								<input type="text" name="time" value="<?php echo $OSWAP_9ad0a90d349c03b274a3c5eff195e14c['时间2'] ?>" class="form-control timepicker"/>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">服务器/产品</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="server" value="<?php echo $OSWAP_9ad0a90d349c03b274a3c5eff195e14c['受到影响的服务'] ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">优先</label>
						<div class="col-sm-5">
							<select class="form-control" name="youxian">
								<option value="危急"<?php if ($OSWAP_9ad0a90d349c03b274a3c5eff195e14c['优先级'] == '危急') {
			echo ' selected';
		} ?>>危急</option>
								<option value="低"<?php if ($OSWAP_9ad0a90d349c03b274a3c5eff195e14c['优先级'] == '低') {
			echo ' selected';
		} ?>>低</option>
								<option value="中"<?php if ($OSWAP_9ad0a90d349c03b274a3c5eff195e14c['优先级'] == '中') {
			echo ' selected';
		} ?>>中</option>
								<option value="高"<?php if ($OSWAP_9ad0a90d349c03b274a3c5eff195e14c['优先级'] == '高') {
			echo ' selected';
		} ?>>高</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">状态</label>
						<div class="col-sm-5">
							<select class="form-control" name="zt">
								<option value="开放"<?php if ($OSWAP_9ad0a90d349c03b274a3c5eff195e14c['状态'] == '开放') {
			echo ' selected';
		} ?>>开放</option>
								<option value="计划中"<?php if ($OSWAP_9ad0a90d349c03b274a3c5eff195e14c['状态'] == '计划中') {
			echo ' selected';
		} ?>>计划中</option>
								<option value="已解决"<?php if ($OSWAP_9ad0a90d349c03b274a3c5eff195e14c['状态'] == '已解决') {
			echo ' selected';
		} ?>>已解决</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">描述</label>
						<div class="col-sm-9">
<script type="text/plain" id="myEditor" name="msg" style="height:240px;width:100%;">
<?php echo $OSWAP_9ad0a90d349c03b274a3c5eff195e14c['内容'] ?>
</script>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<a href="javascript:void(0)" onclick="$.post('/index.php/Admin/xg_network_detailed_form/<?php echo $OSWAP_9ad0a90d349c03b274a3c5eff195e14c['id'] ?>/',$('#netform').serialize(),function(data){if(data=='ok') swap_alert('success','修改成功','修改故障成功'); else swap_alert('error','修改失败',data);});" class="btn btn-default">修改</a>
						</div>
					</div>
				</form>
<?php
		echo "</div></div></div>";
		echo "</div>";
		echo "</div></div></div>";
		AdminT::page_footer();
		echo "</div></main>";
		AdminT::cd_nav();
		AdminT::pjs();
		echo "<script src=\"/admin_assets/plugins/waypoints/jquery.waypoints.min.js\"></script><script src=\"/admin_assets/plugins/jquery-counterup/jquery.counterup.min.js\"></script><script src=\"/admin_assets/plugins/toastr/toastr.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.time.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.symbol.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.resize.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.tooltip.min.js\"></script><script src=\"/admin_assets/plugins/curvedlines/curvedLines.js\"></script><script src=\"/admin_assets/plugins/metrojs/MetroJs.min.js\"></script><script src=\"/admin_assets/plugins/morris/raphael.min.js\"></script><script src=\"/admin_assets/plugins/morris/morris.min.js\"></script><script src=\"/admin_assets/js/modern.min.js\"></script>";
		echo "<script src=\"/admin_assets/plugins/datatables/js/jquery.dataTables.min.js\"></script><script src=\"/admin_assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js\"></script><script src=\"/admin_assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.js\"></script>";
		echo "<script>var extable;\$(document).ready(function() {extable=\$('#example').DataTable({\"language\":{\"url\":\"https://cdn.datatables.net/plug-ins/e9421181788/i18n/Chinese.json\"}});});</script>"; ?>
<script>
$(document).ready(function() {
    $('.date-picker').datepicker({
        orientation: "top auto",
        autoclose: true,
		format: "yyyy-mm-dd"
    });
	$('.timepicker').timepicker({
		minuteStep: 5,
		showInputs: false,
		disableFocus: true
	});
});
</script>
<script type="text/javascript" src="/umeditor/umeditor.config.js"></script>
<script type="text/javascript" src="/umeditor/umeditor.min.js"></script>
<script type="text/javascript" src="/umeditor/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript">
var um = UM.getEditor('myEditor');
</script>
<?php
		echo "</body></html>";
	}
	function xg_network_detailed_form() {
		need_admin();
		$id = mac_url_get(1);
		$OSWAP_c8af752ff2384e9e0f6dbe4bce4dea33 = _POST('title');
		$OSWAP_361ba26c4fe1efbf408ad16ef9b6a043 = _POST('time');
		$OSWAP_8d81aba485c343db92862b3b93981b55 = _POST('date');
		$OSWAP_b7da14f6d30a57d6556466c8bacc5350 = _POST('server');
		$OSWAP_e145a0d82f1714dc47face8a348ea201 = _POST('youxian');
		$zt = _POST('zt');
		$OSWAP_93e86675a14bf45114306ac2be631499 = _POST('msg');
		if ((empty($OSWAP_c8af752ff2384e9e0f6dbe4bce4dea33)) or (empty($OSWAP_8d81aba485c343db92862b3b93981b55)) or (empty($OSWAP_361ba26c4fe1efbf408ad16ef9b6a043)) or (empty($OSWAP_e145a0d82f1714dc47face8a348ea201)) or (empty($zt)) or (empty($OSWAP_93e86675a14bf45114306ac2be631499))) die('请填写完整信息!!');
		SMACSQL()->select('网络故障', '*', "id='$id'");
		if (SMACSQL()->db_num_rows() == 0) die('网络故障不存在');
		$OSWAP_658cd2ddd841a4dae87bd129e022fab9 = explode(' ', $OSWAP_361ba26c4fe1efbf408ad16ef9b6a043);
		$OSWAP_75c6ea8b15273c5e272ab61f7fd88f70 = explode(':', $OSWAP_658cd2ddd841a4dae87bd129e022fab9[0]);
		$OSWAP_21c0f10c779cad1e64f499316caf67ef = to_24_hour($OSWAP_75c6ea8b15273c5e272ab61f7fd88f70[0], $OSWAP_75c6ea8b15273c5e272ab61f7fd88f70[1], $OSWAP_75c6ea8b15273c5e272ab61f7fd88f70[2], $OSWAP_658cd2ddd841a4dae87bd129e022fab9[1]);
		SMACSQL()->update('网络故障', "标题='$OSWAP_c8af752ff2384e9e0f6dbe4bce4dea33',时间='$OSWAP_8d81aba485c343db92862b3b93981b55 $OSWAP_21c0f10c779cad1e64f499316caf67ef',内容='$OSWAP_93e86675a14bf45114306ac2be631499',状态='$zt',受到影响的服务='$OSWAP_b7da14f6d30a57d6556466c8bacc5350',优先级='$OSWAP_e145a0d82f1714dc47face8a348ea201',最近更新=NOW()", "id='$id'");
		die('ok');
	}
	function product() {
		need_admin();
		SMACSQL()->select('产品', '*');
		$OSWAP_48e0791b3c3dea4cbbd70e367d431261 = array();
		$OSWAP_062b3b10ec3eaf75d088bfd7cb309438 = array();
		while ($OSWAP_51d4cad9672e6605c99e0c3d678f456e = SMACSQL()->fetch_assoc()) {
			$OSWAP_062b3b10ec3eaf75d088bfd7cb309438[] = $OSWAP_51d4cad9672e6605c99e0c3d678f456e;
		}
		foreach ($OSWAP_062b3b10ec3eaf75d088bfd7cb309438 as $cp) {
			SMACSQL()->select('产品分类', '*', "id='" . $cp['分类id'] . "'");
			$temp = SMACSQL()->fetch_array();
			$cp['产品组'] = $temp['分类名称'];
			SMACSQL()->select('服务', '*', "产品id='" . $cp['id'] . "' and (状态='激活' or 状态='暂停')");
			if (SMACSQL()->db_num_rows() != 0) $cp['删除OK'] = false;
			else $cp['删除OK'] = true;
			if (strstr($cp['周期'], '{')) $cp['周期'] = '多周期(新)';
			$OSWAP_48e0791b3c3dea4cbbd70e367d431261[] = $cp;
		}
		AdminT::header('产品列表', "<link href=\"/admin_assets/plugins/datatables/css/jquery.datatables.min.css\" rel=\"stylesheet\" type=\"text/css\"/><link href=\"/admin_assets/plugins/datatables/css/jquery.datatables_themeroller.css\" rel=\"stylesheet\" type=\"text/css\"/>");
		AdminT::search();
		echo "<main class=\"page-content content-wrap\">";
		AdminT::navbar();
		AdminT::sidebar();
		echo "<div class=\"page-inner\">";
		AdminT::title('产品列表', '<li>产品管理</li>', '<a href="javascript:void(0)" onclick="$.get(\'/index.php/Admin/new_product/\',function(){location.reload();});" class="btn btn-primary btn-addon btn-xs"><i class="fa fa-plus"></i> 添加产品</a>');
		echo "<div id=\"main-wrapper\" class=\"container\"><div class=\"row\">";
		echo "<div class=\"col-md-12\">";
		echo "<div class=\"panel panel-white\"><div class=\"panel-body\"><div class=\"table-responsive\">"; ?>
<table id="example" class="display table" style="width: 100%; cellspacing: 0;">
	<thead>
		<tr>
			<th>ID</th>
			<th>产品名称</th>
			<th>类型</th>
			<th>产品排序</th>
			<th>支付类型</th>
			<th>库存</th>
			<th>产品组</th>
			<th>开通方式</th>
			<th>操作</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<th>ID</th>
			<th>产品名称</th>
			<th>类型</th>
			<th>产品排序</th>
			<th>支付类型</th>
			<th>库存</th>
			<th>产品组</th>
			<th>开通方式</th>
			<th>操作</th>
		</tr>
	</tfoot>
	<tbody>
<?php foreach ($OSWAP_48e0791b3c3dea4cbbd70e367d431261 as $cp) { ?>
		<tr class="usert<?php echo $cp['id'] ?>">
			<td><?php echo $cp['id'] ?></td>
			<td><?php echo $cp['名称'] ?></td>
			<td><?php echo $cp['类型'] ?></td>
			<td><?php echo $cp['顺序'] ?></td>
			<td><?php if ($cp['价格'] == '免费') {
				echo '免费';
			} else {
				echo $cp['周期'];
			} ?></td>
			<td><?php echo $cp['库存'] ?></td>
			<td><?php echo $cp['产品组'] ?></td>
			<td><?php echo $cp['开通方式'] ?></td>
			<td><a href="/index.php/Admin/product_detailed/<?php echo $cp['id'] ?>/" class="btn btn-info btn-xs">编辑</a><a href="javascript:void(0)" class="btn btn-danger btn-xs delid<?php echo $cp['id'] ?>" disabled>删除</a><?php if ($cp['删除OK']) { ?><input type="checkbox"onclick="$('.delid<?php echo $cp['id'] ?>').attr('onclick','$.get(\'/index.php/Admin/product_sc/<?php echo $cp['id'] ?>/\',function(data){if(data==\'ok\') extable.row(\'.usert<?php echo $cp['id'] ?>\').remove().draw(); else swap_alert(\'error\',\'删除失败\',data);});') && $('.delid<?php echo $cp['id'] ?>').attr('disabled', false) && $(this).parent().parent().remove();"/><?php
			} ?></td>
		</tr>
<?php
		} ?>
	</tbody>
</table>
<?php
		echo "</div></div></div>";
		echo "</div>";
		echo "</div></div></div>";
		AdminT::page_footer();
		echo "</div></main>";
		AdminT::cd_nav();
		AdminT::pjs();
		echo "<script src=\"/admin_assets/plugins/waypoints/jquery.waypoints.min.js\"></script><script src=\"/admin_assets/plugins/jquery-counterup/jquery.counterup.min.js\"></script><script src=\"/admin_assets/plugins/toastr/toastr.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.time.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.symbol.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.resize.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.tooltip.min.js\"></script><script src=\"/admin_assets/plugins/curvedlines/curvedLines.js\"></script><script src=\"/admin_assets/plugins/metrojs/MetroJs.min.js\"></script><script src=\"/admin_assets/plugins/morris/raphael.min.js\"></script><script src=\"/admin_assets/plugins/morris/morris.min.js\"></script><script src=\"/admin_assets/js/modern.min.js\"></script>";
		echo "<script src=\"/admin_assets/plugins/datatables/js/jquery.dataTables.min.js\"></script>";
		echo "<script>var extable;\$(document).ready(function() {extable=\$('#example').DataTable({\"language\":{\"url\":\"https://cdn.datatables.net/plug-ins/e9421181788/i18n/Chinese.json\"}});});</script>";
		echo "</body></html>";
	}
	function new_product() {
		need_admin();
		SMACSQL()->insert('产品', "名称,类型,周期", "'新建产品" . time() . "','虚拟主机','日付'");
		$id = SMACSQL()->insert_id();
		die('ok');
	}
	function product_sc() {
		need_admin();
		$id = mac_url_get(1);
		if (empty($id)) die('参数错误,请选择删除id');
		SMACSQL()->select('产品', '*', "id='$id'");
		if (SMACSQL()->db_num_rows() == 0) die('not found');
		SMACSQL()->select('服务', '*', "产品id='$id' and 状态<>'停止'");
		if (SMACSQL()->db_num_rows() != 0) die('还有未关闭服务并非停止状态，请到服务管理停止所有在这个产品运行的服务');
		SMACSQL()->delete('产品', "id='$id'");
		die('ok');
	}
	function product_detailed() {
		need_admin();
		$id = mac_url_get(1);
		SMACSQL()->select('产品', '*', "id='$id'");
		if (SMACSQL()->db_num_rows() == 0) exit(redirect('/index.php/admin/?warning=' . urlencode('产品不存在')));
		$cp = SMACSQL()->fetch_array();
		$cp['升级包'] = json_decode($cp['升级包']);
		if (!is_array($cp['升级包'])) $cp['升级包'] = array();
		$tempjc = json_decode($cp['免费域名']);
		if (!is_array($tempjc)) $tempjc = array();
		$tempi = 0;
		$tempdomains = '';
		foreach ($tempjc as $tempdomain) {
			if ($tempi != 0) $tempdomains.= ',';
			$tempdomains.= $tempdomain;
			$tempi++;
		}
		$cp['免费域名'] = $tempdomains;
		SMACSQL()->select('产品分类', '*');
		$OSWAP_cfb5599d7e13ea288004634c9becdefe = array();
		while ($OSWAP_51d4cad9672e6605c99e0c3d678f456e = SMACSQL()->fetch_assoc()) {
			$OSWAP_cfb5599d7e13ea288004634c9becdefe[] = $OSWAP_51d4cad9672e6605c99e0c3d678f456e;
		}
		$temparrays = require (SWAP_CONFIGS . 'template.php');
		$tempms = @file_get_contents(SWAP_ROOT . SWAP_TEMPLATES . $temparrays['template'] . SWAP_DIR_END . 'text.tpl');
		$OSWAP_864441020d7e8b560e177bdac0d5ffd3 = File::get_dirs(SWAP_LIB . 'servers');
		$OSWAP_864441020d7e8b560e177bdac0d5ffd3 = $OSWAP_864441020d7e8b560e177bdac0d5ffd3['dir'];
		$OSWAP_7e37a3de8a957f9a88db32d7e6529935 = array();
		foreach ($OSWAP_864441020d7e8b560e177bdac0d5ffd3 as $OSWAP_b69a7729e1ccb4639eb5b5295a641bad) {
			if (!strstr($OSWAP_b69a7729e1ccb4639eb5b5295a641bad, '.')) $OSWAP_7e37a3de8a957f9a88db32d7e6529935[] = $OSWAP_b69a7729e1ccb4639eb5b5295a641bad;
		}
		$OSWAP_9cfdc1ef42cc9f0e90dfd3ff5262c258 = get_cpanel_config($cp['面板类型']);
		if (!is_array($OSWAP_9cfdc1ef42cc9f0e90dfd3ff5262c258)) $OSWAP_9cfdc1ef42cc9f0e90dfd3ff5262c258 = array();
		SMACSQL()->select('服务器表', '*', "控制面板='" . $cp['面板类型'] . "'");
		$OSWAP_00da90b7d02924d66de6a6b2908901b7 = array();
		while ($OSWAP_51d4cad9672e6605c99e0c3d678f456e = SMACSQL()->fetch_assoc()) {
			$OSWAP_00da90b7d02924d66de6a6b2908901b7[] = $OSWAP_51d4cad9672e6605c99e0c3d678f456e;
		}
		SMACSQL()->select('产品', '*', "服务器组='" . $cp['服务器组'] . "' and id!=$id");
		$OSWAP_ac02ca4106bd6fd5986cd57c5ddb9a63 = array();
		while ($OSWAP_51d4cad9672e6605c99e0c3d678f456e = SMACSQL()->fetch_assoc()) {
			$OSWAP_ac02ca4106bd6fd5986cd57c5ddb9a63[] = $OSWAP_51d4cad9672e6605c99e0c3d678f456e;
		}
		SMACSQL()->select('产品配置选项组表', '*');
		$OSWAP_c97540fe0b3c5b2a38ea210c2e542b97g = array();
		while ($OSWAP_51d4cad9672e6605c99e0c3d678f456e = SMACSQL()->fetch_assoc()) {
			$OSWAP_c97540fe0b3c5b2a38ea210c2e542b97g[] = $OSWAP_51d4cad9672e6605c99e0c3d678f456e;
		}
		$OSWAP_c97540fe0b3c5b2a38ea210c2e542b97gs = $OSWAP_c97540fe0b3c5b2a38ea210c2e542b97g;
		$cl = explode(",", $cp['启用超量']);
		SMACSQL()->select('产品配置连接', '*', "产品id='" . $id . "'");
		$OSWAP_65e670cf3f8af3e60eec74be3f9bf46e = array();
		while ($OSWAP_51d4cad9672e6605c99e0c3d678f456e = SMACSQL()->fetch_assoc()) {
			$OSWAP_65e670cf3f8af3e60eec74be3f9bf46e[] = $OSWAP_51d4cad9672e6605c99e0c3d678f456e;
		}
		foreach ($OSWAP_65e670cf3f8af3e60eec74be3f9bf46e as $OSWAP_51d4cad9672e6605c99e0c3d678f456e) {
			$OSWAP_51ae262c0a4f0df7adcda1559314f441[] = $OSWAP_51d4cad9672e6605c99e0c3d678f456e['组id'];
		}
		if (strstr($cp['周期'], '{')) {
			$cp['周期'] = json_decode($cp['周期'], true);
		}
		AdminT::header('产品修改', "<link href=\"/admin_assets/plugins/datatables/css/jquery.datatables.min.css\" rel=\"stylesheet\" type=\"text/css\"/><link href=\"/admin_assets/plugins/datatables/css/jquery.datatables_themeroller.css\" rel=\"stylesheet\" type=\"text/css\"/><link href=\"/admin_assets/plugins/multi-select/css/multi-select.css\" rel=\"stylesheet\" type=\"text/css\"/><link href=\"/admin_assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css\" rel=\"stylesheet\" type=\"text/css\"/>");
		AdminT::search();
		echo "<main class=\"page-content content-wrap\">";
		AdminT::navbar();
		AdminT::sidebar();
		echo "<div class=\"page-inner\">";
		AdminT::title('产品修改', '<li>产品管理</li><li>产品列表</li>');
		echo "<div id=\"main-wrapper\" class=\"container\"><div class=\"row\">";
		if (!$cp['服务器组']) { ?>
								<div class="col-md-12">
									<div class="alert alert-danger alert-dismissible fade in" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        <h4>警告!你还没有给产品设置服务器.</h4>
                                        <p>
											我们判断这个状态是极其危险的,当产品开通时候将会产生未知的错误.<br/>
											当然,有些服务器插件并不需要设置服务器,那时你可以忽略这条提示,前提是你真的确定不需要设置产品的服务器.<br/>
											这条提示将会在你设置产品的服务器成功前一直提示您,请不要随意忽略它!
										</p>
                                    </div>
								</div>
<?php
		}
		echo "<div class=\"col-md-12\">"; ?>
                                <div class="panel panel-white">
                                    <div class="panel-heading clearfix">
                                        <h3 class="panel-title">产品配置列表</h3>
                                    </div>
                                    <div class="panel-body">
										<div role="tabpanel" class="table-responsive">
										<div style="min-width:1098px">
                                            <!-- Nav tabs -->
                                            <ul class="nav nav-tabs" role="tablist">
                                                <li role="presentation" class="active"><a href="#详情" role="tab" data-toggle="tab">详情</a></li>
                                                <li role="presentation"><a href="#定价" role="tab" data-toggle="tab">定价</a></li>
                                                <li role="presentation"><a href="#接口设置" role="tab" data-toggle="tab">接口设置</a></li>
                                                <li role="presentation"><a href="#自定义配置" role="tab" data-toggle="tab">自定义配置</a></li>
												<li role="presentation"><a href="#升级降级" role="tab" data-toggle="tab">升级降级</a></li>
												<li role="presentation"><a href="#免费域名" role="tab" data-toggle="tab">免费域名</a></li>
												<li role="presentation"><a href="#其他设置" role="tab" data-toggle="tab">其他设置</a></li>
                                            </ul>
                                            <form id="cpform" method="post">
				<div class="tab-content">
					<div class="tab-pane active" id="详情">
						<table class="table table-responsive">
							<tbody>
								<tr>
									<td>产品类型</td>
									<td>
										<select class="form-control" name="类型">
											<option value="虚拟主机"<?php if ($cp['类型'] == '虚拟主机') {
			echo ' selected';
		} ?>>虚拟主机</option>
											<option value="reselleraccount"<?php if ($cp['类型'] == 'reselleraccount') {
			echo ' selected';
		} ?>>代理商(reseller)</option>
											<option value="独服/VPS"<?php if ($cp['类型'] == '独服/VPS') {
			echo ' selected';
		} ?>>独服/VPS</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>产品分组</td>
									<td>
										<select class="form-control" name="分类名称">
<?php foreach ($OSWAP_cfb5599d7e13ea288004634c9becdefe as $OSWAP_15e32d72880445885a98273b3507f905) { ?>
											<option value="<?php echo $OSWAP_15e32d72880445885a98273b3507f905['id'] ?>"<?php if ($cp['分类id'] == $OSWAP_15e32d72880445885a98273b3507f905['id']) {
				echo ' selected';
			} ?>><?php echo $OSWAP_15e32d72880445885a98273b3507f905['分类名称'] ?></option>
<?php
		} ?>
										</select>
										必须要先创建一个产品分组,否则产品将无法显示
									</td>
								</tr>
								<tr>
									<td>产品名称</td>
									<td><input type="text" size="40" name="名称" value="<?php echo $cp['名称'] ?>"></td>
								</tr>
								<tr>
									<td>产品描述(HTML)</td>
									<td><textarea style="margin: 0px; width: 502px; height: 225px;" name="描述"><?php echo $cp['描述'] ?></textarea></td>
								</tr>
								<tr>
									<td>当前模版最佳效果代码描述</td>
									<td><textarea readonly style="margin: 0px; width: 502px; height: 225px;"><?php echo $tempms ?></textarea></br>为了达到模版的最佳效果,请复制模版到编辑器后更改,可达到当前模版最佳效果</td>
								</tr>
								<tr>
									<td>显示域名选项</td>
									<td><input type="checkbox" name="显示域名选项" value="开"<?php if ($cp['显示域名选项'] == '开') {
			echo ' checked';
		} ?>> 选择显示其他域名选项（如：免费域名）</td>
								</tr>
								<tr>
									<td>隐藏所有域名选项</td>
									<td><input type="checkbox" name="隐藏域名选项" value="1"<?php if ($cp['隐藏域名配置'] == '1') {
			echo ' checked';
		} ?>> 选择隐藏所有域名选项</td>
								</tr>
								<tr>
									<td>库存控制(目前默认开启)</td>
									<td><input type="checkbox" name="库存控制" value="1" checked disabled> 库存数量: <input type="text" name="库存" size="4" value="<?php echo $cp['库存'] ?>"></td>
								</tr>
								<tr>
									<td>产品排序</td>
									<td><input type="text" name="顺序" value="<?php echo $cp['顺序'] ?>" size="5"> 输入产品排列权重</td>
								</tr>
								<tr>
									<td>隐藏产品</td>
									<td><input type="checkbox" name="隐藏" value="1"<?php if ($cp['隐藏'] == '1') {
			echo ' checked';
		} ?>> 选择隐藏这个产品(用户在订购页面看不见该产品)</td>
								</tr>
								<tr>
									<td>产品下架</td>
									<td><input type="checkbox" name="下架" value="1"<?php if ($cp['下架'] == '1') {
			echo ' checked';
		} ?>> 选中后,就不能在开通这个产品但不影响已经开通的服务</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="tab-pane" id="定价">
						<table class="table table-responsive">
							<tbody>
								<tr>
									<td>周期选择</td>
									<td>
										<label onclick="$('.danzq').css('display','');$('.duozq').css('display','none');"><input type="radio" name="周期类型" value="1"<?php if (!is_array($cp['周期'])) {
			echo ' checked';
		} ?>>单周期(旧)</label>
									</td>
									<td>
										<label onclick="$('.danzq').css('display','none');$('.duozq').css('display','');"><input type="radio" name="周期类型" value="2"<?php if (is_array($cp['周期'])) {
			echo ' checked';
		} ?>>多周期(新)</label>
									</td>
								</tr>
							</tbody>
						</table>
						<table class="table table-responsive">
							<tbody>
								<tr class="danzq" <?php if (is_array($cp['周期'])) { ?>style="display:none;"<?php
		} ?>>
									<td>付款类型</td>
									<td><label><input type="radio" name="付款类型" value="免费"<?php if ($cp['价格'] == '免费') {
			echo ' checked';
		} ?>></label> 免费</br>免费的话,为了保证服务不被滥用会按照周期让用户进行手动续期，</br>周期为日则为30天一延迟,周期为月则为一个月一延迟,周期为年则为一年一延迟</br>一次性周期不受时间影响</td>
								</tr>
								<tr class="danzq" <?php if (is_array($cp['周期'])) { ?>style="display:none;"<?php
		} ?>>
									<td></td>
									<td><label><input type="radio" name="付款类型" value="循环"<?php if ($cp['价格'] != '免费') {
			echo ' checked';
		} ?>></label> 循环 循环付款为按照周期来付款,上面填写的价格为周期的单位</br>一次性周期仅循环一次</td>
								</tr>
								<tr class="danzq" <?php if (is_array($cp['周期'])) { ?>style="display:none;"<?php
		} ?>>
									<td>付款周期</td>
									<td>
										<label><input type="radio" name="周期" value="日付"<?php if ($cp['周期'] == '日付') {
			echo ' checked';
		} ?><?php if (is_array($cp['周期'])) {
			echo ' checked';
		} ?>> 日付</label>
										<label><input type="radio" name="周期" value="月付"<?php if ($cp['周期'] == '月付') {
			echo ' checked';
		} ?>> 月付</label>
										<label><input type="radio" name="周期" value="年付"<?php if ($cp['周期'] == '年付') {
			echo ' checked';
		} ?>> 年付</label>
										<label><input type="radio" name="周期" value="一次性"<?php if ($cp['周期'] == '一次性') {
			echo ' checked';
		} ?>> 一次性</label>
									</td>
								</tr>
								<tr class="danzq" <?php if (is_array($cp['周期'])) { ?>style="display:none;"<?php
		} ?>>
									<td>周期价格</td>
									<td>
										<input type="text" name="价格" value="<?php echo $cp['价格'] ?>">
									</td>
								</tr>
							</tbody>
						</table>
						<div class="col-md-12 duozq" <?php if (!is_array($cp['周期'])) { ?>style="display:none;"<?php
		} ?>>
							<div class="panel panel-info">
								<div class="panel-heading" onclick="addduozq()" style="cursor:pointer">
									<h3 class="panel-title"><span class="panel-collapse"><i class="fa fa-plus"></i></span> 添加新周期 (不填写名称为删除周期)</h3>
								</div>
								<table class="table">
									<thead>
										<tr>
											<th>周期名称</th>
											<th>周期时间</th>
											<th>周期价格</th>
											<th>接口备注</th>
											<th>启用周期</th>
											<th>自动开通</th>
											<th>允许用本周期续费</th>
										</tr>
									</thead>
									<tbody class="duolb">
									<?php $ai = 0;
		foreach (is_array($cp['周期']) ? $cp['周期'] : array() as $OSWAP_51d4cad9672e6605c99e0c3d678f456e) { ?>
										<tr>
											<td><input type="text" class="form-control" name="周期名称[<?php echo $ai; ?>]" value="<?php echo $OSWAP_51d4cad9672e6605c99e0c3d678f456e['名称']; ?>"></td>
											<td><input type="text" class="form-control" name="周期时间[<?php echo $ai; ?>]" value="<?php echo $OSWAP_51d4cad9672e6605c99e0c3d678f456e['时间']; ?>" style="width:80px;"></td>
											<td><input type="text" class="form-control" name="周期价格[<?php echo $ai; ?>]" value="<?php echo $OSWAP_51d4cad9672e6605c99e0c3d678f456e['价格']; ?>" style="width:80px;"></td>
											<td><input type="text" class="form-control" name="周期备注[<?php echo $ai; ?>]" value="<?php echo $OSWAP_51d4cad9672e6605c99e0c3d678f456e['介绍']; ?>"></td>
											<td><label><input type="checkbox" name="周期启用[<?php echo $ai; ?>]" value="1"<?php if ($OSWAP_51d4cad9672e6605c99e0c3d678f456e['启用']) {
				echo ' checked';
			} ?>></label></td>
											<td><label><input type="checkbox" name="周期自动[<?php echo $ai; ?>]" value="1"<?php if ($OSWAP_51d4cad9672e6605c99e0c3d678f456e['自动']) {
				echo ' checked';
			} ?>></label></td>
											<td><label><input type="checkbox" name="周期续费[<?php echo $ai; ?>]" value="1"<?php if ($OSWAP_51d4cad9672e6605c99e0c3d678f456e['续费']) {
				echo ' checked';
			} ?>></label></td>
										</tr>
									<?php $ai++;
		} ?>
									</tbody>
								</table>
							</div>
						</div>
						<script>
							ai=<?php echo $ai; ?>;
							function addduozq(){
								$('.duolb').append('<tr><td><input type="text" class="form-control" name="周期名称['+ai+']"></td><td><input type="text" class="form-control" name="周期时间['+ai+']" style="width:80px;"></td><td><input type="text" class="form-control" name="周期价格['+ai+']" style="width:80px;"></td><td><input type="text" class="form-control" name="周期备注['+ai+']"></td><td><label><input type="checkbox" name="周期启用['+ai+']" value="1"></label></td><td><label><input type="checkbox" name="周期自动['+ai+']" value="1"></label></td><td><label><input type="checkbox" name="周期续费['+ai+']" value="1"></label></td></tr>');ai++;
							}
						</script>
						<table class="table table-responsive">
							<tbody>
								<tr>
									<td>禁止续费</td>
									<td><input type="checkbox" name="禁止续费" value="1"<?php if ($cp['禁止续费'] == '1') {
			echo ' checked';
		} ?>> 勾选后将禁止用户进行续费操作</td>
								</tr>
								<tr>
									<td>仅允许一个</td>
									<td><input type="checkbox" name="只能买一次" value="1"<?php if ($cp['只能买一次'] == '1') {
			echo ' checked';
		} ?>> 勾选后,仅允许用户有一个激活或者暂停中或等待付款的这个服务</td>
								</tr>
								<tr>
									<td>允许数量</td>
									<td><input type="text" name="允许数量" value="<?php echo $cp['允许数量'] ?>"> 这个产品最多一个用户可以开通多少个,如果超过将会禁止开通</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="tab-pane" id="接口设置">
						<table class="table table-responsive">
							<tbody>
								<tr>
									<td>接口名称</td>
									<td>
										<div class="col-md-6">
										<select class="form-control" name="面板类型">
<?php foreach ($OSWAP_7e37a3de8a957f9a88db32d7e6529935 as $OSWAP_2b274b1611c149c99f706cb822116d2e) { ?>
											<option value="<?php echo $OSWAP_2b274b1611c149c99f706cb822116d2e ?>"<?php if ($cp['面板类型'] == $OSWAP_2b274b1611c149c99f706cb822116d2e) {
				echo ' selected';
			} ?>><?php echo $OSWAP_2b274b1611c149c99f706cb822116d2e ?></option>
<?php
		} ?>
										</select>
										</div>
										<a href="javascript:void(0)" onclick="$.post('/index.php/Admin/product_detailed_form/<?php echo $cp['id'] ?>/',$('#cpform').serialize(),function(data){if(data=='ok') location.reload(); else swap_alert('error','修改失败',data);});" class="btn btn-success">更改接口</a>
										</br>更改接口会导致以前的服务器配置被清除,请谨慎操作!!
									</td>
								</tr>
<?php if ($cp['面板类型'] != '') { ?>
								<tr>
									<td>服务器</td>
									<td>
										<select class="form-control" name="服务器">
										<option value="">未选择服务器</option>
<?php foreach ($OSWAP_00da90b7d02924d66de6a6b2908901b7 as $OSWAP_2e4833d679db4c6ee2bff27be88d8f24) { ?>
											<option value="<?php echo $OSWAP_2e4833d679db4c6ee2bff27be88d8f24['id'] ?>"<?php if ($OSWAP_2e4833d679db4c6ee2bff27be88d8f24['id'] == $cp['服务器组']) {
					echo ' selected';
				} ?>><?php echo $OSWAP_2e4833d679db4c6ee2bff27be88d8f24['名称'] ?></option>
<?php
			} ?>
										</select>
									</td>
								</tr>
<?php
		} ?>
							</tbody>
						</table>
<?php if ($OSWAP_7e37a3de8a957f9a88db32d7e6529935 != '') { ?>
						<table class="table table-responsive">
							<tbody>
<?php $confignum = 1; ?>
<?php foreach ($OSWAP_9cfdc1ef42cc9f0e90dfd3ff5262c258 as $OSWAP_0d07de59261cc2c9023b194184c575fb => $OSWAP_f342c100ea52a24e72fb42a431b50ef9) { ?>
<?php $configval = '配置选项' . $confignum ?>
<?php if ($OSWAP_f342c100ea52a24e72fb42a431b50ef9['Type'] == 'yesno') { ?>
								<tr>
									<td><?php echo $OSWAP_0d07de59261cc2c9023b194184c575fb ?></td>
									<td><input type="checkbox" name="<?php echo '配置选项' . $confignum ?>" value="on"<?php if ($cp[$configval] == 'on') {
						echo ' checked';
					}
					if ($cp[$configval] == '1') {
						echo ' checked';
					} ?>><?php if (isset($OSWAP_f342c100ea52a24e72fb42a431b50ef9['Description'])) {
						echo $OSWAP_f342c100ea52a24e72fb42a431b50ef9['Description'];
					} ?></td>
								</tr>
<?php
				} else if ($OSWAP_f342c100ea52a24e72fb42a431b50ef9['Type'] == 'text') { ?>
								<tr>
									<td><?php echo $OSWAP_0d07de59261cc2c9023b194184c575fb ?></td>
									<td><input type="text" name="<?php echo '配置选项' . $confignum ?>" value="<?php echo $cp[$configval] ?>" <?php if (isset($OSWAP_f342c100ea52a24e72fb42a431b50ef9['Size'])) {
						echo 'size="' . $OSWAP_f342c100ea52a24e72fb42a431b50ef9['Size'] . '"';
					} ?>><?php if (isset($OSWAP_f342c100ea52a24e72fb42a431b50ef9['Description'])) {
						echo $OSWAP_f342c100ea52a24e72fb42a431b50ef9['Description'];
					} ?></td>
								</tr>
<?php
				} else if ($OSWAP_f342c100ea52a24e72fb42a431b50ef9['Type'] == 'dropdown') { ?>
<?php $OSWAP_66189eb7098b09b18bfaa8454c4e10d2 = explode(',', $OSWAP_f342c100ea52a24e72fb42a431b50ef9['Options']); ?>
								<tr>
									<td><?php echo $OSWAP_0d07de59261cc2c9023b194184c575fb ?></td>
									<td><select class="form-control" name="<?php echo '配置选项' . $confignum ?>">
<?php foreach ($OSWAP_66189eb7098b09b18bfaa8454c4e10d2 as $OSWAP_1249ae47fbe03bb889472d54f80ab5e0) { ?>
									<option value="<?php echo $OSWAP_1249ae47fbe03bb889472d54f80ab5e0 ?>"<?php if ($cp[$configval] == $OSWAP_1249ae47fbe03bb889472d54f80ab5e0) {
							echo ' selected';
						} ?>><?php echo $OSWAP_1249ae47fbe03bb889472d54f80ab5e0 ?></option>
<?php
					} ?>
									</select><?php if (isset($OSWAP_f342c100ea52a24e72fb42a431b50ef9['Description'])) {
						echo $OSWAP_f342c100ea52a24e72fb42a431b50ef9['Description'];
					} ?></td>
								</tr>
<?php
				} ?>
<?php $confignum++; ?>
<?php
			} ?>
							</tbody>
						</table>
<?php
		} ?>
						<table class="table table-responsive">
							<tbody>
								<tr>
									<td>自动开通</td>
									<td><label><input type="radio" name="开通方式" value="自动开通"<?php if ($cp['开通方式'] == '自动开通') {
			echo ' checked';
		} ?>></label>付款后立刻尝试自动开通,但是如果开通失败会变成等待审核</td>
								</tr>
								<tr>
									<td>审核开通</td>
									<td><label><input type="radio" name="开通方式" value="审核开通"<?php if ($cp['开通方式'] == '审核开通') {
			echo ' checked';
		} ?>></label>付款后不会进行自动开通,需要进行手动审核</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="tab-pane" id="自定义配置">
						<table class="table table-responsive">
							<tbody>
								<tr>
									<td></td>
									<td>如果为VPS请记得创建 (操作系统) 自定义配置</td>
								</tr>
								<tr>
									<td>可选自定义</td>
									<td>
										<select multiple="multiple" name="自定义配置[]" class="form-control multi-select">
<?php foreach ($OSWAP_c97540fe0b3c5b2a38ea210c2e542b97gs as $OSWAP_c97540fe0b3c5b2a38ea210c2e542b97g) { ?>
											<option value="<?php echo $OSWAP_c97540fe0b3c5b2a38ea210c2e542b97g['id'] ?>"<?php if (in_array($OSWAP_c97540fe0b3c5b2a38ea210c2e542b97g['id'], $OSWAP_51ae262c0a4f0df7adcda1559314f441)) {
				echo ' selected';
			} ?>><?php echo $OSWAP_c97540fe0b3c5b2a38ea210c2e542b97g['名称'] ?></option>
<?php
		} ?>
										</select>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="tab-pane" id="升级降级">
						<table class="table table-responsive">
							<tbody>
								<tr>
									<td></td>
									<td>请先选择好服务器后,并且保存一次后,再次编辑即可选择升级包</td>
								</tr>
								<tr>
									<td>可选升级包</td>
									<td>
										<select multiple="multiple" name="升级包[]" class="form-control multi-select">
<?php foreach ($OSWAP_ac02ca4106bd6fd5986cd57c5ddb9a63 as $OSWAP_e0c41d389ac38304214463658a59ef21) { ?>
											<option value="<?php echo $OSWAP_e0c41d389ac38304214463658a59ef21['id'] ?>"<?php if (in_array($OSWAP_e0c41d389ac38304214463658a59ef21['id'], $cp['升级包'])) {
				echo ' selected';
			} ?>><?php echo $OSWAP_e0c41d389ac38304214463658a59ef21['名称'] ?></option>
<?php
		} ?>
										</select>
									</td>
								</tr>
								<tr>
									<td>允许用户升级</td>
									<td><input type="checkbox" name="开启升级选项" value="1"<?php if ($cp['开启升级选项'] == '1') {
			echo ' checked';
		} ?>> 勾选后开启升降级功能</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="tab-pane" id="免费域名">
						<table class="table table-responsive">
							<tbody>
								<tr>
									<td>可选免费域名</td>
									<td><input type="text" name="可选免费域名" value="<?php echo $cp['免费域名'] ?>" id="tagsinput" data-role="tagsinput" /></br>需要开启显示域名选项,输入域名后回车键确认,可输入多个</br>需要把域名先进行泛解析到服务器,后由系统自动分配</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="tab-pane" id="其他设置">
						<table class="table table-responsive">
							<tbody>
								<tr>
									<td>允许用户自己停止</td>
									<td><input type="checkbox" name="允许用户自己停止" value="1"<?php if ($cp['允许用户自己停止'] == '1') {
			echo ' checked';
		} ?>> 开启后将允许用户自己停止服务,但不会进行退款</td>
								</tr>
								<tr>
									<td>子域名设置(目前不可用VPS之类要用的,现在没有用)</td>
									<td><input type="text" name="子域名" value="<?php echo $cp['子域名'] ?>"></br>按这样的格式输入域名 .yoursubdomain1.com,.yoursubdomain2.com （不同子域名后缀用半角逗号分隔）</td>
								</tr>
								<tr>
									<td>允许超量</td>
									<td><input type="checkbox" name="允许超量" value="1"<?php if ($cl[0] == '1') {
			echo ' checked';
		} ?>> 开启后将允许用户超量</td>
								</tr>
								<tr>
									<td>软限制</td>
									<td>磁盘使用 <input type="text" name="超量空间限制" value="<?php echo $cp['超量空间限制'] ?>" size="10"> 
									<select name="磁盘单位">
									<option value="MB"<?php if ($cl[1] == 'MB') {
			echo ' selected';
		} ?>>MB</option>
									<option value="GB"<?php if ($cl[1] == 'GB') {
			echo ' selected';
		} ?>>GB</option>
									<option value="TB"<?php if ($cl[1] == 'TB') {
			echo ' selected';
		} ?>>TB</option>
									</select> 带宽 
									<input type="text" name="超量流量限制" value="<?php echo $cp['超量流量限制'] ?>" size="10"> 
									<select name="带宽单位">
									<option value="MB"<?php if ($cl[2] == 'MB') {
			echo ' selected';
		} ?>>MB</option>
									<option value="GB"<?php if ($cl[2] == 'GB') {
			echo ' selected';
		} ?>>GB</option>
									<option value="TB"<?php if ($cl[2] == 'TB') {
			echo ' selected';
		} ?>>TB</option>
									</select>
									</td>
								</tr>
								<tr>
									<td>超量费用</td>
									<td>磁盘使用 <input type="text" name="超量空间价格" value="<?php echo $cp['超量空间价格'] ?>" size="10"> 带宽 <input type="text" name="超量流量价格" value="<?php echo $cp['超量流量价格'] ?>" size="10"> 暂不可用</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<a href="javascript:void(0)" onclick="$.post('/index.php/Admin/product_detailed_form/<?php echo $cp['id'] ?>/',$('#cpform').serialize(),function(data){if(data=='ok') location.reload(); else swap_alert('error','修改失败',data);});" class="btn btn-success">保存产品</a>
						</div>
					</div>
				</div></form>
                                        </div>
										</div>
                                    </div>
								</div>
<?php
		echo "</div>";
		echo "</div></div></div>";
		AdminT::page_footer();
		echo "</div></main>";
		AdminT::cd_nav();
		AdminT::pjs();
		echo "<script src=\"/admin_assets/plugins/waypoints/jquery.waypoints.min.js\"></script><script src=\"/admin_assets/plugins/jquery-counterup/jquery.counterup.min.js\"></script><script src=\"/admin_assets/plugins/toastr/toastr.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.time.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.symbol.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.resize.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.tooltip.min.js\"></script><script src=\"/admin_assets/plugins/curvedlines/curvedLines.js\"></script><script src=\"/admin_assets/plugins/metrojs/MetroJs.min.js\"></script><script src=\"/admin_assets/plugins/morris/raphael.min.js\"></script><script src=\"/admin_assets/plugins/morris/morris.min.js\"></script><script src=\"/admin_assets/js/modern.min.js\"></script>";
		echo "<script src=\"/admin_assets/plugins/datatables/js/jquery.dataTables.min.js\"></script><script src=\"/admin_assets/plugins/multi-select/js/jquery.multi-select.js\"></script><script src=\"/admin_assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js\"></script>";
		echo "<script>var extable;\$(document).ready(function() {\$('.multi-select').each(function(){\$(this).multiSelect();});extable=\$('#example').DataTable({\"language\":{\"url\":\"https://cdn.datatables.net/plug-ins/e9421181788/i18n/Chinese.json\"}});});</script>";
		echo "</body></html>";
	}
	function product_detailed_form() {
		need_admin();
		$id = mac_url_get(1);
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['类型'] = _POST('类型');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['分类名称'] = _POST('分类名称');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['名称'] = _POST('名称');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['描述'] = _POST('描述');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['产品开通邮件'] = _POST('产品开通邮件');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['显示域名选项'] = _POST('显示域名选项');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['库存控制'] = _POST('库存控制');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['库存'] = _POST('库存');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['顺序'] = _POST('顺序');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['隐藏'] = _POST('隐藏');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['下架'] = _POST('下架');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['付款类型'] = _POST('付款类型');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['价格'] = _POST('价格');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['周期'] = _POST('周期');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['周期类型'] = _POST('周期类型');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['周期名称'] = _POST('周期名称') ? _POST('周期名称') : array();
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['周期时间'] = _POST('周期时间');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['周期价格'] = _POST('周期价格');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['周期备注'] = _POST('周期备注');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['周期启用'] = _POST('周期启用');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['周期自动'] = _POST('周期自动');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['周期续费'] = _POST('周期续费');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['只能买一次'] = _POST('只能买一次');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['试用时间'] = _POST('试用时间');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['面板类型'] = _POST('面板类型');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['服务器'] = _POST('服务器');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['配置选项1'] = _POST('配置选项1');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['配置选项2'] = _POST('配置选项2');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['配置选项3'] = _POST('配置选项3');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['配置选项4'] = _POST('配置选项4');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['配置选项5'] = _POST('配置选项5');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['配置选项6'] = _POST('配置选项6');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['配置选项7'] = _POST('配置选项7');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['配置选项8'] = _POST('配置选项8');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['配置选项9'] = _POST('配置选项9');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['配置选项10'] = _POST('配置选项10');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['配置选项11'] = _POST('配置选项11');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['配置选项12'] = _POST('配置选项12');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['配置选项13'] = _POST('配置选项13');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['配置选项14'] = _POST('配置选项14');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['配置选项15'] = _POST('配置选项15');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['配置选项16'] = _POST('配置选项16');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['配置选项17'] = _POST('配置选项17');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['配置选项18'] = _POST('配置选项18');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['配置选项19'] = _POST('配置选项19');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['配置选项20'] = _POST('配置选项20');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['配置选项21'] = _POST('配置选项21');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['配置选项22'] = _POST('配置选项22');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['配置选项23'] = _POST('配置选项23');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['配置选项24'] = _POST('配置选项24');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['配置选项25'] = _POST('配置选项25');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['配置选项26'] = _POST('配置选项26');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['配置选项27'] = _POST('配置选项27');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['配置选项28'] = _POST('配置选项28');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['配置选项29'] = _POST('配置选项29');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['配置选项30'] = _POST('配置选项30');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['开通方式'] = _POST('开通方式');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['升级包'] = json_encode(_POST('升级包'));
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['开启升级选项'] = _POST('开启升级选项');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['可选免费域名'] = _POST('可选免费域名');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['允许超量'] = _POST('允许超量');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['超量空间限制'] = _POST('超量空间限制');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['超量流量限制'] = _POST('超量流量限制');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['磁盘单位'] = _POST('磁盘单位');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['带宽单位'] = _POST('带宽单位');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['超量空间价格'] = _POST('超量空间价格');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['超量流量价格'] = _POST('超量流量价格');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['允许数量'] = _POST('允许数量');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['子域名'] = _POST('子域名');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['允许用户自己停止'] = _POST('允许用户自己停止');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['隐藏域名选项'] = _POST('隐藏域名选项');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['自定义配置'] = _POST('自定义配置');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['禁止续费'] = _POST('禁止续费');
		$OSWAP_368b8283c40974a863c0fcad4d532834 = _POST('自定义配置') ? _POST('自定义配置') : array();
		SMACSQL()->select('产品', '*', "id='$id'");
		if (SMACSQL()->db_num_rows() == 0) die('产品不存在');
		$cp = SMACSQL()->fetch_array();
		if ($cp['面板类型'] != $OSWAP_39acd516275569f78d4b51d4c5d2244c['面板类型']) SMACSQL()->update('产品', "服务器组='',配置选项1='',配置选项2='',配置选项3='',配置选项4='',配置选项5='',配置选项6='',配置选项7='',配置选项8='',配置选项9='',配置选项10='',配置选项11='',配置选项12='',配置选项13='',配置选项14='',配置选项15='',配置选项16='',配置选项17='',配置选项18='',配置选项19='',配置选项20='',配置选项21='',配置选项22='',配置选项23='',配置选项24='',配置选项25='',配置选项26='',配置选项27='',配置选项28='',配置选项29='',配置选项30=''", "id='$id'");
		if ($OSWAP_39acd516275569f78d4b51d4c5d2244c['付款类型'] == '免费') $OSWAP_39acd516275569f78d4b51d4c5d2244c['价格'] = '免费';
		$OSWAP_82bdfee4b92084c05ac3b384dd79c752 = explode(',', $OSWAP_39acd516275569f78d4b51d4c5d2244c['可选免费域名']);
		$OSWAP_82bdfee4b92084c05ac3b384dd79c752s = json_encode($OSWAP_82bdfee4b92084c05ac3b384dd79c752);
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['允许超量'] = ($OSWAP_39acd516275569f78d4b51d4c5d2244c['允许超量'] ? "1," . $OSWAP_39acd516275569f78d4b51d4c5d2244c['磁盘单位'] . "," . $OSWAP_39acd516275569f78d4b51d4c5d2244c['带宽单位'] : "");
		if ($OSWAP_39acd516275569f78d4b51d4c5d2244c['周期类型'] == '2') {
			$temp = array();
			foreach ($OSWAP_39acd516275569f78d4b51d4c5d2244c['周期名称'] as $OSWAP_6291cc79354613208317e7b10b238055 => $OSWAP_0d07de59261cc2c9023b194184c575fb) {
				if (!empty($OSWAP_0d07de59261cc2c9023b194184c575fb)) $temp[] = array('名称' => $OSWAP_0d07de59261cc2c9023b194184c575fb, '时间' => $OSWAP_39acd516275569f78d4b51d4c5d2244c['周期时间'][$OSWAP_6291cc79354613208317e7b10b238055], '价格' => $OSWAP_39acd516275569f78d4b51d4c5d2244c['周期价格'][$OSWAP_6291cc79354613208317e7b10b238055], '介绍' => $OSWAP_39acd516275569f78d4b51d4c5d2244c['周期备注'][$OSWAP_6291cc79354613208317e7b10b238055], '启用' => $OSWAP_39acd516275569f78d4b51d4c5d2244c['周期启用'][$OSWAP_6291cc79354613208317e7b10b238055] ? true : false, '自动' => $OSWAP_39acd516275569f78d4b51d4c5d2244c['周期自动'][$OSWAP_6291cc79354613208317e7b10b238055] ? true : false, '续费' => $OSWAP_39acd516275569f78d4b51d4c5d2244c['周期续费'][$OSWAP_6291cc79354613208317e7b10b238055] ? true : false);
			}
			$OSWAP_39acd516275569f78d4b51d4c5d2244c['周期'] = str_replace('\\', '\\\\', json_encode($temp));
		}
		SMACSQL()->update('产品', "类型='" . $OSWAP_39acd516275569f78d4b51d4c5d2244c['类型'] . "',分类id='" . $OSWAP_39acd516275569f78d4b51d4c5d2244c['分类名称'] . "',名称='" . $OSWAP_39acd516275569f78d4b51d4c5d2244c['名称'] . "',描述='" . $OSWAP_39acd516275569f78d4b51d4c5d2244c['描述'] . "',隐藏='" . $OSWAP_39acd516275569f78d4b51d4c5d2244c['隐藏'] . "',显示域名选项='" . $OSWAP_39acd516275569f78d4b51d4c5d2244c['显示域名选项'] . "',欢迎邮件='" . $OSWAP_39acd516275569f78d4b51d4c5d2244c['产品开通邮件'] . "',库存管理='" . $OSWAP_39acd516275569f78d4b51d4c5d2244c['库存控制'] . "',库存='" . $OSWAP_39acd516275569f78d4b51d4c5d2244c['库存'] . "',价格='" . $OSWAP_39acd516275569f78d4b51d4c5d2244c['价格'] . "',允许数量='" . $OSWAP_39acd516275569f78d4b51d4c5d2244c['允许数量'] . "',子域名='" . $OSWAP_39acd516275569f78d4b51d4c5d2244c['子域名'] . "',开通方式='" . $OSWAP_39acd516275569f78d4b51d4c5d2244c['开通方式'] . "',面板类型='" . $OSWAP_39acd516275569f78d4b51d4c5d2244c['面板类型'] . "',服务器组='" . $OSWAP_39acd516275569f78d4b51d4c5d2244c['服务器'] . "',配置选项1='" . $OSWAP_39acd516275569f78d4b51d4c5d2244c['配置选项1'] . "',配置选项2='" . $OSWAP_39acd516275569f78d4b51d4c5d2244c['配置选项2'] . "',配置选项3='" . $OSWAP_39acd516275569f78d4b51d4c5d2244c['配置选项3'] . "',配置选项4='" . $OSWAP_39acd516275569f78d4b51d4c5d2244c['配置选项4'] . "',配置选项5='" . $OSWAP_39acd516275569f78d4b51d4c5d2244c['配置选项5'] . "',配置选项6='" . $OSWAP_39acd516275569f78d4b51d4c5d2244c['配置选项6'] . "',配置选项7='" . $OSWAP_39acd516275569f78d4b51d4c5d2244c['配置选项7'] . "',配置选项8='" . $OSWAP_39acd516275569f78d4b51d4c5d2244c['配置选项8'] . "',配置选项9='" . $OSWAP_39acd516275569f78d4b51d4c5d2244c['配置选项9'] . "',配置选项10='" . $OSWAP_39acd516275569f78d4b51d4c5d2244c['配置选项10'] . "',配置选项11='" . $OSWAP_39acd516275569f78d4b51d4c5d2244c['配置选项11'] . "',配置选项12='" . $OSWAP_39acd516275569f78d4b51d4c5d2244c['配置选项12'] . "',配置选项13='" . $OSWAP_39acd516275569f78d4b51d4c5d2244c['配置选项13'] . "',配置选项14='" . $OSWAP_39acd516275569f78d4b51d4c5d2244c['配置选项14'] . "',配置选项15='" . $OSWAP_39acd516275569f78d4b51d4c5d2244c['配置选项15'] . "',配置选项16='" . $OSWAP_39acd516275569f78d4b51d4c5d2244c['配置选项16'] . "',配置选项17='" . $OSWAP_39acd516275569f78d4b51d4c5d2244c['配置选项17'] . "',配置选项18='" . $OSWAP_39acd516275569f78d4b51d4c5d2244c['配置选项18'] . "',配置选项19='" . $OSWAP_39acd516275569f78d4b51d4c5d2244c['配置选项19'] . "',配置选项20='" . $OSWAP_39acd516275569f78d4b51d4c5d2244c['配置选项20'] . "',配置选项21='" . $OSWAP_39acd516275569f78d4b51d4c5d2244c['配置选项21'] . "',配置选项22='" . $OSWAP_39acd516275569f78d4b51d4c5d2244c['配置选项22'] . "',配置选项23='" . $OSWAP_39acd516275569f78d4b51d4c5d2244c['配置选项23'] . "',配置选项24='" . $OSWAP_39acd516275569f78d4b51d4c5d2244c['配置选项24'] . "',配置选项25='" . $OSWAP_39acd516275569f78d4b51d4c5d2244c['配置选项25'] . "',配置选项26='" . $OSWAP_39acd516275569f78d4b51d4c5d2244c['配置选项26'] . "',配置选项27='" . $OSWAP_39acd516275569f78d4b51d4c5d2244c['配置选项27'] . "',配置选项28='" . $OSWAP_39acd516275569f78d4b51d4c5d2244c['配置选项28'] . "',配置选项29='" . $OSWAP_39acd516275569f78d4b51d4c5d2244c['配置选项29'] . "',配置选项30='" . $OSWAP_39acd516275569f78d4b51d4c5d2244c['配置选项30'] . "',免费域名='" . $OSWAP_82bdfee4b92084c05ac3b384dd79c752s . "',周期='" . $OSWAP_39acd516275569f78d4b51d4c5d2244c['周期'] . "',升级包='" . $OSWAP_39acd516275569f78d4b51d4c5d2244c['升级包'] . "',开启升级选项='" . $OSWAP_39acd516275569f78d4b51d4c5d2244c['开启升级选项'] . "',启用超量='" . $OSWAP_39acd516275569f78d4b51d4c5d2244c['允许超量'] . "',超量空间限制='" . $OSWAP_39acd516275569f78d4b51d4c5d2244c['超量空间限制'] . "',超量流量限制='" . $OSWAP_39acd516275569f78d4b51d4c5d2244c['超量流量限制'] . "',超量空间价格='" . $OSWAP_39acd516275569f78d4b51d4c5d2244c['超量空间价格'] . "',超量流量价格='" . $OSWAP_39acd516275569f78d4b51d4c5d2244c['超量流量价格'] . "',只能买一次='" . $OSWAP_39acd516275569f78d4b51d4c5d2244c['只能买一次'] . "',顺序='" . $OSWAP_39acd516275569f78d4b51d4c5d2244c['顺序'] . "',下架='" . $OSWAP_39acd516275569f78d4b51d4c5d2244c['下架'] . "',允许用户自己停止='" . $OSWAP_39acd516275569f78d4b51d4c5d2244c['允许用户自己停止'] . "',隐藏域名配置='" . $OSWAP_39acd516275569f78d4b51d4c5d2244c['隐藏域名选项'] . "',禁止续费='" . $OSWAP_39acd516275569f78d4b51d4c5d2244c['禁止续费'] . "'", "id='$id'");
		SMACSQL()->delete('产品配置连接', "产品id='" . $id . "'");
		foreach ($OSWAP_368b8283c40974a863c0fcad4d532834 as $OSWAP_51d4cad9672e6605c99e0c3d678f456e) {
			SMACSQL()->insert('产品配置连接', '组id,产品id', "'" . $OSWAP_51d4cad9672e6605c99e0c3d678f456e . "','" . $id . "'");
		}
		die('ok');
	}
	function settings() {
		need_admin();
		SMACSQL()->select('系统配置', '*', '1');
		$OSWAP_0f3b366259e2b19c1dd0ab51c3663a53 = SMACSQL()->fetch_array();
		if (empty($OSWAP_0f3b366259e2b19c1dd0ab51c3663a53['头部LOGO'])) {
			$OSWAP_0f3b366259e2b19c1dd0ab51c3663a53['网站标题s'] = '1';
			$OSWAP_0f3b366259e2b19c1dd0ab51c3663a53['网站标题2'] = '';
			$OSWAP_0f3b366259e2b19c1dd0ab51c3663a53['网站标题3'] = '';
		} else if (strstr($OSWAP_0f3b366259e2b19c1dd0ab51c3663a53['头部LOGO'], '<img src="') and strstr($OSWAP_0f3b366259e2b19c1dd0ab51c3663a53['头部LOGO'], '" />')) {
			$OSWAP_0f3b366259e2b19c1dd0ab51c3663a53['网站标题s'] = '3';
			$OSWAP_0f3b366259e2b19c1dd0ab51c3663a53['网站标题3'] = str_replace(array('<img src="', '" />'), '', $OSWAP_0f3b366259e2b19c1dd0ab51c3663a53['头部LOGO']);
			$OSWAP_0f3b366259e2b19c1dd0ab51c3663a53['网站标题2'] = '';
		} else {
			$OSWAP_0f3b366259e2b19c1dd0ab51c3663a53['网站标题s'] = '2';
			$OSWAP_0f3b366259e2b19c1dd0ab51c3663a53['网站标题2'] = $OSWAP_0f3b366259e2b19c1dd0ab51c3663a53['头部LOGO'];
			$OSWAP_0f3b366259e2b19c1dd0ab51c3663a53['网站标题3'] = '';
		}
		$langdir = File::get_dirs(SWAP_LANG);
		$langdir = $langdir['dir'];
		foreach ($langdir as $OSWAP_b69a7729e1ccb4639eb5b5295a641bad) {
			if (!strstr($OSWAP_b69a7729e1ccb4639eb5b5295a641bad, '.')) $langdirs[] = $OSWAP_b69a7729e1ccb4639eb5b5295a641bad;
		}
		$tempdir = File::get_dirs(SWAP_TEMPLATES);
		$tempdir = $tempdir['dir'];
		$tempdirs = array();
		foreach ($tempdir as $OSWAP_b69a7729e1ccb4639eb5b5295a641bad) {
			if ((!strstr($OSWAP_b69a7729e1ccb4639eb5b5295a641bad, '.')) and (!strstr($OSWAP_b69a7729e1ccb4639eb5b5295a641bad, 'error'))) $tempdirs[] = $OSWAP_b69a7729e1ccb4639eb5b5295a641bad;
		}
		$templatedirs = $tempdirs;
		$temparrays = require (SWAP_CONFIGS . 'template.php');
		$OSWAP_650e5bdc62c6f01b8c370ff386e95dc8 = $temparrays['template'];
		AdminT::header('网站设置', "<link href=\"/admin_assets/plugins/datatables/css/jquery.datatables.min.css\" rel=\"stylesheet\" type=\"text/css\"/><link href=\"/admin_assets/plugins/datatables/css/jquery.datatables_themeroller.css\" rel=\"stylesheet\" type=\"text/css\"/>");
		AdminT::search();
		echo "<main class=\"page-content content-wrap\">";
		AdminT::navbar();
		AdminT::sidebar();
		echo "<div class=\"page-inner\">";
		AdminT::title('网站设置', '<li>网站设置</li>');
		echo "<div id=\"main-wrapper\" class=\"container\"><div class=\"row\">";
		echo "<div class=\"col-md-12\">";
		echo "<div class=\"panel panel-white\"><div class=\"panel-body\">"; ?>
				<form id="settingfrom" role="form" class="form-horizontal form-groups-bordered">
					<div class="form-group">
						<label class="col-sm-3 control-label">网站名称*</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="网站名称" value="<?php echo $OSWAP_0f3b366259e2b19c1dd0ab51c3663a53['网站名称'] ?>">网站的名称,它将出现在整个网站
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">网站标题</label>
						<div class="col-sm-5">
							<div>
								<label>
									<label><input type="radio" name="网站标题s" value="1"<?php if ($OSWAP_0f3b366259e2b19c1dd0ab51c3663a53['网站标题s'] == '1') {
			echo ' checked';
		} ?>></label>和网站名称一样
								</label>
							</div>
							<div>
								<label>
									<label><input type="radio" name="网站标题s" value="2"<?php if ($OSWAP_0f3b366259e2b19c1dd0ab51c3663a53['网站标题s'] == '2') {
			echo ' checked';
		} ?>></label>自定义内容<input type="text" class="form-control" name="网站标题2" value="<?php echo $OSWAP_0f3b366259e2b19c1dd0ab51c3663a53['网站标题2'] ?>">
								</label>
							</div>
							<div>
								<label>
									<label><input type="radio" name="网站标题s" value="3"<?php if ($OSWAP_0f3b366259e2b19c1dd0ab51c3663a53['网站标题s'] == '3') {
			echo ' checked';
		} ?>></label>LOGO地址<input type="text" class="form-control" name="网站标题3" value="<?php echo $OSWAP_0f3b366259e2b19c1dd0ab51c3663a53['网站标题3'] ?>">
								</label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">模板*</label>
						<div class="col-sm-5">
							<select class="form-control" name="模板">
<?php foreach ($templatedirs as $templatedirss) { ?>
								<option value="<?php echo $templatedirss ?>"<?php if ($templatedirss == $OSWAP_650e5bdc62c6f01b8c370ff386e95dc8) {
				echo ' selected="selected"';
			} ?>><?php echo $templatedirss ?></option>
<?php
		} ?>
							</select>你想使用的模板,你需要先安装他
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-3 control-label">开启模版缓存[推荐]</div>
						<div class="col-sm-5">
							<input name="模版缓存" value="1" type="checkbox"<?php if ($temparrays['caching']) {
			echo ' checked';
		} ?>>勾选后开启模版缓存功能,大幅提升系统处理速度
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-3 control-label">模版缓存时间</div>
						<div class="col-sm-5">
							<input name="模版缓存时间" value="<?php echo $temparrays['cache_lifetime'] ?>" type="text">秒
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-3 control-label">开启模版强制重编译[开发功能]</div>
						<div class="col-sm-5">
							<input name="模版重编译" value="1" type="checkbox"<?php if ($temparrays['force_compile']) {
			echo ' checked';
		} ?>>勾选后将会不采用缓存每次重新编译模版,追踪模版编译用,用于开发功能
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-3 control-label">开启模版调试模式[开发功能]</div>
						<div class="col-sm-5">
							<input name="模版调试" value="1" type="checkbox"<?php if ($temparrays['debugging']) {
			echo ' checked';
		} ?>>勾选后开启模版调试界面和窗口,方便进行模版问题查找,用于开发功能
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-3 control-label">优先使用本地静态文件</div>
						<div class="col-sm-5">
							<input name="使用本地静态" value="1" type="checkbox"<?php if (plug_eva('系统配置', '使用本地静态')) {
			echo ' checked';
		} ?>>勾选后请确定本地安装了模版的静态文件
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-3 control-label">开启SSL</div>
						<div class="col-sm-5">
							<input name="开启SSL" value="1" type="checkbox"<?php if ($OSWAP_0f3b366259e2b19c1dd0ab51c3663a53['开启SSL'] == '1') {
			echo ' checked';
		} ?>>勾选后,将会自动将HTTP访问转到HTTPS
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-3 control-label">伪静态开关</div>
						<div class="col-sm-5">
							<input name="伪静态开关" value="1" type="checkbox"<?php if ($OSWAP_0f3b366259e2b19c1dd0ab51c3663a53['伪静态开关'] == '1') {
			echo ' checked';
		} ?>>开启伪静态开关后,将会隐藏URL中的INDEX.PHP,但需要空间支持
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-3 control-label">网站状态</div>
						<div class="col-sm-5">
							<input name="网站状态" value="1" type="checkbox"<?php if ($OSWAP_0f3b366259e2b19c1dd0ab51c3663a53['网站状态'] == '1') {
			echo ' checked';
		} ?>>选择启用 - 启用时，防止客户区访问
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">维护消息*</label>
						<div class="col-sm-5">
							<textarea name="维护消息" class="form-control"><?php echo $OSWAP_0f3b366259e2b19c1dd0ab51c3663a53['维护消息'] ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">维护模式重定向URL</label>
						<div class="col-sm-5">
							<input type="text" name="维护重定向" value="<?php echo $OSWAP_0f3b366259e2b19c1dd0ab51c3663a53['维护重定向'] ?>" class="form-control">如果指定，重定向客户区的游客到这个网址时维修模式被启用
						</div>
					</div>
                    <div class="form-group">
						<label class="col-sm-3 control-label">默认国家*</label>
						<div class="col-sm-5">
							<select class="form-control" name="默认国家">
<?php $OSWAP_02a174390636458eba5900a1013ff7bd = $this->country();
		foreach ($OSWAP_02a174390636458eba5900a1013ff7bd as $OSWAP_d23519cda7160577a488cef431673b7a) { ?>
								<option value="<?php echo $OSWAP_d23519cda7160577a488cef431673b7a ?>"<?php if ($OSWAP_0f3b366259e2b19c1dd0ab51c3663a53['默认国家'] == $OSWAP_d23519cda7160577a488cef431673b7a) {
				echo ' selected="selected"';
			} ?>><?php echo $OSWAP_d23519cda7160577a488cef431673b7a ?></option>
<?php
		} ?>
							</select>
						</div>
					</div>
                    <div class="form-group">
						<label class="col-sm-3 control-label">默认语言*</label>
						<div class="col-sm-5">
							<select class="form-control" name="默认语言">
<?php foreach ($langdirs as $langdir) { ?>
								<option value="<?php echo $langdir ?>"<?php if ($OSWAP_0f3b366259e2b19c1dd0ab51c3663a53['默认语言'] == $langdir) {
				echo ' selected="selected"';
			} ?>><?php echo $langdir ?></option>
<?php
		} ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">启用服务条款验收</label>
						<div class="col-sm-5">
							<input name="启动服务条款" value="1" type="checkbox"<?php if ($OSWAP_0f3b366259e2b19c1dd0ab51c3663a53['启动服务条款'] == '1') {
			echo ' checked';
		} ?>>如果打勾，客户必须同意服务条款(暂不可用)
						</div>
					</div>
                    <div class="form-group">
						<label class="col-sm-3 control-label">服务URL条款</label>
						<div class="col-sm-5">
							<input name="服务条款URL" type="text" class="form-control" value="<?php echo $OSWAP_0f3b366259e2b19c1dd0ab51c3663a53['服务条款URL'] ?>">在您的网站的网址为您服务网页条款（如http://www.yourdomain.com/tos.html）
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">启用随机用户名</label>
						<div class="col-sm-5">
							<input name="随机主机用户名" value="1" type="checkbox"<?php if ($OSWAP_0f3b366259e2b19c1dd0ab51c3663a53['随机主机用户名'] == '1') {
			echo ' checked';
		} ?>>选择此框生成随机用户名的服务，而不是使用域名生成
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">关闭GZIP压缩</label>
						<div class="col-sm-5">
							<input name="关闭GZIP" value="1" type="checkbox"<?php if ($OSWAP_0f3b366259e2b19c1dd0ab51c3663a53['关闭GZIP'] == '1') {
			echo ' checked';
		} ?>>关闭GZIP压缩,可以减少服务器的负载,加快小服务器的处理速度,但是会加大页面大小
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">交易币名称*</label>
						<div class="col-sm-5">
							<input name="交易币名称" type="text" class="form-control" placeholder="交易币名称" value="<?php echo $OSWAP_0f3b366259e2b19c1dd0ab51c3663a53['交易币名称'] ?>">网站的交易币的名称
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">底部版权*</label>
						<div class="col-sm-5">
							<input name="底部版权" type="text" class="form-control" placeholder="底部版权" value="<?php echo $OSWAP_0f3b366259e2b19c1dd0ab51c3663a53['底部版权'] ?>">© Copyright xxx 2014
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<a href="javascript:void(0)" onclick="$.post('/index.php/Admin/setting_form/',$('#settingfrom').serialize(),function(data){if(data=='ok') swap_alert('success','修改成功','修改网站成功'); else swap_alert('error','修改失败',data);});" class="btn btn-default">保存更改</a>
						</div>
					</div>
				</form>
<?php
		echo "</div></div>";
		echo "</div>";
		echo "</div></div></div>";
		AdminT::page_footer();
		echo "</div></main>";
		AdminT::cd_nav();
		AdminT::pjs();
		echo "<script src=\"/admin_assets/plugins/waypoints/jquery.waypoints.min.js\"></script><script src=\"/admin_assets/plugins/jquery-counterup/jquery.counterup.min.js\"></script><script src=\"/admin_assets/plugins/toastr/toastr.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.time.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.symbol.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.resize.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.tooltip.min.js\"></script><script src=\"/admin_assets/plugins/curvedlines/curvedLines.js\"></script><script src=\"/admin_assets/plugins/metrojs/MetroJs.min.js\"></script><script src=\"/admin_assets/plugins/morris/raphael.min.js\"></script><script src=\"/admin_assets/plugins/morris/morris.min.js\"></script><script src=\"/admin_assets/js/modern.min.js\"></script>";
		echo "<script src=\"/admin_assets/plugins/datatables/js/jquery.dataTables.min.js\"></script>";
		echo "<script>var extable;\$(document).ready(function() {extable=\$('#example').DataTable({\"language\":{\"url\":\"https://cdn.datatables.net/plug-ins/e9421181788/i18n/Chinese.json\"}});});</script>";
		echo "</body></html>";
	}
	function setting_form() {
		need_admin();
		$OSWAP_0d07de59261cc2c9023b194184c575fb = _POST('网站名称');
		$template = _POST('模板');
		$template_caching = _POST('模版缓存') ? 'true' : 'false';
		$template_cache_lifetime = _POST('模版缓存时间');
		$template_force_compile = _POST('模版重编译') ? 'true' : 'false';
		$template_debugging = _POST('模版调试') ? 'true' : 'false';
		$OSWAP_ff18838bb252b9e87f5dfe2f39270d32 = _POST('开启SSL');
		$OSWAP_5c52aa1733733876cee74f65dd2fe252 = _POST('伪静态开关');
		$zt = _POST('网站状态');
		$OSWAP_988736c180167382936eb2fd4061f5de = _POST('维护消息');
		$OSWAP_b1bdd7026aef471e5512a3286d9ad83b = _POST('维护重定向');
		$gj = _POST('默认国家');
		$yy = _POST('默认语言');
		$OSWAP_29f74a236364581e1d0241c24dfe4d2c = _POST('启动服务条款');
		$OSWAP_efbac45874a1ea49d2257ee2158c87ef = _POST('服务条款URL');
		$OSWAP_b235d21d06fa550cca21d7df5e4ebe0d = _POST('随机主机用户名');
		$OSWAP_14508aa5fb0348a95d96a1df23d07108 = _POST('关闭GZIP');
		$OSWAP_a698af9c273b68af40072ad98ef23856 = _POST('交易币名称');
		$bq = _POST('底部版权');
		$OSWAP_96bfdc4ef3abf2fa3d862b3961cea583 = _POST('网站标题s');
		$OSWAP_10defeb07fd8b91597a1beeb029ec607 = _POST('使用本地静态');
		if (!$OSWAP_10defeb07fd8b91597a1beeb029ec607) $OSWAP_10defeb07fd8b91597a1beeb029ec607 = NULL;
		plug_eva('系统配置', '使用本地静态', $OSWAP_10defeb07fd8b91597a1beeb029ec607);
		if ($OSWAP_96bfdc4ef3abf2fa3d862b3961cea583 == '1') {
			$OSWAP_b52bedb3dc4792c5a0ac527a1a3ae9eb = '';
		} else if ($OSWAP_96bfdc4ef3abf2fa3d862b3961cea583 == '2') {
			$OSWAP_b52bedb3dc4792c5a0ac527a1a3ae9eb = _POST('网站标题2');
		} else if ($OSWAP_96bfdc4ef3abf2fa3d862b3961cea583 == '3') {
			$OSWAP_94210d2901250b824eca289a5e634d15 = _POST('网站标题3');
			$OSWAP_b52bedb3dc4792c5a0ac527a1a3ae9eb = '<img src="' . $OSWAP_94210d2901250b824eca289a5e634d15 . '" />';
		}
		if (empty($OSWAP_0d07de59261cc2c9023b194184c575fb) or empty($template) or empty($OSWAP_988736c180167382936eb2fd4061f5de) or empty($gj) or empty($yy) or empty($OSWAP_a698af9c273b68af40072ad98ef23856) or empty($bq)) die('请添全带*号项目');
		SMACSQL()->update('系统配置', "网站名称='" . $OSWAP_0d07de59261cc2c9023b194184c575fb . "',伪静态开关='" . $OSWAP_5c52aa1733733876cee74f65dd2fe252 . "',默认国家='" . $gj . "',默认语言='" . $yy . "',开启SSL='" . $OSWAP_ff18838bb252b9e87f5dfe2f39270d32 . "',网站状态='" . $zt . "',维护消息='" . $OSWAP_988736c180167382936eb2fd4061f5de . "',维护重定向='" . $OSWAP_b1bdd7026aef471e5512a3286d9ad83b . "',启动服务条款='" . $OSWAP_29f74a236364581e1d0241c24dfe4d2c . "',服务条款URL='" . $OSWAP_efbac45874a1ea49d2257ee2158c87ef . "',交易币名称='" . $OSWAP_a698af9c273b68af40072ad98ef23856 . "',随机主机用户名='" . $OSWAP_b235d21d06fa550cca21d7df5e4ebe0d . "',底部版权='" . $bq . "',头部LOGO='" . $OSWAP_b52bedb3dc4792c5a0ac527a1a3ae9eb . "',关闭GZIP='" . $OSWAP_14508aa5fb0348a95d96a1df23d07108 . "'", '1');
		@file_put_contents(SWAP_CONFIGS . 'template.php', '<?php return array(\'template\' => \'' . $template . '\',\'force_compile\' => ' . $template_force_compile . ',\'debugging\' => ' . $template_debugging . ',\'caching\' => ' . $template_caching . ',\'cache_lifetime\' => ' . $template_cache_lifetime . ');');
		die('ok');
	}
	function mail_settings() {
		need_admin();
		SMACSQL()->select('系统配置', '*', '1');
		$OSWAP_0f3b366259e2b19c1dd0ab51c3663a53 = SMACSQL()->fetch_array();
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['SMTP服务器端口'] = plug_eva('系统配置', 'SMTP服务器端口');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['邮箱姓名'] = plug_eva('系统配置', '邮箱姓名');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['发送方式'] = plug_eva('系统配置', '发送方式');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['加密'] = plug_eva('系统配置', '加密');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['认证'] = plug_eva('系统配置', '认证');
		AdminT::header('邮件设置', "<link href=\"/admin_assets/plugins/datatables/css/jquery.datatables.min.css\" rel=\"stylesheet\" type=\"text/css\"/><link href=\"/admin_assets/plugins/datatables/css/jquery.datatables_themeroller.css\" rel=\"stylesheet\" type=\"text/css\"/>");
		AdminT::search();
		echo "<main class=\"page-content content-wrap\">";
		AdminT::navbar();
		AdminT::sidebar();
		echo "<div class=\"page-inner\">";
		AdminT::title('邮件设置', '<li>网站设置</li>');
		echo "<div id=\"main-wrapper\" class=\"container\"><div class=\"row\">";
		echo "<div class=\"col-md-12\">";
		echo "<div class=\"panel panel-white\"><div class=\"panel-body\">";
		if (_GET('email') != '') {
			import("swap.Mail"); ?>
<div class="alert alert-info" role="alert"><?php SendMail(_GET('email'), '测试邮件', 'SWAPIDC测试邮件,当收到这封邮件说明您的邮件配置已经正常'); ?>已经提交发送请求.</div>
<?php
		} ?>
				<form id="settingfrom" role="form" class="form-horizontal form-groups-bordered">
					<div class="form-group">
						<label class="col-sm-3 control-label">发送地址</label>
						<div class="col-sm-5">
							<input name="邮箱地址" type="text" class="form-control" value="<?php echo $OSWAP_0f3b366259e2b19c1dd0ab51c3663a53['邮箱地址'] ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">发送姓名</label>
						<div class="col-sm-5">
							<input name="邮箱姓名" type="text" class="form-control" value="<?php echo $OSWAP_39acd516275569f78d4b51d4c5d2244c['邮箱姓名'] ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">发送方式</label>
						<div class="col-sm-5">
							<label><input type="radio" name="发送方式" value="0"<?php if (!$OSWAP_39acd516275569f78d4b51d4c5d2244c['发送方式']) { ?> checked<?php
		} ?>> 通过PHP的mail()函数发送邮件</label><br/>
							<label><input type="radio" name="发送方式" value="1"<?php if ($OSWAP_39acd516275569f78d4b51d4c5d2244c['发送方式']) { ?> checked<?php
		} ?>> 通过SMTP服务器发送邮件</label>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">SMTP地址</label>
						<div class="col-sm-5">
							<input name="SMTP服务器地址" type="text" class="form-control" value="<?php echo $OSWAP_0f3b366259e2b19c1dd0ab51c3663a53['SMTP服务器地址'] ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">SMTP端口</label>
						<div class="col-sm-5">
							<input name="SMTP服务器端口" type="text" class="form-control" value="<?php echo $OSWAP_39acd516275569f78d4b51d4c5d2244c['SMTP服务器端口'] ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">加密</label>
						<div class="col-sm-5">
							<label><input type="radio" name="加密" value="0"<?php if (!$OSWAP_39acd516275569f78d4b51d4c5d2244c['加密']) { ?> checked<?php
		} ?>> 不进行加密</label><br/>
							<label><input type="radio" name="加密" value="ssl"<?php if ($OSWAP_39acd516275569f78d4b51d4c5d2244c['加密'] == 'ssl') { ?> checked<?php
		} ?>> 使用SSL加密</label><br/>
							<label><input type="radio" name="加密" value="tls"<?php if ($OSWAP_39acd516275569f78d4b51d4c5d2244c['加密'] == 'tls') { ?> checked<?php
		} ?>> 使用TLS加密</label>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">认证</label>
						<div class="col-sm-5">
							<label><input type="radio" name="认证" value="0"<?php if (!$OSWAP_39acd516275569f78d4b51d4c5d2244c['认证']) { ?> checked<?php
		} ?>> 不:不进行SMTP认证</label><br/>
							<label><input type="radio" name="认证" value="1"<?php if ($OSWAP_39acd516275569f78d4b51d4c5d2244c['认证']) { ?> checked<?php
		} ?>> 是:进行SMTP认证</label><br/>
							如果选择不,下面的设置将会被忽略
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">邮箱帐号</label>
						<div class="col-sm-5">
							<input name="邮箱登录帐号" type="text" class="form-control" value="<?php echo $OSWAP_0f3b366259e2b19c1dd0ab51c3663a53['邮箱登录帐号'] ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">邮箱密码</label>
						<div class="col-sm-5">
							<input name="邮箱登录密码" type="password" class="form-control" value="<?php echo $OSWAP_0f3b366259e2b19c1dd0ab51c3663a53['邮箱登录密码'] ?>">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<a href="javascript:void(0)" onclick="$.post('/index.php/Admin/mail_settings_form/',$('#settingfrom').serialize(),function(data){if(data=='ok') swap_alert('success','修改成功','修改邮件设置成功'); else swap_alert('error','修改失败',data);});" class="btn btn-default">保存更改</a>
						</div>
					</div>
				</form>
				<form role="form" class="form-horizontal form-groups-bordered">
					<div class="form-group">
						<label class="col-sm-3 control-label">发送测试邮件:</label>
						<div class="col-sm-5">
							<input name="email" type="text" class="form-control">输入一个接收地址
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<input type="submit" class="btn btn-default" value="发送邮件" />
						</div>
					</div>
				</form>
<?php
		echo "</div></div>";
		echo "</div>";
		echo "</div></div></div>";
		AdminT::page_footer();
		echo "</div></main>";
		AdminT::cd_nav();
		AdminT::pjs();
		echo "<script src=\"/admin_assets/plugins/waypoints/jquery.waypoints.min.js\"></script><script src=\"/admin_assets/plugins/jquery-counterup/jquery.counterup.min.js\"></script><script src=\"/admin_assets/plugins/toastr/toastr.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.time.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.symbol.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.resize.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.tooltip.min.js\"></script><script src=\"/admin_assets/plugins/curvedlines/curvedLines.js\"></script><script src=\"/admin_assets/plugins/metrojs/MetroJs.min.js\"></script><script src=\"/admin_assets/plugins/morris/raphael.min.js\"></script><script src=\"/admin_assets/plugins/morris/morris.min.js\"></script><script src=\"/admin_assets/js/modern.min.js\"></script>";
		echo "<script src=\"/admin_assets/plugins/datatables/js/jquery.dataTables.min.js\"></script>";
		echo "<script>var extable;\$(document).ready(function() {extable=\$('#example').DataTable({\"language\":{\"url\":\"https://cdn.datatables.net/plug-ins/e9421181788/i18n/Chinese.json\"}});});</script>";
		echo "</body></html>";
	}
	function mail_settings_form() {
		need_admin();
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['邮箱地址'] = _POST('邮箱地址');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['邮箱登录帐号'] = _POST('邮箱登录帐号');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['邮箱登录密码'] = _POST('邮箱登录密码');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['SMTP服务器地址'] = _POST('SMTP服务器地址');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['SMTP服务器端口'] = _POST('SMTP服务器端口');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['邮箱姓名'] = _POST('邮箱姓名');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['发送方式'] = _POST('发送方式');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['加密'] = _POST('加密');
		$OSWAP_39acd516275569f78d4b51d4c5d2244c['认证'] = _POST('认证');
		plug_eva('系统配置', 'SMTP服务器端口', $OSWAP_39acd516275569f78d4b51d4c5d2244c['SMTP服务器端口']);
		plug_eva('系统配置', '邮箱姓名', $OSWAP_39acd516275569f78d4b51d4c5d2244c['邮箱姓名']);
		plug_eva('系统配置', '发送方式', $OSWAP_39acd516275569f78d4b51d4c5d2244c['发送方式']);
		plug_eva('系统配置', '加密', $OSWAP_39acd516275569f78d4b51d4c5d2244c['加密']);
		plug_eva('系统配置', '认证', $OSWAP_39acd516275569f78d4b51d4c5d2244c['认证']);
		SMACSQL()->update('系统配置', "邮箱地址='" . $OSWAP_39acd516275569f78d4b51d4c5d2244c['邮箱地址'] . "',SMTP服务器地址='" . $OSWAP_39acd516275569f78d4b51d4c5d2244c['SMTP服务器地址'] . "',邮箱登录帐号='" . $OSWAP_39acd516275569f78d4b51d4c5d2244c['邮箱登录帐号'] . "',邮箱登录密码='" . $OSWAP_39acd516275569f78d4b51d4c5d2244c['邮箱登录密码'] . "'", '1');
		die('ok');
	}
	function cron_setting() {
		need_admin();
		SMACSQL()->select('系统配置', '*', '1');
		$OSWAP_0f3b366259e2b19c1dd0ab51c3663a53 = SMACSQL()->fetch_array();
		$OSWAP_fdb6538476fa015d088f17e263a877b9 = ($OSWAP_0f3b366259e2b19c1dd0ab51c3663a53['删除时间'] - $OSWAP_0f3b366259e2b19c1dd0ab51c3663a53['暂停时间']);
		$OSWAP_d0b06e39567d23e64b3df856c6e4ea82 = ($OSWAP_0f3b366259e2b19c1dd0ab51c3663a53['停止列表清除时间'] - $OSWAP_0f3b366259e2b19c1dd0ab51c3663a53['删除时间']);
		AdminT::header('自动处理设置', "<link href=\"/admin_assets/plugins/datatables/css/jquery.datatables.min.css\" rel=\"stylesheet\" type=\"text/css\"/><link href=\"/admin_assets/plugins/datatables/css/jquery.datatables_themeroller.css\" rel=\"stylesheet\" type=\"text/css\"/>");
		AdminT::search();
		echo "<main class=\"page-content content-wrap\">";
		AdminT::navbar();
		AdminT::sidebar();
		echo "<div class=\"page-inner\">";
		AdminT::title('自动处理设置', '<li>网站设置</li>');
		echo "<div id=\"main-wrapper\" class=\"container\"><div class=\"row\">";
		echo "<div class=\"col-md-12\">"; ?>
		<div class="panel panel-primary" data-collapsed="0">
			<div class="panel-heading">
				<div class="panel-title">
					<p>要执行自动任务功能,请在安装SWAPIDC的服务器/虚拟主机控制面板里设置一个cron计划,每天执行一次,时间由你决定。比如 00:01</p>
				</div>
			</div>
			
			<div class="panel-body">
				
				<form role="form" class="form-horizontal form-groups-bordered"></br>
	
					<div class="form-group">
						<label class="col-sm-3 control-label">可用GET执行:</label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control"  value="GET http://<?php echo $_SERVER['SERVER_NAME'] ?>/index.php/index/cron/" readonly>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="panel panel-primary" data-collapsed="0">
			<div class="panel-heading">
				<div class="panel-title">
					<p>自动模块功能</p>
				</div>
			</div>
			
			<div class="panel-body">
				<div class="table-responsive col-md-12">
				<form role="form" id="settingfrom" class="form-horizontal form-groups-bordered"></br>
					<div class="form-group">
						<label class="col-sm-3 control-label">启用暂停功能</label>
						<label><input type="checkbox" value="1" name="autosuspend"<?php if ($OSWAP_0f3b366259e2b19c1dd0ab51c3663a53['启动暂停'] == '1') {
			echo ' CHECKED';
		} ?>> 选择启用产品/服务到期暂停功能</label>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">暂停时间</label>
						<input type="text" name="autosuspenddays" value="<?php echo $OSWAP_0f3b366259e2b19c1dd0ab51c3663a53['暂停时间'] ?>" size=3> 你希望用户的产品/服务在到期几天后暂停.如：一过期就暂停填0,依此类推。
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">启用解除暂停功能</label>
						<label><input type="checkbox" value="1" name="autounsuspend"<?php if ($OSWAP_0f3b366259e2b19c1dd0ab51c3663a53['启动解除暂停'] == '1') {
			echo ' CHECKED';
		} ?>> 选择此项，用户如果在产品/服务暂停状态时通过支付接口付款续费,在收到付款的瞬间立即自动重新启用.</label>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">启用停止功能</label>
						<label><input type="checkbox" value="1" name="autotermination"<?php if ($OSWAP_0f3b366259e2b19c1dd0ab51c3663a53['启动删除'] == '1') {
			echo ' CHECKED';
		} ?>> 选择此项，产品到到期暂停后在一段时间内没有及时续费，则自动停止。请慎重考虑后再决定启用与否.</label>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">停止时间</label>
						<input type="text" name="autoterminationdays" value="<?php echo $OSWAP_fdb6538476fa015d088f17e263a877b9 ?>" size=3> 你希望用户的产品/服务在暂停几天后停止?如：暂停7天内，用户不续费，则在暂停后的第7天执行cron时自动停止，就填7
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">停止列表清除时间</label>
						<input type="text" name="autodeldays" value="<?php echo $OSWAP_d0b06e39567d23e64b3df856c6e4ea82 ?>" size=3> 你希望用户的产品/服务在停止几天后删除列表?如：用户的产品已经停止了7天，则在停止后的第7天执行cron时自动删除列表数据，就填7
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">待付款列表清除时间</label>
						<input type="text" name="autocleandays" value="<?php echo $OSWAP_0f3b366259e2b19c1dd0ab51c3663a53['待付款列表清除时间'] ?>" size=3> 你希望用户的产品/服务为待付款的时候列表几天后删除?如：用户创建了订单，但没有付款则第7天执行cron时自动删除;列表，就填7
					</div>
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<a href="javascript:void(0)" onclick="$.post('/index.php/Admin/setting_cron_form/',$('#settingfrom').serialize(),function(data){if(data=='ok') swap_alert('success','修改成功','修改CRON成功'); else swap_alert('error','修改失败',data);});" class="btn btn-success">保存更改</a>
						</div>
					</div>
				</form>
				</div>
			</div>
		</div>
<?php
		echo "</div>";
		echo "</div></div></div>";
		AdminT::page_footer();
		echo "</div></main>";
		AdminT::cd_nav();
		AdminT::pjs();
		echo "<script src=\"/admin_assets/plugins/waypoints/jquery.waypoints.min.js\"></script><script src=\"/admin_assets/plugins/jquery-counterup/jquery.counterup.min.js\"></script><script src=\"/admin_assets/plugins/toastr/toastr.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.time.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.symbol.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.resize.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.tooltip.min.js\"></script><script src=\"/admin_assets/plugins/curvedlines/curvedLines.js\"></script><script src=\"/admin_assets/plugins/metrojs/MetroJs.min.js\"></script><script src=\"/admin_assets/plugins/morris/raphael.min.js\"></script><script src=\"/admin_assets/plugins/morris/morris.min.js\"></script><script src=\"/admin_assets/js/modern.min.js\"></script>";
		echo "<script src=\"/admin_assets/plugins/datatables/js/jquery.dataTables.min.js\"></script>";
		echo "<script>var extable;\$(document).ready(function() {extable=\$('#example').DataTable({\"language\":{\"url\":\"https://cdn.datatables.net/plug-ins/e9421181788/i18n/Chinese.json\"}});});</script>";
		echo "</body></html>";
	}
	function setting_cron_form() {
		need_admin();
		$OSWAP_ec813dcc1dcbbf1b3a1a4e43ebdf5650 = _POST('autosuspend');
		$OSWAP_e35cb44d8422ff0ad42bb36a9114e345 = _POST('autounsuspend');
		$OSWAP_e858996845ddc30d8bcd1adb9626140c = _POST('autotermination');
		$OSWAP_e82e695e0409a72852b472c3321ada6a = _POST('autosuspenddays');
		$OSWAP_95fcd5b25199a69ed7b6325141c59077 = _POST('autoterminationdays');
		$OSWAP_e0d71176bee49a5d2278003e71dc2115 = _POST('autodeldays');
		$OSWAP_9bdd91bd6a8503a8b60938869af14364 = _POST('autocleandays');
		if ((!str_is_int($OSWAP_e82e695e0409a72852b472c3321ada6a)) or (!str_is_int($OSWAP_95fcd5b25199a69ed7b6325141c59077)) or (!str_is_int($OSWAP_e0d71176bee49a5d2278003e71dc2115)) or (!str_is_int($OSWAP_9bdd91bd6a8503a8b60938869af14364))) die('请添全时间项目,并必须是整数');
		if ((strstr($OSWAP_e82e695e0409a72852b472c3321ada6a, '-')) or (strstr($OSWAP_95fcd5b25199a69ed7b6325141c59077, '-')) or (strstr($OSWAP_e0d71176bee49a5d2278003e71dc2115, '-')) or (strstr($OSWAP_9bdd91bd6a8503a8b60938869af14364, '-'))) die('时间必须为非负数');
		$OSWAP_95fcd5b25199a69ed7b6325141c59077 = ($OSWAP_95fcd5b25199a69ed7b6325141c59077 + $OSWAP_e82e695e0409a72852b472c3321ada6a);
		$OSWAP_e0d71176bee49a5d2278003e71dc2115 = ($OSWAP_e0d71176bee49a5d2278003e71dc2115 + $OSWAP_95fcd5b25199a69ed7b6325141c59077);
		SMACSQL()->update('系统配置', "启动暂停='" . $OSWAP_ec813dcc1dcbbf1b3a1a4e43ebdf5650 . "',暂停时间='" . $OSWAP_e82e695e0409a72852b472c3321ada6a . "',启动解除暂停='" . $OSWAP_e35cb44d8422ff0ad42bb36a9114e345 . "',启动删除='" . $OSWAP_e858996845ddc30d8bcd1adb9626140c . "',删除时间='" . $OSWAP_95fcd5b25199a69ed7b6325141c59077 . "',停止列表清除时间='" . $OSWAP_e0d71176bee49a5d2278003e71dc2115 . "',待付款列表清除时间='" . $OSWAP_9bdd91bd6a8503a8b60938869af14364 . "'", '1');
		die('ok');
	}
	function promo() {
		need_admin();
		SMACSQL()->select('优惠码表', '*');
		$OSWAP_2822f7e8a80d473ecff69cdf4b7378d2s = array();
		while ($OSWAP_51d4cad9672e6605c99e0c3d678f456e = SMACSQL()->fetch_assoc()) {
			$OSWAP_2822f7e8a80d473ecff69cdf4b7378d2s[] = $OSWAP_51d4cad9672e6605c99e0c3d678f456e;
		}
		AdminT::header('优惠码', "<link href=\"/admin_assets/plugins/bootstrap-datepicker/css/datepicker3.css\" rel=\"stylesheet\" type=\"text/css\"/><link href=\"/admin_assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.css\" rel=\"stylesheet\" type=\"text/css\"/><link href=\"/admin_assets/plugins/datatables/css/jquery.datatables.min.css\" rel=\"stylesheet\" type=\"text/css\"/><link href=\"/admin_assets/plugins/datatables/css/jquery.datatables_themeroller.css\" rel=\"stylesheet\" type=\"text/css\"/>");
		AdminT::search();
		echo "<main class=\"page-content content-wrap\">";
		AdminT::navbar();
		AdminT::sidebar();
		echo "<div class=\"page-inner\">";
		AdminT::title('优惠码');
		echo "<div id=\"main-wrapper\" class=\"container\"><div class=\"row\">";
		echo "<div class=\"table-responsive col-md-12\">";
		echo "<div class=\"panel panel-white\"><div class=\"panel-body\">"; ?>
<table id="example" class="display table" style="width: 100%; cellspacing: 0;">
	<thead>
		<tr>
			<th class="text-center">优惠码</th>
			<th>类型</th>
			<th>价值</th>
			<th>开始时间</th>
			<th>到期时间</th>
			<th>最多使用次数</th>
			<th>已经使用次数</th>
			<th>只能一次</th>
			<th>备注</th>
			<th>设置</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($OSWAP_2822f7e8a80d473ecff69cdf4b7378d2s as $OSWAP_2822f7e8a80d473ecff69cdf4b7378d2) { ?>
		<tr class="usert<?php echo $OSWAP_2822f7e8a80d473ecff69cdf4b7378d2['id'] ?>">
			<td class="text-center"><?php echo $OSWAP_2822f7e8a80d473ecff69cdf4b7378d2['优惠码'] ?></td>
			<td><?php if ($OSWAP_2822f7e8a80d473ecff69cdf4b7378d2['类型'] == '') {
				echo '所有产品通用';
			} else {
				echo $OSWAP_2822f7e8a80d473ecff69cdf4b7378d2['类型'] . ' 产品ID:' . $OSWAP_2822f7e8a80d473ecff69cdf4b7378d2['适用产品'];
			} ?></td>
			<td><?php echo $OSWAP_2822f7e8a80d473ecff69cdf4b7378d2['价值'] ?></td>
			<td><?php if ($OSWAP_2822f7e8a80d473ecff69cdf4b7378d2['开始时间'] == '0000-00-00 00:00:00') {
				echo '不限时间';
			} else {
				echo $OSWAP_2822f7e8a80d473ecff69cdf4b7378d2['开始时间'];
			} ?></td>
			<td><?php if ($OSWAP_2822f7e8a80d473ecff69cdf4b7378d2['到期时间'] == '0000-00-00 00:00:00') {
				echo '不限时间';
			} else {
				echo $OSWAP_2822f7e8a80d473ecff69cdf4b7378d2['到期时间'];
			} ?></td>
			<td><?php if ($OSWAP_2822f7e8a80d473ecff69cdf4b7378d2['最多使用次数'] == '0') {
				echo '不限';
			} else {
				echo $OSWAP_2822f7e8a80d473ecff69cdf4b7378d2['最多使用次数'];
			} ?></td>
			<td><?php echo $OSWAP_2822f7e8a80d473ecff69cdf4b7378d2['已经使用次数'] ?></td>
			<td><?php if ($OSWAP_2822f7e8a80d473ecff69cdf4b7378d2['只能一次']) {
				echo '<i class="icon-check"></i>';
			} else {
				echo '<i class="icon-ban"></i>';
			} ?></td>
			<td><?php echo $OSWAP_2822f7e8a80d473ecff69cdf4b7378d2['备注'] ?></td>
			<td><a href="/index.php/Admin/Promo_Detailed/<?php echo $OSWAP_2822f7e8a80d473ecff69cdf4b7378d2['id'] ?>/" class="btn btn-info btn-xs">设置</a><a href="javascript:void(0)" class="btn btn-danger btn-xs delid<?php echo $OSWAP_2822f7e8a80d473ecff69cdf4b7378d2['id'] ?>" disabled>删除</a><input type="checkbox"onclick="$('.delid<?php echo $OSWAP_2822f7e8a80d473ecff69cdf4b7378d2['id'] ?>').attr('onclick','$.get(\'/index.php/Admin/Del_Promo/<?php echo $OSWAP_2822f7e8a80d473ecff69cdf4b7378d2['id'] ?>/\',function(data){if(data==\'ok\') extable.row(\'.usert<?php echo $OSWAP_2822f7e8a80d473ecff69cdf4b7378d2['id'] ?>\').remove().draw(); else swap_alert(\'error\',\'删除失败\',data);});') && $('.delid<?php echo $OSWAP_2822f7e8a80d473ecff69cdf4b7378d2['id'] ?>').attr('disabled', false) && $(this).parent().parent().remove();"/></td>
		</tr>
<?php
		} ?>
	</tbody>
</table>
</br>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
			<div class="panel-heading">
				<div class="panel-title">
					优惠码添加
				</div>
			</div>
			<div class="panel-body">
				<form id="new" role="form" class="form-horizontal form-groups-bordered"></br>
					<div class="form-group">
						<label class="col-sm-3 control-label">优惠码</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="优惠码">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">类型</label>
						<div class="col-sm-2">
							<select id="cplx" name="类型" class="form-control" onchange="nonedis()">
								<option value="">所有产品通用</option>
								<option value="指定产品">指定产品</option>
							</select>
						</div>
						<div class="col-sm-1 control-label" id="none1" style="display:none;">产品ID: </div>
						<div class="col-sm-2" id="none2" style="display:none;"><input type="text" class="form-control" name="产品id"></div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">价值</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="价值">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">开始时间(不填为不限定时间)</label>
						<div class="col-sm-5">
							<div class="date-and-time">
								<input type="text" class="form-control datepicker" name="开始时间" />
								<input type="text" class="form-control timepicker" name="开始时间秒" />
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">到期时间(不填为不限定时间)</label>
						<div class="col-sm-5">
							<div class="date-and-time">
								<input type="text" class="form-control datepicker" name="到期时间" />
								<input type="text" class="form-control timepicker" name="到期时间秒" />
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">最多使用次数 0为无限</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="最多使用次数">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">备注</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="备注">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">每个用户只能用一次(方便) 但不能超过最多使用次数</label>
						<div class="col-sm-5">
							<input type="checkbox" name="只能一次" value="1"> 注意:这个功能和名称绑定,一旦相同名称的优惠码出现并且原来使用过相同优惠码的用户将不会开通,即使删除优惠码重建
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<a href="javascript:void(0)" onclick="$.post('/index.php/Admin/new_promo_form/',$('#new').serialize(),function(data){if(data=='ok') location.reload(); else swap_alert('error','添加失败',data);});" class="btn btn-success">添加</a>
						</div>
					</div>
				</form>
			</div>
		</div>
<?php
		echo "</div></div></div>";
		echo "</div>";
		echo "</div></div></div>";
		AdminT::page_footer();
		echo "</div></main>";
		AdminT::cd_nav();
		AdminT::pjs();
		echo "<script src=\"/admin_assets/plugins/waypoints/jquery.waypoints.min.js\"></script><script src=\"/admin_assets/plugins/jquery-counterup/jquery.counterup.min.js\"></script><script src=\"/admin_assets/plugins/toastr/toastr.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.time.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.symbol.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.resize.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.tooltip.min.js\"></script><script src=\"/admin_assets/plugins/curvedlines/curvedLines.js\"></script><script src=\"/admin_assets/plugins/metrojs/MetroJs.min.js\"></script><script src=\"/admin_assets/plugins/morris/raphael.min.js\"></script><script src=\"/admin_assets/plugins/morris/morris.min.js\"></script><script src=\"/admin_assets/js/modern.min.js\"></script>";
		echo "<script src=\"/admin_assets/plugins/datatables/js/jquery.dataTables.min.js\"></script><script src=\"/admin_assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js\"></script><script src=\"/admin_assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.js\"></script>";
		echo "<script>var extable;\$(document).ready(function() {extable=\$('#example').DataTable({\"language\":{\"url\":\"https://cdn.datatables.net/plug-ins/e9421181788/i18n/Chinese.json\"}});});</script>"; ?>
<script>
$(document).ready(function() {
    $('.datepicker').each(function(){
		$(this).datepicker({
        	orientation: "top auto",
        	autoclose: true,
			format: "yyyy-mm-dd"
    	});
	});
	$('.timepicker').each(function(){
		$(this).timepicker({
			minuteStep: 1,
			appendWidgetTo: 'body',
			showSeconds: true,
			showMeridian: false,
			disableFocus: true,
			defaultTime: false
		});
	});
});
function nonedis(){
var cplx=$('#cplx').val();
if(cplx=='指定产品'){
$('#none1').attr('style','');
$('#none2').attr('style','');
}else{
$('#none1').attr('style','display:none;');
$('#none2').attr('style','display:none;');
}
}
</script>
<?php
		echo "</body></html>";
	}
	function new_promo_form() {
		need_admin();
		$OSWAP_0d07de59261cc2c9023b194184c575fb = _POST('优惠码');
		$lx = _POST('类型');
		$OSWAP_97a016e66275c6039729b703b9d85f30 = _POST('产品id');
		$jz = _POST('价值');
		$OSWAP_fa1914c1e752f98f134e256ab19773a0 = _POST('开始时间');
		$OSWAP_e20d81bfb1923b1f2a2abed289b38bea = _POST('到期时间');
		$OSWAP_f272577796d9e513cdb601c753a20761 = _POST('开始时间秒');
		$OSWAP_9c7fd775abc6fd4a1ef72a5e1bcd8c35 = _POST('到期时间秒');
		$OSWAP_dd6be1eb22e00c80c660d2fa47bff3f2 = _POST('最多使用次数');
		$bz = _POST('备注');
		$OSWAP_84aa7c680975d5383006fa505f67d609 = _POST('只能一次');
		if ((empty($OSWAP_0d07de59261cc2c9023b194184c575fb)) or (empty($jz))) die('请填写完整内容!!');
		if (!empty($lx)) {
			if (empty($OSWAP_97a016e66275c6039729b703b9d85f30)) die('没有指定产品id');
		}
		$OSWAP_fa1914c1e752f98f134e256ab19773a0 = $OSWAP_fa1914c1e752f98f134e256ab19773a0 . ' ' . $OSWAP_f272577796d9e513cdb601c753a20761;
		$OSWAP_e20d81bfb1923b1f2a2abed289b38bea = $OSWAP_e20d81bfb1923b1f2a2abed289b38bea . ' ' . $OSWAP_9c7fd775abc6fd4a1ef72a5e1bcd8c35;
		SMACSQL()->select('优惠码表', '*', "优惠码='" . $OSWAP_0d07de59261cc2c9023b194184c575fb . "'");
		if (SMACSQL()->db_num_rows() != 0) die('已经存在的优惠码');
		SMACSQL()->insert('优惠码表', "优惠码,类型,价值,适用产品,开始时间,到期时间,最多使用次数,只能一次,备注", "'" . $OSWAP_0d07de59261cc2c9023b194184c575fb . "','" . $lx . "','" . $jz . "','" . $OSWAP_97a016e66275c6039729b703b9d85f30 . "','" . $OSWAP_fa1914c1e752f98f134e256ab19773a0 . "','" . $OSWAP_e20d81bfb1923b1f2a2abed289b38bea . "','" . $OSWAP_dd6be1eb22e00c80c660d2fa47bff3f2 . "','" . $OSWAP_84aa7c680975d5383006fa505f67d609 . "','" . $bz . "'");
		die('ok');
	}
	function del_promo() {
		need_admin();
		$id = mac_url_get(1);
		if (empty($id)) die('参数错误,请选择删除id');
		SMACSQL()->select('优惠码表', '*', "id='$id'");
		if (SMACSQL()->db_num_rows() == 0) die('not found');
		SMACSQL()->delete('优惠码表', "id='$id'");
		die('ok');
	}
	function promo_detailed() {
		need_admin();
		$id = mac_url_get(1);
		SMACSQL()->select('优惠码表', '*', "id='$id'");
		if (SMACSQL()->db_num_rows() == 0) exit(redirect('/index.php/admin/?warning=' . urlencode('优惠码不存在')));
		$OSWAP_2822f7e8a80d473ecff69cdf4b7378d2 = SMACSQL()->fetch_array();
		$OSWAP_a416a4b07b6f280c968f2f3bb53948d51 = explode(' ', $OSWAP_2822f7e8a80d473ecff69cdf4b7378d2['开始时间']);
		$OSWAP_2822f7e8a80d473ecff69cdf4b7378d2['开始时间'] = $OSWAP_a416a4b07b6f280c968f2f3bb53948d51[0];
		$OSWAP_2822f7e8a80d473ecff69cdf4b7378d2['开始时间秒'] = $OSWAP_a416a4b07b6f280c968f2f3bb53948d51[1];
		$OSWAP_a416a4b07b6f280c968f2f3bb53948d52 = explode(' ', $OSWAP_2822f7e8a80d473ecff69cdf4b7378d2['到期时间']);
		$OSWAP_2822f7e8a80d473ecff69cdf4b7378d2['到期时间'] = $OSWAP_a416a4b07b6f280c968f2f3bb53948d52[0];
		$OSWAP_2822f7e8a80d473ecff69cdf4b7378d2['到期时间秒'] = $OSWAP_a416a4b07b6f280c968f2f3bb53948d52[1];
		AdminT::header('优惠码编辑', "<link href=\"/admin_assets/plugins/bootstrap-datepicker/css/datepicker3.css\" rel=\"stylesheet\" type=\"text/css\"/><link href=\"/admin_assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.css\" rel=\"stylesheet\" type=\"text/css\"/><link href=\"/admin_assets/plugins/datatables/css/jquery.datatables.min.css\" rel=\"stylesheet\" type=\"text/css\"/><link href=\"/admin_assets/plugins/datatables/css/jquery.datatables_themeroller.css\" rel=\"stylesheet\" type=\"text/css\"/>");
		AdminT::search();
		echo "<main class=\"page-content content-wrap\">";
		AdminT::navbar();
		AdminT::sidebar();
		echo "<div class=\"page-inner\">";
		AdminT::title('优惠码编辑');
		echo "<div id=\"main-wrapper\" class=\"container\"><div class=\"row\">";
		echo "<div class=\"col-md-12\">";
		echo "<div class=\"panel panel-white\"><div class=\"panel-body\"><div class=\"table-responsive col-md-12\">"; ?>
				<form id="new" role="form" class="form-horizontal form-groups-bordered"></br>
					<div class="form-group">
						<label class="col-sm-3 control-label">优惠码</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="优惠码" value="<?php echo $OSWAP_2822f7e8a80d473ecff69cdf4b7378d2['优惠码'] ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">类型</label>
						<div class="col-sm-2">
							<select id="cplx" name="类型" class="form-control" onchange="nonedis()">
								<option value=""<?php if ($OSWAP_2822f7e8a80d473ecff69cdf4b7378d2['类型'] == '') {
			echo ' selected';
		} ?>>所有产品通用</option>
								<option value="指定产品"<?php if ($OSWAP_2822f7e8a80d473ecff69cdf4b7378d2['类型'] == '指定产品') {
			echo ' selected';
		} ?>>指定产品</option>
							</select>
						</div>
						<div class="col-sm-1 control-label" id="none1" style="display:none;">产品ID: </div>
						<div class="col-sm-2" id="none2" style="display:none;"><input type="text" class="form-control" name="产品id" value="<?php echo $OSWAP_2822f7e8a80d473ecff69cdf4b7378d2['适用产品'] ?>"></div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">价值</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="价值" value="<?php echo $OSWAP_2822f7e8a80d473ecff69cdf4b7378d2['价值'] ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">开始时间(不填为不限定时间)</label>
						<div class="col-sm-5">
							<div class="date-and-time">
								<input type="text" class="form-control datepicker" name="开始时间" value="<?php echo $OSWAP_2822f7e8a80d473ecff69cdf4b7378d2['开始时间'] ?>" />
								<input type="text" class="form-control timepicker" name="开始时间秒" value="<?php echo $OSWAP_2822f7e8a80d473ecff69cdf4b7378d2['开始时间秒'] ?>" />
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">到期时间(不填为不限定时间)</label>
						<div class="col-sm-5">
							<div class="date-and-time">
								<input type="text" class="form-control datepicker" name="到期时间" value="<?php echo $OSWAP_2822f7e8a80d473ecff69cdf4b7378d2['到期时间'] ?>" />
								<input type="text" class="form-control timepicker" name="到期时间秒" value="<?php echo $OSWAP_2822f7e8a80d473ecff69cdf4b7378d2['到期时间秒'] ?>" />
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">最多使用次数 0为无限</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="最多使用次数" value="<?php echo $OSWAP_2822f7e8a80d473ecff69cdf4b7378d2['最多使用次数'] ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">备注</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="备注" value="<?php echo $OSWAP_2822f7e8a80d473ecff69cdf4b7378d2['备注'] ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">每个用户只能用一次(方便) 但不能超过最多使用次数</label>
						<div class="col-sm-5">
							<input type="checkbox" name="只能一次" value="1"<?php if ($OSWAP_2822f7e8a80d473ecff69cdf4b7378d2['只能一次']) {
			echo ' checked';
		} ?>> 注意:这个功能和名称绑定,一旦相同名称的优惠码出现并且原来使用过相同优惠码的用户将不会开通,即使删除优惠码重建
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<a href="javascript:void(0)" onclick="$.post('/index.php/Admin/xg_promo_form/<?php echo $OSWAP_2822f7e8a80d473ecff69cdf4b7378d2['id'] ?>/',$('#new').serialize(),function(data){if(data=='ok') swap_alert('success','修改成功','修改优惠码成功'); else swap_alert('error','修改失败',data);});" class="btn btn-success">修改</a>
						</div>
					</div>
				</form>
<?php
		echo "</div></div></div>";
		echo "</div>";
		echo "</div></div></div>";
		AdminT::page_footer();
		echo "</div></main>";
		AdminT::cd_nav();
		AdminT::pjs();
		echo "<script src=\"/admin_assets/plugins/waypoints/jquery.waypoints.min.js\"></script><script src=\"/admin_assets/plugins/jquery-counterup/jquery.counterup.min.js\"></script><script src=\"/admin_assets/plugins/toastr/toastr.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.time.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.symbol.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.resize.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.tooltip.min.js\"></script><script src=\"/admin_assets/plugins/curvedlines/curvedLines.js\"></script><script src=\"/admin_assets/plugins/metrojs/MetroJs.min.js\"></script><script src=\"/admin_assets/plugins/morris/raphael.min.js\"></script><script src=\"/admin_assets/plugins/morris/morris.min.js\"></script><script src=\"/admin_assets/js/modern.min.js\"></script>";
		echo "<script src=\"/admin_assets/plugins/datatables/js/jquery.dataTables.min.js\"></script><script src=\"/admin_assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js\"></script><script src=\"/admin_assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.js\"></script>";
		echo "<script>var extable;\$(document).ready(function() {extable=\$('#example').DataTable({\"language\":{\"url\":\"https://cdn.datatables.net/plug-ins/e9421181788/i18n/Chinese.json\"}});});</script>"; ?>
<script>
$(document).ready(function() {
    $('.datepicker').each(function(){
		$(this).datepicker({
        	orientation: "top auto",
        	autoclose: true,
			format: "yyyy-mm-dd"
    	});
	});
	$('.timepicker').each(function(){
		$(this).timepicker({
			minuteStep: 1,
			appendWidgetTo: 'body',
			showSeconds: true,
			showMeridian: false,
			disableFocus: true,
			defaultTime: false
		});
	});
	nonedis();
});
function nonedis(){
var cplx=$('#cplx').val();
if(cplx=='指定产品'){
$('#none1').attr('style','');
$('#none2').attr('style','');
}else{
$('#none1').attr('style','display:none;');
$('#none2').attr('style','display:none;');
}
}
</script>
<?php
		echo "</body></html>";
	}
	function xg_promo_form() {
		need_admin();
		$id = mac_url_get(1);
		$OSWAP_0d07de59261cc2c9023b194184c575fb = _POST('优惠码');
		$lx = _POST('类型');
		$OSWAP_97a016e66275c6039729b703b9d85f30 = _POST('产品id');
		$jz = _POST('价值');
		$OSWAP_fa1914c1e752f98f134e256ab19773a0 = _POST('开始时间');
		$OSWAP_e20d81bfb1923b1f2a2abed289b38bea = _POST('到期时间');
		$OSWAP_f272577796d9e513cdb601c753a20761 = _POST('开始时间秒');
		$OSWAP_9c7fd775abc6fd4a1ef72a5e1bcd8c35 = _POST('到期时间秒');
		$OSWAP_dd6be1eb22e00c80c660d2fa47bff3f2 = _POST('最多使用次数');
		$bz = _POST('备注');
		$OSWAP_84aa7c680975d5383006fa505f67d609 = _POST('只能一次');
		if ((empty($OSWAP_0d07de59261cc2c9023b194184c575fb)) or (empty($jz))) die('请填写完整内容!!');
		if (!empty($lx)) {
			if (empty($OSWAP_97a016e66275c6039729b703b9d85f30)) die('没有指定产品id');
		}
		$OSWAP_fa1914c1e752f98f134e256ab19773a0 = $OSWAP_fa1914c1e752f98f134e256ab19773a0 . ' ' . $OSWAP_f272577796d9e513cdb601c753a20761;
		$OSWAP_e20d81bfb1923b1f2a2abed289b38bea = $OSWAP_e20d81bfb1923b1f2a2abed289b38bea . ' ' . $OSWAP_9c7fd775abc6fd4a1ef72a5e1bcd8c35;
		SMACSQL()->select('优惠码表', '*', "id='$id'");
		if (SMACSQL()->db_num_rows() == 0) die('优惠码不存在');
		SMACSQL()->update('优惠码表', "优惠码='" . $OSWAP_0d07de59261cc2c9023b194184c575fb . "',类型='" . $lx . "',价值='" . $jz . "',适用产品='" . $OSWAP_97a016e66275c6039729b703b9d85f30 . "',开始时间='" . $OSWAP_fa1914c1e752f98f134e256ab19773a0 . "',到期时间='" . $OSWAP_e20d81bfb1923b1f2a2abed289b38bea . "',最多使用次数='" . $OSWAP_dd6be1eb22e00c80c660d2fa47bff3f2 . "',只能一次='" . $OSWAP_84aa7c680975d5383006fa505f67d609 . "',备注='" . $bz . "'", "id='$id'");
		die('ok');
	}
	function configoptions() {
		need_admin();
		SMACSQL()->select('产品配置选项组表', '*');
		$OSWAP_48e0791b3c3dea4cbbd70e367d431261 = array();
		while ($OSWAP_51d4cad9672e6605c99e0c3d678f456e = SMACSQL()->fetch_assoc()) {
			$OSWAP_48e0791b3c3dea4cbbd70e367d431261[] = $OSWAP_51d4cad9672e6605c99e0c3d678f456e;
		}
		AdminT::header('自定义选项', "<link href=\"/admin_assets/plugins/datatables/css/jquery.datatables.min.css\" rel=\"stylesheet\" type=\"text/css\"/><link href=\"/admin_assets/plugins/datatables/css/jquery.datatables_themeroller.css\" rel=\"stylesheet\" type=\"text/css\"/>");
		AdminT::search();
		echo "<main class=\"page-content content-wrap\">";
		AdminT::navbar();
		AdminT::sidebar();
		echo "<div class=\"page-inner\">";
		AdminT::title('自定义选项', '<li>产品管理</li>', '<a href="javascript:void(0)" onclick="$.get(\'/index.php/Admin/configoptions_new/\',function(){location.reload();});" class="btn btn-primary btn-addon btn-xs"><i class="fa fa-plus"></i> 添加自定义选项</a>');
		echo "<div id=\"main-wrapper\" class=\"container\"><div class=\"row\">";
		echo "<div class=\"col-md-12\">";
		echo "<div class=\"panel panel-white\"><div class=\"panel-body\"><div class=\"table-responsive\">"; ?>
<table id="example" class="display table" style="width: 100%; cellspacing: 0;">
	<thead>
		<tr>
			<th>ID</th>
			<th>名称</th>
			<th>描述</th>
			<th>操作</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<th>ID</th>
			<th>名称</th>
			<th>描述</th>
			<th>操作</th>
		</tr>
	</tfoot>
	<tbody>
<?php foreach ($OSWAP_48e0791b3c3dea4cbbd70e367d431261 as $cp) { ?>
		<tr class="usert<?php echo $cp['id'] ?>">
			<td><?php echo $cp['id'] ?></td>
			<td><?php echo $cp['名称'] ?></td>
			<td><?php echo $cp['描述'] ?></td>
			<td>
				<a href="/index.php/Admin/ConfigOptions_Detailed/<?php echo $cp['id'] ?>/" class="btn btn-info btn-xs">编辑</a><a href="javascript:void(0)" class="btn btn-danger btn-xs delid<?php echo $cp['id'] ?>" disabled>删除</a><input type="checkbox"onclick="$('.delid<?php echo $cp['id'] ?>').attr('onclick','$.post(\'/index.php/Admin/configoptions_sc/<?php echo $cp['id'] ?>/\',\'scid=\'+$(\'input[type=\\\'radio\\\'][name=\\\'scid\\\']:checked\').val(),function(data){if(data==\'ok\') extable.row(\'.usert<?php echo $cp['id'] ?>\').remove().draw(); else swap_alert(\'error\',\'删除失败\',data);});') && $('.delid<?php echo $cp['id'] ?>').attr('disabled', false) && $(this).parent().parent().remove();"/>
			</td>
		</tr>
<?php
		} ?>
	</tbody>
</table>
<?php
		echo "</div></div></div>";
		echo "</div>";
		echo "</div></div></div>";
		AdminT::page_footer();
		echo "</div></main>";
		AdminT::cd_nav();
		AdminT::pjs();
		echo "<script src=\"/admin_assets/plugins/waypoints/jquery.waypoints.min.js\"></script><script src=\"/admin_assets/plugins/jquery-counterup/jquery.counterup.min.js\"></script><script src=\"/admin_assets/plugins/toastr/toastr.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.time.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.symbol.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.resize.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.tooltip.min.js\"></script><script src=\"/admin_assets/plugins/curvedlines/curvedLines.js\"></script><script src=\"/admin_assets/plugins/metrojs/MetroJs.min.js\"></script><script src=\"/admin_assets/plugins/morris/raphael.min.js\"></script><script src=\"/admin_assets/plugins/morris/morris.min.js\"></script><script src=\"/admin_assets/js/modern.min.js\"></script>";
		echo "<script src=\"/admin_assets/plugins/datatables/js/jquery.dataTables.min.js\"></script>";
		echo "<script>var extable;\$(document).ready(function() {extable=\$('#example').DataTable({\"language\":{\"url\":\"https://cdn.datatables.net/plug-ins/e9421181788/i18n/Chinese.json\"}});});</script>";
		echo "</body></html>";
	}
	function configoptions_new() {
		need_admin();
		SMACSQL()->insert('产品配置选项组表', "名称", "'新配置项" . time() . "'");
		die('ok');
	}
	function configoptions_sc() {
		need_admin();
		$id = mac_url_get(1);
		if (empty($id)) die('参数错误,请选择删除id');
		SMACSQL()->select('产品配置选项组表', '*', "id='$id'");
		if (SMACSQL()->db_num_rows() == 0) die('not found');
		SMACSQL()->delete('产品配置选项组表', "id='$id'");
		SMACSQL()->delete('产品配置连接', "组id='" . $id . "'");
		die('ok');
	}
	function configoptions_detailed() {
		need_admin();
		$id = mac_url_get(1);
		SMACSQL()->select('产品配置选项组表', '*', "id='$id'");
		if (SMACSQL()->db_num_rows() == 0) exit(redirect('/index.php/admin/?warning=' . urlencode('自定义配置选项不存在')));
		$cp = SMACSQL()->fetch_array();
		SMACSQL()->select('产品配置选项', '*', "组id='" . $id . "'");
		$OSWAP_6e628f7005ba76fc9cfaa1e184341d62 = array();
		while ($OSWAP_51d4cad9672e6605c99e0c3d678f456e = SMACSQL()->fetch_assoc()) {
			$OSWAP_6e628f7005ba76fc9cfaa1e184341d62[] = $OSWAP_51d4cad9672e6605c99e0c3d678f456e;
		}
		foreach ($OSWAP_6e628f7005ba76fc9cfaa1e184341d62 as $temps) {
			SMACSQL()->select('产品配置选项名称', '*', "配置id='" . $temps['id'] . "'");
			while ($OSWAP_51d4cad9672e6605c99e0c3d678f456e = SMACSQL()->fetch_assoc()) {
				$OSWAP_e98cc61e66a6d47ae5ce8a2363304f03[$temps['id']][] = $OSWAP_51d4cad9672e6605c99e0c3d678f456e;
			}
		}
		AdminT::header('自定义选项', "<link href=\"/admin_assets/plugins/datatables/css/jquery.datatables.min.css\" rel=\"stylesheet\" type=\"text/css\"/><link href=\"/admin_assets/plugins/datatables/css/jquery.datatables_themeroller.css\" rel=\"stylesheet\" type=\"text/css\"/>");
		AdminT::search();
		echo "<main class=\"page-content content-wrap\">";
		AdminT::navbar();
		AdminT::sidebar();
		echo "<div class=\"page-inner\">";
		AdminT::title('自定义选项', '<li>产品管理</li>');
		echo "<div id=\"main-wrapper\" class=\"container\">"; ?>
<form id="form">
<div class="row">
	<div class="col-md-12">
		
		<div class="panel panel-primary" data-collapsed="0">
		
			<div class="panel-heading">
				<div class="panel-title">
					自定义选项组信息
				</div>
			</div>
			
			<div class="panel-body"></br>
				
				<div class="form-horizontal form-groups-bordered">
	
					<div class="form-group">
						<label class="col-sm-3 control-label">名称</label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control" name="名称" value="<?php echo $cp['名称'] ?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-3 control-label">描述</label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control" name="描述" value="<?php echo $cp['描述'] ?>">
						</div>
					</div>

				</div>
				
			</div>
		
		</div>
	
	</div>
</div>
<div class="row">
	<div class="col-md-12">
<div class="table-responsive">
<table class="table table-bordered" id="table-user-all" style="min-width:1140px">
	<thead>
		<tr>
			<th>名称</th>
			<th>选项</th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($OSWAP_6e628f7005ba76fc9cfaa1e184341d62 as $OSWAP_8ac411dc055b62a426402a622f27da3b) { ?>
		<tr>
			<td><?php echo $OSWAP_8ac411dc055b62a426402a622f27da3b['选项名称'] ?></td>
			<td>
		<table class="table table-condensed">
			<tbody id="link-<?php echo $OSWAP_8ac411dc055b62a426402a622f27da3b['id'] ?>">
<?php if (array_key_exists($OSWAP_8ac411dc055b62a426402a622f27da3b['id'], $OSWAP_e98cc61e66a6d47ae5ce8a2363304f03)) { ?>
<?php foreach ($OSWAP_e98cc61e66a6d47ae5ce8a2363304f03[$OSWAP_8ac411dc055b62a426402a622f27da3b['id']] as $OSWAP_4a1a966fead36e2b8ce8bdc844afd732) { ?>
				<tr>
					<td><input type="text" name="旧内容[<?php echo $OSWAP_4a1a966fead36e2b8ce8bdc844afd732['id'] ?>]" class="form-control" value="<?php echo $OSWAP_4a1a966fead36e2b8ce8bdc844afd732['选项名称'] ?>" /></td>
					<td><a href="javascript:void(0)" onclick="$.get('/index.php/Admin/configoptionsname_sc/<?php echo $OSWAP_4a1a966fead36e2b8ce8bdc844afd732['id'] ?>/<?php echo $OSWAP_8ac411dc055b62a426402a622f27da3b['id'] ?>/',function(data){if(data=='ok') location.reload(); else swap_alert('error','删除失败',data);});" class="btn btn-danger">删除</a></td>
				</tr>
<?php
				} ?>
<?php
			} ?>
				<tr>
					<td><input type="text" name="新内容[<?php echo $OSWAP_8ac411dc055b62a426402a622f27da3b['id'] ?>][]" class="form-control" /></td>
					<td></td>
				</tr>
			</tbody>
		</table><a href="javascript:;" onclick="add_apped('<?php echo $OSWAP_8ac411dc055b62a426402a622f27da3b['id'] ?>');" class="btn btn-success">添加更多</a>
			</td>
			<td>
				<a href="javascript:void(0)" onclick="$.get('/index.php/Admin/configoptionssub_sc/<?php echo $OSWAP_8ac411dc055b62a426402a622f27da3b['id'] ?>/',function(data){if(data=='ok') location.reload(); else swap_alert('error','删除失败',data);});" class="btn btn-danger">删除</a>
			</td>
		</tr>
<?php
		} ?>
		<tr>
			<td><input type="text" name="新选项名称" value="" class="form-control" /></td>
			<td>
		<table class="table table-condensed">
			<tbody id="link-new">
				<tr>
					<td><input type="text" name="新选项内容[]" value="" class="form-control" /></td>
					<td></td>
				</tr>
			</tbody>
		</table><a href="javascript:;" onclick="add_new();" class="btn btn-success">添加更多</a>
			</td>
			<td></td>
		</tr>
	</tbody>
</table>
</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
			<div class="panel-body">
				
				<div class="form-horizontal form-groups-bordered">
					
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<a href="javascript:void(0)" onclick="$.post('/index.php/Admin/configoptions_detailed_form/<?php echo $cp['id'] ?>/',$('#form').serialize(),function(data){if(data=='ok') location.reload(); else swap_alert('error','修改失败',data);});" class="btn btn-success">保存</a>
						</div>
					</div>
				</div>
				
			</div>
		
		</div>
	
	</div>
</div>
</form>
<?php
		echo "</div>";
		echo "</div></div>";
		AdminT::page_footer();
		echo "</div></main>";
		AdminT::cd_nav();
		AdminT::pjs();
		echo "<script src=\"/admin_assets/plugins/waypoints/jquery.waypoints.min.js\"></script><script src=\"/admin_assets/plugins/jquery-counterup/jquery.counterup.min.js\"></script><script src=\"/admin_assets/plugins/toastr/toastr.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.time.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.symbol.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.resize.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.tooltip.min.js\"></script><script src=\"/admin_assets/plugins/curvedlines/curvedLines.js\"></script><script src=\"/admin_assets/plugins/metrojs/MetroJs.min.js\"></script><script src=\"/admin_assets/plugins/morris/raphael.min.js\"></script><script src=\"/admin_assets/plugins/morris/morris.min.js\"></script><script src=\"/admin_assets/js/modern.min.js\"></script>";
		echo "<script src=\"/admin_assets/plugins/datatables/js/jquery.dataTables.min.js\"></script>";
		echo "<script>var extable;\$(document).ready(function() {extable=\$('#example').DataTable({\"language\":{\"url\":\"https://cdn.datatables.net/plug-ins/e9421181788/i18n/Chinese.json\"}});});</script>"; ?>
<script>
function add_apped(id){
	$('#link-'+id).append('<tr><td><input type="text" name="新内容['+id+'][]" class="form-control" /></td><td></td></tr>');
}
function add_new(){
	$('#link-new').append('<tr><td><input type="text" name="新选项内容[]" class="form-control" /></td><td></td></tr>');
}
</script>
<?php
		echo "</body></html>";
	}
	function configoptions_detailed_form() {
		need_admin();
		$id = mac_url_get(1);
		if (empty($id)) die('参数错误');
		$OSWAP_0d07de59261cc2c9023b194184c575fb = _POST('名称');
		if (empty($OSWAP_0d07de59261cc2c9023b194184c575fb)) die('名称不能为空');
		$OSWAP_aacc01b428f8b2de58f0ab9e8b7642c8 = _POST('描述');
		$OSWAP_a6a4a328a6baee693f0e798b29e55149 = _POST('新选项名称');
		$OSWAP_66b6bb627de093bd28d7544ffc521070 = _POST('新选项内容');
		$OSWAP_8ac411dc055b62a426402a622f27da3b = _POST('新内容');
		$OSWAP_62daedc9da7dfd08e5d98ec963f35fbf = _POST('旧内容');
		SMACSQL()->update('产品配置选项组表', "名称='" . $OSWAP_0d07de59261cc2c9023b194184c575fb . "',描述='" . $OSWAP_aacc01b428f8b2de58f0ab9e8b7642c8 . "'", "id='" . $id . "'");
		if (!empty($OSWAP_a6a4a328a6baee693f0e798b29e55149)) {
			SMACSQL()->insert('产品配置选项', "组id,选项名称,选项类型", "'" . $id . "','" . $OSWAP_a6a4a328a6baee693f0e798b29e55149 . "','1'");
			$OSWAP_1407c4522ede6fec762cc4d2ebe4ecdf = SMACSQL()->insert_id();
			foreach ($OSWAP_66b6bb627de093bd28d7544ffc521070 as $tempvalue) {
				if (!empty($tempvalue)) {
					SMACSQL()->insert('产品配置选项名称', "配置id,选项名称", "'" . $OSWAP_1407c4522ede6fec762cc4d2ebe4ecdf . "','" . $tempvalue . "'");
				}
			}
		}
		foreach ($OSWAP_8ac411dc055b62a426402a622f27da3b as $OSWAP_51d4cad9672e6605c99e0c3d678f456e => $tempvalue) {
			foreach ($tempvalue as $OSWAP_31bb5897a4cf8155e2d7054f8ef132dd) {
				if (!empty($OSWAP_31bb5897a4cf8155e2d7054f8ef132dd)) {
					SMACSQL()->insert('产品配置选项名称', "配置id,选项名称", "'" . $OSWAP_51d4cad9672e6605c99e0c3d678f456e . "','" . $OSWAP_31bb5897a4cf8155e2d7054f8ef132dd . "'");
				}
			}
		}
		foreach ($OSWAP_62daedc9da7dfd08e5d98ec963f35fbf as $OSWAP_51d4cad9672e6605c99e0c3d678f456e => $OSWAP_31bb5897a4cf8155e2d7054f8ef132dd) {
			if (!empty($OSWAP_31bb5897a4cf8155e2d7054f8ef132dd)) {
				SMACSQL()->update('产品配置选项名称', "选项名称='" . $OSWAP_31bb5897a4cf8155e2d7054f8ef132dd . "'", "id='" . $OSWAP_51d4cad9672e6605c99e0c3d678f456e . "'");
			}
		}
		die('ok');
	}
	function configoptionsname_sc() {
		need_admin();
		$id = mac_url_get(1);
		$OSWAP_c883aa8abd38ad1f44fb0363ec00999b = mac_url_get(2);
		if (empty($id)) die('参数错误,请选择删除id');
		if (empty($OSWAP_c883aa8abd38ad1f44fb0363ec00999b)) die('参数错误,请选择删除id');
		SMACSQL()->select('产品配置选项名称', '*', "id='$id' and 配置id='" . $OSWAP_c883aa8abd38ad1f44fb0363ec00999b . "'");
		if (SMACSQL()->db_num_rows() == 0) die('not found');
		SMACSQL()->delete('产品配置选项名称', "id='$id' and 配置id='" . $OSWAP_c883aa8abd38ad1f44fb0363ec00999b . "'");
		die('ok');
	}
	function configoptionssub_sc() {
		need_admin();
		$id = mac_url_get(1);
		if (empty($id)) die('参数错误,请选择删除id');
		SMACSQL()->select('产品配置选项', '*', "id='$id'");
		if (SMACSQL()->db_num_rows() == 0) die('not found');
		SMACSQL()->delete('产品配置选项', "id='$id'");
		SMACSQL()->delete('产品配置选项名称', "配置id='" . $id . "'");
		die('ok');
	}
	function support() {
		need_admin();
		AdminT::header('支持', "<link href=\"/admin_assets/plugins/pricing-tables/css/style.css\" rel=\"stylesheet\" type=\"text/css\"><link href=\"/admin_assets/plugins/datatables/css/jquery.datatables.min.css\" rel=\"stylesheet\" type=\"text/css\"/><link href=\"/admin_assets/plugins/datatables/css/jquery.datatables_themeroller.css\" rel=\"stylesheet\" type=\"text/css\"/>");
		AdminT::search();
		echo "<main class=\"page-content content-wrap\">";
		AdminT::navbar();
		AdminT::sidebar();
		echo "<div class=\"page-inner\">";
		AdminT::title('支持');
		echo "<div id=\"main-wrapper\" class=\"container\">";
		echo '<div class="row">';
		echo '修改版并没有什么支持';
		echo '</div>';
		echo "</div></div>";
		AdminT::page_footer();
		echo "</div></main>";
		AdminT::cd_nav();
		AdminT::pjs();
		echo "<script src=\"/admin_assets/plugins/waypoints/jquery.waypoints.min.js\"></script><script src=\"/admin_assets/plugins/jquery-counterup/jquery.counterup.min.js\"></script><script src=\"/admin_assets/plugins/toastr/toastr.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.time.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.symbol.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.resize.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.tooltip.min.js\"></script><script src=\"/admin_assets/plugins/curvedlines/curvedLines.js\"></script><script src=\"/admin_assets/plugins/metrojs/MetroJs.min.js\"></script><script src=\"/admin_assets/plugins/morris/raphael.min.js\"></script><script src=\"/admin_assets/plugins/morris/morris.min.js\"></script><script src=\"/admin_assets/js/modern.min.js\"></script>";
		echo "<script src=\"/admin_assets/plugins/datatables/js/jquery.dataTables.min.js\"></script><script src=\"/admin_assets/plugins/pricing-tables/js/main.js\"></script>";
		echo "</body></html>";
	}
	function template_setting() {
		need_admin();
		if (!file_exists(SWAP_ROOT . SWAP_TEMPLATES_ROOT . SWAP_DIR_END . 'lib' . SWAP_DIR_END . 'setting.php')) swap_main_error_module('非法操作', '不存在模版设置模块', 1);
		SMACSQL()->select('插件配置', '*');
		while ($OSWAP_51d4cad9672e6605c99e0c3d678f456e = SMACSQL()->fetch_assoc()) {
			$OSWAP_7073d1c13fb1829eae073a71a399fbb4[] = $OSWAP_51d4cad9672e6605c99e0c3d678f456e;
		}
		foreach ($OSWAP_7073d1c13fb1829eae073a71a399fbb4 as $OSWAP_35dc7f635a88728b4d11a1cb0064532b) {
			$OSWAP_32593a98a91e974a3129c3d9b9a7f64b = $OSWAP_35dc7f635a88728b4d11a1cb0064532b['插件名称'];
			$OSWAP_7970669be20a9e73202bef5cccbcafe6 = $OSWAP_35dc7f635a88728b4d11a1cb0064532b['名'];
			$GLOBALS['swap_mac']['plug_config'][$OSWAP_32593a98a91e974a3129c3d9b9a7f64b][$OSWAP_7970669be20a9e73202bef5cccbcafe6] = $OSWAP_35dc7f635a88728b4d11a1cb0064532b['值'];
			unset($OSWAP_32593a98a91e974a3129c3d9b9a7f64b, $OSWAP_7970669be20a9e73202bef5cccbcafe6, $OSWAP_35dc7f635a88728b4d11a1cb0064532b);
		}
		AdminT::header('模版设置', "<link href=\"/admin_assets/plugins/datatables/css/jquery.datatables.min.css\" rel=\"stylesheet\" type=\"text/css\"/><link href=\"/admin_assets/plugins/datatables/css/jquery.datatables_themeroller.css\" rel=\"stylesheet\" type=\"text/css\"/>");
		AdminT::search();
		echo "<main class=\"page-content content-wrap\">";
		AdminT::navbar();
		AdminT::sidebar();
		echo "<div class=\"page-inner\">";
		AdminT::title('模版设置', '<li>网站设置</li>');
		echo "<div id=\"main-wrapper\" class=\"container\"><div class=\"row\">";
		echo "<div class=\"col-md-12\">";
		echo "<div class=\"table-responsive col-md-12\">";
		require_once SWAP_ROOT . SWAP_TEMPLATES_ROOT . SWAP_DIR_END . 'lib' . SWAP_DIR_END . 'setting.php';
		do_swap_plug('模版设置');
		echo "</div>";
		echo "</div>";
		echo "</div></div></div>";
		AdminT::page_footer();
		echo "</div></main>";
		AdminT::cd_nav();
		AdminT::pjs();
		echo "<script src=\"/admin_assets/plugins/waypoints/jquery.waypoints.min.js\"></script><script src=\"/admin_assets/plugins/jquery-counterup/jquery.counterup.min.js\"></script><script src=\"/admin_assets/plugins/toastr/toastr.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.time.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.symbol.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.resize.min.js\"></script><script src=\"/admin_assets/plugins/flot/jquery.flot.tooltip.min.js\"></script><script src=\"/admin_assets/plugins/curvedlines/curvedLines.js\"></script><script src=\"/admin_assets/plugins/metrojs/MetroJs.min.js\"></script><script src=\"/admin_assets/plugins/morris/raphael.min.js\"></script><script src=\"/admin_assets/plugins/morris/morris.min.js\"></script><script src=\"/admin_assets/js/modern.min.js\"></script>";
		echo "<script src=\"/admin_assets/plugins/datatables/js/jquery.dataTables.min.js\"></script>";
		echo "</body></html>";
	}
}
function str_is_int($OSWAP_cf104113aea177d5d1ff1177185f8b8b) {
	return 0 === strcmp($OSWAP_cf104113aea177d5d1ff1177185f8b8b, (int)$OSWAP_cf104113aea177d5d1ff1177185f8b8b);
}
