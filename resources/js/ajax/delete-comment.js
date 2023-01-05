import axios from "axios";
import { laravelToken } from "./laravel-token";

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