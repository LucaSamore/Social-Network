import axios from "axios";

const laravelToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

export const unfollowUser = async (myUsername, otherUsername) => {
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
        console.log(error.response.data);
    }
}