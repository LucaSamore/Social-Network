import axios from "axios";

export const followUser = async (myUsername, otherUsername, laravelToken) => {
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
        console.log(error);
    }
}