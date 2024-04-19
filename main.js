
const test = () => {
    document.getElementById("myModal").style.display = "flex";
}

const handleModalExit = () => {
    document.getElementById("myModal").style.display = "none";
}

window.onclick = (event) => {
    if (event.target == document.getElementById("myModal"))
    {
        document.getElementById("myModal").style.display = "none";
    }
}