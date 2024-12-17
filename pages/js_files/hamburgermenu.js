
        // document.addEventListener('DOMContentLoaded', function () {
        //     const hamburgerMenu = document.getElementById('hamburgerMenu');
        //     const navLinks = document.getElementById('navLinks');

        //     hamburgerMenu.addEventListener('click', function () {
        //         navLinks.classList.toggle('active');
        //     });
        // });

        $(document).ready(function() {
            const $hamburgerMenu = $('#hamburgerMenu');
            const $navLinks = $('#navLinks');
        
            $hamburgerMenu.on('click', function() {
                $navLinks.toggleClass('active');
            });
        });
        