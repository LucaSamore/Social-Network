import axios from "axios";
import { laravelToken } from "./laravel-token";

export const unfollowUser = async (myUsername, otherUsername) => {
    try {
        return await axios.delete(`/unfollow/${myUsername}/${otherUsername}`, {
            headers: {
                'X-CSRF-TOKEN': laravelToken,
            }
        });
    } catch (error) {
        console.log(error.response.data);
    }
}