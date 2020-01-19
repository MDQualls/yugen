
$(function() {

    /*
    * #############################
    * REPLY FORM
    * #############################
    */
    function toggleReplyForm(target)  {
        let formContainer = $('.comment-reply-form-container');
        let commentReplyContainer = $(target).closest('.comment-reply-container').html();
        let commentReplyForm = formContainer.html();

        $(target).closest('.comment-reply-container').html(commentReplyForm);
        $(formContainer).html(commentReplyContainer);
        $("#commentReplyForm #parent_comment_id").val($(target).attr('data-parent-id'));
        $('#commentReplyTextarea').removeClass('required-error');
    }

    $(document).on('click', 'div.comment-reply-container a.text-info', function (e) {
        toggleReplyForm(e.target);
    });

    $(document).on('click', 'div.comment-reply-button-box a.comment-reply-cancel', function (e) {
        toggleReplyForm(e.target);
    });

    $(document).on('click', 'div.comment-reply-button-box a.comment-reply-submit', function () {
        let textarea = $('#commentReplyTextarea');
        const regex = RegExp('[a-zA-Z0-9]+');
        if(textarea.val() === undefined || regex.test(textarea.val()) === false)  {
            textarea.addClass('required-error');
            return false;
        }

        $('#commentReplyForm').submit();
    });

    /*
    * #############################
    * EDIT FORM
    * #############################
    */

    function toggleCommentForm(target) {
        let formContainer = $('.edit-comment-form-container');
        let commentContainer = $(target).closest('.media-body').children('.comment-box');
        let commentContainerContent = commentContainer.html();
        let commentFormContent = formContainer.html();

        commentContainer.html(commentFormContent);
        formContainer.html(commentContainerContent);
        $("#editCommentForm #comment_id").val($(target).attr('data-comment-id'));
        $("#editCommentForm #editCommentTextarea").val(commentContainerContent.trim());
        $('#editCommentTextarea').removeClass('required-error');
    }

    $(document).on('click', 'div.edit-comment-link-box a.edit-comment-link', function () {
        $('.edit-comment-link-box').css('visibility','hidden');
        toggleCommentForm(this);
    });

    $(document).on('click', 'div.comment-box a.edit-comment-cancel', function () {
        $('.edit-comment-link-box').css('visibility','visible');
        toggleCommentForm(this);
    });

    $(document).on('click', 'div.edit-comment-button-box a.edit-comment-submit', function () {
        let textarea = $('#editCommentTextarea');
        const regex = RegExp('[a-zA-Z0-9]+');
        if(textarea.val() === undefined || regex.test(textarea.val()) === false)  {
            textarea.addClass('required-error');
            return false;
        }

        $('#editCommentForm').submit();
    });


});
