$(document).ready(function(){

    $("body").on("mousemove", "[tooltip-title]", function(e){
        const text = $(this).attr("tooltip-title");
        
        if ($(".tooltip-c").length < 1){
            $("body").append(`<div class="tooltip-c">${text}</div>`);
        }

        // const _thisTop = $(this).offset().top + $(this).height() + 10 - $("html").scrollTop();
        // const _thisleft = $(this).offset().left + ($(this).width() / 2) - 15 ;

        const _thisTop = e.pageY - $("html").scrollTop() + 30;
        const _thisleft = e.pageX - 20;

        const tooltip = $("body").find(".tooltip-c");

        tooltip.show().css({
            top : _thisTop,
            left : _thisleft
        }).html(text);

        $("html").on("scroll", function(){
            tooltip.fadeOut(200);
        })

        // $("[tooltip-title]").on("mousemove", function(e){
        //     const _thisTop = e.pageY - $("html").scrollTop();
        //     const _thisleft = e.pageX;
           
        //     tooltip.css({
        //         top : _thisTop,
        //         left : _thisleft
        //     })
        // })

    }).on("mouseout", function(){
        $("body").find(".tooltip-c").hide();
    })

})