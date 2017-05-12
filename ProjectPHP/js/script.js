$(document).ready(function() {
    $('.btnLoadMore').on("click", function(){
        for(i=0; i<20;i++){
            $.ajax({
                method : 'POST',
                url  : 'includes/loadmore.inc.php',
                data : $(this),
                success : function(response)
                {
                    console.log(response);
                    var div = $(".indexFeed");
                    div.html(response.message);
                }
            });}
        return false;
    });
});