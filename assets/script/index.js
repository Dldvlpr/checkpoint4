const headers = document.getElementsByClassName("header"),
    contents = document.getElementsByClassName("content"),
    icons = document.getElementsByClassName("icon");


for (let i = 0; i < headers.length; i++) {
    headers[i].addEventListener("click", () => {

        for (let j = 0; j < contents.length; j++) {
            if (i === j) {
                icons[j].innerHTML = contents[j].getBoundingClientRect().height === 0 ? "-" : "+";
                contents[j].classList.toggle("content-transition");
            } else {
                icons[j].innerHTML = "+";
                contents[j].classList.remove("content-transition");
            }
        }

    });
}