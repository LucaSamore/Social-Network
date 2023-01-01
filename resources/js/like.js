import axios from 'axios';

const laravelToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

const updateLikes = (e) => {
    const postId = e.target.postId;
    
    axios.get(`/like/${postId}`, { headers: {'X-CSRF-TOKEN': laravelToken}})
        .then(res => document.getElementById(`like-span/${postId}`).innerHTML = res.data)
        .catch(err => console.log(err));
}

Array.from(document.getElementsByClassName('like-button')).forEach(btn => {
    const element = btn.closest('.parent');
    element.postId = btn.value;
    element.addEventListener("click", updateLikes);
});
    