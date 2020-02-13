function slide_show() {
    let con = 0;

    var clip = $("#head #com #clip");
    
    
    while (con != 8) {
        
        let img = " <div class=\"bg\" style=\"background-image: url('../pstor/IMG/main/"+(con)+".jpg')\">  </div> ";
        clip.append($(img));
        con++;
    }
    
    con = 0;
    function pre() {
    
        clip.css("transform","translate3d(0%,0,0)");
        con = 0;
    
    }
    function next(){
    
        clip.css("transform","translate3d(-"+con+"00%,0,0)");
        con++;
        if (con == 8) {
            pre();
        }
    }
    
    let tr = setInterval(next,2000);

}

// function portfolio() {

//     let con = 0;

// var pre = $("#portfolio .container-fluid .row .COM #com #pre");
// var next = $("#portfolio .container-fluid .row .COM #com  #next");

// var clip = $("#portfolio .container-fluid .row .COM #com  #clip");
// var data = $("#portfolio .container-fluid .row .COM #com  #clip .bg");
   
// while (con != 9) {
        
//     let img = " <div class=\"bg\" style=\"background-image: url('../pstor/IMG/main/"+(con)+".jpg')\">  </div> ";
//     clip.append(img);
//     con++;
// }



// var nu_ele = 9;
// var max_width = 340;
// var div_width = window.innerWidth;

// var temp = -(div_width-( nu_ele*max_width));


// con = 0;

// function move_f(){

    
//     clip.css("right",con+"px"); 

//     clearInterval(tr);

//     if (con >= temp) {

//         clearInterval(tr);
//         data.css("right","0%");
//         con = 0;
//     }
// }

// function move_b(){

    
//     clip.css("right",(con-340)+"px"); 

//     con = con - 340;
    
//     clearInterval(tr);

// }


// var tr = "";

// next.click(function (){
    
//         clearInterval(tr);

//         con = con + 340;

//         tr = setInterval(move_f,100);
// });

// pre.click(function (){
    
//     if (con >= 340) {

//         clearInterval(tr);
        
//         tr = setInterval(move_b,100);
//     }


// });



// }

function portfolio_c() {

let con = 0;

var pre = $("#portfolio .container-fluid .row .COM #com #pre");
var next = $("#portfolio .container-fluid .row .COM #com  #next");

var clip = $("#portfolio .container-fluid .row .COM #com  #clip");
var data_bg = $("#portfolio .container-fluid .row .COM #com  #clip .bg");
   

function re(data) {

    console.log(data);
    
    while (con != 9) {
        
        let img = " <div class=\"bg\" style=\"background-image: url('.."+(data["img"][con][0])+"')\">  </div> ";
        clip.append(img);
        con++;
    }
}

var data = req("column_date","img",re);





var nu_ele = 9;
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

function search() {

    var data = ["kolo","data","dg","likfe","me","kaleab"];

    var re = [];

    let inupt = $(".navbar .navbar-collapse .navbar-nav li .navbar-form input");
    var p = $(".navbar .navbar-collapse .navbar-nav li .container .row .col-12 .list-group");


    inupt.focus(function () {
        
        p.fadeIn(1);
    });

    inupt.blur(function (params) {
        
        p.fadeOut(1);
    });


    var inupt_user = [];




        inupt.keydown(function (ev){
            
            let a = ev.key;
        
            if (a == "Backspace" || a == "Enter") {

                if (inupt_user.length != 0) {
                    
                    inupt_user.pop((inupt_user.length-1));
                    sh( list_str(inupt_user) );
                    print(re);
                    re=[];
                }
                if (inupt_user.length == 0) {
                    re=[];
                    p.html(" ");
                }


            }

            else{
                
                inupt_user.push(a);
                sh( list_str(inupt_user) );
            }


            print(re);
            re=[];
            

        });

        function print(list) {

            
            let con = 0;
            let temp = "";
            list = list.sort();
            while (con != list.length) {

                    let temlp =  "<div class=\"w\"> <img src=\"../pstor/IMG/main/"+con+".jpg\"> <a  href=\""+list[con]+"\" class=\"list-group-item\">"+list[con]+"</a> </div>";
                    temp = temp + temlp

                con++;
            }
            p.html(temp);
        }

        function list_str(list) {

            let con = 0;
            let re = "";
            while (con != list.length) {
                
                if (list[con] == ",") {
                    continue;
                }

                re = re + list[con];
                con++;
            }
            return re;
        }


        function sh(letter) {
            let con = 0
            let u = [];
            while (data.length != con) {
                
                let temp = data[con].indexOf(letter);

                if (temp >= 0) {
                    
                    if (!(data[con] in re) ) {
                        
                        re.push(data[con]);                
                    }
                    
                }
                con++;
            }
        }


}

function meun() {

    $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function() {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
          if (target.length) {
            $('html, body').animate({
              scrollTop: (target.offset().top - 72)
            }, 1000, "easeInOutExpo");
            return false;
          }
        }
      });


$('.js-scroll-trigger').click(function() {
    $('.navbar-collapse').collapse('hide');
  });
  
  // Activate scrollspy to add active class to navbar items on scroll
  $('body').scrollspy({
    target: '#mainNav',
    offset: 75
  });
  
  // Collapse Navbar
  var navbarCollapse = function() {
    if ($("#mainNav").offset().top > 100) {
      $("#mainNav").addClass("navbar-scrolled");
    } else {
      $("#mainNav").removeClass("navbar-scrolled");
    }
  };
  // Collapse now if page is not at top
  navbarCollapse();
  // Collapse the navbar when page is scrolled
  $(window).scroll(navbarCollapse);


    
}

$(function (){

    slide_show();
    search();
    meun();
    portfolio_c();


    var filter = "";
    var a = 0;
    var b = 0;
    var c = 0;
    var range_bar = $("#range");
    range_bar.val(1000);
    var pc_filter = $("#pc_filter");
    var android_filter = $("#android_filter");
    var others_filter = $("#others_filter");
    var out_put = $("#filter .container-fluid .row .sc .col-4-md  .card .out_put_p");

    pc_filter.click(
        function (){

            if (a == 0) {
                a = 1
                filter = ",pc_filter,";
                Filter(filter,range_bar.val());
            }
            if (a == 1) {
                a = 0;
            }

        });

        android_filter.click(
            function (){
    
                if (b == 0) {
                    b = 1
                    filter = ",android_filter,";
                    Filter(filter,range_bar.val());

                }
                if (b == 1) {
                    b = 0;
                }
    
            });

     others_filter.click(
        function (){

            if (c == 0) {
                c = 1
                filter = ",others_filter,";
                Filter(filter,range_bar.val());

            }
            if (c == 1) {
                c = 0;
            }

        });


        range_bar.change(function(){
            Filter(filter,range_bar.val());
    })


    function Filter(name="",amout=0){

        out_put.html(name+amout)
    }

    
})