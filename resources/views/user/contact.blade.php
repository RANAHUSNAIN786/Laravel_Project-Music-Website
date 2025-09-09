@extends('partials.user.main')

@section('content')

<!-- Hero Section -->
<div class="relative min-h-[50vh] flex items-center justify-center bg-gradient-to-br from-purple-800 via-indigo-900 to-blue-900 overflow-hidden">
    <div class="absolute inset-0 bg-black/20"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold text-white mb-6 tracking-tight">
            <span class="bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">
                Get in Touch
            </span>
        </h1>
        <p class="text-lg sm:text-xl text-white/80 max-w-2xl mx-auto leading-relaxed">
            Reach out to share your thoughts, book a session, or join the MusicVibes community!
        </p>
    </div>
</div>

<!-- Contact Section -->
<section class="py-16 sm:py-20 bg-gradient-to-b from-gray-50 to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex flex-col lg:flex-row gap-10">
            
            <!-- Contact Form -->
            <div class="lg:w-2/3 bg-white rounded-2xl shadow-lg p-8 border border-gray-100">
                <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-8 text-center lg:text-left">Send a Message</h2>

                <form id="contactForm" class="space-y-6">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Your Name</label>
                            <input type="text" name="name" id="name" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:ring-2 focus:ring-purple-500 focus:outline-none" placeholder="Enter your name" required>
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Your Email</label>
                            <input type="email" name="email" id="email" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:ring-2 focus:ring-purple-500 focus:outline-none" placeholder="Enter email address" required>
                        </div>
                    </div>
                    <div>
                        <label for="subject" class="block text-sm font-semibold text-gray-700 pt-20">Subject</label>
                        <input type="text" name="subject" id="subject" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:ring-2 focus:ring-purple-500 focus:outline-none" placeholder="Enter subject" required>
                    </div>
                    <div>
                        <label for="message" class="block text-sm font-semibold text-gray-700 mb-2">Your Message</label>
                        <textarea name="message" id="message" rows="5" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:ring-2 focus:ring-purple-500 focus:outline-none" placeholder="Enter your message" required></textarea>
                    </div>
                    <button type="submit" class="w-full px-6 py-3 bg-gradient-to-r from-purple-600 to-pink-600 text-white font-semibold rounded-full hover:from-purple-700 hover:to-pink-700 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl">
                        Send Message
                    </button>
                </form>

                <!-- Success / Error Message -->
                <div id="formMessage" class="hidden mt-4 text-center text-lg font-semibold"></div>
            </div>

            <!-- Contact Info -->
            <div class="lg:w-1/3 space-y-6">
                <!-- Location -->
                <a href="https://www.google.com/maps?q=Aptech+Metro+Star+Gate" target="_blank" class="block bg-white rounded-2xl shadow-lg p-6 border border-gray-100 hover:shadow-xl transition-all duration-300">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-purple-100 text-purple-600 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-map-marker-alt text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">Aptech Metro Star Gate</h3>
                            <p class="text-gray-600 text-sm">Karachi, Pakistan</p>
                        </div>
                    </div>
                </a>

                <!-- Phone -->
                <a href="tel:+923156123959" class="block bg-white rounded-2xl shadow-lg p-6 border border-gray-100 hover:shadow-xl transition-all duration-300">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-purple-100 text-purple-600 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-phone-alt text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">+92 315 6123959</h3>
                            <p class="text-gray-600 text-sm">Mon to Fri 9am - 6pm</p>
                        </div>
                    </div>
                </a>

                <!-- Email -->
                <a href="mailto:ranahusnain786787@gmail.com" class="block bg-white rounded-2xl shadow-lg p-6 border border-gray-100 hover:shadow-xl transition-all duration-300">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-purple-100 text-purple-600 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-envelope text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">ranahusnain786787@gmail.com</h3>
                            <p class="text-gray-600 text-sm">Send us your query anytime!</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Ajax Script -->
<script>
document.getElementById("contactForm").addEventListener("submit", async function(e) {
    e.preventDefault();
    const form = e.target;
    const formMessage = document.getElementById("formMessage");

    try {
        const response = await fetch("https://formspree.io/f/xpwjbpkw", {
            method: "POST",
            body: new FormData(form),
            headers: { "Accept": "application/json" }
        });

        if (response.ok) {
            formMessage.textContent = "✅ Message sent successfully!";
            formMessage.className = "mt-4 text-center text-lg font-semibold text-green-600";
            form.reset();
        } else {
            formMessage.textContent = "❌ Failed to send message. Try again.";
            formMessage.className = "mt-4 text-center text-lg font-semibold text-red-600";
        }
        formMessage.classList.remove("hidden");
    } catch (error) {
        formMessage.textContent = "⚠️ Something went wrong!";
        formMessage.className = "mt-4 text-center text-lg font-semibold text-red-600";
        formMessage.classList.remove("hidden");
    }
});
</script>

@endsection
