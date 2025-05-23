@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About PayrollFlow - Modern Payroll Solutions</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    .gradient-text {
      background: linear-gradient(90deg, #3b82f6, #8b5cf6);
      -webkit-background-clip: text;
      background-clip: text;
      color: transparent;
    }

    .timeline-item::before {
      content: '';
      position: absolute;
      left: -38px;
      top: 0;
      width: 20px;
      height: 20px;
      border-radius: 50%;
      background: #3b82f6;
      border: 4px solid #e0f2fe;
    }

    .team-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>

<body class="font-sans antialiased">
  <!-- Hero Section -->
  <section class="pt-32 pb-20 px-4 bg-gradient-to-b from-blue-50 to-white">
    <div class="max-w-7xl mx-auto">
      <div class="text-center">
        <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold mb-6 gradient-text">
          About PayrollFlow
        </h1>
        <p class="text-xl text-gray-600 max-w-3xl mx-auto">
          We're revolutionizing payroll processing with innovative technology and a commitment to excellence.
        </p>
      </div>
    </div>
  </section>

  <!-- Our Story Section -->
  <section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">
      <div class="flex flex-col md:flex-row items-center">
        <div class="md:w-1/2 mb-12 md:mb-0">
          <span class="text-blue-600 font-semibold">OUR STORY</span>
          <h2 class="text-3xl md:text-4xl font-bold mt-2 mb-6">Simplifying Payroll Since 2015</h2>
          <p class="text-gray-600 mb-6">
            PayrollFlow was founded by a team of HR professionals and software engineers who were frustrated with the complexity and inefficiency of existing payroll solutions. We saw an opportunity to create something better - a platform that combines powerful automation with an intuitive interface.
          </p>
          <p class="text-gray-600 mb-8">
            What started as a small startup in San Francisco has grown into a leading payroll solution trusted by thousands of businesses worldwide. Our mission remains the same: to make payroll processing simple, accurate, and stress-free for businesses of all sizes.
          </p>
          <div class="flex space-x-4">
            <div class="text-center">
              <p class="text-3xl font-bold text-blue-600">10,000+</p>
              <p class="text-gray-600">Businesses</p>
            </div>
            <div class="text-center">
              <p class="text-3xl font-bold text-blue-600">50+</p>
              <p class="text-gray-600">Countries</p>
            </div>
            <div class="text-center">
              <p class="text-3xl font-bold text-blue-600">24/7</p>
              <p class="text-gray-600">Support</p>
            </div>
          </div>
        </div>
        <div class="md:w-1/2">
          <div class="relative">
            <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Our Team" class="rounded-xl shadow-xl w-full">
            <div class="absolute -bottom-6 -right-6 bg-white p-6 rounded-lg shadow-lg hidden md:block">
              <div class="flex items-center">
                <div class="bg-blue-100 p-4 rounded-full">
                  <i class="fas fa-lightbulb text-blue-600 text-2xl"></i>
                </div>
                <div class="ml-4">
                  <p class="font-bold">Innovation Driven</p>
                  <p class="text-gray-600 text-sm">Continously improving since 2015</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Mission Section -->
  <section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
      <div class="text-center mb-16">
        <span class="text-blue-600 font-semibold">OUR MISSION</span>
        <h2 class="text-3xl md:text-4xl font-bold mt-2 mb-4">Why We Do What We Do</h2>
        <p class="text-gray-600 max-w-3xl mx-auto">We believe every business deserves access to simple, reliable payroll solutions.</p>
      </div>
      <div class="grid md:grid-cols-3 gap-8">
        <div class="bg-white p-8 rounded-xl shadow-sm">
          <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center mb-6">
            <i class="fas fa-bolt text-blue-600 text-2xl"></i>
          </div>
          <h3 class="text-xl font-bold mb-3">Simplify Complexity</h3>
          <p class="text-gray-600">Payroll doesn't have to be complicated. We break down complex processes into simple, automated workflows.</p>
        </div>
        <div class="bg-white p-8 rounded-xl shadow-sm">
          <div class="w-14 h-14 bg-purple-100 rounded-full flex items-center justify-center mb-6">
            <i class="fas fa-shield-alt text-purple-600 text-2xl"></i>
          </div>
          <h3 class="text-xl font-bold mb-3">Ensure Accuracy</h3>
          <p class="text-gray-600">Our systems are designed to eliminate errors and ensure your employees are always paid correctly and on time.</p>
        </div>
        <div class="bg-white p-8 rounded-xl shadow-sm">
          <div class="w-14 h-14 bg-green-100 rounded-full flex items-center justify-center mb-6">
            <i class="fas fa-heart text-green-600 text-2xl"></i>
          </div>
          <h3 class="text-xl font-bold mb-3">Delight Customers</h3>
          <p class="text-gray-600">We measure our success by your satisfaction. Our team is committed to providing exceptional service.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Timeline Section -->
  <section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">
      <div class="text-center mb-16">
        <span class="text-blue-600 font-semibold">OUR JOURNEY</span>
        <h2 class="text-3xl md:text-4xl font-bold mt-2 mb-4">Milestones & Achievements</h2>
        <p class="text-gray-600 max-w-3xl mx-auto">Key moments in our growth and development.</p>
      </div>
      <div class="relative pl-12">
        <div class="absolute left-8 top-0 h-full w-0.5 bg-gray-200"></div>

        <div class="relative mb-12 timeline-item">
          <div class="bg-gray-50 p-6 rounded-xl">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4">
              <h3 class="text-xl font-bold">Company Founded</h3>
              <span class="text-blue-600 font-medium">June 2015</span>
            </div>
            <p class="text-gray-600">PayrollFlow was founded by a small team of HR and tech professionals in San Francisco with a vision to simplify payroll processing.</p>
          </div>
        </div>

        <div class="relative mb-12 timeline-item">
          <div class="bg-gray-50 p-6 rounded-xl">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4">
              <h3 class="text-xl font-bold">First Product Launch</h3>
              <span class="text-blue-600 font-medium">January 2016</span>
            </div>
            <p class="text-gray-600">Released our first payroll processing platform with basic features for small businesses, quickly gaining 500+ customers.</p>
          </div>
        </div>

        <div class="relative mb-12 timeline-item">
          <div class="bg-gray-50 p-6 rounded-xl">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4">
              <h3 class="text-xl font-bold">Series A Funding</h3>
              <span class="text-blue-600 font-medium">March 2017</span>
            </div>
            <p class="text-gray-600">Secured $10M in Series A funding led by Sequoia Capital, allowing us to expand our team and accelerate product development.</p>
          </div>
        </div>

        <div class="relative mb-12 timeline-item">
          <div class="bg-gray-50 p-6 rounded-xl">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4">
              <h3 class="text-xl font-bold">Enterprise Solution</h3>
              <span class="text-blue-600 font-medium">October 2018</span>
            </div>
            <p class="text-gray-600">Launched our enterprise-grade payroll solution, serving businesses with 500+ employees and expanding into international markets.</p>
          </div>
        </div>

        <div class="relative timeline-item">
          <div class="bg-gray-50 p-6 rounded-xl">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4">
              <h3 class="text-xl font-bold">10,000 Customers</h3>
              <span class="text-blue-600 font-medium">Present Day</span>
            </div>
            <p class="text-gray-600">Now serving over 10,000 businesses across 50+ countries with a team of 150+ dedicated professionals.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Team Section -->
  <section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
      <div class="text-center mb-16">
        <span class="text-blue-600 font-semibold">OUR TEAM</span>
        <h2 class="text-3xl md:text-4xl font-bold mt-2 mb-4">Meet The Leadership</h2>
        <p class="text-gray-600 max-w-3xl mx-auto">The passionate people behind PayrollFlow's success.</p>
      </div>
      <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8">
        <div class="bg-white p-6 rounded-xl shadow-sm text-center team-card transition duration-300">
          <img src="https://randomuser.me/api/portraits/women/32.jpg" alt="CEO" class="w-32 h-32 rounded-full mx-auto mb-4">
          <h3 class="text-xl font-bold">Sarah Johnson</h3>
          <p class="text-blue-600 mb-3">CEO & Co-Founder</p>
          <p class="text-gray-600 text-sm">Former HR Director with 15+ years of experience in workforce management.</p>
          <div class="flex justify-center space-x-3 mt-4">
            <a href="#" class="text-gray-400 hover:text-blue-600"><i class="fab fa-linkedin-in"></i></a>
            <a href="#" class="text-gray-400 hover:text-blue-600"><i class="fab fa-twitter"></i></a>
          </div>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-sm text-center team-card transition duration-300">
          <img src="https://randomuser.me/api/portraits/men/41.jpg" alt="CTO" class="w-32 h-32 rounded-full mx-auto mb-4">
          <h3 class="text-xl font-bold">Michael Chen</h3>
          <p class="text-blue-600 mb-3">CTO & Co-Founder</p>
          <p class="text-gray-600 text-sm">Software architect with expertise in cloud-based enterprise solutions.</p>
          <div class="flex justify-center space-x-3 mt-4">
            <a href="#" class="text-gray-400 hover:text-blue-600"><i class="fab fa-linkedin-in"></i></a>
            <a href="#" class="text-gray-400 hover:text-blue-600"><i class="fab fa-github"></i></a>
          </div>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-sm text-center team-card transition duration-300">
          <img src="https://randomuser.me/api/portraits/women/45.jpg" alt="CFO" class="w-32 h-32 rounded-full mx-auto mb-4">
          <h3 class="text-xl font-bold">Emily Rodriguez</h3>
          <p class="text-blue-600 mb-3">CFO</p>
          <p class="text-gray-600 text-sm">Financial strategist with deep expertise in SaaS business models.</p>
          <div class="flex justify-center space-x-3 mt-4">
            <a href="#" class="text-gray-400 hover:text-blue-600"><i class="fab fa-linkedin-in"></i></a>
            <a href="#" class="text-gray-400 hover:text-blue-600"><i class="fab fa-twitter"></i></a>
          </div>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-sm text-center team-card transition duration-300">
          <img src="https://randomuser.me/api/portraits/men/22.jpg" alt="CPO" class="w-32 h-32 rounded-full mx-auto mb-4">
          <h3 class="text-xl font-bold">David Wilson</h3>
          <p class="text-blue-600 mb-3">CPO</p>
          <p class="text-gray-600 text-sm">Product leader focused on creating intuitive user experiences.</p>
          <div class="flex justify-center space-x-3 mt-4">
            <a href="#" class="text-gray-400 hover:text-blue-600"><i class="fab fa-linkedin-in"></i></a>
            <a href="#" class="text-gray-400 hover:text-blue-600"><i class="fab fa-dribbble"></i></a>
          </div>
        </div>
      </div>
      <div class="mt-12 text-center">
        <button class="border border-blue-600 text-blue-600 px-8 py-3 rounded-full hover:bg-blue-50 transition duration-300">
          View All Team Members
        </button>
      </div>
    </div>
  </section>

  <!-- Values Section -->
  <section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">
      <div class="text-center mb-16">
        <span class="text-blue-600 font-semibold">OUR VALUES</span>
        <h2 class="text-3xl md:text-4xl font-bold mt-2 mb-4">What Guides Us</h2>
        <p class="text-gray-600 max-w-3xl mx-auto">The principles that shape our decisions and culture.</p>
      </div>
      <div class="grid md:grid-cols-3 gap-8">
        <div class="p-8 border rounded-xl hover:shadow-lg transition duration-300">
          <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center mb-6">
            <i class="fas fa-users text-blue-600 text-2xl"></i>
          </div>
          <h3 class="text-xl font-bold mb-3">Customer First</h3>
          <p class="text-gray-600">We listen to our customers and build solutions that solve their real problems. Their success is our success.</p>
        </div>
        <div class="p-8 border rounded-xl hover:shadow-lg transition duration-300">
          <div class="w-14 h-14 bg-purple-100 rounded-full flex items-center justify-center mb-6">
            <i class="fas fa-lightbulb text-purple-600 text-2xl"></i>
          </div>
          <h3 class="text-xl font-bold mb-3">Innovate Constantly</h3>
          <p class="text-gray-600">We challenge the status quo and continuously seek better ways to serve our customers.</p>
        </div>
        <div class="p-8 border rounded-xl hover:shadow-lg transition duration-300">
          <div class="w-14 h-14 bg-green-100 rounded-full flex items-center justify-center mb-6">
            <i class="fas fa-handshake text-green-600 text-2xl"></i>
          </div>
          <h3 class="text-xl font-bold mb-3">Integrity Always</h3>
          <p class="text-gray-600">We do what's right, even when no one is watching. Trust is the foundation of everything we do.</p>
        </div>
        <div class="p-8 border rounded-xl hover:shadow-lg transition duration-300">
          <div class="w-14 h-14 bg-yellow-100 rounded-full flex items-center justify-center mb-6">
            <i class="fas fa-heart text-yellow-600 text-2xl"></i>
          </div>
          <h3 class="text-xl font-bold mb-3">Passion for Excellence</h3>
          <p class="text-gray-600">We take pride in our work and strive for excellence in everything we do, from product to support.</p>
        </div>
        <div class="p-8 border rounded-xl hover:shadow-lg transition duration-300">
          <div class="w-14 h-14 bg-red-100 rounded-full flex items-center justify-center mb-6">
            <i class="fas fa-laugh-beam text-red-600 text-2xl"></i>
          </div>
          <h3 class="text-xl font-bold mb-3">Work Joyfully</h3>
          <p class="text-gray-600">We believe work should be fulfilling and fun. We celebrate wins and learn from challenges together.</p>
        </div>
        <div class="p-8 border rounded-xl hover:shadow-lg transition duration-300">
          <div class="w-14 h-14 bg-indigo-100 rounded-full flex items-center justify-center mb-6">
            <i class="fas fa-globe-americas text-indigo-600 text-2xl"></i>
          </div>
          <h3 class="text-xl font-bold mb-3">Think Global</h3>
          <p class="text-gray-600">We build solutions that work across borders and cultures, serving a diverse global workforce.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="py-20 bg-gradient-to-r from-blue-600 to-purple-600 text-white">
    <div class="max-w-7xl mx-auto px-4 text-center">
      <h2 class="text-3xl md:text-4xl font-bold mb-6">Ready to Experience Better Payroll?</h2>
      <p class="text-xl mb-8 max-w-3xl mx-auto">Join thousands of businesses that trust PayrollFlow for accurate, compliant, and stress-free payroll processing.</p>
      <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
        <button class="bg-white text-blue-600 px-8 py-3 rounded-full hover:bg-gray-100 transition duration-300 font-bold">
          Start Free 14-Day Trial
        </button>
        <button class="border border-white text-white px-8 py-3 rounded-full hover:bg-white hover:bg-opacity-10 transition duration-300">
          Contact Our Team
        </button>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-gray-900 text-white pt-16 pb-8">
    <div class="max-w-7xl mx-auto px-4">
      <div class="grid md:grid-cols-4 gap-8">
        <div class="mb-8">
          <div class="flex items-center mb-4">
            <i class="fas fa-calculator text-blue-400 text-2xl mr-2"></i>
            <span class="text-xl font-bold gradient-text">PayrollFlow</span>
          </div>
          <p class="text-gray-400 mb-4">Making payroll processing simple and efficient for modern businesses.</p>
          <div class="flex space-x-4">
            <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-twitter"></i></a>
            <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-linkedin-in"></i></a>
            <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-instagram"></i></a>
          </div>
        </div>

        <div class="mb-8">
          <h4 class="text-lg font-semibold mb-4">Product</h4>
          <ul class="space-y-2">
            <li><a href="#" class="text-gray-400 hover:text-white">Features</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white">Pricing</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white">Integrations</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white">Updates</a></li>
          </ul>
        </div>

        <div class="mb-8">
          <h4 class="text-lg font-semibold mb-4">Company</h4>
          <ul class="space-y-2">
            <li><a href="about.html" class="text-gray-400 hover:text-white">About Us</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white">Careers</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white">Blog</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white">Press</a></li>
          </ul>
        </div>

        <div class="mb-8" id="contact">
          <h4 class="text-lg font-semibold mb-4">Contact</h4>
          <ul class="space-y-2">
            <li class="flex items-center text-gray-400">
              <i class="fas fa-map-marker-alt mr-2"></i> 123 Payroll St, San Francisco
            </li>
            <li class="flex items-center text-gray-400">
              <i class="fas fa-phone-alt mr-2"></i> (555) 123-4567
            </li>
            <li class="flex items-center text-gray-400">
              <i class="fas fa-envelope mr-2"></i> hello@payrollflow.com
            </li>
          </ul>
        </div>
      </div>

      <div class="border-t border-gray-800 mt-12 pt-8">
        <div class="flex flex-col md:flex-row justify-between items-center">
          <p class="text-gray-400 mb-4 md:mb-0">© 2023 PayrollFlow. All rights reserved.</p>
          <div class="flex space-x-6">
            <a href="#" class="text-gray-400 hover:text-white">Privacy Policy</a>
            <a href="#" class="text-gray-400 hover:text-white">Terms of Service</a>
            <a href="#" class="text-gray-400 hover:text-white">Cookies</a>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <script>
    // Mobile menu toggle
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    mobileMenuButton.addEventListener('click', () => {
      mobileMenu.classList.toggle('hidden');
    });

    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function(e) {
        e.preventDefault();

        document.querySelector(this.getAttribute('href')).scrollIntoView({
          behavior: 'smooth'
        });

        // Close mobile menu if open
        if (!mobileMenu.classList.contains('hidden')) {
          mobileMenu.classList.add('hidden');
        }
      });
    });
  </script>
</body>

</html>
@endsection