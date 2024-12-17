            /*========================= Category Secme Basla ==========================*/
            const dropdownLinks = document.querySelectorAll('#navLinks .after_content');
            const hamburgerMenu = document.getElementById('hamburgerMenu');
            const containers = document.getElementsByClassName('nav-links');
            const dropdownContent = document.querySelectorAll('.dropdownContent');
            const mainWrapper = document.querySelector('.main-wrapper');

            dropdownLinks.forEach(link => {
                link.addEventListener('mouseover', function () {
                dropdownLinks.forEach(link => link.classList.remove('active'));
                this.classList.add('active');
                });
            });

            hamburgerMenu.addEventListener('click', function() {
                this.classList.toggle('activeBar');
                for (let i = 0; i < containers.length; i++) {
                    containers[i].classList.toggle('activeContainer');
                }
            });

            dropdownLinks.forEach(link => {
                link.addEventListener('click', function () {
                    for (let i = 0; i < containers.length; i++) {
                        containers[i].classList.remove('activeContainer');
                    }
                    hamburgerMenu.classList.remove('activeBar');
                });
            });

            dropdownContent.forEach(link => {
                link.addEventListener('click', function(event) {
                    event.stopPropagation();
                    mainWrapper.classList.toggle('active');
                });
            });

            document.body.addEventListener('click', function(event) {
                if (!mainWrapper.contains(event.target) && !event.target.closest('.dropdownContent')) {
                    mainWrapper.classList.remove('active');
                }
            });
            /* mainWrapper.addEventListener('click', ()=>{
                mainWrapper.classList.remove('active');
            }); */
            /*========================= Category Secme Bitir ==========================*/

            /*========================= Langu Secme Basla ==========================*/
            const myLangu = document.getElementsByClassName('languItem');
            const myLanguContent = document.getElementsByClassName('myLanguContent')[0];
            Array.from(myLangu).forEach(item => {
                item.addEventListener('click', (event) => {
                    event.preventDefault();
                    Array.from(myLangu).forEach(myLangus => {
                        myLangus.classList.remove('activeLangu');
                    });
                    item.classList.add('activeLangu');
                    myLanguContent.textContent = item.textContent;
                });
            });
            /*========================= Langu Secme Bitir ==========================*/

            /*========================= Category Secme Basla ==========================*/
            const myModal = document.getElementById('myModal');
            const loginModal = document.getElementById('login-modal');
            const signupModal = document.getElementById('signup-modal');
            const forgotModal = document.getElementById('forgot-modal');
            const closeModal = document.getElementById('close-modal');
            const forgotPasLink = document.getElementById('forgot-pas-link');

            document.getElementById('show').addEventListener('click', () => {
                myModal.style.display = 'flex';
            });
            /* document.getElementById('showm').addEventListener('click', () => {
                myModal.style.display = 'flex';
            }); */
            document.getElementById('sign-in-up').addEventListener('click', () => {
                myModal.style.display = 'none';
            });

            loginModal.addEventListener('click', () => {
                    showTab('modal-tab-1');
                    setActiveTab(loginModal);
                });
            signupModal.addEventListener('click', () => {
                showTab('modal-tab-2');
                setActiveTab(signupModal);
            });
            forgotPasLink.addEventListener('click', () => {
                showTab('modal-tab-3');
                setActiveTab(forgotModal);
            });
            function showTab(tabId) {
                const tabs = document.querySelectorAll('.login-content-modal');
                tabs.forEach(tab => {
                    tab.style.display = 'none';
                });
            document.getElementById(tabId).style.display = 'flex';
            }
            function setActiveTab(activeTab) {
                const tabs = document.querySelectorAll('.login-modal-tab, .signup-modal-tab, .forgot-modal-tab');
                tabs.forEach(tab => {
                    tab.classList.remove('tab-active');
                });
                activeTab.classList.add('tab-active');
            }
            document.getElementById('show-mobile').addEventListener('click', () => {
                myModal.style.display = 'flex';
            });
            /*========================= Category Secme Bitir ==========================*/