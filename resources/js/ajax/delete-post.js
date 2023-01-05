import axios from "axios";

const laravelToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

export const deletePost = async (postId) => {
    try {
        return await axios.delete(`/post/delete/${postId}`, {
            headers: {
                'X-CSRF-TOKEN': laravelToken,
            }
        });
    } catch (error) {
        console.log(error.response.data);
    }
}