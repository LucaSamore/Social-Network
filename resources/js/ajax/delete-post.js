import axios from "axios";
import { laravelToken } from "./laravel-token";

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