<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Michael J. Miller | Digital Home</title>
    <link rel="icon" href="/storage/michael-j-miller-logo.ico" sizes="any">
    <link rel="apple-touch-icon" href="/storage/michael-j-miller-logo.ico">
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body class="bg-white text-gray-900 font-sans">

    <!-- Navbar -->
    <header class="sticky top-0 bg-white shadow z-50">
      <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold">Michael J. Miller</h1>
        <nav class="space-x-6 text-sm font-semibold">
          <a href="#about" class="hover:text-blue-600">About</a>
          <!--a href="#blog" class="hover:text-blue-600">Blog</a-->
          <!--a href="#resume" class="hover:text-blue-600">Resume</a-->
          <!--a href="#contact" class="hover:text-blue-600">Contact</a-->
          <a href="#connect" class="hover:text-blue-600">Connect</a>
        </nav>
      </div>
    </header>

    <!-- Hero -->
    <section class="bg-gradient-to-r from-blue-500 to-teal-400 text-white py-20 text-center">
      <div class="max-w-3xl mx-auto px-4">
        <h2 class="text-4xl md:text-5xl font-bold mb-4">Hey there, I'm Michael Miller</h2>
        <p class="text-xl mb-8">Tech lover, storyteller, explorer.</p>
        <div class="space-x-4">
          <!--a href="#resume" class="bg-white text-blue-600 font-semibold px-6 py-3 rounded hover:bg-gray-100 transition">📄 View Resume</a-->
          <!--a href="#blog" class="bg-white text-blue-600 font-semibold px-6 py-3 rounded hover:bg-gray-100 transition">🧭 Explore Blog</a-->
        </div>
      </div>
    </section>

    <!-- About -->
    <section id="about" class="py-16 bg-gray-50">
      <div class="max-w-5xl mx-auto px-4">
        <h3 class="text-3xl font-bold mb-4">A Little About Me</h3>
        <p class="mb-8 text-lg text-gray-700">Welcome! I'm a curious mind who loves to build, explore, and share. This is where I post thoughts, tech insights, travel stories, and updates on what I'm working on.</p>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 text-center">
          <div>
            <div class="text-3xl mb-2">🌍</div>
            <p class="font-semibold">Traveled to 12 countries</p>
          </div>
          <div>
            <div class="text-3xl mb-2">💻</div>
            <p class="font-semibold">Built my first computer in my late teens</p>
          </div>
          <div>
            <div class="text-3xl mb-2">🚀</div>
            <p class="font-semibold">Fuelled by curiosity and adventure</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Social Links -->
    <section class="py-12 bg-white">
      <div class="max-w-4xl mx-auto px-4 text-center">
        <h3 class="text-2xl font-bold mb-6">Let's Connect</h3>
        <p class="text-gray-600 mb-8">Follow my journey and connect with me on social platforms</p>
        <div class="flex justify-center space-x-6">
          <a href="https://linkedin.com/in/michaeljmiller79" target="_blank" rel="noopener noreferrer"
             class="group flex items-center space-x-2 bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
              <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
            </svg>
            <span class="font-semibold">LinkedIn</span>
          </a>

          <a href="https://github.com/commnerd" target="_blank" rel="noopener noreferrer"
             class="group flex items-center space-x-2 bg-gray-800 text-white px-6 py-3 rounded-lg hover:bg-gray-900 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
              <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
            </svg>
            <span class="font-semibold">GitHub</span>
          </a>
        </div>
      </div>
    </section>

    <!-- Blog Highlights -->
    <!--section id="blog" class="py-16">
      <div class="max-w-6xl mx-auto px-4">
        <h3 class="text-3xl font-bold mb-8 text-center">Latest Stories & Thoughts</h3>
        <div class="grid md:grid-cols-3 gap-6">
          <div class="bg-white shadow rounded p-4">
            <img src="https://via.placeholder.com/400x200" alt="Blog Post" class="mb-4 rounded">
            <h4 class="text-xl font-semibold mb-2">My Trip to Iceland</h4>
            <p class="text-gray-600 mb-2">A look into the landscapes, northern lights, and unexpected road snacks.</p>
            <a href="#" class="text-blue-600 font-semibold">Read More →</a>
          </div>
          <div class="bg-white shadow rounded p-4">
            <img src="https://via.placeholder.com/400x200" alt="Blog Post" class="mb-4 rounded">
            <h4 class="text-xl font-semibold mb-2">5 Tools I Love as a Developer</h4>
            <p class="text-gray-600 mb-2">From code editors to browser extensions—my daily tech stack.</p>
            <a href="#" class="text-blue-600 font-semibold">Read More →</a>
          </div>
          <div class="bg-white shadow rounded p-4">
            <img src="https://via.placeholder.com/400x200" alt="Blog Post" class="mb-4 rounded">
            <h4 class="text-xl font-semibold mb-2">The Solo Travel Guide</h4>
            <p class="text-gray-600 mb-2">Everything I learned traveling solo for the first time.</p>
            <a href="#" class="text-blue-600 font-semibold">Read More →</a>
          </div>
        </div>
      </div>
    </section -->

    <!-- Travel Journal -->
    <!--section class="py-16 bg-gray-100">
      <div class="max-w-5xl mx-auto px-4 text-center">
        <h3 class="text-3xl font-bold mb-6">Travel Journal</h3>
        <p class="mb-6 text-lg text-gray-700">Snapshots and stories from my global adventures.</p>
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
          <img src="https://via.placeholder.com/150" class="rounded shadow" alt="">
          <img src="https://via.placeholder.com/150" class="rounded shadow" alt="">
          <img src="https://via.placeholder.com/150" class="rounded shadow" alt="">
          <img src="https://via.placeholder.com/150" class="rounded shadow" alt="">
        </div>
        <a href="#" class="inline-block mt-6 text-blue-600 font-semibold hover:underline">🌎 See More Adventures</a>
      </div>
    </section-->

    <!-- Resume Section -->
    <!--section id="resume" class="py-16">
      <div class="max-w-4xl mx-auto px-4 text-center">
        <h3 class="text-3xl font-bold mb-4">Resume</h3>
        <p class="text-gray-700 mb-6">Here's what I’ve done so far—more to come!</p>
        <a href="#" class="bg-blue-600 text-white font-semibold px-6 py-3 rounded hover:bg-blue-700 transition">Download Resume (PDF)</a>
      </div>
    </section-->

    <!-- Contact -->
    <!--section id="contact" class="py-16 bg-blue-50">
      <div class="max-w-3xl mx-auto px-4 text-center">
        <h3 class="text-3xl font-bold mb-4">Let’s Connect</h3>
        <p class="text-gray-700 mb-8">Whether it’s for work, coffee, or comparing favorite keyboard shortcuts—drop a message!</p>
        <form class="space-y-4">
          <input type="text" placeholder="Name" class="w-full border p-3 rounded" required>
          <input type="email" placeholder="Email" class="w-full border p-3 rounded" required>
          <textarea placeholder="Your Message" rows="4" class="w-full border p-3 rounded" required></textarea>
          <button type="submit" class="bg-blue-600 text-white font-semibold px-6 py-3 rounded hover:bg-blue-700 transition">Send Message</button>
        </form>
        <div class="mt-6 space-x-4">
          <a href="#" class="text-blue-600 hover:underline">LinkedIn</a>
          <a href="#" class="text-blue-600 hover:underline">GitHub</a>
          <a href="#" class="text-blue-600 hover:underline">Instagram</a>
        </div>
      </div>
    </section-->

    <!-- Footer -->
    <footer class="py-6 bg-white border-t text-center text-sm text-gray-600">
      <p>© 2025 Michael J. Miller. Made with ❤️ using Tailwind CSS.</p>
    </footer>

  </body>
</html>
