import axios from "axios";
import { laravelToken } from "./laravel-token";

export const deleteAccount = async () => {
    try {
        return await axios.delete(`/user/delete`, {
            headers: {
                'X-CSRF-TOKEN': laravelToken,
            }
        });
    } catch (error) {
        console.log(error.response.data);
    }
}