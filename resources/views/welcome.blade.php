@extends('layouts.app')
@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .gradient-text {
            background: linear-gradient(90deg, #3b82f6, #8b5cf6);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .pricing-card:hover {
            transform: scale(1.03);
        }

        .testimonial-card {
            position: relative;
        }

        .testimonial-card::before {
            content: "" ";
 position: absolute;
            top: -20px;
            left: 20px;
            font-size: 80px;
            color: rgba(59, 130, 246, 0.1);
            font-family: serif;
            line-height: 1;
        }
    </style>
</head>

<body class="font-sans antialiased">
    <!-- Hero Section -->
    <section class="pt-32 pb-20 px-4 bg-gradient-to-b from-blue-50 to-white">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-12 md:mb-0">
                    <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold mb-6 gradient-text">
                        Modern Payroll Solution for Your Business
                    </h1>
                    <p class="text-gray-600 text-lg mb-8">
                        Automate your payroll processing, manage employee benefits, and streamline HR operations with our all-in-one platform. Save time and reduce errors with our intelligent payroll system.
                    </p>
                    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                        <button class="bg-blue-600 text-white px-8 py-3 rounded-full hover:bg-blue-700 transition duration-300 flex items-center justify-center">
                            <i class="fas fa-play-circle mr-2"></i> Try Free Demo
                        </button>
                        <button class="border border-blue-600 text-blue-600 px-8 py-3 rounded-full hover:bg-blue-50 transition duration-300 flex items-center justify-center">
                            <i class="fas fa-info-circle mr-2"></i> How It Works
                        </button>
                    </div>
                    <div class="mt-8 flex items-center">
                        <div class="flex -space-x-2">
                            <img class="w-10 h-10 rounded-full border-2 border-white" src="https://randomuser.me/api/portraits/women/12.jpg" alt="User">
                            <img class="w-10 h-10 rounded-full border-2 border-white" src="https://randomuser.me/api/portraits/men/32.jpg" alt="User">
                            <img class="w-10 h-10 rounded-full border-2 border-white" src="https://randomuser.me/api/portraits/women/45.jpg" alt="User">
                        </div>
                        <div class="ml-4">
                            <p class="text-gray-600 text-sm"><span class="font-bold text-blue-600">10,000+</span> businesses trust PayrollFlow</p>
                            <div class="flex">
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <span class="ml-2 text-gray-600">4.9/5</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="md:w-1/2 relative">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Payroll Dashboard" class="rounded-xl shadow-xl w-full">
                        <div class="absolute -bottom-6 -left-6 bg-white p-4 rounded-lg shadow-lg hidden md:block">
                            <div class="flex items-center">
                                <div class="bg-green-100 p-3 rounded-full">
                                    <i class="fas fa-check-circle text-green-600 text-xl"></i>
                                </div>
                                <div class="ml-3">
                                    <p class="font-bold">Payroll Processed</p>
                                    <p class="text-gray-600 text-sm">$1.2M+ this month</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Trusted By Section -->
    <section class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <p class="text-center text-gray-500 mb-8">TRUSTED BY LEADING COMPANIES</p>
            <div class="grid grid-cols-2 md:grid-cols-5 gap-8 items-center">
                <img src="https://via.placeholder.com/150x50?text=Company+1" alt="Company Logo" class="h-8 opacity-60 hover:opacity-100 transition duration-300 mx-auto">
                <img src="https://via.placeholder.com/150x50?text=Company+2" alt="Company Logo" class="h-10 opacity-60 hover:opacity-100 transition duration-300 mx-auto">
                <img src="https://via.placeholder.com/150x50?text=Company+3" alt="Company Logo" class="h-12 opacity-60 hover:opacity-100 transition duration-300 mx-auto">
                <img src="https://via.placeholder.com/150x50?text=Company+4" alt="Company Logo" class="h-10 opacity-60 hover:opacity-100 transition duration-300 mx-auto">
                <img src="https://via.placeholder.com/150x50?text=Company+5" alt="Company Logo" class="h-8 opacity-60 hover:opacity-100 transition duration-300 mx-auto">
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16">
                <span class="text-blue-600 font-semibold">FEATURES</span>
                <h2 class="text-4xl font-bold mt-2 mb-4">Why Choose PayrollFlow?</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Our platform is designed to simplify your payroll process while providing powerful features to manage your workforce efficiently.</p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="p-8 border rounded-xl hover:border-blue-200 transition duration-300 feature-card">
                    <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-rocket text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Fast Processing</h3>
                    <p class="text-gray-600">Process payroll in minutes with our automated system and real-time calculations. No more manual spreadsheets or complex formulas.</p>
                </div>

                <div class="p-8 border rounded-xl hover:border-blue-200 transition duration-300 feature-card">
                    <div class="w-14 h-14 bg-purple-100 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-shield-alt text-purple-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Secure & Compliant</h3>
                    <p class="text-gray-600">Stay compliant with tax laws and regulations. Our system updates automatically with the latest legal requirements.</p>
                </div>

                <div class="p-8 border rounded-xl hover:border-blue-200 transition duration-300 feature-card">
                    <div class="w-14 h-14 bg-green-100 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-chart-line text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Advanced Reporting</h3>
                    <p class="text-gray-600">Generate detailed reports on payroll expenses, tax filings, and employee compensation with just a few clicks.</p>
                </div>

                <div class="p-8 border rounded-xl hover:border-blue-200 transition duration-300 feature-card">
                    <div class="w-14 h-14 bg-yellow-100 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-mobile-alt text-yellow-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Mobile Access</h3>
                    <p class="text-gray-600">Manage payroll on the go with our mobile app. Approve timesheets, view reports, and process payments from anywhere.</p>
                </div>

                <div class="p-8 border rounded-xl hover:border-blue-200 transition duration-300 feature-card">
                    <div class="w-14 h-14 bg-red-100 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-users text-red-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Employee Self-Service</h3>
                    <p class="text-gray-600">Employees can access pay stubs, tax forms, and request time off through their personalized portal.</p>
                </div>

                <div class="p-8 border rounded-xl hover:border-blue-200 transition duration-300 feature-card">
                    <div class="w-14 h-14 bg-indigo-100 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-sync-alt text-indigo-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Integrations</h3>
                    <p class="text-gray-600">Connect with your existing accounting, HR, and time tracking software for seamless data flow.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16">
                <span class="text-blue-600 font-semibold">PROCESS</span>
                <h2 class="text-4xl font-bold mt-2 mb-4">How PayrollFlow Works</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Get your payroll up and running in just a few simple steps.</p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="text-blue-600 font-bold text-2xl">1</span>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Set Up Your Company</h3>
                    <p class="text-gray-600">Enter your company details, tax information, and payroll schedule.</p>
                </div>
                <div class="text-center">
                    <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="text-blue-600 font-bold text-2xl">2</span>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Add Your Employees</h3>
                    <p class="text-gray-600">Import employee data or enter manually. Set up payment methods and tax withholdings.</p>
                </div>
                <div class="text-center">
                    <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="text-blue-600 font-bold text-2xl">3</span>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Run Payroll</h3>
                    <p class="text-gray-600">Review calculations and approve payments with just one click.</p>
                </div>
            </div>
            <div class="mt-12 text-center">
                <button class="bg-blue-600 text-white px-8 py-3 rounded-full hover:bg-blue-700 transition duration-300 inline-flex items-center">
                    <i class="fas fa-play mr-2"></i> Watch Demo Video
                </button>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section id="pricing" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16">
                <span class="text-blue-600 font-semibold">PRICING</span>
                <h2 class="text-4xl font-bold mt-2 mb-4">Simple, Transparent Pricing</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Choose the plan that fits your business needs. No hidden fees, no surprises.</p>
                <div class="mt-6 flex justify-center">
                    <div class="bg-gray-100 rounded-full p-1">
                        <button id="monthly-btn" class="px-6 py-2 rounded-full bg-blue-600 text-white">Monthly</button>
                        <button id="annual-btn" class="px-6 py-2 rounded-full text-gray-600 hover:bg-gray-200">Annual (Save 20%)</button>
                    </div>
                </div>
            </div>
            <div class="grid md:grid-cols-3 gap-8 max-w-5xl mx-auto">
                <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-200 pricing-card transition duration-300">
                    <h3 class="text-2xl font-bold mb-4">Basic</h3>
                    <p class="text-4xl font-bold mb-6">$29<span class="text-lg text-gray-500">/month</span></p>
                    <p class="text-gray-600 mb-6">Perfect for small businesses with simple payroll needs.</p>
                    <ul class="space-y-3 mb-8">
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Up to 50 Employees
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Basic Payroll Processing
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Tax Filing for 1 State
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Direct Deposit
                        </li>
                        <li class="flex items-center text-gray-400">
                            <i class="fas fa-times mr-2"></i>
                            Advanced Reporting
                        </li>
                        <li class="flex items-center text-gray-400">
                            <i class="fas fa-times mr-2"></i>
                            HR Tools
                        </li>
                    </ul>
                    <button class="w-full bg-gray-100 text-gray-800 py-3 rounded-lg hover:bg-gray-200 transition duration-300">
                        Get Started
                    </button>
                </div>

                <div class="bg-white p-8 rounded-xl shadow-xl border-2 border-blue-500 pricing-card transform scale-105 transition duration-300 relative">
                    <div class="absolute top-0 right-0 bg-blue-600 text-white text-xs font-bold px-3 py-1 rounded-bl-lg rounded-tr-lg">POPULAR</div>
                    <h3 class="text-2xl font-bold mb-4">Professional</h3>
                    <p class="text-4xl font-bold mb-6">$59<span class="text-lg text-gray-500">/month</span></p>
                    <p class="text-gray-600 mb-6">Ideal for growing businesses with more complex needs.</p>
                    <ul class="space-y-3 mb-8">
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Up to 200 Employees
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Advanced Payroll Processing
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Tax Filing for All States
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Direct Deposit & Checks
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Advanced Reporting
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Basic HR Tools
                        </li>
                    </ul>
                    <button class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition duration-300">
                        Get Started
                    </button>
                </div>

                <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-200 pricing-card transition duration-300">
                    <h3 class="text-2xl font-bold mb-4">Enterprise</h3>
                    <p class="text-4xl font-bold mb-6">$99<span class="text-lg text-gray-500">/month</span></p>
                    <p class="text-gray-600 mb-6">For large businesses with full-service payroll needs.</p>
                    <ul class="space-y-3 mb-8">
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Unlimited Employees
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Full-Service Payroll
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Tax Filing & Compliance
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Multiple Payment Options
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Custom Reporting
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Full HR Suite
                        </li>
                    </ul>
                    <button class="w-full bg-gray-100 text-gray-800 py-3 rounded-lg hover:bg-gray-200 transition duration-300">
                        Get Started
                    </button>
                </div>
            </div>
            <div class="mt-12 text-center">
                <p class="text-gray-600">Need a custom solution? <a href="#" class="text-blue-600 hover:underline">Contact our sales team</a></p>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16">
                <span class="text-blue-600 font-semibold">TESTIMONIALS</span>
                <h2 class="text-4xl font-bold mt-2 mb-4">What Our Clients Say</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Don't just take our word for it. Here's what our customers have to say about PayrollFlow.</p>
            </div>
            <div class="grid md:grid-cols-2 gap-8">
                <div class="p-8 bg-white rounded-xl shadow-sm testimonial-card">
                    <p class="text-gray-600 mb-6">"PayrollFlow has transformed how we handle HR operations. The platform is intuitive and powerful, saving us countless hours each month. The customer support is exceptional too!"</p>
                    <div class="flex items-center">
                        <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Client" class="rounded-full w-12 h-12">
                        <div class="ml-4">
                            <p class="font-bold">Sarah Johnson</p>
                            <p class="text-gray-600">CEO, Tech Solutions Inc.</p>
                        </div>
                    </div>
                </div>

                <div class="p-8 bg-white rounded-xl shadow-sm testimonial-card">
                    <p class="text-gray-600 mb-6">"As a small business owner, I was spending too much time on payroll. PayrollFlow automated everything for me. It's accurate, reliable, and has given me back hours every week to focus on growing my business."</p>
                    <div class="flex items-center">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Client" class="rounded-full w-12 h-12">
                        <div class="ml-4">
                            <p class="font-bold">Michael Rodriguez</p>
                            <p class="text-gray-600">Owner, Café Delight</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-12 flex justify-center">
                <div class="flex space-x-2">
                    <button class="w-3 h-3 rounded-full bg-blue-600"></button>
                    <button class="w-3 h-3 rounded-full bg-gray-300"></button>
                    <button class="w-3 h-3 rounded-full bg-gray-300"></button>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-gradient-to-r from-blue-600 to-purple-600 text-white">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">Ready to Simplify Your Payroll?</h2>
            <p class="text-xl mb-8 max-w-3xl mx-auto">Join thousands of businesses that trust PayrollFlow for accurate, compliant, and stress-free payroll processing.</p>
            <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                <button class="bg-white text-blue-600 px-8 py-3 rounded-full hover:bg-gray-100 transition duration-300 font-bold">
                    Start Free 14-Day Trial
                </button>
                <button class="border border-white text-white px-8 py-3 rounded-full hover:bg-white hover:bg-opacity-10 transition duration-300">
                    Schedule a Demo
                </button>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-20 bg-white">
        <div class="max-w-4xl mx-auto px-4">
            <div class="text-center mb-16">
                <span class="text-blue-600 font-semibold">FAQ</span>
                <h2 class="text-4xl font-bold mt-2 mb-4">Frequently Asked Questions</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Have questions? We've got answers.</p>
            </div>
            <div class="space-y-4">
                <div class="border-b border-gray-200 pb-4">
                    <button class="flex items-center justify-between w-full text-left font-medium text-gray-900">
                        <span>How long does it take to set up PayrollFlow?</span>
                        <i class="fas fa-chevron-down text-blue-600"></i>
                    </button>
                    <div class="mt-2 text-gray-600">
                        <p>Most customers can get set up and running in less than 30 minutes. Our intuitive setup wizard guides you through each step, and our support team is available 24/7 if you need any assistance.</p>
                    </div>
                </div>

                <div class="border-b border-gray-200 pb-4">
                    <button class="flex items-center justify-between w-full text-left font-medium text-gray-900">
                        <span>Is my data secure with PayrollFlow?</span>
                        <i class="fas fa-chevron-down text-blue-600"></i>
                    </button>
                    <div class="mt-2 text-gray-600 hidden">
                        <p>Absolutely. We use bank-level 256-bit encryption to protect all your data. Our servers are hosted in secure, SOC 2 compliant data centers with regular security audits. We also offer two-factor authentication for added security.</p>
                    </div>
                </div>

                <div class="border-b border-gray-200 pb-4">
                    <button class="flex items-center justify-between w-full text-left font-medium text-gray-900">
                        <span>What if I need help using the system?</span>
                        <i class="fas fa-chevron-down text-blue-600"></i>
                    </button>
                    <div class="mt-2 text-gray-600 hidden">
                        <p>We offer 24/7 customer support via phone, email, and live chat. Additionally, our comprehensive knowledge base and video tutorials are available to help you get the most out of PayrollFlow.</p>
                    </div>
                </div>

                <div class="border-b border-gray-200 pb-4">
                    <button class="flex items-center justify-between w-full text-left font-medium text-gray-900">
                        <span>Can I cancel anytime?</span>
                        <i class="fas fa-chevron-down text-blue-600"></i>
                    </button>
                    <div class="mt-2 text-gray-600 hidden">
                        <p>Yes, you can cancel your subscription at any time with no cancellation fees. We'll help you export all your data if you decide to switch to another service.</p>
                    </div>
                </div>

                <div class="border-b border-gray-200 pb-4">
                    <button class="flex items-center justify-between w-full text-left font-medium text-gray-900">
                        <span>Does PayrollFlow handle tax filings?</span>
                        <i class="fas fa-chevron-down text-blue-600"></i>
                    </button>
                    <div class="mt-2 text-gray-600 hidden">
                        <p>Yes, our Professional and Enterprise plans include full-service tax filing. We calculate, file, and pay your payroll taxes to the appropriate agencies, and provide you with all the necessary documentation.</p>
                    </div>
                </div>
            </div>
            <div class="mt-12 text-center">
                <p class="text-gray-600">Still have questions? <a href="#" class="text-blue-600 hover:underline">Contact our support team</a></p>
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
                        <li><a href="#" class="text-gray-400 hover:text-white">Roadmap</a></li>
                    </ul>
                </div>

                <div class="mb-8">
                    <h4 class="text-lg font-semibold mb-4">Resources</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white">Blog</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Help Center</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Webinars</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Community</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">API Docs</a></li>
                    </ul>
                </div>

                <div class="mb-8">
                    <h4 class="text-lg font-semibold mb-4">Company</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white">About Us</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Careers</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Contact</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Press</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Partners</a></li>
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

        // Pricing toggle
        const monthlyBtn = document.getElementById('monthly-btn');
        const annualBtn = document.getElementById('annual-btn');

        monthlyBtn.addEventListener('click', () => {
            monthlyBtn.classList.add('bg-blue-600', 'text-white');
            monthlyBtn.classList.remove('text-gray-600', 'hover:bg-gray-200');
            annualBtn.classList.remove('bg-blue-600', 'text-white');
            annualBtn.classList.add('text-gray-600', 'hover:bg-gray-200');
        });

        annualBtn.addEventListener('click', () => {
            annualBtn.classList.add('bg-blue-600', 'text-white');
            annualBtn.classList.remove('text-gray-600', 'hover:bg-gray-200');
            monthlyBtn.classList.remove('bg-blue-600', 'text-white');
            monthlyBtn.classList.add('text-gray-600', 'hover:bg-gray-200');
        });

        // FAQ accordion
        const faqButtons = document.querySelectorAll('.border-b button');

        faqButtons.forEach(button => {
            button.addEventListener('click', () => {
                const answer = button.nextElementSibling;
                const icon = button.querySelector('i');

                if (answer.classList.contains('hidden')) {
                    answer.classList.remove('hidden');
                    icon.classList.remove('fa-chevron-down');
                    icon.classList.add('fa-chevron-up');
                } else {
                    answer.classList.add('hidden');
                    icon.classList.remove('fa-chevron-up');
                    icon.classList.add('fa-chevron-down');
                }
            });
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
@endsection