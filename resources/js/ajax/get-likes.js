import axios from "axios";
import { laravelToken } from "./laravel-token";

export const numberOfLikes = async postId => {
    try {
        return await axios.get(`/like/${postId}`, { 
            headers: {
                'X-CSRF-TOKEN': laravelToken
            }});
    } catch (error) {
        console.log(error.response.data);
    }
}