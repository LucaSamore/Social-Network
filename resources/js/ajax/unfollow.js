import axios from "axios";

export const unfollowUser = async (myUsername, otherUsername, laravelToken) => {
    try {
        return await axios.delete(`/unfollow`, {
            headers: {
                'X-CSRF-TOKEN': laravelToken,
            },
            data: {
                my_username: myUsername, 
                other_username: otherUsername
            }
        });
    } catch (error) {
        console.log(error);
    }
}