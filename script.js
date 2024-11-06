function greetUser() {
    let loginName = window.loginName;

    let currentHour = new Date().getHours();
    let timeGreeting;

    if (currentHour < 12) {
        timeGreeting = "Good morning";
    } else if (currentHour < 18) {
        timeGreeting = "Good afternoon";
    } else {
        timeGreeting = "Good evening";
    }

    if (loginName) {
        document.getElementById("greeting").innerHTML = `${timeGreeting}, ${loginName}!`;
    } else {
        document.getElementById("greeting").innerHTML = `${timeGreeting}, Hello!`;
    }
}

window.onload = greetUser;
