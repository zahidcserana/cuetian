     $(document).ready(function() {
            var sds = document.getElementById("dum");
            if(sds == null){
                alert("You are using a free package.\n You are not allowed to remove the tag.\n");
                $(".content_div").hide();
            }
     });
            
            var pageNum;
            var num,num1,num2,num3;
            function oncall() {
            var pageArray = ["1", "2", "3", "4"];
            var currentPage = 0,
            loadPage = function (pageNum) {
                var pageArrayLength = pageArray.length;
                $('.pt-trigger:disabled').attr('disabled', false);              
                if (pageNum <= 0) {
                    pageNum = 0;
                    $('.pt-trigger_prev').attr('disabled', true);
                    $('.buttonPrevious').addClass("buttonDisabled");
                     $('.buttonFinish').addClass("buttonDisabled");                                      
                }
                else{
                    $('.buttonPrevious').removeClass("buttonDisabled");
                }
                if (pageNum >= pageArrayLength - 1) {
                    pageNum = pageArrayLength - 1;
                    $('.pt-trigger_next').attr('disabled', true);
                    $('.buttonNext').addClass("buttonDisabled");
                    $('.buttonFinish').removeClass("buttonDisabled");
                    
                }
                else{
                    $('.buttonNext').removeClass("buttonDisabled");
                }
                 num = pageArray[pageNum];
                if (num==1) {
                    $("#step-1").css('display','inline');
                    $("#step-2").css('display','none');
                    $("#step-3").css('display','none');
                    $("#step-4").css('display','none');
                    $('.first').addClass("selected");
                    if($(".second").hasClass("selected"))
                {
                    $('.second').removeClass("selected");                   
                    $('.second').addClass("done");                   
                }
                if ($(".third").hasClass("selected")) {
                    $('.third').removeClass("selected");
                    $('.third').addClass("done");
                }
                if ($(".fourth").hasClass("selected")) {
                   $('.fourth').removeClass("selected");
                   $('.fourth').addClass("done");
                }
                }
                 if (num==2)
            {
            $("#step-2").css('display','inline');
            $("#step-1").css('display','none');
            $("#step-3").css('display','none');
            $("#step-4").css('display','none');
            $('.second').addClass("selected");
            $('.first').addClass("done");
            $('.first').removeClass("selected");
            if($(".first").hasClass("selected"))
                {
                    $('.first').removeClass("selected");                   
                    $('.first').addClass("done");                   
                }
                if ($(".third").hasClass("selected")) {
                    $('.third').removeClass("selected");
                    $('.third').addClass("done");
                }
                if ($(".fourth").hasClass("selected")) {
                   $('.fourth').removeClass("selected");
                   $('.fourth').addClass("done");
                }
            }
             if (num==3)
            {
            $("#step-3").css('display','inline');
            $("#step-1").css('display','none');
            $("#step-2").css('display','none');
            $("#step-4").css('display','none');
            $('.third').addClass("selected");
            $('.second').addClass("done");
            $('.second').removeClass("selected");
             if($(".first").hasClass("selected"))
                {
                    $('.first').removeClass("selected");                   
                    $('.first').addClass("done");                   
                }
                if ($(".second").hasClass("selected")) {
                    $('.second').removeClass("selected");
                    $('.second').addClass("done");
                }
                if ($(".fourth").hasClass("selected")) {
                   $('.fourth').removeClass("selected");
                   $('.fourth').addClass("done");
                }
            }
             if (num==4)
            {
            $("#step-4").css('display','inline');
            $("#step-1").css('display','none');
            $("#step-2").css('display','none');
            $("#step-3").css('display','none');
            $('.fourth').addClass("selected");
            $('.third').addClass("done");
            $('.third').removeClass("selected");
            if($(".first").hasClass("selected"))
                {
                    $('.first').removeClass("selected");                   
                    $('.first').addClass("done");                   
                }
                if ($(".second").hasClass("selected")) {
                    $('.second').removeClass("selected");
                    $('.second').addClass("done");
                }
                if ($(".third").hasClass("selected")) {
                   $('.third').removeClass("selected");
                   $('.third').addClass("done");
                }
            }
                currentPage = pageNum;
            };

        $('.pt-trigger_prev').click(function() {
            if (currentPage!=0) {
                loadPage(currentPage - 1);
            var newpage=currentPage + 2;
            $('#'+newpage).addClass("done");
            $('#'+newpage).removeClass("selected");
            $('.buttonFinish').addClass("buttonDisabled");
            }                      
        });

        $('.pt-trigger_next').click(function() {
            loadPage(currentPage + 1);
            var newpage1=currentPage + 1;
        });
          $('.pt-trigger_finish').click(function() {
           if (currentPage==3) {
            location.reload();
           }
         });
        loadPage(currentPage);

    }
  window.onload=oncall;
    
            function show1()
            {
            if($(".first").hasClass("done"))
                {
                    num=1;
                    $('.first').addClass("selected");
                    $("#step-1").css('display','inline');
                    $("#step-2").css('display','none');
                    $("#step-3").css('display','none');
                    $("#step-4").css('display','none');
                 $('.pt-trigger_prev').attr('disabled', true);
                    $('.buttonPrevious').addClass("buttonDisabled");
                     $('.buttonFinish').addClass("buttonDisabled");
                     $('.buttonNext').removeClass("buttonDisabled");
                oncall();      
            loadPage(num);
            
                if($(".second").hasClass("selected"))
                {
                    $('.second').removeClass("selected");                   
                    $('.second').addClass("done");                   
                }
                if ($(".third").hasClass("selected")) {
                    $('.third').removeClass("selected");
                    $('.third').addClass("done");
                }
                if ($(".fourth").hasClass("selected")) {
                   $('.fourth').removeClass("selected");
                   $('.fourth').addClass("done");
                }
                }
            
            
            }
            function show2()
            {
                if($(".second").hasClass("done"))
                {
                    num=2;
                    $('.second').addClass("selected");
                    $("#step-2").css('display','inline');
                    $("#step-1").css('display','none');
                    $("#step-3").css('display','none');
                    $("#step-4").css('display','none');
                    $('.buttonFinish').addClass("buttonDisabled");
                    $('.buttonNext').removeClass("buttonDisabled");
                    $('.buttonPrevious').removeClass("buttonDisabled");
                    
                if($(".first").hasClass("selected"))
                {
                    $('.first').removeClass("selected");                   
                    $('.first').addClass("done");                   
                }
                if ($(".third").hasClass("selected")) {
                    $('.third').removeClass("selected");
                    $('.third').addClass("done");
                }
                if ($(".fourth").hasClass("selected")) {
                   $('.fourth').removeClass("selected");
                   $('.fourth').addClass("done");
                }
                }
            }
            function show3()
            {
                if($(".third").hasClass("done"))
                {
                   
                   num=3;
                    $('.third').addClass("selected");
                    $("#step-3").css('display','inline');
                    $("#step-1").css('display','none');
                    $("#step-2").css('display','none');
                    $("#step-4").css('display','none');
                    $('.buttonFinish').addClass("buttonDisabled");
                     $('.buttonNext').removeClass("buttonDisabled");
                     $('.buttonPrevious').removeClass("buttonDisabled");
                     
            // oncall();      
           // loadPage(num2);
                if($(".first").hasClass("selected"))
                {
                    $('.first').removeClass("selected");                   
                    $('.first').addClass("done");                   
                }
                if ($(".second").hasClass("selected")) {
                    $('.second').removeClass("selected");
                    $('.second').addClass("done");
                }
                if ($(".fourth").hasClass("selected")) {
                   $('.fourth').removeClass("selected");
                   $('.fourth').addClass("done");
                }
                }
            }
            function show4()
            {
                if($(".fourth").hasClass("done"))
                {
                    num=4;
                    $('.fourth').addClass("selected");
                    $("#step-4").css('display','inline');
                    $("#step-1").css('display','none');
                    $("#step-2").css('display','none');
                    $("#step-3").css('display','none');
                    $('.buttonNext').addClass("buttonDisabled");
                    $('.buttonPrevious').removeClass("buttonDisabled");
                    $('.buttonFinish').removeClass("buttonDisabled");
                if($(".first").hasClass("selected"))
                {
                    $('.first').removeClass("selected");                   
                    $('.first').addClass("done");                   
                }
                if ($(".second").hasClass("selected")) {
                    $('.second').removeClass("selected");
                    $('.second').addClass("done");
                }
                if ($(".third").hasClass("selected")) {
                   $('.third').removeClass("selected");
                   $('.third').addClass("done");
                }
                }
            }