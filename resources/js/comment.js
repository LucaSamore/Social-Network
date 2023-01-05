import axios from 'axios';
import { deleteComment } from './ajax/delete-comment';

const laravelToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
const commentButtons = Array.from(document.getElementsByClassName('comment-btn'));
const deleteButtons = Array.from(document.getElementsByClassName('delete-comment-btn'));

const createComment = (e) => {
    const postId = e.target.postId;
    const comment = e.target.comment;

    if (comment === null || 
        comment === undefined || 
        comment.match(/^ *$/) !== null) {
        return
    }

    axios.post(`/comment/${postId}/create`, {comment: comment}, { 
        headers: {
            'X-CSRF-TOKEN': laravelToken,
        },
    })
    .then(_ => document.location.reload())
    .catch(err => console.log(err.response.data));
}

const deleteCommentEvent = async e => {
    const result = await deleteComment(e.target.commentId);

    if (result.data > 0) {
        window.location.reload();
    }
}

commentButtons.forEach(btn => {
    const postId = Array.from(btn.children)[0].value;
    document.getElementById(`area/${postId}`)
        .addEventListener('change', e => btn.comment = e.target.value);
    btn.postId = postId;
    btn.addEventListener("click", createComment);
});

deleteButtons.forEach(btn => {
    btn.commentId = btn.parentElement.lastElementChild.value;
    btn.addEventListener("click", deleteCommentEvent, false);
});