import axios from 'axios';

const laravelToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

const updateLikes = (e) => {
    const postId = e.target.postId;
    
    axios.get(`/like/${postId}`, { headers: {'X-CSRF-TOKEN': laravelToken}})
        .then(res => document.getElementById(`like-span/${postId}`).innerHTML = res.data)
        .catch(err => console.log(err));
}

Array.from(document.getElementsByClassName('like')).forEach(ith => {
    const button = ith.closest('.like-btn');
    button.postId = ith.value;
    Array.from(button.children).forEach(c => c.postId = ith.value);
    button.addEventListener("click", updateLikes);
});
    