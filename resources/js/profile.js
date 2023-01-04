import axios from 'axios';

const laravelToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
const followButton = document.getElementById('follow-btn');
const unfollowButton = document.getElementById('unfollow-btn');
const myUsername = document.getElementById('my-username').value;
const otherUsername = document.getElementById('other-username').value;

const followUser = async (e) => {
    try {
        const response = await axios.post(`/follow`, {
                my_username: e.target.myUsername, 
                other_username: e.target.otherUsername
            }, {
                headers: {
                    'X-CSRF-TOKEN': laravelToken,
                }
            });

        if(response) {
            console.log('Successo!');
        } else {
            console.log('Andata male fratello');
        }

    } catch (error) {
        console.log(error.response.data);
    }
}

const unfollowUser = async (e) => {
    try {
        const response = await axios.delete(`/unfollow`, {
            headers: {
                'X-CSRF-TOKEN': laravelToken,
            },
            data: {
                my_username: e.target.myUsername, 
                other_username: e.target.otherUsername
            }
        });

        if(response) {
            console.log('Successo!');
        } else {
            console.log('Andata male fratello');
        }

    } catch (error) {
        console.log(error.response.data);
    }
}

if (followButton) {
    followButton.addEventListener("click", followUser, false);
    followButton.myUsername = myUsername;
    followButton.otherUsername = otherUsername;
}

if (unfollowButton) {
    unfollowButton.addEventListener("click", unfollowUser, false);
    unfollowButton.myUsername = myUsername;
    unfollowButton.otherUsername = otherUsername;
}