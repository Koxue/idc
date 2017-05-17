<?php
$template_config=array(
		array(
			'name'=>'注意',
			'type'=>'txt',
			'description'=>'
			有部分人因为环境问题保存配置会把 <code>"</code> 转换成  <code>\"</code>,  
			<code>\</code>转换成 <code>\\\</code> <br>
			因此会把 <code>\"</code> 替换成  <code>"</code> ,
			<code>\\\</code>替换成 <code>\</code> ,如果大家用到 请多写一个 <code>\</code> <br>
 如果静态文件使用云端 自定义图片放本地使用的话  图片请不要放在模板文件夹内',
			'default'=>''
		),
		array(
			'name'=>'是否开启顶栏','type'=>'yesno',
			'description'=>'就是导航条上面显示的一条',
			'default'=>'no'
		),
		array(
			'name'=>'首页显示产品',
			'type'=>'text',
			'description'=>'首页显示产品的id 多个用,分开 例如 1,2,3,4 建议4个',
			'default'=>'1,2,3,4'
		),
		array(
			'name'=>'邮箱',
			'type'=>'text',
			'description'=>'',
			'default'=>'admin@domain.com'
		),
		array(
			'name'=>'QQ',
			'type'=>'text',
			'description'=>'',
			'default'=>'000000000'
		),
		array(
			'name'=>'联系电话',
			'type'=>'text',
			'description'=>'',
			'default'=>'13800138000'
		),
		array(
			'name'=>'首页幻灯片html1',
			'type'=>'texts',
			'description'=>'',
			'default'=>'<h2>虚拟主机</h2><h4>安全 快速 可靠</h4><p><a class="btn btn-slide" href="#">查看功能</a></p>'
		),
		array(
			'name'=>'首页幻灯片标题1',
			'type'=>'text',
			'description'=>'',
			'default'=>'虚拟主机'
		),
		array(
			'name'=>'首页幻灯片图片链接1',
			'type'=>'text',
			'description'=>'',
			'default'=>'{templatedir}/images/slider/1.jpg'
		),
		array(
			'name'=>'首页幻灯片html2',
			'type'=>'texts',
			'description'=>'',
			'default'=>'<h2>转售服务，比以往更容易</h2><h4>客户期望什么，但最好的</h4><p><a class="btn btn-slide" href="#">了解更多</a></p>'
		),
		array(
			'name'=>'首页幻灯片标题2',
			'type'=>'text',
			'description'=>'',
			'default'=>'经销商托管'
		),
		array(
			'name'=>'首页幻灯片图片链接2',
			'type'=>'text',
			'description'=>'',
			'default'=>'{templatedir}/images/slider/2.jpg'
		),
		array(
			'name'=>'首页幻灯片html3',
			'type'=>'texts',
			'description'=>'',
			'default'=>'<h2>SSD VPS. 在云中.</h2><h4>我们提供您所需要</h4><p><a class="btn btn-slide" href="#">更多信息</a></p>'
		),
		array(
			'name'=>'首页幻灯片标题3',
			'type'=>'text',
			'description'=>'',
			'default'=>'云VPS'
		),
		array(
			'name'=>'首页幻灯片图片链接3',
			'type'=>'text',
			'description'=>'',
			'default'=>'{templatedir}/images/slider/3.jpg'
		),
		array(
			'name'=>'首页幻灯片html4',
			'type'=>'texts',
			'description'=>'',
			'default'=>'<h2>独立服务器</h2><h4>24/7/365 服务 支持</h4><p><a class="btn btn-slide" href="#">现在订购</a></p>'
		),
		array(
			'name'=>'首页幻灯片标题4',
			'type'=>'text',
			'description'=>'',
			'default'=>'独立服务器'
		),
		array(
			'name'=>'首页幻灯片图片链接4',
			'type'=>'text',
			'description'=>'',
			'default'=>'{templatedir}/images/slider/2.jpg'
		),
		array(
			'name'=>'幻灯片下方主标题',
			'type'=>'text',
			'description'=>'',
			'default'=>'为什么选择我们'
		),
		array(
			'name'=>'幻灯片下方副标题',
			'type'=>'text',
			'description'=>'',
			'default'=>'更少的维护时间, 更稳定的性能和更完美的在线率. 我们以高在线率为豪, 贴心的管家式售后技术支持服务，让你建站更省心'
		),

		array(
			'name'=>'幻灯片下方字块标题1',
			'type'=>'text',
			'description'=>'',
			'default'=>'超高性价比'
		),
		array(
			'name'=>'幻灯片下方字块内容1',
			'type'=>'texts',
			'description'=>'',
			'default'=>'我们的定位是性价比, 保证主机性能的同时, 用最低的价格享受国际顶级主流网络接入商的产品，让你轻松应付各种建站和大数据带宽需求'
		),
		array(
			'name'=>'幻灯片下方字块标题2',
			'type'=>'text',
			'description'=>'',
			'default'=>'友好的中文控制面板'
		),
		array(
			'name'=>'幻灯片下方字块内容2',
			'type'=>'texts',
			'description'=>'',
			'default'=>'除了业内主机控制面板的传统功能外，我们也在进一步的二次开发加入更多更实用的功能，行业内有的功能我们更好用，人无我有,人有我优'
		),
		array(
			'name'=>'幻灯片下方字块标题3',
			'type'=>'text',
			'description'=>'',
			'default'=>'强大的售后支持'
		),
		array(
			'name'=>'幻灯片下方字块内容3',
			'type'=>'texts',
			'description'=>'',
			'default'=>'任何时候只要您发现服务器或网络存在异常, 您均可以登入客户中心提交服务单, 或者联系在线客服, 收到后会立即响应处理'
		),
		array(
			'name'=>'主页最受欢迎的产品副标题',
			'type'=>'text',
			'description'=>'',
			'default'=>'精选机房,全球加速,为你的业务通达全球'
		),
		array(
			'name'=>'客户评价副标题',
			'type'=>'text',
			'description'=>'',
			'default'=>'经得住赞扬,更要受得起批评，自己说的再多顶不上用户的一句真实评价！（为保证网站视觉效果将头像做了替换 *^__^* ）'
		),
		array(
			'name'=>'客户评价html',
			'type'=>'texts',
			'description'=>'',
			'default'=>base64_decode('PGRpdiBjbGFzcz0iaXRlbSI+PGRpdiBjbGFzcz0idGVzdGltb25pYWwtY29udGVudCI+PGRpdiBjbGFzcz0idGVzdGltb25pYWxpbWciPjxpbWcgc3JjPSJ7dGVtcGxhdGVkaXJ9L2ltYWdlcy90ZXN0aW1vbmlhbDEuanBnIiBhbHQ9IiI+PC9kaXY+CjxwPuayoeaciemrmOWkp+S4iueahOaWh+eroO+8jOS9huaYr+aciemrmOWkp+S4iueahOWbvueJh++8jOaIkeW9u+W6leacjeS6hu+8jOWPquaYr+adpeaZmuS6hu+8jOW3sue7j+S5sOS6huS4gOS4quS4u+acuuOAguacn+W+heS4i+asoeWFieS4tO+8gTwvcD4KPGRpdiBjbGFzcz0id2hvY2xpZW50Ij48aDU+Cuepuuiwt+W5veWFsAo8L2g1PjwvZGl2PjwvZGl2PjwvZGl2PgoKPGRpdiBjbGFzcz0iaXRlbSI+PGRpdiBjbGFzcz0idGVzdGltb25pYWwtY29udGVudCI+PGRpdiBjbGFzcz0idGVzdGltb25pYWxpbWciPjxpbWcgc3JjPSJ7dGVtcGxhdGVkaXJ9L2ltYWdlcy90ZXN0aW1vbmlhbDIuanBnIiBhbHQ9IiI+PC9kaXY+CjxwPuaUr+aMgeS4gOS4iyDvvIzmnLrlmajmjLrnqLPlrprnmoTvvIzov5jmsqHnorDliLDov4fkuIDmrKHmiZPkuI3lvIDnmoTmg4XlhrXvvIzluIzmnJvnu6fnu63kv53mjIHkuIvljrs8L3A+CjxkaXYgY2xhc3M9Indob2NsaWVudCI+PGg1PgrkuIDnrJTmnLHnoIIKPC9oNT48L2Rpdj48L2Rpdj48L2Rpdj4KCjxkaXYgY2xhc3M9Iml0ZW0iPjxkaXYgY2xhc3M9InRlc3RpbW9uaWFsLWNvbnRlbnQiPjxkaXYgY2xhc3M9InRlc3RpbW9uaWFsaW1nIj48aW1nIHNyYz0ie3RlbXBsYXRlZGlyfS9pbWFnZXMvdGVzdGltb25pYWwzLmpwZyIgYWx0PSIiPjwvZGl2Pgo8cD7miJHlgZrnmoTnrKzkuozkuKrnq5nvvIznlKjnmoTov5nph4znmoTlhaXpl6jlnovkuLvmnLrjgILmr5TmiJHku6XliY3pgqPkuKrkuLvmnLrlvLrlpJrkuobvvIzov5jkvr/lrpw8L3A+CjxkaXYgY2xhc3M9Indob2NsaWVudCI+PGg1PgrpuqblhZzmvbTmvbQKPC9oNT48L2Rpdj48L2Rpdj48L2Rpdj4KCjxkaXYgY2xhc3M9Iml0ZW0iPjxkaXYgY2xhc3M9InRlc3RpbW9uaWFsLWNvbnRlbnQiPjxkaXYgY2xhc3M9InRlc3RpbW9uaWFsaW1nIj48aW1nIHNyYz0ie3RlbXBsYXRlZGlyfS9pbWFnZXMvdGVzdGltb25pYWwzLmpwZyIgYWx0PSIiPjwvZGl2Pgo8cD7ov5nmmK/or4Tku7flhoXlrrk8L3A+CjxkaXYgY2xhc3M9Indob2NsaWVudCI+PGg1Pgrov5nmmK/or4Tku7fkurrnmoQ8YT7mmLXnp7A8L2E+CjwvaDU+PC9kaXY+PC9kaXY+PC9kaXY+')
		),
		array(
			'name'=>'客户评价下面在线咨询副标题',
			'type'=>'text',
			'description'=>'',
			'default'=>'小苹 小果 安安'
		),
		array(
			'name'=>'客户评价下面提交工单副标题',
			'type'=>'text',
			'description'=>'',
			'default'=>'7*24小时待命'
		),
		array(
			'name'=>'客户评价下面邮件沟通副标题',
			'type'=>'text',
			'description'=>'',
			'default'=>'admin@domain.com'
		),
		array(
			'name'=>'客户评价下面自助服务副标题',
			'type'=>'text',
			'description'=>'',
			'default'=>'交流 论坛 博客'
		),
		array(
			'name'=>'购买产品页下方html',
			'type'=>'texts',
			'description'=>'',
			'default'=>base64_decode('PHNlY3Rpb24gY2xhc3M9InNoYXJlZC1mZWF0dXJlcyI+CsKgwqDCoMKgPGRpdiBjbGFzcz0icm93Ij4KwqDCoMKgwqDCoMKgwqDCoDxkaXYgY2xhc3M9ImNvbC1zbS0xMiI+CsKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoDxkaXYgY2xhc3M9IndvdyBmYWRlSW5MZWZ0IiBkYXRhLXdvdy1kZWxheT0iMC4ycyIgc3R5bGU9InZpc2liaWxpdHk6IHZpc2libGU7IC13ZWJraXQtYW5pbWF0aW9uOiBmYWRlSW5MZWZ0IDAuMnM7Ij4KwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoAo8aDI+5LiN5LuF5LuF5piv6Jma5ouf5Li75py6PC9oMj4KwqAKwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgPC9kaXY+CsKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoDxkaXYgaWQ9ImZlYXR1cmUyIiBkYXRhLXdvdy1kZWxheT0iMC40cyI+CsKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgPGRpdiBjbGFzcz0idGFiZmVhdHVyZXMiPgrCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgPGRpdiBjbGFzcz0icm93Ij4KwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgPGRpdiBjbGFzcz0iY29sLXNtLTEyIj4KwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqA8ZGl2IGNsYXNzPSJyb3cgc3BhY2luZy03MCIgc3R5bGU9InRleHQtYWxpZ246Y2VudGVyOyI+CsKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqA8ZGl2IGNsYXNzPSJjb2wtc20tNCI+CsKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoDxpbWcgc3JjPSJ7dGVtcGxhdGVkaXJ9L2ltYWdlcy9zaGFyZWQtMy5wbmciIGFsdD0iIj4KwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqA8aDY+6Ziyc3Fs5rOo5YWlPC9oNj4KwqAKwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgPHA+U1FMIOazqOWFpeaYr1BIUOW6lOeUqOS4reacgOW4uOingeeahOa8j+a0nuS5i+S4gCzlj6ropoHlnKjmjqfliLbpnaLmnb/mt7vliqDkuIDooYzop4TliJnljbPlj6/pmLLmraIuPC9wPgrCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgPC9kaXY+CsKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqA8ZGl2IGNsYXNzPSJjb2wtc20tNCIgc3R5bGU9InRleHQtYWxpZ246Y2VudGVyOyI+CsKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoDxpbWcgc3JjPSJ7dGVtcGxhdGVkaXJ9L2ltYWdlcy9zaGFyZWQtNC5wbmciIGFsdD0iIj4KwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqA8aDY+6Ziy5pyo6ams5LiK5LygPC9oNj4KwqAKwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgPHA+5Y+q6KaB5Zyo5o6n5Yi26Z2i5p2/5pyJ5LiA6ZSu5byA5ZCv5Y+v6Ziy5q2icGhwLGFzcOacqOmprOS4iuS8oC48L3A+CsKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqA8L2Rpdj4KwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoDxkaXYgY2xhc3M9ImNvbC1zbS00IiBzdHlsZT0idGV4dC1hbGlnbjpjZW50ZXI7Ij4KwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgPGltZyBzcmM9Int0ZW1wbGF0ZWRpcn0vaW1hZ2VzL3NoYXJlZC01LnBuZyIgYWx0PSIiPgrCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoDxoNj7lvILlnLDmnLrmiL/mr4/kuKrmmJ/mnJ/mnIDlsJHkuIDmrKE8L2g2PgrCoArCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqA8cD7ljbPkvb/mi6XmnInlronlhajnmoRyYWlkMTDnoaznm5jkv53miqQs5L2G5piv5oiR5Lus5L6d54S25Li65q+P57uZ6IqC54K55pyN5Yqh5Zmo5YGa5aW95q+P5Liq5pif5pyf5pyA5bCR5LiA5qyh55qE5byC5Zyw5py65oi/5YWo5pWw5o2u5aSH5Lu9LjwvcD4KwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoDwvZGl2PgrCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgPGRpdiBjbGFzcz0iY29sLXNtLTQiIHN0eWxlPSJ0ZXh0LWFsaWduOmNlbnRlcjsiPgrCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqA8aW1nIHNyYz0ie3RlbXBsYXRlZGlyfS9pbWFnZXMvc2hhcmVkLTcucG5nIiBhbHQ9IiI+CsKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgPGg2PuaOp+WItumdouadv+S4gOmUruWkh+S7vTwvaDY+CsKgCsKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoDxwPuaIkeS7rOefpemBkyzljbPkvb/miJHku6zlgZrnmoTlho3lpb0s5L2G5piv5oiR5Lus5L6d54S25by654OI5bu66K6u5oKo5Liq5Lq65Y+v5Lul5oul5pyJ6Imv5aW955qE5aSH5Lu95Lmg5oOvLOaOp+WItumdouadv+S4gOmUruWkh+S7vSzkuIvovb3liLDmnKzlnLDnlLXohJHmm7TlronlhaguPC9wPgrCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgPC9kaXY+CsKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqA8ZGl2IGNsYXNzPSJjb2wtc20tNCIgc3R5bGU9InRleHQtYWxpZ246Y2VudGVyOyI+CsKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoDxpbWcgc3JjPSJ7dGVtcGxhdGVkaXJ9L2ltYWdlcy9zaGFyZWQtOC5wbmciIGFsdD0iIj4KwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqA8aDY+6ZmQ5Yi2SVDlnLDlnYA8L2g2PgrCoArCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqA8cD7npoHmraLmjIflrppJUOaIlklQ5q616K6/6Zeu572R56uZLjwvcD4KwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoDwvZGl2PgrCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgPGRpdiBjbGFzcz0iY29sLXNtLTQiIHN0eWxlPSJ0ZXh0LWFsaWduOmNlbnRlcjsiPgrCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqA8aW1nIHNyYz0ie3RlbXBsYXRlZGlyfS9pbWFnZXMvc2hhcmVkLTkucG5nIiBhbHQ9IiI+CsKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgPGg2PnJhaWQxMOehrOebmOmYteWIl+S/neaKpDwvaDY+CsKgCsKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoDxwPuiZveeEtlJhaWQxMOaWueahiOmAoOaIkOS6hjUwJeeahOejgeebmOa1qui0ue+8jOS9huaYr+Wug+aPkOS+m+S6hjIwMCXnmoTpgJ/luqblkozljZXno4Hnm5jmjZ/lnY/nmoTmlbDmja7lronlhajmgKfvvIzlubbkuJTlvZPlkIzml7bmjZ/lnY/nmoTno4Hnm5jkuI3lnKjlkIzkuIBSYWlkMeS4re+8jOWwseiDveS/neivgeaVsOaNruWuieWFqOaAp+OAguWFtuS4reS4gOS4quejgeebmOaNn+Wdj+S6hu+8jOaVtOS4qumAu+i+keejgeebmOS7jeiDveato+W4uOW3peS9nOeahOOAgi48L3A+CsKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqA8L2Rpdj4KwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqA8L2Rpdj4KwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgPC9kaXY+CsKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqA8L2Rpdj4KwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgwqA8L2Rpdj4KwqDCoMKgwqDCoMKgwqDCoMKgwqDCoMKgPC9kaXY+CsKgwqDCoMKgwqDCoMKgwqA8L2Rpdj4KwqDCoMKgwqA8L2Rpdj4KPC9zZWN0aW9uPg==')
		),
		array(
			'name'=>'底部第2列',
			'type'=>'texts',
			'description'=>'',
			'default'=>base64_decode('PGg0PuWQiOS9nOS8meS8tDwvaDQ+Cjx1bD4KCTxsaT48YSBocmVmPSIiPuiFvuiur+S6kTwvYT48L2xpPgoJPGxpPjxhIGhyZWY9IiI+RE5TUE9EPC9hPjwvbGk+Cgk8bGk+PGEgaHJlZj0iIj7kuI3nn6XpgZPlhpnllaU8L2E+IDwvbGk+Cgk8bGk+PGEgaHJlZj0iIj7kuI3nn6XpgZPlhpnllaU8L2E+PC9saT4KPC91bD4=')
		),
		array(
			'name'=>'底部第3列',
			'type'=>'texts',
			'description'=>'',
			'default'=>base64_decode('PGg0PuWPi+aDhemTvuaOpTwvaDQ+Cjx1bD4KCTxsaT48YSBocmVmPSIiPldvcmRQcmVzczwvYT48L2xpPgoJPGxpPjxhIGhyZWY9IiI+ZGlzY3V6PC9hPjwvbGk+Cgk8bGk+PGEgaHJlZj0iIj5zd2FwaWRjPC9hPiA8L2xpPgoJPGxpPjxhIGhyZWY9IiI+ZGVkZWNtczwvYT48L2xpPgo8L3VsPg==')
		),
		array(
			'name'=>'订购产品后导航html',
			'type'=>'texts',
			'description'=>'',
			'default'=>base64_decode('PCEtLTxsaT48YSBocmVmPSIjIj7pk77mjqXlkI3np7A8L2E+Cgk8dWw+CgkJPGxpPjxhIGhyZWY9IiMiPuS6jOe6p+WvvOiIqumTvuaOpeWQjeensDwvYT4KCQkJPHVsPgoJCQkJPGxpPjxhIGhyZWY9IiMiPuS4iee6p+WvvOiIqumTvuaOpeWQjeensDwvYT48L2xpPgoJCQk8L3VsPgoJCTwvbGk+Cgk8L3VsPgo8L2xpPi0tPg==')
		),
		array(
			'name'=>'帮助中心后导航html',
			'type'=>'texts',
			'description'=>'',
			'default'=>base64_decode('PCEtLTxsaT48YSBocmVmPSIjIj7pk77mjqXlkI3np7A8L2E+Cgk8dWw+CgkJPGxpPjxhIGhyZWY9IiMiPuS6jOe6p+WvvOiIqumTvuaOpeWQjeensDwvYT4KCQkJPHVsPgoJCQkJPGxpPjxhIGhyZWY9IiMiPuS4iee6p+WvvOiIqumTvuaOpeWQjeensDwvYT48L2xpPgoJCQk8L3VsPgoJCTwvbGk+Cgk8L3VsPgo8L2xpPi0tPg==')
		),
		
		
		
	);
