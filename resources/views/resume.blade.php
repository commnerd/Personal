<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Michael J. Miller | Resume</title>
    <link rel="icon" href="/media/michael-j-miller-logo.ico" sizes="any">
    <link rel="apple-touch-icon" href="/media/michael-j-miller-logo.ico">
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body class="bg-gray-50 text-gray-900 font-sans">
    <header class="sticky top-0 bg-white shadow z-50">
      <div class="max-w-5xl mx-auto px-4 py-4 flex items-center justify-between gap-3">
        <div>
          <h1 class="text-xl md:text-2xl font-bold">Michael J. Miller</h1>
          <p class="hidden print:block text-sm text-gray-700">
            michaeljmiller79@gmail.com | 541-619-5397
          </p>
        </div>
        <div class="flex items-center gap-2">
          <a
            href="{{ route('resume.download') }}"
            class="inline-flex items-center rounded-md bg-emerald-600 px-4 py-2 text-sm font-semibold text-white hover:bg-emerald-700 transition print:hidden"
          >
            Download PDF
          </a>
          <a
            href="/"
            class="inline-flex items-center rounded-md bg-blue-600 px-4 py-2 text-sm font-semibold text-white hover:bg-blue-700 transition print:hidden"
          >
            Back Home
          </a>
        </div>
      </div>
    </header>

    <main class="max-w-5xl mx-auto px-4 py-10 md:py-14">
      <section class="mb-12">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">Professional Summary</h2>
        <p class="text-base md:text-lg leading-8 text-gray-700">
          Senior full-stack software developer and technical leader building immersive, interactive installations that fuse
          technology, creativity, and storytelling. At Dimensional Innovations, Michael J. Miller leads cross-disciplinary
          development across hardware, software, and design, delivering scalable architectures, data systems, and intuitive
          interfaces that turn complex ideas into meaningful audience experiences. His engineering approach emphasizes clarity,
          adaptability, and craftsmanship while continuously exploring emerging technologies that deepen how people connect
          with spaces and stories.
        </p>
      </section>

      <section>
        <h2 class="text-3xl md:text-4xl font-bold mb-6">Professional Experience</h2>
        <div class="space-y-8">
          <article class="rounded-lg bg-white p-6 shadow-sm print:break-after-page">
            <h3 class="text-2xl font-bold">Dimensional Innovations</h3>
            <p class="mt-1 text-sm font-semibold text-gray-600">Senior Full Stack Developer (Full-time) | Feb 2025 - Present (1 yr 7 mos) | Overland Park, Kansas, United States (Hybrid)</p>
            <ul class="mt-4 list-disc pl-6 space-y-2 text-gray-700">
              <li>Architect and develop scalable full-stack systems powering immersive installations and interactive experiences across museums, stadiums, and branded environments.</li>
              <li>Collaborate with cross-disciplinary teams - including designers, fabricators, and hardware engineers - to integrate software, physical systems, and creative media into seamless experiential projects.</li>
              <li>Design and maintain robust backend architectures supporting real-time data, content management, and hardware communication layers.</li>
              <li>Build modern front-end interfaces using frameworks such as React or Vue, delivering high-performance, visually engaging user experiences.</li>
              <li>Develop Rust-based applications for sound processing, long-running background services, and headless systems requiring high performance, safety, and reliability.</li>
              <li>Lead technical planning and mentorship for internal development teams, ensuring consistency, scalability, and maintainability.</li>
              <li>Contribute to system documentation, CI/CD pipelines, and deployment processes for production-ready interactive environments.</li>
              <li>Prototype and evaluate emerging technologies - including sensors, computer vision, and generative systems - to expand the boundaries of interactive storytelling.</li>
              <li>Partner with creative directors and stakeholders to translate conceptual designs into functional, interactive realities.</li>
              <li>Advocate for clean architecture, transparent documentation, and test-driven development to uphold long-term maintainability and quality.</li>
            </ul>
          </article>

          <article class="rounded-lg bg-white p-6 shadow-sm">
            <h3 class="text-2xl font-bold">Dialectic</h3>
            <p class="mt-1 text-sm font-semibold text-gray-600">Software Engineer (Contract) | Sep 2023 - Sep 2024 (1 yr 1 mo) | Kansas City, MO (Hybrid)</p>
            <ul class="mt-4 list-disc pl-6 space-y-2 text-gray-700">
              <li>Promoted for expertise in designing scalable software architectures.</li>
              <li>Enhanced an internal PHP/Laravel project management system, boosting operational efficiency.</li>
              <li>Built Revit extensions in Python, streamlining engineering workflows.</li>
              <li>Developed a proof-of-concept for a next-gen suite using Angular/TypeScript and Laravel.</li>
              <li>Introduced Grafana dashboards for actionable insights into company metrics.</li>
            </ul>
          </article>

          <article class="rounded-lg bg-white p-6 shadow-sm">
            <h3 class="text-2xl font-bold">SpotX</h3>
            <p class="mt-1 text-sm font-semibold text-gray-600">Software Engineer III (Full-time) | Feb 2020 - Jan 2023 (3 yrs) | United States (Hybrid)</p>
            <ul class="mt-4 list-disc pl-6 space-y-2 text-gray-700">
              <li>Designed Angular/TypeScript features, improving campaign targeting rules.</li>
              <li>Migrated auction technology from PHP to C++ for enhanced performance and scalability.</li>
              <li>Integrated Prometheus metrics to diagnose and resolve system bottlenecks.</li>
              <li>Led code reviews and ensured adherence to SOLID principles.</li>
            </ul>
          </article>

          <article class="rounded-lg bg-white p-6 shadow-sm">
            <h3 class="text-2xl font-bold">Franklin Energy</h3>
            <p class="mt-1 text-sm font-semibold text-gray-600">Senior Software Engineer (Full-time) | Apr 2019 - Feb 2020 (11 mos) | Boulder, CO (On-site)</p>
            <ul class="mt-4 list-disc pl-6 space-y-2 text-gray-700">
              <li>Built a PHP API and Angular/TypeScript frontend for energy usage data.</li>
              <li>Engineered a data ingestion tool in Golang to process and secure client data using AWS S3.</li>
              <li>Mentored junior developers across the software lifecycle.</li>
            </ul>
          </article>

          <article class="rounded-lg bg-white p-6 shadow-sm">
            <h3 class="text-2xl font-bold">Colorado Department of Education</h3>
            <p class="mt-1 text-sm font-semibold text-gray-600">Web Developer (Contract) | Mar 2018 - Apr 2019 (1 yr 2 mos) | Denver Metropolitan Area</p>
            <ul class="mt-4 list-disc pl-6 space-y-2 text-gray-700">
              <li>Designed the "Antiquated PHP Framework" (APF) inspired by Laravel, standardizing web workflows.</li>
              <li>Built a web tool for school districts to apply for grants, improving application accuracy.</li>
              <li>Deployed Docker for streamlined, consistent development environments.</li>
            </ul>
          </article>

          <article class="rounded-lg bg-white p-6 shadow-sm">
            <h3 class="text-2xl font-bold">By the Pixel, LLC</h3>
            <p class="mt-1 text-sm font-semibold text-gray-600">Software Engineering Consultant | May 2016 - May 2017 (1 yr 1 mo) | Denver Metropolitan Area</p>
            <ul class="mt-4 list-disc pl-6 space-y-2 text-gray-700">
              <li>Created a price estimation tool for DenverDovetail.com using Angular2 and Laravel.</li>
              <li>Enhanced IDEXX's Petly Plans application with new features and automated tests.</li>
              <li>Optimized Ruby on Rails applications such as UrgentCareLocations.com.</li>
            </ul>
          </article>

          <article class="rounded-lg bg-white p-6 shadow-sm">
            <h3 class="text-2xl font-bold">PVBid, Inc.</h3>
            <p class="mt-1 text-sm font-semibold text-gray-600">Lead Software Engineer and Co-Founder | Dec 2013 - May 2016 (2 yrs 6 mos) | Denver Metropolitan Area</p>
            <ul class="mt-4 list-disc pl-6 space-y-2 text-gray-700">
              <li>Led development of a bidding system improving PV system cost estimates.</li>
              <li>Authored a REST/SOAP API using PHP and MySQL, supporting critical functionalities.</li>
              <li>Designed a proof-of-concept showcased to investors, securing funding.</li>
              <li>Deployed scalable environments on AWS and automated deployments with Jenkins.</li>
            </ul>
          </article>

          <article class="rounded-lg bg-white p-6 shadow-sm">
            <h3 class="text-2xl font-bold">Return Path</h3>
            <p class="mt-1 text-sm font-semibold text-gray-600">Software Engineer | Aug 2013 - May 2014 (10 mos) | Broomfield, CO</p>
            <ul class="mt-4 list-disc pl-6 space-y-2 text-gray-700">
              <li>Partnered with the design team to enhance user experience across email feedback loop and global trap exchange tool suites, improving usability.</li>
              <li>Developed and deployed Angular widgets as part of a company-wide initiative to standardize front-end development practices.</li>
              <li>Created a Git extension in Go, named "Grt," enabling expanded web-to-command-line interactions in Gerrit workflows.</li>
              <li>Enhanced Kafka consumer functionality to deliver a broader set of email trap data to approved customers, meeting evolving client needs.</li>
            </ul>
          </article>

          <article class="rounded-lg bg-white p-6 shadow-sm">
            <h3 class="text-2xl font-bold">ProKarma</h3>
            <p class="mt-1 text-sm font-semibold text-gray-600">Web Developer Consultant | Dec 2012 - Dec 2013 (1 yr 1 mo) | Denver, CO</p>
            <ul class="mt-4 list-disc pl-6 space-y-2 text-gray-700">
              <li>Advocated for and implemented traditional software development lifecycle (SDLC) best practices and tools, improving project consistency and quality.</li>
              <li>Designed and developed custom JavaScript applications to efficiently manage warehouse inventory.</li>
              <li>Modernized legacy proprietary software by integrating a robust PHP-based toolset, enhancing functionality and maintainability.</li>
            </ul>
          </article>

          <article class="rounded-lg bg-white p-6 shadow-sm">
            <h3 class="text-2xl font-bold">Novus Biologicals LLC</h3>
            <p class="mt-1 text-sm font-semibold text-gray-600">Web Developer | Apr 2011 - Dec 2012 (1 yr 9 mos) | Littleton, CO</p>
            <ul class="mt-4 list-disc pl-6 space-y-2 text-gray-700">
              <li>Maintained and developed modules for a Drupal 6-based e-commerce site utilizing Ubercart, ensuring seamless functionality.</li>
              <li>Migrated website to Acquia's Drupal hosting service, optimizing performance and scalability.</li>
              <li>Implemented required changes to achieve PCI compliance, enhancing security and regulatory adherence.</li>
              <li>Integrated Solr search functionality, reducing search response times significantly for improved user experience.</li>
              <li>Improved page load times by over 3000% through the adoption of industry best practices for performance optimization.</li>
              <li>Managed a robust database for over 250,000 products, ensuring accurate availability and pricing data.</li>
            </ul>
          </article>

          <article class="rounded-lg bg-white p-6 shadow-sm">
            <h3 class="text-2xl font-bold">Zenuity</h3>
            <p class="mt-1 text-sm font-semibold text-gray-600">Web Developer | Aug 2009 - Mar 2011 (1 yr 8 mos) | Scottsdale, AZ</p>
            <ul class="mt-4 list-disc pl-6 space-y-2 text-gray-700">
              <li>Built and customized Drupal 6 websites tailored to client specifications, ensuring functional and visually appealing solutions.</li>
              <li>Automated the contract generation process, saving hours of manual effort each month and streamlining workflows.</li>
              <li>Established and documented best practices for website development, ensuring consistency and high-quality results across client projects.</li>
              <li>Streamlined Drupal website deployment through automation, improving deployment speed and reducing errors.</li>
            </ul>
          </article>

          <article class="rounded-lg bg-white p-6 shadow-sm">
            <h3 class="text-2xl font-bold">Google</h3>
            <p class="mt-1 text-sm font-semibold text-gray-600">Data Center Technician Level 1 | Jun 2008 - Mar 2009 (10 mos) | The Dalles, OR</p>
            <ul class="mt-4 list-disc pl-6 space-y-2 text-gray-700">
              <li>Monitored, diagnosed, repaired, and upgraded over 16,000 servers' hardware.</li>
              <li>Provided advice on recurring team practice meetings to constantly improve team performance.</li>
              <li>Increased overall accuracy and productivity by instructing weekly Linux classes.</li>
            </ul>
          </article>
        </div>
      </section>
    </main>

    <footer class="py-6 bg-white border-t text-center text-sm text-gray-600">
      <p>© {{ date('Y') }} Michael J. Miller</p>
    </footer>
  </body>
</html>
