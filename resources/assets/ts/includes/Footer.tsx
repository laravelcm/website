import React, { useState } from "react";
import { InertiaLink } from "@inertiajs/inertia-react";

export default () => {
  const [email, setEmail] = useState('');

  return (
    <div className="pb-4 pt-14">
      <div className="max-w-screen-xl mx-auto py-8 md:px-8 lg:py-12 xl:pb-16">
        <div className="px-6 py-6 sm:py-8 bg-white shadow-smooth md:rounded-lg md:py-12 md:px-12 lg:py-16 lg:px-16 xl:flex xl:items-center">
          <div className="xl:w-0 xl:flex-1">
            <h2 className="text-2xl leading-8 font-medium tracking-tight text-gray-700 sm:text-3xl sm:leading-9">
              Restez informés des mises à jour du site
            </h2>
            <p className="mt-3 max-w-3xl text-base leading-6 text-gray-600" id="newsletter-headline">
              Rejoignez notre newsletter hebdomadaire et recevez des tutoriels et
              des articles sur le
              {` `}
              <span className="text-brand-primary">design</span> et la
              {` `}
              <span className="text-teal-600">programmation.</span>
            </p>
          </div>
          <div className="mt-8 sm:w-full md:max-w-lg xl:mt-0 xl:ml-12">
            <form
              aria-labelledby="newsletter-headline"
              action="https://laravelcm.us4.list-manage.com/subscribe/post?u=0642d391e4785535c232a8c66&amp;id=6ff87af677"
              method="post"
              id="mc-embedded-subscribe-form"
              name="mc-embedded-subscribe-form"
              className="sm:flex"
              target="_blank"
              noValidate
            >
              <input
                aria-label="Email"
                name="EMAIL"
                id="mce-EMAIL"
                type="email"
                required
                className="appearance-none w-full px-5 py-3 border border-gray-100 text-base leading-6 rounded-md text-gray-900 bg-gray-50 placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 transition duration-150 ease-in-out"
                placeholder="Entrer votre adresse email"
                autoComplete="off"
                value={email}
                onChange={(e) => setEmail(e.target.value)}
              />
              <div className="mt-3 rounded-md shadow sm:mt-0 sm:ml-4 sm:flex-shrink-0">
                <input type="hidden" name="b_0642d391e4785535c232a8c66_6ff87af677" tabIndex={-1} value="" />
                <button type="submit" className="w-full flex items-center justify-center px-5 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-brand-primary hover:bg-brand-900 focus:outline-none focus:bg-brand-200 transition duration-150 ease-in-out">
                  S'enrégistrer
                </button>
              </div>
            </form>
            <p className="mt-3 text-sm leading-5 text-gray-500">
              Nous nous soucions de la protection de vos données. Lisez notre
              <InertiaLink href="/privacy" className="text-gray-800 font-medium underline">
                Politique de confidentialité.
              </InertiaLink>
            </p>
          </div>
        </div>
      </div>
      <footer>
        <div className="w-full max-w-screen-xl mx-auto px-6">
          <div className="lg:flex -mx-6">
            <div className="px-6 mb-8 w-full md:text-center md:w-2/3 md:mx-auto lg:w-1/3 lg:text-left">
              <div className="text-brand-primary flex items-center md:justify-center lg:justify-start">
                <svg className="text-brand-primary" width="59" height="38" viewBox="0 0 59 38" fill="currentColor">
                  <path d="M58.9657 18.1341C58.9301 18.0216 58.8708 17.9092 58.7995 17.808L51.5568 9.25229C51.3312 8.9937 50.975 8.88128 50.6426 8.94873L42.2719 10.815C41.9751 10.8825 41.7376 11.0849 41.6307 11.3434C41.5239 11.6133 41.5595 11.9168 41.7376 12.1417L47.7099 20.1128L35.8009 23.1821L29.8287 24.7336L28.4276 22.5075L14.429 0.415485C14.239 0.123173 13.8947 -0.0454672 13.5266 0.0107466L0.786606 1.6297C0.489773 1.66343 0.240434 1.84332 0.0979547 2.09066C-0.0326516 2.338 -0.0326516 2.64155 0.0979547 2.88889L5.74964 12.9624L15.0939 29.6129C15.2958 29.9727 15.7232 30.1413 16.1388 30.0401L28.9738 26.7348L35.8484 37.584C36.0147 37.8538 36.3115 38 36.6321 38C36.7271 38 36.8339 37.9888 36.9289 37.955L56.9117 31.3331C57.1847 31.2431 57.3866 31.0407 57.4816 30.7822C57.5647 30.5236 57.5172 30.2425 57.3628 30.0176L50.8919 21.3945L50.7019 21.1471L54.7032 20.1128L58.3246 19.1796C58.6214 19.1009 58.8589 18.8873 58.9539 18.6175C59.0132 18.4601 59.0132 18.2915 58.9657 18.1341ZM16.3644 28.1963L9.20477 15.4358L2.31826 3.16996L13.1823 1.7871L26.0292 22.0803L28.0002 25.2058L16.3644 28.1963ZM55.1663 30.0851L37.0239 36.1L30.8023 26.2626L44.6465 22.6986L48.8259 21.6193L49.0159 21.8667L55.1663 30.0851ZM49.5858 19.6406L44.0054 12.1979L50.5001 10.7476L56.5198 17.8642L49.5858 19.6406Z" />
                </svg>
                <h4 className="ml-2 text-lg">Laravel Cameroun</h4>
              </div>
              <p className="mt-4 text-gray-600 lg:w-116 lg:pr-4">
                Laravel Cameroun est la plus grande communauté PHP & Laravel au
                Cameroun. Un rassemblement de milliers de développeurs chaque
                année.
              </p>
            </div>
            <div className="md:flex w-full lg:w-2/3 lg:pl-24">
              <div className="px-6 mb-8 md:w-1/3">
                <h5 className="text-gray-600 uppercase mb-8 font-medium">Autres Ressources</h5>
                <ul>
                  <li className="mb-3">
                    <a href="https://laravel.com/docs" className="text-gray-700 hover:text-gray-800" target="_blank" rel="noopener noreferrer">
                      Laravel Docs
                    </a>
                  </li>
                  <li className="mb-3">
                    <InertiaLink href="/jobs" className="text-gray-700 hover:text-gray-800">
                      Jobs
                    </InertiaLink>
                  </li>
                  <li className="mb-3">
                    <InertiaLink href="/privacy" className="text-gray-700 hover:text-gray-800">
                      Confidentialité
                    </InertiaLink>
                  </li>
                  <li className="mb-3">
                    <InertiaLink href="/terms" className="text-gray-700 hover:text-gray-800">
                      Conditions d'utilisation
                    </InertiaLink>
                  </li>
                </ul>
              </div>
              <div className="px-6 mb-8 md:w-1/3">
                <h5 className="text-gray-600 uppercase mb-8 font-medium">Reseaux Sociaux</h5>
                <ul>
                  <li className="mb-3">
                    <a href="https://facebook.com/laravelcm" className="text-gray-700 hover:text-gray-800" target="_blank" rel="noopener noreferrer">
                      Facebook
                    </a>
                  </li>
                  <li className="mb-3">
                    <a href="https://twitter.com/laravelcm" className="text-gray-700 hover:text-gray-800" target="_blank" rel="noopener noreferrer">
                      Twitter
                    </a>
                  </li>
                  <li className="mb-3">
                    <a href="https://github.com/laravelcm" className="text-gray-700 hover:text-gray-800" target="_blank" rel="noopener noreferrer">
                      Github
                    </a>
                  </li>
                  <li className="mb-3">
                    <a href="https://www.youtube.com/channel/UCbQPQ8q31uQmuKtyRnATLSw" className="text-gray-700 hover:text-gray-800" target="_blank" rel="noopener noreferrer">
                      YouTube
                    </a>
                  </li>
                </ul>
              </div>
              <div className="px-6 md:w-1/3">
                <h5 className="text-gray-600 uppercase mb-8 font-medium">Rejoignez Nous</h5>
                <ul>
                  <li className="mb-3">
                    <InertiaLink href="/join-slack" className="text-gray-700 hover:text-gray-800">Slack</InertiaLink>
                  </li>
                  <li className="mb-3">
                    <span className="text-gray-700 hover:text-gray-800 flex items-center">
                      Meetup <span className="px-2 py-1 text-xs text-brand-primary bg-brand-100 rounded-md ml-2">Bientôt</span>
                    </span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <hr className="bg-gray-400 mt-6 mb-4" />
        </div>
      </footer>
      <div className="px-6 text-center w-full md:w-2/3 mx-auto">
        <p className="text-sm text-gray-600 inline">
          © 2018 - {new Date().getFullYear()} Laravel Cameroun {" | "} Tous
          droits reservés. <br className="hidden lg:block" />
          Design fait avec{" "}
          <svg
            className="h-4 w-4 text-red-500 inline"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M10.547 2.188c1.939 0 3.515 1.471 3.515 3.28 0 1.134-1.108 2.165-1.155 2.209L7.5 12.723 2.09 7.674C2.047 7.634.939 6.602.939 5.47c0-1.81 1.576-3.282 3.515-3.282 1.356 0 2.497.79 3.047 1.25.55-.46 1.691-1.25 3.047-1.25z"
              fill="currentColor"
            />
          </svg>{" "}
          par{" "}
          <a
            href="https://twitter.com/MonneyArthur"
            target="_blank"
            rel="noopener noreferrer"
            className="font-medium hover:text-gray-800"
          >
            Arthur Monney
          </a>{" "}
          & Fièrement hébergé par{" "}
          <a
            href="https://forge.laravel.com"
            target="_blank"
            rel="noopener noreferrer"
            className="font-medium hover:text-gray-800"
          >
            Laravel Forge
          </a>{" "}
          et{" "}
          <a
            href="https://digitalocean.com"
            target="_blank"
            rel="noopener noreferrer"
            className="font-medium hover:text-gray-800"
          >
            Digital Ocean.
          </a>
        </p>
      </div>
    </div>
  );
};
