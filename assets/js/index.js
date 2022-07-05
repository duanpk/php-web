// javascript
window.addEventListener('load', () => {
    toggleScrollButton();
});

document.addEventListener('mouseup', (e) => {
    const form = document.getElementById('login');

    if (!form) {
        return;
    }

    // Click out side form and does not click the text link "Login"
    if (
        !form.contains(e.target) &&
        !e.target.innerText.toLowerCase().includes('login')
    ) {
        form.style.display = '';
    }
});

///////////////////
// DEFINITION
///

function scrollToTop() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

function toggleScrollButton() {
    const lastPosition = window.scrollY;
    const scrollBtn = document.getElementById('scroll');

    if (lastPosition !== 0) {
        scrollBtn.setAttribute('style', 'display: block;');
    } else {
        scrollBtn.setAttribute('style', 'display: none;');
    }
}

window.addEventListener('scroll', function () {
    toggleScrollButton();
});

function showLoginForm() {
    const form = document.getElementById('login');

    if (!form) {
        return;
    }

    form.style.display = form.style.display ? '' : 'block';
}

const submitChangePassword = (e) => {
    const newPassword = e.elements['new-password'].value;
    const confirmPassword = e.elements['confirm-password'].value;

    if (newPassword !== confirmPassword) {
        alert('Passwords do not match');
        event.preventDefault();
        // return;
    }
};
