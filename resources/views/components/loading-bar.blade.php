<!-- Loading Bar -->
<div id="loading-bar" class="fixed top-0 left-0 w-full h-1 bg-blue-500 transform scale-x-0 transition-transform duration-300 origin-left z-50"></div>

<script>
  function showLoading() {
    const loadingBar = document.getElementById('loading-bar');
    loadingBar.classList.remove('scale-x-0');
    loadingBar.classList.add('scale-x-100');
    setTimeout(() => {
      loadingBar.classList.remove('scale-x-100');
      loadingBar.classList.add('scale-x-0');
    }, 1000);
  }

  // Add loading bar to all interactive elements
  document.addEventListener('DOMContentLoaded', function() {
    // Forms
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
      form.addEventListener('submit', showLoading);
    });

    // Buttons with onclick
    const buttons = document.querySelectorAll('button[onclick]');
    buttons.forEach(button => {
      const originalOnClick = button.getAttribute('onclick');
      button.setAttribute('onclick', `showLoading(); ${originalOnClick}`);
    });

    // Links that are not external
    const links = document.querySelectorAll('a:not([href^="http"])');
    links.forEach(link => {
      link.addEventListener('click', function(e) {
        // Don't show loading for links that are just for navigation within the page
        if (!this.getAttribute('href').startsWith('#')) {
          showLoading();
        }
      });
    });

    // Add loading to all submit buttons
    const submitButtons = document.querySelectorAll('button[type="submit"]');
    submitButtons.forEach(button => {
      button.addEventListener('click', showLoading);
    });
  });
</script>