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

                    const links = submenu.querySelectorAll('.sub-menu li');
                    links.forEach(link => {
                        link.addEventListener('click', (e) => {
                            const anchor = link.querySelector('a');
                            if (anchor) {
                                window.location.href = anchor.getAttribute('href');
                            }
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



document.addEventListener('DOMContentLoaded', function() {
    const faqSections = document.querySelectorAll('.faqsection');

    faqSections.forEach(section => {
        const questionDiv = section.querySelector('.question');
        const plusIcon = section.querySelector('.plus');
        const minusIcon = section.querySelector('.minus');
        const answerDiv = section.querySelector('.answer');

        questionDiv.addEventListener('click', function() {
            const isAnswerHidden = answerDiv.classList.contains('hidden');
            
            faqSections.forEach(s => {
                s.querySelector('.plus').classList.remove('hidden');
                s.querySelector('.minus').classList.add('hidden');
                s.querySelector('.answer').classList.add('hidden');
            });

            if (isAnswerHidden) {
                plusIcon.classList.add('hidden');
                minusIcon.classList.remove('hidden');
                answerDiv.classList.remove('hidden');
            }
        });
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('contactForm');
    
    console.log('Form script loaded'); 

    form.addEventListener('submit', function(event) {
        event.preventDefault();
        
        const fullName = document.getElementById('fullName');
        const email = document.getElementById('email');
        const subject = document.getElementById('subject');
        const message = document.getElementById('message');
        let valid = true;

        
        document.querySelectorAll('.error').forEach(function(errorElement) {
            errorElement.remove();
        });

        
        if (fullName.value.trim() === '') {
            displayError(fullName, 'Full Name is required');
            valid = false;
        }

        
        if (subject.value.trim() === '') {
            displayError(subject, 'Subject is required');
            valid = false;
        }

      
        if (message.value.trim() === '') {
            displayError(message, 'Message is required');
            valid = false;
        }


        if (valid) {
            const formData = new FormData(form);
            fetch('/wp-content/themes/travel-explore/send-email.php', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok ' + response.statusText);
                }
                return response.json();
            })
            .then(data => {
                const messageContainer = document.getElementById('messageContainer');
                if (data.message) {
                    form.innerHTML = '<div class="text-center p-4"><h3>Thank you for your message!</h3></div>';
                    form.reset();
                } else {
                    throw new Error('No message received');
                }
            })
            .catch(error => {
                const messageContainer = document.getElementById('messageContainer');
                messageContainer.innerHTML = `<h3>There was a problem sending the email: ${error.message}</h3>`;
                messageContainer.style.backgroundColor = '#f44336'; 
                messageContainer.classList.remove('hidden');
                console.error('Error:', error);
            });
        }
    });

    function displayError(element, message) {
        const error = document.createElement('div');
        error.textContent = message;
        error.className = 'error';
        error.style.color = 'red';
        element.parentNode.insertBefore(error, element.nextSibling);
    }
});


document.addEventListener('DOMContentLoaded', function() {
    var mapElement = document.getElementById('map');
    if (mapElement) {
        var latitude = parseFloat(mapElement.getAttribute('latitude'));
        var longitude = parseFloat(mapElement.getAttribute('longitude'));

        console.log('Latitude:', latitude);
        console.log('Longitude:', longitude);

        if (!isNaN(latitude) && !isNaN(longitude)) {
            var map = L.map('map').setView([latitude, longitude], 13);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);

            var marker = L.marker([latitude, longitude]).addTo(map);
            marker.bindPopup('Welcome to our location!');
        } else {
            console.error('Latitude or longitude is not a number.');
        }
    } else {
        console.error('Map element not found.');
    }
});







