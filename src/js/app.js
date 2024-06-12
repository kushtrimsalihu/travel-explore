import 'tailwindcss/tailwind.css';

document.addEventListener('DOMContentLoaded', () => {

    const menuItems = document.querySelectorAll('.menu-item');

        menuItems.forEach(item => {
            item.addEventListener('click', function() {
                menuItems.forEach(i => i.classList.remove('active'));
                this.classList.add('active');
            });
        });


        menuItems.forEach(item => {
            var submenu = item.querySelector('.sub-menu');
            if (submenu) {
                item.querySelector('a').classList.add('menu-parent-item');
            }
        });
        

    menuItems.forEach(item => {
        item.addEventListener('click', (event) => {

            var submenu = item.querySelector('.sub-menu');
            if (submenu) {
                if (submenu.style.display === 'none' || submenu.style.display === '') {
                    submenu.style.display = 'flex';
                    item.querySelector('a').classList.add('toggled');
                    item.classList.add('active');

                    const links = submenu.querySelectorAll('.sub-menu li a');
                        links.forEach(link => {
                            link.addEventListener('click', (e) => {
                                window.location.href = e.currentTarget.getAttribute('href');
                            });
                        });

                } else {
                    submenu.style.display = 'none';
                    item.querySelector('a').classList.remove('toggled');
                    item.classList.remove('active');
                }

                event.preventDefault();
            }
        });
    });


    document.addEventListener('click', (event) => {
        menuItems.forEach(item => {
            var submenu = item.querySelector('.sub-menu');
            if (submenu && !item.contains(event.target)) {
                submenu.style.display = 'none';
                item.querySelector('a').classList.remove('toggled');
                item.classList.remove('active');
                item.classList.remove('active');
            }
        });
    });
});



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


document.getElementById('closeIcon').addEventListener('click', function() {
    document.getElementById('searchModal').style.visibility = 'hidden';
});
document.getElementById('search-Icon').addEventListener('click', function() {
    document.getElementById('searchModal').style.visibility = 'visible';
});
document.getElementById('search-Icon-mobile').addEventListener('click', function() {
    document.getElementById('searchModal').style.visibility = 'visible';
});