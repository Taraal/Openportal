$(document).ready(function(){

    $('.search-box input[type="text"]').on("keyup input", function(){

        var inputVal = $(this).val();

        var resultDropdown = $(this).siblings(".result");

        if(inputVal.length){

            $.get("search.php", {q: inputVal}).done(function(data){

                resultDropdown.html(data);

            });

        } else {

            resultDropdown.empty();

        }

    });

    $(document).on("click", ".result a", function() {

        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());

        $(this).parent(".result").empty();

    });
    
});