import axios from "axios";
import { laravelToken } from "./laravel-token";

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