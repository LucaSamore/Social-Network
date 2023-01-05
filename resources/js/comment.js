import { deleteComment } from './ajax/delete-comment';
import { updateComment } from './ajax/update-comment';
import { createComment } from './ajax/create-comment';

const commentButtons = Array.from(document.getElementsByClassName('comment-btn'));
const updateCommentButtons = Array.from(document.getElementsByClassName('update-comment-btn'));
const deleteButtons = Array.from(document.getElementsByClassName('delete-comment-btn'));

const createCommentEvent = (e) => {
    const postId = e.target.postId;
    const comment = e.target.comment;

    if (comment === null || 
        comment === undefined || 
        comment.match(/^ *$/) !== null) {
        return
    }

    if (createComment(postId, comment)) {
        window.location.reload();
    }
}

const deleteCommentEvent = async e => {
    const result = await deleteComment(e.target.commentId);

    if (result.data > 0) {
        window.location.reload();
    }
}

const updateCommentEvent = async e => {
    e.target.textualContent = document.getElementById(`textarea/${e.target.commentId}`).value;

    if (!e.target.textualContent) {
        return;
    }

    const result = await updateComment(e.target.commentId, e.target.textualContent);

    if (result.data > 0) {
        window.location.reload();
    }
}

commentButtons.forEach(btn => {
    const postId = Array.from(btn.children)[0].value;
    document.getElementById(`area/${postId}`)
        .addEventListener('change', e => btn.comment = e.target.value);
    btn.postId = postId;
    btn.addEventListener("click", createCommentEvent);
});

deleteButtons.forEach(btn => {
    btn.commentId = btn.parentElement.lastElementChild.value;
    btn.addEventListener("click", deleteCommentEvent, false);
});

updateCommentButtons.forEach(btn => {
    btn.commentId = btn.parentElement.lastElementChild.value;
    btn.addEventListener("click", updateCommentEvent, false);
});