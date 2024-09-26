<script src="{{ asset('TemplateClient/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('TemplateClient/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('TemplateClient/assets/js/isotope.min.js') }}"></script>
  <script src="{{ asset('TemplateClient/assets/js/owl-carousel.js') }}"></script>
  <script src="{{ asset('TemplateClient/assets/js/counter.js') }}"></script>
  <script src="{{ asset('TemplateClient/assets/js/custom.js') }}"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
        const navLinks = document.querySelectorAll('.nav a');

        navLinks.forEach(link => {
            link.addEventListener('click', function (e) {
                // Check if the clicked link is not the login link
                if (this.href !== '{{ route('login') }}') {
                    e.preventDefault(); // Prevent default anchor behavior

                    // Remove 'active' class from all links
                    navLinks.forEach(navLink => navLink.classList.remove('active'));

                    // Add 'active' class to the clicked link
                    this.classList.add('active');

                    // Smooth scroll to target section
                    const targetId = this.getAttribute('href').substring(1);
                    const targetElement = document.getElementById(targetId);

                    if (targetElement) {
                        window.scrollTo({
                            top: targetElement.offsetTop,
                            behavior: 'smooth'
                        });
                    }
                }
            });
        });
    });
</script>


