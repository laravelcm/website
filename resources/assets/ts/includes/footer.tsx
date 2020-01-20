import React from "react";

export default () => {
  return (
    <div className="pb-4 pt-14">
      <div className="bg-white text-center shadow-bigger rounded-md mb-8 px-6 py-8 w-full md:w-2/3 mx-auto md:px-18 lg:w-3/5 lg:mb-12 lg:px-36 lg:py-10">
        <h4 className="text-xl font-medium text-gray-700 mb-4 lg:text-2xl">Restez informés des mises à jour</h4>
        <p className="text-sm mb-8 text-gray-600 lg:text-base">
          Rejoignez notre newsletter hebdomadaire et recevez des tutoriels et des articles sur le
          {` `}
          <span className="text-green-600">design </span>
          et la
          {` `}
          <span className="text-blue-500">programmation.</span>
        </p>
        <form action="#" className="lg:flex">
          <input
            type="email"
            className="bg-gray-200 rounded-md py-4 px-5 transition focus:outline-none border border-transparent focus:bg-gray-100 focus:border-gray-200 placeholder-gray-600 w-full mb-3 lg:w-2/3 lg:mb-0"
            placeholder="Entrer votre adresse email"
          />
          <button type="submit" className="btn btn-primary font-medium w-full p-4 lg:ml-2 lg:w-1/3">S'enregistrer</button>
        </form>
      </div>
      <footer>
        <div className="w-full max-w-screen-xl relative mx-auto px-6">
          <div className="lg:flex -mx-6">
            <div className="px-6 mb-8 w-full md:text-center md:w-2/3 md:mx-auto lg:w-1/2 lg:text-left">
              <div className="text-brand-primary flex items-center md:justify-center lg:justify-start">
                <svg className="text-brand-primary" width="59" height="38" viewBox="0 0 59 38" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path d="M58.9657 18.1341C58.9301 18.0216 58.8708 17.9092 58.7995 17.808L51.5568 9.25229C51.3312 8.9937 50.975 8.88128 50.6426 8.94873L42.2719 10.815C41.9751 10.8825 41.7376 11.0849 41.6307 11.3434C41.5239 11.6133 41.5595 11.9168 41.7376 12.1417L47.7099 20.1128L35.8009 23.1821L29.8287 24.7336L28.4276 22.5075L14.429 0.415485C14.239 0.123173 13.8947 -0.0454672 13.5266 0.0107466L0.786606 1.6297C0.489773 1.66343 0.240434 1.84332 0.0979547 2.09066C-0.0326516 2.338 -0.0326516 2.64155 0.0979547 2.88889L5.74964 12.9624L15.0939 29.6129C15.2958 29.9727 15.7232 30.1413 16.1388 30.0401L28.9738 26.7348L35.8484 37.584C36.0147 37.8538 36.3115 38 36.6321 38C36.7271 38 36.8339 37.9888 36.9289 37.955L56.9117 31.3331C57.1847 31.2431 57.3866 31.0407 57.4816 30.7822C57.5647 30.5236 57.5172 30.2425 57.3628 30.0176L50.8919 21.3945L50.7019 21.1471L54.7032 20.1128L58.3246 19.1796C58.6214 19.1009 58.8589 18.8873 58.9539 18.6175C59.0132 18.4601 59.0132 18.2915 58.9657 18.1341ZM16.3644 28.1963L9.20477 15.4358L2.31826 3.16996L13.1823 1.7871L26.0292 22.0803L28.0002 25.2058L16.3644 28.1963ZM55.1663 30.0851L37.0239 36.1L30.8023 26.2626L44.6465 22.6986L48.8259 21.6193L49.0159 21.8667L55.1663 30.0851ZM49.5858 19.6406L44.0054 12.1979L50.5001 10.7476L56.5198 17.8642L49.5858 19.6406Z" />
                </svg>
                <h4 className="ml-2 text-lg">Laravel Cameroun</h4>
              </div>
              <p className="mt-4 text-gray-600 text-base lg:w-116">
                Laravel Cameroun est la plus grande communauté PHP & Laravel au Cameroun. Un rassemblement de milliers de développeurs chaque année.
              </p>
            </div>
            <div className="md:flex w-full lg:w-1/2">
              <div className="px-6 mb-8 md:w-1/3">
                <h5 className="text-gray-600 text-base uppercase mb-4 font-medium">Autres Ressources</h5>
                <ul>
                  <li className="mb-3"><a href="https://laravel.com/docs" className="text-gray-700 hover:text-gray-800" target="_blank" rel="noopener noreferrer">Laravel Docs</a></li>
                  <li className="mb-3"><a href="/jobs" className="text-gray-700 hover:text-gray-800">Jobs</a></li>
                  <li className="mb-3"><a href="/privacy" className="text-gray-700 hover:text-gray-800">Confidentialité</a></li>
                  <li className="mb-3"><a href="/terms" className="text-gray-700 hover:text-gray-800">Conditions d'utilisation</a></li>
                </ul>
              </div>
              <div className="px-6 mb-8 md:w-1/3">
                <h5 className="text-gray-600 text-base uppercase mb-4 font-medium">Reseaux Sociaux</h5>
                <ul>
                  <li className="mb-3"><a href="https://facebook.com/laravelcm" className="text-gray-700 hover:text-gray-800" target="_blank" rel="noopener noreferrer">Facebook</a></li>
                  <li className="mb-3"><a href="https://twitter.com/laravelcm" className="text-gray-700 hover:text-gray-800" target="_blank" rel="noopener noreferrer">Twitter</a></li>
                  <li className="mb-3"><a href="https://github.com/laravelcm" className="text-gray-700 hover:text-gray-800" target="_blank" rel="noopener noreferrer">Github</a></li>
                  <li className="mb-3"><a href="https://youtube.com/channel/laravelcm" className="text-gray-700 hover:text-gray-800" target="_blank" rel="noopener noreferrer">YouTube</a></li>
                </ul>
              </div>
              <div className="px-6 md:w-1/3">
                <h5 className="text-gray-600 text-base uppercase mb-4 font-medium">Rejoignez Nous</h5>
                <ul>
                  <li className="mb-3"><a href="https://laravelcm.slack.com" className="text-gray-700 hover:text-gray-800" target="_blank" rel="noopener noreferrer">Slack</a></li>
                  <li className="mb-3"><a href="https://meetup.com/laravelcm" className="text-gray-700 hover:text-gray-800" target="_blank" rel="noopener noreferrer">Meetup</a></li>
                </ul>
              </div>
            </div>
          </div>
          <hr className="bg-gray-400 mt-6 mb-4 mx-6" />
        </div>
      </footer>
      <div className="px-6 text-center w-full md:w-2/3 mx-auto">
        <p className="text-sm text-gray-600 inline">
          © {(new Date()).getFullYear()} Laravel Cameroun {" | "} Tous droits reservés. <br className="hidden lg:block" />
          Design fait avec {" "}
          <svg className="h-4 w-4 text-red-500 inline" xmlns="http://www.w3.org/2000/svg">
            <path d="M10.547 2.188c1.939 0 3.515 1.471 3.515 3.28 0 1.134-1.108 2.165-1.155 2.209L7.5 12.723 2.09 7.674C2.047 7.634.939 6.602.939 5.47c0-1.81 1.576-3.282 3.515-3.282 1.356 0 2.497.79 3.047 1.25.55-.46 1.691-1.25 3.047-1.25z" fill="currentColor" />
          </svg> {" "}
          par <a href="https://arthurmonney.com" target="_blank" rel="noopener noreferrer" className="font-medium hover:text-gray-800">Arthur Monney</a> {" "}
          & Fièrement hébergé par <a href="https://digitalocean.com" target="_blank" rel="noopener noreferrer" className="font-medium hover:text-gray-800">DigitalOcean</a>.
        </p>
      </div>
    </div>
  );
}
