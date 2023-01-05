import { followUser } from './ajax/follow';
import { unfollowUser } from './ajax/unfollow';

const followButton = document.getElementById('follow-btn');
const unfollowButton = document.getElementById('unfollow-btn');
const myUsername = document.getElementById('my-username').value;
const otherUsername = document.getElementById('other-username').value;
const container = document.getElementById('toggle-follow');

const follow = (e) => {
    if (followUser(e.target.myUsername, e.target.otherUsername)) {
        showUnfollowButton();
    } else {
        console.log('Andata male fratello');
    }
}

const unfollow = (e) => {
    if (unfollowUser(e.target.myUsername, e.target.otherUsername)) {
        showFollowButton();
    } else {
        console.log('Andata male fratello');
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
    bindEvent(button, follow);
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
    bindEvent(button, unfollow);
    container.appendChild(button);
}

const bindEvent = (button, eventName) => {
    button.addEventListener("click", eventName, false);
    button.myUsername = myUsername;
    button.otherUsername = otherUsername;
}

if (followButton) {
    bindEvent(followButton, follow);
}

if (unfollowButton) {
    bindEvent(unfollowButton, unfollow);
}