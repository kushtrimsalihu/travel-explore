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
    document.getElementById('live-search-input').value = '';
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
    
    if (form) {
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
                .then(response => response.json())
                .then(data => {
                    if (data.message) {
                        form.innerHTML = '<div class="text-center p-4 text-light-p40"><h3>Thank you for your message!</h3></div>';
                        form.reset();
                    } else {
                        throw new Error(data.error || 'No message received');
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
    }
});




document.addEventListener('DOMContentLoaded', function() {
    var mapElement = document.getElementById('map');
    if (mapElement) {
        var latitude = parseFloat(mapElement.getAttribute('latitude'));
        var longitude = parseFloat(mapElement.getAttribute('longitude'));

        if (!isNaN(latitude) && !isNaN(longitude)) {
            var map = L.map('map').setView([latitude, longitude], 13);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);

            var marker = L.marker([latitude, longitude]).addTo(map);
            marker.bindPopup('Welcome to our location!');
        }}
});
    document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.reply-toggle').forEach(button => {
        button.addEventListener('click', function () {
            const commentId = this.getAttribute('data-comment-id');
            document.getElementById('reply-form-' + commentId).classList.toggle('hidden');
        });
    });
    document.querySelectorAll('.cancel-reply').forEach(button => {
        button.addEventListener('click', function () {
            const commentId = this.closest('.reply-form').id.replace('reply-form-', '');
            document.getElementById('reply-form-' + commentId).classList.add('hidden');
        });
    });
});


document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.show-replies').forEach(function (toggle) {
        toggle.addEventListener('click', function () {
            const commentId = this.getAttribute('data-comment-id');
            const repliesContainer = document.getElementById(`replies-${commentId}`);
            repliesContainer.classList.toggle('hidden');
            this.textContent = repliesContainer.classList.contains('hidden') ? 'Show replies' : 'Hide replies';
        });
    });
});


document.addEventListener('DOMContentLoaded', function() {
    var commentForm = document.getElementById('commentform');
    if (commentForm) {
        commentForm.addEventListener('submit', function(event) {
            if (currentUserId !== postAuthorId && currentUserId !== 1) {
                window.location.reload();
                alert('Your comment will be approved by the admin.');
            }
            else{
                window.location.reload();
                alert('Your comment added succesfully.');
            }
        });
    }

    var replyForms = document.querySelectorAll('.comment-form');
    replyForms.forEach(function(form) {
        form.addEventListener('submit', function(event) {
            if (currentUserId !== postAuthorId && currentUserId !== 1) {
                window.location.reload();
                alert('Your reply will be approved by the admin.');
            }
            else{
                window.location.reload();
                alert('Your reply added succesfully.');
            }
        });
    });
});

document.addEventListener('DOMContentLoaded', function() {
    var showPasswordsCheckbox = document.getElementById('show_passwords');
    if (showPasswordsCheckbox) {
        showPasswordsCheckbox.addEventListener('change', function() {
            var passwordFields = document.querySelectorAll('input[type="password"], input[type="text"]');
            var showPasswords = this.checked;
            passwordFields.forEach(function(field) {
                if (field.type === 'password' && showPasswords) {
                    field.dataset.type = 'password'; 
                    field.type = 'text';
                } else if (field.dataset.type === 'password') { 
                    field.type = 'password';
                }
            });
        });
    }
});


document.addEventListener('DOMContentLoaded', function() {
    const cookieConsentBanner = document.getElementById('cookie-consent-banner');
    const cookieConsentAccept = document.getElementById('cookie-consent-accept');
    const cookieConsentReject = document.getElementById('cookie-consent-reject');

    setTimeout(function() {
        const cookieConsentBanner = document.getElementById('cookie-consent-banner');
        
        if (!getCookie('cookie_consent')) {
            cookieConsentBanner.classList.remove('hidden');
        }

        cookieConsentAccept.addEventListener('click', function() {
            setCookie('cookie_consent', 'accepted', 365);
            cookieConsentBanner.classList.add('hidden');
        });

        cookieConsentReject.addEventListener('click', function() {
            cookieConsentBanner.classList.add('hidden');
        });

    }, 2000);

    function setCookie(name, value, days) {
        const d = new Date();
        d.setTime(d.getTime() + (days * 24 * 60 * 60 * 1000));
        const expires = "expires=" + d.toUTCString();
        document.cookie = name + "=" + value + ";" + expires + ";path=/";
    }

    function getCookie(name) {
        const nameEQ = name + "=";
        const ca = document.cookie.split(';');
        for (let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) == ' ') c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
        }
        return null;
    }

    if (getCookie('cookie_consent') === 'accepted') {
        loadTrackingScripts();
    }


    function loadTrackingScripts() {
        var script = document.createElement('script');
        script.async = true;
        script.src = 'https://www.googletagmanager.com/gtag/js?id=UA-XXXXX-Y';
        document.head.appendChild(script);
    
        script.onload = function() {
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'UA-XXXXX-Y');
        };
    }


});

document.addEventListener('DOMContentLoaded', function() {
    const priceElement = document.getElementById('card_price');
    const personsElement = document.getElementById('persons');
    const totalPriceElement = document.getElementById('total_price');
    const totalPriceDisplay = document.getElementById('total-price-display');
    
    if (priceElement && personsElement && totalPriceElement && totalPriceDisplay) {
        const basePrice = parseFloat(priceElement.value);

        function updateTotalPrice() {
            const numberOfPersons = parseInt(personsElement.value);
            if (!isNaN(numberOfPersons) && !isNaN(basePrice)) {
                const totalPrice = basePrice * numberOfPersons;
                totalPriceElement.value = totalPrice.toFixed(2);
                totalPriceDisplay.textContent = `Total Price: €${totalPrice.toFixed(2)}`;
            } else {
                totalPriceElement.value = '0.00';
                totalPriceDisplay.textContent = 'Total Price: €0.00';
            }
        }

        personsElement.addEventListener('input', updateTotalPrice);
        updateTotalPrice();
    }
});
document.addEventListener('DOMContentLoaded', function() {
    var popup = document.getElementById('popup-notification');
    var closeBtn = document.getElementById('close-popup');
    function showPopup() {
        popup.classList.remove('hidden');
    }
    function closePopup() {
        popup.classList.add('hidden');
    }
    if(closeBtn){
        closeBtn.addEventListener('click', closePopup);
        if (window.ShowPopup) {
            showPopup();
        }
    }
});


document.addEventListener('DOMContentLoaded', function() {

    if (window.showEncouragementNotification) {
        var encouragementNotification = document.getElementById('encouragementNotification');
        var closeEncouragementBtn = document.getElementById('closeEncouragementNotification');

        encouragementNotification.classList.remove('hidden');

        closeEncouragementBtn.addEventListener('click', function() {
            encouragementNotification.classList.add('hidden');
        });
    }

});

document.addEventListener('DOMContentLoaded', function () {
    const urlParams = new URLSearchParams(window.location.search);
    const location = urlParams.get('location');
    if (location) {
        document.getElementById('end').value = location;
    }

    if (document.getElementById('route-map')) {
        var map = L.map('route-map').setView([42.6629, 21.1655], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
        }).addTo(map);

        var control = L.Routing.control({
            waypoints: [],
            routeWhileDragging: true,
            router: L.Routing.osrmv1({
                serviceUrl: 'https://router.project-osrm.org/route/v1/'
            })
        }).addTo(map);

        var start, end;
        var currentLocationMarker;
        var startLocationType = 'current';

        control.on('routesfound', function (e) {
            var routes = e.routes;
            var summary = routes[0].summary;
            var distance = (summary.totalDistance / 1000).toFixed(1) + ' km';
            var totalMinutes = summary.totalTime / 60;
            var duration;

            if (totalMinutes > 60) {
                var hours = Math.floor(totalMinutes / 60);
                var minutes = Math.floor(totalMinutes % 60);
                duration = hours + ' hr ' + minutes + ' min';
            } else {
                duration = totalMinutes.toFixed(0) + ' min';
            }

            document.getElementById('route-info').innerHTML = 
                '<p class="distance">Distance: ' + distance + '</p>' +
                '<p class="duration">Duration: ' + duration + '</p>';
            document.getElementById('route-info').style.display = 'flex'; 
        });

        async function getCoordinates(location) {
            try {
                const response = await fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${location}`);
                const data = await response.json();
                if (data && data.length > 0) {
                    const { lat, lon } = data[0];
                    return L.latLng(lat, lon);
                } else {
                    alert('Could not find the location: ' + location);
                    return null;
                }
            } catch (error) {
                console.error('Geocoding error:', error);
                alert('An error occurred while fetching location data.');
                return null;
            }
        }

        document.getElementById('location-type').addEventListener('change', function () {
            startLocationType = document.getElementById('location-type').value;
            var manualLocationDiv = document.getElementById('manual-location');
            if (startLocationType === 'manual') {
                manualLocationDiv.style.display = 'block';
            } else {
                manualLocationDiv.style.display = 'none';
            }
        });

        document.getElementById('start-now').addEventListener('click', async function () {
            var endInput = document.getElementById('end').value;

            if (startLocationType === 'current') {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(async function (position) {
                        start = L.latLng(position.coords.latitude, position.coords.longitude);
                        end = await getCoordinates(endInput);

                        if (end) {
                            control.setWaypoints([start, end]);
                            document.getElementById('start-navigation').style.display = 'inline-block'; // Show the start button
                        } else {
                            alert('Please enter a valid location for the end point.');
                        }
                    }, function (error) {
                        alert('Error retrieving current location: ' + error.message);
                    });
                } else {
                    alert('Geolocation is not supported by this browser.');
                }
            } else {
                var startInput = document.getElementById('start').value;
                start = await getCoordinates(startInput);
                end = await getCoordinates(endInput);

                if (start && end) {
                    control.setWaypoints([start, end]);
                    document.getElementById('start-navigation').style.display = 'inline-block'; 
                } else {
                    alert('Please enter valid locations for both start and end points.');
                }
            }
        });

        document.getElementById('start-navigation').addEventListener('click', async function () {
            if (startLocationType === 'current') {
                if (navigator.geolocation) {
                    navigator.geolocation.watchPosition(async function (position) {
                        var currentLocation = L.latLng(position.coords.latitude, position.coords.longitude);

                        if (currentLocationMarker) {
                            currentLocationMarker.setLatLng(currentLocation); 
                        } else {
                            currentLocationMarker = L.marker(currentLocation).addTo(map).bindPopup('You are here').openPopup();
                        }

                        map.setView(currentLocation, 19);

                        if (start && end) {
                            control.setWaypoints([currentLocation, end]);
                        }
                    }, function (error) {
                        alert('Error retrieving current location for navigation: ' + error.message);
                    }, {
                        enableHighAccuracy: true,
                        maximumAge: 0,
                        timeout: Infinity 
                    });
                } else {
                    alert('Geolocation is not supported by this browser.');
                }
            } else {
                if (start && end) {
                    control.setWaypoints([start, end]);
                } else {
                    alert('Please enter valid locations for both start and end points.');
                }
            }
        });
    }
});


document.addEventListener('DOMContentLoaded', function() {
    var loader = document.getElementById('loader');
    loader.classList.remove('hidden');

    setTimeout(function() {
        loader.classList.add('hidden');
    }, 1800); 
});

document.addEventListener('DOMContentLoaded', function () {
    function submitBookingForm(image, title, duration, description, price) {
        document.getElementById('formImage').value = image;
        document.getElementById('formTitle').value = title;
        document.getElementById('formDuration').value = duration;
        document.getElementById('formDescription').value = description;
        document.getElementById('formPrice').value = price;
        document.getElementById('bookingForm').submit();
    }

    
    window.submitBookingForm = submitBookingForm;
});

document.getElementById('closeButton').addEventListener('click', function() {
    document.getElementById('modal').style.display = 'none';
});

document.querySelectorAll('input[name="_mc4wp_action"]').forEach(function(radio) {
    radio.addEventListener('change', function() {
        const subscribeRadio = document.querySelector('input[name="_mc4wp_action"]:checked').value;
        const submitButton = document.getElementById('submitButton');
        submitButton.value = subscribeRadio.charAt(0).toUpperCase() + subscribeRadio.slice(1);
    });
});


document.addEventListener('DOMContentLoaded', function() {
    var reservationForm = document.getElementById('reservation-form');

    if (reservationForm) {
        reservationForm.addEventListener('submit', function(event) {
            alert('Your reservation is being processed. You will be redirected to the Homepage.');
        });
    }
});