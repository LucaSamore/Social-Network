import { deleteAccount } from "./ajax/delete-account";

const deleteAccountButton = document.getElementById('delete-account-btn');

const deleteAccountEvent = async e => {
    const result = await deleteAccount();

    if (result.data > 0) {
        window.location.replace('/login');
    }
}

deleteAccountButton.addEventListener("click", deleteAccountEvent, false);