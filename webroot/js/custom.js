$(document).ready(function() {
    $("#select-resource").change(function() {
       $("#select-fish").removeClass("hidden");
    });
    
    $("#select-fish").change(function() {
        $("#fish-amount").removeClass("hidden");
        $("#add").removeClass("hidden");
    });
});