const quotes = [
    '"Do what you can, with what you have, where you are."',
    '"The best way to predict the future is to create it."',
    '"Life is 10% what happens to us and 90% how we react to it."',
    '"Success is not final, failure is not fatal: It is the courage to continue that counts."',
    '"Believe you can and you\'re halfway there."'
];
function toggleSidebar() {
    const sidebar = document.querySelector('.sidebar');
    sidebar.classList.toggle('collapsed');
}
function displayRandomQuote() {
    const quoteElement = document.getElementById('quote');
    const randomQuote = quotes[Math.floor(Math.random() * quotes.length)];
    quoteElement.textContent = randomQuote;
}
setInterval(displayRandomQuote, 5000);
document.addEventListener("DOMContentLoaded", function () {
    let streak = localStorage.getItem("streak") ? parseInt(localStorage.getItem("streak")) : 1;
    let lastActiveDate = localStorage.getItem("lastActiveDate");
    let today = new Date().toDateString();

    if (lastActiveDate !== today) {
        streak++;
        localStorage.setItem("streak", streak);
        localStorage.setItem("lastActiveDate", today);
    }

    document.getElementById("streak-count").innerText = streak;

    let message = "Keep it up! You're on fire! 🔥";
    if (streak >= 5) {
        message = "Amazing! 5-day streak! 🌟";
    }
    if (streak >= 10) {
        message = "Unstoppable! 10-day streak! 🚀";
    }

    document.getElementById("streak-message").innerText = message;
});
