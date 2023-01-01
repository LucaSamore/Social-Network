import axios from 'axios';

const laravelToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
const commentButtons = Array.from(document.getElementsByClassName('comment-btn'));

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

commentButtons.forEach(btn => {
    const postId = Array.from(btn.children)[0].value;
    document.getElementById(`area/${postId}`)
        .addEventListener('change', e => btn.comment = e.target.value);
    btn.postId = postId;
    btn.addEventListener("click", createComment);
});