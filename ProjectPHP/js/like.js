function toggleLike(postID){
    $.ajax
    ({
        type: "POST", //variabele POST van PHP opvullen met de data die ge meegeeft zijnde "postID"
        url: "ajax/like.php",
        data: "postID=" + postID,
        success: function (response) {

            console.log(response);
        }
    })
}
