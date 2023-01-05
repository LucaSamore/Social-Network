import axios from "axios";

const laravelToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

export const updateComment = async (commentId, textualContent) => {
    try {
        return await axios.put(`/comment/update`, {
            comment_id: commentId,
            textual_content: textualContent
        }, {
            headers: {
                'X-CSRF-TOKEN': laravelToken,
            }
        });
    } catch (error) {
        console.log(error.response.data);
    }
}