    <!--  Footer -->

    <section class="footer">
        <div class="row">
            <div class="col-sm-3">
                <h4>{$mlang['快速导航']}</h4>
                <ul>
                    <li><a href="{$ROOT}/control/index/"> {$mlang['我的订单']}</a></li>
                    <li><a href="{$ROOT}/ticket/submit/"> {$mlang['提交服务单']}</a></li>
                    <li><a href="{$ROOT}/networkissues/serverstatus/">{$mlang['服务器状态']}</a></li>
                    <li><a href="{$ROOT}/networkissues/index/"> {$mlang['网络故障']}</a></li>
                </ul>
            </div>
            <div class="col-sm-3">
               {$tempsz['底部第2列']}
            </div>
            <div class="col-sm-3">
			{$tempsz['底部第3列']}
                
            </div>
            <div class="col-sm-3">
                <h4>{$mlang['联系我们']}</h4>
                <ul class="questions">
			
                   
                    <li><i class="fa fa-phone"></i> {$tempsz['联系电话']}</li>
                    <li><i class="fa fa-envelope"></i> {$tempsz['邮箱']}</li> <li>
					<i class="fa fa-comment"></i> {$tempsz['QQ']}</li>
                   <!--  <li>	
                    </li> -->
                </ul>
            </div>
        </div>

    </section>
	  <div class="social">
        <div class="row">

            <span style="float:left;">
            {$c['底部版权']} {$c['网站名称']}  Theme by XH ServerEast | Powered by <a href="http://www.swapidc.com/">SWAPIDC</a>


			 
             
            </span>
            <span style="float:right;">
			<form method="post" name="languagefrm" id="languagefrom"><select name="language" onchange="languagefrom.submit()">
			  {foreach from=$l item=langs}
			  <option value="{$langs}"{if $langs==$language} selected="selected"{/if}>{$langs}</option>
			  {/foreach}
			</select>
		</form>
            </span>
        </div>
    </div>
    <!--  End of Footer -->
<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>


    <script src="{$templatedir}/js/hoverIntent.js"></script>
    <script src="{$templatedir}/js/superfish.min.js"></script>
    <script src="{$templatedir}/js/owl.carousel.js"></script>
    <script src="{$templatedir}/js/wow.min.js"></script>
    <script src="{$templatedir}/js/jquery.circliful.min.js"></script>
    <script src="{$templatedir}/js/waypoints.min.js"></script>
    <script src="{$templatedir}/js/jquery.slicknav.min.js"></script>
    <script src="{$templatedir}/js/retina.min.js"></script>
    <script src="{$templatedir}/js/custom.js"></script>

    <script>
    /* Home Page Slider
   ========================================================================== */
    $(document).ready(function() {


    var sync1 = $("#mainslider");
    var sync2 = $("#mainslider-nav");

    sync1.owlCarousel({
    singleItem : true,
    slideSpeed : 1000,
    paginationSpeed: 800,
    navigation: false,
    pagination:false,
    autoPlay:7500,
    afterAction : syncPosition,
    responsiveRefreshRate : 200,
    });

    sync2.owlCarousel({
    items : 4,
    itemsDesktop : [1199,4],
    itemsDesktopSmall : [979,4],
    itemsTablet : [768,4],
    itemsMobile : [479,2],
    pagination:false,
    responsiveRefreshRate : 100,
    afterInit : function(el){
    el.find(".owl-item").eq(0).addClass("synced");
    }
    });

    function syncPosition(el){
    var current = this.currentItem;
    $("#mainslider-nav")
    .find(".owl-item")
    .removeClass("synced")
    .eq(current)
    .addClass("synced")
    if($("#mainslider-nav").data("owlCarousel") !== undefined){
    center(current)
    }
    }

    $("#mainslider-nav").on("click", ".owl-item", function(e){
    e.preventDefault();
    var number = $(this).data("owlItem");
    sync1.trigger("owl.goTo",number);
    });

    function center(number){
    var sync2visible = sync2.data("owlCarousel").owl.visibleItems;
    var num = number;
    var found = false;
    for(var i in sync2visible){
    if(num === sync2visible[i]){
    var found = true;
    }
    }

    if(found===false){
    if(num>sync2visible[sync2visible.length-1]){
    sync2.trigger("owl.goTo", num - sync2visible.length+2)
    }else{
    if(num - 1 === -1){
    num = 0;
    }
    sync2.trigger("owl.goTo", num);
    }
    } else if(num === sync2visible[sync2visible.length-1]){
    sync2.trigger("owl.goTo", sync2visible[1])
    } else if(num === sync2visible[0]){
    sync2.trigger("owl.goTo", num-1)
    }
    }

    });

/* Τestimonials
   ========================================================================== */
 $(document).ready(function() {
        $("#testimonials-carousel").owlCarousel({
            items: 1,
            autoPlay: 5000,
            itemsDesktop: [1199, 1],
            itemsDesktopSmall: [979, 1],
            itemsTablet: [768, 1]
        });
    });

    // ______________ STATS
jQuery(document).ready(function() {
$('.statistics').waypoint(function() {

 $('#myStat1').circliful();
 $('#myStat2').circliful();
 $('#myStat3').circliful();
 $('#myStat4').circliful();

}, { offset: 800, triggerOnce: true });
});

    </script>
</body>

</html>