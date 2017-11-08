$(document).ready(function() {   
    
    
    // Questiontype matriisi
    $("#select-resource").change(function() {
       $("#select-fish").removeClass("hidden");
    });
    
    $("#select-fish").change(function() {
        $("#select-prob").removeClass("hidden");
        $("#fish-amount").removeClass("hidden");
        $("#add").removeClass("hidden");
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
        var pyydys, kala, maara;
        
        pyydys = $("#select-resource option:selected").text();
        kala = $("#select-fish option:selected").text();
        maara = $("#fish-amount-kg").val();
        console.log(pyydys);
                console.log(kala);
        console.log(maara);
        
        $("#th-pyydys").text(pyydys);
        $("#th-kala").text(kala);
        $("#th-maara").text(maara);


    });
    
});