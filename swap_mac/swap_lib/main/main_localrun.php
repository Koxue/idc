<?php
function get_df($OSWAP_0d07de59261cc2c9023b194184c575fb) {
    $temp = get_defined_constants(true);
    return $temp['user'][$OSWAP_0d07de59261cc2c9023b194184c575fb];
}
function get_mysql() {
    $config = require SWAP_CONFIGS . 'config.php';
    return $config;
}
function get_cpanel_config($OSWAP_0d07de59261cc2c9023b194184c575fb) {
    if (!function_exists($OSWAP_0d07de59261cc2c9023b194184c575fb . "_ConfigOptions")) {
        $OSWAP_2b274b1611c149c99f706cb822116d2epath = SWAP_LIB . "servers/" . $OSWAP_0d07de59261cc2c9023b194184c575fb . "/" . $OSWAP_0d07de59261cc2c9023b194184c575fb . ".php";
        if (file_exists($OSWAP_2b274b1611c149c99f706cb822116d2epath)) {
            requirer($OSWAP_2b274b1611c149c99f706cb822116d2epath);
        }
    }
    if (function_exists($OSWAP_0d07de59261cc2c9023b194184c575fb . "_ConfigOptions")) {
        $OSWAP_2e29d37ed05a8087327b406a5df9d569 = call_user_func($OSWAP_0d07de59261cc2c9023b194184c575fb . "_ConfigOptions");
    } else {
        $OSWAP_2e29d37ed05a8087327b406a5df9d569 = "服务器模块不支持的功能";
    }
    return $OSWAP_2e29d37ed05a8087327b406a5df9d569;
}
function zipunexe($OSWAP_4bc309caf8c2e5f271253a12e5db051c, $OSWAP_b69a7729e1ccb4639eb5b5295a641bad) {
    import("swap.PclZip");
    if (!file_exists($OSWAP_4bc309caf8c2e5f271253a12e5db051c)) return false;
    $OSWAP_28efa2864101921c43e9c82d92a7f753 = new PclZip($OSWAP_4bc309caf8c2e5f271253a12e5db051c);
    $OSWAP_28efa2864101921c43e9c82d92a7f753->extract(PCLZIP_OPT_PATH, $OSWAP_b69a7729e1ccb4639eb5b5295a641bad);
    return true;
}
function filedown($OSWAP_4bc309caf8c2e5f271253a12e5db051c, $OSWAP_0b36a49bb9425668c3e1b3792901c03b) {
    return file_put_contents($OSWAP_4bc309caf8c2e5f271253a12e5db051c, file_get_contents($OSWAP_0b36a49bb9425668c3e1b3792901c03b));
}
function SMACSQL() {
    return D();
}
function GETADMINNAME() {
    return '管理员';
}
function WebStatic($OSWAP_4088ff53c415f4293a441dd00c1aee5b = NULL) {
    static $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b = false;
    if ($OSWAP_4088ff53c415f4293a441dd00c1aee5b !== NULL) $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b = $OSWAP_4088ff53c415f4293a441dd00c1aee5b;
    if ($OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b) return '';
    else return '/index.php';
}
class User {
    static function Uid() {
        $OSWAP_b59487239706386f068f2549a4adfa62 = session('uid');
        if ($OSWAP_b59487239706386f068f2549a4adfa62 == '') return false;
        else return $OSWAP_b59487239706386f068f2549a4adfa62;
    }
    static function Info($OSWAP_b59487239706386f068f2549a4adfa62) {
        D()->select('用户', '*', "uid='$OSWAP_b59487239706386f068f2549a4adfa62'");
        if (D()->db_num_rows() == 0) return false;
        return D()->fetch_array();
    }
    static function Out() {
        if (session('uid') != '') {
            session('uid', NULL);
            redirect(WebStatic() . '/index/login/');
        }
        return true;
    }
}
class Order {
    static function Inventory($OSWAP_97a016e66275c6039729b703b9d85f30, $OSWAP_c6d66b1733836e973bcb9d7fbc34a08f = false, $OSWAP_75422ea9546d0f9bd8ba2488603f48a6 = 1) {
        if ($OSWAP_c6d66b1733836e973bcb9d7fbc34a08f) D()->update('产品', "库存=库存+" . $OSWAP_75422ea9546d0f9bd8ba2488603f48a6, "id='" . $OSWAP_97a016e66275c6039729b703b9d85f30 . "'");
        else D()->update('产品', "库存=库存-" . $OSWAP_75422ea9546d0f9bd8ba2488603f48a6, "id='" . $OSWAP_97a016e66275c6039729b703b9d85f30 . "'");
        return true;
    }
    static function Create($OSWAP_b59487239706386f068f2549a4adfa62, $OSWAP_97a016e66275c6039729b703b9d85f30, $OSWAP_b7da14f6d30a57d6556466c8bacc5350, $lx, $OSWAP_82bdfee4b92084c05ac3b384dd79c752, $OSWAP_ecd5611555a600e7f5823c5b9e6e1329, $OSWAP_52f9dec452091441f61b47d651724908, $OSWAP_c7ff9a54db2f6defc8cfbefa08395009) {
        $OSWAP_ecd5611555a600e7f5823c5b9e6e1329 = str_replace('\\', '\\\\', $OSWAP_ecd5611555a600e7f5823c5b9e6e1329);
        D()->insert('服务', '帐号id,产品id,服务器id,类型,申请时间,开通时间,到期时间,域名,状态,付款方法,周期,注释,购买数量', "'" . $OSWAP_b59487239706386f068f2549a4adfa62 . "','" . $OSWAP_97a016e66275c6039729b703b9d85f30 . "','" . $OSWAP_b7da14f6d30a57d6556466c8bacc5350 . "','" . $lx . "',now(),now(),now(),'" . $OSWAP_82bdfee4b92084c05ac3b384dd79c752 . "','等待付款','预存款','" . $OSWAP_ecd5611555a600e7f5823c5b9e6e1329 . "','" . $OSWAP_52f9dec452091441f61b47d651724908 . "','" . $OSWAP_c7ff9a54db2f6defc8cfbefa08395009 . "'");
        return D()->getid();
    }
    static function OnlyOne($OSWAP_b59487239706386f068f2549a4adfa62, $OSWAP_97a016e66275c6039729b703b9d85f30) {
        D()->select('服务', '*', "帐号id='" . $OSWAP_b59487239706386f068f2549a4adfa62 . "' AND 状态<>'停止' AND 产品id='" . $OSWAP_97a016e66275c6039729b703b9d85f30 . "'");
        if (D()->db_num_rows() != 0) return false;
        else return true;
    }
    static function AllowNum($OSWAP_b59487239706386f068f2549a4adfa62, $OSWAP_97a016e66275c6039729b703b9d85f30, $OSWAP_b5966f537cc8e7710cdb306ca68f8f18) {
        D()->select('服务', '*', "帐号id='" . $OSWAP_b59487239706386f068f2549a4adfa62 . "' AND 状态<>'停止' AND 产品id='" . $OSWAP_97a016e66275c6039729b703b9d85f30 . "'");
        if (D()->db_num_rows() >= $OSWAP_b5966f537cc8e7710cdb306ca68f8f18) return false;
        else return true;
    }
}
class localrun {
    static function control() {
        $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b = array();
        SMACSQL()->select('用户', 'count(*)');
        $temprow = SMACSQL()->fetch_array();
        $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['usernum'] = $temprow[0];
        SMACSQL()->select('服务', 'count(*)', "状态='激活'");
        $temprow = SMACSQL()->fetch_array();
        $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['jhnum'] = $temprow[0];
        SMACSQL()->select('服务', 'count(*)', "状态='等待审核'");
        $temprow = SMACSQL()->fetch_array();
        $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['shnum'] = $temprow[0];
        SMACSQL()->select('服务单表', 'count(*)', "状态='开放'");
        $temprow = SMACSQL()->fetch_array();
        $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['gdnum'] = $temprow[0];
        SMACSQL()->select('用户', "count(*),date_format(注册时间,'%m'),date_format(注册时间,'%Y')", "date_format(注册时间,'%Y')=date_format(now(),'%Y') group by date_format(注册时间,'%m');");
        $temprow = array();
        while ($OSWAP_51d4cad9672e6605c99e0c3d678f456e = SMACSQL()->fetch_assoc()) {
            $temprow[] = $OSWAP_51d4cad9672e6605c99e0c3d678f456e;
        }
        $OSWAP_30b31a94e0c5a437f6c1c6006e473bc5_chart = array(
            '01' => '0',
            '02' => '0',
            '03' => '0',
            '04' => '0',
            '05' => '0',
            '06' => '0',
            '07' => '0',
            '08' => '0',
            '09' => '0',
            '10' => '0',
            '11' => '0',
            '12' => '0',
            '年' => '0'
        );
        foreach ($temprow as $OSWAP_31bb5897a4cf8155e2d7054f8ef132dd) {
            if ($OSWAP_31bb5897a4cf8155e2d7054f8ef132dd) {
                $tempm = isset($OSWAP_31bb5897a4cf8155e2d7054f8ef132dd["date_format(注册时间,'%m')"]) ? $OSWAP_31bb5897a4cf8155e2d7054f8ef132dd["date_format(注册时间,'%m')"] : '';
                $OSWAP_30b31a94e0c5a437f6c1c6006e473bc5_chart[$tempm] = isset($OSWAP_31bb5897a4cf8155e2d7054f8ef132dd["count(*)"]) ? $OSWAP_31bb5897a4cf8155e2d7054f8ef132dd["count(*)"] : '';
                $OSWAP_30b31a94e0c5a437f6c1c6006e473bc5_chart['年'] = isset($OSWAP_31bb5897a4cf8155e2d7054f8ef132dd["date_format(注册时间,'%Y')"]) ? $OSWAP_31bb5897a4cf8155e2d7054f8ef132dd["date_format(注册时间,'%Y')"] : '';
            }
        }
        $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['user_chart'] = $OSWAP_30b31a94e0c5a437f6c1c6006e473bc5_chart;
        SMACSQL()->select('服务', "count(*),date_format(开通时间,'%m'),date_format(开通时间,'%Y')", "date_format(开通时间,'%Y')=date_format(now(),'%Y') and 状态='激活' group by date_format(开通时间,'%m');");
        unset($temprow);
        $temprow = array();
        while ($OSWAP_51d4cad9672e6605c99e0c3d678f456e = SMACSQL()->fetch_assoc()) {
            $temprow[] = $OSWAP_51d4cad9672e6605c99e0c3d678f456e;
        }
        $OSWAP_b7da14f6d30a57d6556466c8bacc5350_chart['1'] = array(
            '01' => '0',
            '02' => '0',
            '03' => '0',
            '04' => '0',
            '05' => '0',
            '06' => '0',
            '07' => '0',
            '08' => '0',
            '09' => '0',
            '10' => '0',
            '11' => '0',
            '12' => '0'
        );
        foreach ($temprow as $OSWAP_31bb5897a4cf8155e2d7054f8ef132dd) {
            if ($OSWAP_31bb5897a4cf8155e2d7054f8ef132dd) {
                $tempm = $OSWAP_31bb5897a4cf8155e2d7054f8ef132dd["date_format(开通时间,'%m')"];
                $OSWAP_b7da14f6d30a57d6556466c8bacc5350_chart['1'][$tempm] = $OSWAP_31bb5897a4cf8155e2d7054f8ef132dd["count(*)"];
                $OSWAP_b7da14f6d30a57d6556466c8bacc5350_chart['年'] = $OSWAP_31bb5897a4cf8155e2d7054f8ef132dd["date_format(开通时间,'%Y')"];
            }
        }
        SMACSQL()->select('服务', "count(*),date_format(开通时间,'%m'),date_format(开通时间,'%Y')", "date_format(开通时间,'%Y')=date_format(now(),'%Y') and 状态='暂停' group by date_format(开通时间,'%m');");
        unset($temprow);
        $temprow = array();
        while ($OSWAP_51d4cad9672e6605c99e0c3d678f456e = SMACSQL()->fetch_assoc()) {
            $temprow[] = $OSWAP_51d4cad9672e6605c99e0c3d678f456e;
        }
        $OSWAP_b7da14f6d30a57d6556466c8bacc5350_chart['2'] = array(
            '01' => '0',
            '02' => '0',
            '03' => '0',
            '04' => '0',
            '05' => '0',
            '06' => '0',
            '07' => '0',
            '08' => '0',
            '09' => '0',
            '10' => '0',
            '11' => '0',
            '12' => '0'
        );
        foreach ($temprow as $OSWAP_31bb5897a4cf8155e2d7054f8ef132dd) {
            if ($OSWAP_31bb5897a4cf8155e2d7054f8ef132dd) {
                $tempm = $OSWAP_31bb5897a4cf8155e2d7054f8ef132dd["date_format(开通时间,'%m')"];
                $OSWAP_b7da14f6d30a57d6556466c8bacc5350_chart['2'][$tempm] = $OSWAP_31bb5897a4cf8155e2d7054f8ef132dd["count(*)"];
                $OSWAP_b7da14f6d30a57d6556466c8bacc5350_chart['年'] = $OSWAP_31bb5897a4cf8155e2d7054f8ef132dd["date_format(开通时间,'%Y')"];
            }
        }
        SMACSQL()->select('服务', "count(*),date_format(开通时间,'%m'),date_format(开通时间,'%Y')", "date_format(开通时间,'%Y')=date_format(now(),'%Y') and 状态='等待审核' group by date_format(开通时间,'%m');");
        unset($temprow);
        $temprow = array();
        while ($OSWAP_51d4cad9672e6605c99e0c3d678f456e = SMACSQL()->fetch_assoc()) {
            $temprow[] = $OSWAP_51d4cad9672e6605c99e0c3d678f456e;
        }
        $OSWAP_b7da14f6d30a57d6556466c8bacc5350_chart['3'] = array(
            '01' => '0',
            '02' => '0',
            '03' => '0',
            '04' => '0',
            '05' => '0',
            '06' => '0',
            '07' => '0',
            '08' => '0',
            '09' => '0',
            '10' => '0',
            '11' => '0',
            '12' => '0'
        );
        foreach ($temprow as $OSWAP_31bb5897a4cf8155e2d7054f8ef132dd) {
            if ($OSWAP_31bb5897a4cf8155e2d7054f8ef132dd) {
                $tempm = $OSWAP_31bb5897a4cf8155e2d7054f8ef132dd["date_format(开通时间,'%m')"];
                $OSWAP_b7da14f6d30a57d6556466c8bacc5350_chart['3'][$tempm] = $OSWAP_31bb5897a4cf8155e2d7054f8ef132dd["count(*)"];
                $OSWAP_b7da14f6d30a57d6556466c8bacc5350_chart['年'] = $OSWAP_31bb5897a4cf8155e2d7054f8ef132dd["date_format(开通时间,'%Y')"];
            }
        }
        $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['server_chart'] = $OSWAP_b7da14f6d30a57d6556466c8bacc5350_chart;
        SMACSQL()->select('产品', 'count(*)');
        $temprow = SMACSQL()->fetch_array();
        $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['servergnum'] = $temprow[0];
        SMACSQL()->select('服务器表', 'count(*)');
        $temprow = SMACSQL()->fetch_array();
        $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['serversnum'] = $temprow[0];
        SMACSQL()->select('用户', 'uid,用户名,电子邮件,注册时间', "禁止='0' ORDER BY 注册时间 DESC LIMIT 3");
        unset($temprow);
        $temprow = array();
        while ($OSWAP_51d4cad9672e6605c99e0c3d678f456e = SMACSQL()->fetch_assoc()) {
            $temprow[] = $OSWAP_51d4cad9672e6605c99e0c3d678f456e;
        }
        $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['lastreg'] = $temprow;
        SMACSQL()->select('服务', "count(*),产品id", "(状态='激活' or 状态='暂停') group by 产品id");
        unset($temprow);
        $temprow = array();
        while ($OSWAP_51d4cad9672e6605c99e0c3d678f456e = SMACSQL()->fetch_assoc()) {
            $temprow[] = $OSWAP_51d4cad9672e6605c99e0c3d678f456e;
        }
        $OSWAP_b7da14f6d30a57d6556466c8bacc5350pie = array();
        foreach ($temprow as $OSWAP_31bb5897a4cf8155e2d7054f8ef132dd) {
            SMACSQL()->select('产品', "名称", "id='" . $OSWAP_31bb5897a4cf8155e2d7054f8ef132dd['产品id'] . "'");
            $temprows = SMACSQL()->fetch_array();
            $tempname = $temprows['名称'];
            $OSWAP_b7da14f6d30a57d6556466c8bacc5350pie[] = array(
                '名称' => $tempname,
                '数量' => $OSWAP_31bb5897a4cf8155e2d7054f8ef132dd['count(*)']
            );
        }
        $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['serverpie'] = $OSWAP_b7da14f6d30a57d6556466c8bacc5350pie;
        if (RUN_ENV == 'LOCAL') $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['RUN_ENV'] = '正常环境';
        else $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b['RUN_ENV'] = RUN_ENV;
        return $OSWAP_4c31c7e36ba871dcf8b7aded1e15f34b;
    }
    static function ticket_open() {
        SMACSQL()->select("服务单表", '*', "状态='开放' order by 最后时间 desc");
        $OSWAP_9ad0a90d349c03b274a3c5eff195e14c = array();
        while ($OSWAP_51d4cad9672e6605c99e0c3d678f456e = SMACSQL()->fetch_assoc()) {
            $OSWAP_9ad0a90d349c03b274a3c5eff195e14c[] = $OSWAP_51d4cad9672e6605c99e0c3d678f456e;
        }
        return $OSWAP_9ad0a90d349c03b274a3c5eff195e14c;
    }
    static function ticket_detailed($id, $OSWAP_6bc38b295560eb8d703e5b998a115c62, $OSWAP_0e8ae8cc9b95f1de8d037038d2a1eeed, $OSWAP_b59487239706386f068f2549a4adfa62, $OSWAP_30b31a94e0c5a437f6c1c6006e473bc5) {
        SMACSQL()->select('服务单表', '*', "id='" . $id . "'");
        if (SMACSQL()->db_num_rows() == 0) return array(
            'lx' => 'redirect',
            'msg' => '服务单不存在',
            'url' => '/index.php/swapidc/control/#' . urlencode('服务单不存在')
        );
        if ($OSWAP_6bc38b295560eb8d703e5b998a115c62 == 'close') {
            SMACSQL()->update('服务单表', "状态='关闭'", "id='$id'");
            do_swap_plug('工单关闭', $id);
            return array(
                'lx' => 'die',
                'msg' => 'ok'
            );
        }
        $OSWAP_f8c16f19236fd4a7fafdc9fe97e2ea1a = SMACSQL()->fetch_array();
        if ($OSWAP_0e8ae8cc9b95f1de8d037038d2a1eeed != '') {
            SMACSQL()->insert('服务单信息表', '服务单id,名字,时间,信息,客服id,回复类型', "'" . $OSWAP_f8c16f19236fd4a7fafdc9fe97e2ea1a['id'] . "','" . $OSWAP_30b31a94e0c5a437f6c1c6006e473bc5['昵称'] . "',now(),'" . $OSWAP_0e8ae8cc9b95f1de8d037038d2a1eeed . "','" . $OSWAP_b59487239706386f068f2549a4adfa62 . "','2'");
            $OSWAP_93e86675a14bf45114306ac2be631499id = SMACSQL()->getid();
            SMACSQL()->update('服务单表', "最后时间=now(),状态='客服回答'", "id='$id'");
            do_swap_plug('工单回复', $id, $OSWAP_93e86675a14bf45114306ac2be631499id);
            return array(
                'lx' => 'die',
                'msg' => 'ok'
            );
        }
        SMACSQL()->select('服务单信息表', '*', "服务单id='" . $id . "' order by 时间");
        $tk = array();
        while ($OSWAP_51d4cad9672e6605c99e0c3d678f456e = SMACSQL()->fetch_assoc()) {
            $tk[] = $OSWAP_51d4cad9672e6605c99e0c3d678f456e;
        }
        return array(
            'lx' => 'return',
            'myrow' => $OSWAP_f8c16f19236fd4a7fafdc9fe97e2ea1a,
            'tk' => $tk
        );
    }
    static function ticket_close() {
        SMACSQL()->select("服务单表", '*', "状态='关闭' order by 最后时间 desc");
        $OSWAP_9ad0a90d349c03b274a3c5eff195e14c = array();
        while ($OSWAP_51d4cad9672e6605c99e0c3d678f456e = SMACSQL()->fetch_assoc()) {
            $OSWAP_9ad0a90d349c03b274a3c5eff195e14c[] = $OSWAP_51d4cad9672e6605c99e0c3d678f456e;
        }
        return $OSWAP_9ad0a90d349c03b274a3c5eff195e14c;
    }
    static function ticket_want() {
        SMACSQL()->select("服务单表", '*', "状态='客服回答' order by 最后时间 desc");
        $OSWAP_9ad0a90d349c03b274a3c5eff195e14c = array();
        while ($OSWAP_51d4cad9672e6605c99e0c3d678f456e = SMACSQL()->fetch_assoc()) {
            $OSWAP_9ad0a90d349c03b274a3c5eff195e14c[] = $OSWAP_51d4cad9672e6605c99e0c3d678f456e;
        }
        return $OSWAP_9ad0a90d349c03b274a3c5eff195e14c;
    }
    static function user_all() {
        SMACSQL()->select("用户", '*', "uid!='' order by 注册时间 desc");
        $OSWAP_9ad0a90d349c03b274a3c5eff195e14c = array();
        while ($OSWAP_51d4cad9672e6605c99e0c3d678f456e = SMACSQL()->fetch_assoc()) {
            $OSWAP_9ad0a90d349c03b274a3c5eff195e14c[] = $OSWAP_51d4cad9672e6605c99e0c3d678f456e;
        }
        return $OSWAP_9ad0a90d349c03b274a3c5eff195e14c;
    }
    static function user_detailed($id) {
        SMACSQL()->select('用户', '*', "uid='" . $id . "'");
        if (SMACSQL()->db_num_rows() == 0) return array(
            'lx' => 'redirect',
            'msg' => '用户不存在',
            'url' => '/index.php/swapidc/control/#' . urlencode('用户不存在')
        );
        $OSWAP_f8c16f19236fd4a7fafdc9fe97e2ea1a = SMACSQL()->fetch_array();
        SMACSQL()->select('服务', '*', "帐号id='" . $id . "'");
        $OSWAP_b7da14f6d30a57d6556466c8bacc5350 = array();
        while ($OSWAP_51d4cad9672e6605c99e0c3d678f456e = SMACSQL()->fetch_assoc()) {
            $OSWAP_b7da14f6d30a57d6556466c8bacc5350[] = $OSWAP_51d4cad9672e6605c99e0c3d678f456e;
        }
        $OSWAP_c97540fe0b3c5b2a38ea210c2e542b97 = array();
        foreach ($OSWAP_b7da14f6d30a57d6556466c8bacc5350 as $temp) {
            SMACSQL()->select('产品', '*', "id='" . $temp['产品id'] . "'");
            $temparry = SMACSQL()->fetch_array();
            $temp['产品类型'] = $temparry['名称'];
            $temp['产品周期'] = $temparry['周期'];
            $OSWAP_c97540fe0b3c5b2a38ea210c2e542b97[] = $temp;
        }
        return array(
            'lx' => 'return',
            'myrow' => $OSWAP_f8c16f19236fd4a7fafdc9fe97e2ea1a,
            'servers' => $OSWAP_c97540fe0b3c5b2a38ea210c2e542b97
        );
    }
    static function test_cron() {
        SMACSQL()->select('系统配置', 'cron最后执行时间,cron执行完成', "1");
        $swapcron = SMACSQL()->fetch_array();
        $swapcrontime = $swapcron['cron最后执行时间'];
        if (strtotime($swapcrontime) < strtotime("-1 days") or !$swapcron['cron执行完成']) return array(
            'lx' => 'return',
            'msg' => false
        );
        return array(
            'lx' => 'return',
            'msg' => true
        );
    }
    static function del_user($id) {
        SMACSQL()->select('用户', '*', "uid='" . $id . "'");
        if (SMACSQL()->db_num_rows() == 0) return array(
            'lx' => 'die',
            'msg' => 'not found'
        );
        SMACSQL()->delete('用户', "uid='" . $id . "'");
        return true;
    }
    static function xg_rmb($id, $OSWAP_4a44aa3cb0ca8d4b2ae7399d386e9c75) {
        SMACSQL()->select('用户', '*', "uid='" . $id . "'");
        if (SMACSQL()->db_num_rows() == 0) return array(
            'lx' => 'die',
            'msg' => 'not found'
        );
        if (!is_numeric($OSWAP_4a44aa3cb0ca8d4b2ae7399d386e9c75)) return array(
            'lx' => 'die',
            'msg' => 'not num'
        );
        if (strstr($OSWAP_4a44aa3cb0ca8d4b2ae7399d386e9c75, '-')) return array(
            'lx' => 'die',
            'msg' => 'not num'
        );
        SMACSQL()->update('用户', "预存款='" . $OSWAP_4a44aa3cb0ca8d4b2ae7399d386e9c75 . "'", "uid='" . $id . "'");
        return array(
            'lx' => 'die',
            'msg' => 'ok'
        );
    }
    static function xg_info($id, $OSWAP_0d07de59261cc2c9023b194184c575fb, $OSWAP_d23519cda7160577a488cef431673b7a, $OSWAP_a3372a91a0ca1a8b1b4a38ebbeae2626, $OSWAP_fd2ddfc99bfc05fd289c609c388b789c, $OSWAP_75c050f7985c2db293354c2bc1ed86c9, $OSWAP_4a6f164ef3c908fa9e5fd8ffecc9b706, $OSWAP_7fcb38a2f807a106238b84ea890a8a57) {
        SMACSQL()->select('用户', '*', "uid='" . $id . "'");
        if (SMACSQL()->db_num_rows() == 0) return array(
            'lx' => 'die',
            'msg' => 'not found'
        );
        SMACSQL()->update('用户', "姓名='" . $OSWAP_0d07de59261cc2c9023b194184c575fb . "',国家='" . $OSWAP_d23519cda7160577a488cef431673b7a . "',地址='" . $OSWAP_a3372a91a0ca1a8b1b4a38ebbeae2626 . "',邮编='" . $OSWAP_fd2ddfc99bfc05fd289c609c388b789c . "',电话号码='" . $OSWAP_75c050f7985c2db293354c2bc1ed86c9 . "',电子邮件='" . $OSWAP_4a6f164ef3c908fa9e5fd8ffecc9b706 . "',禁止='" . $OSWAP_7fcb38a2f807a106238b84ea890a8a57 . "'", "uid='" . $id . "'");
        return array(
            'lx' => 'die',
            'msg' => 'ok'
        );
    }
    static function xg_pass($id, $OSWAP_3fd6804806c8414bcf51fa020d02cf5a) {
        SMACSQL()->select('用户', '*', "uid='" . $id . "'");
        if (SMACSQL()->db_num_rows() == 0) return array(
            'lx' => 'die',
            'msg' => 'not found'
        );
        SMACSQL()->update('用户', "密码=PASSWORD('" . $OSWAP_3fd6804806c8414bcf51fa020d02cf5a . "')", "uid='" . $id . "'");
        return array(
            'lx' => 'die',
            'msg' => 'ok'
        );
    }
    static function new_user_form($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5name, $OSWAP_c9d58e6756676f02d347c255bcb6b03b, $OSWAP_71fd491bc9e028bf3f050c23794fbd6e, $OSWAP_0d07de59261cc2c9023b194184c575fb, $OSWAP_d23519cda7160577a488cef431673b7a, $OSWAP_a3372a91a0ca1a8b1b4a38ebbeae2626, $OSWAP_fd2ddfc99bfc05fd289c609c388b789c, $OSWAP_75c050f7985c2db293354c2bc1ed86c9, $OSWAP_4a6f164ef3c908fa9e5fd8ffecc9b706) {
        SMACSQL()->select('用户', '*', "用户名='$OSWAP_30b31a94e0c5a437f6c1c6006e473bc5name'");
        if (SMACSQL()->db_num_rows() != 0) return array(
            'lx' => 'die',
            'msg' => '用户名已经存在'
        );
        SMACSQL()->select('用户', '*', "电子邮件='$OSWAP_4a6f164ef3c908fa9e5fd8ffecc9b706'");
        if (SMACSQL()->db_num_rows() != 0) return array(
            'lx' => 'die',
            'msg' => '邮箱已经存在'
        );
        SMACSQL()->insert('用户', '用户名,密码,姓名,国家,地址,邮编,电话号码,电子邮件,注册时间,预存款', "'$OSWAP_30b31a94e0c5a437f6c1c6006e473bc5name',PASSWORD('$OSWAP_c9d58e6756676f02d347c255bcb6b03b'),'$OSWAP_0d07de59261cc2c9023b194184c575fb','$OSWAP_d23519cda7160577a488cef431673b7a','$OSWAP_a3372a91a0ca1a8b1b4a38ebbeae2626','$OSWAP_fd2ddfc99bfc05fd289c609c388b789c','$OSWAP_75c050f7985c2db293354c2bc1ed86c9','$OSWAP_4a6f164ef3c908fa9e5fd8ffecc9b706',now(),'0'");
        return array(
            'lx' => 'die',
            'msg' => 'ok'
        );
    }
    static function new_good_group_form($OSWAP_0d07de59261cc2c9023b194184c575fb, $OSWAP_552b139e3f6d430a3cdc602cae2212cd, $OSWAP_4162e2ba3a83006eabfeb48110e0c04e, $OSWAP_04376406e028e40465057304c8aa8e74, $OSWAP_eb384b5a39c58bb2fa173f6b19958369) {
        SMACSQL()->select('产品分类', '*', "分类名称='$OSWAP_0d07de59261cc2c9023b194184c575fb'");
        if (SMACSQL()->db_num_rows() != 0) return array(
            'lx' => 'die',
            'msg' => '产品组已经存在'
        );
        SMACSQL()->insert('产品分类', '分类名称,隐藏,顺序,类型,备注', "'$OSWAP_0d07de59261cc2c9023b194184c575fb','$OSWAP_552b139e3f6d430a3cdc602cae2212cd','$OSWAP_4162e2ba3a83006eabfeb48110e0c04e','$OSWAP_04376406e028e40465057304c8aa8e74','$OSWAP_eb384b5a39c58bb2fa173f6b19958369'");
        return array(
            'lx' => 'die',
            'msg' => 'ok'
        );
    }
    static function good_group() {
        SMACSQL()->select('产品分类', '*');
        $OSWAP_cfb5599d7e13ea288004634c9becdefe = array();
        while ($OSWAP_51d4cad9672e6605c99e0c3d678f456e = SMACSQL()->fetch_assoc()) {
            $OSWAP_cfb5599d7e13ea288004634c9becdefe[] = $OSWAP_51d4cad9672e6605c99e0c3d678f456e;
        }
        return array(
            'lx' => 'return',
            'goodgs' => $OSWAP_cfb5599d7e13ea288004634c9becdefe
        );
    }
    static function good_group_sc($id, $OSWAP_eb3e616f26fb43f39d083c1a7c5be373) {
        SMACSQL()->select('产品分类', '*', "id='$id'");
        if (SMACSQL()->db_num_rows() == 0) return array(
            'lx' => 'die',
            'msg' => 'not found'
        );
        SMACSQL()->select('产品分类', '*', "id='$OSWAP_eb3e616f26fb43f39d083c1a7c5be373'");
        if (SMACSQL()->db_num_rows() == 0) return array(
            'lx' => 'die',
            'msg' => '要移动到的分组不存在'
        );
        SMACSQL()->update('产品', "分类id='$OSWAP_eb3e616f26fb43f39d083c1a7c5be373'", "分类id='$id'");
        SMACSQL()->delete('产品分类', "id='$id'");
        return array(
            'lx' => 'die',
            'msg' => 'ok'
        );
    }
    static function good_group_detailed($id) {
        SMACSQL()->select('产品分类', '*', "id='$id'");
        if (SMACSQL()->db_num_rows() == 0) return array(
            'lx' => 'redirect',
            'msg' => '产品分类不存在',
            'url' => '/index.php/swapidc/control/#' . urlencode('产品分类不存在')
        );
        $OSWAP_f8c16f19236fd4a7fafdc9fe97e2ea1a = SMACSQL()->fetch_array();
        return array(
            'lx' => 'return',
            'myrow' => $OSWAP_f8c16f19236fd4a7fafdc9fe97e2ea1a
        );
    }
    static function xg_good_group_form($id, $OSWAP_0d07de59261cc2c9023b194184c575fb, $OSWAP_552b139e3f6d430a3cdc602cae2212cd, $OSWAP_4162e2ba3a83006eabfeb48110e0c04e, $OSWAP_04376406e028e40465057304c8aa8e74, $OSWAP_eb384b5a39c58bb2fa173f6b19958369) {
        SMACSQL()->select('产品分类', '*', "id='$id'");
        $OSWAP_f8c16f19236fd4a7fafdc9fe97e2ea1a = SMACSQL()->fetch_array();
        if ($OSWAP_0d07de59261cc2c9023b194184c575fb != $OSWAP_f8c16f19236fd4a7fafdc9fe97e2ea1a['分类名称']) {
            SMACSQL()->select('产品分类', '*', "分类名称='$OSWAP_0d07de59261cc2c9023b194184c575fb'");
            if (SMACSQL()->db_num_rows() != 0) return array(
                'lx' => 'die',
                'msg' => '产品组已经存在'
            );
        }
        SMACSQL()->update('产品分类', "分类名称='$OSWAP_0d07de59261cc2c9023b194184c575fb',隐藏='$OSWAP_552b139e3f6d430a3cdc602cae2212cd',顺序='$OSWAP_4162e2ba3a83006eabfeb48110e0c04e',类型='$OSWAP_04376406e028e40465057304c8aa8e74',备注='$OSWAP_eb384b5a39c58bb2fa173f6b19958369'", "id='$id'");
        return array(
            'lx' => 'die',
            'msg' => 'ok'
        );
    }
    static function new_servicer_form($OSWAP_0d07de59261cc2c9023b194184c575fb, $OSWAP_82bdfee4b92084c05ac3b384dd79c752, $ip, $OSWAP_9683125aed760720a73f71e57d88b11f, $OSWAP_abcbb33ba497e80b7cb6a0de189c007f, $OSWAP_67c2a10cb5ca807d34acb52e7169bd07, $OSWAP_2c83e001e442cc3330449f303911fefd, $OSWAP_8bdcb5461233a97332c2b038f2df6411, $OSWAP_9a57a8334abfc318de05633ffcaaa1b3, $OSWAP_defb5ad8d716eeb26d04ddd1df10cfc8, $OSWAP_9a7024711733e1f5c644e34c6b6669dc, $OSWAP_6bf5be4862813b554e093fb427b62dc4, $OSWAP_07e5d1ddb668713ec99497bea967ec03, $OSWAP_30b31a94e0c5a437f6c1c6006e473bc5, $OSWAP_3fd6804806c8414bcf51fa020d02cf5a, $OSWAP_5877bc4a7def4249f944e03fe68ddbee, $OSWAP_ff18838bb252b9e87f5dfe2f39270d32, $OSWAP_c3ece359645a45d83437d4459f58ef6d, $OSWAP_14635fb92ee0b0e7eddeb8859de672fb) {
        SMACSQL()->select('服务器表', '*', "名称='$OSWAP_0d07de59261cc2c9023b194184c575fb'");
        if (SMACSQL()->db_num_rows() != 0) return array(
            'lx' => 'die',
            'msg' => '服务器名字已经存在'
        );
        SMACSQL()->insert('服务器表', '名称,主机名,ip,端口,分配的IP地址,最大账户,服务器状态地址,禁用,DNS服务器1,DNS服务器2,DNS服务器3,DNS服务器4,DNS服务器5,控制面板,用户名,密码,哈希密码,使用SSL,数据中心位置', "'$OSWAP_0d07de59261cc2c9023b194184c575fb','$OSWAP_82bdfee4b92084c05ac3b384dd79c752','$ip','$OSWAP_14635fb92ee0b0e7eddeb8859de672fb','$OSWAP_9683125aed760720a73f71e57d88b11f','$OSWAP_abcbb33ba497e80b7cb6a0de189c007f','$OSWAP_67c2a10cb5ca807d34acb52e7169bd07','$OSWAP_2c83e001e442cc3330449f303911fefd','$OSWAP_8bdcb5461233a97332c2b038f2df6411','$OSWAP_9a57a8334abfc318de05633ffcaaa1b3','$OSWAP_defb5ad8d716eeb26d04ddd1df10cfc8','$OSWAP_9a7024711733e1f5c644e34c6b6669dc','$OSWAP_6bf5be4862813b554e093fb427b62dc4','$OSWAP_07e5d1ddb668713ec99497bea967ec03','$OSWAP_30b31a94e0c5a437f6c1c6006e473bc5','" . encrypt($OSWAP_3fd6804806c8414bcf51fa020d02cf5a) . "','$OSWAP_5877bc4a7def4249f944e03fe68ddbee','$OSWAP_ff18838bb252b9e87f5dfe2f39270d32','$OSWAP_c3ece359645a45d83437d4459f58ef6d'");
        return array(
            'lx' => 'die',
            'msg' => 'ok'
        );
    }
    static function servicer() {
        SMACSQL()->select('服务器表', '*');
        $OSWAP_00da90b7d02924d66de6a6b2908901b7 = array();
        while ($OSWAP_51d4cad9672e6605c99e0c3d678f456e = SMACSQL()->fetch_assoc()) {
            $OSWAP_00da90b7d02924d66de6a6b2908901b7[] = $OSWAP_51d4cad9672e6605c99e0c3d678f456e;
        }
        $tempservicers = array();
        foreach ($OSWAP_00da90b7d02924d66de6a6b2908901b7 as $OSWAP_6291cc79354613208317e7b10b238055 => $temp) {
            SMACSQL()->select('服务', '*', "服务器id='" . $temp['id'] . "'");
            $temp['use'] = SMACSQL()->db_num_rows();
            if (!$temp['最大账户']) $temp['最大账户'] = 1;
            $temp['百分比'] = round($temp['use'] / (float)$temp['最大账户'] * 100, 2) . "％";
            $OSWAP_6c5cee550b682ff7d674773f07a17f33 = array();
            $OSWAP_6c5cee550b682ff7d674773f07a17f33['moduletype'] = $temp['控制面板'];
            $OSWAP_6c5cee550b682ff7d674773f07a17f33['serversecure'] = $temp['使用SSL'];
            $OSWAP_6c5cee550b682ff7d674773f07a17f33['serverhostname'] = $temp['主机名'];
            $OSWAP_6c5cee550b682ff7d674773f07a17f33['serverip'] = $temp['ip'];
            $OSWAP_6c5cee550b682ff7d674773f07a17f33['serverusername'] = $temp['用户名'];
            $OSWAP_6c5cee550b682ff7d674773f07a17f33['serverpassword'] = decrypt($temp['密码']);
            $OSWAP_6c5cee550b682ff7d674773f07a17f33['serverport'] = $temp['端口'];
            $temp['adminlink'] = ServerFunction($OSWAP_6c5cee550b682ff7d674773f07a17f33, 'AdminLink');
            $tempservicers[$OSWAP_6291cc79354613208317e7b10b238055] = $temp;
        }
        return array(
            'lx' => 'return',
            'tempservicers' => $tempservicers
        );
    }
    static function servicer_sc($id) {
        SMACSQL()->select('服务器表', '*', "id='$id'");
        if (SMACSQL()->db_num_rows() == 0) return array(
            'lx' => 'die',
            'msg' => 'not found'
        );
        SMACSQL()->select('服务', '*', "服务器id='$id' and (状态='激活' or 状态='暂停')");
        if (SMACSQL()->db_num_rows() != 0) return array(
            'lx' => 'die',
            'msg' => '还有未关闭服务并非停止状态，请到服务管理停止所有在这个服务器运行的服务'
        );
        SMACSQL()->delete('服务器表', "id='$id'");
        return array(
            'lx' => 'die',
            'msg' => 'ok'
        );
    }
    static function servicer_detailed($id) {
        SMACSQL()->select('服务器表', '*', "id='$id'");
        if (SMACSQL()->db_num_rows() == 0) return array(
            'lx' => 'redirect',
            'msg' => '服务器不存在',
            'url' => '/index.php/swapidc/control/#' . urlencode('服务器不存在')
        );
        $OSWAP_f8c16f19236fd4a7fafdc9fe97e2ea1a = SMACSQL()->fetch_array();
        $OSWAP_f8c16f19236fd4a7fafdc9fe97e2ea1a['密码'] = decrypt($OSWAP_f8c16f19236fd4a7fafdc9fe97e2ea1a['密码']);
        $OSWAP_864441020d7e8b560e177bdac0d5ffd3 = File::get_dirs(SWAP_LIB . 'servers');
        $OSWAP_864441020d7e8b560e177bdac0d5ffd3 = $OSWAP_864441020d7e8b560e177bdac0d5ffd3['dir'];
        $OSWAP_2b274b1611c149c99f706cb822116d2e = array();
        foreach ($OSWAP_864441020d7e8b560e177bdac0d5ffd3 as $OSWAP_b69a7729e1ccb4639eb5b5295a641bad) {
            if (!strstr($OSWAP_b69a7729e1ccb4639eb5b5295a641bad, '.')) $OSWAP_2b274b1611c149c99f706cb822116d2e[] = $OSWAP_b69a7729e1ccb4639eb5b5295a641bad;
        }
        return array(
            'lx' => 'return',
            'myrow' => $OSWAP_f8c16f19236fd4a7fafdc9fe97e2ea1a,
            'module' => $OSWAP_2b274b1611c149c99f706cb822116d2e
        );
    }
    static function servicer_detailed_form($id, $OSWAP_0d07de59261cc2c9023b194184c575fb, $OSWAP_82bdfee4b92084c05ac3b384dd79c752, $ip, $OSWAP_9683125aed760720a73f71e57d88b11f, $OSWAP_abcbb33ba497e80b7cb6a0de189c007f, $OSWAP_67c2a10cb5ca807d34acb52e7169bd07, $OSWAP_2c83e001e442cc3330449f303911fefd, $OSWAP_8bdcb5461233a97332c2b038f2df6411, $OSWAP_9a57a8334abfc318de05633ffcaaa1b3, $OSWAP_defb5ad8d716eeb26d04ddd1df10cfc8, $OSWAP_9a7024711733e1f5c644e34c6b6669dc, $OSWAP_6bf5be4862813b554e093fb427b62dc4, $OSWAP_07e5d1ddb668713ec99497bea967ec03, $OSWAP_30b31a94e0c5a437f6c1c6006e473bc5, $OSWAP_3fd6804806c8414bcf51fa020d02cf5a, $OSWAP_5877bc4a7def4249f944e03fe68ddbee, $OSWAP_ff18838bb252b9e87f5dfe2f39270d32, $OSWAP_c3ece359645a45d83437d4459f58ef6d, $OSWAP_14635fb92ee0b0e7eddeb8859de672fb) {
        SMACSQL()->select('服务器表', '*', "id='$id'");
        $OSWAP_f8c16f19236fd4a7fafdc9fe97e2ea1a = SMACSQL()->fetch_array();
        if ($OSWAP_0d07de59261cc2c9023b194184c575fb != $OSWAP_f8c16f19236fd4a7fafdc9fe97e2ea1a['名称']) {
            SMACSQL()->select('服务器表', '*', "名称='$OSWAP_0d07de59261cc2c9023b194184c575fb'");
            if (SMACSQL()->db_num_rows() != 0) return array(
                'lx' => 'die',
                'msg' => '服务器已经存在'
            );
        }
        SMACSQL()->update('服务器表', "名称='$OSWAP_0d07de59261cc2c9023b194184c575fb',主机名='$OSWAP_82bdfee4b92084c05ac3b384dd79c752',ip='$ip',端口='$OSWAP_14635fb92ee0b0e7eddeb8859de672fb',分配的IP地址='$OSWAP_9683125aed760720a73f71e57d88b11f',最大账户='$OSWAP_abcbb33ba497e80b7cb6a0de189c007f',服务器状态地址='$OSWAP_67c2a10cb5ca807d34acb52e7169bd07',禁用='$OSWAP_2c83e001e442cc3330449f303911fefd',DNS服务器1='$OSWAP_8bdcb5461233a97332c2b038f2df6411',DNS服务器2='$OSWAP_9a57a8334abfc318de05633ffcaaa1b3',DNS服务器3='$OSWAP_defb5ad8d716eeb26d04ddd1df10cfc8',DNS服务器4='$OSWAP_9a7024711733e1f5c644e34c6b6669dc',DNS服务器5='$OSWAP_6bf5be4862813b554e093fb427b62dc4',控制面板='$OSWAP_07e5d1ddb668713ec99497bea967ec03',用户名='$OSWAP_30b31a94e0c5a437f6c1c6006e473bc5',密码='" . encrypt($OSWAP_3fd6804806c8414bcf51fa020d02cf5a) . "',哈希密码='$OSWAP_5877bc4a7def4249f944e03fe68ddbee',使用SSL='$OSWAP_ff18838bb252b9e87f5dfe2f39270d32',数据中心位置='$OSWAP_c3ece359645a45d83437d4459f58ef6d'", "id='$id'");
        return array(
            'lx' => 'die',
            'msg' => 'ok'
        );
    }
    static function server_all() {
        SMACSQL()->select('服务', '*');
        $OSWAP_b7da14f6d30a57d6556466c8bacc5350 = array();
        while ($OSWAP_51d4cad9672e6605c99e0c3d678f456e = SMACSQL()->fetch_assoc()) {
            $OSWAP_b7da14f6d30a57d6556466c8bacc5350[] = $OSWAP_51d4cad9672e6605c99e0c3d678f456e;
        }
        $OSWAP_c97540fe0b3c5b2a38ea210c2e542b97 = array();
        foreach ($OSWAP_b7da14f6d30a57d6556466c8bacc5350 as $temp) {
            SMACSQL()->select('产品', '*', "id='" . $temp['产品id'] . "'");
            $temparry = SMACSQL()->fetch_array();
            $temp['产品类型'] = $temparry['名称'];
            $temp['产品周期'] = $temparry['周期'];
            $OSWAP_c97540fe0b3c5b2a38ea210c2e542b97[] = $temp;
        }
        return array(
            'lx' => 'return',
            'servers' => $OSWAP_c97540fe0b3c5b2a38ea210c2e542b97
        );
    }
    static function server_ktfw($id, $zt) {
        SMACSQL()->select('服务', '*', "id='$id'");
        if (SMACSQL()->db_num_rows() == 0) return array(
            'lx' => 'die',
            'msg' => 'not found'
        );
        $temparry = SMACSQL()->fetch_array();
        if ($temparry['状态'] != $zt) return array(
            'lx' => 'die',
            'msg' => '状态已经改变，并非当前状态，请刷新页面后再试！！'
        );
        $OSWAP_7e6aa0790f933f6fc31e4f398373b7fd = ServerCreateAccount($id);
        if ($OSWAP_7e6aa0790f933f6fc31e4f398373b7fd == '成功') {
            do_swap_plug('后台开通服务成功', $id);
            return array(
                'lx' => 'die',
                'msg' => 'ok'
            );
        } else return array(
            'lx' => 'die',
            'msg' => 'SWAPIDC:完全正常<br/>服务器控制面板返回问题:' . $OSWAP_7e6aa0790f933f6fc31e4f398373b7fd
        );
    }
    static function server_unsp($id, $zt) {
        SMACSQL()->select('服务', '*', "id='$id'");
        if (SMACSQL()->db_num_rows() == 0) return array(
            'lx' => 'die',
            'msg' => 'not found'
        );
        $temparry = SMACSQL()->fetch_array();
        if ($temparry['状态'] != $zt) return array(
            'lx' => 'die',
            'msg' => '状态已经改变，并非当前状态，请刷新页面后再试！！'
        );
        $OSWAP_7e6aa0790f933f6fc31e4f398373b7fd = ServerUnsuspendAccount($id);
        if ($OSWAP_7e6aa0790f933f6fc31e4f398373b7fd == '成功') {
            do_swap_plug('后台恢复服务成功', $id);
            return array(
                'lx' => 'die',
                'msg' => 'ok'
            );
        } else return array(
            'lx' => 'die',
            'msg' => 'SWAPIDC:完全正常<br/>服务器控制面板返回问题:' . $OSWAP_7e6aa0790f933f6fc31e4f398373b7fd
        );
    }
    static function server_sp($id, $zt) {
        SMACSQL()->select('服务', '*', "id='$id'");
        if (SMACSQL()->db_num_rows() == 0) return array(
            'lx' => 'die',
            'msg' => 'not found'
        );
        $temparry = SMACSQL()->fetch_array();
        if ($temparry['状态'] != $zt) return array(
            'lx' => 'die',
            'msg' => '状态已经改变，并非当前状态，请刷新页面后再试！！'
        );
        $OSWAP_7e6aa0790f933f6fc31e4f398373b7fd = ServerSuspendAccount($id);
        if ($OSWAP_7e6aa0790f933f6fc31e4f398373b7fd == '成功') {
            do_swap_plug('后台暂停服务成功', $id);
            return array(
                'lx' => 'die',
                'msg' => 'ok'
            );
        } else return array(
            'lx' => 'die',
            'msg' => 'SWAPIDC:完全正常<br/>服务器控制面板返回问题:' . $OSWAP_7e6aa0790f933f6fc31e4f398373b7fd
        );
    }
    static function server_tz($id, $zt) {
        SMACSQL()->select('服务', '*', "id='$id'");
        if (SMACSQL()->db_num_rows() == 0) return array(
            'lx' => 'die',
            'msg' => 'not found'
        );
        $temparry = SMACSQL()->fetch_array();
        if ($temparry['状态'] != $zt) return array(
            'lx' => 'die',
            'msg' => '状态已经改变，并非当前状态，请刷新页面后再试！！'
        );
        $OSWAP_7e6aa0790f933f6fc31e4f398373b7fd = ServerTerminateAccount($id);
        if ($OSWAP_7e6aa0790f933f6fc31e4f398373b7fd == '成功') {
            do_swap_plug('后台停止服务成功', $id);
            return array(
                'lx' => 'die',
                'msg' => 'ok'
            );
        } else return array(
            'lx' => 'die',
            'msg' => 'SWAPIDC:完全正常<br/>服务器控制面板返回问题:' . $OSWAP_7e6aa0790f933f6fc31e4f398373b7fd
        );
    }
    static function server_bh($id, $zt) {
        SMACSQL()->select('服务', '*', "id='$id'");
        if (SMACSQL()->db_num_rows() == 0) return array(
            'lx' => 'die',
            'msg' => 'not found'
        );
        $temparry = SMACSQL()->fetch_array();
        if ($temparry['状态'] != $zt) return array(
            'lx' => 'die',
            'msg' => '状态已经改变，并非当前状态，请刷新页面后再试！！'
        );
        SMACSQL()->update('服务', "状态='驳回'", "id='$id'");
        do_swap_plug('后台驳回服务成功', $id);
        return array(
            'lx' => 'die',
            'msg' => 'ok'
        );
    }
    static function server_sc($id, $zt) {
        SMACSQL()->select('服务', '*', "id='$id'");
        if (SMACSQL()->db_num_rows() == 0) return array(
            'lx' => 'die',
            'msg' => 'not found'
        );
        $temparry = SMACSQL()->fetch_array();
        if ($temparry['状态'] != $zt) return array(
            'lx' => 'die',
            'msg' => '状态已经改变，并非当前状态，请刷新页面后再试！！'
        );
        SMACSQL()->delete('服务', "id='$id'");
        return array(
            'lx' => 'die',
            'msg' => 'ok'
        );
    }
    static function server_edit($id, $OSWAP_30b31a94e0c5a437f6c1c6006e473bc5, $OSWAP_3fd6804806c8414bcf51fa020d02cf5a) {
        SMACSQL()->select('服务', '*', "id='$id'");
        if (SMACSQL()->db_num_rows() == 0) return array(
            'lx' => 'die',
            'msg' => '订单不存在'
        );
        $OSWAP_3fd6804806c8414bcf51fa020d02cf5a = encrypt($OSWAP_3fd6804806c8414bcf51fa020d02cf5a);
        SMACSQL()->update('服务', "用户名='" . $OSWAP_30b31a94e0c5a437f6c1c6006e473bc5 . "',密码='" . $OSWAP_3fd6804806c8414bcf51fa020d02cf5a . "'", "id='" . $id . "'");
        return array(
            'lx' => 'die',
            'msg' => 'ok'
        );
    }
    static function server_detailed($id) {
        SMACSQL()->select('服务', '*', "id='$id'");
        if (SMACSQL()->db_num_rows() == 0) return array(
            'lx' => 'redirect',
            'msg' => '订单不存在',
            'url' => '/index.php/swapidc/control/#' . urlencode('订单不存在')
        );
        $OSWAP_b7da14f6d30a57d6556466c8bacc5350 = SMACSQL()->fetch_array();
        $OSWAP_b7da14f6d30a57d6556466c8bacc5350['密码'] = decrypt($OSWAP_b7da14f6d30a57d6556466c8bacc5350['密码']);
        SMACSQL()->select('产品', '*', "id='" . $OSWAP_b7da14f6d30a57d6556466c8bacc5350['产品id'] . "'");
        $cp = SMACSQL()->fetch_array();
        SMACSQL()->select('服务器表', '名称', "id='" . $OSWAP_b7da14f6d30a57d6556466c8bacc5350['服务器id'] . "'");
        $OSWAP_3b6c057c7664c5afce6c304af9403973 = SMACSQL()->fetch_array();
        SMACSQL()->select('用户', '*', "uid='" . $OSWAP_b7da14f6d30a57d6556466c8bacc5350['帐号id'] . "'");
        $OSWAP_f8c16f19236fd4a7fafdc9fe97e2ea1a = SMACSQL()->fetch_array();
        SMACSQL()->select('优惠码日志表', '*', "uid='" . $OSWAP_b7da14f6d30a57d6556466c8bacc5350['帐号id'] . "' order by id desc limit 5");
        $OSWAP_76f7b02c202ba450979424c2c699fbbb = SMACSQL()->fetch_array();
        SMACSQL()->select('主机配置选项', '*', "服务id='" . $id . "'");
        $OSWAP_64ef673aa39c0293f01b6e580402e685 = array();
        while ($OSWAP_51d4cad9672e6605c99e0c3d678f456e = SMACSQL()->fetch_assoc()) {
            $OSWAP_64ef673aa39c0293f01b6e580402e685[] = $OSWAP_51d4cad9672e6605c99e0c3d678f456e;
        }
        $OSWAP_2ffeee53ec6eab6273dbc15ca8e3e33d = array();
        foreach ($OSWAP_64ef673aa39c0293f01b6e580402e685 as $OSWAP_51d4cad9672e6605c99e0c3d678f456e) {
            SMACSQL()->select('产品配置选项名称', '选项名称', "id='" . $OSWAP_51d4cad9672e6605c99e0c3d678f456e['选项id'] . "'");
            $temp = SMACSQL()->fetch_array();
            $OSWAP_31bb5897a4cf8155e2d7054f8ef132dd = $temp['选项名称'];
            SMACSQL()->select('产品配置选项', '选项名称', "id='" . $OSWAP_51d4cad9672e6605c99e0c3d678f456e['配置id'] . "'");
            $temp = SMACSQL()->fetch_array();
            $OSWAP_0d07de59261cc2c9023b194184c575fb = $temp['选项名称'];
            $OSWAP_2ffeee53ec6eab6273dbc15ca8e3e33d[] = array(
                '名称' => $OSWAP_0d07de59261cc2c9023b194184c575fb,
                '值' => $OSWAP_31bb5897a4cf8155e2d7054f8ef132dd
            );
        }
        SMACSQL()->select('主机自定义配置选项', '*', "服务id='" . $id . "'");
        $config = array();
        while ($OSWAP_51d4cad9672e6605c99e0c3d678f456e = SMACSQL()->fetch_assoc()) {
            $config[] = $OSWAP_51d4cad9672e6605c99e0c3d678f456e;
        }
        return array(
            'lx' => 'return',
            'server' => $OSWAP_b7da14f6d30a57d6556466c8bacc5350,
            'cp' => $cp,
            'fwq' => $OSWAP_3b6c057c7664c5afce6c304af9403973['名称'],
            'myrow' => $OSWAP_f8c16f19236fd4a7fafdc9fe97e2ea1a,
            'prom' => $OSWAP_76f7b02c202ba450979424c2c699fbbb,
            'cppz' => $OSWAP_2ffeee53ec6eab6273dbc15ca8e3e33d,
            'config' => $config
        );
    }
    static function server_config_add($id, $OSWAP_0d07de59261cc2c9023b194184c575fb, $OSWAP_31bb5897a4cf8155e2d7054f8ef132dd) {
        SMACSQL()->select('服务', '*', "id='$id'");
        if (SMACSQL()->db_num_rows() == 0) return array(
            'lx' => 'die',
            'msg' => '订单不存在'
        );
        SMACSQL()->insert('主机自定义配置选项', "服务id,名字,内容", "'" . $id . "','" . $OSWAP_0d07de59261cc2c9023b194184c575fb . "','" . $OSWAP_31bb5897a4cf8155e2d7054f8ef132dd . "'");
        return array(
            'lx' => 'die',
            'msg' => 'ok'
        );
    }
    static function server_config_del($id, $OSWAP_f89d0a36212f7084d8c259a0654193f6) {
        SMACSQL()->select('服务', '*', "id='$id'");
        if (SMACSQL()->db_num_rows() == 0) return array(
            'lx' => 'die',
            'msg' => '订单不存在'
        );
        SMACSQL()->delete('主机自定义配置选项', "id='" . $OSWAP_f89d0a36212f7084d8c259a0654193f6 . "' and 服务id='" . $id . "'");
        return array(
            'lx' => 'die',
            'msg' => 'ok'
        );
    }
    static function server_review() {
        SMACSQL()->select('服务', '*', "状态='等待审核'");
        $OSWAP_b7da14f6d30a57d6556466c8bacc5350 = array();
        while ($OSWAP_51d4cad9672e6605c99e0c3d678f456e = SMACSQL()->fetch_assoc()) {
            $OSWAP_b7da14f6d30a57d6556466c8bacc5350[] = $OSWAP_51d4cad9672e6605c99e0c3d678f456e;
        }
        $OSWAP_c97540fe0b3c5b2a38ea210c2e542b97 = array();
        foreach ($OSWAP_b7da14f6d30a57d6556466c8bacc5350 as $temp) {
            SMACSQL()->select('产品', '*', "id='" . $temp['产品id'] . "'");
            $temparry = SMACSQL()->fetch_array();
            $temp['产品类型'] = $temparry['名称'];
            $temp['产品周期'] = $temparry['周期'];
            $OSWAP_c97540fe0b3c5b2a38ea210c2e542b97[] = $temp;
        }
        return array(
            'lx' => 'return',
            'servers' => $OSWAP_c97540fe0b3c5b2a38ea210c2e542b97
        );
    }
    static function server_activation() {
        SMACSQL()->select('服务', '*', "状态='激活'");
        $OSWAP_b7da14f6d30a57d6556466c8bacc5350 = array();
        while ($OSWAP_51d4cad9672e6605c99e0c3d678f456e = SMACSQL()->fetch_assoc()) {
            $OSWAP_b7da14f6d30a57d6556466c8bacc5350[] = $OSWAP_51d4cad9672e6605c99e0c3d678f456e;
        }
        $OSWAP_c97540fe0b3c5b2a38ea210c2e542b97 = array();
        foreach ($OSWAP_b7da14f6d30a57d6556466c8bacc5350 as $temp) {
            SMACSQL()->select('产品', '*', "id='" . $temp['产品id'] . "'");
            $temparry = SMACSQL()->fetch_array();
            $temp['产品类型'] = $temparry['名称'];
            $temp['产品周期'] = $temparry['周期'];
            $OSWAP_c97540fe0b3c5b2a38ea210c2e542b97[] = $temp;
        }
        return array(
            'lx' => 'return',
            'servers' => $OSWAP_c97540fe0b3c5b2a38ea210c2e542b97
        );
    }
    static function server_wait() {
        SMACSQL()->select('服务', '*', "状态='等待付款'");
        $OSWAP_b7da14f6d30a57d6556466c8bacc5350 = array();
        while ($OSWAP_51d4cad9672e6605c99e0c3d678f456e = SMACSQL()->fetch_assoc()) {
            $OSWAP_b7da14f6d30a57d6556466c8bacc5350[] = $OSWAP_51d4cad9672e6605c99e0c3d678f456e;
        }
        $OSWAP_c97540fe0b3c5b2a38ea210c2e542b97 = array();
        foreach ($OSWAP_b7da14f6d30a57d6556466c8bacc5350 as $temp) {
            SMACSQL()->select('产品', '*', "id='" . $temp['产品id'] . "'");
            $temparry = SMACSQL()->fetch_array();
            $temp['产品类型'] = $temparry['名称'];
            $temp['产品周期'] = $temparry['周期'];
            $OSWAP_c97540fe0b3c5b2a38ea210c2e542b97[] = $temp;
        }
        return array(
            'lx' => 'return',
            'servers' => $OSWAP_c97540fe0b3c5b2a38ea210c2e542b97
        );
    }
    static function server_cancel() {
        SMACSQL()->select('服务', '*', "状态='暂停'");
        $OSWAP_b7da14f6d30a57d6556466c8bacc5350 = array();
        while ($OSWAP_51d4cad9672e6605c99e0c3d678f456e = SMACSQL()->fetch_assoc()) {
            $OSWAP_b7da14f6d30a57d6556466c8bacc5350[] = $OSWAP_51d4cad9672e6605c99e0c3d678f456e;
        }
        $OSWAP_c97540fe0b3c5b2a38ea210c2e542b97 = array();
        foreach ($OSWAP_b7da14f6d30a57d6556466c8bacc5350 as $temp) {
            SMACSQL()->select('产品', '*', "id='" . $temp['产品id'] . "'");
            $temparry = SMACSQL()->fetch_array();
            $temp['产品类型'] = $temparry['名称'];
            $temp['产品周期'] = $temparry['周期'];
            $OSWAP_c97540fe0b3c5b2a38ea210c2e542b97[] = $temp;
        }
        return array(
            'lx' => 'return',
            'servers' => $OSWAP_c97540fe0b3c5b2a38ea210c2e542b97
        );
    }
    static function server_reject() {
        SMACSQL()->select('服务', '*', "状态='驳回'");
        $OSWAP_b7da14f6d30a57d6556466c8bacc5350 = array();
        while ($OSWAP_51d4cad9672e6605c99e0c3d678f456e = SMACSQL()->fetch_assoc()) {
            $OSWAP_b7da14f6d30a57d6556466c8bacc5350[] = $OSWAP_51d4cad9672e6605c99e0c3d678f456e;
        }
        $OSWAP_c97540fe0b3c5b2a38ea210c2e542b97 = array();
        foreach ($OSWAP_b7da14f6d30a57d6556466c8bacc5350 as $temp) {
            SMACSQL()->select('产品', '*', "id='" . $temp['产品id'] . "'");
            $temparry = SMACSQL()->fetch_array();
            $temp['产品类型'] = $temparry['名称'];
            $temp['产品周期'] = $temparry['周期'];
            $OSWAP_c97540fe0b3c5b2a38ea210c2e542b97[] = $temp;
        }
        return array(
            'lx' => 'return',
            'servers' => $OSWAP_c97540fe0b3c5b2a38ea210c2e542b97
        );
    }
    static function announcement() {
        SMACSQL()->select('公告', '*');
        $OSWAP_db528191b36899ed3615db79d9a3fa9bs = array();
        while ($OSWAP_51d4cad9672e6605c99e0c3d678f456e = SMACSQL()->fetch_assoc()) {
            $OSWAP_db528191b36899ed3615db79d9a3fa9bs[] = $OSWAP_51d4cad9672e6605c99e0c3d678f456e;
        }
        return array(
            'lx' => 'return',
            'helps' => $OSWAP_db528191b36899ed3615db79d9a3fa9bs
        );
    }
    static function del_announcement($id) {
        SMACSQL()->select('公告', '*', "公告ID='$id'");
        if (SMACSQL()->db_num_rows() == 0) return array(
            'lx' => 'die',
            'msg' => 'not found'
        );
        SMACSQL()->delete('公告', "公告ID='$id'");
        return array(
            'lx' => 'die',
            'msg' => 'ok'
        );
    }
    static function announcement_detailed($id) {
        SMACSQL()->select('公告', '*', "公告ID='$id'");
        if (SMACSQL()->db_num_rows() == 0) return array(
            'lx' => 'redirect',
            'msg' => '公告不存在',
            'url' => '/index.php/swapidc/control/#' . urlencode('公告不存在')
        );
        $OSWAP_db528191b36899ed3615db79d9a3fa9b = SMACSQL()->fetch_array();
        return array(
            'lx' => 'return',
            'help' => $OSWAP_db528191b36899ed3615db79d9a3fa9b
        );
    }
    static function xg_announcement_detailed_form($id, $OSWAP_30b31a94e0c5a437f6c1c6006e473bc5, $OSWAP_93e86675a14bf45114306ac2be631499, $OSWAP_0d07de59261cc2c9023b194184c575fb) {
        SMACSQL()->select('公告', '*', "公告ID='$id'");
        if (SMACSQL()->db_num_rows() == 0) return array(
            'lx' => 'die',
            'msg' => '公告不存在'
        );
        SMACSQL()->update('公告', "公告标题='$OSWAP_0d07de59261cc2c9023b194184c575fb',公告内容='$OSWAP_93e86675a14bf45114306ac2be631499',公告作者='" . $OSWAP_30b31a94e0c5a437f6c1c6006e473bc5 . "',公告时间=NOW()", "公告ID='$id'");
        return array(
            'lx' => 'die',
            'msg' => 'ok'
        );
    }
    static function new_announcement_form($OSWAP_30b31a94e0c5a437f6c1c6006e473bc5, $OSWAP_93e86675a14bf45114306ac2be631499, $OSWAP_0d07de59261cc2c9023b194184c575fb) {
        SMACSQL()->insert('公告', "公告标题,公告内容,公告作者,公告时间", "'$OSWAP_0d07de59261cc2c9023b194184c575fb','$OSWAP_93e86675a14bf45114306ac2be631499','" . $OSWAP_30b31a94e0c5a437f6c1c6006e473bc5 . "',NOW()");
        return array(
            'lx' => 'die',
            'msg' => 'ok'
        );
    }
    static function money() {
        SMACSQL()->select('货币设置', '*');
        $OSWAP_8db3b9166f01c29a81c2abba00abba61 = array();
        $OSWAP_8db3b9166f01c29a81c2abba00abba61s = array();
        while ($OSWAP_51d4cad9672e6605c99e0c3d678f456e = SMACSQL()->fetch_assoc()) {
            $OSWAP_8db3b9166f01c29a81c2abba00abba61s[] = $OSWAP_51d4cad9672e6605c99e0c3d678f456e;
        }
        foreach ($OSWAP_8db3b9166f01c29a81c2abba00abba61s as $OSWAP_0bead33f7592a3ca9198c6e1c2770086) {
            SMACSQL()->select('支付接口', '*', "货币id='" . $OSWAP_0bead33f7592a3ca9198c6e1c2770086['id'] . "'");
            if (SMACSQL()->db_num_rows() != 0) $OSWAP_0bead33f7592a3ca9198c6e1c2770086['use'] = '1';
            else $OSWAP_0bead33f7592a3ca9198c6e1c2770086['use'] = '0';
            $OSWAP_8db3b9166f01c29a81c2abba00abba61[] = $OSWAP_0bead33f7592a3ca9198c6e1c2770086;
        }
        return array(
            'lx' => 'return',
            'moneys' => $OSWAP_8db3b9166f01c29a81c2abba00abba61
        );
    }
    static function new_money_form($OSWAP_0d07de59261cc2c9023b194184c575fb, $qz, $hz, $hl) {
        SMACSQL()->insert('货币设置', "货币名称,货币前缀,货币后缀,交易币汇率", "'$OSWAP_0d07de59261cc2c9023b194184c575fb','$qz','$hz','$hl'");
        return array(
            'lx' => 'die',
            'msg' => 'ok'
        );
    }
    static function del_money($id) {
        SMACSQL()->select('货币设置', '*', "id='$id'");
        if (SMACSQL()->db_num_rows() == 0) return array(
            'lx' => 'die',
            'msg' => 'not found'
        );
        SMACSQL()->delete('货币设置', "id='$id'");
        return array(
            'lx' => 'die',
            'msg' => 'ok'
        );
    }
    static function money_detailed($id) {
        SMACSQL()->select('货币设置', '*', "id='$id'");
        if (SMACSQL()->db_num_rows() == 0) return array(
            'lx' => 'redirect',
            'msg' => '货币不存在',
            'url' => '/index.php/swapidc/control/#' . urlencode('货币不存在')
        );
        $OSWAP_0bead33f7592a3ca9198c6e1c2770086 = SMACSQL()->fetch_array();
        return array(
            'lx' => 'return',
            'money' => $OSWAP_0bead33f7592a3ca9198c6e1c2770086
        );
    }
    static function xg_money_form($id, $OSWAP_0d07de59261cc2c9023b194184c575fb, $qz, $hz, $hl) {
        SMACSQL()->select('货币设置', '*', "id='$id'");
        if (SMACSQL()->db_num_rows() == 0) return array(
            'lx' => 'die',
            'msg' => '货币不存在'
        );
        SMACSQL()->update('货币设置', "货币名称='$OSWAP_0d07de59261cc2c9023b194184c575fb',货币前缀='$qz',货币后缀='$hz',交易币汇率='$hl'", "id='$id'");
        return array(
            'lx' => 'die',
            'msg' => 'ok'
        );
    }
    static function new_help_form($OSWAP_0d07de59261cc2c9023b194184c575fb, $OSWAP_93e86675a14bf45114306ac2be631499, $OSWAP_30b31a94e0c5a437f6c1c6006e473bc5) {
        SMACSQL()->insert('帮助中心', "标题,内容,作者,时间", "'$OSWAP_0d07de59261cc2c9023b194184c575fb','$OSWAP_93e86675a14bf45114306ac2be631499','" . $OSWAP_30b31a94e0c5a437f6c1c6006e473bc5 . "',NOW()");
        return array(
            'lx' => 'die',
            'msg' => 'ok'
        );
    }
    static function help() {
        SMACSQL()->select('帮助中心', '*');
        $OSWAP_db528191b36899ed3615db79d9a3fa9bs = array();
        while ($OSWAP_51d4cad9672e6605c99e0c3d678f456e = SMACSQL()->fetch_assoc()) {
            $OSWAP_db528191b36899ed3615db79d9a3fa9bs[] = $OSWAP_51d4cad9672e6605c99e0c3d678f456e;
        }
        return array(
            'lx' => 'return',
            'helps' => $OSWAP_db528191b36899ed3615db79d9a3fa9bs
        );
    }
    static function del_help($id) {
        SMACSQL()->select('帮助中心', '*', "id='$id'");
        if (SMACSQL()->db_num_rows() == 0) return array(
            'lx' => 'die',
            'msg' => 'not found'
        );
        SMACSQL()->delete('帮助中心', "id='$id'");
        return array(
            'lx' => 'die',
            'msg' => 'ok'
        );
    }
    static function help_detailed($id) {
        SMACSQL()->select('帮助中心', '*', "id='$id'");
        if (SMACSQL()->db_num_rows() == 0) return array(
            'lx' => 'redirect',
            'msg' => '帮助文档不存在',
            'url' => '/index.php/swapidc/control/#' . urlencode('帮助文档不存在')
        );
        $OSWAP_db528191b36899ed3615db79d9a3fa9b = SMACSQL()->fetch_array();
        return array(
            'lx' => 'return',
            'help' => $OSWAP_db528191b36899ed3615db79d9a3fa9b
        );
    }
    static function xg_help_detailed_form($id, $OSWAP_0d07de59261cc2c9023b194184c575fb, $OSWAP_93e86675a14bf45114306ac2be631499, $OSWAP_30b31a94e0c5a437f6c1c6006e473bc5) {
        SMACSQL()->select('帮助中心', '*', "id='$id'");
        if (SMACSQL()->db_num_rows() == 0) return array(
            'lx' => 'die',
            'msg' => '帮助文档不存在'
        );
        SMACSQL()->update('帮助中心', "标题='$OSWAP_0d07de59261cc2c9023b194184c575fb',内容='$OSWAP_93e86675a14bf45114306ac2be631499',作者='" . $OSWAP_30b31a94e0c5a437f6c1c6006e473bc5 . "',时间=NOW()", "id='$id'");
        return array(
            'lx' => 'die',
            'msg' => 'ok'
        );
    }
    static function plug_list() {
        SMACSQL()->select('插件', '*');
        while ($OSWAP_51d4cad9672e6605c99e0c3d678f456e = SMACSQL()->fetch_assoc()) {
            $OSWAP_40e124a80fcc8ca49fe7fe35ad86ed14on[$OSWAP_51d4cad9672e6605c99e0c3d678f456e['插件名']] = $OSWAP_51d4cad9672e6605c99e0c3d678f456e['启用'];
        }
        $OSWAP_37875703710ccd2290c4d8562546d55a = SWAP_PLUGINS;
        $OSWAP_40e124a80fcc8ca49fe7fe35ad86ed14dir = File::get_dirs($OSWAP_37875703710ccd2290c4d8562546d55a);
        foreach ($OSWAP_40e124a80fcc8ca49fe7fe35ad86ed14dir['dir'] as $OSWAP_b69a7729e1ccb4639eb5b5295a641bad) {
            if (!strstr($OSWAP_b69a7729e1ccb4639eb5b5295a641bad, '.')) {
                $temps = array();
                if (file_exists($OSWAP_37875703710ccd2290c4d8562546d55a . $OSWAP_b69a7729e1ccb4639eb5b5295a641bad . '/version')) $temps['版本'] = file_get_contents($OSWAP_37875703710ccd2290c4d8562546d55a . $OSWAP_b69a7729e1ccb4639eb5b5295a641bad . '/version');
                else $temps['版本'] = - 1;
                if ($OSWAP_40e124a80fcc8ca49fe7fe35ad86ed14on[$OSWAP_b69a7729e1ccb4639eb5b5295a641bad] == '1') $temps['启动'] = 1;
                else $temps['启动'] = 0;
                $temps['system'] = 'lib';
                $OSWAP_40e124a80fcc8ca49fe7fe35ad86ed14dirs[] = $temps;
            }
        }
        $OSWAP_17ecb16835d484638b901b36e1dae6fc = SWAP_LIB;
        $OSWAP_b7da14f6d30a57d6556466c8bacc5350dir = File::get_dirs($OSWAP_17ecb16835d484638b901b36e1dae6fc . 'servers/');
        foreach ($OSWAP_b7da14f6d30a57d6556466c8bacc5350dir['dir'] as $OSWAP_b69a7729e1ccb4639eb5b5295a641bad) {
            if (!strstr($OSWAP_b69a7729e1ccb4639eb5b5295a641bad, '.')) {
                $temps = array();
                if (file_exists($OSWAP_17ecb16835d484638b901b36e1dae6fc . 'servers/' . $OSWAP_b69a7729e1ccb4639eb5b5295a641bad . '/version')) $temps['版本'] = file_get_contents($OSWAP_17ecb16835d484638b901b36e1dae6fc . 'servers/' . $OSWAP_b69a7729e1ccb4639eb5b5295a641bad . '/version');
                else $temps['版本'] = - 1;
                if ($OSWAP_40e124a80fcc8ca49fe7fe35ad86ed14on[$OSWAP_b69a7729e1ccb4639eb5b5295a641bad] == '1') $temps['启动'] = 1;
                else $temps['启动'] = 0;
                $temps['system'] = 'server';
                $OSWAP_b7da14f6d30a57d6556466c8bacc5350dirs[] = $temps;
            }
        }
        return array(
            'lx' => 'return',
            'plugdirs' => $OSWAP_40e124a80fcc8ca49fe7fe35ad86ed14dirs,
            'serverdirs' => $OSWAP_b7da14f6d30a57d6556466c8bacc5350dirs,
            'serverdir' => $OSWAP_b7da14f6d30a57d6556466c8bacc5350dir,
            'plugdir' => $OSWAP_40e124a80fcc8ca49fe7fe35ad86ed14dir
        );
    }
    static function plug_index() {
        $OSWAP_b7da14f6d30a57d6556466c8bacc5350dir = File::get_dirs(SWAP_LIB . 'servers/');
        $OSWAP_40e124a80fcc8ca49fe7fe35ad86ed14dir = File::get_dirs(SWAP_PLUGINS);
        return array(
            'lx' => 'return',
            'serverdir' => $OSWAP_b7da14f6d30a57d6556466c8bacc5350dir,
            'plugdir' => $OSWAP_40e124a80fcc8ca49fe7fe35ad86ed14dir
        );
    }
    static function plug_install($OSWAP_821b637388f0ac7298a6721379641cb0) {
        if ($OSWAP_821b637388f0ac7298a6721379641cb0['插件类型'] == '服务器插件') {
            if (file_exists(SWAP_LIB . 'servers/' . $OSWAP_821b637388f0ac7298a6721379641cb0['插件缩写'] . '/')) {
                $OSWAP_821b637388f0ac7298a6721379641cb0ook = 1;
            } else {
                $OSWAP_821b637388f0ac7298a6721379641cb0ook = 0;
            }
        } else {
            if (file_exists(SWAP_PLUGINS . $OSWAP_821b637388f0ac7298a6721379641cb0['插件缩写'] . '/')) {
                $OSWAP_821b637388f0ac7298a6721379641cb0ook = 1;
            } else {
                $OSWAP_821b637388f0ac7298a6721379641cb0ook = 0;
            }
        }
        $OSWAP_40466b777a65214e9802401e9610fad8 = RUN_ENV;
        $swapversion = VERSION;
        return array(
            'lx' => 'return',
            'pluginook' => $OSWAP_821b637388f0ac7298a6721379641cb0ook,
            'RUN_ENV' => $OSWAP_40466b777a65214e9802401e9610fad8,
            'swapversion' => $swapversion
        );
    }
    static function plug_unstall($OSWAP_24c4f52ce82c1be0c7a073c239fcf553, $OSWAP_0d07de59261cc2c9023b194184c575fb) {
        if ($OSWAP_24c4f52ce82c1be0c7a073c239fcf553 == "lib") {
            $OSWAP_37875703710ccd2290c4d8562546d55a = SWAP_PLUGINS;
        } else if ($OSWAP_24c4f52ce82c1be0c7a073c239fcf553 == "server") {
            $OSWAP_37875703710ccd2290c4d8562546d55a = SWAP_LIB . 'servers/';
        } else return array(
            'lx' => 'die',
            'msg' => "不支持的卸载方式"
        );
        if (file_exists($OSWAP_37875703710ccd2290c4d8562546d55a . $OSWAP_0d07de59261cc2c9023b194184c575fb . '/')) {
            File::del_dir($OSWAP_37875703710ccd2290c4d8562546d55a . $OSWAP_0d07de59261cc2c9023b194184c575fb . '/');
            if ($OSWAP_24c4f52ce82c1be0c7a073c239fcf553 == "lib") {
                SMACSQL()->delete('插件', "插件名='" . $OSWAP_0d07de59261cc2c9023b194184c575fb . "'");
                SMACSQL()->delete('支付接口', "支付接口名称='" . $OSWAP_0d07de59261cc2c9023b194184c575fb . "'");
                SMACSQL()->delete('插件配置', "插件名称='" . $OSWAP_0d07de59261cc2c9023b194184c575fb . "'");
            }
            return array(
                'lx' => 'die',
                'msg' => 'ok'
            );
        } else {
            return array(
                'lx' => 'die',
                'msg' => "不存在的插件"
            );
        }
    }
    static function plug_qd($OSWAP_0d07de59261cc2c9023b194184c575fb) {
        SMACSQL()->insert('插件', '插件名,启用', "'" . $OSWAP_0d07de59261cc2c9023b194184c575fb . "','1'");
        return array(
            'lx' => 'die',
            'msg' => 'ok'
        );
    }
    static function plug_gb($OSWAP_0d07de59261cc2c9023b194184c575fb) {
        SMACSQL()->delete('插件', "插件名='" . $OSWAP_0d07de59261cc2c9023b194184c575fb . "'");
        return array(
            'lx' => 'die',
            'msg' => 'ok'
        );
    }
    static function plug_setting($OSWAP_0d07de59261cc2c9023b194184c575fb) {
        $OSWAP_37875703710ccd2290c4d8562546d55a = SWAP_PLUGINS;
        if (file_exists($OSWAP_37875703710ccd2290c4d8562546d55a . $OSWAP_0d07de59261cc2c9023b194184c575fb . '/swap_config.php')) {
            $OSWAP_63e29f0f36f8e0e4b3ad59487599f02a = array();
            SMACSQL()->select('插件配置', '*', "插件名称='" . $OSWAP_0d07de59261cc2c9023b194184c575fb . "'");
            $OSWAP_63e29f0f36f8e0e4b3ad59487599f02as = array();
            while ($OSWAP_51d4cad9672e6605c99e0c3d678f456e = SMACSQL()->fetch_assoc()) {
                $OSWAP_63e29f0f36f8e0e4b3ad59487599f02a[] = $OSWAP_51d4cad9672e6605c99e0c3d678f456e;
            }
            foreach ($OSWAP_63e29f0f36f8e0e4b3ad59487599f02a as $OSWAP_51d4cad9672e6605c99e0c3d678f456e) {
                $OSWAP_63e29f0f36f8e0e4b3ad59487599f02as[$OSWAP_51d4cad9672e6605c99e0c3d678f456e['名']] = $OSWAP_51d4cad9672e6605c99e0c3d678f456e['值'];
            }
            $OSWAP_5c1735541b9054001799311d4fececa5 = setplug($OSWAP_0d07de59261cc2c9023b194184c575fb);
            $ok = 1;
        } else {
            $ok = 0;
        }
        return array(
            'lx' => 'return',
            'ok' => $ok,
            'pconfs' => $OSWAP_5c1735541b9054001799311d4fececa5,
            'vals' => $OSWAP_63e29f0f36f8e0e4b3ad59487599f02as
        );
    }
    static function plug_setting_form($OSWAP_0d07de59261cc2c9023b194184c575fb, $OSWAP_66189eb7098b09b18bfaa8454c4e10d2) {
        foreach ($OSWAP_66189eb7098b09b18bfaa8454c4e10d2 as $OSWAP_6291cc79354613208317e7b10b238055 => $OSWAP_63e29f0f36f8e0e4b3ad59487599f02a) {
            if ($OSWAP_63e29f0f36f8e0e4b3ad59487599f02a == '') $OSWAP_63e29f0f36f8e0e4b3ad59487599f02a = NULL;
            plug_eva($OSWAP_0d07de59261cc2c9023b194184c575fb, $OSWAP_6291cc79354613208317e7b10b238055, $OSWAP_63e29f0f36f8e0e4b3ad59487599f02a);
        }
        return array(
            'lx' => 'die',
            'msg' => 'ok'
        );
    }
    static function pay() {
        SMACSQL()->select('支付接口', '*');
        while ($OSWAP_51d4cad9672e6605c99e0c3d678f456e = SMACSQL()->fetch_assoc()) {
            $OSWAP_40e124a80fcc8ca49fe7fe35ad86ed14on[$OSWAP_51d4cad9672e6605c99e0c3d678f456e['支付接口名称']] = array(
                '启动' => $OSWAP_51d4cad9672e6605c99e0c3d678f456e['启动'],
                '货币id' => $OSWAP_51d4cad9672e6605c99e0c3d678f456e['货币id']
            );
        }
        SMACSQL()->select('货币设置', '*');
        $OSWAP_8db3b9166f01c29a81c2abba00abba61 = array();
        while ($OSWAP_51d4cad9672e6605c99e0c3d678f456e = SMACSQL()->fetch_assoc()) {
            $OSWAP_8db3b9166f01c29a81c2abba00abba61[] = $OSWAP_51d4cad9672e6605c99e0c3d678f456e;
        }
        $OSWAP_37875703710ccd2290c4d8562546d55a = SWAP_PLUGINS;
        $OSWAP_40e124a80fcc8ca49fe7fe35ad86ed14dir = File::get_dirs($OSWAP_37875703710ccd2290c4d8562546d55a);
        return array(
            'lx' => 'return',
            'plugdir' => $OSWAP_40e124a80fcc8ca49fe7fe35ad86ed14dir,
            'moneys' => $OSWAP_8db3b9166f01c29a81c2abba00abba61,
            'plugon' => $OSWAP_40e124a80fcc8ca49fe7fe35ad86ed14on
        );
    }
    static function pay_qd($OSWAP_0d07de59261cc2c9023b194184c575fb, $id) {
        SMACSQL()->insert('支付接口', '支付接口名称,启动,货币id', "'" . $OSWAP_0d07de59261cc2c9023b194184c575fb . "','1','" . $id . "'");
        return array(
            'lx' => 'die',
            'msg' => 'ok'
        );
    }
    static function pay_gb($OSWAP_0d07de59261cc2c9023b194184c575fb) {
        SMACSQL()->delete('支付接口', "支付接口名称='" . $OSWAP_0d07de59261cc2c9023b194184c575fb . "'");
        return array(
            'lx' => 'die',
            'msg' => 'ok'
        );
    }
    static function update_database() {
        define("ACTION", "OK");
        return array(
            'lx' => 'die',
            'msg' => 'Function Deleted!'
        );
    }
}
function setplug($OSWAP_821b637388f0ac7298a6721379641cb0) {
    requirer(SWAP_PLUGINS . $OSWAP_821b637388f0ac7298a6721379641cb0 . SWAP_DIR_END . 'swap_config.php');
    if (function_exists('plug_set_config')) return plug_set_config();
    else return array();
}
class AdminT {
    static function navbar() {
        echo "<div class=\"navbar\"><div class=\"navbar-inner container\"><div class=\"sidebar-pusher\"><a href=\"javascript:void(0);\" class=\"waves-effect waves-button waves-classic push-sidebar\"><i class=\"fa fa-bars\"></i></a></div><div class=\"logo-box\"><a href=\"/index.php/Admin/\" class=\"logo-text\"><span>SWAPIDC</span></a></div><div class=\"search-button\"><a href=\"javascript:void(0);\" class=\"waves-effect waves-button waves-classic show-search\"><i class=\"fa fa-search\"></i></a></div><div class=\"topmenu-outer\"><div class=\"top-menu\"><ul class=\"nav navbar-nav navbar-left\"><li>		<a href=\"javascript:void(0);\" class=\"waves-effect waves-button waves-classic sidebar-toggle\"><i class=\"fa fa-bars\"></i></a></li><li><a href=\"#cd-nav\" class=\"waves-effect waves-button waves-classic cd-nav-trigger\"><i class=\"fa fa-diamond\"></i></a></li><li>		<a href=\"javascript:void(0);\" class=\"waves-effect waves-button waves-classic toggle-fullscreen\"><i class=\"fa fa-expand\"></i></a></li></ul><ul class=\"nav navbar-nav navbar-right\"><li>	<a href=\"javascript:void(0);\" class=\"waves-effect waves-button waves-classic show-search\"><i class=\"fa fa-search\"></i></a></li></ul></div></div></div></div>";
    }
    static function header($OSWAP_c8af752ff2384e9e0f6dbe4bce4dea33, $OSWAP_b841d8e57855e0dee7a48e5cc871ba76) {
        echo "<!DOCTYPE html><html><head><!--Title--><title>SWAPIDC|" . $OSWAP_c8af752ff2384e9e0f6dbe4bce4dea33 . "</title><meta content=\"width=device-width, initial-scale=1\"name=\"viewport\"/><meta charset=\"UTF-8\"><meta name=\"author\"content=\"Shiyunjin\"/><!--Styles--><link href='https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700'rel='stylesheet'type='text/css'><link href=\"/admin_assets/plugins/pace-master/themes/blue/pace-theme-flash.css\"rel=\"stylesheet\"/><link href=\"/admin_assets/plugins/uniform/css/uniform.default.min.css\"rel=\"stylesheet\"/><link href=\"/admin_assets/plugins/bootstrap/css/bootstrap.min.css\"rel=\"stylesheet\"type=\"text/css\"/><link href=\"https://cdn.bootcss.com/font-awesome/4.3.0/css/font-awesome.min.css\"rel=\"stylesheet\"type=\"text/css\"/><link href=\"/admin_assets/plugins/line-icons/simple-line-icons.css\"rel=\"stylesheet\"type=\"text/css\"/><link href=\"/admin_assets/plugins/waves/waves.min.css\"rel=\"stylesheet\"type=\"text/css\"/><link href=\"/admin_assets/plugins/switchery/switchery.min.css\"rel=\"stylesheet\"type=\"text/css\"/><link href=\"/admin_assets/plugins/3d-bold-navigation/css/style.css\"rel=\"stylesheet\"type=\"text/css\"/><link href=\"/admin_assets/plugins/slidepushmenus/css/component.css\"rel=\"stylesheet\"type=\"text/css\"/><link href=\"/admin_assets/plugins/weather-icons-master/css/weather-icons.min.css\"rel=\"stylesheet\"type=\"text/css\"/><link href=\"/admin_assets/plugins/metrojs/MetroJs.min.css\"rel=\"stylesheet\"type=\"text/css\"/><link href=\"/admin_assets/plugins/toastr/toastr.min.css\"rel=\"stylesheet\"type=\"text/css\"/><link href=\"/admin_assets/plugins/morris/morris.css\"rel=\"stylesheet\"type=\"text/css\"/>" . $OSWAP_b841d8e57855e0dee7a48e5cc871ba76 . "<!--Theme Styles--><link href=\"/admin_assets/css/modern.min.css\"rel=\"stylesheet\"type=\"text/css\"/><link href=\"/admin_assets/css/custom.css\"rel=\"stylesheet\"type=\"text/css\"/><script src=\"/admin_assets/plugins/3d-bold-navigation/js/modernizr.js\"></script><!--HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries--><!--WARNING:Respond.js doesn't work if you view the page via file:// --><!--[if lt IE 9]><script src=\"https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js\"></script><script src=\"https://oss.maxcdn.com/respond/1.4.2/respond.min.js\"></script><![endif]--></head><body class=\"page-header-fixed compact-menu page-horizontal-bar\"style=\"font-family: 'Arial','Microsoft YaHei','黑体','宋体',sans-serif;\">";
    }
    static function search() {
        echo "<div class=\"overlay\"></div><form class=\"search-form\"action=\"http://blog.swapteam.cn/\"method=\"GET\"target=\"_blank\"><div class=\"input-group\"><input type=\"text\"name=\"s\"class=\"form-control search-input\"placeholder=\"搜索关于SWAPIDC的帮助...\"><span class=\"input-group-btn\"><button class=\"btn btn-default close-search waves-effect waves-button waves-classic\"type=\"button\"><i class=\"fa fa-times\"></i></button></span></div><!--Input Group--></form><!--Search Form-->";
    }
    static function sidebar() { ?>
            <div class="page-sidebar sidebar horizontal-bar">
                <div class="page-sidebar-inner">
                    <ul class="menu accordion-menu">
                        <li><a href="/index.php/Admin/"><span class="menu-icon icon-speedometer"></span><p>仪表盘</p></a></li>
                        <li><a href="/index.php/Admin/User_All/"><span class="menu-icon icon-user"></span><p>用户管理</p></a></li>
                        <li class="droplink"><a href="#"><span class="menu-icon icon-envelope-open"></span><p>工单管理</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
                                <li><a href="/index.php/Admin/ticket_open/">开启的工单</a></li>
                                <li><a href="/index.php/Admin/ticket_want/">回复的工单</a></li>
                                <li><a href="/index.php/Admin/ticket_close/">关闭的工单</a></li>
                            </ul>
                        </li>
                        <li class="droplink"><a href="#"><span class="menu-icon icon-briefcase"></span><p>网站内容</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
                                <li><a href="/index.php/Admin/Announcement/">网站公告</a></li>
                                <li><a href="/index.php/Admin/Help/">帮助中心</a></li>
                                <li><a href="/index.php/Admin/network/">网络故障</a></li>
                            </ul>
                        </li>
                        <li class="droplink"><a href="#"><span class="menu-icon icon-layers"></span><p>产品管理</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
                                <li><a href="/index.php/Admin/Good_Group/">产品组</a></li>
                                <li><a href="/index.php/Admin/Product/">产品列表</a></li>
                                <li><a href="/index.php/Admin/ConfigOptions/">自定义配置</a></li>
                            </ul>
                        </li>
                        <li class="droplink"><a href="#"><span class="menu-icon icon-grid"></span><p>服务管理</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
                                <li><a href="/index.php/Admin/server_review/">等待审核</a></li>
                                <li><a href="/index.php/Admin/Server_All/">所有服务</a></li>
                            </ul>
                        </li>
                        <li><a href="/index.php/Admin/Servicer/"><span class="menu-icon icon-drawer"></span><p>服务器</p><span class="arrow"></span></a></li>
                        <li><a href="/index.php/Admin/Promo/"><span class="menu-icon icon-tag"></span><p>优惠码</p><span class="arrow"></span></a></li>
                        <li class="droplink"><a href="#"><span class="menu-icon icon-settings"></span><p>网站设置</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
                                <li><a href="/index.php/Admin/Settings/">网站设置</a></li>
                                <li><a href="/index.php/Admin/Cron_Setting/">自动处理设置</a></li>
								<li><a href="/index.php/Admin/Mail_Settings/">邮件设置</a></li>
								<li><a href="/index.php/Admin/Money/">货币设置</a></li>
<?php
        if (file_exists(SWAP_ROOT . SWAP_TEMPLATES_ROOT . SWAP_DIR_END . 'lib' . SWAP_DIR_END . 'setting.php')) { ?>
								<li><a href="/index.php/Admin/Template_Setting/">模版设置</a></li>
<?php
        }
        $OSWAP_0a1667e940e946a39e0bade3f13417ac = array();
        do_temp_plug('管理员菜单列表', $OSWAP_0a1667e940e946a39e0bade3f13417ac);
        foreach ($OSWAP_0a1667e940e946a39e0bade3f13417ac as $OSWAP_51d4cad9672e6605c99e0c3d678f456e) {
            echo '<li><a href="' . $OSWAP_51d4cad9672e6605c99e0c3d678f456e['link'] . '" target="_blank">' . $OSWAP_51d4cad9672e6605c99e0c3d678f456e['name'] . '</a></li>';
        } ?>
                            </ul>
                        </li>
                        <li><a href="/index.php/Admin/Support/"><span class="menu-icon icon-support"></span><p>支持</p><span class="arrow"></span></a></li>
                        <li><a href="/index.php/Admin/LoginOut/"><span class="menu-icon icon-power"></span><p>退出系统</p><span class="arrow"></span></a></li>
                    </ul>
                </div><!-- Page Sidebar Inner -->
            </div><!-- Page Sidebar -->
<?php
    }
    static function page_footer() {
        echo "<div class=\"page-footer\"><div class=\"container\"><p class=\"no-s\">2015 &copy; Powered by <a href=\"http://www.swapidc.com/\">SWAPIDC</a>.</p></div></div>";
    }
    static function title($OSWAP_0d07de59261cc2c9023b194184c575fb, $OSWAP_b841d8e57855e0dee7a48e5cc871ba76 = '', $OSWAP_b841d8e57855e0dee7a48e5cc871ba762 = '') {
        echo "<div class=\"page-breadcrumb\"><ol class=\"breadcrumb container\"><li><a href=\"/index.php/Admin/\">SWAPIDC</a></li>" . $OSWAP_b841d8e57855e0dee7a48e5cc871ba76 . "<li class=\"active\">{$OSWAP_0d07de59261cc2c9023b194184c575fb}</li></ol></div><div class=\"page-title\"><div class=\"container\"><h3>{$OSWAP_0d07de59261cc2c9023b194184c575fb} {$OSWAP_b841d8e57855e0dee7a48e5cc871ba762}</h3></div></div>";
    }
    static function cd_nav() {
        echo "<nav class=\"cd-nav-container\"id=\"cd-nav\"><header><h3>快捷导航</h3><a href=\"#0\"class=\"cd-close-nav\">关闭</a></header><ul class=\"cd-nav list-unstyled\"><li data-menu=\"index\"><a href=\"/index.php/Admin/\"><span><i class=\"glyphicon glyphicon-home\"></i></span><p>仪表盘</p></a></li><li data-menu=\"profile\"><a href=\"/index.php/Admin/User_All/\"><span><i class=\"glyphicon glyphicon-user\"></i></span><p>用户</p></a></li><li data-menu=\"inbox\"><a href=\"/index.php/Admin/ticket_open/\"><span><i class=\"glyphicon glyphicon-envelope\"></i></span><p>工单</p></a></li><li data-menu=\"#\"><a href=\"/index.php/Admin/Server_All/\"><span><i class=\"glyphicon glyphicon-th-large\"></i></span><p>服务</p></a></li><li data-menu=\"#\"><a href=\"/index.php/Admin/Settings/\"><span><i class=\"glyphicon glyphicon-cog\"></i></span><p>设置</p></a></li><li data-menu=\"calendar\"><a href=\"/index.php/Admin/LoginOut/\"><span><i class=\"glyphicon glyphicon-off\"></i></span><p>退出</p></a></li></ul></nav><div class=\"cd-overlay\"></div>";
    }
    static function pjs() {
        echo "<script src=\"/admin_assets/plugins/jquery/jquery-2.1.3.min.js\"></script><script src=\"/admin_assets/plugins/jquery-ui/jquery-ui.min.js\"></script><script src=\"/admin_assets/plugins/pace-master/pace.min.js\"></script><script src=\"/admin_assets/plugins/jquery-blockui/jquery.blockui.js\"></script><script src=\"/admin_assets/plugins/bootstrap/js/bootstrap.min.js\"></script><script src=\"/admin_assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js\"></script><script src=\"/admin_assets/plugins/switchery/switchery.min.js\"></script><script src=\"/admin_assets/plugins/uniform/jquery.uniform.min.js\"></script><script src=\"/admin_assets/plugins/classie/classie.js\"></script><script src=\"/admin_assets/plugins/waves/waves.min.js\"></script><script src=\"/admin_assets/plugins/3d-bold-navigation/js/main.js\"></script><script src=\"/admin_assets/js/alert.js\"></script>";
        $OSWAP_3be02959bfae2de07e26d825a109b341 = @urldecode(_GET('warning'));
        if (!empty($OSWAP_3be02959bfae2de07e26d825a109b341)) {
            echo "<script>$(document).ready(function() {swap_alert('error','数据错误','{$OSWAP_3be02959bfae2de07e26d825a109b341}');});</script>";
        }
    }
}

