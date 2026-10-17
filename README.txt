AETHER INTERIORS & FURNISHINGS — WEBSITE FILES
================================================

WHAT'S IN THIS FOLDER
  index.html      -> the whole website (HTML + CSS + JavaScript, one file)
  send-mail.php   -> makes the "Start a Project" form actually send an email
  images/         -> every photo, the logo and the favicon
  robots.txt      -> tells search engines they're allowed to crawl the site
  sitemap.xml     -> a one-page map of the site, for search engines

HOW TO PREVIEW IT
  Double-click index.html to open it in your browser, or open the folder
  in VS Code and use the "Live Server" extension. The page itself will
  look and work correctly this way — the only thing that won't work
  without a real PHP server is the form actually emailing you (see below).

BEFORE YOU PUBLISH: ADD YOUR DOMAIN
  Three spots in index.html currently say "your-domain-here.com" as a
  placeholder (search for that text to find them): the canonical link,
  the Open Graph url, and the structured-data block near the top of the
  file. Once you've bought your domain, replace all three with it. Also
  update the one address inside robots.txt and sitemap.xml the same way.

HOW TO PUBLISH ON GODADDY
  1. Log in to GoDaddy and open your hosting File Manager (or connect with FTP).
  2. Upload ALL of these — index.html, send-mail.php, robots.txt,
     sitemap.xml, and the images folder — into your site's root folder
     (usually called public_html or www). Keep them together, in the
     same folder, exactly as they are here.
  3. Your site is now live at your domain, and the contact form will
     start emailing you automatically (see below).

THE "START A PROJECT" FORM
  Clicking "Start a Project" in the menu (or "Get a Free Estimate" in
  the hero) jumps down to a form next to the contact details, at the
  bottom of the page. It asks for:
    - Name (required)
    - Phone or email (required — one field, either works)
    - Project details (optional, no length limit)

  When a visitor clicks "Send Inquiry", the page sends that information
  to send-mail.php, which emails it straight to
  aetherwoods.crafts@gmail.com. This uses PHP's built-in mail()
  function — GoDaddy shared hosting supports this by default, so there
  is nothing to sign up for and no API key to manage.

  If, for any reason, the email can't be sent (for example, you're
  previewing the site locally before it's published, where PHP isn't
  running), the form automatically falls back to opening the visitor's
  own email app instead, pre-addressed to you — so it's never a dead
  end.

  Note: mail sent this way occasionally lands in Spam the first few
  times, until Gmail "learns" the sender — worth checking that folder
  early on. If you'd ever like more reliable delivery (via a proper
  SMTP service instead of PHP's mail()), that's a small upgrade — just ask.

HOW TO ADD A NEW PROJECT PHOTO TO THE "WORK" SECTION
  1. Put your new photo file inside the images folder.
  2. Open index.html, find the section that starts with <section id="work">.
  3. Copy one whole block that looks like this:

       <figure tabindex="0" class="surface">
         <img src="images/lounge-corner.jpg" alt="..." width="1400" height="788" loading="lazy">
         <div class="overlay"><p class="cat">Lounge Corner</p><h3>Tailored seating, custom upholstery & decorative sconces</h3></div>
       </figure>

  4. Paste it right after the last <figure> block in that section.
  5. Change:
       - src="images/YOUR-NEW-PHOTO.jpg"
       - alt="a short plain description of the photo"
       - the text inside <p class="cat"> (the category, e.g. "Kitchen")
       - the text inside <h3> (the project title)

HOW TO ADD A NEW VIDEO / REEL
  1. Open index.html, find the section that starts with <section id="videos">.
  2. Copy one whole block that looks like this:

       <div class="reel surface" tabindex="0" role="button" aria-label="Play: ...">
         <img src="images/ceiling-light-design.jpg" alt="..." loading="lazy">
         <div class="play"><svg viewBox="0 0 24 24" fill="#1A1A1A"><path d="M8 5v14l11-7z"/></svg></div>
         <div class="meta"><p class="kind">Craftsmanship detail</p><p class="title">Custom ceiling woodwork & lighting close-up</p></div>
       </div>

  3. Paste it after the last one in that section.
  4. For now this shows a photo with a play-button on top (a "poster").
     To use a REAL video file instead of a photo:
       - Create a folder called "videos" next to index.html.
       - Put your .mp4 file inside it.
       - Replace the <img ...> line in your new block with:

           <video src="videos/your-file.mp4" muted playsinline
                  poster="images/your-poster-photo.jpg"></video>

CONTACT DETAILS USED ON THE SITE (edit these directly in index.html,
in send-mail.php, and in the <script type="application/ld+json"> block
near the top of index.html, if any of them ever change)
  Email      aetherwoods.crafts@gmail.com
  Phone      +91 84248 19575
  Instagram  https://www.instagram.com/aether_interiors.n.furnishings/
  Address    Malad West, Mumbai, Maharashtra 400064

Note: the LinkedIn link in the footer is currently a placeholder ("#").
Search for `<!-- add your LinkedIn URL here when ready -->` in
index.html and replace the # with your real LinkedIn URL once you have one.
