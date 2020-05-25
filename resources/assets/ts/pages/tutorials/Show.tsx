import React, { useEffect } from "react";
import { InertiaLink, usePage } from "@inertiajs/inertia-react";
import ReactMarkdown from "react-markdown/with-html";
import hljs from "highlight.js";
import moment from "moment";
import 'moment/locale/fr';

import Layout from "@/includes/Layout";
import Seo from "@/includes/Seo";
import Breadcrumb from "@/includes/Breadcrumb";
import { popupCenter } from "@/utils/helpers";

moment.locale('fr');

const Tutorial = () => {
  const { tutorial } = usePage();

  useEffect(() => {
    updateCodeSyntaxHighlighting();
  }, []);

  function share(e: React.SyntheticEvent, provider: string) {
    e.preventDefault();
    const url = `https://laravelcm.com/tutorial/${tutorial.slug}`;

    switch (provider) {
      case 'twitter':
        popupCenter(
          `https://twitter.com/intent/tweet?text=${encodeURIComponent(tutorial.title)}&via=laravelcm&url=${encodeURIComponent(url)}`,
          'Partager sur Twitter',
        );
        break;
      case 'facebook':
        popupCenter(
          `https://facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}`,
          'Partager sur Facebook',
        );
        break;
      case 'linkedin':
        popupCenter(
          `https://www.linkedin.com/shareArticle?mini=true&url=${encodeURIComponent(url)}`,
          'Partager sur LinkedIn',
        );
        break;
      default:
        break;
    }
  }

  function updateCodeSyntaxHighlighting() {
    document.querySelectorAll("pre code").forEach((block) => {
      hljs.highlightBlock(block);
    });
  }

  return (
    <>
      <Seo
        title={tutorial.title}
        meta={[
          {
            property: `og:url`,
            content: `https://laravelcm.com/tutorial/${tutorial.slug}`,
          },
          {
            property: `og:type`,
            content: `article`,
          },
          {
            property: `og:image`,
            content: tutorial.image,
          },
        ]}
      />
      <Breadcrumb parentLink="/tutorials" parentTitle="Tutoriels" title={tutorial.title} />
      <div className="container">
        <div className="w-full lg:w-10/12 mx-auto">
          <div className="mt-10 mb-12 w-full shadow-2xl h-100 md:h-120 lg:h-140">
            <iframe
              title={tutorial.title}
              height="100%"
              width="100%"
              src={`https://www.youtube.com/embed/${tutorial.provider_id}`}
            />
          </div>
        </div>
        <div className="mt-14 w-full flex flex-col lg:flex-row lg:flex-grow">
          <div className="hidden lg:flex items-center justify-center w-2/12 order-1 relative">
            <div className="flex mt-36 items-center absolute top-0">
              <div className="flex items-center flex-col space-y-6">
                <a href="#" onClick={(e) => share(e, 'twitter')}>
                  <svg
                    className="text-brand-twitter w-4 h-3"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M14 1.414a5.533 5.533 0 01-1.65.475A3.003 3.003 0 0013.613.22a5.589 5.589 0 01-1.824.731A2.807 2.807 0 009.693 0C8.106 0 6.82 1.35 6.82 3.015c0 .237.026.467.075.688C4.508 3.577 2.39 2.376.975.552a3.117 3.117 0 00-.39 1.516c0 1.046.508 1.97 1.279 2.51a2.758 2.758 0 01-1.301-.377v.038c0 1.46.99 2.68 2.303 2.957-.423.12-.866.138-1.297.051.366 1.198 1.427 2.07 2.683 2.095A5.592 5.592 0 010 10.59a7.852 7.852 0 004.403 1.355c5.283 0 8.172-4.595 8.172-8.58 0-.13-.003-.26-.008-.39A6.008 6.008 0 0014 1.414z"
                      fill="currentColor"
                    />
                  </svg>
                </a>
                <a href="#" onClick={(e) => share(e, 'facebook')}>
                  <svg
                    className="w-2 h-4 text-brand-facebook"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M7.714.101v2.221H6.312c-.511 0-.857.101-1.035.303-.179.202-.268.505-.268.909v1.59h2.616l-.348 2.49H5.009V14H2.277V7.614H0v-2.49h2.277V3.29c0-1.044.31-1.853.928-2.428C3.825.287 4.65 0 5.68 0c.875 0 1.553.034 2.035.101z"
                      fill="currentColor"
                    />
                  </svg>
                </a>
                <a href="#" onClick={(e) => share(e, 'linkedin')}>
                  <svg
                    className="h-4 w-4 text-brand-linkedin"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M0 1.53C0 1.088.158.72.473.434.788.144 1.198 0 1.703 0c.495 0 .896.142 1.202.426.316.293.473.674.473 1.145 0 .425-.153.78-.46 1.064-.314.293-.729.44-1.242.44h-.014c-.495 0-.896-.147-1.203-.44A1.464 1.464 0 010 1.531zm.176 11.646v-8.89h3v8.89h-3zm4.662 0h3V8.212c0-.31.036-.55.108-.719.126-.301.318-.557.574-.765.257-.209.58-.313.966-.313 1.01 0 1.514.67 1.514 2.01v4.751h3V8.08c0-1.313-.315-2.31-.946-2.988-.63-.679-1.464-1.018-2.5-1.018-1.162 0-2.068.492-2.716 1.477v.027h-.014l.014-.027V4.286h-3c.018.284.027 1.166.027 2.648 0 1.482-.01 3.563-.027 6.242z"
                      fill="currentColor"
                    />
                  </svg>
                </a>
              </div>
            </div>
          </div>
          <div className="w-full order-1 mb-4 lg:mt-16 lg:w-2/12 lg:order-3">
            <div className="flex items-start space-x-8 lg:flex-col lg:space-x-0">
              <div className="w-1/3 lg:w-full lg:mb-4">
                <h5 className="text-base font-medium text-gray-700 mb-3 flex items-center">
                  <svg
                    className="h-4 w-4 text-gray-700 mr-2"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M9 13.965l-4.912 2.453A.75.75 0 013 15.75V3c0-.825.675-1.5 1.5-1.5h9A1.5 1.5 0 0115 3v12.75a.75.75 0 01-1.088.675L9 13.957v.008zM13.5 3h-9v11.535l4.162-2.078a.75.75 0 01.675 0l4.163 2.078V3z"
                      fill="currentColor"
                    />
                  </svg>
                  <span>Categorie</span>
                </h5>
                <div>
                  <InertiaLink
                    href={`/tutorial/category/${tutorial.category.slug}`}
                    className="inline-block text-brand-laravel py-1 px-3 bg-opacity-laravel mr-2 rounded-full"
                  >
                    {tutorial.category.name}
                  </InertiaLink>
                </div>
              </div>
              <div className="flex items-center w-1/3 lg:w-full space-x-2 mb-3">
                <svg
                  className="h-4 w-4 fill-current mr-2 text-gray-700"
                  viewBox="0 0 25 25"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M17.56 17.66a8 8 0 01-11.32 0L1.3 12.7a1 1 0 010-1.42l4.95-4.95a8 8 0 0111.32 0l4.95 4.95a1 1 0 010 1.42l-4.95 4.95-.01.01zm-9.9-1.42a6 6 0 008.48 0L20.38 12l-4.24-4.24a6 6 0 00-8.48 0L3.4 12l4.25 4.24h.01zM11.9 16a4 4 0 110-8 4 4 0 010 8zm0-2a2 2 0 100-4 2 2 0 000 4z"
                    fill="currentColor"
                  />
                </svg>
                <span className="text-base font-medium text-gray-700">
                  Vues
                </span>
                <span className="text-base text-gray-800">{tutorial.visits}</span>
              </div>
            </div>
          </div>
          <div className="w-full order-2 lg:w-8/12">
            <h1 className="text-xl text-gray-800 font-medium">{tutorial.title}</h1>
            <div className="flex mt-6 lg:mt-14 items-center">
              <img
                src={tutorial.user.picture}
                className="h-12 w-12 rounded-full mr-4"
                alt={tutorial.user.full_name}
              />
              <div className="flex flex-col">
                <h4 className="text-base text-gray-600">
                  Auteur{" "}
                  <a
                    className="font-medium text-brand-primary hover:text-brand-900"
                    href="https://github.com/mckenziearts"
                    target="_blank"
                    rel="noopener noreferrer"
                  >
                    {tutorial.user.full_name}
                  </a>
                </h4>
                <small className="text-xs text-gray-500 capitalize">
                  Publié Le {moment(tutorial.published_at).format('LL')}
                </small>
              </div>
            </div>
            <div className="mt-8 lg:mt-18 text-sm lg:text-base text-gray-600 relative">
              <div className="markdown">
                <ReactMarkdown source={tutorial.body} escapeHtml={false} />
              </div>
              <div className="flex mt-8 lg:hidden items-center">
                <p className="text-base text-gray-600 mr-3">
                  Partager cette article :
                </p>
                <div className="flex space-x-4 items-center">
                  <a href="#" onClick={(e) => share(e, 'twitter')}>
                    <svg
                      className="text-brand-twitter w-4 h-3"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        d="M14 1.414a5.533 5.533 0 01-1.65.475A3.003 3.003 0 0013.613.22a5.589 5.589 0 01-1.824.731A2.807 2.807 0 009.693 0C8.106 0 6.82 1.35 6.82 3.015c0 .237.026.467.075.688C4.508 3.577 2.39 2.376.975.552a3.117 3.117 0 00-.39 1.516c0 1.046.508 1.97 1.279 2.51a2.758 2.758 0 01-1.301-.377v.038c0 1.46.99 2.68 2.303 2.957-.423.12-.866.138-1.297.051.366 1.198 1.427 2.07 2.683 2.095A5.592 5.592 0 010 10.59a7.852 7.852 0 004.403 1.355c5.283 0 8.172-4.595 8.172-8.58 0-.13-.003-.26-.008-.39A6.008 6.008 0 0014 1.414z"
                        fill="currentColor"
                      />
                    </svg>
                  </a>
                  <a href="#" onClick={(e) => share(e, 'facebook')}>
                    <svg
                      className="w-2 h-4 text-brand-facebook"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        d="M7.714.101v2.221H6.312c-.511 0-.857.101-1.035.303-.179.202-.268.505-.268.909v1.59h2.616l-.348 2.49H5.009V14H2.277V7.614H0v-2.49h2.277V3.29c0-1.044.31-1.853.928-2.428C3.825.287 4.65 0 5.68 0c.875 0 1.553.034 2.035.101z"
                        fill="currentColor"
                      />
                    </svg>
                  </a>
                  <a href="#" onClick={(e) => share(e, 'linkedin')}>
                    <svg
                      className="h-4 w-4 text-brand-linkedin"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        d="M0 1.53C0 1.088.158.72.473.434.788.144 1.198 0 1.703 0c.495 0 .896.142 1.202.426.316.293.473.674.473 1.145 0 .425-.153.78-.46 1.064-.314.293-.729.44-1.242.44h-.014c-.495 0-.896-.147-1.203-.44A1.464 1.464 0 010 1.531zm.176 11.646v-8.89h3v8.89h-3zm4.662 0h3V8.212c0-.31.036-.55.108-.719.126-.301.318-.557.574-.765.257-.209.58-.313.966-.313 1.01 0 1.514.67 1.514 2.01v4.751h3V8.08c0-1.313-.315-2.31-.946-2.988-.63-.679-1.464-1.018-2.5-1.018-1.162 0-2.068.492-2.716 1.477v.027h-.014l.014-.027V4.286h-3c.018.284.027 1.166.027 2.648 0 1.482-.01 3.563-.027 6.242z"
                        fill="currentColor"
                      />
                    </svg>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </>
  );
};

Tutorial.layout = (page: React.ReactNode) => <Layout child={page} />;

export default Tutorial;
