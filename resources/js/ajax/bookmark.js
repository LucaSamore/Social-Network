import axios from "axios";
import { laravelToken } from "./laravel-token";

export const updateBookmark = async (postId) => {
    try {
        return await axios.put(`/bookmark/update`, {
            post_id: postId,
        }, {
            headers: {
                'X-CSRF-TOKEN': laravelToken,
            }
        });
    } catch (error) {
        console.log(error.response.data);
    }
}