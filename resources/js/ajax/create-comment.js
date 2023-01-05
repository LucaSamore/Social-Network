import axios from "axios";
import { laravelToken } from "./laravel-token";

export const createComment = async (postId, comment) => {
    try {
        return await axios.post(`/comment/create`, {
            post_id: postId,
            comment: comment
        }, {
            headers: {
                'X-CSRF-TOKEN': laravelToken,
            },
        });
    } catch (error) {
        console.log(error.response.data);
    }
}