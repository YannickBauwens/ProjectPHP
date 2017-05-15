$(document).ready(function() {
    $('.btnLoadMore').on("click", function(){
        var val = document.getElementById("result_no").value;
        $.ajax({
            type: 'post',
            url: 'loadmore.inc.php',
            data: {
                getresult:val
            },
            success: function(response){
                console.log(response);
                var content = document.getElementById("responseContainer");
                content.inner = content.innerHTML+response;
                document.getElementById("result_no").value = Number(val)+1;
            }
        })
    });
});

