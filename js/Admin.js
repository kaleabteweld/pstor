var end = "";

function filter_c(temp,max) {

        let con = 0;
        
        var pre = $("#filter .container-fluid .row .COM #com #pre");
        var next = $("#filter .container-fluid .row .COM #com  #next");
        
        var clip = $("#filter .container-fluid .row .COM #com  #clip");
        var data_bg = $("#filter .container-fluid .row .COM #com  #clip .bg");
 
        
        var nu_ele = max;
        var max_width = 340;
        var div_width = window.innerWidth;
        
        var temp = -(div_width-( nu_ele*max_width));
        
        
        con = 0;
        
        function move_f(){
        
            
            clip.css("right",con+"px"); 
        
            clearInterval(tr);
        
            if (con >= temp) {
        
                clearInterval(tr);
                data_bg.css("right","0%");
                con = 0;
            }
        }
        
        function move_b(){
        
            
            clip.css("right",(con-340)+"px"); 
        
            con = con - 340;
            
            clearInterval(tr);
        
        }
        
        
        var tr = "";

        next.click(function (){
            
            
                
                clearInterval(tr);
        
                con = con + 340;
        
                tr = setInterval(move_f,100);
            

        });
        
        pre.click(function (){
            
            if (con >= 340) {
                
                
                    
                    clearInterval(tr);
                
                    tr = setInterval(move_b,100);
                    
                

            }
        
        
        });
        
        
        
        }

function filter() {

    var filter = "";
    var a = 0;
    var b = 0;
    var c = 0;
    var range_bar = $("#filter .container-fluid .row .range-filed  #range");
    range_bar.val(1000);
    var pc_filter = $("#filter .container-fluid .row  #pc_filter");
    var android_filter = $("#filter .container-fluid .row  #android_filter");
    var others_filter = $("#filter .container-fluid .row  #others_filter");
        
    pc_filter.click(function (){
            if (a == 0) {
                a = 1
                filter = "pc";
                Filter(filter,range_bar.val());
            }
            if (a == 1) {
                a = 0;
            }

        });

    android_filter.click( function (){
    
                if (b == 0) {
                    b = 1
                    filter = "phone";
                    Filter(filter,range_bar.val());

                }
                if (b == 1) {
                    b = 0;
                }
    
        });

    others_filter.click(function (){

            if (c == 0) {
                c = 1
                filter = "other";
                Filter(filter,range_bar.val());

            }
            if (c == 1) {
                c = 0;
            }

        });

    range_bar.change(function(){
            Filter(filter,range_bar.val());
        });

    end = function () {
        
        let temp = $("#filter .container-fluid .row .col-12 .COM #com #clip .card");
    //    console.log(temp);
    //    console.log(temp.length);
    if (temp.length == 1) {
        $("#filter .container-fluid .row .col-12 .COM #com #clip").css("right","0")
       } 
       filter_c(temp,temp.length);
       filter_c(temp,temp.length);
    }
    function Filter(name="",amout=0){

        // console.log(name+amout);

        $("#filter .container-fluid .row .col-12 .COM #com #clip").load(
                            "../pstor/main.php",
                            {
                                NAme:name,
                                Amout:amout
                            },end
        );
    }

}
$(function () {


    filter_c($("#filter .container-fluid .row .col-12 .COM #com #clip .card"),7);
    filter();

})

