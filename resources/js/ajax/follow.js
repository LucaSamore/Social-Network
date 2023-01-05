import axios from "axios";
import { laravelToken } from "./laravel-token";

export const followUser = async (myUsername, otherUsername) => {
    try {
        return await axios.post(`/follow`, {
                my_username: myUsername, 
                other_username: otherUsername
            }, {
                headers: {
                    'X-CSRF-TOKEN': laravelToken,
                }
            });

    } catch (error) {
        console.log(error.response.data);
    }
}