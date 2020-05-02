import * as React from "react";
import { InertiaLink } from "@inertiajs/inertia-react";

import Layout from "@/includes/Layout";
import Seo from "@/includes/Seo";


const Soon = () => (
  <>
    <Seo title="Jobs Coming Soon" />
    <div className="mt-8 mx-auto max-w-screen-xl px-4 sm:mt-12 sm:px-6 md:mt-16">
      <div className="lg:grid lg:grid-cols-12 lg:gap-8">
        <div className="sm:text-center md:max-w-2xl md:mx-auto lg:col-span-6 lg:text-left">
          <div className="text-sm font-semibold uppercase tracking-wide text-gray-500 sm:text-base lg:text-sm">
            Coming soon
          </div>
          <h2 className="mt-2 text-xl md:text-3xl tracking-tight leading-10 font-bold text-gray-900 sm:leading-none lg:text-5xl">
            Laravel Cameroun
            <br className="hidden md:inline" />
            <span className="text-brand-primary ml-1 md:ml-0">Espace Entreprise</span>
          </h2>
          <p className="mt-3 text-sm text-gray-500 sm:mt-5 md:text-base">
            Votre futur dépendra du travail que vous allez obtenir aujourd’hui. Rejoignez plusieurs autres rechercheurs et
            demandeurs d’emploi. La meilleure façon de trouver un nouveau job.
          </p>
          <div className="mt-5 sm:max-w-lg sm:mx-auto sm:text-center lg:text-left lg:mx-0">
            <p className="text-sm font-medium text-gray-900">Rejoignez la newsletter maintenant pour être informé.</p>
            <form
              action="https://laravelcm.us4.list-manage.com/subscribe/post?u=0642d391e4785535c232a8c66&amp;id=6ff87af677"
              method="post"
              id="mc-embedded-subscribe-form"
              name="mc-embedded-subscribe-form"
              className="mt-3 sm:flex"
              target="_blank"
              noValidate
            >
              <input
                aria-label="Email"
                name="EMAIL"
                id="mce-EMAIL"
                value=""
                type="email"
                className="appearance-none block w-full px-3 py-3 border border-gray-300 text-base leading-6 rounded-md placeholder-gray-500 shadow-sm focus:outline-none focus:placeholder-gray-400 focus:shadow-outline-brand focus:border-brand-200 transition duration-150 ease-in-out sm:flex-1"
                placeholder="Entrer votre adresse email"
              />
              <input type="hidden" name="b_0642d391e4785535c232a8c66_6ff87af677" tabIndex={-1} value="" />
              <button type="submit" className="mt-3 w-full px-6 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-gray-800 shadow-sm hover:bg-gray-700 focus:outline-none focus:shadow-outline active:bg-gray-900 transition duration-150 ease-in-out sm:mt-0 sm:ml-3 sm:flex-shrink-0 sm:inline-flex sm:items-center sm:w-auto">
                Me notifier
              </button>
            </form>
            <p className="mt-3 text-sm leading-5 text-gray-500">
              Nous nous soucions de la protection de vos données. Lisez notre
              <InertiaLink href="/privacy" className="font-medium text-gray-900 underline ml-1">Politique de confidentialité</InertiaLink>.
            </p>
          </div>
        </div>
        <div className="mt-12 relative sm:max-w-lg sm:mx-auto lg:mt-0 lg:max-w-none lg:mx-0 lg:col-span-6 lg:flex lg:items-center">
          <svg
            className="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-8 scale-75 origin-top sm:scale-100 lg:hidden"
            width="640"
            height="784"
            fill="none"
            viewBox="0 0 640 784"
          >
            <defs>
              <pattern id="4f4f415c-a0e9-44c2-9601-6ded5a34a13e" x="118" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                <rect x="0" y="0" width="4" height="4" className="text-brand-100" fill="currentColor" />
              </pattern>
            </defs>
            <rect y="72" width="640" height="640" className="text-gray-50" fill="currentColor" />
            <rect x="118" width="404" height="784" fill="url(#4f4f415c-a0e9-44c2-9601-6ded5a34a13e)" />
          </svg>
          <div className="relative mx-auto w-full">
            <img
              className="w-full"
              src={require("@/assets/images/mail-campaign.svg")}
              alt="Campagne Marketing"
            />
          </div>
        </div>
      </div>
    </div>
    <div>
      <div className="relative max-w-screen-xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div className="grid grid-cols-2 gap-8 md:grid-cols-6 lg:grid-cols-5">
          <div className="col-span-1 flex justify-center md:col-span-2 lg:col-span-1">
            <img className="h-20" src={require("@/assets/brands/iug-douala.svg")} alt="IUG Douala" />
          </div>
          <div className="col-span-1 flex justify-center md:col-span-2 lg:col-span-1">
            <img className="h-20" src={require("@/assets/brands/gdg-douala.svg")} alt="GDG Douala" />
          </div>
          <div className="col-span-1 flex justify-center md:col-span-2 lg:col-span-1">
            <img className="h-14" src={require("@/assets/brands/pondo-creativ.svg")} alt="Pondo Creativ" />
          </div>
          <div className="col-span-1 flex justify-center md:col-span-3 lg:col-span-1">
            <img className="h-18" src={require("@/assets/brands/goshen-tabernacle.svg")} alt="Goshen Tabernacle" />
          </div>
          <div className="col-span-2 flex justify-center md:col-span-3 lg:col-span-1">
            <img className="h-18" src={require("@/assets/brands/teddy.svg")} alt="Teddy Graphiste" />
          </div>
        </div>
      </div>
    </div>
    <div className="py-12 bg-white lg:py-16 xl:py-20">
      <div className="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="lg:text-center">
          <h3 className="mt-2 text-3xl leading-8 font-bold tracking-tight text-gray-900 sm:text-4xl sm:leading-10">
            Comment ça marche
          </h3>
          <p className="mt-4 max-w-2xl text-lg leading-7 text-gray-500 lg:mx-auto">
            Les entreprises doivent créér un compte par un représentant et ainsi elles pourront enregistrer des offres.
          </p>
        </div>

        <div className="mt-14">
          <ul className="md:grid md:grid-cols-3 md:col-gap-8 md:row-gap-10 space-y-10 md:space-y-0">
            <li>
              <div className="flex">
                <div className="flex-shrink-0">
                  <div className="flex items-center justify-center h-12 w-12 rounded-md bg-brand-primary text-white">
                    <svg className="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                      <path
                        strokeLinecap="round"
                        strokeLinejoin="round"
                        strokeWidth="2"
                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"
                      />
                    </svg>
                  </div>
                </div>
                <div className="ml-4">
                  <h5 className="text-lg leading-6 font-medium text-gray-900">Compte entreprise</h5>
                  <p className="mt-2 text-base leading-6 text-gray-500">
                    Tous les membres du site peuvent créer un compte entreprise pour les rendre visible aux internautes.
                  </p>
                </div>
              </div>
            </li>
            <li>
              <div className="flex">
                <div className="flex-shrink-0">
                  <div className="flex items-center justify-center h-12 w-12 rounded-md bg-brand-primary text-white">
                    <svg className="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                      <path
                        strokeLinecap="round"
                        strokeLinejoin="round"
                        strokeWidth="2"
                        d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                      />
                    </svg>
                  </div>
                </div>
                <div className="ml-4">
                  <h5 className="text-lg leading-6 font-medium text-gray-900">Création des offres</h5>
                  <p className="mt-2 text-base leading-6 text-gray-500">
                    Chaque entreprise pourra créer autant d'offres qu'elle voudra, les offres d'emploi, de stage ou
                    tout autre offre.
                  </p>
                </div>
              </div>
            </li>
            <li>
              <div className="flex">
                <div className="flex-shrink-0">
                  <div className="flex items-center justify-center h-12 w-12 rounded-md bg-brand-primary text-white">
                    <svg className="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                      <path
                        strokeLinecap="round"
                        strokeLinejoin="round"
                        strokeWidth="2"
                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"
                      />
                    </svg>
                  </div>
                </div>
                <div className="ml-4">
                  <h5 className="text-lg leading-6 font-medium text-gray-900">Suivi et analyses</h5>
                  <p className="mt-2 text-base leading-6 text-gray-500">
                    Toutes les informations d'analyse et de suivi des offres seront mise à disposition des entreprises.
                  </p>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div className="relative bg-gray-800">
      <div className="h-56 bg-brand-primary sm:h-72 md:absolute md:left-0 md:h-full md:w-1/2">
        <img
          className="w-full h-full object-cover"
          src={require("@/assets/images/preview.png")}
          alt="Developer"
        />
      </div>
      <div className="relative max-w-screen-xl mx-auto px-4 py-16 sm:px-6 lg:px-8 lg:py-24">
        <div className="md:ml-auto md:w-1/2 md:pl-10">
          <h2 className="text-white text-3xl leading-9 font-semibold tracking-tight sm:text-4xl sm:leading-10">
            Vous êtes un développeur ?
          </h2>
          <h4 className="mt-2 text-xs leading-6 font-medium uppercase tracking-wider text-gray-200">
            Votre futur dépendra du travail que vous allez obtenir aujourd’hui.
          </h4>
          <p className="mt-6 text-lg leading-7 text-gray-400">
            Créez votre compte gratuitement pour accéder à des articles, des tutoriels,
            et participer aux sujets de discussion sur le forum.
            Accéder à plusieurs ressources pour les développeurs.
          </p>
          <div className="mt-8">
            <div className="inline-flex rounded-md shadow">
              <a href="/register" className="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-gray-900 bg-white hover:text-gray-600 focus:outline-none focus:shadow-outline transition duration-150 ease-in-out">
                Créer mon compte
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <section className="pt-10 overflow-hidden md:pt-16 lg:pt-24">
      <div className="relative max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
        <svg
          className="absolute top-full right-full transform translate-x-1/3 -translate-y-1/4 lg:translate-x-1/2 xl:-translate-y-1/2"
          width="404"
          height="404"
          fill="none"
          viewBox="0 0 404 404"
          role="img"
          aria-labelledby="svg-laravelcm"
        >
          <title id="svg-laravelcm">Laravel Cameroon</title>
          <defs>
            <pattern id="ad119f34-7694-4c31-947f-5c9d249b21f3" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
              <rect x="0" y="0" width="4" height="4" className="text-brand-100" fill="currentColor" />
            </pattern>
          </defs>
          <rect width="404" height="404" fill="url(#ad119f34-7694-4c31-947f-5c9d249b21f3)" />
        </svg>

        <div className="relative">
          <svg
            className="mx-auto h-10 text-brand-primary"
            width="59"
            height="38"
            viewBox="0 0 59 38"
            fill="currentColor"
            strokeWidth="2"
            stroke="currentColor"
          >
            <path d="M58.9657 18.1341C58.9301 18.0216 58.8708 17.9092 58.7995 17.808L51.5568 9.25229C51.3312 8.9937 50.975 8.88128 50.6426 8.94873L42.2719 10.815C41.9751 10.8825 41.7376 11.0849 41.6307 11.3434C41.5239 11.6133 41.5595 11.9168 41.7376 12.1417L47.7099 20.1128L35.8009 23.1821L29.8287 24.7336L28.4276 22.5075L14.429 0.415485C14.239 0.123173 13.8947 -0.0454672 13.5266 0.0107466L0.786606 1.6297C0.489773 1.66343 0.240434 1.84332 0.0979547 2.09066C-0.0326516 2.338 -0.0326516 2.64155 0.0979547 2.88889L5.74964 12.9624L15.0939 29.6129C15.2958 29.9727 15.7232 30.1413 16.1388 30.0401L28.9738 26.7348L35.8484 37.584C36.0147 37.8538 36.3115 38 36.6321 38C36.7271 38 36.8339 37.9888 36.9289 37.955L56.9117 31.3331C57.1847 31.2431 57.3866 31.0407 57.4816 30.7822C57.5647 30.5236 57.5172 30.2425 57.3628 30.0176L50.8919 21.3945L50.7019 21.1471L54.7032 20.1128L58.3246 19.1796C58.6214 19.1009 58.8589 18.8873 58.9539 18.6175C59.0132 18.4601 59.0132 18.2915 58.9657 18.1341ZM16.3644 28.1963L9.20477 15.4358L2.31826 3.16996L13.1823 1.7871L26.0292 22.0803L28.0002 25.2058L16.3644 28.1963ZM55.1663 30.0851L37.0239 36.1L30.8023 26.2626L44.6465 22.6986L48.8259 21.6193L49.0159 21.8667L55.1663 30.0851ZM49.5858 19.6406L44.0054 12.1979L50.5001 10.7476L56.5198 17.8642L49.5858 19.6406Z" />
          </svg>
          <blockquote className="mt-8">
            <div className="max-w-3xl mx-auto text-center text-2xl leading-9 font-medium text-gray-900">
              <p>
                &ldquo;Laravel Cameroun Jobs vient mettre en avant les développeurs francophones étudiants, débutants et
                même professionels à la portée des entreprises.&rdquo;
              </p>
            </div>
            <footer className="mt-8">
              <div className="md:flex md:items-center md:justify-center">
                <div className="md:flex-shrink-0">
                  <img
                    className="mx-auto h-10 w-10 rounded-full"
                    src="https://avatars0.githubusercontent.com/u/14105989?s=460&u=9c230c3e470fd4ddbbec22005757893bfa61d3ef&v=4"
                    alt=""
                  />
                </div>
                <div className="mt-3 text-center md:mt-0 md:ml-4 md:flex md:items-center">
                  <div className="text-base leading-6 font-medium text-gray-900">Arthur Monney</div>
                  <svg className="hidden md:block mx-1 h-5 w-5 text-brand-primary" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M11 0h3L9 20H6l5-20z" />
                  </svg>
                  <div className="text-base leading-6 font-medium text-gray-500">Laravel Cameroun, Maintainer</div>
                </div>
              </div>
            </footer>
          </blockquote>
        </div>
      </div>
    </section>
  </>
);

Soon.layout = (page: React.ReactNode) => <Layout child={page} />;

export default Soon;
