import axios from "axios";

const laravelToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

export const deleteComment = async (commentId) => {
    try {
        return await axios.delete(`/comment/delete/${commentId}`, {
            headers: {
                'X-CSRF-TOKEN': laravelToken,
            }
        });
    } catch (error) {
        console.log(error.response.data);
    }
}