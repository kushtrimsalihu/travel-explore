import 'tailwindcss/tailwind.css';

document.addEventListener('DOMContentLoaded', () => {

    // ======= ACTIVE CLASS ADDED =======
    const menuItems = document.querySelectorAll('.menu-item');

        menuItems.forEach(item => {
            item.addEventListener('click', function() {
                menuItems.forEach(i => i.classList.remove('active'));
                this.classList.add('active');
            });
        });


    // ======= SUBMENU DOWN ARROW ICON ADDED =======
        menuItems.forEach(item => {
            var submenu = item.querySelector('.sub-menu');
            if (submenu) {
                item.querySelector('a').classList.add('menu-parent-item');
            }
        });
        


    // ======= SUBMENU ACTIVATION AFTER CLICKING ON LI =======

    menuItems.forEach(item => {
        item.addEventListener('click', (event) => {

            var submenu = item.querySelector('.sub-menu');
            if (submenu) {
                if (submenu.style.display === 'none' || submenu.style.visibility === 'hidden') {
                    submenu.style.display = 'flex';
                    submenu.style.visibility = 'visible';
                    item.querySelector('a').classList.add('toggled');

                    const links = submenu.querySelectorAll('.sub-menu li a');
                        links.forEach(link => {
                            link.addEventListener('click', (e) => {
                                window.location.href = e.currentTarget.getAttribute('href');
                            });
                        });

                } else {
                    submenu.style.display = 'none';
                    item.querySelector('a').classList.remove('toggled');
                }

                event.preventDefault();
            }
        });
    });





    // ======= WHEN CLICKING OUTSIDE SUBMENU IT'S HIDDEN =======

    document.addEventListener('click', (event) => {
        menuItems.forEach(item => {
            var submenu = item.querySelector('.sub-menu');
            if (submenu && !item.contains(event.target)) {
                submenu.style.display = 'none';
            }
        });
    });
});



    // ======= BURGER MENU FUNCTION =======

document.addEventListener('DOMContentLoaded', () => {
    const burgerButton = document.getElementById('burger-menu');
    const menuList = document.getElementById('menuList');
    const closeIcon = document.getElementById('close_Icon');

    burgerButton.addEventListener('click', () => {
        if (menuList.style.display === 'none' || menuList.style.display === '') {
            menuList.style.display = 'flex';
            closeIcon.style.display = 'block';
            burgerButton.style.display = 'none';
        } else {
            menuList.style.display = 'none';
        }
    });

    closeIcon.addEventListener('click', () => {
        menuList.style.display = 'none';
        burgerButton.style.display = 'flex';
        closeIcon.style.display = 'none';
    });

});


    // ======= SEARCH MODULE COMES UP/HIDE =======

document.getElementById('closeIcon').addEventListener('click', function() {
    document.getElementById('searchModal').style.visibility = 'hidden';
});
document.getElementById('search-Icon').addEventListener('click', function() {
    document.getElementById('searchModal').style.visibility = 'visible';
});
document.getElementById('search-Icon-mobile').addEventListener('click', function() {
    document.getElementById('searchModal').style.visibility = 'visible';
});

    // ======= SEARCH MODULE RESULTS =======

    // document.getElementById('searchInput').addEventListener('keydown', (event) => {
    //     if (event.key === 'Enter') {
    //         document.getElementById('search-form').submit(); // Submit the form programmatically
    //     }
    // });
    


    // ======= CLICKING OUTSIDE DIV HIDE SEARCH FORM =======

// var search = document.getElementById('search-form');
// var searchModal = document.getElementById('searchModal');

// if(searchModal.style.visibility="visible"===true){
// document.body.addEventListener('click', function(event) {
//     if (search && !search.contains(event.target)) {
//         searchModal.style.visibility = 'hidden';
//     }
// });
// }

// window.addEventListener('mouseup', function(event) {
//     var searchModal = document.getElementById('search-form');
//     var searchContainer = searchModal.parentElement;
//     if (event.target != searchModal && event.target.parentNode != searchModal && !searchContainer.contains(event.target)) {
//         searchContainer.style.visibility = 'hidden';
//     }
// });

// var search = document.getElementById('searchModal')
// document.onclick = function(div){
//     if(div.target.id !=='search-form'){
//         search.style.visibility = 'hidden';
//     }
// }