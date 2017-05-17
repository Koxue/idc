<?php
defined('SWAP_ROOT') or die('非法操作');
class qqlogin extends controller {
    function config() {
        SMACSQL()->query("	CREATE TABLE IF NOT EXISTS `QQ快速登录表` (  `id` int(11) NOT NULL AUTO_INCREMENT, `uid` int(11) NOT NULL, `qqid` text NOT NULL,  UNIQUE KEY `id` (`id`) ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1");
        return array(
            'swap_no_login' => array(
                'admin' => '1',
                'callback' => '1',
                'login' => '1',
                'bangding' => '1'
            ) ,
            'index' => '1',
            'login' => '0',
            'bangding' => '0'
        );
    }
    function tz($OSWAP_debdf55f1292a5ad6646e253c5c22486 = '', $zt = '', $OSWAP_6aaa41557b50a97b9e79fd41b528e854 = '') {
        redirect($this->cakurl() . "/{$OSWAP_debdf55f1292a5ad6646e253c5c22486}/?{$zt}=" . qqlogin_lang($OSWAP_6aaa41557b50a97b9e79fd41b528e854));
        die(qqlogin_lang($OSWAP_6aaa41557b50a97b9e79fd41b528e854));
    }
    function bangding() {
        $u = _POST('u');
        $p = _POST('p');
        $OSWAP_86e4810cab85973b5ba75b4792ffbf26 = session('qqlogin_get_openid');
        if ($OSWAP_86e4810cab85973b5ba75b4792ffbf26 == '') {
            $qc = new qcl();
            $qc->qq_login("sitedlswap");
            die();
        }
        if (_GET('ok') == 'ok') {
            if ($u == '' || $p == '') {
                $this->tz("plugin/qqlogin/bangding", "error", "用户名或密码不能为空");
            }
            D()->select('用户', '*', "(`用户名`='{$u}' OR `电子邮件`='{$u}') and (密码=MD5('swap{$p}') or 密码=PASSWORD('{$p}') or 密码=OLD_PASSWORD('{$p}'))");
            if (D()->db_num_rows() == 0) {
                $this->tz("plugin/qqlogin/bangding", "error", "用户名或密码不正确");
            }
            $OSWAP_6c7f029dff5ea7ecc9ba023451612e77 = D()->fetch_array();
            $OSWAP_4ed69b83d2af99b88e3a7426ae1348ca = $OSWAP_6c7f029dff5ea7ecc9ba023451612e77['uid'];
            D()->select('QQ快速登录表', '*', "qqid='{$OSWAP_86e4810cab85973b5ba75b4792ffbf26}'");
            if (D()->db_num_rows() > 0) {
                $this->tz("plugin/qqlogin/bangding", "error", "绑定失败,这个QQ号已经绑定了账户");
            }
            D()->select('QQ快速登录表', '*', "uid='{$OSWAP_4ed69b83d2af99b88e3a7426ae1348ca}'");
            if (D()->db_num_rows() > 0) {
                $this->tz("plugin/qqlogin/bangding", "error", "绑定失败,您的账户已经绑定了QQ号,如需更换绑定,请先解绑.");
            }
            D()->insert('QQ快速登录表', "`uid` ,`qqid` ", "'{$OSWAP_4ed69b83d2af99b88e3a7426ae1348ca}' ,'{$OSWAP_86e4810cab85973b5ba75b4792ffbf26}'");
            session('uid', $OSWAP_4ed69b83d2af99b88e3a7426ae1348ca);
            $this->tz("user/index", "success", "登陆成功!!欢迎回来!");
        }
        $lang = qqlogin_lang();
        TEMPLATE::assign('L', $lang);
        TEMPLATE::assign('t', $t);
        TEMPLATE::display('ksdlbd.html');
    }
    function callback() {
        $lang = plug_lang_get('qqlogin', 'main');
        $OSWAP_bc26cd194ddc4980ff25c3fab6a5ab76 = mac_url_get(1);
        $OSWAP_094e3815c3d04c5ad48cf583e1e9f766 = session('uid');
        if ($OSWAP_bc26cd194ddc4980ff25c3fab6a5ab76 == 'bdqx') {
            $p = _POST("pass");
            if ($OSWAP_094e3815c3d04c5ad48cf583e1e9f766 == '') {
                exit($lang['非法操作']);
            }
            D()->select('用户', '*', "(uid='{$OSWAP_094e3815c3d04c5ad48cf583e1e9f766}') and (密码=MD5('swap{$p}') or 密码=PASSWORD('{$p}') or 密码=OLD_PASSWORD('{$p}'))");
            if (D()->db_num_rows() == 0) {
                $this->tz("plugin/qqlogin/index", "error", "密码不符,解除绑定失败");
            }
            D()->delete('QQ快速登录表', "uid='{$OSWAP_094e3815c3d04c5ad48cf583e1e9f766}'");
            $this->tz("plugin/qqlogin/index", "success", "解除绑定完成");
            die();
        }
        if ($OSWAP_bc26cd194ddc4980ff25c3fab6a5ab76 == 'bdqxjm') {
            if ($OSWAP_094e3815c3d04c5ad48cf583e1e9f766 == '') {
                exit($lang['非法操作']);
            }
            TEMPLATE::display('jbpass.tpl');
            die();
        }
        $qc = new qcl();
        $OSWAP_86e4810cab85973b5ba75b4792ffbf26 = $qc->get_openid($OSWAP_bc26cd194ddc4980ff25c3fab6a5ab76);
        if ($OSWAP_86e4810cab85973b5ba75b4792ffbf26 == "") {
            exit("非法来源,如果您是正常操作请联系网站管理员解决");
        }
        if ($OSWAP_bc26cd194ddc4980ff25c3fab6a5ab76 == 'sitedlswap') {
            D()->select('QQ快速登录表', '*', "qqid='{$OSWAP_86e4810cab85973b5ba75b4792ffbf26}'");
            if (D()->db_num_rows() == 0) {
                session('qqlogin_get_openid', $OSWAP_86e4810cab85973b5ba75b4792ffbf26);
                $this->tz("plugin/qqlogin/bangding", "error", "登陆失败,您还没有绑定您的账户");
            }
            $OSWAP_00fc7a8a39ea1518d7589dfe9fff747f = D()->fetch_array();
            session('uid', $OSWAP_00fc7a8a39ea1518d7589dfe9fff747f['uid']);
            $this->tz("user/index", "success", "登陆成功!!欢迎回来!");
            die('登陆成功');
        }
        if ($OSWAP_094e3815c3d04c5ad48cf583e1e9f766 == '') {
            exit($lang['非法操作']);
        }
        if ($OSWAP_bc26cd194ddc4980ff25c3fab6a5ab76 == 'bdok') {
            D()->select('QQ快速登录表', '*', "qqid='{$OSWAP_86e4810cab85973b5ba75b4792ffbf26}'");
            if (D()->db_num_rows() > 0) {
                $this->tz("plugin/qqlogin/index", "error", "绑定失败,这个QQ号已经绑定了账户");
            }
            D()->select('QQ快速登录表', '*', "uid='{$OSWAP_094e3815c3d04c5ad48cf583e1e9f766}'");
            if (D()->db_num_rows() > 0) {
                $this->tz("plugin/qqlogin/index", "error", "绑定失败,您的账户已经绑定了QQ号,如需更换绑定,请先解绑.");
            }
            D()->insert('QQ快速登录表', "`uid` ,`qqid` ", "'{$OSWAP_094e3815c3d04c5ad48cf583e1e9f766}' ,'{$OSWAP_86e4810cab85973b5ba75b4792ffbf26}'");
            $this->tz("plugin/qqlogin/index", "success", "绑定成功");
        }
    }
    function index() {
        $OSWAP_bc26cd194ddc4980ff25c3fab6a5ab76 = mac_url_get(1);
        $OSWAP_094e3815c3d04c5ad48cf583e1e9f766 = session('uid');
        $lang = qqlogin_lang();
        if ($OSWAP_bc26cd194ddc4980ff25c3fab6a5ab76 == "next") {
            D()->select('QQ快速登录表', '*', "uid='{$OSWAP_094e3815c3d04c5ad48cf583e1e9f766}'");
            if (D()->db_num_rows() == 0) {
                $qc = new qcl();
                $qc->qq_login("bdok");
            } else {
                $this->tz("plugin/qqlogin/callback/bdqxjm", "", "");
            }
            die();
        }
        D()->select('QQ快速登录表', '*', "uid='{$OSWAP_094e3815c3d04c5ad48cf583e1e9f766}'");
        if (D()->db_num_rows() == 0) {
            $t['状态'] = "no";
        } else {
            $t['状态'] = "yes";
        }
        TEMPLATE::assign('L', $lang);
        TEMPLATE::assign('t', $t);
        TEMPLATE::display('index.tpl');
    }
    function login() {
        $qc = new qcl();
        $qc->qq_login("sitedlswap");
    }
    function admin() {
        need_admin();
        $OSWAP_354bb3e6be0af2412f7f701b5f773aac = "qqlogin";
        $OSWAP_32a076e907c243d57b3678d9a2bae94e = "QQ快速登陆设置";
        $OSWAP_bc26cd194ddc4980ff25c3fab6a5ab76 = mac_url_get(1);
        $id = "";
        $id = mac_url_get(2);
        $ok = "";
        $ok = mac_url_get(3);
        $OSWAP_0d5207fb5dde8dcf96dbf85d5ba5e17c = "http://{$_SERVER['HTTP_HOST']}/index.php/plugin/qqlogin/callback/bdok/;";
        $OSWAP_0d5207fb5dde8dcf96dbf85d5ba5e17c.= "http://{$_SERVER['HTTP_HOST']}/index.php/plugin/qqlogin/callback/sitedlswap/;";
        if (is_ssl()) {
            $OSWAP_0d5207fb5dde8dcf96dbf85d5ba5e17c = "https://{$_SERVER['HTTP_HOST']}/index.php/plugin/qqlogin/callback/bdok/;";
            $OSWAP_0d5207fb5dde8dcf96dbf85d5ba5e17c.= "https://{$_SERVER['HTTP_HOST']}/index.php/plugin/qqlogin/callback/sitedlswap/;";
        }
        $OSWAP_8ac18492c3750ee126ddb7dd0c4d4104 = array(
            array(
                '验证标签',
                'text',
                '<code>< meta property="qc:admins" content="填写验证中的这里面的内容" /></code>'
            ) ,
            array(
                '应用id',
                'text',
                ''
            ) ,
            array(
                '应用Key',
                'text',
                ''
            )
        );
        if ($OSWAP_bc26cd194ddc4980ff25c3fab6a5ab76 == "editok") {
            foreach ($OSWAP_8ac18492c3750ee126ddb7dd0c4d4104 as $OSWAP_520703cd927c326ec6eb36a161fe4441 => $OSWAP_202fa16578799a4babd9d79fa1c42f96) {
                plug_eva($OSWAP_354bb3e6be0af2412f7f701b5f773aac, $OSWAP_202fa16578799a4babd9d79fa1c42f96[0], _POST($OSWAP_202fa16578799a4babd9d79fa1c42f96[0]));
            }
            die("修改完成ok");
        }
        AdminT::header($OSWAP_32a076e907c243d57b3678d9a2bae94e, '');
        AdminT::search();
        echo '<main class="page-content content-wrap">';
        AdminT::navbar();
        AdminT::sidebar();
        echo '<div class="page-inner">';
        AdminT::title($OSWAP_32a076e907c243d57b3678d9a2bae94e, '<li>网站设置</li>'); ?>	
					<style type="text/css"> pre { white-space: pre-wrap;word-wrap: break-word;} </style>
<div id="main-wrapper" class="container"><div class="row"><div class="col-md-12"><div class="panel panel-primary"><div class="panel-body"><form role="form" id="settingfrom" class="form-horizontal form-groups-bordered">
<?php
        $OSWAP_8ac18492c3750ee126ddb7dd0c4d4104[] = array(
            '申请开通地址',
            'url:',
            'http://connect.qq.com/'
        );
        $OSWAP_8ac18492c3750ee126ddb7dd0c4d4104[] = array(
            '回调授权地址',
            "<pre id=\"xyqxdng\" >{$OSWAP_0d5207fb5dde8dcf96dbf85d5ba5e17c}</pre>",
        );
        foreach ($OSWAP_8ac18492c3750ee126ddb7dd0c4d4104 as $OSWAP_520703cd927c326ec6eb36a161fe4441 => $OSWAP_460872bccad893ec99f744604b22d5b4) {
            $OSWAP_460872bccad893ec99f744604b22d5b4[3] = plug_eva($OSWAP_354bb3e6be0af2412f7f701b5f773aac, $OSWAP_460872bccad893ec99f744604b22d5b4[0]);
            if ($OSWAP_460872bccad893ec99f744604b22d5b4[1] == 'text') {
                $OSWAP_840cd0e016db83aedc17cb3cef69a58a = "<input type=\"{$OSWAP_460872bccad893ec99f744604b22d5b4[1]}\" value=\"{$OSWAP_460872bccad893ec99f744604b22d5b4[3]}\" name=\"{$OSWAP_460872bccad893ec99f744604b22d5b4[0]}\" class=\"form-control\">";
            } elseif ($OSWAP_460872bccad893ec99f744604b22d5b4[1] == 'yesno') {
                if ($OSWAP_460872bccad893ec99f744604b22d5b4[3] == 'on') {
                    $OSWAP_460872bccad893ec99f744604b22d5b4['yes_yesno'] = 'checked="checked"';
                } else {
                    $OSWAP_460872bccad893ec99f744604b22d5b4['no_yesno'] = 'checked="checked"';
                }
                $OSWAP_840cd0e016db83aedc17cb3cef69a58a = "<label><input type=\"radio\" name=\"{$OSWAP_460872bccad893ec99f744604b22d5b4[0]}\" value=\"on\"{$OSWAP_460872bccad893ec99f744604b22d5b4['yes_yesno']}/ >是 </label><label><input type=\"radio\" name=\"{$OSWAP_460872bccad893ec99f744604b22d5b4[0]}\" value=\"off\" {$OSWAP_460872bccad893ec99f744604b22d5b4['no_yesno']} />否</label> ";
            } else {
                $OSWAP_840cd0e016db83aedc17cb3cef69a58a = "{$OSWAP_460872bccad893ec99f744604b22d5b4[1]} {$OSWAP_460872bccad893ec99f744604b22d5b4[3]}";
            }
            echo ("<div class=\"form-group\"><label class=\"col-sm-3 control-label\">{$OSWAP_460872bccad893ec99f744604b22d5b4[0]}</label><div class=\"col-sm-5\">{$OSWAP_840cd0e016db83aedc17cb3cef69a58a}{$OSWAP_460872bccad893ec99f744604b22d5b4[2]}</div></div>");
        } ?> <div class="form-group"><div class="col-sm-offset-3 col-sm-5"><a href="javascript:void(0)" onclick="$.post('/index.php/plugin/<?php
        echo $OSWAP_354bb3e6be0af2412f7f701b5f773aac; ?>/admin/editok/',$('#settingfrom').serialize(),function(data){if(data.match('ok')=='ok') swap_alert('success','保存成功',data); else swap_alert('error','保存失败',data);});" class="btn btn-success">保存更改</a></div></div></form></div></div></div></div></div></div>
<script type="text/javascript" language="javascript">
$("#xyqxdng").select();
$("#xyqxdng").click( function(){ $("#xyqxdng").select();} );
</script><?php
        AdminT::page_footer();
        echo '</div></main>';
        AdminT::cd_nav();
        AdminT::pjs();
        echo '<script src="/admin_assets/plugins/waypoints/jquery.waypoints.min.js"></script><script src="/admin_assets/plugins/jquery-counterup/jquery.counterup.min.js"></script><script src="/admin_assets/plugins/toastr/toastr.min.js"></script><script src="/admin_assets/plugins/flot/jquery.flot.min.js"></script><script src="/admin_assets/plugins/flot/jquery.flot.time.min.js"></script><script src="/admin_assets/plugins/flot/jquery.flot.symbol.min.js"></script><script src="/admin_assets/plugins/flot/jquery.flot.resize.min.js"></script><script src="/admin_assets/plugins/flot/jquery.flot.tooltip.min.js"></script><script src="/admin_assets/plugins/curvedlines/curvedLines.js"></script><script src="/admin_assets/plugins/metrojs/MetroJs.min.js"></script><script src="/admin_assets/plugins/morris/raphael.min.js"></script><script src="/admin_assets/plugins/morris/morris.min.js"></script><script src="/admin_assetsjs/modern.min.js"></script><script src="/admin_assets/plugins/datatables/js/jquery.dataTables.min.js"></script><script>var extable;$(document).ready(function() {extable=$(\'#example\').DataTable({"language":{"url":"https://cdn.datatables.net/plug-ins/e9421181788/i18n/Chinese.json"}});});</script></body></html>';
    }
}

