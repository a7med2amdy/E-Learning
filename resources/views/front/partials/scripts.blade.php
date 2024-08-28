<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Preloader -->
<div id="preloader"></div>

<!-- Vendor JS Files -->


<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

<!-- Main JS File -->
<script src="assets/js/main.js"></script>

<script>
        document.addEventListener('DOMContentLoaded', function () {
            const notificationsIconCounter = document.getElementById('notificationsIconCounter');
            const notificationsList = document.querySelector('.dropdown-menu[aria-labelledby="notificationDropdown"]');

            function updateNotificationCount() {
                fetch('{{ route('front.notifications.count') }}')
                    .then(response => response.json())
                    .then(data => {
                        if (data.count > 0) {
                            notificationsIconCounter.textContent = data.count;
                            notificationsIconCounter.style.display = 'inline';
                        } else {
                            notificationsIconCounter.style.display = 'none';
                        }
                    })
                    .catch(error => console.error('Error fetching notification count:', error));
            }

            function updateNotificationsList() {
                fetch('{{ route('front.notifications.list') }}')
                    .then(response => response.json())
                    .then(data => {
                        let notificationsHtml = '<li class="dropdown-header">Notifications</li>';
                        data.notifications.forEach(notification => {
                            notificationsHtml += `
                                <li style="position: relative;">
                                    <a class="dropdown-item" href="${notification.route}">
                                        ${notification.message}
                                        <br>
                                        <small style="font-size: 0.73em; margin-left: 14px;">
                                            ${notification.created_at}
                                        </small>
                                        ${notification.unread ? '<span style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); color: blue; font-size: 10px;">&#9679;</span>' : ''}
                                    </a>
                                </li>`;
                        });

                        notificationsHtml += `
                            <li><hr class="dropdown-divider"></li>
                            <li><a href="#" class="dropdown-item text-center text-danger">Clear All</a></li>`;

                        notificationsList.innerHTML = notificationsHtml;
                    })
                    .catch(error => console.error('Error fetching notifications list:', error));
            }

            // Initial update calls
            updateNotificationCount();
            updateNotificationsList();

            // Periodically update notifications
            setInterval(() => {
                updateNotificationCount();
                updateNotificationsList();
            }, 30000); // Update every 30 seconds

            // Mark notification as read and update the counter and list
            notificationsList.addEventListener('click', function (e) {
                const targetItem = e.target.closest('.dropdown-item');
                if (targetItem) {
                    const link = targetItem.href;
                    fetch(link)
                        .then(response => {
                            if (response.ok) {
                                updateNotificationCount();
                                updateNotificationsList();
                            }
                        })
                        .catch(error => console.error('Error marking notification as read:', error));
                }
            });
        });

</script>