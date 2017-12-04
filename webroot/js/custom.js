$(document).ready(function() {   
    
    var index = 0;
    var indexx = 0;
    var totalKg = 0;

    // Kysymystyyppi matriisi
    $("#select-pyydys").change(function() {
       $("#select-kala").removeClass("hidden");
    });
    
    $("#select-kala").change(function() {
        $("#select-prob").removeClass("hidden");
        $("#kalakg").removeClass("hidden");
        $("#detail-count").removeClass("hidden");
    });
    
    // Kysymystyyppi 8
    $("#questiontype-eight-select").change(function () {
       $("#questiontype-eight-radio").removeClass("hidden");
    });
    
    $("#questiontype-eight-radio").change(function () {
       $("#add-fishtype-eight").removeClass("hidden");
    });  

    
    // Lisätään resurssitaulukkoon
    $("#add").on("click", function () {
        var pyydys;
        var kala;
        var maara;
        var koentakerrat;
        var pyydysmaara;
        var pyydysid;
        var kalaid;
        var kysymysid;
        
        kysymysid = $("#kysymysid").val();

        pyydys = $("#select-pyydys option:selected").text();
        pyydysid = $("#select-pyydys option:selected").val();

        kala = $("#select-kala option:selected").text();
        kalaid = $("#select-kala option:selected").val();
        maara = $("#kalakg").val();

        $("#catch-table").append("<tr id='catch-row-" + index + "'>"
                + "<td><input type='hidden' name='vastaus[" + kysymysid + "][" + pyydysid  + "][" + kalaid + "]' value='"  + maara + "' class='pyydys'>" + pyydys + "</td>" 
                + "<td>" + kala + "</td>" 
                + "<td>" + maara + "</td>"
                + "<td><a class='remove-catch-btn' data-row='" + index + "'><i class='fa fa-trash-o' aria-hidden='true'></i></a></td></tr>");
        index++;
        
        $(".remove-catch-btn").on("click", function () {
           var removeid = $(this).data("row");
           $("#catch-row-" + removeid).remove();
          
        });
    });
    
    // Add trap to table
    $("#add-trap").on("click", function () {
        var pyydys;
        var koentakerrat;
        var pyydysmaara;
        var pyydysid;
        var kysymysid;

        kysymysid = $("#kysymysid-type-6").val();

        pyydys = $("#select-trap option:selected").text();
        pyydysid = $("#select-trap option:selected").val();
        koentakerrat = $("#tries").val();
        pyydysmaara = $("#trapcount").val();

        $("#trap-row").append("<tr id='trap-row-" + indexx + "'>"
                + "<td><input type='hidden' name='vastaus[" + kysymysid + "][" + pyydysid  + "][" + koentakerrat + "]' value='"  + pyydysmaara + "' class='pyydys'>" + pyydys + "</td>" 
                + "<td>" + koentakerrat + "</td>" 
                + "<td>" + pyydysmaara + "</td>"
                + "<td><a class='remove-trap-btn' data-row='" + indexx + "'><i class='fa fa-trash-o' aria-hidden='true'></i></a></td>");
        indexx++;          

        $(".remove-trap-btn").on("click", function () {
           var removeid = $(this).data("row");
           $("#trap-row-" + removeid).remove();
          
        });
    });
   
    
});