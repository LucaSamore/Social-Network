import { followUser } from './ajax/follow';
import { unfollowUser } from './ajax/unfollow';

const unfollowButtons = Array.from(document.getElementsByClassName('unfollow'));
const followButtons = Array.from(document.getElementsByClassName('follow'));
const myUsername = document.getElementById('my-username').value;

const insertAfter = (referenceNode, newNode) => 
    referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);

const follow = (e) => {
    if (followUser(e.target.myUsername, e.target.otherUsername)) {
        showUnfollowButton(e.target);
    } else {
        console.log('Andata male fratello');
    }
}

const unfollow = (e) => {
    if (unfollowUser(e.target.myUsername, e.target.otherUsername)) {
        showFollowButton(e.target);
    } else {
        console.log('Andata male fratello');
    }
}

const showFollowButton = (old) => {
    const button = document.createElement('button');
    button.myUsername = old.myUsername;
    button.otherUsername = old.otherUsername;
    button.classList.add('follow');
    button.innerHTML = "Segui";
    "btn w-36 border-none bg-lavanda hover:bg-dark-lavanda normal-case text-white font-montserrat"
        .split(' ')
        .forEach(s => button.classList.add(s));
    button.addEventListener("click", follow, false);
    insertAfter(old, button);
    old.remove();
}

const showUnfollowButton = (old) => {
    const button = document.createElement('button');
    button.myUsername = old.myUsername;
    button.otherUsername = old.otherUsername;
    button.classList.add('unfollow');
    button.innerHTML = "Non seguire più";
    "btn border-lavanda border-2 hover:border-dark-lavanda bg-dark-mode-2 hover:bg-dark-lavanda normal-case text-white font-montserrat"
        .split(' ')
        .forEach(s => button.classList.add(s));
    button.addEventListener("click", unfollow, false);
    insertAfter(old, button);
    old.remove();
}

if (unfollowButtons) {
    unfollowButtons.forEach(btn => {
        btn.myUsername = myUsername;
        btn.otherUsername = btn.parentElement.lastElementChild.value;
        btn.addEventListener("click", unfollow, false);
    });
}

if (followButtons) {
    followButtons.forEach(btn => {
        btn.myUsername = myUsername;
        btn.otherUsername = btn.parentElement.lastElementChild.value;
        btn.addEventListener("click", follow, false);
    });
}