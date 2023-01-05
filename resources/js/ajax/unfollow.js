import axios from "axios";

const laravelToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

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