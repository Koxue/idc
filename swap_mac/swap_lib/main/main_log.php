<?php  class Log { const EMERG = 'EMERG'; const ALERT = 'ALERT'; const CRIT = 'CRIT'; const ERR = 'ERR'; const WARN = 'WARN'; const NOTICE = 'NOTIC'; const INFO = 'INFO'; const DEBUG = 'DEBUG'; const SQL = 'SQL'; const SYSTEM = 0; const MAIL = 1; const TCP = 2; const FILE = 3; static $OSWAP_3cba39d60ec8fe8724b3b19d5c10f353 = array(); static $OSWAP_152a25e4380a208ac3126e2b568f9200at = '[ c ]'; static function record($OSWAP_e944d3dfbac154a6a70ca38a065998b0,$OSWAP_46bbe6abdd3a6c4da3eb1ca8617397ed=self::ERR,$OSWAP_f57d62175d804e070a95abd9556638c1=false) { if($OSWAP_f57d62175d804e070a95abd9556638c1 || false!== strpos(C('LOG_RECORD_LEVEL'),$OSWAP_46bbe6abdd3a6c4da3eb1ca8617397ed)) { $OSWAP_07585648a3729ac4f64d43e191b22832 = date(self::$OSWAP_152a25e4380a208ac3126e2b568f9200at); self::$OSWAP_3cba39d60ec8fe8724b3b19d5c10f353[] = "{$OSWAP_07585648a3729ac4f64d43e191b22832} {$OSWAP_46bbe6abdd3a6c4da3eb1ca8617397ed}: {$OSWAP_e944d3dfbac154a6a70ca38a065998b0}\r\n"; } } static function save($OSWAP_5bed70325152f4f084fa2ddcf96f4b8b=self::FILE,$OSWAP_559f722d6ef8b7a4bf4c275685523f8a='',$OSWAP_15d3b483d88efbc989957cbea1a8846dra='') { if(empty($OSWAP_559f722d6ef8b7a4bf4c275685523f8a)) $OSWAP_559f722d6ef8b7a4bf4c275685523f8a = SWAP_ERROR.date('y_m_d').".log"; if(self::FILE == $OSWAP_5bed70325152f4f084fa2ddcf96f4b8b) { if(is_file($OSWAP_559f722d6ef8b7a4bf4c275685523f8a) && floor(C('LOG_FILE_SIZE')) <= filesize($OSWAP_559f722d6ef8b7a4bf4c275685523f8a) ) rename($OSWAP_559f722d6ef8b7a4bf4c275685523f8a,dirname($OSWAP_559f722d6ef8b7a4bf4c275685523f8a).'/'.time().'-'.basename($OSWAP_559f722d6ef8b7a4bf4c275685523f8a)); } error_log(implode("",self::$OSWAP_3cba39d60ec8fe8724b3b19d5c10f353), $OSWAP_5bed70325152f4f084fa2ddcf96f4b8b,$OSWAP_559f722d6ef8b7a4bf4c275685523f8a ,$OSWAP_15d3b483d88efbc989957cbea1a8846dra); self::$OSWAP_3cba39d60ec8fe8724b3b19d5c10f353 = array(); } static function write($OSWAP_e944d3dfbac154a6a70ca38a065998b0,$OSWAP_46bbe6abdd3a6c4da3eb1ca8617397ed=self::ERR,$OSWAP_5bed70325152f4f084fa2ddcf96f4b8b=self::FILE,$OSWAP_559f722d6ef8b7a4bf4c275685523f8a='',$OSWAP_15d3b483d88efbc989957cbea1a8846dra='') { $OSWAP_07585648a3729ac4f64d43e191b22832 = date(self::$OSWAP_152a25e4380a208ac3126e2b568f9200at); if(empty($OSWAP_559f722d6ef8b7a4bf4c275685523f8a)) $OSWAP_559f722d6ef8b7a4bf4c275685523f8a = SWAP_ERROR.date('y_m_d').".log"; if(self::FILE == $OSWAP_5bed70325152f4f084fa2ddcf96f4b8b) { if(is_file($OSWAP_559f722d6ef8b7a4bf4c275685523f8a) && floor(C('LOG_FILE_SIZE')) <= filesize($OSWAP_559f722d6ef8b7a4bf4c275685523f8a) ) rename($OSWAP_559f722d6ef8b7a4bf4c275685523f8a,dirname($OSWAP_559f722d6ef8b7a4bf4c275685523f8a).'/'.time().'-'.basename($OSWAP_559f722d6ef8b7a4bf4c275685523f8a)); } error_log("{$OSWAP_07585648a3729ac4f64d43e191b22832} {$OSWAP_46bbe6abdd3a6c4da3eb1ca8617397ed}: {$OSWAP_e944d3dfbac154a6a70ca38a065998b0}\r\n", $OSWAP_5bed70325152f4f084fa2ddcf96f4b8b,$OSWAP_559f722d6ef8b7a4bf4c275685523f8a,$OSWAP_15d3b483d88efbc989957cbea1a8846dra ); } }