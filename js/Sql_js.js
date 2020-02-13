var req = "";
var read = "";
var ret = "";

$(function () {
  
    var print_html = "<div style=\"display: none;\" id=\"print\"> </div>";
    $("body").append(print_html);

    var parent = $("#print");
    

    read = function () {
        
        var parent_h1 = $("#print h1");

        let data = parent_h1.html();
        data = JSON.parse(data);
        ret(data);
    }
    req  =   function(req_Type,req_Data,fuc) {
        
        parent.load("../pstor/sql_js.php", { 
            req_Type:req_Type,
            req_Data:req_Data
                            },read);

            ret = function (data) {
                
                fuc(data);                 
            }

    }

    


})




