/*
 * send verify sms
 *---------------------------
 * top lan <toplan710@gmail.com>
 * https://github.com/toplan/laravel-sms
 * --------------------------
 * Date 2015/06/05
 *
 * example usage:
 *   $('#sendVerifySmsButton').sms({
 *       token          : "{{csrf_token}}",
 *       mobileSelector : 'input[name="mobile"]',
 *       alertMsg       : function (msg) {
 *           alert(msg);
 *        }
 *   });
 */
(function($){

    $.fn.sms = function(options){
        var opts = $.extend(
            $.fn.sms.default,
            options,
            {btnContent: this.html()}
        );
        this.click(function(){
            //开始发送
            var _this = $(this);
            _this.html('发送中...');
            _this.prop('disabled', true);
            sendSms(opts, _this)
        });
    };

    function sendSms(opts, elem) {
        var mobile = $(opts.mobileSelector).val();
        var url = '/sms/verify-code/rule/' + opts.mobileRule + '/mobile/' + mobile;
        if (opts.voice) {
            url = '/sms/voice-verify/rule/' + opts.mobileRule + '/mobile/' + mobile;
        }
        $.ajax({
            url  : url,
            type : 'post',
            data : {seconds: opts.seconds}
        }).success(function (data) {
            if (data.success) {
                timer(elem, opts.seconds, opts.btnContent)
            } else {
                elem.html(opts.btnContent);
                elem.prop('disabled', false);
                opts.alertMsg(data.msg, data.type);
            }
        }).fail(function () {
            opts.alertMsg('请求失败，请重试');
            elem.html(opts.btnContent);
            elem.prop('disabled', false);
        });
    }

    function timer(elem, seconds, btnContent){
        if(seconds >= 0){
            setTimeout(function(){
                //显示倒计时
                elem.html(seconds + ' 秒');
                //递归
                seconds -= 1;
                timer(elem, seconds, btnContent);
            }, 1000);
        }else{
            elem.html(btnContent);
            elem.prop('disabled', false);
        }
    }

    $.fn.sms.default = {
        mobileRule     : 'check_mobile_unique',
        mobileSelector : '',
        seconds        : 60,
        voice          : false,
        alertMsg       : function (msg, type) {
            Materialize.toast(msg, 4000);
        }
    };

})(jQuery);