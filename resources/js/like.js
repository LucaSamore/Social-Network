import { numberOfLikes } from './ajax/get-likes';

const updateLikes = async e => {
    const result = await numberOfLikes(e.target.postId);

    if (result) {
        document.getElementById(`like-span/${e.target.postId}`).innerHTML = result.data;
    }
}

Array.from(document.getElementsByClassName('like')).forEach(ith => {
    const button = ith.closest('.like-btn');
    button.postId = ith.value;
    Array.from(button.children).forEach(c => c.postId = ith.value);
    button.addEventListener("click", updateLikes);
});
    