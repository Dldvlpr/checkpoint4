const headers = document.getElementsByClassName("header");
const contents = document.getElementsByClassName("content");
const icons = document.getElementsByClassName("content");


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
