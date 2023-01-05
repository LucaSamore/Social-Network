import axios from "axios";

const laravelToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

export const deletePost = async (postId) => {
    try {
        return await axios.delete(`/post/delete`, {
            headers: {
                'X-CSRF-TOKEN': laravelToken,
            },
            data: {
                post_id: postId,
            }
        });
    } catch (error) {
        console.log(error.response.data);
    }
}