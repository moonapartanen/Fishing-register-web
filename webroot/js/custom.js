$(document).ready(function() {
    $("#select-resource").change(function() {
       $("#select-fish").removeClass("hidden");
    });
    
    $("#select-fish").change(function() {
        $("#select-prob").removeClass("hidden");
    });
    
    $("#select-prob").change(function() {
        $("#fish-amount").removeClass("hidden");
        $("#add").removeClass("hidden");
    });
});