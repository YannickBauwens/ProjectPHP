function toggleLike(postID){
    $.ajax
    ({
        type: "POST", //variabele POST van PHP opvullen met de data die ge meegeeft zijnde "postID"
        url: "ajax/like.php",
        data: "postID=" + postID,
        success: function (response) {
            if (response['status'] === "hooray") {


                $("#likeButton"+postID).attr('value', 'Unlike');
                $("#likes"+postID).attr('value', response['number']);



            } else {

                $("#likeButton"+postID).attr('value', 'Like');
                $("#likes"+postID).attr('value', response['number']);

            }
        }
    })
}

