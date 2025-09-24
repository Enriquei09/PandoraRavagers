//buscador
function filterCards() {
    const searchInput = document.getElementById("searchInput").value.toLowerCase();
    const cards = document.querySelectorAll(".card");

    cards.forEach(card => {
        const cardName = card.getAttribute("data-name").toLowerCase();
        if (cardName.includes(searchInput)) {
            card.style.display = "block"; // Mostrar la carta si coincide
        } else {
            card.style.display = "none"; // Ocultar la carta si no coincide
        }
    });
}
 
//contador
let cart = [];
    
        function addToCart(itemName, itemPrice, quantityId) {
            const quantity = parseInt(document.getElementById(quantityId).value);
    
            if (quantity <= 0) {
                alert("Por favor selecciona al menos 1 carta.");
                return;
            }
    
            const item = { name: itemName, price: itemPrice, quantity: quantity };
            cart.push(item);
    
            alert(`${quantity} ${itemName}(s) agregado(s) al carrito.`);
            console.log("Carrito actualizado:", cart);
        }

        //menu del logo
        function toggleUserMenu() {
            const menu = document.getElementById("userMenu");
            if (menu.style.display === "block") {
                menu.style.display = "none"; // Oculta el menú si está visible
            } else {
                menu.style.display = "block"; // Muestra el menú si está oculto
            }
        }
        
        // Ocultar el menú si se hace clic fuera de él
        document.addEventListener("click", function (event) {
            const menu = document.getElementById("userMenu");
            const profile = document.querySelector(".user-profile");
        
            if (menu.style.display === "block" && !menu.contains(event.target) && !profile.contains(event.target)) {
                menu.style.display = "none";
            }
        });