import axios from "axios";
import { laravelToken } from "./laravel-token";

export const updatePost = async (postId, textualContent, tags) => {
    try {
        return await axios.put(`/post/update`, {
            post_id: postId,
            textual_content: textualContent,
            tags: tags
        }, {
            headers: {
                'X-CSRF-TOKEN': laravelToken,
            }
        });
    } catch (error) {
        console.log(error.response.data);
    }
}