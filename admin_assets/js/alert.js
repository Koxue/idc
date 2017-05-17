function swap_alert(type,title,txt){
	setTimeout(function() {
        toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'fadeIn',
            hideMethod: 'fadeOut',
            timeOut: 5000
        };
		if(type=='success')
			toastr.success(txt,title);
        if(type=='info')
			toastr.info(txt,title);
		if(type=='warning')
			toastr.warning(txt,title);
		if(type=='error')
			toastr.error(txt,title);
    }, 1000);
}
$(document).ajaxError(function(){
	swap_alert('warning','获取信息错误','通信中出现错误失败');
});