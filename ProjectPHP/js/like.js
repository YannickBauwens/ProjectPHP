function toggleLike(postID, numberoflikes){
    $.ajax
    ({
        type: "POST", //variabele POST van PHP opvullen met de data die ge meegeeft zijnde "postID"
        url: "ajax/like.php",
        data: "postID=" + postID,
        success: function (response) {
            alert("ok");
            if (response['status'] == "hooray") {
                var number = response.number;
                console.log(number);
                $("#likeButton"+postID).attr('value', 'Unlike');
                $("#likes"+postID).attr('value', number+"likes");




            } else {
                var number = response.number;
                console.log(number);
                $("#likeButton"+postID).attr('value', 'Like');
                $("#likes"+postID).attr('value', number+"likes");

            }
        }
    })
}

