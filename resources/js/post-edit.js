import { updatePost } from "./ajax/update-post";

const postIds = Array.from(document.getElementsByClassName('post-update-hidden')).map(input => input.value);

postIds.forEach(postId => {
    const textArea = document.getElementById(`textual-content-${postId}`);
    const sendButton = document.getElementById(`update-post-${postId}`);
    const trends = document.getElementById(`tags-${postId}`);

    const updatePostEvent = async e => {
        const result = await updatePost(e.target.postId, e.target.textualContent, e.target.tags);

        if (result.data >= 0) {
            window.location.reload();
        }
    }

    sendButton.postId = postId;

    textArea.onkeyup = e => {
        sendButton.disabled = textArea.oldValue === e.target.value ||
            (!e.target.value && !trends.value);
        sendButton.textualContent = textArea.value;
        sendButton.tags = trends.value;
    }

    trends.onkeyup = e => {
        sendButton.disabled = trends.oldValue === e.target.value || 
            !textArea.value || (!e.target.value && !textArea.value);
        sendButton.textualContent = textArea.value;
        sendButton.tags = trends.value;
    }

    sendButton.addEventListener("click", updatePostEvent, false);
});