$(document).ready(function() {   
    
    var index = 0;
    // Questiontype matriisi
    $("#select-resource").change(function() {
       $("#select-fish").removeClass("hidden");
    });
    
    $("#select-fish").change(function() {
        $("#select-prob").removeClass("hidden");
        $("#fish-amount").removeClass("hidden");
        $("#detail-count").removeClass("hidden");
    });
    
    // Questiontype eight
    $("#questiontype-eight-select").change(function () {
       $("#questiontype-eight-radio").removeClass("hidden");
    });
    
    $("#questiontype-eight-radio").change(function () {
       $("#add-fishtype-eight").removeClass("hidden");
    });  
    
    // Add fish to table
    $("#add").on("click", function () {
        var pyydys, kala, maara, koentakerrat, pyydysmaara, pyydysid, kalaid;
        
        pyydys = $("#select-resource option:selected").text();
        kala = $("#select-fish option:selected").text();
        pyydysid = $("#select-resource option:selected").val();
        kalaid = $("#select-fish option:selected").val();
        maara = $("#fish-amount-kg").val();
        koentakerrat = $("#tries-count").val();
        pyydysmaara = $("#resource-count").val();
        

        
        $("#catch-row").append("<tr id='row-" + index + "'><td>"
                + "<input type='hidden' name='pyydys' " + "value='" + pyydysid + "'>" + pyydys + "</td><td>" 
                + "<input type='hidden' name='kala' " + "value='" + kalaid + "'>" + kala + "</td><td>" 
                + "<input type='hidden' name='maara' " + "value='" + maara + "'>" + maara + "</td><td>" 
                + "<input type='hidden' name='koentakerrat' " + "value='" + koentakerrat + "'>" + koentakerrat + "</td><td>" 
                + "<input type='hidden' name='pyydysmaara' " + "value='" + pyydysmaara + "'>" + pyydysmaara + "</td><td class='text-center'>"
                + "<a class='remove-catch-btn' data-row='" + index + "'><i class='fa fa-trash-o' aria-hidden='true'></i></a></td>");
        index++;
        
        $(".remove-catch-btn").on("click", function () {
           var removeid = $(this).data("row");
           $("#row-" + removeid).remove();
          
        });
    });
    
    
    
});