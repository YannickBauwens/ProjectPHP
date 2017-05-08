$(document).ready(function() {
    $('.comment-btn-submit').click(function () {
        console.log("comment");
        var _postID = $(this).val();
        var _comment = $(".commentField" + _postID).val();
        var _userID = $(".userID").val();
        var _userName = $(".username").val();
        console.log(_userName);
        var _imageID = $(".imageID" + _postID).val();

        if (_comment.length > 0 && _userID != null) {

            $(".commentsList" + _postID).append("<li><a href='profile.php?userID=>" + _userID + "'>" + _userName + "</a>" +
                "<span> " + _comment + "</span></li>");


            $.ajax({
                type: 'POST',
                url: 'includes/comment.inc.php',
                data: {newComment: _comment, userID: _userID, userName: _userName, imageID: _imageID},
                succes: function (data) {
                    console.log(data);
                }

            });
        }
        var _comment = $('.commentField').val("");

        return false;
        e.preventDefault();

    });

});