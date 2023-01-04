import axios from 'axios';

const laravelToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
const followButton = document.getElementById('follow-btn');
const unfollowButton = document.getElementById('unfollow-btn');
const myUsername = document.getElementById('my-username').value;
const otherUsername = document.getElementById('other-username').value;
const container = document.getElementById('toggle-follow');

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
            showUnfollowButton();
        } else {
            console.log('Andata male fratello');
        }

    } catch (error) {
        console.log(error);
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
            showFollowButton();
        } else {
            console.log('Andata male fratello');
        }

    } catch (error) {
        console.log(error.response.data);
    }
}

const showFollowButton = () => {
    document.getElementById('unfollow-btn').remove();
    const button = document.createElement('button');
    button.id = "follow-btn";
    button.innerHTML = "Segui";
    "btn w-full mt-2 bg-lavanda hover:bg-dark-lavanda border-none text-white normal-case font-montserrat"
        .split(' ')
        .forEach(s => button.classList.add(s));
    bindEvent(button, followUser);
    container.appendChild(button);
}

const showUnfollowButton = () => {
    document.getElementById('follow-btn').remove();
    const button = document.createElement('button');
    button.id = "unfollow-btn";
    button.innerHTML = "Non seguire più";
    "btn w-full mt-2 bg-black hover:bg-dark-lavanda border-2 border-lavanda text-white normal-case font-montserrat"
        .split(' ')
        .forEach(s => button.classList.add(s));
    bindEvent(button, unfollowUser);
    container.appendChild(button);
}

const bindEvent = (button, eventName) => {
    button.addEventListener("click", eventName, false);
    button.myUsername = myUsername;
    button.otherUsername = otherUsername;
}

if (followButton) {
    bindEvent(followButton, followUser);
}

if (unfollowButton) {
    bindEvent(unfollowButton, unfollowUser);
}