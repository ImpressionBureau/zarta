const notification = document.querySelector('.notifications');
const hide = () => notification.style.display = 'none';

if (notification) {
    setTimeout(hide, 8000);
    notification.addEventListener('click', hide);
}
