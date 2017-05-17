<?php 
function need_admin() {
	if(session('adminlogin') and session('adminlogin') == $_SERVER['HTTP_USER_AGENT']) {
		return true;
	}else{
		header("Location: /index.php/admin/Login");
		die;
	}
}
function select_query($OSWAP_24da90866e123b1307e0d0715d87665b = "", $OSWAP_05e7e67021a8c275c7e8d287bd63d370 = "", $OSWAP_5215c40d8ad5f72c25a913b62e7d9a50 = "", $OSWAP_4162e2ba3a83006eabfeb48110e0c04eerby = "", $OSWAP_4162e2ba3a83006eabfeb48110e0c04eerbyorder = "", $OSWAP_4a49ae0706b796341bca7a0e0fbd61c7 = "", $OSWAP_d109c7912322d85f714cae9759b03033 = "") {
	if (!$OSWAP_05e7e67021a8c275c7e8d287bd63d370) {
		$OSWAP_05e7e67021a8c275c7e8d287bd63d370 = "*";
	}
	$OSWAP_99985c71b1203e4ed2c08dc3a7a89119 = "SELECT " . $OSWAP_05e7e67021a8c275c7e8d287bd63d370 . " FROM " . db_make_safe_field($OSWAP_24da90866e123b1307e0d0715d87665b);
	if ($OSWAP_d109c7912322d85f714cae9759b03033) {
		$OSWAP_99985c71b1203e4ed2c08dc3a7a89119.= " INNER JOIN " . db_escape_string($OSWAP_d109c7912322d85f714cae9759b03033) . "";
	}
	if ($OSWAP_5215c40d8ad5f72c25a913b62e7d9a50) {
		if (is_array($OSWAP_5215c40d8ad5f72c25a913b62e7d9a50)) {
			$OSWAP_6ab0e575d023a742b8c6d5dfa1090a52 = array();
			foreach ($OSWAP_5215c40d8ad5f72c25a913b62e7d9a50 as $OSWAP_5ba12f91932d9625fbde03f471ebf5ef => $OSWAP_31bb5897a4cf8155e2d7054f8ef132dd) {
				$OSWAP_6291cc79354613208317e7b10b238055 = db_make_safe_field($OSWAP_5ba12f91932d9625fbde03f471ebf5ef);
				if (is_array($OSWAP_31bb5897a4cf8155e2d7054f8ef132dd)) {
					if ($OSWAP_6291cc79354613208317e7b10b238055 == "default") {
						$OSWAP_6291cc79354613208317e7b10b238055 = "`default`";
					}
					if ($OSWAP_31bb5897a4cf8155e2d7054f8ef132dd["sqltype"] == "LIKE") {
						$OSWAP_6ab0e575d023a742b8c6d5dfa1090a52[] = "" . $OSWAP_6291cc79354613208317e7b10b238055 . " LIKE '%" . db_escape_string($OSWAP_31bb5897a4cf8155e2d7054f8ef132dd["value"]) . "%'";
						continue;
					}
					if ($OSWAP_31bb5897a4cf8155e2d7054f8ef132dd["sqltype"] == "NEQ") {
						$OSWAP_6ab0e575d023a742b8c6d5dfa1090a52[] = "" . $OSWAP_6291cc79354613208317e7b10b238055 . "!='" . db_escape_string($OSWAP_31bb5897a4cf8155e2d7054f8ef132dd["value"]) . "'";
						continue;
					}
					if ($OSWAP_31bb5897a4cf8155e2d7054f8ef132dd["sqltype"] == ">") {
						$OSWAP_6ab0e575d023a742b8c6d5dfa1090a52[] = "" . $OSWAP_6291cc79354613208317e7b10b238055 . ">" . db_escape_string($OSWAP_31bb5897a4cf8155e2d7054f8ef132dd["value"]) . "";
						continue;
					}
					if ($OSWAP_31bb5897a4cf8155e2d7054f8ef132dd["sqltype"] == "<") {
						$OSWAP_6ab0e575d023a742b8c6d5dfa1090a52[] = "" . $OSWAP_6291cc79354613208317e7b10b238055 . "<" . db_escape_string($OSWAP_31bb5897a4cf8155e2d7054f8ef132dd["value"]) . "";
						continue;
					}
					if ($OSWAP_31bb5897a4cf8155e2d7054f8ef132dd["sqltype"] == "<=") {
						$OSWAP_6ab0e575d023a742b8c6d5dfa1090a52[] = "" . $OSWAP_5ba12f91932d9625fbde03f471ebf5ef . "<=" . db_escape_string($OSWAP_31bb5897a4cf8155e2d7054f8ef132dd["value"]) . "";
						continue;
					}
					if ($OSWAP_31bb5897a4cf8155e2d7054f8ef132dd["sqltype"] == ">=") {
						$OSWAP_6ab0e575d023a742b8c6d5dfa1090a52[] = "" . $OSWAP_5ba12f91932d9625fbde03f471ebf5ef . ">=" . db_escape_string($OSWAP_31bb5897a4cf8155e2d7054f8ef132dd["value"]) . "";
						continue;
					}
					if ($OSWAP_31bb5897a4cf8155e2d7054f8ef132dd["sqltype"] == "TABLEJOIN") {
						$OSWAP_6ab0e575d023a742b8c6d5dfa1090a52[] = "" . $OSWAP_6291cc79354613208317e7b10b238055 . "=" . $OSWAP_31bb5897a4cf8155e2d7054f8ef132dd["value"] . "";
						continue;
					}
					if ($OSWAP_31bb5897a4cf8155e2d7054f8ef132dd["sqltype"] == "IN") {
						$OSWAP_6ab0e575d023a742b8c6d5dfa1090a52[] = "" . $OSWAP_6291cc79354613208317e7b10b238055 . " IN ('" . implode("','", db_escape_array($OSWAP_31bb5897a4cf8155e2d7054f8ef132dd["values"])) . "')";
						continue;
					}
					continue;
				}
				if (substr($OSWAP_6291cc79354613208317e7b10b238055, 0, 3) == "MD5") {
					$OSWAP_6291cc79354613208317e7b10b238055 = explode("(", $OSWAP_5ba12f91932d9625fbde03f471ebf5ef, 2);
					$OSWAP_6291cc79354613208317e7b10b238055 = explode(")", $OSWAP_6291cc79354613208317e7b10b238055[1], 2);
					$OSWAP_6291cc79354613208317e7b10b238055 = db_make_safe_field($OSWAP_6291cc79354613208317e7b10b238055[0]);
					$OSWAP_6291cc79354613208317e7b10b238055 = "MD5(" . $OSWAP_6291cc79354613208317e7b10b238055 . ")";
				} else {
					if (strpos($OSWAP_6291cc79354613208317e7b10b238055, ".")) {
						$OSWAP_6291cc79354613208317e7b10b238055 = explode(".", $OSWAP_6291cc79354613208317e7b10b238055);
						$OSWAP_6291cc79354613208317e7b10b238055 = "`" . $OSWAP_6291cc79354613208317e7b10b238055[0] . "`.`" . $OSWAP_6291cc79354613208317e7b10b238055[1] . "`";
					} else {
						$OSWAP_6291cc79354613208317e7b10b238055 = "`" . $OSWAP_6291cc79354613208317e7b10b238055 . "`";
					}
				}
				$OSWAP_6ab0e575d023a742b8c6d5dfa1090a52[] = "" . $OSWAP_6291cc79354613208317e7b10b238055 . "='" . db_escape_string($OSWAP_31bb5897a4cf8155e2d7054f8ef132dd) . "'";
			}
			$OSWAP_99985c71b1203e4ed2c08dc3a7a89119.= " WHERE " . implode(" AND ", $OSWAP_6ab0e575d023a742b8c6d5dfa1090a52);
		} else {
			$OSWAP_99985c71b1203e4ed2c08dc3a7a89119.= " WHERE " . $OSWAP_5215c40d8ad5f72c25a913b62e7d9a50;
		}
	}
	if ($OSWAP_4162e2ba3a83006eabfeb48110e0c04eerby) {
		$OSWAP_4162e2ba3a83006eabfeb48110e0c04eerbysql = tokenizeOrderby($OSWAP_4162e2ba3a83006eabfeb48110e0c04eerby, $OSWAP_4162e2ba3a83006eabfeb48110e0c04eerbyorder);
		$OSWAP_99985c71b1203e4ed2c08dc3a7a89119.= " ORDER BY " . implode(",", $OSWAP_4162e2ba3a83006eabfeb48110e0c04eerbysql);
	}
	if ($OSWAP_4a49ae0706b796341bca7a0e0fbd61c7) {
		if (strpos($OSWAP_4a49ae0706b796341bca7a0e0fbd61c7, ",")) {
			$OSWAP_4a49ae0706b796341bca7a0e0fbd61c7 = explode(",", $OSWAP_4a49ae0706b796341bca7a0e0fbd61c7);
			$OSWAP_4a49ae0706b796341bca7a0e0fbd61c7 = (int)$OSWAP_4a49ae0706b796341bca7a0e0fbd61c7[0] . "," . (int)$OSWAP_4a49ae0706b796341bca7a0e0fbd61c7[1];
		} else {
			$OSWAP_4a49ae0706b796341bca7a0e0fbd61c7 = (int)$OSWAP_4a49ae0706b796341bca7a0e0fbd61c7;
		}
		$OSWAP_99985c71b1203e4ed2c08dc3a7a89119.= " LIMIT " . $OSWAP_4a49ae0706b796341bca7a0e0fbd61c7;
	}
	$OSWAP_2e29d37ed05a8087327b406a5df9d569 = SMACSQL()->query($OSWAP_99985c71b1203e4ed2c08dc3a7a89119);
	return $OSWAP_2e29d37ed05a8087327b406a5df9d569;
}
function tokenizeOrderby($OSWAP_c1fb9bc12d5b8493d6898fd6d02cd192, $OSWAP_b8d0def30455da8521bcbdb9b4e94d16 = "ASC") {
	$OSWAP_924a0c15888e9c584d59f888acaa4127_separator = ",";
	$OSWAP_924a0c15888e9c584d59f888acaa4127_begin = "`";
	$OSWAP_924a0c15888e9c584d59f888acaa4127_end = "`";
	$OSWAP_ac1095e8638588f8fac24cd817e24d8d = ".";
	$OSWAP_6369da76e8b888a0ef59f83e7ea369f9 = $OSWAP_924a0c15888e9c584d59f888acaa4127_end . $OSWAP_ac1095e8638588f8fac24cd817e24d8d . $OSWAP_924a0c15888e9c584d59f888acaa4127_begin;
	$OSWAP_4162e2ba3a83006eabfeb48110e0c04eer_up_rev = "CSA ";
	$OSWAP_4162e2ba3a83006eabfeb48110e0c04eer_down_rev = "CSED ";
	if ($OSWAP_b8d0def30455da8521bcbdb9b4e94d16) {
		$OSWAP_b8d0def30455da8521bcbdb9b4e94d16 = trim($OSWAP_b8d0def30455da8521bcbdb9b4e94d16);
	} else {
		$OSWAP_b8d0def30455da8521bcbdb9b4e94d16 = "ASC";
	}
	$OSWAP_7aad8a913fd77ff6d209454364dc879e = strrev(" " . $OSWAP_b8d0def30455da8521bcbdb9b4e94d16);
	if (($OSWAP_7aad8a913fd77ff6d209454364dc879e != $OSWAP_4162e2ba3a83006eabfeb48110e0c04eer_up_rev && $OSWAP_7aad8a913fd77ff6d209454364dc879e != $OSWAP_4162e2ba3a83006eabfeb48110e0c04eer_down_rev)) {
		$OSWAP_7aad8a913fd77ff6d209454364dc879e = $OSWAP_4162e2ba3a83006eabfeb48110e0c04eer_up_rev;
	}
	$OSWAP_e9abeb3c57dd87d61d3b30069ef43136 = array();
	$i = 8;
	$OSWAP_924a0c15888e9c584d59f888acaa4127 = strtok($OSWAP_c1fb9bc12d5b8493d6898fd6d02cd192, $OSWAP_924a0c15888e9c584d59f888acaa4127_separator);
	while (($i < 30 && $OSWAP_924a0c15888e9c584d59f888acaa4127 !== false)) {
		$OSWAP_924a0c15888e9c584d59f888acaa4127 = trim($OSWAP_924a0c15888e9c584d59f888acaa4127);
		if (!$OSWAP_924a0c15888e9c584d59f888acaa4127) {
			continue;
		}
		while (strpos($OSWAP_924a0c15888e9c584d59f888acaa4127, $OSWAP_924a0c15888e9c584d59f888acaa4127_begin) === 0) {
			$OSWAP_924a0c15888e9c584d59f888acaa4127 = substr($OSWAP_924a0c15888e9c584d59f888acaa4127, 1);
		}
		$OSWAP_3c7d37132d5a685e7b6c60f879968661 = strrev($OSWAP_924a0c15888e9c584d59f888acaa4127);
		$OSWAP_4162e2ba3a83006eabfeb48110e0c04eering_field_rev = "";
		if (strpos($OSWAP_3c7d37132d5a685e7b6c60f879968661, $OSWAP_4162e2ba3a83006eabfeb48110e0c04eer_up_rev) === 0) {
			$OSWAP_4162e2ba3a83006eabfeb48110e0c04eering_field_rev.= $OSWAP_4162e2ba3a83006eabfeb48110e0c04eer_up_rev;
			$OSWAP_3c7d37132d5a685e7b6c60f879968661 = substr($OSWAP_3c7d37132d5a685e7b6c60f879968661, strlen($OSWAP_4162e2ba3a83006eabfeb48110e0c04eer_up_rev));
		} else {
			if (strpos($OSWAP_3c7d37132d5a685e7b6c60f879968661, $OSWAP_4162e2ba3a83006eabfeb48110e0c04eer_down_rev) === 0) {
				$OSWAP_4162e2ba3a83006eabfeb48110e0c04eering_field_rev.= $OSWAP_4162e2ba3a83006eabfeb48110e0c04eer_down_rev;
				$OSWAP_3c7d37132d5a685e7b6c60f879968661 = substr($OSWAP_3c7d37132d5a685e7b6c60f879968661, strlen($OSWAP_4162e2ba3a83006eabfeb48110e0c04eer_down_rev));
			} else {
				$OSWAP_4162e2ba3a83006eabfeb48110e0c04eering_field_rev.= $OSWAP_7aad8a913fd77ff6d209454364dc879e;
			}
		}
		while (strpos($OSWAP_3c7d37132d5a685e7b6c60f879968661, $OSWAP_924a0c15888e9c584d59f888acaa4127_end) === 0) {
			$OSWAP_3c7d37132d5a685e7b6c60f879968661 = substr($OSWAP_3c7d37132d5a685e7b6c60f879968661, 1);
		}
		$OSWAP_924a0c15888e9c584d59f888acaa4127 = strrev($OSWAP_3c7d37132d5a685e7b6c60f879968661);
		$OSWAP_924a0c15888e9c584d59f888acaa4127_parts = explode($OSWAP_6369da76e8b888a0ef59f83e7ea369f9, $OSWAP_924a0c15888e9c584d59f888acaa4127, 2);
		$OSWAP_9b616901f1c6ff563980893fca37936b = array();
		foreach ($OSWAP_924a0c15888e9c584d59f888acaa4127_parts as $OSWAP_6291cc79354613208317e7b10b238055 => $OSWAP_42fe3e5281347c3e7b2bba398d0214e6) {
			$OSWAP_875cb76aee37cd9607ffaa3b347e9b87_part = db_make_safe_field($OSWAP_42fe3e5281347c3e7b2bba398d0214e6);
			if ($OSWAP_875cb76aee37cd9607ffaa3b347e9b87_part === trim($OSWAP_42fe3e5281347c3e7b2bba398d0214e6)) {
				$OSWAP_9b616901f1c6ff563980893fca37936b[] = $OSWAP_875cb76aee37cd9607ffaa3b347e9b87_part;
				continue;
			}
		}
		if (1 < count($OSWAP_9b616901f1c6ff563980893fca37936b)) {
			$OSWAP_924a0c15888e9c584d59f888acaa4127 = implode($OSWAP_6369da76e8b888a0ef59f83e7ea369f9, $OSWAP_9b616901f1c6ff563980893fca37936b);
		} else {
			$OSWAP_924a0c15888e9c584d59f888acaa4127 = array_shift($OSWAP_9b616901f1c6ff563980893fca37936b);
		}
		if ($OSWAP_924a0c15888e9c584d59f888acaa4127) {
			$OSWAP_e9abeb3c57dd87d61d3b30069ef43136[] = $OSWAP_924a0c15888e9c584d59f888acaa4127_begin . $OSWAP_924a0c15888e9c584d59f888acaa4127 . $OSWAP_924a0c15888e9c584d59f888acaa4127_end . strrev($OSWAP_4162e2ba3a83006eabfeb48110e0c04eering_field_rev);
		}
		$OSWAP_924a0c15888e9c584d59f888acaa4127 = strtok($OSWAP_924a0c15888e9c584d59f888acaa4127_separator);
		++$i;
	}
	return $OSWAP_e9abeb3c57dd87d61d3b30069ef43136;
}
function update_query($OSWAP_24da90866e123b1307e0d0715d87665b, $OSWAP_a416a4b07b6f280c968f2f3bb53948d5, $OSWAP_5215c40d8ad5f72c25a913b62e7d9a50) {
	$OSWAP_99985c71b1203e4ed2c08dc3a7a89119 = "UPDATE " . db_make_safe_field($OSWAP_24da90866e123b1307e0d0715d87665b) . " SET ";
	foreach ($OSWAP_a416a4b07b6f280c968f2f3bb53948d5 as $OSWAP_6291cc79354613208317e7b10b238055 => $OSWAP_31bb5897a4cf8155e2d7054f8ef132dd) {
		$OSWAP_99985c71b1203e4ed2c08dc3a7a89119.= "`" . db_make_safe_field($OSWAP_6291cc79354613208317e7b10b238055) . "`=";
		if ($OSWAP_31bb5897a4cf8155e2d7054f8ef132dd === "now()") {
			$OSWAP_99985c71b1203e4ed2c08dc3a7a89119.= "'" . date("YmdHis") . "',";
			continue;
		}
		if ($OSWAP_31bb5897a4cf8155e2d7054f8ef132dd === "+1") {
			$OSWAP_99985c71b1203e4ed2c08dc3a7a89119.= "`" . $OSWAP_6291cc79354613208317e7b10b238055 . "`+1,";
			continue;
		}
		if ((is_array($OSWAP_31bb5897a4cf8155e2d7054f8ef132dd) && isset($OSWAP_31bb5897a4cf8155e2d7054f8ef132dd['type'])) && $OSWAP_31bb5897a4cf8155e2d7054f8ef132dd['type'] == "AES_ENCRYPT") {
			$OSWAP_99985c71b1203e4ed2c08dc3a7a89119.= sprintf("AES_ENCRYPT('%s','%s'),", db_escape_string($OSWAP_31bb5897a4cf8155e2d7054f8ef132dd['text']), db_escape_string($OSWAP_31bb5897a4cf8155e2d7054f8ef132dd['hashkey']));
			continue;
		}
		if ($OSWAP_31bb5897a4cf8155e2d7054f8ef132dd === "NULL") {
			$OSWAP_99985c71b1203e4ed2c08dc3a7a89119.= "NULL,";
			continue;
		}
		if (substr($OSWAP_31bb5897a4cf8155e2d7054f8ef132dd, 0, 2) === "+=" && db_is_valid_amount(substr($OSWAP_31bb5897a4cf8155e2d7054f8ef132dd, 2))) {
			$OSWAP_99985c71b1203e4ed2c08dc3a7a89119.= "`" . $OSWAP_6291cc79354613208317e7b10b238055 . "`+" . substr($OSWAP_31bb5897a4cf8155e2d7054f8ef132dd, 2) . ",";
			continue;
		}
		if (substr($OSWAP_31bb5897a4cf8155e2d7054f8ef132dd, 0, 2) === "-=" && db_is_valid_amount(substr($OSWAP_31bb5897a4cf8155e2d7054f8ef132dd, 2))) {
			$OSWAP_99985c71b1203e4ed2c08dc3a7a89119.= "`" . $OSWAP_6291cc79354613208317e7b10b238055 . "`-" . substr($OSWAP_31bb5897a4cf8155e2d7054f8ef132dd, 2) . ",";
			continue;
		}
		$OSWAP_99985c71b1203e4ed2c08dc3a7a89119.= "'" . db_escape_string($OSWAP_31bb5897a4cf8155e2d7054f8ef132dd) . "',";
	}
	$OSWAP_99985c71b1203e4ed2c08dc3a7a89119 = substr($OSWAP_99985c71b1203e4ed2c08dc3a7a89119, 0, 0 - 1);
	if (is_array($OSWAP_5215c40d8ad5f72c25a913b62e7d9a50)) {
		$OSWAP_99985c71b1203e4ed2c08dc3a7a89119.= " WHERE";
		foreach ($OSWAP_5215c40d8ad5f72c25a913b62e7d9a50 as $OSWAP_6291cc79354613208317e7b10b238055 => $OSWAP_31bb5897a4cf8155e2d7054f8ef132dd) {
			if (substr($OSWAP_6291cc79354613208317e7b10b238055, 0, 4) == "MD5(") {
				$OSWAP_6291cc79354613208317e7b10b238055 = "MD5(" . db_make_safe_field(substr($OSWAP_6291cc79354613208317e7b10b238055, 4, 0 - 1)) . ")";
			} else {
				$OSWAP_6291cc79354613208317e7b10b238055 = db_make_safe_field($OSWAP_6291cc79354613208317e7b10b238055);
				if ($OSWAP_6291cc79354613208317e7b10b238055 == "order") {
					$OSWAP_6291cc79354613208317e7b10b238055 = "`order`";
				}
			}
			$OSWAP_99985c71b1203e4ed2c08dc3a7a89119.= " " . $OSWAP_6291cc79354613208317e7b10b238055 . "='" . db_escape_string($OSWAP_31bb5897a4cf8155e2d7054f8ef132dd) . "' AND";
		}
		$OSWAP_99985c71b1203e4ed2c08dc3a7a89119 = substr($OSWAP_99985c71b1203e4ed2c08dc3a7a89119, 0, 0 - 4);
	} else {
		if ($OSWAP_5215c40d8ad5f72c25a913b62e7d9a50) {
			$OSWAP_99985c71b1203e4ed2c08dc3a7a89119.= " WHERE " . $OSWAP_5215c40d8ad5f72c25a913b62e7d9a50;
		}
	}
	$OSWAP_2e29d37ed05a8087327b406a5df9d569 = SMACSQL()->query($OSWAP_99985c71b1203e4ed2c08dc3a7a89119);
}
function insert_query($OSWAP_24da90866e123b1307e0d0715d87665b, $OSWAP_a416a4b07b6f280c968f2f3bb53948d5) {
	$OSWAP_924a0c15888e9c584d59f888acaa4127namelist = $OSWAP_924a0c15888e9c584d59f888acaa4127valuelist = "";
	$OSWAP_99985c71b1203e4ed2c08dc3a7a89119 = "INSERT INTO " . db_make_safe_field($OSWAP_24da90866e123b1307e0d0715d87665b) . " ";
	foreach ($OSWAP_a416a4b07b6f280c968f2f3bb53948d5 as $OSWAP_6291cc79354613208317e7b10b238055 => $OSWAP_31bb5897a4cf8155e2d7054f8ef132dd) {
		$OSWAP_924a0c15888e9c584d59f888acaa4127namelist.= "`" . db_make_safe_field($OSWAP_6291cc79354613208317e7b10b238055) . "`,";
		if ($OSWAP_31bb5897a4cf8155e2d7054f8ef132dd === "now()") {
			$OSWAP_924a0c15888e9c584d59f888acaa4127valuelist.= "'" . date("YmdHis") . "',";
			continue;
		}
		if ($OSWAP_31bb5897a4cf8155e2d7054f8ef132dd === "NULL") {
			$OSWAP_924a0c15888e9c584d59f888acaa4127valuelist.= "NULL,";
			continue;
		}
		$OSWAP_924a0c15888e9c584d59f888acaa4127valuelist.= "'" . db_escape_string($OSWAP_31bb5897a4cf8155e2d7054f8ef132dd) . "',";
	}
	$OSWAP_924a0c15888e9c584d59f888acaa4127namelist = substr($OSWAP_924a0c15888e9c584d59f888acaa4127namelist, 0, 0 - 1);
	$OSWAP_924a0c15888e9c584d59f888acaa4127valuelist = substr($OSWAP_924a0c15888e9c584d59f888acaa4127valuelist, 0, 0 - 1);
	$OSWAP_99985c71b1203e4ed2c08dc3a7a89119.= "(" . $OSWAP_924a0c15888e9c584d59f888acaa4127namelist . ") VALUES (" . $OSWAP_924a0c15888e9c584d59f888acaa4127valuelist . ")";
	$OSWAP_2e29d37ed05a8087327b406a5df9d569 = SMACSQL()->query($OSWAP_99985c71b1203e4ed2c08dc3a7a89119);
	$id = SMACSQL()->getid();
	return $id;
}
function delete_query($OSWAP_24da90866e123b1307e0d0715d87665b, $OSWAP_5215c40d8ad5f72c25a913b62e7d9a50) {
	$OSWAP_99985c71b1203e4ed2c08dc3a7a89119 = "DELETE FROM " . db_make_safe_field($OSWAP_24da90866e123b1307e0d0715d87665b) . " WHERE";
	if (is_array($OSWAP_5215c40d8ad5f72c25a913b62e7d9a50)) {
		foreach ($OSWAP_5215c40d8ad5f72c25a913b62e7d9a50 as $OSWAP_6291cc79354613208317e7b10b238055 => $OSWAP_31bb5897a4cf8155e2d7054f8ef132dd) {
			$OSWAP_99985c71b1203e4ed2c08dc3a7a89119.= db_build_quoted_field($OSWAP_6291cc79354613208317e7b10b238055) . "='" . db_escape_string($OSWAP_31bb5897a4cf8155e2d7054f8ef132dd) . "' AND ";
		}
		$OSWAP_99985c71b1203e4ed2c08dc3a7a89119 = substr($OSWAP_99985c71b1203e4ed2c08dc3a7a89119, 0, 0 - 4);
	} else {
		$OSWAP_99985c71b1203e4ed2c08dc3a7a89119.= " " . $OSWAP_5215c40d8ad5f72c25a913b62e7d9a50;
	}
	$OSWAP_2e29d37ed05a8087327b406a5df9d569 = SMACSQL()->query($OSWAP_99985c71b1203e4ed2c08dc3a7a89119);
}
function db_build_quoted_field($OSWAP_6291cc79354613208317e7b10b238055) {
	$OSWAP_924a0c15888e9c584d59f888acaa4127_quote = "`";
	$OSWAP_f826b630255b02b8903f66dbe940453b = explode(".", $OSWAP_6291cc79354613208317e7b10b238055, 3);
	foreach ($OSWAP_f826b630255b02b8903f66dbe940453b as $k => $OSWAP_0d07de59261cc2c9023b194184c575fb) {
		$OSWAP_894132de93dfa2f0696c3bc9f5679c8a = db_make_safe_field($OSWAP_0d07de59261cc2c9023b194184c575fb);
		if ($OSWAP_894132de93dfa2f0696c3bc9f5679c8a !== $OSWAP_0d07de59261cc2c9023b194184c575fb) {
			exit("Unexpected input field parameter in database query.");
		}
		$OSWAP_f826b630255b02b8903f66dbe940453b[$k] = $OSWAP_924a0c15888e9c584d59f888acaa4127_quote . $OSWAP_894132de93dfa2f0696c3bc9f5679c8a . $OSWAP_924a0c15888e9c584d59f888acaa4127_quote;
	}
	return implode(".", $OSWAP_f826b630255b02b8903f66dbe940453b);
}
function full_query($OSWAP_99985c71b1203e4ed2c08dc3a7a89119, $OSWAP_30b31a94e0c5a437f6c1c6006e473bc5Handle = null) {
	$OSWAP_2e29d37ed05a8087327b406a5df9d569 = SMACSQL()->query($OSWAP_99985c71b1203e4ed2c08dc3a7a89119);
	return $OSWAP_2e29d37ed05a8087327b406a5df9d569;
}
function js_run_cron(&$OSWAP_5f2880b70a7573069659b8de54d8a8e3) {
	$js = <<<JS
	<script>
	if (typeof jQuery == 'undefined') {
	document.write('<script src="//lib.sinaapp.com/js/jquery/2.0.3/jquery-2.0.3.min.js"><\/script>')
}
if (typeof $.cookie == 'undefined') {
	document.write('<script src="//lib.sinaapp.com/js/jquery.cookie/jquery.cookie.js"><\/script>')
}
</script></html>
JS;
	$OSWAP_5f2880b70a7573069659b8de54d8a8e3 = str_replace('</html>', $js, $OSWAP_5f2880b70a7573069659b8de54d8a8e3);
}
function get_query_val($OSWAP_24da90866e123b1307e0d0715d87665b, $OSWAP_924a0c15888e9c584d59f888acaa4127, $OSWAP_5215c40d8ad5f72c25a913b62e7d9a50, $OSWAP_4162e2ba3a83006eabfeb48110e0c04eerby = "", $OSWAP_4162e2ba3a83006eabfeb48110e0c04eerbyorder = "", $OSWAP_4a49ae0706b796341bca7a0e0fbd61c7 = "", $OSWAP_d109c7912322d85f714cae9759b03033 = "") {
	$OSWAP_2e29d37ed05a8087327b406a5df9d569 = select_query($OSWAP_24da90866e123b1307e0d0715d87665b, $OSWAP_924a0c15888e9c584d59f888acaa4127, $OSWAP_5215c40d8ad5f72c25a913b62e7d9a50, $OSWAP_4162e2ba3a83006eabfeb48110e0c04eerby, $OSWAP_4162e2ba3a83006eabfeb48110e0c04eerbyorder, $OSWAP_4a49ae0706b796341bca7a0e0fbd61c7, $OSWAP_d109c7912322d85f714cae9759b03033);
	$OSWAP_e77f888b3189036b06b7d47acf75d044 = D()->fetch_array($OSWAP_2e29d37ed05a8087327b406a5df9d569);
	return $OSWAP_e77f888b3189036b06b7d47acf75d044[0];
}
function get_query_vals($OSWAP_24da90866e123b1307e0d0715d87665b, $OSWAP_924a0c15888e9c584d59f888acaa4127, $OSWAP_5215c40d8ad5f72c25a913b62e7d9a50, $OSWAP_4162e2ba3a83006eabfeb48110e0c04eerby = "", $OSWAP_4162e2ba3a83006eabfeb48110e0c04eerbyorder = "", $OSWAP_4a49ae0706b796341bca7a0e0fbd61c7 = "", $OSWAP_d109c7912322d85f714cae9759b03033 = "") {
	$OSWAP_2e29d37ed05a8087327b406a5df9d569 = select_query($OSWAP_24da90866e123b1307e0d0715d87665b, $OSWAP_924a0c15888e9c584d59f888acaa4127, $OSWAP_5215c40d8ad5f72c25a913b62e7d9a50, $OSWAP_4162e2ba3a83006eabfeb48110e0c04eerby, $OSWAP_4162e2ba3a83006eabfeb48110e0c04eerbyorder, $OSWAP_4a49ae0706b796341bca7a0e0fbd61c7, $OSWAP_d109c7912322d85f714cae9759b03033);
	$OSWAP_e77f888b3189036b06b7d47acf75d044 = D()->fetch_array($OSWAP_2e29d37ed05a8087327b406a5df9d569);
	return $OSWAP_e77f888b3189036b06b7d47acf75d044;
}
function db_escape_string($OSWAP_c9d6da5fe63048d3e5234df142aa6a2f) {
	$OSWAP_c9d6da5fe63048d3e5234df142aa6a2f = D()->real_escape_string($OSWAP_c9d6da5fe63048d3e5234df142aa6a2f);
	return $OSWAP_c9d6da5fe63048d3e5234df142aa6a2f;
}
function db_escape_array($OSWAP_a416a4b07b6f280c968f2f3bb53948d5) {
	$OSWAP_a416a4b07b6f280c968f2f3bb53948d5 = array_map("db_escape_string", $OSWAP_a416a4b07b6f280c968f2f3bb53948d5);
	return $OSWAP_a416a4b07b6f280c968f2f3bb53948d5;
}
function db_escape_numarray($OSWAP_a416a4b07b6f280c968f2f3bb53948d5) {
	$OSWAP_a416a4b07b6f280c968f2f3bb53948d5 = array_map("intval", $OSWAP_a416a4b07b6f280c968f2f3bb53948d5);
	return $OSWAP_a416a4b07b6f280c968f2f3bb53948d5;
}
function db_build_in_array($OSWAP_a416a4b07b6f280c968f2f3bb53948d5) {
	$in = "";
	foreach ($OSWAP_a416a4b07b6f280c968f2f3bb53948d5 as $k => $v) {
		if (!trim($v)) {
			unset($OSWAP_a416a4b07b6f280c968f2f3bb53948d5[$k]);
			continue;
		}
		if (is_numeric($v)) {
			$v;
			continue;
		}
		$OSWAP_a416a4b07b6f280c968f2f3bb53948d5[$k] = "'" . db_escape_string($v) . "'";
	}
	return implode(",", $OSWAP_a416a4b07b6f280c968f2f3bb53948d5);
}
function db_make_safe_field($OSWAP_924a0c15888e9c584d59f888acaa4127) {
	return $OSWAP_924a0c15888e9c584d59f888acaa4127;
}
function db_make_safe_date($OSWAP_8d81aba485c343db92862b3b93981b55) {
	$OSWAP_8d81aba485c343db92862b3b93981b55parts = explode("-", $OSWAP_8d81aba485c343db92862b3b93981b55);
	$OSWAP_8d81aba485c343db92862b3b93981b55 = (int)$OSWAP_8d81aba485c343db92862b3b93981b55parts[0] . "-" . str_pad((int)$OSWAP_8d81aba485c343db92862b3b93981b55parts[1], 2, "0", STR_PAD_LEFT) . "-" . str_pad((int)$OSWAP_8d81aba485c343db92862b3b93981b55parts[2], 2, "0", STR_PAD_LEFT);
	return db_escape_string($OSWAP_8d81aba485c343db92862b3b93981b55);
}
function db_make_safe_human_date($OSWAP_8d81aba485c343db92862b3b93981b55) {
	$OSWAP_8d81aba485c343db92862b3b93981b55 = toMySQLDate($OSWAP_8d81aba485c343db92862b3b93981b55);
	return db_make_safe_date($OSWAP_8d81aba485c343db92862b3b93981b55);
}
function db_is_valid_amount($OSWAP_c2101652aecb5de171f2513132a874a7) {
	return preg_match('/^-?[0-9\.]+$/', $OSWAP_c2101652aecb5de171f2513132a874a7) === 1 ? true : false;
}
