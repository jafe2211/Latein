const toggleButton = document.getElementsByClassName("toggle-button")[0]
const listContainer = document.getElementsByClassName("list-container")[0]

toggleButton.addEventListener("click", () => {
    listContainer.classList.add("list-container_active")
})